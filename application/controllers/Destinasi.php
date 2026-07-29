<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Destinasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->load->model('M_destinasi');
        $this->load->model('M_kategori');
    }


    public function index()
    {
        $data['title'] = 'Destinasi Wisata';
        $data['destinasi'] = $this->M_destinasi->get_all();
        $data['kategori'] = $this->M_kategori->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_destinasi', $data);
        $this->load->view('backend/template/v_footer');
    }


    public function simpan()
    {
        $gambar = null;


        if (!is_dir('./uploads/destinasi/')) {
            mkdir('./uploads/destinasi/', 0777, TRUE);
        }


        if (!empty($_FILES['destinasi_gambar']['name'])) {

            $config = [
                'upload_path'   => './uploads/destinasi/',
                'allowed_types' => 'jpg|jpeg|png|webp',
                'encrypt_name'  => TRUE,
                'max_size'      => 2048
            ];


            $this->load->library('upload');
            $this->upload->initialize($config);


            if ($this->upload->do_upload('destinasi_gambar')) {
                $gambar = $this->upload->data('file_name');
            }
        }


        $data = [

            'kategori_id' => $this->input->post('kategori_id'),

            'destinasi_nama' =>
            $this->input->post('destinasi_nama'),

            'destinasi_deskripsi' =>
            $this->input->post('destinasi_deskripsi'),

            'destinasi_alamat' =>
            $this->input->post('destinasi_alamat'),


            // koordinat Google Maps
            'latitude' =>
            $this->input->post('latitude'),

            'longitude' =>
            $this->input->post('longitude'),


            'destinasi_gambar' => $gambar,


            // tetap VARCHAR
            'harga_tiket' =>
            $this->input->post('harga_tiket'),


            'fasilitas' =>
            trim($this->input->post('fasilitas')),


            'jam_operasional' =>
            $this->input->post('jam_operasional'),


            'maps' =>
            $this->input->post('maps'),


            'status' =>
            $this->input->post('status')
        ];


        $this->M_destinasi->insert($data);


        $this->session->set_flashdata(
            'success',
            'Destinasi berhasil ditambahkan'
        );


        redirect('destinasi');
    }



    public function update()
    {
        $id = $this->input->post('destinasi_id');


        if (!$id) {
            redirect('destinasi');
        }


        $data = [

            'kategori_id' =>
            $this->input->post('kategori_id'),


            'destinasi_nama' =>
            $this->input->post('destinasi_nama'),


            'destinasi_deskripsi' =>
            $this->input->post('destinasi_deskripsi'),


            'destinasi_alamat' =>
            $this->input->post('destinasi_alamat'),


            'latitude' =>
            $this->input->post('latitude'),


            'longitude' =>
            $this->input->post('longitude'),


            'harga_tiket' =>
            $this->input->post('harga_tiket'),


            'fasilitas' =>
            trim($this->input->post('fasilitas')),


            'jam_operasional' =>
            $this->input->post('jam_operasional'),


            'maps' =>
            $this->input->post('maps'),


            'status' =>
            $this->input->post('status')
        ];



        if (!is_dir('./uploads/destinasi/')) {
            mkdir('./uploads/destinasi/', 0777, TRUE);
        }



        if (!empty($_FILES['destinasi_gambar']['name'])) {


            $config = [

                'upload_path' =>
                './uploads/destinasi/',

                'allowed_types' =>
                'jpg|jpeg|png|webp',

                'encrypt_name' =>
                TRUE,

                'max_size' =>
                2048
            ];



            $this->load->library('upload');
            $this->upload->initialize($config);



            if ($this->upload->do_upload('destinasi_gambar')) {


                $lama =
                    $this->M_destinasi->get_by_id($id);



                if (
                    $lama &&
                    !empty($lama->destinasi_gambar) &&
                    file_exists(
                        './uploads/destinasi/' .
                            $lama->destinasi_gambar
                    )
                ) {

                    unlink(
                        './uploads/destinasi/' .
                            $lama->destinasi_gambar
                    );
                }



                $data['destinasi_gambar'] =
                    $this->upload->data('file_name');
            }
        }



        $this->M_destinasi->update($id, $data);



        $this->session->set_flashdata(
            'success',
            'Destinasi berhasil diperbarui'
        );


        redirect('destinasi');
    }



    public function hapus($id)
    {

        $data =
            $this->M_destinasi->get_by_id($id);



        if (
            $data &&
            !empty($data->destinasi_gambar) &&
            file_exists(
                './uploads/destinasi/' .
                    $data->destinasi_gambar
            )
        ) {

            unlink(
                './uploads/destinasi/' .
                    $data->destinasi_gambar
            );
        }



        $this->M_destinasi->delete($id);



        $this->session->set_flashdata(
            'success',
            'Destinasi berhasil dihapus'
        );



        redirect('destinasi');
    }
}
