<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- DISPLAYS TEXT FROM CUSTOM TEXT FIELD + FUNCTION -->
<?php 
	$options = get_option('plugin_options');
		echo 
		"<div id='custom_header'>
		<span id='custom'>". $options['banner_heading'] ."</span>

		<script>
				var text = document.getElementById('custom');
				text.onclick = changeColor;
				function changeColor(){
					var randomColor = '#'+ ('000000' + Math.floor(Math.random()*16777215).toString(16)).slice(-6);
					text.style.color = randomColor;
					console.log('The color of the header was changed into ' + randomColor);
				}		
		</script>
		</div>
		";
	?>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>
	
	<?php get_template_part( 'template-parts/header/site-header' ); ?>
	
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				
			