<?php
/**
 * Recommended plugins
 *
 * @package Magnitude
 */

if ( ! function_exists( 'magnitude_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function magnitude_recommended_plugins() {

        $plugins = array(
             array(
                'name'     => esc_html__( 'Blockspare - Beautiful Page Building Blocks for WordPress', 'magnitude' ),
                'slug'     => 'blockspare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'WP Post Author', 'magnitude' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'magnitude' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => __( 'MailChimp for WordPress', 'magnitude' ),
                'slug'     => 'mailchimp-for-wp',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'magnitude_recommended_plugins' );
