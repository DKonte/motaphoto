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
                    wp_nav_menu([
                        'theme_location' => 'main-menu',
                    ]);
                ?>
                <ul>
                </ul>
            </nav>
        </section>
    </header>