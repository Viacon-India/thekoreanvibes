<?php
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
		add_image_size('cat-style-two-thumbnail', 100, 120, true);
		add_image_size('cat-style-two-hero-thumbnail', 410, 271, true);
		add_image_size('default-thumbnail', 358, 258, true);

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
	$logo_url = get_stylesheet_directory_uri() . '/assets/images/logo.png';
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
	if (!has_site_icon()  && !is_customize_preview()) {
		$favicon_url = get_stylesheet_directory_uri() . '/assets/images/favicon.png';
		echo '<link rel="icon" type="image/gif" href="' . $favicon_url . '" />';
	} else {
		echo '<link rel="icon" type="image/gif" href="' . wp_get_attachment_image_url(get_option('site_icon'), 'full') . '">';
	}
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



// Add Custom Field in General Settings for Social Links
function social()
{
	add_settings_section(
		'theme_settings', // Section ID 
		'Theme Settings', // Section Title
		'theme_callback', // Callback
		'general' // What Page?  This makes the section show up on the General Settings Page
	);
	add_settings_field( // Option 1
		'facebook', // Option ID
		'Facebook', // Label
		'social_callback', // !important - This is where the args go!
		'general', // Page it will be displayed (General Settings)
		'theme_settings', // Name of our section
		array( // The $args
			'facebook' // Should match Option ID
		)
	);
	add_settings_field( // Option 3
		'instagram', // Option ID
		'Instagram', // Label
		'social_callback', // !important - This is where the args go!
		'general', // Page it will be displayed
		'theme_settings', // Name of our section (General Settings)
		array( // The $args
			'instagram' // Should match Option ID
		)
	);
	add_settings_field( // Option 1
		'token', // Option ID
		'API Token For Instagram', // Label
		'token_callback', // !important - This is where the args go!
		'general', // Page it will be displayed (General Settings)
		'theme_settings', // Name of our section
		array( // The $args
			'token' // Should match Option ID
		)
	);
	register_setting('general', 'facebook', 'esc_attr');
	register_setting('general', 'instagram', 'esc_attr');
	register_setting('general', 'token', 'esc_attr');
}
add_action('admin_init', 'social'); //Enable Social Links Under Settings

function theme_callback()
{ // Section Callback
	echo '<p>Add Your Settings Below</p>';
}
function social_callback($args)
{  // Textbox Callback
	$option = get_option($args[0]);
	echo '<input type="url" id="' . $args[0] . '" name="' . $args[0] . '" value="' . $option . '" />';
}
function token_callback($argu)
{  // Textbox Callback
	$text = get_option($argu[0]);
	echo '<textarea rows="4" cols="50" type="text" name="' . $argu[0] . '" id="' . $argu[0] . '">' . $text . '</textarea>';
}



// To Enqueue Script and Style
add_action('wp_enqueue_scripts', 'my_plugin_assets');
function my_plugin_assets()
{
	$ver = '3.6.2';
	wp_enqueue_script('jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), $ver, true);
	wp_enqueue_script('themeScripts', get_template_directory_uri() . '/assets/js/themeScripts.js',  array('jquery'), $ver, true);
	
	wp_register_script('jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', null, null, true); 
	wp_enqueue_style('style', get_stylesheet_uri(), false, '', 'all');

}





add_action('wp_footer', 'img');
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
			add_action('admin_enqueue_scripts', 'color_picker');
			function color_picker($hook_suffix)
			{
				wp_enqueue_style('wp-color-picker');
				wp_enqueue_script('my-script-handle', plugins_url('my-script.js', __FILE__), array('wp-color-picker'), false, true);
			}
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
				<p class="description">Text Color</p>
			</div>
			<div style="width: fit-content;">
				<input type="text" name="hex_code_4" class="color-picker" />
				<p class="description">Gradient Color</p>
			</div>
			<div style="width: fit-content;">
				<input type="text" name="hex_code_5" class="color-picker" />
				<p class="description">Search Text Color</p>
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
				<p class="description">Text Color</p>
			</div>
			<div style="width: fit-content;">
				<input name="hex_code_4" type="text" class="color-picker" value="<?php echo esc_attr($hex_color_4) ?>" />
				<p class="description">Gradient Color</p>
			</div>
			<div style="width: fit-content;">
				<input name="hex_code_5" type="text" class="color-picker" value="<?php echo esc_attr($hex_color_5) ?>" />
				<p class="description">Search Text Color</p>
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



			function toc($html)
			{
				if (is_single()) {
					if (!$html) return $html;
					$dom = new DOMDocument();
					libxml_use_internal_errors(true);
					$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
					libxml_clear_errors();
					foreach ($dom->getElementsByTagName('*') as $element) {
						if ($element->tagName == 'h2' || $element->tagName == 'h3' || $element->tagName == 'h4') {
							$title_id = str_replace(array(' '), array('-'), rtrim(preg_replace('#[\s]{2,}#', ' ', preg_replace('#[^\w\säüöß]#', null, str_replace(array('ä', 'ü', 'ö', 'ß'), array('ae', 'ue', 'oe', 'ss'), html_entity_decode(strtolower($element->textContent)))))));
							$element->setAttribute('id', $title_id);
						}
					}
					$html = $dom->saveHTML();
				}
				return $html;
			}
			add_filter('the_content', 'toc');


			function table_of_content($li_class, $a_class)
			{
				$toc = '';
				$html = get_the_content();
				$dom = new DOMDocument();
				libxml_use_internal_errors(true);
				$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
				libxml_clear_errors();
				foreach ($dom->getElementsByTagName('*') as $element) {
					if ($element->tagName == 'h2' || $element->tagName == 'h3' || $element->tagName == 'h4') {
						$title_id = str_replace(array(' '), array('-'), rtrim(preg_replace('#[\s]{2,}#', ' ', preg_replace('#[^\w\säüöß]#', null, str_replace(array('ä', 'ü', 'ö', 'ß'), array('ae', 'ue', 'oe', 'ss'), html_entity_decode(strtolower($element->textContent)))))));
						$toc .= '<li class="' . $li_class . '"><a href="' . get_the_permalink() . '#' . $title_id . '" id="toc-' . $title_id . '" class="' . $a_class . '">' . $element->textContent . '</a></li>';
					}
				}
				return $toc;
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

// Ajax Search Function
add_action('wp_ajax_search_fetch' , 'search_fetch');
add_action('wp_ajax_nopriv_search_fetch','search_fetch');
function search_fetch(){
	global $post;
	/** Query to filter only post type */
	$the_query = new WP_Query( array('post_type' => 'post',
									'post_status' => 'publish',
									'post__not_in' => array($post->ID),
									'posts_per_page' => 24,
									's' => esc_attr( $_POST['keyword'] ),
									'order'   => 'DESC' ));

	if ($the_query -> have_posts()) : ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				jQuery('#data_message').hide();
			});
		</script>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post();
			get_template_part('template-parts/search', 'card');
		endwhile; 
		wp_reset_postdata();
	else : ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				jQuery('#data_message').show();
			});
		</script>
	<?php endif;
	if(!function_exists('img')) { ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				alert('Remove alert from search_fetch function');
			});
		</script>
	<?php }else{
		img();
	}
	die();
}

			// Action
			add_action('wp_ajax_load_more_blog', 'load_more_blog');
			add_action('wp_ajax_nopriv_load_more_blog', 'load_more_blog');
			function load_more_blog()
			{
				$cat_id = $_GET['cat_id'];
				if (empty($cat_id)) {
					$cat_id = $_POST['cat_id'];
				}
				$orderby = $_GET['orderby'];
				if (empty($orderby)) {
					$orderby = $_POST['orderby'];
				}
				$hex_color = $_GET['hex_color'];
				if (empty($hex_color)) {
					$hex_color = $_POST['hex_color'];
				}
				if (empty($hex_color)) {
					$hex_color = null;
				}

				$the_query = new WP_Query(array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'orderby' => $orderby,
					'order'   => 'DESC',
					'paged' => $_POST['page'],
					'cat' => $cat_id,
					'tag_id' => $_POST['tag_id'],
					'author' => $_POST['user_id'],
					's' => $_POST['search']
				));
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();
						get_template_part('template-parts/default', 'card', array('hex_color' => $hex_color));
					endwhile;
				endif;
				if (!function_exists('img')) { ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				alert('Remove alert from load_more_blog function');
			});
		</script>
		<?php } else {
					img();
				}
				wp_reset_postdata();
				wp_die();
			}
			// Action
			add_action('wp_ajax_load_more_comments', 'load_more_comments');
			add_action('wp_ajax_nopriv_load_more_comments', 'load_more_comments');
			function load_more_comments()
			{
				$comment_id = $_GET['comment_id'];
				$comments = get_comments(array(
					'parent' => $comment_id,
					'hierarchical' => 'threaded',
					'status' => 'approve',
					'orderby' => 'date',
					'order' => 'ASC'
				));
				if (!empty($comments) && !empty($comment_id)) :
					foreach ($comments as $comment) : ?>
			<div class="comment-card-replay flex gap-3 mt-3 ml-3" id="comment-<?php echo $comment->comment_ID; ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path d="M21.3164 13.4444C21.4971 13.6145 21.5996 13.8516 21.5996 14.0998C21.5996 14.348 21.4971 14.5851 21.3164 14.7552L16.2164 19.5552C15.8545 19.8959 15.2849 19.8786 14.9442 19.5166C14.6036 19.1547 14.6208 18.5851 14.9828 18.2444L18.4302 14.9998L6.29961 14.9998C4.14573 14.9998 2.39961 13.2537 2.39961 11.0998V5.6998C2.39961 5.20276 2.80257 4.7998 3.29961 4.7998C3.79665 4.7998 4.19961 5.20276 4.19961 5.6998V11.0998C4.19961 12.2596 5.13981 13.1998 6.29961 13.1998L18.4302 13.1998L14.9828 9.95512C14.6208 9.61456 14.6036 9.04492 14.9442 8.683C15.2849 8.32096 15.8545 8.3038 16.2164 8.64436L21.3164 13.4444Z" fill="#101010" />
				</svg>
				<div class="flex flex-col gap-3">
					<div class="flex gap-3 items-center">
						<figure class="w-fit h-fit">
							<img class="comment-card-img" src="<?php echo get_avatar_url($comment->user_id); ?>" alt="author-img" />
						</figure>
						<h3 class="comment-user-title"><?php echo $comment->comment_author; ?></h3>
					</div>
					<h4 class="text-[24px] font-Chai font-light"><?php echo $comment->comment_content; ?></h4>
					<div class="flex gap-3">
						<a class="comment-card-user-reply mt-0" rel="nofollow" href="<?php echo get_permalink($post_id); ?>/?replytocom=<?php echo $comment->comment_ID; ?>#respond" data-commentid="<?php echo $comment->comment_ID; ?>" data-postid="<?php echo $post_id; ?>" data-belowelement="div-comment-<?php echo $comment->comment_ID; ?>" data-respondelement="respond" data-replyto="Reply to <?php echo $comment->comment_author; ?>" aria-label="Reply to <?php echo $comment->comment_author; ?>">Reply </a>
						<?php if (is_user_logged_in()) { ?>
							<a class="comment-card-user-reply mt-0" href="<?php echo get_edit_comment_link($comment->comment_ID); ?>">Edit</a>
						<?php } ?>
					</div>
				</div>
			</div>
<?php endforeach;
				endif;
				wp_reset_postdata();
				wp_die();
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
