<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("Main_Model.php");
/**
 * Created by PhpStorm.
 * User: mabuhasna
 * Date: 7/29/2017
 * Time: 2:19 PM
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_type extends Main_Model {

    public function __construct() {
        parent::__construct();
        $this->table='user_type';
        // Your own constructor code
    }
    




}
