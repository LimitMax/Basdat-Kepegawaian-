<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m', 'user');
    }
    
    public function index()
    {
        $this->load->view('parsial/login');
    }

    public function login()
    {
        if (isset($_POST['masuk']))
        {
            $input = $this->input->post();
            $ceklogin = $this->user->ceklogin($input)->num_rows();
            if ($ceklogin > 0)
            {
                redirect('home');
            }
            else
            {
                $this->session->set_flashdata('error', 'Login Gagal');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

}