<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kontak extends CI_Model
{
    private $table = 'kontak';

    // =========================
    // BACKEND
    // =========================

    public function get_all()
    {
        return $this->db
            ->order_by('kontak_id', 'ASC')
            ->get($this->table)
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('kontak_id', $id)
            ->get($this->table)
            ->row();
    }

    public function insert($data)
    {
        return $this->db->insert(
            $this->table,
            $data
        );
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('kontak_id', $id)
            ->update(
                $this->table,
                $data
            );
    }

    public function delete($id)
    {
        return $this->db
            ->where('kontak_id', $id)
            ->delete($this->table);
    }

    // =========================
    // FRONTEND
    // =========================

    public function simpan_pesan($data)
    {
        return $this->insert($data);
    }

    public function total_pesan()
    {
        return $this->db->count_all($this->table);
    }

    public function total_belum_dibaca()
    {
        return $this->db
            ->where('status', 'belum_dibaca')
            ->count_all_results($this->table);
    }
}
