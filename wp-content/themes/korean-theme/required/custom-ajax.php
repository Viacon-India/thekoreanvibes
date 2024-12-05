<?php
//AJAX Live Search
add_action( 'wp_footer', 'all_javascript' );
function all_javascript() { ?>
	<script>
		jQuery(document).ready(function($) {
//--------------------------------------------------------------------------------------------load_more
			var page = 2;
			jQuery('#load_more').click(function(){
				var orderby = 'date';
				var page_type = 'archive';
				var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
				var card_index = jQuery('#load_more_div').children('div').last().data('card_index');
				var page_count = jQuery('#load_more').data('page_count');
				var cat_id = jQuery('#load_more').data('cat_id');
				var tag_id = jQuery('#load_more').data('tag_id');
				var user_id = jQuery('#load_more').data('user_id');
				var meta_key = jQuery('#load_more').data('meta_key');
				var paging = jQuery('#load_more').data('paged');
				if(user_id != undefined){ var page_type = 'author'; }
				if(meta_key){ var orderby = 'meta_value_num'; }
				if(page <= paging){ page = paging + 1; }
				var data = {'action': 'load_more_blog',
							'card_index': card_index,
							'page': page,
							'cat_id' : cat_id,
							'tag_id' : tag_id,
							'user_id' : user_id,
							'orderby' : orderby,
							'page_type': page_type };
				jQuery.post(ajaxurl, data, function(response) {
					jQuery('#load_more_div').append(response);
					var url = window.location.href;
					if (url.includes('page/')) {
						var prev_text = url.split('page/')[0];
						var split_text_1 = url.split('page/')[1];
						var next_text = split_text_1.split('/')[1];
						var current_page = split_text_1.split('/')[0];
						page = parseInt(current_page) + 1;
						window.history.replaceState('URL', 'Title', prev_text+'page/'+page+'/'+next_text); 
					}else{
						if(url.includes('?')){
							var variables = url.split('?')[1];
							window.history.replaceState('URL', 'Title', 'page/'+page+'/?'+variables); 
						}else{
							window.history.replaceState('URL', 'Title', 'page/'+page+'/'); 
						}
					}
					if(page_count <= page){
						jQuery('#load_more').hide().after('<span class="flex justify-center view-more-btn cursor-default condition-msg">No More Articles</span>');
					}else{
						jQuery('#load_more').parent().show();
						jQuery('#load_more').show().siblings('span.condition-msg').remove();
					}
					page = page + 1;
				});
			});
			var currentscrollHeight = 0;
			$(window).on("scroll", function() {
				const scrollHeight = $(document).height();
				const scrollPos = Math.floor($(window).height() + $(window).scrollTop());
				const isBottom = scrollHeight - 1000 < scrollPos;
				if (isBottom && currentscrollHeight < scrollHeight) {
					var page_count = jQuery('#load_more').data('page_count');
					var search = jQuery('#load_more').data('search');
					if (page_count != null && search != undefined) {
						var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
						var paging = jQuery('#load_more').data('paged');
						var page_type = 'search';
						if(page <= paging){
							page = paging + 1;
						}
						alert(page_type);
						var data = {
							'action': 'load_more_blog',
							'search': search,
							'page': page,
							'page_type': page_type
						};
						jQuery.post(ajaxurl, data, function(response) {
							jQuery('#load_more_div').append(response);
							var url = window.location.href;
							if (url.includes('page/')) {
								var prev_text = url.split('page/')[0];
								var split_text_1 = url.split('page/')[1];
								var next_text = split_text_1.split('/')[1];
								var current_page = split_text_1.split('/')[0];
								page = parseInt(current_page) + 1;
								window.history.replaceState('URL', 'Title', prev_text+'page/'+page+'/'+next_text); 
							}else{
								if(url.includes('?')){
									var variables = url.split('?')[1];
									window.history.replaceState('URL', 'Title', 'page/'+page+'/?'+variables); 
								}else{
									window.history.replaceState('URL', 'Title', 'page/'+page+'/'); 
								}
							}
							page = page + 1;
						});
					}
					currentscrollHeight = scrollHeight;
				}
			});
//--------------------------------------------------------------------------------------------load_more_comments
			$('body').on('click', 'button.show-comment', function(){
				var comment_id = jQuery(this).data('comment_id');
				var post_id = jQuery(this).data('post_id');
				jQuery.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: { action: 'load_more_comments', comment_id: comment_id, post_id: post_id},
					success: function(data) {
						$('#load_button_'+comment_id).remove();
						$('#load_child_'+comment_id).empty().html( data );
					}
				});
			});
		});
	</script>
<?php }

//---------------------------------------------load_more_comments Function
add_action('wp_ajax_load_more_comments', 'load_more_comments');
add_action('wp_ajax_nopriv_load_more_comments', 'load_more_comments');
function load_more_comments(){	
	$comment_id = $_GET['comment_id'];
	$post_id = $_GET['post_id'];
    $comments = get_comments(array('parent' => $comment_id,
									'hierarchical' => 'threaded',
									'status' => 'approve',
									'orderby' => 'date',
									'order' => 'ASC' ));
	if(!empty($comments) && !empty($comment_id)) :
		foreach ( $comments as $comment ) :
			$comment_number = get_comments(array('parent' => $comment->comment_ID,
												'hierarchical' => 'threaded',
												'count' => true,
												'status' => 'approve',
												'orderby' => 'date',
												'order' => 'ASC' )); ?>
			<div class="replay-card-replay" id="comment-<?php echo $comment->comment_ID; ?>">
				<div class="replay-card-user-wrapper">
					<figure class="replay-c-u-w-figure">
						<img class="img-responsive" src="<?php echo get_avatar_url($comment->user_id); ?>" alt="Author comment Image">
					</figure>
					<div class="replay-card-user-content">
						<h2 class=" replay-user-name"><?php echo $comment->comment_author; ?></h2>
						<div class="replay-date-with-edit-wrapper">
							<span class="replay-date-with-edit"><?php echo get_comment_date('j F Y \a\t g:i A', $comment) ?></span>
							<?php if (is_user_logged_in()) echo '<span class="replay-date-with-edit-line">|</span><a href="' . get_edit_comment_link($comment->comment_ID) . '" class="replay-date-with-edit underline">Edit</a>'; ?>
						</div>
					</div>
				</div>
				<p class="replay-card-massage"><?php echo $comment->comment_content; ?></p>
				<div class="replay-card-button-wrapper">
					<a class="replay-card-common-button" rel="nofollow" href="<?php echo get_permalink($post_id); ?>/?replytocom=<?php echo $comment->comment_ID; ?>#respond" data-commentid="<?php echo $comment->comment_ID; ?>" data-postid="<?php echo $post_id; ?>" data-belowelement="div-comment-<?php echo $comment->comment_ID; ?>" data-respondelement="respond" data-replyto="Reply to <?php echo $comment->comment_author; ?>" aria-label="Reply to <?php echo $comment->comment_author; ?>">Reply</a>
					<?php $comment_reply_txt = (!empty($comment_number) && $comment_number >= 2)?'View Replies':'View Reply';
					echo (!empty($comment_number)) ? '<span class="replay-card-common-line">|</span><button id="load_button_' . $comment->comment_ID . '" class="replay-card-common-button show-comment" data-comment_id="' . $comment->comment_ID . '" data-post_id="' . $post_id . '">' . $comment_reply_txt . '</button>' : ''; ?>
				</div>
				<?php echo (!empty($comment_number)) ? '<div id="load_child_' . $comment->comment_ID . '"></div>' : ''; ?>
			</div>
		<?php endforeach;
	endif;
	wp_reset_postdata();
    wp_die();
}
//---------------------------------------------load_more_blog Function
add_action('wp_ajax_load_more_blog', 'load_more_blog');
add_action('wp_ajax_nopriv_load_more_blog', 'load_more_blog');
function load_more_blog(){
	$page_type = $_POST['page_type'];
	$a = $_POST['card_index']+1;
	$post_per_page = get_option('posts_per_page');
    $the_query = new WP_Query(array('post_type'		=> 'post',
									'post_status'	=> 'publish',
									'orderby'		=> $_POST['orderby'],
									'order'			=> 'DESC',
									'paged'			=> $_POST['page'],
									'cat'			=> $_POST['cat_id'],
									'tag_id'		=> $_POST['tag_id'],
									'author'		=> $_POST['user_id'],
									's'				=> $_POST['search'] ));
	if($the_query->have_posts()) : 
        while ($the_query->have_posts()) : $the_query->the_post();
			if($page_type == 'search'){
				get_template_part('template-parts/search', 'card');
			}elseif($page_type == 'author'){
				if($a==5) $a=0;
				if($a==0 || $a==2) get_template_part('template-parts/author', 'card-s', array('card_index' => $a));
				if($a==1) get_template_part('template-parts/author', 'card-l', array('card_index' => $a));
				if($a==3) get_template_part('template-parts/author', 'card-xl', array('card_index' => $a));
				if($a==4) get_template_part('template-parts/author', 'card-m', array('card_index' => $a));
				$a++;
			}else{
				if($a==3) $a=0;
				if($a==0) get_template_part('template-parts/listing', 'card-m', array('card_index' => $a));
				if($a==1) get_template_part('template-parts/listing', 'card-s', array('card_index' => $a));
				if($a==2) get_template_part('template-parts/listing', 'card-l', array('card_index' => $a));
				$a++;
			}
		endwhile;
	endif;

	if(!function_exists('img')) { ?>
		<script>alert('Remove alert from load_more_blog function');</script>
	<?php }else{
		img();
	}
	wp_reset_postdata();
    wp_die();
}