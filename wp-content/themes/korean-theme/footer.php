        </main>

        <?php $facebook = get_option('facebook');
        $linkedin = get_option('linkedin');
        $footer_menus = array('footer-menu-1', 'footer-menu-2', 'footer-menu-3', 'footer-menu-4') ?>


        <?php

        // DEVELOPER NEED TO CREATE A CONDITION FOR THE CLASS WHICH PAGE  NEED TO AWARDING TO PAGE 
        //   TABLATE MODE 

        ?>
        <footer class="footer-sec ">
            <?php if (!empty($footer_menus)) : ?>
                <div class="footer-link-sec">
                    <div class="container mx-auto">
                        <div class="footer-link-sec-inaner">
                            <?php foreach ($footer_menus as $footer_menu) :
                                $footer_menu_location = get_nav_menu_locations()[$footer_menu];
                                if (isset($footer_menu_location)) :
                                    echo '<div class="footer-card">';
                                    $footer_menu = get_term($footer_menu_location, 'nav_menu');
                                    echo '<h3 class="footer-cat-title">' . $footer_menu->name . '</h3>';
                                    $footer_menu_items = wp_get_nav_menu_items($footer_menu->term_id);
                                    echo '<ul class="footer-ul">';
                                    foreach ($footer_menu_items as $menu_item) :
                                        $parent_ID = $menu_item->ID;
                                        if ($menu_item->menu_item_parent == 0) :
                                            echo '<li class="footer-li"><a class="footer-li-a" href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                                        endif;
                                    endforeach;
                                    echo '</ul>';
                                    echo '</div>';
                                endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="footer-three-sec">
                <div class=" footer-three-sec-container ">
                    <div class="footer-three-sec-inner">

                        <?php if (shortcode_exists('email-subscribers-form')) : ?>
                            <div class="footer-email-sub-scprition ">
                                <h2 class="footer-three-sec-titles">Get Exclusive Content</h2>
                                <p class="footer-three-sec-paragraph">Our newsletter is jam-packed with giveaways to editors’ picks to free downloads!</p>
                                <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false) || (!empty($linkedin) && (filter_var($linkedin, FILTER_VALIDATE_URL) !== false))) : ?>
                            <div class="footer-social-link ">
                                <h2 class="footer-three-sec-titles">Stay in the Loop</h2>
                                <p class="footer-three-sec-paragraph">Join our community through your favourite social media platform.</p>
                                <ul class="footer-social-ul">
                                    <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false)) : ?>
                                        <li class="footer-social-li">
                                            <a class="footer-social-li-a" href="<?php echo $facebook; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_Link">
                                                <span class="icon-facekbook"></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($linkedin) && (filter_var($linkedin, FILTER_VALIDATE_URL) !== false)) : ?>
                                        <li class="footer-social-li">
                                            <a class="footer-social-li-a" href="<?php echo $linkedin; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_Link">
                                                <span class="icon-linkedin"></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="footer-contact-us">
                            <h2 class="footer-three-sec-titles">Contact Us</h2>
                            <p class="footer-three-sec-paragraph">Have a story to tell? Looking to advertise? We’d love to hear from you.</p>
                            <a href="<?php echo home_url('/contact-us'); ?>" class="footer-get-button">Get in Touch</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copy-right-sec">
                <div class="container mx-auto">
                    <p class="footer-copy-right-sec-p">Copyright <?php echo date('Y'); ?>. All Rights Reversed.
                    </p>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>

        <script>
            $('.marquee-vert').marquee();

            jQuery(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                responsive: {
                    0: {
                        items: 1.8,
                    },

                    540: {
                        items: 3,
                    },
                },
            });
        </script>
        </body>

        </html>