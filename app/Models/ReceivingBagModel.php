<?php

namespace App\Models;

use CodeIgniter\Model;

class ReceivingBagModel extends Model
{
    protected $table = 'receiving';

    public function FetchValue(int $nb_page, $param = array())
    {
        if (isset($param) && !empty($param)) {
            if ($param['search'] != '') {
                $this->like("quality_name", trim($param['search']));
            }
        }
        $this->distinct();
        $this->select('quality,color,weight,unit,partyName,lotNumber,begNumber');
        $this->orderBy("receiving_id", "DESC");
        $result = $this->paginate($nb_page);
        return $result;
    }
}
