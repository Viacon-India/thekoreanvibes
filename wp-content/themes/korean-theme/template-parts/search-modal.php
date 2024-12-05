<section class="popup-wrap">
    <div class="popup-box">
        <div class="container mx-auto relative h-[-webkit-fill-available]">
            <div class="search-toggle-cut">
                <a class="close-btn popup-close" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="M3.22582 1.03356L11.0018 8.80956L18.7458 1.06556C19.0201 0.773722 19.4013 0.606202 19.8018 0.601562C20.6855 0.601562 21.4018 1.31788 21.4018 2.20156C21.4093 2.59804 21.253 2.98012 20.9698 3.25756L13.1458 11.0016L20.9698 18.8256C21.2335 19.0835 21.3882 19.4329 21.4018 19.8016C21.4018 20.6852 20.6855 21.4016 19.8018 21.4016C19.3895 21.4187 18.989 21.2619 18.6978 20.9696L11.0018 13.1936L3.24182 20.9536C2.9687 21.2356 2.5943 21.3969 2.20182 21.4016C1.31814 21.4016 0.601822 20.6852 0.601822 19.8016C0.594302 19.4051 0.750622 19.023 1.03382 18.7456L8.85782 11.0016L1.03382 3.17756C0.770142 2.91964 0.615422 2.5702 0.601822 2.20156C0.601822 1.31788 1.31814 0.601562 2.20182 0.601562C2.58646 0.606202 2.95398 0.761242 3.22582 1.03356Z" fill="#000"></path>
                    </svg>
                </a>
            </div>
            <div class="search-modal-main">
                <div class="search-modal-wrapper w-full">
                    <?php get_search_form(); ?>
                    <div class="items-center flex mt-4 md:mt-6 lg:mt-10 overflow-y-auto ">
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