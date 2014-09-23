<?php
/**
 * single.php
 *
 * The template for displaying single post
 */
?>

<?php get_header(); ?>

	<div class="main-content" role="main">
		<?php while(have_posts()) : ?>
			<?php the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php comments_template(); ?>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>

