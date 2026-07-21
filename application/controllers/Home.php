<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_destinasi');
        $this->load->model('M_hotel');
        $this->load->model('M_berita');
        $this->load->model('M_tentang');
        $this->load->model('M_galeri');
        $this->load->model('M_kontak');

        $this->load->library('form_validation');

        $this->load->helper('text');
    }
    public function index()
    {
        $data['title'] = 'Stevany Traveling';

        // Destinasi
        $data['destinasi'] = $this->M_destinasi->get_limit(6);

        // Hotel
        $data['hotel'] = $this->M_hotel->get_limit(4);

        // Berita
        $data['berita'] = $this->M_berita->get_limit(3);

        // Tentang Kami
        $data['tentang'] = $this->M_tentang->get_tentang();

        // Galeri
        $data['galeri'] = $this->M_galeri->get_limit(8);

        $this->load->view('frontend/template/v_header', $data);
        $this->load->view('frontend/template/v_navbar', $data);
        $this->load->view('frontend/v_home', $data);
        $this->load->view('frontend/template/v_footer');
    }

    public function detail_destinasi($id)
    {
        $data['destinasi'] = $this->M_destinasi->get_detail($id);

        if (!$data['destinasi']) {
            show_404();
        }

        $data['title'] = $data['destinasi']->destinasi_nama;

        $data['related'] = $this->M_destinasi->get_related(
            $data['destinasi']->kategori_id,
            $id
        );

        $this->load->view('frontend/template/v_header', $data);
        $this->load->view('frontend/template/v_navbar', $data);
        $this->load->view('frontend/v_detail_destinasi', $data);
        $this->load->view('frontend/template/v_footer');
    }

    public function destinasi_selengkapnya()
    {
        $data['title'] = 'Jelajahi Semua Destinasi';

        $keyword  = trim($this->input->get('keyword', TRUE) ?? '');
        $kategori = $this->input->get('kategori', TRUE) ?? '';

        $data['kategori'] = $this->M_destinasi->get_kategori();

        $data['destinasi'] = $this->M_destinasi
            ->filter_destinasi($keyword, $kategori);

        $this->load->view('frontend/template/v_header', $data);
        $this->load->view('frontend/template/v_navbar', $data);
        $this->load->view('frontend/v_destinasi_lengkap', $data);
        $this->load->view('frontend/template/v_footer');
    }
    public function kirim_pesan()
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim'
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email'
        );

        $this->form_validation->set_rules(
            'pesan',
            'Pesan',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata(
                'error',
                validation_errors()
            );

            redirect(base_url() . '#contact');
        }

        $data = [
            'nama'   => $this->input->post('nama', TRUE),
            'email'  => $this->input->post('email', TRUE),
            'subjek' => $this->input->post('subjek', TRUE),
            'pesan'  => $this->input->post('pesan', TRUE),
            'status' => 'belum_dibaca'
        ];

        if ($this->M_kontak->simpan_pesan($data)) {

            $this->session->set_flashdata(
                'success',
                'Pesan berhasil dikirim.'
            );
        } else {

            $this->session->set_flashdata(
                'error',
                'Pesan gagal dikirim.'
            );
        }

        redirect(base_url() . '#contact');
    }
}
