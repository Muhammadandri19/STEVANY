<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_oleh_oleh extends CI_Model
{
    private $table = 'oleh_oleh';


    // =========================
    // BACKEND
    // =========================

    public function get_all()
    {
        return $this->db
            ->select('oleh_oleh.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = oleh_oleh.destinasi_id',
                'left'
            )
            ->order_by('destinasi.destinasi_nama', 'ASC')
            ->order_by('oleh_oleh.nama_produk', 'ASC')
            ->get()
            ->result();
    }


    public function get_by_id($id)
    {
        return $this->db
            ->where('id_oleh_oleh', $id)
            ->get($this->table)
            ->row();
    }


    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }


    public function update($id, $data)
    {
        return $this->db
            ->where('id_oleh_oleh', $id)
            ->update($this->table, $data);
    }


    public function delete($id)
    {
        return $this->db
            ->where('id_oleh_oleh', $id)
            ->delete($this->table);
    }



    // =========================
    // FRONTEND DETAIL DESTINASI
    // =========================

    public function get_by_destinasi($destinasi_id)
    {
        return $this->db
            ->where('destinasi_id', $destinasi_id)
            ->order_by('nama_produk', 'ASC')
            ->get($this->table)
            ->result();
    }



    // =========================
    // REKOMENDASI TERDEKAT
    // =========================

    public function get_lokasi()
    {
        return $this->db
            ->select('
                id_oleh_oleh,
                destinasi_id,
                nama_produk,
                nama_toko,
                harga,
                alamat,
                latitude,
                longitude,
                maps,
                foto
            ')
            ->where('latitude IS NOT NULL')
            ->where('longitude IS NOT NULL')
            ->get($this->table)
            ->result();
    }



    // =========================
    // CARI OLEH-OLEH TERDEKAT
    // =========================

    public function get_terdekat($latitude, $longitude, $limit = 5)
    {
        return $this->db
            ->select("
                *,
                (
                    6371 * acos(
                        cos(radians($latitude))
                        *
                        cos(radians(latitude))
                        *
                        cos(radians(longitude) - radians($longitude))
                        +
                        sin(radians($latitude))
                        *
                        sin(radians(latitude))
                    )
                ) AS jarak
            ")
            ->from($this->table)
            ->where('latitude IS NOT NULL')
            ->where('longitude IS NOT NULL')
            ->order_by('jarak', 'ASC')
            ->limit($limit)
            ->get()
            ->result();
    }



    // =========================
    // DASHBOARD
    // =========================

    public function count_oleh_oleh()
    {
        return $this->db
            ->count_all($this->table);
    }
}
