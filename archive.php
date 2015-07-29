<?php get_header(); ?>

<div id="archive" class="main-content">


<div class="row">
    <div class="small-12 columns">

        <?php //run the wordpress loop
        if (have_posts()) : //Set the title for the page the_post(); ?>
            <h2 class="page-title">
                        <?php
                        //get queried object in case it's needed
                        $queried_object = get_queried_object();
                        if ( is_day() ) {
                            echo 'Archive for ' . get_the_date();
                        } elseif ( is_month() ) {
                            echo 'Archive for ' . get_the_date('F Y');
                        } elseif ( is_year() ) {
                            echo 'Archive for ' . get_the_date('Y');
                        } elseif ( is_tag() ) {
                            echo 'Posts Tagged with ' . $queried_object->name ;
                        } elseif ( is_category() ) {
                            echo $queried_object->name ;//just echo out the category name
                        }elseif($queried_object->user_login){
                            echo 'Posts by ' . $queried_object->user_nicename ;
                        }
                        ?>
            </h2>

            <?php //add in category description ?>
            <p class="category-description">
                <?php
						 if( is_category()){
						 	//echo '<p>' . $queried_object->description . '</p>';
						 	//trying something else instead
						 	echo category_description();
						}

  						//print_r(get_queried_object());
                ?>
            </p>
    </div>
<!--    end smal-12 that contains archive title-->


    <div class="small-12 columns" id="content">
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
            <?php //Now show the posts

                //this gets ready for the loop
                rewind_posts();
                while (have_posts()) : the_post();
                    //the_content('Read the rest of this entry »');
                    get_template_part('content','list'); //look for a file named content.php
                endwhile;
            ?>
        </ul>
    </div>

        <?php else:  //there are no posts?>
           <div class="small-12 columns" id="content">
                <!-- No posts were found for the archive. -->
                <div class="nocontent">
                    <h2>No Posts Found</h2>
                    <p>It looks like there are no posts for this archive.</p>
            </div>
            </div>
        <?php endif; ?>

    </div>
    <!-- end row for main posts -->

</div>
<!--end #archive .main-content-->


<div class="row">
    <div class="small-12 columns">
        <?php get_sidebar(); ?>
    </div>
</div>

</div>
<!--end #archive-->

<?php get_footer(); ?>
