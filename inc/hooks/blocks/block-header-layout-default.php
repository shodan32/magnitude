<?php
/**
 * List block part for displaying header content in page.php
 *
 * @package Magnitude
 */

?>
<?php
$class = '';
$background = '';
if (has_header_image()) {
    $class = 'af-header-image data-bg';
    $background = get_header_image();
}
?>
<div class="top-header">
    <div class="container-wrapper">
        <div class="top-bar-flex">
            <div class="top-bar-left col-2">
                <?php if (is_active_sidebar('express-off-canvas-panel')) : ?>
                    <div class="off-cancas-panel">
                        <?php do_action('magnitude_load_off_canvas');?>
                    </div>
                <?php endif; ?>
                <div class="date-bar-left">
                    <?php do_action('magnitude_load_date');?>
                </div>
            </div>
            <div class="top-bar-right col-2">
                <div class="aft-small-social-menu">
                    <?php do_action('magnitude_load_social_menu');?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="af-middle-header <?php echo esc_attr($class); ?>" data-background="<?php echo esc_attr($background); ?>">
    <div class="container-wrapper">
        <div class="af-middle-container">
            <div class="logo">
                <?php do_action('magnitude_load_site_branding'); ?>
            </div>
            <div class="header-advertise">
                <?php // do_action('magnitude_action_banner_advertisement'); ?>
<ins class="adsbygoogle"
     style="display:inline-block;width:930px;height:100px"
     data-ad-client="ca-pub-7212507732872095"
     data-ad-slot="5165315782"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<amp-ad width="100vw" height="320"
type="adsense"
data-ad-client="ca-pub-7212507732872095"
data-ad-slot="1226264296"
data-auto-format="rspv"
data-full-width="">
<div overflow=""></div>
</amp-ad>                
            </div>
        </div>
    </div>
</div>
<div id="main-navigation-bar" class="af-bottom-header">
    <div class="container-wrapper">
        <div class="af-bottom-head-nav">
            <?php do_action('magnitude_action_main_menu_nav'); ?>
            <div class="logo-mobile"><?php  the_custom_logo() ?></div>
            <?php do_action('magnitude_load_search_form'); ?>
        </div>
    </div>
</div>
    
