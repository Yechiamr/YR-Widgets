<?php
    if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
    }
    class textarea_style_widget extends \Elementor\Widget_Base {

    public function get_name() {
    return 'textarea_style_widget';
    }

    public function get_title() {
    return esc_html__( 'Textarea', 'text-widgets' );
    }

    public function get_icon() {
    return 'eicon-text';
    }

    public function get_custom_help_url() {
    return 'https://developers.elementor.com/widgets/';
    }

    public function get_categories() {
    return [ 'general' ];
    }

    public function get_keywords() {
    return [ 'text', 'textarea' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'text_section',
            [
            'label' => esc_html__( 'Text', 'text-widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
            
        $this->add_control(
            'ytext',
            [
            'label' => esc_html__( 'Text', 'textarea_style_widget' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'rows' => 10,
            'default' => esc_html__( 'Default description', 'text-widgets' ),
            'placeholder' => esc_html__( 'Type your text here', 'text-widgets' ),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'ytext-style',
            [
            'label' => esc_html__( 'Text Style', 'text-widgets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

        $this->add_control(
            'text_color',
            [
            'label' => esc_html__( 'Text Color', 'text-widgets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
            '{{WRAPPER}} .text-style' => 'color: {{VALUE}}',
            ],
            ]
            );

        $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .text-style',
                ]
            );
        

        $this->add_control(
            'text_alignment',
            [				
                'label' => esc_html__('Alignment', 'text-widgets'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'text-widgets'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'text-widgets'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'text-widgets'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .text-style' => 'text-align: {{VALUE}};',
                ],
            ]
            );

            $this->add_responsive_control(
                'title_padding',
                [
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Padding', 'text-widgets' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .text-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'title_margin',
                [
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'label' => esc_html__( 'Margin', 'text-widgetsy' ),
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .text-style' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


            $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                        'name' => 'border',
                        'label' => esc_html__( 'Border', 'text-widgets' ),
                        'selector' => '{{WRAPPER}} .text-style',
                        ]
                        );

            $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                        [
                            'name' => 'background',
                            'label' => esc_html__( 'Background', 'text-widgets' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .text-box',
                        ]
                );

            $this->add_group_control(
                    \Elementor\Group_Control_Text_Shadow::get_type(),
                        [
                            'name' => 'text_shadow',
                            'label' => esc_html__( 'Text Shadow', 'text-widgets' ),
                            'selector' => '{{WRAPPER}} .text-style',
                        ]
                    );

        $this->end_controls_section();

        }

    protected function render() {
            $settings = $this->get_settings_for_display();
            ?>
            <div class="text-box"> 
                    <div class="text-style">
                        <?php echo $settings['ytext']; ?>
                    </div>
                </div>
            <?php
    }


    protected function content_template() {
            ?>
                <div class="text-box"> 
                    <div class="text-style">
                        <# 
                            {{ settings.ytext }} 
                        #>
                    </div>
                </div>
            <?php
    }

}
