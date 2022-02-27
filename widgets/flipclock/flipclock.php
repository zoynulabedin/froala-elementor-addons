<?php

class Flipclock extends \Elementor\Widget_Base {

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
    return 'Flipclock';
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
    return __( 'Flipclock', 'froala-elementor-addons' );
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
    return 'eicon-clock';
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
        'flipclock-content',
        [
            'label' => __( 'Content', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

  $this->add_control('display_type', [
    'label' => __( 'Display Type', 'froala-elementor-addons' ),
    'type' => \Elementor\Controls_Manager::SELECT,
    'default' => 'clock',
    'options' => [
      'clock'  => __( 'Clock', 'froala-elementor-addons' ),
      'timerc' => __( 'Time Countdown', 'froala-elementor-addons' ),
      'generic' => __( 'Normal Countdown', 'froala-elementor-addons' ),
    ],
  ]);

  $this->add_control('clock_type', [
    'label' => __( 'Clock Type', 'froala-elementor-addons' ),
    'type' => \Elementor\Controls_Manager::SELECT,
    'default' => '24',
    'options' => [
      '12'  => __( '12 Hours', 'froala-elementor-addons' ),
      '24' => __( '24 Hours', 'froala-elementor-addons' ),
    ],
    'condition' => [
      'display_type' => 'clock',
    ],
  
  ]);
  $this->add_control('target_clock_time',[
    'label' => __( 'Target Time', 'froala-elementor-addons' ),
    'type' => \Elementor\Controls_Manager::DATE_TIME,
    'default' => '',
    'condition' => [
      'display_type' => 'timerc',
    ],
  
  ]);
  $this->add_control('generic_coundown',[
    'label' => __( 'Countdown', 'froala-elementor-addons' ),
    'type' => \Elementor\Controls_Manager::NUMBER,
    'default' => '',
    'condition' => [
      'display_type' => 'generic',
    ],
  ]);
    $this->add_control('generic_decrese_mili',[
      'label' => __( 'Decrease by (Miliseconds)', 'froala-elementor-addons' ),
      'type' => \Elementor\Controls_Manager::NUMBER,
      'default' => 1000,
      'condition' => [
        'display_type' => 'generic',
      ],

  ]);

  $this->add_control(
    'dot_color',
    [
      'label' => esc_html__( 'Dot Color', 'froala-elementor-addons' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .flip-clock-dot' => 'background: {{VALUE}}',
      ],
      'default' => '#333333',
      'condition' => [
        'display_type' => array('clock','timerc'),
      ],
    ]
  );
  $this->add_control(
    'ampm_color',
    [
      'label' => esc_html__( 'AM/PM Color', 'froala-elementor-addons' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .flip-clock-wrapper a' => 'color: {{VALUE}}',
      ],
      'default' => '#333333',
      'condition' => [
        'display_type' => array('clock'),
      ],
    ]
  );
  $this->add_control(
    'ampm_color_hover',
    [
      'label' => esc_html__( 'AM/PM Hover Color', 'froala-elementor-addons' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .flip-clock-wrapper a:hover' => 'color: {{VALUE}}',
      ],
      'default' => '#333333',
      'condition' => [
        'display_type' => array('clock'),
      ],
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
   
    $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .flip-clock-wrapper ul li a div div.inn',
			]
		);


    $this->add_control(
			'number_color',
			[
				'label' => esc_html__( 'Number Color', 'froala-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .flip-clock-wrapper ul li a div div.inn' => 'color: {{VALUE}}',
				],
        'default' => '#ffffff',
			]
		);

    $this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'froala-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .flip-clock-wrapper ul li a div div.inn' => 'background-color: {{VALUE}}',
				],
        'default' =>'#333333',
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

    $settings   = $this->get_settings_for_display(); 
    $display_type = $this->get_settings('display_type');
    $clock_type = $this->get_settings('clock_type');
    $target_time = $this->get_settings('target_clock_time');
    $generic_countdown = $this->get_settings('generic_coundown');
    $generic_decrese_mili = $this->get_settings('generic_decrese_mili');
   
    ?>

    <div class="flipclock" 
    data-display_type="<?php echo $display_type;?>" 
    data-clock_type="<?php echo $clock_type;?>" 
    data-target_clock_time="<?php echo $target_time;?>"
    data-generic_coundown="<?php echo $generic_countdown;?>"
    data-generic_decrese_mili="<?php echo $generic_decrese_mili;?>" >
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
// protected function _content_template() {

  
// }

}