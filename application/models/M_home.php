<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_home extends CI_Model
{

  function getUsers($postData)
  {

    $result = array();

    if (isset($postData['search'])) {
      // cara 1 
      // $this->db->select('*');
      // $this->db->limit(15);
      // $this->db->where("fullname like '%" . $postData['search'] . "%' ");
      // $records = $this->db->get('v_employee_active')->result();

      // cara 2
      $sql="SELECT * FROM v_employee_active_with_email WHERE fullname ILIKE '%" . $postData['search'] . "%' limit 15 ";    
      $records = $this->db->query($sql)->result();
      
      foreach ($records as $row) {
        $result[] = array(
          "label"       => $row->fullname,
          "nik"         => $row->nik,
          "dept_label"  => $row->dept_label,
          "dept_id"     =>$row->dept_id,
          "user_email"  => $row->user_email
        );
      }
    }

    return $result;
  }

  function countQc (){
    $query = $this->db->get('v_employee_qc_active');
    return $query->num_rows();
  }
  function countNCR (){
    $query = $this->db->get('ncr');
    return $query->num_rows();
  }

  function countUnread (){
    $this->db->where('status_ncr',FALSE);
    $query = $this->db->get('ncr');
    return $query->num_rows();
  }
    
  function countRead (){
    $this->db->where('status_ncr',TRUE);
    $query = $this->db->get('ncr');
    return $query->num_rows();
  }

  





}
