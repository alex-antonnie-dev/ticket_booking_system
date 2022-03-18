<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller
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
        $this->load->model(array('Booking_model'));
    }

    public function index()
    {
        $data = array();
        $data['title']      = 'Booking';

        $params = array();
        // $params['from_date']    = date('Y-m-d');
        // $params['to_date']      = date('Y-m-d');
        $data['bookings']       = $this->Booking_model->get_all_bookings($params);
        // echo '<pre>';print_r($data);die;
        $this->load->view('admin/booking', $data);
    }
}