<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
        $id = $this->session->userdata('id');

        $data['title'] = 'Profil Saya';
        $data['profil'] = $this->M_pengguna->get_by_id($id);

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_profil', $data);
        $this->load->view('backend/template/v_footer');
    }

    public function update()
    {
        $id = $this->session->userdata('id');

        $data = [
            'pengguna_nama'     => $this->input->post('pengguna_nama'),
            'pengguna_username' => $this->input->post('pengguna_username'),
            'pengguna_email'    => $this->input->post('pengguna_email')
        ];

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
            'Profil berhasil diperbarui'
        );

        redirect('profil');
    }
}
