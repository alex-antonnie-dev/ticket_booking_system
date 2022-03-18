<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shows extends CI_Controller
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
        $this->load->model(array('Show_model','Booking_model'));
    }

    public function index()
    {
        $data = array();
        $data['title']      = 'Booking';

        $params = array();
        
        $shows       = $this->Show_model->get_all_shows($params);
        if(!empty($shows))
        {
            foreach($shows as $key => $show)
            {
                $shows[$key]['booked_count'] = $this->Booking_model->get_total_seats_booked(array('show_id' => $show['id']));
                $shows[$key]['seats_available'] = $show['seat_count'] - $shows[$key]['booked_count'];
            }
        }
        $data['shows'] = $shows;
        // echo '<pre>';print_r($data);die;
        $this->load->view('admin/shows', $data);
    }
}