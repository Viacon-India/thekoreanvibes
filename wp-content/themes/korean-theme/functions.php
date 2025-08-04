<?php
//---------------------------------------------Custom Theme Settings Path
if (file_exists(get_template_directory() . '/required/custom-plugins.php')) {
	require_once(get_template_directory() . '/required/custom-plugins.php');
}
if (file_exists(get_template_directory() . '/required/custom-ajax.php')) {
	require_once(get_template_directory() . '/required/custom-ajax.php');
}
if (file_exists(get_template_directory() . '/required/custom-ajax-functions.php')) {
	require_once(get_template_directory() . '/required/custom-ajax-functions.php');
}



if (!session_id()) {
	session_start();
}

if (!defined('BLOG_DIR')) define('BLOG_DIR', get_template_directory());
if (!defined('BLOG_URI')) define('BLOG_URI', get_template_directory_uri());

add_action('after_setup_theme', 'theme_setup');
if (!function_exists('theme_setup')) {
	function theme_setup()
	{
		load_theme_textdomain('7bt');
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('custom-logo');
		add_theme_support('post-thumbnails');

		add_image_size('cat-style-one-thumbnail', 120, 120, true);
		add_image_size('page-thumbnail', 622, 524, true);
		add_image_size('cat-style-two-thumbnail', 100, 120, true);
		add_image_size('cat-style-two-hero-thumbnail', 410, 271, true);
		add_image_size('default-thumbnail', 358, 258, true);
		add_image_size('single-banner-img', 1106, 676, true);
		add_image_size('category-thumbnail', 1920, 450, true);
		add_image_size('multiple-affiliation-thumbnail', 250, 250, true);
		add_image_size('single-affiliation-thumbnail', 340, 340, true);

		$GLOBALS['content_width'] = 900;

		add_theme_support('html5', array('comment-form', 'comment-list'));

		//disable admin bar for all user other than administrator
		$allowed_roles = array('administrator', 'editor', 'author');
		if (!count(array_intersect($allowed_roles, wp_get_current_user()->roles))) {
			show_admin_bar(false);
		} else {
			show_admin_bar(true);
		}
	}
}



// Check and Call Logo
function logo_url()
{
	$logo_url = get_stylesheet_directory_uri() . '/assets/images/logo.svg';
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



// Check and Add Favicon
function add_favicon()
{
	// if (!has_site_icon()  && !is_customize_preview()) {
		$favicon_url = get_stylesheet_directory_uri() . '/assets/favicon/0.png';
		echo '<link rel="icon" type="image/gif" href="' . $favicon_url . '" />';
	// } else {
	// 	echo '<link rel="icon" type="image/gif" href="' . wp_get_attachment_image_url(get_option('site_icon'), 'full') . '">';
	// }
}
add_action('wp_head', 'add_favicon');
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');
add_action('web_stories_story_head', 'add_favicon');



// Add Menu
add_action('init', 'register_my_menus');
function register_my_menus()
{
	register_nav_menus(
		array(
			'header-menu' => __('Header Menu'),
			'footer-menu' => __('Footer Menu'),
			'useful-menu' => __('Useful Menu'),
		)
	);
}



// To Enqueue Script and Style
add_action('wp_enqueue_scripts', 'my_plugin_assets');
function my_plugin_assets()
{
	$ver = '3.6.8';
	wp_enqueue_script('jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), $ver, true);
	wp_enqueue_script('gsap.min', get_template_directory_uri() . '/assets/js/gsap.min.js', array('jquery'), $ver, true);
	wp_enqueue_script('zepto.min', get_template_directory_uri() . '/assets/js/zepto.min.js', array('jquery'), $ver, true);
	wp_enqueue_script('themeScripts', get_template_directory_uri() . '/assets/js/themeScripts.js',  array('jquery'), $ver, true);
	
	wp_enqueue_style('custom-style', get_stylesheet_uri(), false, $ver, 'all');

}



// add_action('wp_footer', 'img');
function img()
{
	?><script type="text/javascript">
		jQuery(document).ready(function($) {
			$("img").removeAttr("srcset");
			$("img").each((index, img) => {
				img.src = img.src.replace("http://localhost/7bestthings/wp-content/uploads/", "https://7bestthings.com/wp-content/uploads/");
				img.src = img.src.replace("http://localhost/projects/7bestthings/wp-content/uploads/", "https://7bestthings.com/wp-content/uploads/");
				img.src = img.src.replace("https://viaconprojects.com/7bestthings/wp-content/uploads/", "https://7bestthings.com/wp-content/uploads/");
			});
		});
	</script><?php
}

/*----------------------------------------------------------------------Custom Field for COLOR----------------------------------------------------------------------*/
add_action('category_add_form_fields', 'hex_code_add_form_fields', 10, 2);
add_action('category_edit_form_fields', 'hex_code_edit_term_fields', 10, 2);
function hex_code_add_form_fields($taxonomy)
{
				?>
	<div class="form-field">
		<label>Color Code</label>
		<div style="display: flex; justify-content: space-between; width: 96%;">
			<div style="width: fit-content;">
				<input type="text" name="hex_code_1" class="color-picker" />
				<p class="description">Primary Color</p>
			</div>
			<div style="width: fit-content;">
				<input type="text" name="hex_code_2" class="color-picker" />
				<p class="description">Background Color</p>
			</div>
			<div style="width: fit-content;">
				<input type="text" name="hex_code_3" class="color-picker" />
				<p class="description">Gradient Color</p>
			</div>
			<div style="width: fit-content;">
				<input type="text" name="hex_code_4" class="color-picker" />
				<p class="description">Quote Color</p>
			</div>
			<div style="width: fit-content;">
				<input type="text" name="hex_code_5" class="color-picker" />
				<p class="description">Text Color</p>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.color-picker').wpColorPicker();
			});
		</script>
	</div><?php
}
function hex_code_edit_term_fields($term, $taxonomy)
{
	$hex_color_1 = get_term_meta($term->term_id, 'hex_code_1', true);
	$hex_color_2 = get_term_meta($term->term_id, 'hex_code_2', true);
	$hex_color_3 = get_term_meta($term->term_id, 'hex_code_3', true);
	$hex_color_4 = get_term_meta($term->term_id, 'hex_code_4', true);
	$hex_color_5 = get_term_meta($term->term_id, 'hex_code_5', true);
	?><div class="form-field">
		<h3>Color Code</h3>
		<div style="display: flex; justify-content: space-between; width: 96%;">
			<div style="width: fit-content;">
				<input name="hex_code_1" type="text" class="color-picker" value="<?php echo esc_attr($hex_color_1) ?>" />
				<p class="description">Primary Color</p>
			</div>
			<div style="width: fit-content;">
				<input name="hex_code_2" type="text" class="color-picker" value="<?php echo esc_attr($hex_color_2) ?>" />
				<p class="description">Background Color</p>
			</div>
			<div style="width: fit-content;">
				<input name="hex_code_3" type="text" class="color-picker" value="<?php echo esc_attr($hex_color_3) ?>" />
				<p class="description">Gradient Color</p>
			</div>
			<div style="width: fit-content;">
				<input name="hex_code_4" type="text" class="color-picker" value="<?php echo esc_attr($hex_color_4) ?>" />
				<p class="description">Quote Color</p>
			</div>
			<div style="width: fit-content;">
				<input name="hex_code_5" type="text" class="color-picker" value="<?php echo esc_attr($hex_color_5) ?>" />
				<p class="description">Text Color</p>
			</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.color-picker').wpColorPicker();
			});
		</script>
	</div><?php
}

add_action('edited_category', 'hex_code_save_term_fields', 10, 2);
add_action('create_category', 'hex_code_save_term_fields', 10, 2);
function hex_code_save_term_fields($term_id)
{
	$hex_color_1 = $_POST['hex_code_1'];
	$hex_color_2 = $_POST['hex_code_2'];
	$hex_color_3 = $_POST['hex_code_3'];
	$hex_color_4 = $_POST['hex_code_4'];
	$hex_color_5 = $_POST['hex_code_5'];
	if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_1)) {
		update_term_meta($term_id, 'hex_code_1', sanitize_text_field($hex_color_1));
	} else {
		update_term_meta($term_id, 'hex_code_1', '');
	}
	if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_2)) {
		update_term_meta($term_id, 'hex_code_2', sanitize_text_field($hex_color_2));
	} else {
		update_term_meta($term_id, 'hex_code_2', '');
	}
	if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_3)) {
		update_term_meta($term_id, 'hex_code_3', sanitize_text_field($hex_color_3));
	} else {
		update_term_meta($term_id, 'hex_code_3', '');
	}
	if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_4)) {
		update_term_meta($term_id, 'hex_code_4', sanitize_text_field($hex_color_4));
	} else {
		update_term_meta($term_id, 'hex_code_4', '');
	}
	if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_5)) {
		update_term_meta($term_id, 'hex_code_5', sanitize_text_field($hex_color_5));
	} else {
		update_term_meta($term_id, 'hex_code_5', '');
	}
}

add_filter('manage_edit-category_columns', 'colors_columns_header');
add_filter('manage_category_custom_column', 'colors_columns_content', 10, 3);
function colors_columns_header($header)
{
	$header['color_hex_code']  = __('Color', 'colors');
	return $header;
}
function colors_columns_content($columns, $column, $term_id)
{
	if ('color_hex_code' === $column) {
		echo '<style type="text/css"> .column-color_hex_code { width: 190px; } </style>';
		$hex_color_1 = get_term_meta($term_id, 'hex_code_1', true);
		$hex_color_2 = get_term_meta($term_id, 'hex_code_2', true);
		$hex_color_3 = get_term_meta($term_id, 'hex_code_3', true);
		$hex_color_4 = get_term_meta($term_id, 'hex_code_4', true);
		$hex_color_5 = get_term_meta($term_id, 'hex_code_5', true);
		echo '<div style="gap: 10px; display: flex;">';
		if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_1)) {
			echo '<svg height="30" width="30"><circle cx="15" cy="15" r="15" fill="' . $hex_color_1 . '" /></svg>';
		}
		if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_2)) {
			echo '<svg height="30" width="30"><circle cx="15" cy="15" r="15" fill="' . $hex_color_2 . '" /></svg>';
		}
		if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_3)) {
			echo '<svg height="30" width="30"><circle cx="15" cy="15" r="15" fill="' . $hex_color_3 . '" /></svg>';
		}
		if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_4)) {
			echo '<svg height="30" width="30"><circle cx="15" cy="15" r="15" fill="' . $hex_color_4 . '" /></svg>';
		}
		if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color_5)) {
			echo '<svg height="30" width="30"><circle cx="15" cy="15" r="15" fill="' . $hex_color_5 . '" /></svg>';
		}
		echo '</div>';
	}
	return $columns;
}



add_filter('user_contactmethods', 'designation'); //Add Designation
function designation($designation)
{
	$designation['designation']   = __('Designation');
	return $designation;
}



// Load More Button Function
add_action('wp_footer', 'load_more_blog_javascript');
function load_more_blog_javascript()
{ 
	?><script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery('#default-search').on('input', function(){
				jQuery.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					type: 'post',
					data: { action: 'search_fetch', keyword: jQuery(this).val() },
					beforeSend: function(){
						$('#datafetch .search-small-card figure').height($('#datafetch .search-small-card figure').height()).width($('#datafetch .search-small-card figure').width()).empty().addClass("animate-pulse bg-gray-200");
						$('#datafetch .search-small-card .search-small-body-title').height($('#datafetch .search-small-card .search-small-body-title').height()).width($('#datafetch .search-small-card .search-small-body-title').width()).empty().addClass("animate-pulse bg-gray-200");
						$('#datafetch .search-small-card .search-small-body-cat').height($('#datafetch .search-small-card .search-small-body-cat').height()).width($('#datafetch .search-small-card .search-small-body-cat').width()).empty().addClass("animate-pulse bg-gray-200");
						$('#data_message').hide();
					},
					success: function(data) {
						jQuery('#datafetch').empty().html( data );
						jQuery('#data_message span').replaceWith('<span class="uppercase">' + $("#default-search").val() + '</span>');
					}
				});
			});
			var page = 2;
			jQuery('#load_more').click(function() {
				var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
				var page_count = jQuery('button.category-anchor-active').data('page');
				if (page_count == null) {
					var page_count = jQuery('#load_more').data('page');
				}
				var cat_id = jQuery('button.category-anchor-active').data('cat_id');
				if (cat_id == null) {
					var cat_id = jQuery('#load_more').data('cat_id');
				}
				var hex_color = jQuery('#load_more').data('hex_color');
				var tag_id = jQuery('#load_more').data('tag_id');
				var user_id = jQuery('#load_more').data('user_id');
				var search = jQuery('#load_more').data('search');
				if (search) {
					var orderby = '';
				} else {
					var orderby = 'date';
				}
				var data = {
					'action': 'load_more_blog',
					'page': page,
					'cat_id': cat_id,
					'hex_color': hex_color,
					'tag_id': tag_id,
					'user_id': user_id,
					'search': search,
					'orderby': orderby
				};
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#load_more_div').append(response);
					if (page_count <= page) {
						jQuery('#load_more').hide().after('<span class="flex justify-center internal-p">"You have come to end"</span>');
					} else {
						jQuery('#load_more').parent().show();
						jQuery('#load_more').show().siblings('span').remove();
					}
					page = page + 1;
				});
			});
			jQuery('button.category-anchor').click(function() {
				$(this).addClass("category-anchor-active").parent().parent().find(".category-anchor").not(this).removeClass("category-anchor-active");
				var cat_id = jQuery(this).data('cat_id');
				var page_count = jQuery(this).data('page');
				var hex_color = jQuery(this).data('hex_color');
				var orderby = 'date';
				jQuery.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						action: 'load_more_blog',
						cat_id: cat_id,
						hex_color: hex_color,
						orderby: orderby
					},
					beforeSend: function() {
						$('#load_more_div .common-card figure').empty().addClass("animate-pulse bg-gray-200 rounded-[4px]");
					},
					success: function(data) {
						$('#load_more_div').empty().html(data);
						if (page_count <= 1) {
							jQuery('#load_more').parent().hide();
							$('#load_more').attr("data-page", "");
							$('#load_more').attr("data-cat_id", "");
						} else {
							jQuery('#load_more').parent().show();
							jQuery('#load_more').show().siblings('span').remove();
							$('#load_more').attr("data-page", page_count);
							$('#load_more').attr("data-cat_id", cat_id);
						}
						page = 2;
					}
				});
			});
			jQuery('button.show-comment').click(function() {
				var comment_id = jQuery(this).data('comment_id');
				jQuery.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						action: 'load_more_comments',
						comment_id: comment_id
					},
					success: function(data) {
						$('#load_button_' + comment_id).hide();
						$('#load_child_' + comment_id).empty().html(data);
					}
				});
			});
		});
	</script><?php
}

/**************** VIEW ******************/

function subh_get_post_view($postID)
{
	$count_key = 'post_views_count';
	$count     = get_post_meta($postID, $count_key, true);
	if ($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return '0 View';
	}
	return $count . ' Views';
}

function subh_set_post_view($postID)
{
	$count_key = 'post_views_count';
	$count     = (int) get_post_meta($postID, $count_key, true);
	if ($count < 1) {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '1');
	} else {
		$count++;
		update_post_meta($postID, $count_key, (string) $count);
	}
}

function subh_posts_column_views($defaults)
{
	$defaults['post_views'] = __('Views');
	return $defaults;
}

function subh_posts_custom_column_views($column_name, $id)
{
	if ($column_name === 'post_views') {
		echo subh_get_post_view(get_the_ID());
	}
}
add_filter('manage_posts_columns', 'subh_posts_column_views');
add_action('manage_posts_custom_column', 'subh_posts_custom_column_views', 5, 2);



function categories_shortcode($slugs = [])
{
	if (!empty($slugs)) {
		$categories = '<div class="about-chip-wrapper">';
		foreach ($slugs as $slug) {
			$cat = get_category_by_slug($slug);
			if (!empty($cat)) {
				$hex_color = get_term_meta($cat->term_id, 'hex_code', true);
				if (empty($hex_color) && $cat->parent) {
					$hex_color = get_term_meta($cat->parent, 'hex_code', true);
				}
				if (empty($hex_color)) {
					$hex_color = '#FF2451';
				}
				$categories .= '<a class="chip-card" style="color:' . $hex_color . '" href="' . get_category_link($cat->term_id) . '">' . get_cat_name(get_category_by_slug($slug)->term_id) . '</a>';
			}
		}
		$categories .= '</div>';
		return $categories;
	} else {
		return null;
	}
}
function categories_for_page()
{
	add_shortcode('categories', 'categories_shortcode');
}
add_action('init', 'categories_for_page');




//Code for HSTS
function wps_enable_strict_transport_security_hsts_header_wordpress() {
    header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains; preload' );
}
add_action('send_headers','wps_enable_strict_transport_security_hsts_header_wordpress' );
 
 
add_filter('wpseo_opengraph_url', 'custom_opengraph_url');
function custom_opengraph_url($url) {
   
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 
    if (strpos($current_url, '/page/') !== false) {
        return $current_url;
    } else {
        return $url; // Return the original URL for other pages
    }
}




/* Weekly Test Mail */

// Add a custom cron schedule for every Tuesday
add_filter('cron_schedules', 'add_weekly_tuesday_schedule');
function add_weekly_tuesday_schedule($schedules) {
    $schedules['weekly_tuesday_10am'] = array(
        'interval' => 7 * 24 * 60 * 60, // 1 week in seconds
        'display'  => __('Every Tuesday at 10 AM')
    );
    return $schedules;
}

// Schedule the event if not already scheduled
add_action('wp', 'schedule_weekly_email_event');
function schedule_weekly_email_event() {
    if (!wp_next_scheduled('send_weekly_email')) {
        $next_tuesday = strtotime('next Tuesday 10:00:00');
        wp_schedule_event($next_tuesday, 'weekly_tuesday_10am', 'send_weekly_email');
    }
}

// Hook into the scheduled event to send the email
add_action('send_weekly_email', 'send_weekly_email_function');
function send_weekly_email_function() {
    $to = 'sharmita.shee@viaconteam.com'; // Replace with your recipient's email
    $subject = "Weekly Tuesday Email - ". get_bloginfo( 'name' );
    $message = 'Hello, this is your weekly email sent every Tuesday at 10 AM.';
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail($to, $subject, $message, $headers);
}

// Clear the scheduled event on theme/plugin deactivation
register_deactivation_hook(__FILE__, 'clear_weekly_email_event');
function clear_weekly_email_event() {
    $timestamp = wp_next_scheduled('send_weekly_email');
    if ($timestamp) {
        wp_unschedule_event($timestamp, 'send_weekly_email');
    }
}
///*----------------------------------- "What I Liked" / "What I Hated" Box -------------------------------*/////
function custom_review_box_shortcode($atts) {
    if (!is_singular('post')) return '';

    $like_content = get_field('like_list_box');
    $dislike_content = get_field('dislike_box');

    ob_start();
    ?>
    <style>
        .review-box {
            max-width: 750px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .review-section {
            margin-bottom: 20px;
            border-radius: 8px;
            padding: 15px;
        }
        .liked {
            background: #eaf9ea;
            border-left: 5px solid #4CAF50;
        }
        .hated {
            background: #fdeaea;
            border-left: 5px solid #f44336;
        }
        .review-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .review-points {
            margin: 0;
            padding-left: 20px;
        }
        .review-points li {
            margin-bottom: 8px;
            font-size: 0.95rem;
            color: #333;
            display: flex;
            align-items: center;
        }
        .review-points li i {
            margin-right: 8px;
            font-size: 1rem;
        }
        .thumb-up { color: #4CAF50; }
        .thumb-down { color: #f44336; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <div class="review-box">
        <?php if (!empty($like_content)) : ?>
            <div class="review-section liked">
                <div class="review-title"><i class="fas fa-thumbs-up thumb-up"></i> What I Liked</div>
                <div class="review-points">
                    <?php echo wp_kses_post($like_content); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($dislike_content)) : ?>
            <div class="review-section hated">
                <div class="review-title"><i class="fas fa-thumbs-down thumb-down"></i> What I Hated</div>
                <div class="review-points">
                    <?php echo wp_kses_post($dislike_content); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('like_dislike_section_box', 'custom_review_box_shortcode');
ob_end_clean();


///*----------------------------------- pros and cons shortcode -------------------------------*/////

function pros_cons_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => get_the_ID(),
    ), $atts, 'pros_cons');

    $post_id = intval($atts['id']);

    $pros = get_field('_singpros', $post_id);
    $cons = get_field('_singcons', $post_id);

    if (empty($pros) && empty($cons)) {
        return '';
    }

    ob_start();
    ?>
    <div class="pros-cons-wrap" style="margin-bottom: 20px;">
        <?php if (!empty($pros)): ?>
            <div class="pros-section" style="margin-bottom: 15px;">
                <strong style="font-size: 18px;">Pros:</strong>
                <div style="margin-top: 5px;"><?php echo wp_kses_post($pros); ?></div>
            </div>
        <?php endif; ?>

        <?php if (!empty($cons)): ?>
            <div class="cons-section">
                <strong style="font-size: 18px;">Cons:</strong>
                <div style="margin-top: 5px; color: #333;"><?php echo wp_kses_post($cons); ?></div>
            </div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('pros_cons', 'pros_cons_shortcode');

///*----------------------------------- ingredients & what it does shortcode -------------------------------*/////

function key_ingredients_what_it_does_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => get_the_ID(),
    ), $atts, 'ingredients_what');

    $post_id = intval($atts['id']);

    $ingredients = get_field('sin_key_ingredients', $post_id);
    $what_it_does = get_field('sing_what_is_does', $post_id);

    if (empty($ingredients) && empty($what_it_does)) {
        return '';
    }

    ob_start();
    ?>
    <div class="ingredients-what-wrap" style="background:#fceded; padding: 15px; border-radius: 6px; font-family: sans-serif;">
        <?php if (!empty($ingredients)): ?>
            <div class="ingredients" style="margin-bottom: 10px;">
                <strong style="font-weight: bold; font-size: 16px;">Key Ingredients:</strong>
                <span style="color: #555; margin-left: 4px;"><?php echo wp_kses_post($ingredients); ?></span>
            </div>
        <?php endif; ?>

        <?php if (!empty($what_it_does)): ?>
            <div class="what-it-does">
                <strong style="font-weight: bold; font-size: 16px;">What It Does:</strong>
                <span style="color: #555; margin-left: 4px;"><?php echo wp_kses_post($what_it_does); ?></span>
            </div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('ingredients_what', 'key_ingredients_what_it_does_shortcode');





