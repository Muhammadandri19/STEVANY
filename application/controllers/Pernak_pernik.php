<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pernak_pernik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->load->model('M_pernak_pernik');
        $this->load->model('M_destinasi');
    }


    public function index()
    {
        $data['title'] = 'Data Pernak-Pernik';
        $data['pernak_pernik'] = $this->M_pernak_pernik->get_all();
        $data['destinasi'] = $this->M_destinasi->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_pernak_pernik', $data);
        $this->load->view('backend/template/v_footer');
    }



    public function simpan()
    {
        $foto = '';

        if (!is_dir('./uploads/pernak_pernik/')) {
            mkdir('./uploads/pernak_pernik/', 0777, TRUE);
        }


        if (!empty($_FILES['foto']['name'])) {

            $config = [
                'upload_path'   => './uploads/pernak_pernik/',
                'allowed_types' => 'jpg|jpeg|png|webp',
                'encrypt_name'  => TRUE,
                'max_size'      => 2048
            ];

            $this->load->library('upload');
            $this->upload->initialize($config);


            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            }
        }



        $data = [
            'destinasi_id' => $this->input->post('destinasi_id'),
            'nama_produk'  => $this->input->post('nama_produk'),
            'nama_toko'    => $this->input->post('nama_toko'),
            'harga'        => $this->input->post('harga'),
            'alamat'       => $this->input->post('alamat'),
            'latitude'     => $this->input->post('latitude'),
            'longitude'    => $this->input->post('longitude'),
            'maps'         => $this->input->post('maps'),
            'deskripsi'    => $this->input->post('deskripsi'),
            'foto'         => $foto
        ];



        $this->M_pernak_pernik->insert($data);


        $this->session->set_flashdata(
            'success',
            'Data pernak-pernik berhasil ditambahkan'
        );


        redirect('pernak_pernik');
    }





    public function update()
    {
        $id = $this->input->post('id_pernak');


        if (!$id) {
            redirect('pernak_pernik');
        }



        $data = [
            'destinasi_id' => $this->input->post('destinasi_id'),
            'nama_produk'  => $this->input->post('nama_produk'),
            'nama_toko'    => $this->input->post('nama_toko'),
            'harga'        => $this->input->post('harga'),
            'alamat'       => $this->input->post('alamat'),
            'latitude'     => $this->input->post('latitude'),
            'longitude'    => $this->input->post('longitude'),
            'maps'         => $this->input->post('maps'),
            'deskripsi'    => $this->input->post('deskripsi')
        ];



        if (!is_dir('./uploads/pernak_pernik/')) {
            mkdir('./uploads/pernak_pernik/', 0777, TRUE);
        }




        if (!empty($_FILES['foto']['name'])) {


            $config = [
                'upload_path'   => './uploads/pernak_pernik/',
                'allowed_types' => 'jpg|jpeg|png|webp',
                'encrypt_name'  => TRUE,
                'max_size'      => 2048
            ];


            $this->load->library('upload');
            $this->upload->initialize($config);



            if ($this->upload->do_upload('foto')) {


                $lama = $this->M_pernak_pernik->get_by_id($id);



                if (
                    $lama &&
                    !empty($lama->foto) &&
                    file_exists('./uploads/pernak_pernik/' . $lama->foto)
                ) {

                    unlink('./uploads/pernak_pernik/' . $lama->foto);
                }



                $data['foto'] = $this->upload->data('file_name');
            }
        }



        $this->M_pernak_pernik->update($id, $data);



        $this->session->set_flashdata(
            'success',
            'Data pernak-pernik berhasil diperbarui'
        );



        redirect('pernak_pernik');
    }





    public function hapus($id)
    {

        $data = $this->M_pernak_pernik->get_by_id($id);



        if (
            $data &&
            !empty($data->foto) &&
            file_exists('./uploads/pernak_pernik/' . $data->foto)
        ) {

            unlink('./uploads/pernak_pernik/' . $data->foto);
        }



        $this->M_pernak_pernik->delete($id);



        $this->session->set_flashdata(
            'success',
            'Data pernak-pernik berhasil dihapus'
        );



        redirect('pernak_pernik');
    }
}
