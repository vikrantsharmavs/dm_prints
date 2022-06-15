<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\PartyModel;
use App\Libraries\CommonLib;

class Party extends BaseController
{
    public function __construct()
    {
        $this->commonLib = new CommonLib();
    }
    public function index($search = null)
    {
        $model = new PartyModel();
        $searchData = $this->request->getGet();
        $numRows = $this->commonLib->numRows;
        $param = array();
        if (isset($searchData) && isset($searchData['n'])) {
            $numRows = $searchData['n'];
            $param['search'] = $searchData['q'];
        }
        $record =  $model->FetchValue($numRows, $param);
        $data = [
            'title' => title("Party"),
            'data' => $record,
            'pager' => $model->pager,
            'pageValueNumber' => $numRows,
            'page' => $this->request->getGet('page') ?? '',
            'links' => $model->pager->links('default', 'bootstrap_full'),
            'search' => $search
        ];
        return view('pages/party/select', $data);
    }
    public function add($id = null)
    {

        $model = new CommonModel();
        $session  = session();
        $fetchRecordId = '';
        if ($id != null) {
            $fetchRecordId = $model->fetchRow("party", array("pid" => "$id"));
            if (!empty(!$fetchRecordId)) {
                $session->setFlashdata('error', 'Oh snap! Record Not Found');
                return redirect()->to(site_url('party'));
            }
        } else {
            $fetchRecordId = '';
        }
        $data = [
            'title' => title("Party"),
            'edit' => $fetchRecordId,
            'validation' => $this->validation
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = $this->validate([
                'party_name' => ['label' => 'Party Name', 'rules' => 'trim|required'],
            ]);
            if ($rules == true) {
                $party_name = $this->request->getPost("party_name");
                $date = $id != '' ? 'updated_date' : 'creation_date';
                $data = [
                    'party_name' => $party_name,
                    "$date" => date('Y-m-d H:i:s'),
                ];
                if ($id != null) {
                    $model->updateValue('party', array('pid' => $id), $data);
                    $session->setFlashdata('success', 'Data Updated Successfully');
                } else {
                    $model->insertValue('party', $data);
                    $session->setFlashdata('success', 'Data Insert Successfully');
                }
                return redirect()->to(site_url('party'));
            } else {
                return view('pages/party/create', $data);
            }
        } else {
            return view('pages/party/create', $data);
        }
    }

    public function update_status($id, $status)
    {
        $model = new CommonModel();
        $editRecord =  $model->fetchRow("party", array("pid" => "$id"));
        if (empty($editRecord)) {
            return redirect()->to(previous_url());
        }
        if ($status == "Active") {
            $data['status'] = "Inactive";
        } else {
            $data['status'] = "Active";
        }
        $model->updateValue("party", array("pid" => $id), $data);
        return redirect()->to(previous_url());
    }
}
