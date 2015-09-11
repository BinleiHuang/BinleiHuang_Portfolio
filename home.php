<?php get_header(); ?>

<div class="main-content">




<!-- Row for work posts -->

    <div id="content" role="main">

        <?php if ( have_posts() ) : ?>
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'list' ); ?>
            <?php endwhile; ?>
        </ul>
        <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; // end have_posts() check ?>


    </div>


</div>
<!--end .main-content-->
<?php get_footer(); ?>
