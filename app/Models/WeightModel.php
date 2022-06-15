<?php

namespace App\Models;

use CodeIgniter\Model;

class WeightModel extends Model
{
    protected $table = 'weight';

    public function FetchValue(int $nb_page, $param = array())
    {
        if (isset($param) && !empty($param)) {
            if ($param['search'] != '') {
                $this->like("weight_name", trim($param['search']));
            }
        }
        $this->select('*');
        $result = $this->paginate($nb_page);
        return $result;
    }
}
