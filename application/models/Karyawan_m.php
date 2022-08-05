<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_m extends CI_Model {

    public function tambah($input = null)
    {
        $field = array(
            'nama' => $input['nama'],
            'unit' => $input['unit']
        );

        return $this->db->insert('karyawan', $field);
    }

    public function data_karyawan()
    {
        $query = 'call tampilK()';
        return $this->db->query($query);
    }

    // log unit
    public function log_unit()
    {
        $query = 'call tampillog()';
        return $this->db->query($query);
    }

    public function karyawan_byid($id)
    {
        $this->db->where('id_karyawan', $id);

        return $this->db->get('karyawan');
    }

    public function edit($input)
    {
        $field = array(
            'nama' => $input['nama'],
            'unit' => $input['unit']
        );

        $this->db->where('id_karyawan', $input['id']);

        return $this->db->update('karyawan', $field);
    }

    public function hapus($id)
    {
        $this->db->where('id_karyawan', $id);

        return $this->db->delete('karyawan');
    }

}