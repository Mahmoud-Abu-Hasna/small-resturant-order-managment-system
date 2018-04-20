<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Created by PhpStorm.
 * User: mabuhasna
 * Date: 7/29/2017
 * Time: 2:29 PM
 */

class User_Permissions extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_Permission');
        $this->load->model('Permission');
        $this->load->model('User_type');
        

        $this->load->model('Settings');
        if(empty($this->session->userdata('user_type'))){

            redirect(base_url().'Welcome');
        }
    }

    public function index() {

        $get_data = $this->input->get();
        if (!empty($get_data)) {
            $data['result']=$this->User_Permission->getUserPermissions($get_data['user_type_id']);
            $data['get']=$get_data['user_type_id'];
        }else{
            $data['result']=array();
        }
      
        $data['user_types']=  $this->User_type->getTableData(array(), null, null, null);
        $data['permissions']=  $this->Permission->getTableData(array(), null, null, null);
        $data['title'] = 'صلاحيات المستخدمين';
        $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared('user_permissions', $data);




    }
    public function  addUserTypePermission(){

        $post_data = $this->input->post();
        if (empty($post_data)) {
            $data['status'] = 0;
            $data['msg'] = "لم ترسل بيانات";
            $this->session->set_tempdata($data, null, 5);
            //$this->session->set_flashdata($data);


        } else {
            $this->form_validation->set_rules('user_type_id', ' نوع المستخدم ', 'required');
            $this->form_validation->set_rules('user_permission_id', ' الصلاحية ', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['status'] = 0;
                $data['validation'] = validation_errors();
                $this->session->set_tempdata($data, null, 5);
                //   $this->session->set_flashdata($data);

            } else {
          $rs=$this->User_Permission->getTableData(array('user_type_id'=>$post_data['user_type_id'],'user_permission_id'=>$post_data['user_permission_id']),null, null,null);
                if(empty($rs)){
                    $this->User_Permission->addTableData($post_data);
                    $data['status'] = 1;
                    $data['msg'] = "تمت الاضافة بنجاح";
                    $this->session->set_tempdata($data, null, 5);
                }else{
                    $data['status'] = 0;
                    $data['msg'] = "الصلاحية مضافة مسبقا";
                    $this->session->set_tempdata($data, null, 5);
                }

                // $this->session->set_flashdata($data);

                // $this->index();

            }


        }

        redirect("User_Permissions");
    }


    public function  delete(){
        header('Content-Type: application/json');
        $post_data = $this->input->post();
        if($this->input->is_ajax_request()){
            if (empty($post_data)) {
                $json['status'] = 0;
                $json['msg'] = "لم ترسل بيانات";

            } else {


                $this->User_Permission->deleteTableRow($post_data);
                $json['status'] = 1;
                $json['msg'] = "تمت عملية الحذف بنجاح";

            }



        }
        echo json_encode($json);

    }


}

