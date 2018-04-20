<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cashirs extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Settings');
        $this->load->model('User_type');
        if(empty($this->session->userdata('user_type'))){
        
             redirect(base_url().'Welcome');
        }
    }

    public function index() {
        $get_data = $this->input->get();
        if (!empty($get_data)) {
       $data['result']=  $this->User->getTableData(array('user_type!=' =>  1 ,'user_type'=>  $get_data['user_type_id']), null, null, null);
            $data['get']=$get_data['user_type_id'];
        }else{
            $data['result']=array();
        }
        $data['user_types']=  $this->User_type->getTableData(array( 'user_type_id!=' => '1' , 'user_type_id!=' => 15 ), null, null, null);
        
          $data['title'] = 'ادارة المستخدمين';
           $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared('cashirs', $data);
          
  
       
      
    }
   public function  add(){
       
          $post_data = $this->input->post();
            if (empty($post_data)) {
               $data['status'] = 0;
                $data['msg'] = "لم ترسل بيانات";
                $this->session->set_tempdata($data, null, 5);
                //$this->session->set_flashdata($data);
                     redirect("Cashirs");
            
            } else {
                 $this->form_validation->set_rules('user_name', ' الاسم ', 'required|is_unique[users.user_name]');
                 $this->form_validation->set_rules('user_pass', 'كلمة المرور', 'required');
               
               
                 if ($this->form_validation->run() == FALSE) {
                    $data['status'] = 0;
                    $data['validation'] = validation_errors();
                     $this->session->set_tempdata($data, null, 5);
                   //   $this->session->set_flashdata($data);
                       redirect("Cashirs");
                } else {
                    $post_data['user_pass']=  md5($post_data['user_pass'].'?1?');
                    $this->User->addTableData($post_data);
                         $data['status'] = 1;
                        $data['msg'] = "تمت الاضافة بنجاح";
                         $this->session->set_tempdata($data, null, 5);
                         // $this->session->set_flashdata($data);
                         redirect("Cashirs");
                       // $this->index();
                   
                }
       
            
            }
       
       
   }
  
   
    public function  delete(){
        header('Content-Type: application/json');
          $post_data = $this->input->post();
           if($this->input->is_ajax_request()){
                if (empty($post_data)) {
               $json['status'] = 0;
                $json['msg'] = "لم ترسل بيانات";
             
            } else {
                
               
                    $this->User->deleteTableRow($post_data);
                         $json['status'] = 1;
                        $json['msg'] = "تمت عملية الحذف بنجاح";
                         
            }
               
               
               
           }
        echo json_encode($json);
       
   }
  



}
