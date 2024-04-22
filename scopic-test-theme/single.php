<?php get_header(); ?>

<div id="wrapp">

    <!-- Blog Banner -->
    <div id="blog-banner" class="small-banner" style="background: url('<?php the_field('blog_banner_image', 178); ?>');">
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
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <div class="single-blog-desc">
                                    <div class="single-blog-img">
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title();?>" class="img-fluid mb-3">
                                    </div>
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
                                    <div class="post-content">
                                        <?php the_content(); ?>
                                    </div>
 
                                    <!-- Category Name -->
                                    <div class="category-name">
                                        <?php 
                                            foreach(get_the_category() as $category)
                                            {
                                                echo '<a href="'.get_category_link($category->cat_ID).'"><p>'.$category->cat_name.'</p></a>';
                                            }
                                        ?>
                                    </div>

                                </div>

                                <!-- Dispay Comments -->
                                <?php comments_template(); ?>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                    <!-- Sidebar -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 side-mob-none">
                        <?php if(is_active_sidebar('blog_sidebar')): ?>
                            <?php dynamic_sidebar('blog_sidebar'); ?>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Side Block Mob -->
                    <div class="side-mob-block filer-mob-side">

                        <fieldset>
                            <div>
                                <button class="sides-menu-toggle fix-btn" data-sides-menu-target="left-menu">Info</button>
                            </div>
                        </fieldset>

                        <div class="sides-menu-nav" id="left-menu">
                            <div class="sides-menu-nav-content">
                                <div class="text-right">
                                    <button class="sides-menu-close custom-btn" data-sides-menu-target="left-menu">Close Info</button>
                                </div>
                                <?php if(is_active_sidebar('blog_sidebar')): ?>
                                    <?php dynamic_sidebar('blog_sidebar'); ?>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

            </div>

        </div>
    </div>
    
</div>
     
<?php get_footer(); ?>