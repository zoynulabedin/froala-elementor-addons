<?php

class Froala_Price_table extends \Elementor\Widget_Base {

/**
 * Get widget name.
 *
 * Retrieve Blank widget name.
 *
 * @return string Widget name.
 * @since 1.0.0
 * @access public
 *
 */
public function get_name() {
    return 'Froala Price Table';
}

/**
 * Get widget title.
 *
 * Retrieve Blank widget title.
 *
 * @return string Widget title.
 * @since 1.0.0
 * @access public
 *
 */
public function get_title() {
    return __( 'Froala Price Table', 'froala-elementor-addons' );
}

/**
 * Get widget icon.
 *
 * Retrieve Blank widget icon.
 *
 * @return string Widget icon.
 * @since 1.0.0
 * @access public
 *
 */
public function get_icon() {
    return 'eicon-price-table';
}

/**
 * Get widget categories.
 *
 * Retrieve the list of categories the Blank widget belongs to.
 *
 * @return array Widget categories.
 * @since 1.0.0
 * @access public
 *
 */
public function get_categories() {
    return [ 'froala' ];
}

/**
 * Register Blank widget controls.
 *
 * Adds different input fields to allow the user to change and customize the widget settings.
 *
 * @since 1.0.0
 * @access protected
 */
protected function _register_controls() {

    $this->register_content_controls();
    $this->register_style_controls();

}

/**
 * Register Blank widget content ontrols.
 *
 * Adds different input fields to allow the user to change and customize the widget settings.
 *
 * @since 1.0.0
 * @access protected
 */
function register_content_controls() {


    $this->start_controls_section(
        'price_table_Design',
        [
            'label' => __( 'Select Design', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control('selectdesign',[
        'label' => __( 'Select Design', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => '1',
        'options' => [
            '1'  => __( 'Design 1', 'froala-elementor-addons' ),
            '2' => __( 'Design 2', 'froala-elementor-addons' ),
            '3' => __( 'Design 3', 'froala-elementor-addons' ),
            '4' => __( 'Design 4', 'froala-elementor-addons' ),
            '5' => __( 'Design 5', 'froala-elementor-addons' ),
            '6' => __( 'Design 6', 'froala-elementor-addons' ),
            '7' => __( 'Design 7', 'froala-elementor-addons' ),
            '8' => __( 'Design 8', 'froala-elementor-addons' ),
            '9' => __( 'Design 9', 'froala-elementor-addons' ),
            '10' => __( 'Design 10', 'froala-elementor-addons' ),
            '11' => __( 'Design 11', 'froala-elementor-addons' ),
            '12' => __( 'Design 12', 'froala-elementor-addons' ),
            '13' => __( 'Design 13', 'froala-elementor-addons' ),
            '14' => __( 'Design 14', 'froala-elementor-addons' ),
            '15' => __( 'Design 15', 'froala-elementor-addons' ),
            '16' => __( 'Design 16', 'froala-elementor-addons' ),
            '17' => __( 'Design 17', 'froala-elementor-addons' ),
            '18' => __( 'Design 18', 'froala-elementor-addons' ),
            '19' => __( 'Design 19', 'froala-elementor-addons' ),
            '20' => __( 'Design 20', 'froala-elementor-addons' ),
        ]
    ]);

    $this->end_controls_section();


    $this->start_controls_section(
        'feature_table_switcher',
        [
            'label' => __( 'Enable Featured ?', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'enable_featured',
        [
            'label' => esc_html__( 'Enable Featured?', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Featured', 'froala-elementor-addons' ),
            'label_off' => esc_html__( 'Basic', 'froala-elementor-addons' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );


    $this->end_controls_section();

    $this->start_controls_section(
        'content_section',
        [
            'label' => __( 'Content', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'title',
        [
            'label' => __( 'Title', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Basic', 'froala-elementor-addons' ),
        ]
    );

    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'Item',
        [
            'label' => __( 'item', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __( 'Text Here for items', 'froala-elementor-addons' ),
            'label_block' => true,
        ]
    );

    $this->add_control(
        'items',
        [
            'label' => __( 'Items', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
          
            'default' => [
                [
                    'Item' => __( 'Item #1', 'froala-elementor-addons' ),
                ],
                [
                    'Item' => __( 'Item #2', 'froala-elementor-addons' ),
                ],
                [
                    'Item' => __( 'Item #3', 'froala-elementor-addons' ),
                ],
            ],
            'title_field' => '{{{ Item }}}',
        ]
    );

    $this->add_control('Price',[
        'label' => __( 'Price', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( '$99', 'froala-elementor-addons' ),
    
    ]);
    $this->end_controls_section();


    $this->start_controls_section(
        'price_table_buttons',
        [
            'label' => __( 'Button', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'button_text',
        [
            'label' => __( 'Button Text', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Buy Now', 'froala-elementor-addons' ),
        ]
    );
    $this->add_control(
        'button_link',
        [
            'label' => __( 'Button Link', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'froala-elementor-addons' ),
            'show_external' => true,
            'default' => [
                'url' => '#',
                'is_external' => true,
                'nofollow' => true,
            ],
        ]
    );


    $this->end_controls_section();

    $this->start_controls_section(
        'price_table_settings',
        [
            'label' => __( 'Settings', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );


    $this->end_controls_section();

}

/**
 * Register Blank widget style ontrols.
 *
 * Adds different input fields in the style tab to allow the user to change and customize the widget settings.
 *
 * @since 1.0.0
 * @access protected
 */
protected function register_style_controls() {

    $this->start_controls_section(
        'style_section',
        [
            'label' => __( 'Text Style', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );



   
    $this->end_controls_section();

   
}

/**
 * Render Blank widget output on the frontend.
 *
 * Written in PHP and used to generate the final HTML.
 *
 * @since 1.0.0
 * @access protected
 */
protected function render() {

    $settings   = $this->get_settings_for_display(); //and echo $settings['dummy_text']
    $this->add_render_attribute( 'title', 'class', 'heading' );
    $this->add_inline_editing_attributes( 'title' );
    $this->add_render_attribute( 'Price', 'class', 'h1 mt-5 mb-5' );
    $this->add_inline_editing_attributes( 'Price' );
    $this->add_render_attribute( 'button_text', 'class', 'btn btn-primary' );
    if ( ! empty( $settings['button_link']['url'] ) ) {
        $this->add_link_attributes( 'button_link', $settings['button_link'] );
    }


    ?>

        <div class="fdb-box">
              <h2 <?php echo $this->get_render_attribute_string( 'title' ) ?> ><?php echo _e($settings['title'],'froala-elementor-addons');?></h2>
              <?php if(!empty($settings['items'])): ?>
            <ul class="price-table-ul">
         <?php foreach($settings['items'] as $single):?>
            <li class="lead"><?php _e($single['Item']);?></li>
            <?php endforeach; ?>
            </ul>
              <?php endif;?>
    
              <p <?php echo $this->get_render_attribute_string( 'Price' ) ?>><?php _e($settings['Price'])?></p>
                <?php if(!empty($settings['button_text'])):?>
              <p><a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> <?php echo $this->get_render_attribute_string( 'button_text' ) ?>><?php _e($settings['button_text']);?></a></p>
              <?php endif;?>
        </div>

    <?php 


}

/**
 * Render Blank widget output on the frontend.
 *
 * Written in JS and used to generate the final HTML.
 *
 * @since 1.0.0
 * @access protected
 */
protected function _content_template() {

    $this->add_render_attribute( 'title', 'class', 'heading' );
    $this->add_inline_editing_attributes( 'title' );
    $this->add_render_attribute( 'Price', 'class', 'h1 mt-5 mb-5' );
    $this->add_inline_editing_attributes( 'Price' );
    $this->add_render_attribute( 'button_text', 'class', 'btn btn-primary' );
    if ( ! empty( $settings['button_link']['url'] ) ) {
        $this->add_link_attributes( 'button_link', $settings['button_link'] );
    }
    $this->add_inline_editing_attributes( 'button_text' );
    
    ?>



        <div class="fdb-box px-4 pt-5">
              <h2 <?php echo $this->get_render_attribute_string( 'title' ) ?> >{{{ settings.title }}}</h2>
              <# if ( settings.items.length ) { #>
              <ul class="price-table-ul">
              <# _.each( settings.items, function( single ) { #>
                <li class="lead">{{{ single.Item }}}</li>
                <# }); #>
             </ul>
             <# } #>
    
              <p <?php echo $this->get_render_attribute_string( 'Price' ) ?>>{{{settings.Price}}}</p>
              <?php if(!empty($settings['button_text'])):?>
              <p><a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> <?php echo $this->get_render_attribute_string( 'button_text' ) ?>>{{{settings.button_text }}}</a></p>
              <?php endif;?>
        </div>

    <?php
}

}