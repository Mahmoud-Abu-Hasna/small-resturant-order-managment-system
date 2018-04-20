<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Items extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Item');
        $this->load->model('Category');
        $this->load->model('Settings');
        $this->load->library('upload');
       if(empty($this->session->userdata('user_type'))){
        
             redirect(base_url().'Welcome');
        }
    }

    public function index() {
          $data['cat']=  $this->Category->getTableData(array(), null, null, null);
        $data['result']=  $this->Item->getTableDataJ();
          $data['title'] = 'الوجبات';
           
           $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared('items', $data);
          
  
       
      
    }
   public function  add(){
       
          $post_data = $this->input->post();
            if (empty($post_data)) {
               $data['status'] = 0;
                $data['msg'] = "لم ترسل بيانات";
                $this->session->set_tempdata($data, null, 5);
                //$this->session->set_flashdata($data);
                     redirect("Items");
            
            } else {
                 $this->form_validation->set_rules('item_name', 'اسم الوجبة ', 'required|is_unique[items.item_name]');
               $this->form_validation->set_rules('item_cost', 'تكلفة الوجبة ', 'required');
               
               
                 if ($this->form_validation->run() == FALSE) {
                    $data['status'] = 0;
                    $data['validation'] = validation_errors();
                     $this->session->set_tempdata($data, null, 5);
                   //   $this->session->set_flashdata($data);
                       redirect("Items");
                } else {
                  $config =  array(
                         'upload_path' => './uploads/',
                         'overwrite' => false,
                         'max_filename' => 300,
                         'encrypt_name' => true,
                         'remove_spaces' => true,
                         'allowed_types' => 'gif|jpg|png',
                         'max_size' => 6000,
                         'xss_clean' => true,
                     );
                     $this->upload->initialize($config);
                     if ( ! $this->upload->do_upload('item_img'))
                     {
//                         $error = array('error' => $this->upload->display_errors());
                         $data['status'] = 0;
                         $data['validation'] = $this->upload->display_errors();
                         $this->session->set_tempdata($data, null, 5);
                         //   $this->session->set_flashdata($data);
                         redirect("Items");

                     }
                     else
                     {
                         $data = array('upload_data' => $this->upload->data());
                         $file_data = $this->upload->data();
                         $this->Item->addTableDataExt('media',array('media_path'=>$file_data['full_path']));
                         $post_data['item_image']=$this->db->insert_id();
                         $this->Item->addTableData($post_data);
                          $data['status'] = 1;
                        $data['msg'] = "تمت الاضافة بنجاح";
                         $this->session->set_tempdata($data, null, 5);
//                          $this->session->set_flashdata($data);
                         redirect("Items");
                         // $this->index();
                     }


                   
                }

            
            }
       
       
   }
    function readImage($id) {

        //Get file from database
        $file = $this->db->query('SELECT * FROM media WHERE media_id='.$id)->result();
        //Then serve the file

        $image = $file[0]->media_path; //this can also be a url
        $filename = basename($image);
        $ctype="";
        $file_extension = strtolower(substr(strrchr($filename,"."),1));
        switch( $file_extension ) {
            case "gif": $ctype="image/gif"; break;
            case "png": $ctype="image/png"; break;
            case "jpeg":
            case "jpg": $ctype="image/jpeg"; break;
            default:
        }

        header('Content-type: ' . $ctype);
        $image = file_get_contents($image);
        echo $image;

//        header("Content-type: image/png");
//        readfile($file->media_path);
    }
   
    public function  delete(){
        header('Content-Type: application/json');
          $post_data = $this->input->post();
           if($this->input->is_ajax_request()){
                if (empty($post_data)) {
               $json['status'] = 0;
                $json['msg'] = "لم ترسل بيانات";
             
            } else {
                
               
                    $this->Item->deleteTableRow($post_data);
                         $json['status'] = 1;
                        $json['msg'] = "تمت عملية الحذف بنجاح";
                         
            }
               
               
               
           }
        echo json_encode($json);
       
   }
  



}
