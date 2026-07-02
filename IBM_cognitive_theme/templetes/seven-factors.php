<?php
/**
 * Seven success factors — inline SVG diagram + Lottie icons (looties2).
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;

$lottie_base = ibm_cognitive_asset_url( 'animations/Animation/' );
?>

<section
	class="ce-section"
	aria-label="<?php esc_attr_e( 'IBM Cognitive Enterprise Framework', 'ibm-cognitive' ); ?>"
	data-lottie-base="<?php echo esc_url( trailingslashit( $lottie_base ) ); ?>"
>

	<div class="ce-intro">
		<p><?php esc_html_e( 'With so much data now available, and with ever-demanding customers as well as new opportunities for interaction, more and more companies are seeing the need to embrace the cognitive enterprise.', 'ibm-cognitive' ); ?></p>
		<p class="ce-intro__lead">
			<?php esc_html_e( 'To address these desires, Foster, the IBM Senior Vice President, has identified what he sees as', 'ibm-cognitive' ); ?>
			<span class="ce-intro__underline"><?php esc_html_e( 'seven success factors', 'ibm-cognitive' ); ?></span>.
			<?php esc_html_e( 'These include:', 'ibm-cognitive' ); ?>
		</p>
	</div>

	<div class="ce-diagram" aria-hidden="true">
		<svg class="ce-diagram-svg" viewBox="0 0 812 582" xmlns="http://www.w3.org/1999/xhtml">

			<g class="ce-lines">
				<path d="M478.07,0.5c0,0-179.07,3-396.07,115"/>
				<path d="M729,115.5C593,9.5,478.07,1.13,478.07,1.13S357,16.5,299,115.5"/>
				<path d="M478.07,1.5c0,0,28.93,44,34.93,114"/>
				<path d="M478.07,0.5c0,0-107.07,108-72.07,416"/>
				<path d="M478.07,0.5c0,0,184.93,36,136.93,281c-18.42,94.01,6,135,6,135"/>
				<path d="M478,0.5c0,0-324.03,15-284,279c14.36,94.72-1.97,137-1.97,137"/>
			</g>

			<g class="ce-circles">
				<circle cx="84"  cy="197.5" r="82"/>
				<circle cx="299" cy="197.5" r="82"/>
				<circle cx="511" cy="197.5" r="82"/>
				<circle cx="726" cy="197.5" r="82"/>
				<circle cx="190" cy="498.5" r="82"/>
				<circle cx="403" cy="498.5" r="82"/>
				<circle cx="618" cy="498.5" r="82"/>
			</g>

			<foreignObject x="2" y="115.5" width="164" height="164">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-icon-ring">
					<div class="ce-lottie" id="lottie-darwin"></div>
				</div>
			</foreignObject>
			<foreignObject x="217" y="115.5" width="164" height="164">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-icon-ring">
					<div class="ce-lottie" id="lottie-data"></div>
				</div>
			</foreignObject>
			<foreignObject x="429" y="115.5" width="164" height="164">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-icon-ring">
					<div class="ce-lottie" id="lottie-architect"></div>
				</div>
			</foreignObject>
			<foreignObject x="644" y="115.5" width="164" height="164">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-icon-ring">
					<div class="ce-lottie" id="lottie-ai"></div>
				</div>
			</foreignObject>

			<foreignObject x="-16" y="288" width="200" height="70">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-caption"><?php esc_html_e( 'Creating platforms', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'to unleash Digital', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'Darwinism', 'ibm-cognitive' ); ?></div>
			</foreignObject>
			<foreignObject x="199" y="288" width="200" height="70">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-caption"><?php esc_html_e( 'Leveraging the', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'advantage in data', 'ibm-cognitive' ); ?></div>
			</foreignObject>
			<foreignObject x="411" y="288" width="200" height="70">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-caption"><?php esc_html_e( 'Becoming the', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'architect for your', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'business of change', 'ibm-cognitive' ); ?></div>
			</foreignObject>
			<foreignObject x="626" y="288" width="200" height="70">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-caption"><?php esc_html_e( 'Redesigning', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'workflows around AI', 'ibm-cognitive' ); ?></div>
			</foreignObject>

			<foreignObject x="108" y="416.5" width="164" height="164">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-icon-ring">
					<div class="ce-lottie" id="lottie-agile"></div>
				</div>
			</foreignObject>
			<foreignObject x="321" y="416.5" width="164" height="164">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-icon-ring">
					<div class="ce-lottie" id="lottie-talent"></div>
				</div>
			</foreignObject>
			<foreignObject x="536" y="416.5" width="164" height="164">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-icon-ring">
					<div class="ce-lottie" id="lottie-exptech"></div>
				</div>
			</foreignObject>

			<foreignObject x="90" y="589" width="200" height="70">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-caption"><?php esc_html_e( 'Becoming agile to', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'build and change', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'fast', 'ibm-cognitive' ); ?></div>
			</foreignObject>
			<foreignObject x="303" y="589" width="200" height="70">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-caption"><?php esc_html_e( 'Reinventing the', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'workforce to ignite', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'talent', 'ibm-cognitive' ); ?></div>
			</foreignObject>
			<foreignObject x="518" y="589" width="200" height="70">
				<div xmlns="http://www.w3.org/1999/xhtml" class="ce-caption"><?php esc_html_e( 'Winning with trust', 'ibm-cognitive' ); ?><br><?php esc_html_e( 'and security', 'ibm-cognitive' ); ?></div>
			</foreignObject>

		</svg>
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
					<div class="ce-lottie" id="lottie-<?php echo esc_attr( $key ); ?>-m"></div>
				</div>
				<p class="ce-caption"><?php echo esc_html( $caption ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="blockquote">
		<span style="font-size: 30px; font-weight: 500;" aria-hidden="true">&rdquo;</span>
		<p>
			<?php esc_html_e( 'We say this is a destination, where organizations will work towards in the coming years, it\'s the definition of a transformational journey.', 'ibm-cognitive' ); ?>
		</p>
		<cite class="ce-quote-attribution">
			<?php esc_html_e( '— Mark Foster, Senior Vice President, IBM Services and Global Business Services', 'ibm-cognitive' ); ?>
		</cite>
	</div>

</section>
