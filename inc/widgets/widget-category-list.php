<?php
if (!class_exists('Magnitude_Category_List')) :
    /**
     * Adds Magnitude_Category_List widget.
     */
    class Magnitude_Category_List extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('magnitude-category-list-title', 'magnitude-category-list-title-1', 'magnitude-category-list-title-2', 'magnitude-category-list-title-3', 'magnitude-category-list-title-4', 'magnitude-category-list-1', 'magnitude-category-list-2','magnitude-category-list-3', 'magnitude-category-list-4','magnitude-category-image-1','magnitude-category-image-2','magnitude-category-image-3','magnitude-category-image-4');

            $this->select_fields = array('magnitude-show-excerpt', 'magnitude-enable-categorised-tab', 'magnitude-select-category', 'magnitude-show-category');

            $widget_ops = array(
                'classname' => 'magnitude_category_list_widget',
                'description' => __('Displays tabbed posts lists from selected settings.', 'magnitude'),
                'customize_selective_refresh' => false,

            );

            parent::__construct('magnitude_category_list', __('AFTM Category List', 'magnitude'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {
            $instance = parent::magnitude_sanitize_data($instance, $instance);
            $tab_id = 'tabbed-' . $this->number;


            /** This filter is documented in wp-includes/default-widgets.php */

            $show_category =  'true';

            $titlle = isset($instance['magnitude-category-list-title']) ? $instance['magnitude-category-list-title'] : __('Title', 'magnitude');
            $catlisst = array(
                1 => array(
                    'title' => isset($instance['magnitude-category-list-title-1']) ? $instance['magnitude-category-list-title-1'] : __('Title', 'magnitude'),
                    'cat_id' => isset($instance['magnitude-category-list-1']) ? $instance['magnitude-category-list-1'] : 0,
                    'image' => isset($instance['magnitude-category-image-1']) ? $instance['magnitude-category-image-1'] : ''
                ),
                2 => array(
                    'title' => isset($instance['magnitude-category-list-title-2']) ? $instance['magnitude-category-list-title-2'] : __('Title', 'magnitude'),
                    'cat_id' => isset($instance['magnitude-category-list-2']) ? $instance['magnitude-category-list-2'] : 0,
                    'image' => isset($instance['magnitude-category-image-2']) ? $instance['magnitude-category-image-2'] : ''
                ),
                3 => array(
                    'title' => isset($instance['magnitude-category-list-title-3']) ? $instance['magnitude-category-list-title-3'] : __('Title', 'magnitude'),
                    'cat_id' => isset($instance['magnitude-category-list-3']) ? $instance['magnitude-category-list-3'] : 0,
                    'image' => isset($instance['magnitude-category-image-3']) ? $instance['magnitude-category-image-3'] : ''
                ),
                4 => array(
                    'title' => isset($instance['magnitude-category-list-title-4']) ? $instance['magnitude-category-list-title-4'] : __('Title', 'magnitude'),
                    'cat_id' => isset($instance['magnitude-category-list-4']) ? $instance['magnitude-category-list-4'] : 0,
                    'image' => isset($instance['magnitude-category-image-4']) ? $instance['magnitude-category-image-4'] : ''
                ),
            );


            // open the widget container
            echo $args['before_widget'];
            $featured_categories = array();

            ?>
                <div class="af-title-subtitle-wrap">
                    <h4 class="widget-title header-after1">
                        <span class="header-after"><?=$titlle?></span>
                    </h4>
                </div>

            <?php
            for( $i=1; $i<5 ;$i++){
                $category_id = $catlisst[$i]['cat_id'];
                if(absint($category_id) > 0){

                    if ($catlisst[$i]['image']) {
                        $image_attributes = wp_get_attachment_image_src($catlisst[$i]['image'], 'magnitude-medium');
                        $image_src = $image_attributes[0];
                        $image_class = 'data-bg data-bg-hover';
        
                    } else {
                        $image_src = '';
                        $image_class = 'no-bg';
                    }

                    $featured_categories['feature_'.$i][]= $category_id;
                    $featured_categories['feature_'.$i][]= $image_src;
                    $featured_categories['feature_'.$i][]= $catlisst[$i]['title'];
                    $featured_categories['feature_'.$i][]= get_category_link($category_id);
                }
            }

            ?>
                <div>
            <?php
        
            if(isset($featured_categories)):
                $count = 1;
                    foreach ($featured_categories as $fc):
                        ?>
                        <div class="featured-category-item pad float-l">
                            <div class="read-img pos-rel read-img read-bg-img data-bg"
                                 data-background="<?php echo esc_url($fc[1]); ?>">
                                <?php if (!empty($fc[1])): ?>
                                    <img src="<?php echo esc_url($fc[1]); ?>" alt="">
                                <?php endif; ?>
                                <a href="<?php echo esc_url($fc[3]);?>">
                                    <span><?php echo esc_html($fc[2]); ?></span>
                                </a>
                            </div><!-- read-img pos-rel read-img read-bg-img data-bg-->
                        </div><!--featured-category-item-->
                        
                    <?php
                      $count++;
                      if ($count == 5) {
                          ?>
                            </div>
                            <div class="af-container-row af-widget-body">
                          <?php
                      }
                    endforeach;
                endif;
                ?> </div> <?php

            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;

            $categories = magnitude_get_terms();

            if (isset($categories) && !empty($categories)) {

                echo parent::magnitude_generate_text_input('magnitude-category-list-title', __('Title', 'magnitude'), __('Title', 'magnitude'));

                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::magnitude_generate_text_input('magnitude-category-list-title-1', __('Title - 1', 'magnitude'), __('Title - 1', 'magnitude'));
                echo parent::magnitude_generate_select_options('magnitude-category-list-1', __('Select category', 'magnitude'), $categories);
                echo parent::magnitude_generate_image_upload('magnitude-category-image-1', __('Profile image', 'magnitude'), __('Profile image', 'magnitude'));

                echo parent::magnitude_generate_text_input('magnitude-category-list-title-2', __('Title - 2', 'magnitude'), __('Title - 2', 'magnitude'));
                echo parent::magnitude_generate_select_options('magnitude-category-list-2', __('Select category', 'magnitude'), $categories);
                echo parent::magnitude_generate_image_upload('magnitude-category-image-2', __('Profile image', 'magnitude'), __('Profile image', 'magnitude'));

                echo parent::magnitude_generate_text_input('magnitude-category-list-title-3', __('Title - 3', 'magnitude'), __('Title - 3', 'magnitude'));
                echo parent::magnitude_generate_select_options('magnitude-category-list-3', __('Select category', 'magnitude'), $categories);
                echo parent::magnitude_generate_image_upload('magnitude-category-image-3', __('Profile image', 'magnitude'), __('Profile image', 'magnitude'));

                echo parent::magnitude_generate_text_input('magnitude-category-list-title-4', __('Title - 4', 'magnitude'), __('Title - 4', 'magnitude'));
                echo parent::magnitude_generate_select_options('magnitude-category-list-4', __('Select category', 'magnitude'), $categories);
                echo parent::magnitude_generate_image_upload('magnitude-category-image-4', __('Profile image', 'magnitude'), __('Profile image', 'magnitude'));

            }

        }
    }
endif;