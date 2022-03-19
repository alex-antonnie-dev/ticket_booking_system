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
            $this->db->select('shows.*, screens.s_screen_name as screen_name, movies.name as movie_name');
            $this->db->from('shows');
            $this->db->join('screens', 'screens.id = shows.screen_id');
            $this->db->join('movies', 'movies.id = shows.movie_id');
            $this->db->where('shows.id', $id);
            $query = $this->db->get();
            return $query->row_array();
        }
        return [];
    }

    public function get_all_shows($params)
    {
        $this->db->select('shows.id, movies.name as movie_name, shows.show_name, shows.show_time, shows.seat_count, screens.s_screen_name as screen_name');
        $this->db->from('shows');
        $this->db->join('movies', 'movies.id = shows.movie_id');
        $this->db->join('screens', 'screens.id = shows.screen_id');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}