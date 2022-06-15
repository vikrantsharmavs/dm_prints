<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    Unit
                </div>
                <div class="col text-end">
                    <a href="<?= site_url("unit-add"); ?>" class="btn btn-primary btn-sm  p-1">Add Unit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-nowrap">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Unit Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) {
                    $i = $page == "" ? '1' : ($page - 1) * $pageValueNumber + 1;
                    foreach ($data as $key) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td class="text-dark"><?= $key['unit_name'] ?></td>
                            <td> <a href="<?= site_url("update-unit-status/" . $key['uid'] . '/' . $key['status']) ?>" class="badge bg-<?= $key['status'] == "Active" ? "success" : "danger" ?>"><?= $key['status'] ?></a>
                            </td>
                            <td><a href="<?= site_url("unit-edit/" . $key['uid']); ?>" class="badge bg-info">Edit</a></td>
                        </tr>
                    <?php $i++;
                    }
                } else { ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-dark text-center p-0" role="alert">
                                Data Not Found
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <div class="container my-3">
        <?= $links ?>
    </div>
</div>
<?= $this->endSection() ?>