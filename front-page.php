<?php get_header(); ?>

<div class="row">
    <!-- Row for main content area -->
    <div class="small-12 columns" id="content" role="main">

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content' ); ?>
        <?php endwhile; ?>

    </div>
</div>



<?php get_footer(); ?>
