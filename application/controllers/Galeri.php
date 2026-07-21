<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->load->model('M_galeri');
        $this->load->model('M_destinasi');
    }

    public function index()
    {
        $data['title'] = 'Galeri Destinasi';
        $data['galeri'] = $this->M_galeri->get_all();
        $data['destinasi'] = $this->M_destinasi->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_galeri', $data);
        $this->load->view('backend/template/v_footer');
    }

    public function simpan()
    {
        $foto = '';

        if (!empty($_FILES['foto']['name'])) {

            $config['upload_path'] = './uploads/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = [
            'destinasi_id' => $this->input->post('destinasi_id'),
            'judul_foto'   => $this->input->post('judul_foto'),
            'foto'         => $foto
        ];

        $this->M_galeri->insert($data);

        $this->session->set_flashdata(
            'success',
            'Foto berhasil ditambahkan'
        );

        redirect('galeri');
    }

    public function update()
    {
        $id = $this->input->post('galeri_id');

        $data = [
            'destinasi_id' => $this->input->post('destinasi_id'),
            'judul_foto'   => $this->input->post('judul_foto')
        ];

        if (!empty($_FILES['foto']['name'])) {

            $config['upload_path'] = './uploads/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $lama = $this->M_galeri->get_by_id($id);

                if (
                    $lama &&
                    file_exists('./uploads/galeri/' . $lama->foto)
                ) {
                    unlink('./uploads/galeri/' . $lama->foto);
                }

                $data['foto'] =
                    $this->upload->data('file_name');
            }
        }

        $this->M_galeri->update($id, $data);

        $this->session->set_flashdata(
            'success',
            'Foto berhasil diperbarui'
        );

        redirect('galeri');
    }

    public function hapus($id)
    {
        $data = $this->M_galeri->get_by_id($id);

        if (
            $data &&
            file_exists('./uploads/galeri/' . $data->foto)
        ) {
            unlink('./uploads/galeri/' . $data->foto);
        }

        $this->M_galeri->delete($id);

        $this->session->set_flashdata(
            'success',
            'Foto berhasil dihapus'
        );

        redirect('galeri');
    }
}
