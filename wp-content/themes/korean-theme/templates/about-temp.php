<?php /* Template Name: About Page Template */ ?>

<?php get_header();

while (have_posts()) : the_post();

    $page_id = get_the_ID();
    $color_value = get_post_meta($page_id, 'custom_color', true);
	$h2_header = get_post_meta($page_id, 'h2_header', true);
    $textarea_content = get_post_meta($page_id, 'textarea_content', true);?>

    <section class="about-page-main">
        <div class="about-us-wrapper" style="background-color:<?php echo $color_value; ?>;">
            <div class="container mx-auto">
                <div class="capitalize flex items-center gap-9 flex-col lg:flex-row lg:px-[120px] py-[68px]">
                    <div class="w-full lg:w-1/2">
                        <h1 class="about-title relative">
                            <?php echo strip_tags(get_the_title()); ?>
                            <svg class="absolute top-[-8px] left-[-8px]" width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="16.4941" y1="3.95573" x2="17.1737" y2="12.93" stroke="black" stroke-width="1.25" />
                                <line x1="0.305967" y1="15.8007" x2="8.59056" y2="19.3171" stroke="black" stroke-width="1.25" />
                                <line x1="4.41149" y1="0.758802" x2="11.8862" y2="14.9055" stroke="black" stroke-width="1.25" />
                            </svg>

                        </h1>
                        <?php echo !empty($h2_header)?'<h2 class="font-Anton text-[34px] sm:text-[44px] md:text-[54px] lg:text-[64px] xl:text-[74px] 2xl:text-[84px] lg:mb-[22px] lg:leading-[100px]">'.$h2_header.'</h2>':''; ?>
                        <?php echo !empty($textarea_content)?'<p class="font-Chai text-[18px]">'.$textarea_content.'</p>':''; ?>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <figure class="">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php echo get_the_post_thumbnail($page_id, 'page-thumbnail', array('class' => 'w-full object-cover rounded-[10px]')); ?>
                            <?php else : ?>
                                <img class="w-full object-cover" src="<?php echo get_template_directory_uri(); ?> /assets/images/about-img.png" alt="about-img">
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class=" container mx-auto">
            <div class="about-page-wrapper">



                <div class="about"><?php the_content(); ?></div>

                <!-- <p class="about-p">
                    The blogging industry is growing every second. In fact, as we converse, new users are joining the blogging industry. Every day, there is something new to learn. However, it is not practically possible to keep track of everything that is happening around you. However, if you read 7bestthings.com, you will get notified of all the industry’s top 7 news updates every day.
                    7bestthings.com’s main purpose is to share valuable information on every niche. And not just valuable information, information that can actually have an impact on your life.
                    7bestthings.com is a platform that has committed itself to cover all the trendy <br>
                    information from the industry and share them with its readers.
                </p>

                <p class="about-p">
                    Given below are the highlights of the industries that 7bestthings.com follows.
                </p>

                <div class="about-chip-wrapper">
                    <a href="" class="chip-card text-business ">
                        BUSINESS
                    </a>
                    <a href="" class="chip-card text-lifestyle">
                        SOCIAL MEDIA
                    </a>
                    <a href="" class="chip-card text-social">
                        ENTERTAINMENT
                    </a>
                    <a href="" class="chip-card text-technology">
                        TECHNOLOGY
                    </a>
                    <a href="" class="chip-card text-education">
                        EDUCATION
                    </a>
                    <a href="" class="chip-card text-health">
                        HEALTH
                    </a>

                </div>

                <p class="about-p">
                    There are other industries as well. The topics mentioned above are just the highlights.
                </p>

                <h2 class="about-h2">
                    How Do We Work?
                </h2>

                <p class="about-p">
                    We have an experienced team of content creators who are well versed in the things they do. They keep track of the latest things that are happening around the world. If something caught their eye and they consider worth sharing with our reader, they certainly do so.
                    We also have a team that looks after the editorial and publishing part. Once the article is all ready to be shared with our raiders, they are published by following 7bestthings.com guidelines.
                </p> -->



            </div>
        </div>
    </section>


<?php endwhile;

get_footer(); ?>