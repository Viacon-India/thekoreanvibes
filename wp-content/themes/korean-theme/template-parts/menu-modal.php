<?php $facebook = get_option('facebook');
$linkedin = get_option('linkedin'); ?>

<div id="hamMenu">
    <div class="mobile-menu-content">
        <div class="menu-content-container h-[-webkit-fill-available]">
            <div class="ham-logo-sec">
                <span id="searchButton" class="search-open search-btn">
                    Search
                </span>

                <span id="close-mobile-menu" class="close  close-mobile-menu">
                    Close
                </span>
            </div>
            <?php get_search_form(); ?>

            <div class="hum-sec-wrapper">
                <?php if (isset(get_nav_menu_locations()['header-menu'])) :
                    echo '<div class="mobile-ham">';
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
                            echo '<div class="mobile-ham-list">';
                            if (!in_array($menu_item->ID, $menu_items_with_children)) :
                                echo '<h4 class="mobile-ham-links"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></h4>';
                            else :
                                echo '<h4 class="mobile-ham-links mobile-ham-accordion"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></h4>';
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
                    echo '</div>';
                endif; ?>

                <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false) || (!empty($linkedin) && (filter_var($linkedin, FILTER_VALIDATE_URL) !== false))) : ?>
                    <div class="mobile-icon-sec">
                        <ul>
                            <?php if (!empty($facebook) && (filter_var($facebook, FILTER_VALIDATE_URL) !== false)) : ?>
                                <li><a href="<?php echo $facebook; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_Link"><span class="icon-facekbook"></span></a></li>
                            <?php endif; ?>
                            <?php if (!empty($linkedin) && (filter_var($linkedin, FILTER_VALIDATE_URL) !== false)) : ?>
                                <li><a href="<?php echo $linkedin; ?>" rel="noopener noreferrer nofollow" target="_blank" aria-label="social_Link"><span class="icon-linkedin"></span></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php $header_menu_2_location = get_nav_menu_locations()['header-menu-2'];
                if (isset($header_menu_2_location)) :
                    $header_menu = get_term($header_menu_2_location, 'nav_menu');
                    $header_menu_items = wp_get_nav_menu_items($header_menu->term_id);
                    echo '<div class="site-link-sec">';
                    foreach ($header_menu_items as $menu_item) :
                        $parent_ID = $menu_item->ID;
                        if ($menu_item->menu_item_parent == 0) :
                            echo '<a href="' . $menu_item->url . '" target="_blank" rel="noreferrer" class="site-link-sec-link">' . $menu_item->title . '</a>';
                        endif;
                    endforeach;
                    echo '</div>';
                endif; ?>

                <div class="header-menu-copy-right-sec">
                    <p class="header-menu-copy-right-p">
                        Copyright 2024. All Rights Reversed.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>