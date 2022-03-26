<?php

class EmailSignature extends \Elementor\Widget_Base {

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
    return 'Email Signature';
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
    return __( 'Email Signature', 'froala-elementor-addons' );
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
    return 'eicon-single-post';
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
        'email_signature_style',
        
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
            '1'  => __( 'item 1', 'froala-elementor-addons' ),
            '2' => __( 'item 2', 'froala-elementor-addons' ),
            '3' => __( 'item 3', 'froala-elementor-addons' ),
            '4' => __( 'item 4', 'froala-elementor-addons' ),
            '5' => __( 'item 5', 'froala-elementor-addons' ),
            
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

        <div class="email-signature">
            <div class="signature-icon">
                <img src="images/img-1.jpg" alt="">
            </div>
            <div class="signature-details">
                <h2 class="title">Miranda <span>Roy</span></h2>
                <span class="post">web designer</span>
                <ul class="social-links">
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            <ul class="signature-content">
                <li><i class="fa fa-phone"></i> (123)456-7890</li>
                <li><i class="fa fa-envelope"></i> example1@example.com</li>
                <li><i class="fas fa-map-marker-alt"></i> Full address here,Town</li>
            </ul>
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

    // $this->add_render_attribute( 'title', 'class', 'heading' );
    // $this->add_inline_editing_attributes( 'title' );
    // $this->add_render_attribute( 'Price', 'class', 'h1 mt-5 mb-5' );
    // $this->add_inline_editing_attributes( 'Price' );
    // $this->add_render_attribute( 'button_text', 'class', 'btn btn-primary' );
    // if ( ! empty( $settings['button_link']['url'] ) ) {
    //     $this->add_link_attributes( 'button_link', $settings['button_link'] );
    // }
    // $this->add_inline_editing_attributes( 'button_text' );
    
    ?>


    <div class="pricingTable">
        <div class="pricingTable-header">
            <h3 class="title">Standard</h3>
            <div class="price-value">
                <span class="amount">$10.00</span>
                <span class="duration">Per Month</span>
            </div>
        </div>
        <ul class="pricing-content">
            <li>50GB Disk Space</li>
            <li>50 Email Accounts</li>
            <li>50GB Bandwidth</li>
            <li class="disable">Maintenance</li>
            <li class="disable">15 Subdomains</li>
        </ul>
        <div class="pricingTable-signup">
            <a href="#">Sign Up</a>
        </div>
    </div>
      

    <?php
}

}