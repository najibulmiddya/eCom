<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('assets2/images/bg/naji.jpg') ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="<?= base_url('users') ?>">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">
                                <?php if ($data) {
                                    echo $data[0]->categorys;
                                } else {
                                    echo "Fashion";
                                } ?>
                            </span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12"> -->
            <?php if (count($data) > 0) { ?>
                <div class=" col-lg-12">
                    <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">

                            <div class="htc__select__option">
                                <select class="ht__select form-control" onchange="sort_product_drop()" id="sort_product_id">
                                    <option value="">Default softing</option>
                                    <option value="price_hige">Sort by price low to high</option>
                                    <option value="price_low">Sort by price high to low</option>
                                    <option value="new">Sort by new first</option>
                                    <option value="old">Sort by old first</option>
                                </select>
                            </div>

                            <!-- Start List And Grid View -->
                            <ul class="view__mode" role="tablist">
                                <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                            </ul>
                            <!-- End List And Grid View -->
                        </div>
                        <!-- Start Product View -->
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <!-- Start Single Product -->
                                    <?php foreach ($data as $key => $v) { ?>

                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="<?= base_url("users/product_details/{$v->id}") ?>">
                                                        <img src=" <?= PRODUCT_IMAGE_SITE_PATH . $v->image ?>" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="javascript:void(0)" onclick="manage_cart(<?= $v->id ?>,'add');"><i class="icon-handbag icons"></i></a></li>

                                                        <li><a href="javascript:void(0)" onclick="manage_cart(<?= $v->id ?>,'add');"><i class="icon-shuffle icons"></i></a></li>
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
                                    <?php } ?>
                                    <!-- End Single Product -->
                                </div>


                                <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                    <div class="col-xs-12">
                                        <div class="ht__list__wrap">

                                            <!-- Start List Product -->
                                            <?php foreach ($data as $key => $v) { ?>
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
                                                        <a href="product-details.html"><img src="<?= PRODUCT_IMAGE_SITE_PATH . $v->image ?>" alt="product images"></a>
                                                    </div>
                                                    <div class="htc__list__details">
                                                        <h2><a href="product-details.html"><?= $v->name ?></a></h2>
                                                        <ul class="pro__prize">
                                                            <li class="old__prize">MRP <?= $v->mrp ?></li>
                                                            <li>Price <?= $v->price ?></li>
                                                        </ul>
                                                        <ul class="rating">
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                            <li class="old"><i class="icon-star icons"></i></li>
                                                        </ul>
                                                        <p><?= $v->description ?>.</p>
                                                        <div class="fr__list__btn">
                                                            <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <!-- End List Product -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product View -->
                    </div>
                </div>
            <?php } else { ?>
                <h1 class="text-center text-danger">Product Not Found</h1>
            <?php  } ?>
        </div>
    </div>
</section>
<!-- End Product Grid -->
<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="<?= base_url('assets2/images/brand/3.png') ?>" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brand Area -->
<!-- Start Banner Area -->
<div class="htc__banner__area">
    <ul class="banner__list owl-carousel owl-theme clearfix">
        <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
    </ul>
</div>
<!-- End Banner Area -->


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
</script>
