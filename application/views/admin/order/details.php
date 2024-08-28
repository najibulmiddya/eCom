<div class="card">
    <div class="card-body">
        <h4 class="box-title">ORDERS DETAILS</h4>

    </div>
    <div class="card-body--">
        <!-- Data Table -->
        <table id="example" class="table table-bordered text-center" style="width:100%">
            <thead class="text-center " style="background-color: #14e390;">
                <tr>
                    <th class="text-light text-center">IMAGE</th>
                    <th class="text-light text-center">PRODUCT NAME</th>
                    <th class="text-light text-center">QTY</th>
                    <th class="text-light text-center">PRICE</th>
                    <th class="text-light text-center">TOTAL PRICE</th>

                </tr>
            </thead>
            <tbody class="text-center table-sm">
                <?php if ($data > 0) {
                    // PP($data);
                    $total_price = 0;
                    foreach ($data as $key => $v) {
                        $total_price = $total_price + ($v->qty * $v->price);
                ?>
                        <tr>
                            <td><img style="width:25%;height:25%;" src="<?= PRODUCT_IMAGE_SITE_PATH . $v->image ?>" alt="" /></td>


                            <td> <?= $v->product_name ?></td>

                            <td><?= $v->qty ?> </td>

                            <td><?= $v->price ?></td>
                            <td><?= $v->qty * $v->price ?></td>

                        </tr>

                <?php }
                } ?>


            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">--</th>
                    <th class="text-center">--</th>
                    <th class="text-center">--</th>
                    <th class="text-center">TOTAL PRICE</th>
                    <th class="text-center"> <?= $total_price; ?> </th>
                </tr>
            </tfoot>
        </table>

        <div class="col-6">
            <strong>ADDRESS -</strong> <?= $v->address . "," . $v->city . "," . $v->state . "," . $v->pincode ?>
            <br>
            <strong>ORDER STATUS -</strong> <?= $v->status ?>
        </div>
        <div>

        </div>
        <div>
            <form action="<?= base_url("order_master/order_status_update/{$v->order_tabil_id}") ?>" method="post">
                <div class="col-3 my-2">
                    <select class="form-control" name="order_status_update" required>
                        <option value="">Update Order Status</option>
                        <?php if ($status_data > 0) {
                            foreach ($status_data as $key => $val) { ?>
                                <option value="<?= $val->id ?>"><?= $val->name ?></option>
                        <?php  }
                        } ?>
                    </select>

                    <input type="submit" value="Order Status Update" class="btn btn-info my-2">
                </div>

            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        new DataTable('#example');
    });
</script>