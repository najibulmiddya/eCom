<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Login Page</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?= base_url('assets/css/normalize.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/themify-icons.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/pe-icon-7-filled.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/flag-icon.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/cs-skin-elastic.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">
   <div class="sufee-login d-flex align-content-center flex-wrap">
      <div class="container">
         <div class="login-content">
            <div class="login-form mt-150">
            <?= bs_alert() ?>
               <form action="<?= base_url('admin/login') ?>" method="post">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="user_name" value="<?=set_value('user_name')?>" class="form-control" placeholder="User Name">
                     <?= form_error('user_name', '<div class="error text-danger">', '</div>') ?>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password">
                     <?= form_error('password', '<div class="error text-danger">', '</div>') ?>
                  </div>
                  <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
               </form>
               
            </div>
         </div>
      </div>
   </div>
   <script src="<?= base_url('assets/js/vendor/jquery-2.1.4.min.js') ?>" type="text/javascript"></script>
   <script src="<?= base_url('assets/js/popper.min.js') ?>" type="text/javascript"></script>
   <script src="<?= base_url('assets/js/plugins.js') ?>" type="text/javascript"></script>
   <script src="<?= base_url('assets/js/main.js') ?>" type="text/javascript"></script>
</body>

</html>