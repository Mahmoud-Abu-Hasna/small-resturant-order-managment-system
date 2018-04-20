<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Bills extends MY_Controller {

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


        $data['title'] = 'الفواتير';

        $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared('bills', $data);




    }
    
    function getBill($id){
        $tables = $this->Table_order->getTableData(array('order_id'=>$id), null, null, null);
        $items = $this->Table_order->getOrderItems($tables[0]->order_id);
        $set=  $this->Settings->getTableData(array(),null,null,null)[0];
        $p = "";
        foreach ($items as $item) {


            $p = "$p<tr style='text-align:center;font-size: 16px;font-weight: bold;'>";
            $p = "$p<td width='20%'>".$item->cat_name."</td>";
            $p = "$p<td width='20%'>".$item->item_name."</td>";
            $p = "$p<td width='20%'>".$item->item_number."</td>";
            $p = "$p<td width='20%'>".$item->total_cost/$item->item_number."</td>";
            $p = "$p<td width='20%'>".$item->total_cost."</td>";



            $p = "$p</tr>";

        }
        $p = "$p<tr style='text-align:center;font-size: 16px;font-weight: bold;'>".
            "<td > طاولة رقم</td>".
            "<td >". $tables[0]->order_table."</td>".
            "<td ></td>".
            "<td >الحساب</td>".
            "<td  >" .$tables[0]->total_pill."</td>".
            "</tr>";
        $id=$tables[0]->order_id;
        $html = "
       
         <p style='
        margin:2px;
    padding:2px;
    font-size: 16px;font-weight: bold;
   '><label>رقم الفاتورة :</label>
        $id</p>
       
 
        <table border = '1' width = '100%'>
            <tr style='color:red;text-align:center;font-size: 16px;font-weight: bold;'>
             <th width='20%' >القسم</th>
             <th width='20%' >الوجبة</th>
           <th width='20%' >العدد</th>
     <th width='20%'>ثمن</th>
            <th width='20%' >الاجمالي</th>
            </tr>
           
                  $p 
             
        </table>";

        echo $html;
    }




}
