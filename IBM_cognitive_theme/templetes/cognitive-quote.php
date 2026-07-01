<?php
/**
 * Cognitive enterprise quote — Rick Davidson.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="cognitive-quote tdFadeInUp" aria-labelledby="cognitive-quote-heading">
	<div class="cognitive-quote__inner">
		<div class="cognitive-quote__line-wrap" aria-hidden="true">
			<img
				class="cognitive-quote__line"
				src="<?php echo ibm_cognitive_asset_url( 'svg/line3.svg' ); ?>"
				alt=""
				loading="lazy"
			>
		</div>

		<div class="cognitive-quote__content-box">
			<div class="cognitive-quote__content">
				<p class="cognitive-quote__lead" id="cognitive-quote-heading">
					<?php esc_html_e( 'As AI and automation combine with blockchain and 5G, they\'re creating opportunities for businesses that early adopters are seeing massive results from. Rick Davidson, the founder and CEO at US-based consultancy Cimphoni, is among the people who call this \'the cognitive enterprise\'.', 'ibm-cognitive' ); ?>
				</p>

				<span class="cognitive-quote__mark" aria-hidden="true">&ldquo;</span>

				<blockquote class="cognitive-quote__quote">
					<p>
						<?php esc_html_e( 'Technology systems that can understand, learn and even reason will be able to meet customer expectations before customers know they have an expectation that needs to be met.', 'ibm-cognitive' ); ?>
					</p>
				</blockquote>

				<cite class="cognitive-quote__cite">
					<?php esc_html_e( '— Rick Davidson, Founder and CEO, Cimphoni', 'ibm-cognitive' ); ?>
				</cite>
			</div>
		</div>
	</div>
</section>
