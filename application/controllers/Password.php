<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
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
        $data['title'] = 'Ganti Password';

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_password');
        $this->load->view('backend/template/v_footer');
    }

    public function update()
    {
        $id = $this->session->userdata('id');

        $user = $this->M_pengguna->get_by_id($id);

        if (
            md5($this->input->post('password_lama'))
            !=
            $user->pengguna_password
        ) {

            $this->session->set_flashdata(
                'error',
                'Password lama salah'
            );

            redirect('password');
        }

        if (
            $this->input->post('password_baru')
            !=
            $this->input->post('konfirmasi_password')
        ) {

            $this->session->set_flashdata(
                'error',
                'Konfirmasi password tidak cocok'
            );

            redirect('password');
        }

        $this->M_pengguna->update(
            $id,
            [
                'pengguna_password' =>
                md5($this->input->post('password_baru'))
            ]
        );

        $this->session->set_flashdata(
            'success',
            'Password berhasil diubah'
        );

        redirect('password');
    }
}
