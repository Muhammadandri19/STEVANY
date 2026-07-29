<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_galeri');
        $this->load->model('M_destinasi');
        $this->load->model('M_kategori');

        $this->load->helper(array('url', 'text'));
        $this->load->library('pagination');
    }

    /* =========================
     * INDEX
     * ========================= */

    public function index()
    {
        if ($this->session->userdata('id')) {

            $data['title'] = 'Galeri Destinasi';
            $data['galeri'] = $this->M_galeri->get_all();
            $data['destinasi'] = $this->M_destinasi->get_all();

            $this->load->view('backend/template/v_header', $data);
            $this->load->view('backend/template/v_sidebar', $data);
            $this->load->view('backend/v_galeri', $data);
            $this->load->view('backend/template/v_footer');

            return;
        }

        redirect('galeri/semua');
    }


    /* =========================
     * GALERI SEMUA FRONTEND
     * ========================= */

    public function semua()
    {
        $keyword = trim($this->input->get('keyword') ?? '');
        $kategori = $this->input->get('kategori') ?? '';

        $config['base_url'] = base_url('galeri/semua');
        $config['per_page'] = 9;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['reuse_query_string'] = TRUE;

        $offset = (int)($this->input->get('per_page') ?? 0);

        $config['total_rows'] = $this->M_galeri->count_frontend(
            $keyword,
            $kategori
        );

        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = '&laquo;';
        $config['last_link'] = '&raquo;';
        $config['next_link'] = '&rsaquo;';
        $config['prev_link'] = '&lsaquo;';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array(
            'class' => 'page-link'
        );

        $this->pagination->initialize($config);

        $data['title'] = 'Jelajahi Galeri Wisata';
        $data['kategori'] = $this->M_kategori->get_all();

        $data['galeri'] = $this->M_galeri->get_frontend(
            $config['per_page'],
            $offset,
            $keyword,
            $kategori
        );

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('frontend/template/v_header', $data);
        $this->load->view('frontend/template/v_navbar', $data);
        $this->load->view('frontend/v_galeri_semua', $data);
        $this->load->view('frontend/template/v_footer');
    }


    /* =========================
     * DETAIL GALERI
     * ========================= */

    public function detail($id = null)
    {
        if (empty($id)) {
            show_404();
        }

        $galeri = $this->M_galeri->get_detail($id);

        if (!$galeri) {
            show_404();
        }

        $data['title'] = $galeri->judul_foto;
        $data['galeri'] = $galeri;

        $data['album'] = $this->M_galeri->get_album(
            $galeri->destinasi_id
        );

        $data['related'] = $this->M_galeri->get_related(
            $galeri->destinasi_id
        );

        $this->load->view('frontend/template/v_header', $data);
        $this->load->view('frontend/template/v_navbar', $data);
        $this->load->view('frontend/v_detail_galeri', $data);
        $this->load->view('frontend/template/v_footer');
    }


    /* =========================
     * SIMPAN
     * ========================= */

    public function simpan()
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $foto = '';

        if (!empty($_FILES['foto']['name'])) {

            $config['upload_path'] = './uploads/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {

                $foto = $this->upload->data('file_name');
            } else {

                $this->session->set_flashdata(
                    'error',
                    strip_tags($this->upload->display_errors())
                );

                redirect('galeri');
            }
        }

        $data = array(
            'destinasi_id' => $this->input->post('destinasi_id', TRUE) ?? '',
            'judul_foto' => $this->input->post('judul_foto', TRUE) ?? '',
            'foto' => $foto
        );

        $this->M_galeri->insert($data);

        $this->session->set_flashdata(
            'success',
            'Foto berhasil ditambahkan.'
        );

        redirect('galeri');
    }


    /* =========================
     * UPDATE
     * ========================= */

    public function update()
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $id = $this->input->post('galeri_id') ?? null;

        $data = array(
            'destinasi_id' => $this->input->post('destinasi_id', TRUE) ?? '',
            'judul_foto' => $this->input->post('judul_foto', TRUE) ?? ''
        );

        if (!empty($_FILES['foto']['name'])) {

            $config['upload_path'] = './uploads/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {

                $lama = $this->M_galeri->get_by_id($id);

                if (
                    $lama &&
                    !empty($lama->foto) &&
                    file_exists('./uploads/galeri/' . $lama->foto)
                ) {
                    unlink('./uploads/galeri/' . $lama->foto);
                }

                $data['foto'] = $this->upload->data('file_name');
            }
        }

        $this->M_galeri->update($id, $data);

        $this->session->set_flashdata(
            'success',
            'Foto berhasil diperbarui.'
        );

        redirect('galeri');
    }


    /* =========================
     * HAPUS
     * ========================= */

    public function hapus($id = null)
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        if (!$id) {
            show_404();
        }

        $galeri = $this->M_galeri->get_by_id($id);

        if (!$galeri) {

            $this->session->set_flashdata(
                'error',
                'Data tidak ditemukan.'
            );

            redirect('galeri');
        }

        if (
            !empty($galeri->foto) &&
            file_exists('./uploads/galeri/' . $galeri->foto)
        ) {
            unlink('./uploads/galeri/' . $galeri->foto);
        }

        $this->M_galeri->delete($id);

        $this->session->set_flashdata(
            'success',
            'Foto berhasil dihapus.'
        );

        redirect('galeri');
    }
}
