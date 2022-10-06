<?php
date_default_timezone_set('Asia/Jakarta');
class Entry_data_ncr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->auth->is_has_session() == FALSE) {
            redirect(SSON_URL);
        }
    }

    function _custom_query($mysql_query)
    {
        $query = $this->N_model->_custom_query($mysql_query);
        return $query;
    }
    private function check_qc()
    {
        $session        = $this->auth->get_session();
        $session_nik    = $session['user_profile']['nik'];
        $user_root      = $this->auth->user_root($session_nik);
        $user_qc_active = $this->auth->user_qc_active($session_nik);
        if ($user_root or $user_qc_active) {
            return TRUE;
        } else {
            redirect('notpermitted');
        }
    }

    public function index()
    {
        $this->check_qc();
        $data['ncr'] = $this->N_model->getAllNcr();
        $data['judul'] = 'NCR';
        $this->template->load('_template/template_ncr', 'ncr/index', $data);
    }

    public function viewNcr($id)
    {
        $this->check_qc();
        $data['ncr']     = $this->N_model->getNcrById($id);
        $data['judul']  = 'NCR';
        $this->template->load('_template/template_ncr', 'ncr/view_ncr', $data);
    }

    public function tambah()
    {
        $this->check_qc();
        $session        = $this->auth->get_session();
        $data['name']   =  $session['user_profile']['name'];
        $data['nik']    =  $session['user_profile']['nik'];
        $data['judul']  = 'Entry Data NCR';
        $data['rca']    = $this->N_model->checkboxRca();
        $data['disposition']  = $this->N_model->checkboxDisposition();

        $this->form_validation->set_rules('nc_no', 'NC Number', 'callback_nc_no_exist');


        if ($this->form_validation->run()) {
            $this->upload_nrc();
            $this->N_model->tambahDataNcr();
            $this->send_email_ncr();
            $this->session->set_flashdata('flash', 'Dikirimkan');
            redirect('entry_data_ncr/index');
        } else {
            $this->template->load('_template/template_ncr', 'ncr/mailbox_ncr', $data);
        }
    }


    public function upload_nrc()
    {
        $tgl = $this->input->post('tgl', true);
        $path = 'uploads/ncr/' . $tgl;

        if (!file_exists($path)) {
            mkdir('uploads/ncr/' . $tgl, 0777); // buat folder berdasarkan tgl
        };

        $config['upload_path']          = $path;
        $config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|doc|docs';
        $config['max_size']             = 2048;
        // $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('a_doc')) {
            return $this->upload->data();
        } else {
            return $this->upload->display_errors();
        }
    }
    public function downloadNcr($id)
    {
        $this->load->helper('download');
        $data = $this->N_model->downloadNcrById($id);
        force_download('uploads/ncr/' . $data->a_doc, NULL);
    }

    public function send_email_ncr()
    {
        $nc_no          = trim(strtoupper($this->input->post('nc_no', true)));
        $attach         = BaseURL . 'uploads/ncr/' . $this->input->post('tgl') . '/' . $this->upload->data("file_name");
        // $data_email     = $this->N_model->getToEmailNcr($nc_no);
        // $to             =$data_email['to_user_email'];
        // $cc             =$data_email['to_dept_email'];
        $data['ncr']    = $this->N_model->getNcrByNoNc($nc_no); //ini pesan
        $email_view     = $this->load->view('mail/view_email_ncr', $data, true);

        $email_config   = $this->config->item('email_config');
        $this->load->library('email', $email_config);
        $this->email->set_mailtype("html");
        $this->email->from('noreply-system@cte.co.id', 'Coba Email');
        $this->email->to('akunputra5533@gmail.com');
        $this->email->cc('putra.pardede@cte.co.id');
        // ini juga nanti
        // $this->email->to($to);
        // $this->email->cc($cc);
        if ($this->upload->data("file_name") != null) {
            $this->email->attach($attach);
        }
        $this->email->subject('Non Conformity Report');
        $this->email->message($email_view);
        $this->email->send();
    }


    public function nc_no_exist($str) //callback_nc_no_exist
    {
        $input = strtoupper($str);
        $query = $this->_custom_query("SELECT nc_no FROM ncr WHERE nc_no = '$input'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('nc_no_exist', 'The {field} is exist');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function showLogs()
    {
        $data['ncr_logs'] = $this->N_model->getNcrLogs();
        $this->load->view('ncr/ncr_logs', $data);
    }

    public function send()
    {
        $this->send_email_ncr();
        echo 'berhasil';
    }
}
