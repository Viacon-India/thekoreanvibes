<section class="popup-wrap">
    <div class="popup-box">
        <div class="container mx-auto relative h-[-webkit-fill-available]">
            <div class="search-modal-main">
                <?php get_search_form(); ?>
                <div class="search-modal-wrapper w-full">
                    <div class="mt-4 md:mt-6 lg:mt-10 overflow-y-auto h-[80vh]">
                        <div id="datafetch" class="modal-body">
                            <?php $the_query = new WP_Query( array('post_type' => 'post',
                                                                    'post_status' => 'publish',
                                                                    'posts_per_page' => 9,
                                                                    'order'   => 'DESC' ));

                            if ($the_query -> have_posts()) : ?>
                                <?php while ($the_query -> have_posts()) : $the_query -> the_post();
                                    get_template_part('template-parts/search', 'card');
                                endwhile;
                            endif; ?>
                        </div>
                        <div id="data_message" style="display: none;">
                            <p class="inner-detail">Sorry, but nothing matched your search "<span class="uppercase"></span>". Please try again with some different keywords.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>