<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{
    // ==========================
    // GET ALL
    // ==========================

    public function get_all()
    {
        return $this->db
            ->order_by('pengguna_id', 'DESC')
            ->get('pengguna')
            ->result();
    }

    // ==========================
    // GET BY ID
    // ==========================

    public function get_by_id($id)
    {
        return $this->db
            ->where('pengguna_id', $id)
            ->get('pengguna')
            ->row();
    }

    // ==========================
    // INSERT
    // ==========================

    public function insert($data)
    {
        return $this->db->insert('pengguna', $data);
    }

    // ==========================
    // UPDATE
    // ==========================

    public function update($id, $data)
    {
        $this->db->where('pengguna_id', $id);

        return $this->db->update('pengguna', $data);
    }

    // ==========================
    // DELETE
    // ==========================

    public function delete($id)
    {
        $this->db->where('pengguna_id', $id);

        return $this->db->delete('pengguna');
    }

    // ==========================
    // TOTAL PENGGUNA
    // ==========================

    public function count_data()
    {
        return $this->db->count_all('pengguna');
    }

    // ==========================
    // CEK USERNAME
    // ==========================

    public function cek_username($username)
    {
        return $this->db
            ->where('pengguna_username', $username)
            ->get('pengguna')
            ->num_rows();
    }

    // ==========================
    // CEK EMAIL
    // ==========================

    public function cek_email($email)
    {
        return $this->db
            ->where('pengguna_email', $email)
            ->get('pengguna')
            ->num_rows();
    }
}
