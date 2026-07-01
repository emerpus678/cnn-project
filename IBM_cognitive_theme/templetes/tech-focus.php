<?php
/**
 * Tech focus section — parallax laptop background + running line.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="tech-focus tdFadeInUp" aria-labelledby="tech-focus-heading">
	<div class="tech-focus__media" aria-hidden="true">
		<img
			class="tech-focus__bg"
			src="<?php echo ibm_cognitive_asset_url( 'images/tech-focus/laptop.jpg' ); ?>"
			alt=""
			loading="lazy"
			decoding="async"
		>
	</div>

	<div class="tech-focus__shade" aria-hidden="true"></div>

	<div class="tech-focus__inner">
		<div class="tech-focus__content-box">
			<div class="tech-focus__content">
				<h2 class="tech-focus__heading" id="tech-focus-heading">
					<?php esc_html_e( 'Deep Blue may have been one of the first public and most vivid examples of how a computer\'s power can enhance human capability.', 'ibm-cognitive' ); ?>
				</h2>
				<p class="tech-focus__body">
					<?php esc_html_e( 'And more than two decades on, it\'s clear for all to see that chips, computers, and their possibilities have improved exponentially. Combine a computer\'s power with the convergence of technological, social and regulatory forces, and a new world is formed; one which we are only just beginning to crack the surface of.', 'ibm-cognitive' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>
