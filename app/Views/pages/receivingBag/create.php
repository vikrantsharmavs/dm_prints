<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>

<?php
$validation = \Config\Services::validation();

?>
<?php if (isset($editRecord) && !empty($editRecord)) { ?>
    <script>
        function setLocalStorageItem(key, value) {
            localStorage.setItem(key, JSON.stringify(value));
        }
        setLocalStorageItem("Receiving", <?= $editRecord ?>);
    </script>
<?php } else { ?>
    <script>
        function clearLocalStorageItem() {
            let arr = localStorage.removeItem("Receiving");
            return arr;
        }
        clearLocalStorageItem();
    </script>
<?php } ?>

<div class="container-fluid my-2 p-2 shadow-sm">
    <input type="hidden" id="id" name="id" value="">
    <input type="hidden" id="val" name="val" value="">
    <input type="hidden" id="confirm" name="confirm" value="">
    <input type="hidden" id="billNumber" value="<?= $Eid ?>">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-1">
                    <label for="receiving_date" class="form-label">Receiving Date <span class="text-danger"> *</span></label>
                    <input type="date" id="receiving_date" name="receiving_date" class="form-control p-2" value="<?= !empty($edit) ? $edit->receivingDate : date("Y-m-d") ?>" <?= empty($edit) ? '' : 'disabled' ?>>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="mb-1">
                    <label for="partyName" class="form-label">Party Name</label> <span style="font-size:12px;" id="availability"></span>
                    <select name="partyName" class="form-select p-2" id="partyName">
                        <option value="" selected>select Party</option>
                        <?php if (!empty($party)) {
                            foreach ($party as $rowQ) { ?>
                                <option value="<?= $rowQ->party_name ?>"><?= $rowQ->party_name ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="my-2">
                <div class="alert alert-dark p-2" role="alert"> Product Details </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="mb-1">
                    <label for="lotNumber" class="form-label">Lot No.</label> <span style="font-size:12px;" id="availability"></span>
                    <input class="form-control p-2" name="lotNumber" id="lotNumber">
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="mb-1">
                    <label for="quality" class="form-label">Quality</label> <span style="font-size:12px;" id="availability"></span>
                    <select name="quality" class="form-select p-2" id="quality">
                        <option value="" selected>select Quality</option>
                        <?php if (!empty($quality)) {
                            foreach ($quality as $rowQ) { ?>
                                <option value="<?= $rowQ->quality_name ?>"><?= $rowQ->quality_name ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            </div>

            <div class="col-12 col-lg-2">
                <div class="mb-1">
                    <label for="color" class="form-label">Color</label> <span style="font-size:12px;" id="availability"></span>
                    <select name="color" class="form-select p-2" id="color">
                        <option value="" selected>select color</option>
                        <?php if (!empty($color)) {
                            foreach ($color as $rowC) { ?>
                                <option value="<?= $rowC->color_name ?>"><?= $rowC->color_name ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            </div>

            <div class="col-12 col-lg-2">
                <div class="mb-1">
                    <label for="weight" class="form-label">Weight</label> <span style="font-size:12px;" id="availability"></span>
                    <select name="weight" class="form-select p-2" id="weight">
                        <option value="" selected>select weight</option>
                        <?php if (!empty($weight)) {
                            foreach ($weight as $rowW) { ?>
                                <option value="<?= $rowW->weight_name ?>"><?= $rowW->weight_name ?></option>
                        <?php      }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="mb-1">
                    <label for="unit" class="form-label">Unit</label> <span style="font-size:12px;" id="availability"></span>
                    <select name="unit" class="form-select p-2" id="unit">
                        <option value="" selected>select unit</option>
                        <?php if (!empty($unit)) {
                            foreach ($unit as $rowU) { ?>
                                <option value="<?= $rowU->unit_name ?>"><?= $rowU->unit_name ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="mb-1">
                    <label for="begNumber" class="form-label">Roll/Bag</label> <span style="font-size:12px;" id="availability"></span>
                    <input type="number" class="form-control p-2" name="begNumber" id="begNumber">
                </div>
            </div>
            <div class="container py-1">
                <button class="btn btn-sm btn-primary rounded" onclick="receiving.addToList()" type="button" id="save">Add Product</button>
            </div>
            <div class="table-responsive">
                <table class="table table-light table-sm table-bordered table-centered mb-0">
                    <thead>
                        <tr class="m-0">
                            <th>#</th>
                            <th scope="col">Lot No.</th>
                            <th>Quality</th>
                            <th>Color</th>
                            <th>Weight</th>
                            <th>Unit</th>
                            <th>Roll/Bag</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <button class="btn btn-sm btn-info rounded" id="submit" style="display:none" onclick="receiving.submitForm('<?= site_url('sendDataReceiving') ?>','<?= site_url() ?>')" type="button">Submit</button>
</div>
<script src="<?= base_url('public/javascript/Receiving.js') ?>"></script>
<?= $this->endSection(); ?>