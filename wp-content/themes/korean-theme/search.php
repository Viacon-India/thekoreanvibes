<?php get_header();

$total_post_count = $GLOBALS['wp_query']->found_posts;
$post_count = $GLOBALS['wp_query']->post_count;
$paged = get_query_var('paged');
$post_per_page = get_option('posts_per_page');
$page_count = $GLOBALS['wp_query']->max_num_pages;
$search = get_search_query(); ?>

<section class="search-page">
    <div class="search-banner">
        <div class=" container mx-auto">
            <h2 class="search-banner-title">Results for</h2>
            <form role="search" action="<?php echo home_url(); ?>" class="field">
                <input id="search-banner-input" type="text" name="s" class="search-banner-input" value="<?php the_search_query(); ?>" >
                <span id="eraser" class="icon eraser">
                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.00005 6.5511L14.2222 0.342773L16 2.11657L9.77782 8.32488L16 14.5331L14.2222 16.3069L8.00005 10.0987L1.77778 16.3069L0 14.5331L6.22228 8.32488L0 2.11657L1.77778 0.342773L8.00005 6.5511Z" fill="black" />
                    </svg>
                </span>
            </form>
        </div>
    </div>


    <div class="search-result-sec">
        <div class="container mx-auto">
            <?php if (have_posts()) : ?>
                <div id="load_more_div" class="search-result-sec-inner">
                    <?php while (have_posts()) : the_post();
                        get_template_part('template-parts/search', 'card');
                    endwhile; ?>
                </div>
                <?php if (!($total_post_count<= $post_per_page) && !($paged >= $page_count)) : ?>
                    <span class="hidden" data-paged="<?php echo $paged; ?>" data-page_count="<?php echo $page_count; ?>" data-search="<?php echo $search; ?>" id="load_more" aria-label="More Post">
                        LOAD MORE <span class="screen-reader-text">Details</span>
                    </span>
                    <div class="hidden">
                        <?php the_posts_pagination(array(
                            'mid_size' => 10,
                            'end_size'  => 10,
                            'total' => ceil($post_count / $post_per_page),
                            'prev_text' => '<<',
                            'next_text' => '>>'
                        )); ?>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <p class="condition-msg">Sorry, but nothing matched your search "<capital class="uppercase"><?php echo $search; ?></capital>". Please try again with some different keywords.</p>
            <?php endif; ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>

<script>
    // search query clear
  //Elements            
  const input = document.getElementById("search-banner-input"),
        eraser = document.getElementById("eraser");
  //Eraser
  eraser.addEventListener("click", () => {
      const loop = () => {
          setTimeout(() => {
          input.readOnly = true;
          const value = input.value,
              erased = String(value).substring(0, value.length - 1);
          input.value = erased;
          value.length ? loop() : (input.readOnly = false);
          }, 25);
      };
      loop();
  });
</script>