<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends MY_Controller {

    public function __construct() {
       
        parent::__construct();
        $this->load->model('Tables_resturant');
         $this->load->model('Settings');
        
         
    }

    public function index() {
         
        $data['table']=  $this->Tables_resturant->getTableData(array(),null,null,null);
        $data['title']="المطعم";
        $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->load->view("tables",$data); 
    }
   



}
