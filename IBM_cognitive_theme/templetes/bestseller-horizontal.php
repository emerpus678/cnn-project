<?php
/**
 * Bestseller horizontal scroll wrapper — intro, story, quote panels.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="hs-wrapper">
	<div class="hs-sticky">
		<div class="hs-progress" aria-hidden="true">
			<span class="is-active"></span>
			<span></span>
			<span></span>
		</div>
		<div class="hs-track">
			<?php
			get_template_part( 'templetes/bestseller-intro' );
			get_template_part( 'templetes/bestseller-story' );
			get_template_part( 'templetes/bestseller-quote' );
			?>
		</div>
	</div>
</div>
