<?php

class Data_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
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
        $data['data_kategori'] = $this->model_barang->tampil_kategori()->result();
        $data['data_supplier'] = $this->model_barang->tampil_supplier()->result();
        $data['barang']        = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        date_default_timezone_set('Asia/Jakarta');

        $id_kategori    = $this->input->post('id_kategori');
        $id_supplier    = $this->input->post('id_supplier');
        $nama_produk    = $this->input->post('nama_produk');
        $keterangan     = $this->input->post('keterangan');
        $harga_produk   = $this->input->post('harga_produk');
        $stok_produk    = $this->input->post('stok_produk');
        $gambar_produk  = $_FILES['gambar_produk']['name'];
        if ($gambar_produk = '') {
        } else {
            $config['upload_path']       = './product/';
            $config['allowed_types']     = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_produk')) {
                echo $this->upload->display_errors();
            } else {
                $gambar_produk = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_kategori'   => $id_kategori,
            'id_supplier'   => $id_supplier,
            'nama_produk'   => $nama_produk,
            'keterangan'    => $keterangan,
            'harga_produk'  => $harga_produk,
            'stok_produk'   => $stok_produk,
            'tgl_masuk'     => date('Y-m-d H:i:s'),
            'gambar_produk' => $gambar_produk
        );

        $this->model_barang->tambah_barang($data, 'tb_produk');
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">
        Data Berhasil Ditambah!</div>');
        redirect('admin/data_barang/index');
    }

    public function edit($id)
    {
        $where = array('id_produk' => $id);
        $data['data_kategori'] = $this->model_barang->tampil_kategori()->result();
        $data['data_supplier'] = $this->model_barang->tampil_supplier()->result();
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_produk')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id             = $this->input->post('id_produk');
        $id_kategori    = $this->input->post('id_kategori');
        $id_supplier    = $this->input->post('id_supplier');
        $nama_produk    = $this->input->post('nama_produk');
        $keterangan     = $this->input->post('keterangan');
        $harga_produk   = $this->input->post('harga_produk');
        $stok_produk    = $this->input->post('stok_produk');
        $gambar_produk  = $_FILES['gambar_produk']['name'];
        if ($gambar_produk = '') {
        } else {
            $config['upload_path']       = './product/';
            $config['allowed_types']     = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_produk')) {
                $id             = $this->input->post('id_produk');
                $id_kategori    = $this->input->post('id_kategori');
                $id_supplier    = $this->input->post('id_supplier');
                $nama_produk    = $this->input->post('nama_produk');
                $keterangan     = $this->input->post('keterangan');
                $harga_produk   = $this->input->post('harga_produk');
                $stok_produk    = $this->input->post('stok_produk');

                $data = array(
                    'id_kategori'   => $id_kategori,
                    'id_supplier'   => $id_supplier,
                    'nama_produk'   => $nama_produk,
                    'keterangan'    => $keterangan,
                    'harga_produk'  => $harga_produk,
                    'stok_produk'   => $stok_produk,
                    'tgl_masuk'     => date('Y-m-d H:i:s')
                );

                $where = array(
                    'id_produk' => $id
                );
                $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">Data Berhasil Diupdate!</div>');
                $this->model_barang->update_data($where, $data, 'tb_produk');
                redirect('admin/data_barang/index');
            } else {
                $gambar_produk = $this->upload->data('file_name');
            }
        }

        $data = array(
            'id_kategori'   => $id_kategori,
            'id_supplier'   => $id_supplier,
            'nama_produk'   => $nama_produk,
            'keterangan'    => $keterangan,
            'harga_produk'  => $harga_produk,
            'stok_produk'   => $stok_produk,
            'tgl_masuk'     => date('Y-m-d H:i:s'),
            'gambar_produk' => $gambar_produk
        );

        $where = array(
            'id_produk' => $id
        );
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">Data Berhasil DiUpdate!</div>');
        $this->model_barang->update_data($where, $data, 'tb_produk');
        redirect('admin/data_barang/index');
    }

    public function hapus($id)
    {
        $this->model_barang->hapus_data($id);
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('admin/data_barang/index');
    }
}
