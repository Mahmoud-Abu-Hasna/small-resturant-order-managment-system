<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Resturant_table extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tables_resturant');
          $this->load->model('Table_order');
            $this->load->model('Settings');
            $this->load->model('Category');
         $this->load->model('Item');
    }

    public function index() {

        $tables = $this->Tables_resturant->getTableData(array(), null, null, null);

        $data['table'] = (sizeof($tables)) ? $tables : 0;

        $data['title'] = "طاولات المطعم";
       
           $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->shared('resturant_tables', $data);
    }

    public function add() {

        $post_data = $this->input->post();
        if (empty($post_data)) {
            $data['status'] = 0;
            $data['msg'] = "لم ترسل بيانات";
            $this->session->set_tempdata($data, null, 5);
        } else {
            $this->form_validation->set_rules('t_position', ' المكان ', 'required|is_unique[res_tables.t_position]');

            if ($this->form_validation->run() == FALSE) {
                $data['status'] = 0;
                $data['validation'] = validation_errors();
                $this->session->set_tempdata($data, null, 5);
            } else {

                $this->Tables_resturant->addTableData($post_data);
                $data['status'] = 1;
                $data['msg'] = "تمت الاضافة بنجاح";
                $this->session->set_tempdata($data, null, 5);
            }
        }
        redirect("Resturant_table");
    }

    public function edit() {
     if($this->input->is_ajax_request()){
         $post_data = $this->input->post();
         if(empty($post_data)){
              $data['status'] = 0;
         }else{
             $this->Tables_resturant->editTableRow(array("t_id"=> $post_data['t_id']), array("t_position"=>$post_data['t_position']));
              $data['status'] = 1;
         }
         
     }else{
         $data['status'] = 0;
     }
     echo json_encode($data);  
    }

     public function cancelReserve() {
        
        $table= $this->input->get('table');
       
        $this->Tables_resturant->editTableRow(array('t_id'=>$table),array("t_state"=>'free'));
        redirect('User');
    }
    
     public function editReserve() {
       
        $table= $this->input->get('table');
       
         $tables = $this->Table_order->getTableData(array('order_table'=>$table), 1, 'order_id', 'DESC');
          $items = $this->Table_order->getOrderItems($tables[0]->order_id);
           $rs['cats']=$cats=$this->Category->getTableData(array(), null, null, null);
           foreach ($cats as $value) {
               $data["$value->cat_name"]=$this->Item->getTableDataJC(array('item_cat'=>$value->cat_id));
               
           }
           $rs['data']=$data;
          // foreach ($tables as $value) {
//               $rs["order_table"]=$tables[0]->order_table;
//               $rs["order_id"]=$tables[0]->order_id;
//               $rs["order_date"]=$tables[0]->order_date;
//               $rs["total_pill"]=$tables[0]->total_pill;
//               
         //  }
        $rs['tables'] = (sizeof($tables)) ? $tables : 0;
         $rs['items'] = (sizeof($items)) ? $items : 0;
         $rs['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->load->view('orders', $rs);
    }
  public function printBill(){
      $table= $this->input->get('table');

      $this->genBill($table,'d',1);
      $this->genBill($table,'i',1);



  }
    public function printBillId(){
        $id= $this->input->get('id');

        $this->genBill($id,'d',2);
        $this->genBill($id,'i',2);



    }
    function genBill($table , $s ,$o){

        $tables=null;
        $items=null;
if($o == 1){
    $tables = $this->Table_order->getTableData(array('order_table'=>$table), 1, 'order_id', 'DESC');

}else{
    $tables = $this->Table_order->getTableData(array('order_id'=>$table), null, null, null);

}
        $items = $this->Table_order->getOrderItems($tables[0]->order_id);
       $set=  $this->Settings->getTableData(array(),null,null,null)[0];
        $this->load->library("MYPDF");

        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $this->load->helper(array('file'));
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Bill');
// set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        // set header and footer fonts
        $pdf->setHeaderFont(array('aealarabiya', '', 10));
        $pdf->setFooterFont(array('aealarabiya', '', 10));

// set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//        $pdf->SetAutoPageBreak(TRUE, 100);
// set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set some language dependent data:
        $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';

// set some language-dependent strings (optional)
        $pdf->setLanguageArray($lg);
// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
        }
        // ---------------------------------------------------------
        $fontname = TCPDF_FONTS::addTTFfont(APPPATH . 'helpers/tcpdf/include/Typography_ties.ttf', 'TrueTypeUnicode', '', 96);

// set font
//        $pdf->SetFont('aealarabiya', '', 18);
        $pdf->SetFont('aealarabiya', '', 16);
//        $pdf->SetFont($fontname, '', 14, '', false);
        $pdf->SetMargins(5, 18, 5, true);
// add a page

        $pdf->AddPage('P', 'A7');
        $p = "";
//      $h = "<tr style=\"color:red;text-align:center;font-size: 80%;\">";
//      for ($i = 0; $i <= $count; $i++) {
//          $rs = $this->input->post("header" . $i);
//          $h = "$h<th>$rs</th> ";
//      }
//      $h = "$h </tr>";

        foreach ($items as $item) {


            $p = "$p<tr style=\"text-align:center;font-size: 40 %;\">";
            $p = "$p<td width=\"20%\">".$item->cat_name."</td>";
            $p = "$p<td width=\"20%\">".$item->item_name."</td>";
            $p = "$p<td width=\"20%\">".$item->item_number."</td>";
            $p = "$p<td width=\"20%\">".$item->total_cost/$item->item_number."</td>";
            $p = "$p<td width=\"20%\">".$item->total_cost."</td>";



            $p = "$p</tr>";

        }
        $p = "$p<tr style=\"text-align:center;font-size: 40 %;\">".
            "<td > طاولة رقم</td>".
            "<td >". $tables[0]->order_table."</td>".
            "<td ></td>".
            "<td >الحساب</td>".
            "<td  >" .$tables[0]->total_pill."</td>".
            "</tr>";



//      if (!empty($post)) {
//          foreach ($this->input->post("row0") as $key => $row) {
//              $p = "$p<tr  style=\"text-align:center;font-size: 70%;\">";
//              for ($i = 0; $i <= $count; $i++) {
//                  $rs = $this->input->post("row" . $i)[$key];
//                  $p = "$p<td>$rs</td>";
//              }
//              $p = "$p</tr>";
//          }
//      }
        $id=$tables[0]->order_id;

        $html = <<<EOf
       
         <p style="
        margin:2px;
    padding:2px;
    font-size: 40%;
   "><label>رقم الفاتورة :</label>
        $id</p>
       
 
        <table border = "1" width = "100%">
            <tr style="color:red;text-align:center;font-size: 50%;">
             <th width="20%" >القسم</th>
             <th width="20%" >الوجبة</th>
           <th width="20%" >العدد</th>
     <th width="20%">ثمن</th>
            <th width="20%" >الاجمالي</th>
            </tr>
           
                  $p 
             
        </table>
EOf;

// output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
// set I to explore or set D to download
        ob_clean();
      //  $this->downBill($table);
        if($s == 'd'){
            $pdf->Output($set->new_path."/Bill_Order_".$tables[0]->order_id . '.pdf', 'F');
        }else{
            $pdf->IncludeJS("print(true);");
            $pdf->Output("Bill_Order_".$tables[0]->order_id . '.pdf', 'I');
        };



      //exit();

    }
   

}
