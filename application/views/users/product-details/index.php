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
                             <a class="breadcrumb-item" href="<?= base_url("users/product_category/{$product->categories_id}") ?>"><?= $product->categorys ?></a>
                             <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                             <span class="breadcrumb-item active"><?= $product->name ?></span>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Bradcaump area -->
 <!-- Start Product Details Area -->
 <section class="htc__product__details bg__white ptb--100">
     <!-- Start Product Details Top -->
     <div class="htc__product__details__top">
         <div class="container">
             <div class="row">
                 <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                     <div class="htc__product__details__tab__content">
                         <!-- Start Product Big Images -->
                         <div class="product__big__images">
                             <div class="portfolio-full-image tab-content">
                                 <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                     <img src="<?= PRODUCT_IMAGE_SITE_PATH . $product->image ?>" alt="full-image">
                                 </div>
                             </div>
                         </div>
                         <!-- End Product Big Images -->

                     </div>
                 </div>

                 <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                     <div class="ht__product__dtl">
                         <h2><?= $product->name ?></h2>
                         <ul class="pro__prize">
                             <li class="old__prize">MRP <?= $product->mrp ?></li>
                             <li>Price <?= $product->price ?></li>
                         </ul>
                         <p class="pro__info"><b>Product info</b> : <?= $product->product_info ?></p>
                         <div class="ht__pro__desc">
                             <div class="sin__desc">
                                 <p><span>Availability:</span> In Stock <?= $product->qty ?></p>
                             </div>

                             <div class="sin__desc">
                                 Qty
                                 <p>
                                     <select class="form-control" id="qty">
                                         <option value="1">1</option>
                                         <option value="2">2</option>
                                         <option value="3">3</option>
                                         <option value="4">4</option>
                                         <option value="5">5</option>
                                         <option value="6">6</option>
                                         <option value="7">7</option>
                                         <option value="8">8</option>
                                         <option value="9">9</option>
                                         <option value="10">10</option>
                                     </select>
                                 </p>
                             </div>
                             <div class="sin__desc align--left">
                                 <p><span>Categories:</span></p>
                                 <ul class="pro__cat__list">
                                     <li><a href="<?= base_url("users/product_category/{$product->categories_id}") ?>"><?= $product->categorys ?></a></li>
                                 </ul>
                             </div>
                         </div>
                         <br>
                         <div class="fr__list__btn">
                             <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart(<?= $product->id ?>,'add');">Add To Cart</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>
     <!-- End Product Details Top -->
 </section>
 <!-- End Product Details Area -->

 <!-- Start Product Description -->
 <section class="htc__produc__decription bg__white">
     <div class="container">
         <div class="row">
             <div class="col-xs-12">
                 <!-- Start List And Grid View -->
                 <ul class="pro__details__tab" role="tablist">
                     <li role="presentation" class="description active"><a href="#" role="tab" data-toggle="tab">description</a></li>
                 </ul>
                 <!-- End List And Grid View -->
             </div>
         </div>
         <div class="row">
             <div class="col-xs-12">
                 <div class="ht__pro__details__content">
                     <!-- Start Single Content -->
                     <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                         <div class="pro__tab__content__inner">
                             <p><?= $product->short_desc ?>.</p>
                             <h4 class="ht__pro__title">Description</h4>
                             <p><?= $product->description ?>.</p>
                             <h4 class="ht__pro__title">Standard Featured</h4>
                             <p><?= $product->meta_desc ?></p>
                         </div>
                     </div>
                     <!-- End Single Content -->

                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End Product Description -->
 
 <script>
        //  Product cart Manage
         function manage_cart(pid, type) {
             let qty = $('#qty').val();
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