<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<?php

$quality_name = $edit != null ? $edit->quality_name : "";

?>
<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    Add Quality
                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $action = !empty($edit) ? "quality-edit/" . $edit->qid : 'quality-add' ?>
        <form action="<?= site_url($action); ?>" method="POST">
            <div class="col-12">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="quality_name" class="form-label">Quality Name<span class="text-danger"> *</span></label>
                        <input type="text" id="quality_name" name="quality_name" class="form-control  <?= (($validation->getError('quality_name') == true) ? 'is-invalid' : null);  ?>" value="<?= set_value('quality_name', $quality_name); ?>">

                        <?php if ($validation->getError('quality_name')) { ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('quality_name'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class='btn btn-sm btn-primary'>Submit</button>
                <a href="<?= site_url("quality") ?>" class='btn btn-sm btn-danger'>Reset</a>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection() ?>