<?php
/**
 * Goldcorp intro — first horizontal scroll panel.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="hs-panel goldcorp-first tdFadeInUp" aria-labelledby="goldcorp-first-heading">
	<div class="text">
		<div class="outer">
			<p class="content" id="goldcorp-first-heading">
				<?php esc_html_e( 'Among the forward-thinking firms that have decided to fully explore what the cognitive enterprise has to offer is Goldcorp.', 'ibm-cognitive' ); ?>
			</p>
		</div>
		<div class="right-side">
			<div class="inner">
				<img src="<?php echo esc_url( ibm_cognitive_asset_url( 'images/image.png' ) ); ?>" alt="<?php esc_attr_e( 'Fashion store with clothing racks', 'ibm-cognitive' ); ?>" loading="lazy">
				<img src="<?php echo esc_url( ibm_cognitive_asset_url( 'svg/img4-lines.svg' ) ); ?>" alt="" class="svg-overlay" aria-hidden="true">
				<img src="<?php echo esc_url( ibm_cognitive_asset_url( 'svg/arrow.svg' ) ); ?>" alt="" class="svg-arrow" aria-hidden="true">
			</div>
		</div>
	</div>
</section>
