<?php
/**
 * content-quote.php
 * 
 * The default file that will display content quote
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
	</footer>
	<!-- END: ARTICLE FOOTER -->
</article>