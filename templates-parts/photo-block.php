<!--boucle WP en cours pour afficher chaque photo de la liste-->
<?php $photos->the_post();

global $post;
$current_post = $post;

?>
  <!--conteneur divisé en 2 parties-->
  

  <div class="half">
  <!--conteneur principal de chaque photo-->
      <div class="post_photo">
          <!--cette ligne affiche l'image mise en avant de l'article actuel en utilisant la fonction "the_post_thumbnail_url()"-->
          <img 
           data-ref="<?php echo get_field('reference'); ?>"
           data-categorie="<?php echo strip_tags(get_the_term_list($photos->ID, 'categorie')); ?>"
           class="img-photo" src="<?php echo the_post_thumbnail_url(); ?>" />
          <div>
              <div class="photo-hover">
                <!--cette ligne affiche une icône pour passer en mode plein écran-->
                  <img class="full-screen" src="<?php echo get_template_directory_uri(); ?>/assets/images/fullscreen.png" alt="Icône de plein écran" />
                  <!--lien hypertexte qui enveloppe l'icône et qui pointe vers la page individuelle de chaque photo-->
                  <a href="<?php echo get_post_permalink(); ?>">
                  <!--l'icône de l'oeil également enroulé dans le lien hypertexte-->
                      <img class="oeil" src="<?php echo get_template_directory_uri(); ?>/assets/images/eye_icon.png" alt="Icône en fome d'oeil" />
                  </a>
                  <div class="photo-infos">
                      <p><?php the_title(); ?></p>
                      <!--termes de la taxonomie 'categorie' associés à la photo actuelle-->
                      <!--utile pour afficher des catégories ou des étiquettes associées à chaque photo-->
                      <p><?php echo strip_tags(get_the_term_list($photos->ID, 'categorie')); ?></p>
                  </div>
              </div>
          </div>
      </div>
  </div> 