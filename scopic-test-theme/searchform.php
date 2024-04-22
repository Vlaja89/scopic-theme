<!-- 
    Best method for searching is to create searchform.php template and add form. 
    action="/" - search Wordpress root
    name="s" - S is default Wordpress name
    value="<?php the_search_query(); ?>" required - Wordpress function for search result and required if is search field empty.
 -->

 <form action="/" method="GET">
    <!-- <label for="search">Search</label> -->
    <!-- <input type="hidden" name="post_type" value="" /> -->
   <input type="hidden" name="cat" value=""><!-- hiden field for searching only one category and value is ID of that category -->
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search our site" required>
    <button type="submit">
        Search
        <!-- <img src="<?php echo get_theme_file_uri('./dist/img/search-yellow.svg') ?>" alt=""> -->
    </button>

</form>