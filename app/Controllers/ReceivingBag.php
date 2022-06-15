<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\ReceivingBagModel;
use App\Libraries\CommonLib;

class ReceivingBag extends BaseController
{
    public function __construct()
    {
        $this->commonLib = new CommonLib();
    }
    public function index($search = null)
    {
        $model = new ReceivingBagModel();
        $CModel = new CommonModel();
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
            'model' => $CModel,
            'page' => $this->request->getGet('page') ?? '',
            'links' => $model->pager->links('default', 'bootstrap_full'),
            'search' => $search
        ];
        return view('pages/receivingBag/select', $data);
    }

    public function receiveBagData()
    {
        $model = new CommonModel();
        if ($this->request->getMethod() == 'post') {
            $latNumber = $this->request->getPost("latNumber");
            $CountRecord =   $model->SUMNumberGenerate("receiving", "begNumber", array("lotNumber" => $latNumber));
            $receivingBagData = $model->selectQuery("receivingbag", array("lotNumber" => $latNumber));
            return json_encode(["status" => "Success", "totalInput" => $CountRecord, "receivingBagData" => $receivingBagData]);
        }
    }

    public function submitValue()
    {
        $model = new CommonModel();
        if ($this->request->getMethod() == 'post') {
            $lotNumberValue = $this->request->getPost("lotNumberValue");
            $bagCreate = $this->request->getPost("bagCreate");
            $model->deleteWhrCondition("receivingbag", array("lotNumber" =>  $lotNumberValue));
            foreach ($bagCreate as $bRow) {
                $data['lotNumber'] = $lotNumberValue;
                $data['begInch'] = $bRow;
                $model->insertValue('receivingbag', $data);
            }
            return redirect()->to(site_url('receiving-bag'));
        } else {
            return redirect()->to(site_url('receiving-bag'));
        }
    }
}
