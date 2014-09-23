<?php
/**
 * index.php
 *
 */
?>

<?php get_header(); ?>

<!-- START: MAIN CONTENT -->
<div class="main-content" role="main">
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ) ?>
	<?php endwhile; ?>
	
	<?php alpha_paging_nav(); ?>

	<?php else : ?>
		<?php get_template_part( 'content', 'none' ) ?>
	<?php endif; ?>
</div>
<!-- END: MAIN CONTENT -->

<?php get_footer(); ?>