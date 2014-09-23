<?php
/**
 * page.php
 *
 * The template for displaying all pages
 */
?>

<?php get_header(); ?>

	<div class="main-content" role="main">
		<?php while(have_posts()) : ?>
			<?php the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
				<!-- START: ENTRY HEADER -->
				<header class="entry-header">
					<!-- FOR SHOWING THUMBNAILS -->
					<?php if( has_post_thumbnail() && !post_password_required() ) : ?>
						<figure class="entry-thumbnail">
							<?php the_post_thumbnail() ?>
						</figure>
					<?php endif; ?>

					<!-- TITLE FOR THE POST -->
					<h1><?php the_title(); ?></h1>

				</header>
				<!-- END: ENTRY HEADER -->

				<!-- START: ARTICLE CONTENT -->
				<div class="entry-content">
					<?php the_content(); ?>

					<?php wp_link_pages(); ?>
				</div>
				<!-- END: ARTICLE CONTENT -->

				<!-- START: ARTICLE FOOTER -->
				<footer class="entry-footer">
					<?php
						// Edit link
						if( is_user_logged_in() ) {
							echo '<p>';
							edit_post_link( __('Edit', 'alpha'), '<span class="meta-edit"></span>' );
							echo '</p>';
						}
					?>
				</footer>
				<!-- END: ARTICLE FOOTER -->
			</article>

			<?php comments_template(); ?>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>

