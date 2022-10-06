<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
   
    //catatan  
    //cara memangginya di crontroller $this->render('ncr/mailbox_ncr');
     protected function render($page='index', $data = NULL)
     {
        
         $this->load->view('templates/head');
         $this->load->view('templates/nav_sidebar');
         $this->load->view($page, $data);
         $this->load->view('templates/footer');
     }

}