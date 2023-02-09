<?php
/**
 * Implement theme metabox.
 *
 * @package Magnitude
 */

if (!function_exists('magnitude_add_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function magnitude_add_theme_meta_box()
    {

        $screens = array('post', 'page');

        foreach ($screens as $screen) {
            add_meta_box(
                'magnitude-theme-settings',
                esc_html__('Layout Options', 'magnitude'),
                'magnitude_render_layout_options_metabox',
                $screen,
                'side',
                'low'


            );
        }

    }

endif;

add_action('add_meta_boxes', 'magnitude_add_theme_meta_box');

if (!function_exists('magnitude_render_layout_options_metabox')) :

    /**
     * Render theme settings meta box.
     *
     * @since 1.0.0
     */
    function magnitude_render_layout_options_metabox($post, $metabox)
    {

        $post_id = $post->ID;

        // Meta box nonce for verification.
        wp_nonce_field(basename(__FILE__), 'magnitude_meta_box_nonce');
        // Fetch Options list.
        $content_layout = get_post_meta($post_id, 'magnitude-meta-content-alignment', true);

        if (empty($content_layout)) {
            $content_layout = magnitude_get_option('global_content_alignment');
        }


        ?>
        <div id="magnitude-settings-metabox-container" class="magnitude-settings-metabox-container">
            <div id="magnitude-settings-metabox-tab-layout">
                <div class="magnitude-row-content">
                    <!-- Select Field-->
                    <p>
                        <select name="magnitude-meta-content-alignment" id="magnitude-meta-content-alignment">

                            <option value="" <?php selected('', $content_layout); ?>>
                                <?php _e('Set as global layout', 'magnitude') ?>
                            </option>
                            <option value="align-content-left" <?php selected('align-content-left', $content_layout); ?>>
                                <?php _e('Content - Primary Sidebar', 'magnitude') ?>
                            </option>
                            <option value="align-content-right" <?php selected('align-content-right', $content_layout); ?>>
                                <?php _e('Primary Sidebar - Content', 'magnitude') ?>
                            </option>
                            <option value="full-width-content" <?php selected('full-width-content', $content_layout); ?>>
                                <?php _e('No Sidebar', 'magnitude') ?>
                            </option>
                        </select>
                    </p>
                    <small><?php esc_html_e('Please go to Customize>Frontpage Options for Homepage.', 'magnitude')?></small>

                </div><!-- .magnitude-row-content -->
            </div><!-- #magnitude-settings-metabox-tab-layout -->
        </div><!-- #magnitude-settings-metabox-container -->

        <?php
    }

endif;


if (!function_exists('magnitude_save_layout_options_meta')) :

    /**
     * Save theme settings meta box value.
     *
     * @since 1.0.0
     *
     * @param int $post_id Post ID.
     * @param WP_Post $post Post object.
     */
    function magnitude_save_layout_options_meta($post_id, $post)
    {

        // Verify nonce.
        if (!isset($_POST['magnitude_meta_box_nonce']) || !wp_verify_nonce($_POST['magnitude_meta_box_nonce'], basename(__FILE__))) {
            return;
        }

        // Bail if auto save or revision.
        if (defined('DOING_AUTOSAVE') || is_int(wp_is_post_revision($post)) || is_int(wp_is_post_autosave($post))) {
            return;
        }

        // Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
        if (empty($_POST['post_ID']) || $_POST['post_ID'] != $post_id) {
            return;
        }

        // Check permission.
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return;
            }
        } else if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $content_layout = isset($_POST['magnitude-meta-content-alignment']) ? $_POST['magnitude-meta-content-alignment'] : '';
        update_post_meta($post_id, 'magnitude-meta-content-alignment', sanitize_text_field($content_layout));


    }

endif;

add_action('save_post', 'magnitude_save_layout_options_meta', 10, 2);


//Category fields meta starts


if (!function_exists('magnitude_taxonomy_add_new_meta_field')) :
// Add term page
    function magnitude_taxonomy_add_new_meta_field()
    {
        // this will add the custom meta field to the add new term page

        $cat_color = array(
            'category-color-1' => __('Category Color Black', 'magnitude'),
            'category-color-2' => __('Category Color Gray', 'magnitude'),
            'category-color-3' => __('Category Color Silver', 'magnitude'),
            'category-color-4' => __('Category Color White', 'magnitude'),
            'category-color-5' => __('Category Color Fuchsia', 'magnitude'),
            'category-color-6' => __('Category Color Purple', 'magnitude'),
            'category-color-7' => __('Category Color Red', 'magnitude'),
            'category-color-8' => __('Category Color Maroon', 'magnitude'),
            'category-color-9' => __('Category Color Yellow', 'magnitude'),
            'category-color-10' => __('Category Color Olive', 'magnitude'),
            'category-color-11' => __('Category Color Lime', 'magnitude'),
            'category-color-12' => __('Category Color Green', 'magnitude'),
            'category-color-13' => __('Category Color Aqua', 'magnitude'),
            'category-color-14' => __('Category Color Teal', 'magnitude'),
            'category-color-15' => __('Category Color Blue', 'magnitude'),
            'category-color-16' => __('Category Color Navy', 'magnitude'),

            'category-color-17' => __('Category Color IndianRed', 'magnitude'),
            'category-color-18' => __('Category Color Salmon', 'magnitude'),
            'category-color-19' => __('Category Color Crimson', 'magnitude'),
            'category-color-20' => __('Category Color HotPink', 'magnitude'),  
            'category-color-21' => __('Category Color PaleVioletRed', 'magnitude'),
            'category-color-22' => __('Category Color Orchid', 'magnitude'),
            'category-color-23' => __('Category Color MediumPurple', 'magnitude'),
            'category-color-24' => __('Category Color PaleGreen', 'magnitude'),
            'category-color-25' => __('Category Color LightSeaGreen', 'magnitude'),
            'category-color-26' => __('Category Color SteelBlue', 'magnitude'),
            'category-color-27' => __('Category Color MidnightBlue', 'magnitude'),
            'category-color-28' => __('Category Color DarkSlateGrey', 'magnitude'),                      
        );
        ?>
        <div class="form-field">
            <label for="term_meta[color_class_term_meta]"><?php _e('Color Class', 'magnitude'); ?></label>
            <select id="term_meta[color_class_term_meta]" name="term_meta[color_class_term_meta]">
                <?php foreach ($cat_color as $key => $value): ?>
                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php endforeach; ?>
            </select>
            <p class="description"><?php _e('Select category color class. You can set appropriate categories color on "Categories" section of the theme customizer.', 'magnitude'); ?></p>
        </div>
        <?php
    }
endif;
add_action('category_add_form_fields', 'magnitude_taxonomy_add_new_meta_field', 10, 2);


if (!function_exists('magnitude_taxonomy_edit_meta_field')) :
// Edit term page
    function magnitude_taxonomy_edit_meta_field($term)
    {

        // put the term ID into a variable
        $t_id = $term->term_id;

        // retrieve the existing value(s) for this meta field. This returns an array
        $term_meta = get_option("category_color_$t_id");

        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label
                        for="term_meta[color_class_term_meta]"><?php _e('Color Class', 'magnitude'); ?></label></th>
            <td>
                <?php
                $cat_color = array(
                    'category-color-1' => __('Category Color Black', 'magnitude'),
                    'category-color-2' => __('Category Color Gray', 'magnitude'),
                    'category-color-3' => __('Category Color Silver', 'magnitude'),
                    'category-color-4' => __('Category Color White', 'magnitude'),
                    'category-color-5' => __('Category Color Fuchsia', 'magnitude'),
                    'category-color-6' => __('Category Color Purple', 'magnitude'),
                    'category-color-7' => __('Category Color Red', 'magnitude'),
                    'category-color-8' => __('Category Color Maroon', 'magnitude'),
                    'category-color-9' => __('Category Color Yellow', 'magnitude'),
                    'category-color-10' => __('Category Color Olive', 'magnitude'),
                    'category-color-11' => __('Category Color Lime', 'magnitude'),
                    'category-color-12' => __('Category Color Green', 'magnitude'),
                    'category-color-13' => __('Category Color Aqua', 'magnitude'),
                    'category-color-14' => __('Category Color Teal', 'magnitude'),
                    'category-color-15' => __('Category Color Blue', 'magnitude'),
                    'category-color-16' => __('Category Color Navy', 'magnitude'),

                    'category-color-17' => __('Category Color IndianRed', 'magnitude'),
                    'category-color-18' => __('Category Color Salmon', 'magnitude'),
                    'category-color-19' => __('Category Color Crimson', 'magnitude'),
                    'category-color-20' => __('Category Color HotPink', 'magnitude'),  
                    'category-color-21' => __('Category Color PaleVioletRed', 'magnitude'),
                    'category-color-22' => __('Category Color Orchid', 'magnitude'),
                    'category-color-23' => __('Category Color MediumPurple', 'magnitude'),
                    'category-color-24' => __('Category Color PaleGreen', 'magnitude'),
                    'category-color-25' => __('Category Color LightSeaGreen', 'magnitude'),
                    'category-color-26' => __('Category Color SteelBlue', 'magnitude'),
                    'category-color-27' => __('Category Color MidnightBlue', 'magnitude'),
                    'category-color-28' => __('Category Color DarkSlateGrey', 'magnitude'), 
                );
                ?>
                <select id="term_meta[color_class_term_meta]" name="term_meta[color_class_term_meta]">
                    <?php foreach ($cat_color as $key => $value): ?>
                        <option value="<?php echo esc_attr($key); ?>"<?php selected($term_meta['color_class_term_meta'], $key); ?> ><?php echo esc_html($value); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="description"><?php _e('Select category color class. You can set appropriate categories color on "Categories" section of the theme customizer.', 'magnitude'); ?></p>
            </td>
        </tr>
        <?php
    }
endif;
add_action('category_edit_form_fields', 'magnitude_taxonomy_edit_meta_field', 10, 2);




if (!function_exists('save_taxonomy_color_class_meta')) :
// Save extra taxonomy fields callback function.
    function save_taxonomy_color_class_meta($term_id)
    {
        if (isset($_POST['term_meta'])) {
            $t_id = $term_id;
            $term_meta = get_option("category_color_$t_id");
            $cat_keys = array_keys($_POST['term_meta']);
            foreach ($cat_keys as $key) {
                if (isset ($_POST['term_meta'][$key])) {
                    $term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            // Save the option array.
            update_option("category_color_$t_id", $term_meta);
        }
    }

endif;
add_action('edited_category', 'save_taxonomy_color_class_meta', 10, 2);
add_action('create_category', 'save_taxonomy_color_class_meta', 10, 2);

//Category fields meta ends