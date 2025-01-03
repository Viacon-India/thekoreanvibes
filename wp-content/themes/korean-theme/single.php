<?php get_header(); ?>

<?php while (have_posts()) : the_post();
    $post_id = get_queried_object_id();
    $cat = get_the_category();
    $cat_ID = $cat[0]->term_id;
    $parent_id = $cat[0]->parent;
    $cat_Name = $cat[0]->cat_name;
    $tags = get_the_tags();
    $author_id = get_the_author_meta('ID');
    $author_designation = get_the_author_meta('designation', $author_id);
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_URL = get_author_posts_url($author_id);
    $author_desc = get_the_author_meta('description', $author_id);
    $primary_color = get_term_meta($cat_ID, 'hex_code_1', true);
    if (empty($primary_color) && !empty($parent_id)) {
        $primary_color = get_term_meta($parent_id, 'hex_code_1', true);
    }
    $bg_color = get_term_meta($cat_ID, 'hex_code_2', true);
    if (empty($bg_color) && !empty($parent_id)) {
        $bg_color = get_term_meta($parent_id, 'hex_code_2', true);
    }
    $text_color = get_term_meta($cat_ID, 'hex_code_5', true);
    if (empty($text_color) && !empty($parent_id)) {
        $text_color = get_term_meta($parent_id, 'hex_code_5', true);
    } ?>

    <style>
        .toc-ul-li-active:before {
            background-color: <?php echo $primary_color; ?>;
        }

        .internal-content thead, .internal-content tfoot {
            background-color: <?php echo $primary_color; ?>;
            border-color: #ffffff;
            color: <?php echo $text_color; ?>;
        }

        .internal-content tbody {
            background-color: <?php echo $bg_color; ?>;
        }
        .internal-content td, .internal-content th {
            border-color: #ffffff;
        }

        .comment-sec .comment-card-user-reply {
            color: <?php echo $primary_color; ?>;
        }

        .comment-sec .internal-btn,
        .comment input[name="submit"] {
            background-color: <?php echo $primary_color; ?>;
            color: <?php echo $text_color; ?>;
        }

        .comment-view-sec a:hover,
        .internal-content a:hover:not(.product-sec a) {
            color: <?php echo $primary_color; ?>;
        }
        body::-webkit-scrollbar-thumb
        {
            background-color: <?php echo $primary_color; ?>;
        }
    </style>

    <section class="single-banner pt-[80px] md:pt-[64px]">
        <div class="banner-wrapper flex flex-col md:flex-row">
            <div class="w-full md:w-1/2 bg-[#FAFAFA] container flex flex-col">
                <div class="h-[85%] flex flex-col justify-center">
                    <div class="bg-[#FAFAFA] rounded-[10px] w-full">
                        <div class="text-sm breadcrumbs bread-gap">
                            <ul>
                                <li class="bread-list"><a href="<?php echo home_url(); ?>">Home</a></li>
                                <?php if (!empty($parent_id)) { ?>
                                    <li class="bread-list text-[#9E9E9E]"><a href="<?php echo esc_url(get_category_link($parent_id)); ?>" title="<?php echo get_cat_name($parent_id); ?>"><?php echo get_cat_name($parent_id); ?></a></li>
                                <?php } ?>
                                <li class="bread-list text-[#9E9E9E]"><a href="<?php echo esc_url(get_category_link($cat_ID)); ?>" title="<?php echo $cat_Name; ?>"><?php echo $cat_Name; ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <h1 class="internal-h1 md:flex md:items-center">
                        <?php echo the_title_attribute('echo=0'); ?>
                    </h1>
                </div>
                <div class="single-cat-info-wrapper">
                    <span class="single-cat-info" style="color:<?php echo $primary_color; ?>;">
                        <a href="<?php echo esc_url(get_category_link($cat_ID)); ?>" title="<?php echo $cat_Name; ?>"><?php echo $cat_Name; ?></a>
                    </span><span style="color:<?php echo $primary_color; ?>;">|</span>
                    <p class="font-Chai text-[#9E9E9E] font-light mt-[3px]">
                        <span class="font-Chai">
                            <a href="<?php echo $author_URL; ?>">By <?php echo $author_name; ?></a>
                        </span><span style="color:<?php echo $primary_color; ?>;">|</span>
                        <span class="font-Chai">
                            <?php echo get_the_date('j F, Y'); ?>
                        </span>
                    </p>
                </div>
            </div>

            <div class="w-full md:w-1/2">
                <?php if (has_post_thumbnail()) : ?>
                    <?php echo get_the_post_thumbnail($post_id, 'single-banner-img', array('class' => 'single-banner-img')); ?>
                <?php else : ?>
                    <figure class="m-0">
                        <img class="w-full object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/rightheroimg.png" alt="logo">
                    </figure>
                <?php endif; ?>
            </div>
        </div>
        
    </section>
    <section class="single-page">
        <div class="container mx-auto">
            <div class="single-main-wrapper">
                <div class="single-inner-wrapper ">
                    <div class="left-separator block">
                        <div class="left-separator-card sticky top-12">
                            <h2 class="toc-title" style="color:<?php echo $primary_color; ?>;">Table Of Content</h2>
                            <ul id="toc" class="toc-ul">
                                <?php echo table_of_content('toc-ul-li', ''); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="right-separator">




                        <!-- <h1 class="internal-h1">
                            <?php echo the_title_attribute('echo=0'); ?>
                        </h1> -->

                        <div class="internal-content"><?php the_content(); ?></div>
                        <!-- <div>
                            <p class="internal-p">
                                The most easily recognized sign in the world is the sign of the cross. Having a tattoo on something so much symbolic, like the cross, is really something else. Driven by that motive, many people love to have a cross tattoo on different parts of their skin.
                                There are different styles like the Celtic style, Gothic style, and more different styles you can use to imprint the sign the cors on your skin. You can get it done on your back, your chest, or your arm.
                                So, if you are ready to get a cross tattoo, then you can explore the different examples we have listed in this article. So, without any delay, let’s start.

                            </p>
                            <h2 class="internal-h2">
                                What Is The Meaning Of The Cross Tattoo?
                            </h2>
                            <h3 class="internal-h3">
                                1. Minimal Cross Tattoos
                            </h3>
                            <figure class="internal-figure">
                                <img class="internal-img" src="<?php //echo get_template_directory_uri(); 
                                                                ?>/assets/images/img1.png" alt="">
                            </figure>
                            <h3 class="internal-h3">
                                2. Cross Tattoo With Armband
                            </h3>
                            <figure class="internal-figure">
                                <img class="internal-img" src="<?php //echo get_template_directory_uri(); 
                                                                ?>/assets/images/img2.png" alt="">
                            </figure>
                            <p class="internal-p">
                                The most easily recognized sign in the world is the sign of the cross. Having a tattoo on something so much symbolic, like the cross, is really something else. Driven by that motive, many people love to have a cross tattoo on different parts of their skin.
                                There are different styles like the Celtic style, Gothic style, and more different styles you can use to imprint the sign the cors on your skin. You can get it done on your back, your chest, or your arm.
                                So, if you are ready to get a cross tattoo, then you can explore the different examples we have listed in this article. So, without any delay, let’s start.
                            </p>
                            <ul class="internal-ul">
                                <li class="internal-ul-li">It is a long established fact that a reader will be distracted by.</li>
                                <li class="internal-ul-li">It is a long established fact that a reader will be distracted by the readable content.</li>
                                <li class="internal-ul-li">It is a long established fact that a reader will be distracted by the readable.</li>
                                <li class="internal-ul-li">It is a long established fact that a distracted by the readable content.</li>
                            </ul>
                            <h3 class="internal-h3">
                                3. Big Back Cross Tattoo
                            </h3>
                            <figure class="internal-figure">
                                <img class="internal-img" src="<?php //echo get_template_directory_uri(); 
                                                                ?>/assets/images/img3.png" alt="">
                            </figure>
                            <p class="internal-p">
                                The most easily recognized sign in the world is the sign of the cross. Having a tattoo on something so much symbolic, like the cross, is really something else. Driven by that motive, many people love to have a cross tattoo on different parts of their skin.
                                There are different styles like the Celtic style, Gothic style, and more different styles you can use to imprint the sign the cors on your skin. You can get it done on your back, your chest, or your arm.
                                So, if you are ready to get a cross tattoo, then you can explore the different examples we have listed in this article. So, without any delay, let’s start.
                            </p>
                            <p class="internal-p">
                                The most easily recognized sign in the world is the sign of the cross. Having a tattoo on something so much symbolic, like the cross, is really something else. Driven by that motive, many people love to have a cross tattoo on different parts of their skin.
                                There are different styles like the Celtic style, Gothic style, and more different styles you can use to imprint the sign the cors on your skin. You can get it done on your back, your chest, or your arm.
                                So, if you are ready to get a cross tattoo, then you can explore the different examples we have listed in this article. So, without any delay, let’s start.
                            </p>
                            <ul class="internal-ul">
                                <li class="internal-ul-li">It is a long established fact that a reader will be distracted by.</li>
                                <li class="internal-ul-li">It is a long established fact that a reader will be distracted by the readable content.</li>
                                <li class="internal-ul-li">It is a long established fact that a reader will be distracted by the readable.</li>
                                <li class="internal-ul-li">It is a long established fact that a distracted by the readable content.</li>
                            </ul>
                            <h3 class="internal-h3">
                                4. Rib Cross Tattoo For Men
                            </h3>
                            <figure class="internal-figure">
                                <img class="internal-img" src="<?php //echo get_template_directory_uri(); 
                                                                ?>/assets/images/img4.png" alt="">
                            </figure>
                            <p class="internal-p">
                                The most easily recognized sign in the world is the sign of the cross. Having a tattoo on something so much symbolic, like the cross, is really something else. Driven by that motive, many people love to have a cross tattoo on different parts of their skin.
                                There are different styles like the Celtic style, Gothic style, and more different styles you can use to imprint the sign the cors on your skin. You can get it done on your back, your chest, or your arm.
                            </p>
                            <p class="internal-p">
                                So, if you are ready to get a cross tattoo, then you can explore the different examples we have listed in this article. So, without any delay, let’s start.
                            </p>
                            <div class="overflow-x-auto">
                                <table class="table font-Chai">
                                    <thead>
                                        <tr>
                                            <th class="border-r">HEADING HERE</th>
                                            <th class="border-r">HEADING HERE</th>
                                            <th class="border-r">HEADING HERE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border-r">Cy Ganderton</td>
                                            <td class="border-r">Quality Control Specialist</td>
                                            <td class="border-r">Blue</td>
                                        </tr>
                                        <tr>
                                            <td class="border-r">Hart Hagerty</td>
                                            <td class="border-r">Desktop Support Technician</td>
                                            <td class="border-r">Purple</td>
                                        </tr>
                                        <tr>
                                            <td class="border-r">Brice Swyre</td>
                                            <td class="border-r">Tax Accountant</td>
                                            <td class="border-r">Red</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h3 class="internal-h3">
                                5. Leg Cross Tattoo For Women
                            </h3>
                            <figure class="internal-figure">
                                <img class="internal-img" src="<?php //echo get_template_directory_uri(); 
                                                                ?>/assets/images/img5.png" alt="">
                            </figure>
                            <p class="internal-p">
                                The most easily recognized sign in the world is the sign of the cross. Having a tattoo on something so much symbolic, like the cross, is really something else. Driven by that motive, many people love to have a cross tattoo on different parts of their skin.
                                There are different styles like the Celtic style, Gothic style, and more different styles you can use to imprint the sign the cors on your skin. You can get it done on your back, your chest, or your arm.
                            </p>
                            <p class="internal-p">
                                So, if you are ready to get a cross tattoo, then you can explore the different examples we have listed in this article. So, without any delay, let’s start.

                            </p>
                            <h3 class="internal-h3">
                                6. Neck Cross Tattoo For Women
                            </h3>
                            <figure class="internal-figure">
                                <img class="internal-img" src="<?php //echo get_template_directory_uri(); 
                                                                ?>/assets/images/img6.png" alt="">
                            </figure>
                            <p class="internal-p">
                                The most easily recognized sign in the world is the sign of the cross. Having a tattoo on something so much symbolic, like the cross, is really something else. Driven by that motive, many people love to have a cross tattoo on different parts of their skin.
                                There are different styles like the Celtic style, Gothic style, and more different styles you can use to imprint the sign the cors on your skin. You can get it done on your back, your chest, or your arm.
                            </p>
                            <p class="internal-p">
                                So, if you are ready to get a cross tattoo, then you can explore the different examples we have listed in this article. So, without any delay, let’s start.
                            </p>
                            <h3 class="internal-read-also">
                                read also
                            </h3>
                            <ul class="internal-ul">
                                <li class="internal-ul-li">
                                    It is a long established fact that a reader will be distracted by.
                                </li>
                                <li class="internal-ul-li">
                                    It is a long established fact that a reader will be distracted by the readable content.
                                </li>
                                <li class="internal-ul-li">
                                    It is a long established fact that a reader will be distracted by the readable.
                                </li>
                                <li class="internal-ul-li">
                                    It is a long established fact that a distracted by the readable content.
                                </li>
                            </ul>
                        </div> -->

                        <?php if ($tags) { ?>
                            <h3 class="tags">
                                tags
                            </h3>
                            <div class="tags-wrapper">
                                <?php foreach ($tags as $tag) { ?>
                                    <a class="tags-btn hover:text-white" href="<?php echo get_tag_link($tag->term_id); ?>" rel="tags" onmouseover="this.setAttribute('style','border-color:<?php echo $primary_color; ?>;background-color:<?php echo $primary_color; ?>')" onmouseout="this.setAttribute('style','border-color:null;background-color:null')"><?php echo $tag->name; ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>


                        <h3 class="tags">
                            Share This Article:
                        </h3>
                        <div class="internal-Share-wrapper">
                            <button data-link="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post_id); ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="Share Link" class="share-icon internal-Share group hover:text-white" onmouseover="this.setAttribute('style','border-color:<?php echo $primary_color; ?>;background-color:<?php echo $primary_color; ?>')" onmouseout="this.setAttribute('style','border-color:null;background-color:null')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="paragraph">
                                    <path d="M17.1153 9.20325H13.8789V7.08066C13.8789 6.28352 14.4072 6.09768 14.7793 6.09768C15.1506 6.09768 17.0632 6.09768 17.0632 6.09768V2.59333L13.9178 2.58105C10.4262 2.58105 9.6316 5.19471 9.6316 6.8673V9.20325H7.6123V12.8143H9.6316C9.6316 17.4485 9.6316 23.0323 9.6316 23.0323H13.8789C13.8789 23.0323 13.8789 17.3935 13.8789 12.8143H16.7449L17.1153 9.20325Z" fill="" />
                                </svg>
                            </button>
                            <button data-link="http://twitter.com/intent/tweet?text=<?php echo strip_tags(the_title_attribute()); ?>&url=<?php echo get_permalink($post_id); ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="Share Link" class="share-icon internal-Share group hover:text-white" onmouseover="this.setAttribute('style','border-color:<?php echo $primary_color; ?>;background-color:<?php echo $primary_color; ?>')" onmouseout="this.setAttribute('style','border-color:null;background-color:null')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="paragraph">
                                    <path d="M22.3673 6.37727C21.6007 6.71805 20.7756 6.94792 19.9099 7.05079C20.7938 6.52162 21.4716 5.68343 21.7912 4.68351C20.9644 5.17416 20.0492 5.53018 19.0742 5.72237C18.294 4.89095 17.1819 4.37109 15.9513 4.37109C13.5887 4.37109 11.6731 6.28667 11.6731 8.64972C11.6731 8.98457 11.7108 9.31096 11.784 9.62465C8.22802 9.44601 5.07504 7.74294 2.96473 5.15426C2.59643 5.78587 2.38561 6.52078 2.38561 7.30564C2.38561 8.78984 3.14083 10.0996 4.28891 10.8667C3.58787 10.8443 2.9279 10.6517 2.35089 10.3312C2.35047 10.349 2.35047 10.3672 2.35047 10.3854C2.35047 12.458 3.82536 14.1869 5.78285 14.5806C5.42387 14.678 5.04583 14.7305 4.65552 14.7305C4.3795 14.7305 4.11153 14.7038 3.85034 14.6534C4.39517 16.3531 5.97505 17.5905 7.84702 17.6248C6.38272 18.7725 4.53825 19.4566 2.53335 19.4566C2.18833 19.4566 1.84755 19.4362 1.5127 19.3964C3.40669 20.611 5.65543 21.3188 8.07139 21.3188C15.9416 21.3188 20.2447 14.7995 20.2447 9.14544C20.2447 8.96002 20.2409 8.77502 20.2329 8.5913C21.0685 7.98932 21.7941 7.23536 22.3673 6.37727Z" fill="" />
                                </svg>
                            </button>
                            <button data-link="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink($post_id); ?>&title=<?php echo strip_tags(the_title_attribute()); ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="Share Link" class="share-icon internal-Share group hover:text-white" onmouseover="this.setAttribute('style','border-color:<?php echo $primary_color; ?>;background-color:<?php echo $primary_color; ?>')" onmouseout="this.setAttribute('style','border-color:null;background-color:null')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white" width="28" height="28" viewBox="0 0 28 28" fill="paragraph">
                                    <path d="M9.33301 22.1667H5.83301V10.5H9.33301V22.1667ZM22.1663 22.1667H18.6663V15.9343C18.6663 14.3103 18.0877 13.5018 16.9408 13.5018C16.032 13.5018 15.4557 13.9545 15.1663 14.861C15.1663 16.3333 15.1663 22.1667 15.1663 22.1667H11.6663C11.6663 22.1667 11.713 11.6667 11.6663 10.5H14.429L14.6425 12.8333H14.7148C15.4323 11.6667 16.5792 10.8757 18.1518 10.8757C19.3477 10.8757 20.3148 11.2082 21.0533 12.0435C21.7965 12.88 22.1663 14.0023 22.1663 15.5785V22.1667Z" fill="" />
                                    <path d="M7.58372 9.33398C8.58244 9.33398 9.39206 8.55048 9.39206 7.58398C9.39206 6.61749 8.58244 5.83398 7.58372 5.83398C6.58501 5.83398 5.77539 6.61749 5.77539 7.58398C5.77539 8.55048 6.58501 9.33398 7.58372 9.33398Z" fill="" />
                                </svg>
                            </button>
                            <button class="share_more internal-Share group hover:text-white" data-post_title="<?php echo the_title_attribute('echo=0'); ?>" data-post_text="post to <?php echo the_title_attribute('echo=0'); ?>" data-post_url="<?php echo get_permalink($post_id); ?>" onmouseover="this.setAttribute('style','border-color:<?php echo $primary_color; ?>;background-color:<?php echo $primary_color; ?>')" onmouseout="this.setAttribute('style','border-color:null;background-color:null')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white" width="24" height="24" viewBox="0 0 24 24" fill="paragraph">
                                    <path d="M17.9999 15.75C17.5959 15.7499 17.196 15.8316 16.8244 15.9903C16.4528 16.149 16.1173 16.3814 15.838 16.6734L8.90054 12.7702C9.03492 12.2655 9.03492 11.7345 8.90054 11.2298L15.838 7.32657C16.3432 7.85032 17.022 8.17192 17.7473 8.23111C18.4726 8.29029 19.1946 8.08302 19.778 7.6481C20.3614 7.21319 20.7662 6.58048 20.9166 5.8685C21.067 5.15653 20.9527 4.41415 20.595 3.78043C20.2373 3.14672 19.6609 2.66515 18.9736 2.42595C18.2864 2.18676 17.5355 2.20634 16.8616 2.48103C16.1878 2.75572 15.6372 3.26667 15.3131 3.91817C14.9889 4.56966 14.9134 5.317 15.1007 6.02016L8.1632 9.92344C7.7488 9.49136 7.2146 9.19315 6.62933 9.06718C6.04405 8.9412 5.43447 8.99321 4.879 9.21653C4.32353 9.43985 3.84758 9.82425 3.51237 10.3203C3.17717 10.8163 2.99805 11.4013 2.99805 12C2.99805 12.5987 3.17717 13.1837 3.51237 13.6797C3.84758 14.1758 4.32353 14.5602 4.879 14.7835C5.43447 15.0068 6.04405 15.0588 6.62933 14.9328C7.2146 14.8069 7.7488 14.5086 8.1632 14.0766L15.1007 17.9798C14.9398 18.5854 14.9726 19.2261 15.1945 19.8121C15.4163 20.3981 15.816 20.8999 16.3376 21.2472C16.8591 21.5944 17.4763 21.7696 18.1025 21.7483C18.7287 21.7269 19.3325 21.51 19.8291 21.128C20.3258 20.746 20.6904 20.2181 20.8717 19.6184C21.0531 19.0186 21.0421 18.3772 20.8404 17.784C20.6386 17.1908 20.2562 16.6757 19.7468 16.3109C19.2373 15.9461 18.6265 15.75 17.9999 15.75Z" fill="" />
                                </svg>
                            </button>

                        </div>

                        <div class="comment-sec">
                            <div class="comment"><?php comment_form(); ?></div>
                            <!-- <h2 class="comment-sec-title">
                                Leave a comment on this article
                            </h2>
                            <form action="" class=" flex flex-col">
                                <div class="flex flex-col gap-4">
                                    <input type=" Your Name" placeholder="Your Name" class="internal-input " />
                                    <input type="text" placeholder="E-mail Address" class="internal-input" />
                                    <input type="text" placeholder="Website" class="internal-input" />
                                </div>
                                <div class="mt-2 md:mt-3 lg:mt-[29px] w-full">
                                    <textarea class="internal-textarea" placeholder="Bio"></textarea>
                                </div>
                                <div class="w-full mt-[15px] md:mt-8 lg:mt-5">
                                    <button class="internal-btn text-white">POST YOUR COMMENT</button>
                                </div>

                                <div class="flex items-start gap-3 mt-[11px] md:mt-[16px] lg:mt-[29px]">
                                    <input class="internal-checkbox" type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label class="internal-checkbox-label" for="vehicle1"> Save my name, e-mail and website in this browser for the next time I comment.</label>
                                </div>
                            </form> -->

                            <?php $parent_comments = get_comments(array(
                                'post_id' => $post_id,
                                'status' => 'approve',
                                'hierarchical' => 'threaded',
                                'orderby' => 'date',
                                'order' => 'ASC'
                            ));
                            if (!empty($parent_comments)) : ?>
                                <div class="comment-view-sec">
                                    <section class="internal-all-title-sec">
                                        <h3 class="internal-all-comment-title">
                                            All Comments
                                        </h3>
                                    </section>
                                    <?php foreach ($parent_comments as $parent_comment) : ?>
                                        <div class="comment-card card-border-b">
                                            <div class="comment-card-user-sec" id="comment-<?php echo $parent_comment->comment_ID; ?>">
                                                <figure class="w-fit h-fit">
                                                    <img class="comment-card-img" src="<?php echo get_avatar_url($parent_comment->user_id); ?>" alt="author-img" />
                                                </figure>
                                                <h3 class="comment-user-title"><?php echo $parent_comment->comment_author; ?></h3>
                                            </div>
                                            <div class="comment-card-user-content">
                                                <h2 class="comment-card-comment"><?php echo $parent_comment->comment_content; ?></h2>
                                                <div class="flex gap-3">
                                                    <a class="comment-card-user-reply" rel="nofollow" href="<?php echo get_permalink($post_id); ?>/?replytocom=<?php echo $parent_comment->comment_ID; ?>#respond" data-commentid="<?php echo $parent_comment->comment_ID; ?>" data-postid="<?php echo $post_id; ?>" data-belowelement="div-comment-<?php echo $parent_comment->comment_ID; ?>" data-respondelement="respond" data-replyto="Reply to <?php echo $parent_comment->comment_author; ?>" aria-label="Reply to <?php echo $parent_comment->comment_author; ?>">Reply </a>
                                                    <?php if (is_user_logged_in()) { ?>
                                                        <a class="comment-card-user-reply" href="<?php echo get_edit_comment_link($parent_comment->comment_ID); ?>">Edit</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php $child_comments = get_comments(array(
                                                'parent' => $parent_comment->comment_ID,
                                                'hierarchical' => 'threaded',
                                                'status' => 'approve',
                                                'orderby' => 'date',
                                                'order' => 'ASC'
                                            ));
                                            if (!empty($child_comments)) : ?>
                                                <?php foreach ($child_comments as $child_comment) : ?>
                                                    <div class="comment-card-replay flex gap-3 mt-3 ml-3" id="comment-<?php echo $child_comment->comment_ID; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M21.3164 13.4444C21.4971 13.6145 21.5996 13.8516 21.5996 14.0998C21.5996 14.348 21.4971 14.5851 21.3164 14.7552L16.2164 19.5552C15.8545 19.8959 15.2849 19.8786 14.9442 19.5166C14.6036 19.1547 14.6208 18.5851 14.9828 18.2444L18.4302 14.9998L6.29961 14.9998C4.14573 14.9998 2.39961 13.2537 2.39961 11.0998V5.6998C2.39961 5.20276 2.80257 4.7998 3.29961 4.7998C3.79665 4.7998 4.19961 5.20276 4.19961 5.6998V11.0998C4.19961 12.2596 5.13981 13.1998 6.29961 13.1998L18.4302 13.1998L14.9828 9.95512C14.6208 9.61456 14.6036 9.04492 14.9442 8.683C15.2849 8.32096 15.8545 8.3038 16.2164 8.64436L21.3164 13.4444Z" fill="#101010" />
                                                        </svg>
                                                        <div class="flex flex-col gap-3">
                                                            <div class="flex gap-3 items-center">
                                                                <figure class="w-fit h-fit">
                                                                    <img class="comment-card-img" src="<?php echo get_avatar_url($child_comment->user_id); ?>" alt="author-img" />
                                                                </figure>
                                                                <h3 class="comment-user-title"><?php echo $child_comment->comment_author; ?></h3>
                                                            </div>
                                                            <h4 class="text-[24px] font-Chai font-light"><?php echo $child_comment->comment_content; ?></h4>
                                                            <div class="flex gap-3">
                                                                <a class="comment-card-user-reply mt-0" rel="nofollow" href="<?php echo get_permalink($post_id); ?>/?replytocom=<?php echo $child_comment->comment_ID; ?>#respond" data-commentid="<?php echo $child_comment->comment_ID; ?>" data-postid="<?php echo $post_id; ?>" data-belowelement="div-comment-<?php echo $child_comment->comment_ID; ?>" data-respondelement="respond" data-replyto="Reply to <?php echo $child_comment->comment_author; ?>" aria-label="Reply to <?php echo $child_comment->comment_author; ?>">Reply </a>
                                                                <?php if (is_user_logged_in()) { ?>
                                                                    <a class="comment-card-user-reply mt-0" href="<?php echo get_edit_comment_link($child_comment->comment_ID); ?>">Edit</a>
                                                                <?php } ?>

                                                            </div>
                                                            <?php $comment_number = get_comments(array(
                                                                'parent' => $child_comment->comment_ID,
                                                                'hierarchical' => 'threaded',
                                                                'count' => true,
                                                                'status' => 'approve',
                                                                'orderby' => 'date',
                                                                'order' => 'ASC'
                                                            ));
                                                            $reply = ($comment_number == 1) ? 'reply' : 'replies';
                                                            echo (!empty($comment_number)) ? '<button id="load_button_' . $child_comment->comment_ID . '" class="show-comment text-[18px] font-Chai flex font-semibold" data-comment_id="' . $child_comment->comment_ID . '">View ' . $comment_number . ' more ' . $reply . '</button>' : ''; ?>
                                                            <div id="load_child_<?php echo $child_comment->comment_ID; ?>"></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>


                            <!-- <div class="comment-card card-border-b">
                                    <div class="comment-card-user-sec">
                                        <figure class="w-fit h-fit ">
                                            <img class="comment-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user1-demo.png" alt="">
                                        </figure>
                                        <h3 class="comment-user-title">
                                            Akash Sharma
                                        </h3>
                                    </div>
                                    <div class="comment-card-user-content">
                                        <h2 class="comment-card-comment">
                                            Hii! awesome article, really liked it.
                                        </h2>
                                        <a href="" class="comment-card-user-reply">
                                            Reply
                                        </a>
                                    </div>
                                </div>

                                <div class="comment-card card-border-b">
                                    <div class="comment-card-user-sec">
                                        <figure class="w-fit h-fit ">
                                            <img class="comment-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user1-demo.png" alt="">
                                        </figure>
                                        <h3 class="comment-user-title">
                                            Akash Sharma
                                        </h3>
                                    </div>
                                    <div class="comment-card-user-content">
                                        <h2 class="comment-card-comment">
                                            Hii! awesome article, really liked it.
                                        </h2>
                                        <a href="" class="comment-card-user-reply">
                                            Reply
                                        </a>
                                    </div>

                                    <div class="comment-card-replay flex gap-3 mt-3 ml-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21.3164 13.4444C21.4971 13.6145 21.5996 13.8516 21.5996 14.0998C21.5996 14.348 21.4971 14.5851 21.3164 14.7552L16.2164 19.5552C15.8545 19.8959 15.2849 19.8786 14.9442 19.5166C14.6036 19.1547 14.6208 18.5851 14.9828 18.2444L18.4302 14.9998L6.29961 14.9998C4.14573 14.9998 2.39961 13.2537 2.39961 11.0998V5.6998C2.39961 5.20276 2.80257 4.7998 3.29961 4.7998C3.79665 4.7998 4.19961 5.20276 4.19961 5.6998V11.0998C4.19961 12.2596 5.13981 13.1998 6.29961 13.1998L18.4302 13.1998L14.9828 9.95512C14.6208 9.61456 14.6036 9.04492 14.9442 8.683C15.2849 8.32096 15.8545 8.3038 16.2164 8.64436L21.3164 13.4444Z" fill="#101010" />
                                        </svg>
                                        <div class="flex flex-col gap-3">
                                            <div class="flex gap-3 items-center">
                                                <figure class="w-fit h-fit ">
                                                    <img class="comment-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user1-demo.png" alt="">
                                                </figure>
                                                <h3 class="comment-user-title">
                                                    Akash Sharma
                                                </h3>
                                            </div>
                                            <div>
                                                <h4 class="text-[24px] font-Chai font-light ">
                                                    Thank You.
                                                </h4>
                                            </div>
                                            <div class="comment-card-replay flex gap-3 mt-3 ml-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M21.3164 13.4444C21.4971 13.6145 21.5996 13.8516 21.5996 14.0998C21.5996 14.348 21.4971 14.5851 21.3164 14.7552L16.2164 19.5552C15.8545 19.8959 15.2849 19.8786 14.9442 19.5166C14.6036 19.1547 14.6208 18.5851 14.9828 18.2444L18.4302 14.9998L6.29961 14.9998C4.14573 14.9998 2.39961 13.2537 2.39961 11.0998V5.6998C2.39961 5.20276 2.80257 4.7998 3.29961 4.7998C3.79665 4.7998 4.19961 5.20276 4.19961 5.6998V11.0998C4.19961 12.2596 5.13981 13.1998 6.29961 13.1998L18.4302 13.1998L14.9828 9.95512C14.6208 9.61456 14.6036 9.04492 14.9442 8.683C15.2849 8.32096 15.8545 8.3038 16.2164 8.64436L21.3164 13.4444Z" fill="#101010" />
                                                </svg>
                                                <div class="flex flex-col gap-3">
                                                    <div class="flex gap-3 items-center">
                                                        <figure class="w-fit h-fit ">
                                                            <img class="comment-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/user1-demo.png" alt="">
                                                        </figure>
                                                        <h3 class="comment-user-title">
                                                            Akash Sharma
                                                        </h3>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-[24px] font-Chai font-light ">
                                                            Thank You.
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                        </div>
                    </div>
                </div>
                <?php get_sidebar('', array('hex_color' => $primary_color)); ?>

            </div>
            <?php $related = get_posts(array(
                'category__in' => $cat_ID,
                'post_type' => 'post',
                'orderby' => 'rand',
                'post_status' => 'publish',
                'order'   => 'DESC',
                'posts_per_page' => 3,
                'post__not_in' => array($post_id)
            ));
            if (!empty($related)) : ?>
                <div class="single-related-post-sec">
                    <h2 class="single-related-post-title">
                        RELATED POST
                    </h2>
                    <div class="single-related-post-card-wrapper">
                        <?php foreach ($related as $post) {
                            setup_postdata($post);
                            get_template_part('template-parts/related', 'card', array('hex_color' => $primary_color));
                        }
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>