<?php /* Template Name: Contact Page Template */ ?>

<?php get_header();

while (have_posts()) : the_post(); ?>
    <section class="contact-us-section">
        <div class="about-us-wrapper bg-[#FAC92C] ">
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
                        <h2 class="font-Anton text-[34px] sm:text-[44px] md:text-[54px] lg:text-[64px] xl:text-[74px] 2xl:text-[84px] lg:mb-[22px] lg:leading-[100px]">
                            LET’S TALK ABOUT YOUR QUERIES
                        </h2>
                        <p class="font-Chai text-[18px]">
                            If there are any queries related to any article, advertisement, and guest post, you can contact us using the Contact Us Form. You can simply reach out to us by email at <a href="#">media@redhatmedia.net.</a> We will be on our toes to give you a suitable response.
                        </p>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <figure class="">
                            <img class="w-full object-cover" src="<?php echo get_template_directory_uri(); ?> /assets/images/about-img.png" alt="about-img">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
            <div class="contact lg:px-[120px]"><?php the_content(); ?></div>
        </div>

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

    </section>

<?php endwhile;

get_footer(); ?>