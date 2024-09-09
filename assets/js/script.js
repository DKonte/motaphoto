jQuery(document).ready(function($) {
    let pageActuelle = 1;
    /***   click sur le button charger plus   ***/
  $('#btn-charger_plus').on('click', function () {
      pageActuelle++;
      ajaxRequest(true);
  });
  /***   évenement du changement sur les filtres   ***/
  $(document).on('change', '.taxonomie', function (e) {
      e.preventDefault();
      pageActuelle = 1;
      ajaxRequest(false);
  });
      /***  la requête ajax vers le serveur wordpress pour récupérer les posts selon les critères de l'utilisateur 
     *    url: contient l'url vers /admin-ajax.php
     *    action : la fonction filtrer du fichier functions.php
     *    data: la catégorie souhaitée categorieSelection et format formatSelection et l'ordre puis la page actuelle
     *    le button charger plus permet de faire un append() rajouter des posts au post existant et les filtres permettent de faire
     *    html() afficher un nouveau contenu
     * 
      ***/

  function ajaxRequest(chargerPlus) {
    var categorieSelection = ($('#select-categorie').val() == null ) ? 'all' : $('#select-categorie').val();
    var formatSelection = ( $('#select-format').val() == null) ? 'all' : $('#select-format').val();
      var ordre = $('#select-ordre').val();
  
      $.ajax({
          type: 'POST',
          url: my_ajax_obj.ajax_url,
          dataType: 'html',
          data: {
              action: 'chargerPlus',
              categorie: categorieSelection,
              format: formatSelection,
              ordre: ordre,
              page: pageActuelle,
          },
          success: function (resultat) {
              if (chargerPlus) {
                  $('.photo_type').append(resultat);
              } else {
                  $('.photo_type').html(resultat);
              }
          },
          error: function (result) {
              console.warn(result);
          },
      });
  }

});
