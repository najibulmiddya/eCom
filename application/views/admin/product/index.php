<div class="card">
    <div class="card-body">
        <h4 class="box-title">Product</h4>
        <div class="" style="display: inline;">
            <a class="btn btn-sm btn-success" href="<?= base_url('product/save') ?>" role="button">Add Product</a>
        </div>
    </div>

    <div class="card-body--">
        <select class="ht__select form-control col-3">
            <option value="">Select Category</option>
            <?php if($categorys>0){
                foreach ($categorys as $key => $v) {?>
                   <option value="<?=$v->id?>"><?=$v->categorys?></option>
              <?php  }
            }?>
        </select>

            <table class="table table-bordered text-center" style="width:100%" id="example">
                <thead  style="background-color: #14e390;">
                    <tr>
                        <th class="text-center">S.NO</th>
                        <th class="text-center">Categorys</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Mrp</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Best Seller</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Active</th>
                    </tr>
                </thead>
                <tbody class="text-center table-sm">

                    <?php $sno = 0;
                    if ($product) {
                        foreach ($product as $key => $v) {
                            $sno++ ?>
                            <tr>
                                <td><?= $sno ?></td>
                                <td><?= $v->categorys ?></td>
                                <td><?= $v->name ?></td>
                                <td><?= $v->mrp ?></td>
                                <td><?= $v->price ?></td>
                                <td><?= $v->qty ?></td>
                                <td><?php if($v->best_seller==1){echo "Yes";}else{echo"No";} ?></td>
                                <td><img style="width: 50px; height:50px;" src="<?php if ($v->image == "") {
                                                    echo base_url('uploads/download.png');
                                                } else {
                                                    echo PRODUCT_IMAGE_SITE_PATH . $v->image;
                                                } ?>"></td>
                                <td>
                                    <div class="btn-group btn-sm">
                                        <?php if ($v->status == 1) { ?>
                                            <a class="btn btn-success" href="<?= base_url("product?type=status&operation=deactive&id={$v->id}") ?>" role="button">Active</a>
                                        <?php } else { ?>
                                            <a class="btn btn-secondary" href="<?= base_url("product?type=status&operation=active&id={$v->id}") ?>" role="button">Deactive</a>
                                        <?php } ?>

                                        <a class="btn btn-primary" href="<?= base_url("product/save/{$v->id}") ?>" role="button">Edit</a>

                                        <a class="btn btn-danger del-record" href="<?= base_url("product?type=delete&id={$v->id}") ?>" role="button">delete</a>

                                    </div>
                                </td>
                            </tr>

                        <?php }
                    } else { ?>
                        <td class="text-danger text-center" colspan="9">data not available</td>
                    <?php } ?>
                </tbody>
            </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        new DataTable('#example');
    });
</script>

