<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oleh_oleh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->load->model('M_oleh_oleh');
        $this->load->model('M_destinasi');
    }


    public function index()
    {
        $data['title'] = 'Data Oleh-Oleh';
        $data['oleh_oleh'] = $this->M_oleh_oleh->get_all();
        $data['destinasi'] = $this->M_destinasi->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_oleh_oleh', $data);
        $this->load->view('backend/template/v_footer');
    }



    public function simpan()
    {
        $foto = '';

        if (!is_dir('./uploads/oleh_oleh/')) {
            mkdir('./uploads/oleh_oleh/', 0777, true);
        }


        if (!empty($_FILES['foto']['name'])) {

            $config['upload_path'] = './uploads/oleh_oleh/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name'] = true;
            $config['max_size'] = 2048;

            $this->load->library('upload');
            $this->upload->initialize($config);


            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            }
        }



        $data = [
            'destinasi_id' => $this->input->post('destinasi_id'),
            'nama_produk' => $this->input->post('nama_produk'),
            'nama_toko' => $this->input->post('nama_toko'),
            'harga' => $this->input->post('harga'),
            'alamat' => $this->input->post('alamat'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'maps' => $this->input->post('maps'),
            'deskripsi' => $this->input->post('deskripsi'),
            'foto' => $foto
        ];


        $this->M_oleh_oleh->insert($data);


        $this->session->set_flashdata(
            'success',
            'Data oleh-oleh berhasil ditambahkan'
        );


        redirect('oleh_oleh');
    }




    public function update()
    {
        $id = $this->input->post('id_oleh_oleh');


        $data = [
            'destinasi_id' => $this->input->post('destinasi_id'),
            'nama_produk' => $this->input->post('nama_produk'),
            'nama_toko' => $this->input->post('nama_toko'),
            'harga' => $this->input->post('harga'),
            'alamat' => $this->input->post('alamat'),
            'latitude' => $this->input->post('latitude'),
            'longitude' => $this->input->post('longitude'),
            'maps' => $this->input->post('maps'),
            'deskripsi' => $this->input->post('deskripsi')
        ];



        if (!is_dir('./uploads/oleh_oleh/')) {
            mkdir('./uploads/oleh_oleh/', 0777, true);
        }



        if (!empty($_FILES['foto']['name'])) {


            $config['upload_path'] = './uploads/oleh_oleh/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name'] = true;
            $config['max_size'] = 2048;


            $this->load->library('upload');
            $this->upload->initialize($config);



            if ($this->upload->do_upload('foto')) {


                $lama = $this->M_oleh_oleh->get_by_id($id);



                if (
                    $lama &&
                    !empty($lama->foto) &&
                    file_exists('./uploads/oleh_oleh/' . $lama->foto)
                ) {
                    unlink('./uploads/oleh_oleh/' . $lama->foto);
                }



                $data['foto'] = $this->upload->data('file_name');
            }
        }



        $this->M_oleh_oleh->update($id, $data);



        $this->session->set_flashdata(
            'success',
            'Data oleh-oleh berhasil diperbarui'
        );



        redirect('oleh_oleh');
    }




    public function hapus($id)
    {
        $data = $this->M_oleh_oleh->get_by_id($id);



        if (
            $data &&
            !empty($data->foto) &&
            file_exists('./uploads/oleh_oleh/' . $data->foto)
        ) {
            unlink('./uploads/oleh_oleh/' . $data->foto);
        }



        $this->M_oleh_oleh->delete($id);



        $this->session->set_flashdata(
            'success',
            'Data oleh-oleh berhasil dihapus'
        );


        redirect('oleh_oleh');
    }
}
