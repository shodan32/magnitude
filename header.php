<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magnitude
 */

?>
    <!doctype html>
<html <?php language_attributes(); ?>>
<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

    <head>
    
<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    <script src="https://yastatic.net/pcode/adfox/loader.js" crossorigin="anonymous"></script> 

    </head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
} ?>

<?php
$enable_preloader = magnitude_get_option('enable_site_preloader');
if (1 == $enable_preloader):
    ?>
    <div id="af-preloader">
        <div id="loader-wrapper">
            <div id="loader">
                <div class="load__animation"></div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div id="page" class="site af-whole-wrapper">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'magnitude'); ?></a>

<?php

do_action('magnitude_action_header_section');

do_action('magnitude_action_front_page_main_section_scope');


$hide_on_blog = magnitude_get_option('disable_main_banner_on_blog_archive');

if ($hide_on_blog) {
    if (is_front_page()) {
        do_action('magnitude_action_banner_featured_section');
    }
} else {
    if (is_front_page() || is_home()) {
        do_action('magnitude_action_banner_featured_section');
    }
}


if (is_single()) {
    $single_post_featured_image_view = magnitude_get_option('single_post_featured_image_view');
    if ($single_post_featured_image_view == 'full') {
        do_action('magnitude_action_single_header');
    }
}
?>


    <div id="content" class="container-wrapper">
<?php

do_action('magnitude_action_get_breadcrumb');
?>
<amp-ad width="100vw" height="320"
     type="adsense"
     data-ad-client="ca-pub-7212507732872095"
     data-ad-slot="5576758567"
     data-auto-format="rspv"
     data-full-width="">
  <div overflow=""></div>
</amp-ad>



