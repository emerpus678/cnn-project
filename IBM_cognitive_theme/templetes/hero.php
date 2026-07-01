<?php
/**
 * Hero section template.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;

$ibm_logo_url = apply_filters( 'ibm_cognitive_ibm_logo_url', '#' );
?>

<section class="hero">
	<div class="hero__content">
		<p class="hero__eyebrow"><?php esc_html_e( 'The Next Generation of Business:', 'ibm-cognitive' ); ?></p>
		<h1 class="hero__title">Cognitive&nbsp;Enterprise</h1>
		<p class="hero__body">
			<?php esc_html_e( 'In this rapidly evolving business landscape, organizations are confronted by a convergence of technological and social forces. How did these early adopters transform their organizations?', 'ibm-cognitive' ); ?>
		</p>
	</div>

	<a href="<?php echo esc_url( $ibm_logo_url ); ?>" class="hero__logo" target="_blank" rel="noopener noreferrer">
		<img src="<?php echo ibm_cognitive_asset_url( 'images/IBM-logo-white.png' ); ?>" alt="IBM">
	</a>
</section>
