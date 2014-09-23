<?php

/**
 * functions.php
 *
 * The theme's functions and definitions
 *
 */

/**
 * -------------------------------------------------------------------------------------------------------------------
 * 1.0 - Define Contants.
 * -------------------------------------------------------------------------------------------------------------------
 */

define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/assets/images');
define( 'SCRIPTS', THEMEROOT . '/assets/js');
define( 'FRAMEWORK', get_template_directory() . '/framework' );

/**
 * -------------------------------------------------------------------------------------------------------------------
 * 2.0 - Load the framework
 * -------------------------------------------------------------------------------------------------------------------
 */

require_once( FRAMEWORK . '/init.php' );

/**
 * -------------------------------------------------------------------------------------------------------------------
 * 3.0 Set up the content width value base on the theme design.
 * -------------------------------------------------------------------------------------------------------------------
 */

if( !isset($content_width) ) {
	$content_width = 800;
}

/**
 * -------------------------------------------------------------------------------------------------------------------
 * 4.0 Set up the theme default and register various supported features.
 * -------------------------------------------------------------------------------------------------------------------
 */

if( !function_exists( 'alpha_setup' ) ) {
	function alpha_setup() {
		/**
		 * Make the theme available for translation
		 */
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'alpha', $lang_dir );

		/**
		 * Add support for post formats
		 */
		add_theme_support( 'post-formats', 
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			)
		);

		/**
		 * Add support for automatic feed links
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add support for post thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for woocommerce
		 */
		add_theme_support( 'woocommerce' );

		/**
		 * Register nav menu
		 */
		register_nav_menus();
	}

	add_action( 'after_theme_setup', 'alpha_setup' );
}

/**
 * -------------------------------------------------------------------------------------------------------------------
 * 5.0 - Display meta information for a specific post
 * -------------------------------------------------------------------------------------------------------------------
 */

if( !function_exists('alpha_post_meta') ) {
	function alpha_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if( get_post_type() === 'post' ) {
			// if the post is sticky, mark it
			if( is_sticky() ) {
				echo '<li class="meta-featured-post"><i></i>' . __( 'Sticky', 'alpha' ) .'</li>';
			}

			// Get the post author
			printf(
				'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta('ID') ) ),
				get_the_author()
			);

			// Get the post date
			echo '<li class="meta-date">' . get_the_date() . '</li>';

			// Get the categories
			$category_list = get_the_category_list( ', ');
			if( $category_list ) {
				echo '<li class="meta-categories">' . $category_list . '</li>';
			}

			// Get the tags
			$tag_list = get_the_tag_list( '', ', ');
			if( $tag_list ) {
				echo '<li class="meta-tags">' . $tag_list . '</li>';
			}

			// Comments link
			if( comments_open() ) {
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( __('Leave a comment', 'alpha'), __('One comment so far', 'alpha'), __('View all % comments', 'alpha') );
				echo '</span>';
				echo '</li>';
			}

			// Edit link
			if( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( __('Edit', 'alpha'), '<span class="meta-edit"></span>' );
				echo '</li>';
			}
			
		}
	}
}

/**
 * -------------------------------------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of post
 * -------------------------------------------------------------------------------------------------------------------
 */

if( !function_exists('alpha_paging_nav') ) {
	function alpha_paging_nav() {
		echo '<ul>';
		if( get_previous_posts_link() ) {
			echo '<li class="next">' . previous_posts_link( __('New Posts  &rarr;', 'alpha') ) . '</li>';
		}

		if( get_next_posts_link() ) {
			echo '<li class="previous">' . next_posts_link( __('&larr; Older Posts', 'alpha') ) . '</li>';
		}
		echo '</ul>';
	}
}


/**
 * -------------------------------------------------------------------------------------------------------------------
 * 7.0 - Include the master css file in the header
 * -------------------------------------------------------------------------------------------------------------------
 */

if(!function_exists( 'alpha_load_wp_head' ) ) {
	function alpha_load_wp_head() {
		// Get the 
	}

	add_action( 'wp_head', 'alpha_load_wp_head' );
}

/**
 * -------------------------------------------------------------------------------------------------------------------
 * 8.0 - Load the custom scripts for the theme
 * -------------------------------------------------------------------------------------------------------------------
 */

if(!function_exists( 'alpha_scripts' ) ) {
	function alpha_scripts() {
		// Add support for pages with threaded comments
		if( is_singular() && comments_open() && get_option('thread_comments') ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// register scripts here
		wp_register_script( 'alpha-custom-js', THEMEROOT . '/assets/js/script.js', array('jquery'), false, true );

		// load the scripts
		wp_enqueue_script( 'alpha-custom-js' );

		// load the stylesheets
		wp_enqueue_style( 'master-css', THEMEROOT . '/assets/css/master.css');
	}

	add_action( 'wp_enqueue_scripts', 'alpha_scripts' );
}