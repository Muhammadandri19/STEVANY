<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_berita');
        $this->load->helper(array('url', 'text'));
    }

    /* ==========================================================
     * BACKEND
     * ========================================================== */

    public function index()
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $data['title']   = 'Berita';
        $data['berita']  = $this->M_berita->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_berita', $data);
        $this->load->view('backend/template/v_footer');
    }

    public function simpan()
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $gambar = '';

        if (!empty($_FILES['gambar']['name'])) {

            $config['upload_path']   = './uploads/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {

                $gambar = $this->upload->data('file_name');
            }
        }

        $data = [

            'pengguna_id' => $this->session->userdata('id'),

            'judul'       => $this->input->post('judul', TRUE),

            'slug'        => url_title(
                $this->input->post('judul'),
                '-',
                TRUE
            ),

            'isi'         => $this->input->post('isi'),

            'gambar'      => $gambar

        ];

        $this->M_berita->insert($data);

        $this->session->set_flashdata(
            'success',
            'Berita berhasil ditambahkan.'
        );

        redirect('berita');
    }

    public function update()
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $id = $this->input->post('berita_id');

        $data = [

            'judul' => $this->input->post('judul', TRUE),

            'slug'  => url_title(
                $this->input->post('judul'),
                '-',
                TRUE
            ),

            'isi'   => $this->input->post('isi')

        ];

        if (!empty($_FILES['gambar']['name'])) {

            $config['upload_path']   = './uploads/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {

                $lama = $this->M_berita->get_by_id($id);

                if (
                    $lama &&
                    !empty($lama->gambar) &&
                    file_exists('./uploads/berita/' . $lama->gambar)
                ) {
                    unlink('./uploads/berita/' . $lama->gambar);
                }

                $data['gambar'] = $this->upload->data('file_name');
            }
        }

        $this->M_berita->update($id, $data);

        $this->session->set_flashdata(
            'success',
            'Berita berhasil diperbarui.'
        );

        redirect('berita');
    }

    public function hapus($id)
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $berita = $this->M_berita->get_by_id($id);

        if (
            $berita &&
            !empty($berita->gambar) &&
            file_exists('./uploads/berita/' . $berita->gambar)
        ) {
            unlink('./uploads/berita/' . $berita->gambar);
        }

        $this->M_berita->delete($id);

        $this->session->set_flashdata(
            'success',
            'Berita berhasil dihapus.'
        );

        redirect('berita');
    }

    /* ==========================================================
     * FRONTEND
     * ========================================================== */

    public function detail($slug = null)
    {
        if ($slug == null) {
            show_404();
        }

        $data['berita'] = $this->M_berita->get_by_slug($slug);

        if (!$data['berita']) {
            show_404();
        }

        $data['related'] = $this->M_berita->get_related_slug(
            $data['berita']->berita_id,
            5
        );

        $data['title'] = $data['berita']->judul;

        $this->load->view('frontend/template/v_header', $data);
        $this->load->view('frontend/v_detail_berita', $data);
        $this->load->view('frontend/template/v_footer');
    }
}
