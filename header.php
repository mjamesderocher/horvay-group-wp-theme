<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package horvay-group
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
<div id="page" class="site">
	<a class="skip-link show-on-focus" href="#content"><?php esc_html_e( 'Skip to content', 'horvay-group' ); ?></a>
	<header id="masthead" class="site-header">
		<?php horvay_group_post_thumbnail(); ?>
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			$horvay_group_description = get_bloginfo( 'description', 'display' );
			if ( $horvay_group_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $horvay_group_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->

		</div><!-- .site-branding -->
	</header><!-- #masthead -->
