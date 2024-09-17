<?php

class Kategori extends CI_Controller
{
    public function kat()
    {
        $data['kat'] = $this->model_kategori->tampil_kategori();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');
    }

    public function produk($id_kategori)
    {
        $data = array(
            'barang' => $this->model_kategori->tampil_barang($id_kategori)
        );
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');
    }

    public function makanan_kering()
    {
        $data['makanan_kering'] = $this->model_kategori->data_makanan_kering()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('makanan_kering', $data);
        $this->load->view('templates/footer');
    }

    public function makanan_kaleng()
    {
        $data['makanan_kaleng'] = $this->model_kategori->data_makanan_kaleng()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('makanan_kaleng', $data);
        $this->load->view('templates/footer');
    }

    public function obat_kucing()
    {
        $data['obat_kucing'] = $this->model_kategori->data_obat_kucing()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('obat_kucing', $data);
        $this->load->view('templates/footer');
    }

    public function vitamin_kucing()
    {
        $data['vitamin_kucing'] = $this->model_kategori->data_vitamin_kucing()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('vitamin_kucing', $data);
        $this->load->view('templates/footer');
    }

    public function susu_kucing()
    {
        $data['susu_kucing'] = $this->model_kategori->data_susu_kucing()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('susu_kucing', $data);
        $this->load->view('templates/footer');
    }

    public function shampo_kucing()
    {
        $data['shampo_kucing'] = $this->model_kategori->data_shampo_kucing()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('shampo_kucing', $data);
        $this->load->view('templates/footer');
    }

    public function peralatan_kucing()
    {
        $data['peralatan_kucing'] = $this->model_kategori->data_peralatan_kucing()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('peralatan_kucing', $data);
        $this->load->view('templates/footer');
    }
}
