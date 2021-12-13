<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class media_textarea_widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'media_textarea_widget';
	}

	
	public function get_title() {
		return esc_html__( 'media_textarea_widget', 'media_widget' );
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
				'label' => esc_html__( 'Content', 'media_textarea_widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'media_textarea_widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'text',
			[
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label' => esc_html__( 'Text', 'media_textarea_widget' ),
				'placeholder' => esc_html__( 'Enter your text', 'media_textarea_widget' ),
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

		// render text
		echo '<p>' . $settings['text'] . '</p>';
	}

	protected function content_template() {
		?>
			<img src="{{{ settings.image.url }}}">
			<p>{{{ settings.text }}}</p>
		<?php
	}

}