<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function ceklogin($input = null)
    {
        $this->db->where('username', $input['user'])
            ->where('password', $input['pass']);

        return $this->db->get('user');
    }

}