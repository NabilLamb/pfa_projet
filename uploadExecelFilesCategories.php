<?php

require_once 'include/database.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['upload'])) {
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION); //Recuperation l'extion du fichier Excel.
    $allowed_ext = ['xls', 'csv', 'xlsx'];
    if(in_array($file_ext, $allowed_ext)){
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach($data as $row){
            $libelle = $row['0'];
            $description = $row['1'];
            $icone = $row['2'];
                if (!empty($libelle) && !empty($description)) {
                    $sqlState = $pdo->prepare('INSERT INTO categorie(libelle,description,icone) VALUES(?,?,?)');
                    $sqlState->execute([$libelle, $description, $icone]);
                    header('location: categories.php');

                } else {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Libelle , description sont obligatoires
                        </div>
                     <?php
                }  
        }      

    }else{
        ?>
        <div class="alert alert-danger" role="alert">
            Fichier invalide !
        </div>
        <?php
        header('location:categories.php');
        exit(0);
    }
}
?>