<?php
/**
 * Widget render.
 *
 * @package El_Job_Posting_Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

/**
 * Widget style dimension.
 *
 * @param object $el Elementor widget manager.
 * @param string $section_id Section ID.
 * @param string $label Section label.
 * @param string $selector selector.
 * @param string $usage usage.
 * @return void
 */
function el_job_posting_widget_dimension( $el, $section_id, $label, $selector, $usage ) {
	$el->add_responsive_control(
		'posting_' . $section_id,
		array(
			'label'      => esc_html( $label ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'default'    => array( '' ),
			'selectors'  => array(
				'{{WRAPPER}} ' . $selector => $usage . ': {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
			),
		)
	);
}

/**
 * Widget slider.
 *
 * @param object $el Elementor widget manager.
 * @param string $section_id Section ID.
 * @param string $label Section label.
 * @param string $selector selector.
 * @param string $usage usage.
 * @return void
 */
function el_job_posting_widget_slider( $el, $section_id, $label, $selector, $usage ) {
	$el->add_responsive_control(
		'posting_' . $section_id,
		array(
			'label'      => esc_html( $label ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array(
				'px' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors'  => array(
				'{{WRAPPER}} ' . $selector => $usage . ': {{SIZE}}{{UNIT}}  !important;',
			),
		)
	);
}

/**
 * Widget style color.
 *
 * @param object $el Elementor widget manager.
 * @param string $section_id Section ID.
 * @param string $label Section label.
 * @param string $selector selector.
 * @param string $usage usage.
 * @return void
 */
function el_job_posting_widget_color( $el, $section_id, $label, $selector, $usage ) {
	$el->add_responsive_control(
		'posting_' . $section_id,
		array(
			'label'     => esc_html( $label ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $selector => $usage . ': {{VALUE}}  !important;',
			),
		)
	);
}

/**
 * Widget style text controls.
 *
 * @param object $el Elementor widget manager.
 * @param string $section_id Section ID.
 * @param string $label Section label.
 * @param string $selector selector.
 * @return void
 */
function el_job_posting_widget_add_text_controls( $el, $section_id, $label, $selector ) {
	$el->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => $section_id . '_typography',
			'label'    => esc_html( $label . ' Typography' ),
			'selector' => '{{WRAPPER}} ' . $selector,
			'global'   => array(
				'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
			),
		)
	);

	$el->add_responsive_control(
		$section_id . '_color',
		array(
			'label'     => esc_html( $label . ' Color' ),
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $selector => 'color: {{VALUE}}  !important',
			),
		)
	);
}

/**
 * Widget style dimension.
 *
 * @param object $el Elementor widget manager.
 * @param string $control_id Control ID.
 * @param string $label Section label.
 * @param string $selector selector.
 * @return void
 */
function el_job_posting_widget_add_background_border_control( $el, $control_id, $label, $selector ) {
	$el->add_responsive_control(
		$control_id . '_backgroundcolor',
		array(
			'label'     => sprintf(
				// translators: %s to $salary.
				esc_html__( '%s Background Color', 'job-posting-widget-for-elementor' ),
				$label
			),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} ' . $selector => 'background-color: {{VALUE}} !important',
			),
		)
	);

	$el->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => $control_id . '_border',
			'selector' => '{{WRAPPER}} ' . $selector,
		)
	);
}

/**
 * Header style.
 *
 * @param object $el Elementor widget manager.
 * @return void
 */
function el_job_posting_widget_listing_header_style( $el ) {
	$el->start_controls_section(
		'posting_header',
		array(
			'label' => esc_html__( 'Header', 'job-posting-widget-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);

	el_job_posting_widget_dimension( $el, 'header_padding', 'Padding', '.job-header', 'padding' );
	$el->add_group_control(
		Group_Control_Background::get_type(),
		array(
			'name'     => 'posting_header_background',
			'types'    => array( 'classic', 'gradient', 'video' ),
			'selector' => '{{WRAPPER}} .job-header',
		)
	);

	$el->add_control(
		'job_style_heading_image',
		array(
			'label'     => esc_html__( 'Image', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'none',
		)
	);
	el_job_posting_widget_slider( $el, 'image_width', esc_html__( 'Width', 'job-posting-widget-for-elementor' ), '.job-header .company-logo', 'width' );
	el_job_posting_widget_slider( $el, 'image_height', esc_html__( 'Height', 'job-posting-widget-for-elementor' ), '.job-header .company-logo', 'height' );
	el_job_posting_widget_slider( $el, 'image_border_radius', esc_html__( 'Border Radius', 'job-posting-widget-for-elementor' ), '.job-header .company-logo', 'border-radius' );

	$el->add_control(
		'job_style_heading_title',
		array(
			'label'     => esc_html__( 'Title', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);

	el_job_posting_widget_dimension( $el, 'title_header_padding', esc_html__( 'Padding', 'job-posting-widget-for-elementor' ), '.job-header .job-title h2', 'padding' );

	el_job_posting_widget_add_text_controls( $el, 'posting_header_title', esc_html__( 'Title', 'job-posting-widget-for-elementor' ), '.job-header .job-title h2' );
	el_job_posting_widget_add_background_border_control( $el, 'posting_header_title', esc_html__( 'Title', 'job-posting-widget-for-elementor' ), '.job-header .job-title h2' );

	$el->add_control(
		'job_style_heading_company',
		array(
			'label'     => esc_html__( 'Company', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);

	el_job_posting_widget_dimension( $el, 'company_header_padding', esc_html__( 'Padding', 'job-posting-widget-for-elementor' ), '.job-header .job-company', 'padding' );

	el_job_posting_widget_add_text_controls( $el, 'posting_header_company', esc_html__( 'Company', 'job-posting-widget-for-elementor' ), '.job-header .job-company' );
	el_job_posting_widget_add_background_border_control( $el, 'posting_header_company', esc_html__( 'Company', 'job-posting-widget-for-elementor' ), '.job-header .job-company' );

	$el->add_control(
		'job_style_heading_date',
		array(
			'label'     => esc_html__( 'Date', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);

	el_job_posting_widget_dimension( $el, 'date_header_padding', esc_html__( 'Padding', 'job-posting-widget-for-elementor' ), '.job-header .job-date', 'padding' );

	el_job_posting_widget_add_text_controls( $el, 'posting_header_date', esc_html__( 'Date', 'job-posting-widget-for-elementor' ), '.job-header .job-date' );
	el_job_posting_widget_add_background_border_control( $el, 'posting_header_date', esc_html__( 'Date', 'job-posting-widget-for-elementor' ), '.job-header .job-date' );

	$el->end_controls_section();
}

/**
 * Listing content style.
 *
 * @param object $el Elementor widget manager.
 * @return void
 */
function el_job_posting_widget_listing_content_style( $el ) {
	$el->start_controls_section(
		'posting_style_content',
		array(
			'label' => esc_html__( 'Job Description', 'job-posting-widget-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);

	$el->add_group_control(
		Group_Control_Background::get_type(),
		array(
			'name'     => 'posting_content_background',
			'types'    => array( 'classic', 'gradient', 'video' ),
			'selector' => '{{WRAPPER}} .job-detail',
		)
	);

	el_job_posting_widget_dimension( $el, 'description_padding', esc_html__( 'Padding', 'job-posting-widget-for-elementor' ), '.job-detail', 'padding' );

	el_job_posting_widget_add_text_controls( $el, 'posting_description', esc_html__( 'Description', 'job-posting-widget-for-elementor' ), '.job-detail' );
	el_job_posting_widget_add_background_border_control( $el, 'posting_description', esc_html__( 'Description', 'job-posting-widget-for-elementor' ), '.job-detail' );

	$el->end_controls_section();
}

/**
 * Listing more info style.
 *
 * @param object $el Elementor widget manager.
 * @return void
 */
function el_job_posting_widget_listing_info_style( $el ) {
	$el->start_controls_section(
		'posting_more_infobox',
		array(
			'label' => esc_html__( 'Further information', 'job-posting-widget-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);

	el_job_posting_widget_dimension( $el, 'infobox_padding', esc_html__( 'Padding', 'job-posting-widget-for-elementor' ), '.info-box', 'padding' );

	$el->add_responsive_control(
		'posting_infobox_icon_box_row_gap',
		array(
			'label'      => esc_html__( 'Row Gap', 'job-posting-widget-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array(
				'px' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),
			'default'    => array(
				'unit' => 'px',
				'size' => 10,
			),
			'selectors'  => array(
				'{{WRAPPER}} .info-box .icon-box' => 'margin-bottom: {{SIZE}}{{UNIT}}',
			),
		)
	);

	$el->add_group_control(
		Group_Control_Background::get_type(),
		array(
			'name'     => 'posting_infobox_background',
			'types'    => array( 'classic', 'gradient', 'video' ),
			'selector' => '{{WRAPPER}} .info-box',
		)
	);

	$el->add_control(
		'job_style_heading_icon',
		array(
			'label'     => esc_html__( 'Icon', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);

	$el->add_responsive_control(
		'posting_infobox_icon_size',
		array(
			'label'      => esc_html__( 'Size', 'job-posting-widget-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array(
				'px' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors'  => array(
				'{{WRAPPER}} .info-box .at-icon-box-icon i, {{WRAPPER}} .info-box .at-icon-box-icon svg'  => 'font-size: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
			),
		)
	);
	$el->add_responsive_control(
		'posting_infobox_icon_color',
		array(
			'label'     => esc_html__( 'Color', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .info-box .at-icon-box-icon i, {{WRAPPER}} .info-box .at-icon-box-icon svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
			),
		)
	);

	el_job_posting_widget_add_background_border_control( $el, 'posting_infobox_icon', esc_html__( 'Icon', 'job-posting-widget-for-elementor' ), '.info-box .at-icon-box-icon' );

	el_job_posting_widget_slider( $el, 'infobox_icon_width', esc_html__( 'Icon Box Width', 'job-posting-widget-for-elementor' ), '.info-box .at-icon-box-icon', 'width' );
	el_job_posting_widget_slider( $el, 'infobox_icon_height', esc_html__( 'Icon Box Height', 'job-posting-widget-for-elementor' ), '.info-box .at-icon-box-icon', 'height' );

	el_job_posting_widget_dimension( $el, 'infobox_icon_padding', esc_html__( 'Padding', 'job-posting-widget-for-elementor' ), '.info-box .at-icon-box-icon', 'padding' );
	el_job_posting_widget_dimension( $el, 'infobox_icon_margin', esc_html__( 'Margin', 'job-posting-widget-for-elementor' ), '.info-box .at-icon-box-icon', 'margin' );

	$el->add_control(
		'job_style_heading_info_title',
		array(
			'label'     => esc_html__( 'Title', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);
	el_job_posting_widget_add_text_controls( $el, 'posting_infobox_title', esc_html__( 'Title', 'job-posting-widget-for-elementor' ), '.info-box .at-icon-text .box-title' );
	el_job_posting_widget_dimension( $el, 'infobox_title_padding', esc_html__( 'Padding', 'job-posting-widget-for-elementor' ), '.info-box .at-icon-text', 'padding' );

	$el->add_control(
		'job_style_heading_info_description',
		array(
			'label'     => esc_html__( 'Description', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);
	el_job_posting_widget_add_text_controls( $el, 'posting_infobox_description', esc_html__( 'Description', 'job-posting-widget-for-elementor' ), '.info-box .at-icon-text .box-description' );

	$el->end_controls_section();
}

/**
 * Styling setting.
 *
 * @param object $el Elementor widget manager.
 * @return void
 */
function el_job_posting_widget_styling_setting( $el ) {
	el_job_posting_widget_listing_header_style( $el );
	el_job_posting_widget_listing_content_style( $el );
	el_job_posting_widget_listing_info_style( $el );
}
