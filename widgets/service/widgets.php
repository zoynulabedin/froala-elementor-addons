<?php

class Service extends \Elementor\Widget_Base {

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
    return 'Froala Service';
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
    return __( 'Froala Service', 'froala-elementor-addons' );
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
    return 'eicon-site-identity';
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
        'Service_Select',
        [
            'label' => __( 'Service Box', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control('service_style',[
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

    $this->add_control('service_title',[
        'label' => __( 'Service Title', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'label_block'=>true,
        'default' => __( 'Service Title', 'froala-elementor-addons' ),
    ]);

    
    $this->add_control('service_icon',[
        'label' => __( 'Service Icon', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::ICONS,
        'default' => [
            'value' => 'fas fa-star',
            'library' => 'solid',
        ],
    ]);

       
    $this->add_control('service_description',[
        'label' => __( 'Service Description', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' =>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia libero officiis nostrum officia molestias ipsam expedita! Commodi temporibus quisquam eaque?',
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
        'style_section',
        [
            'label' => __( 'Service Style', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control('service_background_color',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .serviceBox' => 'background: {{VALUE}};',
            '{{WRAPPER}} .serviceBox .service-icon' => 'background: {{VALUE}};',
            '{{WRAPPER}} .serviceBox .title' => 'background: {{VALUE}};',
        ],
        'default' => '#075f73',

    ]);

    $this->add_control('service_title_color',[
        'label' => __( 'Title Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .serviceBox .title' => 'color: {{VALUE}};',
        ],
        'default' => '#fff',
    ]);

       
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
            [
            'name' => 'servoce_title_typography',
            'selector' => '{{WRAPPER}} .serviceBox .title',
            'label' => __( 'Title Typography', 'froala-elementor-addons' ),
           
            ]
        );

        $this->add_control('service_des_bg_color',[
            'label' => __( 'Description Background Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .serviceBox:before' => 'background: {{VALUE}};',
            ],
            'default' => '#fff',
        ]);

        $this->add_control('service_description_color',[
        'label' => __( 'Description Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .serviceBox .description' => 'color: {{VALUE}};',
        ],
        ]);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                'name' => 'servoce_des_typography',
                'selector' => '{{WRAPPER}} .serviceBox .description',
                'label' => __( 'Description Typography', 'froala-elementor-addons' ),
               
                ]
            );

        $this->add_control('service_icon_color',[
            'label' => __( 'Icon Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .serviceBox .service-icon,.serviceBox .e-font-icon-svg' => 'color: {{VALUE}};',
            ],
            'default' => '#fff',
        ]);


   
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

    $settings   = $this->get_settings_for_display();
    $service_title = $settings['service_title'];
    $service_style = $settings['service_style'];
    $service_icons = $settings['service_icon'];
    $service_description = $settings['service_description'];
    $this->add_inline_editing_attributes( 'service_title','none' );
    $this->add_render_attribute( 'service_title','class','title' );
    $this->add_inline_editing_attributes( 'service_description','none' );
    $this->add_render_attribute( 'service_description','class','description' );
     
   if(is_array( $settings['service_icon'] )){
        $icon_html = '<i class="'.$settings['service_icon']['value'].'"></i>';
   }else{
        $icon_html = '<i class="'.$settings['service_icon'].'"></i>';
   }
   switch ($service_style) {
        case '1':
            ?>
             <div class="serviceBox">
                    <?php if(!empty($service_title)):?>
                    <h3 <?php echo $this->get_render_attribute_string('service_title');?>><?php _e( $service_title, 'froala-elementor-addons') ?></h3>
                    <?php endif ?>
                 
                    <div class="service-icon">
                    <span><?php echo $icon_html;?></span>
                    </div>
                    <?php if(!empty($service_description)):?>
                    <p <?php echo $this->get_render_attribute_string('service_description');?>><?php _e($service_description,'froala-elementor-addons');?></p>
                   <?php endif;?>
                </div>

            <?php 
            break;
        case '2':
            ?>
                <div class="serviceBox-2">
                <div class="service-icon-2">
                    <span><i class="fa fa-globe"></i></span>
                </div>
                <div class="service-content-2">
                    <h3 class="title-2">Web Design</h3>
                    <p class="description-2">Lorem ipsum dolor sit amet conse ctetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
                </div>
            </div>
            <?php 
            break;
        case '3':
            $service_style = 'style3';
            break;
        case '4':
            $service_style = 'style4';
            break;
        case '5':
            $service_style = 'style5';
            break;
            default:
            $service_style = 'style1';
            break;
  
}
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
    
    ?>
    <# var iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' ); 
    
    view.addInlineEditingAttributes( 'service_title', 'none' );
	view.addRenderAttribute( 'service_title', 'class', 'title' );
    view.addInlineEditingAttributes( 'service_description', 'none' );
	view.addRenderAttribute( 'service_description', 'class', 'description' );
    #>

    <div class="serviceBox">
    <# if (settings.service_title) { #>
        <h3  {{{ view.getRenderAttributeString( 'service_title' ) }}}>{{{ settings.service_title }}}</h3>
        <# } #>
        <div class="service-icon">
            <span>{{{ iconHTML.value }}} </span>
        </div>
        <# if (settings.service_description) { #>
        <p {{{ view.getRenderAttributeString( 'service_description' ) }}}>{{{ settings.service_description }}}</p>
        <# } #>
    </div>

    <?php
}



}

