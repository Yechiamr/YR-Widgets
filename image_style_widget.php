<?php
        if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
        }
        class image_style_widget extends \Elementor\Widget_Base {

        public function get_name() {
        return 'image_style_widget';
        }

        public function get_title() {
        return esc_html__( 'Image Style', 'image_style_widget' );
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
        return [ 'image' ];
        }

    protected function register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'image_style_widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'image_style_widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'image-style',
			[
			'label' => esc_html__( 'Image Style', 'image_style_widget' ),
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', 
				'exclude' => [],
				'include' => [],
				'default' => 'large',
			]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'image_style_widget' ),
				'selector' =>
							'{{WRAPPER}} .yimage-style',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'image_style_widget' ),
				'selector' => 
							'{{WRAPPER}} .yimage-style',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		 
        ?>
		<div class="yimage-style">
			<?php 
				echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
			?>
		</div>
	
		<?php
	}

	protected function content_template() {
		?>
			<div class="yimage-style">
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
		<?php
	}

}