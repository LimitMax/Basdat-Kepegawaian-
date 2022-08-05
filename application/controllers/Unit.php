<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       $this->load->model('karyawan_m', 'karyawan');
    }

    public function index()
    {
        $head = array(
            'title' => 'Hasil Trigger Karyawan',
            'head' => 'Data Ganti Unit Karyawan'
        );

        $data = array(
            'karyawan' => $this->karyawan->log_unit()->result()
        );

        $this->load->view('parsial/header', $head);
        $this->load->view('unit/tampil', $data);
        $this->load->view('parsial/footer');
    }

}