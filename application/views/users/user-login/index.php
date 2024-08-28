<?php if (isset($_SESSION['logged_in_users'])) { ?>
    <script>
        window.location.href="<?= base_url('checkout/myorder') ?>";
    </script>
<?php } ?>

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('assets2/images/bg/naji.jpg') ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="<?= base_url('users') ?>">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Login/Register</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-form-wrap mt--60">
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Login</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form id="login-form" method="post">
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" id="log_email" name="email" placeholder="Your Email*" style="width:100%" required>
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" id="log_password" name="password" placeholder="Your Password*" style="width:100%" required>
                                </div>
                            </div>

                            <div class="contact-btn">
                                <button type="submit" class="fv-btn">Login</button>
                            </div>
                        </form>
                        <div class="form-output">
                            <p class="form-messege " id="login-form-messege"></p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-6">
                <div class="contact-form-wrap mt--60">
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Register</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">

                        <form id="register-form" method="post">
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" id="name" value="<?= set_value('name') ?>" name="name" placeholder="Your Name*" style="width:100%">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="email" id="email" name="email" placeholder="Your Email*" style="width:100%" required>
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="number" id="mobile" name="mobile" placeholder="Your Mobile*" style="width:100%" required>
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" id="password" name="password" placeholder="Your Password*" style="width:100%" required>
                                </div>
                            </div>

                            <div class="contact-btn">
                                <button type="submit" class="fv-btn">Register</button>
                            </div>
                        </form>
                        <div class="form-output">
                            <p class="form-messege text-danger" id="register-form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- End Contact Area -->

<script>
    $(document).ready(function() {

        // user register
        $('#register-form').on('submit', function() {
            let name = $('#name').val();
            let email = $('#email').val();
            let mobile = $('#mobile').val();
            let password = $('#password').val();

            $.ajax({
                type: "POST",
                url: `<?= base_url('user/register') ?>`,
                dataType: "JSON",
                data: {
                    name: name,
                    email: email,
                    mobile: mobile,
                    password: password,
                },
                success: function(data) {
                    if (data.status == true) {
                        $('#name').val('');
                        $('#email').val('');
                        $('#mobile').val('');
                        $('#password').val('');
                        $('#register-form-messege').text(data.message);
                    } else {
                        $('#register-form-messege').text(data.message);
                    }
                }
            });
            return false;
        });


        // user login
        $('#login-form').on('submit', function() {
            let email = $('#log_email').val();
            let password = $('#log_password').val();

            $.ajax({
                type: "POST",
                url: `<?= base_url('user/login') ?>`,
                dataType: "JSON",
                data: {
                    email: email,
                    password: password,
                },
                success: function(data) {
                    if (data.status == true) {
                        $('#log_email').val('');
                        $('#log_password').val('');
                        $('#login-form-messege').text(data.message);
                        window.location.href = "<?= base_url('users') ?>";
                    } else {
                        $('#login-form-messege').text(data.message);
                    }
                }
            });
            return false;
        });


    })
</script>