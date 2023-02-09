<?php


/**
 * Returns all categories.
 *
 * @since Magnitude 1.0.0
 */
if (!function_exists('magnitude_get_terms')):
    function magnitude_get_terms($category_id = 0, $taxonomy = 'category', $default = '')
    {
        $taxonomy = !empty($taxonomy) ? $taxonomy : 'category';

        if ($category_id > 0) {
            $term = get_term_by('id', absint($category_id), $taxonomy);
            if ($term)
                return esc_html($term->name);


        } else {
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => true,
            ));


            if (isset($terms) && !empty($terms)) {
                foreach ($terms as $term) {
                    if ($default != 'first') {
                        $array['0'] = __('Select Category', 'magnitude');
                    }
                    $array[$term->term_id] = esc_html($term->name);
                }

                return $array;
            }
        }
    }
endif;

/**
 * Returns all categories.
 *
 * @since Magnitude 1.0.0
 */
if (!function_exists('magnitude_get_terms_link')):
    function magnitude_get_terms_link($category_id = 0)
    {

        if (absint($category_id) > 0) {
            return get_term_link(absint($category_id), 'category');
        } else {
            return get_post_type_archive_link('post');
        }
    }
endif;

/**
 * Returns word count of the sentences.
 *
 * @since Magnitude 1.0.0
 */
if (!function_exists('magnitude_get_excerpt')):
    function magnitude_get_excerpt($length = 25, $magnitude_content = null, $post_id = 1)
    {
        $widget_excerpt = magnitude_get_option('global_widget_excerpt_setting');
        if ($widget_excerpt == 'default-excerpt') {
            return the_excerpt();
        }

        $length = absint($length);
        $source_content = preg_replace('`\[[^\]]*\]`', '', $magnitude_content);
        $trimmed_content = wp_trim_words($source_content, $length, '...');
        return $trimmed_content;
    }
endif;

/**
 * Returns no image url.
 *
 * @since Magnitude 1.0.0
 */
if (!function_exists('magnitude_no_image_url')):
    function magnitude_no_image_url()
    {
        $url = get_template_directory_uri() . '/assets/images/no-image.png';
        return $url;
    }

endif;


/**
 * Outputs the tab posts
 *
 * @since 1.0.0
 *
 * @param array $args Post Arguments.
 */
if (!function_exists('magnitude_render_posts')):
    function magnitude_render_posts($type, $number_of_posts, $category = '0', $show_categoy = 'false', $tag_in = '')
    {

        $args = array();

        switch ($type) {
            case 'popular':
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => absint($number_of_posts),
                    'orderby' => 'comment_count',
                    'ignore_sticky_posts' => true
                );
                break;

            case 'recent':
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => absint($number_of_posts),
                    'orderby' => 'date',
                    'ignore_sticky_posts' => true
                );
                break;

            case 'tags':
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => absint($number_of_posts),
                    'orderby' => 'date',
                    'ignore_sticky_posts' => true
                );
                $tagsl = get_tags( array('name__like' => $tag_in) );
                $tags = array();
                if (!empty($tagsl)) {
                    foreach ($tagsl as $key => $item) {
                        $tags[] = $item->term_id;
                    }
                }
                if (!empty($tags)) {
                    $args['tag__in'] = $tags;
                }                
                break;                

            case 'categorised':
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => absint($number_of_posts),
                    'ignore_sticky_posts' => true
                );
                $category = isset($category) ? $category : '0';
                if (absint($category) > 0) {
                    $args['cat'] = absint($category);
                }
                break;


            default:
                break;
        }

        if (!empty($args) && is_array($args)) {
            $all_posts = new WP_Query($args);
            if ($all_posts->have_posts()):
                echo '<ul class="article-item article-list-item article-tabbed-list article-item-left">';
                while ($all_posts->have_posts()): $all_posts->the_post();
                    global $post;
                    ?>
                    <li class="af-double-column list-style">
                        <div class="read-single clearfix color-pad">
                            <?php
                            if (has_post_thumbnail()) {
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                                $url = $thumb['0'];
                                $thumb_id = get_post_thumbnail_id($post->ID);
                                $col_class = 'col-sm-8';
                            } else {
                                $url = '';
                                $col_class = 'col-sm-12';
                            }
                            
                            ?>
                            <?php if (!empty($url)): ?>
                                <div class="data-bg read-img pos-rel col-4 float-l read-bg-img"
                                     data-background="<?php echo esc_url($url); ?>">

                                    <?php if(!empty($url)): ?>
                                        <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr(magnitude_get_img_alt($thumb_id));?>">
                                    <?php endif; ?>
                                    <a class="aft-post-image-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                </div>
                            <?php endif; ?>
                            <div class="read-details col-75 float-l pad color-tp-pad">
                                <div class="full-item-metadata primary-font">
                                    <?php if ($show_categoy == 'true'): ?>
                                        <div class="figure-categories figure-categories-bg clearfix">
                                            <?php magnitude_post_categories('/'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="full-item-content">
                                    <div class="read-title">
                                        <h4>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                endwhile;
                wp_reset_postdata();
                echo '</ul>';
            endif;
        }
    }
endif;

