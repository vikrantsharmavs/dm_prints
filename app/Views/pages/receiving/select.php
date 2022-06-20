<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">Receiving</div>
                <div class="col text-end">
                    <a href="<?= site_url("receiving-add"); ?>" class="btn btn-primary btn-sm">Add Receiving</a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-light table-sm table-bordered table-centered mb-0">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Receiving No.</th>
                    <th>Quality</th>
                    <th>Color</th>
                    <th>Weight</th>
                    <th>Width</th>
                    <th>Unit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) {
                    $i = $page == "" ? '1' : ($page - 1) * $pageValueNumber + 1;
                    foreach ($data as $key) { ?>
                        <tr>
                            <td class="text-heading font-semibold text-center"><?= $i ?></td>
                            <td class="text-heading font-semibold"><?= $key['receiving_id'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['quality'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['color'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['weight'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['width'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['unit'] ?></td>
                            <td>
                                <a href="<?= site_url("receiving-edit/" . $key['max_num']); ?>" class="btn btn-info btn-sm p-1">Edit</a>
                            </td>
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