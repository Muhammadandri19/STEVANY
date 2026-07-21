<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hotel extends CI_Model
{
    private $table = 'hotel';

    // =========================
    // BACKEND
    // =========================

    public function get_all()
    {
        return $this->db
            ->order_by('hotel_id', 'ASC')
            ->get('hotel')
            ->result();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('hotel_id', $id)
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
            ->order_by('hotel_id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function get_detail($id)
    {
        return $this->db
            ->where('hotel_id', $id)
            ->get($this->table)
            ->row();
    }

    public function get_limit($limit = 4)
    {
        return $this->db
            ->order_by('hotel_id', 'DESC')
            ->limit($limit)
            ->get($this->table)
            ->result();
    }

    public function get_related($id, $limit = 3)
    {
        return $this->db
            ->where('hotel_id !=', $id)
            ->order_by('hotel_id', 'DESC')
            ->limit($limit)
            ->get($this->table)
            ->result();
    }

    public function get_latest()
    {
        return $this->db
            ->order_by('hotel_id', 'DESC')
            ->limit(1)
            ->get($this->table)
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
            ->group_start()
            ->like('nama_hotel', $keyword)
            ->or_like('alamat', $keyword)
            ->or_like('deskripsi', $keyword)
            ->group_end()
            ->order_by('hotel_id', 'DESC')
            ->get($this->table)
            ->result();
    }

    public function get_all_hotel()
    {
        return $this->db
            ->order_by('hotel_id', 'DESC')
            ->get($this->table)
            ->result();
    }
}
