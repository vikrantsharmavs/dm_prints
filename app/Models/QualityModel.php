<?php

namespace App\Models;

use CodeIgniter\Model;

class QualityModel extends Model
{
    protected $table = 'quality';

    public function FetchValue(int $nb_page, $param = array())
    {
        if (isset($param) && !empty($param)) {
            if ($param['search'] != '') {
                $this->like("quality_name", trim($param['search']));
            }
        }
        $this->select('*');
        $result = $this->paginate($nb_page);
        return $result;
    }
}
