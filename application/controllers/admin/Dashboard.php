<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('user');
        if(!empty($user) && isset($user['id']))
        {
            if($user['role'] == '2')
            {
                redirect('home');exit;
            }
        }
        else
        {
            redirect('login');exit;
        }
        $this->load->model(array('User_model','Show_model','Booking_model','Movie_model', 'Screen_model'));
    }
    public function index()
    {
        $shows = $this->Show_model->get_todays_shows(array());
        $total_seats_booked     = 0;
        if(!empty($shows))
        {
            foreach($shows as $key => $show)
            {
                // $booking_history = $this->Booking_model->get_booking_history(array('show_id' => $show['id']));
                // if(!empty($booking_history))
                // {

                // }
                $shows[$key]['seats_booked_count'] = $this->Booking_model->get_total_seats_booked(array('show_id' => $show['id']));
                $total_seats_booked += $shows[$key]['seats_booked_count'];
            }
        }
        $data['title'] = 'Dashboard';
        $data['shows'] = $shows;

        $total_shows            = count($shows);
        $total_movies           = $this->Movie_model->get_movies_count(array());
        
        
        $total_screens          = $this->Screen_model->get_screens_count(array());
        
        $data['total_shows']        = $total_shows;
        $data['total_movies']       = $total_movies;
        $data['total_seats_booked'] = $total_seats_booked;
        $data['total_screens']      = $total_screens;
        // echo '<pre>';print_r($data);die;
        $this->load->view('admin/dashboard', $data);
    }
}
?>