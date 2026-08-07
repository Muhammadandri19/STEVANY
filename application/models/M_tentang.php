<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tentang extends CI_Model
{
    private $table = 'tentang_kami';

    // =========================
    // BACKEND
    // =========================

    public function get_all()
    {
        return $this->db
            ->order_by('tentang_id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('tentang_id', $id)
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
            ->where('tentang_id', $id)
            ->update(
                $this->table,
                $data
            );
    }

    public function delete($id)
    {
        return $this->db
            ->where('tentang_id', $id)
            ->delete($this->table);
    }

    // =========================
    // FRONTEND
    // =========================

    // Mengambil data Tentang terbaru
    public function get_tentang()
    {
        return $this->db
            ->order_by('tentang_id', 'DESC')
            ->limit(1)
            ->get($this->table)
            ->row();
    }

    // Alias apabila nanti diperlukan
    public function get_latest()
    {
        return $this->get_tentang();
    }

    // Mengecek apakah data Tentang tersedia
    public function cek_data()
    {
        return $this->db
            ->count_all_results($this->table);
    }

    // =========================
    // STATISTIK
    // =========================

    public function total_tentang()
    {
        return $this->db
            ->count_all($this->table);
    }
}
