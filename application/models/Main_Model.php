<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Main_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }
protected $table="";
    /*
     * $table : table name
     * $data : array of data eg. $data = array('title' => 'My title', 'name' => 'My Name');
     */

    public function addTableData($data) {
        $this->db->insert($this->table, $data);
        return true;
    }
    public function addTableDataExt($table,$data) {
        $this->db->insert($table, $data);
        return true;
    }
    /*
     * $table : table name
     * $where : array of conditions eg. array('id'=>$id)
     * $data : array of data eg. $data = array('title' => 'My title', 'name' => 'My Name');
     */

    public function editTableRow($where = array(), $data = array()) {
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }

    /*
     * $table : table name
     * $where : array of conditions eg. array('id'=>$id)
     */

    public function deleteTableRow($where = array()) {
        $this->db->where($where);
        $this->db->delete($this->table);
        return true;
    }
    public function deleteFromTable($table = '',$where = array()) {
        $this->db->where($where);
        $this->db->delete($table);
        return true;
    }

    /*
     * $table : table name
     * $where : array of conditions eg. array('id'=>$id)
     * $limit : the max number of returned result
     * $orderBy : indicate to what colume to sort by
     * $orderType : asc or desc
     */

    public function getTableData($where = array(), $limit = null, $orderBy = null, $orderType = null) {
        $this->db->where($where);
        if ($limit) {
            $this->db->limit($limit);
        }
        if ($orderBy) {
            $this->db->order_by($orderBy, $orderType);
        }
        $query = $this->db->get($this->table);
        return $query->result();
    }

}
