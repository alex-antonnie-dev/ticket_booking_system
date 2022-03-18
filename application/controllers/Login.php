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
        if($this->input->post('fname'))
        {
            $name       = $this->input->post('fname')??'';
            $email      = $this->input->post('email')??'';
            $password   = $this->input->post('password')??'';
    
            $this->form_validation->set_rules('fname', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
    
            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('register');
            }
            else
            {
                $data = array(
                    'name'      => $name,
                    'email'     => $email,
                    'password'  => password_hash($password, PASSWORD_DEFAULT),
                    'role_type' => '2'
                );
    
                $this->User_model->save($data);
                $this->session->set_flashdata('success', 'Register success');
                redirect('login');
            }
        }
        else
        {
            $this->load->view('register');
        }
    }
}