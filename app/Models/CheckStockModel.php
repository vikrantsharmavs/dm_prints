<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckStockModel extends Model
{
    protected $table = 'receiving';
    public function FetchValue(int $nb_page, $param = array())
    {
        if (isset($param) && !empty($param)) {
            if ($param['search'] != '') {
                $this->where("actualstock.lotNumber", trim($param['search']));
            }
            if ($param['stock'] != '') {
                $this->where("actualstock.stockDone", trim($param['stock']));
            }
            if ($param['partyName'] != '') {
                $this->like("receiving.partyName", trim($param['partyName']));
            }
            if ($param['quality'] != '') {
                $this->like("receiving.quality", trim($param['quality']));
            }
            if ($param['color'] != '') {
                $this->like("receiving.color", trim($param['color']));
            }
            if ($param['weight'] != '') {
                $this->like("receiving.weight", trim($param['weight']));
            }
        }
        $this->distinct();
        $this->select('actualstock.*,receiving.quality,receiving.color,receiving.weight,receiving.unit,receiving.partyName');
        $this->join("actualstock", "actualstock.lotNumber=receiving.lotNumber");
        $this->orderBy("receiving.receiving_id", "DESC");
        $result = $this->paginate($nb_page);
        return $result;
    }
}
