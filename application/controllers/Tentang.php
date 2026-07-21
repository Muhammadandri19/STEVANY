<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->load->model('M_tentang');
    }

    public function index()
    {
        $data['title'] = 'Tentang Kami';
        $data['tentang'] = $this->M_tentang->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_tentang', $data);
        $this->load->view('backend/template/v_footer');
    }

    public function simpan()
    {
        $gambar = '';

        if (!empty($_FILES['gambar']['name'])) {

            $config['upload_path'] = './uploads/tentang/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $gambar = $this->upload->data('file_name');
            }
        }

        $data = [
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'gambar' => $gambar
        ];

        $this->M_tentang->insert($data);

        $this->session->set_flashdata(
            'success',
            'Data berhasil ditambahkan'
        );

        redirect('tentang');
    }

    public function update()
    {
        $id = $this->input->post('tentang_id');

        $data = [
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi')
        ];

        if (!empty($_FILES['gambar']['name'])) {

            $config['upload_path'] = './uploads/tentang/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {

                $lama = $this->M_tentang->get_by_id($id);

                if (
                    $lama &&
                    $lama->gambar &&
                    file_exists('./uploads/tentang/' . $lama->gambar)
                ) {
                    unlink('./uploads/tentang/' . $lama->gambar);
                }

                $data['gambar'] =
                    $this->upload->data('file_name');
            }
        }

        $this->M_tentang->update($id, $data);

        $this->session->set_flashdata(
            'success',
            'Data berhasil diperbarui'
        );

        redirect('tentang');
    }

    public function hapus($id)
    {
        $data = $this->M_tentang->get_by_id($id);

        if (
            $data &&
            $data->gambar &&
            file_exists('./uploads/tentang/' . $data->gambar)
        ) {
            unlink('./uploads/tentang/' . $data->gambar);
        }

        $this->M_tentang->delete($id);

        $this->session->set_flashdata(
            'success',
            'Data berhasil dihapus'
        );

        redirect('tentang');
    }
}
