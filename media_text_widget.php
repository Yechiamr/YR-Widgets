
   
<?php

if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
}

    class media_text_widget extends \Elementor\Widget_Base {

    public function get_name() {
    return 'media_text_widget';
    }

    public function get_title() {
    return esc_html__( 'Image+Text', 'media_widgets' );
    }

    public function get_icon() {
    return 'eicon-image';
    }

    public function get_custom_help_url() {
    return 'https://www.elementor.com';
    }

    public function get_categories() {
    return [ 'general' ];
    }

    public function get_keywords() {
    return [ 'image', 'text' ];
    }
    protected function register_controls() {  


        $this->start_controls_section(
        'image_section',
        [
            'label' => esc_html__( 'Image', 'media_widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );

        $this->add_control(
        'image',
        [
            'label' => esc_html__('Choose Image', 'media_widgets'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ]
        );
            
        
        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'exclude' => ['custom'],  
                'include' => [],
                'default' => 'large', 
                        
            ]
        );
        $this->end_controls_section();
    
        $this->start_controls_section(
        'text_section',
        [
            'label' => esc_html__( 'Text', 'media_widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
        );

        $this->add_control(
        'text_control',
        [
            'label' => esc_html__( 'Text', 'media_widgets' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'This text will be the default text', 'media_widgets' ),
            'placeholder' => esc_html__( 'This text will be the placeholder', 'media_widgets' ),
            'title' => esc_html__( 'This text will appear when hover ', 'media_widgets' ),
        ]
        );    
    
        $this->end_controls_section();


        $this->start_controls_section(
        'image_style_section',
                [
                'label' => esc_html__( 'Image Style', 'media_widgets' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
        );
            
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__( 'Image Border', 'media_widgets' ),
                'selector' => '{{WRAPPER}} .image-style',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'text_style',
            [
                'label' => esc_html__( 'Text Style', 'media_widgets' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );
    
            //  Color Control


        $this->add_control(
            'textcolot',
            [
                'label' => esc_html__( 'Text Color', 'media_widgets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .text-class' => 'color: {{VALUE}}',
                ],
            ]
        );
        
    

        $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'content_typography',
                        'selector' => '{{WRAPPER}} .text-class',
                    ]
        );


        $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'tborder',
                        'label' => esc_html__( 'Text Border', 'media_widgets' ),
                        'selector' => '{{WRAPPER}} .text-class',
                    ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        ?>
        <div class="image-style"> 
            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
        </div>
        
        <div class="text-class"> 
            <?php echo $settings['text_control']; ?>
        </div>
    <?php
    }

    protected function content_template() {
        ?>
        <div class="image-style"> 
            <#
            var image = {
                id: settings.image.id,
                url: settings.image.url,
                size: settings.thumbnail_size,
                dimension: settings.thumbnail_custom_dimension,
                model: view.getEditModel()
            };
            var image_url = elementor.imagesManager.getImageUrl( image );
            #>
            <img src="{{{ image_url }}}" />

        </div>

            <div class="text-class"> 
            <# 
                {{ settings.text_control }} 
            #>
           </div>

        <?php
    }
}
