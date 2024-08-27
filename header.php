<!DOCTYPE html>
<html lang="fr">

<head>
<?php wp_head(); ?>
</head>
<body>
    <header>
        <section class="header">
            <div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-site.png" alt="Logo de Nathalie Mota" />
            </div>
            <nav class="header-nav">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'main-menu',
                        'menu_id'        => 'main-menu',
                        'container_class' => 'main-navigation', // classe CSS pour customiser mon menu
                    ) );
                ?>
            </nav>
        </section>
    </header>