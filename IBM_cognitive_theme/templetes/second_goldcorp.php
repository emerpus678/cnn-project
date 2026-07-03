<?php
/**
 * Goldcorp story — second horizontal scroll panel.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="hs-panel goldcorp-middle tdFadeInUp" aria-label="<?php esc_attr_e( 'Goldcorp data story', 'ibm-cognitive' ); ?>">
	<main class="hero">
		<section class="story-panel">
			<div class="left">
				<p>
					<?php esc_html_e( 'At this North and South American-based gold producing company, geologists spend an estimated four-fifths of their time analyzing and preparing data from unstructured logs and models.', 'ibm-cognitive' ); ?>
				</p>
			</div>

			<div class="right">
				<p>
					<?php esc_html_e( 'But when they used a data platform in the cloud created by IBM\'s Watson, they were able to create sophisticated calculations with machine learning models and cut down their analysis time of 80 years\' worth of data from 165 to just 4.5 hours, which vastly freed up geologists to work more productively.', 'ibm-cognitive' ); ?>
				</p>
			</div>

			<div class="timeline" aria-hidden="true">
				<div class="timeline-track">
					<span class="timeline-progress"></span>
				</div>

				<div class="timeline-label timeline-label-left"><?php esc_html_e( '4.5 hours', 'ibm-cognitive' ); ?></div>
				<div class="timeline-label timeline-label-right"><?php esc_html_e( '165 hours', 'ibm-cognitive' ); ?></div>

				<div class="timeline-icon" aria-hidden="true">
					<img src="<?php echo esc_url( ibm_cognitive_asset_url( 'svg/laptop-1.svg' ) ); ?>" alt="">
				</div>
			</div>
		</section>
	</main>
</section>
