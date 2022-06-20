<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\ReceivingModel;
use App\Libraries\CommonLib;

class Receiving extends BaseController
{
    public function __construct()
    {
        $this->commonLib = new CommonLib();
    }
    public function index($search = null)
    {
        $model = new ReceivingModel();
        $searchData = $this->request->getGet();
        $numRows = $this->commonLib->numRows;
        $param = array();
        if (isset($searchData) && isset($searchData['n'])) {
            $numRows = $searchData['n'];
            $param['search'] = $searchData['q'];
        }
        $record =  $model->FetchValue($numRows, $param);
        $data = [
            'title' => title("receiving"),
            'data' => $record,
            'pager' => $model->pager,
            'pageValueNumber' => $numRows,
            'page' => $this->request->getGet('page') ?? '',
            'links' => $model->pager->links('default', 'bootstrap_full'),
            'search' => $search
        ];
        return view('pages/receiving/select', $data);
    }
    public function add($id = null)
    {
        $model = new CommonModel();
        $session  = session();
        $fetchRecordId = '';
        if ($id != null) {
            $fetchRecordId = $model->fetchRow("receiving", array("max_num" => "$id"));
            if (!empty(!$fetchRecordId)) {
                $session->setFlashdata('error', 'Oh snap! Record Not Found');
                return redirect()->to(site_url('receiving'));
            }
        } else {
            $fetchRecordId = '';
        }
        $data = [
            'title' => title("receiving"),
            'edit' => $fetchRecordId,
            'Eid' => "",
            'validation' => $this->validation,
            "quality" => $model->selectQuery("quality", array("status" => "Active")),
            "color" => $model->selectQuery("color", array("status" => "Active")),
            "weight" => $model->selectQuery("weight", array("status" => "Active")),
            "width" => $model->selectQuery("width", array("status" => "Active")),
            "party" => $model->selectQuery("party", array("status" => "Active")),
            "unit" => $model->selectQuery("unit", array("status" => "Active")),
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = $this->validate([
                'receiving_name' => ['label' => 'receiving Name', 'rules' => 'trim|required'],
            ]);
            if ($rules == true) {
                $receiving_name = $this->request->getPost("receiving_name");
                $date = $id != '' ? 'updated_date' : 'creation_date';
                $insert = [
                    'receiving_name' => $receiving_name,
                    "$date" => date('Y-m-d H:i:s'),
                ];
                if ($id != null) {
                    $model->updateValue('receiving', array('qid' => $id), $insert);
                    $session->setFlashdata('success', 'Data Updated Successfully');
                } else {
                    $model->insertValue('receiving', $data);
                    $session->setFlashdata('success', 'Data Insert Successfully');
                }
                return redirect()->to(site_url('receiving'));
            } else {
                return view('pages/receiving/create', $data);
            }
        } else {
            return view('pages/receiving/create', $data);
        }
    }

    public function sendDataReceiving()
    {
        $model = new CommonModel();
        if ($this->request->getMethod() == "post") {

            $storage = $this->request->getPost("storage");
            $BillNumber = $this->request->getPost("BillNumber");
            if ($BillNumber != '') {
                $add = $BillNumber;
                $receivingId = "REC-" . STR_PAD((string)$add, 5, "0", STR_PAD_LEFT);
                $model->deleteWhrCondition("receiving", array("max_num" => $BillNumber));
            } else {
                $maxNumber = $model->MaxNumberGenerate("receiving", "max_num");
                $add = $maxNumber->max_num + 1;
                $receivingId = "REC-" . STR_PAD((string)$add, 5, "0", STR_PAD_LEFT);
            }
            foreach ($storage as $value) {
                $insert['receivingDate'] = $value['receivingDate'];
                $insert['max_num'] = $add;
                $insert['receiving_id'] = $receivingId;
                $insert['partyName'] = $value['partyName'];
                $insert['lotNumber'] = $value['lotNumber'];
                $insert['quality'] = $value['quality'];
                $insert['color'] = $value['color'];
                $insert['weight'] = $value['weight'];
                $insert['width'] = $value['width'];
                $insert['unit'] = $value['unit'];
                $insert['begNumber'] = $value['begNumber'];
                $insert['creation_date'] = date('Y-m-d H:i:s');
                $model->insertValue("receiving", $insert);
            }
            return json_encode(["status" => "Success", "data" => "Data inserted", "code" => "200"]);
        }
    }

    public function edit($id = null)
    {
        $model = new CommonModel();
        if ($id == null) {
            return redirect()->to(previous_url());
        } else {
            $allRecord = $model->selectQuery("receiving", array('max_num' => $id));
            $RecordArray = array();
            if (!empty($allRecord)) {
                foreach ($allRecord as $row) {
                    $resultArray['receivingDate'] = $row->receivingDate;
                    $resultArray['partyName'] = $row->partyName;
                    $resultArray['lotNumber'] = $row->lotNumber;
                    $resultArray['quality'] = $row->quality;
                    $resultArray['color'] = $row->color;
                    $resultArray['weight'] = $row->weight;
                    $resultArray['width'] = $row->width;
                    $resultArray['unit'] = $row->unit;
                    $resultArray['begNumber'] = $row->begNumber;
                    $RecordArray[] = array_push($RecordArray, $resultArray);
                    array_pop($RecordArray);
                }
                $jsonRecord =  json_encode($RecordArray, true);
            } else {
                $jsonRecord = '';
            }
            $data = [
                'title' => title("Receiving"),
                'Eid' => $id,
                'edit' => $model->fetchRow("receiving", array('max_num' => $id)),
                'editRecord' => $jsonRecord,
                "quality" => $model->selectQuery("quality", array("status" => "Active")),
                "color" => $model->selectQuery("color", array("status" => "Active")),
                "weight" => $model->selectQuery("weight", array("status" => "Active")),
                "party" => $model->selectQuery("party", array("status" => "Active")),
                "unit" => $model->selectQuery("unit", array("status" => "Active")),
                "width" => $model->selectQuery("width", array("status" => "Active")),
            ];
            return view('pages/receiving/create', $data);
        }
    }



    public function update_status($id, $status)
    {
        $model = new CommonModel();
        $editRecord =  $model->fetchRow("receiving", array("qid" => "$id"));
        if (empty($editRecord)) {
            return redirect()->to(previous_url());
        }
        if ($status == "Active") {
            $data['status'] = "Inactive";
        } else {
            $data['status'] = "Active";
        }
        $model->updateValue("receiving", array("qid" => $id), $data);
        return redirect()->to(previous_url());
    }
}
