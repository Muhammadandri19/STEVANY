<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model
{
    public function cek_login($username, $password)
    {
        return $this->db
            ->where('pengguna_username', $username)
            ->where('pengguna_password', md5($password))
            ->where('pengguna_status', 'aktif')
            ->get('pengguna');
    }
}