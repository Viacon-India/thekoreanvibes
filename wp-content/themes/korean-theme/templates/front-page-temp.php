<?php /* Template Name: Front Page Template */ ?>

<?php get_header();

$cat1_slug = 'k_entertainment';
$cat2_slug = 'k-culture';
$cat3_slug = 'k-beauty';
$cat4_slug = 'k-food ';
$cat5_slug = 'k-fashion';
$cat6_slug = 'k_entertainment';
$cat7_slug = 'k_entertainment'; ?>

<section class="banner">
    <figure class="">
        <img class="w-fit h-full object-cover" src="<?php echo get_template_directory_uri(); ?> /assets/images/bannerimg.png" alt="" />
    </figure>
    <!-- <span class="banner-light top-[-180px] left-[-186px]"></span>
    <span class="banner-light left-[50%] -translate-x-[50%] bottom-[-100px] "></span>
    <span class="banner-light top-[-27px] right-[10%]"></span>

    <div class="container mx-auto z-1">
        <div class="banner-wrapper">
            <div class="w-full lg:w-1/2 ">
                <p class="banner-sub-title">
                    <svg class="banner-sub-title-svg" width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line class="line01" x1="16.4943" y1="3.95671" x2="17.1739" y2="12.931" stroke="#101010" stroke-width="1.25" />
                        <line class="line02" x1="0.306699" y1="15.7997" x2="8.59129" y2="19.3162" stroke="#101010" stroke-width="1.25" />
                        <line class="line03" x1="4.41198" y1="0.758802" x2="11.8866" y2="14.9055" stroke="#101010" stroke-width="1.25" />
                    </svg>

                    Only The Best!
                </p>
                <h2 class="banner-c-title">
                    The Top 7.
                </h2>
                <p class='banner-caption'>
                    You Search, We Create.
                </p>
                <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>
            </div>
            <div class="w-full lg:w-1/2 relative h-full">

                <svg class="cloud1" width="132" height="39" viewBox="0 0 132 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.0687256 37.4745C-0.941833 28.769 9.40374 21.6093 17.1629 20.877C20.8626 20.5313 24.7164 21.2025 28.2277 19.738C35.8327 16.5853 38.8645 4.93046 46.2982 1.20824C51.8478 -1.57835 58.2366 0.90313 63.6149 4.11685C68.9932 7.33058 74.303 11.3782 80.315 11.8257C85.5391 12.2325 91.2257 9.91376 95.799 12.9444C99.2075 15.2022 100.989 19.86 104.14 22.6263C107.206 25.3112 111.215 25.8807 115.034 26.1248C118.854 26.3688 122.793 26.4095 126.27 28.3011C129.747 30.1928 132.608 34.5455 131.888 39L0.0858765 37.4542L0.0687256 37.4745Z" fill="white" />
                </svg>

                <svg class="cloud2" width="110" height="31" viewBox="0 0 110 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.0569305 29.7842C-0.782654 22.8652 7.83775 17.1841 14.3104 16.5872C17.3953 16.2998 20.6072 16.8414 23.536 15.6809C29.872 13.183 32.4102 3.9097 38.59 0.958618C43.2175 -1.25193 48.5381 0.715454 53.0191 3.26864C57.5002 5.82183 61.9324 9.03818 66.9406 9.40292C71.2947 9.72345 76.0296 7.88869 79.837 10.2982C82.6779 12.0887 84.1619 15.8025 86.7782 17.9799C89.336 20.1241 92.6846 20.5662 95.8575 20.7651C99.0303 20.9641 102.32 20.9973 105.22 22.5004C108.11 24.0036 110.511 27.4631 109.906 31L0.0471725 29.7731L0.0569305 29.7842Z" fill="white" />
                </svg>

                <svg class="cloud3" width="92" height="28" viewBox="0 0 92 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.047905 26.9048C-0.656433 20.6546 6.55412 15.5144 11.962 14.9886C14.5406 14.7404 17.2266 15.2223 19.6739 14.1709C24.9743 11.9074 27.0874 3.53982 32.2684 0.867453C36.1363 -1.13317 40.5891 0.648401 44.3377 2.95569C48.0862 5.26298 51.7869 8.169 55.9771 8.49026C59.6182 8.78233 63.5816 7.11757 66.769 9.29343C69.1446 10.9144 70.3862 14.2585 72.5827 16.2445C74.7196 18.1721 77.5132 18.581 80.1753 18.7562C82.8375 18.9315 85.5832 18.9607 88.0066 20.3188C90.43 21.6769 92.4236 24.8019 91.9222 28L0.0598526 26.8902L0.047905 26.9048Z" fill="white" />
                </svg>

                <svg class="cloud4" width="134" height="33" viewBox="0 0 134 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.0693665 31.7058C-0.9534 24.3403 9.54781 18.2927 17.4326 17.6574C21.1907 17.3514 25.1034 17.928 28.6712 16.6926C36.3895 14.0335 39.4816 4.16194 47.0096 1.02046C52.6467 -1.3327 59.1282 0.761611 64.5869 3.47952C70.0457 6.19743 75.4449 9.62129 81.5458 10.0096C86.8499 10.3508 92.6179 8.39764 97.256 10.9626C100.717 12.8687 102.524 16.822 105.712 19.1398C108.828 21.4224 112.907 21.8931 116.772 22.1048C120.637 22.3166 124.645 22.3519 128.177 23.9521C131.697 25.5522 134.623 29.2349 133.885 33L0.0574799 31.694L0.0693665 31.7058Z" fill="white" />
                </svg>

                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

                <div class="flex flex-col justify-center items-center relative">
                    <lottie-player class="hero-lottie-svg" src="<?php echo get_template_directory_uri(); ?>/assets/js/man-wolk.json" speed="1" style="transform: scaleX(-1);" direction="1" mode="normal" loop autoplay></lottie-player>
                    <svg class="salmon-tree" xmlns="http://www.w3.org/2000/svg" width="23" height="31" viewBox="0 0 23 31" fill="none">
                        <path d="M8.32566 0.103977C7.00566 0.983977 6.1957 2.48398 5.9257 4.04398C5.6557 5.60398 5.89568 7.21398 6.34568 8.73398C7.21568 11.674 9.46569 14.394 11.7257 16.454C13.8557 13.804 13.7557 9.85399 13.5757 7.86399C13.2957 4.70399 10.8657 -0.826023 8.32566 0.103977Z" fill="#FF725E" />
                        <path d="M9.67592 21.9331C9.77592 20.1631 8.74592 18.4331 7.23592 17.5131C5.72592 16.5831 3.82592 16.4231 2.11592 16.8631C1.32592 17.0631 0.495903 17.4531 0.155903 18.2031C-0.164097 18.8931 0.0359392 19.7531 0.505939 20.3531C0.97594 20.9531 1.66593 21.3531 2.37593 21.6331C4.80593 22.6131 7.33592 23.1231 9.67592 21.9331Z" fill="#FF725E" />
                        <path d="M14.5459 30.5339C14.5459 30.5339 14.4859 30.3139 14.3459 29.9339C14.1859 29.5139 13.9859 28.9739 13.7459 28.3239C13.2159 26.9839 12.5059 25.0539 11.0759 23.3139C9.66587 21.5739 7.91589 20.4239 6.53589 19.9439C5.84589 19.6939 5.2659 19.5739 4.8559 19.5339C4.6559 19.5039 4.49586 19.5039 4.38586 19.5039C4.27586 19.5039 4.22589 19.5039 4.22589 19.5039C4.22589 19.5539 5.13589 19.5539 6.47589 20.0839C7.81589 20.5939 9.50587 21.7439 10.8959 23.4539C12.2959 25.1539 13.0259 27.0539 13.5859 28.3839C13.8659 29.0539 14.0859 29.5939 14.2559 29.9639C14.4259 30.3339 14.5259 30.5339 14.5359 30.5339H14.5459Z" fill="#263238" />
                        <path d="M9.8053 4.48438C9.8053 4.48438 9.80526 4.58439 9.82526 4.75439C9.84526 4.95439 9.87528 5.21439 9.91528 5.53439C9.99528 6.21439 10.1353 7.19438 10.3053 8.39438C10.6553 10.8044 11.1853 14.1344 11.8553 17.8044C12.5253 21.4644 13.2053 24.7744 13.7353 27.1544C13.9953 28.3444 14.2153 29.3044 14.3853 29.9744C14.4653 30.2844 14.5253 30.5444 14.5753 30.7344C14.6253 30.9044 14.6453 30.9944 14.6553 30.9944C14.6553 30.9944 14.6553 30.8944 14.6153 30.7244C14.5753 30.5244 14.5253 30.2744 14.4653 29.9544C14.3253 29.2544 14.1253 28.2944 13.8853 27.1244C13.3953 24.7344 12.7453 21.4344 12.0753 17.7744C11.4053 14.1144 10.8553 10.7944 10.4653 8.38437C10.2753 7.20437 10.1153 6.23439 10.0053 5.53439C9.95531 5.21439 9.90531 4.96437 9.87531 4.76437C9.8453 4.58437 9.82531 4.49438 9.81531 4.49438L9.8053 4.48438Z" fill="#263238" />
                        <path d="M14.3657 22.9732C14.2957 19.2432 16.1557 15.5332 19.1757 13.3532C19.9457 12.8032 20.9957 12.3432 21.8057 12.8432C22.6157 13.3432 22.6557 14.5032 22.4757 15.4332C21.7057 19.3132 18.3757 22.5532 14.4657 23.2032" fill="#FF725E" />
                        <path d="M19.2754 16.2734C19.2754 16.2734 19.0954 16.3834 18.7854 16.6034C18.6254 16.7134 18.4354 16.8534 18.2354 17.0334C18.0354 17.2134 17.7855 17.4034 17.5555 17.6534C17.3155 17.8934 17.0454 18.1634 16.7954 18.4734C16.5254 18.7734 16.2755 19.1234 16.0055 19.4934C15.4955 20.2434 15.0054 21.1234 14.6354 22.1034C14.2654 23.0834 14.0455 24.0634 13.9355 24.9634C13.8955 25.4134 13.8454 25.8434 13.8554 26.2534C13.8354 26.6534 13.8754 27.0334 13.8954 27.3734C13.9054 27.7134 13.9754 28.0234 14.0154 28.2934C14.0554 28.5634 14.1054 28.7934 14.1554 28.9734C14.2454 29.3434 14.3054 29.5434 14.3254 29.5434C14.3754 29.5334 14.1355 28.7134 14.0555 27.3634C14.0355 27.0234 14.0154 26.6534 14.0354 26.2634C14.0354 25.8634 14.0854 25.4434 14.1354 25.0034C14.2554 24.1234 14.4754 23.1634 14.8354 22.1934C15.2054 21.2334 15.6854 20.3634 16.1754 19.6234C16.4254 19.2534 16.6755 18.9034 16.9355 18.6034C17.1755 18.2834 17.4354 18.0234 17.6654 17.7734C18.6154 16.8034 19.3054 16.3234 19.2754 16.2834V16.2734Z" fill="#263238" />
                    </svg>

                    <svg class="salmon-tree-stone" xmlns="http://www.w3.org/2000/svg" width="58" height="21" viewBox="0 0 58 21" fill="none">
                        <path d="M6.94177 5.94998L21.3618 0.25L45.4017 4.62L57.0518 20.28L0.00177002 20.32L6.94177 5.94998Z" fill="#F5F5F5" />
                        <path d="M45.4014 4.61975C44.7014 4.48975 6.94141 5.95975 6.94141 5.95975L21.3614 0.259766L45.4014 4.62976V4.61975Z" fill="#E0E0E0" />
                        <path d="M57.0518 20.28C57.0518 20.28 57.0018 20.17 56.8618 19.97C56.7018 19.74 56.5018 19.46 56.2618 19.11C55.6918 18.32 54.9118 17.24 53.9418 15.88C51.8818 13.08 49.0117 9.16001 45.5817 4.48001L45.5317 4.41L45.4418 4.38998C40.1918 3.42998 34.0718 2.29999 27.5518 1.10999C25.4618 0.729985 23.4017 0.36 21.4017 0H21.3317L21.2618 0.0100098C15.9518 2.13001 11.0618 4.08 6.86176 5.75L6.78174 5.78L6.75177 5.85001C4.70177 10.19 3.00175 13.78 1.79175 16.34C1.23175 17.56 0.781773 18.54 0.441772 19.26C0.301773 19.57 0.191746 19.82 0.101746 20.03C0.0317459 20.21 -0.0082283 20.3 0.00177002 20.3C0.00177002 20.3 0.0617332 20.22 0.151733 20.05C0.261734 19.85 0.391747 19.6 0.541748 19.3C0.901749 18.59 1.38176 17.63 1.99176 16.43C3.24176 13.89 5.00177 10.32 7.12177 6.01999L7.01178 6.13C11.2218 4.48 16.1318 2.56 21.4518 0.470001H21.3118C23.3118 0.850001 25.3618 1.22001 27.4518 1.60001C33.9718 2.77001 40.1017 3.87001 45.3517 4.82001L45.2117 4.73001C48.7017 9.36001 51.6317 13.24 53.7217 16.02C54.7417 17.34 55.5518 18.4 56.1418 19.17C56.4018 19.5 56.6217 19.77 56.7917 19.99C56.9417 20.17 57.0217 20.26 57.0317 20.26L57.0518 20.28Z" fill="#263238" />
                    </svg>

                    <svg class="grass" xmlns="http://www.w3.org/2000/svg" width="92" height="77" viewBox="0 0 92 77" fill="none">
                        <path d="M38.2559 76.1306L37.8259 76.0806C38.6959 63.0506 45.2359 49.1406 49.9759 36.9406C54.8459 24.4006 59.4159 11.5106 70.5059 3.89062C58.5159 27.2506 47.7459 51.6406 38.2559 76.1206" fill="#455A64" />
                        <path d="M30.476 10.061C30.476 10.061 30.486 10.121 30.516 10.231C30.556 10.351 30.606 10.511 30.666 10.711C30.816 11.151 31.016 11.771 31.276 12.561C31.416 12.961 31.566 13.411 31.726 13.901C31.876 14.391 32.036 14.931 32.216 15.511C32.556 16.671 32.976 17.971 33.346 19.441C33.536 20.171 33.746 20.941 33.956 21.741C34.166 22.541 34.336 23.381 34.536 24.251C34.956 25.981 35.296 27.861 35.676 29.821C36.356 33.771 36.946 38.131 37.296 42.741C37.616 47.351 37.676 51.761 37.576 55.761C37.496 57.761 37.436 59.661 37.276 61.441C37.206 62.331 37.156 63.191 37.076 64.011C36.986 64.831 36.906 65.621 36.826 66.371C36.686 67.881 36.476 69.231 36.316 70.431C36.236 71.031 36.156 71.581 36.086 72.091C36.006 72.601 35.926 73.061 35.856 73.481C35.726 74.301 35.616 74.951 35.546 75.411C35.516 75.621 35.486 75.781 35.476 75.911C35.456 76.021 35.456 76.081 35.456 76.081C35.456 76.081 36.296 72.421 37.026 66.391C37.116 65.641 37.196 64.851 37.296 64.021C37.386 63.201 37.436 62.341 37.506 61.451C37.676 59.671 37.736 57.771 37.826 55.761C37.936 51.751 37.886 47.331 37.566 42.711C37.216 38.091 36.616 33.711 35.916 29.761C35.526 27.791 35.186 25.921 34.756 24.181C34.546 23.311 34.366 22.471 34.156 21.671C33.936 20.871 33.726 20.101 33.536 19.371C33.156 17.901 32.716 16.601 32.366 15.451C32.186 14.881 32.016 14.341 31.856 13.851C31.686 13.371 31.526 12.921 31.386 12.521C31.106 11.741 30.876 11.121 30.726 10.681C30.656 10.481 30.596 10.331 30.546 10.201C30.506 10.091 30.476 10.041 30.476 10.041V10.061Z" fill="#455A64" />
                        <path d="M32.4278 2.86716L36.8878 18.6075C37.3365 20.191 36.4165 21.8383 34.8331 22.287L34.1692 22.4751C32.5857 22.9238 30.9383 22.0039 30.4897 20.4204L26.0297 4.68006C25.581 3.09659 26.5009 1.4492 28.0844 1.00053L28.7483 0.812425C30.3317 0.363751 31.9791 1.28368 32.4278 2.86716Z" fill="#F5F5F5" />
                        <path d="M34.1664 22.4813C34.1664 22.4813 33.9864 22.5313 33.6364 22.5513C33.2964 22.5813 32.7564 22.5513 32.1564 22.2813C31.5664 22.0113 30.9064 21.4413 30.6164 20.5513C30.3464 19.6513 30.0764 18.6013 29.7464 17.4513C29.0964 15.1413 28.3364 12.4013 27.4864 9.36127C27.0564 7.84127 26.6064 6.24128 26.1464 4.59128C25.9364 3.80128 26.0864 2.90127 26.5864 2.21127C26.8364 1.87127 27.1564 1.58128 27.5364 1.37128C27.9064 1.16128 28.3464 1.07128 28.7864 0.941284C29.6264 0.701284 30.5564 0.871286 31.2364 1.38129C31.5764 1.63129 31.8564 1.95126 32.0564 2.32126C32.2664 2.68126 32.3464 3.10127 32.4664 3.52127C32.9364 5.17127 33.3964 6.77126 33.8264 8.29126C34.6964 11.3213 35.4864 14.0613 36.1464 16.3613C36.3164 16.9313 36.4664 17.4813 36.6164 18.0013C36.7664 18.5213 36.9264 19.0013 36.9164 19.4613C36.9164 20.4013 36.4564 21.1413 35.9864 21.5813C35.5064 22.0413 34.9964 22.2013 34.6664 22.3013C34.5164 22.3513 34.3864 22.3913 34.2864 22.4213C34.1964 22.4513 34.1564 22.4713 34.1564 22.4713C34.1564 22.4713 34.2064 22.4713 34.2964 22.4513C34.3964 22.4213 34.5264 22.3913 34.6864 22.3513C35.0164 22.2613 35.5564 22.1213 36.0664 21.6513C36.5664 21.2113 37.0564 20.4413 37.0764 19.4513C37.0964 18.9613 36.9364 18.4513 36.7964 17.9413C36.6564 17.4213 36.4964 16.8713 36.3364 16.3013C35.6864 13.9913 34.9264 11.2513 34.0764 8.21127C33.6464 6.69127 33.1964 5.09128 32.7364 3.44128C32.6164 3.04128 32.5364 2.59128 32.3064 2.19128C32.0864 1.79128 31.7764 1.43129 31.4064 1.16129C30.6664 0.601285 29.6364 0.421274 28.7164 0.681274C28.2864 0.811274 27.8264 0.901286 27.4064 1.13129C26.9964 1.36129 26.6364 1.67127 26.3664 2.05127C25.8164 2.80127 25.6564 3.79129 25.8864 4.66129C26.3564 6.31129 26.8064 7.91127 27.2464 9.43127C28.1164 12.4613 28.9064 15.2013 29.5664 17.5013C29.9064 18.6513 30.1864 19.6913 30.4764 20.6013C30.7964 21.5313 31.5064 22.1113 32.1264 22.3713C32.7564 22.6413 33.3064 22.6413 33.6564 22.5913C34.0064 22.5513 34.1764 22.4713 34.1764 22.4713L34.1664 22.4813Z" fill="#263238" />
                        <path d="M35.4561 76.0912C35.8661 66.0312 35.8761 54.9712 30.1761 46.6812C26.9461 41.9812 22.0861 38.6012 16.8861 36.2612C11.6861 33.9212 6.11607 32.5612 0.576073 31.2012C6.74607 39.8512 20.7161 39.9412 26.6361 48.7712C28.3861 51.3912 29.2161 54.5012 30.0061 57.5512C31.6461 63.8512 33.0961 69.8312 34.7361 76.1412" fill="#455A64" />
                        <path d="M79.5064 40.7912C79.5064 40.7912 79.4564 40.7912 79.3664 40.7912C79.2564 40.8012 79.1264 40.8212 78.9664 40.8312C78.6164 40.8812 78.0964 40.9212 77.4364 41.0512C76.1064 41.2612 74.2064 41.6812 71.9264 42.4312C69.6464 43.1712 67.0064 44.3213 64.2664 45.9413C62.9064 46.7613 61.5264 47.7012 60.1564 48.7612C58.7964 49.8412 57.4664 51.0412 56.1964 52.3612C54.9264 53.6812 53.7964 55.0913 52.7964 56.5013C52.2764 57.2013 51.8364 57.9212 51.3764 58.6112C50.9564 59.3312 50.5164 60.0213 50.1464 60.7213C48.6064 63.5113 47.5464 66.1813 46.8264 68.4713C46.1064 70.7613 45.7064 72.6713 45.5164 74.0013C45.3964 74.6613 45.3664 75.1813 45.3264 75.5312C45.3064 75.6912 45.2964 75.8212 45.2864 75.9312C45.2864 76.0212 45.2864 76.0712 45.2864 76.0712C45.2864 76.0712 45.3064 76.0213 45.3164 75.9413C45.3364 75.8313 45.3564 75.7012 45.3864 75.5412C45.4464 75.1912 45.4964 74.6712 45.6264 74.0212C45.8464 72.7012 46.2764 70.8113 47.0164 68.5312C47.7564 66.2612 48.8364 63.6112 50.3764 60.8412C50.7464 60.1412 51.1764 59.4613 51.6064 58.7513C52.0664 58.0613 52.5064 57.3412 53.0264 56.6512C54.0264 55.2512 55.1464 53.8612 56.4064 52.5512C57.6664 51.2312 58.9864 50.0413 60.3364 48.9713C61.6864 47.9113 63.0664 46.9812 64.4064 46.1512C67.1264 44.5312 69.7364 43.3712 72.0064 42.6112C74.2664 41.8412 76.1564 41.3912 77.4764 41.1512C78.1264 41.0112 78.6464 40.9513 78.9964 40.8813C79.1564 40.8513 79.2864 40.8312 79.3964 40.8112C79.4864 40.7912 79.5264 40.7812 79.5264 40.7812L79.5064 40.7912Z" fill="#455A64" />
                        <path d="M89.4165 34.339L89.7155 34.9608C90.4287 36.4441 89.8044 38.2247 88.3212 38.9379L73.5771 46.0274C72.0938 46.7406 70.3132 46.1163 69.6 44.6331L69.301 44.0112C68.5878 42.528 69.2121 40.7474 70.6953 40.0342L85.4394 32.9447C86.9227 32.2315 88.7033 32.8557 89.4165 34.339Z" fill="#F5F5F5" />
                        <path d="M69.2956 44.0121C69.2956 44.0121 69.2156 43.8421 69.1356 43.5021C69.0456 43.1721 68.9756 42.6421 69.1356 42.0021C69.2956 41.3721 69.7456 40.6221 70.5756 40.1821C71.4156 39.7621 72.4056 39.3121 73.4856 38.7921C75.6456 37.7621 78.2156 36.5421 81.0656 35.1821C82.4956 34.5021 83.9856 33.7821 85.5356 33.0421C86.2756 32.6921 87.1956 32.6921 87.9556 33.0621C88.3356 33.2521 88.6756 33.5221 88.9456 33.8521C89.2156 34.1821 89.3756 34.6021 89.5856 35.0121C89.9656 35.8021 89.9556 36.7421 89.5756 37.5021C89.3856 37.8821 89.1156 38.2121 88.7856 38.4721C88.4656 38.7321 88.0656 38.8921 87.6756 39.0821C86.1256 39.8321 84.6356 40.5521 83.2056 41.2421C80.3656 42.6221 77.8056 43.8621 75.6556 44.9121C75.1156 45.1721 74.6056 45.4221 74.1256 45.6621C73.6356 45.9021 73.1956 46.1421 72.7356 46.2021C71.8156 46.3521 71.0056 46.0421 70.4856 45.6421C69.9556 45.2521 69.7056 44.7721 69.5456 44.4621C69.4656 44.3221 69.4056 44.2021 69.3556 44.1121C69.3156 44.0321 69.2856 43.9921 69.2856 43.9921C69.2856 43.9921 69.2956 44.0421 69.3356 44.1221C69.3756 44.2221 69.4356 44.3421 69.4956 44.4921C69.6356 44.8021 69.8756 45.3121 70.4156 45.7321C70.9356 46.1521 71.7756 46.5021 72.7556 46.3521C73.2456 46.2921 73.7156 46.0421 74.1956 45.8121C74.6856 45.5821 75.1956 45.3421 75.7356 45.0821C77.8956 44.0521 80.4656 42.8321 83.3156 41.4721C84.7456 40.7921 86.2356 40.0721 87.7856 39.3321C88.1656 39.1421 88.5856 38.9821 88.9456 38.6921C89.3056 38.4121 89.6056 38.0421 89.8056 37.6221C90.2256 36.7921 90.2356 35.7521 89.8256 34.8921C89.6256 34.4921 89.4656 34.0521 89.1556 33.6821C88.8656 33.3121 88.4856 33.0121 88.0656 32.8121C87.2256 32.4021 86.2256 32.4121 85.4156 32.7921C83.8656 33.5421 82.3756 34.2621 80.9456 34.9421C78.1056 36.3221 75.5456 37.5621 73.3956 38.6121C72.3256 39.1421 71.3456 39.6021 70.4956 40.0421C69.6356 40.5221 69.1856 41.3121 69.0256 41.9621C68.8656 42.6321 68.9656 43.1721 69.0656 43.5021C69.1656 43.8421 69.2756 44.0021 69.2756 44.0021L69.2956 44.0121Z" fill="#263238" />
                    </svg>

                    <svg class="grass-stone" xmlns="http://www.w3.org/2000/svg" width="44" height="22" viewBox="0 0 44 22" fill="none">
                        <path d="M43.0791 21.5593L33.5991 5.10928L16.3091 0.279297L0.139099 14.0293V21.5593" fill="#EBEBEB" />
                        <path d="M33.5996 5.10928L0.13961 14.0293L16.3096 0.279297L33.5996 5.10928Z" fill="#E0E0E0" />
                        <path d="M0.139568 21.56C0.139568 21.56 0.169571 21.39 0.189571 21.05C0.19957 20.66 0.219566 20.18 0.229565 19.57C0.249565 18.22 0.269566 16.35 0.309566 14.03L0.249569 14.16C4.22957 10.8 9.96957 5.96998 16.4796 0.47998L16.2396 0.529999C17.4996 0.879999 18.8296 1.24997 20.1796 1.62997C24.9696 2.95997 29.5096 4.22 33.5396 5.34L33.3996 5.22998C36.2196 10.04 38.6096 14.12 40.3296 17.06C41.1596 18.45 41.8396 19.57 42.3296 20.4C42.5496 20.75 42.7296 21.04 42.8796 21.28C43.0096 21.48 43.0796 21.57 43.0896 21.57C43.0996 21.57 43.0496 21.45 42.9496 21.24C42.8196 20.99 42.6596 20.69 42.4696 20.33C41.9996 19.49 41.3696 18.34 40.5796 16.92C38.8996 13.96 36.5696 9.85 33.8196 5L33.7696 4.91998L33.6796 4.88998C29.6496 3.75998 25.1196 2.47998 20.3396 1.13998C18.9896 0.759984 17.6596 0.389978 16.3996 0.039978L16.2696 0L16.1696 0.0899963C9.69957 5.64 4.00957 10.52 0.0595665 13.91L-0.000431061 13.96V14.04C0.0295677 16.36 0.0595703 18.23 0.0795708 19.58C0.0995712 20.18 0.109566 20.67 0.119564 21.06C0.129562 21.4 0.149567 21.57 0.169567 21.57L0.139568 21.56Z" fill="#263238" />
                    </svg>


                    <svg class="bottom-line-gif-svg" width="671" height="15" viewBox="0 0 671 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="test1" d="M0.000473022 8.2092C0.000473022 8.3492 21.4905 8.46921 47.9905 8.46921C74.4905 8.46921 95.9805 8.3492 95.9805 8.2092C95.9805 8.0692 74.5005 7.94922 47.9905 7.94922C21.4805 7.94922 0.000473022 8.0692 0.000473022 8.2092Z" fill="#263238" />
                        <path id="test" d="M35.5711 14.4592C35.5711 14.5992 42.3511 14.7192 50.7211 14.7192C59.0911 14.7192 65.8711 14.5992 65.8711 14.4592C65.8711 14.3192 59.0911 14.1992 50.7211 14.1992C42.3511 14.1992 35.5711 14.3192 35.5711 14.4592Z" fill="#263238" />
                        <path d="M0.000976562 0.26001C0.000976562 0.40001 150.041 0.519989 335.091 0.519989C520.141 0.519989 670.211 0.40001 670.211 0.26001C670.211 0.12001 520.201 0 335.091 0C149.981 0 0.000976562 0.12001 0.000976562 0.26001Z" fill="#263238" />
                    </svg>


                </div>
            </div>
        </div>
    </div> -->
</section>


<?php $cat1_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat1_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 5
));

if ($cat1_posts->have_posts()) :
    $cat = get_category_by_slug($cat1_slug);
    $hex_color_1 = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($hex_color_1) && $cat->parent) {
        $hex_color_1 = get_term_meta($cat->parent, 'hex_code_1', true);
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#ED1B1B';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($title_color)) {
            $title_color = '#ED1B1B';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_4', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_4', true);
        if (empty($gradient_color)) {
            $gradient_color = '#ED1B1B';
        }
    } ?>
    <style>
        .business-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $bg_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $bg_color; ?> 100%);
        }
    </style>
    <section class="business-sec">
        <div class="container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $hex_color_1; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat1_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat1_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php while ($cat1_posts->have_posts()) : $cat1_posts->the_post();
                            get_template_part('template-parts/cat', 'style-one-card', array('hex_color' => $hex_color_1, 'bg_color' => $bg_color));
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $bg_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $title_color; ?>;">Best Seven</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat1_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat1_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'orderby' => 'date',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat1_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat1_posts->have_posts()) : $best_cat1_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php $cat2_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat2_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 7
));
if ($cat2_posts->have_posts()) :
    $cat = get_category_by_slug($cat2_slug);
    $hex_color_1 = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($hex_color_1) && $cat->parent) {
        $hex_color_1 = get_term_meta($cat->parent, 'hex_code_1', true);
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#ED1B1B';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($title_color)) {
            $title_color = '#ED1B1B';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_4', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_4', true);
        if (empty($gradient_color)) {
            $gradient_color = '#ED1B1B';
        }
    } ?>
    <style>
        .lifestyle-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $bg_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $bg_color; ?> 100%);
        }
    </style>
    <section class="lifestyle-sec">
        <div class=" container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $hex_color_1; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat2_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat2_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php $loop1 = 0;
                        while ($cat2_posts->have_posts()) : $cat2_posts->the_post();
                            if ($loop1 == 0) {
                                echo get_template_part('template-parts/cat', 'style-two-hero-card', array('hex_color' => $hex_color_1)) . '<div class="flex flex-col md:flex-row px-[0px] md:px-[20px] py-0 md:py-[15px] md:border-b md:border-[#202020] md:gap-[32px] relative ">';
                            } else {
                                if ($loop1 % 2 == 0) {
                                    echo get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $hex_color_1)) . '<span class=" hidden md:flex h-[120px] w-[1px] bg-[#202020] absolute left-[50%] -translate-x-[50%] "></span></div>';
                                } else {
                                    echo ($loop1 != 1) ? '<div class="flex flex-col md:flex-row px-0 md:px-[20px] py-0 md:py-[15px] md:border-b border-[#202020] gap-[0px] md:gap-[32px] relative ">' : '';
                                    get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $hex_color_1));
                                }
                            }
                            $loop1++;
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $bg_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $title_color; ?>;">Best Seven</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat2_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat2_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'orderby' => 'date',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat2_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat2_posts->have_posts()) : $best_cat2_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php $cat3_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat3_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 5
));

if ($cat3_posts->have_posts()) :
    $cat = get_category_by_slug($cat3_slug);
    $hex_color_1 = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($hex_color_1) && $cat->parent) {
        $hex_color_1 = get_term_meta($cat->parent, 'hex_code_1', true);
    }

    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#ED1B1B';
        }
    }

    $title_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($title_color)) {
            $title_color = '#ED1B1B';
        }
    }

    $gradient_color = get_term_meta($cat->term_id, 'hex_code_4', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_4', true);
        if (empty($gradient_color)) {
            $gradient_color = '#ED1B1B';
        }
    } ?>

    <style>
        .social-media-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $bg_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $bg_color; ?> 100%);
        }
    </style>
    <section class="social-media-sec">
        <div class="container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $hex_color_1; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat3_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat3_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php while ($cat3_posts->have_posts()) : $cat3_posts->the_post();
                            get_template_part('template-parts/cat', 'style-one-card', array('hex_color' => $hex_color_1, 'bg_color' => $bg_color));
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $bg_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $title_color; ?>;">Best Seven</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat3_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat3_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'orderby' => 'date',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat3_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat3_posts->have_posts()) : $best_cat3_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<section class="about-us-sec overflow-hidden">
    <span class="about-us-sec-light-top"></span>
    <span class="about-us-sec-light-bottom"></span>
    <div class=" container mx-auto h-full  ">
        <div class="flex h-full flex-col md:flex-row z-1 gap-[50px] sm:gap-[60px] md:gap-[70px] lg:gap-0 ">
            <div class="w-full md:w-1/2 ">

                <div class="flex  flex-col justify-center h-full">
                    <span class="home-about-sm-title">
                        <svg class="home-about-sm-title-svg" width="18" height="20" viewBox="0 0 18 20" fill="#ED1B1B" xmlns="http://www.w3.org/2000/svg">
                            <line class="line01" x1="16.5219" y1="3.99585" x2="17.1433" y2="12.9744" stroke="#ED1B1B" stroke-width="1.25" />
                            <line class="line02" x1="0.256716" y1="15.7363" x2="8.51832" y2="19.3064" stroke="#ED1B1B" stroke-width="1.25" />
                            <line class="line03" x1="4.46074" y1="0.721134" x2="11.8435" y2="14.916" stroke="#ED1B1B" stroke-width="1.25" />
                        </svg>
                        About us
                    </span>

                    <h2 class="home-about-title">
                        7 BEST THINGS
                    </h2>

                    <div class="home-about-dsc-wrapper">
                        <p class="home-about-dsc">
                            7bestthings.com’s main purpose is to share valuable information on every niche. 7bestthings.
                            com is a platform that has committed itself to cover all the trendy information from the industry and share them with its readers.
                        </p>
                    </div>


                    <div class="counter-card-wrapper">
                        <div class="counter-card">
                            <span id="counter" class="counter">
                                500
                            </span>
                            <span class="counter">
                                +
                            </span>
                            <h2 class="counter-title">
                                Comparison Lists
                            </h2>
                        </div>
                        <span class="card-sap">

                        </span>
                        <div class="counter-card">
                            <span id="one" class="counter">
                                5,000
                            </span>
                            <span class="counter">
                                +
                            </span>

                            <h2 class="counter-title">
                                Hours of Research
                            </h2>
                        </div>
                        <span class="card-sap">

                        </span>
                        <div class="counter-card">
                            <span id="tow" class="counter">
                                16
                            </span>
                            <span class="counter">
                                M+
                            </span>
                            <h2 class="counter-title">
                                Happy Subscriber's
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" w-full md:w-1/2 relative slider-main-wrapper">
                <div class="main">
                    <div class="mainBoxes fs"></div>
                    <div class="mainClose">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" fill="none">
                            <circle cx="30" cy="30" r="30" fill="#000" opacity="0.4" />
                            <path d="M15,16L45,46 M45,16L15,46" stroke="#000" stroke-width="3.5" opacity="0.5" />
                            <path d="M15,15L45,45 M45,15L15,45" stroke="#fff" stroke-width="2" />
                        </svg>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>








<?php $cat4_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat4_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 5
));
if ($cat4_posts->have_posts()) :
    $cat = get_category_by_slug($cat4_slug);
    $hex_color_1 = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($hex_color_1) && $cat->parent) {
        $hex_color_1 = get_term_meta($cat->parent, 'hex_code_1', true);
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#ED1B1B';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($title_color)) {
            $title_color = '#ED1B1B';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_4', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_4', true);
        if (empty($gradient_color)) {
            $gradient_color = '#ED1B1B';
        }
    } ?>
    <style>
        .entertainment-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $bg_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $bg_color; ?> 100%);
        }
    </style>

    <section class="entertainment-sec">
        <div class=" container mx-auto ">
            <h2 class="h-sec-title" style="color:<?php echo $hex_color_1; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat4_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat4_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php while ($cat4_posts->have_posts()) : $cat4_posts->the_post();
                            get_template_part('template-parts/cat', 'style-one-card', array('hex_color' => $hex_color_1, 'bg_color' => $bg_color));
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $bg_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $title_color; ?>;">Best Seven</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat4_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat4_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'orderby' => 'date',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat4_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat4_posts->have_posts()) : $best_cat4_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php $cat5_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat5_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 7
));
if ($cat5_posts->have_posts()) :
    $cat = get_category_by_slug($cat5_slug);
    $hex_color_1 = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($hex_color_1) && $cat->parent) {
        $hex_color_1 = get_term_meta($cat->parent, 'hex_code_1', true);
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#ED1B1B';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($title_color)) {
            $title_color = '#ED1B1B';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_4', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_4', true);
        if (empty($gradient_color)) {
            $gradient_color = '#ED1B1B';
        }
    } ?>
    <style>
        .health-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $bg_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $bg_color; ?> 100%);
        }
    </style>
    <section class="health-sec">
        <div class=" container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $hex_color_1; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat5_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat5_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php $loop2 = 0;
                        while ($cat5_posts->have_posts()) : $cat5_posts->the_post();
                            if ($loop2 == 0) {
                                echo get_template_part('template-parts/cat', 'style-two-hero-card', array('hex_color' => $hex_color_1)) . '<div class="flex flex-col md:flex-row md:px-[20px] md:py-[15px] md:border-b border-[#202020] md:gap-[32px] gap-0 relative ">';
                            } else {
                                if ($loop2 % 2 == 0) {
                                    echo get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $hex_color_1)) . '<span class=" hidden md:flex h-[120px] w-[1px] bg-[#202020] absolute left-[50%] -translate-x-[50%] "></span></div>';
                                } else {
                                    echo ($loop2 != 1) ? '<div class="flex flex-col md:flex-row px-0 md:px-[20px] py-0 md:py-[15px] md:border-b border-[#202020] gap-0 md:gap-[32px] relative ">' : '';
                                    get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $hex_color_1));
                                }
                            }
                            $loop2++;
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $bg_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $title_color; ?>;">Best Seven</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat5_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat5_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'orderby' => 'date',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat5_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat5_posts->have_posts()) : $best_cat5_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php $cat6_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat6_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 5
));
if ($cat6_posts->have_posts()) :
    $cat = get_category_by_slug($cat6_slug);
    $hex_color_1 = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($hex_color_1) && $cat->parent) {
        $hex_color_1 = get_term_meta($cat->parent, 'hex_code_1', true);
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#ED1B1B';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($title_color)) {
            $title_color = '#ED1B1B';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_4', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_4', true);
        if (empty($gradient_color)) {
            $gradient_color = '#ED1B1B';
        }
    } ?>
    <style>
        .technology-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $bg_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $bg_color; ?> 100%);
        }
    </style>
    <section class="technology-sec">
        <div class="container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $hex_color_1; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat6_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat6_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php while ($cat6_posts->have_posts()) : $cat6_posts->the_post();
                            get_template_part('template-parts/cat', 'style-one-card', array('hex_color' => $hex_color_1, 'bg_color' => $bg_color));
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $bg_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $title_color; ?>;">Best Seven</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat6_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat6_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'orderby' => 'date',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat6_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat6_posts->have_posts()) : $best_cat6_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php $cat7_posts = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => $cat7_slug,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 7
));
if ($cat7_posts->have_posts()) :
    $cat = get_category_by_slug($cat7_slug);
    $hex_color_1 = get_term_meta($cat->term_id, 'hex_code_1', true);
    if (empty($hex_color_1) && $cat->parent) {
        $hex_color_1 = get_term_meta($cat->parent, 'hex_code_1', true);
    }
    $bg_color = get_term_meta($cat->term_id, 'hex_code_2', true);
    if (empty($bg_color) && $cat->parent) {
        $bg_color = get_term_meta($cat->parent, 'hex_code_2', true);
        if (empty($bg_color)) {
            $bg_color = '#ED1B1B';
        }
    }
    $title_color = get_term_meta($cat->term_id, 'hex_code_3', true);
    if (empty($title_color) && $cat->parent) {
        $title_color = get_term_meta($cat->parent, 'hex_code_3', true);
        if (empty($title_color)) {
            $title_color = '#ED1B1B';
        }
    }
    $gradient_color = get_term_meta($cat->term_id, 'hex_code_4', true);
    if (empty($gradient_color) && $cat->parent) {
        $gradient_color = get_term_meta($cat->parent, 'hex_code_4', true);
        if (empty($gradient_color)) {
            $gradient_color = '#ED1B1B';
        }
    } ?>
    <style>
        .education-sec .home-side-card:not(:last-child):after {
            content: "";
            background: linear-gradient(90deg, <?php echo $bg_color; ?> 0%, <?php echo $gradient_color; ?> 12.50%, <?php echo $gradient_color; ?> 87.26%, <?php echo $bg_color; ?> 100%);
        }
    </style>
    <section class="education-sec">
        <div class=" container mx-auto">
            <h2 class="h-sec-title" style="color:<?php echo $hex_color_1; ?>;">
                <a href="<?php echo get_category_link(get_category_by_slug($cat7_slug)->term_id); ?>"><?php echo get_cat_name(get_category_by_slug($cat7_slug)->term_id); ?></a>
            </h2>
            <div class="section-wrapper">
                <div class="w-full lg:w-8/12 2xl:w-[887px]">
                    <div class="flex flex-col">
                        <?php $loop3 = 0;
                        while ($cat7_posts->have_posts()) : $cat7_posts->the_post();
                            if ($loop3 == 0) {
                                echo get_template_part('template-parts/cat', 'style-two-hero-card', array('hex_color' => $hex_color_1)) . '<div class="flex flex-col md:flex-row md:px-[20px] md:py-[15px] md:border-b border-[#202020] gap-0 md:gap-[32px] relative ">';
                            } else {
                                if ($loop3 % 2 == 0) {
                                    echo get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $hex_color_1)) . '<span class=" hidden md:flex h-[120px] w-[1px] bg-[#202020] absolute left-[50%] -translate-x-[50%] "></span></div>';
                                } else {
                                    echo ($loop3 != 1) ? '<div class="flex flex-col md:flex-row md:px-[20px] md:py-[15px] md:border-b border-[#202020] gap-0 md:gap-[32px] relative ">' : '';
                                    get_template_part('template-parts/cat', 'style-two-card', array('hex_color' => $hex_color_1));
                                }
                            }
                            $loop3++;
                        endwhile; ?>
                    </div>
                </div>
                <div class="w-full lg:w-4/12 2xl:w-[513px]">
                    <div class="home-side-bar" style="background-color:<?php echo $bg_color; ?>;">
                        <span class="home-side-bar-transform-r" style="color:<?php echo $title_color; ?>;">Best Seven</span>
                        <h3 class="h-s-b-title text-white">BEST SEVEN PICK’S</h3>
                        <?php $best_cat7_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'category_name' => $cat7_slug,
                            'post_status' => 'publish',
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'orderby' => 'date',
                            'order'   => 'DESC',
                            'posts_per_page' => 7
                        ));
                        if ($best_cat7_posts->have_posts()) : ?>
                            <div class="home-side-wrapper">
                                <?php while ($best_cat7_posts->have_posts()) : $best_cat7_posts->the_post();
                                    get_template_part('template-parts/cat', 'sidebar-card');
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php get_footer(); ?>