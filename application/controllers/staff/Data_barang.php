<?php

class Data_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda Belom Login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('auth/login_admin');
        }
    }

    public function index()
    {
        $data['data_kategori'] = $this->model_kategori->tampil_kategori()->result();
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_staff/header');
        $this->load->view('templates_staff/sidebar');
        $this->load->view('staff/data_barang', $data, $data);
        $this->load->view('templates_staff/footer');
    }

    public function tambah_aksi()
    {
        $kategori       = $this->input->post('kategori');
        $nama_produk    = $this->input->post('nama_produk');
        $keterangan     = $this->input->post('keterangan');
        $harga_produk   = $this->input->post('harga_produk');
        $stok_produk    = $this->input->post('stok_produk');
        $gambar_produk  = $_FILES['gambar_produk']['name'];
        if ($gambar_produk = '') {
            $config['upload_path']         = './product/';
            $config['allowed_types']     = 'jpg|jpeg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_produk')) {
                $gambar_produk = $this->upload->data('file_name');
            } else {

                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'kategori'      => $kategori,
            'nama_produk'   => $nama_produk,
            'keterangan'    => $keterangan,
            'harga_produk'  => $harga_produk,
            'stok_produk'   => $stok_produk,
            'gambar_produk' => $gambar_produk
        );

        $this->model_barang->tambah_barang($data, 'tb_produk');
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">
        Data Berhasil Ditambah!</div>');
        redirect('staff/data_barang/index');
    }

    public function edit($id)
    {
        $data['barang'] = $this->db->get_where('tb_produk', ['id_produk' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_staff/header');
        $this->load->view('templates_staff/sidebar');
        $this->load->view('staff/data_barang', $data);
        $this->load->view('templates_staff/footer');
    }

    public function update()
    {
        $id             = $this->input->post('id_produk');
        $kategori       = $this->input->post('kategori');
        $nama_produk    = $this->input->post('nama_produk');
        $keterangan     = $this->input->post('keterangan');
        $harga_produk   = $this->input->post('harga_produk');
        $stok_produk    = $this->input->post('stok_produk');
        $gambar  = $_FILES['gambar_produk']['name'];
        if ($gambar) {
            $config['upload_path']         = './product/';
            $config['allowed_types']     = 'jpg|jpeg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_produk')) {
                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('gambar_produk', $gambar_baru);
            } else {

                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'kategori'      => $kategori,
            'nama_produk'   => $nama_produk,
            'keterangan'    => $keterangan,
            'harga_produk'  => $harga_produk,
            'stok_produk'   => $stok_produk,
            'gambar_produk' => $gambar
        );

        $where = array(
            'id_produk' => $id
        );

        $this->model_barang->update_data($where, $data, 'tb_produk');
        redirect('staff/data_barang/index');
    }

    public function hapus($id)
    {
        $this->model_barang->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('staff/data_barang/index');
    }
}
