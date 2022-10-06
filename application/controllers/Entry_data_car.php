<?php

class Entry_data_car extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data['judul']  = 'CAR';
        $data['ncr']    = $this->N_model->getAllNcr();
        $this->template->load('_template/template_ncr', 'car/index', $data);
    }

    public function tambah($id)
    {

        $this->check_ncr_status($id);
        $data['judul']          = 'Entry Data Car';
        $data['c_sca']          = $this->N_model->checkboxSca();
        $data['pcaic_caused']   = $this->N_model->checkboxCaused();
        $data['ncr']            = $this->N_model->getNcrById($id);
        $data['session']        = $this->auth->get_session()['user_profile'];
       

        $this->form_validation->set_rules('car_no', 'NC Number', 'required');
        $this->form_validation->set_rules('open_date', 'Date', 'required');
        

        if ($this->form_validation->run()) {
            if($this->N_model->tambahDataCar()==true){
                $this->send_email_car();//send email
                $this->N_model->updateStatusNcr($id);
                $this->session->set_flashdata('flash', 'Dikirimkan');
                $this->session->set_flashdata('status', 'CLOSE');
                redirect('entry_data_car');
            }else{
                return false;
            }

           
        }else{
            $this->template->load('_template/template_ncr', 'car/mailbox_car', $data);
        }
    }


   

    public function check_ncr_status ($id){
        $status_closed = $this->N_model->checkNcrStatus($id);
        if($status_closed ){
            $this->session->set_flashdata('status', 'CLOSE');
            redirect('entry_data_car');
        }
    }


    public function send_email_car()
    {
        $car_no          = trim(strtoupper($this->input->post('car_no', true)));

        //gunakan nanti// $data_email     = $this->N_model->getFromEmailNcr($car_no);// $to   $data_email['to_user_email'];// $cc =$data_email['to_dept_email'];

        $data['car']    = $this->N_model->getCarByCarNo($car_no);//ini pesan
        $data['nama']   = 'baluhap';
        $email_view     = $this->load->view('mail/view_email_car', $data, true);

        $email_config   = $this->config->item('email_config');
        $this->load->library('email', $email_config);
        $this->email->set_mailtype("html");
        $this->email->from('noreply-system@cte.co.id', 'COBA-COBA');
        $this->email->to('akunputra5533@gmail.com');
        $this->email->cc('putra.pardede@cte.co.id');
        // ini juga nanti// $this->email->to($to);// $this->email->cc($cc);
        $this->email->subject('CORRECTIVE ACTION REQUEST');
        $this->email->message($email_view);
        $this->email->send();
    }


}
