<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<?php while ( have_posts() ) : the_post(); ?> <!--El post ínicia aquí para poder tomar el thumbnail, el content y el permalink-->
<!doctype html> <!--El header queda aquí para poder tener los meta data de facebook-->
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>Globatronics</title>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/site.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/menu.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquery.jscrollpane.css" media="all" />
	<link href="<?php bloginfo('template_directory'); ?>/css/menu-lat.css" rel="stylesheet" type="text/css">
	<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/accordionmenu.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js" type="text/javascript"></script>

	<?php
	$thumb = get_post_thumbnail_id();
	$img_url = wp_get_attachment_url( $thumb,'full' );
	?>


	<!--Estos son los metadatas para facebook-->
	<meta property="og:title" content="<?php the_title(); ?>" />
	<meta property="og:image" content="<?php echo $img_url ?>" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:description" content="<?php the_content(); ?>" />
	<!--Estos son los metadatas para facebook-->

</head>
<body>

	<div id="contenedor" class="clearfix">
		<div id="ruta">
			<div class="rutas-home">
				<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/home.png"></a>
			</div>
				<?php
					/**
					 * woocommerce_before_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action('woocommerce_before_main_content');
				?>
		</div>
	<div id="c-info" class="clearfix">

		<div id="sidebar">
			<nav>
			    <div id="acdnmenu" style="width: 138px; height: 390px; border: none;">
        			<?php wp_nav_menu( array( 'container' => 'top', 'fallback_cb' => 'starkers_menu', 'theme_location' => 'productos' ) ); ?>
			    </div>
			</nav>
		</div>



			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>



	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
	?>
	<?php endwhile; // end of the loop. ?>
<?php get_footer('shop'); ?>

