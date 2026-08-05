<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->load->model('M_fasilitas');
        $this->load->model('M_destinasi');
    }

    // ======================================================
    // INDEX
    // ======================================================

    public function index()
    {
        $data['title'] = 'Data Fasilitas';

        $data['fasilitas'] = $this->M_fasilitas->get_all();

        $data['destinasi'] = $this->M_destinasi->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_fasilitas', $data);
        $this->load->view('backend/template/v_footer');
    }

    // ======================================================
    // SIMPAN
    // ======================================================

    public function simpan()
    {
        $foto = 'default.png';

        if (!empty($_FILES['foto']['name'])) {

            $config['upload_path']   = './uploads/fasilitas/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;
            $config['max_size']      = 4096;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $foto = $this->upload->data('file_name');
            } else {

                $this->session->set_flashdata(
                    'error',
                    $this->upload->display_errors()
                );

                redirect('fasilitas');
            }
        }

        $data = [

            'destinasi_id'    => $this->input->post('destinasi_id'),

            'nama_fasilitas'  => $this->input->post('nama_fasilitas'),

            'deskripsi'       => $this->input->post('deskripsi'),

            'foto'            => $foto,

            'status'          => $this->input->post('status')

        ];

        $this->M_fasilitas->insert($data);

        $this->session->set_flashdata(
            'success',
            'Data fasilitas berhasil ditambahkan.'
        );

        redirect('fasilitas');
    }
    // ======================================================
    // UPDATE
    // ======================================================

    public function update()
    {
        $id = $this->input->post('fasilitas_id');

        $data = [

            'destinasi_id'   => $this->input->post('destinasi_id'),

            'nama_fasilitas' => $this->input->post('nama_fasilitas'),

            'deskripsi'      => $this->input->post('deskripsi'),

            'status'         => $this->input->post('status')

        ];


        // ==========================
        // UPLOAD FOTO BARU
        // ==========================

        if (!empty($_FILES['foto']['name'])) {

            $config['upload_path']   = './uploads/fasilitas/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;
            $config['max_size']      = 4096;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $lama = $this->M_fasilitas->get_by_id($id);

                if (
                    $lama &&
                    $lama->foto != 'default.png' &&
                    !empty($lama->foto) &&
                    file_exists('./uploads/fasilitas/' . $lama->foto)
                ) {

                    unlink('./uploads/fasilitas/' . $lama->foto);
                }

                $data['foto'] = $this->upload->data('file_name');
            } else {

                $this->session->set_flashdata(
                    'error',
                    $this->upload->display_errors()
                );

                redirect('fasilitas');
            }
        }


        // ==========================
        // UPDATE DATABASE
        // ==========================

        $this->M_fasilitas->update($id, $data);


        // ==========================
        // FLASH MESSAGE
        // ==========================

        $this->session->set_flashdata(
            'success',
            'Data fasilitas berhasil diperbarui.'
        );

        redirect('fasilitas');
    }

    // ======================================================
    // HAPUS
    // ======================================================

    public function hapus($id)
    {
        $data = $this->M_fasilitas->get_by_id($id);

        if (
            $data &&
            $data->foto != 'default.png' &&
            !empty($data->foto) &&
            file_exists('./uploads/fasilitas/' . $data->foto)
        ) {

            unlink('./uploads/fasilitas/' . $data->foto);
        }

        $this->M_fasilitas->delete($id);

        $this->session->set_flashdata(
            'success',
            'Data fasilitas berhasil dihapus.'
        );

        redirect('fasilitas');
    }
}
