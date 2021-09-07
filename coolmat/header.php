<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coolmat
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- retrieve custom css file
	bloginfo('template_url') prints this http://localhost:8888/wp-content/themes/coolmat/coolmat -->
	<!-- <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/custom.css"> -->

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coolmat' ); ?></a>

	<!-- outer element for full page width -->
	<header id="masthead" class="site-header">

		<!-- inner element 1380px -->
		<div class="header-inner inner-container">

			<div class="site-branding">
				<!-- header logo -->
				<img src="<?php bloginfo('template_url'); ?>/assets/coolmat_logo.svg" class="logo">
			</div>

			<nav id="site-navigation" class="main-navigation">
				<!-- <?php wp_nav_menu( array( 'theme_location' => 'new-menu' ) ); ?> -->
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav>
			
			<!-- todo: make this work -->
			<div class="language-select">
				<a lang="ko-KR" hreflang="ko-KR" href="<?php echo site_url('/kr'); ?>">KR</a>
				 | 
				<a lang="en-GB" hreflang="en-GB" href="<?php echo site_url(); ?>">EN</a>
			</div>
		</div>

	</header><!-- #masthead -->
