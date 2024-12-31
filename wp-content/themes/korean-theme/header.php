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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<?php
$facebook = get_option('facebook');
$instagram = get_option('instagram'); ?>

<body <?php body_class(); ?>>
  <header class="relative">
    <nav class="navbar font-Chai">
      <div class="container mx-auto ">
        <div class="w-full flex justify-between lg:justify-end items-center relative">
          <div class="navbar-start w-fit lg:w-full">
            <a href="<?php echo home_url(); ?>" class="w-fit relative flex">
              <figure class="rounded-none m-0 h-[54px]">
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
          </div>

          <div class="flex relative navbar-end">

            <div class="navbar-center order-2 ml-2 lg:order-none">
              <?php if (isset(get_nav_menu_locations()['header-menu'])) :
                $header_menu = get_term(get_nav_menu_locations()['header-menu'], 'nav_menu');
                $header_menu_items = wp_get_nav_menu_items($header_menu->term_id);
                $menu_items_with_children = array();
                foreach ($header_menu_items as $menu_item) {
                  if ($menu_item->menu_item_parent && !in_array($menu_item->menu_item_parent, $menu_items_with_children)) {
                    array_push($menu_items_with_children, $menu_item->menu_item_parent);
                  }
                }
                echo '<ul class="menu menu-horizontal relative text-lg lg:gap-4 xl:gap-7 hidden lg:flex p-0">';
                foreach ($header_menu_items as $menu_item) :
                  $parent_ID = $menu_item->ID;
                  if ($menu_item->menu_item_parent == 0) :
                    echo '<li class="nav-drop flex-col gap-1 group py-[18px]">';
                    if (!in_array($menu_item->ID, $menu_items_with_children)) :
                      echo '<a href="' . $menu_item->url . '" class="nav-links nav-hov">' . $menu_item->title . '</a>';
                    else :
                      echo '<a href="' . $menu_item->url . '" class="nav-links nav-hov">' . $menu_item->title . '<svg class="self-center" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.7302 5.07458C13.6912 4.98206 13.6006 4.92188 13.5 4.92188L2.50002 4.922C2.39956 4.922 2.30886 4.98218 2.26968 5.07471C2.23061 5.16724 2.25076 5.27429 2.32082 5.34631L7.82082 11.0032C7.86782 11.0515 7.93252 11.0789 8.00002 11.0789C8.06753 11.0789 8.13223 11.0515 8.17922 11.0032L13.6792 5.34619C13.7493 5.27405 13.7693 5.16711 13.7302 5.07458Z" fill="#101010" />
                      </svg></a>';
                      echo '<ul class="center-dropdown">';
                      foreach ($header_menu_items as $menu_child_item) :
                        if ($menu_child_item->menu_item_parent == $parent_ID) :
                          echo '<li><a class="drop-list" href="' . $menu_child_item->url . '">' . $menu_child_item->title . '</a></li>';
                        endif;
                      endforeach;
                      echo '</ul>';
                    endif;
                    echo '</li>';
                  endif;
                endforeach;
                echo '</ul>';
              endif; ?>
              
              <!-- Hamburger Dropdown -->
              <div class="dropdown flex lg:hidden">
                <button class="ham-dropdown lg:hidden ml-[4px]" aria-label="search-button">
                  <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
                </button>
              </div>
              <!-- hamburger-end -->
            </div>
  
            <div class="group flex justify-end items-center w-fit md:ml-[26px] mb-[0px] order-1 lg:order-none">
              <button class="search-btn popup-btn lg:w-[72px]" aria-label="search-button">
                <span class="relative nav-hov text-[#101010] text-[17px] leading-[17px] font-medium hidden lg:flex">SEARCH</span>
                <div class="svg-wrapper hidden lg:flex">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 25 25" fill="#101010">
                    <path d="M19.0358 17.3872L24.0327 22.3828L22.3818 24.0336L17.3862 19.0368C15.5274 20.5269 13.2153 21.3374 10.833 21.334C5.03701 21.334 0.333008 16.63 0.333008 10.834C0.333008 5.03798 5.03701 0.333984 10.833 0.333984C16.629 0.333984 21.333 5.03798 21.333 10.834C21.3364 13.2163 20.5259 15.5283 19.0358 17.3872ZM16.6955 16.5215C18.1761 14.9989 19.003 12.9578 18.9997 10.834C18.9997 6.32132 15.3445 2.66732 10.833 2.66732C6.32034 2.66732 2.66634 6.32132 2.66634 10.834C2.66634 15.3455 6.32034 19.0007 10.833 19.0007C12.9568 19.004 14.9979 18.1771 16.5205 16.6965L16.6955 16.5215Z" fill="" />
                  </svg>
                </div>
                <div class="svg-wrapper flex lg:hidden">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 25" fill="#101010">
                    <path d="M19.0358 17.3872L24.0327 22.3828L22.3818 24.0336L17.3862 19.0368C15.5274 20.5269 13.2153 21.3374 10.833 21.334C5.03701 21.334 0.333008 16.63 0.333008 10.834C0.333008 5.03798 5.03701 0.333984 10.833 0.333984C16.629 0.333984 21.333 5.03798 21.333 10.834C21.3364 13.2163 20.5259 15.5283 19.0358 17.3872ZM16.6955 16.5215C18.1761 14.9989 19.003 12.9578 18.9997 10.834C18.9997 6.32132 15.3445 2.66732 10.833 2.66732C6.32034 2.66732 2.66634 6.32132 2.66634 10.834C2.66634 15.3455 6.32034 19.0007 10.833 19.0007C12.9568 19.004 14.9979 18.1771 16.5205 16.6965L16.6955 16.5215Z" fill="" />
                  </svg>
                </div>
              </button>
            </div>
          </div>
        </div>
      </div>

    </nav>
    <div id="hamMenu" class="lg:hidden">
      <div class="ham-content w-full h-full fixed overflow-y-scroll top-0 pt-16 left-0 bg-[#FFFFFF] translate-y-[-100%] transition-all duration-500 lg:flex z-10">
        <div class="flex flex-col justify-between h-[90vh]">
          <?php if (isset(get_nav_menu_locations()['header-menu'])) :
            $header_menu = get_term(get_nav_menu_locations()['header-menu'], 'nav_menu');
            $header_menu_items = wp_get_nav_menu_items($header_menu->term_id);
            $menu_items_with_children = array();
            foreach ($header_menu_items as $menu_item) {
              if ($menu_item->menu_item_parent && !in_array($menu_item->menu_item_parent, $menu_items_with_children)) {
                array_push($menu_items_with_children, $menu_item->menu_item_parent);
              }
            }
            echo '<div class="ham-main">';
            foreach ($header_menu_items as $menu_item) :
              $parent_ID = $menu_item->ID;
              if ($menu_item->menu_item_parent == 0) :
                echo '<div class="ham-list">';
                if (!in_array($menu_item->ID, $menu_items_with_children)) :
                  echo '<h4 class="ham-links"><a class="nav-links" href="' . $menu_item->url . '">' . $menu_item->title . '</a></h4>';
                else :
                  echo '<h4 class="ham-links ham-accordion"><a class="nav-links" href="' . $menu_item->url . '">' . $menu_item->title . '</a></h4>';
                  echo '<div class="ham-submenu newPanel">';
                  foreach ($header_menu_items as $menu_child_item) :
                    if ($menu_child_item->menu_item_parent == $parent_ID) :
                      echo '<a class="submenu-list" href="' . $menu_child_item->url . '">' . $menu_child_item->title . '</a>';
                    endif;
                  endforeach;
                  echo '</div>';
                endif;
                echo '</div>';
              endif;
            endforeach;
            echo '</div>';
          endif; ?>
          <div class="follow-sec align-bottom">
              <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false) || (!empty($linkedin) && (filter_var($linkedin, FILTER_VALIDATE_URL) !== false))) :
                echo '<div class="icon-sec justify-center">';
                  echo '<h2 class="text-[16px] font-Barlow font-medium text-[#101010] text-center">FOLLOW US:</h2>';
                  if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false)){ ?>
                      <a class="icon-box group" href="<?php echo $facebook; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="website_Link">
                        <svg class="group-hover:fill-[#FFD600]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#141414">
                          <g clip-path="url(#clip0_662_2926)">
                            <path d="M9.33366 9.00016H11.0003L11.667 6.3335H9.33366V5.00016C9.33366 4.3135 9.33366 3.66683 10.667 3.66683H11.667V1.42683C11.4497 1.39816 10.629 1.3335 9.76233 1.3335C7.95233 1.3335 6.66699 2.43816 6.66699 4.46683V6.3335H4.66699V9.00016H6.66699V14.6668H9.33366V9.00016Z" fill="" />
                          </g>
                          <defs>
                            <clipPath id="clip0_662_2926">
                              <rect width="16" height="16" fill="white" />
                            </clipPath>
                          </defs>
                        </svg>
                      </a>
                  <?php }
                  if (!empty($linkedin) && (filter_var($linkedin, FILTER_VALIDATE_URL) !== false)){ ?>
                      <a class="icon-box group" href="<?php echo $linkedin; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="website_Link">
                        <svg class="group-hover:fill-[#FFD600]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#141414">
                          <path d="M4.62764 3.33345C4.62739 3.87632 4.29804 4.36484 3.79488 4.56865C3.29172 4.77246 2.71523 4.65086 2.33725 4.2612C1.95927 3.87152 1.85528 3.2916 2.07432 2.79488C2.29336 2.29816 2.79168 1.98383 3.3343 2.00012C4.05502 2.02175 4.62796 2.61241 4.62764 3.33345ZM4.66764 5.65345H2.00097V14.0001H4.66764V5.65345ZM8.88098 5.65345H6.22764V14.0001H8.85432V9.6201C8.85432 7.1801 12.0343 6.95343 12.0343 9.6201V14.0001H14.6677V8.71343C14.6677 4.60012 9.96099 4.75345 8.85432 6.77343L8.88098 5.65345Z" fill="" />
                        </svg>
                      </a>
                  <?php }
                echo '</div>';
            endif; ?>
            <div class="copyright-sec !border-none">
              <p class="copyright">
                <svg class="pb-[2px]" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 0.5C3.86463 0.5 0.5 3.86463 0.5 8C0.5 12.1354 3.86463 15.5 8 15.5C12.1354 15.5 15.5 12.1354 15.5 8C15.5 3.86463 12.1354 0.5 8 0.5ZM8 1.65385C11.5111 1.65385 14.3462 4.48888 14.3462 8C14.3462 11.5111 11.5111 14.3462 8 14.3462C4.48888 14.3462 1.65385 11.5111 1.65385 8C1.65385 4.48888 4.48888 1.65385 8 1.65385ZM7.94591 4.53846C6.02809 4.53846 4.48438 6.08218 4.48438 8C4.48438 9.91782 6.02809 11.4615 7.94591 11.4615C9.32963 11.4615 10.5128 10.6322 11.0649 9.46034L10.0192 8.97356C9.64739 9.76457 8.86989 10.3077 7.94591 10.3077C6.63206 10.3077 5.63822 9.31385 5.63822 8C5.63822 6.68615 6.63206 5.69231 7.94591 5.69231C8.86989 5.69231 9.64739 6.23543 10.0192 7.02644L11.0649 6.53966C10.5128 5.36779 9.32963 4.53846 7.94591 4.53846Z" fill="#141414" />
                </svg><?php echo date('Y'); ?> <?php echo get_bloginfo( 'name' ); ?>. All Rights Reserved.
              </p>
              <p class="copyright"> <span class="text-primary relative nav-hov"> </span></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php get_template_part('template-parts/search', 'modal'); ?>

  </header>
  <main>