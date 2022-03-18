<?php

class Show_model extends CI_Model
{
    public function get_todays_shows($param)
    {
        $count = $param['count']??'';

        $this->db->select('*');
        $this->db->from('shows');
        $this->db->where('Date(show_time)', date('Y-m-d'));
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        if($count)
        {
            return $query->num_rows();
        }
        else
        {
            return $query->result_array();
        }
    }

    public function get_show_details($params)
    {
        $id = $params['id']??'';
        if($id)
        {
            $this->db->select('*');
            $this->db->from('shows');
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->row_array();
        }
        return [];
    }
}