<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('Table_order');
          $this->load->model('Item');
           $this->load->model('Category');
        $this->load->model('Table_num');
         $this->load->model('Order_item');
          $this->load->model('Tables_resturant');
           $this->load->model('Settings');
    }

    public function index() {
       $data['order_date']= $this->session->userdata('order_date');
            $data['order_hour']=$this->session->userdata('order_hour');
             $data['order_table']=$this->session->userdata('order_table');
              $data['cashir_id']=  $this->session->userdata('user_id');
           $rs['rs']= $this->Table_order->getTableData($data, null, null, null)[0];
           $rs['cats']=$cats=$this->Category->getTableData(array(), null, null, null);
           foreach ($cats as $value) {
               $data["$value->cat_name"]=$this->Item->getTableDataJC(array('item_cat'=>$value->cat_id));
               
           }
           $rs['data']=$data;
           $rs['cashir_id']=  $this->session->userdata('user_id');
            $rs['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
           $this->load->view('orders',$rs);
      
    }
    
    public function getTable(){
         $table=  $this->input->post('table');
          header('Content-Type: application/json');
        if($this->input->is_ajax_request()){
       if(empty($table)){
            redirect('User');
            $json['status']=0;
       }else{
           $data['order_date']= date("Y-m-d");
            $data['order_hour']=date("H-i-sa");
             $data['order_table']=$table;
              $data['cashir_id']=  $this->session->userdata('user_id');
              
       $this->Table_order->addTableData($data);
        $rs= $this->Table_order->getTableData($data, null, null, null)[0];
        $data['order_id']=$rs->order_id;
       $this->session->set_userdata($data);
        $json['status']=1;
       }
        echo json_encode($json);        
            
        }
        
    }

    public function editNum() {
       
        $this->Table_num->editTableRow(array('id' => 1), $this->input->post());
       redirect(base_url().'Home');
    }
    public function add() {
         header('Content-Type: application/json');
        if($this->input->is_ajax_request()){
            $list_items=  $this->input->post("list_items");
                     $ids=  $this->input->post("ids");
                    
                    $table=  $this->input->post("table");
                     $order=  $this->input->post("order");
                     $total=  $this->input->post("total");
					 $total_pill=0;
                 $items = $this->Table_order->getOrderItems($order);
           if(!isset($list_items)&& sizeof($items)<0){
               $json['status']=0;
               $json['msg']='الرجاء اختيار الوجبات';
           }else{
            //  $items=$this->Item->getTableData(array(), null, null, null);
              
               if (sizeof($list_items)) {
                    if(sizeof($items)){
                    for($i=0;$i<sizeof($ids);$i++){
                       if(!$list_items[$ids[$i]]['delete']){
                            $cat=$list_items[$ids[$i]]['type'];
                    $number=$list_items[$ids[$i]]['number'];
                     $cost=$list_items[$ids[$i]]['total_price'];
					 $total_pill+=$cost;
                   $this->Order_item->addTableData(array('item_cat'=>$cat,'order_id'=>$order,'item'=>$ids[$i],'item_number'=>$number,'total_cost'=>$cost));  
                       }
                   }
               $this->Table_order->editTableRow(array('order_id'=>$order),array("total_pill"=>$total)) ;
               
               }else{
                   for($i=0;$i<sizeof($ids);$i++){
                       if(!$list_items[$ids[$i]]['delete']){
                            $cat=$list_items[$ids[$i]]['type'];
                    $number=$list_items[$ids[$i]]['number'];
                     $cost=$list_items[$ids[$i]]['total_price'];
					 $total_pill+=$cost;
                   $this->Order_item->addTableData(array('item_cat'=>$cat,'order_id'=>$order,'item'=>$ids[$i],'item_number'=>$number,'total_cost'=>$cost));  
                       }
                   }
               $this->Table_order->editTableRow(array('order_id'=>$order),array("total_pill"=>$total_pill)) ;
               $this->Tables_resturant->editTableRow(array('t_id'=>$table),array("t_state"=>'reserved' , "t_last_used"=>  date("Y-m-d h:i:sa")));
           
               }
                   $json['status']=1;
               $json['msg']='تمت الاضافة بنجاح'; 
            }
               }
              
             echo json_encode($json);        
            
        }
       
        
    }
    
    public function cancel() {
        $id=  $this->input->get('id');
        $table= $this->input->get('table');
         $items = $this->Table_order->getOrderItems($id);
         if(sizeof($items)){
             redirect('User'); 
         }else{
              $this->Table_order->deleteTableRow(array('order_id'=>$id));
        $this->Tables_resturant->editTableRow(array('t_id'=>$table),array("t_state"=>'free'));
         }
       
        redirect('User');
    }

   


}
