<?php

// Extend the TCPDF class to create custom Header and Footer
require_once(APPPATH . 'helpers/tcpdf/tcpdf_include.php');
require_once(APPPATH . 'helpers/tcpdf/tcpdf.php');
//require_once(APPPATH . 'modules/User/models/Users.php');

class MYPDF extends TCPDF {

    protected $processId = 0;
    protected $header = '';
    protected $footer = '';
    static $errorMsg = '';

    /**
     * MYPDF constructor.
     */
    public function get_settings_data() {
        $con = mysqli_connect("localhost", "root", "", "resturant");
        $con->set_charset("utf8");
        $q = 'select * from settings ';
        $rs = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($rs)) {
            $this->global_data['rest_name'] = $row["rest_name"];
            $this->global_data['rest_adress'] = $row["rest_adress"];
            $this->global_data['logo_name'] = $row["logo_name"];
            $this->global_data['logo_path'] = $row["logo_path"];
        }
    }

    public function Header() {
        $this->get_settings_data();

        // Logo
        $this->SetFont('aealarabiya', '', 8);
        $image_file = $this->global_data['logo_path'] == ""?"assets/img/icon2.jpg":"assets/img/". $this->global_data['logo_name'];


        $this->Image($image_file,42,2, 10, 10, null, '', 'T', true, 250, '', false, false, 0, false, false, false);
        $this->MultiCell(0, 0, $this->global_data['rest_name'], 0, 'C', 0, 1,5, 12, true, 0, false, true, 0);


        $this->writeHTMLCell($w = '', $h = '', $x = '', $y = '', $this->header, $border = 0, $ln = 0, $fill = 0, $reseth = true, $align = 'L', $autopadding = true);

        $this->SetLineStyle(array('color' => array(0, 0, 0)));

        $this->Line(5, 16, $this->getPageWidth() - 5, 16);
        $this->SetY(25);
    }

    // Page footer
    public function Footer() {
        $this->get_settings_data();

        // Set font
        $this->SetFont('aealarabiya', '', 5);
        // Page number
        $this->SetY(-6);

        $this->MultiCell(0, 50, $this->global_data['rest_adress'] , 0, 'C', 0, 0, 5, '', true, 0, false, true, 0);
        $this->SetY(-3);
        $this->MultiCell(0, 50, date("Y-m-d h:i:sa") , 0, 'C', 0, 0, 5, '', true, 0, false, true, 0);


        $this->writeHTMLCell($w = '', $h = '', $x = '', $y = '', $this->header, $border = 0, $ln = 0, $fill = 0, $reseth = true, $align = 'L', $autopadding = true);

        $this->SetLineStyle(array('color' => array(0, 0, 0)));
        $this->Line(5, $this->getPageHeight() - 7, $this->getPageWidth() - 5, $this->getPageHeight() - 7);
    }

}
