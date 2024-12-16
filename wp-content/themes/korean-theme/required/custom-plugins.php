<?php 
//---------------------------------------------Menu
add_action('admin_menu', 'theme_menu');
function theme_menu(){
	add_menu_page( "Theme Menu", "Theme Settings", 'manage_options', 'theme_menu', 'theme_menu_callback','', 7);
}
  
function theme_menu_callback(){
	echo '<div class="wrap">';
		echo '<h1>Theme Settings</h1>';
		echo '<form method="post" action="options.php" novalidate="novalidate">';
			settings_fields('theme_menu');
			echo '<table class="form-table" role="presentation">';
				do_settings_sections( 'theme_menu', 'default' );
				do_settings_fields('theme_menu','default');
			echo '</table>';
			submit_button();

			echo '<button type="button" class="button" onclick="'."document.getElementById('form-structure').style.display = 'block'".'">Show Contact form Structure</button>';
			echo '<div id="form-structure" style="display: none;padding-top: 20px;">
				<textarea rows="12" style="width: 100%;color: black;" type="text" disabled>
[text* your-name placeholder "Your Name*"][email* your-email placeholder "Your Email*"]

[text your-subject placeholder "Your Subject"]

[textarea your-message 50x12 placeholder "Your Message"]

[submit "SUBMIT"]</textarea>
			</div>';

		echo '</form>';
	echo '</div>';
}



//---------------------------------------------Menu Section and Field
add_action('admin_init', 'theme_settings');
function theme_settings() {  
	add_settings_section( 'categories', 'Categories', '', 'theme_menu' );
	add_settings_section( 'footer_settings', 'Footer Settings', '', 'theme_menu' );

	add_settings_field('footer_text', 'Footer Text', 'footer_text_callback', 'theme_menu', 'footer_settings','footer_text');
	register_setting('theme_menu','footer_text', 'esc_attr');
	
	$socials = array('facebook','linkedin');
	foreach($socials as $social){
		add_settings_field($social, ucwords(str_replace('_',' ',$social)).' Link', 'social_content_callback', 'theme_menu', 'footer_settings',$social);
		register_setting('theme_menu',$social, 'esc_attr');
	}

	$categories = array('category_1','category_2','category_3','category_4','category_5');
	foreach($categories as $category){
		add_settings_field($category, ucwords(str_replace('_',' ',$category)), 'category_callback', 'theme_menu', 'categories',$category);
		register_setting('theme_menu',$category, 'esc_attr');
	}
}

function social_content_callback($args) {
	$option = get_option($args);
	echo '<input type="url" size="100" name="'. $args .'" value="' . $option . '" />';
}

function category_callback($args) {
	$option = get_option($args);
	echo '<input type="text" name="'.$args.'" value="'.$option.'" />';
}

function footer_text_callback($args) {
	$footer_text = get_option($args);
	echo '<textarea rows="4" cols="103" type="text" name="'. $args .'" id="'. $args .'">' . $footer_text . '</textarea>';
}



//---------------------------------------------Add Post Views Function
function set_post_views($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function track_post_views ($post_id) {
	if ( !is_single() ) return;
	if ( empty ( $post_id) ) {
		global $post;
		$post_id = $post->ID;    
	}
	set_post_views($post_id);
}
add_action( 'wp_head', 'track_post_views');



//-------------------------------------------------------------------TOC Function
function toc($content) {
    $content = preg_replace_callback('/<h2>(.*?)<\/h2>/', function($matches) {
        $id = $matches[1];
        return '<h2 id="' . $matches[1] . '">' . $matches[1] . '</h2>';
    }, $content);
    
    $content = preg_replace_callback('/<h3>(.*?)<\/h3>/', function($matches) {
        $id = $matches[1];
        return '<h3 id="' . $matches[1] . '">' . $matches[1] . '</h3>';
    }, $content);
    
    $content = preg_replace_callback('/<h4>(.*?)<\/h4>/', function($matches) {
        $id = $matches[1];
        return '<h4 id="' . $matches[1] . '">' . $matches[1] . '</h4>';
    }, $content);

    return $content;
}
add_filter('the_content', 'toc');



function table_of_content($li_class, $a_class) {
	$content = get_the_content();
    $heading_links = array();
    preg_match_all('/<(h2|h3|h4)[^>]*id=["\']([^"\']+)["\'][^>]*>(.*?)<\/\1>/i', $content, $matches);
    if (!empty($matches)) {
        foreach ($matches[2] as $index => $id) {
            $heading_text = strip_tags($matches[3][$index]);
            $heading_links[] = '<a href="#' . esc_attr($id) . '" class="'.$a_class.'">' . esc_html($heading_text) . '</a>';
        }
    }
    if (!empty($heading_links)) {
        return '<li class="'.$li_class.'">' . implode('</li><li class="'.$li_class.'">', $heading_links) . '</li>';
    }
    return '';
}



//-------------------------------------------------------------------Add User Meta
add_filter( 'user_contactmethods', 'user_custom_meta' );
function user_custom_meta( $user_custom_meta ) {
	$custom_meta_fields = array('designation');
	foreach($custom_meta_fields as $meta_field){
		$user_custom_meta[$meta_field]   = ucwords(str_replace('_',' ',$meta_field));
	}
	return $user_custom_meta;
}



//-------------------------------------------------------------------Add Custom Category Field
function color_picker($hook_suffix){
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('my-script-handle', plugins_url('my-script.js', __FILE__), array('wp-color-picker'), false, true);
}
add_action('admin_enqueue_scripts', 'color_picker');
function custom_category_fields($term) {
    if (current_filter() == 'category_edit_form_fields'){	
        $svg = get_term_meta( $term->term_id, 'term_svg', true );
		$hex_color = get_term_meta($term->term_id, 'hex_code', true);
		$text_hex_color = get_term_meta($term->term_id, 'text_hex_code', true);
        ?><tr class="form-field">
            <th valign="top" scope="row"><label for="svg">SVG Code</label></th>
            <td>
				<textarea rows="8" cols="50" name="svg"><?php echo esc_attr( $svg ) ? esc_attr( $svg ) : ''; ?></textarea><br/>
                <span class="description">Please enter your SVG Code</span>
            </td>
        </tr>
		<tr class="form-field">
			<th valign="top" scope="row"><label for="hex_code">Category Color Code</label></th>
			<td>
				<input name="hex_code" type="text" class="color-picker" value="<?php echo esc_attr($hex_color) ?>" />
				<span class="description">Please select your Color</span>
			</td>
		</tr>
		<tr class="form-field">
			<th valign="top" scope="row"><label for="text_hex_code">Category Text Color Code</label></th>
			<td>
				<input name="text_hex_code" type="text" class="color-picker" value="<?php echo esc_attr($text_hex_color) ?>" />
				<span class="description">Please select your Color</span>
			</td>
		</tr>
		<script>jQuery(document).ready(function($){$('.color-picker').wpColorPicker();});</script><?php
	}
	if (current_filter() == 'category_add_form_fields'){
        ?><div class="form-field">
            <label for="svg">SVG Code</label>
            <input type="text" size="40" value=""  name="svg">
            <p class="description">Please enter your SVG Code</p>
        </div>
		<div class="form-field">
			<label for="hex_code">Category Color Code</label>
			<div>
				<input type="text" name="hex_code" class="color-picker" />
				<p class="description">Please select your Color</p>
			</div>
		</div>
		<div class="form-field">
			<label for="text_hex_code">Category Text Color Code</label>
			<div>
				<input type="text" name="text_hex_code" class="color-picker" />
				<p class="description">Please select your Color</p>
			</div>
		</div>
		<script>jQuery(document).ready(function($){$('.color-picker').wpColorPicker();});</script><?php
    }
}
add_action('category_edit_form_fields', 'custom_category_fields', 10, 2);
add_action('category_add_form_fields', 'custom_category_fields', 10, 2);
function custom_save_category_fields($term_id){
	$hex_color = $_POST['hex_code'];
	if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color)) {
		update_term_meta($term_id, 'hex_code', sanitize_text_field($hex_color));
	}else{
		update_term_meta($term_id, 'hex_code', '');
	}
	$text_hex_color = $_POST['text_hex_code'];
	if (preg_match('/^#[a-f0-9]{6}$/i', $text_hex_color)) {
		update_term_meta($term_id, 'text_hex_code', sanitize_text_field($text_hex_color));
	}else{
		update_term_meta($term_id, 'text_hex_code', '');
	}
	$term_svg = $_POST['svg'];
	update_term_meta( $term_id, 'term_svg', $term_svg );
}
add_action('edited_category', 'custom_save_category_fields', 10, 2);
add_action('create_category', 'custom_save_category_fields', 10, 2);

function custom_category_header( $header ){
	$header['svg']  = __('SVG', 'category-featured-image' );
	$header['color_hex_code']  = __('Color', 'colors');
	return $header;
}
add_filter('manage_edit-category_columns', 'custom_category_header' );

function custom_content_category( $columns, $column, $term_id ){
	if('svg' === $column){
		echo '<style type="text/css"> .column-svg { width: 75px; } </style>';
		$imageID = get_term_meta( $term_id, 'term_svg', true );
		if(!empty($imageID)){
			echo '<div style="background-color: grey; padding:5px;width: fit-content;">'.$imageID.'</div>';
		}
	}
	if('color_hex_code' === $column){
		echo '<style type="text/css"> .column-color_hex_code { width: 50px; } </style>';
		$hex_color = get_term_meta($term_id, 'hex_code', true);
		echo '<div style="gap: 10px; display: flex;">';
		if (preg_match('/^#[a-f0-9]{6}$/i', $hex_color)) {
			echo '<svg height="30" width="30"><circle cx="15" cy="15" r="15" fill="' . $hex_color . '" /></svg>';
		}
		echo '</div>';
	}
	return $columns;
}
add_filter('manage_category_custom_column', 'custom_content_category', 10, 3 );



//-------------------------------------------------------------------Add Custom Post Meta-field
function custom_add_post_field(){
	add_meta_box('checkbox', 'Checkbox Meta Fields', 'checkbox_callback', 'post', 'normal', 'high');
}
add_action('add_meta_boxes', 'custom_add_post_field');
function checkbox_callback($post){
	$stored_meta = get_post_meta($post->ID);
	?><div style="display: flex;gap: 10%;">
		<div>
			<h3>Check if this is a editor's pick: </h3>
			<div class="row-content">
				<label for="featured">Editor's Item</label>
				<input class="mt-1" type="checkbox" name="featured" id="featured" value="yes" <?php if (isset($stored_meta['featured'])) checked($stored_meta['featured'][0], 'yes'); ?> />
			</div>
		</div>
		<div>
			<h3>Check if this is a exclusive post: </h3>
			<div class="row-content">
				<label for="exclusive">Exclusive Item</label>
				<input class="mt-1" type="checkbox" name="exclusive" id="exclusive" value="yes" <?php if (isset($stored_meta['exclusive'])) checked($stored_meta['exclusive'][0], 'yes'); ?> />
			</div>
		</div>
	</div><?php
}

function custom_save_post_fields($post_id){
	if (isset($_POST['featured'])) {
		update_post_meta($post_id, 'featured', 'yes');
	} else {
		update_post_meta($post_id, 'featured', '');
	}
	if (isset($_POST['exclusive'])) {
		update_post_meta($post_id, 'exclusive', 'yes');
	} else {
		update_post_meta($post_id, 'exclusive', '');
	}
}
add_action('save_post', 'custom_save_post_fields');

function custom_post_header($header){
	$header['featured'] = 'Featured';
	$header['exclusive'] = 'Exclusive';
	return $header;
}
add_filter('manage_post_posts_columns', 'custom_post_header');

function custom_content_post($column_name, $post_id){
	if ('featured' === $column_name) {
		echo '<style type="text/css"> .column-featured { width: 4rem; } </style>';
		$featured = get_post_meta($post_id, 'featured', true);
		echo ('yes' === $featured) ? 'Yes' : 'No';
	}
	if ('exclusive' === $column_name) {
		echo '<style type="text/css"> .column-exclusive { width: 4rem; } </style>';
		$exclusive = get_post_meta($post_id, 'exclusive', true);
		echo ('yes' === $exclusive) ? 'Yes' : 'No';
	}
	return $column_name;
}
add_action('manage_posts_custom_column', 'custom_content_post', 10, 2);



//-------------------------------------------------------------------Addition Image for Contact Page
add_action( 'add_meta_boxes', 'add_internal_image' );
function add_internal_image(){
	global $post;
	if($post->post_type == 'page' && $post->post_name == 'contact-us') add_meta_box( 'internal_image', 'Internal Image', 'internal_image_callback', 'page', 'side', 'low');
}
function internal_image_callback($post){
    global $content_width, $_wp_additional_image_sizes;
    $image_id = get_post_meta( $post->ID, 'internal_image', true );
    $old_content_width = $content_width;
    $content_width = 254;

    if($image_id && get_post($image_id)){
		$thumbnail_html = (!isset( $_wp_additional_image_sizes['post-thumbnail']))?wp_get_attachment_image($image_id, array($content_width, $content_width)):wp_get_attachment_image($image_id, 'post-thumbnail');
        if (!empty($thumbnail_html)){
            $content = $thumbnail_html;
            $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_internal_image_button" >Remove Internal image</a></p>';
            $content .= '<input type="hidden" id="upload_internal_image" name="internal_cover_image" value="'.$image_id.'" />';
        }
        $content_width = $old_content_width;
    }else{
        $content = '<img src="" style="width:'.$content_width.'px;height:auto;border:0;display:none;" alt="internal-image"/>';
        $content .= '<p class="hide-if-no-js"><a title="Set An image" href="javascript:;" id="upload_internal_image_button" id="set-internal-image" data-uploader_title="Choose an image" data-uploader_button_text="Set internal image">Set internal image</a></p>';
        $content .= '<input type="hidden" id="upload_internal_image" name="internal_cover_image" value="" />';
    }
    echo $content;
	?><script>jQuery(document).ready(function($){
		// Uploading files
		var file_frame;
		jQuery.fn.upload_internal_image = function (button) {
			var button_id = button.attr('id');
			var field_id = button_id.replace('_button', '');
			// If the media frame already exists, reopen it.
			if (file_frame) {
				file_frame.open();
				return;
			}
			// Create the media frame.
			file_frame = wp.media.frames.file_frame = wp.media({
				title: jQuery(this).data('uploader_title'),
				button: {
					text: jQuery(this).data('uploader_button_text'),
				},
				multiple: false
			});
			// When an image is selected, run a callback.
			file_frame.on('select', function () {
				var attachment = file_frame.state().get('selection').first().toJSON();
				jQuery("#" + field_id).val(attachment.id);
				jQuery("#internal_image img").attr('src', attachment.url);
				jQuery('#internal_image img').show();
				jQuery('#' + button_id).attr('id', 'remove_internal_image_button');
				jQuery('#remove_internal_image_button').text('Remove internal image');
			});
			// Finally, open the modal
			file_frame.open();
		};
		jQuery('#internal_image').on('click', '#upload_internal_image_button', function (event) {
			event.preventDefault();
			jQuery.fn.upload_internal_image(jQuery(this));
		});
		jQuery('#internal_image').on('click', '#remove_internal_image_button', function (event) {
			event.preventDefault();
			jQuery('#upload_internal_image').val('');
			jQuery('#internal_image img').attr('src', '');
			jQuery('#internal_image img').hide();
			jQuery(this).attr('id', 'upload_internal_image_button');
			jQuery('#upload_internal_image_button').text('Set internal image');
		});
	});</script><?php
}
add_action( 'save_post', 'internal_image_save', 10, 1 );
function internal_image_save ( $post_id ) {
    if(isset($_POST['internal_cover_image'])){
        $image_id = (int) $_POST['internal_cover_image'];
        update_post_meta( $post_id, 'internal_image', $image_id );
    }
}



//-------------------------------------------------------------------Post Reading Time
function read_time($post_ID) {
	$content = get_post_field( 'post_content', $post_ID );
	$count_words = str_word_count( wp_strip_all_tags( $content ) );
	$read_time = ceil($count_words / 250);

	if($read_time == 1){
		$label = " Min Read";
	}else{
		$label = " Mins Read";
	}
	$read_time_output = $read_time . $label;
	return $read_time_output;
}



//-------------------------------------------------------------------Add Reaction Count
function add_reaction_count($post_id){
	$count = get_post_meta($post_id, 'likes', true);
	if(empty($count)){
		$count = 0;
	}
	$count++;
	update_post_meta($post_id, 'likes', $count);
	return $count;
}



//-------------------------------------------------------------------Remove Reaction Count
function remove_reaction_count($post_id){
	$count = get_post_meta($post_id, 'likes', true);
	if(empty($count) || $count == 0){
		$count = 0;
		update_post_meta($post_id, 'likes', $count);
	}else{
		$count--;
		update_post_meta($post_id, 'likes', $count);
	}
	return $count;
}



//-------------------------------------------------------------------Format Number
function format_number($number) {
	if(empty($number)){
		$number = 0;
	}

	if($number >= 1000000000000) {
		return round($number/1000000000000, 1) . "T";
	}
	if($number >= 1000000000 && $number <= 999999999999) {
		return round($number/1000000000, 1) . "B";
	}
	if($number >= 1000000 && $number <= 999999999) {
		return round($number/1000000, 1) . "M";
	}
	if($number >= 1000 && $number <= 999999) {
		return round($number/1000, 1) . "K";
	}
	else{
		return $number;
	}
}



//-------------------------------------------------------------------Add Custom color Field for Page
function add_custom_page_meta_box() {
    add_meta_box('custom_page_meta_box', 'Custom Page Fields', 'display_custom_page_meta_box', 'page', 'side', 'high');
}
add_action('add_meta_boxes', 'add_custom_page_meta_box');
function display_custom_page_meta_box($post) {
    $color_value = get_post_meta($post->ID, 'custom_color', true);
	$h2_header = get_post_meta($post->ID, 'h2_header', true);
    $textarea_content = get_post_meta($post->ID, 'textarea_content', true);

    wp_nonce_field('my_custom_nonce_action', 'my_custom_nonce_name');
	
	echo '<div style="display: flex;gap: 6px;justify-content: space-between;align-items: center;">
		<label for="custom_color "style="margin-bottom: 6px;">Choose a color:</label>
		<input type="text" id="custom_color" name="custom_color" value="' . esc_attr($color_value) . '" class="color-picker" data-default-color="#FAC92C" />
	</div>';

    echo '<label for="h2_header">H2 Header:</label>';
    echo '<input type="text" id="h2_header" name="h2_header" value="' . esc_attr($h2_header) . '" style="width:100%;" />';

    echo '<label for="textarea_content">Textarea:</label>';
	wp_editor( $textarea_content, 'custom_wpeditor', array( 'textarea_name' => 'textarea_content' ) );
    
	?><script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.color-picker').wpColorPicker();
		});
	</script><?php
}
function save_custom_page_meta_box($post_id) {
	if (!isset($_POST['my_custom_nonce_name']) || !wp_verify_nonce($_POST['my_custom_nonce_name'], 'my_custom_nonce_action')) {
        return $post_id;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (isset($_POST['h2_header'])) {
        update_post_meta($post_id, 'h2_header', sanitize_text_field($_POST['h2_header']));
    }
	if ( isset( $_POST['textarea_content'] ) ) {
        update_post_meta( $post_id, 'textarea_content', wp_kses_post( $_POST['textarea_content'] ) );
    }
    if (isset($_POST['custom_color'])) {
        update_post_meta($post_id, 'custom_color', sanitize_text_field($_POST['custom_color']));
    }
}
add_action('save_post', 'save_custom_page_meta_box');
