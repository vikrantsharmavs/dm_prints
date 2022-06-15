<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div>Receiving Roll/Bag</div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-light table-sm table-bordered table-centered mb-0">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Lot No.</th>
                    <th>Quality</th>
                    <th>Color</th>
                    <th>Weight</th>
                    <th>Unit</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) {
                    $i = $page == "" ? '1' : ($page - 1) * $pageValueNumber + 1;
                    foreach ($data as $key) { ?>
                        <tr>
                            <td class="text-heading font-semibold text-center"><?= $i ?></td>
                            <td class="text-heading font-semibold"><?= $key['lotNumber'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['quality'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['color'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['weight'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['unit'] ?></td>
                            <td class="text-center"><button type="button" class="btn btn-primary btn-sm p-1" onclick="Bag.generateDynamicInput('<?= site_url('') ?>','<?= $key['lotNumber'] ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Bag</button></td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  bg-secondary modal-dialog-scrollable  modal-dialog-centered modal-fullscreen-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('submitValue'); ?>" method="POST" id="formSubmit">
                    <input type="hidden" id="lotNumberValue" name="lotNumberValue">
                    <div id="bagModal"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="Bag.submitBeg()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('public/javascript/ReceivingBag.js') ?>"></script>
<?= $this->endSection() ?>