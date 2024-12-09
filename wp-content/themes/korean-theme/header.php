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

  <header class="relative">
    <nav class="navbar font-Chai">
      <div class="container mx-auto ">
        <div class="w-full flex justify-between lg:justify-end items-center relative">
          <div class="navbar-start w-fit lg:w-full order-1 lg:order-none">
            <a class="w-fit relative flex" href="">
              <figure class="rounded-none m-0 w-[200px] 2xl:w-[276px] 2xl:h-[38px]">
                <img class="w-full object-cover" src="<?php echo get_template_directory_uri(); ?> /assets/images/logo.png" alt="logo">
              </figure>
            </a>
          </div>

          <div class="navbar-center">
            <ul class="menu menu-horizontal relative text-lg lg:gap-4 xl:gap-7 hidden lg:flex p-0">
              <li class="nav-drop">
                <a href="" class="nav-links nav-hov group">
                  K Entertainment </a>
                <svg class="nav-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.7302 5.07458C13.6912 4.98206 13.6006 4.92188 13.5 4.92188L2.50002 4.922C2.39956 4.922 2.30886 4.98218 2.26968 5.07471C2.23061 5.16724 2.25076 5.27429 2.32082 5.34631L7.82082 11.0032C7.86782 11.0515 7.93252 11.0789 8.00002 11.0789C8.06753 11.0789 8.13223 11.0515 8.17922 11.0032L13.6792 5.34619C13.7493 5.27405 13.7693 5.16711 13.7302 5.07458Z" fill="#101010" />
                </svg>
                <ul class="center-dropdown">
                  <li>
                    <a class="drop-list" href="">K Beauty</a>
                  </li>
                  <li>
                    <a class="drop-list" href="">K Fashion</a>
                  </li>
                  <li>
                    <a class="drop-list" href="">K Food</a>
                  </li>
                  <li>
                    <a class="drop-list" href="#">K Culture</a>
                  </li>
                </ul>
              </li>
              <li class="nav-drop">
                <a href="https://voiceofaction.org/category/entertainment" class="nav-links nav-hov group">
                  K Fashion </a>
                <svg class="nav-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.7302 5.07458C13.6912 4.98206 13.6006 4.92188 13.5 4.92188L2.50002 4.922C2.39956 4.922 2.30886 4.98218 2.26968 5.07471C2.23061 5.16724 2.25076 5.27429 2.32082 5.34631L7.82082 11.0032C7.86782 11.0515 7.93252 11.0789 8.00002 11.0789C8.06753 11.0789 8.13223 11.0515 8.17922 11.0032L13.6792 5.34619C13.7493 5.27405 13.7693 5.16711 13.7302 5.07458Z" fill="#101010" />
                </svg>

                <ul class="center-dropdown">
                  <li>
                    <a class="drop-list" href="#">Celebrity</a>
                  </li>

                </ul>
              </li>
              <li class="nav-drop">
                <a href="#" class="nav-links nav-hov group">
                  K Beauty</a>
                <svg class="nav-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.7302 5.07458C13.6912 4.98206 13.6006 4.92188 13.5 4.92188L2.50002 4.922C2.39956 4.922 2.30886 4.98218 2.26968 5.07471C2.23061 5.16724 2.25076 5.27429 2.32082 5.34631L7.82082 11.0032C7.86782 11.0515 7.93252 11.0789 8.00002 11.0789C8.06753 11.0789 8.13223 11.0515 8.17922 11.0032L13.6792 5.34619C13.7493 5.27405 13.7693 5.16711 13.7302 5.07458Z" fill="#101010" />
                </svg>
                <ul class="center-dropdown">
                  <li>
                    <a class="drop-list" href="https://voiceofaction.org/category/technology/apps">Apps</a>
                  </li>
                </ul>
              </li>
              <li class="nav-drop">
                <a href="https://voiceofaction.org/category/lifestyle" class="nav-links nav-hov group">
                  K Food </a>
                <svg class="nav-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.7302 5.07458C13.6912 4.98206 13.6006 4.92188 13.5 4.92188L2.50002 4.922C2.39956 4.922 2.30886 4.98218 2.26968 5.07471C2.23061 5.16724 2.25076 5.27429 2.32082 5.34631L7.82082 11.0032C7.86782 11.0515 7.93252 11.0789 8.00002 11.0789C8.06753 11.0789 8.13223 11.0515 8.17922 11.0032L13.6792 5.34619C13.7493 5.27405 13.7693 5.16711 13.7302 5.07458Z" fill="#101010" />
                </svg>
                <ul class="center-dropdown">
                  <li>
                    <a class="drop-list" href="#">Beauty</a>
                  </li>
                  <li>
                    <a class="drop-list" href="#">Family &amp; Parenting</a>
                  </li>
                  <li>
                    <a class="drop-list" href="#">Fashion</a>
                  </li>

                </ul>
              </li>
              <li class="nav-drop">
                <a href="https://voiceofaction.org/category/society" class="nav-links nav-hov group">
                  K Culture </a>
                <svg class="nav-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.7302 5.07458C13.6912 4.98206 13.6006 4.92188 13.5 4.92188L2.50002 4.922C2.39956 4.922 2.30886 4.98218 2.26968 5.07471C2.23061 5.16724 2.25076 5.27429 2.32082 5.34631L7.82082 11.0032C7.86782 11.0515 7.93252 11.0789 8.00002 11.0789C8.06753 11.0789 8.13223 11.0515 8.17922 11.0032L13.6792 5.34619C13.7493 5.27405 13.7693 5.16711 13.7302 5.07458Z" fill="#101010" />
                </svg>
                <ul class="center-dropdown">
                  <li>
                    <a class="drop-list" href="#">Art</a>
                  </li>
                  <li>
                    <a class="drop-list" href="#">Education</a>
                  </li>
                  <li>
                    <a class="drop-list" href="#">Legal</a>
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

          <div class="navbar-end group flex justify-end items-center w-fit md:ml-[26px] mb-[0px] order-3 lg:order-none">
            <button onclick="document.getElementById('myModal').style.display='block'" class="search-btn" aria-label="search-button">
              <span class="relative nav-hov text-[#101010] text-[17px] leading-[17px] font-medium hidden lg:flex">SEARCH</span>
              <div class="svg-wrapper">
                <svg class="w-full" width="18" height="18" viewBox="0 0 21 21" fill="#333333" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.031 14.617L20.314 18.899L18.899 20.314L14.617 16.031C13.0237 17.3082 11.042 18.0029 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18.0029 11.042 17.3082 13.0237 16.031 14.617ZM14.025 13.875C15.2941 12.5699 16.0029 10.8204 16 9C16 5.132 12.867 2 9 2C5.132 2 2 5.132 2 9C2 12.867 5.132 16 9 16C10.8204 16.0029 12.5699 15.2941 13.875 14.025L14.025 13.875V13.875Z" fill=""></path>
                </svg>
              </div>
            </button>
          </div>
        </div>
      </div>

    </nav>
    <div id="hamMenu" class="lg:hidden" style="width:100% !important; display:none">

      <div class="ham-content w-full h-full fixed overflow-y-scroll top-0 left-0 bg-[#FFFFFF] animate-[animatetop_.8s] transition-all lg:flex z-50">
        <div class="ham-logo-sec">
          <span onclick="document.getElementById('hamMenu').style.display='none'" class="close ">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
              <path d="M13.9999 11.9253L21.2591 4.66602L23.3332 6.74009L16.074 13.9994L23.3332 21.2586L21.2591 23.3327L13.9999 16.0735L6.74058 23.3327L4.6665 21.2586L11.9258 13.9994L4.6665 6.74009L6.74058 4.66602L13.9999 11.9253Z" fill="#101010" />
            </svg>
          </span>
          <figure class="w-[200px]">
            <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?> /assets/images/logo.png" alt="" />
          </figure>
          <button onclick="document.getElementById('myModal').style.display='block'" class="search-btn" aria-label="search-button">
            <p class="relative nav-hov text-[#101010] text-[17px] leading-[17px] font-medium hidden lg:flex">SEARCH</p>
            <svg width="18" height="18" viewBox="0 0 21 21" fill="#333333" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.031 14.617L20.314 18.899L18.899 20.314L14.617 16.031C13.0237 17.3082 11.042 18.0029 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18.0029 11.042 17.3082 13.0237 16.031 14.617ZM14.025 13.875C15.2941 12.5699 16.0029 10.8204 16 9C16 5.132 12.867 2 9 2C5.132 2 2 5.132 2 9C2 12.867 5.132 16 9 16C10.8204 16.0029 12.5699 15.2941 13.875 14.025L14.025 13.875V13.875Z" fill="" />
            </svg>
          </button>
        </div>
        <div class="flex flex-col justify-between h-[90vh]">
          <div class="ham-main">
            <div class="ham-list">
              <h4 class="ham-links ham-accordion">
                <a class="nav-links">Business</a>
              </h4>
              <div class="ham-submenu newPanel">
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
              </div>
            </div>
            <div class="ham-list">
              <h4 class="ham-links ham-accordion">
                <a class="nav-links">Entertainment</a>
              </h4>
              <div class="ham-submenu newPanel">
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
              </div>
            </div>
            <div class="ham-list">
              <h4 class="ham-links ham-accordion">
                <a class="nav-links">Technology</a>
              </h4>
              <div class="ham-submenu newPanel">
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
              </div>
            </div>
            <div class="ham-list">
              <h4 class="ham-links ham-accordion">
                <a class="nav-links">Lifestyle</a>
              </h4>
              <div class="ham-submenu newPanel">
                <a class="submenu-list" href="">Submenu 1</a>

              </div>
            </div>
            <div class="ham-list">
              <h4 class="ham-links ham-accordion">
                <a class="nav-links">Business</a>
              </h4>
              <div class="ham-submenu newPanel">
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
              </div>
            </div>
            <div class="ham-list">
              <h4 class="ham-links ham-accordion">
                <a class="nav-links">Business</a>
              </h4>
              <div class="ham-submenu newPanel">
                <a class="submenu-list" href="">Submenu 1</a>
                <a class="submenu-list" href="">Submenu 1</a>
              </div>
            </div>

          </div>
          <div class="follow-sec align-bottom">
            <h2 class="text-[16px] font-Barlow font-medium text-[#101010] text-center">FOLLOW US:</h2>
            <div class="icon-sec justify-center">
              <a class="icon-box group">
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
              <a class="icon-box group">
                <svg class="group-hover:fill-[#FFD600]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#141414">
                  <g clip-path="url(#clip0_662_2931)">
                    <path d="M14.7752 3.77062C14.2662 3.99575 13.7265 4.1436 13.1739 4.20928C13.7564 3.86091 14.1923 3.31263 14.4005 2.66662C13.8539 2.99195 13.2545 3.21995 12.6299 3.34328C12.2103 2.89434 11.6541 2.59659 11.0478 2.49634C10.4416 2.39609 9.81915 2.49895 9.27737 2.78892C8.73558 3.07889 8.30478 3.53974 8.05193 4.09981C7.79908 4.65989 7.73836 5.2878 7.87919 5.88595C6.7706 5.83039 5.68608 5.5423 4.69605 5.04039C3.70602 4.53849 2.83261 3.83398 2.13252 2.97262C1.88472 3.39825 1.75449 3.8821 1.75519 4.37462C1.75519 5.34128 2.24719 6.19528 2.99519 6.69528C2.55253 6.68135 2.11961 6.56181 1.73252 6.34662V6.38128C1.73266 7.02508 1.95544 7.64903 2.36309 8.14732C2.77074 8.64562 3.33818 8.9876 3.96919 9.11528C3.55827 9.22664 3.12739 9.24306 2.70919 9.16328C2.8871 9.71744 3.23386 10.2021 3.70092 10.5494C4.16797 10.8966 4.73194 11.0891 5.31386 11.1C4.73551 11.5542 4.07331 11.8899 3.36511 12.0881C2.65691 12.2862 1.91661 12.3428 1.18652 12.2546C2.46099 13.0742 3.94459 13.5094 5.45986 13.5079C10.5885 13.5079 13.3932 9.25928 13.3932 5.57462C13.3932 5.45462 13.3899 5.33328 13.3845 5.21462C13.9304 4.82006 14.4016 4.3313 14.7759 3.77128L14.7752 3.77062Z" fill="" />
                  </g>
                  <defs>
                    <clipPath id="clip0_662_2931">
                      <rect width="16" height="16" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </a>
              <a class="icon-box group">
                <svg class="group-hover:fill-[#FFD600]" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="#141414">
                  <path d="M4.62764 3.33345C4.62739 3.87632 4.29804 4.36484 3.79488 4.56865C3.29172 4.77246 2.71523 4.65086 2.33725 4.2612C1.95927 3.87152 1.85528 3.2916 2.07432 2.79488C2.29336 2.29816 2.79168 1.98383 3.3343 2.00012C4.05502 2.02175 4.62796 2.61241 4.62764 3.33345ZM4.66764 5.65345H2.00097V14.0001H4.66764V5.65345ZM8.88098 5.65345H6.22764V14.0001H8.85432V9.6201C8.85432 7.1801 12.0343 6.95343 12.0343 9.6201V14.0001H14.6677V8.71343C14.6677 4.60012 9.96099 4.75345 8.85432 6.77343L8.88098 5.65345Z" fill="" />
                </svg>
              </a>
            </div>
            <div class="copyright-sec !border-none">
              <p class="copyright">
                <svg class="pb-[2px]" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 0.5C3.86463 0.5 0.5 3.86463 0.5 8C0.5 12.1354 3.86463 15.5 8 15.5C12.1354 15.5 15.5 12.1354 15.5 8C15.5 3.86463 12.1354 0.5 8 0.5ZM8 1.65385C11.5111 1.65385 14.3462 4.48888 14.3462 8C14.3462 11.5111 11.5111 14.3462 8 14.3462C4.48888 14.3462 1.65385 11.5111 1.65385 8C1.65385 4.48888 4.48888 1.65385 8 1.65385ZM7.94591 4.53846C6.02809 4.53846 4.48438 6.08218 4.48438 8C4.48438 9.91782 6.02809 11.4615 7.94591 11.4615C9.32963 11.4615 10.5128 10.6322 11.0649 9.46034L10.0192 8.97356C9.64739 9.76457 8.86989 10.3077 7.94591 10.3077C6.63206 10.3077 5.63822 9.31385 5.63822 8C5.63822 6.68615 6.63206 5.69231 7.94591 5.69231C8.86989 5.69231 9.64739 6.23543 10.0192 7.02644L11.0649 6.53966C10.5128 5.36779 9.32963 4.53846 7.94591 4.53846Z" fill="#141414" />
                </svg>2024Voice Of Action. All Rights Reserved.
              </p>
              <p class="copyright"> <span class="text-primary relative nav-hov"> </span></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php //get_template_part('template-parts/search', 'modal'); 
    ?>

  </header>
  <main>