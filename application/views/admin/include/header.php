<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.png') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/normalize.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/pe-icon-7-filled.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/flag-icon.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/cs-skin-elastic.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- data tabile css -->
    <link href="  https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- bootstrap icon -->
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">


</head>

<body>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">Menu</li>
                    <li class="menu-item-has-children dropdown <?php echo is_active('category'); ?>">
                        <a href="<?= base_url('category') ?>"> Category Master</a>
                    </li>
                    <li class="menu-item-has-children dropdown <?php echo is_active('product'); ?>">
                        <a href="<?= base_url('product') ?>"> Product Master</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="<?= base_url('order_master') ?>"> Order Master</a>
                    </li>
                    <li class="menu-item-has-children dropdown <?php echo is_active('users'); ?>">
                        <a href="<?= base_url('users/user') ?>"> User Master</a>
                    </li>
                    <li class="menu-item-has-children dropdown <?php echo is_active('Contact_us'); ?>">
                        <a href="<?= base_url('Contact_us/contact') ?>"> Contact us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html"><img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="index.html"><img src="<?= base_url('assets/images/logo2.png') ?>" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin</a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?= base_url('admin/logout') ?>"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="content pb-0">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <?= bs_alert() ?>