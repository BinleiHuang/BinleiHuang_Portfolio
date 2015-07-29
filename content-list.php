<?php
/**
 * The template for displaying items in a list. This assumes you have already started a foundation block-grid ul element see home.php for an example
 *
 */
?>
<li id="post-<?php the_ID(); ?>" <?php post_class('post-list large-4 medium-4 columns'); ?> >

    <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('feature-home'); } ?></a>




	<div class="item-info">
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
<!--		<?php the_excerpt(); ?>-->
	</div>
</li>
