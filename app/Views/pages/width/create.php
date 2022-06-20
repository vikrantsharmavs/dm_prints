<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<?php

$width_name = $edit != null ? $edit->width_name : "";

?>
<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    Add width
                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $action = !empty($edit) ? "width-edit/" . $edit->wid : 'width-add' ?>
        <form action="<?= site_url($action); ?>" method="POST">
            <div class="col-12">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="width_name" class="form-label">width Name<span class="text-danger"> *</span></label>
                        <input type="text" id="width_name" name="width_name" class="form-control  <?= (($validation->getError('width_name') == true) ? 'is-invalid' : null);  ?>" value="<?= set_value('width_name', $width_name); ?>">

                        <?php if ($validation->getError('width_name')) { ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('width_name'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class='btn btn-sm btn-primary'>Submit</button>
                <a href="<?= site_url("width") ?>" class='btn btn-sm btn-danger'>Reset</a>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection() ?>