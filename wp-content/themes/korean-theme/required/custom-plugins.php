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






function custom_post_template($template) {
    if (is_single()) {
        $post_id = get_the_ID();
        if (has_term('k-beauty', 'category', $post_id) || has_parent_term('k-beauty', $post_id)) {
            $new_template = locate_template(array('templates/beauty-template.php'));
        }elseif (has_term('k-entertainment', 'category', $post_id) || has_parent_term('k-entertainment', $post_id)) {
            $new_template = locate_template(array('templates/entertainment-template.php'));
        }elseif (has_term('k-fashion', 'category', $post_id) || has_parent_term('k-fashion', $post_id)) {
            $new_template = locate_template(array('templates/fashion-template.php'));
        }elseif (has_term('k-food', 'category', $post_id) || has_parent_term('k-food', $post_id)) {
            $new_template = locate_template(array('templates/food-template.php'));
        }else {
            return $template;
        }
        if (isset($new_template)) {
            return $new_template;
        }
    }

    return $template;
}
add_filter('single_template', 'custom_post_template');


function has_parent_term($term_slug, $post_id) {
    $terms = get_the_terms($post_id, 'category');
    if ($terms) {
        foreach ($terms as $term) {
            if (in_array(get_term_by('slug', $term_slug, 'category')->term_id, get_ancestors($term->term_id, 'category'))) return true;
        }
    }
    return false;
}





// Add a custom meta box for posts belonging to specific categories
function add_custom_editor_for_post_temp() {
    $post_id = get_the_ID();
    if (has_term('k-beauty', 'category', $post_id) || has_parent_term('k-beauty', $post_id)) {
		$pros = get_post_meta( $post_id, 'pros', true );
		$cons = get_post_meta( $post_id, 'cons', true );
		$ingredients = get_post_meta( $post_id, 'ingredients', true );
		$purpose = get_post_meta( $post_id, 'purpose', true );
		echo '<div style="padding-bottom: 20px; display: flex; gap: 1rem;">';
			echo '<div style="width: 50%;"><h3 style="margin-bottom: 5px;">Pros</h3>';
			wp_editor( $pros, 'pros', array( 'wpautop' => true, 'media_buttons' =>  true, 'textarea_rows' => 10 ) );
			echo '</div><div style="width: 50%;"><h3 style="margin-bottom: 5px;">Cons</h3>';
			wp_editor( $cons, 'cons', array( 'wpautop' => true, 'media_buttons' =>  true, 'textarea_rows' => 10 ) );
		echo '</div></div>';
		echo '<div style="display: flex;flex-direction: column;gap: 12px;">
			<div style="display: flex;flex-direction: column;gap: 6px;">
				<label for="ingredients">Ingredients: </label>
				<textarea name="ingredients">' . esc_attr( $ingredients ) . '</textarea>
			</div>
			<div style="display: flex;flex-direction: column;gap: 6px;">
				<label for="purpose">Purpose: </label>
				<textarea name="purpose">' . esc_attr( $purpose ) . '</textarea>
			</div>
		</div>';
	}
}
add_action( 'edit_form_after_editor', 'add_custom_editor_for_post_temp' );
function add_custom_meta_box_for_category() {
    $post_id = get_the_ID();
    if(has_term('k-beauty', 'category', $post_id) || has_parent_term('k-beauty', $post_id)){
		add_meta_box('template-meta-data','Meta Data','beauty_template_custom_field','post','side','high');
		add_meta_box( 'custom-review', 'Reviews', 'review_callback', 'post', 'side', 'high' );
	}
	if(has_term('k-entertainment', 'category', $post_id) || has_parent_term('k-entertainment', $post_id)){
		add_meta_box('template-meta-data','Meta Data','entertainment_template_custom_field','post','side','high');
	}
	if(has_term('k-fashion', 'category', $post_id) || has_parent_term('k-fashion', $post_id)){
		add_meta_box('template-meta-data','Meta Data','fashion_template_custom_field','post','side','high');
	}
	if(has_term('k-food', 'category', $post_id) || has_parent_term('k-food', $post_id)){
		add_meta_box('template-meta-data','Meta Data','food_template_custom_field','post','side','high');
		add_meta_box( 'custom-review', 'Reviews', 'review_callback', 'post', 'side', 'high' );
	}
}
add_action( 'add_meta_boxes', 'add_custom_meta_box_for_category' );

function beauty_template_custom_field( $post ) {
	$rating = get_post_meta( $post->ID, 'rating', true );
    $efficacy = get_post_meta( $post->ID, 'efficacy', true );
	$packaging = get_post_meta( $post->ID, 'packaging', true );
	$value = get_post_meta( $post->ID, 'value', true );
	$skin = get_post_meta( $post->ID, 'skin', true );
    $benefits = get_post_meta( $post->ID, 'benefits', true );
	$brand = get_post_meta( $post->ID, 'brand', true );
	$form = get_post_meta( $post->ID, 'form', true );
	$tone = get_post_meta( $post->ID, 'tone', true );
	$quantity = get_post_meta( $post->ID, 'quantity', true );
    echo '<div style="display: flex;flex-direction: column;gap: 12px;">
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="rating">Rating:</label>
			<input type="text" name="rating" value="' . esc_attr( $rating ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="efficacy">Efficacy:</label>
			<input type="text" name="efficacy" value="' . esc_attr( $efficacy ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="packaging">Packaging:</label>
			<input type="text" name="packaging" value="' . esc_attr( $packaging ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="value">Value:</label>
			<input type="text" name="value" value="' . esc_attr( $value ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="skin">Skin Type:</label>
			<input type="text" name="skin" value="' . esc_attr( $skin ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="benefits">Product Benefits:</label>
			<input type="text" name="benefits" value="' . esc_attr( $benefits ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="brand">Brand:</label>
			<input type="text" name="brand" value="' . esc_attr( $brand ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="form">Item Form:</label>
			<input type="text" name="form" value="' . esc_attr( $form ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="tone">Skin Tone:</label>
			<input type="text" name="tone" value="' . esc_attr( $tone ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="quantity">Net Quantity:</label>
			<input type="text" name="quantity" value="' . esc_attr( $quantity ) . '" />
		</div>
		<div style="display: flex;gap: 12px;">
			<p>Shortcode:</p>
			<p>[product_data]</p>
		</div>
	</div>';
}
function entertainment_template_custom_field( $post ) {
    $rating = get_post_meta( $post->ID, 'rating', true );
    $cast = get_post_meta( $post->ID, 'cast', true );
	$featured = get_post_meta( $post->ID, 'featured', true );
    echo '<div style="display: flex;flex-direction: column;gap: 12px;">
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="rating">Rating:</label>
			<input type="text" name="rating" value="' . esc_attr( $rating ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="cast">Cast:</label>
			<textarea name="cast">' . esc_attr( $cast ) . '</textarea>
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="featured">Brands Featured:</label>
			<textarea name="featured">' . esc_attr( $featured ) . '</textarea>
		</div>
	</div>';
}
function fashion_template_custom_field( $post ) {
    $duration = get_post_meta( $post->ID, 'duration', true );
    $spend = get_post_meta( $post->ID, 'spend', true );
	$featured = get_post_meta( $post->ID, 'featured', true );
    echo '<div style="display: flex;flex-direction: column;gap: 12px;">
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="duration">Time Taken:</label>
			<input type="text" name="duration" value="' . esc_attr( $duration ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="spend">Money Spent:</label>
			<input type="text" name="spend" value="' . esc_attr( $spend ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="featured">Brands Featured:</label>
			<textarea name="featured">' . esc_attr( $featured ) . '</textarea>
		</div>
	</div>';
}
function food_template_custom_field( $post ) {
	$price = get_post_meta( $post->ID, 'price', true );
    $rating = get_post_meta( $post->ID, 'rating', true );
    $food = get_post_meta( $post->ID, 'food', true );
	$service = get_post_meta( $post->ID, 'service', true );
	$price_rating = get_post_meta( $post->ID, 'price_rating', true );
	$address = get_post_meta( $post->ID, 'address', true );
    $hours = get_post_meta( $post->ID, 'hours', true );
	$branches = get_post_meta( $post->ID, 'branches', true );
	$contact = get_post_meta( $post->ID, 'contact', true );
    echo '<div style="display: flex;flex-direction: column;gap: 12px;">
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="price">Price (For Two):</label>
			<input type="text" name="price" value="' . esc_attr( $price ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="rating">Rating:</label>
			<input type="text" name="rating" value="' . esc_attr( $rating ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="food">Food:</label>
			<input type="text" name="food" value="' . esc_attr( $food ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="service">Service:</label>
			<input type="text" name="service" value="' . esc_attr( $service ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="price_rating">Price:</label>
			<input type="text" name="price_rating" value="' . esc_attr( $price_rating ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="address">Address:</label>
			<textarea name="address">' . esc_attr( $address ) . '</textarea>
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="hours">Hours:</label>
			<input type="text" name="hours" value="' . esc_attr( $hours ) . '" />
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="branches">Branches:</label>
			<textarea name="branches">' . esc_attr( $branches ) . '</textarea>
		</div>
		<div style="display: flex;flex-direction: column;gap: 6px;">
			<label for="contact">Contact Details:</label>
			<textarea name="contact">' . esc_attr( $contact ) . '</textarea>
		</div>
		<div style="display: flex;gap: 12px;">
			<p>Shortcode:</p>
			<p>[product_data]</p>
		</div>
	</div>';
}
function save_custom_field_for_news( $post_id ) {
	$keys = ['rating','efficacy','packaging','value','ingredients','purpose','skin','benefits','brand','form','tone','quantity','price','food','service','price_rating','cast','featured','duration','spend','address','hours','branches','contact'];
	foreach($keys as $key){
		if ( isset( $_POST[$key] ) ) {
			$custom_field_value = sanitize_text_field( $_POST[$key] );
			update_post_meta( $post_id, $key, $custom_field_value );
		}
	}
	if(isset( $_POST['pros'] ) ) {
		update_post_meta( $post_id, 'pros', $_POST['pros'] );
	}
	if(isset( $_POST['cons'] ) ) {
		update_post_meta( $post_id, 'cons', $_POST['cons'] );
	}
}
add_action( 'save_post', 'save_custom_field_for_news' );





/*-----------------Review Answer Custom Field-----------------*/
function review_callback($post){
	$reviews = get_post_meta($post->ID, "custom-review", true);
	echo '<div id="review_forum" style="margin-bottom: 4px;">';
		if(is_array($reviews)){
			// foreach($reviews as $array){
			// 	if(empty(array_filter($reviews[array_search($array, $reviews)]))){
			// 		unset($reviews[array_search($array, $reviews)]);
			// 	}
			// }
			$reviews = array_values($reviews);
			if(!empty($reviews)){
				foreach($reviews as $review){
					$position = array_search($review, $reviews);
					echo '<div>';
						echo '<h3>Review '.($position+1).'</h3>';
						echo '<textarea type="text" class="widefat" name="custom-review['.$position.'][review]" rows="5" placeholder="Review">'.$reviews[$position]['review'].'</textarea>';
						echo '<input type="text" class="widefat" name="custom-review['.$position.'][author]" placeholder="Author" value="'.$reviews[$position]['author'].'" style="margin-bottom: 4px;">';
						echo '<input type="button" class="button remove-row" value="Remove">';	
					echo '</div>';	
				}
				$blank_key = array_key_last($reviews)+1;
			}else{
				$blank_key = 0;
			}
		}else{
			$reviews = array(array('review' => '', 'author' => ''));
			$blank_key = 0;
		}
		echo '<div>';
			echo '<h3>Review '.($blank_key+1).'</h3>';
			echo '<textarea type="text" class="widefat" name="custom-review['.$blank_key.'][review]" rows="5" placeholder="Review"></textarea>';
			echo '<input type="text" class="widefat" name="custom-review['.$blank_key.'][author]" placeholder="Author" value="" style="margin-bottom: 4px;">';
			echo '<input type="button" class="button remove-row" value="Remove">';
		echo '</div>';
	echo '</div>';
	echo '<input type="button" class="button add-row" value="Add">';
	?><script>
		jQuery(document).ready(function( $ ){
			var index = '<?php echo ($blank_key+1); ?>';
			var index = parseInt(index);
			var review = index + 1;
			$( '.add-row' ).on('click', function() {
				$('#review_forum').append('<div><h3>Review '+review+'</h3><textarea type="text" class="widefat" name="custom-review['+index+'][review]" rows="5" placeholder="Review"></textarea><input type="text" class="widefat" name="custom-review['+index+'][author]" placeholder="Author" value="" style="margin-bottom: 4px;"><input type="button" class="button remove-row" value="Remove"></div>');
				index = index + 1;
				review = review + 1;
				$( '.remove-row' ).on('click', function() {
					$(this).parent().remove();
				});
			});
			$( '.remove-row' ).on('click', function() {
				$(this).parent().remove();
			});
		});
	</script><?php
}
function save_review_answer($post_id){
	$reviews = isset($_POST["custom-review"])? $_POST["custom-review"]  : false;
	foreach($reviews as $array){
		if(empty(array_filter($reviews[array_search($array, $reviews)]))){
			unset($reviews[array_search($array, $reviews)]);
		}
	}
	update_post_meta($post_id,"custom-review", $reviews);
}
add_action("save_post", "save_review_answer");






function product_data() {
	$post_id = get_the_ID();
    ob_start();
	if(has_term('k-food', 'category', $post_id) || has_parent_term('k-food', $post_id)){
		$address = get_post_meta( $post_id, 'address', true );
		$hours = get_post_meta( $post_id, 'hours', true );
		$branches = get_post_meta( $post_id, 'branches', true );
		$contact = get_post_meta( $post_id, 'contact', true );
		if(!empty($address)){
			echo '<p><strong class="text-[#101010] font-semibold">Address:</strong> '.$address.'</p>';
		}
		if(!empty($hours)){
			echo '<p><strong class="text-[#101010] font-semibold">Hours:</strong> '.$hours.'</p>';
		}
		if(!empty($branches)){
			echo '<p><strong class="text-[#101010] font-semibold">Branches:</strong> '.$branches.'</p>';
		}
		if(!empty($contact)){
			echo '<p><strong class="text-[#101010] font-semibold">Contact Details:</strong> '.$contact.'</p>';
		}
	}
	if(has_term('k-beauty', 'category', $post_id) || has_parent_term('k-beauty', $post_id)){
		$skin = get_post_meta( $post_id, 'skin', true );
		$benefits = get_post_meta( $post_id, 'benefits', true );
		$brand = get_post_meta( $post_id, 'brand', true );
		$form = get_post_meta( $post_id, 'form', true );
		$tone = get_post_meta( $post_id, 'tone', true );
		$quantity = get_post_meta( $post_id, 'quantity', true );
		if(!empty($skin)){
			echo '<p><strong class="text-[#101010] font-semibold">Skin Type:</strong> '.$skin.'</p>';
		}
		if(!empty($benefits)){
			echo '<p><strong class="text-[#101010] font-semibold">Product Benefits:</strong> '.$benefits.'</p>';
		}
		if(!empty($brand)){
			echo '<p><strong class="text-[#101010] font-semibold">Brand:</strong> '.$brand.'</p>';
		}
		if(!empty($form)){
			echo '<p><strong class="text-[#101010] font-semibold">Item Form:</strong> '.$form.'</p>';
		}
		if(!empty($tone)){
			echo '<p><strong class="text-[#101010] font-semibold">Skin Tone:</strong> '.$tone.'</p>';
		}
		if(!empty($quantity)){
			echo '<p><strong class="text-[#101010] font-semibold">Net Quantity:</strong> '.$quantity.'</p>';
		}
	}
    return ob_get_clean();
}
add_shortcode('product_data', 'product_data');