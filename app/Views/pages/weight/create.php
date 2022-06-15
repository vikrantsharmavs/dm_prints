<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<?php

$weight_name = $edit != null ? $edit->weight_name : "";

?>
<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    Add Weight
                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $action = !empty($edit) ? "weight-edit/" . $edit->wid : 'weight-add' ?>
        <form action="<?= site_url($action); ?>" method="POST">
            <div class="col-12">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="weight_name" class="form-label">Weight Name<span class="text-danger"> *</span></label>
                        <input type="text" id="weight_name" name="weight_name" class="form-control  <?= (($validation->getError('weight_name') == true) ? 'is-invalid' : null);  ?>" value="<?= set_value('weight_name', $weight_name); ?>">

                        <?php if ($validation->getError('weight_name')) { ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('weight_name'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class='btn btn-sm btn-primary'>Submit</button>
                <a href="<?= site_url("weight") ?>" class='btn btn-sm btn-danger'>Reset</a>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection() ?>