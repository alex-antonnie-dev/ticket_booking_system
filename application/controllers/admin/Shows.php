<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shows extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('User_model', 'Show_model', 'Booking_model', 'Movie_model', 'Screen_model'));
    }

    public function index()
    {
        $data = array();
        $data['title']      = 'Booking';

        $params = array();
        
        $data['bookings']       = $this->Booking_model->get_all_bookings($params);
        $this->load->view('admin/booking', $data);
    }
}