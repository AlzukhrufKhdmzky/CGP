<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
  public function inserData($data)
  {
    $this->db->insert('user', $data);
  }

  public function sumDataByRoleId($role_id)
  {
    $this->db->where('role_id', $role_id);
    $this->db->from('user');
    return $this->db->count_all_results();
  }
}
