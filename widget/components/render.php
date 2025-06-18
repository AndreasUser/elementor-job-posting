<?php
/**
 * Widget render.
 *
 * @package El_Job_Posting_Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Icons_Manager;

/**
 * Custom date format.
 *
 * @param string $date Date.
 * @param string $date_formatting Custom date format.
 * @return string
 */
function el_job_posting_widget_date_formating( $date, $date_formatting ) {
	$date           = date_create( $date );
	$formatted_date = '';

	switch ( $date_formatting ) {
		case 'mm/dd/yyyy':
			$formatted_date = date_format( $date, 'm/d/Y' );
			break;
		case 'yyyy/mm/dd':
			$formatted_date = date_format( $date, 'Y/m/d' );
			break;
		case 'dd-mm-yyyy':
			$formatted_date = date_format( $date, 'd-m-Y' );
			break;
		case 'mm-dd-yyyy':
			$formatted_date = date_format( $date, 'm-d-Y' );
			break;
		case 'yyyy-mm-dd':
			$formatted_date = date_format( $date, 'Y-m-d' );
			break;
		case 'dd.mm.yyyy':
			$formatted_date = date_format( $date, 'd.m.Y' );
			break;
		case 'mm.dd.yyyy':
			$formatted_date = date_format( $date, 'm.d.Y' );
			break;
		case 'yyyy.mm.dd':
			$formatted_date = date_format( $date, 'Y.m.d' );
			break;
		default:
			$formatted_date = date_format( $date, 'd/m/Y' );
			break;
	}

	return $formatted_date;
}

/**
 * Check is elementor editor.
 */
function el_job_posting_widget_is_elementor_editor() {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( isset( $_GET['elementor-preview'] ) || ( isset( $_GET['action'] ) && 'elementor' === $_GET['action'] ) ) {
		return true;
	}
	return false;
}

/**
 * Custom post date format.
 *
 * @param string $post_date Post date.
 * @param string $date_format Date format.
 * @param string $stored_date Stored date.
 * @return bool
 */
function el_job_posting_widget_format_posting_date( $post_date, $date_format, $stored_date ) {
	if ( '' !== $post_date ) {
		return el_job_posting_widget_date_formating( $post_date, $date_format );
	}
	return el_job_posting_widget_is_elementor_editor() ? $stored_date : 'xx/xx/xxxx';
}

/**
 * Render html.
 *
 * @param array $settings Widget setting.
 */
function el_job_posting_widget_render_html( $settings ) {
	extract( $settings ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract

	$header_title_typography   = empty( $settings['posting_header_title_typography_font_size'] ) ? 'no-typography' : '';
	$header_company_typography = empty( $settings['posting_header_company_typography_font_size'] ) ? 'no-typography' : '';
	$header_date_typography    = empty( $settings['posting_header_date_typography_font_size'] ) ? 'no-typography' : '';

	$description_typography = empty( $settings['posting_description_typography_font_size'] ) ? 'no-typography' : '';

	$info_title_typography   = empty( $settings['posting_infobox_title_typography_font_size'] ) ? 'no-typography' : '';
	$info_company_typography = empty( $settings['posting_infobox_description_typography_font_size'] ) ? 'no-typography' : '';

	// Retrieve the stored date and format it.
	$post_date = get_option( 'el_job_posting_widget_post_date' );

	// Format the posting date.
	$date_posted   = el_job_posting_widget_format_posting_date( $posting_job_post_date, $posting_job_date_format, $post_date );
	$valid_through = el_job_posting_widget_date_formating( $posting_job_expire_date, $posting_job_date_format );

	$custom_word_12 = get_option( 'el_job_posting_widget_custom_word_12' );
	$custom_word_13 = get_option( 'el_job_posting_widget_custom_word_13' );
	$custom_word_14 = get_option( 'el_job_posting_widget_custom_word_14' );
	$custom_word_15 = get_option( 'el_job_posting_widget_custom_word_15' );
	$custom_word_16 = get_option( 'el_job_posting_widget_custom_word_16' );
	$custom_word_17 = get_option( 'el_job_posting_widget_custom_word_17' );
	?>
<div class="job-listing-container m-0 p-0">

	<div class="job-header">
		<div class="row">
			<div class="col-auto company-logo-wrap">
				<?php // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage ?>
				<img src="<?php echo esc_url( $posting_job_image['url'] ); ?>" alt="<?php echo esc_attr( $posting_job_title ); ?>" class="company-logo" width="80" height="80" />
			</div>

			<div class="col-md-7">
			<p class="job-date <?php echo esc_attr( $header_date_typography ); ?>">
					<?php
						Icons_Manager::render_icon(
							$date_post_icon,
							array(
								'aria-hidden' => 'true',
								'style'       => 'width: 13px; height: 13px;',
							)
						);
					?>
					<?php
						echo esc_html( $date_posted );
					?>
				</p>
				<a class="job-title" href="<?php echo ! empty( $posting_job_link['url'] ) ? esc_url( $posting_job_link['url'] ) : '#'; ?>">
					<h2 class="<?php echo esc_attr( $header_title_typography ); ?> m-0"><?php echo esc_html( $posting_job_title ); ?></h2>
				</a>
				<p class="job-company <?php echo esc_attr( $header_company_typography ); ?>"><?php echo esc_html( $posting_job_company ); ?></p>
			</div>
		</div>
	</div>
	
	<div class="job-detail <?php echo esc_attr( $description_typography ); ?>">
		<?php echo wp_kses( $posting_job_description, apply_filters( 'el_job_posting_allowed_html', wp_kses_allowed_html( 'post' ) ) ); ?>
	</div>

	<div class="info-box">
		<div class="d-flex flex-wrap">
			<?php if ( $posting_job_remote ) : ?>
			<div class="position-relative icon-box">
				<div class="row gap-2">
					<div class="col-3">
						<div class="at-icon-box-icon">
							<?php
								Icons_Manager::render_icon(
									$remote_icon,
									array(
										'aria-hidden' => 'true',
									)
								);
							?>
						</div>
					</div>
					<div class="col-8 col-md-9 px-1">
						<div class="at-icon-text">
							<h5 class="box-title <?php echo esc_attr( $info_title_typography ); ?>"><?php echo ! empty( $custom_word_12 ) ? esc_html( $custom_word_12 ) : esc_html__( 'Remote', 'job-posting-widget-for-elementor' ); ?></h5>
							<p class="box-description <?php echo esc_attr( $info_company_typography ); ?>"><?php echo ! empty( $custom_word_13 ) ? esc_html( $custom_word_13 ) : esc_html__( 'Home Office', 'job-posting-widget-for-elementor' ); ?></p>
						</div>    
					</div>
				</div>
			</div>
			<?php endif; ?> 

			<?php if ( $posting_job_city || $posting_job_street || $posting_job_zip_code ) : ?>
			<div class="position-relative icon-box">
				<div class="row gap-2">
					<div class="col-3">
						<div class="at-icon-box-icon">
							<?php
								Icons_Manager::render_icon(
									$location_icon,
									array(
										'aria-hidden' => 'true',
									)
								);
							?>
						</div>
					</div>
					<div class="col-8 col-md-9 px-1">
						<div class="at-icon-text">
							<h5 class="box-title <?php echo esc_attr( $info_title_typography ); ?>"><?php echo ! empty( $custom_word_14 ) ? esc_html( $custom_word_14 ) : 'Work Place'; ?></h5>
							<p class="box-description <?php echo esc_attr( $info_company_typography ); ?>"><?php echo esc_html( $posting_job_street ); ?></p><p class="box-description <?php echo esc_attr( $info_company_typography ); ?>"><?php echo esc_html( $posting_job_zip_code ) . ' ' . esc_html( $posting_job_city ); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?> 


			<?php if ( $posting_job_type ) : ?>
			<div class="position-relative icon-box">
				<div class="row gap-2">
					<div class="col-3">
						<div class="at-icon-box-icon">
							<?php
								Icons_Manager::render_icon(
									$job_type_icon,
									array(
										'aria-hidden' => 'true',
									)
								);
							?>
						</div>
					</div>
					<div class="col-8 col-md-9 px-1">
						<div class="at-icon-text">
							<h5 class="box-title <?php echo esc_attr( $info_title_typography ); ?>"><?php echo ! empty( $custom_word_15 ) ? esc_html( $custom_word_15 ) : esc_html__( 'Employment type', 'job-posting-widget-for-elementor' ); ?></h5>
							<p class="box-description <?php echo esc_attr( $info_company_typography ); ?>"><?php echo esc_html( $posting_job_type ); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?> 


			<?php if ( $posting_job_price ) : ?>
			<div class="position-relative icon-box">
				<div class="row gap-2">
					<div class="col-3">
						<div class="at-icon-box-icon">
							<?php
								Icons_Manager::render_icon(
									$salary_icon,
									array(
										'aria-hidden' => 'true',
									)
								);
							?>
						</div>
					</div>
					<div class="col-8 col-md-9 px-1">
						<div class="at-icon-text">
							<h5 class="box-title <?php echo esc_attr( $info_title_typography ); ?>"><?php echo ! empty( $custom_word_16 ) ? esc_html( $custom_word_16 ) : esc_html__( 'Salary', 'job-posting-widget-for-elementor' ); ?></h5>
							<p class="box-description <?php echo esc_attr( $info_company_typography ); ?>">
								<?php echo esc_html( $posting_job_price ); ?> 
								<?php echo '' !== $posting_job_max_price ? sprintf( ' — %s', esc_html( $posting_job_max_price ) ) : ''; ?> 
								<?php echo esc_html( $posting_job_currency ); ?> / <?php echo esc_html( $posting_job_per ); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?> 

			<?php if ( $posting_job_expire_date ) : ?>
			<div class="position-relative icon-box">
				<div class="row gap-2">
					<div class="col-3">
						<div class="at-icon-box-icon">
							<?php
								Icons_Manager::render_icon(
									$date_icon,
									array(
										'aria-hidden' => 'true',
									)
								);
							?>
						</div>
					</div>
					<div class="col-8 col-md-9 px-1">
						<div class="at-icon-text">
							<h5 class="box-title <?php echo esc_attr( $info_title_typography ); ?>"><?php echo ! empty( $custom_word_17 ) ? esc_html( $custom_word_17 ) : esc_html__( 'Application Until', 'job-posting-widget-for-elementor' ); ?></h5>
							<p class="box-description <?php echo esc_attr( $info_company_typography ); ?>"><?php echo esc_html( $valid_through ); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?> 
		</div>
	</div>
</div>

<script type="application/ld+json">
	<?php
	$structured_data = array(
		'@context'                      => esc_url( 'http://schema.org/' ),
		'@type'                         => 'JobPosting',
		'title'                         => $posting_job_title,
		'description'                   => nl2br( $posting_job_description ),
		'hiringOrganization'            => array(
			'@type'  => 'Organization',
			'name'   => $posting_job_company,
			'sameAs' => ! empty( $posting_job_link['url'] ) ? $posting_job_link['url'] : null,
			'logo'   => ! empty( $posting_job_image['url'] ) ? $posting_job_image['url'] : null,
		),
		'employmentType'                => ! empty( $posting_job_image['url'] ) ? $posting_job_type : null,

		'datePosted'                    => date_format( date_create( $posting_job_post_date ), 'Y-m-d' ),
		'validThrough'                  => date_format( date_create( $posting_job_expire_date ), 'Y-m-d' ),
		'applicantLocationRequirements' => array(
			'@type' => 'Country',
			'name'  => 'yes' === $posting_job_remote ? $posting_job_country : null,
		),
		'jobLocationType'               => 'yes' === $posting_job_remote ? 'TELECOMMUTE' : null,
		'jobLocation'                   => 'yes' !== $posting_job_remote ? array(
			'@type'   => 'Place',
			'address' => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => $posting_job_street,
				'addressLocality' => $posting_job_city,
				'postalCode'      => $posting_job_zip_code,
				'addressCountry'  => $posting_job_country,
			),
		) : null,
		'baseSalary'                    => ! empty( $posting_job_price && empty( $posting_job_max_price ) ) ? array(
			'@type'    => 'MonetaryAmount',
			'currency' => $posting_job_currency,
			'value'    => array(
				'@type'    => 'QuantitativeValue',
				'value'    => $posting_job_price,
				'unitText' => $posting_job_per,
			),
		) : (
			( ! empty( $posting_job_price ) && ! empty( $posting_job_max_price ) ) ? array(
				'@type'    => 'MonetaryAmount',
				'currency' => $posting_job_currency,
				'value'    => array(
					'@type'    => 'QuantitativeValue',
					'minValue' => $posting_job_price,
					'maxValue' => $posting_job_max_price,
					'unitText' => $posting_job_per,
				),
			) : null
		),
	);

	// Convert the array to a JSON string using JSON.stringify.
	$json_ld_script = wp_json_encode( apply_filters( 'el_job_posting_render_schema_data', $structured_data, $settings ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
	?>

	// Output the JSON-LD script
	<?php echo $json_ld_script; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
</script>
	<?php
}
