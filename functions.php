<?php

/**
 * UCNRS 
 */


if (!function_exists('ucnrs_support')) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since UCNRS 1.0
	 *
	 * @return void
	 */
	function ucnrs_support()
	{

		// Add support for block styles.
		add_theme_support('wp-block-styles');

		// Enqueue editor styles.
		add_editor_style('style.css');
	}

endif;

add_action('after_setup_theme', 'ucnrs_support');

if (!function_exists('ucnrs_styles')) :

	/**
	 * Enqueue styles.
	 *
	 * @since UCNRS 1.0
	 *
	 * @return void
	 */
	function ucnrs_styles()
	{
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get('Version');

		$version_string = is_string($theme_version) ? $theme_version : false;
		wp_register_style(
			'ucnrs-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style('ucnrs-style');
	}

endif;

add_action('wp_enqueue_scripts', 'ucnrs_styles');

// Add block patterns
//require get_template_directory() . '/inc/block-patterns.php';

//Remove core patterns
remove_theme_support('core-block-patterns');

// remove svg from body.
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

// Full height gird layout query loop
add_action('init', function () {
	register_block_style('core/group', [
		'name'         => 'full-height',
		'label'        => __('Full Height'),
		'inline_style' => '.wp-block-group.is-style-full-height { height: 100%; }'
	]);
});



/**
 * Registers block categories, and type.
 *
 * @since 0.9.2
 */

function ucnrs_register_block_pattern_categories()
{

	/* Functionality specific to the Block Pattern Explorer plugin. */


	if (function_exists('register_block_pattern_category_type')) {
		register_block_pattern_category_type('ucnrs', array('label' => __('UCNRS', 'ucnrs')));
	}

	$block_pattern_categories = array(
		'ucnrs-footer'  => array(
			'label'         => __('Footer', 'ucnrs'),
			'categoryTypes' => array('ucnrs'),
		),
		'ucnrs-general' => array(
			'label'         => __('General', 'ucnrs'),
			'categoryTypes' => array('ucnrs'),
		),
		'ucnrs-header'  => array(
			'label'         => __('Header', 'ucnrs'),
			'categoryTypes' => array('ucnrs'),
		),
		'ucnrs-page'    => array(
			'label'         => __('Page', 'ucnrs'),
			'categoryTypes' => array('ucnrs'),
		),
		'ucnrs-query'   => array(
			'label'         => __('Query', 'ucnrs'),
			'categoryTypes' => array('ucnrs'),
		),
	);

	foreach ($block_pattern_categories as $name => $properties) {
		register_block_pattern_category($name, $properties);
	}
}
add_action('init', 'ucnrs_register_block_pattern_categories', 9);


// Add custom login Logo
function ucnrs_login_logo()
{

	$logo_path = '/assets/images/CSMR-Logo.png';
	if (!file_exists(get_stylesheet_directory() . $logo_path))
		return;

	$logo = get_stylesheet_directory_uri() . $logo_path;
?>

	<style type="text/css">
		.login h1 a {
			background-image: url(<?php echo $logo; ?>);
			background-size: contain;
			background-repeat: no-repeat;
			background-position: center center;
			display: block;
			overflow: hidden;
			text-indent: -9999em;
			width: 100px;
			height: 100px;
		}
	</style>
<?php

}
add_action('login_head', 'ucnrs_login_logo');
