<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Dekko&display=swap" rel="stylesheet">

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-8WT2JGFQD1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-8WT2JGFQD1');
  </script>

  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9502972669695969" crossorigin="anonymous"></script>

  <meta name="spr-verification" content="85fc792d2fa829q" />
  <meta name='outreach_verification' content='NoDnv4AcR5cvAxE4ruFh' />
  <meta name="linkdoozer-verification" content="22660863-97ad-4f8d-8d8d-02a942ad135c" />
  <meta name='linkatomic-verify-code' content='9d70f2901397cf9db182515b1016be9f' />

</head>

<?php
$facebook = get_option('facebook');
$instagram = get_option('instagram'); ?>

<body <?php body_class(); ?>>
  <div class="header">
    <div id="myDIV" class="progress-container whiteBg">
      <div class="progress-bar" id="progressBar"></div>
    </div>
  </div>

  <header>
    <nav class="c-navbar bg-base-100  border-b z-10">
      <div class="container mx-auto flex">
        <div class="flex flex-1 items-center">
          <a href="<?php echo home_url(); ?>">
            <figure class="logo-img-controller">
              <?php if (function_exists('logo_url')) {
                if (is_file(realpath($_SERVER["DOCUMENT_ROOT"]) . parse_url(logo_url())['path'])) {
                  echo '<img class="w-full h-full object-cover" src="' . logo_url() . '" alt="logo" />';
                } else {
                  echo '<span class="w-full h-full object-cover">' . get_bloginfo('name') . '</span>';
                }
              } else {
                echo '<span class="w-full h-full object-cover">' . get_bloginfo('name') . '</span>';
              } ?>
            </figure>
          </a>
        </div>


        <div class="flex items-center justify-center">
          <button onclick="document.getElementById('myModal').style.display='block'" class="header-button">
            CATEGORIES
          </button>
        </div>
      </div>
    </nav>
    <div id="myModal" style="width:100% !important; display:none">
      <div class="backmenu">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>

      <div class="modal-content">
        <div class="container mx-auto modal-content-container">
          <div class="toggle-cut text-2xl ">
            <span onclick="document.getElementById('myModal').style.display='none'" class="close cursor-pointer font-Chai text-primary">
              CLOSE
            </span>
          </div>
          <div class="mx-auto w-full h-full mt-[25px] lg:mt-[25px] xl:mt-[30px] 2xl:mt-[45px] 3xl:mt-[55px] flex flex-col justify-between">

            <div class="desktop-menu-wrapper">
              <ul class="flex w-full justify-between z-1">
                <?php if (isset(get_nav_menu_locations()['header-menu'])) :
                  $header_menu = get_term(get_nav_menu_locations()['header-menu'], 'nav_menu');
                  $header_menu_items = wp_get_nav_menu_items($header_menu->term_id);
                  foreach ($header_menu_items as $menu_item) :
                    $parent_ID = $menu_item->ID;
                    if ($menu_item->menu_item_parent == 0) :
                      if ($menu_item->type_label == 'Category') {
                        $hex_color_1 = get_term_meta($menu_item->object_id, 'hex_code_1', true);
                        if (empty($hex_color_1) && !empty($menu_item->post_parent)) {
                          $hex_color_1 = get_term_meta($menu_item->post_parent, 'hex_code_1', true);
                        }
                        $hex_color_5 = get_term_meta($menu_item->object_id, 'hex_code_5', true);
                        if (empty($hex_color_5) && !empty($menu_item->post_parent)) {
                          $hex_color_5 = get_term_meta($menu_item->post_parent, 'hex_code_5', true);
                        }
                      } else {
                        $hex_color_1 = '#ED1B1B';
                        $hex_color_5 = '#FFFFFF';
                      } ?>
                      <li class="header-main-li" data-color="<?php echo $hex_color_1; ?>" data-text="<?php echo $hex_color_5; ?>">
                        <a href="<?php echo $menu_item->url; ?>" class="header-nav-title transition duration-500">
                          <?php echo $menu_item->title; ?>
                        </a>
                        <ul class="header-sub-ul">
                          <?php foreach ($header_menu_items as $menu_child_item) :
                            if ($menu_child_item->menu_item_parent == $parent_ID) : ?>
                              <li class="header-sub-ul-li">
                                <a class="header-sub-ul-li-a transition duration-500" href="<?php echo $menu_child_item->url; ?>"><?php echo $menu_child_item->title; ?></a>
                              </li>
                          <?php endif;
                          endforeach; ?>
                        </ul>
                      </li>
                    <?php endif;
                  endforeach;
                endif; ?>
              </ul>
            </div>

            <div class="mobile-menu-wrapper">
              <div class="mobile-ham">
                <?php if (isset(get_nav_menu_locations()['header-menu'])) :
                    $header_menu = get_term(get_nav_menu_locations()['header-menu'], 'nav_menu');
                    $header_menu_items = wp_get_nav_menu_items($header_menu->term_id);
                    $menu_items_with_children = array();
                    foreach ($header_menu_items as $menu_item) {
                      if ($menu_item->menu_item_parent && !in_array($menu_item->menu_item_parent, $menu_items_with_children)) {
                        array_push($menu_items_with_children, $menu_item->menu_item_parent);
                      }
                    }
                    foreach ($header_menu_items as $menu_item) :
                      $parent_ID = $menu_item->ID;
                      if ($menu_item->menu_item_parent == 0) :
                        // if ($menu_item->type_label == 'Category') {
                        //   $hex_color_1 = get_term_meta($menu_item->object_id, 'hex_code_1', true);
                        //   if (empty($hex_color_1) && !empty($menu_item->post_parent)) {
                        //     $hex_color_1 = get_term_meta($menu_item->post_parent, 'hex_code_1', true);
                        //   }
                        //   $hex_color_5 = get_term_meta($menu_item->object_id, 'hex_code_5', true);
                        //   if (empty($hex_color_5) && !empty($menu_item->post_parent)) {
                        //     $hex_color_5 = get_term_meta($menu_item->post_parent, 'hex_code_5', true);
                        //   }
                        // } else {
                        //   $hex_color_1 = '#ED1B1B';
                        //   $hex_color_5 = '#FFFFFF';
                        // }
                        echo '<div class="mobile-ham-list">';
                        if (!in_array($menu_item->ID, $menu_items_with_children)) :
                          echo '<h4 class="mobile-ham-links"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></h4>';
                        else :
                          echo '<h4 class="mobile-ham-links mobile-ham-accordion"><a class="header-nav-title transition duration-500" href="' . $menu_item->url . '">' . $menu_item->title . '</a></h4>';
                          echo '<div class="mobile-ham-submenu newPanel">';
                          foreach ($header_menu_items as $menu_child_item) :
                            if ($menu_child_item->menu_item_parent == $parent_ID) :
                              echo '<a class="mobile-submenu-list" href="' . $menu_child_item->url . '">' . $menu_child_item->title . '</a>';
                            endif;
                          endforeach;
                          echo '</div>';
                        endif;
                        echo '</div>';
                      endif;
                    endforeach;
                  endif; ?>
              </div>
            </div>

            <div class=" flex justify-end">
              <div class=" flex flex-col gap-[40px]">

                <button class="header-bottom-button popup-btn">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.2825 21.2173L17.4075 16.3423H17.355C18.8576 14.5706 19.617 12.2865 19.4742 9.96786C19.3314 7.64917 18.2976 5.4755 16.589 3.90154C14.8804 2.32758 12.6293 1.47527 10.3067 1.52289C7.98414 1.57051 5.76992 2.51437 4.12725 4.15704C2.48459 5.7997 1.54072 8.01392 1.4931 10.3365C1.44549 12.6591 2.2978 14.9102 3.87176 16.6188C5.44571 18.3274 7.61938 19.3612 9.93807 19.504C12.2568 19.6468 14.5408 18.8874 16.3125 17.3848C16.3125 17.3848 16.3125 17.4223 16.3125 17.4373L21.1875 22.3123C21.2573 22.3826 21.3402 22.4384 21.4316 22.4765C21.523 22.5146 21.621 22.5342 21.72 22.5342C21.819 22.5342 21.9171 22.5146 22.0085 22.4765C22.0999 22.4384 22.1828 22.3826 22.2525 22.3123C22.3294 22.2442 22.3915 22.1611 22.435 22.068C22.4784 21.975 22.5023 21.874 22.5051 21.7713C22.5079 21.6687 22.4896 21.5665 22.4513 21.4712C22.413 21.3759 22.3556 21.2895 22.2825 21.2173ZM10.5 17.9998C9.01668 17.9998 7.56663 17.56 6.33326 16.7358C5.0999 15.9117 4.1386 14.7404 3.57094 13.37C3.00329 11.9995 2.85476 10.4915 3.14415 9.03665C3.43354 7.58179 4.14785 6.24542 5.19674 5.19653C6.24563 4.14763 7.58201 3.43333 9.03686 3.14394C10.4917 2.85455 11.9997 3.00307 13.3702 3.57073C14.7406 4.13839 15.912 5.09968 16.7361 6.33305C17.5602 7.56642 18 9.01647 18 10.4998C18 11.4847 17.806 12.46 17.4291 13.37C17.0522 14.2799 16.4998 15.1067 15.8033 15.8031C15.1069 16.4996 14.2801 17.052 13.3702 17.4289C12.4602 17.8058 11.485 17.9998 10.5 17.9998Z" fill="#101010" />
                  </svg>
                  <span class="header-bottom-button-text">
                    SEARCH
                  </span>
                </button>

                <?php if ((!empty($facebook) && filter_var($facebook, FILTER_VALIDATE_URL)) || (!empty($instagram) && filter_var($instagram, FILTER_VALIDATE_URL))) : ?>
                  <ul class="flex gap-5 header-bottom-ul">
                    <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false)) : ?>
                      <li>
                        <a class="header-bottom-ul-li-a" href="<?php echo $facebook; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_Link">FACEBOOK</a>
                      </li>
                    <?php endif;
                    if (!empty($instagram) && (filter_var($instagram, FILTER_VALIDATE_URL) !== false)) : ?>
                      <li>
                        <a class="header-bottom-ul-li-a" href="<?php echo $instagram; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_Link">INSTAGRAM</a>
                      </li>
                    <?php endif; ?>
                  </ul>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php get_template_part('template-parts/search', 'modal'); ?>

  </header>
  <main>