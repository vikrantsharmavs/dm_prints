<?php

namespace App\Controllers;

use App\Models\CommonModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new CommonModel();
        $data['title'] = title();
        $data['party'] = $model->CountRecord("party", array("status" => "Active"));
        $data['quality'] = $model->CountRecord("quality", array("status" => "Active"));
        $data['color'] = $model->CountRecord("color", array("status" => "Active"));
        $data['weight'] = $model->CountRecord("weight", array("status" => "Active"));
        return view('pages/dashboard', $data);
    }
}
