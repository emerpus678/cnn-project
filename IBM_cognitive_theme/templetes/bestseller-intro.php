<?php
/**
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="hs-panel bestseller-intro tdFadeInUp" aria-labelledby="bestseller-intro-heading">
	<div class="product1">
		<div class="left-side">
			<p id="bestseller-intro-heading">
				<?php esc_html_e( 'Indian-based fashion company Bestseller wanted to predict the right merchandise for their customers at the right time, because they knew their customers\' tastes varied "every few kilometres".', 'ibm-cognitive' ); ?>
			</p>
		</div>
		<div class="right-side">
			<div class="inner">
				<img
					src="<?php echo ibm_cognitive_asset_url( 'images/img5.jpg' ); ?>"
					alt="<?php esc_attr_e( 'Fashion store with clothing racks', 'ibm-cognitive' ); ?>"
					loading="lazy"
				>
				<img
					class="svg-overlay"
					src="<?php echo ibm_cognitive_asset_url( 'svg/img4-lines.svg' ); ?>"
					alt=""
					aria-hidden="true"
				>
				<img
					class="svg-arrow"
					src="<?php echo ibm_cognitive_asset_url( 'svg/arrow.svg' ); ?>"
					alt=""
					aria-hidden="true"
				>
			</div>
		</div>
	</div>
</section>
