<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_m extends CI_Model {

    public function karyawan()
    {
        return $this->db->get('karyawan');            
    }

    // log unit
    public function log_unit()
    {
        return $this->db->get('log_unit');            
    }

    public function cek_absen($data)
    {
        $this->db->where('tanggal', $data['tanggal'])
            ->where('waktu', $data['waktu'])
            ->where('id_karyawan', $data['id']);
        
        return $this->db->get('absensi');
    }

    public function update($data)
    {
        $field['ket'] = $data['ket'];
        
        $this->db->where('id_karyawan', $data['id'])
            ->where('tanggal', $data['tanggal'])
            ->where('waktu', $data['waktu']);
        
        return $this->db->update('absensi', $field);
    }

    public function insert($data)
    {
        $field = array(
            'id_karyawan' => $data['id'],
            'tanggal' => $data['tanggal'],
            'waktu' => $data['waktu'],
            'ket' => $data['ket']
        );  

        return $this->db->insert('absensi', $field);
    }

    public function rekap($data)
    {
        return $this->db->query("SELECT DISTINCT nama,
            (SELECT COUNT(b.ket) FROM absensi b WHERE ket = 'H' AND b.id_karyawan = a.id_karyawan AND tanggal BETWEEN '".$data['dari']."' AND '".$data['sampai']."') as H ,
            (SELECT COUNT(b.ket) FROM absensi b WHERE ket = 'I' AND b.id_karyawan = a.id_karyawan AND tanggal BETWEEN '".$data['dari']."' AND '".$data['sampai']."') as I,
            (SELECT COUNT(b.ket) FROM absensi b WHERE ket = 'A' AND b.id_karyawan = a.id_karyawan AND tanggal BETWEEN '".$data['dari']."' AND '".$data['sampai']."') as A
        FROM absensi a JOIN karyawan USING(id_karyawan)");
    }

}