<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('karyawan_m', 'karyawan');
    }
    
    public function index()
    {
        $head = array(
            'title' => 'Tampil Karyawan',
            'head' => 'Data Karyawan'
        );

        $data = array(
            'karyawan' => $this->karyawan->data_karyawan()->result()
        );

        $this->load->view('parsial/header', $head);
        $this->load->view('karyawan/tampil', $data);
        $this->load->view('parsial/footer');
    }

    public function tambah()
    {
        $head = array(
            'title' => 'Tambah',
            'head' => 'Tambah Data Karyawan'
        );

        $this->load->view('parsial/header', $head);
        $this->load->view('karyawan/tambah');
        $this->load->view('parsial/footer');
    }

    public function tambah_act()
    {
        if (isset($_POST['tambah']))
        {
            $input = $this->input->post();
            $tambah = $this->karyawan->tambah($input);

            if ($tambah)
            {
                $this->session->set_flashdata('success', 'Tambah Data Berhasil');
                redirect('karyawan/tambah');
            }
            else
            {
                $this->session->set_flashdata('error', 'Tambah Data Gagal');
                redirect('karyawan/tambah');
            }
        }
    }

    public function edit($id = null)
    {
        if (isset($id))
        {
            $data['data'] = $this->karyawan->karyawan_byid($id)->row();
            
            $head = array(
                'title' => 'Edit',
                'head' => 'Edit Data Karyawan'
            );

            $this->load->view('parsial/header', $head);
            $this->load->view('karyawan/edit', $data);
            $this->load->view('parsial/footer');
        }
    }

    public function edit_act()
    {
        if (isset($_POST['edit']))
        {
            $input = $this->input->post();
            $edit = $this->karyawan->edit($input);
            
            if ($input)
            {
                $this->session->set_flashdata('success', 'Edit Data Berhasil');
                redirect('karyawan/edit/'.$input['id']);
            }
            else
            {
                $this->session->set_flashdata('error', 'Edit Data Gagal');
                redirect('karyawan/edit/'.$input['id']);
            }
        }
    }

    public function hapus($id = null)
    {
        if (isset($id))
        {
            $hapus = $this->karyawan->hapus($id);

            if ($hapus)
            {
                $this->session->set_flashdata('success', 'Hapus Data Berhasil');
                redirect('karyawan');
            }
            else
            {
                $this->session->set_flashdata('error', 'Hapus Data Gagal');
                redirect('karyawan');
            }
        }
    }

}