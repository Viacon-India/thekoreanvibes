<?php get_header();

$author_id = get_queried_object_id();
$display_name = get_the_author_meta('display_name', $author_id);
$author_desc = get_the_author_meta('description', $author_id);
$page_count = $GLOBALS['wp_query']->max_num_pages;
$post_count = $GLOBALS['wp_query']->found_posts;
$post_per_page = get_option('posts_per_page'); ?>

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