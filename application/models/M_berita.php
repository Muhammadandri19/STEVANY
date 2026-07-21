<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{
    private $table = 'berita';

    // =========================
    // BACKEND
    // =========================

    public function get_all()
    {
        return $this->db
            ->select('berita.*, pengguna.pengguna_nama')
            ->from('berita')
            ->join(
                'pengguna',
                'pengguna.pengguna_id = berita.pengguna_id',
                'left'
            )
            ->order_by('berita.berita_id', 'DESC')
            ->get()
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('berita_id', $id)
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
            ->where('berita_id', $id)
            ->update(
                $this->table,
                $data
            );
    }

    public function delete($id)
    {
        return $this->db
            ->where('berita_id', $id)
            ->delete($this->table);
    }

    // =========================
    // FRONTEND
    // =========================

    public function get_limit($limit = 3)
    {
        return $this->db
            ->select('berita.*, pengguna.pengguna_nama')
            ->from('berita')
            ->join(
                'pengguna',
                'pengguna.pengguna_id = berita.pengguna_id',
                'left'
            )
            ->order_by('berita.berita_id', 'DESC')
            ->limit($limit)
            ->get()
            ->result();
    }

    public function get_all_berita()
    {
        return $this->db
            ->select('berita.*, pengguna.pengguna_nama')
            ->from('berita')
            ->join(
                'pengguna',
                'pengguna.pengguna_id = berita.pengguna_id',
                'left'
            )
            ->order_by('berita.berita_id', 'DESC')
            ->get()
            ->result();
    }

    public function get_detail($id)
    {
        return $this->db
            ->select('berita.*, pengguna.pengguna_nama')
            ->from('berita')
            ->join(
                'pengguna',
                'pengguna.pengguna_id = berita.pengguna_id',
                'left'
            )
            ->where('berita.berita_id', $id)
            ->get()
            ->row();
    }

    public function get_related($id, $limit = 3)
    {
        return $this->db
            ->select('berita.*, pengguna.pengguna_nama')
            ->from('berita')
            ->join(
                'pengguna',
                'pengguna.pengguna_id = berita.pengguna_id',
                'left'
            )
            ->where('berita.berita_id !=', $id)
            ->order_by('berita.berita_id', 'DESC')
            ->limit($limit)
            ->get()
            ->result();
    }

    public function get_latest()
    {
        return $this->db
            ->order_by('berita_id', 'DESC')
            ->limit(1)
            ->get($this->table)
            ->row();
    }

    public function total_berita()
    {
        return $this->db
            ->count_all_results($this->table);
    }

    public function search($keyword)
    {
        return $this->db
            ->select('berita.*, pengguna.pengguna_nama')
            ->from('berita')
            ->join(
                'pengguna',
                'pengguna.pengguna_id = berita.pengguna_id',
                'left'
            )
            ->like('berita.judul', $keyword)
            ->or_like('berita.isi', $keyword)
            ->order_by('berita.berita_id', 'DESC')
            ->get()
            ->result();
    }


    public function get_by_slug($slug)
    {
        return $this->db
            ->select('berita.*, pengguna.pengguna_nama')
            ->from('berita')
            ->join(
                'pengguna',
                'pengguna.pengguna_id = berita.pengguna_id',
                'left'
            )
            ->where('berita.slug', $slug)
            ->get()
            ->row();
    }

    public function get_related_slug($id, $limit = 5)
    {
        return $this->db
            ->select('berita.*, pengguna.pengguna_nama')
            ->from('berita')
            ->join(
                'pengguna',
                'pengguna.pengguna_id = berita.pengguna_id',
                'left'
            )
            ->where('berita.berita_id !=', $id)
            ->order_by('berita.created_at', 'DESC')
            ->limit($limit)
            ->get()
            ->result();
    }
}
