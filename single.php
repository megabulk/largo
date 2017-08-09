<?php
/**
 * The Template for displaying all single posts.
 */
if ( 'classic' == get_theme_mod( 'single_template' ) ) {
	get_template_part( 'single-two-column' );
} else {
	get_template_part( 'single-one-column' );
}
