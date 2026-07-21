<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_hotel');
        $this->load->helper(array('url', 'text'));
    }

    /* =====================================
     * BACKEND ADMIN
     * ===================================== */

    public function index()
    {
        // Jika belum login arahkan ke login
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $data['title'] = 'Hotel / Penginapan';
        $data['hotel'] = $this->M_hotel->get_all();

        $this->load->view('backend/template/v_header', $data);
        $this->load->view('backend/template/v_sidebar', $data);
        $this->load->view('backend/v_hotel', $data);
        $this->load->view('backend/template/v_footer');
    }

    public function simpan()
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $gambar = '';

        if (!empty($_FILES['gambar']['name'])) {

            $config['upload_path']   = './uploads/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama_hotel'   => $this->input->post('nama_hotel', TRUE),
            'alamat'       => $this->input->post('alamat', TRUE),
            'telepon'      => $this->input->post('telepon', TRUE),
            'email'        => $this->input->post('email', TRUE),
            'website'      => $this->input->post('website', TRUE),
            'maps'         => $this->input->post('maps'),
            'deskripsi'    => $this->input->post('deskripsi'),
            'harga_mulai'  => $this->input->post('harga_mulai', TRUE),
            'rating'       => $this->input->post('rating', TRUE),
            'fasilitas'    => $this->input->post('fasilitas'),
            'jam_checkin'  => $this->input->post('jam_checkin', TRUE),
            'jam_checkout' => $this->input->post('jam_checkout', TRUE),
            'gambar'       => $gambar
        ];

        $this->M_hotel->insert($data);

        $this->session->set_flashdata(
            'success',
            'Hotel berhasil ditambahkan'
        );

        redirect('hotel');
    }

    public function update()
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $id = $this->input->post('hotel_id');

        $data = [
            'nama_hotel'   => $this->input->post('nama_hotel', TRUE),
            'alamat'       => $this->input->post('alamat', TRUE),
            'telepon'      => $this->input->post('telepon', TRUE),
            'email'        => $this->input->post('email', TRUE),
            'website'      => $this->input->post('website', TRUE),
            'maps'         => $this->input->post('maps'),
            'deskripsi'    => $this->input->post('deskripsi'),
            'harga_mulai'  => $this->input->post('harga_mulai', TRUE),
            'rating'       => $this->input->post('rating', TRUE),
            'fasilitas'    => $this->input->post('fasilitas'),
            'jam_checkin'  => $this->input->post('jam_checkin', TRUE),
            'jam_checkout' => $this->input->post('jam_checkout', TRUE)
        ];

        if (!empty($_FILES['gambar']['name'])) {

            $config['upload_path']   = './uploads/hotel/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {

                $lama = $this->M_hotel->get_by_id($id);

                if (
                    $lama &&
                    !empty($lama->gambar) &&
                    file_exists('./uploads/hotel/' . $lama->gambar)
                ) {
                    unlink('./uploads/hotel/' . $lama->gambar);
                }

                $data['gambar'] = $this->upload->data('file_name');
            }
        }

        $this->M_hotel->update($id, $data);

        $this->session->set_flashdata(
            'success',
            'Hotel berhasil diperbarui'
        );

        redirect('hotel');
    }

    public function hapus($id)
    {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $hotel = $this->M_hotel->get_by_id($id);

        if (
            $hotel &&
            !empty($hotel->gambar) &&
            file_exists('./uploads/hotel/' . $hotel->gambar)
        ) {
            unlink('./uploads/hotel/' . $hotel->gambar);
        }

        $this->M_hotel->delete($id);

        $this->session->set_flashdata(
            'success',
            'Hotel berhasil dihapus'
        );

        redirect('hotel');
    }

    /* =====================================
     * FRONTEND DETAIL HOTEL
     * ===================================== */

    public function detail($id)
    {
        $data['hotel'] = $this->M_hotel->get_by_id($id);

        if (!$data['hotel']) {
            show_404();
        }

        $data['related'] = $this->db
            ->where('hotel_id !=', $id)
            ->order_by('rand()')
            ->limit(5)
            ->get('hotel')
            ->result();
        $data['title'] = $data['hotel']->nama_hotel;

        $this->load->view('frontend/template/v_header', $data);
        $this->load->view('frontend/v_detail_hotel', $data);
        $this->load->view('frontend/template/v_footer');
    }
}
