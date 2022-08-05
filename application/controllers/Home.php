<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('parsial/header');
        $this->load->view('parsial/home');
        $this->load->view('parsial/header');
    }

}