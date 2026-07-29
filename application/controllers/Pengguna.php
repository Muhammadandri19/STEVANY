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


    // =========================
    // HALAMAN PROFIL ADMIN
    // =========================

    public function index()
    {
        $data['title'] = 'Profil Administrator';

        // hanya mengambil 1 admin
        $data['pengguna'] = $this->M_pengguna->get_admin();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_pengguna', $data);
        $this->load->view('backend/template/v_footer');
    }



    // =========================
    // UPDATE PROFIL ADMIN
    // =========================

    public function update()
    {
        $id = $this->input->post('pengguna_id');


        // =========================
        // CEK USERNAME DUPLIKAT
        // =========================

        $cek_username = $this->M_pengguna
            ->cek_username_update(
                $this->input->post('pengguna_username'),
                $id
            );


        if ($cek_username > 0) {

            $this->session->set_flashdata(
                'error',
                'Username sudah digunakan'
            );

            redirect('pengguna');
        }



        // =========================
        // CEK EMAIL DUPLIKAT
        // =========================

        $cek_email = $this->M_pengguna
            ->cek_email_update(
                $this->input->post('pengguna_email'),
                $id
            );


        if ($cek_email > 0) {

            $this->session->set_flashdata(
                'error',
                'Email sudah digunakan'
            );

            redirect('pengguna');
        }



        $data = [

            'pengguna_nama' =>
            $this->input->post('pengguna_nama'),

            'pengguna_username' =>
            $this->input->post('pengguna_username'),

            'pengguna_email' =>
            $this->input->post('pengguna_email'),

            'pengguna_status' =>
            $this->input->post('pengguna_status')

        ];



        // =========================
        // UPDATE PASSWORD
        // =========================

        if (!empty($this->input->post('pengguna_password'))) {

            $data['pengguna_password'] =
                md5(
                    $this->input->post('pengguna_password')
                );
        }




        // =========================
        // UPLOAD FOTO
        // =========================

        if (!empty($_FILES['pengguna_foto']['name'])) {


            $config['upload_path'] =
                './uploads/pengguna/';


            $config['allowed_types'] =
                'jpg|jpeg|png|webp';


            $config['encrypt_name'] =
                TRUE;



            $this->load->library(
                'upload',
                $config
            );



            if ($this->upload->do_upload('pengguna_foto')) {


                $lama =
                    $this->M_pengguna->get_by_id($id);



                if (
                    $lama &&
                    $lama->pengguna_foto != 'default.png' &&
                    file_exists(
                        './uploads/pengguna/' .
                            $lama->pengguna_foto
                    )
                ) {

                    unlink(
                        './uploads/pengguna/' .
                            $lama->pengguna_foto
                    );
                }



                $data['pengguna_foto'] =
                    $this->upload->data('file_name');
            }
        }



        $this->M_pengguna->update(
            $id,
            $data
        );



        // update session jika nama berubah

        $this->session->set_userdata(
            'nama',
            $data['pengguna_nama']
        );



        $this->session->set_flashdata(
            'success',
            'Profil administrator berhasil diperbarui'
        );


        redirect('pengguna');
    }





    // =========================
    // HAPUS DINONAKTIFKAN
    // =========================

    public function hapus()
    {

        $this->session->set_flashdata(
            'error',
            'Akun administrator utama tidak dapat dihapus'
        );


        redirect('pengguna');
    }
}
