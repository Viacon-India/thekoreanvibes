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
function toc($html) {
    if (is_single()) {
        if (empty($html)) return $html; // Check if HTML content is empty
        $dom = new DOMDocument();

        // Suppress warnings from malformed HTML and check for errors
        libxml_use_internal_errors(true);

        // Try to load the HTML and check if it's valid
        $loaded = @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

        // If loading the HTML failed, return the original HTML
        if (!$loaded) {
            libxml_clear_errors();
            return $html;
        }

        // Proceed if HTML loaded correctly
        libxml_clear_errors();

        // Loop through all elements to add IDs to h2, h3, h4 elements
        foreach($dom->getElementsByTagName('*') as $element) {
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


function table_of_content($li_class, $a_class) {
    $toc = '';
    $html = get_the_content();

    if (empty($html)) return $toc; // Return empty TOC if content is empty

    $dom = new DOMDocument();

    // Suppress warnings from malformed HTML and check for errors
    libxml_use_internal_errors(true);

    // Try to load the HTML and check if it's valid
    $loaded = @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

    // If loading the HTML failed, return an empty TOC
    if (!$loaded) {
        libxml_clear_errors();
        return $toc;
    }

    // Proceed if HTML loaded correctly
    libxml_clear_errors();

    // Loop through all elements to generate the TOC
    foreach($dom->getElementsByTagName('*') as $element) {
        if ($element->tagName == 'h2' || $element->tagName == 'h3' || $element->tagName == 'h4') {
            $title_id = str_replace(array(' '), array('-'), rtrim(preg_replace('#[\s]{2,}#', ' ', preg_replace('#[^\w\säüöß]#', null, str_replace(array('ä', 'ü', 'ö', 'ß'), array('ae', 'ue', 'oe', 'ss'), html_entity_decode(strtolower($element->textContent)))))));
            $toc .= '<li class="' . $li_class . '"><a href="' . get_the_permalink() . '#' . $title_id . '" id="toc-' . $title_id . '" class="' . $a_class . '">' . $element->textContent . '</a></li>';
        }
    }
    return $toc;
}
// function toc($content) {
//     $content = preg_replace_callback('/<h2>(.*?)<\/h2>/', function($matches) {
//         $id = $matches[1];
//         return '<h2 id="' . $matches[1] . '">' . $matches[1] . '</h2>';
//     }, $content);
    
//     $content = preg_replace_callback('/<h3>(.*?)<\/h3>/', function($matches) {
//         $id = $matches[1];
//         return '<h3 id="' . $matches[1] . '">' . $matches[1] . '</h3>';
//     }, $content);
    
//     $content = preg_replace_callback('/<h4>(.*?)<\/h4>/', function($matches) {
//         $id = $matches[1];
//         return '<h4 id="' . $matches[1] . '">' . $matches[1] . '</h4>';
//     }, $content);

//     return $content;
// }
// add_filter('the_content', 'toc');



// function table_of_content($li_class, $a_class) {
// 	$content = get_the_content();
//     $heading_links = array();
//     preg_match_all('/<(h2|h3|h4)[^>]*id=["\']([^"\']+)["\'][^>]*>(.*?)<\/\1>/i', $content, $matches);
//     if (!empty($matches)) {
//         foreach ($matches[2] as $index => $id) {
//             $heading_text = strip_tags($matches[3][$index]);
//             $heading_links[] = '<a href="#' . esc_attr($id) . '" class="'.$a_class.'">' . esc_html($heading_text) . '</a>';
//         }
//     }
//     if (!empty($heading_links)) {
//         return '<li class="'.$li_class.'">' . implode('</li><li class="'.$li_class.'">', $heading_links) . '</li>';
//     }
//     return '';
// }



//-------------------------------------------------------------------Add User Meta
add_filter( 'user_contactmethods', 'user_custom_meta' );
function user_custom_meta( $user_custom_meta ) {
	$custom_meta_fields = array('designation');
	foreach($custom_meta_fields as $meta_field){
		$user_custom_meta[$meta_field]   = ucwords(str_replace('_',' ',$meta_field));
	}
	return $user_custom_meta;
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
    $bg_color = get_post_meta($post->ID, 'bg_color', true);
	$text_color = get_post_meta($post->ID, 'text_color', true);
	$h2_header = get_post_meta($post->ID, 'h2_header', true);
    $textarea_content = get_post_meta($post->ID, 'textarea_content', true);

    wp_nonce_field('my_custom_nonce_action', 'my_custom_nonce_name');
	echo '<div style="display:flex;flex-direction: column;gap:6px;">';
		echo '<div style="display: flex;gap: 6px;justify-content: space-between;align-items: center;">
			<label for="bg_color "style="margin-bottom: 6px;">Background color:</label>
			<input type="text" id="bg_color" name="bg_color" value="' . esc_attr($bg_color) . '" class="color-picker" data-default-color="#FAC92C" />
		</div>';
		echo '<div style="display: flex;gap: 6px;justify-content: space-between;align-items: center;">
			<label for="text_color "style="margin-bottom: 6px;">Text color:</label>
			<input type="text" id="text_color" name="text_color" value="' . esc_attr($text_color) . '" class="color-picker" data-default-color="#101010" />
		</div>';
		echo '<label for="h2_header">H2 Header:</label>';
		echo '<input type="text" id="h2_header" name="h2_header" value="' . esc_attr($h2_header) . '" style="width:100%;" />';

		echo '<label for="textarea_content">Textarea:</label>';
		wp_editor( $textarea_content, 'custom_wpeditor', array( 'textarea_name' => 'textarea_content' ) );
	echo '</div>';
    
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
    if (isset($_POST['bg_color'])) {
        update_post_meta($post_id, 'bg_color', sanitize_text_field($_POST['bg_color']));
    }
	if (isset($_POST['text_color'])) {
        update_post_meta($post_id, 'text_color', sanitize_text_field($_POST['text_color']));
    }
}
add_action('save_post', 'save_custom_page_meta_box');















/*-----------------Post Template-----------------*/
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



/*-----------------Template Custom Field-----------------*/
function add_custom_editor_for_post_temp($post) {
    $post_id = $post->ID;
	if( 'post' !== $post->post_type ) return;
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
	$single_affiliations = get_post_meta($post_id, 'single_affiliation', true);
    if (!is_array($single_affiliations)) {
        $single_affiliations = array_fill(0, 3, array('title' => '', 'link' => '', 'text' => '', 'image_id' => ''));
    }
    echo '<div style="display: flex;flex-direction: column;gap: 12px;margin-top: 12px;">';
		echo '<div style="display: flex;gap: 12px;">
			<p>Shortcode:</p>
			<p>[single_product_affiliation]</p>
		</div>';
		// for ($i = 0; $i < 3; $i++) {
		$i=0;
		$title = esc_attr($single_affiliations[$i]['title']);
		$link = esc_attr($single_affiliations[$i]['link']);
		$text = esc_attr($single_affiliations[$i]['text']);
		$image_id = $single_affiliations[$i]['image_id'];
		$image_url = $image_id ? wp_get_attachment_url($image_id) : '';

		echo '<div style="display: flex;gap: 12px;">';
			
			echo '<div style="display: flex;flex-direction: column;gap: 6px;justify-content: space-between;"><div style="display: flex;flex-direction: column;gap: 6px;">
					<label>Title:</label>
					<input type="text" name="single_affiliation['.$i.'][title]" value="' . $title . '" />
				</div>';
			echo '<div style="display: flex;flex-direction: column;gap: 6px;">
					<label>Link:</label>
					<input type="text" name="single_affiliation['.$i.'][link]" value="' . $link . '" />
				</div>';
			echo '<div style="display: flex;flex-direction: column;gap: 6px;">
					<label>Button Text:</label>
					<input type="text" name="single_affiliation['.$i.'][text]" value="' . $text . '" />
				</div></div>';
			echo '<div style="display: flex;flex-direction: column;gap: 6px;justify-content: space-between;">
					<label>Image:</label>
					<input type="hidden" class="upload_single_image_input" name="single_affiliation['.$i.'][image_id]" value="' . esc_attr($image_id) . '" />
					<input type="button" class="upload_single_image_button button" value="Upload Image" />
					'.($image_url ? '<input type="button" class="remove_single_image_button button" value="Remove Image">' : '').'
				</div>
				<img src="' . esc_url($image_url) . '" style="width:254px;height:auto;border:0;display:' . ($image_url ? 'block' : 'none') . ';" alt="internal-image"/>';
			echo '</div>';
			// if ($i < 2) {
			// 	echo '<span style="width: 100%;height: 2px;background-color: #101010;"></span>';
			// }
		// }
    echo '</div>';
    ?>
	<script>
		jQuery(document).ready(function($) {
			$('body').on('click', '.upload_single_image_button', function(e) {
				e.preventDefault();
				var button = $(this);
				var inputField = button.siblings('.upload_single_image_input');
				var imageField = button.parent().siblings('img');
				var mediaUploader;
				mediaUploader = wp.media.frames.file_frame = wp.media({
					title: 'Select Image',
					button: {
						text: 'Use this image'
					},
					multiple: false
				});
				mediaUploader.open();
				mediaUploader.on('select', function() {
					var attachment = mediaUploader.state().get('selection').first().toJSON();
					var check = imageField.attr('src');
					imageField.attr('src', attachment.url).css('display', 'block');
					inputField.val(attachment.id);
					if(!check) button.after('<input type="button" class="remove_single_image_button button" value="Remove Image">');
				});
			});
			$('body').on('click', '.remove_single_image_button', function(e) {
				var button = $(this);
				var imageField = button.parent().siblings('img');
				var inputField = button.siblings('.upload_single_image_input');
				imageField.attr('src', '').css('display', 'none');
				inputField.val('');
				button.remove();
			});
		});
	</script>
	<?php
}
add_action( 'edit_form_after_editor', 'add_custom_editor_for_post_temp' );
function add_custom_meta_box_for_category() {
    $post_id = get_the_ID();
    if(has_term('k-beauty', 'category', $post_id) || has_parent_term('k-beauty', $post_id)){
		add_meta_box('template-meta-data','Meta Data','beauty_template_custom_field','post','side','default');
		add_meta_box( 'custom-review', 'Reviews', 'review_callback', 'post', 'side', 'default' );
		add_meta_box( 'custom_affiliation', 'Affiliation', 'affiliation_callback', 'post', 'side', 'default' );
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
		add_meta_box( 'custom_affiliation', 'Affiliation', 'affiliation_callback', 'post', 'side', 'default' );
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
		<div style="display: flex;gap: 12px;">
			<p>Shortcode:</p>
			<p>[product_data]</p>
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
	</div>';
}
function entertainment_template_custom_field( $post ) {
    $rating = get_post_meta( $post->ID, 'rating', true );
    $cast = get_post_meta( $post->ID, 'cast', true );
	$release = get_post_meta( $post->ID, 'release', true );
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
			<label for="release">Year of Release:</label>
			<input type="date" name="release" value="' . esc_attr( $release ) . '" />
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
		<div style="display: flex;gap: 12px;">
			<p>Shortcode:</p>
			<p>[product_data]</p>
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
	</div>';
}
function save_custom_field_for_templates( $post_id ) {
	$keys = ['rating','efficacy','packaging','value','ingredients','purpose','skin','benefits','brand','form','tone','quantity','price','food','service','price_rating','cast','featured','duration','spend','address','hours','branches','contact','release'];
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
    if (!isset($_POST['single_affiliation'])) return $post_id;
    $affiliation_data = array();
    foreach ($_POST['single_affiliation'] as $index => $affiliation) {
        $affiliation_data[$index] = array(
            'title'     => sanitize_text_field($affiliation['title']),
            'link'      => esc_url_raw($affiliation['link']),
			'text'     => sanitize_text_field($affiliation['text']),
            'image_id'  => absint($affiliation['image_id']),
        );
    }

    // Save the meta data
    update_post_meta($post_id, 'single_affiliation', $affiliation_data);

    return $post_id;
}
add_action( 'save_post', 'save_custom_field_for_templates' );



/*-----------------Affiliation Custom Field-----------------*/
function affiliation_callback($post) {
    $affiliations = get_post_meta($post->ID, 'affiliation', true);
    if (!is_array($affiliations)) {
        $affiliations = array_fill(0, 3, array('title' => '', 'link' => '', 'text' => '', 'image_id' => ''));
    }
    echo '<div style="display: flex;flex-direction: column;gap: 12px;">';
		echo '<div style="display: flex;gap: 12px;">
			<p>Shortcode:</p>
			<p>[product_affiliation]</p>
		</div>';
		for ($i = 0; $i < 3; $i++) {
			$title = esc_attr($affiliations[$i]['title']);
			$link = esc_attr($affiliations[$i]['link']);
			$text = esc_attr($affiliations[$i]['text']);
			$image_id = $affiliations[$i]['image_id'];
			$image_url = $image_id ? wp_get_attachment_url($image_id) : '';

			echo '<div>';
			echo '<div style="display: flex;flex-direction: column;gap: 6px;">
					<label>Title:</label>
					<input type="text" name="affiliation['.$i.'][title]" value="' . $title . '" />
				</div>';
			echo '<div style="display: flex;flex-direction: column;gap: 6px;">
					<label>Link:</label>
					<input type="text" name="affiliation['.$i.'][link]" value="' . $link . '" />
				</div>';
			echo '<div style="display: flex;flex-direction: column;gap: 6px;">
					<label>Button Text:</label>
					<input type="text" name="affiliation['.$i.'][text]" value="' . $text . '" />
				</div>';
			echo '<div style="display: flex;flex-direction: column;gap: 6px;">
					<label>Image:</label>
					<img src="' . esc_url($image_url) . '" style="width:254px;height:auto;border:0;display:' . ($image_url ? 'block' : 'none') . ';" alt="internal-image"/>
					<input type="hidden" class="upload_image_input" name="affiliation['.$i.'][image_id]" value="' . esc_attr($image_id) . '" />
					<input type="button" class="upload_image_button button" value="Upload Image" />
					'.($image_url ? '<input type="button" class="remove_image_button button" value="Remove Image">' : '').'
				</div>';
			echo '</div>';
			if ($i < 2) {
				echo '<span style="width: 100%;height: 2px;background-color: #101010;"></span>';
			}
		}
    echo '</div>';
    ?><script>
		jQuery(document).ready(function($) {
			$('body').on('click', '.upload_image_button', function(e) {
				e.preventDefault();
				var button = $(this);
				var inputField = button.siblings('.upload_image_input');
				var imageField = button.siblings('img');
				var mediaUploader;
				mediaUploader = wp.media.frames.file_frame = wp.media({
					title: 'Select Image',
					button: {
						text: 'Use this image'
					},
					multiple: false
				});
				mediaUploader.open();
				mediaUploader.on('select', function() {
					var attachment = mediaUploader.state().get('selection').first().toJSON();
					var check = imageField.attr('src');
					imageField.attr('src', attachment.url).css('display', 'block');
					inputField.val(attachment.id);
					if(!check) button.after('<input type="button" class="remove_image_button button" value="Remove Image">');
				});
			});
			$('body').on('click', '.remove_image_button', function(e) {
				var button = $(this);
				var imageField = button.siblings('img');
				var inputField = button.siblings('.upload_image_input');
				imageField.attr('src', '').css('display', 'none');
				inputField.val('');
				button.remove();
			});
		});
	</script><?php
}
function save_affiliation_meta($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    if (!isset($_POST['affiliation'])) return $post_id;
    $affiliation_data = array();
    foreach ($_POST['affiliation'] as $index => $affiliation) {
        $affiliation_data[$index] = array(
            'title'     => sanitize_text_field($affiliation['title']),
            'link'      => esc_url_raw($affiliation['link']),
			'text'      => sanitize_text_field($affiliation['text']),
            'image_id'  => absint($affiliation['image_id']),
        );
    }

    // Save the meta data
    update_post_meta($post_id, 'affiliation', $affiliation_data);

    return $post_id;
}
add_action('save_post', 'save_affiliation_meta');



/*-----------------Review Answer Custom Field-----------------*/
function review_callback($post){
	$reviews = get_post_meta($post->ID, "custom-review", true);
	echo '<div id="review_forum" style="margin-bottom: 4px;">';
		echo '<div style="display: flex;gap: 12px;">
			<p>Shortcode:</p>
			<p>[reviews]</p>
		</div>';
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
	if(empty($reviews)) return $post_id;
	foreach($reviews as $array){
		if(empty(array_filter($reviews[array_search($array, $reviews)]))){
			unset($reviews[array_search($array, $reviews)]);
		}
	}
	update_post_meta($post_id,"custom-review", $reviews);
}
add_action("save_post", "save_review_answer");



/*-----------------Product Data Short Code-----------------*/
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



/*-----------------Reviews Short Code-----------------*/
function reviews() {
	$post_id = get_the_ID();
	$cat = get_the_category();
    $cat_ID = $cat[0]->term_id;
    $parent_id = $cat[0]->parent;
	$bg_color = get_term_meta($cat_ID, 'hex_code_2', true);
    if (empty($bg_color) && !empty($parent_id)) {
        $bg_color = get_term_meta($parent_id, 'hex_code_2', true);
    }
    $quote_color = get_term_meta($cat_ID, 'hex_code_4', true);
    if (empty($quote_color) && !empty($parent_id)) {
        $quote_color = get_term_meta($parent_id, 'hex_code_4', true);
    }
	$reviews = get_post_meta($post_id, "custom-review", true);
    ob_start();
	if(!empty($reviews)):
	?><div class="swiper mySwiper !pb-[64px] !relative">
		<div class="swiper-wrapper">
			<?php foreach($reviews as $review): ?>
				<div class="swiper-slide">
					<svg class="absolute top-[-16px] left-[30px] z-1" width="121" height="76" viewBox="0 0 121 76" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 76V34.8689L14.6406 0H44.9265L35.4531 33.588H53.6821V76H0ZM67.3179 76V34.8689L81.9585 0H112.244L102.771 33.588H121V76H67.3179Z" fill="<?php echo $quote_color; ?>" />
					</svg>
					<svg class="absolute bottom-0 right-[30px] z-1" width="121" height="76" viewBox="0 0 121 76" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M121 0V41.1311L106.359 76H76.0735L85.5469 42.412H67.3179V0H121ZM53.6821 0V41.1311L39.0415 76H8.75564L18.229 42.412H0V0H53.6821Z" fill="<?php echo $quote_color; ?>" />
					</svg>
					<div class="slider-box-content relative py-[60px] px-[48px] 2xl:px-[96px] rounded-[10px] !h-[350px]" style="background-color:<?php echo $bg_color; ?>">
						<p style="color:#101010" class="!text-[22px] 2xl:!text-[24px] !font-Anton !text-center !leading-[1.5] !capitalize"><?php echo $review['review']; ?></p>
						<span class="flex justify-center items-center gap-2 mt-6 !text-[18px] !font-Chai">
							<svg width="24" height="1" viewBox="0 0 24 1" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="4.37114e-08" y1="0.5" x2="24" y2="0.500002" stroke="#101010" />
							</svg>
							<?php echo $review['author']; ?></span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="slider-btn">
			<div class="left group">
				<svg class="group-hover:fill-[#FFFFFF]" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="#303030">
					<path d="M9.75062 14.3197C9.75062 14.5731 9.85435 14.8265 10.0614 15.0197L16.5786 21.0996C16.9932 21.4863 17.6654 21.4863 18.0798 21.0996C18.4942 20.713 18.4942 20.086 18.0798 19.6992L12.3129 14.3197L18.0796 8.94007C18.494 8.55331 18.494 7.92643 18.0796 7.53986C17.6652 7.15291 16.993 7.15291 16.5784 7.53986L10.0611 13.6197C9.85411 13.813 9.75062 14.0663 9.75062 14.3197Z" fill="" />
				</svg>
			</div>
			<div class="right group">
				<svg class="group-hover:fill-[#FFFFFF]" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="#303030">
					<path d="M18.39 14.3197C18.39 14.5731 18.2863 14.8265 18.0793 15.0197L11.562 21.0996C11.1474 21.4863 10.4752 21.4863 10.0608 21.0996C9.6464 20.713 9.6464 20.086 10.0608 19.6992L15.8277 14.3197L10.061 8.94007C9.6466 8.55331 9.6466 7.92643 10.061 7.53986C10.4754 7.15291 11.1476 7.15291 11.5622 7.53986L18.0795 13.6197C18.2865 13.813 18.39 14.0663 18.39 14.3197Z" fill="" />
				</svg>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div><?php endif;
    return ob_get_clean();
}
add_shortcode('reviews', 'reviews');



/*-----------------Product Affiliation Short Code-----------------*/
function multiple_affiliation() {
	$post_id = get_the_ID();
	$affiliations = get_post_meta($post_id, 'affiliation', true);
    ob_start();
	if(!empty($affiliations)):
	?><div class="product-sec mb-8">
		<div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
			<?php foreach($affiliations as $affiliation):
				$image_id = $affiliation['image_id'];
				$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'multiple-affiliation-thumbnail' ) : ''; ?>
				<a href="<?php echo $affiliation['link']??'#'; ?>">
					<?php if(!empty($image_url)): ?>
						<figure class="w-full h-[250px] !mb-3">
							<img class="w-full h-full object-cover rounded-[10px]" src="<?php echo $image_url; ?>" alt="card11" />
						</figure>
					<?php endif; ?>
					<h3 class="product-title"><?php echo $affiliation['title']; ?></h3>
					<button class="price-btn"><?php echo $affiliation['text']; ?></button>
				</a>
			<?php endforeach; ?>
		</div>
	</div><?php endif;
    return ob_get_clean();
}
add_shortcode('product_affiliation', 'multiple_affiliation');



/*-----------------Single Product Affiliation Short Code-----------------*/
function single_affiliation() {
	$post_id = get_the_ID();
	$cat = get_the_category();
    $cat_ID = $cat[0]->term_id;
    $parent_id = $cat[0]->parent;
	$bg_color = get_term_meta($cat_ID, 'hex_code_2', true);
    if (empty($bg_color) && !empty($parent_id)) {
        $bg_color = get_term_meta($parent_id, 'hex_code_2', true);
    }
	$single_affiliations = get_post_meta($post_id, 'single_affiliation', true);
	$i=0;
    ob_start();
	if(!empty($single_affiliations) && array_key_exists($i,$single_affiliations)):
		$image_id = $single_affiliations[$i]['image_id'];
		$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'single-affiliation-thumbnail' ) : '';
	?><div class="product-sec mb-8">
		<a class="flex flex-col md:flex-row mt-5" href="<?php echo $single_affiliations[$i]['link']??'#'; ?>">
			<?php if(!empty($image_url)): ?>
				<figure class="w-full md:w-[40%] h-[280px] md:h-[340px] !mb-3 md:!mb-0">
					<img class="w-full h-full object-cover !rounded-tr-[0px] !rounded-br-[0px] !my-0" src="<?php echo $image_url; ?>" alt="card11" />
				</figure>
			<?php endif; ?>
			<div class="w-full p-8 flex flex-col justify-center" style="background-color:<?php echo $bg_color; ?>">
				<h3 class="product-title"><?php echo $single_affiliations[$i]['title']; ?></h3>
				<button class="price-btn !w-fit"><?php echo $single_affiliations[$i]['text']; ?></button>
			</div>
		</a>
	</div><?php endif;
    return ob_get_clean();
}
add_shortcode('single_product_affiliation', 'single_affiliation');



/*---------------------Add Image To Category--------------------*/
function add_taxonomy_fields($taxonomy ) { ?>
	<tr class="form-field">
		<th scope="row" valign="top"><label>Image</label></th>
		<td>
			<div style="display: flex;">
				<div style="line-height: 60px; margin-right: 10px;display: flex;flex-direction: column;gap: 6px;">
					<input type="hidden" id="tax_image_id" name="tax_image_id" value="" />
					<button type="button" class="upload_image_button button">Upload/Add image</button>
					<button type="button" class="remove_image_button button" style="display: none;">Remove image</button>
				</div>
				<div id="tax_image" style="float: left; display: none;"><img src="" width="60px" height="60px" alt="LOGO"/></div>
			</div>
			<script>
				jQuery(document).ready( function($){
					var file_frame;
					$( 'body' ).on( 'click', '.upload_image_button', function( event ) {
						event.preventDefault();
						if ( file_frame ) {
							file_frame.open();
							return;
						}
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: '<?php _e( 'Choose a Logo', 'category-featured-image' ); ?>',
							button: {
								text: '<?php _e( 'Use as Logo', 'category-featured-image' ); ?>'
							},
							multiple: false
						});
						file_frame.on( 'select', function() {
							var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
							var attachment_thumbnail = attachment.sizes.full;
							$( '#tax_image_id').val( attachment.id );
							$( '#tax_image' ).show().find( 'img' ).attr( 'src', attachment_thumbnail.url );
							$( '.remove_image_button' ).show();
						});
						file_frame.open();
					});

					$( 'body' ).on( 'click', '.remove_image_button', function() {
						$( '#tax_image').hide().find( 'img' ).attr( 'src', '' );
						$( '#tax_image_id' ).val( '' );
						$( '.remove_image_button' ).hide();
						return false;
					});
				});
			</script>
			<div style="clear:both;"></div>
		</td>
	</tr><?php
}
add_action('category_add_form_fields', 'add_taxonomy_fields', 10, 2);
function edit_taxonomy_fields( $term, $taxonomy ) {
	$thumbnail_id = get_term_meta( $term->term_id, 'tax_image_id', true );
	if ( $thumbnail_id ) {
		$image = wp_get_attachment_image_url( $thumbnail_id, 'full' );
	} else {
		$image = '';
	} ?>
	<tr class="form-field">
		<th scope="row" valign="top"><label>Image</label></th>
		<td>
			<div style="display: flex;">
				<div style="line-height: 60px; margin-right: 10px;display: flex;flex-direction: column;gap: 6px;">
					<input type="hidden" id="tax_image_id" name="tax_image_id" value="<?php echo $thumbnail_id; ?>" />
					<button type="button" class="upload_image_button button">Upload/Add image</button>
					<button type="button" class="remove_image_button button" <?php echo (empty($image))?'style="display: none;"':''; ?>>Remove image</button>
				</div>
				<div id="tax_image" style="float: left; <?php echo (empty($image))?'display: none;':''; ?>"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" alt="LOGO"/></div>
			</div>
			<script>
				jQuery(document).ready( function($){
					var file_frame;
					$( 'body' ).on( 'click', '.upload_image_button', function( event ) {
						event.preventDefault();
						if ( file_frame ) {
							file_frame.open();
							return;
						}
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: '<?php _e( 'Choose a Logo', 'category-featured-image' ); ?>',
							button: {
								text: '<?php _e( 'Use as Logo', 'category-featured-image' ); ?>'
							},
							multiple: false
						});
						file_frame.on( 'select', function() {
							var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
							var attachment_thumbnail = attachment.sizes.full;
							$( '#tax_image_id' ).val( attachment.id );
							$( '#tax_image' ).show().find( 'img' ).attr( 'src', attachment_thumbnail.url );
							$( '.remove_image_button' ).show();
						});
						file_frame.open();
					});

					$( 'body' ).on( 'click', '.remove_image_button', function() {
						$( '#tax_image' ).hide().find( 'img' ).attr( 'src', '' );
						$( '#tax_image_id' ).val( '' );
						$( '.remove_image_button' ).hide();
						return false;
					});
				});
			</script>
			<div style="clear:both;"></div>
		</td>
	</tr><?php
}
add_action('category_edit_form_fields', 'edit_taxonomy_fields', 10, 2);

function save_taxonomy_fields( $term_id){
	if ( isset( $_POST['tax_image_id'] ) ) {
		update_term_meta( $term_id, 'tax_image_id', $_POST['tax_image_id'] );
	}
}
add_action('edited_category', 'save_taxonomy_fields', 10, 2);
add_action('create_category', 'save_taxonomy_fields', 10, 2);

add_action( 'admin_enqueue_scripts', 'admin_scripts' );
function admin_scripts(){
	wp_enqueue_media();
}