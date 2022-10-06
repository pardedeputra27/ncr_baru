
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_setting');
        if ($this->auth->is_has_session() == FALSE) {
            redirect(SSON_URL);
        }
    }

    private function check_user_setting()
    {
        $session        = $this->auth->get_session();
        $session_nik    = $session['user_profile']['nik'];
        $user_root      = $this->auth->user_root($session_nik);
        if ( $user_root){
            return TRUE ;
        }else{ 
            redirect('notpermitted');
        }

    }


    public function index()
    {
        $this->check_user_setting();
        $data['judul'] = 'Manage Setting';
        $this->template->load('_template/template_ncr', 'setting/index', $data);
    }
        public function index2()
    {
        $this->check_user_setting();
        $data['judul'] = 'Manage Setting';
        $this->template->load('_template/template_ncr', 'setting/index', $data);
    }

    public function showUserPermission()
    {
        $data['result'] = $this->M_setting->showUserPermission();
        $this->load->view('setting/data_user_permission', $data);
    }
    public function showRole()
    {
        $data['result'] = $this->M_setting->showRole();
        $this->load->view('setting/role',$data);
    }

    public function formAddUser()
    {
        $data['result'] = $this->M_setting->showEmployee();
        $this->load->view('setting/tambah',$data);
    }

    public function formEditUser()
    {
        $nik = $this->input->post('nik');
        $data['result'] = $this->M_setting->getUserByNik($nik);
        $this->load->view('setting/edit', $data);
    }
    public function formDeleteUser()
    {
        $nik = $this->input->post('nik');
        $data['result'] = $this->M_setting->getUserByNik($nik);
        $this->load->view('setting/hapus', $data);
    }

    public function saveUser()
    {
       $this->M_setting->saveUser();
    }

    public function editUserPermission()
    {
       
      $this->M_setting->editUserPermission();
    }
    public function deleteUserPermission()
    {
        $nik = $this->input->post('nik');
        $this->M_setting->deleteUserPermission($nik);
    }
    public function test()
    {
        $this->load->view('setting/test');
    }


}
