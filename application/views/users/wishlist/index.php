<?php if(!$data){
    redirect('users');
    }?>
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
                            <span class="breadcrumb-item active">Wishlist</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-price">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $product_id = '';
                                if ($data > 0) {
                                    foreach ($data as $key => $v) {
                                ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="<?= base_url("users/product_details/{$v->product_id}") ?>"><img src="<?= PRODUCT_IMAGE_SITE_PATH . $v->image ?>" alt="product img" /></a></td>

                                            <td class="product-name"><a href="<?= base_url("users/product_details/{$v->product_id}") ?>"><?= $v->name ?></a>
                                                <ul class="pro__prize">
                                                    <li class="old__prize"><?= $v->mrp ?></li>
                                                    <li><?= $v->price ?></li>
                                                </ul>
                                            </td>

                                            <td class="product-price"><span class="amount"><?= $v->price ?></span></td>



                                            <td class="product-remove">
                                                <a href="javascript:void(0)" onclick="wishlist(<?= $v->id ?>,'remove')">
                                                    <i class="icon-trash icons"></i>
                                                </a>
                                            </td>


                                        </tr>
                                <?php
                                        $product_id = $v->product_id;
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="<?= base_url('users') ?>">Continue Shopping</a>
                                </div>


                                <div class="fr__list__btn">
                                    <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart(<?= $product_id ?>,'add');">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->

<script>
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