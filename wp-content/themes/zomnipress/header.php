<?php

/**
 * header.php
 * 
 * The header for the theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description') ?>">
	<meta name="author" content="zomni labs">

	<!-- PLACE STYLESHEETS BELOW -->

	<?php wp_head(); ?>
</head>

<body <?php //insert method for class ?>>
	
	<!-- TODO: HEADER -->
	<!-- TODO: NAVIGATION -->