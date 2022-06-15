<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<?php

$party_name = $edit != null ? $edit->party_name : "";

?>
<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    Add Party
                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        <?php $action = !empty($edit) ? "party-edit/" . $edit->pid : 'party-add' ?>
        <form action="<?= site_url($action); ?>" method="POST">
            <div class="col-12">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="party_name" class="form-label">Party Name<span class="text-danger"> *</span></label>
                        <input type="text" id="party_name" name="party_name" class="form-control  <?= (($validation->getError('party_name') == true) ? 'is-invalid' : null);  ?>" value="<?= set_value('party_name', $party_name); ?>">

                        <?php if ($validation->getError('party_name')) { ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('party_name'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <button type="submit" class='btn btn-sm btn-primary'>Submit</button>
                <a href="<?= site_url("party") ?>" class='btn btn-sm btn-danger'>Reset</a>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection() ?>