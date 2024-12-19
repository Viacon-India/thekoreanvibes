<?php
//---------------------------------------------search_fetch Function
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
	jQuery(document).ready(function ($) {
		jQuery('#data_message').hide();
	});
</script>
<?php while ($the_query -> have_posts()) : $the_query -> the_post();
			get_template_part('template-parts/search', 'card');
		endwhile; 
		wp_reset_postdata();
	else : ?>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		jQuery('#data_message').show();
	});
</script>
<?php endif;
	if(!function_exists('img')) { ?>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		alert('Remove alert from search_fetch function');
	});
</script>
<?php //}else{
		//img();
	}
	die();
}
//---------------------------------------------search_suggestion Function
add_action('wp_ajax_search_suggestion' , 'search_suggestion');
add_action('wp_ajax_nopriv_search_suggestion','search_suggestion');
function search_suggestion(){
	$typing = strtolower($_POST['keyword']);
	$word_length = (str_word_count($typing)<=2)?3:str_word_count($typing)+3;
	$list_posts = get_posts(array('posts_per_page' => 10, 's' => esc_attr($typing), 'order' => 'DESC', 'post_status' => 'publish', 'post_type' => 'post'));
	$list_titles = array();
	foreach( $list_posts as $post ) $list_titles[] = strtolower(implode(' ', array_slice(str_word_count(wp_strip_all_tags($post->post_title), 2), 0, $word_length)));
	foreach( $list_titles as $title ) echo (!empty($typing))?(!empty(str_contains($title, $typing)))?'<button class="tag-list">'.$title.'</button>':'':'<button class="tag-list">'.$title.'</button>';
	die();
}
//---------------------------------------------load_more_comments Function
add_action('wp_ajax_load_more_comments', 'load_more_comments');
add_action('wp_ajax_nopriv_load_more_comments', 'load_more_comments');
function load_more_comments(){
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
					<path
						d="M21.3164 13.4444C21.4971 13.6145 21.5996 13.8516 21.5996 14.0998C21.5996 14.348 21.4971 14.5851 21.3164 14.7552L16.2164 19.5552C15.8545 19.8959 15.2849 19.8786 14.9442 19.5166C14.6036 19.1547 14.6208 18.5851 14.9828 18.2444L18.4302 14.9998L6.29961 14.9998C4.14573 14.9998 2.39961 13.2537 2.39961 11.0998V5.6998C2.39961 5.20276 2.80257 4.7998 3.29961 4.7998C3.79665 4.7998 4.19961 5.20276 4.19961 5.6998V11.0998C4.19961 12.2596 5.13981 13.1998 6.29961 13.1998L18.4302 13.1998L14.9828 9.95512C14.6208 9.61456 14.6036 9.04492 14.9442 8.683C15.2849 8.32096 15.8545 8.3038 16.2164 8.64436L21.3164 13.4444Z"
						fill="#101010" />
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
						<a class="comment-card-user-reply mt-0" rel="nofollow"
							href="<?php echo get_permalink($post_id); ?>/?replytocom=<?php echo $comment->comment_ID; ?>#respond"
							data-commentid="<?php echo $comment->comment_ID; ?>" data-postid="<?php echo $post_id; ?>"
							data-belowelement="div-comment-<?php echo $comment->comment_ID; ?>" data-respondelement="respond"
							data-replyto="Reply to <?php echo $comment->comment_author; ?>"
							aria-label="Reply to <?php echo $comment->comment_author; ?>">Reply </a>
						<?php if (is_user_logged_in()) { ?>
						<a class="comment-card-user-reply mt-0"
							href="<?php echo get_edit_comment_link($comment->comment_ID); ?>">Edit</a>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php endforeach;
	endif;
	wp_reset_postdata();
	wp_die();
}



//---------------------------------------------load_more_blog Function
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
	<?php //} else {
		//img();
	}
	wp_reset_postdata();
	wp_die();
}



//---------------------------------------------reaction_count Function
add_action('wp_ajax_reaction_count', 'reaction_count');
add_action('wp_ajax_nopriv_reaction_count', 'reaction_count');
function reaction_count(){
	$status = $_GET['status'];
	$post_id = $_GET['post_id'];
	if(!empty($status) && $status == 'liked') $data = format_number(add_reaction_count($post_id));
	else $data = format_number(remove_reaction_count($post_id));
	echo $data;
    wp_die();
}