<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("Main_Model.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Item extends Main_Model {

    public function __construct() {
        parent::__construct();
         $this->table='items';
        // Your own constructor code
}

 public function getTableDataJ() {
     
      $this->db->select('item_id , item_name , item_cost , item_image  , cat_name , cat_id ');
        $this->db->from($this->table);
      
        $this->db->join('catigories', 'cat_id=item_cat');
      
        $rs = $this->db->get();
        return $rs->result();
        
    }
    public function getTableDataJC($data) {
     
      $this->db->select('item_id , item_name , item_cost  , cat_name , cat_id , item_image');
        $this->db->from($this->table);
      
        $this->db->join('catigories', 'cat_id=item_cat');
      $this->db->where($data);
        $rs = $this->db->get();
        return $rs->result();
        
    }




    }
