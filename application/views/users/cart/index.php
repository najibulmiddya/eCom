<?php
if (!$_SESSION['cart'] || count($_SESSION['cart']) == 0) { ?>
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
                            <span class="breadcrumb-item active">shopping cart</span>
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
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_SESSION['cart'] as $key => $v) {

                                    $data = get_product(null, $key);
                                    $name = $data[0]->name;
                                    $mrp = $data[0]->mrp;
                                    $price = $data[0]->price;
                                    $image = $data[0]->image;
                                    $qty = $v['qty'];
                                ?>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="<?= PRODUCT_IMAGE_SITE_PATH . $image ?>" alt="product img" /></a></td>

                                        <td class="product-name"><a href="#"><?= $name ?></a>
                                            <ul class="pro__prize">
                                                <li class="old__prize"><?= $mrp ?></li>
                                                <li><?= $price ?></li>
                                            </ul>
                                        </td>

                                        <td class="product-price"><span class="amount"><?= $price ?></span></td>

                                        <td class="product-quantity">
                                            <input class="qty_update<?= $key ?>" id="<?= $key ?>qty" type="number" value="<?= $qty ?>" />

                                            <a href="javascript:void(0)" onclick="manage_cart(<?= $key ?>,'update')">Update</a>
                                        </td>

                                        <td class="product-subtotal"><?= $qty * $price ?></td>

                                        <td class="product-remove">
                                            <a href="javascript:void(0)" onclick="manage_cart(<?= $key ?>,'remove')">
                                                <i class="icon-trash icons"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php  }

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
                                <div class="buttons-cart checkout--btn">
                                    <a href="<?= base_url('checkout') ?>">Checkout</a>
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
    //  Product cart Manage
    function manage_cart(pid, type) {
        let qty = $(".qty_update" + pid).val();

        // alert(type);
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
                if (type == "update" || type == "remove") {
                    window.location.href = "<?= base_url('manage_cart/cart') ?>";
                }

                $('.htc__qua').html(data);
            }
        });
        return false;
    }
</script>