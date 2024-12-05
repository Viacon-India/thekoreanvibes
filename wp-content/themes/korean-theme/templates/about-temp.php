<?php /* Template Name: About Page Template */ ?>

<?php get_header();

while(have_posts()) : the_post(); ?>


    <section class="about-page-main">
        <div class=" container mx-auto">
            <div class="about-page-wrapper">

                <h1 class="about-title">
                    <?php echo strip_tags(get_the_title()); ?>
                </h1>

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