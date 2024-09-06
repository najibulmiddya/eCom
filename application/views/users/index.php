<!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>collection <?= date('Y') ?></h2>
                                <h1>NICE CHAIR</h1>
                                <div class="cr__btn">
                                    <a href="<?= base_url('manage_cart/cart') ?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="<?= base_url('assets2/images/slider/fornt-img/1.jpg') ?>" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>collection <?= date('Y') ?></h2>
                                <h1>NICE CHAIR</h1>
                                <div class="cr__btn">
                                    <a href="<?= base_url('manage_cart/cart') ?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="<?= base_url('assets2/images/slider/fornt-img/2.jpg') ?>" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
</div>

<!-- Start Slider Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <!-- Start Single Category -->

                    <?php
                    $product = get_product(4);
                    foreach ($product as $key => $v) { ?>
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="<?= base_url("users/product_details/{$v->id}") ?>">
                                        <img src="<?= PRODUCT_IMAGE_SITE_PATH . $v->image ?>" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <ul class="product__action">
                                        <li><a href="javascript:void(0)" onclick="wishlist(<?= $v->id ?>,'add');"><i class="icon-heart icons"></i></a></li>

                                        <li><a href="javascript:void(0)" onclick="manage_cart(<?= $v->id ?>,'add');"><i class="icon-handbag icons"></i></a></li>

                                        <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="<?= base_url("users/product_details/{$v->id}") ?>"><?= $v->name ?></a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">MRP <?= $v->mrp ?></li>
                                        <li>Price <?= $v->price ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    <?php }
                    ?>
                    <!-- End Single Category -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
<!-- Start Product Area -->
<section class="ftr__product__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Best Seller</h2>
                    <p>But I must explain to you how all this mistaken idea</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <!-- Start Single Category -->


                <?php
                $data = get_product(4, '', 1);
                foreach ($data as $key => $v) { ?>
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="<?= base_url("users/product_details/{$v->id}") ?>">
                                    <img src="<?= PRODUCT_IMAGE_SITE_PATH . $v->image ?>" alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                                <ul class="product__action">
                                    <li><a href="javascript:void(0)" onclick="wishlist(<?= $v->id ?>,'add');"><i class="icon-heart icons"></i></a></li>

                                    <li><a href="javascript:void(0)" onclick="manage_cart(<?= $v->id ?>,'add');"><i class="icon-handbag icons"></i></a></li>

                                    <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="fr__product__inner">
                                <h4><a href="<?= base_url("users/product_details/{$v->id}") ?>"><?= $v->name ?></a></h4>
                                <ul class="fr__pro__prize">
                                    <li class="old__prize">MRP <?= $v->mrp ?></li>
                                    <li>Price <?= $v->price ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
                <!-- End Single Category -->
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->

<script>
    //  Product cart Manage
    function manage_cart(pid, type) {
        let qty = 1;
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
                $('.htc__qua').html(data)
            }
        });
        return false;
    }

    // wishlist add product
    function wishlist(product_id, type) {
        $.ajax({
            type: "POST",
            url: `<?= base_url('manage_cart/wishlist') ?>`,
            dataType: "JSON",
            data: {
                product_id: product_id,
                type: type
            },
            success: function(resp) {
                console.log(resp);
                if (resp.message == "NOT_LOGIN") {
                    window.location.href = `<?= base_url('user') ?>`;
                }
                if (resp.status == true) {
                    window.location.href = window.location.href;
                }
            }
        });
        return false;
    }
</script>