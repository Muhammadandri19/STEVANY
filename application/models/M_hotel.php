<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hotel extends CI_Model
{
    private $table = 'hotel';

    // =========================
    // BACKEND ADMIN
    // =========================

    public function get_all()
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->order_by('hotel.hotel_id', 'ASC')
            ->get()
            ->result();
    }


    public function get_by_id($id)
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->where('hotel.hotel_id', $id)
            ->get()
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
            ->where('hotel_id', $id)
            ->update(
                $this->table,
                $data
            );
    }


    public function delete($id)
    {
        return $this->db
            ->where('hotel_id', $id)
            ->delete($this->table);
    }


    // =========================
    // FRONTEND
    // =========================


    public function get_all_active()
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->order_by('hotel.hotel_id', 'ASC')
            ->get()
            ->result();
    }


    public function get_detail($id)
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->where('hotel.hotel_id', $id)
            ->get()
            ->row();
    }


    public function get_by_destinasi($destinasi_id)
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->where('hotel.destinasi_id', $destinasi_id)
            ->order_by('hotel.hotel_id', 'ASC')
            ->get()
            ->result();
    }


    public function get_limit($limit = 4)
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->order_by('hotel.hotel_id', 'ASC')
            ->limit($limit)
            ->get()
            ->result();
    }


    public function get_related($id, $limit = 3)
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->where('hotel.hotel_id !=', $id)
            ->order_by('hotel.hotel_id', 'ASC')
            ->limit($limit)
            ->get()
            ->result();
    }


    public function get_latest()
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->order_by('hotel.hotel_id', 'DESC')
            ->limit(1)
            ->get()
            ->row();
    }


    public function total_hotel()
    {
        return $this->db
            ->count_all_results($this->table);
    }


    public function search($keyword)
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->group_start()
            ->like('hotel.nama_hotel', $keyword)
            ->or_like('hotel.alamat', $keyword)
            ->or_like('hotel.deskripsi', $keyword)
            ->or_like('destinasi.destinasi_nama', $keyword)
            ->group_end()
            ->order_by('hotel.hotel_id', 'ASC')
            ->get()
            ->result();
    }


    public function get_all_hotel()
    {
        return $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->order_by('hotel.hotel_id', 'ASC')
            ->get()
            ->result();
    }


    public function filter_hotel($keyword = '', $destinasi = '')
    {
        $this->db
            ->select('hotel.*, destinasi.destinasi_nama')
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            );


        if (!empty($keyword)) {

            $this->db->group_start();

            $this->db->like(
                'hotel.nama_hotel',
                $keyword
            );

            $this->db->or_like(
                'hotel.alamat',
                $keyword
            );

            $this->db->or_like(
                'destinasi.destinasi_nama',
                $keyword
            );

            $this->db->group_end();
        }


        if (!empty($destinasi)) {

            $this->db->where(
                'hotel.destinasi_id',
                $destinasi
            );
        }


        return $this->db
            ->order_by('hotel.hotel_id', 'ASC')
            ->get()
            ->result();
    }


    // =========================
    // REKOMENDASI HOTEL TERDEKAT
    // =========================

    public function get_terdekat($latitude, $longitude, $limit = 5)
    {

        return $this->db
            ->select("
                hotel.*,
                destinasi.destinasi_nama,
                (
                    6371 * acos(
                        cos(radians($latitude))
                        *
                        cos(radians(hotel.latitude))
                        *
                        cos(
                            radians(hotel.longitude)
                            -
                            radians($longitude)
                        )
                        +
                        sin(radians($latitude))
                        *
                        sin(radians(hotel.latitude))
                    )
                ) AS jarak
            ")
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = hotel.destinasi_id',
                'left'
            )
            ->where('hotel.latitude IS NOT NULL')
            ->where('hotel.longitude IS NOT NULL')
            ->order_by('jarak', 'ASC')
            ->limit($limit)
            ->get()
            ->result();
    }
}
