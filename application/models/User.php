<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("Main_Model.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends Main_Model {

    public function __construct() {
        parent::__construct();
         $this->table='users';
        // Your own constructor code
}




    }