<?php
/**
 * Goldcorp quote — third horizontal scroll panel.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="hs-panel goldcorp-last tdFadeInUp" aria-labelledby="goldcorp-last-heading">
	<div class="goldcorp-last__layout">
		<div class="goldcorp-last__media">
			<div class="goldcorp-last__inner">
				<img
					class="goldcorp-last__photo"
					src="<?php echo esc_url( ibm_cognitive_asset_url( 'images/image copy.png' ) ); ?>"
					alt="<?php esc_attr_e( 'Mining trucks in an open-pit gold mine', 'ibm-cognitive' ); ?>"
					loading="lazy"
				>
				<img
					class="goldcorp-last__overlay"
					src="<?php echo esc_url( ibm_cognitive_asset_url( 'svg/img4-lines.svg' ) ); ?>"
					alt=""
					aria-hidden="true"
				>
			</div>
		</div>

		<blockquote class="goldcorp-last__quote">
			<span class="goldcorp-last__mark" aria-hidden="true">“</span>
			<p class="goldcorp-last__text" id="goldcorp-last-heading">
				<?php esc_html_e( 'The potential to radically accelerate exploration target identification combined with significantly improved hit rates on economic monetization can drive a step-change in the pace of value growth in the industry.', 'ibm-cognitive' ); ?>
			</p>
			<cite class="goldcorp-last__cite">
				<?php esc_html_e( '— Todd White, Executive Vice President, Goldcorp', 'ibm-cognitive' ); ?>
			</cite>
		</blockquote>
	</div>
</section>
