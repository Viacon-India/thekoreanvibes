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
	</div>
<?php
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
			{ ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery('#default-search').on('input', function(){
				jQuery.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					type: 'post',
					data: { action: 'search_fetch', keyword: jQuery(this).val() },
					beforeSend: function(){
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
	</script>
	<?php }

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
								$hex_color = '#ED1B1B';
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
