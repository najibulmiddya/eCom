<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?= base_url('assets2/images/bg/naji.jpg') ?>) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="<?= base_url('users') ?>">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">My Order</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- wishlist-area start -->
<div class="wishlist-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name"><span class="nobr">Order Id</span></th>

                                        <th class="product-name"><span class="nobr">Image</span></th>

                                        <th class="product-name"><span class="nobr">Order Date</span></th>

                                        <th class="product-add-to-cart"><span class="nobr">Address</span></th>

                                        <th class="product-stock-stauts"><span class="nobr">Payment Type</span></th>

                                        <th class="product-stock-stauts"><span class="nobr">Payment Status </span></th>
                                        <th class="product-price"><span class="nobr"> Order Status </span></th>

                                        <th class="product-price"><span class="nobr"> Order Details </span></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($data > 0) {

                                        foreach ($data as $key => $v) { ?>
                                            <tr>
                                                <td class="product-remove"><a href="<?= base_url("checkout/order_details/{$v->id}") ?>"><?= $v->id ?></a></td>

                                                <td class="product-thumbnail"><a href="<?= base_url("checkout/order_details/{$v->id}") ?>"><img src="<?= PRODUCT_IMAGE_SITE_PATH . $v->image ?>" alt="" /></a></td>


                                                <td class="product-price"><span class="amount"><?= $v->added_on ?></span></td>

                                                <td class="product-price"><span class="amount"><?= $v->address . "," . $v->city . "," . $v->pincode . "," . $v->state . "," . "Mobile -" . $v->mobile ?></span></td>

                                                <td class="product-price"><span class="amount"><?= $v->payment_type ?> </span></td>

                                                <td class="product-price"><span class="amount"><?= $v->payment_status ?></span></td>

                                                <td class="product-price"><span class="amount"><?= $v->name ?></span></td>

                                                <td>
                                                    <a href="<?= base_url("checkout/order_details/{$v->id}") ?>" class="btn btn-success"><i class="bi bi-eye"></i></a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9">
                                            <div class="wishlist-share">
                                                <h4 class="wishlist-share-title">Share on:</h4>
                                                <div class="social-icon">
                                                    <ul>
                                                        <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- wishlist-area end -->

<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
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