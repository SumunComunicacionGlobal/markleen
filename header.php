<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Markleen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'markleen' ); ?></a>

	<header id="masthead" class="site-header">
		<button class="btn menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/menu.svg' ); ?></button>
		<div class="site-branding">
			<?php the_custom_logo(); ?>
		</div><!-- .site-branding -->
		<?php
			$menu = 'term_2'; //the number must be the menu ID
			$field_name = get_field('menu_contact', $menu);
			echo '<a href="' . esc_url($field_name) . '" class="btn menu-contact">' . file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/mail.svg') . '</a>';
		?>
	</header><!-- #masthead -->

	<nav id="site-navigation" class="main-navigation">
		
		<div class="header-nav">
			<button class="close-menu-toggle" aria-controls="close-menu" aria-expanded="false"><?php echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/close.svg' ); ?></button>
		</div>
		<div class="site-branding">
			<?php the_custom_logo(); ?>
		</div>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'menu_id'        => 'primary-menu',
				)
			);
		?>
		<div class="footer-nav">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-main-nav')) : ?>
            <?php endif; ?>
		</div>	

	</nav><!-- #site-navigation -->
