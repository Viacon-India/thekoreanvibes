<?php
//AJAX Live Search
add_action( 'wp_footer', 'all_javascript' );
function all_javascript() { ?>
	<script>
		jQuery(document).ready(function($) {
//--------------------------------------------------------------------------------------------search_fetch And search_suggestion
			jQuery('#default-search').on('input', function(){
				var search = jQuery('#default-search').val();
				jQuery.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					type: 'post',
					data: { action: 'search_fetch', keyword: search },
					beforeSend: function(){
						$('#datafetch .modal-card').each(function() {
							$(this).find('figure').height($(this).find('figure img').height()).width($(this).find('figure img').width()).empty().addClass("data-loading");
							$(this).find('.modal-detail').height($(this).find('.modal-detail').height()).width($(this).find('.modal-detail').width()).empty().addClass("data-loading");
						});
					},
					success: function(data) {
						jQuery('#datafetch').empty().html( data );
					}
				});
				jQuery.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					type: 'post',
					data: { action: 'search_suggestion', keyword: search },
					beforeSend: function(){
						$('#suggestions button.tag-list').each(function() {
							$(this).height($(this).height()).width($(this).width()).empty().addClass("data-loading");
						});
						if(search){
							$('#suggestions').prev().empty().html('Topics matching '+search);
						}else{
							$('#suggestions').prev().empty().html('Please Search Something');
						}
					},
					success: function(data) {
						jQuery('#suggestions').empty().html( data );
					}
				});
			});
//--------------------------------------------------------------------------------------------load_more
			var page = 2;
			var currentscrollHeight = 0;
			$(window).on("scroll", function() {
				const scrollHeight = $(document).height();
				const scrollPos = Math.floor($(window).height() + $(window).scrollTop());
				const isBottom = scrollHeight - 1000 < scrollPos;
				if (isBottom && currentscrollHeight < scrollHeight) {
					var page_count = jQuery('#load_more').data('page_count');
					if (page_count != null) {
						var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
						var post_type = jQuery('#load_more').data('post_type');
						var cat_id = jQuery('#load_more').data('cat_id');
						var tag_id = jQuery('#load_more').data('tag_id');
						var user_id = jQuery('#load_more').data('user_id');
						var search = jQuery('#load_more').data('search');
						var orderby = 'date';
						if(search){
							var orderby = '';
						}
						var paging = jQuery('#load_more').data('paged');
						if(page <= paging){
							page = paging + 1;
						}
						var data = {
							'action': 'load_more_blog',
							'post_type': post_type,
							'cat_id': cat_id,
							'tag_id': tag_id,
							'user_id': user_id,
							'search': search,
							'orderby': orderby,
							'page': page,
						};
						jQuery.post(ajaxurl, data, function(response){
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
							if (page_count <= page) {
								jQuery('#load_more').parent().empty().append('<span class="text-[20px] leading-8 mb-6">"You have come to end"</span>');
							}
							page = page + 1;
						});
					}
					currentscrollHeight = scrollHeight;
				}
			});
//--------------------------------------------------------------------------------------------load_more_comments
			$('body').on('click', 'span.show-comment', function(){
				var comment_id = jQuery(this).data('comment_id');
				var post_id = jQuery(this).data('post_id');
				jQuery.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: { action: 'load_more_comments', comment_id: comment_id, post_id: post_id},
					success: function(data) {
						$('#load_button_'+comment_id).remove();
						$('#load_child_'+comment_id).empty().html(data);
					}
				});
			});
//--------------------------------------------------------------------------------------------reaction_count
			jQuery('#like-btn').click(function(){
				var selected = $(this);
				var post_id = selected.data('post_id');
				var status = 'liked';
				if (selected.hasClass("liked")){
					var status = '';
				}
				jQuery.ajax({
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: { action: 'reaction_count', status: status, post_id: post_id},
					success: function(data) {
						selected.toggleClass("liked");
						$('#like-num').empty().html(data);
					},				
				});
			});
		});
	</script>
<?php }