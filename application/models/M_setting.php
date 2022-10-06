<?php
class M_setting extends CI_Model
{

    private $table_view;
    private $table_permission;
    public function __construct()
    {
        parent::__construct();
        $this->table_view = 'user_ncr.v_user_permission';
        $this->table_permission = 'user_ncr.user_permission';
    }
    public function checkRoleExist($nik)
    {
        $check = $this->db->get_where($this->table_permission, ['nik' => $nik]);
        if ($check->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function showEmployee()
    {
        $this->db->order_by('fullname', 'asc');
        return $this->db->get('v_employee_active')->result();
    }
    public function showRole()
    {
        $this->db->order_by('id_role', 'asc');
        return $this->db->get('user_ncr.role')->result_array();
    }

    public function showUserPermission()
    {
        $this->db->order_by('fullname', 'asc');
        return $this->db->get($this->table_view)->result();
    }

    public function getUserByNik($nik)
    {
        return $this->db->get_where($this->table_view, ['nik' => $nik])->row();
    }

    public function deleteUserPermission($nik)
    {
        $this->db->delete($this->table_permission, ['nik' => $nik]);
    }

    public function saveUser()
    {
        $nik  = $this->input->post('nik');
        $role  = $this->input->post('role');

        if ($this->checkRoleExist($nik)){
            echo json_encode(['statusExits' =>true,'msg'=>'Data allready exists']);
        }else{
            $data = array(
                'nik' => $nik,
                'role' => $role
            );
            $this->db->insert($this->table_permission, $data);
            echo json_encode(['statusExits'=>false,'msg'=>'Data have been added']);

        }

      
    }
    public function editUserPermission()
    {
        $nik       = $this->input->post('nik');
        $role      = $this->input->post('role');
        $data = array(
            'nik' => $nik,
            'role' => $role
        );
        $this->db->where('nik', $nik);
        $this->db->update($this->table_permission, $data);
        echo json_encode(['success'=>true,'msg'=>'Data have been updated']);
    }
}
