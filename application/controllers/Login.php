<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
         $this->load->model('Item');
          $this->load->model('table_order');
           $this->load->model('Category');
           $this->load->model('Settings');
          
             if(!empty($this->session->userdata('user_type'))){
        if($this->session->userdata('user_type')){
            redirect(base_url().'Home');
        }else{
            redirect(base_url().'User');
        }
             
        }
        
    }

    public function index() {
       
             $post_data = $this->input->post();
            if (empty($post_data)) {
                
             $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
		 
               $data['status'] = 0;
                $data['msg'] = "أعد المحاولة مرة أخرى";
                  $this->load->view("login",$data);
            
            } else {
                 $this->form_validation->set_rules('username', 'اسم المستخدم', 'required');
                 $this->form_validation->set_rules('password', 'كلمة المرور', 'required');
               
                 if ($this->form_validation->run() == FALSE) {
                    $data['status'] = 0;
                    $data['msg'] = validation_errors();
                     
             $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
                      $this->load->view("login",$data);
                } else {
                    $username=$post_data['username'];
                    $password=  md5($post_data['password'].'?1?');
                    $rs=  $this->User->getTableData(array('user_name'=>$username ,'user_pass'=>$password), null, null, null);
               if(sizeof($rs)){
                   $data['status'] = 1;
                    $data['msg'] = 'أهلا و سهلا بك';
                    $post_data['user_type']=$rs[0]->user_type;
                    
                   if($rs[0]->user_type != 2){
                        $post_data['user_id']=$rs[0]->user_id;
                     $post_data['user_type']=$rs[0]->user_type;
                         $this->session->set_userdata($post_data);
                       redirect('Home');
                     
                   }else{
                     $post_data['user_id']=$rs[0]->user_id;
                     $post_data['user_type']=$rs[0]->user_type;
                        $post_data['title']="المطعم";
                        $this->session->set_userdata($post_data);
                      redirect('User');
                    
                   }
                   
                   
                   
               }else{
                   $data['status'] = 0;
                $data['msg'] = "المعلومات المدخلة غير صحيحة";
                 
             $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
                  $this->load->view("login",$data);
               }
        
                   
                }
       
            
            }
    
  
       
      
    }
   



}
