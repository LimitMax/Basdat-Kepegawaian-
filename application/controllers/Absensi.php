<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('absensi_m', 'absensi');
    }

    public function index()
    {
        $head = array(
            'title' => 'Absensi',
            'head' => 'Data Absensi Karyawan',
        );

        $data['karyawan'] = $this->absensi->karyawan()->result();

        $this->load->view('parsial/header', $head);
        $this->load->view('absensi/absen', $data);
        $this->load->view('parsial/header');
    }

    public function absen_act()
    {
        if (isset($_POST['submit']))
        {
            $jumlah = count($_POST['id']);
            $input = $this->input->post();

            for ($i = 1; $i <= $jumlah; $i++) { 
                $data = array(
                    'id' => $input['id'][$i-1],
                    'tanggal' => $input['tanggal'],
                    'waktu' => $input['waktu'],
                    'ket' => $input['ket'.$i]
                );

                if ($this->absensi->cek_absen($data)->num_rows() > 0)
                {
                    $this->absensi->update($data);
                }
                else
                {
                    $this->absensi->insert($data);
                }
            }
            $this->session->set_flashdata('success', 'Input Data Absen Berhasil');
            redirect('absensi');
        }
    }

}