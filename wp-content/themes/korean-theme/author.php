<?php get_header();

$author_id = get_queried_object_id();
$display_name = get_the_author_meta('display_name', $author_id);
$author_desc = get_the_author_meta('description', $author_id);
$page_count = $GLOBALS['wp_query']->max_num_pages;
$post_count = $GLOBALS['wp_query']->found_posts;
$post_per_page = get_option('posts_per_page'); 




$facebook = get_the_author_meta('facebook', $author_id);
$twitter = get_the_author_meta('twitter', $author_id);
$linkedin = get_the_author_meta('linkedin', $author_id);
$instagram = get_the_author_meta('instagram', $author_id);
?>

<style>
    body::-webkit-scrollbar-thumb
    {
        background-color: #FF2451;
    }
    
    
    
    
    .author-card-social-icon {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #f3f4f6;
  color: #555;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.author-card-social-icon:hover {
  color: #fff;
  transform: translateY(-2px);
  box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

/* Platform-specific hover colors */
.author-card-social-icon[aria-label="Facebook"]:hover { background-color: #1877F2; }
.author-card-social-icon[aria-label="Twitter / X"]:hover { background-color: #000; }
.author-card-social-icon[aria-label="Instagram"]:hover { background: linear-gradient(45deg, #f58529, #dd2a7b, #8134af); }
.author-card-social-icon[aria-label="LinkedIn"]:hover { background-color: #0A66C2; }

</style>

<section class="author-banner bg-[#FFFFFF]">
    <div class="container mx-auto">
        <div class="wrapper">
            <div class="author-wrapper">
                <figure class="aspect-square relative flex">
                     <img class="author-image" src="<?php echo esc_url( get_avatar_url( $author_id ) ); ?>" alt="<?php echo $display_name; ?>-img">
                </figure>
                <div class=" flex flex-col justify-center">
                    <h1 class="author-title capitalize">
                        <?php echo $display_name; ?>
                    </h1>
                    <p class="author-cat capitalize">
                        <?php echo get_the_author_meta('designation', $author_id); ?>
                    </p>
                </div>
            </div>
            <?php if(!empty($author_desc)) { ?>
                <p class="category-text mt-[20px]"><?php echo strip_tags($author_desc); ?></p>
            <?php } ?>
            
            
            
            
             <?php if (
                                (!empty($facebook) && filter_var($facebook, FILTER_VALIDATE_URL) !== false) ||
                                (!empty($twitter) && filter_var($twitter, FILTER_VALIDATE_URL) !== false) ||
                                (!empty($linkedin) && filter_var($linkedin, FILTER_VALIDATE_URL) !== false) ||
                                (!empty($instagram) && filter_var($instagram, FILTER_VALIDATE_URL) !== false)
                            ) : ?>
                                <div class="author-page-author-card-social-icon-wrapper flex gap-3 mt-3">
                                    <?php if (!empty($facebook) && filter_var($facebook, FILTER_VALIDATE_URL) !== false) : ?>
                                        <a class="author-card-social-icon hover:text-[#6FBB23]" href="<?php echo $facebook; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="Facebook">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35C.593 0 0 .594 0 1.326v21.348C0 23.407.593 24 1.325 
                                            24h11.495v-9.294H9.692V11.01h3.128V8.414c0-3.1 1.894-4.788 4.659-4.788 
                                            1.325 0 2.466.099 2.798.143v3.24l-1.921.001c-1.507 
                                            0-1.799.717-1.799 1.768v2.322h3.587l-.467 
                                            3.696h-3.12V24h6.116C23.406 24 24 23.407 
                                            24 22.674V1.326C24 .594 23.406 0 22.675 0z"/></svg>
                                        </a>
                                    <?php endif; ?>
                            
                                    <?php if (!empty($twitter) && filter_var($twitter, FILTER_VALIDATE_URL) !== false) : ?>
                                        <a class="author-card-social-icon hover:text-[#6FBB23]" href="<?php echo $twitter; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="Twitter / X">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 
                                            8.502 11.24H16.17l-5.017-6.546L5.38 21.75H2.07l7.732-8.839L1.667 
                                            2.25H7.98l4.518 5.987L18.244 2.25zM17.106 19.53h1.833L7.982 
                                            4.362H6.01l11.096 15.168z"/></svg>
                                        </a>
                                    <?php endif; ?>
                            
                                    <?php if (!empty($instagram) && filter_var($instagram, FILTER_VALIDATE_URL) !== false) : ?>
                                        <a class="author-card-social-icon hover:text-[#6FBB23]" href="<?php echo $instagram; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="Instagram">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M7.75 2h8.5A5.75 5.75 0 0 
                                            1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 
                                            1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2zm0 1.5A4.25 4.25 0 0 
                                            0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5A4.25 4.25 0 0 
                                            0 20.5 16.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5zm4.25 3a5.75 
                                            5.75 0 1 1 0 11.5 5.75 5.75 0 0 1 0-11.5zm0 1.5a4.25 4.25 0 1 
                                            0 0 8.5 4.25 4.25 0 0 0 0-8.5zm5.5-.75a.75.75 0 1 
                                            1 0 1.5.75.75 0 0 1 0-1.5z"/></svg>
                                        </a>
                                    <?php endif; ?>
                            
                                    <?php if (!empty($linkedin) && filter_var($linkedin, FILTER_VALIDATE_URL) !== false) : ?>
                                        <a class="author-card-social-icon hover:text-[#6FBB23]" href="<?php echo $linkedin; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="LinkedIn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M4.983 3.5C4.983 
                                            4.88 3.88 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.483 
                                            1.12 2.483 2.5zM.258 23.5h4.484V7.981H.258V23.5zM7.471 
                                            7.981H11.8v2.104h.062c.604-1.145 2.08-2.352 
                                            4.283-2.352 4.577 0 5.424 3.013 5.424 
                                            6.932v8.835h-4.48v-7.829c0-1.867-.034-4.266-2.601-4.266-2.606 
                                            0-3.005 2.037-3.005 4.135v7.96H7.47V7.981z"/></svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
            
            
        </div>
    </div>
</section>
<section class="inner-sec pt-[44px] pb-[32px] md:pb-[72px] lg:pb-[calc(132px)]">
    <div class="container mx-auto">
        <div class="inner-wrapper">
            <div class="w-full ">
                <?php if (have_posts()) : ?>
                    <div id="load_more_div" class="author-grid-wrapper">
                        <?php while (have_posts()) : the_post();
                            get_template_part('template-parts/default', 'card', array( 'hex_color' => null ));
                        endwhile; ?>
                    </div>
                    <?php if(!($post_count <= $post_per_page)): ?>
                        <div class="button-wrapper ">
                            <button class="view-more bg-social" data-page="<?php echo $page_count; ?>" data-user_id="<?php echo $author_id; ?>" id="load_more" aria-label="More Post">
                                VIEW MORE
                            </button>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="internal-p pt-[30px]">Sorry, but "<capital class="uppercase"><?php echo $display_name; ?></capital>" has not published any article.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>