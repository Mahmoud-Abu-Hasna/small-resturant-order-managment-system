<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Setting extends MY_Controller {

    public function __construct() {
        
        parent::__construct();
      $this->load->model('Settings');
         $this->load->model('User');
        $this->load->helper(array('form', 'url'));
        if (empty($this->session->userdata('user_type'))) {

            redirect(base_url() . 'Welcome');
        }
    }

    public function index() {
       
        $data['set'] = $this->Settings->getTableData(array(), null, null, null)[0];
        $data['result'] = $this->Settings->getTableData(array(), null, null, null)[0];
        $data['admin'] = $this->User->getTableData(array('user_type' => 1), null, null, null)[0];
        $data['title'] = 'الاعدادات';
        $this->shared('settings', $data);
    }


    public function editLogo() {

        $config['upload_path']          = '.\assets\img';
        $config['allowed_types']        = 'gif|jpg|png';
//        $config['max_size']             = 100;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('logo'))
        {
          
            redirect('Setting');

        }
        else
        {
            //$data = array('upload_data' => $this->upload->data());
            $name=$this->upload->data('file_name');
            $path=$this->upload->data('file_path');
            $this->Settings->editTableRow(array('id' => 1), array('logo_name' => $name , 'logo_path' => $path));
            redirect('Setting');

        }

//        $post_data = $this->input->post();
//
//        if (!empty($post_data)){
//
//            // $this->User->getTableData(array('user_name'=>$username ,'user_pass'=>$password), null, null, null);
//            if (isset($post_data['user_name'])) {
//                $this->User->editTableRow(array('user_type' => 1), array('user_name' => $post_data['user_name']));
//
//            }
//            if (isset($post_data['user_pass'])) {
//                $this->User->editTableRow(array('user_type' => 1), array('user_pass' => md5($post_data['user_pass'] . '?1?')));
//
//            }
//        }
//        redirect('Setting');
    }
    public function editAdmin() {
       
        $post_data = $this->input->post();
       
            if (!empty($post_data)){
              
                // $this->User->getTableData(array('user_name'=>$username ,'user_pass'=>$password), null, null, null);
                if (isset($post_data['user_name'])) {
                    $this->User->editTableRow(array('user_type' => 1), array('user_name' => $post_data['user_name']));
                   
                } 
                if (isset($post_data['user_pass'])) {
                    $this->User->editTableRow(array('user_type' => 1), array('user_pass' => md5($post_data['user_pass'] . '?1?')));
                   
                } 
            }
        redirect('Setting');
    }

    public function editSettings() {
      
        $post_data = $this->input->post();
       
            if (!empty($post_data)){
              
               if (isset($post_data['enter_text'])) {
                    $this->Settings->editTableRow(array('id' => 1), array('enter_text' => $post_data['enter_text']));
                    $json['status'] = 1;
                    $json['msg'] = "تمت عملية التعديل بنجاح";
                } 
                if (isset($post_data['login_form_title'])) {
                    $this->Settings->editTableRow(array('id' => 1), array('login_form_title' => $post_data['login_form_title']));
                    $json['status'] = 1;
                    $json['msg'] = "تمت عملية التعديل بنجاح";
                } 
                if (isset($post_data['rest_name'])) {
                    $this->Settings->editTableRow(array('id' => 1), array('rest_name' => $post_data['rest_name']));
                    $json['status'] = 1;
                    $json['msg'] = "تمت عملية التعديل بنجاح";
                } 

                
            }
            redirect('Setting');
    }
     public function editFilePath(){
         $post_data = $this->input->post();

         if (!empty($post_data)){

             if (isset($post_data['new_path'])) {
                 $this->Settings->editTableRow(array('id' => 1), array('new_path' => $post_data['new_path']));
                 $json['status'] = 1;
                 $json['msg'] = "تمت عملية التعديل بنجاح";
             }
         }
         redirect('Setting');

         }
}
