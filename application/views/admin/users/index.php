<div class="card">
    <div class="card-body">
        <h4 class="box-title">Users</h4>
    </div>
    <div class="card-body--">
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="serial">S.NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $sno = 0;
                    if ($users) {
                        foreach ($users as $key => $v) {
                            $sno++ ?>
                            <tr>
                                <td><?= $sno ?></td>
                                <td><?= $v->name ?></td>
                                <td><?= $v->email ?></td>
                                <td><?= $v->mobile ?></td>
                            </tr>

                        <?php }
                    } else { ?>
                        <td class="text-danger text-center" colspan="4">data not available</td>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>