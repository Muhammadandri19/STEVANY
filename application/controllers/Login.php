<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    // =========================
    // HALAMAN LOGIN
    // =========================
    public function index()
    {
        // kalau sudah login
        if ($this->session->userdata('id')) {
            redirect('dashboard');
        }

        $this->load->view('v_login');
    }

    // =========================
    // PROSES LOGIN
    // =========================
    public function proses()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $cek = $this->M_login->cek_login($username, $password);

        if ($cek->num_rows() > 0) {

            $user = $cek->row();

            // SESSION CLEAN & MODERN
            $this->session->set_userdata([
                'id'    => $user->pengguna_id,
                'nama'  => $user->pengguna_nama,
                'level' => $user->pengguna_level,
                'login' => true
            ]);

            redirect('dashboard');
        }

        $this->session->set_flashdata('error', 'Username atau Password salah');
        redirect('login');
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    // =========================
    // DEBUG RESET
    // =========================
    public function reset()
    {
        $this->session->sess_destroy();
        echo "Session cleared";
    }
}