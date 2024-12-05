<?php get_header(); ?>

<?php while (have_posts()) : the_post();
    $post_id = get_queried_object_id();
    $cat = get_the_category();
    $cat_id = (!empty($cat) && $cat[0]->term_id != 1) ? $cat[0]->term_id : '';
    $tags = get_the_tags();
    $author_id = get_the_author_meta('ID');
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_URL = get_author_posts_url($author_id);
    $author_desc = get_the_author_meta('description', $author_id);
    $trending_posts = get_posts(array(
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'posts_per_page'    => 5,
        'meta_key'          => 'post_views_count',
        'orderby'           => 'meta_value_num',
        'order'             => 'DESC'
    )); ?>

    <section class="single-page-banner">
        <div class=" container mx-auto">
            <div class="single-page-banner-inner">
                <div class="single-page-banner-content">
                    <div class="single-p-b-up-content">

                        <div class="breadcrumb-whapper">
                            <ul class="breadcrumb">
                                <li class="bread-list"><a href="<?php echo home_url(); ?>">Home</a></li>
                                <?php if (!empty($cat_id)) {
                                    $parent_id = $cat[0]->parent;
                                    $breadcrumb = '<li class="bread-list"><a href="' . get_category_link($cat_id) . '" title="' . $cat[0]->cat_name . '">' . $cat[0]->cat_name . '</a></li>';
                                    while ($parent_id > 0) {
                                        $parent_cat = get_category($parent_id);
                                        $breadcrumb = '<li class="bread-list"><a href="' . get_category_link($parent_id) . '" title="' . $parent_cat->name . '">' . $parent_cat->name . '</a></li>' . $breadcrumb;
                                        $parent_id = $parent_cat->parent;
                                    }
                                    echo $breadcrumb;
                                } ?>
                            </ul>
                        </div>

                        <h2 class="single-page-title"><?php echo the_title_attribute('echo=0'); ?></h2>
                        <p class="single-page-short-dcs">
                            the secret? working out LESS
                        </p>
                    </div>
                    <div class="single-p-b-down-content">

                        <?php $published_date = get_the_date('F j, Y');
                        $modified_date = get_the_modified_time('F j, Y'); ?>

                        <p class="single-page-post-date">
                            <?php if ($published_date == $modified_date) { ?>
                                <?php echo $published_date; ?>
                            <?php } ?>


                            <?php if ($published_date != $modified_date) { ?>

                                <span class=" flex gap-[10px] flex-wrap ">
                                    <span class="">
                                        <?php echo $published_date; ?>
                                    </span>

                                    <span>
                                        &#9679;
                                    </span>

                                    <span class="">
                                        Last Updated on: <?php echo $modified_date; ?>
                                    </span>
                                </span>

                            <?php } ?>



                        </p>


                        <div>
                            <span class="single-page-banner-author-name-define">
                                Written by
                            </span>&nbsp;

                            <a href="<?php echo $author_URL; ?>" class="single-page-banner-author-name">
                                <?php echo $author_name; ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="single-page-banner-image-sec">
                    <div class="single-page-banner-img-card">
                        <figure class="export-img-card-wrapper">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php echo get_the_post_thumbnail($post_id, 'single-thumbnail', array('class' => 'img-responsive')); ?>
                            <?php else : ?>
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/expert.jpg" alt="inner-img">
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="single-page-content">
        <div class="container mx-auto">
            <div class="single-page-content-wrapper">
                <?php get_sidebar(); ?>
                <div class="single-page-content-sec">
                    <?php the_content(); ?>

                    <?php if ($tags) { ?>
                        <div class="tag-sec">
                            <h3 class="tag-title">Tags</h3>
                            <div class="flex gap-4 flex-wrap">
                                <?php foreach ($tags as $tag) { ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="tag-list" rel="tags"><?php echo $tag->name; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="share-sec">
                        <h1 class="share-title">Share This Article: </h1>
                        <div class="w-full mt-3 xl:mt-4 flex items-center border border-[#101010]">
                            <button class="share-sec-icon share-social group" data-link="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post_id); ?>">
                                <svg class="group-hover:fill-[#FFFFFF]" xmlns="http://www.w3.org/2000/svg" fill="#232323" viewBox="0 0 24 24" width="21" height="20">
                                    <path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"></path>
                                </svg>
                            </button>
                            <button class="share-sec-icon share-social group" data-link="http://twitter.com/intent/tweet?text=<?php echo strip_tags(the_title_attribute()); ?>&url=<?php echo get_permalink($post_id); ?>">
                                <svg class="group-hover:fill-[#FFFFFF]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#232323">
                                    <path d="M13.6468 10.4686L20.9321 2H19.2057L12.8799 9.3532L7.82741 2H2L9.6403 13.1193L2 22H3.72649L10.4068 14.2348L15.7425 22H21.5699L13.6464 10.4686H13.6468ZM11.2821 13.2173L10.508 12.1101L4.34857 3.29967H7.00037L11.9711 10.4099L12.7452 11.5172L19.2066 20.7594H16.5548L11.2821 13.2177V13.2173Z" fill=""></path>
                                </svg>
                            </button>
                            <button class="share-sec-icon share-social group" data-link="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink($post_id); ?>&title=<?php echo strip_tags(the_title_attribute()); ?>">
                                <svg class="group-hover:fill-[#FFFFFF]" width="18" height="18" viewBox="0 0 16 16" fill="#232323" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 16H12.8V10.4008C12.8 8.86478 12.1224 8.00781 10.9072 8.00781C9.5848 8.00781 8.8 8.90078 8.8 10.4008V16H5.6V5.6H8.8V6.76953C8.8 6.76953 9.80399 5.00781 12.0664 5.00781C14.3296 5.00781 16 6.38888 16 9.24648V16ZM1.9536 3.93672C0.874401 3.93672 0 3.05517 0 1.96797C0 0.881569 0.874401 0 1.9536 0C3.032 0 3.9064 0.881569 3.9064 1.96797C3.9072 3.05517 3.032 3.93672 1.9536 3.93672ZM0 16H4V5.6H0V16Z" fill=""></path>
                                </svg>
                            </button>
                            <button class="share-sec-icon share-more group" data-post_title="<?php echo the_title_attribute('echo=0'); ?>" data-post_text="post to <?php echo the_title_attribute('echo=0'); ?>" data-post_url="<?php echo get_permalink($post_id); ?>">
                                <svg class="group-hover:fill-[#FFFFFF]" width="19" height="20" viewBox="0 0 19 20" fill="#232323" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.5759 15.2714L6.46576 12.484C5.83312 13.112 4.96187 13.5 4 13.5C2.067 13.5 0.5 11.933 0.5 10C0.5 8.067 2.067 6.5 4 6.5C4.96181 6.5 5.83301 6.88796 6.46564 7.51593L11.5759 4.72855C11.5262 4.49354 11.5 4.24983 11.5 4C11.5 2.067 13.067 0.5 15 0.5C16.933 0.5 18.5 2.067 18.5 4C18.5 5.933 16.933 7.5 15 7.5C14.0381 7.5 13.1669 7.11201 12.5343 6.48399L7.42404 9.2713C7.47382 9.5064 7.5 9.7501 7.5 10C7.5 10.2498 7.47383 10.4935 7.42408 10.7285L12.5343 13.516C13.167 12.888 14.0382 12.5 15 12.5C16.933 12.5 18.5 14.067 18.5 16C18.5 17.933 16.933 19.5 15 19.5C13.067 19.5 11.5 17.933 11.5 16C11.5 15.7502 11.5262 15.5064 11.5759 15.2714Z" fill=""></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="single-author-sec">
                        <div class="single-author-card">
                            <figure class="single-author-card-figure">
                                <img class="single-author-card-img" src="<?php echo get_avatar_url($author_id); ?>" alt=" single page author card  image  ">
                            </figure>
                            <div class="author-card-content">
                                <h2 class="single-author-card-title"><a href="<?php echo $author_URL; ?>"><?php echo $author_name; ?></a></h2>
                                <?php if (!empty($author_desc)) echo '<p class="single-author-card-dsc">' . strip_tags($author_desc) . '</p>'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="comment-from-sec"><?php comment_form(); ?></div>
                    <?php $parent_comments = get_comments(array(
                        'post_id' => $post_id,
                        'status' => 'approve',
                        'hierarchical' => 'threaded',
                        'orderby' => 'date',
                        'order' => 'ASC'
                    ));
                    if (!empty($parent_comments)) : ?>
                        <div class="all-comment-sec">
                            <h2 class="all-comment-title">
                                All Comments
                            </h2>
                            <div class="replay-card-inner">
                                <?php foreach ($parent_comments as $parent_comment) : ?>
                                    <div class="replay-card" id="comment-<?php echo $parent_comment->comment_ID; ?>">
                                        <div class="replay-card-user-wrapper">
                                            <figure class="replay-c-u-w-figure">
                                                <img class="img-responsive" src="<?php echo get_avatar_url($parent_comment->user_id); ?>" alt="Author comment Image">
                                            </figure>
                                            <div class="replay-card-user-content">
                                                <h2 class=" replay-user-name"><?php echo $parent_comment->comment_author; ?></h2>
                                                <div class="replay-date-with-edit-wrapper">
                                                    <span class="replay-date-with-edit"><?php echo get_comment_date('j F Y \a\t g:i A', $parent_comment) ?></span>
                                                    <?php if (is_user_logged_in()) echo '<span class="replay-date-with-edit-line">|</span>&nbsp;<a href="' . get_edit_comment_link($parent_comment->comment_ID) . '" class="replay-date-with-edit underline">Edit</a>'; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="replay-card-massage"><?php echo $parent_comment->comment_content; ?></p>
                                        <div class="replay-card-button-wrapper">
                                            <a class="replay-card-common-button" rel="nofollow" href="<?php echo get_permalink($post_id); ?>/?replytocom=<?php echo $parent_comment->comment_ID; ?>#respond" data-commentid="<?php echo $parent_comment->comment_ID; ?>" data-postid="<?php echo $post_id; ?>" data-belowelement="div-comment-<?php echo $parent_comment->comment_ID; ?>" data-respondelement="respond" data-replyto="Reply to <?php echo $parent_comment->comment_author; ?>" aria-label="Reply to <?php echo $parent_comment->comment_author; ?>">Reply</a>
                                        </div>
                                        <?php $child_comments = get_comments(array(
                                            'parent' => $parent_comment->comment_ID,
                                            'hierarchical' => 'threaded',
                                            'status' => 'approve',
                                            'orderby' => 'date',
                                            'order' => 'ASC'
                                        ));
                                        if (!empty($child_comments)) :
                                            foreach ($child_comments as $child_comment) :
                                                $comment_number = get_comments(array(
                                                    'parent' => $child_comment->comment_ID,
                                                    'hierarchical' => 'threaded',
                                                    'count' => true,
                                                    'status' => 'approve',
                                                    'orderby' => 'date',
                                                    'order' => 'ASC'
                                                )); ?>

                                                <div class="replay-card-replay" id="comment-<?php echo $child_comment->comment_ID; ?>">
                                                    <div class="replay-card-user-wrapper">
                                                        <figure class="replay-c-u-w-figure">
                                                            <img class="img-responsive" src="<?php echo get_avatar_url($child_comment->user_id); ?>" alt="Author comment Image">
                                                        </figure>
                                                        <div class="replay-card-user-content">
                                                            <h2 class=" replay-user-name"><?php echo $child_comment->comment_author; ?></h2>
                                                            <div class="replay-date-with-edit-wrapper">
                                                                <span class="replay-date-with-edit"><?php echo get_comment_date('j F Y \a\t g:i A', $child_comment) ?></span>
                                                                <?php if (is_user_logged_in()) echo '<span class="replay-date-with-edit-line">|</span><a href="' . get_edit_comment_link($child_comment->comment_ID) . '" class="replay-date-with-edit underline">Edit</a>'; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="replay-card-massage"><?php echo $child_comment->comment_content; ?></p>
                                                    <div class="replay-card-button-wrapper">
                                                        <a class="replay-card-common-button" rel="nofollow" href="<?php echo get_permalink($post_id); ?>/?replytocom=<?php echo $child_comment->comment_ID; ?>#respond" data-commentid="<?php echo $child_comment->comment_ID; ?>" data-postid="<?php echo $post_id; ?>" data-belowelement="div-comment-<?php echo $child_comment->comment_ID; ?>" data-respondelement="respond" data-replyto="Reply to <?php echo $child_comment->comment_author; ?>" aria-label="Reply to <?php echo $child_comment->comment_author; ?>">Reply</a>
                                                        <?php $comment_reply_txt = (!empty($comment_number) && $comment_number >= 2) ? 'View Replies' : 'View Reply';
                                                        echo (!empty($comment_number)) ? '<span class="replay-card-common-line">|</span><button id="load_button_' . $child_comment->comment_ID . '" class="replay-card-common-button show-comment" data-comment_id="' . $child_comment->comment_ID . '" data-post_id="' . $post_id . '">' . $comment_reply_txt . '</button>' : ''; ?>
                                                    </div>
                                                    <?php echo (!empty($comment_number)) ? '<div id="load_child_' . $child_comment->comment_ID . '"></div>' : ''; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($trending_posts)) : ?>
        <section class="single-page-trends-sec">
            <div class="container mx-auto">
                <div class="single-page-trends-sec-title-wrapper">
                    <h2 class="single-page-trends-sec-title ">
                        Trends we’re loveing rn
                    </h2>
                </div>
                <div class="trends-grid-container">
                    <?php $a = 0;
                    foreach ($trending_posts as $post) :
                        setup_postdata($post);
                        if ($a == 0 || $a == 2) get_template_part('template-parts/author', 'card-s', array('card_index' => $a));
                        if ($a == 1) get_template_part('template-parts/author', 'card-l', array('card_index' => $a));
                        if ($a == 3) get_template_part('template-parts/author', 'card-xl', array('card_index' => $a));
                        if ($a == 4) get_template_part('template-parts/author', 'card-m', array('card_index' => $a));
                        $a++;
                    endforeach;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>