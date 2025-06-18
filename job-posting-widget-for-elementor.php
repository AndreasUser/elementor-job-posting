<?php
/**
 *
 * Plugin Name: Job Posting Widget for Elementor
 * Description: This Elementor addon automatically adds structured data / schema markup for job postings to your job page.
 * Plugin URI:  https://wordpress.org/plugins/job-posting-widget-for-elementor
 * Version:     1.0.0
 * Author:      Andreas
 * Author URI:  https://www.seohit.de/
 * Text Domain: job-posting-widget-for-elementor
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 * WordPress Available: yes
 * Requires License: no
 *
 * @package El_Job_Posting_Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin activation.
 */
function el_job_posting_activation() {
	if ( ! is_plugin_active( 'elementor/elementor.php' ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die(
			esc_html__( 'This plugin requires Elementor to be installed and active.', 'job-posting-widget-for-elementor' ),
			'Plugin dependency check',
			array(
				'back_link' => true,
			)
		);
	}
}
register_activation_hook( __FILE__, 'el_job_posting_activation' );

/**
 * Plugin deactivation.
 */
function el_job_posting_deactivation() {
	// Deactivation code here.
}
register_deactivation_hook( __FILE__, 'el_job_posting_deactivation' );

/**
 * Register admin setting page.
 */
function el_job_posting_settings_page() {
	add_options_page( __( 'Job Posting Widget for Elementor', 'job-posting-widget-for-elementor' ), __( 'Job Posting Widget for Elementor', 'job-posting-widget-for-elementor' ), 'manage_options', 'el-job-posting-widget-settings', 'el_job_posting_settings_page_content' );
}
add_action( 'admin_menu', 'el_job_posting_settings_page' );

/**
 * Render setting page.
 */
function el_job_posting_settings_page_content() {
	?>
	<div class="wrap">
		<h2><?php esc_html_e( 'Job Posting Widget for Elementor', 'job-posting-widget-for-elementor' ); ?></h2>
		<form method="post" action="options.php">
			<?php settings_fields( 'el-job-posting-widget-settings-group' ); ?>
			<?php do_settings_sections( 'el-job-posting-widget-settings-group' ); ?>
			<?php submit_button( __( 'Save Changes', 'job-posting-widget-for-elementor' ), 'primary' ); ?>
		</form>
	</div>
	<?php
}

/**
 * Add plugin action link.
 *
 * @param array $links Existing action links.
 * @return array Modified action links with settings link.
 */
function el_job_posting_plugin_action_links( $links ) {
	$settings_link = '<a href="' . esc_url( admin_url( 'options-general.php?page=el-job-posting-widget-settings' ) ) . '">' . esc_html__( 'Settings', 'job-posting-widget-for-elementor' ) . '</a>';
	array_unshift( $links, $settings_link );
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'el_job_posting_plugin_action_links' );

/**
 * Settings section render callback.
 */
function el_job_posting_settings_section_callback() {
	wp_nonce_field( plugin_dir_path( __FILE__ ), 'security_nonce' );
	?>
	<p><?php esc_html_e( 'Tranlate all the words displayed to website visitors on the frontend.', 'job-posting-widget-for-elementor' ); ?></p>
	<?php
}

/**
 * Init settings.
 */
function el_job_posting_settings_init() {
	$arr = array(
		esc_html__( 'FULL TIME', 'job-posting-widget-for-elementor' ),
		esc_html__( 'PART TIME', 'job-posting-widget-for-elementor' ),
		esc_html__( 'CONTRACTOR', 'job-posting-widget-for-elementor' ),
		esc_html__( 'TEMPORARY', 'job-posting-widget-for-elementor' ),
		esc_html__( 'PRACTICE', 'job-posting-widget-for-elementor' ),
		esc_html__( 'VOLUNTEER', 'job-posting-widget-for-elementor' ),
		esc_html__( 'DAY JOB', 'job-posting-widget-for-elementor' ),
		esc_html__( 'MISCELLANEOUS', 'job-posting-widget-for-elementor' ),
		esc_html__( 'HOUR', 'job-posting-widget-for-elementor' ),
		esc_html__( 'WEEK', 'job-posting-widget-for-elementor' ),
		esc_html__( 'MONTH', 'job-posting-widget-for-elementor' ),
		esc_html__( 'YEAR', 'job-posting-widget-for-elementor' ),
		esc_html__( 'REMOTE', 'job-posting-widget-for-elementor' ),
		esc_html__( 'HOME OFFICE', 'job-posting-widget-for-elementor' ),
		esc_html__( 'WORK PLACE', 'job-posting-widget-for-elementor' ),
		esc_html__( 'EMPLOYMENT TYPE', 'job-posting-widget-for-elementor' ),
		esc_html__( 'SALARY', 'job-posting-widget-for-elementor' ),
		esc_html__( 'APPLICATION UNTIL', 'job-posting-widget-for-elementor' ),
	);

	// Register settings for each custom word.
	foreach ( $arr as $key => $value ) {
		register_setting(
			'el-job-posting-widget-settings-group',
			"el_job_posting_custom_word_$key",
			array(
				'default'           => null,
				'type'              => 'string',
				'sanitize_callback' => function ( $value ) {
					static $nonce_verified = null;
					if ( is_null( $nonce_verified ) ) {
						if (
							! isset( $_POST['security_nonce'] ) ||
							! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['security_nonce'] ) ), plugin_dir_path( __FILE__ ) )
						) {
							add_settings_error( 'el_job_posting_custom_word_nonce', 'invalid_nonce', __( 'Security check failed', 'el-job-posting-widget-settings-group' ), 'error' );
							$nonce_verified = false;
						} else {
							$nonce_verified = true;
						}
					}
					// If nonce failed, do not update.
					if ( ! $nonce_verified ) {
						return '';
					}
					return sanitize_text_field( $value );
				},
			)
		);
	}

	add_settings_section( 'el-job-posting-widget-settings-section', 'Translation', 'el_job_posting_settings_section_callback', 'el-job-posting-widget-settings-group' );

	// Add settings fields for each custom word.
	foreach ( $arr as $key => $value ) {
		add_settings_field(
			"el-job-posting-widget-custom-word-$key-field",
			$value,
			function () use ( $key ) {
				$custom_word = get_option( "el_job_posting_custom_word_$key" );
				echo '<input type="text" name="el_job_posting_custom_word_' . esc_attr( $key ) . '" value="' . esc_attr( $custom_word ) . '">';
			},
			'el-job-posting-widget-settings-group',
			'el-job-posting-widget-settings-section'
		);
	}
}
add_action( 'admin_init', 'el_job_posting_settings_init' );

/**
 * Register schema widget.
 *
 * @param object $widgets_manager Elementor manager.
 */
function register_schema_widget( $widgets_manager ) {
	require_once __DIR__ . '/widget/class-el-job-posting-widget.php';
	$widgets_manager->register( new \El_Job_Posting_Widget() );
}
add_action( 'elementor/widgets/register', 'register_schema_widget' );
