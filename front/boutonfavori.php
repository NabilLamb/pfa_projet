

<button type="button" class="boutonfavori" 
onclick="submitForm(this, <?php echo $idUtilisateur; ?>, <?php echo $idProduit; ?>)"><i class="far fa-heart"></i></button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function submitForm(button, idUtilisateur, idProduit) {
  var formData = {
    idUtilisateur: idUtilisateur,
    idProduit: idProduit
  };

  $.ajax({
    type: 'POST',
    url: 'traitement_formulaire.php',
    data: formData,
    success: function(response) {
      console.log(response);
      var heartIcon = button.querySelector('i');
      
      if (button.classList.contains('clicked')) {
        button.classList.remove('clicked');
        heartIcon.classList.remove('fas');
        heartIcon.classList.add('far');
      } else {
        button.classList.add('clicked');
        heartIcon.classList.remove('far');
        heartIcon.classList.add('fas');
      }
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
}
</script>

