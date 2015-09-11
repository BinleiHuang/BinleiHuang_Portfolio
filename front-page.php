<?php get_header(); ?>


    <div id="content" role="main">

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content' ); ?>
        <?php endwhile; ?>

    </div>




<?php get_footer(); ?>
