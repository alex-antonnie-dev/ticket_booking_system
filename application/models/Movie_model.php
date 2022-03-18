<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie_model extends CI_Model
{
    public function get_movies_count($params)
    {
        $date = $params['date']??date('Y-m-d');
        $this->db->distinct();

        $this->db->select('movie_id');

        $this->db->where('Date(show_time) =',  $date); 

        $query = $this->db->get('shows');
        return $query->num_rows();
    }
}