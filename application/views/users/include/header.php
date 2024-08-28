<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets2/images/favicon.ico') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets2/apple-touch-icon.png') ?>">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="<?= base_url('assets2/css/bootstrap.min.css') ?>">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="<?= base_url('assets2/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets2/css/owl.theme.default.min.css') ?>">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="<?= base_url('assets2/css/core.css') ?>">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="<?= base_url('assets2/css/shortcode/shortcodes.css') ?>">
    <!-- Theme main style -->
    <link rel="stylesheet" href="<?= base_url('assets2/style.css') ?>">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?= base_url('assets2/css/responsive.css') ?>">
    <!-- User style -->
    <link rel="stylesheet" href="<?= base_url('assets2/css/custom.css') ?>">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- Modernizr JS -->
    <script src="<?= base_url('assets2/js/vendor/modernizr-3.5.0.min.js') ?>"></script>

    <!-- bootstrap icon -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<?php $obj = new MyLibrary();
$total_product = $obj->total_product();
?>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href="index.html"><img src="<?= base_url('assets2/images/logo/4.png') ?>" alt="logo images"></a>
                                </div>
                            </div>

                            <div class="col-md-7 col-lg-6 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">

                                        <li class="drop"><a href="<?= base_url('users') ?>">Home</a></li>

                                        <?php if ($_SESSION['CATEGORY']) {
                                            $cat = $_SESSION['CATEGORY'];
                                            if ($cat > 0) {
                                                foreach ($cat as $key => $v) { ?>
                                                    <li><a href="<?= base_url("users/product_category/{$v->id}") ?>"><?= $v->categorys ?></a></li>
                                        <?php  }
                                            }
                                        } else {
                                            redirect('users');
                                        } ?>
                                        <li><a href="<?= base_url('contact_us') ?>">contact</a></li>


                                    </ul>
                                </nav>
                            </div>

                            <div class="col-md-3 col-lg-4 col-sm-4 col-xs-4">
                                <div class="header__right">

                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>


                                    <div class="header__account">
                                        <?php if (isset($_SESSION['logged_in_users'])) { ?>
                                            <a href="<?= base_url('user/logout') ?>">Logout</a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('user') ?>">Login/Register</a>
                                        <?php } ?>
                                    </div>

                                    <?php if (isset($_SESSION['logged_in_users'])) { ?>
                                        <li style="list-style: none; font-size: 18px;"><a href="<?= base_url('checkout/myorder') ?>">My order|</a></li>
                                    <?php } ?>

                                    <div class="htc__shopping__cart">
                                        <!-- cart -->
                                        <a class="cart__menu" href="<?= base_url('manage_cart/cat') ?>"><i class="icon-handbag icons"></i></a>
                                        <a href="<?= base_url('manage_cart/cart') ?>"><span class="htc__qua"><?= $total_product ?></span></a>

                                        <!-- wishlist -->
                                        <?php if (isset($_SESSION['logged_in_users'])) { ?>
                                            <div class="htc__shopping__cart">

                                                <a class="cart__menu" href="<?= base_url('Manage_cart/wishlist_view') ?>">
                                                    <i class="icon-heart icons"></i>
                                                </a>

                                                <a href="<?= base_url('Manage_cart/wishlist_view') ?>">
                                                    <span class="htc__qua">
                                                    <?php if (isset($_SESSION['wishlist_qty'])) { echo $_SESSION['wishlist_qty'];} else { echo 0;
                                                    } ?>
                                                    </span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->


        <?= bs_alert() ?>


        <!-- Start Search Popap -->
        <div class="search__area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search__inner">
                            <form action="<?= base_url('product/search') ?>" method="get">
                                <input placeholder="Search here... " type="text" name="str">
                                <button type="submit"></button>
                            </form>
                            <div class="search__close__btn">
                                <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>