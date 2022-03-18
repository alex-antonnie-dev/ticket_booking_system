<?php
class Booking_model extends CI_Model
{
    public function get_booking_history($param)
    {
        $show_id = $param['show_id']??'';
        if($show_id)
        {
            $this->db->where('show_id', $show_id);
        }
        $query = $this->db->get('booking_history');
        return $query->result_array();
    }

    public function get_all_bookings($params)
    {
        $this->db->select('booking_history.*, shows.show_name, shows.show_time, movies.name as movie_name, screens.s_screen_name as screen_name, users.name as user_name');
        $this->db->from('booking_history');
        $this->db->join('users', 'users.id = booking_history.user_id');
        $this->db->join('shows', 'shows.id = booking_history.show_id');
        $this->db->join('movies', 'movies.id = shows.movie_id');
        $this->db->join('screens', 'screens.id = shows.screen_id');
        if(isset($params['from_date']) && isset($params['to_date']))
        {
            $this->db->where('DATE(show_date) >=', $params['from_date']);
            $this->db->where('DATE(show_date) <=', $params['to_date']);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_total_seats_booked($param)
    {
        $show_id = $param['show_id']??'';
        $user_id = $param['user_id']??'';

        if($show_id || $user_id)
        {
            $this->db->select('sum(booked_count) as total_seats_booked');
            $this->db->from('booking_history');
            if($show_id)
            {
                $this->db->where('show_id', $show_id);
            }
            if($user_id)
            {
                $this->db->where('user_id', $user_id);
            }
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