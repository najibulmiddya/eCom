<div class="card">
    <div class="card-body">
        <h4 class="box-title">ORDERS</h4>
    </div>
    <div class="card-body--">
        <!-- Data Table -->
        <table id="example" class="table table-bordered text-center" style="width:100%">
            <thead class="text-center " style="background-color: #14e390;">
                <tr>
                    <th class="text-light text-center">S.NO</th>
                    <th class="text-light text-center">ORDER ID</th>
                    <th class="text-light text-center">ORDER DATE</th>
                    <th class="text-light text-center">PAYMENT TYPE</th>
                    <th class="text-light text-center">PAYMENT STATUS</th>
                    <th class="text-light text-center">ORDER STATUS</th>
                    <th class="text-light text-center">ORDER DETAILS</th>
                </tr>
            </thead>
            <tbody class="text-center table-sm">
                <?php if ($order > 0) {
                    $sno = 0;
                    foreach ($order as $key => $v) {
                        $sno++; ?>
                        <tr>
                            <td><?= $sno ?></td>
                            <td><?= $v->id ?></td>
                            <td class="product-price"><span class="amount"><?= $v->added_on ?></span></td>
                            <td class="product-price"><span class="amount"><?= $v->payment_type ?> </span></td>
                            <td class="product-price"><span class="amount"><?= $v->payment_status ?></span></td>
                            <td><?=$v->name?></td>
                            <td>
                                <a href="<?= base_url("order_master/order_details/{$v->id}") ?>" class="btn btn-success"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
                <?php }
                } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">S.NO</th>
                    <th class="text-center">ORDER ID</th>
                    <th class="text-center">ORDER DATE</th>
                    <th class=" text-center">PAYMENT TYPE</th>
                    <th class=" text-center">PAYMENT STATUS</th>
                    <th class=" text-center">ORDER STATUS</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


<script>
    $(document).ready(function() {
        new DataTable('#example');
    });
</script>