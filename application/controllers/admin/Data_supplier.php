<?php

class data_supplier extends CI_Controller
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
        $data['admin'] = $this->model_supplier->tampil_supplier()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_supplier', $data);
        $this->load->view('templates_admin/footer');
    }

    //Menambahkan Admin
    public function tambah_aksi_supplier()
    {
        $nama           = $this->input->post('nama');
        $jenkel         = $this->input->post('jenkel');
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $telp           = $this->input->post('telp');
        $alamat         = $this->input->post('alamat');
        $email          = $this->input->post('email');
        $role_id        = $this->input->post('role_id');

        $data = array(
            'nama'          => $nama,
            'jenkel'        => $jenkel,
            'username'      => $username,
            'password'      => $password,
            'telp'          => $telp,
            'alamat'        => $alamat,
            'email'         => $email,
            'role_id'       => $role_id
        );

        $this->model_supplier->tambah_supplier($data, 'tb_supplier');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data berhasil di tambah!</div>');
        redirect('admin/data_supplier/index');
    }

    //Edit Admin
    public function edit($id)
    {
        $where = array('id_supplier' => $id);
        $data['admin'] = $this->model_supplier->edit_supplier($where, 'tb_supplier')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_supplier', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id         = $this->input->post('id_supplier');
        $nama       = $this->input->post('nama');
        $jenkel     = $this->input->post('jenkel');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $telp       = $this->input->post('telp');
        $alamat     = $this->input->post('alamat');
        $email      = $this->input->post('email');
        $role_id    = $this->input->post('role_id');


        $data = array(
            'nama'      => $nama,
            'jenkel'    => $jenkel,
            'username'  => $username,
            'password'  => $password,
            'telp'      => $telp,
            'alamat'    => $alamat,
            'email'     => $email,
            'role_id'   => $role_id,
        );

        $where = array(
            'id_supplier' => $id
        );

        $this->model_supplier->update_supplier($where, $data, 'tb_supplier');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data admin berhasil di Update!</div>');
        redirect('admin/data_supplier/index');
    }

    //Hapus Admin
    public function hapus($id)
    {
        $where = array('id_supplier' => $id);
        $this->model_supplier->hapus_supplier($where, 'tb_supplier');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data berhasil di hapus!</div>');
        redirect('admin/data_supplier/index');
    }
}
