<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\ColorModel;
use App\Libraries\CommonLib;

class Color extends BaseController
{
    public function __construct()
    {
        $this->commonLib = new CommonLib();
    }
    public function index($search = null)
    {
        $model = new ColorModel();
        $searchData = $this->request->getGet();
        $numRows = $this->commonLib->numRows;
        $param = array();
        if (isset($searchData) && isset($searchData['n'])) {
            $numRows = $searchData['n'];
            $param['search'] = $searchData['q'];
        }
        $record =  $model->FetchValue($numRows, $param);
        $data = [
            'title' => title("color"),
            'data' => $record,
            'pager' => $model->pager,
            'pageValueNumber' => $numRows,
            'page' => $this->request->getGet('page') ?? '',
            'links' => $model->pager->links('default', 'bootstrap_full'),
            'search' => $search
        ];
        return view('pages/color/select', $data);
    }
    public function add($id = null)
    {

        $model = new CommonModel();
        $session  = session();
        $fetchRecordId = '';
        if ($id != null) {
            $fetchRecordId = $model->fetchRow("color", array("cid" => "$id"));
            if (!empty(!$fetchRecordId)) {
                $session->setFlashdata('error', 'Oh snap! Record Not Found');
                return redirect()->to(site_url('color'));
            }
        } else {
            $fetchRecordId = '';
        }
        $data = [
            'title' => title("color"),
            'edit' => $fetchRecordId,
            'validation' => $this->validation
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = $this->validate([
                'color_name' => ['label' => 'color Name', 'rules' => 'trim|required'],
            ]);
            if ($rules == true) {
                $color_name = $this->request->getPost("color_name");
                $date = $id != '' ? 'updated_date' : 'creation_date';
                $data = [
                    'color_name' => $color_name,
                    "$date" => date('Y-m-d H:i:s'),
                ];
                if ($id != null) {
                    $model->updateValue('color', array('cid' => $id), $data);
                    $session->setFlashdata('success', 'Data Updated Successfully');
                } else {
                    $model->insertValue('color', $data);
                    $session->setFlashdata('success', 'Data Insert Successfully');
                }
                return redirect()->to(site_url('color'));
            } else {
                return view('pages/color/create', $data);
            }
        } else {
            return view('pages/color/create', $data);
        }
    }

    public function update_status($id, $status)
    {
        $model = new CommonModel();
        $editRecord =  $model->fetchRow("color", array("cid" => "$id"));
        if (empty($editRecord)) {
            return redirect()->to(previous_url());
        }
        if ($status == "Active") {
            $data['status'] = "Inactive";
        } else {
            $data['status'] = "Active";
        }
        $model->updateValue("color", array("cid" => $id), $data);
        return redirect()->to(previous_url());
    }
}
