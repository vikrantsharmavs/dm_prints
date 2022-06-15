<?php

namespace App\Models;

use CodeIgniter\Model;

class ColorModel extends Model
{
    protected $table = 'color';

    public function FetchValue(int $nb_page, $param = array())
    {
        if (isset($param) && !empty($param)) {
            if ($param['search'] != '') {
                $this->like("color_name", trim($param['search']));
            }
        }
        $this->select('*');
        $result = $this->paginate($nb_page);
        return $result;
    }
}
