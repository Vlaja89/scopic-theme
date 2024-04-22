<?php
/**
 * The template for displaying 404 pages (not found)
  */
get_header();
?>
<section class="inner-hero" style="padding: 20vh 0 10vh; min-height: 100vh">
    <div class="container">
        <div class="row">
            <div class="error-404 not-found col-12 d-flex flex-column justify-content-center align-items-center text-center"  style="min-height: calc(100vh - 400px)">
                <h2><?php _e('Oops! That page can&rsquo;t be found.', 'glion'); ?></h2>
                <div class="row justify-content-center flex-row w-100">
                    <div class="col-md-6 text-center text-white">
                        <button type="button" class="red-custom-btn" onclick="location.href='<?php echo get_home_url(); ?>';" class="custom-btn">Go To Home Page</button>
                    </div><!-- .page-content -->
                </div><!-- .page-content -->
            </div><!-- .error-404 -->
        </div>
    </div>
</section>
<?php get_footer(); ?>
 