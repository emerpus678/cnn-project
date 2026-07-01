<?php
/**
 * Template Name: Cognitive Enterprise
 * Template Post Type: page
 *
 * Full Cognitive Enterprise advertisement feature page.
 *
 * @package IBM_Cognitive
 */

defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'templetes/hero' );
get_template_part( 'templetes/hero-parallax' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		the_content();
	}
}

get_footer();
