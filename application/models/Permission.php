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

class Permission extends Main_Model {

    public function __construct() {
        parent::__construct();
        $this->table='user_permission';
        // Your own constructor code
    }
    public function getPermissions()
    {
        $this->db->select('up1.user_permission_id,up1.user_permission_a,up1.user_permission_e,up1.user_permission_path,up1.parent_id,up2.user_permission_a parent_name_a,up2.user_permission_e parent_name_e')->from("user_permission up1")
            ->join("user_permission up2", "up2.user_permission_id = up1.parent_id",'left');
        $rs = $this->db->get();
        return $rs->result();
    }



}
