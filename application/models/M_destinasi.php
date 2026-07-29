<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_destinasi extends CI_Model
{
    private $table = 'destinasi';


    // =========================
    // BACKEND ADMIN
    // =========================

    public function get_all()
    {
        return $this->db
            ->select('destinasi.*, kategori_wisata.kategori_nama')
            ->from($this->table)
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->order_by('destinasi.destinasi_id', 'ASC')
            ->get()
            ->result();
    }


    public function get_by_id($id)
    {
        return $this->db
            ->where('destinasi_id', $id)
            ->get($this->table)
            ->row();
    }


    public function insert($data)
    {
        return $this->db
            ->insert($this->table, $data);
    }


    public function update($id, $data)
    {
        return $this->db
            ->where('destinasi_id', $id)
            ->update($this->table, $data);
    }


    public function delete($id)
    {
        return $this->db
            ->where('destinasi_id', $id)
            ->delete($this->table);
    }



    // =========================
    // FRONTEND
    // =========================


    // semua destinasi aktif
    public function get_all_active()
    {
        return $this->db
            ->select('destinasi.*, kategori_wisata.kategori_nama')
            ->from($this->table)
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->where('destinasi.status', 'aktif')
            ->order_by('destinasi.destinasi_id', 'ASC')
            ->get()
            ->result();
    }



    // detail destinasi
    public function get_detail($id)
    {
        return $this->db
            ->select('destinasi.*, kategori_wisata.kategori_nama')
            ->from($this->table)
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->where('destinasi.destinasi_id', $id)
            ->where('destinasi.status', 'aktif')
            ->get()
            ->row();
    }



    // destinasi berdasarkan kategori
    public function get_by_kategori($kategori_id)
    {
        return $this->db
            ->select('destinasi.*, kategori_wisata.kategori_nama')
            ->from($this->table)
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->where('destinasi.kategori_id', $kategori_id)
            ->where('destinasi.status', 'aktif')
            ->order_by('destinasi.destinasi_id', 'ASC')
            ->get()
            ->result();
    }



    // limit halaman home
    public function get_limit($limit = 6)
    {
        return $this->db
            ->select('destinasi.*, kategori_wisata.kategori_nama')
            ->from($this->table)
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->where('destinasi.status', 'aktif')
            ->order_by('destinasi.destinasi_id', 'ASC')
            ->limit($limit)
            ->get()
            ->result();
    }



    // =========================
    // DESTINASI LAINNYA
    // =========================

    // menampilkan destinasi lain pada halaman detail
    public function get_lainnya($id, $limit = 6)
    {
        return $this->db
            ->select('destinasi.*, kategori_wisata.kategori_nama')
            ->from($this->table)
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->where('destinasi.destinasi_id !=', $id)
            ->where('destinasi.status', 'aktif')
            ->order_by('destinasi.destinasi_id', 'ASC')
            ->limit($limit)
            ->get()
            ->result();
    }



    // destinasi terbaru
    public function get_latest()
    {
        return $this->db
            ->select('destinasi.*, kategori_wisata.kategori_nama')
            ->from($this->table)
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->where('destinasi.status', 'aktif')
            ->order_by('destinasi.destinasi_id', 'DESC')
            ->limit(1)
            ->get()
            ->row();
    }



    // jumlah destinasi aktif
    public function total_destinasi()
    {
        return $this->db
            ->where('status', 'aktif')
            ->count_all_results($this->table);
    }



    // =========================
    // SEARCH
    // =========================


    public function search($keyword)
    {
        return $this->db
            ->select('destinasi.*, kategori_wisata.kategori_nama')
            ->from($this->table)
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->group_start()
            ->like(
                'destinasi.destinasi_nama',
                $keyword
            )
            ->or_like(
                'destinasi.destinasi_alamat',
                $keyword
            )
            ->or_like(
                'kategori_wisata.kategori_nama',
                $keyword
            )
            ->group_end()
            ->where('destinasi.status', 'aktif')
            ->order_by('destinasi.destinasi_id', 'ASC')
            ->get()
            ->result();
    }



    // =========================
    // KATEGORI
    // =========================

    public function get_kategori()
    {
        return $this->db
            ->order_by('kategori_nama', 'ASC')
            ->get('kategori_wisata')
            ->result();
    }



    // =========================
    // FILTER DESTINASI
    // =========================

    public function filter_destinasi($keyword = '', $kategori = '')
    {

        $this->db
            ->select('destinasi.*, kategori_wisata.kategori_nama')
            ->from($this->table)
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            )
            ->where('destinasi.status', 'aktif');


        if (!empty($keyword)) {

            $this->db->group_start();

            $this->db
                ->like(
                    'destinasi.destinasi_nama',
                    $keyword
                )
                ->or_like(
                    'destinasi.destinasi_alamat',
                    $keyword
                )
                ->or_like(
                    'kategori_wisata.kategori_nama',
                    $keyword
                );

            $this->db->group_end();
        }



        if (!empty($kategori)) {
            $this->db
                ->where(
                    'destinasi.kategori_id',
                    $kategori
                );
        }



        return $this->db
            ->order_by(
                'destinasi.destinasi_id',
                'ASC'
            )
            ->get()
            ->result();
    }
}
