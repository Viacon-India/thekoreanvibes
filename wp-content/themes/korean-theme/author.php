<?php get_header();

$author_id = get_queried_object_id();
$display_name = get_the_author_meta('display_name', $author_id);
$desc = get_the_author_meta('description', $author_id);
$designation = get_the_author_meta('designation', $author_id);
$total_post_count = $GLOBALS['wp_query']->found_posts;
$post_count = $GLOBALS['wp_query']->post_count;
$paged = get_query_var('paged');
$page_count = $GLOBALS['wp_query']->max_num_pages;
$post_per_page = get_option('posts_per_page');
$image_id = get_the_author_meta('author_custom_image_id', $author_id);
$image = (!empty($image_id))?wp_get_attachment_image_url( $image_id, 'author-thumbnail' ):get_avatar_url($author_id); ?>

<section class="author-banner bg-[#F3EDE9] sm:bg-transparent">
    <div class=" container mx-auto">
        <div class="author-card ">
            <div class="author-card-image-sec">
                <div class="block sm:hidden mb-[16px]">
                    <h1 class="author-title"><?php echo $display_name; ?></h1>
                    <?php echo (!empty($designation))?'<span class="author-designation">'.$designation.'</p>':''; ?>
                </div>
                <figure class="author-card-image-figure">
                    <img class="w-full h-full object-cover " src="<?php echo $image; ?>" alt="author-img" />
                </figure>
            </div>
            <div class="author-detail">
                <div class=" hidden sm:block">
                    <h1 class="author-title"><?php echo $display_name; ?></h1>
                    <?php echo (!empty($designation))?'<span class="author-designation">'.$designation.'</span>':''; ?>
                </div>
                <?php echo (!empty($desc))?'<p class="author-desc">'.$desc.'</p>':''; ?>
            </div>
        </div>
    </div>
</section>

<section class="author-card-sec">
    <div class="container mx-auto">
        <div class="author-page-title-wrapper">
            <h2 class="author-page-grid-title">The Latest</h2>
        </div>
        <?php if (have_posts()) : ?>
            <div id="load_more_div" class="trends-grid-container mt-[16px] sm:mt-[22px] md:mt-[28px] lg:mt-[30px] xl:mt-[32px] 2xl:mt-[34px] 3xl:mt-[36px] ">
                <?php $a = 0;
                while (have_posts()) : the_post();
                    if($a==0 || $a==2) get_template_part('template-parts/author', 'card-s', array('card_index' => $a));
                    if($a==1) get_template_part('template-parts/author', 'card-l', array('card_index' => $a));
                    if($a==3) get_template_part('template-parts/author', 'card-xl', array('card_index' => $a));
                    if($a==4) get_template_part('template-parts/author', 'card-m', array('card_index' => $a));
                    $a++;
                    if($a==5) $a=0;
                endwhile; ?>
            </div>
        <?php else : ?>
            <p class="condition-msg">Sorry, but "<capital class="uppercase"><?php echo $display_name; ?></capital>" has not published any articles.</p>
        <?php endif; ?>
    </div>
    <?php if(have_posts()) : ?>
        <?php if (!($total_post_count<= $post_per_page) && !($paged >= $page_count)) : ?>
            <div class="author-page-more-article">
                <button class="more-article-cta" data-paged="<?php echo $paged; ?>" data-page_count="<?php echo $page_count; ?>" data-user_id="<?php echo $author_id; ?>" id="load_more" aria-label="More Post">More Article</button>
                <div class="hidden">
                    <?php the_posts_pagination(array(
                        'mid_size' => 10,
                        'end_size'  => 10,
                        'total' => ceil($post_count / $post_per_page),
                        'prev_text' => '<<',
                        'next_text' => '>>'
                    )); ?>
                </div>
            </div>
        <?php else :?>
            <div class="author-page-more-article">
                <span class="flex justify-center more-article-cta cursor-default condition-msg">No More Articles</span>
            </div>
        <?php endif; ?>
    <?php else :?>
        <div class="author-page-more-article">
            <span class="flex justify-center more-article-cta cursor-default condition-msg">No Articles</span>
        </div>
    <?php endif; ?>   
</section>









<?php get_footer(); ?>