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
$widthGet = $_GET['wd'] ?? '';
$searchGet = $_GET['s'] ?? '';
$stockArrayGet = $_GET['st'] ?? '';

$stockArray = ["No", 'Yes']
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
                                <option value="">Party</option>
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
                                <option value="" selected>weight</option>
                                <?php if (!empty($weight)) {
                                    foreach ($weight as $rowW) {
                                        $selected = $rowW->weight_name == $weightGet ? 'selected' : '' ?>
                                        <option value="<?= $rowW->weight_name ?>" <?= set_select("p", $rowW->weight_name, $selected) ?>><?= $rowW->weight_name ?></option>
                                <?php      }
                                } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select id="" class="form-select" name="wd">
                                <option value="" selected>select width</option>
                                <?php if (!empty($width)) {
                                    foreach ($width as $rowW) {
                                        $selected = $rowW->width_name == $widthGet ? 'selected' : '' ?>
                                        <option value="<?= $rowW->width_name ?>" <?= set_select("p", $rowW->width_name, $selected) ?>><?= $rowW->width_name ?></option>
                                <?php      }
                                } ?>
                            </select>
                        </td>
                        <td>
                            <select id="" class="form-select" name="st">
                                <option value="" selected>check</option>
                                <?php if (!empty($stockArray)) {
                                    foreach ($stockArray as $rowW) {
                                        $selected = $rowW == $stockArrayGet ? 'selected' : '' ?>
                                        <option value="<?= $rowW ?>" <?= set_select("st", $rowW, $selected) ?>><?= $rowW ?></option>
                                <?php      }
                                } ?>
                            </select>
                        </td>

                        <td>
                            <input type="text" class="form-control" placeholder="search lot number" value="<?= $searchGet ?>" name="s">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                            <a href="<?= site_url('check-stock') ?>" class="btn btn-danger btn-sm">Reset</a>
                        </td>
                    </tr>

                </thead>
            </form>
        </table>
    </div>

    <div class="table-responsive">
        <form action="<?= site_url('submitCheck') ?>" method="post" id="submitValue">
            <table class="table table-light table-sm table-bordered mb-0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>New Lot No.</th>
                        <th>Lot No.</th>
                        <th>Quality</th>
                        <th>Color</th>
                        <th>Weight</th>
                        <th>Width</th>
                        <th>Unit</th>
                        <th>Total Meter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data)) {
                        $i = $page == "" ? '1' : ($page - 1) * $pageValueNumber + 1;
                        foreach ($data as $key) {
                            if ($key['numberMeter'] != 0) {
                    ?>

                                <tr>
                                    <td class="text-heading font-semibold text-center">
                                        <input type="hidden" name="EidValue[]" value="<?= $key['asid'] ?>">
                                        <label for="flexCheckDefault">
                                            <div class="form-check">
                                                <input class="form-check-input p-4" name="checkBoxValue[]" type="checkbox" value="Yes" id="flexCheckDefault" <?= $key['stockDone'] == "Yes" ? "checked" : '' ?>>
                                            </div>
                                        </label>
                                    </td>
                                    <td class="text-heading font-semibold"><?= $key['newLotNumber'] ?></td>
                                    <td class="text-heading font-semibold"><?= $key['lotNumber'] ?></td>
                                    <td class="text-heading font-semibold"><?= $key['quality'] ?></td>
                                    <td class="text-heading font-semibold"><?= $key['color'] ?></td>
                                    <td class="text-heading font-semibold"><?= $key['weight'] ?></td>
                                    <td class="text-heading font-semibold"><?= $key['width'] ?></td>
                                    <td class="text-heading font-semibold"><?= $key['unit'] ?></td>
                                    <td class="text-heading font-semibold"><?= number_format($key['numberMeter'], 3)  ?> M</td>
                                </tr>
                        <?php $i++;
                            }
                        }
                    } else { ?>
                        <tr>
                            <td colspan="9">
                                <div class="alert alert-dark text-center p-4" role="alert">
                                    Data Not Found
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-sm btn-primary my-4">Submit</button>
        </form>
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
                <form action="<?= site_url('receiveActualBagData'); ?>" method="POST" id="ActualFormSubmit">
                    <input type="hidden" class="form-control" id="lotNumberValueActual" name="lotNumberValueActual">
                    <input type="hidden" class="form-control" id="totalMeterCount" name="totalMeterCount">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input type='text' name='newLotNumber' class='form-control my-1' placeholder="Lot Number" style="border: solid 1px #7952b3;">
                            </div>
                            <div class="col-6 mb-3">
                                <input type='number' name='actualCreate[]' class='form-control actualCreate my-1' value="" min="0" placeholder="Beg  Meter" style="border: solid 1px #7952b3;">
                            </div>
                        </div>
                        <div class="row" id="image_box"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" onclick="Actual.submitActualBeg()">Save changes</button>
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
            divHtml += `<input type='number' name='actualCreate[]' class='form-control actualCreate' value="" min="0" placeholder="" style="border: solid 1px #7952b3;">`;
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