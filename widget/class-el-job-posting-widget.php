<?php
/**
 * Register elementor widget.
 *
 * @package El_Job_Posting_Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


require_once __DIR__ . '/components/content.php';
require_once __DIR__ . '/components/style.php';
require_once __DIR__ . '/components/render.php';

/**
 * Widget register class extends to Widget_Base
 */
class El_Job_Posting_Widget extends Widget_Base {

	/**
	 * Retrieve Widget Name.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function get_name() {
		return 'job-posting-widget-for-elementor';
	}


	/**
	 * Retrieve Widget Title.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function get_title() {
		return esc_html__( 'Job Posting', 'job-posting-widget-for-elementor' );
	}

	/**
	 * Widget icon.
	 */
	public function get_icon() {
		return 'eicon-table-of-contents';
	}

	/**
	 * Retrieve Widget Keywords.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget keywords.
	 */
	public function get_keywords() {
		return array( 'job-listing', 'schema-generator', 'list' );
	}

	/**
	 * Enqueue style.
	 */
	public function get_style_depends() {
		wp_enqueue_style( 'el-job-posting-style', plugin_dir_url( __DIR__ ) . 'assets/css/style.css', array(), true );
		return array( 'el-job-posting-style' );
	}

	/**
	 * Widget categories.
	 */
	public function get_categories() {
		return array( 'general' );
	}

	/**
	 * Register controls.
	 */
	protected function register_controls() {
		el_job_posting_widget_content_setting( $this );
		el_job_posting_widget_styling_setting( $this );
	}

	/**
	 * Render callback.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		el_job_posting_widget_render_html( $settings );
	}
}
