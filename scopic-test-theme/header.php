<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
        <meta charset="UTF-8">
        <title><?php wp_title(''); ?></title>
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<div class="page-holder">
    <?php
        $ptype = get_post_type();
        if (is_home() || is_front_page()) {
            $topClass = 'top-menu';
        } else {
            $topClass = 'top-menu inner-menu';
        }
    ?>
    <header class="<?php echo $topClass; ?>">
        <div class="container">
            <div class="row">
                <nav>
                    <!-- Logo -->
                    <?php the_custom_logo(); ?>
                    
                        <?php
                            if (has_nav_menu('menu')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'menu',
                                    'menu_class' => 'navbar-nav justify-content-center justify-content-md-end align-items-center',
                                    'container' => 'ul'
                                ));
                            }
                        ?>
                </nav>
                
            </div>
        </div>
    </header>

        