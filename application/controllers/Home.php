<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_destinasi');
        $this->load->model('M_hotel');
        $this->load->model('M_berita');
        $this->load->model('M_tentang');
        $this->load->model('M_galeri');
        $this->load->model('M_kontak');
        $this->load->model('M_oleh_oleh');
        $this->load->model('M_pernak_pernik');

        $this->load->library('form_validation');
        $this->load->helper('text');
    }



    // =========================
    // HOME
    // =========================

    public function index()
    {
        $data['title'] = 'Stevany Traveling';

        $data['destinasi'] =
            $this->M_destinasi->get_limit(6);

        $data['hotel'] =
            $this->M_hotel->get_limit(4);

        $data['berita'] =
            $this->M_berita->get_limit(3);

        $data['tentang'] =
            $this->M_tentang->get_tentang();

        $data['galeri'] =
            $this->M_galeri->get_limit(8);



        $this->load->view(
            'frontend/template/v_header',
            $data
        );

        $this->load->view(
            'frontend/template/v_navbar',
            $data
        );

        $this->load->view(
            'frontend/v_home',
            $data
        );

        $this->load->view(
            'frontend/template/v_footer'
        );
    }




    // =========================
    // DETAIL DESTINASI
    // =========================

    public function detail_destinasi($id)
    {

        // DETAIL DESTINASI

        $data['destinasi'] =
            $this->M_destinasi->get_detail($id);



        if (!$data['destinasi']) {

            show_404();
        }



        $data['title'] =
            $data['destinasi']->destinasi_nama;




        // =========================
        // DESTINASI LAINNYA
        // =========================

        $data['destinasi_lainnya'] =
            $this->M_destinasi->get_lainnya(
                $id,
                6
            );




        // =========================
        // HOTEL DESTINASI
        // =========================

        $data['hotel'] =
            $this->M_hotel->get_by_destinasi($id);


        // =========================
        // REKOMENDASI HOTEL TERDEKAT
        // =========================

        $data['hotel_terdekat'] = [];


        if (
            !empty($data['destinasi']->latitude)
            &&
            !empty($data['destinasi']->longitude)
        ) {

            $data['hotel_terdekat'] =
                $this->M_hotel->get_terdekat(
                    $data['destinasi']->latitude,
                    $data['destinasi']->longitude,
                    5
                );
        }




        // =========================
        // OLEH-OLEH DESTINASI
        // =========================

        $data['oleh_oleh'] =
            $this->M_oleh_oleh->get_by_destinasi($id);




        // =========================
        // PERNAK-PERNIK DESTINASI
        // =========================

        $data['pernak_pernik'] =
            $this->M_pernak_pernik->get_by_destinasi($id);




        // =========================
        // DEFAULT TERDEKAT
        // =========================

        $data['oleh_terdekat'] = [];

        $data['pernak_terdekat'] = [];




        // =========================
        // HITUNG LOKASI TERDEKAT
        // =========================

        if (
            !empty($data['destinasi']->latitude)
            &&
            !empty($data['destinasi']->longitude)
        ) {


            $data['oleh_terdekat'] =
                $this->M_oleh_oleh->get_terdekat(
                    $data['destinasi']->latitude,
                    $data['destinasi']->longitude,
                    5
                );



            $data['pernak_terdekat'] =
                $this->M_pernak_pernik->get_terdekat(
                    $data['destinasi']->latitude,
                    $data['destinasi']->longitude,
                    5
                );
        }





        // =========================
        // LOAD VIEW
        // =========================

        $this->load->view(
            'frontend/template/v_header',
            $data
        );


        $this->load->view(
            'frontend/template/v_navbar',
            $data
        );


        $this->load->view(
            'frontend/v_detail_destinasi',
            $data
        );


        $this->load->view(
            'frontend/template/v_footer'
        );
    }





    // =========================
    // SEMUA DESTINASI
    // =========================

    public function destinasi_selengkapnya()
    {

        $data['title'] =
            'Jelajahi Semua Destinasi';



        $keyword =
            trim(
                $this->input->get(
                    'keyword',
                    TRUE
                ) ?? ''
            );



        $kategori =
            $this->input->get(
                'kategori',
                TRUE
            ) ?? '';




        $data['kategori'] =
            $this->M_destinasi->get_kategori();




        $data['destinasi'] =
            $this->M_destinasi
            ->filter_destinasi(
                $keyword,
                $kategori
            );




        $this->load->view(
            'frontend/template/v_header',
            $data
        );


        $this->load->view(
            'frontend/template/v_navbar',
            $data
        );


        $this->load->view(
            'frontend/v_destinasi_lengkap',
            $data
        );


        $this->load->view(
            'frontend/template/v_footer'
        );
    }





    // =========================
    // KONTAK
    // =========================

    public function kirim_pesan()
    {

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim'
        );


        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email'
        );


        $this->form_validation->set_rules(
            'pesan',
            'Pesan',
            'required|trim'
        );



        if (
            $this->form_validation->run() == FALSE
        ) {

            $this->session->set_flashdata(
                'error',
                validation_errors()
            );


            redirect(
                base_url() . '#contact'
            );
        }




        $data = [

            'nama' =>
            $this->input->post(
                'nama',
                TRUE
            ),


            'email' =>
            $this->input->post(
                'email',
                TRUE
            ),


            'subjek' =>
            $this->input->post(
                'subjek',
                TRUE
            ),


            'pesan' =>
            $this->input->post(
                'pesan',
                TRUE
            ),


            'status' =>
            'belum_dibaca'

        ];




        if (
            $this->M_kontak->simpan_pesan($data)
        ) {

            $this->session->set_flashdata(
                'success',
                'Pesan berhasil dikirim.'
            );
        } else {

            $this->session->set_flashdata(
                'error',
                'Pesan gagal dikirim.'
            );
        }



        redirect(
            base_url() . '#contact'
        );
    }
}
