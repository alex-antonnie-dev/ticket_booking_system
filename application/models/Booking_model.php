<?php
class Booking_model extends CI_Model
{
    public function get_booking_history($param)
    {
        $show_id = $param['show_id']??'';

        if($show_id)
        {
            $this->db->where('show_id', $show_id);
            $query = $this->db->get('booking_history');
            return $query->result_array();
        }
    }
}