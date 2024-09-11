<?php  
get_template_part('templates-parts/lightbox');
get_template_part('templates-parts/modale');
?>
<footer class="footer">
    <nav class="footer_nav">
    <div class="footer-links">
            <a href="<?php echo esc_url( home_url( '/mentions-legales-et-politique-de-confidentialite/' ) ); ?>">Mentions légales</a>
            <a href="<?php echo esc_url( home_url( '/politique-de-confidentialite/' ) ); ?>">Vie privée</a>
            <a>Tous droits réservés.</a>
        </div>
        <div class="copyright">
        </div>
    </nav>
    <?php wp_footer(); ?>
</footer>
</body>
</html>