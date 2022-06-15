<?php

namespace App\Models;

use CodeIgniter\Model;

class PartyModel extends Model
{
    protected $table = 'party';

    public function FetchValue(int $nb_page, $param = array())
    {
        if (isset($param) && !empty($param)) {
            if ($param['search'] != '') {
                $this->like("party_name", trim($param['search']));
            }
        }
        $this->select('*');
        $result = $this->paginate($nb_page);
        return $result;
    }
}
