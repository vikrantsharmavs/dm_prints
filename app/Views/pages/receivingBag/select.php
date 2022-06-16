<?= $this->extend('include/base'); ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<?= $this->section('admin') ?>


<?php
$partyGet = $_GET['p'] ?? '';
$qualityGet = $_GET['q'] ?? '';
$colorGet = $_GET['c'] ?? '';
$weightGet = $_GET['w'] ?? '';
$searchGet = $_GET['s'] ?? '';

?>




<div class="card">
    <div class="card-header border-bottom">
        <div class="container">
            <div class="row">
                <div>Receiving Roll/Bag</div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-light table-sm table-bordered mb-0">
            <form action="" method="get">
                <thead>
                    <tr>
                        <td>
                            <select class="form-control" name="n">
                                <div class="div_num_rows py-2">
                                    <?php
                                    foreach (numberArray() as $nRow) {
                                        $selected = $nRow == $pageValueNumber ? 'selected' : '';
                                    ?>
                                        <option value="<?= $nRow ?>" <?= set_select('n', $nRow, $selected) ?>><?= $nRow ?></option>
                                    <?php
                                    } ?>
                                </div>
                            </select>
                        </td>
                        <td>
                            <select id="" name="p" class="form-select">
                                <option value="">Party Name</option>
                                <?php if (!empty($party)) {
                                    foreach ($party as $rowP) {
                                        $selected = $rowP->party_name == $partyGet ? 'selected' : ''
                                ?>
                                        <option value="<?= $rowP->party_name ?>" <?= set_select("p", $rowP->party_name, $selected) ?>><?= $rowP->party_name ?></option>
                                <?php }
                                } ?>
                            </select>
                        </td>
                        <td>
                            <select id="" class="form-select" name="q">
                                <option value="">Quality</option>
                                <?php if (!empty($quality)) {
                                    foreach ($quality as $rowQ) {
                                        $selected = $rowQ->quality_name == $qualityGet ? 'selected' : '' ?>
                                        <option value="<?= $rowQ->quality_name ?>" <?= set_select("p", $rowQ->quality_name, $selected) ?>><?= $rowQ->quality_name ?></option>
                                <?php      }
                                } ?>
                            </select>
                        </td>
                        <td>
                            <select id="" class="form-select" name="c">
                                <option value="">Color</option>
                                <?php if (!empty($color)) {
                                    foreach ($color as $rowC) {
                                        $selected = $rowC->color_name == $colorGet ? 'selected' : '' ?>
                                        <option value="<?= $rowC->color_name ?>" <?= set_select("p", $rowC->color_name, $selected) ?>><?= $rowC->color_name ?></option>
                                <?php      }
                                } ?>
                            </select>
                        </td>
                        <td>
                            <select id="" class="form-select" name="w">
                                <option value="" selected>select weight</option>
                                <?php if (!empty($weight)) {
                                    foreach ($weight as $rowW) {
                                        $selected = $rowW->weight_name == $weightGet ? 'selected' : '' ?>
                                        <option value="<?= $rowW->weight_name ?>" <?= set_select("p", $rowW->weight_name, $selected) ?>><?= $rowW->weight_name ?></option>
                                <?php      }
                                } ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="search lot number" value="<?= $searchGet ?>" name="s">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                        </td>
                        <td>
                            <a href="<?= site_url('receiving-bag') ?>" class="btn btn-danger btn-sm">Reset</a>
                        </td>
                    </tr>
                </thead>
            </form>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-light table-sm table-bordered mb-0">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Lot No.</th>
                    <th>Quality</th>
                    <th>Color</th>
                    <th>Weight</th>
                    <th>Unit</th>
                    <th>Roll/Bag</th>
                    <th>Total Entry</th>
                    <th>Total Meter</th>
                    <th class="text-center">Add/Edit Roll</th>
                    <th class="text-center">Actual Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)) {
                    $i = $page == "" ? '1' : ($page - 1) * $pageValueNumber + 1;
                    foreach ($data as $key) {
                        $countTotalEntry = $model->CountRecord("receivingbag", array("lotNumber" => $key['lotNumber']));
                        $totalMeter = $model->SUMNumberGenerate("receivingbag", "begInch", array("lotNumber" => $key['lotNumber']));
                ?>
                        <tr>
                            <td class="text-heading font-semibold text-center"><?= $i ?></td>
                            <td class="text-heading font-semibold"><?= $key['lotNumber'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['quality'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['color'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['weight'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['unit'] ?></td>
                            <td class="text-heading font-semibold"><?= $key['BEG'] ?></td>
                            <td class="text-heading font-semibold"><?= $countTotalEntry  ?></td>
                            <td class="text-heading font-semibold"><?= number_format($totalMeter->begInch, 3)  ?> M</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm p-1" onclick="Bag.generateDynamicInput('<?= site_url('') ?>','<?= $key['lotNumber'] ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal">Add/Edit Roll</button>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary btn-sm p-1" onclick="Actual.generateDynamicInput('<?= $key['lotNumber'] ?>')" data-bs-toggle="modal" data-bs-target="#ActualStock">Actual Stock</button>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Roll/Bag</h5>
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

<div class="modal fade" id="ActualStock" tabindex="-1" aria-labelledby="ActualStockLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ActualStockLabel">Actual Stock</h5>
                <div class="m-3">
                    <button onclick="addRow()" type="button" class="btn btn-sm btn-primary">Add More Images</button>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('submitValue'); ?>" method="POST" id="formSubmit">
                    <input type="hidden" class="form-control" id="lotNumberValueActual" name="lotNumberValueActual">
                    <div class="col-12 col-lg-12">
                        <div class="col-6 mb-3">
                            <input type='number' name='actualCreate[]' class='form-control bagInputCLass my-1' value="" min="0" placeholder="" style="border: solid 1px #7952b3;">
                        </div>
                        <div class="row" id="image_box">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="Bag.submitBeg()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    let RowEid = 0;
    let max_fields = 5000;

    function addRow() {
        if (RowEid < max_fields) {
            RowEid++;
            let divHtml = "";
            divHtml += `<div class='col-6 mb-3' id='addRowImageEid_${RowEid}'>`;
            divHtml += `<div class='input-group' id='addRowImageEid_${RowEid}'>`;
            divHtml += `<input type='number' name='actualCreate[]' class='form-control' value="" min="0" placeholder="" style="border: solid 1px #7952b3;">`;
            divHtml += `<button class='btn btn-outline-danger btn-sm' type='button' onclick='remove_image(${RowEid})' id='button-addon2'>Remove</button>`;
            divHtml += `</div></div>`;
            $("#image_box").append(divHtml);
        } else {
            console.warn(RowEid, max_fields);
        }
    }

    function remove_image(id) {
        $("#addRowImageEid_" + id).remove();
        RowEid--;
    }
</script>


<script src="<?= base_url('public/javascript/ReceivingBag.js') ?>"></script>
<script src="<?= base_url('public/javascript/ActualStock.js') ?>"></script>
<?= $this->endSection() ?>