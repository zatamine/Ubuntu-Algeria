<?php

$padd_options = array();

$padd_options['general'] = array(
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_favicon_url',
		'Favicon URL',
		'The URL where your favicon is located. Must start with <code>http://</code> or <code>https://</code>.',
		array('type' => 'textfield', 'width' => 500)
	),
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_featured_cat_id',
		'Featured Category',
		'The category you want to view the post as featured post. The content is located just below the main menu.',
		array('type' => 'category', 'width' => 250)
	), 
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_featured_cat_limit',
		'Featured Category Items Limit',
		'The number of featured items used in a slideshow at a time. Ideally, the value should be multiples of three.',
		array('type' => 'textfield', 'width' => 100)
	),
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_video_cat_id',
		'Video Category',
		'The category you want to serve as video category.',
		array('type' => 'category', 'width' => 250)
	),
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_post_about_page_id',
		'About Us Page',
		'The page title to show the contents of "About Us" located at the sidebar.',
		array('type' => 'page', 'width' => 250)
	),
);

$padd_options['tracker'] = array(
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_tracker_head',
		'Tracker Code 1',
		'A tracker code to be placed inside the <code>&lt;head&gt;</code> tag.',
		array('type' => 'textarea')
	),
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_tracker_top',
		'Tracker Code 2',
		'A tracker code to be placed just after the opening <code>&lt;body&gt;</code> tag.',
		array('type' => 'textarea')
	),
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_tracker_bot',
		'Tracker Code 3',
		'A tracker code to be placed just before the closing <code>&lt;body&gt;</code> tag.',
		array('type' => 'textarea')
	),
);

$padd_options['socialnetwork'] = array(
	new Padd_Input_SocialNetwork(
		PADD_NAME_SPACE . '_sn_username_facebook',
		'Facebook Username',
		'Your <a href="http://facebook.com">Facebook</a> username. You may leave it blank if you don\'t have one. If you have an
		account already but you don\'t have a username yet, <a href="http://www.facebook.com/help.php?page=897">read the Q&amp;A</a>.'
	),
	new Padd_Input_SocialNetwork(
		PADD_NAME_SPACE . '_sn_username_googlebuzz',
		'Google Buzz Username',
		'Your user name in Google Buzz.'
	),
	new Padd_Input_SocialNetwork(
		PADD_NAME_SPACE . '_sn_username_feedburner',
		'Feedburner Username',
		'Your user name in Feedburner.'
	),
	new Padd_Input_SocialNetwork(
		PADD_NAME_SPACE . '_sn_username_twitter',
		'Twitter Username',
		'Your <a href="http://twitter.com">Twitter</a> user name. You may leave it blank if you don\'t have one but we recommend
		to <a href="http://twitter.com/signup">create an account</a>.'
	)
);

$padd_options['relatedposts'] = array(
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_rp_enable',
		'Enable Related Posts',
		'Check this box if you want to enable the related posts.',
		array('type' => 'checkbox')
	),
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_rp_max',
		'Maximum Number of Related Posts',
		'The maximum number of related posts to be displayed at a time.',
		array('type' => 'textfield', 'width' => 100)
	), 
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_rp_consider_tags',
		'Consider Tags',
		'Consider tags for post relatedness.',
		array('type' => 'checkbox')
	),
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_rp_consider_categories',
		'Consider Categories',
		'Consider categories for post relatedness.',
		array('type' => 'checkbox')
	),
);
 
$padd_options['pagenav'] = array(
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_pgn_pages_to_show',
		'Number of Pages to Show',
		'The number of pages to show in the page navigation at a time.',
		array('type' => 'textfield', 'width' => 100)
	), 
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_pgn_larger_page_numbers',
		'Number of Large Page Numbers to Show',
		'Larger page numbers are in additional to the default page numbers. It is useful for authors who is paginating through many posts. <br />
		 For example, page navigation will display: Pages 1, 2, 3, 4, 5, 10, 20, 30, 40, 50. <br /> 
		 Enter 0 to disable. ',
		array('type' => 'textfield', 'width' => 100)
	), 
	new Padd_Input_Option(
		PADD_NAME_SPACE . '_pgn_larger_page_numbers_multiple',
		'Show Larger Page Numbers in Multiples of',
		'If mutiple is in 5, it will show: 5, 10, 15, 20, 25. If mutiple is in 10, it will show: 10, 20, 30, 40, 50.',
		array('type' => 'textfield', 'width' => 100)
	),  
);

$padd_options['advertisements'] = array(
	new Padd_Input_Advertisement(
		PADD_NAME_SPACE . '_ads_125125_1',
		'Square Ad 1 (125x125)',
		'The advertisement will be posted at the side bar.'
	),
	new Padd_Input_Advertisement(
		PADD_NAME_SPACE . '_ads_125125_2',
		'Square Ad 2 (125x125)',
		'The advertisement will be posted at the side bar.'
	),
	new Padd_Input_Advertisement(
		PADD_NAME_SPACE . '_ads_125125_3',
		'Square Ad 3 (125x125)',
		'The advertisement will be posted at the side bar.'
	),
	new Padd_Input_Advertisement(
		PADD_NAME_SPACE . '_ads_125125_4',
		'Square Ad 4 (125x125)',
		'The advertisement will be posted at the side bar.'
	),
);

/**
 * A function that will save the options.
 *
 * @global array $options_general
 * @global array $options_socialbookmarking
 * @global array $options_yourads
 */
function padd_theme_add_admin() {
	global $padd_options, $padd_socialnet;

	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {

			foreach ($padd_options['general'] as $opt) {
				if (isset($_REQUEST[$opt->get_keyword()])) {
					update_option($opt->get_keyword(),$_REQUEST[$opt->get_keyword()]);
				} else {
					update_option($opt->get_keyword(),'');
				}
			}

			foreach ($padd_options['tracker'] as $opt) {
				if (isset($_REQUEST[$opt->get_keyword()])) {
					update_option($opt->get_keyword(),$_REQUEST[$opt->get_keyword()]);
				} else {
					update_option($opt->get_keyword(),'');
				}
			}

			foreach ($padd_socialnet as $k => $v) {
				$v->set_username($_REQUEST[PADD_NAME_SPACE . '_sn_username_' . $k]);
				update_option(PADD_NAME_SPACE . '_sn_username_' . $k,serialize($v));
			}
			
			foreach ($padd_options['relatedposts'] as $opt) {
				if (isset($_REQUEST[$opt->get_keyword()])) {
					update_option($opt->get_keyword(),$_REQUEST[$opt->get_keyword()]);
				} else {
					update_option($opt->get_keyword(),'');
				}
			}
			
			foreach ($padd_options['pagenav'] as $opt) {
				if (isset($_REQUEST[$opt->get_keyword()])) {
					update_option($opt->get_keyword(),$_REQUEST[$opt->get_keyword()]);
				} else {
					update_option($opt->get_keyword(),'');
				}
			}
			
			foreach ($padd_options['advertisements'] as $opt) {
				update_option($opt->get_keyword(),
					serialize(
						new Padd_Advertisement(
							$_REQUEST[$opt->get_keyword() . '_' . 'img_url'],
							$_REQUEST[$opt->get_keyword() . '_' . 'alt_desc'],
							$_REQUEST[$opt->get_keyword() . '_' . 'web_url']
						)
					)
				);
			}

			header("Location: themes.php?page=options-functions.php&saved=true");
			die;

		}
	}

	add_theme_page(PADD_THEME_NAME ." Options", PADD_THEME_NAME . " Options", 'edit_themes', basename(__FILE__), 'padd_theme_admin');
}

function padd_theme_admin_head() {
	echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/admin.css' . '" type="text/css" media="screen" />';
	echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/js/jquery.cookie.js"></script>';
	echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/js/admin.loading.js"></script>';
}

if (is_admin()) {
	wp_enqueue_script('jquery-ui-tabs');
}
add_action('admin_head','padd_theme_admin_head');

/**
 * Renders the user interface for custom theme settings.
 *
 * @global array $options_general
 * @global array $options_socialbookmarking
 * @global array $options_yourads
 */
function padd_theme_admin() {
	global $padd_options;

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>' . PADD_THEME_NAME . ' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>' . PADD_THEME_NAME . ' settings reset.</strong></p></div>';

	require get_theme_root() . '/' . PADD_THEME_SLUG .  '/includes/administration/options-ui.php';
}
add_action('admin_menu', 'padd_theme_add_admin');

?>
