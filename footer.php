<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magnitude
 */

?>


</div>

<?php if (is_active_sidebar('express-off-canvas-panel')) : ?>
    <div id="sidr" class="primary-background">
        <a class="sidr-class-sidr-button-close" href="#sidr-nav"><i class="fa fa-window-close"></i></a>
        <?php dynamic_sidebar('express-off-canvas-panel'); ?>
    </div>
<?php endif; ?>

<?php do_action('magnitude_action_full_width_upper_footer_section'); ?>

<footer class="site-footer">
    
    <?php if (is_active_sidebar( 'footer-first-widgets-section') || is_active_sidebar( 'footer-second-widgets-section') || is_active_sidebar( 'footer-third-widgets-section') || is_active_sidebar( 'footer-fourth-widgets-section')) : ?>
    <div class="primary-footer">
        <div class="container-wrapper">
            <div class="af-container-row">
                <?php if (is_active_sidebar( 'footer-first-widgets-section') ) : ?>
                    <div class="primary-footer-area footer-first-widgets-section col-3 float-l pad">
                        <section class="widget-area color-pad">
                            <?php dynamic_sidebar('footer-first-widgets-section'); ?>

                            <?php /*
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <div class="site-description"><?php echo esc_html($description); ?></div>
                            <?php
                            endif; */ ?>                

                        </section>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar( 'footer-second-widgets-section') ) : ?>
                    <div class="primary-footer-area footer-second-widgets-section  col-3 float-l pad">
                        <section class="widget-area color-pad">
                            <?php dynamic_sidebar('footer-second-widgets-section'); ?>
                        </section>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar( 'footer-third-widgets-section') ) : ?>
                    <div class="primary-footer-area footer-third-widgets-section  col-3 float-l pad">
                        <section class="widget-area color-pad">
                            <?php dynamic_sidebar('footer-third-widgets-section'); ?>
                        </section>
                    </div>
                <?php endif; ?>
               
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if(1 != magnitude_get_option('hide_footer_menu_section')): ?>
    <?php if (has_nav_menu( 'aft-footer-nav' ) || has_nav_menu( 'aft-social-nav' )):
        $class = 'col-1';
        if (has_nav_menu( 'aft-footer-nav' ) && has_nav_menu( 'aft-social-nav' )){
            $class = 'col-2';
        }
    ?>
    <div class="secondary-footer">
        <div class="container-wrapper">
            <div class="af-container-row clearfix af-flex-container">
                <?php if (has_nav_menu( 'aft-footer-nav' )): ?>
                    <div class="float-l pad color-pad <?php echo esc_attr($class); ?>">
                        <div class="footer-nav-wrapper">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'aft-footer-nav',
                            'menu_id' => 'footer-menu',
                            'depth' => 1,
                            'container' => 'div',
                            'container_class' => 'footer-navigation'
                        )); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php if (has_nav_menu( 'aft-social-nav' )): ?>
                    <div class="float-l pad color-pad <?php echo esc_attr($class); ?>">
                        <div class="footer-social-wrapper">
                            <div class="aft-small-social-menu">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'aft-social-nav',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                    'container' => 'div',
                                    'container_class' => 'social-navigation'
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <div class="site-info">
        <div class="container-wrapper">
            <div class="af-container-row">
                <div class="col-1 color-pad">
                    <?php $magnitude_copy_right = magnitude_get_option('footer_copyright_text'); ?>
                    <?php if (!empty($magnitude_copy_right)): ?>
                        <?php echo esc_html($magnitude_copy_right); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<a id="scroll-up" class="secondary-color">
    <i class="fa fa-angle-up"></i>
</a>
<!-- adlook banners -->
<script>
  const banners = [
    { containerId: "adlk-banner-1", width: 728, height: 90, mobileWidth: 300, mobileHeight: 250 },
    { containerId: "adlk-banner-2", width: 300, height: 300, mobileWidth: 300, mobileHeight: 250 },
  ];

  function initializeBanner({ containerId, width, height, mobileWidth, mobileHeight }) {
    const init = () => window.UTInventoryCore ? new window.UTInventoryCore({
      type: "banner", host: 2007, playMode: "autoplay-visible", container: containerId,
      transparentSkeleton: false, width, height, collapse: "open-creativeView",
      mobile: { width: mobileWidth, height: mobileHeight }
    }) : setTimeout(init, 100);
    init();
  }

  banners.forEach(initializeBanner);
</script>

<?php wp_footer(); ?>
    

</body>
</html>
