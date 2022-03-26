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
    return __( 'Price Table', 'froala-elementor-addons' );
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
protected function register_controls() {

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
        
        ]
    ]);

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

    $this->add_control(
        'price',
        [
            'label' => __( 'Price', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '$49.00', 'froala-elementor-addons' ),
        ]
    );

    $this->add_control(
        'duration',
        [
            'label' => __( 'Duration', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Per month', 'froala-elementor-addons' ),
        ]
      
    );


    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'content_items',
        [
            'label' => __( 'Pricing content', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __( 'Text Here for items', 'froala-elementor-addons' ),
            'label_block' => true,
        ]
    );
    $repeater->add_control('switcher',[
        'label' => __( 'Disable?', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Yes', 'froala-elementor-addons' ),
        'label_off' => __( 'No', 'froala-elementor-addons' ),
        'return_value' => 'yes',
        'default' => 'No',
    ]);

    $this->add_control(
        'content_items',
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
            'title_field' => '{{{ content_items }}}',
        ]
    );


   
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
            'default' => __( 'Sign Up', 'froala-elementor-addons' ),
        ]
    );
    $this->add_control('price_link',[
        'label' => __( 'Button URL', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::URL,
        'placeholder' => __( 'https://your-link.com', 'froala-elementor-addons' ),
        'show_external' => true,
        'default' => [
            'url' => '#',
            'is_external' => true,
            'nofollow' => true,
        ],
    ]);



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
        'price_background_section',
        [
            'label' => __( 'Background', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]

        
    );

    $this->add_control(
        'price_background_color',
        [
            'label' => __( 'Background Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pricingTable:before' => 'background-color: {{VALUE}}',
            ],
            'default' => '#054982',
        ]
    );


    
    $this->end_controls_section();


    $this->start_controls_section(
        'style_title',
        [
            'label' => __( 'Title', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => __( 'Typography', 'froala-elementor-addons' ),
            'selector' => '{{WRAPPER}} h3.title',
        ]
    );

    $this->add_control(
        'title_color',
        [
            'label' => __( 'Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} h3.title' => 'color: {{VALUE}}',
            ],
        ]
    );

   
    $this->end_controls_section();

    $this->start_controls_section(
        'style_Price',
        [
            'label' => __( 'Price', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'amount_typography',
            'label' => __( 'Typography', 'froala-elementor-addons' ),
            'selector' => '{{WRAPPER}} span.amount',
        ]
    );

    $this->add_control(
        'amount_color',
        [
            'label' => __( 'Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} span.amount' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_section();

    
    $this->start_controls_section(
        'style_Price_text',
        [
            'label' => __( 'Price Text', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'amount_text_typography',
            'label' => __( 'Typography', 'froala-elementor-addons' ),
            'selector' => '{{WRAPPER}} span.duration',
        ]
    );

    $this->add_control(
        'amount_text_color',
        [
            'label' => __( 'Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} span.duration' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_section();


        
    $this->start_controls_section(
        'style_content',
        [
            'label' => __( 'Content', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_typography',
            'label' => __( 'Typography', 'froala-elementor-addons' ),
            'selector' => '{{WRAPPER}} .pricing-content li',
        ]
    );

    $this->add_control(
        'content_color',
        [
            'label' => __( 'Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pricing-content li' => 'color: {{VALUE}}',
            ],
        ]
    );

    $this->end_controls_section();

         
    $this->start_controls_section(
        'style_button',
        [
            'label' => __( 'Button', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'button_typography',
            'label' => __( 'Typography', 'froala-elementor-addons' ),
            'selector' => '{{WRAPPER}} .pricingTable-signup a',
        ]
    );

    $this->add_control(
        'button_color',
        [
            'label' => __( 'Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pricingTable-signup a' => 'color: {{VALUE}}',
            ],
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
    $title      = $settings['title'];
    $price      = $settings['price'];
    $duration   = $settings['duration'];
    $items      = $settings['content_items'];
    $button_text= $settings['button_text'];

    $this->add_render_attribute( 'title', 'class', 'title' );
    $this->add_inline_editing_attributes( 'title' );
    $this->add_render_attribute( 'price', 'class', 'amount' );
    $this->add_inline_editing_attributes( 'price' );
    $this->add_render_attribute( 'duration', 'class', 'duration' );
    $this->add_inline_editing_attributes( 'duration' );
    $this->add_render_attribute( 'button_text', 'class', 'btn btn-primary' );
 
    if ( ! empty( $settings['price_link']['url'] ) ) {
        $this->add_link_attributes( 'price_link', $settings['price_link'] );
    }
    ?>



        <div class="pricingTable">
            <div class="pricingTable-header">
                <h3 <?php echo $this->get_render_attribute_string( 'title' ) ?>> <?php echo esc_html( $title ); ?></h3>
                <div class="price-value">
                    <span <?php echo $this->get_render_attribute_string( 'price' ) ?>><?php echo esc_html( $price ); ?></span>
                    <span <?php echo $this->get_render_attribute_string( 'duration')?>><?php echo esc_html( $duration ); ?></span>
                </div>
            </div>
            <ul class="pricing-content">
                <?php foreach ( $items as $item ) : ?>
                    <li class="<?php echo $item['switcher'] == 'yes' ? 'disable' : '' ?>">
                        <?php echo $item['content_items'] ?>
                    </li>

                <?php endforeach; ?>
            </ul>
            <?php if(!empty($settings['price_link']['url'])) : ?>
            <div class="pricingTable-signup">
                <a <?php echo $this->get_render_attribute_string( 'price_link' ); ?> ><?php echo esc_html($button_text);?></a>
            </div>
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

   
    $this->add_render_attribute( 'title', 'class', 'title' );
    $this->add_inline_editing_attributes( 'title' );
    $this->add_render_attribute( 'price', 'class', 'amount' );
    $this->add_inline_editing_attributes( 'price' );
    $this->add_render_attribute( 'duration', 'class', 'duration' );
    $this->add_inline_editing_attributes( 'duration' );
    $this->add_render_attribute( 'button_text', 'class', 'btn btn-primary' );
 
    if ( ! empty( $settings['price_link']['url'] ) ) {
        $this->add_link_attributes( 'price_link', $settings['price_link'] );
    }
    
    ?>
    


    <div class="pricingTable">
        <div class="pricingTable-header">
            <h3  <?php echo $this->get_render_attribute_string( 'title' ) ?> >{{{settings.title}}}</h3>
            <div class="price-value">
                <span <?php echo $this->get_render_attribute_string( 'price' ) ?> >{{{settings.price}}}</span>
                <span <?php echo $this->get_render_attribute_string( 'duration' ) ?>>{{{settings.duration}}}</span>
            </div>
        </div>
        <# if ( settings.content_items.length ) { #>
        <ul class="pricing-content">
        <# _.each( settings.content_items, function( item ) { #>
            <li>{{{ item.content_items }}}</li>
            
            <# }); #>
        </ul>
        <# } #>
        <div class="pricingTable-signup">
            <a <?php echo $this->get_render_attribute_string( 'price_link' ); ?>>{{{settings.button_text }}}</a>
        </div>
    </div>
      

    <?php
}

}