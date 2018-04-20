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

class User_types extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_type');

        $this->load->model('Settings');
        if(empty($this->session->userdata('user_type'))){

            redirect(base_url().'Welcome');
        }
    }

    public function index() {

        $data['result']=  $this->User_type->getTableData(array(), null, null, null);
        $data['title'] = 'أنواع المستخدمين';
        $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared('user_types', $data);




    }
    public function add(){

        $post_data = $this->input->post();
        if (empty($post_data)) {
            $data['status'] = 0;
            $data['msg'] = "لم ترسل بيانات";
            $this->session->set_tempdata($data, null, 5);
            //$this->session->set_flashdata($data);


        } else {
            $this->form_validation->set_rules('user_type_name_a', ' الاسم ', 'required|is_unique[user_type.user_type_name_a]');
            $this->form_validation->set_rules('user_type_name_e', ' الاسم(english) ', 'required|is_unique[user_type.user_type_name_e]');


            if ($this->form_validation->run() == FALSE) {
                $data['status'] = 0;
                $data['validation'] = validation_errors();
                $this->session->set_tempdata($data, null, 5);
                //   $this->session->set_flashdata($data);

            } else {

                $this->User_type->addTableData($post_data);
                $data['status'] = 1;
                $data['msg'] = "تمت الاضافة بنجاح";
                $this->session->set_tempdata($data, null, 5);
                // $this->session->set_flashdata($data);

                // $this->index();

            }


        }

        redirect("User_types");
    }


    public function delete(){
        header('Content-Type: application/json');
        $post_data = $this->input->post();
        if($this->input->is_ajax_request()){
            if (empty($post_data)) {
                $json['status'] = 0;
                $json['msg'] = "لم ترسل بيانات";

            } else {


                $this->User_type->deleteTableRow($post_data);
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


                $this->User_type->editTableRow(array('user_type_id'=>$post_data['user_type_id']), $post_data);
                $json['status'] = 1;
                $json['msg'] = "تمت عملية التعديل بنجاح";

            }



        }
        echo json_encode($json);

    }



}
