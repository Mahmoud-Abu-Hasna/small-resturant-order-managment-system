<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->Model('Main_Model');
        // Your own constructor code
    }

    public function shared($page, $data = null) {
        $this->load->view("shared/Header",$data);
        $this->load->view($page, $data);
        $this->load->view("shared/Footer",$data);
    }

}
