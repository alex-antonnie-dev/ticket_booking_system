<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // echo '<pre>';print_r($_POST);die;
        if($this->input->post('email'))
        {
            $email      = $this->input->post('email')??'';
            $password   = $this->input->post('password')??'';

            $user = $this->User_model->get_user(array('email' => $email));
            
            if(!empty($user))
            {
                $data_session = array(
                    'id'        => $user['id'],
                    'nama'      => $user['name'],
                    'email'     => $user['email'],
                    'role'      => $user['role_type'],
                    'status'    => "login"
                );

                if(password_verify($password, $user['password']))
                {
                    $this->session->set_userdata(array('user' => $data_session));
                    if($user['role_type'] == '1')
                    {
                        
                        redirect('admin');exit;
                    }
                    else
                    {
                        redirect('home');exit;
                    }
                    
                }
                else
                {
                    $this->session->set_flashdata('error', 'Invalid email or password');
                    redirect('login');exit;
                }
            }
            else
            {
                $this->load->view('login');
            }
        }
        else
        {
            $this->load->view('login');
        }
    }

    public function check_login()
    {
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    public function register()
    {
        $this->load->view('register');
    }
}