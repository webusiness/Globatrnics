<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $product;
?>
<div id="c-productos">
	<?php
		/**
		 * woocommerce_before_single_product hook
		 *
		 * @hooked woocommerce_show_messages - 10
		 */
		 do_action( 'woocommerce_before_single_product' );
	?>

		<?php do_action( 'woocommerce_product_meta_start' ); ?>

		<h1>Productos</h1>

		<?php do_action( 'woocommerce_product_meta_end' ); ?>



	<div id="c-pres-prod">
		<div id="desc-prod">
			<h2><?php the_title(); ?></h2>
			<div id="c-desc-prod">
				<?php
					/**
					 * woocommerce_after_single_product_summary hook
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_output_related_products - 20
					 */
					do_action( 'woocommerce_after_single_product_summary' );
				?>



				<?php
						/**
						 * woocommerce_single_product_summary hook
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 */
						do_action( 'woocommerce_single_product_summary' );
					?>
			</div>
		</div>
			<div class="desc-img">
				<div id="social">
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style ">
						<a class="addthis_button_preferred_1"></a>
						<a class="addthis_button_preferred_2"></a>
						<a class="addthis_button_preferred_3"></a>
						<a class="addthis_button_preferred_4"></a>
						<a class="addthis_button_compact"></a>
					</div>
					<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5075b5342bd7066a"></script>
					<!-- AddThis Button END -->
				</div>

				<!-- Imagen thumbnail para facebook -->
				<!-- ocultamos la imagen en css con un "display:none" o  "whidth:0  heigth:0 "  -->
				<div id="imagensize"><?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
					$image = aq_resize( $img_url, 200, 200, true ); //resize & crop img
					?>
					<img src="<?php echo $image ?>" />
				</div>
				<!-- Imagen thumbnail para facebook -->

				<?php if(has_post_thumbnail()) { ?>
					<?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'thumbnail'); //get img URL
					$image = aq_resize( $img_url, true ); //resize & crop img
					?>
					<img src="<?php echo $image ?>" width="360px" />
				<?php } ?>
			</div>
			<div class="clearfix"></div>

	</div>

<h3>Productos</h3>

<div id="slider">
	<div id="ca-container" class="ca-container"><div class="ca-nav"><span class="ca-nav-prev">Previous</span><span class="ca-nav-next">Next</span></div>
		<div class="ca-wrapper" style="overflow: hidden;">
			<?php $args = array( 'post_type' => 'product', 'posts_per_page' => -1 ); ?>
    <?php $loop = new WP_Query( $args ); ?>

    <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
        <div class="ca-item" style="position: absolute; left: 0px;">
				<div class="ca-item-main">
					<a href="<?php the_permalink(); ?>" style="text-decoration:none;">
						<div style="height:85px;"><?php the_post_thumbnail( array(80,80) ); ?></div>
					<h5><?php the_title(); ?></h5></a>
				</div>
			</div>
    <?php endwhile; ?>



		</div>
	</div>
</div>

</div>
