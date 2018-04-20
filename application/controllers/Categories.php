<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Categories extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
        $this->load->model('Category');
         $this->load->model('Settings');
                

       if(empty($this->session->userdata('user_type'))){
        
             redirect(base_url().'Welcome');
        }
    }

    public function index() {
         
        $data['result']=  $this->Category->getTableData(array(), null, null, null);
          $data['title'] = 'الأصناف';
         
           $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared('categories', $data);
          
  
       
      
    }
   public function  add(){
       
          $post_data = $this->input->post();
            if (empty($post_data)) {
               $data['status'] = 0;
                $data['msg'] = "لم ترسل بيانات";
                $this->session->set_tempdata($data, null, 5);
                //$this->session->set_flashdata($data);
                     redirect("Categories");
            
            } else {
                 $this->form_validation->set_rules('cat_name', 'اسم الصنف ', 'required|is_unique[catigories.cat_name]');
              
               
               
                 if ($this->form_validation->run() == FALSE) {
                    $data['status'] = 0;
                    $data['validation'] = validation_errors();
                     $this->session->set_tempdata($data, null, 5);
                   //   $this->session->set_flashdata($data);
                       redirect("Categories");
                } else {
                    $this->Category->addTableData($post_data);
                         $data['status'] = 1;
                        $data['msg'] = "تمت الاضافة بنجاح";
                         $this->session->set_tempdata($data, null, 5);
                         // $this->session->set_flashdata($data);
                         redirect("Categories");
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
                
               
                    $this->Category->deleteTableRow($post_data);
                         $json['status'] = 1;
                        $json['msg'] = "تمت عملية الحذف بنجاح";
                         
            }
               
               
               
           }
        echo json_encode($json);
       
   }
  



}
