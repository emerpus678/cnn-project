<?php
/**
 * Front page template — Cognitive Enterprise landing page.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'templetes/hero' );
get_template_part( 'templetes/hero-parallax' );
get_template_part( 'templetes/intro' );

echo '<div class="ibm-story">';
get_template_part( 'templetes/deep-blue' );
get_template_part( 'templetes/tech-focus' );
echo '<div class="cognitive-story">';
get_template_part( 'templetes/cognitive-quote' );
get_template_part( 'templetes/data-teaser' );
echo '</div>';
echo '</div>';

get_template_part( 'templetes/bestseller-horizontal' );

get_template_part( 'templetes/seven-factors' );

get_footer();
