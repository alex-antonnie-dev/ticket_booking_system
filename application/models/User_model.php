<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user($param)
    {
        $result = array();
        $email  = $param['email']?? '';
        if(!empty($email))
        {
            $this->db->where('email', $email);
            $query = $this->db->get('users');
            return $query->row_array();
        }
        return $result;
    }

    public function save($data)
    {
        $result = array();
        $id     = $data['id']?? '';
        if($id)
        {
            $this->db->where('id', $id);
            $this->db->update('users', $data);
            return true;
        }
        else
        {
            $this->db->insert('users', $data);
            return $this->db->affected_rows();
        }
    }

    public function get_all_users($params)
    {
        $this->db->select('id, name, email');
        $this->db->from('users');
        $this->db->where('users.role_type', '2');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}