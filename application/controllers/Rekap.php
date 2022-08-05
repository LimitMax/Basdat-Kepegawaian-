<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf_report');
        $this->load->model('absensi_m', 'absensi');
    }

    public function index()
    {
        $head = array(
            'title' => 'Rekap',
            'head' => 'Rekap Data Absensi'
        );

        $this->load->view('parsial/header', $head);
        $this->load->view('rekap/form');
        
        if (isset($_POST['tampil']))
        {
            $filter = array(
                'dari' => $this->input->post('dari'),
                'sampai' => $this->input->post('sampai')
            );

            $data = array(
                'rekap' => $this->absensi->rekap($filter),
                'dari' => $this->input->post('dari'),
                'sampai' => $this->input->post('sampai'),
            );

            $this->load->view('rekap/tampil', $data);
        }

        $this->load->view('parsial/footer');
    }

    public function cetak()
    {
        if (isset($_POST['cetak']))
        {
            $filter = array(
                'dari' => $this->input->post('dari'),
                'sampai' => $this->input->post('sampai')
            );

            $data = array(
                'rekap' => $this->absensi->rekap($filter),
                'dari' => $this->input->post('dari'),
                'sampai' => $this->input->post('sampai'),
            );

            $this->load->view('rekap/cetak', $data);
        }
    }

}