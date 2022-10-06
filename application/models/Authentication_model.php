<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function is_has_session()
    {
        return $this->session->has_userdata(SessionApp);
    }
    public function get_session()
    {
        $server_session = $this->session->userdata(SessionApp);

        $session['user_profile'] = array(
            'name'              => $server_session['Name'],
            'nik'               => $server_session['UserID'],
            'department_id'     => $server_session['DepartmentID'],
            'department_label'  => $server_session['DepartmentLabel'],
            'department_code'   => $server_session['DepartmentCode'],
            'position_label'    => $server_session['OccupationCode'],
            'position_code'     => $server_session['OccupationLabel']
        );
        return $session;
    }

    public function user_root($session_nik)
    {
       $check = $this->db->get_where('user_ncr.user_permission', ['nik' => $session_nik,'role' =>77]);
       if ($check->num_rows() >0){
            return TRUE ;
       }else{
            return FALSE;
       }
    }
    public function user_qc_active ($session_nik)
    {
        $check = $this->db->get_where('v_employee_qc_active', ['nik' => $session_nik]);
        if ($check->num_rows() >0){
            return TRUE ;
        }else{
            return FALSE;
        }
    }

}
