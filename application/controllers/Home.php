<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller

{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_home');
		if ($this->auth->is_has_session() === FALSE) {
			redirect(SSON_URL);
		}
	}

	public function index()
	{
		
		$data['judul'] = 'NCR';
		$data['countQc']		=$this->M_home->countQc();
		$data['countNcr']		=$this->M_home->countNcr();
		$data['countUnread']	=$this->M_home->countUnread();
		$data['countRead']      =$this->M_home->countRead();
		$this->load->view('home/index', $data);
	}

	public function autocomplete(){
		$this->load->view('user_view');
	}
}
