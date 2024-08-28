
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Categorys</h4>
                        <div class="" style="display: inline;">
                            <a class="btn btn-sm btn-success" href="<?=base_url('Category/save')?>" role="button">Add Category</a>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">S.NO</th>
                                        <th>ID</th>
                                        <th>Categorys</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $sno = 0;
                                    if ($categorys) {
                                        foreach ($categorys as $key => $cat) {
                                            $sno++ ?>
                                            <tr>
                                                <td><?= $sno ?></td>
                                                <td><?= $cat->id ?></td>
                                                <td><?= $cat->categorys ?></td>
                                                <td>
                                                    <div class="btn-group btn-sm">
                                                        <?php if ($cat->status == 1) { ?>
                                                            <a class="btn btn-success" href="<?= base_url("category?type=status&operation=deactive&id={$cat->id}") ?>" role="button">Active</a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-secondary" href="<?= base_url("category?type=status&operation=active&id={$cat->id}") ?>" role="button">Deactive</a>
                                                        <?php } ?>

                                                        <a class="btn btn-primary" href="<?= base_url("category/save/{$cat->id}") ?>" role="button">Edit</a>

                                                        <a class="btn btn-danger del-record" href="<?= base_url("category?type=delete&id={$cat->id}") ?>" role="button">delete</a>

                                                    </div>
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
           