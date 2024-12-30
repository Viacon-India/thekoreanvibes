<?php get_header(); 

$archive_object = get_queried_object();
$desc = get_the_archive_description();
$page_count = $GLOBALS['wp_query']->max_num_pages;
$post_count = $GLOBALS['wp_query']->found_posts;
$post_per_page = get_option('posts_per_page');
$archive_query_var = $archive_object->query_var;
$tag_id = '';
$author_id = '';
$cat_id = '';
$archive_id = $archive_object->term_id;
if ( is_category() ) {
    $cat_id = $archive_id;
}
if ( is_tag() ) {
    $tag_id = $archive_id;
}
if (is_author()){
    $author_id = $archive_id;
} ?>

<section class="author-banner bg-[#FFFFFF]">
    <div class="container mx-auto">
        <div class="wrapper">
            <div class="author-wrapper">
                <div class=" flex flex-col justify-center">
                    <h1 class="category-title text-[#ED1B1B]">
                        <?php echo strip_tags(single_cat_title()); ?>
                    </h1>
                    <?php if (!empty($desc)) { ?>
                        <p class="category-text">
                            <?php echo strip_tags($desc); ?>
                        </p>
                    <?php } ?>                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="inner-sec pt-[44px] pb-[32px] md:pb-[72px] lg:pb-[calc(132px)]">
    <div class="container mx-auto">
        <div class="inner-wrapper">
            <div class="w-full ">
                <?php if (have_posts()) : ?>
                    <div id="load_more_div" class="grid-wrapper">
                        <?php while (have_posts()) : the_post();
                            get_template_part('template-parts/default', 'card', array( 'hex_color' => null ));
                        endwhile; ?>
                    </div>
                    <?php if(!($post_count <= $post_per_page)): ?>
                        <div class="button-wrapper ">
                            <button class="view-more bg-social" data-page="<?php echo $page_count; ?>" data-user_id="<?php echo $author_id; ?>" data-tag_id="<?php echo $tag_id; ?>" data-cat_id="<?php echo $cat_id; ?>" id="load_more" aria-label="More Post">
                                VIEW MORE
                            </button>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <p class="internal-p pt-[30px]">Sorry, but no post available with "<capital class="uppercase"><?php echo strip_tags(single_cat_title()); ?></capital>".</p>
                <?php endif; ?>
            </div>
            <?php get_sidebar('',array( 'hex_color' => null )); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
    var style = document.createElement('style');
    style.innerHTML = `
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(0deg, #FAC92C 0%, #EF3C23 20%);
        transition: background-color 0.3s ease; /* Smooth transition for color change */
    }
    `;
    document.head.appendChild(style);
    window.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY;
        const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercentage = (scrollPosition / totalHeight) * 100;
        let thumbColor;

        if (scrollPercentage <= 25) {
            const progress = 4 * scrollPercentage;
            // if(scrollPercentage <= 12.5) {
            //     thumbColor = `linear-gradient(180deg, #EF3C23 ${100-progress}%, #FAC92C 80%)`;
            // } else {
                thumbColor = `linear-gradient(0deg, #FAC92C ${progress}%, #EF3C23 ${20+progress}%)`;
            // }
        } else if (scrollPercentage <= 50) {
            const progress = ((25/6) * scrollPercentage ) - 108.33;
            // if(scrollPercentage <= 37.5) {
            //     thumbColor = `linear-gradient(180deg, #FAC92C ${100-progress}%, #2323FF ${progress}%)`;
            // } else {
            //     thumbColor = `linear-gradient(0deg, #2323FF ${progress}%, #FAC92C ${100-progress}%)`;
            // }
            thumbColor = `linear-gradient(0deg, #2323FF ${progress}%, #FAC92C ${30+progress}%)`;
        } else if (scrollPercentage <= 75) {
            const progress = (4.1667 * scrollPercentage) - 212.5;
            // if(scrollPercentage <= 62.5) {
            //     thumbColor = `linear-gradient(180deg, #2323FF ${100-progress}%, #FF13F0 ${progress}%)`;
            // } else {
            //     thumbColor = `linear-gradient(0deg, #FF13F0 ${progress}%, #2323FF ${100-progress}%)`;
            // }
            thumbColor = `linear-gradient(0deg, #FF13F0 ${progress}%, #2323FF ${30+progress}%)`;
        } else {
            const progress = (4.1667 * scrollPercentage) - 316.67;
            // if(scrollPercentage <= 87.5) {
            //     thumbColor = `linear-gradient(180deg, #FF13F0 ${100-progress}%, #23B829 ${progress}%)`;
            // } else {
            //     thumbColor = `linear-gradient(0deg, #23B829 ${progress}%, #FF13F0 ${100-progress}%)`;
            // }
            thumbColor = `linear-gradient(0deg, #23B829 ${progress}%, #FF13F0 ${30+progress}%)`;
        }
        style.innerHTML = `
        ::-webkit-scrollbar-thumb {
            background: ${thumbColor};
            transition: background-color 0.3s ease;
        }
        `;
    });
</script>