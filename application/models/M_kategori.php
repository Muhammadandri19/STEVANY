<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    private $table = 'kategori_wisata';

    public function get_all()
    {
        return $this->db
            ->order_by('kategori_id', 'ASC')
            ->get($this->table)
            ->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('kategori_id', $id)
            ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('kategori_id', $id)
            ->delete($this->table);
    }
}
