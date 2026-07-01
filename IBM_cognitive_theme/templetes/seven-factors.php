<?php
/**
 * Seven success factors — Foster diagram + Lottie icons.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;

$lottie_base = 'animations/Animation/';
$lottie_urls = array(
	'darwin'    => ibm_cognitive_asset_url( $lottie_base . 'IBM_Icon_Darwin_V1.json' ),
	'data'      => ibm_cognitive_asset_url( $lottie_base . 'IBM_Icon_Data_V1.json' ),
	'architect' => ibm_cognitive_asset_url( $lottie_base . 'IBM_Icon_Architect_V1.json' ),
	'ai'        => ibm_cognitive_asset_url( $lottie_base . 'IBM_Icon_AI_V1.json' ),
	'agile'     => ibm_cognitive_asset_url( $lottie_base . 'IBM_Icon_Agile_V1.json' ),
	'talent'    => ibm_cognitive_asset_url( $lottie_base . 'IBM_Icon_Talent_V1.json' ),
	'exptech'   => ibm_cognitive_asset_url( $lottie_base . 'ExponentialTech.json' ),
);
?>

<section class="ce-section tdFadeInUp" aria-label="<?php esc_attr_e( 'IBM Cognitive Enterprise Framework', 'ibm-cognitive' ); ?>">
	<div class="ce-diagram" aria-hidden="true">
		<div class="ce-intro">
			<p><?php esc_html_e( 'With so much data now available, and with ever-demanding customers as well as new opportunities for interaction, more and more companies are seeing the need to embrace the cognitive enterprise.', 'ibm-cognitive' ); ?></p>
			<p class="ce-intro__lead">
				<?php esc_html_e( 'To address these desires, Foster, the IBM Senior Vice President, has identified what he sees as', 'ibm-cognitive' ); ?>
				<span class="ce-intro__underline"><?php esc_html_e( 'seven success factors', 'ibm-cognitive' ); ?></span>.
				<?php esc_html_e( 'These include:', 'ibm-cognitive' ); ?>
			</p>
		</div>

		<img
			class="ce-diagram__lines"
			src="<?php echo ibm_cognitive_asset_url( 'svg/7factors-lines.svg' ); ?>"
			alt=""
		>

		<div class="ce-node ce-node--top" data-cx="84" data-cy="197.5">
			<div class="ce-icon-ring">
				<div class="ce-lottie" data-lottie="<?php echo esc_url( $lottie_urls['darwin'] ); ?>"></div>
			</div>
			<p class="ce-caption"><?php esc_html_e( 'Creating platforms', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'to unleash Digital', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'Darwinism', 'ibm-cognitive' ); ?></p>
		</div>

		<div class="ce-node ce-node--top" data-cx="299" data-cy="197.5">
			<div class="ce-icon-ring">
				<div class="ce-lottie" data-lottie="<?php echo esc_url( $lottie_urls['data'] ); ?>"></div>
			</div>
			<p class="ce-caption"><?php esc_html_e( 'Leveraging the', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'advantage in data', 'ibm-cognitive' ); ?></p>
		</div>

		<div class="ce-node ce-node--top" data-cx="511" data-cy="197.5">
			<div class="ce-icon-ring">
				<div class="ce-lottie" data-lottie="<?php echo esc_url( $lottie_urls['architect'] ); ?>"></div>
			</div>
			<p class="ce-caption"><?php esc_html_e( 'Becoming the', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'architect for your', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'business of change', 'ibm-cognitive' ); ?></p>
		</div>

		<div class="ce-node ce-node--top" data-cx="726" data-cy="197.5">
			<div class="ce-icon-ring">
				<div class="ce-lottie" data-lottie="<?php echo esc_url( $lottie_urls['ai'] ); ?>"></div>
			</div>
			<p class="ce-caption"><?php esc_html_e( 'Redesigning', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'workflows around AI', 'ibm-cognitive' ); ?></p>
		</div>

		<div class="ce-node ce-node--bottom" data-cx="190" data-cy="498.5">
			<div class="ce-icon-ring">
				<div class="ce-lottie" data-lottie="<?php echo esc_url( $lottie_urls['agile'] ); ?>"></div>
			</div>
			<p class="ce-caption"><?php esc_html_e( 'Becoming agile to', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'build and change', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'fast', 'ibm-cognitive' ); ?></p>
		</div>

		<div class="ce-node ce-node--bottom" data-cx="403" data-cy="498.5">
			<div class="ce-icon-ring">
				<div class="ce-lottie" data-lottie="<?php echo esc_url( $lottie_urls['talent'] ); ?>"></div>
			</div>
			<p class="ce-caption"><?php esc_html_e( 'Reinventing the', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'workforce to ignite', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'talent', 'ibm-cognitive' ); ?></p>
		</div>

		<div class="ce-node ce-node--bottom" data-cx="618" data-cy="498.5">
			<div class="ce-icon-ring">
				<div class="ce-lottie" data-lottie="<?php echo esc_url( $lottie_urls['exptech'] ); ?>"></div>
			</div>
			<p class="ce-caption"><?php esc_html_e( 'Winning with trust', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'and security', 'ibm-cognitive' ); ?></p>
		</div>
	</div>

	<div class="ce-grid" aria-label="<?php esc_attr_e( 'Seven success factors', 'ibm-cognitive' ); ?>">
		<?php
		$mobile_captions = array(
			'darwin'    => __( 'Creating platforms to unleash Digital Darwinism', 'ibm-cognitive' ),
			'data'      => __( 'Leveraging the advantage in data', 'ibm-cognitive' ),
			'architect' => __( 'Becoming the architect for your business of change', 'ibm-cognitive' ),
			'ai'        => __( 'Redesigning workflows around AI', 'ibm-cognitive' ),
			'agile'     => __( 'Becoming agile to build and change fast', 'ibm-cognitive' ),
			'talent'    => __( 'Reinventing the workforce to ignite talent', 'ibm-cognitive' ),
			'exptech'   => __( 'Winning with trust and security', 'ibm-cognitive' ),
		);

		foreach ( $mobile_captions as $key => $caption ) :
			?>
			<div class="ce-cell">
				<div class="ce-icon-ring">
					<div class="ce-lottie" data-lottie="<?php echo esc_url( $lottie_urls[ $key ] ); ?>"></div>
				</div>
				<p class="ce-caption"><?php echo esc_html( $caption ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>

	<blockquote class="ce-quote">
		<p>
			<?php esc_html_e( 'We say this is a destination, where organizations will work towards in the coming years, it\'s the definition of a transformational journey.', 'ibm-cognitive' ); ?>
		</p>
		<cite class="ce-quote-attribution">
			<?php esc_html_e( '— Mark Foster, Senior Vice President, IBM Services and Global Business Services', 'ibm-cognitive' ); ?>
		</cite>
	</blockquote>
</section>
