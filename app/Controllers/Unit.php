<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\UnitModel;
use App\Libraries\CommonLib;

class Unit extends BaseController
{
    public function __construct()
    {
        $this->commonLib = new CommonLib();
    }
    public function index($search = null)
    {
        $model = new UnitModel();
        $searchData = $this->request->getGet();
        $numRows = $this->commonLib->numRows;
        $param = array();
        if (isset($searchData) && isset($searchData['n'])) {
            $numRows = $searchData['n'];
            $param['search'] = $searchData['q'];
        }
        $record =  $model->FetchValue($numRows, $param);
        $data = [
            'title' => title("unit"),
            'data' => $record,
            'pager' => $model->pager,
            'pageValueNumber' => $numRows,
            'page' => $this->request->getGet('page') ?? '',
            'links' => $model->pager->links('default', 'bootstrap_full'),
            'search' => $search
        ];
        return view('pages/unit/select', $data);
    }
    public function add($id = null)
    {

        $model = new CommonModel();
        $session  = session();
        $fetchRecordId = '';
        if ($id != null) {
            $fetchRecordId = $model->fetchRow("unit", array("uid" => "$id"));
            if (!empty(!$fetchRecordId)) {
                $session->setFlashdata('error', 'Oh snap! Record Not Found');
                return redirect()->to(site_url('unit'));
            }
        } else {
            $fetchRecordId = '';
        }
        $data = [
            'title' => title("unit"),
            'edit' => $fetchRecordId,
            'validation' => $this->validation
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = $this->validate([
                'unit_name' => ['label' => 'unit Name', 'rules' => 'trim|required'],
            ]);
            if ($rules == true) {
                $unit_name = $this->request->getPost("unit_name");
                $date = $id != '' ? 'updated_date' : 'creation_date';
                $data = [
                    'unit_name' => $unit_name,
                    "$date" => date('Y-m-d H:i:s'),
                ];
                if ($id != null) {
                    $model->updateValue('unit', array('uid' => $id), $data);
                    $session->setFlashdata('success', 'Data Updated Successfully');
                } else {
                    $model->insertValue('unit', $data);
                    $session->setFlashdata('success', 'Data Insert Successfully');
                }
                return redirect()->to(site_url('unit'));
            } else {
                return view('pages/unit/create', $data);
            }
        } else {
            return view('pages/unit/create', $data);
        }
    }

    public function update_status($id, $status)
    {
        $model = new CommonModel();
        $editRecord =  $model->fetchRow("unit", array("uid" => "$id"));
        if (empty($editRecord)) {
            return redirect()->to(previous_url());
        }
        if ($status == "Active") {
            $data['status'] = "Inactive";
        } else {
            $data['status'] = "Active";
        }
        $model->updateValue("unit", array("uid" => $id), $data);
        return redirect()->to(previous_url());
    }
}
