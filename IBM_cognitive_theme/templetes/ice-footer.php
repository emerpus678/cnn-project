<?php
/**
 * ICE footer — IBM CTA + CNN legal bar.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;

$ibm_url = apply_filters( 'ibm_cognitive_ibm_url', '#' );
?>

<footer class="ice-footer" role="contentinfo">
	<div class="ice-footer__hero">
		<img
			class="ice-footer__hero-img"
			src="<?php echo ibm_cognitive_asset_url( 'images/footer.jpg' ); ?>"
			alt="<?php esc_attr_e( 'Earth from space at night, city lights visible', 'ibm-cognitive' ); ?>"
			loading="lazy"
		>

		<img
			class="ice-footer__ibm-logo"
			src="<?php echo ibm_cognitive_asset_url( 'images/IBM-logo-white.png' ); ?>"
			alt="IBM"
		>

		<a href="<?php echo esc_url( $ibm_url ); ?>" class="ice-footer__cta" aria-label="<?php esc_attr_e( 'Find out more about IBM', 'ibm-cognitive' ); ?>">
			<span class="ice-footer__cta-text"><?php esc_html_e( 'Find out more', 'ibm-cognitive' ); ?></span>
			<span class="ice-footer__cta-rule" aria-hidden="true"></span>
		</a>
	</div>

	<div class="ice-footer__bottom">
		<img
			class="ice-footer__cnn-logo"
			src="<?php echo ibm_cognitive_asset_url( 'images/cnn_logo.png' ); ?>"
			alt="CNN"
		>

		<ul class="ice-footer__links">
			<li><a href="#"><?php esc_html_e( 'Advertise', 'ibm-cognitive' ); ?></a></li>
			<li><a href="#"><?php esc_html_e( 'Terms of use', 'ibm-cognitive' ); ?></a></li>
			<li><a href="#"><?php esc_html_e( 'Privacy Policy', 'ibm-cognitive' ); ?></a></li>
		</ul>

		<p class="ice-footer__legal">
			<?php esc_html_e( '© 2018 Cable News Network. Turner Broadcasting System, Inc. All Rights Reserved. CNN Sans™ & © 2018 Cable News Network.', 'ibm-cognitive' ); ?>
		</p>
	</div>
</footer>
