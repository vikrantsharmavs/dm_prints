<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<?php

$color_name = $edit != null ? $edit->color_name : "";

?>
<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    Add Color
                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $action = !empty($edit) ? "color-edit/" . $edit->cid : 'color-add' ?>
        <form action="<?= site_url($action); ?>" method="POST">
            <div class="col-12">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="color_name" class="form-label">Color Name<span class="text-danger"> *</span></label>
                        <input type="text" id="color_name" name="color_name" class="form-control  <?= (($validation->getError('color_name') == true) ? 'is-invalid' : null);  ?>" value="<?= set_value('color_name', $color_name); ?>">

                        <?php if ($validation->getError('color_name')) { ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('color_name'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class='btn btn-sm btn-primary'>Submit</button>
                <a href="<?= site_url("color") ?>" class='btn btn-sm btn-danger'>Reset</a>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection() ?>