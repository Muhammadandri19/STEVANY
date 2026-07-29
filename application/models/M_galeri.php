<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_galeri extends CI_Model
{
    private $table = 'galeri_destinasi';

    /* =====================================================
     * BACKEND
     * ===================================================== */

    public function get_all()
    {
        return $this->db
            ->select("
                galeri_destinasi.*,
                destinasi.destinasi_nama
            ")
            ->from($this->table)
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
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('galeri_id', $id)
            ->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('galeri_id', $id)
            ->delete($this->table);
    }


    /* =====================================================
     * JELAJAHI GALERI
     * ===================================================== */

    public function get_all_frontend($limit = null, $start = 0)
    {
        $this->db
            ->select("
                galeri_destinasi.*,
                destinasi.destinasi_nama,
                destinasi.destinasi_alamat,
                kategori_wisata.kategori_id,
                kategori_wisata.kategori_nama
            ")
            ->from($this->table)
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
            ->order_by('galeri_destinasi.galeri_id', 'DESC');

        if ($limit !== null) {
            $this->db->limit($limit, $start);
        }

        return $this->db
            ->get()
            ->result();
    }
    /* =====================================================
 * FRONTEND
 * ===================================================== */

    /**
     * Galeri di halaman Home
     */
    public function get_limit($limit = 8)
    {
        return $this->db
            ->select('
            galeri_destinasi.galeri_id,
            galeri_destinasi.destinasi_id,
            galeri_destinasi.judul_foto,
            galeri_destinasi.foto,
            destinasi.destinasi_nama,
            kategori_wisata.kategori_nama
        ')
            ->from($this->table)
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
            ->order_by(
                'galeri_destinasi.galeri_id',
                'DESC'
            )
            ->limit($limit)
            ->get()
            ->result();
    }


    public function get_frontend($limit, $offset = 0, $keyword = '', $kategori = '')
    {
        $this->db
            ->select("
            galeri_destinasi.*,
            destinasi.destinasi_nama,
            destinasi.destinasi_alamat,
            kategori_wisata.kategori_id,
            kategori_wisata.kategori_nama
        ")
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = galeri_destinasi.destinasi_id',
                'left'
            )
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            );

        if (!empty($keyword)) {

            $this->db->group_start();

            $this->db->like(
                'galeri_destinasi.judul_foto',
                $keyword
            );

            $this->db->or_like(
                'destinasi.destinasi_nama',
                $keyword
            );

            $this->db->group_end();
        }

        if (!empty($kategori)) {

            $this->db->where(
                'kategori_wisata.kategori_id',
                $kategori
            );
        }

        return $this->db
            ->group_by('galeri_destinasi.destinasi_id')
            ->order_by('galeri_destinasi.galeri_id', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->result();
    }

    public function count_frontend($keyword = '', $kategori = '')
    {
        $this->db
            ->from($this->table)
            ->join(
                'destinasi',
                'destinasi.destinasi_id = galeri_destinasi.destinasi_id',
                'left'
            )
            ->join(
                'kategori_wisata',
                'kategori_wisata.kategori_id = destinasi.kategori_id',
                'left'
            );

        if (!empty($keyword)) {

            $this->db->group_start();

            $this->db->like(
                'galeri_destinasi.judul_foto',
                $keyword
            );

            $this->db->or_like(
                'destinasi.destinasi_nama',
                $keyword
            );

            $this->db->group_end();
        }

        if (!empty($kategori)) {

            $this->db->where(
                'kategori_wisata.kategori_id',
                $kategori
            );
        }

        return $this->db
            ->group_by('galeri_destinasi.destinasi_id')
            ->get()
            ->num_rows();
    }



    /**
     * Pencarian galeri
     */
    public function search($keyword)
    {
        return $this->db
            ->select('
            galeri_destinasi.galeri_id,
            galeri_destinasi.destinasi_id,
            galeri_destinasi.judul_foto,
            galeri_destinasi.foto,
            destinasi.destinasi_nama,
            kategori_wisata.kategori_nama
        ')
            ->from($this->table)
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
            ->group_start()
            ->like(
                'galeri_destinasi.judul_foto',
                $keyword
            )
            ->or_like(
                'destinasi.destinasi_nama',
                $keyword
            )
            ->or_like(
                'kategori_wisata.kategori_nama',
                $keyword
            )
            ->group_end()
            ->order_by(
                'galeri_destinasi.galeri_id',
                'DESC'
            )
            ->get()
            ->result();
    }


    /**
     * Filter berdasarkan kategori
     */
    public function get_by_kategori($kategori_id)
    {
        return $this->db
            ->select('
            galeri_destinasi.galeri_id,
            galeri_destinasi.destinasi_id,
            galeri_destinasi.judul_foto,
            galeri_destinasi.foto,
            destinasi.destinasi_nama,
            kategori_wisata.kategori_nama
        ')
            ->from($this->table)
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
            ->where(
                'kategori_wisata.kategori_id',
                $kategori_id
            )
            ->order_by(
                'galeri_destinasi.galeri_id',
                'DESC'
            )
            ->get()
            ->result();
    }

    /* =====================================================
 * DETAIL GALERI
 * ===================================================== */

    public function get_detail($id)
    {
        $galeri = $this->db
            ->select('
            galeri_destinasi.*,
            destinasi.destinasi_id,
            destinasi.destinasi_nama,
            destinasi.destinasi_deskripsi,
            destinasi.destinasi_alamat,
            destinasi.harga_tiket,
            destinasi.jam_operasional,
            destinasi.maps,
            kategori_wisata.kategori_id,
            kategori_wisata.kategori_nama
        ')
            ->from($this->table)
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
            ->where(
                'galeri_destinasi.galeri_id',
                $id
            )
            ->get()
            ->row();

        if (!$galeri) {
            return false;
        }

        $galeri->album = $this->get_album(
            $galeri->destinasi_id
        );

        return $galeri;
    }


    /* =====================================================
 * ALBUM FOTO DESTINASI
 * ===================================================== */

    public function get_album($destinasi_id)
    {
        return $this->db
            ->select('
            galeri_id,
            destinasi_id,
            judul_foto,
            foto
        ')
            ->from($this->table)
            ->where(
                'destinasi_id',
                $destinasi_id
            )
            ->order_by(
                'galeri_id',
                'DESC'
            )
            ->get()
            ->result();
    }


    /* =====================================================
 * GALERI DESTINASI LAIN
 * ===================================================== */

    public function get_related($destinasi_id)
    {
        return $this->db
            ->select('
            MIN(galeri_destinasi.galeri_id) AS galeri_id,
            galeri_destinasi.destinasi_id,
            galeri_destinasi.foto,
            destinasi.destinasi_nama,
            kategori_wisata.kategori_nama
        ')
            ->from($this->table)
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
            ->where(
                'galeri_destinasi.destinasi_id !=',
                $destinasi_id
            )
            ->group_by(
                'galeri_destinasi.destinasi_id'
            )
            ->order_by(
                'galeri_id',
                'DESC'
            )
            ->limit(6)
            ->get()
            ->result();
    }


    /* =====================================================
     * STATISTIK
     * ===================================================== */

    public function total_galeri()
    {
        return $this->db->count_all($this->table);
    }
}
