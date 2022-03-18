<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('User_model','Show_model','Booking_model'));
    }
    public function index()
    {
        $shows = $this->Show_model->get_todays_shows();
        if(!empty($shows))
        {
            foreach($shows as $key => $show)
            {
                // $booking_history = $this->Booking_model->get_booking_history(array('show_id' => $show['id']));
                // if(!empty($booking_history))
                // {

                // }
                $shows[$key]['seats_booked_count'] = $this->Booking_model->get_total_seats_booked(array('show_id' => $show['id']));
            }
        }
        $data['title'] = 'Dashboard';
        $data['shows'] = $shows;
        // echo '<pre>';print_r($data);die;
        $this->load->view('admin/dashboard', $data);
    }
}
?>