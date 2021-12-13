<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class media_text_typo_widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'media_text_typo_widget';
	}

	
	public function get_title() {
		return esc_html__( 'Media Text Typo', 'media_text_typo_widget' );
	}

	
	public function get_icon() {
		return 'eicon-image';
	}

	
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/widgets/';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	
	public function get_keywords() {
		return [ 'image', 'media', 'text' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'media_text_typo_widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'media_text_typo_widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'text',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Text', 'media_text_typo_widget' ),
				'placeholder' => esc_html__( 'Enter your text', 'media_text_typo_widget' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'media_text_typo_widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => 
							'{{WRAPPER}} .text-typo',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		
				// Get image url
				echo '<img src="' . esc_url( $settings['image']['url'] ) . '" alt="">';

				// Get image by id
				// echo wp_get_attachment_image( $settings['image']['id'], 'thumbnail' );
			?>
			<div class="text-typo">
			<?php 
				// render text
				echo '<p>' . $settings['text'] . '</p>';	
			?>
			</div>
	
		<?php

		
	}

	protected function content_template() {
		?>
			<img src="{{{ settings.image.url }}}">

		<div class="text-typo">
			<p>{{{ settings.text }}}</p>
		</div>
		<?php
	}

}