<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class text_title_widget extends \Elementor\Widget_Base {

	
	public function get_name() {
		return 'text_title';
	}

	
	public function get_title() {
		return esc_html__( 'Text + Title', 'text_title_widget' );
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
		return [ 'text', 'title' ];
	}

	
	protected function register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Text Content', 'text_title_widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'yrtext',
			[
				'label' => esc_html__( 'Text', 'text_title_widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default text', 'text_title_widget' ),
				'placeholder' => esc_html__( 'Type your text here', 'text_title_widget' ),
			]
		);
        $this->end_controls_section();


		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Title Content', 'text_title_widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'yrtitle',
			[
				'label' => esc_html__( 'Title', 'text_title_widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'text_title_widget' ),
				'placeholder' => esc_html__( 'Type your title here', 'text_title_widget' ),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<h6>' . $settings['yrtext'] . '</h6>';
		echo '<h2>' . $settings['yrtitle'] . '</h2>';

        
    }
    protected function content_template() {
		?>
        <h6>{{{ settings.yrtext }}}</h6>
		<h2>{{{ settings.yrtitle }}}</h2>
		<?php
	}
}