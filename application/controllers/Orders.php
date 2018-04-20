<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Orders extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Table_order');
        $this->load->model('Settings');


        if(empty($this->session->userdata('user_type'))){

            redirect(base_url().'Welcome');
        }
    }

    public function index() {

        $data['result']=  $this->Table_order->getAll();


        $data['title'] = 'الطلبات';

        $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared('admin_orders', $data);




    }
    public function changeStatus(){
        $op=$this->input->get('op');
        $id=$this->input->get('id');
        $status= $op == 'start' ? 1 : 2 ;
        if(!empty($id)){
            $this->Table_order->editTableRow(array('order_id'=>$id),array("order_status"=>$status)) ;
            $data['status'] = 1;
            $data['msg'] = "تم تغيير حالة الطلب بنجاح";
            $this->session->set_tempdata($data, null, 5);
            // $this->session->set_flashdata($data);
            redirect("Orders");
        }else{
            $data['status'] = 0;
            $data['msg'] = "لا يمكن تغيير الحالة";
            $this->session->set_tempdata($data, null, 5);
            // $this->session->set_flashdata($data);
            redirect("Orders");
        }

    }




}
