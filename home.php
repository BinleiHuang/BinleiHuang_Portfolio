<?php get_header(); ?>

<div class="main-content">


<!--
<div class="row">
    <div class="small-12 columns">

        <div class="introduction">
            <h2>HOME: Hello there</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora odio eos, maxime illum expedita culpa deserunt iste error repellendus dicta nostrum minus! Voluptas in doloribus neque nemo similique adipisci molestiae.</p>
        </div>
    </div>
</div>
-->

<!-- Row for work posts -->
<div class="row">
    <div class="small-12 columns" id="content" role="main">

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

</div>
<!--end .main-content-->
<?php get_footer(); ?>
