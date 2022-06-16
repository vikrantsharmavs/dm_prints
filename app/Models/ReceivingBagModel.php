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
                $this->where("lotNumber", trim($param['search']));
            }
            if ($param['partyName'] != '') {
                $this->like("partyName", trim($param['partyName']));
            }
            if ($param['quality'] != '') {
                $this->like("quality", trim($param['quality']));
            }
            if ($param['color'] != '') {
                $this->like("color", trim($param['color']));
            }
            if ($param['weight'] != '') {
                $this->like("weight", trim($param['weight']));
            }
        }
        $this->distinct();
        $this->select('quality,color,weight,unit,partyName,lotNumber,SUM(begNumber) AS BEG');
        $this->orderBy("receiving_id", "DESC");
        $this->groupBy("lotNumber");
        $result = $this->paginate($nb_page);
        return $result;
    }
}
