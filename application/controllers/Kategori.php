<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->load->model('M_kategori');
    }

    public function index()
    {
        $data['title'] = 'Kategori Wisata';
        $data['kategori'] = $this->M_kategori->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_kategori', $data);
        $this->load->view('backend/template/v_footer');
    }

    public function simpan()
    {
        $data = [
            'kategori_nama' => $this->input->post('kategori_nama'),
            'kategori_deskripsi' => $this->input->post('kategori_deskripsi')
        ];

        $this->M_kategori->insert($data);

        $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
        redirect('kategori');
    }

    public function update()
    {
        $id = $this->input->post('kategori_id');

        $data = [
            'kategori_nama' => $this->input->post('kategori_nama'),
            'kategori_deskripsi' => $this->input->post('kategori_deskripsi')
        ];

        $this->M_kategori->update($id, $data);

        $this->session->set_flashdata('success', 'Kategori berhasil diperbarui');
        redirect('kategori');
    }

    public function hapus($id)
    {
        $cek = $this->db
            ->where('kategori_id', $id)
            ->count_all_results('destinasi');

        if ($cek > 0) {
            $this->session->set_flashdata(
                'error',
                'Kategori masih digunakan destinasi'
            );

            redirect('kategori');
        }

        $this->M_kategori->delete($id);

        $this->session->set_flashdata(
            'success',
            'Kategori berhasil dihapus'
        );

        redirect('kategori');
    }
}
