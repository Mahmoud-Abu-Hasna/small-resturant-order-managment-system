<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->load->model('Settings');
         if(!empty($this->session->userdata('user_type'))){
        if($this->session->userdata('user_type')){
            redirect(base_url().'Home');
        }else{
            redirect(base_url().'User');
        }
             
        }
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            
             $data['set']=  $this->Settings->getTableData(array(),null,null,null)[0];
		  $this->load->view('login',$data);
	}
}
