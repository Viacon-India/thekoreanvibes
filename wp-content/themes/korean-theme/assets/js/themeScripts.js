if (window.location.hash) {
    var hash = window.location.hash;
    if ($(hash).length) {
        if(hash.includes('#comment')){
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 2000, 'swing');
        }
    }
}

jQuery(document).ready(function($) {

    // Share Button Function
    $("button.share-icon").click(function(){
        window.open( jQuery(this).data('link') , '_blank', 'rel=noopener noreferrer nofollow');
    });
    

    // Share Button
    $("button.share_more").click(function(){
        shareData = {
            title: jQuery(this).data('post_title'),
            text: jQuery(this).data('post_text'),
            url: jQuery(this).data('post_url'),
        };
        navigator.share(shareData);
    });

    $(".header-main-li").hover(function(){
        $('.bg-splitter span').css("background-color", $(this).data('color'));
        $('.header-main-li a').css({ 'color': $(this).data('text')});
    },
    function(){
        $('.bg-splitter span').css("background-color", "#101010");
        $('.header-main-li a').css({ 'color': ''});
    });


    // Table of Content
    let $content_title = $('.internal-content h2, .internal-content h3, .internal-content h4');
    $(window).scroll(function() {
        let $toc_title = $content_title.filter((i, el) => $(el).offset().top > $(window).scrollTop()).first();
        $("#toc a").not(this).parent().removeClass('toc-ul-li-active');
        $('#toc-'+$toc_title.prop('id')).parent().addClass('toc-ul-li-active');
    }).scroll();

    $('#toc a[href*="#"]').click(function(event) {
        var post_url = $(this).attr('href').split('#')[0];
        if(window.location == post_url){
            event.preventDefault();
        }
        var target = $(this.hash);
        $('html,body').stop().animate({
            scrollTop: target.offset().top - 100
        }, 2000 ,'swing'); 
    });


    if ($(".inner-content-sec img, .review-box img" ).parent().is( ".wp-block-image " )) {
        $(".inner-content-sec img, .review-box img").unwrap();
    }
    if ($(".inner-content-sec img, .review-box img" ).parent().is( "p" )) {
        $(".inner-content-sec img, .review-box img").unwrap();
    }
    if ($(".inner-content-sec img, .review-box img" ).parent().is( ".wp-block-image" )) {
        $(".inner-content-sec img, .review-box img").unwrap();
    }

    $(".comment .comment-form input[name='author']").attr({placeholder:"Your Name"});
    $(".comment .comment-form input[name='email']").attr({placeholder:"E-mail Address"});
    $(".comment .comment-form input[name='url']").attr({placeholder:"Website"});
    $(".comment .comment-form textarea").attr({placeholder:"Write Your Comment"});
    $('#reply-title').text('Leave a comment on this article')
    $('p.comment-form-author, p.comment-form-email, p.comment-form-url').wrapAll('<div class="flex flex-col gap-4 order-2" />')

    // // Footer Description Link
    // $('.footer-desc a').attr({href:''+$('.footer-desc').data('url')+'', class:'text-primary'});

    //Subscription
    // $('.banner-wrapper .es_subscription_form input[name="esfpx_email"]').addClass( "input w-full max-w-xs");
    // $('.banner-wrapper .es_subscription_form input[type="submit"]').addClass( "email-button");
    // $('.banner-wrapper .es_subscription_form input[type="submit"]').width($('.banner-wrapper .es_subscription_form input[type="submit"]').outerHeight()+33);
    $(".banner-wrapper .es_subscription_form span.es_spinner_image").addClass("left-[120%] self-center bottom-[10%] translate-x-[-120%] pl-[38px] bg-[#ED1B1B]").width($('.banner-wrapper .es_subscription_form input[type="submit"]').width()).empty().append('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="34px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" fill="none" stroke="#FFFFFF" stroke-width="10" r="30" stroke-dasharray="141.37166941154067 49.12388980384689"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5384615384615383s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform></circle></svg>').parent().addClass("w-full relative");


    // //Menu
    // $(".navbar-center .center-dropdown li").removeClass("nav-drop");
    // $(".navbar-center .center-dropdown a").addClass("drop-list").removeClass("nav-links nav-hov group");
    // $(".navbar-center li.menu-item-has-children a").not("a.drop-list").append('<svg class="nav-arrow" width="10" height="6" viewBox="0 0 10 6" fill="#333333" xmlns="http://www.w3.org/2000/svg"><path d="M5.00045 3.44752L8.30032 0.147705L9.24312 1.09051L5.00045 5.33319L0.757812 1.09051L1.70063 0.147705L5.00045 3.44752Z" fill="" /></svg>');


    // // $(".dropdown .sub-menu").removeClass("center-dropdown").addClass("submenu-dropdown");
    // // $(".dropdown .submenu-dropdown a").addClass("dropdown-options").removeClass("ham-links");
    // // $(".dropdown li.menu-item-has-children a").not("a.dropdown-options").append('<a href="#"><svg class="fill-[#333333] rotate-90" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg></a>');

    // $(".dropdown .sub-menu").removeClass("center-dropdown").addClass("panel");
    // $(".dropdown .panel a").addClass("dropdown-options").removeClass("accordion");
    // $(".dropdown li.menu-item-has-children a").not("a.dropdown-options").append('<a href="#"><svg class="fill-[#333333] rotate-90" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg></a>');


    // // //Active Menu
    // // $(".menu-horizontal .current-menu-item a, .menu-horizontal .current-menu-parent a").not("a.dropdown-options").parent().addClass("items-active");


    // // Post Content
    // $(".content figure.wp-block-table, .content div.wp-block-image").children().unwrap();
    // if ($(".content img" ).parent().is( ".content figure" )) {
    //     $(".content img").unwrap();
    //     if ($(".content img" ).parent().is( ".content div.wp-block-image" )) {
    //         $(".content img").unwrap();
    //         if ($(".content img" ).parent().is( ".content div.wp-block-image" )) {
    //             $(".content img").unwrap();
    //         }
    //     }
    // }
    // $(".content img").addClass( "inner-img").wrap('<figure class="mb-4 w-full h-fit" />');
    // $(".content p").not("div.wpcf7 p").addClass( "inner-detail" );
    // $(".content h2").not("div.wpcf7 h2").addClass( "inner-title-h2" );
    // $(".content h3").not("div.wpcf7 h3").addClass( "inner-title-h3" );
    // $(".content h4").not("div.wpcf7 h4").addClass( "inner-title-h4" );
    // $(".content h5").not("div.wpcf7 h5").addClass( "inner-title-h5" );
    // $(".content ul").not("div.wpcf7 ul").addClass( "pl-4 lg:pl-6 mb-6 list-disc" );
    // $(".content ol").not("div.wpcf7 ol").addClass( "pl-4 lg:pl-6 mb-6 list-decimal" );
    // $(".content li").not("div.wpcf7 li").addClass( "inner-detail-li" );
    // $(".content a").not("div.wpcf7 a").addClass( "underline underline-offset-2 transition hover:text-primary" );
    // $(".content table").wrap("<div class='overflow-x-auto mt-2 mb-6' />");
    // $('.content h2 b, .content h3 b, .content h4 b, .content h5 b, .content h2 strong, .content h3 strong, .content h4 strong, .content h5 strong').contents().unwrap();


    // //About Content
    // $(".about p").not(".wpcf7 p").addClass( "inner-detail" );
    // $(".about h2").not(".wpcf7 h2").addClass( "inner-title-h2" );
    // $(".about h3").not(".wpcf7 h3").addClass( "inner-title-h3" );
    // $(".about h4").not(".wpcf7 h4").addClass( "inner-title-h4" );
    // $(".about h5").not(".wpcf7 h5").addClass( "inner-title-h5" );
    // $(".about ul").not(".wpcf7 ul").addClass( "pl-4 lg:pl-6 mb-6 list-disc" );
    // $(".about ol").not(".wpcf7 ol").addClass( "pl-4 lg:pl-6 mb-6 list-decimal" );
    // $(".about li").not(".wpcf7 li").addClass( "inner-detail-li" );
    // $(".about a").not(".wpcf7 a").addClass( "underline underline-offset-2 transition hover:text-primary" );
    

    // //Write For us Content
    // $(".note-box ul").addClass("flex flex-col gap-4 pl-7");
    // $(".note-box li").addClass("note-list");

    // //About Content---Contact page
    // $(".about .wpcf7-form p label").addClass( "contact-label")
    // $(".about .wpcf7-form p input.wpcf7-text, .about .wpcf7-form p textarea.wpcf7-textarea").addClass( "contact-input").unwrap().unwrap().parent().addClass("w-full").parent();
    // $(".about .wpcf7-form input[type='email']").parent().parent().addClass("flex gap-6 md:gap-10 flex-col md:flex-row");
    // $(".about .wpcf7-form input[type='submit']").addClass( "contact-btn cursor-pointer");
    // $(".about form.wpcf7-form").addClass("form-sec mt-[36px] xl:mt-[60px] flex flex-col gap-6 md:gap-8");
    // $(".about form.wpcf7-form br").remove();
    // $(".about .wpcf7-form span.wpcf7-spinner").addClass("absolute left-[48.5%] top-[47%] translate-x-[-48.5%] bg-transparent").append('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="34px" viewBox="16 15 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="30" stroke-dasharray="141.37166941154067 49.12388980384689"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5384615384615383s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform></circle></svg>').parent().addClass("w-full relative");
    // $(".about form.wpcf7-form").submit(function(){
    //     $(".about .wpcf7-form input[type='submit']").val("");
    // });
    
    
    // // //Comment Section
    // $(".comment a").addClass("underline underline-offset-2 transition hover:text-primary");
    // $(".comment h3.comment-reply-title").contents().unwrap().wrapAll('<h1 class="comment-title"></h1>');
    // $(".comment .comment-form-comment textarea").attr({rows:"8", cols:"50", placeholder:"Enter your comment here"}).addClass( "c-input !w-full").parent().parent().addClass("flex flex-col");
    // $(".comment .comment-form input[name='author'], .comment .comment-form input[name='url'], .comment .comment-form input[name='email']").addClass("c-input !w-full").parent().wrapAll('<div class="flex flex-col md:flex-row gap-[14px] pt-[14px]" />');
    // $(".comment .comment-form label, .comment .comment-form input[name='url']").not('.comment-form-cookies-consent label').remove();
    // $(".comment .comment-form input[name='author']").attr({placeholder:"Your name*"});
    // $(".comment .comment-form input[name='email']").attr({placeholder:"Your E-mail*"});
    // $(".comment .form-submit input.submit").addClass("learn-more cursor-pointer").parent().addClass("flex justify-start mt-4 md:mt-7");
    // $(".comment p.comment-notes, .comment p.logged-in-as").contents().unwrap().wrapAll('<h2 class="author-title-2"></h2>');
    // $(".comment p.comment-form-cookies-consent label").addClass("comment-title-2").parent().addClass("flex items-center gap-2 pt-[22px]");


    //External link open in new tab
    $('a').each(function() { 
        var a = new RegExp('/' + window.location.host + '/');
        if (this.href && !a.test(this.href)) {
            $(this).click(function(event) {
            event.preventDefault();
            event.stopPropagation();
            window.open(this.href, '_blank');
            });
        }
    });
});