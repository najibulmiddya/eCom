<div class="card">
    <div class="card-body">
        <h4 class="box-title">Contact_us</h4>
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
                        <th>Subject</th>
                        <th>Query</th>
                        <th>Date & Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $sno = 0;
                    if ($contact) {
                        foreach ($contact as $key => $v) {
                            $sno++ ?>
                            <tr>
                                <td><?= $sno ?></td>
                                <td><?= $v->name ?></td>
                                <td><?= $v->email ?></td>
                                <td><?= $v->mobile ?></td>
                                <td><?= $v->subject ?></td>
                                <td><?= $v->message ?></td>
                                <td><?= $v->added_on ?></td>
                                <td>
                                    <a class="btn btn-danger del-record" href="<?= base_url("contact_us/delete/id={$v->id}") ?>" role="button">delete</a>

                                </td>
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