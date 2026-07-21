<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->load->model('M_kontak');
    }

    public function index()
    {
        $data['title'] = 'Kontak';

        $data['kontak'] =
            $this->M_kontak->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_kontak', $data);
        $this->load->view('backend/template/v_footer');
    }

    public function dibaca($id)
    {
        $this->M_kontak->update($id, [
            'status' => 'dibaca'
        ]);

        redirect('kontak');
    }

    public function hapus($id)
    {
        $this->M_kontak->delete($id);

        $this->session->set_flashdata(
            'success',
            'Pesan berhasil dihapus'
        );

        redirect('kontak');
    }
}
