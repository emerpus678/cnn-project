<?php
/**
 * Hero parallax image section — sky background + building + overlays.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="hero-parallax" aria-label="<?php esc_attr_e( 'Cognitive Enterprise hero imagery', 'ibm-cognitive' ); ?>">
	<div class="hero-parallax__inner">
		<img
			class="hero-parallax__sky"
			src="<?php echo ibm_cognitive_asset_url( 'images/hero/sky.jpg' ); ?>"
			alt=""
			aria-hidden="true"
		>

		<div class="hero-parallax__overlays" aria-hidden="true">
			<div class="hero-parallax__mask hero-parallax__mask--wave">
				<img
					class="hero-parallax__wave"
					src="<?php echo ibm_cognitive_asset_url( 'svg/wave.svg' ); ?>"
					alt=""
				>
			</div>

			<div class="hero-parallax__mask hero-parallax__mask--lines">
				<img
					class="hero-parallax__lines"
					src="<?php echo ibm_cognitive_asset_url( 'svg/lines.svg' ); ?>"
					alt=""
				>
			</div>
		</div>

		<img
			class="hero-parallax__building"
			src="<?php echo ibm_cognitive_asset_url( 'images/hero/building.png' ); ?>"
			alt="<?php esc_attr_e( 'Modern glass skyscraper', 'ibm-cognitive' ); ?>"
		>
	</div>
</section>
