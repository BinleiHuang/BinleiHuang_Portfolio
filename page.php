<?php get_header(); ?>

<div class="main-content">
    <!-- Row for main content area -->
    <div class="row">


                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content','page' ); ?>
                <?php endwhile; ?>


      </div>
    <!--end main content row-->




</div>
<!--end .main-content-->

<?php get_footer(); ?>
