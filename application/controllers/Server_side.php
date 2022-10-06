<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Server_side extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_server_side','ss');
        if ($this->auth->is_has_session() ==FALSE) {
            redirect(SSON_URL);
        }
    }


    public function index(){
        $data['judul']  = 'Percobaan serverside';
        $data['ncr']    = $this->N_model->getAllNcr();
        $this->template->load('_template/template_ncr', 'serverside', $data);
    }
    //method yang digunakan untuk request data ncr
    public function ajax_list_ncr()
    {

        $list = $this->ss->get_datatables();
        //looping data ncr
        foreach ($list as $data_ncr) {
            $formatDay =strtotime($data_ncr->tgl);
            $nanti ='<input type="checkbox" id="id_ncr" value="'.$data_ncr->id_ncr.'"/>';
            $row = array();
            $row[] ='';
            $row[] = $data_ncr->nc_no;
            $row[] = $data_ncr->origator;
            $row[] = date("d  M  Y", $formatDay);
            $row[] = '<u> <a href="'.base_url().'Reports/export_report?doc_format=pdf&id_ncr='.$data_ncr->id_ncr.'&report_type=ncr">'.$data_ncr->nc_no.'</a></u>';
            if ($data_ncr->status_ncr =='f') {
                $row[] = '<span class="blink1 badge badge-pill badge-warning"> Open </span>';
            }else{
                $row[]='<span class="badge badge-pill badge-danger">Close</span>';
            }
            $data[] = $row; 
        }
        $output = array(
            "draw" => $this->input->post('draw', true),
            "recordsTotal" => $this->ss->count_all_ncr(),
            "recordsFiltered" => $this->ss->count_filtered_ncr(),
            "data" => $data,
        );
        //output to json format
        // $this->output->set_output(json_encode($output));
        echo json_encode($output);
    }
}
