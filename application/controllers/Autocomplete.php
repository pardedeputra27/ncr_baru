
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autocomplete extends CI_Controller
{

  public function __construct()
  {

    parent::__construct();
    // Load model
    $this->load->model('M_home');
  }

  public function index()
  {
    // load view
    $this->load->view('user_view');
  }

  public function userList() 
  {
    // POST data
    $postData = $this->input->post();

    // Get data
    $data = $this->M_home->getUsers($postData);

    echo json_encode($data);
  }
}
