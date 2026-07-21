<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->load->model('M_pengguna');
    }

    public function index()
    {
        $data['title'] = 'Data Pengguna';
        $data['pengguna'] = $this->M_pengguna->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_pengguna', $data);
        $this->load->view('backend/template/v_footer');
    }

    public function simpan()
    {
        $foto = 'default.png';

        if (!empty($_FILES['pengguna_foto']['name'])) {

            $config['upload_path']   = './uploads/pengguna/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pengguna_foto')) {

                $foto = $this->upload->data('file_name');
            }
        }

        $data = [
            'pengguna_nama'     => $this->input->post('pengguna_nama'),
            'pengguna_username' => $this->input->post('pengguna_username'),
            'pengguna_password' => md5($this->input->post('pengguna_password')),
            'pengguna_email'    => $this->input->post('pengguna_email'),
            'pengguna_foto'     => $foto,
            'pengguna_level'    => $this->input->post('pengguna_level'),
            'pengguna_status'   => $this->input->post('pengguna_status')
        ];

        $this->M_pengguna->insert($data);

        $this->session->set_flashdata(
            'success',
            'Pengguna berhasil ditambahkan'
        );

        redirect('pengguna');
    }

    public function update()
    {
        $id = $this->input->post('pengguna_id');

        $data = [
            'pengguna_nama'     => $this->input->post('pengguna_nama'),
            'pengguna_username' => $this->input->post('pengguna_username'),
            'pengguna_email'    => $this->input->post('pengguna_email'),
            'pengguna_level'    => $this->input->post('pengguna_level'),
            'pengguna_status'   => $this->input->post('pengguna_status')
        ];

        if (!empty($this->input->post('pengguna_password'))) {

            $data['pengguna_password'] =
                md5($this->input->post('pengguna_password'));
        }

        if (!empty($_FILES['pengguna_foto']['name'])) {

            $config['upload_path']   = './uploads/pengguna/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pengguna_foto')) {

                $lama = $this->M_pengguna->get_by_id($id);

                if (
                    $lama &&
                    $lama->pengguna_foto != 'default.png' &&
                    file_exists('./uploads/pengguna/' . $lama->pengguna_foto)
                ) {
                    unlink('./uploads/pengguna/' . $lama->pengguna_foto);
                }

                $data['pengguna_foto'] =
                    $this->upload->data('file_name');
            }
        }

        $this->M_pengguna->update($id, $data);

        $this->session->set_flashdata(
            'success',
            'Pengguna berhasil diperbarui'
        );

        redirect('pengguna');
    }

    public function hapus($id)
    {
        $data = $this->M_pengguna->get_by_id($id);

        if (
            $data &&
            $data->pengguna_foto != 'default.png' &&
            file_exists('./uploads/pengguna/' . $data->pengguna_foto)
        ) {
            unlink('./uploads/pengguna/' . $data->pengguna_foto);
        }

        $this->M_pengguna->delete($id);

        $this->session->set_flashdata(
            'success',
            'Pengguna berhasil dihapus'
        );

        redirect('pengguna');
    }
}
