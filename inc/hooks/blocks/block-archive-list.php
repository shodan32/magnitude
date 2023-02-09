<?php
/**
 * List block part for displaying page content in page.php
 *
 * @package Magnitude
 */


global $post;
$url = magnitude_get_freatured_image_url($post->ID, 'magnitude-featured');
$thumb_id = get_post_thumbnail_id($post->ID);
$show_excerpt = magnitude_get_option('archive_content_view');
$col_class = 'col-ten';
?>
<div class="archive-list-post list-style">
    <div class="read-single color-pad">
        <div class="data-bg read-img pos-rel col-2 float-l read-bg-img af-sec-list-img"
             data-background="<?php echo esc_url($url); ?>">
            <?php if (!empty($url)): ?>
                <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr(magnitude_get_img_alt($thumb_id));?>">
            <?php endif; ?>
            <a class="aft-post-image-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php echo magnitude_post_format($post->ID); ?>
            <?php magnitude_count_content_words($post->ID);   ?>
            <?php magnitude_archive_social_share_icons($post->ID); ?>

        </div>
        <div class="read-details col-2 float-l pad af-sec-list-txt color-tp-pad ptb-10">

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
            <?php if ($show_excerpt != 'archive-content-none'):?>
                <div class="read-descprition full-item-discription">
                    <div class="post-description">
                        <?php
                            if($show_excerpt == 'archive-content-excerpt') {
                                echo wp_kses_post(magnitude_get_the_excerpt($post->ID));
                            }else{
                                the_content();
                            }
                          ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'magnitude'),
        'after' => '</div>',
    ));
    ?>
</div>









