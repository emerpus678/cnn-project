<?php
/**
 * Goldcorp horizontal scroll wrapper — first, middle, and last panels.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="hs-wrapper goldcorp-horizontal">
	<div class="hs-sticky">
		<div class="hs-progress" aria-hidden="true">
			<span class="is-active"></span>
			<span></span>
			<span></span>
		</div>
		<div class="hs-track">
			<?php
			get_template_part( 'templetes/first_goldcorp' );
			get_template_part( 'templetes/second_goldcorp' );
			get_template_part( 'templetes/last_goldcorp' );
			?>
		</div>
	</div>
</div>
