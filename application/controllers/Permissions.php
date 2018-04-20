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

class Permissions extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Permission');

        $this->load->model('Settings');
        if(empty($this->session->userdata('user_type'))){

            redirect(base_url().'Welcome');
        }
    }

    public function index() {

        $data['result']=  $this->Permission->getPermissions();
        $data['parents']=  $this->Permission->getTableData(array('parent_id'=>'null'), null, null, null);
        $data['title'] = 'الصلاحيات';
        $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared('permissions', $data);




    }
    public function  add(){

        $post_data = $this->input->post();
        if (empty($post_data)) {
            $data['status'] = 0;
            $data['msg'] = "لم ترسل بيانات";
            $this->session->set_tempdata($data, null, 5);
            //$this->session->set_flashdata($data);


        } else {
            $this->form_validation->set_rules('user_permission_a', ' الصلاحية ', 'required|is_unique[user_permission.user_permission_a]');
            $this->form_validation->set_rules('user_permission_e', ' الصلاحية(english) ', 'required|is_unique[user_permission.user_permission_e]');
            $this->form_validation->set_rules('user_permission_path', 'رابط الصلاحية', 'required|is_unique[user_permission.user_permission_path]');


            if ($this->form_validation->run() == FALSE) {
                $data['status'] = 0;
                $data['validation'] = validation_errors();
                $this->session->set_tempdata($data, null, 5);
                //   $this->session->set_flashdata($data);

            } else {

                $this->Permission->addTableData($post_data);
                $data['status'] = 1;
                $data['msg'] = "تمت الاضافة بنجاح";
                $this->session->set_tempdata($data, null, 5);
                // $this->session->set_flashdata($data);

                // $this->index();

            }


        }

        redirect("Permissions");
    }


    public function  delete(){
        header('Content-Type: application/json');
        $post_data = $this->input->post();
        if($this->input->is_ajax_request()){
            if (empty($post_data)) {
                $json['status'] = 0;
                $json['msg'] = "لم ترسل بيانات";

            } else {


                $this->Permission->deleteTableRow($post_data);
                $this->Permission->deleteFromTable('user_type_permissions',array('user_permission_id'=>$post_data['user_permission_id']));
                $json['status'] = 1;
                $json['msg'] = "تمت عملية الحذف بنجاح";

            }



        }
        echo json_encode($json);

    }
    public function  edit(){
        header('Content-Type: application/json');
        $post_data = $this->input->post();
        if($this->input->is_ajax_request()){
            if (empty($post_data)) {
                $json['status'] = 0;
                $json['msg'] = "لم ترسل بيانات";

            } else {


                $this->Permission->editTableRow(array('user_permission_id'=>$post_data['user_permission_id']), $post_data);
                $json['status'] = 1;
                $json['msg'] = "تمت عملية التعديل بنجاح";

            }



        }
        echo json_encode($json);

    }
  


}
