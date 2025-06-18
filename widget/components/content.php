<?php
/**
 * Widget content.
 *
 * @package El_Job_Posting_Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;

/**
 * Listing header.
 *
 * @param object $el Widget manager object.
 */
function el_job_posting_widget_listing_header( $el ) {
	$el->start_controls_section(
		'header_section',
		array(
			'label' => esc_html( 'Header' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);

	$el->add_control(
		'posting_job_title',
		array(
			'label'       => esc_html__( 'Job title', 'job-posting-widget-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Job title', 'job-posting-widget-for-elementor' ),
			'placeholder' => esc_html__( 'Job title', 'job-posting-widget-for-elementor' ),
		)
	);

	$el->add_control(
		'posting_job_company',
		array(
			'label'       => esc_html__( 'Company', 'job-posting-widget-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Company', 'job-posting-widget-for-elementor' ),
			'placeholder' => esc_html__( 'Company', 'job-posting-widget-for-elementor' ),
		)
	);

	$el->add_control(
		'posting_job_link',
		array(
			'label'       => esc_html__( 'Company URL', 'job-posting-widget-for-elementor' ),
			'type'        => Controls_Manager::URL,
			'options'     => array( 'url', 'is_external', 'nofollow' ),
			'label_block' => true,
		)
	);

	$el->add_control(
		'posting_job_image',
		array(
			'label'   => esc_html__( 'Choose logo', 'job-posting-widget-for-elementor' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => array(
				'url' => Utils::get_placeholder_image_src(),
			),
		)
	);

	$el->add_control(
		'date_post_icon',
		array(
			'label'   => esc_html__( 'Icon', 'job-posting-widget-for-elementor' ),
			'type'    => Controls_Manager::ICONS,
			'default' => array(
				'value'   => 'fas fa-calendar-check',
				'library' => 'fa-solid',
			),
		)
	);

	$el->add_control(
		'posting_job_post_date',
		array(
			'label' => esc_html__( 'Post Date', 'job-posting-widget-for-elementor' ),
			'type'  => Controls_Manager::DATE_TIME,
		)
	);

	$el->add_control(
		'posting_job_date_format',
		array(
			'label'       => esc_html__( 'Date Format', 'job-posting-widget-for-elementor' ),
			'type'        => Controls_Manager::SELECT,
			'description' => esc_html__( 'Choose the appropriate date format for your country', 'job-posting-widget-for-elementor' ),
			'default'     => 'dd/mm/yyyy',
			'options'     => array(
				'dd/mm/yyyy' => 'dd/mm/yyyy',
				'mm/dd/yyyy' => 'mm/dd/yyyy',
				'yyyy/mm/dd' => 'yyyy/mm/dd',
				'dd-mm-yyyy' => 'dd-mm-yyyy',
				'mm-dd-yyyy' => 'mm-dd-yyyy',
				'yyyy-mm-dd' => 'yyyy-mm-dd',
				'dd.mm.yyyy' => 'dd.mm.yyyy',
				'mm.dd.yyyy' => 'mm.dd.yyyy',
				'yyyy.mm.dd' => 'yyyy.mm.dd',
			),
		)
	);

	$el->end_controls_section();
}

/**
 * Listing content.
 *
 * @param object $el Widget manager object.
 */
function el_job_posting_widget_listing_content( $el ) {
	$el->start_controls_section(
		'content_section',
		array(
			'label' => esc_html__( 'Job Description', 'job-posting-widget-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);
	$el->add_control(
		'posting_job_description',
		array(
			'label'       => esc_html__( 'Description', 'job-posting-widget-for-elementor' ),
			'type'        => Controls_Manager::WYSIWYG,
			'default'     => sprintf(
				__(
					'<strong>Job Description:</strong> A UI/UX (User Interface/User Experience) designer is responsible for designing and creating engaging and effective interfaces for software and web applications. This includes designing the layout, visual design, and interactivity of the user interface.
            
            <strong>Job Responsibility:</strong> Collaborating with cross-functional teams: UI/UX designers often work closely with other teams, including product management, engineering, and marketing, to ensure that the user interface is aligned with business and technical requirements. You will need to be able to effectively communicate your design ideas and gather feedback from other team members.
            <ul> <li>Conducting user research and testing to understand user needs and behaviors.</li> <li>Designing wireframes, prototypes, and high-fidelity mockups.</li> <li>Developing and maintaining design systems and style guides.</li> <li>Collaborating with cross-functional teams, including product management, engineering, and marketing.</li> <li>Staying up-to-date with the latest design trends and technologies.</li> <li>Gathering and analyzing user requirements to inform the design of new software or web applications.</li></ul>',
					'job-posting-widget-for-elementor'
				)
			),
			'placeholder' => esc_html__( 'Type your description here', 'job-posting-widget-for-elementor' ),
		)
	);
	$el->end_controls_section();
}

/**
 * Listing info.
 *
 * @param object $el Widget manager object.
 * @param string $date Date.
 */
function el_job_posting_widget_listing_info( $el, $date ) {
	$custom_word_0 = get_option( 'el_job_posting_widget_custom_word_0' );
	$custom_word_1 = get_option( 'el_job_posting_widget_custom_word_1' );
	$custom_word_2 = get_option( 'el_job_posting_widget_custom_word_2' );
	$custom_word_3 = get_option( 'el_job_posting_widget_custom_word_3' );
	$custom_word_4 = get_option( 'el_job_posting_widget_custom_word_4' );
	$custom_word_5 = get_option( 'el_job_posting_widget_custom_word_5' );
	$custom_word_6 = get_option( 'el_job_posting_widget_custom_word_6' );
	$custom_word_7 = get_option( 'el_job_posting_widget_custom_word_7' );

	$custom_word_8  = get_option( 'el_job_posting_widget_custom_word_8' );
	$custom_word_9  = get_option( 'el_job_posting_widget_custom_word_9' );
	$custom_word_10 = get_option( 'el_job_posting_widget_custom_word_10' );
	$custom_word_11 = get_option( 'el_job_posting_widget_custom_word_11' );
	$custom_word_12 = get_option( 'el_job_posting_widget_custom_word_12' );
	$custom_word_13 = get_option( 'el_job_posting_widget_custom_word_13' );
	$custom_word_14 = get_option( 'el_job_posting_widget_custom_word_14' );
	$custom_word_15 = get_option( 'el_job_posting_widget_custom_word_15' );
	$custom_word_16 = get_option( 'el_job_posting_widget_custom_word_16' );
	$custom_word_17 = get_option( 'el_job_posting_widget_custom_word_17' );
	$custom_word_18 = get_option( 'el_job_posting_widget_custom_word_18' );
	$custom_word_19 = get_option( 'el_job_posting_widget_custom_word_19' );
	$custom_word_20 = get_option( 'el_job_posting_widget_custom_word_20' );
	$custom_word_21 = get_option( 'el_job_posting_widget_custom_word_21' );
	$custom_word_22 = get_option( 'el_job_posting_widget_custom_word_22' );
	$custom_word_23 = get_option( 'el_job_posting_widget_custom_word_23' );
	$custom_word_24 = get_option( 'el_job_posting_widget_custom_word_24' );

	$full_time          = ! empty( $custom_word_0 ) ? $custom_word_0 : esc_html__( 'Full time', 'job-posting-widget-for-elementor' );
	$part_time          = ! empty( $custom_word_1 ) ? $custom_word_1 : esc_html__( 'Part time', 'job-posting-widget-for-elementor' );
	$contractor         = ! empty( $custom_word_2 ) ? $custom_word_2 : esc_html__( 'Contractor', 'job-posting-widget-for-elementor' );
	$temporary_position = ! empty( $custom_word_3 ) ? $custom_word_3 : esc_html__( 'Temporary position', 'job-posting-widget-for-elementor' );
	$practice           = ! empty( $custom_word_4 ) ? $custom_word_4 : esc_html__( 'Practice', 'job-posting-widget-for-elementor' );
	$volunteer          = ! empty( $custom_word_5 ) ? $custom_word_5 : esc_html__( 'Volunteer', 'job-posting-widget-for-elementor' );
	$day_job            = ! empty( $custom_word_6 ) ? $custom_word_6 : esc_html__( 'Day job', 'job-posting-widget-for-elementor' );
	$miscellaneous      = ! empty( $custom_word_7 ) ? $custom_word_7 : esc_html__( 'Miscellaneous', 'job-posting-widget-for-elementor' );

	$hour  = ! empty( $custom_word_8 ) ? $custom_word_8 : esc_html__( 'Hour', 'job-posting-widget-for-elementor' );
	$week  = ! empty( $custom_word_9 ) ? $custom_word_9 : esc_html__( 'Week', 'job-posting-widget-for-elementor' );
	$month = ! empty( $custom_word_10 ) ? $custom_word_10 : esc_html__( 'Month', 'job-posting-widget-for-elementor' );
	$year  = ! empty( $custom_word_11 ) ? $custom_word_11 : esc_html__( 'Year', 'job-posting-widget-for-elementor' );

	$work_place       = ! empty( $custom_word_14 ) ? $custom_word_14 : esc_html__( 'Work Place', 'job-posting-widget-for-elementor' );
	$remote           = ! empty( $custom_word_12 ) ? $custom_word_12 : esc_html__( 'Remote', 'job-posting-widget-for-elementor' );
	$employment_type  = ! empty( $custom_word_15 ) ? $custom_word_15 : esc_html__( 'Employment type', 'job-posting-widget-for-elementor' );
	$salary           = ! empty( $custom_word_16 ) ? $custom_word_16 : esc_html__( 'Salary', 'job-posting-widget-for-elementor' );
	$appliction_until = ! empty( $custom_word_17 ) ? $custom_word_17 : esc_html__( 'Application Until', 'job-posting-widget-for-elementor' );

	$el->start_controls_section(
		'info_section',
		array(
			'label' => esc_html__( 'Further information', 'job-posting-widget-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);

	$el->add_control(
		'posting_job_heading_type',
		array(
			'label'     => esc_html( $employment_type ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);

	$el->add_control(
		'job_type_icon',
		array(
			'label'   => esc_html__( 'Icon', 'job-posting-widget-for-elementor' ),
			'type'    => Controls_Manager::ICONS,
			'default' => array(
				'value'   => 'fas fa-hourglass',
				'library' => 'fa-solid',
			),
		)
	);

	$el->add_control(
		'posting_job_type',
		array(
			'label'   => esc_html( $employment_type ),
			'type'    => Controls_Manager::SELECT,
			'default' => $full_time,
			'options' => array(
				''                  => esc_html__( 'None', 'job-posting-widget-for-elementor' ),
				$full_time          => $full_time,
				$part_time          => $part_time,
				$contractor         => $contractor,
				$temporary_position => $temporary_position,
				$practice           => $practice,
				$volunteer          => $volunteer,
				$day_job            => $day_job,
				$miscellaneous      => $miscellaneous,
			),
		)
	);

	$el->add_control(
		'posting_job_heading_date',
		array(
			'label'     => esc_html__( 'Duration', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);
	$el->add_control(
		'date_icon',
		array(
			'label'   => esc_html__( 'Icon', 'job-posting-widget-for-elementor' ),
			'type'    => Controls_Manager::ICONS,
			'default' => array(
				'value'   => 'fas fa-calendar-check',
				'library' => 'fa-solid',
			),
		)
	);

	$el->add_control(
		'posting_job_expire_date',
		array(
			'label'   => esc_html( $appliction_until ),
			'type'    => Controls_Manager::DATE_TIME,
			'default' => $date,
		)
	);

	$el->add_control(
		'posting_job_heading_location',
		array(
			'label'     => esc_html( $work_place ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);
	$el->add_control(
		'location_icon',
		array(
			'label'   => esc_html__( 'Icon', 'job-posting-widget-for-elementor' ),
			'type'    => Controls_Manager::ICONS,
			'default' => array(
				'value'   => 'fas fa-map-marker',
				'library' => 'fa-solid',
			),
		)
	);

	$el->add_control(
		'remote_icon',
		array(
			'label'   => esc_html__( 'Remote Type Icon', 'job-posting-widget-for-elementor' ),
			'type'    => Controls_Manager::ICONS,
			'default' => array(
				'value'   => 'fas fa-globe',
				'library' => 'fa-solid',
			),
		)
	);

	$el->add_control(
		'posting_job_remote',
		array(
			'label'        => esc_html( $remote ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'Yes', 'job-posting-widget-for-elementor' ),
			'label_off'    => esc_html__( 'No', 'job-posting-widget-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		)
	);

	$el->add_control(
		'posting_job_country',
		array(
			'label'   => esc_html__( 'Country', 'job-posting-widget-for-elementor' ),
			'type'    => Controls_Manager::SELECT2,
			'default' => 'Deutschland',
			'options' => array(
				''   => esc_html__( 'None', 'job-posting-widget-for-elementor' ),
				'AF' => 'Afghanistan',
				'AL' => 'Albania',
				'DZ' => 'Algeria',
				'AS' => 'American Samoa',
				'AD' => 'Andorra',
				'AO' => 'Angola',
				'AI' => 'Anguilla',
				'AQ' => 'Antarctica',
				'AG' => 'Antigua and Barbuda',
				'AR' => 'Argentina',
				'AM' => 'Armenia',
				'AW' => 'Aruba',
				'AU' => 'Australia',
				'AT' => 'Austria',
				'AZ' => 'Azerbaijan',
				'BS' => 'Bahamas',
				'BH' => 'Bahrain',
				'BD' => 'Bangladesh',
				'BB' => 'Barbados',
				'BY' => 'Belarus',
				'BE' => 'Belgium',
				'BZ' => 'Belize',
				'BJ' => 'Benin',
				'BM' => 'Bermuda',
				'BT' => 'Bhutan',
				'BO' => 'Bolivia',
				'BA' => 'Bosnia and Herzegovina',
				'BW' => 'Botswana',
				'BV' => 'Bouvet Island',
				'BR' => 'Brazil',
				'BQ' => 'British Antarctic Territory',
				'IO' => 'British Indian Ocean Territory',
				'VG' => 'British Virgin Islands',
				'BN' => 'Brunei',
				'BG' => 'Bulgaria',
				'BF' => 'Burkina Faso',
				'BI' => 'Burundi',
				'KH' => 'Cambodia',
				'CM' => 'Cameroon',
				'CA' => 'Canada',
				'CT' => 'Canton and Enderbury Islands',
				'CV' => 'Cape Verde',
				'KY' => 'Cayman Islands',
				'CF' => 'Central African Republic',
				'TD' => 'Chad',
				'CL' => 'Chile',
				'CN' => 'China',
				'CX' => 'Christmas Island',
				'CC' => 'Cocos [Keeling] Islands',
				'CO' => 'Colombia',
				'KM' => 'Comoros',
				'CG' => 'Congo - Brazzaville',
				'CD' => 'Congo - Kinshasa',
				'CK' => 'Cook Islands',
				'CR' => 'Costa Rica',
				'HR' => 'Croatia',
				'CU' => 'Cuba',
				'CY' => 'Cyprus',
				'CZ' => 'Czech Republic',
				'CI' => 'Côte d’Ivoire',
				'DK' => 'Denmark',
				'DJ' => 'Djibouti',
				'DM' => 'Dominica',
				'DO' => 'Dominican Republic',
				'NQ' => 'Dronning Maud Land',
				'DD' => 'East Germany',
				'EC' => 'Ecuador',
				'EG' => 'Egypt',
				'SV' => 'El Salvador',
				'GQ' => 'Equatorial Guinea',
				'ER' => 'Eritrea',
				'EE' => 'Estonia',
				'ET' => 'Ethiopia',
				'FK' => 'Falkland Islands',
				'FO' => 'Faroe Islands',
				'FJ' => 'Fiji',
				'FI' => 'Finland',
				'FR' => 'France',
				'GF' => 'French Guiana',
				'PF' => 'French Polynesia',
				'TF' => 'French Southern Territories',
				'FQ' => 'French Southern and Antarctic Territories',
				'GA' => 'Gabon',
				'GM' => 'Gambia',
				'GE' => 'Georgia',
				'DE' => 'Germany',
				'GH' => 'Ghana',
				'GI' => 'Gibraltar',
				'GR' => 'Greece',
				'GL' => 'Greenland',
				'GD' => 'Grenada',
				'GP' => 'Guadeloupe',
				'GU' => 'Guam',
				'GT' => 'Guatemala',
				'GG' => 'Guernsey',
				'GN' => 'Guinea',
				'GW' => 'Guinea-Bissau',
				'GY' => 'Guyana',
				'HT' => 'Haiti',
				'HM' => 'Heard Island and McDonald Islands',
				'HN' => 'Honduras',
				'HK' => 'Hong Kong SAR China',
				'HU' => 'Hungary',
				'IS' => 'Iceland',
				'IN' => 'India',
				'ID' => 'Indonesia',
				'IR' => 'Iran',
				'IQ' => 'Iraq',
				'IE' => 'Ireland',
				'IM' => 'Isle of Man',
				'IL' => 'Israel',
				'IT' => 'Italy',
				'JM' => 'Jamaica',
				'JP' => 'Japan',
				'JE' => 'Jersey',
				'JT' => 'Johnston Island',
				'JO' => 'Jordan',
				'KZ' => 'Kazakhstan',
				'KE' => 'Kenya',
				'KI' => 'Kiribati',
				'KW' => 'Kuwait',
				'KG' => 'Kyrgyzstan',
				'LA' => 'Laos',
				'LV' => 'Latvia',
				'LB' => 'Lebanon',
				'LS' => 'Lesotho',
				'LR' => 'Liberia',
				'LY' => 'Libya',
				'LI' => 'Liechtenstein',
				'LT' => 'Lithuania',
				'LU' => 'Luxembourg',
				'MO' => 'Macau SAR China',
				'MK' => 'Macedonia',
				'MG' => 'Madagascar',
				'MW' => 'Malawi',
				'MY' => 'Malaysia',
				'MV' => 'Maldives',
				'ML' => 'Mali',
				'MT' => 'Malta',
				'MH' => 'Marshall Islands',
				'MQ' => 'Martinique',
				'MR' => 'Mauritania',
				'MU' => 'Mauritius',
				'YT' => 'Mayotte',
				'FX' => 'Metropolitan France',
				'MX' => 'Mexico',
				'FM' => 'Micronesia',
				'MI' => 'Midway Islands',
				'MD' => 'Moldova',
				'MC' => 'Monaco',
				'MN' => 'Mongolia',
				'ME' => 'Montenegro',
				'MS' => 'Montserrat',
				'MA' => 'Morocco',
				'MZ' => 'Mozambique',
				'MM' => 'Myanmar [Burma]',
				'NA' => 'Namibia',
				'NR' => 'Nauru',
				'NP' => 'Nepal',
				'NL' => 'Netherlands',
				'AN' => 'Netherlands Antilles',
				'NT' => 'Neutral Zone',
				'NC' => 'New Caledonia',
				'NZ' => 'New Zealand',
				'NI' => 'Nicaragua',
				'NE' => 'Niger',
				'NG' => 'Nigeria',
				'NU' => 'Niue',
				'NF' => 'Norfolk Island',
				'KP' => 'North Korea',
				'VD' => 'North Vietnam',
				'MP' => 'Northern Mariana Islands',
				'NO' => 'Norway',
				'OM' => 'Oman',
				'PC' => 'Pacific Islands Trust Territory',
				'PK' => 'Pakistan',
				'PW' => 'Palau',
				'PS' => 'Palestinian Territories',
				'PA' => 'Panama',
				'PZ' => 'Panama Canal Zone',
				'PG' => 'Papua New Guinea',
				'PY' => 'Paraguay',
				'YD' => "People's Democratic Republic of Yemen",
				'PE' => 'Peru',
				'PH' => 'Philippines',
				'PN' => 'Pitcairn Islands',
				'PL' => 'Poland',
				'PT' => 'Portugal',
				'PR' => 'Puerto Rico',
				'QA' => 'Qatar',
				'RO' => 'Romania',
				'RU' => 'Russia',
				'RW' => 'Rwanda',
				'RE' => 'Réunion',
				'BL' => 'Saint Barthélemy',
				'SH' => 'Saint Helena',
				'KN' => 'Saint Kitts and Nevis',
				'LC' => 'Saint Lucia',
				'MF' => 'Saint Martin',
				'PM' => 'Saint Pierre and Miquelon',
				'VC' => 'Saint Vincent and the Grenadines',
				'WS' => 'Samoa',
				'SM' => 'San Marino',
				'SA' => 'Saudi Arabia',
				'SN' => 'Senegal',
				'RS' => 'Serbia',
				'CS' => 'Serbia and Montenegro',
				'SC' => 'Seychelles',
				'SL' => 'Sierra Leone',
				'SG' => 'Singapore',
				'SK' => 'Slovakia',
				'SI' => 'Slovenia',
				'SB' => 'Solomon Islands',
				'SO' => 'Somalia',
				'ZA' => 'South Africa',
				'GS' => 'South Georgia and the South Sandwich Islands',
				'KR' => 'South Korea',
				'ES' => 'Spain',
				'LK' => 'Sri Lanka',
				'SD' => 'Sudan',
				'SR' => 'Suriname',
				'SJ' => 'Svalbard and Jan Mayen',
				'SZ' => 'Swaziland',
				'SE' => 'Sweden',
				'CH' => 'Switzerland',
				'SY' => 'Syria',
				'ST' => 'São Tomé and Príncipe',
				'TW' => 'Taiwan',
				'TJ' => 'Tajikistan',
				'TZ' => 'Tanzania',
				'TH' => 'Thailand',
				'TL' => 'Timor-Leste',
				'TG' => 'Togo',
				'TK' => 'Tokelau',
				'TO' => 'Tonga',
				'TT' => 'Trinidad and Tobago',
				'TN' => 'Tunisia',
				'TR' => 'Turkey',
				'TM' => 'Turkmenistan',
				'TC' => 'Turks and Caicos Islands',
				'TV' => 'Tuvalu',
				'UM' => 'U.S. Minor Outlying Islands',
				'PU' => 'U.S. Miscellaneous Pacific Islands',
				'VI' => 'U.S. Virgin Islands',
				'UG' => 'Uganda',
				'UA' => 'Ukraine',
				'SU' => 'Union of Soviet Socialist Republics',
				'AE' => 'United Arab Emirates',
				'GB' => 'United Kingdom',
				'US' => 'United States',
				'ZZ' => 'Unknown or Invalid Region',
				'UY' => 'Uruguay',
				'UZ' => 'Uzbekistan',
				'VU' => 'Vanuatu',
				'VA' => 'Vatican City',
				'VE' => 'Venezuela',
				'VN' => 'Vietnam',
				'WK' => 'Wake Island',
				'WF' => 'Wallis and Futuna',
				'EH' => 'Western Sahara',
				'YE' => 'Yemen',
				'ZM' => 'Zambia',
				'ZW' => 'Zimbabwe',
				'AX' => 'Åland Islands',
			),
		)
	);

	$el->add_control(
		'posting_job_street',
		array(
			'label'     => esc_html__( 'Street', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::TEXT,
			'condition' => array(
				'posting_job_remote' => '',
			),
		),
	);

	$el->add_control(
		'posting_job_city',
		array(
			'label'     => esc_html__( 'City', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::TEXT,
			'condition' => array(
				'posting_job_remote' => '',
			),
		),
	);

	$el->add_control(
		'posting_job_zip_code',
		array(
			'label'     => esc_html__( 'Postal Code', 'job-posting-widget-for-elementor' ),
			'type'      => Controls_Manager::TEXT,
			'condition' => array(
				'posting_job_remote' => '',
			),
		),
	);

	$el->add_control(
		'posting_job_heading_pricing',
		array(
			'label'     => esc_html( $salary ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);
	$el->add_control(
		'salary_icon',
		array(
			'label'   => esc_html__( 'Icon', 'job-posting-widget-for-elementor' ),
			'type'    => Controls_Manager::ICONS,
			'default' => array(
				'value'   => 'fas fa-money-bill-wave',
				'library' => 'fa-solid',
			),
		)
	);

	$el->add_control(
		'posting_job_price',
		array(
			'label'   => sprintf(
				// translators: %s to $salary.
				esc_html__( '%s (Minimum / Standard)', 'job-posting-widget-for-elementor' ),
				$salary
			),
			'type'    => Controls_Manager::NUMBER,
			'min'     => 1,
			'max'     => 100000,
			'step'    => 1,
			'default' => 1000,
		)
	);

	$el->add_control(
		'posting_job_max_price',
		array(
			'label'   => sprintf(
				// translators: %s to $salary.
				esc_html__( '%s (Maximum / Optional)', 'job-posting-widget-for-elementor' ),
				$salary
			),
			'type'    => Controls_Manager::NUMBER,
			'min'     => 1,
			'max'     => 100000,
			'step'    => 1,
			'default' => 5000,
		)
	);

	$el->add_control(
		'posting_job_currency',
		array(
			'label'   => esc_html__( 'Currency', 'job-posting-widget-for-elementor' ),
			'type'    => Controls_Manager::SELECT2,
			'default' => '€',
			'options' => array(
				''    => esc_html__( 'None', 'job-posting-widget-for-elementor' ),
				'AED' => 'United Arab Emirates dirham',
				'AFN' => 'Afghan afghani',
				'ALL' => 'Albanian lek',
				'AMD' => 'Armenian dram',
				'ANG' => 'Netherlands Antillean guilder',
				'AOA' => 'Angolan kwanza',
				'ARS' => 'Argentine peso',
				'AUD' => 'Australian dollar',
				'AWG' => 'Aruban florin',
				'AZN' => 'Azerbaijani manat',
				'BAM' => 'Bosnia and Herzegovina convertible mark',
				'BBD' => 'Barbados dollar',
				'BDT' => 'Bangladeshi taka',
				'BGN' => 'Bulgarian lev',
				'BHD' => 'Bahraini dinar',
				'BIF' => 'Burundian franc',
				'BMD' => 'Bermudian dollar',
				'BND' => 'Brunei dollar',
				'BOB' => 'Boliviano',
				'BRL' => 'Brazilian real',
				'BSD' => 'Bahamian dollar',
				'BTN' => 'Bhutanese ngultrum',
				'BWP' => 'Botswana pula',
				'BYN' => 'New Belarusian ruble',
				'BYR' => 'Belarusian ruble',
				'BZD' => 'Belize dollar',
				'CAD' => 'Canadian dollar',
				'CDF' => 'Congolese franc',
				'CHF' => 'Swiss franc',
				'CLF' => 'Unidad de Fomento',
				'CLP' => 'Chilean peso',
				'CNY' => 'Renminbi|Chinese yuan',
				'COP' => 'Colombian peso',
				'CRC' => 'Costa Rican colon',
				'CUC' => 'Cuban convertible peso',
				'CUP' => 'Cuban peso',
				'CVE' => 'Cape Verde escudo',
				'CZK' => 'Czech koruna',
				'DJF' => 'Djiboutian franc',
				'DKK' => 'Danish krone',
				'DOP' => 'Dominican peso',
				'DZD' => 'Algerian dinar',
				'EGP' => 'Egyptian pound',
				'ERN' => 'Eritrean nakfa',
				'ETB' => 'Ethiopian birr',
				'EUR' => 'Euro',
				'FJD' => 'Fiji dollar',
				'FKP' => 'Falkland Islands pound',
				'GBP' => 'Pound sterling',
				'GEL' => 'Georgian lari',
				'GHS' => 'Ghanaian cedi',
				'GIP' => 'Gibraltar pound',
				'GMD' => 'Gambian dalasi',
				'GNF' => 'Guinean franc',
				'GTQ' => 'Guatemalan quetzal',
				'GYD' => 'Guyanese dollar',
				'HKD' => 'Hong Kong dollar',
				'HNL' => 'Honduran lempira',
				'HRK' => 'Croatian kuna',
				'HTG' => 'Haitian gourde',
				'HUF' => 'Hungarian forint',
				'IDR' => 'Indonesian rupiah',
				'ILS' => 'Israeli new shekel',
				'INR' => 'Indian rupee',
				'IQD' => 'Iraqi dinar',
				'IRR' => 'Iranian rial',
				'ISK' => 'Icelandic króna',
				'JMD' => 'Jamaican dollar',
				'JOD' => 'Jordanian dinar',
				'JPY' => 'Japanese yen',
				'KES' => 'Kenyan shilling',
				'KGS' => 'Kyrgyzstani som',
				'KHR' => 'Cambodian riel',
				'KMF' => 'Comoro franc',
				'KPW' => 'North Korean won',
				'KRW' => 'South Korean won',
				'KWD' => 'Kuwaiti dinar',
				'KYD' => 'Cayman Islands dollar',
				'KZT' => 'Kazakhstani tenge',
				'LAK' => 'Lao kip',
				'LBP' => 'Lebanese pound',
				'LKR' => 'Sri Lankan rupee',
				'LRD' => 'Liberian dollar',
				'LSL' => 'Lesotho loti',
				'LYD' => 'Libyan dinar',
				'MAD' => 'Moroccan dirham',
				'MDL' => 'Moldovan leu',
				'MGA' => 'Malagasy ariary',
				'MKD' => 'Macedonian denar',
				'MMK' => 'Myanmar kyat',
				'MNT' => 'Mongolian tögrög',
				'MOP' => 'Macanese pataca',
				'MRO' => 'Mauritanian ouguiya',
				'MUR' => 'Mauritian rupee',
				'MVR' => 'Maldivian rufiyaa',
				'MWK' => 'Malawian kwacha',
				'MXN' => 'Mexican peso',
				'MXV' => 'Mexican Unidad de Inversion',
				'MYR' => 'Malaysian ringgit',
				'MZN' => 'Mozambican metical',
				'NAD' => 'Namibian dollar',
				'NGN' => 'Nigerian naira',
				'NIO' => 'Nicaraguan córdoba',
				'NOK' => 'Norwegian krone',
				'NPR' => 'Nepalese rupee',
				'NZD' => 'New Zealand dollar',
				'OMR' => 'Omani rial',
				'PAB' => 'Panamanian balboa',
				'PEN' => 'Peruvian Sol',
				'PGK' => 'Papua New Guinean kina',
				'PHP' => 'Philippine peso',
				'PKR' => 'Pakistani rupee',
				'PLN' => 'Polish złoty',
				'PYG' => 'Paraguayan guaraní',
				'QAR' => 'Qatari riyal',
				'RON' => 'Romanian leu',
				'RSD' => 'Serbian dinar',
				'RUB' => 'Russian ruble',
				'RWF' => 'Rwandan franc',
				'SAR' => 'Saudi riyal',
				'SBD' => 'Solomon Islands dollar',
				'SCR' => 'Seychelles rupee',
				'SDG' => 'Sudanese pound',
				'SEK' => 'Swedish krona',
				'SGD' => 'Singapore dollar',
				'SHP' => 'Saint Helena pound',
				'SLL' => 'Sierra Leonean leone',
				'SOS' => 'Somali shilling',
				'SRD' => 'Surinamese dollar',
				'SSP' => 'South Sudanese pound',
				'STD' => 'São Tomé and Príncipe dobra',
				'SVC' => 'Salvadoran colón',
				'SYP' => 'Syrian pound',
				'SZL' => 'Swazi lilangeni',
				'THB' => 'Thai baht',
				'TJS' => 'Tajikistani somoni',
				'TMT' => 'Turkmenistani manat',
				'TND' => 'Tunisian dinar',
				'TOP' => 'Tongan paʻanga',
				'TRY' => 'Turkish lira',
				'TTD' => 'Trinidad and Tobago dollar',
				'TWD' => 'New Taiwan dollar',
				'TZS' => 'Tanzanian shilling',
				'UAH' => 'Ukrainian hryvnia',
				'UGX' => 'Ugandan shilling',
				'USD' => 'United States dollar',
				'UYI' => 'Uruguay Peso en Unidades Indexadas',
				'UYU' => 'Uruguayan peso',
				'UZS' => 'Uzbekistan som',
				'VEF' => 'Venezuelan bolívar',
				'VND' => 'Vietnamese đồng',
				'VUV' => 'Vanuatu vatu',
				'WST' => 'Samoan tala',
				'XAF' => 'Central African CFA franc',
				'XCD' => 'East Caribbean dollar',
				'XOF' => 'West African CFA franc',
				'XPF' => 'CFP franc',
				'XXX' => 'No currency',
				'YER' => 'Yemeni rial',
				'ZAR' => 'South African rand',
				'ZMW' => 'Zambian kwacha',
				'ZWL' => 'Zimbabwean dollar',
			),
		)
	);

	$el->add_control(
		'posting_job_per',
		array(
			'label'   => sprintf(
				// translators: %s to $salary.
				esc_html__( '%s pro', 'job-posting-widget-for-elementor' ),
				$salary
			),
			'type'    => Controls_Manager::SELECT,
			'default' => $hour,
			'options' => array(
				''     => esc_html__( 'None', 'job-posting-widget-for-elementor' ),
				$hour  => $hour,
				$week  => $week,
				$month => $month,
				$year  => $year,
			),
		)
	);
	$el->end_controls_section();
}

/**
 * Content settings.
 *
 * @param object $el Widget manager object.
 */
function el_job_posting_widget_content_setting( $el ) {
	// Option name to store the date.
	$option_post_date   = 'el_job_posting_widget_post_date';
	$option_expiry_date = 'el_job_posting_widget_expire_date';

	// Retrieve the stored date.
	$post_date   = get_option( $option_post_date );
	$expiry_date = get_option( $option_expiry_date );

	// Check if the date is already set.
	if ( false === $post_date ) {
		$default_post_date = date_i18n( 'Y-m-d H:i' );
		// Store the date in the options.
		update_option( $option_post_date, $default_post_date );
	} else {
		// Use the stored date.
		$default_post_date = $post_date;
	}

	// Check if the date is already set.
	if ( false === $expiry_date ) {
		// Set the initial date to 3 months from now.
		$default_expiry_date = date_i18n( 'Y-m-d H:i', strtotime( '+3 months' ) );
		// Store the date in the options.
		update_option( $option_expiry_date, $default_expiry_date );
	} else {
		// Use the stored date.
		$default_expiry_date = $expiry_date;
	}

	el_job_posting_widget_listing_header( $el, $default_post_date );
	el_job_posting_widget_listing_content( $el );
	el_job_posting_widget_listing_info( $el, $default_expiry_date );
}
