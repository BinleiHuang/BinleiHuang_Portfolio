<?php get_header(); ?>

<!-- Row for main content area -->
<div class="main-content">

           <div id="content" role="main">
            <h2>index.php</h2>
            <?php if ( have_posts() ) : ?>
                <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3" >
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content' ); ?>
                <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; // end have_posts() check ?>



    <!--end row-->




<!--end .main-content-->

<?php get_footer(); ?>
