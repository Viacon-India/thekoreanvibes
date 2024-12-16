<?php /* Template Name: About Page Template */ ?>

<?php get_header();

while (have_posts()) : the_post();
    $page_id = get_the_ID();
    $color_value = get_post_meta($page_id, 'custom_color', true);
	$h2_header = get_post_meta($page_id, 'h2_header', true);
    $textarea_content = get_post_meta($page_id, 'textarea_content', true); ?>
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
                        <?php echo !empty($h2_header)?'<h2 class="font-Anton text-[34px] sm:text-[44px] md:text-[54px] lg:text-[64px] xl:text-[74px] 2xl:text-[84px] lg:mb-[22px] lg:leading-[100px]">'.$h2_header.'</h2>':'' ?>
                        <?php echo !empty($textarea_content)?'<div class="font-Chai text-[18px]">'.$textarea_content.'</div>':'' ?>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <figure class="">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php echo get_the_post_thumbnail($page_id, 'page-thumbnail', array('class' => 'w-full object-cover rounded-[10px]')); ?>
                            <?php else : ?>
                                <img class="w-full object-cover rounded-[10px]" src="<?php echo get_template_directory_uri(); ?> /assets/images/about-img.png" alt="about-img">
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
            <div class="about contact lg:px-[120px] mt-10"><?php the_content(); ?></div>
        </div>
    </section>
<?php endwhile;

get_footer(); ?>