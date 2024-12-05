<?php /* Template Name: Contact Page Template */ ?>

<?php get_header();

while(have_posts()) : the_post(); ?>
    <section class="contact-us-section">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row max-w-[1261px] mx-auto gap-[148px]">
            <div class="w-1/2">
                <p class="say-hello">SAY HELLO!</p>
                <h2 class="lets-talk-about"><?php echo strip_tags(get_the_title()); ?></h2>
            </div>
            <div class="w-1/2">
                <div class="contact"><?php the_content(); ?></div>
                <!-- <form action="" class="flex flex-col gap-4">
                    <input type="text" name="email" class="from-input-filed" placeholder="YOUR SUBJECT" />
                    <input type="email" name="email" class="from-input-filed" placeholder="E-MAIL ADDRESS" />
                    <input type="email" name="email" class="from-input-filed" placeholder="YOUR SUBJECT" />
                    <input type="email" name="email" class="from-input-filed" font-Chai placeholder="WRITE YOUR MESSAGE" />
                </form>

                <div class="send-request-wrapper mt-[64px]">
                    <button type="button" class="send-request">SEND REQUEST</button>
                </div>
                <div class="if-there-are-container mt-4">
                    <span class="if-there-are">If there are any queries related to any article, advertisement, and
                        guest post, you can contact us using the Contact Us Form. You can
                        simply reach out to us by email at</span>
                    <span> </span>
                    <a class="mediaredhatmedianet" href="mailto:media@redhatmedia.net" target="_blank">
                        <span>
                            <span class="mediaredhatmedianet1">media@redhatmedia.net</span>
                        </span>
                    </a>
                    <span>.</span>
                    <span class="if-there-are">
                        We will be on our toes to give you a suitable response.
                    </span>
                </div> -->
            </div>
        </div>
    </div>
</section>

<?php endwhile;

get_footer(); ?>