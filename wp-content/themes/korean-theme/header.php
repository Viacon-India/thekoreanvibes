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
  <nav class="navbar">
      <div class="container mx-auto ">
        <div class="w-full flex justify-between lg:justify-end items-center relative">
          <div class="navbar-start w-fit lg:w-full order-1 lg:order-none">
            <a class="w-fit relative flex" href="https://voiceofaction.org">
              <figure class="rounded-none m-0 w-[175px] h-[24px]">
                <img class="w-full h-full object-cover" src="wp-content/themes/korean-theme/assets/images/logo.png" alt="logo">              </figure>
            </a>
          </div>

          <div class="navbar-center">
            <ul class="menu menu-horizontal relative text-lg lg:gap-4 xl:gap-7 hidden lg:flex">
                                  <li class="nav-drop">
                      <a href="" class="nav-links nav-hov group">
                        Business                      </a>
                                              <svg class="nav-arrow" width="10" height="6" viewBox="0 0 10 6" fill="#333333" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.00045 3.44752L8.30032 0.147705L9.24312 1.09051L5.00045 5.33319L0.757812 1.09051L1.70063 0.147705L5.00045 3.44752Z" fill=""></path>
                        </svg>
                        <ul class="center-dropdown">
                                                        <li>
                                <a class="drop-list" href="">Advertising</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="">Automotive</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="">Energy</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/business/entrepreneurship">Entrepreneurship</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/business/finance">Finance</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/business/green">Green</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/business/marketing">Marketing</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/business/real-estate">Real Estate</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/business/small-business">Small Business</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/business/startups">Startups</a>
                              </li>
                                                  </ul>
                                          </li>
                                  <li class="nav-drop">
                      <a href="https://voiceofaction.org/category/entertainment" class="nav-links nav-hov group">
                        Entertainment                      </a>
                                              <svg class="nav-arrow" width="10" height="6" viewBox="0 0 10 6" fill="#333333" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.00045 3.44752L8.30032 0.147705L9.24312 1.09051L5.00045 5.33319L0.757812 1.09051L1.70063 0.147705L5.00045 3.44752Z" fill=""></path>
                        </svg>
                        <ul class="center-dropdown">
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/entertainment/celebrity">Celebrity</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/entertainment/gaming">Gaming</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/entertainment/make-money-online">Make Money Online</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/entertainment/movies">Movies</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/entertainment/music">Music</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/entertainment/photography">Photography</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/entertainment/sports">Sports</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/entertainment/television">Television</a>
                              </li>
                                                  </ul>
                                          </li>
                                  <li class="nav-drop">
                      <a href="https://voiceofaction.org/category/technology" class="nav-links nav-hov group">
                        Technology                      </a>
                                              <svg class="nav-arrow" width="10" height="6" viewBox="0 0 10 6" fill="#333333" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.00045 3.44752L8.30032 0.147705L9.24312 1.09051L5.00045 5.33319L0.757812 1.09051L1.70063 0.147705L5.00045 3.44752Z" fill=""></path>
                        </svg>
                        <ul class="center-dropdown">
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/apps">Apps</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/blogging">Blogging</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/dev-design">Dev &amp; Design</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/gadgets">Gadgets</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/internet">Internet</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/mobile">Mobile</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/programming">Programming</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/science">Science</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/security">Security</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/seo">SEO</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/technology/social-media">Social Media</a>
                              </li>
                                                  </ul>
                                          </li>
                                  <li class="nav-drop">
                      <a href="https://voiceofaction.org/category/lifestyle" class="nav-links nav-hov group">
                        Lifestyle                      </a>
                                              <svg class="nav-arrow" width="10" height="6" viewBox="0 0 10 6" fill="#333333" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.00045 3.44752L8.30032 0.147705L9.24312 1.09051L5.00045 5.33319L0.757812 1.09051L1.70063 0.147705L5.00045 3.44752Z" fill=""></path>
                        </svg>
                        <ul class="center-dropdown">
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/lifestyle/beauty">Beauty</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/lifestyle/family-parenting">Family &amp; Parenting</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/lifestyle/fashion">Fashion</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/lifestyle/food">Food</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/lifestyle/health-fitness">Health &amp; Fitness</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/lifestyle/home-garden">Home &amp; Garden</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/lifestyle/job-career">Job &amp; Career</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/lifestyle/kids">Kids</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/lifestyle/shopping">Shopping</a>
                              </li>
                                                  </ul>
                                          </li>
                                  <li class="nav-drop">
                      <a href="https://voiceofaction.org/category/society" class="nav-links nav-hov group">
                        Society                      </a>
                                              <svg class="nav-arrow" width="10" height="6" viewBox="0 0 10 6" fill="#333333" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.00045 3.44752L8.30032 0.147705L9.24312 1.09051L5.00045 5.33319L0.757812 1.09051L1.70063 0.147705L5.00045 3.44752Z" fill=""></path>
                        </svg>
                        <ul class="center-dropdown">
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/society/art">Art</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/society/education">Education</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/society/legal">Legal</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/society/pets-animals">Pets &amp; Animals</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/society/political">Political</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/society/relationship">Relationship</a>
                              </li>
                                                        <li>
                                <a class="drop-list" href="https://voiceofaction.org/category/society/religion">Religion</a>
                              </li>
                                                  </ul>
                                          </li>
                          </ul>

            <!-- Hamburger Dropdown -->
            <div class="dropdown flex lg:hidden">
              <button class="ham-dropdown lg:hidden ml-[4px]" onclick="document.getElementById('hamMenu').style.display='block'" aria-label="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                  <path d="M4 5.33301H28V7.99967H4V5.33301ZM4 14.6663H20V17.333H4V14.6663ZM4 23.9997H28V26.6663H4V23.9997Z" fill="black"></path>
                </svg>
              </button>
            </div>
            <!-- hamburger-end -->
          </div>

          <div class="navbar-end group flex justify-end items-center w-fit md:ml-[26px] order-3 lg:order-none">
            <button onclick="document.getElementById('myModal').style.display='block'" class="search-btn" aria-label="search-button">
              <span class="relative nav-hov text-[#101010] text-[17px] leading-[17px] font-medium hidden lg:flex">SEARCH</span>
              <div class="svg-wrapper">
                <svg class="w-full h-full" width="18" height="18" viewBox="0 0 21 21" fill="#333333" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.031 14.617L20.314 18.899L18.899 20.314L14.617 16.031C13.0237 17.3082 11.042 18.0029 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18.0029 11.042 17.3082 13.0237 16.031 14.617ZM14.025 13.875C15.2941 12.5699 16.0029 10.8204 16 9C16 5.132 12.867 2 9 2C5.132 2 2 5.132 2 9C2 12.867 5.132 16 9 16C10.8204 16.0029 12.5699 15.2941 13.875 14.025L14.025 13.875V13.875Z" fill=""></path>
                </svg>
              </div>
            </button>
          </div>
        </div>
      </div>

    </nav>
  

    <?php get_template_part('template-parts/search', 'modal'); ?>

  </header>
  <main>