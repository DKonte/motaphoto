<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <section class="header">
            <div>
            <a href="<?php echo home_url( '/' ); ?>"><img class="header_logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.png" alt="Logo NMota" id="logo"></a>
            </div>
            <span id="toggle" class="menu-toggle">☰</span>
            <nav class="header-nav" id="nav_header">
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
    <main>