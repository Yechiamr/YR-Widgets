<?php
    if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
    }
    class simple_textarea_style_widget extends \Elementor\Widget_Base {

    public function get_name() {
    return 'simple_textarea_style_widget';
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
            'label' => esc_html__( 'Text', 'text-widgets' ),
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
                 <div class="text-style">
                    <?php echo $settings['ytext']; ?>
                 </div>
            <?php
    }


    protected function content_template() {
            ?>         
                <div class="text-style">
                    <# 
                       {{ settings.ytext }} 
                    #>
                </div>
            <?php
    }

}
