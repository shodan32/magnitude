<?php
/**
 * List block part for displaying page content in page.php
 *
 * @package Magnitude
 */

?>

<div class="promotionspace enable-promotionspace">

    <?php if (is_active_sidebar('single-posts-advertisement-widgets')): ?>
        <div class="em-posts-promotions col col-ten">
            <?php dynamic_sidebar('single-posts-advertisement-widgets'); ?>
        </div>
    <?php endif; ?>
    <div class="af-reated-posts magnitude-customizer">
            <?php
            global $post;
            $categories = get_the_category($post->ID);
            $related_section_title = esc_attr(magnitude_get_option('single_related_posts_title'));
            $number_of_related_posts = esc_attr(magnitude_get_option('single_number_of_related_posts'));

            if ($categories) {
            $cat_ids = array();
            foreach ($categories as $category) $cat_ids[] = $category->term_id;
            $args = array(
                'category__in' => $cat_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page' => $number_of_related_posts, // Number of related posts to display.
                'ignore_sticky_posts' => 1
            );
            $related_posts = new wp_query($args);

            if (!empty($related_posts)) { ?>
                <h4 class="related-title widget-title header-after1">
                    <span class="header-after">
                        <?php echo esc_html($related_section_title); ?>
                    </span>    
                </h4>
            <?php }
            ?>
            <div class="af-container-row clearfix">
                <?php
                $count = 0;
                while ($related_posts->have_posts()) {
                    $related_posts->the_post();
                    $count++;
                    global $post;
                    $url = magnitude_get_freatured_image_url($post->ID, 'magnitude-medium');
                    $thumb_id = get_post_thumbnail_id($post->ID);
                    if(!empty($url)){
                        $col_class = 'col-five';
                    }else{
                        $col_class = 'col-ten';
                    }
                    ?>
                    <div class="col-3 float-l pad latest-posts-grid af-sec-post" data-mh="latest-posts-grid">
                        <div class="read-single color-pad">
                            <div class="data-bg read-img pos-rel read-bg-img"
                                 data-background="<?php echo esc_url($url); ?>">
                                <?php if(!empty($url)): ?>
                                    <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr(magnitude_get_img_alt($thumb_id));?>">
                                <?php endif; ?>                         <a class="aft-post-image-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <?php echo magnitude_post_format($post->ID); ?>
                                <?php magnitude_count_content_words($post->ID);   ?>
                                <?php magnitude_archive_social_share_icons($post->ID); ?>

                            </div>
                            <div class="read-details color-tp-pad pad ptb-10">

                                <div class="read-categories">
                                    <?php magnitude_post_categories(); ?>
                                </div>
                                <div class="read-title">
                                    <h4>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                </div>

                                <div class="entry-meta">
                                    <?php magnitude_post_item_meta(); ?>

                                    <?php magnitude_get_comments_views_share($post->ID); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php if ($count == 3) : ?>
                    <div class="col-3 float-l pad latest-posts-grid af-sec-post" data-mh="latest-posts-grid">
                        <div class="read-single color-pad">     
                            <?php if ( is_active_sidebar( 'post_banner_1' ) ) : ?>
	                            <div id="post-banner-1-sidebar" class="post-banner-1-sidebar widget-area" role="complementary">
		                            <?php dynamic_sidebar( 'post_banner_1' ); ?>
	                            </div><!-- #post-banner-1-sidebar -->
                            <?php endif; ?>                
                        </div>
                    </div>
                    <?php endif; ?>
                <?php }
                }
                wp_reset_postdata();
                ?>
            </div>

    </div>
</div>


