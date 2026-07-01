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
			<div class="hero-parallax__mask hero-parallax__mask--wave hero-parallax__mask--left">
				<img
					class="hero-parallax__wave"
					src="<?php echo ibm_cognitive_asset_url( 'svg/wave.svg' ); ?>"
					alt=""
					aria-hidden="true"
					decoding="async"
				>
			</div>
			<div class="hero-parallax__mask hero-parallax__mask--wave hero-parallax__mask--right" data-scroll-mask="wave">
				<img
					class="hero-parallax__wave"
					src="<?php echo ibm_cognitive_asset_url( 'svg/wave.svg' ); ?>"
					alt=""
					aria-hidden="true"
					decoding="async"
				>
			</div>

			<div class="hero-parallax__mask hero-parallax__mask--lines hero-parallax__mask--left">
				<img
					class="hero-parallax__lines"
					src="<?php echo ibm_cognitive_asset_url( 'svg/lines.svg' ); ?>"
					alt=""
					aria-hidden="true"
					decoding="async"
				>
			</div>
			<div class="hero-parallax__mask hero-parallax__mask--lines hero-parallax__mask--right" data-scroll-mask="lines">
				<img
					class="hero-parallax__lines"
					src="<?php echo ibm_cognitive_asset_url( 'svg/lines.svg' ); ?>"
					alt=""
					aria-hidden="true"
					decoding="async"
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
