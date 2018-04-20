<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("Main_Model.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Table_order extends Main_Model {

    public function __construct() {
        parent::__construct();
         $this->table='table_order';
        // Your own constructor code
}
 public function getTotalProfit() {
     
      $rs = $this->db->query("SELECT sum(total_pill) FROM `table_order`");
        return $rs->result();
        
    }
 public function getAll() {

      $this->db->select('order_id id , order_date date , order_hour hour , order_table table  , user_name uname , total_pill pill , order_status status');
     $this->db->order_by("order_id", "desc");
        $this->db->from($this->table);

        $this->db->join('users', 'user_id=cashir_id');

        $rs = $this->db->get();
        return $rs->result();
        
    }
    
    public function getOrderItems($order_id) {
     
      $this->db->select('oi.item_cat , c.cat_name , oi.order_id , item , item_number , total_cost , item_name , item_cost');
        $this->db->from("order_items oi");
      
        $this->db->join('items i', 'oi.item = i.item_id');
        $this->db->join('catigories c', 'i.item_cat = c.cat_id');
      $this->db->where(array("order_id"=>$order_id));
        $rs = $this->db->get();
        return $rs->result();
        
    }
 
    



    }
