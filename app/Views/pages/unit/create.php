<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<?php

$unit_name = $edit != null ? $edit->unit_name : "";

?>
<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    Add Unit
                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $action = !empty($edit) ? "unit-edit/" . $edit->uid : 'unit-add' ?>
        <form action="<?= site_url($action); ?>" method="POST">
            <div class="col-12">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="unit_name" class="form-label">Unit Name<span class="text-danger"> *</span></label>
                        <input type="text" id="unit_name" name="unit_name" class="form-control  <?= (($validation->getError('unit_name') == true) ? 'is-invalid' : null);  ?>" value="<?= set_value('unit_name', $unit_name); ?>">

                        <?php if ($validation->getError('unit_name')) { ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('unit_name'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class='btn btn-sm btn-primary'>Submit</button>
                <a href="<?= site_url("unit") ?>" class='btn btn-sm btn-danger'>Reset</a>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection() ?>