<div class="card">
    <div class="card-header"><strong>Product</strong><small> Form</small></div>
    <div class="card-body card-block">
        <form action="<?= base_url("product/save/{$product->id}") ?>" enctype="multipart/form-data" method="post">

            <div class="row">
                <div class="form-group col-4">
                    <label for="Category" class=" form-control-label">Category</label>
                    <select class="form-control" name="category_id">
                        <?php
                        
                        foreach ($categorys as $key => $v) {

                            if ($product->categories_id > 0 && $product->categories_id == $v->id) {
                        ?>
                                <option value="<?= $v->id ?>" selected><?= $v->categorys ?></option>
                            <?php
                            } else { ?>
                                <option value="<?= $v->id ?>"><?= $v->categorys ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <?= form_error('category_id', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="company" class="form-control-label"> Product Name</label>
                    <input type="text" id="name" name="name" value="<?= $product->name ?>" placeholder="Enter your Product Name" class="form-control">
                    <?= form_error('name', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="company" class="form-control-label"> Product info</label>
                    <input type="text" id="name" name="product_info" value="<?= $product->product_info ?>" placeholder="Enter your Product info" class="form-control">
                    <?= form_error('product_info', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="company" class=" form-control-label">MPR</label>
                    <input type="number" id="mrp" name="mrp" value="<?= $product->mrp ?>" placeholder="Enter your MRP" class="form-control">
                    <?= form_error('mrp', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="company" class=" form-control-label">Price</label>
                    <input type="number" id="price" name="price" value="<?= $product->price ?>" placeholder="Enter your Price " class="form-control">
                    <?= form_error('price', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="company" class=" form-control-label">Qty</label>
                    <input type="text" id="qty" name="qty" value="<?= $product->qty ?>" placeholder="Enter your Qty " class="form-control">
                    <?= form_error('qty', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="image" class=" form-control-label">Image</label>
                    <input type="file" id="image" name="image" placeholder="Enter your Image " class="form-control">


                </div>


                <div class="form-group col-4">
                    <label for="company" class=" form-control-label">Short Desc</label>
                    <textarea type="text" id="short_desc" name="short_desc" placeholder="Enter your Short Description" class="form-control"><?= $product->short_desc ?></textarea>
                    <?= form_error('short_desc', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="company" class=" form-control-label">Description</label>
                    <textarea type="text" id="description" name="description" value="" placeholder="Enter your Description" class="form-control"><?= $product->description ?></textarea>
                    <?= form_error('description', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="company" class=" form-control-label">Meta Title</label>
                    <textarea type="text" id="meta_title" name="meta_title" value="" placeholder="Enter your Meta Title" class="form-control"><?= $product->meta_title ?></textarea>
                    <?= form_error('meta_title', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="company" class=" form-control-label">Meta Desc</label>
                    <textarea type="text" id="meta_desc" name="meta_desc" value="" placeholder="Enter your Meta Desc" class="form-control"><?= $product->meta_desc ?><?= set_value('meta_desc') ?></textarea>
                    <?= form_error('description', '<div class="error text-danger">', '</div>') ?>
                </div>

                <div class="form-group col-4">
                    <label for="company" class=" form-control-label">Meta Keywprd</label>
                    <textarea type="text" id="meta_keyword" name="meta_keyword" placeholder="Enter your Meta Keywprd" class="form-control"><?= $product->meta_keyword ?></textarea>
                    <?= form_error('meta_keywprd', '<div class="error text-danger">', '</div>') ?>
                </div>

                <input type="hidden" name="id" value="<?= $product->id; ?>">
            <input type="hidden" name="status" value="<?= $product->status; ?>">
            <input type="hidden" name="old_image" value="<?= $product->image; ?>">

            </div>

            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <span id="payment-button-amount">Submit</span>
            </button>
        </form>

    </div>
</div>