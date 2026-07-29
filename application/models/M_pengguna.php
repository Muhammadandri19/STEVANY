<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{

    private $table = 'pengguna';


    // ==========================
    // AMBIL ADMIN
    // ==========================

    public function get_admin()
    {
        return $this->db
            ->where('pengguna_level', 'admin')
            ->where('pengguna_status', 'aktif')
            ->get($this->table)
            ->row();
    }



    // ==========================
    // GET ALL
    // ==========================

    public function get_all()
    {
        return $this->db
            ->order_by('pengguna_id', 'DESC')
            ->get($this->table)
            ->result();
    }



    // ==========================
    // GET BY ID
    // ==========================

    public function get_by_id($id)
    {
        return $this->db
            ->where('pengguna_id', $id)
            ->get($this->table)
            ->row();
    }



    // ==========================
    // LOGIN ADMIN
    // ==========================

    public function login($username, $password)
    {
        return $this->db
            ->where('pengguna_username', $username)
            ->where('pengguna_password', md5($password))
            ->where('pengguna_status', 'aktif')
            ->get($this->table)
            ->row();
    }



    // ==========================
    // UPDATE ADMIN
    // ==========================

    public function update($id, $data)
    {
        return $this->db
            ->where('pengguna_id', $id)
            ->update($this->table, $data);
    }



    // ==========================
    // CEK USERNAME DUPLIKAT
    // ==========================

    public function cek_username($username, $id = null)
    {
        $this->db
            ->where('pengguna_username', $username);

        if ($id != null) {

            $this->db->where(
                'pengguna_id !=',
                $id
            );
        }

        return $this->db
            ->get($this->table)
            ->num_rows();
    }



    // ==========================
    // CEK EMAIL DUPLIKAT
    // ==========================

    public function cek_email($email, $id = null)
    {
        $this->db
            ->where('pengguna_email', $email);


        if ($id != null) {

            $this->db->where(
                'pengguna_id !=',
                $id
            );
        }


        return $this->db
            ->get($this->table)
            ->num_rows();
    }



    // ==========================
    // JUMLAH ADMIN
    // ==========================

    public function count_data()
    {
        return $this->db
            ->count_all($this->table);
    }



    // ==========================
    // HAPUS
    // ==========================

    public function delete($id)
    {
        return $this->db
            ->where('pengguna_id', $id)
            ->delete($this->table);
    }
}
