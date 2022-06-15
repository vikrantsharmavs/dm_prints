<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table = 'unit';

    public function FetchValue(int $nb_page, $param = array())
    {
        if (isset($param) && !empty($param)) {
            if ($param['search'] != '') {
                $this->like("unit_name", trim($param['search']));
            }
        }
        $this->select('*');
        $result = $this->paginate($nb_page);
        return $result;
    }
}
