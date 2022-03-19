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
            $this->load->model(array('User_model','Show_model','Booking_model'));
        }
    
        public function index()
        {
            $data['title']      = 'Home';
            $shows_list         = $this->Show_model->get_todays_shows(array());
            echo $this->db->last_query();
            print_r($shows_list);
            // $booking_history    = $this->Show_model->get_booking_history();
            $data['shows']      = $shows_list;
            
            $data['seats']      = range(1,10);
            echo '<pre>';print_r($data);die;
            $this->load->view('home', $data);
        }

        public function get_booking_history()
        {
            $response           = array();
            $response['status'] = 'success';
            $show_id            = $this->input->post('show_id')??'';

            $booking_history    = $this->Booking_model->get_booking_history(array('show_id' => $show_id));
            $response['data']   = $booking_history;
            echo json_encode($response);
            exit;
        }

        public function save_booking()
        {
            
            $response           = array();
            $response['status'] = 'success';
            $show_id            = $this->input->post('show_id')??'';
            $show_id            = preg_match('/^[0-9]+$/', $show_id)?$show_id:'';
            $seats              = $this->input->post('seats')??'';
            
            $user_id            = $this->session->userdata('user')['id'];
            $show_details       = $this->Show_model->get_show_details(array('id' => $show_id));
            
            if(!$show_id)
            {
                $response['status'] = 'error';
                $response['message'] = 'Something went wrong! Please try again.';
                echo json_encode($response);
                exit;
            }
            
            if(!empty($seats) && !empty($show_details))
            {
                $screen_id          = $show_details['screen_id'];
                $data = array(
                    'show_id'       => $show_id,
                    'user_id'       => $user_id,
                    'screen_id'    => $screen_id,
                    'seats_booked'  => implode(',', $seats),
                    'booked_count'  => count($seats),
                    'booked_date'   => date('Y-m-d H:i:s')
                );
                $this->db->insert('booking_history', $data);
                $response['message'] = count($seats) > 1 ? count($seats).' seats booked successfully' : count($seats).' seat booked successfully';
            }
            else
            {
                $response['status'] = 'error';
                $response['message'] = 'No seats available';
            }
            echo json_encode($response);
            exit;
        }
}