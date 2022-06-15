<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{
    public function insertValue($table, $data)
    {
        $builder = $this->db->table($table);
        $log =  $builder->insert($data);
        // echo   $this->db->getLastQuery();
        // die();
        return $log;
    }
    public function updateValue($table, $where, $data)
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $builder->update($data);
        // echo   $this->db->getLastQuery();
        return true;
    }
    public function selectQuery($table, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->select('*');
        $builder->where($where);
        $query = $builder->get();
        $result = $query->getResult();
        // echo   $this->db->getLastQuery();
        // die();
        return $result;
    }
    public function fetchRow($table, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->select('*');
        $builder->where($where);
        $query = $builder->get();
        // echo $this->db->getLastQuery();
        $result = $query->getRow();
        return $result;
    }

    public function MaxNumberGenerate($table, $max, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->selectMax($max);
        $builder->where($where);
        $query = $builder->get();
        $result = $query->getRow();
        return $result;
    }

    public function SUMNumberGenerate($table, $max, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->selectSum($max);
        $builder->where($where);
        $query = $builder->get();
        $result = $query->getRow();
        return $result;
    }

    public function CountRecord($table, $where = array())
    {
        $builder = $this->db->table($table);
        $builder->where($where);
        $query = $builder->countAllResults();
        return $query;
    }

    public function emptyFullTable($table)
    {
        $builder = $this->db->table($table);
        $builder->truncate();
        return true;
    }
    public function deleteWhrCondition($table, $where)
    {
        $builder = $this->db->table($table);
        $builder->WHERE($where);
        $builder->delete();
        return true;
    }
}
