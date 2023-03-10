<?php
/**
 * The template for displaying home page.
 * Template Name: Front-page Template
 * @package Newsphere
 */

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else {

    /**
     * magnitude_action_sidebar_section hook
     * @since Newsphere 1.0.0
     *
     * @hooked magnitude_front_page_section -  20
     * @sub_hooked magnitude_front_page_section -  20
     */
    do_action('magnitude_front_page_section');


}
get_footer();