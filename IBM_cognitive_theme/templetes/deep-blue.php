<?php
/**
 * Deep Blue chess stat section.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="deep-blue tdFadeInUp" aria-labelledby="deep-blue-quote">
	<div class="deep-blue__inner">
		<div class="deep-blue__grid">
			<div class="deep-blue__col deep-blue__col--left">
				<p class="deep-blue__quote" id="deep-blue-quote">
					<?php esc_html_e( 'Back in the \'90s, experts in various fields said a computer could never beat the world\'s best chess player.', 'ibm-cognitive' ); ?>
				</p>

				<div
					class="deep-blue__lottie"
					data-lottie="<?php echo ibm_cognitive_asset_url( 'animations/Animation/IBM_Chess_V1.json' ); ?>"
					aria-hidden="true"
				></div>
			</div>

			<div class="deep-blue__col deep-blue__col--right">
				<p class="deep-blue__body">
					<?php esc_html_e( 'Yet, Feng-hsiung Hsu, a US-based computer scientist born in Taiwan, with backing from IBM, kept working on a chip that could do just that. Starting in the mid-1980s with ChipTest, \'Crazy Bird\', as he was known to colleagues, strived to improve the algorithms and possibilities so his computer could beat World Champion and chess Grandmaster Garry Kasparov.', 'ibm-cognitive' ); ?>
				</p>

				<p class="deep-blue__body">
					<?php esc_html_e( 'Though Deep Blue only defeated Kasparov once, a subsequent edition beat him thrice (and drew once) during a six-game match in 1996.', 'ibm-cognitive' ); ?>
				</p>

				<div class="deep-blue__stat-wrap">
					<div class="deep-blue__stat">
						<p class="deep-blue__stat-lead">
							<?php esc_html_e( 'At the peak of its powers, Deep Blue was capable of calculating', 'ibm-cognitive' ); ?>
						</p>
						<p class="deep-blue__stat-number">200,000,000</p>
						<p class="deep-blue__stat-label">
							<?php esc_html_e( 'chess positions each second.', 'ibm-cognitive' ); ?>
						</p>
					</div>

					<div class="deep-blue__pawn" aria-hidden="true">
						<img
							src="<?php echo ibm_cognitive_asset_url( 'svg/chess.svg' ); ?>"
							alt=""
							loading="lazy"
						>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="deep-blue__line-wrap" aria-hidden="true">
		<img
			class="deep-blue__line"
			src="<?php echo ibm_cognitive_asset_url( 'svg/line1.svg' ); ?>"
			alt=""
			data-scroll-mask
			loading="lazy"
		>
	</div>
</section>
