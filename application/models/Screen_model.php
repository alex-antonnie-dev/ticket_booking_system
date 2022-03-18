<?php

class Screen_model extends CI_Model
{
    public function get_screens_count($param)
    {
        $date = $param['date']??date('Y-m-d');
        $this->db->distinct();

        $this->db->select('screen_id');

        $this->db->where('Date(show_time) =',  $date); 

        $query = $this->db->get('shows');
        return $query->num_rows();
    }
}