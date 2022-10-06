<?php
date_default_timezone_set('Asia/Jakarta');
class Ncr_and_car_model extends CI_Model
{

    public function checkboxRca()
    {
        return $this->db->get('rca')->result_array();
    }
    public function checkboxDisposition()
    {
        return $this->db->get('disposition')->result_array();
    }

    public function checkboxSca()
    {
        return $this->db->get('checkbox_sca')->result_array();
    }
    public function checkboxCaused()
    {
        return $this->db->get('pcaic_caused')->result_array();
    }

    public function getAllNcr()
    {
        $this->db->order_by('id_ncr', 'desc');
        return $this->db->get('ncr')->result_array();
    }
    public function getAllCar()
    {
        $this->db->order_by('id_car', 'desc');
        return $this->db->get('car')->result_array();
    }

    public function tambahDataNcr()
    {
        $data = [
            'nc_no'             => trim(strtoupper($this->input->post('nc_no', true))),
            'tgl'               => $this->input->post('tgl',true),
            'origator'          => $this->input->post('origator', true),
            'not_to'            => $this->input->post('not_to', true),
            'aun_rev'           => $this->input->post('aun_rev', true),
            'funct'             => $this->input->post('funct', true),
            'ref_doc'           => $this->input->post('ref_doc', true),
            'company'           => $this->input->post('company', true),
            'project'           => $this->input->post('project', true),
            'client'            => $this->input->post('client', true),
            'ncf_details'       => $this->input->post('ncf_details'),
            'nco_name'          => $this->input->post('nco_name', true),
            'nco_date'          => $this->input->post('nco_date', true)?$this->input->post('nco_date', true):null,
            'nco_designation'   => $this->input->post('nco_designation', true),
            'nco_signature'     => $this->input->post('nco_signature', true),
            'rca'               => implode(',', $this->input->post('rca', true)),
            'disposition'       => implode(',', $this->input->post('disposition', true)),
            'corr_act'          => $this->input->post('corr_act', true),
            'ncr_name'          => $this->input->post('ncr_name', true),
            'ncr_designation'   => $this->input->post('ncr_designation', true),
            'ncr_rec_date'      => $this->input->post('ncr_rec_date', true)?$this->input->post('ncr_rec_date', true):null,
            'ncr_signature'     => $this->input->post('ncr_signature', true),
            'fu_and_co_details' => $this->input->post('fu_and_co_details', true),
            'stf_action'        => $this->input->post('stf_action', true),
            'a_v_req'           => $this->input->post('a_v_req', true),
            'details_if_ver'    => $this->input->post('details_if_ver', true),
            'a_doc'             => $this->upload->data("file_name"),
            'pro_o_rec'         => $this->input->post('pro_o_rec', true),
            'ver_name'          => $this->input->post('ver_name', true),
            'ver_design'        => $this->input->post('ver_design', true),
            'ver_signature'     => $this->input->post('ver_signature', true),
            'ver_date'          => $this->input->post('ver_date', true)?$this->input->post('ver_date', true):null,
            'status_ncr'        => FALSE

        ];
        $this->db->insert('ncr', $data);
        $this->inputLogNcr();
    }
   
    public function getNcrByNoNc($nc_no)
    {
        return $this->db->get_where('ncr', ['nc_no' => $nc_no])->row_array();
    }
    public function getCarByCarNo($car_no)
    {
        return $this->db->get_where('car', ['car_no' => $car_no])->row_array();
    }

    public function inputLogNcr(){
        {
            $nc_no = trim(strtoupper($this->input->post('nc_no', true)));
            $data  = $this->getNcrByNoNc($nc_no);
            $data_log_ncr = [
                'id_ncr'            => $data['id_ncr'],
                'nc_no'             => $data['nc_no'],
                'from_nik'          => $this->session->userdata(SessionApp)['UserID'],
                'from_dept_id'      => $this->session->userdata(SessionApp)['DepartmentID'],
                'date'              => date('Y-m-d G:i:s'),
                'to_nik'            => $this->input->post('client_nik'),
                'to_dept_id'        => $this->input->post('client_dept_id'),
                'hostname'          => gethostname(),    
                'ip_addr'           => $this->input->ip_address(),
            ];
            $this->db->insert('ncr_logs', $data_log_ncr);
        }
        
    }


    public function tambahDataCar()
    {
        $data = [

            'car_no'            => $this->input->post('car_no', true),
            'open_date'         => $this->input->post('open_date', true),
            'ref_doc_no'        => $this->input->post('ref_doc_no', true),
            'open_by_dept'      => $this->input->post('open_by_dept', true),
            'act_to_dept'       => $this->input->post('act_to_dept', true),
            'sca'               => implode(',', $this->input->post('sca', true)),
            'sca_adt_find_no'   => $this->input->post('sca_adt_find_no', true),
            'sca_other'         => $this->input->post('sca_other', true),
            'problem_dnc'       => $this->input->post('problem_dnc', true),
            'obj_evid'          => $this->input->post('obj_evid', true),
            'ref_dnc'           => $this->input->post('ref_dnc', true),
            'name_dnc'          => $this->input->post('name_dnc', true),
            'sign_dnc'          => $this->input->post('sign_dnc', true)?$this->input->post('sign_dnc', true):null,
            'date_dnc'          => $this->input->post('date_dnc', true)?$this->input->post('date_dnc', true):null,
            'caused'            => implode(',', $this->input->post('caused', true)),
            'immerdiate_corr'   => $this->input->post('immerdiate_corr', true),
            'pcaimc_due_date'   => $this->input->post('pcaimc_due_date', true)?$this->input->post('pcaimc_due_date', true):null,
            'pcaimc_name'       => $this->input->post('pcaimc_name', true),
            'pcaimc_sign'       => $this->input->post('pcaimc_sign', true),
            'pcaimc_date'       => $this->input->post('pcaimc_date', true)?$this->input->post('pcaimc_date', true):null,
            'catpr_duedate'     => $this->input->post('catpr_duedate', true)?$this->input->post('catpr_duedate', true):null,
            'catpr_name'        => $this->input->post('catpr_name', true),
            'catpr_sign'        => $this->input->post('catpr_sign', true),
            'catpr_date'        => $this->input->post('catpr_date', true)?$this->input->post('catpr_date', true):null,
            'eca'               => $this->input->post('eca', true),
            'mcr'               => $this->input->post('mcr', true),
            'eca_car'           => $this->input->post('eca_car', true),
            'eca_moc_no'        => $this->input->post('eca_moc_no', true),
            'verified_by'       => $this->input->post('verified_by', true),
            'signature'         => $this->input->post('signature', true),
            'date_car'          => $this->input->post('date_car', true)?$this->input->post('date_car', true):null,
            'constumer'         => $this->input->post('constumer', true),
            'status'            => $this->input->post('status')

        ];
        $this->db->insert('car', $data);
        return true;
    }

    public function getNcrById($id)
    {
        $query = '  SELECT a.*,b.from_nik,b.from_name,b.from_dept  FROM ncr a
                    LEFT JOIN v_logs.v_ncr_from b ON a.id_ncr = b.id_ncr
                    WHERE a.id_ncr ='.$id;
        return $this->db->query($query)->row_array();
    }

    public function updateStatusNcr($id)
    {
        $this->dateUpdatedStatusNcr($id);
        $status = TRUE;
        $this->db->set('status_ncr', $status);
        $this->db->where('id_ncr', $id);
        $this->db->update('ncr');
    }

    public function dateUpdatedStatusNcr ($id){
        $data = [
            'id_ncr'            => $id,
            'updater_nik'       => $this->session->userdata(SessionApp)['UserID'],
            'date'              => date('Y-m-d G:i:s'),
            'hostname'          => gethostname(),    
            'ip_addr'           => $this->input->ip_address()
        ];
        $this->db->insert('date_updated_status_ncr',$data);
    }


    public function downloadNcrById($id)
    {
        return $this->db->get_where('ncr', ['id_ncr' => $id])->row();
    }

    public function getToEmailNcr($nc_no){
        $query_email =" SELECT  a.id_ncr,a.nc_no,b.to_nik,b.to_dept_id,c.dept_email AS to_dept_email,c.user_email  as to_user_email
                        FROM ncr a 
                        LEFT JOIN ncr_logs b ON a.id_ncr = b.id_ncr
                        LEFT JOIN v_employee_active_with_email c ON  c.nik = b.to_nik  WHERE a.nc_no = '".$nc_no."'" ;                
        return $this->db->query($query_email)->row_array();
    }
    public function getFromEmailNcr($nc_no){
        $query_email =" SELECT  a.id_ncr,a.nc_no,b.from_nik,b.from_dept_id,c.dept_email AS from_dept_email,c.user_email  as to_user_email
                        FROM ncr a 
                        LEFT JOIN ncr_logs b ON a.id_ncr = b.id_ncr
                        LEFT JOIN v_employee_active_with_email c ON  c.nik = b.from_nik  WHERE a.nc_no = '".$nc_no."'" ;                
        return $this->db->query($query_email)->row_array();
    }
    
    public function checkNcrStatus($id)
    {
       $check = $this->db->get_where('ncr', ['id_ncr' => $id])->row_array();
       if ($check['status_ncr'] == 't'){
            return TRUE ;
        }else{
            return FALSE;
        }
    }
    
    public function getNcrLogs(){
        $this->db->order_by('date','desc');
        return $this->db->get('v_logs.v_ncr_logs')->result_array();
      }

    public function _custom_query($mysql_query)
    {
        $query = $this->db->query($mysql_query);
        return $query;
    }




}
