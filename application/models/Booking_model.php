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
    
    public function get_total_seats_booked($param)
    {
        $show_id = $param['show_id']??'';

        if($show_id)
        {
            $this->db->select('sum(booked_count) as total_seats_booked');
            $this->db->from('booking_history');
            $this->db->where('show_id', $show_id);
            $row = $this->db->get()->row();
            if (isset($row)) {
                return $row->total_seats_booked;
            } else {
                return 0;
            }
        }
        return 0;
    }
}