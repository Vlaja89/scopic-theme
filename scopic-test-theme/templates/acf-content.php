<?php
/*
* Template Name: ACF Flexible Content Page
*/
get_header(); ?>

<div id="wrapp">

    <?php if( have_rows('content') ):
        while ( have_rows('content') ) : the_row(); ?>

            <?php  if( get_row_layout() == 'banner_slider' ): ?>
            <!-- Big Banner -->

                <?php get_template_part('template-parts/banners/banner-slider'); ?>

            <?php endif; ?>


        <?php  endwhile; ?>
        <?php else : ?>
    <?php endif; ?>

</div>

     
<?php get_footer(); ?>