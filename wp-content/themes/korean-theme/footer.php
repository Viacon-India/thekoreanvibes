</main>
<footer class="footer">
    <div class="container mx-auto">

        <div class="flex flex-col w-full gap-[35px] lg:gap-[19rem] z-1">
            <ul class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-[2rem]">
                <?php if (isset(get_nav_menu_locations()['footer-menu'])) :
                    $footer_menu = get_term(get_nav_menu_locations()['footer-menu'], 'nav_menu');
                    $footer_menu_items = wp_get_nav_menu_items($footer_menu->term_id);
                    foreach ($footer_menu_items as $menu_item) :
                        $parent_ID = $menu_item->ID;
                        if ($menu_item->menu_item_parent == 0) :
                            if ($menu_item->type_label == 'Category') {
                                $hex_color_1 = get_term_meta($menu_item->object_id, 'hex_code_1', true);
                                if (empty($hex_color_1) && !empty($menu_item->post_parent)) {
                                    $hex_color_1 = get_term_meta($menu_item->post_parent, 'hex_code_1', true);
                                }
                            } else {
                                $hex_color_1 = '#ED1B1B';
                            } ?>
                            <li class="footer-main-li">
                                <a href="<?php echo $menu_item->url; ?>" class="footer-nav-title" style="color:<?php echo $hex_color_1; ?>;">
                                    <?php echo $menu_item->title; ?>
                                </a>
                                <ul class="footer-sub-ul">
                                    <?php foreach ($footer_menu_items as $menu_child_item) :
                                        if ($menu_child_item->menu_item_parent == $parent_ID) : ?>
                                            <li class="footer-sub-ul-li">
                                                <a class="footer-sub-ul-li-a" href="<?php echo $menu_child_item->url; ?>"><?php echo $menu_child_item->title; ?></a>
                                            </li>
                                    <?php endif;
                                    endforeach; ?>
                                </ul>
                            </li>
                <?php endif;
                    endforeach;
                endif; ?>
            </ul>
            <div class="flex justify-center md:justify-between  w-full relative md:py-[50px] py-[0px]">
                <div class="w-initial md:flex hidden font-Chai text-[16px] lg:text-[20px] font-light flex-wrap">
                    <span class="text-[#303030]">
                        ©<?php echo date('Y'); ?>. All Rights Reserved.
                    </span>
                </div>

                <div class="w-max flex items-center ">
                    <?php if (isset(get_nav_menu_locations()['useful-menu'])) :
                        $useful_menu = get_term(get_nav_menu_locations()['useful-menu'], 'nav_menu');
                        $useful_menu_items = wp_get_nav_menu_items($useful_menu->term_id);
                        foreach ($useful_menu_items as $key => $menu_item) :
                            if ($menu_item->menu_item_parent == 0) :
                                echo ($key) ? '<span class="text-[#ED1B1B] px-1">|</span>' : ''; ?>
                                <a href="<?php echo $menu_item->url; ?>" class="footer-use-full">
                                    <?php echo $menu_item->title; ?>
                                </a>
                    <?php endif;
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>

    <span class="footer-7bt">
        7 BEST THINGS
    </span>

</footer>
<?php wp_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js"></script>


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
            backgroundImage: 'url(https://assets.codepen.io/721952/' + i + '.jpg)',
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

    // about section counter js code end  
</script>

<script>
    $(document).ready(function() {
        $(".header-button, .close").click(function() {
            $(".megamenu").toggleClass("menudisplay menuhide");

        })
    })
</script>



</body>

</html>