<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magnitude
 */

?>


<?php if (is_singular()) : ?>
    <div class="color-pad">
        <div class="entry-content read-details pad ptb-10">
            <?php
            the_content(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'magnitude'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )); ?>
            <?php if (is_single()): ?>
                <div class="post-item-metadata entry-meta">
                    <?php magnitude_post_item_tag(); ?>
                </div>
            <?php endif; ?>
            <?php
            the_post_navigation(array(
                'prev_text' => __('<span class="em-post-navigation">Previous:</span> %title', 'magnitude'),
                'next_text' => __('<span class="em-post-navigation">Next:</span> %title', 'magnitude'),
                'in_same_term' => true,
                'taxonomy' => __('category', 'magnitude'),
                'screen_reader_text' => __('Continue Reading', 'magnitude'),
            ));
            ?>
            <?php wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'magnitude'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
    <div class="prices">
        <div id="marketWidget"></div>
        <!-- Yandex.Market Widget -->
        <script async src="https://aflt.market.yandex.ru/widget/script/api" type="text/javascript"></script>
        <script type="text/javascript">
            (function (w) {
                function start() {
                    w.removeEventListener("YaMarketAffiliateLoad", start);
                    w.YaMarketAffiliate.createWidget({containerId:"marketWidget",
            type:"offers",
            fallback:true,
            params:{clid:2405644,
                searchText:"<?the_title()?>",
                sovetnikPromo:false,
                searchInStock:true,
                themeId:2 },
            rotate:{marketToBeru:true } });
                }
                w.YaMarketAffiliate
                    ? start()
                    : w.addEventListener("YaMarketAffiliateLoad", start);
            })(window);
        </script>
        <!-- End Yandex.Market Widget -->                  
    </div>        
    </div>
<?php else:

 do_action('magnitude_action_archive_layout');

endif;
