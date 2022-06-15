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
                    Quality
                </div>
                <div class="col text-end">
                    <a href="<?= site_url("quality-add"); ?>" class="btn btn-primary btn-sm  p-1">Add Quality</a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-light table-sm table-bordered table-centered mb-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Quality Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) {
                    $i = $page == "" ? '1' : ($page - 1) * $pageValueNumber + 1;
                    foreach ($data as $key) { ?>
                        <tr>
                            <td class="text-heading font-semibold"><?= $i ?></td>
                            <td class="text-heading font-semibold"><?= $key['quality_name'] ?></td>
                            <td> <a href="<?= site_url("update-quality-status/" . $key['qid'] . '/' . $key['status']) ?>" class="btn btn-<?= $key['status'] == "Active" ? "success" : "danger" ?> btn-sm p-1"><?= $key['status'] ?></a>
                            </td>
                            <td><a href="<?= site_url("quality-edit/" . $key['qid']); ?>" class="btn btn-info btn-sm p-1">Edit</a></td>
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