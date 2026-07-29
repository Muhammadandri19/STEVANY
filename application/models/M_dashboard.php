<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
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
        return $this->db->count_all('destinasi');
    }

    public function count_hotel()
    {
        return $this->db->count_all('hotel');
    }

    public function count_kuliner()
    {
        return $this->db->count_all('kuliner');
    }

    public function count_oleh_oleh()
    {
        return $this->db->count_all('oleh_oleh');
    }

    public function count_pernak_pernik()
    {
        return $this->db->count_all('pernak_pernik');
    }

    public function count_berita()
    {
        return $this->db->count_all('berita');
    }

    public function count_kategori()
    {
        return $this->db->count_all('kategori_wisata');
    }

    public function count_galeri()
    {
        return $this->db->count_all('galeri_destinasi');
    }

    public function count_kontak()
    {
        return $this->db->count_all('kontak');
    }


    // ==========================
    // DATA TERBARU
    // ==========================

    public function destinasi_terbaru($limit = 5)
    {
        return $this->db
            ->order_by('destinasi_id', 'DESC')
            ->limit($limit)
            ->get('destinasi')
            ->result();
    }


    public function berita_terbaru($limit = 5)
    {
        return $this->db
            ->order_by('berita_id', 'DESC')
            ->limit($limit)
            ->get('berita')
            ->result();
    }


    public function kontak_terbaru($limit = 5)
    {
        return $this->db
            ->order_by('kontak_id', 'DESC')
            ->limit($limit)
            ->get('kontak')
            ->result();
    }
}
