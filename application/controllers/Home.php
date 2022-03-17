<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
        
        public function __construct()
        {
            parent::__construct();
            $user = $this->session->userdata('user');
            if(!empty($user) && isset($user['id']))
            {
                if($user['role'] == '1')
                {
                    redirect('admin');exit;
                }
            }
            else
            {
                redirect('login');exit;
            }
            $this->load->model('User_model');
        }
    
        public function index()
        {
            $data['title'] = 'Home';
            // $data['tiket'] = $this->Home_model->get_tiket();
            $this->load->view('home', $data);
        }
}