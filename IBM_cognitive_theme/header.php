<?php
/**
 * Theme header — CNN nav bar.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;

$cnn_url    = 'http://cnn.com/';
$ibm_url    = apply_filters( 'ibm_cognitive_ibm_url', '#' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="cnn-nav" aria-label="<?php esc_attr_e( 'CNN Advertisement Feature navigation', 'ibm-cognitive' ); ?>">
	<a href="<?php echo esc_url( $cnn_url ); ?>" class="cnn-nav__logo" target="_blank" rel="noopener noreferrer">
		<img src="<?php echo ibm_cognitive_asset_url( 'images/cnn_logo.png' ); ?>" alt="CNN">
	</a>

	<a href="<?php echo esc_url( $ibm_url ); ?>" class="cnn-nav__ibm" target="_blank" rel="noopener noreferrer">
		<?php esc_html_e( 'Content by IBM', 'ibm-cognitive' ); ?>
	</a>

	<button class="cnn-nav__share" type="button" aria-label="<?php esc_attr_e( 'Share this article', 'ibm-cognitive' ); ?>">
		<?php esc_html_e( 'SHARE', 'ibm-cognitive' ); ?>
	</button>
</nav>
