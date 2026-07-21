<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_galeri extends CI_Model
{
    private $table = 'galeri_destinasi';

    // =========================
    // BACKEND
    // =========================

    public function get_all()
    {
        return $this->db
            ->select('galeri_destinasi.*, destinasi.destinasi_nama')
            ->from('galeri_destinasi')
            ->join(
                'destinasi',
                'destinasi.destinasi_id = galeri_destinasi.destinasi_id',
                'left'
            )
            ->order_by('galeri_destinasi.galeri_id', 'DESC')
            ->get()
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('galeri_id', $id)
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
            ->where('galeri_id', $id)
            ->update(
                $this->table,
                $data
            );
    }

    public function delete($id)
    {
        return $this->db
            ->where('galeri_id', $id)
            ->delete($this->table);
    }

    // =========================
    // FRONTEND
    // =========================

    public function get_all_frontend()
    {
        return $this->db
            ->select('galeri_destinasi.*, destinasi.destinasi_nama')
            ->from('galeri_destinasi')
            ->join(
                'destinasi',
                'destinasi.destinasi_id = galeri_destinasi.destinasi_id',
                'left'
            )
            ->order_by('galeri_destinasi.galeri_id', 'DESC')
            ->get()
            ->result();
    }

    public function get_limit($limit = 8)
    {
        return $this->db
            ->select('
            galeri_destinasi.*,
            destinasi.destinasi_id,
            destinasi.destinasi_nama,
            kategori_wisata.kategori_id,
            kategori_wisata.kategori_nama
        ')
            ->from('galeri_destinasi')
            ->join(
                'destinasi',
                'destinasi.destinasi_id = galeri_destinasi.destinasi_id',
                'left'
            )
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->order_by('galeri_destinasi.galeri_id', 'DESC')
            ->limit($limit)
            ->get()
            ->result();
    }

    public function get_detail($id)
    {
        return $this->db
            ->select('galeri_destinasi.*, destinasi.destinasi_nama')
            ->from('galeri_destinasi')
            ->join(
                'destinasi',
                'destinasi.destinasi_id = galeri_destinasi.destinasi_id',
                'left'
            )
            ->where('galeri_destinasi.galeri_id', $id)
            ->get()
            ->row();
    }

    public function get_by_destinasi($destinasi_id)
    {
        return $this->db
            ->select('galeri_destinasi.*, destinasi.destinasi_nama')
            ->from('galeri_destinasi')
            ->join(
                'destinasi',
                'destinasi.destinasi_id = galeri_destinasi.destinasi_id',
                'left'
            )
            ->where('galeri_destinasi.destinasi_id', $destinasi_id)
            ->order_by('galeri_destinasi.galeri_id', 'DESC')
            ->get()
            ->result();
    }

    public function get_latest()
    {
        return $this->db
            ->select('galeri_destinasi.*, destinasi.destinasi_nama')
            ->from('galeri_destinasi')
            ->join(
                'destinasi',
                'destinasi.destinasi_id = galeri_destinasi.destinasi_id',
                'left'
            )
            ->order_by('galeri_destinasi.galeri_id', 'DESC')
            ->limit(1)
            ->get()
            ->row();
    }

    public function total_galeri()
    {
        return $this->db
            ->count_all($this->table);
    }

    public function search($keyword)
    {
        return $this->db
            ->select('galeri_destinasi.*, destinasi.destinasi_nama')
            ->from('galeri_destinasi')
            ->join(
                'destinasi',
                'destinasi.destinasi_id = galeri_destinasi.destinasi_id',
                'left'
            )
            ->group_start()
            ->like('galeri_destinasi.judul_foto', $keyword)
            ->or_like('destinasi.destinasi_nama', $keyword)
            ->group_end()
            ->order_by('galeri_destinasi.galeri_id', 'DESC')
            ->get()
            ->result();
    }
}
