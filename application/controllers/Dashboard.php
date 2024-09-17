<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer.php');
    }

    public function masukkan_keranjang($id)
    {
        $barang = $this->model_barang->find($id);

        $data = array(
            'id'      => $barang->id_produk,
            'qty'     => 1,
            'price'   => $barang->harga_produk,
            'name'    => $barang->nama_produk
        );

        $this->cart->insert($data);
        redirect('dashboard/detail_keranjang');
    }

    public function detail_keranjang()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer.php');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('dashboard/detail_keranjang');
    }

    public function update($id)
    {
        $items = $this->model_barang->find($id);
        $data = array(
            'id'      => $items->id_produk,
            'qty'     => 1,
            'price'   => $items->harga_produk,
            'name'    => $items->nama_produk
        );
        $this->cart->update($data);
        redirect('dashboard/detail_keranjang');
    }

    public function pembayaran()
    {
        error_reporting(0);
        $data['profil'] = $this->db->get_where('tb_customer', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran', $data);
        $this->load->view('templates/footer.php');
    }

    public function proses_pesanan()
    {
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer.php');
        } else {
            echo " Maaf Pesanan Anda Gagal diproses";
        }
    }

    public function detail($id_produk)
    {
        $data['barang'] = $this->model_barang->detail_produk($id_produk);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer.php');
    }
}
