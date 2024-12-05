<?php
//---------------------------------------------Custom Theme Settings Path
if (file_exists(get_template_directory() . '/required/custom-plugins.php')) {
	require_once(get_template_directory() . '/required/custom-plugins.php');
}
if (file_exists(get_template_directory() . '/required/custom-ajax.php')) {
	require_once(get_template_directory() . '/required/custom-ajax.php');
}



//---------------------------------------------Enqueue Script and Style
add_action('wp_enqueue_scripts', 'my_plugin_assets');
function my_plugin_assets()
{
	$ver = '3.6.5';
	wp_enqueue_script('jquery.min', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', array('jquery'), $ver, true);
	wp_enqueue_script('owl-carousel.js.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), $ver, true);
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/ThemeScript.js', array('jquery'), $ver, true);
	wp_enqueue_script('marque-script', get_template_directory_uri() . '/js/jquery.marquee.min.js', array('jquery'), $ver, true);


	wp_enqueue_style('owl-carousel.css.min', get_template_directory_uri() . '/css/owl.carousel.min.css', $ver, 'all');

	wp_enqueue_style('style', get_stylesheet_uri(), false, '', 'all');
}



//---------------------------------------------Enqueue Wordpress Media Script
add_action('admin_enqueue_scripts', 'admin_scripts');
function admin_scripts()
{
	wp_enqueue_media();
}



//---------------------------------------------Theme Setup
add_action('after_setup_theme', 'custom_theme_setup');
if (!function_exists('custom_theme_setup')) {
	function custom_theme_setup()
	{
		load_theme_textdomain('custom_theme');
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('custom-logo');
		add_theme_support('post-thumbnails');

		add_image_size('single-thumbnail', 950, 600, true);
		add_image_size('hero-thumbnail', 606, 441, true);
		add_image_size('home-listing-thumbnail', 880, 443, true);
		add_image_size('home-list-thumbnail', 196, 196, true);
		add_image_size('zodiac-thumbnail', 440, 429, true);
		add_image_size('default-small-thumbnail', 325, 280, true);
		add_image_size('default-medium-thumbnail', 441, 297, true);
		add_image_size('default-large-thumbnail', 670, 309, true);
		add_image_size('default-extra-large-thumbnail', 900, 325, true);
		add_image_size('writer-thumbnail', 210, 225, true);
		add_image_size('author-thumbnail', 440, 524, true);
		add_image_size('contributor-thumbnail', 325, 294, true);
		add_image_size('listing-small-thumbnail', 440, 415, true);
		add_image_size('listing-medium-thumbnail', 440, 530, true);
		add_image_size('listing-large-thumbnail', 440, 680, true);
		add_image_size('search-thumbnail', 441, 351, true);

		set_post_thumbnail_size(1200, 9999);

		$GLOBALS['content_width'] = 900;

		add_theme_support('html5', array('comment-form', 'comment-list', 'script', 'style'));

		$allowed_roles = array('administrator', 'editor', 'author');
		if (!count(array_intersect($allowed_roles, wp_get_current_user()->roles))) {
			show_admin_bar(false);
		} else {
			show_admin_bar(true);
		}
	}
}



//---------------------------------------------Check and Call Logo
function logo_url()
{
	$logo_url = get_stylesheet_directory_uri() . '/images/FTF-new-logo.svg';
	if (has_custom_logo()) {
		$custom_logo_id = get_theme_mod('custom_logo');
		$custom_logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
		$custom_logo_url = $custom_logo_data[0];
		return esc_url($custom_logo_url);
	} elseif (is_file(realpath($_SERVER["DOCUMENT_ROOT"]) . parse_url($logo_url)['path'])) {
		$header_img_url = $logo_url;
		return $header_img_url;
	} else {
		return false;
	}
}



//---------------------------------------------Check and Add Favicon
function add_favicon()
{
	if (!has_site_icon()  && !is_customize_preview()) {
		$favicon_url = get_stylesheet_directory_uri() . '/images/favicon.png';
		echo '<link rel="icon" type="image/gif" href="' . $favicon_url . '" />';
	} else {
		echo '<link rel="icon" type="image/gif" href="' . wp_get_attachment_image_url(get_option('site_icon'), 'full') . '">';
	}
}
add_action('wp_head', 'add_favicon');
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');
// add_action('web_stories_story_head', 'add_favicon');



//---------------------------------------------Theme Menu
add_action('init', 'register_my_menus');
function register_my_menus()
{
	register_nav_menus(array(
		'header-menu'		=> 'Header Menu',
		'header-menu-2'		=> 'Header Menu 2',
		'footer-menu-1'		=> 'Footer Menu 1',
		'footer-menu-2'		=> 'Footer Menu 2',
		'footer-menu-3'		=> 'Footer Menu 3',
		'footer-menu-4'		=> 'Footer Menu 4'
	));
}



//---------------------------------------------Image Function
add_action('wp_footer', 'img');
function img()
{
?><script>
		jQuery(document).ready(function($) {
			$("img").not('.content-writer-card-figure img, .about-author-card-figure img').removeAttr("srcset");
			$("img").not('.content-writer-card-figure img, .about-author-card-figure img').each((index, img) => {
				img.src = img.src.replace("http://localhost/followthefashion/wp-content/uploads/","https://www.followthefashion.org/wp-content/uploads/");
				img.src = img.src.replace("http://localhost/projects/followthefashion/wp-content/uploads/","https://www.followthefashion.org/wp-content/uploads/");
				img.src = img.src.replace("https://www.viaconprojects.com/followthefashion/wp-content/uploads/", "https://www.followthefashion.org/wp-content/uploads/");
			});
		});
	</script>
<?php
}



//---------------------------------------------Custom Comment Form
add_filter('comment_form_fields', 'custom_comment_form_fields');
function custom_comment_form_fields($fields)
{
	unset($fields['author']);
	unset($fields['email']);
	unset($fields['url']);
	unset($fields['comment']);
	unset($fields['cookies']);

	$fields['email-wrapper-open']	= '<div class="comment-from-row">';
	$fields['author']	= '<input type="text" class="comment-from-input" id="author" name="author" placeholder="YOUR NAME*" required>';
	$fields['email']	= '<input type="email" class="comment-from-input" id="email" name="email" placeholder="YOUR EMAIL*" required>';
	$fields['url']		= '<input type="url" class="comment-from-input" id="url" name="url" placeholder="YOUR WEBSITE">';
	$fields['email-wrapper-close']	= '</div>';
	$fields['comment']	= '<div class="comment-from-text-aria-wrapper"><textarea class="comment-from-text-aria" id="comment" name="comment" placeholder="TYPE COMMENT HERE*" cols="30" rows="8" required></textarea></div>';
	$fields['cookies']	= '<div class="single-page-comment-from-massage-checkbox-wrapper"><div class="comment-from-check-box-wrapper"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent"></label></div><p class="single-page-comment-from-checkbox-massage">Save my name, email, and website in this browser for the next time I comment.</p></div>';
	return $fields;
}


function custom_comment_form_defaults($defaults)
{
	// $defaults['comment_notes_before']	= '<p class="checkbox-text mt-2"><span id="email-notes">Your email address will not be published.</span> <span class="required-field-message">Required fields are marked <span class="required">*</span></span></p>';
	// $defaults['comment_notes_after']	= '';
	// $defaults['id_form']				= 'commentform';
	// $defaults['id_submit']				= 'submit';
	// $defaults['class_container']		= 'comment-respond';
	// $defaults['class_form']				= 'flex flex-col gap-[10px]';
	// $defaults['class_submit']			= 'comment-from-comment-button';
	// $defaults['name_submit']			= 'submit';
	$defaults['title_reply']			= 'Leave A Reply';
	// $defaults['title_reply_to']			= 'Leave a Reply to %s';
	$defaults['title_reply_before']		= '<h2 class="comment-from-title">';
	$defaults['title_reply_after']		= '</h2>';
	// $defaults['cancel_reply_before']	= ' <small>';
	// $defaults['cancel_reply_after']		= '</small>';
	// $defaults['cancel_reply_link']		= 'Cancel reply';
	// $defaults['label_submit']			= 'Post Comment';
	$defaults['submit_button']			= '<button type="submit" class="single-page-comment-from-submit-button">POST COMMENT</button>';
	$defaults['submit_field']			= '<div class="form-submit">%1$s %2$s</div>';

	return $defaults;
}
add_filter('comment_form_defaults', 'custom_comment_form_defaults');
