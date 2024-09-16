jQuery(document).ready(function($) {
    let pageActuelle = 1;
    /***   click sur le button charger plus   ***/
  $('#btn-charger_plus').on('click', function () {
      pageActuelle++;
      ajaxRequest(true);
  });
  /***   évenement du changement sur les filtres   ***/
  $(document).on('change', '.taxonomie', function () {
      pageActuelle = 1;
      ajaxRequest(false);
  });
      /***  la requête ajax vers le serveur wordpress pour récupérer les posts selon les critères de l'utilisateur 
     *    url: contient l'url vers /admin-ajax.php
     *    action : la fonction chargerPlus du fichier functions.php
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
    /*** Lightbox ***/

    
    var lightbox = document.getElementById('lightbox-container');
    var btnFermetureLightbox = document.getElementById('lightbox__close');
    var image = null;
    var next = null;
    var previous = null;

    /*** afficher le post selectionné ***/
    $('.full-screen').on('click', function () {
        image = $(this).parent().parent().prev();
        var urlImage = image.attr('src');
        let ref = image.attr('data-ref');
        let categorie = image.attr('data-categorie');
        afficher_lightbox(urlImage, ref, categorie);
        console.log(urlImage)
    });

    /*** afficher le post précédent ***/
    $(".lightbox__prev").click(function () {
    var nextImage = image.attr('data-next-img');
    var nextref = image.attr('data-next-ref');
    var nextcategorie = image.attr('data-next-cat');
    next = $('img[src="' + nextImage + '"].img-photo');
    if (nextImage != "null" && next.length > 0) {
        afficher_lightbox(nextImage, nextref, nextcategorie);
        image = next;
    }
    });

    /*** afficher le post suivant ***/
    $(".lightbox__next").click(function () {
    var previousImage = image.attr('data-previous-img');
    var previousref = image.attr('data-previous-ref');
    var previouscategorie = image.attr('data-previous-cat');
    previous = $('img[src="' + previousImage + '"].img-photo');
    if (previousImage != "null" && previous.length > 0) {
        afficher_lightbox(previousImage, previousref, previouscategorie);
        image = previous;
    }
    });

    /*** fonction qui permet de rajouter les informations dans les balises html du template part lightbox ***/
    function afficher_lightbox(urlImage, ref, categorie) {
        $("#lightbox__container_content").empty();
        var infos = "<div class='lightbox__infos'><p>"+ref+"</p><p>"+categorie+"</p>";
        var creerImage = '<img src="' + urlImage + '" alt="Image agrandie">';
        $('.lightbox__container_content').append(creerImage);
        $('.lightbox__container_content').append(infos);
        $("#lightbox__container_content").removeClass("hidden");
        $('.lightbox').css('display', 'block');
    }
    /*** fermer la lighbox ***/
    $(document).on('click', '.lightbox__close', function () {
        $('.lightbox').css('display', 'none');
        $("#lightbox__container_content").empty();
    });

    /*** Modal ***/
  var modale = document.getElementById('myModal');
    $('#menu-item-25, .interaction-photo__btn').click(function () {
        console.log('ok');
        $(modale).css('display', 'flex');
    });
    window.onclick = function (event) {
        if (event.target == modale) {
            $(modale).css('display', 'none');
        }
    };
    $('.interaction-photo__btn').click(function () {
        var reference = $('#reference-photo').text();
        $('#ref').val(reference);
    });

/*** flèches de navigation ***/
    navigationPhotos($('.arrow-gauche'), $('.previous-image'));
    navigationPhotos($('.arrow-droite'), $('.next-image'));

    function navigationPhotos(arrow, image) {
        arrow.hover(
            function () {
                image.css('opacity', '1');
            },
            function () {
                image.css('opacity', '0');
            }
        );
    }

/*** Menu Burger ***/
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggle');
        const navMenu = document.getElementById('nav_header');

        toggleButton.addEventListener('click', function() {
            navMenu.classList.toggle('visible'); 
        });
    });

    $('#toggle').on('click', function() {
        $('#nav_header').toggleClass('visible');
        // Toggle entre "☰" et ":signe_de_multiplication_trait_plein:"
        if ($(this).text() === "☰") {
            $(this).text(":signe_de_multiplication_trait_plein:");
        } else {
            $(this).text("☰");
        }
    });

});
