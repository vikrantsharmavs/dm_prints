<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\WeightModel;
use App\Libraries\CommonLib;

class Weight extends BaseController
{
    public function __construct()
    {
        $this->commonLib = new CommonLib();
    }
    public function index($search = null)
    {
        $model = new WeightModel();
        $searchData = $this->request->getGet();
        $numRows = $this->commonLib->numRows;
        $param = array();
        if (isset($searchData) && isset($searchData['n'])) {
            $numRows = $searchData['n'];
            $param['search'] = $searchData['q'];
        }
        $record =  $model->FetchValue($numRows, $param);
        $data = [
            'title' => title("weight"),
            'data' => $record,
            'pager' => $model->pager,
            'pageValueNumber' => $numRows,
            'page' => $this->request->getGet('page') ?? '',
            'links' => $model->pager->links('default', 'bootstrap_full'),
            'search' => $search
        ];
        return view('pages/weight/select', $data);
    }
    public function add($id = null)
    {

        $model = new CommonModel();
        $session  = session();
        $fetchRecordId = '';
        if ($id != null) {
            $fetchRecordId = $model->fetchRow("weight", array("wid" => "$id"));
            if (!empty(!$fetchRecordId)) {
                $session->setFlashdata('error', 'Oh snap! Record Not Found');
                return redirect()->to(site_url('weight'));
            }
        } else {
            $fetchRecordId = '';
        }
        $data = [
            'title' => title("weight"),
            'edit' => $fetchRecordId,
            'validation' => $this->validation
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = $this->validate([
                'weight_name' => ['label' => 'weight Name', 'rules' => 'trim|required'],
            ]);
            if ($rules == true) {
                $weight_name = $this->request->getPost("weight_name");
                $date = $id != '' ? 'updated_date' : 'creation_date';
                $data = [
                    'weight_name' => $weight_name,
                    "$date" => date('Y-m-d H:i:s'),
                ];
                if ($id != null) {
                    $model->updateValue('weight', array('wid' => $id), $data);
                    $session->setFlashdata('success', 'Data Updated Successfully');
                } else {
                    $model->insertValue('weight', $data);
                    $session->setFlashdata('success', 'Data Insert Successfully');
                }
                return redirect()->to(site_url('weight'));
            } else {
                return view('pages/weight/create', $data);
            }
        } else {
            return view('pages/weight/create', $data);
        }
    }

    public function update_status($id, $status)
    {
        $model = new CommonModel();
        $editRecord =  $model->fetchRow("weight", array("wid" => "$id"));
        if (empty($editRecord)) {
            return redirect()->to(previous_url());
        }
        if ($status == "Active") {
            $data['status'] = "Inactive";
        } else {
            $data['status'] = "Active";
        }
        $model->updateValue("weight", array("wid" => $id), $data);
        return redirect()->to(previous_url());
    }
}
