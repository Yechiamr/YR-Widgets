<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class text_media_style_widget extends \Elementor\Widget_Base {

    public function get_name() {
		return 'text_media_style_widget';
	}

	
	public function get_title() {
		return esc_html__( 'Text Image Style', 'text_media_style_widget' );
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
			'text',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Text', 'text_media_style_widget' ),
				'placeholder' => esc_html__( 'Enter your title', 'text_media_style_widget' ),
			]
		);    

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'text_media_style_widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'large',
			]
		);

		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'text_media_style_widget' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'text_media_style_widget' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'description',
			[
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label' => esc_html__( 'Description', 'text_media_style_widget' ),
				'placeholder' => esc_html__( 'Enter your description', 'text_media_style_widget' ),
			]
		);    

		$this->end_controls_section();



		$this->start_controls_section(
			'text_style',
			[
				'label' => esc_html__( 'Text Style', 'text_media_style_widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => 
							'{{WRAPPER}} .ytext',
			]
		);

		$this->add_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'text_media_style_widget' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'text_media_style_widget' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'text_media_style_widget' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'text_media_style_widget' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .ytext' => 'text-align: {{VALUE}};',
				],
				],

		);


        $this->add_control(
			'text-color',
			[
				'label' => esc_html__( 'Text Color', 'text_media_style_widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
                    '{{WRAPPER}} .ytext' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'text_media_style_widget' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ytext',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'box_style',
			[
				'label' => esc_html__( 'Box Style', 'text_media_style_widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'image_align',
			[
				'label' => __( 'Image Alignment', 'text_media_style_widget' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'text_media_style_widget' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'text_media_style_widget' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'text_media_style_widget' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .ybox' => 'text-align: {{VALUE}};',
				],
				],

		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'media_text_typo_widget' ),
				'selector' => '{{WRAPPER}} .ybox',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'media_text_typo_widget' ),
				'selector' => '{{WRAPPER}} .ybox',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'custom_css_filters',
				'selector' => '{{WRAPPER}} .ybox',
			]
		);

		
        $this->end_controls_section();

		
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( ! empty( $settings['website_link']['url'] ) ) {
			$this->add_link_attributes( 'website_link', $settings['website_link'] );
		}

		    ?>
            <div class="ybox">
                <div class="ytext">
                    <?php 
                        // render title
                        echo '<h3>' . $settings['text'] . '</h3>';
                    ?>
                </div>
				<a <?php echo $this->get_render_attribute_string( 'website_link' ); ?>>
                <?php

				
				echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
                    // Get image url
                    //echo '<img src="' . esc_url( $settings['image']['url'] ) . '" alt="">';
                    // Get image by id- there is an issue- it gives 2 images on frontend
                    // echo wp_get_attachment_image( $settings['image']['id'], 'thumbnail' );
                ?>
				</a>
				<div class="ytext">
					<?php 
					// render description
						echo '<p>' . $settings['description'] . '</p>';
					?>
				</div>
            </div>
            <?php		
	}

	protected function content_template() {
		?>
        <div class="ybox">
            <div class="ytext">
                <h3>{{{ settings.text }}}</h3>
            </div>	

			<a href="{{ settings.website_link.url }}">
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

		</a>
		<div class="ytext">
                <p>{{{ settings.description }}}</p>
            </div>	

        </div>   
		<?php
		
	}

}



