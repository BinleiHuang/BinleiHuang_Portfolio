<?php get_header(); ?>


    <!-- Row for main content area -->
    <div id="content" role="main">

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content' ); ?>
        <?php endwhile; ?>

    </div>


<?php // Add in a sidebar. If you don't want one remove the whole row ?>


        <?php get_sidebar(); ?>


<?php get_footer(); ?>
