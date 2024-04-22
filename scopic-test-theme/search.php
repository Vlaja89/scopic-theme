<?php get_header(); ?>
<div id="wrapp">

    <!-- Search Banner --> 
    <div id="search-banner">
        <div class="container">
            <div class="content">
                <h2>Search Results for </br> <span style="color: #FFCB05;">'<?php the_search_query(); ?>'</span></h2>
            </div>
        </div>
    </div>
    
    <!-- Search Content -->
    <div id="search-content">
        <div class="container">
            <div class="row flex-wrap align-items-center justify-content-center">

                <?php if(have_posts() ): ?>
                    <?php while (have_posts()): ?>
                    <?php the_post(); ?>

                    <!-- Custom Post Search -->
                    <?php 
                         if ( 'POST NAME' == get_post_type() ){
                    ?> 
                        

                    <?php
                        } elseif ( 'POST NAME' == get_post_type()){
                    ?> 


                    <?php
                        } else{
                            //code for anything else
                        } 
                    ?>


                <?php endwhile; else: ?>

                <!-- If there no have search results display this message. Before adding this, you must create a new template in includes folder (section-searchresults.php). Copy and past whole code from Acrhive template and change the root  -->
                <div class="no-search">
                    <h4><strong>There are no search results for </br> <span style="color: #ff0000;">'<?php the_search_query(); ?>'</span></strong></h4>
                </div>
                        
                <?php endif; ?>

            </div>

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
    </div>
</div>

     
<?php get_footer(); ?>

                           
