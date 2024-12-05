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
[text* your-name placeholder "Your Name*"]
[email* your-email placeholder "Your Email*"]
[text* your-subject placeholder "Your Subject*"]
[textarea your-message placeholder "Type Comment Here*"]
[cf7sr-simple-recaptcha]
[submit "Submit"]</textarea>
			</div>';

		echo '</form>';
	echo '</div>';
}



//---------------------------------------------Menu Section and Field
add_action('admin_init', 'theme_settings');
function theme_settings() {  
	add_settings_section( 'categories', 'Categories', '', 'theme_menu' );
	add_settings_section( 'footer_settings', 'Footer Settings', '', 'theme_menu' );

	$socials = array('facebook','linkedin');
	foreach($socials as $social){
		add_settings_field($social, ucwords(str_replace('_',' ',$social)).' Link', 'social_content_callback', 'theme_menu', 'footer_settings',$social);
		register_setting('theme_menu',$social, 'esc_attr');
	}

	$categories = array('category_1','category_2','category_3');
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



//---------------------------------------------Add Post Views Function/
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



//---------------------------------------------Add Designation
add_filter( 'user_contactmethods', 'designation' );
function designation( $designation ) {
	$designation['designation']   = __( 'Designation'   );
	return $designation;
}



//---------------------------------------------Add Listing Post Meta Field
function listing_meta() {
    add_meta_box( 'listing_post','Listing Posts', 'listing_meta_callback', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'listing_meta' );
function listing_meta_callback( $post ) {
	$listing_post = get_post_meta( $post->ID, 'listing_post', true );
    ?><p>
		<span class="prfx-row-title">Check if this is a listing post: </span>
		<div class="prfx-row-content">
			<label for="listing-post">
				<input type="checkbox" name="listing_post" id="listing-post" value="1" <?php if (!empty($listing_post)) checked($listing_post, 'yes'); ?> />
				Listing Item
			</label>
		</div>
	</p><?php
}
add_action( 'save_post', 'listing_meta_save' );
function listing_meta_save( $post_id ) {
 	(isset( $_POST['listing_post']))?update_post_meta( $post_id, 'listing_post', 'yes' ):update_post_meta( $post_id, 'listing_post', '' );
}



//---------------------------------------------Add Custom User Meta
add_action('show_user_profile','add_custom_user_meta');
add_action('edit_user_profile','add_custom_user_meta');
function add_custom_user_meta( $user ) {
	$contribution = get_user_meta( $user->ID,'contribution',true);
	$thumbnail_id = get_user_meta( $user->ID, 'author_custom_image_id', true );
	$image = ($thumbnail_id)?wp_get_attachment_image_url( $thumbnail_id, 'full' ):'';
    ?>
    <h3>Contribution</h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="contribution">Contribution Type:</label>
            </th>
            <td>
				<select name="contribution" id="contribution">
					<option value="" <?php if(empty($contribution)) echo 'selected="selected"'; ?>>None</option>
					<option value="writer" <?php if(!empty($contribution) && $contribution=='writer') echo 'selected="selected"'; ?>>Writer</option>
					<option value="designer" <?php if(!empty($contribution) && $contribution=='designer') echo 'selected="selected"'; ?>>Designer</option>
				</select>
                <p class="description">
                    Please enter your contribution type.
                </p>
            </td>
        </tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="author_custom_image_id">Breed Image</label></th>
			<td>
				<div style="display: flex;">
					<div style="line-height: 60px; margin-right: 10px;">
						<input type="hidden" id="author_custom_image_id" name="author_custom_image_id" value="<?php echo $thumbnail_id; ?>" />
						<button type="button" class="upload_image_button button" <?php echo (!empty($image))?'style="display: none;"':''; ?>><?php _e( 'Upload/Add Image', 'category-featured-image' ); ?></button>
						<button type="button" class="remove_image_button button" <?php echo (empty($image))?'style="display: none;"':''; ?>><?php _e( 'Remove Image', 'category-featured-image' ); ?></button>
					</div>
					<div id="author_custom_image" style="float: left; <?php echo (empty($image))?'display: none;':''; ?>"><img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" alt="Image"/></div>
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
								title: '<?php _e( 'Choose An Image', 'category-featured-image' ); ?>',
								button: {
									text: '<?php _e( 'Use This Image', 'category-featured-image' ); ?>'
								},
								multiple: false
							});
							file_frame.on( 'select', function() {
								var attachment           = file_frame.state().get( 'selection' ).first().toJSON();
								var attachment_thumbnail = attachment.sizes.full;
								$( '#author_custom_image_id' ).val( attachment.id );
								$( '#author_custom_image' ).show().find( 'img' ).attr( 'src', attachment_thumbnail.url );
								$( '.remove_image_button' ).show();
								$( '.upload_image_button' ).hide();
							});
							file_frame.open();
						});

						$( 'body' ).on( 'click', '.remove_image_button', function() {
							$( '#author_custom_image' ).hide().find( 'img' ).attr( 'src', '' );
							$( '#author_custom_image_id' ).val( '' );
							$( '.remove_image_button' ).hide();
							$( '.upload_image_button' ).show();
							return false;
						});
					});
				</script>
				<div style="clear:both;"></div>
			</td>
		</tr>
    </table>
    <?php
}
add_action('personal_options_update','save_custom_user_meta');
add_action('edit_user_profile_update','save_custom_user_meta');
function save_custom_user_meta( $user_id ) {
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
	$breed_image = (isset($_POST['author_custom_image_id'])?$_POST['author_custom_image_id']:'');
	update_user_meta( $user_id, 'author_custom_image_id', $breed_image);
    return update_user_meta($user_id,'contribution',$_POST['contribution']);
}



//---------------------------------------------Add Quotation
add_filter( 'user_contactmethods', 'quotation' );
function quotation( $quotation ) {
	$quotation['quotation']   = __( 'Quotation'   );
	return $quotation;
}