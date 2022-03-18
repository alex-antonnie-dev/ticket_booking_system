<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
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
        $this->load->model(array('User_model','Booking_model'));
    }

    public function index()
    {
        $data = array();
        $data['title']      = 'User';

        $params = array();

        $users       = $this->User_model->get_all_users($params);

        if(!empty($users))
        {
            foreach($users as $key => $user)
            {
                
                $users[$key]['booked_count']    = $shows[$key]['booked_count'] = $this->Booking_model->get_total_seats_booked(array('user_id' => $user['id']));
            }
        }
        $data['users'] = $users;
        // echo '<pre>';print_r($data);die;
        $this->load->view('admin/user', $data);
    }
}