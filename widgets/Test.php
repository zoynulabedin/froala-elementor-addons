<?php
class Froala_Test_addons extends \Elementor\Widget_Base {

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
    return 'Froala Test Widgets';
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
    return __( 'Froala Test Widgets', 'froala-elementor-addons' );
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
    return 'fa fa-code';
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
        'content_section',
        [
            'label' => __( 'Content', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'dummy_text',
        [
            'label'       => __( 'Dummy Text', 'froala-elementor-addons' ),
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'input_type'  => 'text',
            'placeholder' => __( 'Some Dummy Text', 'froala-elementor-addons' ),
            'default'     => __( 'Froala Test Widgets', 'froala-elementor-addons' ),
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'image_section',
        [
            'label' => __( 'Image', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'image',
        [
            'label'   => __( 'Choose Image', 'froala-elementor-addons' ),
            'type'    => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );

    $this->add_group_control(
        \Elementor\Group_control_image_size::get_type(),
        [
            'name'      => 'image',
            'label'     => __( 'Image Size', 'froala-elementor-addons' ),
            'default'   => 'large',
            'separator' => 'none',
        ]
    );
    $this->end_controls_section();

    $this->start_controls_section(
        'fag_section',
        [
            'label' => __( 'FAQ', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control('title',[
        'label' => __( 'Title', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'FAQ Title', 'froala-elementor-addons' ),
    ]);
   
    $repeater->add_control('description',[
        'label' => __( 'Description', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => __( 'FAQ Description', 'froala-elementor-addons' ),
    ]);

    $this->add_control(
        'faq_list',
        [
            'label' => __( 'FAQ List', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
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

    $this->add_control(
        'color',
        [
            'label'     => __( 'Color', 'froala-elementor-addons' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#ff0000',
            'selectors' => [
                '{{WRAPPER}} .dummy_text' => 'color: {{color}}'
            ]
        ]
    );

    $this->add_control(
        'alignment',
        [
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'label' => __( 'Alignment', 'froala-elementor-addons' ),
            'default' => 'center',
            'options' => [
                'left' => [
                    'title' => __( 'Left', 'froala-elementor-addons' ),
                    'icon' => 'fa fa-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'froala-elementor-addons' ),
                    'icon' => 'fa fa-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'froala-elementor-addons' ),
                    'icon' => 'fa fa-align-right',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .dummy_text' => 'text-align: {{alignment}}'
            ]
        ]
    );


    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'     => 'content_typography',
            'label'    => __( 'Typography', 'froala-elementor-addons' ),
            'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .dummy_text',
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
    $dummy_text = $this->get_settings( 'dummy_text' );
    $color = $settings['color'];
    $alignment = $settings['alignment'];
    $this->add_render_attribute( 'dummy_text', 'class', 'dummy_text' );
    $this->add_inline_editing_attributes( 'dummy_text' );
   
    ?>
    <div <?php echo $this->get_render_attribute_string( 'dummy_text' ) ?>> <?php echo esc_html( $dummy_text ); ?></div>
    <?php
    echo \Elementor\Group_control_image_size::get_attachment_image_html( $settings, 'image', 'image' );

    if ( $settings['faq_list'] ) {
        foreach ( $settings['faq_list'] as $item ) {
            ?>
            <div class="faq_item">
                <div class="faq_title"><?php echo esc_html( $item['title'] ); ?></div>
                <div class="faq_content"><?php echo esc_html( $item['description'] ); ?></div>
            </div>
            <?php
        }
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
    <# 
        var image = {
           id: settings.image.id,
          url: settings.image.url,
           size: settings.image_size,
            dimensions: settings.image_custom_dimensions,
        }

        var imageUrl = elementor.imagesManager.getImageUrl( image );
    #>

    <?php
    $this->add_render_attribute( 'dummy_text', 'class', 'dummy_text' );
    $this->add_inline_editing_attributes( 'dummy_text', 'none' );
    ?>
    <div <?php echo $this->get_render_attribute_string( 'dummy_text' ) ?>> {{ settings.dummy_text }}</div>
    <image src="{{{imageUrl}}}">
    <# if ( settings.faq_list.length ) { #>
		<div class="faq_item">
			<# _.each( settings.faq_list, function( item ) { #>
                <div class="faq_title ">{{{ item.title }}}</div>
                <div class="faq_content">{{{ item.description }}}</div>
				
			<# }); #>
            </div>
		<# } #>
    <?php
  


}

}