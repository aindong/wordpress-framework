<?php
/**
 * content-link.php
 * 
 * The default file that will display content link
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
	<!-- START: ARTICLE CONTENT -->
	<div class="entry-content">
		<?php the_content( __('Continue Reading &rarr;', 'alpha') ); ?>
		
		<!-- START: DISPLAY PAGINATION -->
		<?php wp_link_pages(); ?>
	</div>
	<!-- END: ARTICLE CONTENT -->

	<!-- START: ARTICLE FOOTER -->
	<footer class="entry-footer">
		<p class="entry-meta">
			<?php
				// Display the meta information
				alpha_post_meta();
			?>
		</p>

		<?php if( is_single() && get_the_author_meta('description') ) : ?>
			<h2><?php echo __('Written by ', 'alpha') . get_the_author(); ?></h2>
			<p><?php echo the_author_meta('description'); ?></p>
		<?php else : ?>

		<?php endif; ?>
	</footer>
	<!-- END: ARTICLE FOOTER -->
</article>