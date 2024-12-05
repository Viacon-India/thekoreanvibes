<!doctype html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <?php wp_head(); ?>

    <script async="" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9502972669695969" crossorigin="anonymous" data-checked-head="true"></script>

    <meta name="spr-verification" content="85fc792d2fa829q">
    <meta name="ab4e64984068d1911ee335dca1e6f91e" content="">
    <meta name="linkdoozer-verification" content="01c144e2-10fa-4cc9-b669-382672f0d6b5">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

<body <?php body_class(); ?>>
    <header class="relative">
        <nav class="navbar bg-base-100">
            <div class="nav-bar-container">
                <div class="nav-bar-container-inner">
                    <div class="navbar-c-start">
                        <a href="<?php echo home_url(); ?>">
                            <?php if (function_exists('logo_url')) {
                                if (is_file(realpath($_SERVER["DOCUMENT_ROOT"]) . parse_url(logo_url())['path'])) {
                                    echo '<img class="nav-bar-logo" src="' . logo_url() . '" alt="logo" />';
                                } else {
                                    echo '<span class="nav-bar-logo">' . get_bloginfo('name') . '</span>';
                                }
                            } else {
                                echo '<span class="nav-bar-logo">' . get_bloginfo('name') . '</span>';
                            } ?>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>

    <?php $facebook = get_option('facebook');
    $linkedin = get_option('linkedin'); ?>

