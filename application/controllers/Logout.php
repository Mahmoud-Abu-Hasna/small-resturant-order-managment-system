<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class logout extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
    }

    public function index() {
        $this->session->sess_destroy();
       redirect(base_url().'Welcome');
        
        
    }
}