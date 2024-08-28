<?php
if (!$_SESSION['cart'] && count($_SESSION['cart']) == 0) { ?>
    <script>
        window.location.href = "<?= base_url('users') ?>"
    </script>
<?php } ?>


<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('assets2/images/bg/naji.jpg') ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="<?= base_url('users') ?>">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <?php
                            $accordion__class = "accordion__title";
                            if (!isset($_SESSION['logged_in_users'])) {
                                $accordion__class = "accordion__hide";
                            ?>

                                <div class="accordion__title">
                                    Checkout Method
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">

                                            <!-- Login Form start -->
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form id="login-form" method="post">
                                                        <h5 class="checkout-method__title">Login</h5>
                                                        <div class="single-input">
                                                            <label for="user-email">Email Address</label>
                                                            <input type="text" id="log_email" name="email" placeholder="Your Email*" style="width:100%" required>
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-pass">Password</label>
                                                            <input type="password" id="log_password" name="" placeholder="Your Password*" style="width:100%" required>
                                                        </div>
                                                        <div class="form-output">
                                                            <p class="form-messege text-danger" id="login-form-messege"></p>
                                                        </div>
                                                        <div class="dark-btn">
                                                            <button type="submit" class="fv-btn">Login</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Login From end -->

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="checkout-method__login">
                                                        <form id="register-form" method="post">
                                                            <h5 class="checkout-method__title">Register</h5>

                                                            <div class="single-input form-group col-5">
                                                                <label for="user-email">Name</label>
                                                                <input type="text" id="name" value="<?= set_value('name') ?>" name="name" placeholder="Your Name*" style="width:100%">
                                                            </div>
                                                            <div class="single-input form-group col-5">
                                                                <label for="email">Email Address</label>
                                                                <input type="email" id="email" name="email" value="<?= set_value('email') ?>" placeholder="Your Email*" style="width:100%" required>
                                                            </div>

                                                            <div class="single-input form-group col-5">
                                                                <label for="mobile">Mobile</label>
                                                                <input type="number" id="mobile" name="mobile" value="<?= set_value('mobile') ?>" placeholder="Your Mobile*" style="width:100%" required>
                                                            </div>

                                                            <div class="single-input form-group col-5">
                                                                <label for="pass">Password</label>
                                                                <input type="password" id="password" placeholder="Your Password*" style="width:100%" required>
                                                            </div>

                                                            <div class="form-output">
                                                                <p class="form-messege text-danger" id="register-form-messege"></p>
                                                            </div>

                                                            <div class="dark-btn">
                                                                <button type="submit" class="fv-btn">Register</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="<?= $accordion__class ?>">
                                Address Information
                            </div>
                            <div class="accordion__body">
                                <div class="bilinfo">
                                <!-- Address Information from state -->
                                    <form action="<?=base_url('checkout/order')?>" method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Name" name=name value="<?=set_value('name')?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Address" name="address" value="<?=set_value('address')?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Apartment"  name="apartment" value="<?=set_value('apartment')?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="City" name="city" value="<?=set_value('city')?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="State" name="state" value="<?=set_value('state')?>" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="number" placeholder="Pincode/zip" name="pincode" value="<?=set_value('pincode')?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="email" placeholder="Email address" name="email" value="<?=set_value('email')?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Phone Number" name="mobile"  value="<?=set_value('mobile')?>">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="<?= $accordion__class ?>">
                                payment information
                            </div>
                            <div class="accordion__body">
                                <div class="paymentinfo">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymet_type" id="flexRadioDefault1" value="COD" required>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            COD
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymet_type" id="flexRadioDefault2" value="PAYU">
                                        <label class="form-check-label" for="flexRadioDefault2" required>
                                            PAYU
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Confirm order</button>
                            </form>
                            <!-- Address Information from end -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">

                        <?php
                        $cart_total = 0;
                        foreach ($_SESSION['cart'] as $key => $v) {
                            $data = get_product(null, $key);
                            $name = $data[0]->name;
                            $mrp = $data[0]->mrp;
                            $price = $data[0]->price;
                            $image = $data[0]->image;
                            $qty = $v['qty'];
                            $cart_total = $cart_total + ($price * $qty);
                        ?>

                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src="<?= PRODUCT_IMAGE_SITE_PATH . $image ?>" alt="ordered item">
                                </div>
                                <div class="single-item__content">
                                    <a href="#"><?= $name ?></a>
                                    <span class="price"><?= $price ?></span>
                                </div>
                                <div class="single-item__remove">

                                    <a href="javascript:void(0)" onclick="manage_cart(<?= $key ?>,'remove',<?= $qty ?>)">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a>

                                </div>
                            </div>

                        <?php  }

                        ?>
                    </div>
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price"><?= $cart_total ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->


<script>
    //  Product cart Manage
    function manage_cart(pid, type, qty) {
        $.ajax({
            type: "POST",
            url: `<?= base_url('manage_cart') ?>`,
            dataType: "JSON",
            data: {
                pid: pid,
                qty: qty,
                type: type
            },
            success: function(data) {
                if (type == "remove") {
                    window.location.href = window.location.href;
                }

                $('.htc__qua').html(data);
            }


        });
        return false;
    }

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
                    window.location.href = window.location.href;
                } else {
                    $('#login-form-messege').text(data.message);
                }
            }
        });
        return false;
    });

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
</script>