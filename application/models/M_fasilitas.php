<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_fasilitas extends CI_Model
{
    protected $table = 'fasilitas';

    // =====================================================
    // GET ALL
    // =====================================================

    public function get_all()
    {
        return $this->db
            ->select('
                fasilitas.*,
                destinasi.destinasi_nama
            ')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = fasilitas.destinasi_id',
                'left'
            )
            ->order_by('destinasi.destinasi_nama', 'ASC')
            ->order_by('fasilitas.nama_fasilitas', 'ASC')
            ->get()
            ->result();
    }

    // =====================================================
    // GET BY ID
    // =====================================================

    public function get_by_id($id)
    {
        return $this->db
            ->where('fasilitas_id', $id)
            ->get($this->table)
            ->row();
    }

    // =====================================================
    // GET BERDASARKAN DESTINASI
    // =====================================================

    public function get_by_destinasi($destinasi_id)
    {
        return $this->db
            ->where('destinasi_id', $destinasi_id)
            ->where('status', 'aktif')
            ->order_by('nama_fasilitas', 'ASC')
            ->get($this->table)
            ->result();
    }

    // =====================================================
    // TOTAL FASILITAS DESTINASI
    // =====================================================

    public function count_by_destinasi($destinasi_id)
    {
        return $this->db
            ->where('destinasi_id', $destinasi_id)
            ->where('status', 'aktif')
            ->count_all_results($this->table);
    }

    // =====================================================
    // INSERT
    // =====================================================

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // =====================================================
    // UPDATE
    // =====================================================

    public function update($id, $data)
    {
        return $this->db
            ->where('fasilitas_id', $id)
            ->update($this->table, $data);
    }

    // =====================================================
    // DELETE
    // =====================================================

    public function delete($id)
    {
        return $this->db
            ->where('fasilitas_id', $id)
            ->delete($this->table);
    }

    // =====================================================
    // TOTAL DATA
    // =====================================================

    public function count_data()
    {
        return $this->db->count_all($this->table);
    }
}
