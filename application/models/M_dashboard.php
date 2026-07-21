<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    // ==========================
    // USER
    // ==========================

    public function get_user_by_id($id)
    {
        return $this->db
            ->where('pengguna_id', $id)
            ->get('pengguna')
            ->row();
    }

    // ==========================
    // COUNT DASHBOARD
    // ==========================

    public function count_pengguna()
    {
        return $this->db->count_all('pengguna');
    }

    public function count_destinasi()
    {
        if (!$this->db->table_exists('destinasi')) {
            return 0;
        }

        return $this->db->count_all('destinasi');
    }

    public function count_hotel()
    {
        if (!$this->db->table_exists('hotel')) {
            return 0;
        }

        return $this->db->count_all('hotel');
    }

    public function count_berita()
    {
        if (!$this->db->table_exists('berita')) {
            return 0;
        }

        return $this->db->count_all('berita');
    }

    public function count_kategori()
    {
        if (!$this->db->table_exists('kategori_wisata')) {
            return 0;
        }

        return $this->db->count_all('kategori_wisata');
    }

    public function count_galeri()
    {
        if (!$this->db->table_exists('galeri_destinasi')) {
            return 0;
        }

        return $this->db->count_all('galeri_destinasi');
    }

    public function count_kontak()
    {
        if (!$this->db->table_exists('kontak')) {
            return 0;
        }

        return $this->db->count_all('kontak');
    }

    // ==========================
    // DATA TERBARU
    // ==========================

    public function destinasi_terbaru($limit = 5)
    {
        if (!$this->db->table_exists('destinasi')) {
            return [];
        }

        return $this->db
            ->order_by('destinasi_id', 'DESC')
            ->limit($limit)
            ->get('destinasi')
            ->result();
    }

    public function berita_terbaru($limit = 5)
    {
        if (!$this->db->table_exists('berita')) {
            return [];
        }

        return $this->db
            ->order_by('berita_id', 'DESC')
            ->limit($limit)
            ->get('berita')
            ->result();
    }

    public function kontak_terbaru($limit = 5)
    {
        if (!$this->db->table_exists('kontak')) {
            return [];
        }

        return $this->db
            ->order_by('kontak_id', 'DESC')
            ->limit($limit)
            ->get('kontak')
            ->result();
    }
}
