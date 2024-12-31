<?php get_header();

$cat1_slug = get_option('category_1');
$cat2_slug = get_option('category_2');
$cat3_slug = get_option('category_3');
$cat4_slug = get_option('category_4');
$cat5_slug = get_option('category_5');

$cat1_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat1_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 5
));

$cat2_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat2_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 7
));

$cat3_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat3_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 5
));

$cat4_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat4_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 5
));

$cat5_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat5_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 7
));

?>


<section class="about-us-sec overflow-hidden">
    <span class="about-us-sec-light-top"></span>
    <span class="about-us-sec-light-bottom"></span>
    <div class=" container mx-auto h-full  ">
        <div class="flex h-full flex-col md:flex-row z-1 gap-[50px] sm:gap-[60px] md:gap-[70px] lg:gap-0 pt-[70px] md:pt-0">
            <div class="w-full md:w-1/2 ">

                <div class="flex  flex-col justify-center h-full">
                    <span class="home-about-sm-title">
                        <svg class="home-about-sm-title-svg" width="18" height="20" viewBox="0 0 18 20" fill="#ED1B1B" xmlns="http://www.w3.org/2000/svg">
                            <line class="line01" x1="16.5219" y1="3.99585" x2="17.1433" y2="12.9744" stroke="#ED1B1B" stroke-width="1.25" />
                            <line class="line02" x1="0.256716" y1="15.7363" x2="8.51832" y2="19.3064" stroke="#ED1B1B" stroke-width="1.25" />
                            <line class="line03" x1="4.46074" y1="0.721134" x2="11.8435" y2="14.916" stroke="#ED1B1B" stroke-width="1.25" />
                        </svg>
                        About us
                    </span>

                    <h1 class="home-about-title">
                        THE KOREAN VIBES
                    </h1>

                    <div class="home-about-dsc-wrapper">
                        <p class="home-about-dsc">
                            Annyeong! The Korean Vibes is here- A Lifestyle Guide for all Hallyu fans. A vibrant guide to the latest in K-fashion, K-beauty, K-pop, Korean delicacies, and more at your fingertips. From K-pop chartbusters to the best Korean foods in your town, we’ve got you covered. What would you like to learn today?
                        </p>
                    </div>


                    <div class="counter-card-wrapper">
                        <div class="counter-card">
                            <span id="counter" class="counter">
                                0
                            </span>
                            <span class="counter">
                                +
                            </span>
                            <h2 class="counter-title">
                                Comparison Lists
                            </h2>
                        </div>
                        <span class="card-sap">

                        </span>
                        <div class="counter-card">
                            <span id="one" class="counter">
                                0
                            </span>
                            <span class="counter">
                                +
                            </span>

                            <h2 class="counter-title">
                                Hours of Research
                            </h2>
                        </div>
                        <span class="card-sap">

                        </span>
                        <div class="counter-card">
                            <span id="tow" class="counter">
                                0
                            </span>
                            <span class="counter">
                                K+
                            </span>
                            <h2 class="counter-title">
                                Happy Subscriber's
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" w-full md:w-1/2 relative slider-main-wrapper">
                <div class="main" style="opacity: 0;">
                    <div class="mainBoxes fs"></div>
                    <div class="mainClose">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" fill="none">
                            <circle cx="30" cy="30" r="30" fill="#000" opacity="0.4" />
                            <path d="M15,16L45,46 M45,16L15,46" stroke="#000" stroke-width="3.5" opacity="0.5" />
                            <path d="M15,15L45,45 M45,15L15,45" stroke="#fff" stroke-width="2" />
                        </svg>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<?php if ($cat1_posts->have_posts()) :
    $cat = get_category_by_slug($cat1_slug);
    $primary_color = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($primary_color) && $cat->parent) {
        $primary_color = get_term_meta($cat->parent, 'hex_code_1', true);
        if (empty($primary_color)) {
            $primary_color = '#FF2451';
        }
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#FF2451';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($gradient_color)) {
            $gradient_color = '#FF2451';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_5', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_5', true);
        if (empty($title_color)) {
            $title_color = '#FF2451';
        }
    } ?>
    <style>
        .business-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $primary_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $primary_color; ?> 100%);
        }
    </style>
    <section class="business-sec">
        <div class="container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $primary_color; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat1_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat1_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php while ($cat1_posts->have_posts()) : $cat1_posts->the_post();
                            get_template_part('template-parts/cat', 'style-one-card', array('hex_color' => $primary_color, 'bg_color' => $bg_color));
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $primary_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $gradient_color; ?>;">KOREAN VIBES</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat1_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat1_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat1_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat1_posts->have_posts()) : $best_cat1_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if ($cat2_posts->have_posts()) :
    $cat = get_category_by_slug($cat2_slug);
    $primary_color = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($primary_color) && $cat->parent) {
        $primary_color = get_term_meta($cat->parent, 'hex_code_1', true);
        if (empty($primary_color)) {
            $primary_color = '#FF2451';
        }
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#FF2451';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($gradient_color)) {
            $gradient_color = '#FF2451';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_5', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_5', true);
        if (empty($title_color)) {
            $title_color = '#FF2451';
        }
    } ?>
    <style>
        .lifestyle-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $primary_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $primary_color; ?> 100%);
        }
    </style>
    <section class="lifestyle-sec">
        <div class=" container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $primary_color; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat2_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat2_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php $loop1 = 0;
                        while ($cat2_posts->have_posts()) : $cat2_posts->the_post();
                            if ($loop1 == 0) {
                                echo get_template_part('template-parts/cat', 'style-two-hero-card', array('hex_color' => $primary_color)) . '<div class="flex flex-col md:flex-row px-[0px] md:px-[20px] py-0 md:py-[15px] md:border-b md:border-[#202020] md:gap-[32px] relative ">';
                            } else {
                                if ($loop1 % 2 == 0) {
                                    echo get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $primary_color)) . '<span class=" hidden md:flex h-[120px] w-[1px] bg-[#202020] absolute left-[50%] -translate-x-[50%] "></span></div>';
                                } else {
                                    echo ($loop1 != 1) ? '<div class="flex flex-col md:flex-row px-0 md:px-[20px] py-0 md:py-[15px] md:border-b border-[#202020] gap-[0px] md:gap-[32px] relative ">' : '';
                                    get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $primary_color));
                                }
                            }
                            $loop1++;
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $primary_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $gradient_color; ?>;">KOREAN VIBES</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat2_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat2_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat2_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat2_posts->have_posts()) : $best_cat2_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if ($cat3_posts->have_posts()) :
    $cat = get_category_by_slug($cat3_slug);
    $primary_color = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($primary_color) && $cat->parent) {
        $primary_color = get_term_meta($cat->parent, 'hex_code_1', true);
        if (empty($primary_color)) {
            $primary_color = '#FF2451';
        }
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#FF2451';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($gradient_color)) {
            $gradient_color = '#FF2451';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_5', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_5', true);
        if (empty($title_color)) {
            $title_color = '#FF2451';
        }
    } ?>

    <style>
        .social-media-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $primary_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $primary_color; ?> 100%);
        }
    </style>
    <section class="social-media-sec">
        <div class="container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $primary_color; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat3_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat3_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php while ($cat3_posts->have_posts()) : $cat3_posts->the_post();
                            get_template_part('template-parts/cat', 'style-one-card', array('hex_color' => $primary_color, 'bg_color' => $bg_color));
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $primary_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $gradient_color; ?>;">KOREAN VIBES</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat3_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat3_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat3_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat3_posts->have_posts()) : $best_cat3_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<section class="banner">
    <figure class="">
        <img class="w-fit h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/bannerimg.png" alt="" />
    </figure>
</section>


<?php if ($cat4_posts->have_posts()) :
    $cat = get_category_by_slug($cat4_slug);
    $primary_color = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($primary_color) && $cat->parent) {
        $primary_color = get_term_meta($cat->parent, 'hex_code_1', true);
        if (empty($primary_color)) {
            $primary_color = '#FF2451';
        }
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#FF2451';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($gradient_color)) {
            $gradient_color = '#FF2451';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_5', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_5', true);
        if (empty($title_color)) {
            $title_color = '#FF2451';
        }
    } ?>
    <style>
        .entertainment-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $primary_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $primary_color; ?> 100%);
        }
    </style>

    <section class="entertainment-sec">
        <div class=" container mx-auto ">
            <h2 class="h-sec-title" style="color:<?php echo $primary_color; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat4_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat4_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php while ($cat4_posts->have_posts()) : $cat4_posts->the_post();
                            get_template_part('template-parts/cat', 'style-one-card', array('hex_color' => $primary_color, 'bg_color' => $bg_color));
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $primary_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $gradient_color; ?>;">KOREAN VIBES</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat4_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat4_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat4_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat4_posts->have_posts()) : $best_cat4_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if ($cat5_posts->have_posts()) :
    $cat = get_category_by_slug($cat5_slug);
    $primary_color = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($primary_color) && $cat->parent) {
        $primary_color = get_term_meta($cat->parent, 'hex_code_1', true);
        if (empty($primary_color)) {
            $primary_color = '#FF2451';
        }
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#FF2451';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($gradient_color)) {
            $gradient_color = '#FF2451';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_5', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_5', true);
        if (empty($title_color)) {
            $title_color = '#FF2451';
        }
    } ?>
    <style>
        .health-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $primary_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $primary_color; ?> 100%);
        }
    </style>
    <section class="health-sec">
        <div class=" container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $primary_color; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat5_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat5_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php $loop2 = 0;
                        while ($cat5_posts->have_posts()) : $cat5_posts->the_post();
                            if ($loop2 == 0) {
                                echo get_template_part('template-parts/cat', 'style-two-hero-card', array('hex_color' => $primary_color)) . '<div class="flex flex-col md:flex-row md:px-[20px] md:py-[15px] md:border-b border-[#202020] md:gap-[32px] gap-0 relative ">';
                            } else {
                                if ($loop2 % 2 == 0) {
                                    echo get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $primary_color)) . '<span class=" hidden md:flex h-[120px] w-[1px] bg-[#202020] absolute left-[50%] -translate-x-[50%] "></span></div>';
                                } else {
                                    echo ($loop2 != 1) ? '<div class="flex flex-col md:flex-row px-0 md:px-[20px] py-0 md:py-[15px] md:border-b border-[#202020] gap-0 md:gap-[32px] relative ">' : '';
                                    get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $primary_color));
                                }
                            }
                            $loop2++;
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $primary_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $gradient_color; ?>;">KOREAN VIBES</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat5_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat5_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat5_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat5_posts->have_posts()) : $best_cat5_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


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