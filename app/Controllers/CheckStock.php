<?php

namespace App\Controllers;

use App\Models\CommonModel;
use App\Models\CheckStockModel;
use App\Libraries\CommonLib;

class CheckStock extends BaseController
{
    public function __construct()
    {
        $this->commonLib = new CommonLib();
    }
    public function index($search = null)
    {
        $model = new CheckStockModel();
        $CModel = new CommonModel();
        $searchData = $this->request->getGet();
        $numRows = $this->commonLib->numRows;
        $param = array();
        if (isset($searchData) && isset($searchData['n'])) {
            $numRows = $searchData['n'];
            $param['search'] = $searchData['s'];
            $param['partyName'] = $searchData['p'];
            $param['quality'] = $searchData['q'];
            $param['color'] = $searchData['c'];
            $param['weight'] = $searchData['w'];
            $param['stock'] = $searchData['st'];
        }
        $record =  $model->FetchValue($numRows, $param);
        $data = [
            'title' => title("checkstock"),
            'data' => $record,
            'pager' => $model->pager,
            'pageValueNumber' => $numRows,
            'model' => $CModel,
            'page' => $this->request->getGet('page') ?? '',
            'links' => $model->pager->links('default', 'bootstrap_full'),
            'search' => $search,
            "quality" => $CModel->selectQuery("quality", array("status" => "Active")),
            "color" => $CModel->selectQuery("color", array("status" => "Active")),
            "weight" => $CModel->selectQuery("weight", array("status" => "Active")),
            "party" => $CModel->selectQuery("party", array("status" => "Active")),
        ];
        return view('pages/checkstock/select', $data);
    }



    public function submitCheck()
    {
        $model = new CommonModel();
        if ($this->request->getMethod() == 'post') {
            $checkBoxValue = $this->request->getPost("checkBoxValue");
            $EidValue = $this->request->getPost("EidValue");
            if (!empty($EidValue)) {
                for ($j = 0; $j < count($EidValue); $j++) {
                    $checkBoxValueClick = !empty($checkBoxValue[$j]) ? "Yes" : "No";
                    $whereID = $EidValue[$j];
                    $data['stockDone'] = $checkBoxValueClick;
                    $model->updateValue('actualstock', array("asid" => $whereID), $data);
                }
            }
            return redirect()->to(site_url('check-stock'));
        } else {
            return redirect()->to(site_url('check-stock'));
        }
    }
    public function receiveActualBagData()
    {
        $model = new CommonModel();
        if ($this->request->getMethod() == 'post') {
            $lotNumberValueActual = $this->request->getPost("lotNumberValueActual");
            $NewLotNumberValue = $this->request->getPost("newLotNumber");
            $actualCreate = $this->request->getPost("actualCreate");
            if (!empty($actualCreate)) {
                $model->deleteWhrCondition("actualstock", array("newLotNumber" =>  $NewLotNumberValue));
                foreach ($actualCreate as $bRow) {
                    $data['lotNumber'] = $lotNumberValueActual;
                    $data['newLotNumber'] = $NewLotNumberValue;
                    $data['numberMeter'] = $bRow;
                    $data['creation_date'] = date('Y-m-d H:i:s');
                    $model->insertValue('actualstock', $data);
                }
                return redirect()->to(site_url('receiving-bag'));
            } else {
                return redirect()->to(site_url('receiving-bag'));
            }
        } else {
            return redirect()->to(site_url('receiving-bag'));
        }
    }
}
