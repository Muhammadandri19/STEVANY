<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('M_dashboard');

        // =========================
        // PROTEKSI LOGIN (WAJIB)
        // =========================
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    // =========================
    // DASHBOARD UTAMA
    // =========================
    public function index()
    {
        $user_id = $this->session->userdata('id');

        $data['title'] = 'Dashboard';
        $data['user']  = $this->M_dashboard->get_user_by_id($user_id);

        // statistik (aman kalau tabel belum ada)
        $data['jumlah_destinasi'] = $this->db->table_exists('destinasi')
            ? $this->M_dashboard->count_destinasi() : 0;

        $data['jumlah_hotel'] = $this->db->table_exists('hotel')
            ? $this->M_dashboard->count_hotel() : 0;

        $data['jumlah_berita'] = $this->db->table_exists('berita')
            ? $this->M_dashboard->count_berita() : 0;

        $data['jumlah_kategori'] = $this->db->table_exists('kategori_wisata')
            ? $this->M_dashboard->count_kategori() : 0;

        $data['jumlah_galeri'] = $this->db->table_exists('galeri_destinasi')
            ? $this->M_dashboard->count_galeri() : 0;

        $data['jumlah_kontak'] = $this->db->table_exists('kontak')
            ? $this->M_dashboard->count_kontak() : 0;

        $data['jumlah_pengguna'] = $this->M_dashboard->count_pengguna();

        // data terbaru
        $data['destinasi_terbaru'] = $this->db->table_exists('destinasi')
            ? $this->M_dashboard->destinasi_terbaru() : [];

        $data['berita_terbaru'] = $this->db->table_exists('berita')
            ? $this->M_dashboard->berita_terbaru() : [];

        $data['kontak_terbaru'] = $this->db->table_exists('kontak')
            ? $this->M_dashboard->kontak_terbaru() : [];

        // load view
        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/template/v_index', $data);
        $this->load->view('backend/template/v_footer');
    }
}
