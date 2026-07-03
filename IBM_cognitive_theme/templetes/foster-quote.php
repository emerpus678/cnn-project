<?php
/**
 * Mark Foster quote — digital reinvention.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="foster-quote" aria-labelledby="foster-quote-heading">
	<div class="foster-quote__line-wrap" data-scroll-mask aria-hidden="true">
		<div class="foster-quote__line-crop">
			<img
				class="foster-quote__line"
				src="<?php echo ibm_cognitive_asset_url( 'svg/line3.svg' ); ?>"
				alt=""
				decoding="async"
			>
		</div>
		<span class="foster-quote__line-ext" aria-hidden="true"></span>
		<span class="foster-quote__line-dot" aria-hidden="true"></span>
	</div>

	<div class="foster-quote__container">
		<p class="foster-quote__body">
			<?php esc_html_e( 'Globally, IBM has been a key driver of the "cognitive enterprise" via its physical and remote garages on several different continents, including Asia. To date, it has helped over 500 companies harness the power and intelligence of computer led data in their day-to-day businesses.', 'ibm-cognitive' ); ?>
		</p>

		<blockquote class="foster-quote__section">
			<span class="foster-quote__icon" aria-hidden="true">&ldquo;</span>
			<h2 class="foster-quote__text" id="foster-quote-heading">
				<?php esc_html_e( 'In the next chapter of digital reinvention, the ability to innovate at scale will be the difference between success and failure — this requires a fundamental shift in how companies work.', 'ibm-cognitive' ); ?>
			</h2>
			<cite class="foster-quote__author">
				<?php esc_html_e( '— Mark Foster, Senior Vice President, IBM Services and Global Business Services', 'ibm-cognitive' ); ?>
			</cite>
		</blockquote>

		<p class="foster-quote__body">
			<?php esc_html_e( 'The companies and organizations IBM has helped include German carmaker Volkswagen, the government of Nova Scotia, and Mueller Inc, a Texas-based construction company. All sought IBM\'s services via their physical or virtual environments and developed models — often apps — which helped to save man-hours make their business more efficient.', 'ibm-cognitive' ); ?>
		</p>
	</div>
</section>
