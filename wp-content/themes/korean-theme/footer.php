</main>

<?php $footer_text = get_option('footer_text');
$facebook = get_option('facebook');
$linkedin = get_option('linkedin'); ?>

<section class="footer-sec bg-[#FCFCFC] ">
    <div class="container mx-auto">
        <div class="footer-main">
            <div class="footer-detail w-full md:w-[30%]">
                <a href="<?php echo home_url(); ?>">
                    <figure class="rounded-none m-0 w-[200px] h-fit md:w-[281px]">
                        <?php if (function_exists('logo_url')) {
                            if (is_file(realpath($_SERVER["DOCUMENT_ROOT"]) . parse_url(logo_url())['path'])) {
                                echo '<img class="w-full object-cover" src="' . logo_url() . '" alt="logo" />';
                            } else {
                                echo '<span class="w-full object-cover">' . get_bloginfo('name') . '</span>';
                            }
                        } else {
                            echo '<span class="w-full object-cover">' . get_bloginfo('name') . '</span>';
                        } ?>
                    </figure>
                </a>
                <?php if(!empty($footer_text)) echo '<p class="footer-desc">'.$footer_text.'</p>';?>
                <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false) || (!empty($linkedin) && (filter_var($linkedin, FILTER_VALIDATE_URL) !== false))) :
                    echo '<div class="icon-sec">';
                        if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false)){ ?>
                            <a class="icon-box group" href="<?php echo $facebook; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="website_Link">
                                <svg class="group-hover:fill-[#FCFCFC]" width="14" height="16" viewBox="0 0 8 14" fill="#686868" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.33366 8.00065H7.00033L7.66699 5.33398H5.33366V4.00065C5.33366 3.31398 5.33366 2.66732 6.66699 2.66732H7.66699V0.427318C7.44966 0.398651 6.62899 0.333984 5.76233 0.333984C3.95233 0.333984 2.66699 1.43865 2.66699 3.46732V5.33398H0.666992V8.00065H2.66699V13.6673H5.33366V8.00065Z" fill="" />
                                </svg>
                            </a>
                        <?php }
                        if (!empty($linkedin) && (filter_var($linkedin, FILTER_VALIDATE_URL) !== false)){ ?>
                            <a class="icon-box group" href="<?php echo $linkedin; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="website_Link">
                                <svg class="group-hover:fill-[#FCFCFC]" width="16" height="16" viewBox="0 0 14 12" fill="#686868" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.62764 1.33394C3.62739 1.87681 3.29804 2.36533 2.79488 2.56914C2.29172 2.77295 1.71523 2.65135 1.33725 2.26168C0.959271 1.87201 0.855284 1.29208 1.07432 0.795364C1.29336 0.298644 1.79168 -0.0156827 2.3343 0.000603968C3.05502 0.0222373 3.62796 0.612897 3.62764 1.33394ZM3.66764 3.65394H1.00097V12.0006H3.66764V3.65394ZM7.88098 3.65394H5.22764V12.0006H7.85432V7.62058C7.85432 5.18058 11.0343 4.95392 11.0343 7.62058V12.0006H13.6677V6.71392C13.6677 2.6006 8.96099 2.75394 7.85432 4.77392L7.88098 3.65394Z" fill="" />
                                </svg>
                            </a>
                        <?php }
                    echo '</div>';
                endif; ?>
            </div>
            <div class="footer-list-sec md:w-[35%] mt-8 md:mt-0">
                <?php if (isset(get_nav_menu_locations()['footer-menu'])) :
                    echo '<div class="footer-box-sec">';
                        $useful_menu = get_term(get_nav_menu_locations()['footer-menu'], 'nav_menu');
                        $useful_menu_items = wp_get_nav_menu_items($useful_menu->term_id);
                        echo '<h2 class="footer-list-title">' . $useful_menu->name . '</h1>';
                        echo '<ul class="footer-list-box">';
                            foreach ($useful_menu_items as $menu_item) :
                                $parent_ID = $menu_item->ID;
                                if ($menu_item->menu_item_parent == 0) :
                                    echo '<li><a href="' . $menu_item->url . '" class="footer-list nav-hov">' . $menu_item->title . '</a></li>';
                                endif;
                            endforeach;
                        echo '</ul>';
                    echo '</div>';
                endif; ?>
                <?php if (isset(get_nav_menu_locations()['useful-menu'])) :
                    echo '<div class="footer-box-sec">';
                        $useful_menu = get_term(get_nav_menu_locations()['useful-menu'], 'nav_menu');
                        $useful_menu_items = wp_get_nav_menu_items($useful_menu->term_id);
                        echo '<h2 class="footer-list-title">' . $useful_menu->name . '</h1>';
                        echo '<ul class="footer-list-box">';
                            foreach ($useful_menu_items as $menu_item) :
                                $parent_ID = $menu_item->ID;
                                if ($menu_item->menu_item_parent == 0) :
                                    echo '<li><a href="' . $menu_item->url . '" class="footer-list nav-hov">' . $menu_item->title . '</a></li>';
                                endif;
                            endforeach;
                        echo '</ul>';
                    echo '</div>';
                endif; ?>
            </div>
            <div class="footer-subscribe-sec md:w-[25%] mt-8 md:mt-0">
                <h2 class="footer-list-title">Newsletter</h2>
                <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
            </div>
        </div>
        <div class="copyright-wrapper copyright-sec">
            <p class="copyright">
                <svg class="pt-[1px]" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 0.5C3.86463 0.5 0.5 3.86463 0.5 8C0.5 12.1354 3.86463 15.5 8 15.5C12.1354 15.5 15.5 12.1354 15.5 8C15.5 3.86463 12.1354 0.5 8 0.5ZM8 1.65385C11.5111 1.65385 14.3462 4.48888 14.3462 8C14.3462 11.5111 11.5111 14.3462 8 14.3462C4.48888 14.3462 1.65385 11.5111 1.65385 8C1.65385 4.48888 4.48888 1.65385 8 1.65385ZM7.94591 4.53846C6.02809 4.53846 4.48438 6.08218 4.48438 8C4.48438 9.91782 6.02809 11.4615 7.94591 11.4615C9.32963 11.4615 10.5128 10.6322 11.0649 9.46034L10.0192 8.97356C9.64739 9.76457 8.86989 10.3077 7.94591 10.3077C6.63206 10.3077 5.63822 9.31385 5.63822 8C5.63822 6.68615 6.63206 5.69231 7.94591 5.69231C8.86989 5.69231 9.64739 6.23543 10.0192 7.02644L11.0649 6.53966C10.5128 5.36779 9.32963 4.53846 7.94591 4.53846Z" fill="#141414"></path>
                </svg>
                <?php echo date('Y'); ?>&nbsp;<a href="<?php echo home_url(); ?>" class="hover:text-primary transition"><?php echo get_bloginfo( 'name' ); ?></a>.
            </p>
            <p class="copyright">All Rights Reserved</span></a>.</p>
        </div>
    </div>
</section>


<?php wp_footer();?>


<script>
    //  trail js for mentioner JScode
    var currentImg = undefined,
        currentImgProps = {
            x: 0,
            y: 0
        },
        isZooming = false,
        column = -1,
        mouse = {
            x: 0,
            y: 0
        },
        delayedPlay;

    for (var i = 0; i < 12; i++) {
        if (i % 4 == 0) column++;
        var b = document.createElement('div');
        $('.mainBoxes').append(b);

        gsap.set(b, {
            attr: {
                id: 'b' + i,
                class: 'photoBox pb-col' + column
            },
            backgroundImage: 'url(<?php echo get_template_directory_uri(); ?>/assets/slide/' + i + '.png)',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            // overflow: 'hidden',
            x: [-100, 120, 340][column],
            width: 400,
            height: 640,
            borderRadius: 20,
            scale: 0.5,
            zIndex: 1
        });

        b.tl = gsap.timeline({
                paused: true,
                repeat: -1
            })
            .fromTo(b, {
                y: [-575, 800, 800][column],
                rotation: -0.05
            }, {
                duration: [40, 35, 26][column],
                y: [800, -575, -575][column],
                rotation: 0.05,
                ease: 'none'
            })
            .progress(i % 4 / 4)
    }

    function pauseBoxes(b) {
        var classStr = 'pb-col0';
        if ($(b).hasClass('pb-col1')) classStr = 'pb-col1';
        if ($(b).hasClass('pb-col2')) classStr = 'pb-col2';
        for (var i = 0; i < $('.mainBoxes').children().length; i++) {
            var b = $('.mainBoxes').children()[i];
            if ($(b).hasClass(classStr)) gsap.to(b.tl, {
                timeScale: 0,
                ease: 'sine'
            });
        }
    }

    function playBoxes() {
        for (var i = 0; i < $('.mainBoxes').children().length; i++) {
            var tl = $('.mainBoxes').children()[i].tl;
            tl.play();
            gsap.to(tl, {
                duration: 0.4,
                timeScale: 1,
                ease: 'sine.in',
                overwrite: true
            });
        }
    }

    window.onload = function() {

        var _tl = gsap.timeline({
                onStart: playBoxes
            })
            .set('.main', {
                perspective: 800
            })
            .set('.photoBox', {
                opacity: 1,
                cursor: 'pointer'
            })
            .set('.mainBoxes', {
                left: '0%',
                xPercent: 1,
                width: '1200px',
                rotationX: 2,
                rotationY: 360,
                rotationZ: -9,
            })

            .set('.mainClose', {
                autoAlpha: 0,
                width: 60,
                height: 60,
                left: 30,
                top: 31,
                pointerEvents: 'none'
            })
            .fromTo('.main', {
                autoAlpha: 0
            }, {
                duration: 0.6,
                ease: 'power2.inOut',
                autoAlpha: 1
            }, 0.2)

        $('.photoBox').on('mouseenter', function(e) {
            console.log($(e.currentTarget).hasClass('pb-col0'))
            if (currentImg) return;
            if (delayedPlay) delayedPlay.kill();
            pauseBoxes(e.currentTarget);
            var _t = e.currentTarget;
            gsap.to('.photoBox', {
                duration: 0.2,
                overwrite: 'auto',
                opacity: function(i, t) {
                    return (t == _t) ? 1 : 0.33
                }
            });
            gsap.fromTo(_t, {
                zIndex: 100
            }, {
                duration: 0.2,
                scale: 0.62,
                overwrite: 'auto',
                ease: 'power3'
            });
        });

        $('.photoBox').on('mouseleave', function(e) {
            if (currentImg) return;
            var _t = e.currentTarget;

            if (gsap.getProperty(_t, 'scale') > 0.62) delayedPlay = gsap.delayedCall(0.3, playBoxes); // to avoid jump, add delay when mouseout occurs as big image scales back down (not 100% reliable because the scale value sometimes evaluates too late)
            else playBoxes();

            gsap.timeline()
                .set(_t, {
                    zIndex: 1
                })
                .to(_t, {
                    duration: 0.3,
                    scale: 0.5,
                    overwrite: 'auto',
                    ease: 'expo'
                }, 0)
                .to('.photoBox', {
                    duration: 0.5,
                    opacity: 1,
                    ease: 'power2.inOut'
                }, 0);
        });

        $('.photoBox').on('click', function(e) {
            if (!isZooming) { //only tween if photoBox isn't currently zooming

                isZooming = true;
                gsap.delayedCall(0.8, function() {
                    isZooming = false
                });

                if (currentImg) {
                    gsap.timeline({
                            defaults: {
                                ease: 'expo.inOut'
                            }
                        })
                        .to('.mainClose', {
                            duration: 0.1,
                            autoAlpha: 0,
                            overwrite: true
                        }, 0)
                        .to('.mainBoxes', {
                            duration: 0.5,
                            scale: 1,
                            left: '0%',
                            width: '1220px',
                            rotationX: 2,
                            rotationY: 360,
                            rotationZ: -9,
                            overwrite: true
                        }, 0)
                        .to('.photoBox', {
                            duration: 0.6,
                            opacity: 1,
                            ease: 'power4.inOut'
                        }, 0)
                        .to(currentImg, {
                            duration: 0.6,
                            width: 400,
                            height: 640,
                            borderRadius: 20,
                            x: currentImgProps.x,
                            y: currentImgProps.y,
                            scale: 0.5,
                            rotation: 0,
                            zIndex: 1
                        }, 0)
                    // .add(playBoxes, 0.8)
                    currentImg = undefined;
                } else {
                    pauseBoxes(e.currentTarget)

                    currentImg = e.currentTarget;
                    currentImgProps.x = gsap.getProperty(currentImg, 'x');
                    currentImgProps.y = gsap.getProperty(currentImg, 'y');

                    gsap.timeline({
                            defaults: {
                                duration: 0.6,
                                ease: 'expo.inOut'
                            }
                        })
                        .set(currentImg, {
                            zIndex: 100
                        })
                        .fromTo('.mainClose', {
                            x: mouse.x,
                            y: mouse.y,
                            background: 'rgba(0,0,0,0)'
                        }, {
                            autoAlpha: 1,
                            duration: 0.3,
                            ease: 'power3.inOut'
                        }, 0)
                        .to('.photoBox', {
                            opacity: 0
                        }, 0)
                        .to(currentImg, {
                            width: '100%',
                            height: '100%',
                            borderRadius: 0,
                            x: 0,
                            top: 0,
                            y: 0,
                            scale: 1,
                            opacity: 1
                        }, 0)
                        .to('.mainBoxes', {
                            duration: 0.5,
                            left: '0%',
                            width: '100%',
                            rotationX: 0,
                            rotationY: 0,
                            rotationZ: 0
                        }, 0.15)
                        .to('.mainBoxes', {
                            duration: 5,
                            scale: 1.06,
                            rotation: 0.05,
                            ease: 'none'
                        }, 0.65)
                }
            }
        });

        if (!!('ontouchstart' in window)) {
            console.log('touch device!')
            mouse.x = window.innerWidth - 50;
            mouse.y = 60;
        } else {
            $('.main').on('mousemove', function(e) {
                mouse.x = e.x;
                mouse.y = e.layerY;
                if (currentImg) gsap.to('.mainClose', {
                    duration: 0.1,
                    x: mouse.x,
                    y: mouse.y,
                    overwrite: 'auto'
                });
            });
        }

    }

    //  trail js for mentioner JScode

    //  search button trial test  
    jQuery(document).ready(function() {
        $('.popup-btn').click(function(e) {
            $('.popup-wrap').fadeIn(500);
            $('.popup-box').removeClass('transform-out').addClass('transform-in');

            e.preventDefault();
        });

        $('.popup-close').click(function(e) {
            $('.popup-wrap').fadeOut(500);
            $('.popup-box').removeClass('transform-in').addClass('transform-out');

            e.preventDefault();
        });
    });

    // nav bar toggle hover and  on click

    var menus = document.querySelectorAll(".mobile-ham-accordion");
    menus.forEach(function(menu) {
        menu.addEventListener("click", togglePanel);
        menu.addEventListener("mouseover", togglePanel);
    });

    function togglePanel() {
        this.classList.toggle("active");
        var newPanel = this.nextElementSibling;
        newPanel.style.maxHeight = newPanel.style.maxHeight ?
            null :
            newPanel.scrollHeight + "100%";
    }


    // Setup Variables 
    const setHeight = 100;
    const numBoxes = document.querySelectorAll(".box").length;

    gsap.set(".box", {
        y: (i) => i * setHeight,
    });

    // Gsap Time //
    const totalHeight = numBoxes * setHeight;
    const wrapOffsetTop = setHeight / -2;
    const wrapOffsetBottom = totalHeight + wrapOffsetTop;
    var wrap = gsap.utils.wrap(wrapOffsetTop, wrapOffsetBottom);
    const yheight = "+=" + totalHeight * -1;
    // console.log("Num Boxes: " + numBoxes +". Total Box Height: " +totalHeight);

    tl = gsap.timeline();
    tl.to(".box", {
        duration: 5,
        ease: "none",
        y: yheight,
        modifiers: {
            y: gsap.utils.unitize(wrap),
        },
        repeat: -1,
    });


    // about section counter js code  start  

    $(document).ready(function() {
        function animateCounter(selector, targetNumber, duration) {
            $(selector).animate({
                counter: targetNumber,
            }, {
                duration: duration,
                step: function(counter) {
                    $(this).text(Math.ceil(counter));
                },
                complete: function() {
                    $(this).text(targetNumber);
                },
            });
        }

        // Call the function for each counter
        animateCounter("#counter", 500, 5000);
        animateCounter("#one", 5000, 5000);
        animateCounter("#tow", 16, 5000);
    });

    // progress  bar showing

    function progressBarScroll() {
        document.getElementById("myDIV").classList.remove("whiteBg");;
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop,
            height = document.documentElement.scrollHeight - document.documentElement.clientHeight,
            scrolled = (winScroll / height) * 100;
        console.log(scrolled);
        document.getElementById("progressBar").style.top = scrolled + "%";
    }

    window.onscroll = function() {
        progressBarScroll();
    };
    // hamburger-menu


    // let hamList = document.querySelectorAll(".ham-links");
    var menus = document.querySelectorAll('.ham-accordion');
    menus.forEach(function(menu) {
        menu.addEventListener("click", function() {
            this.classList.toggle("active");
            var newPanel = this.nextElementSibling;
            newPanel.classList.toggle("pt-4");
            if (newPanel.style.maxHeight) {
                newPanel.style.maxHeight = null;
            } else {
                newPanel.style.maxHeight = newPanel.scrollHeight + 16 + "px";
                // hamList.style.color = "#FFFFFF";
            }
        });
    });

    // about section counter js code end  
</script>

<!-- <script>
    $(document).ready(function() {
        $(".header-button, .close").click(function() {
            $(".megamenu").toggleClass("menudisplay menuhide");

        })
    })
</script> -->




</body>

</html>