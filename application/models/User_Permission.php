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

class User_Permission extends Main_Model {

    public function __construct() {
        parent::__construct();
        $this->table='user_type_permissions';
        // Your own constructor code
    }
    public function getUserPermissions($user_type_id=null)
    {

        $this->db->select('utp.user_type_perm_id,up1.user_permission_id,up1.user_permission_a,up1.user_permission_e,up1.user_permission_path,up1.parent_id,up2.user_permission_a parent_name_a,up2.user_permission_e parent_name_e')->from('user_type_permissions utp')
            ->join("user_permission up1","utp.user_permission_id = up1.user_permission_id",'left')
            ->join("user_permission up2", "up2.user_permission_id = up1.parent_id ",'left')
            ->where('utp.user_type_id',$user_type_id);


        $rs = $this->db->get();
        return $rs->result();
    }



}
