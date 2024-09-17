<?php

class data_admin extends CI_Controller
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
        $data['admin'] = $this->model_admin->tampil_admin()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_admin', $data);
        $this->load->view('templates_admin/footer');
    }

    //Menambahkan Admin
    public function tambah_aksi_admin()
    {
        $hak_akses      = $this->input->post('hak_akses');
        $nama           = $this->input->post('nama');
        $jenkel         = $this->input->post('jenkel');
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $telp           = $this->input->post('telp');
        $alamat         = $this->input->post('alamat');
        $email          = $this->input->post('email');
        $role_id        = $this->input->post('role_id');

        $data = array(
            'hak_akses'     => $hak_akses,
            'nama'          => $nama,
            'jenkel'        => $jenkel,
            'username'      => $username,
            'password'      => $password,
            'telp'          => $telp,
            'alamat'        => $alamat,
            'email'         => $email,
            'role_id'       => $role_id
        );

        $this->model_admin->tambah_admin($data, 'tb_admin');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data berhasil di tambah!</div>');
        redirect('admin/data_admin/index');
    }

    //Edit Admin
    public function edit($id)
    {
        $where = array('id_admin' => $id);
        $data['admin'] = $this->model_admin->edit_admin($where, 'tb_admin')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_admin', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id         = $this->input->post('id_admin');
        $hak_akses  = $this->input->post('hak_akses');
        $nama       = $this->input->post('nama');
        $jenkel     = $this->input->post('jenkel');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $telp       = $this->input->post('telp');
        $alamat     = $this->input->post('alamat');
        $email      = $this->input->post('email');
        $role_id    = $this->input->post('role_id');


        $data = array(
            'hak_akses' => $hak_akses,
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
            'id_admin' => $id
        );

        $this->model_admin->update_admin($where, $data, 'tb_admin');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data admin berhasil di Update!</div>');
        redirect('admin/data_admin/index');
    }

    //Hapus Admin
    public function hapus($id)
    {
        $where = array('id_admin' => $id);
        $this->model_admin->hapus_admin($where, 'tb_admin');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data berhasil di hapus!</div>');
        redirect('admin/data_admin/index');
    }
}
