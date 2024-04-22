<?php get_header(); ?>

<div id="wrapp">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="title">
                <?php
                    // New Title
                    $new_title = 'Scopic Rocks!!!'; 

                    // Default Title
                    $original_title = get_the_title(); 

                    // If New title is empty, disaply default title
                    $display_title = !empty($new_title) ? $new_title : $original_title;
                ?>
                <h1><?php echo apply_filters('the_title', $display_title); ?></h1>
            </div>

            <?php the_content(); ?>

        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
