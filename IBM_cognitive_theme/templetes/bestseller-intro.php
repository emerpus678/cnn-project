<?php
/**
 * Bestseller intro — first horizontal scroll panel.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="hs-panel bestseller-intro tdFadeInUp" aria-labelledby="bestseller-intro-heading">
	<div class="text">
		<div class="outer">
			<p class="content" id="bestseller-intro-heading">
				<?php esc_html_e( 'Indian-based fashion company Bestseller wanted to predict the right merchandise for their customers at the right time, because they knew their customers\' tastes varied "every few kilometres".', 'ibm-cognitive' ); ?>
			</p>
		</div>
		<div class="right-side">
			<div class="inner">
				<img src="<?php echo esc_url( ibm_cognitive_asset_url( 'images/img5.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Fashion store with clothing racks', 'ibm-cognitive' ); ?>" loading="lazy">
				<img src="<?php echo esc_url( ibm_cognitive_asset_url( 'svg/img4-lines.svg' ) ); ?>" alt="" class="svg-overlay" aria-hidden="true">
				<img src="<?php echo esc_url( ibm_cognitive_asset_url( 'svg/arrow.svg' ) ); ?>" alt="" class="svg-arrow" aria-hidden="true">
			</div>
		</div>
	</div>
</section>
