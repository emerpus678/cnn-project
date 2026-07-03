<?php
/**
 * Data infographic — stats section.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="ibm-numbers" aria-labelledby="ibm-numbers-heading">
	<div class="ibm-numbers__slide">
		<div class="ibm-numbers__intro">
			<p id="ibm-numbers-heading">
				<?php esc_html_e( 'Today, we have access to more data than ever before.', 'ibm-cognitive' ); ?>
			</p>
		</div>

		<div class="ibm-numbers__stats">
			<div class="ibm-numbers__stat ibm-numbers__stat--blue">
				<div class="ibm-numbers__figure">
					<span class="ibm-numbers__num" data-counter data-counter-target="50" data-counter-suffix="x">0x</span>
				</div>
				<p>
					<?php
					echo wp_kses_post(
						__( 'According to "The Cognitive Enterprise: Reinventing Your Company With AI", a 2015 IBM report, a typical supply chain accessed <span class="ibm-numbers__num">50 times more</span> data last year than it had access to five years ago.', 'ibm-cognitive' )
					);
					?>
				</p>
			</div>

			<div class="ibm-numbers__stat ibm-numbers__stat--orange">
				<div class="ibm-numbers__figure">
					<span class="ibm-numbers__orange" data-counter data-counter-target="90" data-counter-suffix="%">0%</span>
				</div>
				<p>
					<?php
					echo wp_kses_post(
						__( 'Conversely, <span class="ibm-numbers__orange">90 of stored data remains unused.</span> Now and in the days and years ahead, companies that are able to make the best use of that data will benefit the most.', 'ibm-cognitive' )
					);
					?>
				</p>
			</div>

			<div class="ibm-numbers__stat ibm-numbers__stat--dark">
				<div class="ibm-numbers__figure">
					<span class="ibm-numbers__blue" data-counter data-counter-target="25" data-counter-suffix="%">0%</span>
				</div>
				<p>
					<?php
					echo wp_kses_post(
						__( '<u>In 2014</u>, Korn Ferry, the global consulting firm, reported that organizations with the highest rates of learning agility among executives have achieved profit margins <span class="ibm-numbers__highlight-dark">25 percent higher than their peers.</span>', 'ibm-cognitive' )
					);
					?>
				</p>
			</div>
		</div>

		<p class="ibm-numbers__summary">
			<?php esc_html_e( 'Being able to use and utilize data with all of the latest tools at one\'s disposal may make the difference to companies in a wide variety of fields and industries, including manufacturing, healthcare, transportation, insurance, education and many more.', 'ibm-cognitive' ); ?>
		</p>
	</div>
</section>
