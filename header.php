<!DOCTYPE html>
<html lang="fr">

<head>
<?php wp_head(); ?>
</head>
<body>
    <header>
        <section class="header">
            <div>
            <a href="<?php echo home_url( '/' ); ?>"><img class="header_logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.png" alt="Logo NMota" id="logo"></a>
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