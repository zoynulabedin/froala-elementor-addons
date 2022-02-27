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

    $settings   = $this->get_settings_for_display(); 
    $team_name  = $settings['team_name'];
    $team_position  = $settings['team_position'];
    $social_list  = $settings['social_list'];
    $select_style  = $settings['team_select'];
  
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
    default:
        $select_style = 'style-1';
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