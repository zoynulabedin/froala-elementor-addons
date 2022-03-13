<?php

class Team extends \Elementor\Widget_Base {

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
    return 'Team';
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
    return __( 'Team', 'froala-elementor-addons' );
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
    return 'eicon-lock-user';
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
        'team-section',
        [
            'label' => __( 'Settings', 'froala-elementor-addons' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
       
    );

    $this->add_control(
        'team_select', 
        [
        'label' => __( 'Select Style', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'options' => [
            '1' => __( 'Style 1', 'froala-elementor-addons' ),
            '2' => __( 'Style 2', 'froala-elementor-addons' ),
            '3' => __( 'Style 3', 'froala-elementor-addons' ),
            '4' => __( 'Style 4', 'froala-elementor-addons' ),
            '5' => __( 'Style 5', 'froala-elementor-addons' ),
            '6' => __( 'Style 6', 'froala-elementor-addons' ),
            '7' => __( 'Style 7', 'froala-elementor-addons' ),
            '8' => __( 'Style 8', 'froala-elementor-addons' ),
            '9' => __( 'Style 9', 'froala-elementor-addons' ),
            '10' => __( 'Style 10', 'froala-elementor-addons' ),
            '11' => __( 'Style 11', 'froala-elementor-addons' ),
            '12' => __( 'Style 12', 'froala-elementor-addons' ),
            '13' => __( 'Style 13', 'froala-elementor-addons' ),
            '14' => __( 'Style 14', 'froala-elementor-addons' ),
            '15' => __( 'Style 15', 'froala-elementor-addons' ),
            '16' => __( 'Style 16', 'froala-elementor-addons' ),
            '17' => __( 'Style 17', 'froala-elementor-addons' ),
            '18' => __( 'Style 18', 'froala-elementor-addons' ),
            '19' => __( 'Style 19', 'froala-elementor-addons' ),
            '20' => __( 'Style 20', 'froala-elementor-addons' ),
        ],
    ]
);

    $this->end_controls_section();


    $this->start_controls_section(
        'team-content',
        [
            'label' => __( 'Content', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'team_image',
        [
            'label' => __( 'Team Image', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
    );
    
    $this->add_control(
        'team_name',
        [
            'label' => __( 'Name', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'John Doe', 'froala-elementor-addons' ),
        ]
    );
    $this->add_control(
        'team_position',
        [
            'label' => __( 'Position', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'John Doe', 'froala-elementor-addons' ),
        ]
    );

    $this->add_control(
        'team_email_control',
        [
            'label' => __( 'Email', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'John@gmail.com', 'froala-elementor-addons' ),
            'condition' => [
                'team_select' => '17',
              ],
        ]
        
    );
    
    $repeater = new \Elementor\Repeater();
    $repeater->add_control(
        'icon',
        [
            'label' => esc_html__( 'Icon', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fa fa-facebook',
                'library' => 'solid',
            ],
        ]
    );
   $repeater->add_control(
        'icon_url',
        [
            'label' => esc_html__( 'Icon URL', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => 'https://social-link.com',
            'default' => [
                'url' => '',
                'is_external' => true,
                'nofollow' => true,
                'custom_attributes' => '',
            ],

        ]
    );
   
    $this->add_control(
        'social_list',
        [
            'label' => esc_html__( 'Social Icons', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'icon' => esc_html__( 'Facebook', 'froala-elementor-addons' ),
                    'icon_url' => esc_html__( 'Url', 'froala-elementor-addons' ),
                    
                ],
                [
                    'icon' => esc_html__( 'Twitter', 'froala-elementor-addons' ),
                    'icon_url' => esc_html__( 'Url', 'froala-elementor-addons' ),
                    
                ],
                [
                    'icon' => esc_html__( 'Instagram', 'froala-elementor-addons' ),
                    'icon_url' => esc_html__( 'Url', 'froala-elementor-addons' ),
                    
                ],
            ],
            'title_field' => '{{{ list_icon }}}',
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
            'label' => __( 'Background Color', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'team_select' => ['1','2','3','4','5','6','7','8','9','10','11','12','13','15','16','17','18','19','20'],
              ],
            
        ]
    );
   
    $this->add_control('background_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team' => 'border-color:{{VALUE}};',
            '{{WRAPPER}} .our-team:after' => 'background:{{VALUE}};',
            '{{WRAPPER}} .our-team:before' => 'background:{{VALUE}} !important;',
            '{{WRAPPER}} .our-team .team-content' => 'background:{{VALUE}};',
        ],
        'default' => '#FF4444',
        'condition' => [
            'team_select' => '1',
          ],
    ]);

    /**
     * style 2
     */

    $this->add_control('background_color_2',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-2 .team-content-2' => 'background:{{VALUE}};',
            '{{WRAPPER}} .our-team-2 .pic-2' => 'background:{{VALUE}};',
       
        ],
        'default' => '#F6931E',
        'condition' => [
            'team_select' => '2',
          ],
    ]);

    $this->add_control('background_color_3',[
        'label' => __( 'Image Overlay 1', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-3:hover .pic-3:before' => 'background:{{VALUE}};',
      
       
        ],
        'default' => '#073D3F',
        'condition' => [
            'team_select' => '3',
          ],
    ]);
    
    $this->add_control('background_color_3_1',[
        'label' => __( 'Image Overlay 2', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-3:hover .pic-3:after' => 'background:{{VALUE}};',
           
       
        ],
        'default' => '#4A4A49',
        'condition' => [
            'team_select' => '3',
          ],
    ]);

    $this->add_control('background_color_4',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-4:hover' => 'background:{{VALUE}};',
            '{{WRAPPER}} .our-team-4 .social-4' => 'background:{{VALUE}};',
           
       
        ],
        'default' => '#8B2635',
        'condition' => [
            'team_select' => '4',
          ],
    ]);

    $this->add_control('background_color_5',[
        'label' => __( 'Social Icon Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-5 .social-5' => 'background:{{VALUE}};',
           
       
        ],
        'default' => '#0FACF3',
        'condition' => [
            'team_select' => '5',
          ],
    ]);
       
    $this->add_control( 'content_normal_color_5',[
        'label' => __( 'Content Background color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-5 .team-conten-5' => 'background:{{VALUE}};',
        ],
        'default' => 'rgba(0, 0, 0, 0.6);',
        'condition' => [
            'team_select' => '5',
            ],
    ]);
    
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'content_normal_color_6',
            'label' => esc_html__( 'Overlay Color', 'froala-elementor-addons' ),
            'types' => [ 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .our-team-6 .team-content-6',
            'condition' => [
                'team_select' => '6',
                ],
        ]
    );

    $this->add_control( 'content_normal_color_7',[
        'label' => __( 'Background color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-7:after' => 'background:{{VALUE}};',
            '{{WRAPPER}} .our-team-7 .team-content-7:after' => 'background:{{VALUE}};',
            '{{WRAPPER}} .our-team-7 .team-content-7' => 'border-bottom:3px solid{{VALUE}};',
            
        ],
        'default' => 'rgba(43, 193, 234, 0.6)',
        'condition' => [
            'team_select' => '7',
            ],
    ]);
    $this->add_control( 'content_normal_color_8',[
        'label' => __( 'Overlay color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-8 .team-content-8:before, .our-team-8 .team-content-8:after' => 'background:{{VALUE}};',
            '{{WRAPPER}} .our-team-8 .post-8' => 'background:{{VALUE}};',
            '{{WRAPPER}} .our-team-8 .title-8:before, .our-team-8 .title-8:after' => 'background:{{VALUE}};',
            
        ],
        'default' => '#FB0000',
        'condition' => [
            'team_select' => '8',
            ],
    ]);

    $this->add_control( 'content_normal_color_9',[
        'label' => __( 'Border Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-9 .pic-9:after' => 'border-color:{{VALUE}} #e6e5e5 #e6e5e5 {{VALUE}};',
        
            
        ],
        'default' => '#37B0F1',
        'condition' => [
            'team_select' => '9',
            ],
    ]);

    
    $this->add_control( 'content_normal_color_10',[
        'label' => __( 'Border Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
           
            '{{WRAPPER}} .our-team-10 .pic-10' => 'border-bottom:5px solid{{VALUE}};border-top:5px solid {{VALUE}};',
        
            
        ],
        'default' => '#ff8e72;',
        'condition' => [
            'team_select' => '10',
            ],
    ]);
    $this->add_control( 'content_normal_color_hover_10',[
        'label' => __( 'Hover Border Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-10:hover .pic-10' => 'border-bottom-color:{{VALUE}};border-top-color:{{VALUE}};',
       
            
        
            
        ],
        'default' => '#8F2D56;',
        'condition' => [
            'team_select' => '10',
            ],
    ]);

    $this->add_control( 'content_normal_color_base_11',[
        'label' => __( 'Base Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-11 .pic-11::after, .our-team-11 .pic-11::before, .our-team-11 .social-11' => 'background:{{VALUE}};',    
        ],
        'default' => '#8F2D56;',
        'condition' => [
            'team_select' => '11',
            ],
    ]);
    $this->add_control( 'content_normal_color_bg_11',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-11' => 'background:{{VALUE}};',    
        ],
        'default' => '#f7f5ec',
        'condition' => [
            'team_select' => '11',
            ],
    ]);

    $this->add_control( 'content_normal_color_base_12',[
        'label' => __( 'Base Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-12:hover .pic-12,.our-team-12:hover .social-12 li a' => 'background:{{VALUE}}; border-color:{{VALUE}}',    
        ],
        'default' => '#17bebb;',
        'condition' => [
            'team_select' => '12',
            ],
    ]);
    $this->add_control( 'content_normal_color_base_13',[
        'label' => __( 'Overlay Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-13 .social-13' => 'background:{{VALUE}};',    
        ],
        'default' => 'rgba(245, 183, 11, 0.7);',
        'condition' => [
            'team_select' => '13',
            ],
    ]);

    $this->add_control( 'content_normal_color_base_15',[
        'label' => __( 'Overlay Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-15 .team-content-15' => 'background:{{VALUE}};',    
        ],
        'default' => '#640087',
        'condition' => [
            'team_select' => '15',
            ],
    ]);

    $this->add_control( 'content_normal_color_base_16',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-16 .team-content-16' => 'background:{{VALUE}};',    
        ],
        'default' => '#ea8828',
        'condition' => [
            'team_select' => '16',
            ],
    ]);

    
    $this->add_control( 'content_normal_color_base_17',[
        'label' => __( 'Overlay Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-17 .pic-17:before' => 'background:{{VALUE}};',    
        ],
        'default' => '#716a9e',
        'condition' => [
            'team_select' => '17',
            ],
    ]);

    

    $this->end_controls_section();

    $this->start_controls_section(
        'style_section_name',
        [
            'label' => __( 'Name', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'team_select' => '1',
                ],
        ]
    );

   
         $this->add_group_control(
             \Elementor\Group_Control_Typography::get_type(),
                [
                  'name' => 'content_typography',
                 'selector' => '{{WRAPPER}} .our-team .team-content h3',
                 'condition' => [
                    'team_select' => '1',
                  ],
                ]
             );

    $this->add_control('team_name_1',[
        'label' => __( 'Name Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team .team-content h3' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '1',
          ],
    ]);
    $this->end_controls_section();

    $this->start_controls_section(
        'style_section_position',
        [
            'label' => __( 'Position', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'team_select' => '1',
                ],
        ]

    );

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
           [
             'name' => 'position_typography',
            'selector' => '{{WRAPPER}} .our-team .post',
            'condition' => [
               'team_select' => '1',
             ],
           ]
        );

        $this->add_control('team_position_1',[
        'label' => __( 'Position Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team .post' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '1',
            ],
        ]);

   
    $this->end_controls_section();

    $this->start_controls_section(
        'style_section_social',
        [
            'label' => __( 'Social Icons', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'team_select' => '1',
                ],
        ]
         
    );

  
    $this->start_controls_tabs( 'social_icon_normal' );

    $this->start_controls_tab('social_normal',[
        'label' => esc_html__( 'Normal', 'froala-elementor-addons' ),
    ]);

    $this->add_control( 'social_icon_normal_color',[
        'label' => __( 'color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .social li a' => 'color:{{VALUE}};',
        ],
        'default' => '#F30000',
        'condition' => [
            'team_select' => '1',
            ],
    ]);

    $this->add_control( 'social_icon_normal_bgclor',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .social li a' => 'background-color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '1',
            ],
    ]);

    $this->end_controls_tab();

    $this->end_controls_tabs();
    $this->end_controls_section();
    /***
     * style 2
     */

    $this->start_controls_section(
        'style_section_name_2',
        [
            'label' => __( 'Name', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            
        ]
    );

   
         $this->add_group_control(
             \Elementor\Group_Control_Typography::get_type(),
                [
                  'name' => 'content_typography_2',
                 'selector' => '{{WRAPPER}} .our-team-2 .title-2',
                 'condition' => [
                    'team_select' => '2',
                  ],
                ]
             );

    $this->add_control('team_name_2',[
        'label' => __( 'Name Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-2 .title-2' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '2',
          ],
    ]);

    $this->add_control('team_name_3',[
        'label' => __( 'Name Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-3 .title-3' => 'color:{{VALUE}};',
        ],
        'default' => '#047168',
        'condition' => [
            'team_select' => '3',
          ],
    ]);
   
    $this->add_control('team_name_4',[
        'label' => __( 'Name Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-4 .title-4' => 'color:{{VALUE}};',
        ],
        'default' => '#000000',
        'condition' => [
            'team_select' => '4',
          ],
    ]);
    $this->add_control('team_name_4_hover',[
        'label' => __( 'Hover Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-4:hover .title-4' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '4',
          ],
    ]);


    
    $this->add_control('team_name_5_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-5 .title-5' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '5',
          ],
    ]);

       
    $this->add_control('team_name_6_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-6 .title-6' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '6',
          ],
    ]);

    $this->add_control('team_name_7_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-7 .title-7' => 'color:{{VALUE}};',
        ],
        'default' => '#000000',
        'condition' => [
            'team_select' => '7',
          ],
    ]);

    $this->add_control('team_name_8_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-8 .title-8' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '8',
          ],
    ]);

    $this->add_control('team_name_9_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-9 .title-9' => 'color:{{VALUE}};',
            '{{WRAPPER}} .our-team-9 .title-9:after' => 'background:{{VALUE}};',
        ],
        'default' => '#000000',
        'condition' => [
            'team_select' => '9',
          ],
    ]);
    
    $this->add_control('team_name_10_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-10 .title-10' => 'color:{{VALUE}};',
           
        ],
        'default' => '#000000',
        'condition' => [
            'team_select' => '10',
          ],
    ]);
       
    $this->add_control('team_name_11_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-11 .title-11' => 'color:{{VALUE}};',
           
        ],
        'default' => '#000000',
        'condition' => [
            'team_select' => '11',
          ],
    ]);

    $this->add_control('team_name_12_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-12 .title-12' => 'color:{{VALUE}};',
           
        ],
        'default' => '#000000',
        'condition' => [
            'team_select' => '12',
          ],
    ]);

    
    $this->add_control('team_name_13_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .team-content-13 .title-13' => 'color:{{VALUE}};',
           
        ],
        'default' => '#000000',
        'condition' => [
            'team_select' => '13',
          ],
    ]);

    $this->add_control('team_name_14_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-14 .title-14' => 'color:{{VALUE}};',
           
        ],
        'default' => '#000000',
        'condition' => [
            'team_select' => '14',
          ],
    ]);

    $this->add_control('team_name_15_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-15 .title-15 ' => 'color:{{VALUE}};',
           
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '15',
          ],
    ]);

    
    $this->add_control('team_name_16_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-16 .title-16' => 'color:{{VALUE}};',
           
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '16',
          ],
    ]);

    $this->add_control('team_name_17_color',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .title-17' => 'color:{{VALUE}};',
           
        ],
        'default' => '#333',
        'condition' => [
            'team_select' => '17',
          ],
    ]);

    






    
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
           [
             'name' => 'name_typography_3',
            'selector' => '{{WRAPPER}} .our-team-3 .title-3',
            'condition' => [
               'team_select' => '3',
             ],
           ]
        );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography_4',
            'selector' => '{{WRAPPER}} .our-team-4 .title-4',
            'condition' => [
                'team_select' => '4',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography_5',
                'selector' => '{{WRAPPER}} .our-team-5 .title-5',
                'condition' => [
                    'team_select' => '5',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography_6',
                'selector' => '{{WRAPPER}} .our-team-6 .title-6',
                'condition' => [
                    'team_select' => '6',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography_7',
                'selector' => '{{WRAPPER}} .our-team-7 .title-7',
                'condition' => [
                    'team_select' => '7',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography_8',
                'selector' => '{{WRAPPER}} .our-team-8 .title-8',
                'condition' => [
                    'team_select' => '8',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography_9',
                'selector' => '{{WRAPPER}} .our-team-9 .title-9',
                'condition' => [
                    'team_select' => '9',
                    ],
                ]
            );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography_10',
            'selector' => '{{WRAPPER}} .our-team-10 .title-10',
            'condition' => [
                'team_select' => '10',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography_11',
                'selector' => '{{WRAPPER}} .our-team-11 .title-11',
                'condition' => [
                    'team_select' => '11',
                    ],
                ]
            );
                                        
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography_12',
            'selector' => '{{WRAPPER}} .our-team-12 .title-12',
            'condition' => [
                'team_select' => '12',
                ],
            ]
        );
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography_13',
            'selector' => '{{WRAPPER}} .team-content-13 .title-13',
            'condition' => [
                'team_select' => '13',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography_14',
                'selector' => '{{WRAPPER}} .our-team-14 .title-14',
                'condition' => [
                    'team_select' => '14',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography_15',
                'selector' => '{{WRAPPER}} .our-team-15 .title-15 ',
                'condition' => [
                    'team_select' => '15',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography_16',
                'selector' => '{{WRAPPER}} .our-team-16 .title-16 ',
                'condition' => [
                    'team_select' => '16',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'name_typography_17',
                    'selector' => '{{WRAPPER}} .title-17',
                    'condition' => [
                        'team_select' => '17',
                        ],
                    ]
                );

    $this->end_controls_section();

    $this->start_controls_section(
        'style_section_position_2',
        [
            'label' => __( 'Position', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            
        ]

    );
    

    

    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
           [
             'name' => 'position_typography_2',
            'selector' => '{{WRAPPER}} .our-team-2 .post-2',
            'condition' => [
               'team_select' => '2',
             ],
           ]
        );

      

        $this->add_control('team_position_2',[
        'label' => __( 'Position Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-2 .post-2' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '2',
            ],
        ]);

        $this->add_control('team_position_3',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-3 .post-3' => 'color:{{VALUE}};',
            ],
            'default' => '#707070',
            'condition' => [
                'team_select' => '3',
                ],
            ]);

            
        $this->add_control('team_position_4',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-4 .post-4' => 'color:{{VALUE}};',
            ],
            'default' => '#000000',
            'condition' => [
                'team_select' => '4',
                ],
            ]);
        $this->add_control('team_position_5',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-5 .post-5' => 'color:{{VALUE}};',
            ],
            'default' => '#ffffff',
            'condition' => [
                'team_select' => '5',
                ],
            ]);
        $this->add_control('team_position_4_hover',[
            'label' => __( 'Hover Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-4:hover .post-4' => 'color:{{VALUE}};',
            ],
            'default' => '#ffffff',
            'condition' => [
                'team_select' => '4',
                ],
            ]);
        $this->add_control('team_position_6',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-6 .post-6' => 'color:{{VALUE}};',
            ],
            'default' => '#ffffff',
            'condition' => [
                'team_select' => '6',
                ],
            ]);
    
        $this->add_control('team_position_7',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-7 .post-7' => 'color:{{VALUE}};',
            ],
            'default' => '#000000',
            'condition' => [
                'team_select' => '7',
                ],
            ]);

        $this->add_control('team_position_8',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-8 .post-8' => 'color:{{VALUE}};',
            ],
            'default' => '#ffffff',
            'condition' => [
                'team_select' => '8',
                ],
            ]);

        $this->add_control('team_position_9',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-9 .post-9' => 'color:{{VALUE}};',
            ],
            'default' => '#000000',
            'condition' => [
                'team_select' => '9',
                ],
            ]);
        $this->add_control('team_position_10',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-10 .post-10' => 'color:{{VALUE}};',
            ],
            'default' => '#000000',
            'condition' => [
                'team_select' => '10',
                ],
            ]);
        $this->add_control('team_position_11',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-11 .post-11' => 'color:{{VALUE}};',
            ],
            'default' => '#000000',
            'condition' => [
                'team_select' => '11',
                ],
            ]);
        $this->add_control('team_position_12',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-12 .post-12' => 'color:{{VALUE}};',
            ],
            'default' => '#000000',
            'condition' => [
                'team_select' => '12',
                ],
            ]);
        $this->add_control('team_position_13',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .team-content-13 .post-13' => 'color:{{VALUE}};',
            ],
            'default' => '#000000',
            'condition' => [
                'team_select' => '13',
                ],
            ]);
    
        $this->add_control('team_position_14',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-14 .post-14' => 'color:{{VALUE}};',
            ],
            'default' => '#000000',
            'condition' => [
                'team_select' => '14',
                ],
            ]);
        $this->add_control('team_position_15',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-15 .post-15' => 'color:{{VALUE}};',
            ],
            'default' => '#ffffff',
            'condition' => [
                'team_select' => '15',
                ],
            ]);
        $this->add_control('team_position_16',[
            'label' => __( 'Position Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .our-team-16 .post-16' => 'color:{{VALUE}};',
            ],
            'default' => '#ffffff',
            'condition' => [
                'team_select' => '16',
                ],
            ]);

            $this->add_control('team_position_17',[
                'label' => __( 'Position Color', 'froala-elementor-addons' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-17' => 'color:{{VALUE}};',
                ],
                'default' => '#333333',
                'condition' => [
                    'team_select' => '17',
                    ],
                ]);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_3',
                'selector' => '{{WRAPPER}} .our-team-3 .post-3',
                'condition' => [
                    'team_select' => '3',
                    ],
                ]
            );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_4',
                'selector' => '{{WRAPPER}} .our-team-4 .post-4',
                'condition' => [
                    'team_select' => '4',
                    ],
                ]
            );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_5',
                'selector' => '{{WRAPPER}} .our-team-5 .post-5',
                'condition' => [
                    'team_select' => '5',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_6',
                'selector' => '{{WRAPPER}} .our-team-6 .post-6',
                'condition' => [
                    'team_select' => '6',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_7',
                'selector' => '{{WRAPPER}} .our-team-7 .post-7',
                'condition' => [
                    'team_select' => '7',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_8',
                'selector' => '{{WRAPPER}} .our-team-8 .post-8',
                'condition' => [
                    'team_select' => '8',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_9',
                'selector' => '{{WRAPPER}} .our-team-9 .post-9',
                'condition' => [
                    'team_select' => '9',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_10',
                'selector' => '{{WRAPPER}} .our-team-10 .post-10',
                'condition' => [
                    'team_select' => '10',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_11',
                'selector' => '{{WRAPPER}} .our-team-11 .post-11',
                'condition' => [
                    'team_select' => '11',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_13',
                'selector' => '{{WRAPPER}} .our-team-13 .post',
                'condition' => [
                    'team_select' => '13',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_14',
                'selector' => '{{WRAPPER}} .our-team-14 .post-14',
                'condition' => [
                    'team_select' => '14',
                    ],
                ]
            );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_15',
                'selector' => '{{WRAPPER}} .our-team-15 .post-15 ',
                'condition' => [
                    'team_select' => '15',
                    ],
                ]
            );
                       
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography_16',
                'selector' => '{{WRAPPER}} .our-team-16 .post-16',
                'condition' => [
                    'team_select' => '16',
                    ],
                ]
            );
               
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'position_typography_17',
                    'selector' => '{{WRAPPER}} .post-17',
                    'condition' => [
                        'team_select' => '17',
                        ],
                    ]
                );
                
                    
                   
               
       
   
    $this->end_controls_section();

    $this->start_controls_section('team_email',[
        'label' => __( 'Email', 'froala-elementor-addons' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
            'team_select' => '17',
            ],
        
    ]);

    $this->add_control(
        'email_color',
        [
            'label' => __( 'Email Color', 'froala-elementor-addons' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .email_17_cl' => 'color:{{VALUE}};',
            ],
            'default' => '#333333',
            'condition' => [
                'team_select' => '17',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
                [
                'name' => 'email_font',
                'selector' => '{{WRAPPER}} .post-17',
                'condition' => [
                    'team_select' => '17',
                    ],
                ]
            );
    

    $this->end_controls_section();

    $this->start_controls_section(
        'style_section_social_2',
        [
            'label' => __( 'Social Icons', 'froala-elementor-addons' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'team_select' => array('2','3','4','5','6','7','9','10','11','12','13','14','15','16','17'),
              ],
            
        ]
         
    );


 
    $this->start_controls_tabs( 'social_icon_normal_2' );

    $this->start_controls_tab('social_normal_2',[
        'label' => esc_html__( 'Normal', 'froala-elementor-addons' ),
    ]);

    $this->add_control( 'social_icon_normal_color_2',[
        'label' => __( 'color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-2 .social-2 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '2',
            ],
    ]);

    
    $this->add_control( 'social_icon_normal_color_3',[
        'label' => __( 'color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-3 .social-3 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#DB162F',
        'condition' => [
            'team_select' => '3',
            ],
    ]);

      
    $this->add_control( 'social_icon_normal_color_4',[
        'label' => __( 'color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-4 .social-4 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '4',
            ],
    ]);

    $this->add_control( 'social_icon_normal_bgclor_2',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-2 .social-2 li a:before' => 'background:{{VALUE}};',
        ],
        'default' => '#F6931E',
        'condition' => [
            'team_select' => '2',
            ],
    ]);

    $this->add_control( 'social_icon_normal_bgclor_3',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-3 .social-3 li a:after' => 'background:{{VALUE}};',
        ],
        'default' => '#DB162F',
        'condition' => [
            'team_select' => '3',
            ],
    ]);

    $this->add_control( 'social_icon_normal_color_5',[
        'label' => __( 'color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-3 .social-3 li a:after' => 'background:{{VALUE}};',
        ],
        'default' => '#DB162F',
        'condition' => [
            'team_select' => '5',
            ],
    ]);

    $this->add_control( 'social_icon_normal_colorbg_6',[
        'label' => __( 'color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-6 .social-6 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#DB162F',
        'condition' => [
            'team_select' => '6',
            ],
    ]);
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'social_icon_normal_colorbg_6',
            'label' => esc_html__( 'Background', 'froala-elementor-addons' ),
            'types' => [ 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .our-team-6 .social-6 li a',
            'condition' => [
                'team_select' => '6',
                ],
        ]
    );

    $this->add_control( 'social_icon_normal_colorbg_7',[
        'label' => __( 'Background color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-7 .social-7 li a' => 'background:{{VALUE}};',
        ],
        'default' => '#0B579F',
        'condition' => [
            'team_select' => '7',
            ],
    ]);
    $this->add_control( 'social_icon_normal_color_7',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-7 .social-7 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '7',
            ],
    ]);

    $this->add_control( 'social_icon_normal_color_9',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-9 .icon-9 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#fff',
        'condition' => [
            'team_select' => '9',
            ],
    ]);
    $this->add_control( 'social_icon_normal_color_10',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-10 .social-10 li a' => 'border: 1px solid {{VALUE}};color:{{VALUE}}',
        ],
        'default' => '#fff',
        'condition' => [
            'team_select' => '10',
            ],
    ]);
    $this->add_control( 'social_icon_normal_bgc_9',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-9 .icon-9 li a' => 'background:{{VALUE}};',
        ],
        'default' => '#999',
        'condition' => [
            'team_select' => '9',
            ],
    ]);
    $this->add_control( 'social_icon_normal_bgc_10',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-10 .icon-10 li a' => 'background:{{VALUE}};',
        ],
        'default' => '#8F2D56',
        'condition' => [
            'team_select' => '10',
            ],
    ]);

    $this->add_control( 'social_icon_normal_color_11',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-11 .social-11 li a' => 'color:{{VALUE}}',
        ],
        'default' => '#fff',
        'condition' => [
            'team_select' => '11',
            ],
    ]);
    $this->add_control( 'social_icon_normal_bgc_11',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-11 .icon-11 li a' => 'background:{{VALUE}};',
        ],
        'default' => '#8F2D56',
        'condition' => [
            'team_select' => '11',
            ],
    ]);

    $this->add_control( 'social_icon_normal_12',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-12 .social-12 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#17bebb;',
        'condition' => [
            'team_select' => '12',
            ],
    ]);

    $this->add_control( 'social_icon_normal_13',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-13 .social-13 ul li a' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff;',
        'condition' => [
            'team_select' => '13',
            ],
    ]);
    $this->add_control( 'social_icon_normal_bgc_13',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-13 .social-13 ul li a' => 'background:{{VALUE}};',
        ],
        'default' => '#8F2D56',
        'condition' => [
            'team_select' => '13',
            ],
    ]);

    $this->add_control( 'social_icon_normal_c_14',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-14 .social-14 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#fff',
        'condition' => [
            'team_select' => '14',
            ],
    ]);
    
    $this->add_control( 'social_icon_normal_bg_14',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-14 .social-14 li a' => 'background:{{VALUE}};',
        ],
        'default' => '#006e90',
        'condition' => [
            'team_select' => '14',
            ],
    ]);
    $this->add_control( 'social_icon_normal_bg15',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-15 .icon-15 li a' => 'background:{{VALUE}};border:1px solid{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '15',
            ],
    ]);
    $this->add_control( 'social_icon_normal_15',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-15 .icon-15 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#000000',
        'condition' => [
            'team_select' => '15',
            ],
    ]);
    $this->add_control( 'social_icon_normal_16',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-16 .icon-16 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '16',
            ],
    ]);

    $this->add_control( 'social_icon_hover_16',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-16 .icon-16 li a' => 'background:{{VALUE}};',
        ],
        'default' => '#ea8828',
        'condition' => [
            'team_select' => '16',
            ],
    ]);

    $this->add_control( 'social_icon_bg_17',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .social-17 li a' => 'background:{{VALUE}};',
        ],
        'default' => '#333333',
        'condition' => [
            'team_select' => '17',
            ],
    ]);

    $this->add_control( 'social_icon_color_17',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .social-17 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#fff',
        'condition' => [
            'team_select' => '17',
            ],
    ]);


    $this->end_controls_tab();
   

    $this->start_controls_tab('social_hover_2',[
        'label' => esc_html__( 'Hover', 'froala-elementor-addons' ),
        
    ]);

    $this->add_control( 'social_icon_hover_color_2',[
        'label' => __( 'color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-2 .social-2 li a:hover:before' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '2',
            ],
    ]);



    $this->add_control( 'social_icon_hover_color_3',[
        'label' => __( 'color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-3 .social-3 li a:hover' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '3',
            ],
    ]);

    
    $this->add_control( 'social_icon_hover_color_4',[
        'label' => __( 'color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-4 .social-4 li a:hover' => 'color:{{VALUE}};',
        ],
        'default' => '#FF9B19',
        'condition' => [
            'team_select' => '4',
            ],
    ]);
    $this->add_control( 'social_icon_hover_bgclor_2',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-2 .social-2 li a:hover:before' => 'background:{{VALUE}} !important;',
        ],
        'default' => '#E06F06',
        'condition' => [
            'team_select' => '2',
            ],
    ]);

    $this->add_control( 'social_icon_hover_bgclor_3',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-3 .social-3 li a:hover:after' => 'background:{{VALUE}} !important;',
        ],
        'default' => '#E06F06',
        'condition' => [
            'team_select' => '3',
            ],
    ]);

    $this->add_control( 'social_icon_hover_bgclor_5',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-5 .social-5 li a:hover' => 'color:{{VALUE}} !important;',
        ],
        'default' => '#E06F06',
        'condition' => [
            'team_select' => '5',
            ],
    ]);

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'social_icon_normal_colorbg_hover_6',
            'label' => esc_html__( 'Hover Background', 'froala-elementor-addons' ),
            'types' => [ 'classic', 'gradient'],
            'selector' => '{{WRAPPER}} .our-team-6 .social-6 li a:hover',
            'condition' => [
                'team_select' => '6',
                ],
        ]
    );
    $this->add_control( 'social_icon_hover_bgclor_6',[
        'label' => __( 'Icon Hover Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-6 .social-6 li a:hover' => 'color:{{VALUE}} !important;',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '6',
            ],
    ]);
    $this->add_control( 'social_icon_hover_bgclor_7',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-7 .social-7 li a:hover' => 'background:{{VALUE}} !important;',
        ],
        'default' => '#F6931E',
        'condition' => [
            'team_select' => '7',
            ],
    ]);
    $this->add_control( 'social_icon_hover_clor_7',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-7 .social-7 li a:hover' => 'color:{{VALUE}} !important;',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '7',
            ],
    ]);

    $this->add_control( 'social_icon_hover_clor_9',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-9 .icon-9 li a:hover' => 'color:{{VALUE}} !important;',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '9',
            ],
    ]);
    $this->add_control( 'social_icon_hover_clor_10',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-10:hover .social-10 li a' => 'color:{{VALUE}}',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '10',
            ],
    ]);
    $this->add_control( 'social_icon_hover_clorbg_9',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-9 .icon-9 li a:hover' => 'background:{{VALUE}} !important;',
        ],
        'default' => '#333333',
        'condition' => [
            'team_select' => '9',
            ],
    ]);
    $this->add_control( 'social_icon_hover_clorbg_10',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-10:hover .social-10 li a' => 'background:{{VALUE}};border: 1px solid {{VALUE}};',
        ],
        'default' => '#8F2D56',
        'condition' => [
            'team_select' => '10',
            ],
    ]);
    $this->add_control( 'social_icon_hover_clor_11',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-11 .social-11 li a:hover' => 'color: {{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '11',
            ],
    ]);
    
    $this->add_control( 'social_icon_hover_clorbg_11',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-11 .social-11 li a:hover' => 'background:{{VALUE}};',
        ],
        'default' => '#8F2D56',
        'condition' => [
            'team_select' => '11',
            ],
    ]);
    
    $this->add_control( 'social_icon_normal_hover_12',[
        'label' => __( 'Hover Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-12:hover .social-12 li a' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff;',
        'condition' => [
            'team_select' => '12',
            ],
    ]);

    $this->add_control( 'social_icon_normal_hover_13',[
        'label' => __( 'Hover Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-13 .social-13 ul li a:hover' => 'color:{{VALUE}};',
        ],
        'default' => '#f3904d;',
        'condition' => [
            'team_select' => '13',
            ],
    ]);
    $this->add_control( 'social_icon_normal_hoverbg_13',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-13 .social-13 ul li a:hover' => 'Background:{{VALUE}};',
        ],
        'default' => '#ffffff;',
        'condition' => [
            'team_select' => '13',
            ],
    ]);

    $this->add_control( 'social_icon_normal_hover_14',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-14 .social-14 li a:hover' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff;',
        'condition' => [
            'team_select' => '14',
            ],
    ]);

    $this->add_control( 'social_icon_normal_hoverbgs_14',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-14 .social-14 li a:hover' => 'background:{{VALUE}};',
        ],
        'default' => '#f2545b',
        'condition' => [
            'team_select' => '14',
            ],
    ]);

    
    $this->add_control( 'social_icon_normal_hoverbgs_15',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-15 .icon-15 li a:hover ' => 'background:{{VALUE}};border: 1px solid {{VALUE}};',
        ],
        'default' => '#e6af2e',
        'condition' => [
            'team_select' => '15',
            ],
    ]);
    $this->add_control( 'social_icon_normal_hovercolor_15',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-15 .icon-15 li a:hover ' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '15',
            ],
    ]);

    $this->add_control( 'social_icon_hover__16',[
        'label' => __( 'Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-16 .icon-16 li a:hover' => 'color:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '16',
            ],
    ]);

    $this->add_control( 'social_icon_hoverbg_16',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .our-team-16 .icon-16 li a:hover' => 'background:{{VALUE}};',
        ],
        'default' => '#ea8828',
        'condition' => [
            'team_select' => '16',
            ],
    ]);

    $this->add_control( 'social_icon_hoverbg_17',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .social-17 li a:hover' => 'background:{{VALUE}};',
        ],
        'default' => '#ffffff',
        'condition' => [
            'team_select' => '17',
            ],
    ]);

    $this->add_control( 'social_icon_hover_color_17',[
        'label' => __( 'Background Color', 'froala-elementor-addons' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .social-17 li a:hover' => 'color:{{VALUE}};',
        ],
        'default' => '#333333',
        'condition' => [
            'team_select' => '17',
            ],
    ]);




    /***
     * end style 2
     */



    $this->end_controls_tab();

    $this->end_controls_tabs();



    




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
    $team_name  = $settings['team_name'];
    $team_position  = $settings['team_position'];
    $social_list  = $settings['social_list'];
    $select_style  = $settings['team_select'];
    $team_email = $settings['team_email'];
  
switch ($select_style) {
    case '1':
        ?>
            <div class="our-team">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <div class="team-content">
                        <?php if(!empty($team_name)):?>
                        <h3 class="title"><?php echo $team_name;?></h3>
                        <?php endif;?>
                        <?php if(!empty($team_position)):?>
                        <span class="post"><?php echo $team_position;?></span>
                        <?php endif;?>
                        <?php if ( $settings['social_list'] ): ?>
                        <ul class="social">
                            <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                            
                        </ul>
                        <?php endif;?>
                    </div>
                </div>

        <?php 
        break;
    case '2':
        ?>

        <div class="our-team-2">
                <div class="pic-2">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                </div>
                <div class="team-content-2">
                <?php if(!empty($team_name)):?>
                    <h3 class="title-2"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-2"><?php echo $team_position;?></span>
                    <?php endif;?>
                    <?php if ( $settings['social_list'] ): ?>
                        <ul class="social-2">
                            <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                            
                        </ul>
                        <?php endif;?>
                   
                </div>
            </div>

        <?php 
        break;
    case '3':
        ?>
              <div class="our-team-3">
                    <div class="pic-3">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <?php if ( $settings['social_list'] ): ?>
                        <ul class="social-3">
                        <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                   
                    </div>
                    <div class="team-content-3">
                    <?php if(!empty($team_name)):?>
                        <h3 class="title-3"><?php echo $team_name;?></h3>
                        <?php endif;?>
                        <?php if(!empty($team_position)):?>
                        <span class="post-3"><?php echo $team_position;?></span>
                        <?php endif;?>
                    </div>
                </div>
        <?php 
        break;
    case '4':
        ?>
              <div class="our-team-4">
                <div class="pic-4">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                <?php if ( $settings['social_list'] ): ?>
                    <ul class="social-4">
                    <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                </div>
                <div class="team-content-4">
                <?php if(!empty($team_name)):?>
                    <h3 class="title-4"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-4"><?php echo $team_position;?></span>
                    <?php endif;?>
                </div>
            </div>
        <?php
        break;
    case '5':
        ?>
         <div class="our-team-5">
         <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
         <?php if ( $settings['social_list'] ): ?>
                    <ul class="social-5">
                    <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                    <div class="team-conten-5">
                <?php if(!empty($team_name)):?>
                    <h3 class="title-5"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-5"><?php echo $team_position;?></span>
                    <?php endif;?>
                </div>
            </div>
        <?php 
        break;
    case '6':
       ?>
        <div class="our-team-6">
        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <div class="team-content-6">
                    <?php if(!empty($team_name)):?>
                    <h3 class="title-6"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-6"><?php echo $team_position;?></span>
                    <?php endif;?>
                        <ul class="social-6">
                        <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
       <?php 
        break;
    case '7':
        ?>
                    <div class="our-team-7">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <ul class="social-7">
                        <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    <div class="team-content-7">
                    <?php if(!empty($team_name)):?>
                    <h3 class="title-7"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-7"><?php echo $team_position;?></span>
                    <?php endif;?>
                    </div>
            </div>
        <?php 
        break;
    case '8':
        ?>
        <div class="our-team-8">
        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                <div class="team-content-8">
                <?php if(!empty($team_name)):?>
                    <h3 class="title-8"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-8"><?php echo $team_position;?></span>
                    <?php endif;?>
                </div>
            </div>
        <?php 
        break;
    case '9':
       ?>
       <div class="our-team-9">
                <div class="pic-9"><?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?></div>
                <?php if(!empty($team_name)):?>
                    <h3 class="title-9"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-9"><?php echo $team_position;?></span>
                    <?php endif;?>
                <ul class="icon-9">
                <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                </ul>
            </div>
       <?php 
        break;
    case '10':
        ?>
          <div class="our-team-10">
                    <div class="pic-10">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    </div>
                    <div class="team-content-10">
                    <?php if(!empty($team_name)):?>
                    <h3 class="title-10"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-10"><?php echo $team_position;?></span>
                    <?php endif;?>
                        <ul class="social-10">
                        <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
        <?php
        break;
        case '11':
            ?>
                <div class="our-team-11">
                    <div class="pic-11">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    </div>
                    <div class="team-content-11">
                    <?php if(!empty($team_name)):?>
                    <h3 class="title-11"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-11"><?php echo $team_position;?></span>
                    <?php endif;?>
                    </div>
                    <ul class="social-11">
                    <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                    </ul>
                </div>
            <?php 
            break;

            case '12';
            ?>
                <div class="our-team-12">
                <div class="pic-12">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                </div>
                <?php if(!empty($team_name)):?>
                    <h3 class="title-12"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-12"><?php echo $team_position;?></span>
                    <?php endif;?>
                <ul class="social-12">
                <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                </ul>
            </div>
            <?php 
            break;
            case '13':
                ?>
                  <div class="our-team-13">
                <div class="team-img-13">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <div class="social-13">
                        <ul>
                        <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <div class="team-content-13">
                <?php if(!empty($team_name)):?>
                    <h3 class="title-13"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-13"><?php echo $team_position;?></span>
                    <?php endif;?>
                </div>
            </div>
                <?php 
                break;
            case '14':
                ?>
                <div class="our-team-14">
                       <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <div class="team-content-14">
                    <?php if(!empty($team_name)):?>
                    <h3 class="title-14"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-14"><?php echo $team_position;?></span>
                    <?php endif;?>
                    </div>
                    <ul class="social-14">
                    <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                    </ul>
                    <div class="icon-14 fa fa-plus"></div>
                </div>
                <?php 
                break;
            case '15':
                ?>
                   <div class="our-team-15">
                   <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <div class="team-content-15">
                    <?php if(!empty($team_name)):?>
                    <h3 class="title-15"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-15"><?php echo $team_position;?></span>
                    <?php endif;?>
                        <ul class="icon-15">
                        <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <?php 
                break;
            case '16':
                ?>
                   <div class="our-team-16">
                   <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                <div class="team-content-16">
                    <div class="team-info-16">
                    <?php if(!empty($team_name)):?>
                    <h3 class="title-16"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-16"><?php echo $team_position;?></span>
                    <?php endif;?>
                        <ul class="icon-16">
                        <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
                <?php
                break;
            case '17':
                ?>
                 <div class="our-team-17">
                <div class="pic-17">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <ul class="social-17">
                    <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                    </ul>
                </div>
                <div class="team-content-17">
                <?php if(!empty($team_name)):?>
                    <h3 class="title-17"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <small class="post-17"><?php echo $team_position;?></small>
                    <?php endif;?>
                    <?php if(!empty($team_email)):?>
                    <small class="email_17_cl"><?php _e('Email','froala-elementor-addons');?>: <b><?php echo $team_email?></b></small>
                    <?php endif;?>
                </div>
                <div class="team-layer-17">
                <?php if(!empty($team_name)):?>
                    <a class="title-17" href="javascript:void(0)"><?php echo $team_name;?></a>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-17"><?php echo $team_position;?></span>
                    <?php endif;?>
                    <?php if(!empty($team_email)):?>
                    <small class="email_17_cl"><?php _e('Email','froala-elementor-addons');?>: <b><?php echo $team_email?></b></small>
                    <?php endif;?>
                </div>
            </div>
                <?php
                break;
            case '18':
                ?>
                 <div class="our-team-18">
                <div class="pic-18">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                </div>
                <div class="team-content-18">
                <?php if(!empty($team_name)):?>
                    <h3 class="title-18"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-18"><?php echo $team_position;?></span>
                    <?php endif;?>
                    <ul class="social-18">
                    <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                    </ul>
                </div>
            </div>
                <?php 
                break;
            case '19':
                ?>
                 <div class="our-team-19">
                 <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <div class="team-content-19">
                    <?php if(!empty($team_name)):?>
                    <h3 class="title-19"><?php echo $team_name;?></h3>
                    <?php endif;?>
                    <?php if(!empty($team_position)):?>
                    <span class="post-19"><?php echo $team_position;?></span>
                    <?php endif;?>
                        <ul class="social-links-19">
                        <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <?php 
                break;
                case '20':
                    ?>
                <div class="our-team-20">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                <div class="team-content-20">
                <?php if(!empty($team_name)):?>
                    <h3 class="team-prof-20">
                    <?php echo $team_name;?>
                        <small><?php echo $team_position;?></small>
                    </h3>
                    <?php endif;?>
                    <ul class="social-link-20">
                    <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                    </ul>
                </div>
            </div>
                    <?php 
                    break;
    default:
       ?>
          <div class="our-team">
                    <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'team_image' );?>
                    <div class="team-content">
                        <?php if(!empty($team_name)):?>
                        <h3 class="title"><?php echo $team_name;?></h3>
                        <?php endif;?>
                        <?php if(!empty($team_position)):?>
                        <span class="post"><?php echo $team_position;?></span>
                        <?php endif;?>
                        <?php if ( $settings['social_list'] ): ?>
                        <ul class="social">
                            <?php foreach ($settings['social_list'] as $list):
                               $urlinfo = $list['icon_url'];
                                $url = $urlinfo['url'];
                                $target = $urlinfo['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $urlinfo['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = $list['icon'];
                                $icon_html = '<i class="'.$icon['value'].'"></i>';
                               ?>
                            <li><a href="<?php echo esc_url($url); ?>"<?php echo $target; $nofollow;?> ><?php echo $icon_html; ?></a></li>
                            <?php endforeach;?>
                            
                        </ul>
                        <?php endif;?>
                    </div>
                </div>
       <?php 
        break;}
  ?>


            

               

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