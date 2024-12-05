<?php $author_id = get_the_author_meta('ID');
$author_designation = get_the_author_meta('designation', $author_id);
$author_name = get_the_author_meta('display_name', $author_id);
$author_URL = get_author_posts_url($author_id);
$author_desc = get_the_author_meta('description', $author_id);
$hex_color_1 = __($args['hex_color']);
if (empty($hex_color_1)) {
    $hex_color_1 = '#ED1B1B';
}
if ($post) {
    $exclude = array($post->ID);
} else {
    $exclude = '';
} ?>

<?php $popular_posts = new WP_Query(array('post_type' => 'post',
                                        'post_status' => 'publish',
                                        'meta_key' => 'post_views_count',
                                        'orderby' => 'meta_value_num',
                                        'order'   => 'DESC',
                                        'posts_per_page' => 7,
                                        'post__not_in' => $exclude ));

if(is_single()):
    $facebook = get_option('facebook');
    $instagram = get_option('instagram'); ?>
    <div class="sidebar-wrapper block">
        <div class="flex flex-col gap-[20px] sticky top-12">
            <div class="flex flex-col md:flex-row lg:flex-col gap-[20px] relative w-full">
                <div class="side-bar-card bg-[#FAFAFA]">
                    <div class="sidebar-author-wrapper">
                        <figure class=" sidebar-author-image-wrapper">
                            <a href="<?php echo $author_URL; ?>">
                                <span class="sidebar-author-shadow" style="background: url('<?php echo get_avatar_url($author_id); ?>'),lightgray 50% / cover no-repeat;"></span>
                                <img class="sidebar-author-image" src="<?php echo get_avatar_url($author_id); ?>" alt="">
                            </a>
                        </figure>

                        <div class=" flex flex-col justify-center">
                            <h1 class="sidebar-author-title">
                                <a href="<?php echo $author_URL; ?>"><?php echo $author_name; ?></a>
                            </h1>
                            <?php if(!empty($author_designation)){
                                echo '<h3 class="sidebar-author-cat">'.$author_designation.'</h3>';
                            } ?>
                        </div>
                    </div>
                    <?php if(!empty($author_desc)) { ?>
                        <p class="sidebar-author-dsc">
                            <?php echo strip_tags($author_desc); ?>
                        </p>
                    <?php } ?>
                    <a href="<?php echo $author_URL; ?>" class="sidebar-author-view-author-post">
                        view author post
                    </a>
                </div>
                <?php if ((!empty($facebook) && filter_var($facebook, FILTER_VALIDATE_URL)) || (!empty($instagram) && filter_var($instagram, FILTER_VALIDATE_URL))) : ?>
                    <div class="side-bar-card-another flex flex-col lg:hidden bg-[#FAFAFA]">
                        <h3 class="h-s-b-title text-secondary ">
                            Social Links
                        </h3>
                        <div class="sidebar-social-wrapper mt-[12px]">
                            <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false)) : ?>
                                <a href="<?php echo $facebook; ?>" class="sidebar-social-icon group hover:text-white" onmouseover="this.setAttribute('style','border-color:<?php echo $hex_color_1; ?>;background-color:<?php echo $hex_color_1; ?>')" onmouseout="this.setAttribute('style','border-color:null;background-color:null')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white" width="28" height="28" viewBox="0 0 28 28" fill="#686868">
                                        <path d="M19.9677 10.7337H16.1919V8.25735C16.1919 7.32736 16.8083 7.11054 17.2424 7.11054C17.6755 7.11054 19.9069 7.11054 19.9069 7.11054V3.02214L16.2373 3.00781C12.1637 3.00781 11.2367 6.05708 11.2367 8.00843V10.7337H8.88086V14.9466H11.2367C11.2367 20.3532 11.2367 26.8675 11.2367 26.8675H16.1919C16.1919 26.8675 16.1919 20.289 16.1919 14.9466H19.5355L19.9677 10.7337Z" fill="" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($instagram) && (filter_var($instagram, FILTER_VALIDATE_URL) !== false)) : ?>
                                <a href="<?php echo $instagram; ?>" class="sidebar-social-icon group hover:text-white" onmouseover="this.setAttribute('style','border-color:<?php echo $hex_color_1; ?>;background-color:<?php echo $hex_color_1; ?>')" onmouseout="this.setAttribute('style','border-color:null;background-color:null')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white" width="28" height="28" viewBox="0 0 28 28" fill="#686868">
                                        <path d="M13.9265 8.25C10.4697 8.25 7.60547 11.0648 7.60547 14.571C7.60547 18.0772 10.4203 20.892 13.9265 20.892C17.4326 20.892 20.2474 18.0278 20.2474 14.571C20.2474 11.1142 17.3832 8.25 13.9265 8.25ZM13.9265 18.6204C11.7042 18.6204 9.87707 16.7932 9.87707 14.571C9.87707 12.3488 11.7042 10.5216 13.9265 10.5216C16.1487 10.5216 17.9758 12.3488 17.9758 14.571C17.9758 16.7932 16.1487 18.6204 13.9265 18.6204Z" fill="" />
                                        <path d="M20.4946 9.52826C21.2855 9.52826 21.9267 8.88709 21.9267 8.09616C21.9267 7.30523 21.2855 6.66406 20.4946 6.66406C19.7037 6.66406 19.0625 7.30523 19.0625 8.09616C19.0625 8.88709 19.7037 9.52826 20.4946 9.52826Z" fill="" />
                                        <path d="M24.1982 4.39578C22.9143 3.06245 21.0871 2.37109 19.013 2.37109H8.84018C4.54389 2.37109 1.67969 5.23529 1.67969 9.53159V19.655C1.67969 21.7785 2.37105 23.6057 3.75376 24.939C5.0871 26.2229 6.86487 26.8649 8.88956 26.8649H18.9636C21.0871 26.8649 22.8649 26.1736 24.1488 24.939C25.4822 23.655 26.1735 21.8279 26.1735 19.7044V9.53159C26.1735 7.45751 25.4822 5.67974 24.1982 4.39578ZM24.0007 19.7044C24.0007 21.2353 23.4575 22.4699 22.5686 23.3094C21.6797 24.1489 20.4451 24.5933 18.9636 24.5933H8.88956C7.40808 24.5933 6.17351 24.1489 5.28463 23.3094C4.39574 22.4205 3.95129 21.1859 3.95129 19.655V9.53159C3.95129 8.05011 4.39574 6.81554 5.28463 5.92665C6.12413 5.08714 7.40808 4.6427 8.88956 4.6427H19.0624C20.5439 4.6427 21.7785 5.08714 22.6673 5.97603C23.5069 6.86492 24.0007 8.09949 24.0007 9.53159V19.7044Z" fill="" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="side-bar-card bg-[#FAFAFA] overflow-hidden">
                <span class="side-bar-transform-r text-[#F4F4F4]">
                    Most Popular
                </span>
                <h3 class="h-s-b-title text-secondary">
                    Most Popular
                </h3>
                <div class="side-wrapper">
                    <?php while ($popular_posts->have_posts()) : $popular_posts->the_post();
                        get_template_part('template-parts/sidebar', 'card');
                    endwhile; ?>
                </div>
            </div>
            <?php if ((!empty($facebook) && filter_var($facebook, FILTER_VALIDATE_URL)) || (!empty($instagram) && filter_var($instagram, FILTER_VALIDATE_URL))) : ?>
                <div class="side-bar-card bg-[#FAFAFA] hidden lg:flex flex-col">
                    <h3 class="h-s-b-title text-secondary ">
                        Social Links
                    </h3>
                    <div class="sidebar-social-wrapper mt-[12px]">
                        <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false)) : ?>
                            <a href="<?php echo $facebook; ?>" class="sidebar-social-icon group hover:text-white" onmouseover="this.setAttribute('style','border-color:<?php echo $hex_color_1; ?>;background-color:<?php echo $hex_color_1; ?>')" onmouseout="this.setAttribute('style','border-color:null;background-color:null')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white" width="28" height="28" viewBox="0 0 28 28" fill="#686868">
                                    <path d="M19.9677 10.7337H16.1919V8.25735C16.1919 7.32736 16.8083 7.11054 17.2424 7.11054C17.6755 7.11054 19.9069 7.11054 19.9069 7.11054V3.02214L16.2373 3.00781C12.1637 3.00781 11.2367 6.05708 11.2367 8.00843V10.7337H8.88086V14.9466H11.2367C11.2367 20.3532 11.2367 26.8675 11.2367 26.8675H16.1919C16.1919 26.8675 16.1919 20.289 16.1919 14.9466H19.5355L19.9677 10.7337Z" fill="" />
                                </svg>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($instagram) && (filter_var($instagram, FILTER_VALIDATE_URL) !== false)) : ?>
                            <a href="<?php echo $instagram; ?>" class="sidebar-social-icon group hover:text-white" onmouseover="this.setAttribute('style','border-color:<?php echo $hex_color_1; ?>;background-color:<?php echo $hex_color_1; ?>')" onmouseout="this.setAttribute('style','border-color:null;background-color:null')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white" width="28" height="28" viewBox="0 0 28 28" fill="#686868">
                                    <path d="M13.9265 8.25C10.4697 8.25 7.60547 11.0648 7.60547 14.571C7.60547 18.0772 10.4203 20.892 13.9265 20.892C17.4326 20.892 20.2474 18.0278 20.2474 14.571C20.2474 11.1142 17.3832 8.25 13.9265 8.25ZM13.9265 18.6204C11.7042 18.6204 9.87707 16.7932 9.87707 14.571C9.87707 12.3488 11.7042 10.5216 13.9265 10.5216C16.1487 10.5216 17.9758 12.3488 17.9758 14.571C17.9758 16.7932 16.1487 18.6204 13.9265 18.6204Z" fill="" />
                                    <path d="M20.4946 9.52826C21.2855 9.52826 21.9267 8.88709 21.9267 8.09616C21.9267 7.30523 21.2855 6.66406 20.4946 6.66406C19.7037 6.66406 19.0625 7.30523 19.0625 8.09616C19.0625 8.88709 19.7037 9.52826 20.4946 9.52826Z" fill="" />
                                    <path d="M24.1982 4.39578C22.9143 3.06245 21.0871 2.37109 19.013 2.37109H8.84018C4.54389 2.37109 1.67969 5.23529 1.67969 9.53159V19.655C1.67969 21.7785 2.37105 23.6057 3.75376 24.939C5.0871 26.2229 6.86487 26.8649 8.88956 26.8649H18.9636C21.0871 26.8649 22.8649 26.1736 24.1488 24.939C25.4822 23.655 26.1735 21.8279 26.1735 19.7044V9.53159C26.1735 7.45751 25.4822 5.67974 24.1982 4.39578ZM24.0007 19.7044C24.0007 21.2353 23.4575 22.4699 22.5686 23.3094C21.6797 24.1489 20.4451 24.5933 18.9636 24.5933H8.88956C7.40808 24.5933 6.17351 24.1489 5.28463 23.3094C4.39574 22.4205 3.95129 21.1859 3.95129 19.655V9.53159C3.95129 8.05011 4.39574 6.81554 5.28463 5.92665C6.12413 5.08714 7.40808 4.6427 8.88956 4.6427H19.0624C20.5439 4.6427 21.7785 5.08714 22.6673 5.97603C23.5069 6.86492 24.0007 8.09949 24.0007 9.53159V19.7044Z" fill="" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php else:
    if ($popular_posts->have_posts()) : ?>
        <div class="w-full lg:w-3/12 2xl:w-[365px] block">
            <div class="category-side-bar-card bg-[#FAFAFA] sticky top-12">
                <span class="side-bar-transform-r text-[#F4F4F4]">
                    Most Popular
                </span>
                <h3 class="h-s-b-title" style="color:<?php echo $hex_color_1; ?>;">
                    Most Popular
                </h3>
                <div class="side-wrapper">
                    <?php while ($popular_posts->have_posts()) : $popular_posts->the_post();
                        get_template_part('template-parts/sidebar', 'card');
                    endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>