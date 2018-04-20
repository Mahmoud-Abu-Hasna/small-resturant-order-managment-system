<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('Item');
          $this->load->model('Table_order');
           $this->load->model('Category');
           $this->load->model('Table_num');
           $this->load->model('Settings');
        if(empty($this->session->userdata('user_type'))){
        
             redirect(base_url().'Welcome');
        }
    }

    public function index() {
        
         
         $cats=  $this->Category->getTableData(array(), null, null, null);
                       $order=  $this->Table_order->getTableData(array(), null, null, null);
                         
                       $item=  $this->Item->getTableData(array(), null, null, null);
                      
                        $data['cats']=(sizeof($cats))?sizeof($cats):0;
                         $data['order']=(sizeof($order))?sizeof($order):0;
                       
                           $data['item']=(sizeof($item))?sizeof($item):0;
                       
                        
                     
         $data['result']=  $this->Table_order->getAll();
          $data['num']=  $this->Table_num->getTableData(array(), null, null, null)[0]->num;
         $data['title']="الرئيسة";
          
           $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared("home",$data); 
    }
     public function editNum() {
       
        $this->Table_num->editTableRow(array('id' => 1), $this->input->post());
       redirect(base_url().'Home');
    }
   
     public function settings() {
        
        $this->Table_num->editTableRow(array('id' => 1), $this->input->post());
       redirect(base_url().'Home');
    }
    



}
