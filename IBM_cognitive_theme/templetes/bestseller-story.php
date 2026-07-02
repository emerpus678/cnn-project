<?php
/**
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="hs-panel bestseller-story product-story tdFadeInUp" aria-label="<?php esc_attr_e( 'Bestseller product story', 'ibm-cognitive' ); ?>">
	<div class="product-story__content">
		<div class="product-story__copy">
			<p class="para">
				<?php esc_html_e( 'So, they teamed up with IBM and Watson came back with an analysis on how Bestseller products would perform in stores.', 'ibm-cognitive' ); ?>
			</p>
			<p class="quote">
				<?php esc_html_e( 'Suparna Memon, a Partner at the IBM Client Innovation Center shares, "[Bestseller] were looking at how they could improve their inventory management so that they have less unsold inventory in the retail stores. Using AI and the data that we have, we created an AI engine for them by which they could physically change the style of a product. It\'s a visual model picture where you can see the dress on your screen, and you change the color, change the size, change the price."', 'ibm-cognitive' ); ?>
			</p>
		</div>
		<div class="left">
			<div class="product-story__visual">
				<img
					class="product-story__photo"
					src="<?php echo ibm_cognitive_asset_url( 'images/img6.jpg' ); ?>"
					alt="<?php esc_attr_e( 'Person typing on a laptop', 'ibm-cognitive' ); ?>"
					loading="lazy"
				>
			</div>
		</div>
	</div>

	<div class="product-story__process" aria-label="<?php esc_attr_e( 'AI workflow steps', 'ibm-cognitive' ); ?>">
		<div class="process-step">
			<img src="<?php echo ibm_cognitive_asset_url( 'svg/process1.svg' ); ?>" alt="<?php esc_attr_e( 'Collect data icon', 'ibm-cognitive' ); ?>">
		</div>
		<div class="process-segment">
			<img src="<?php echo ibm_cognitive_asset_url( 'svg/line5.svg' ); ?>" alt="" aria-hidden="true">
			<span><?php esc_html_e( 'collect data', 'ibm-cognitive' ); ?></span>
		</div>
		<div class="process-step">
			<img src="<?php echo ibm_cognitive_asset_url( 'svg/process2.svg' ); ?>" alt="<?php esc_attr_e( 'Analyse icon', 'ibm-cognitive' ); ?>">
		</div>
		<div class="process-segment">
			<img src="<?php echo ibm_cognitive_asset_url( 'svg/line5.svg' ); ?>" alt="" aria-hidden="true">
			<span><?php esc_html_e( 'analyse', 'ibm-cognitive' ); ?></span>
		</div>
		<div class="process-step">
			<img src="<?php echo ibm_cognitive_asset_url( 'svg/process3.svg' ); ?>" alt="<?php esc_attr_e( 'Predict icon', 'ibm-cognitive' ); ?>">
		</div>
		<div class="process-segment">
			<img src="<?php echo ibm_cognitive_asset_url( 'svg/line5.svg' ); ?>" alt="" aria-hidden="true">
			<span><?php esc_html_e( 'predict', 'ibm-cognitive' ); ?></span>
		</div>
		<div class="process-step">
			<img src="<?php echo ibm_cognitive_asset_url( 'svg/process4.svg' ); ?>" alt="<?php esc_attr_e( 'Deliver icon', 'ibm-cognitive' ); ?>">
		</div>
	</div>
</section>
