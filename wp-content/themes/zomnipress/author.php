<?php 
/**
 * author.php
 *
 * The template for displaying author archives pages
 */
 ?>

<?php get_header(); ?>

<!-- START: MAIN CONTENT-->
<div class="main-content" role="main">
	<?php if( have_posts() ) : the_post(); ?>
		<header class="page-header">
			<h1>
				<?php printf( __('All posts by %s.', 'alpha'), get_the_author() ); ?>
			</h1>

			<?php if( get_the_author_meta('description') ) : ?>
				<p><?php the_author_meta('description'); ?></p>
			<?php endif; ?>

			<?php rewind_posts(); ?>
		</header>

		<?php while(have_posts()) : the_post(); ?>
			<?php get_template_part('content', get_post_format()); ?>
		<?php endwhile; ?>

		<?php alpha_paging_nav(); ?>

	<?php else : ?>
		<?php get_template_part('content', 'none') ?>
	<?php endif; ?>
</div>
<!-- END: MAIN CONTENT-->

<?php get_footer(); ?>