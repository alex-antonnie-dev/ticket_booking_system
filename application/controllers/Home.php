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
            $shows_list         = $this->Show_model->get_todays_shows();
            // $booking_history    = $this->Show_model->get_booking_history();
            $data['shows']      = $shows_list;
            
            $data['seats']      = range(1,10);
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
            $seats              = $this->input->post('seats')??'';
            // $seats              = explode(',', $seats);
            $user_id            = $this->session->userdata('user')['id'];
            $show_details       = $this->Show_model->get_show_details(array('id' => $show_id));
            $screen_id          = $show_details['screen_id'];
            // $booking_history    = $this->Booking_model->get_booking_history(array('show_id' => $show_id));
            // $booking_history    = array_column($booking_history, 'seats_booked');
            // echo '<pre>';print_r($booking_history);
            // $booking_history    = array_flip($booking_history);
            // $booking_history    = array_flip($booking_history);
            // $booking_history    = array_keys($booking_history);
            // $booking_history    = array_map('intval', $booking_history);
            // $booking_history    = array_unique($booking_history);
            // $booking_history    = array_values($booking_history);

            // $seats              = array_diff($seats, $booking_history);
            // $seats              = array_values($seats);
            // echo '<pre>';print_r($seats);
            // print_r($booking_history);die;
            if(!empty($seats))
            {
                $data = array(
                    'show_id'       => $show_id,
                    'user_id'       => $user_id,
                    'screen_id'    => $screen_id,
                    'seats_booked'  => implode(',', $seats),
                    'booked_date'   => date('Y-m-d H:i:s')
                );
                $this->db->insert('booking_history', $data);
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