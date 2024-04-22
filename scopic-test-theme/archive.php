<?php get_header(); ?>

<div id="wrapp">

    <!-- Blog Banner -->
    <div class="blog-banner">
        <div class="container">
            <h2><?php the_title(); ?></h2>
        </div>
    </div>
    
    <!-- Blog Content -->
    <div id="blog-content">
        <div class="container">

            <div class="row flex-wrap align-items-start justify-content-start">

                <!-- Inventory Content -->
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                    
                    <?php if(have_posts() ): ?>
                        <?php while (have_posts()): ?>
                            <?php the_post(); ?>

                                <div class="blog-single" style="background: url('<?php the_post_thumbnail_url(); ?>') no-repeat;">
                                    <div class="blog-desc">
                                        <div class="d-flex align-items-center">
                                            <div class="author">
                                                <p class="pb-0">Writen by <span><?php the_author(); ?></span></p>
                                            </div>
                                            <div class="date">
                                                <p class="pb-0"><?php echo get_the_date(); ?></p>
                                            </div>
                                        </div>
                                        <div class="post-title">
                                            <p><?php the_title(); ?></p>
                                        </div>
                                        
                                        <!-- Excerpt Content -->
                                        <p> <?php echo substr(get_the_excerpt(), 0,135)." ..." ?></p>

                                        <div class="d-flex align-itmes-center link">
                                            <a href="<?php the_permalink(); ?>">Read More</a>
                                        </div>
                                                
                                    </div>
                                </div>

                        <?php endwhile; else: ?>
                    <?php endif; ?>

                    <!-- Pagination with numbers -->
                    <div class="custom-pagination">
                        <?php
                                global $wp_query;
                                $big = 999999999; // need an unlikely integer
                                
                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $wp_query->max_num_pages
                                ) );
                            ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 side-mob-none">
                    <?php if(is_active_sidebar('blog_sidebar')): ?>
                        <?php dynamic_sidebar('blog_sidebar'); ?>
                    <?php endif; ?>
                </div>

            </div>

        </div>
    </div>
</div>
     
<?php get_footer(); ?>