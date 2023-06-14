<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../front/index.php"><img src="../assets/favicon/favicon-32x32.png" alt="Logo d'entreprise"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Liste des catégories</a>
                </li>
            </ul>
        </div>
        <?php
        $productCount = 0;
        if (isset($_SESSION['utilisateur'])) {
            $idUtilisateur = $_SESSION['utilisateur']['id'];
            $productCount = count($_SESSION['panier'][$idUtilisateur] ?? []); //calculer combien d'element de panier de ce utilisateur
        }
        
        function calculerRemise($prix, $discount)
        {
            return $prix - (($prix * $discount) / 100);
        }

        ?>
          
        <a class="btn float-end" href="../"><i class="fa-solid fa-screwdriver-wrench"></i> Backoffice</a>
        <!--  -->
        
        <form method="post" >
            <input type="text" name="search">
            <input type="submit" name="submit" value="chercher">

            <div id="result" class="search-results"></div>

        </form>

         
<!--  -->
        <?php
        if(!isset($_SESSION['utilisateur'])){
            ?>
        <a class="btn float-end" href="aboutAs.php">
        <i class="fa-solid fa-store" style="color: #000000;"></i> About As</a>

        <a class="btn float-end" href="connexionUser.php">
        <i class="fa-solid fa-user" style="color: #000000;"></i> Connexion</a>            
          
        <a class="btn float-end" href="registrementUser.php">
        <i class="fa-solid fa-user-plus" style="color: #000000;"></i> S'inscrire</a>  
            <?php

        }else{

            ?>
            <a class="btn float-end" href="achatsClient.php">
            <i class="fa-solid fa-money-bill" style="color: #000000;"></i> Mes achats</a>

            <a class="btn float-end" href="favorisClient.php">
            <i class="fa-solid fa-heart" style="color: #000000;"></i> Mes favoris</a>
            
            <a class="btn float-end" href="contactAs.php">
            <i class="fa-solid fa-message" style="color: #000000;"></i> Contact as</a> 

            <a class="btn float-end" href="aboutAs.php">
            <i class="fa-solid fa-store" style="color: #000000;"></i> About As</a>

            <a class="btn float-end" href="deconnexionUser.php">
            <i class="fa-sharp fa-solid fa-right-from-bracket" style="color: #000000;"></i> Deconnexion</a>

            <a class="btn float-end" href="panier.php"><i class="fa-solid fa-cart-shopping"></i> Panier
            <span style="font-size: 14px; font-family: bold; color: white; background-color: red; border-radius: 50%; padding: 5px;">
            <?php echo $productCount; ?></span>
            </a>
                
            <?php 

        }
        ?>



    </div>
</nav>