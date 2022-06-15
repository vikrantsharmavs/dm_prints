<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\QualityModel;
use App\Libraries\CommonLib;

class Quality extends BaseController
{
    public function __construct()
    {
        $this->commonLib = new CommonLib();
    }
    public function index($search = null)
    {
        $model = new QualityModel();
        $searchData = $this->request->getGet();
        $numRows = $this->commonLib->numRows;
        $param = array();
        if (isset($searchData) && isset($searchData['n'])) {
            $numRows = $searchData['n'];
            $param['search'] = $searchData['q'];
        }
        $record =  $model->FetchValue($numRows, $param);
        $data = [
            'title' => title("quality"),
            'data' => $record,
            'pager' => $model->pager,
            'pageValueNumber' => $numRows,
            'page' => $this->request->getGet('page') ?? '',
            'links' => $model->pager->links('default', 'bootstrap_full'),
            'search' => $search
        ];
        return view('pages/quality/select', $data);
    }
    public function add($id = null)
    {

        $model = new CommonModel();
        $session  = session();
        $fetchRecordId = '';
        if ($id != null) {
            $fetchRecordId = $model->fetchRow("quality", array("qid" => "$id"));
            if (!empty(!$fetchRecordId)) {
                $session->setFlashdata('error', 'Oh snap! Record Not Found');
                return redirect()->to(site_url('quality'));
            }
        } else {
            $fetchRecordId = '';
        }
        $data = [
            'title' => title("quality"),
            'edit' => $fetchRecordId,
            'validation' => $this->validation
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = $this->validate([
                'quality_name' => ['label' => 'quality Name', 'rules' => 'trim|required'],
            ]);
            if ($rules == true) {
                $quality_name = $this->request->getPost("quality_name");
                $date = $id != '' ? 'updated_date' : 'creation_date';
                $data = [
                    'quality_name' => $quality_name,
                    "$date" => date('Y-m-d H:i:s'),
                ];
                if ($id != null) {
                    $model->updateValue('quality', array('qid' => $id), $data);
                    $session->setFlashdata('success', 'Data Updated Successfully');
                } else {
                    $model->insertValue('quality', $data);
                    $session->setFlashdata('success', 'Data Insert Successfully');
                }
                return redirect()->to(site_url('quality'));
            } else {
                return view('pages/quality/create', $data);
            }
        } else {
            return view('pages/quality/create', $data);
        }
    }

    public function update_status($id, $status)
    {
        $model = new CommonModel();
        $editRecord =  $model->fetchRow("quality", array("qid" => "$id"));
        if (empty($editRecord)) {
            return redirect()->to(previous_url());
        }
        if ($status == "Active") {
            $data['status'] = "Inactive";
        } else {
            $data['status'] = "Active";
        }
        $model->updateValue("quality", array("qid" => $id), $data);
        return redirect()->to(previous_url());
    }
}
