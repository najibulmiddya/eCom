<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('assets2/images/bg/naji.jpg') ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="<?= base_url('users') ?>">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Search</span>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active"><?= $str ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <?php
                    if ($data) {
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
                                            <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

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
                    } else { ?>
                        <h1 class="text-center text-danger">Search data Not Found</h1>;
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>