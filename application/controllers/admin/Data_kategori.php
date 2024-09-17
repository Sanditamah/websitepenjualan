<?php

class Data_kategori extends CI_Controller
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
        $data['data_kategori'] = $this->model_kategori->tampil_kategori()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_kategori', $data, $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi_kategori()
    {
        $kategori      = $this->input->post('kategori');

        $data = array(
            'kategori'     => $kategori
        );

        $this->model_kategori->tambah_kategori($data, 'tb_kategori');
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">Data Berhasil Ditambah!</div>');
        redirect('admin/data_kategori/index');
    }

    public function edit($id)
    {
        $where = array('id_kategori' => $id);
        $data['kategori'] = $this->model_kategori->edit_kategori($where, 'tb_kategori')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_kategori', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id         = $this->input->post('id_kategori');
        $kategori   = $this->input->post('kategori');

        $data = array(
            'kategori' => $kategori
        );

        $where = array(
            'id_kategori' => $id
        );

        $this->model_kategori->update_kategori($where, $data, 'tb_kategori');
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">Data Berhasil Diupdate!</div>');
        redirect('admin/data_kategori/index');
    }

    public function hapus($id)
    {
        $where = array('id_kategori' => $id);
        $this->model_kategori->hapus_kategori($where, 'tb_kategori');
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('admin/data_kategori/index');
    }
}
