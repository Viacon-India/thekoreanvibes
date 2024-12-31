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

    // Animated Favicon
    var facicon_src = $('link[rel="icon"]').attr('href');
    facicon_src = facicon_src.replace('0.png', '');
    let counter = 0;
    setInterval(function() {
      counter = (counter + 1) % 7;
      let newFavicon = facicon_src + counter + '.png';
      $('link[rel="icon"]').attr('href', newFavicon);
    }, 400);

    // HamBurger Menu
    $('.ham-dropdown').click(function() {
        $(".ham-dropdown").toggleClass("change-icon");
        $(".ham-content").toggleClass("change");

    })
    $('.search-btn').click(function() {
        $(".search-btn").toggleClass("change-search");
        $(".popup-box").toggleClass("change");
    })


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


    $(".banner-wrapper .es_subscription_form span.es_spinner_image").addClass("left-[120%] self-center bottom-[10%] translate-x-[-120%] pl-[38px] bg-[#ED1B1B]").width($('.banner-wrapper .es_subscription_form input[type="submit"]').width()).empty().append('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="34px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><circle cx="50" cy="50" fill="none" stroke="#FFFFFF" stroke-width="10" r="30" stroke-dasharray="141.37166941154067 49.12388980384689"><animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1.5384615384615383s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform></circle></svg>').parent().addClass("w-full relative");


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

    // Add Alt Tag To Img Script
    let images = document.getElementsByTagName("img");
    for (var i = 0; i < images.length; i++) addAlt(images[i]);
    function addAlt(el) {
        if (el.getAttribute("alt")) return;
        url = el.src;
        let filename = url.substring(url.lastIndexOf("/") + 1);
        if (!filename) {
            filename = "insightsofamerica-img";
        }
        filename = filename.split(".").slice(0, -1).join(".");
        el.setAttribute("alt", filename);
    }

});