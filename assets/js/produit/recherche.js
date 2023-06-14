$(document).ready(function() {
    $('input[name="search"]').keyup(function() {
      var search = $(this).val();
      if (search !== '') {
        $.ajax({
          url: 'search.php',
          method: 'POST',
          data: { query: search },
          success: function(response) {
            $('#result').html(response);
            $('#result').show(); // Afficher la liste de résultats
          }
        });
      } else {
        $('#result').empty(); // Vider la liste de résultats si la recherche est vide
        $('#result').hide(); // Cacher la liste de résultats
      }
    });
  
    $(document).on('click', '.product', function() {
      var productName = $(this).text();
      $('input[name="search"]').val(productName);
      $('input[name="submit"]').click();
      $('#result').empty(); // Vider la liste de résultats
      $('#result').hide(); // Cacher la liste de résultats
    });
  
    // Cacher la liste de résultats lorsqu'on clique en dehors de celle-ci ou sur le bouton de soumission (submit)
    $(document).on('click', function(e) {
      if (!$(e.target).closest('#result').length && !$(e.target).is('input[name="search"]') && !$(e.target).is('input[name="submit"]')) {
        $('#result').empty(); // Vider la liste de résultats
        $('#result').hide(); // Cacher la liste de résultats
      }
    });
  });
  