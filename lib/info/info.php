<?php
/**
 * Info setup
 *
 * @package Magnitude
 */

if ( ! function_exists( 'magnitude_details_setup' ) ) :

    /**
     * Info setup.
     *
     * @since 1.0.0
     */
    function magnitude_details_setup() {

        $config = array(

            // Welcome content.
            'welcome-texts' => sprintf( esc_html__( 'Howdy %1$s, we would like to thank you for installing and activating %2$s theme for your precious site. All of the features provided by the theme are now ready to use; Here, we have gathered all of the essential details and helpful links for you and your better experience with %2$s. Once again, Thanks for using our theme!', 'magnitude' ), get_bloginfo('name'), 'Magnitude' ),

            // Tabs.
            'tabs' => array(
                'getting-started' => esc_html__( 'Getting Started', 'magnitude' ),
                'support'         => esc_html__( 'Support', 'magnitude' ),
                'useful-plugins'  => esc_html__( 'Useful Plugins', 'magnitude' ),
                'demo-content'    => esc_html__( 'Demo Content', 'magnitude' ),
                'free-vs-pro'    => esc_html__( 'Free vs Pro', 'magnitude' ),
                'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'magnitude' ),
            ),

            // Quick links.
            'quick_links' => array(
                'theme_url' => array(
                    'text' => esc_html__( 'Theme Details', 'magnitude' ),
                    'url'  => 'https://afthemes.com/products/magnitude/',
                ),
                'demo_url' => array(
                    'text' => esc_html__( 'View Demo', 'magnitude' ),
                    'url'  => 'https://afthemes.com/magnitude-pro-a-premium-multipurpose-wordpress-news-theme/',
                ),
                'documentation_url' => array(
                    'text' => esc_html__( 'View Documentation', 'magnitude' ),
                    'url'  => 'https://docs.afthemes.com/magnitude/',
                ),
                'rating_url' => array(
                    'text' => esc_html__( 'Rate This Theme','magnitude' ),
                    'url'  => 'https://wordpress.org/support/theme/magnitude/reviews/#new-post',
                ),
            ),

            // Getting started.
            'getting_started' => array(
                'one' => array(
                    'title'       => esc_html__( 'Theme Documentation', 'magnitude' ),
                    'icon'        => 'dashicons dashicons-format-aside',
                    'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'magnitude' ),
                    'button_text' => esc_html__( 'View Documentation', 'magnitude' ),
                    'button_url'  => 'https://docs.afthemes.com/magnitude/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
                'two' => array(
                    'title'       => esc_html__( 'Static Front Page', 'magnitude' ),
                    'icon'        => 'dashicons dashicons-admin-generic',
                    'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'magnitude' ),
                    'button_text' => esc_html__( 'Static Front Page', 'magnitude' ),
                    'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
                    'button_type' => 'primary',
                ),
                'three' => array(
                    'title'       => esc_html__( 'Theme Options', 'magnitude' ),
                    'icon'        => 'dashicons dashicons-admin-customizer',
                    'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'magnitude' ),
                    'button_text' => esc_html__( 'Customize', 'magnitude' ),
                    'button_url'  => wp_customize_url(),
                    'button_type' => 'primary',
                ),
                'four' => array(
                    'title'       => esc_html__( 'Widgets', 'magnitude' ),
                    'icon'        => 'dashicons dashicons-welcome-widgets-menus',
                    'description' => esc_html__( 'Theme uses Wedgets API for widget options. Using the Widgets you can easily customize different aspects of the theme.', 'magnitude' ),
                    'button_text' => esc_html__( 'Widgets', 'magnitude' ),
                    'button_url'  => admin_url('widgets.php'),
                    'button_type' => 'primary',
                ),
                'five' => array(
                    'title'       => esc_html__( 'Demo Content', 'magnitude' ),
                    'icon'        => 'dashicons dashicons-layout',
                    'description' => sprintf( esc_html__( 'Firstly, download demo files from %1$s page, then install and activate %2$s plugin. After that, import sample demo content, visit Import Demo Data menu under Appearance.', 'magnitude' ), '<a target="_blank" href="https://afthemes.com/products/magnitude/">Magnitude</a>', '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'magnitude' ) . '</a>' ),
                    'button_text' => esc_html__( 'Demo Content', 'magnitude' ),
                    'button_url'  => admin_url( 'themes.php?page=magnitude-pro-details&tab=demo-content' ),
                    'button_type' => 'secondary',
                ),
                'six' => array(
                    'title'       => esc_html__( 'Theme Preview', 'magnitude' ),
                    'icon'        => 'dashicons dashicons-welcome-view-site',
                    'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized.', 'magnitude' ),
                    'button_text' => esc_html__( 'View Demo', 'magnitude' ),
                    'button_url'  => 'https://afthemes.com/magnitude-pro-a-premium-multipurpose-wordpress-news-theme/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
            ),

            // Support.
            'support' => array(
                'one' => array(
                    'title'       => esc_html__( 'Contact Support', 'magnitude' ),
                    'icon'        => 'dashicons dashicons-sos',
                    'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'magnitude' ),
                    'button_text' => esc_html__( 'Contact Support', 'magnitude' ),
                    'button_url'  => 'https://wordpress.org/support/theme/magnitude/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
                'two' => array(
                    'title'       => esc_html__( 'Theme Documentation', 'magnitude' ),
                    'icon'        => 'dashicons dashicons-format-aside',
                    'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'magnitude' ),
                    'button_text' => esc_html__( 'View Documentation', 'magnitude' ),
                    'button_url'  => 'https://docs.afthemes.com/magnitude-pro/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
                'three' => array(
                    'title'       => esc_html__( 'Child Theme', 'magnitude' ),
                    'icon'        => 'dashicons dashicons-admin-tools',
                    'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself. Using this approach, you wont lose the customization after theme update.', 'magnitude' ),
                    'button_text' => esc_html__( 'Learn More', 'magnitude' ),
                    'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
            ),

            //Useful plugins.
            'useful_plugins' => array(
                'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'magnitude' ),
            ),

            //Demo content.
            'demo_content' => array(
                'description' => sprintf( esc_html__( 'Firstly, download demo files from %1$s page, then install and activate %2$s plugin. After that, import sample demo content, visit Import Demo Data menu under Appearance.', 'magnitude' ), '<a target="_blank" href="https://afthemes.com/products/magnitude/">Magnitude</a>', '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'magnitude' ) . '</a>' ),
            ),

            //Free vs Pro.
            'free_vs_pro' => array(

                'features' => array(
                    'Live editing in Customizer' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Typography style and colors' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Dark Mode' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Gradient Effect' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Preloader Option' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Multiple Header Options' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Logo and title customization' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Multiple Frontpage Banner Options' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Featured Categories on Banner Section' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Featured Pages on Banner Section' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Featured Custom Links on Banner Section' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Featured Posts on Banner Section' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Banner Featured Posts Controls' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Posts Categories Toggle' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Comments Count Toggle' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Minutes Read Toggle' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Date and Author Toggle' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Posts Date format Options' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Features Image Toggle' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Featured Image View' => array('Default', 'Default, Full'),
                    'Category Color Options' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Number of Category Color Options' => array('3 Available', '7 Available'),
                    'Banner Advertisements' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Posts Section Advertisements' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Custom Widgets Area' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Off Canvas Widget Area' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Banner Advertisements Widget Area' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Posts Section Advertisements Widget Area' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Below Main Banner Section Widget Area' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Frontpage Content Section Widget Area' => array('yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Frontpage Sidebar Section Widget Area' => array('yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Below Main Banner Section Widget Area' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Above Footer Banner Section Widget Area' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Custom Widgets' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Number of Custom Widgets' => array('7+ Available', '15+ Available'),
                    'Author Biography' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Posts Slider Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Posts Carousel Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Posts Grid Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Posts List Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Posts Express List Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Posts Double Coulmn Double Categories Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Posts Tabbed Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Social Contacts Widget' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Posts Single Column Widget' => array('yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Trending Posts Vertical Carousel Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'YouTube Video Slider Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Instagram Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'MailChimp Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Call to Action Widget' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Custom Widgets Controls' => array('Basic', 'Advanced'),
                    'Archive Layout' => array('List, List Alternate, List Right', 'List, List Alternate, List Right, Grid, Grid Alternate, Grid Alternate with List, Grid Alternate with Full, Full, Masonry'),
                    'Pagination' => array('Numeric', 'Numeric, Ajax Load More, Infinite Scroll'),
                    'Instagram Feeds' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Mailchimp Subscription Section' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Display Related Posts' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Footer Widgets Section' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'WooCommerce Compatibility' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Hide Theme Credit Link' => array('No', 'Yes', 'dashicons-no-alt', 'dashicons-yes'),
                    'Responsive Layout' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'Translations Ready' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'RTL Support' => array('Yes', 'Yes', 'dashicons-yes', 'dashicons-yes'),
                    'SEO' => array('Optimized', 'Optimized'),
                    'Support' => array('Yes', 'High Priority Dedicated Support')
                ),
            ),

            // Upgrade content.
            'upgrade_to_pro' => array(
                'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'magnitude' ),
                'button_text' => esc_html__( 'Upgrade Now', 'magnitude' ),
                'button_url'  => 'https://afthemes.com/products/magnitude-pro',
                'button_type' => 'primary',
                'is_new_tab'  => true,
            ),
        );

        Magnitude_Info::init( $config );
    }

endif;

add_action( 'after_setup_theme', 'magnitude_details_setup' );