<?php

class data_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '3') {
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
        $this->load->view('templates_pemilik/header');
        $this->load->view('templates_pemilik/sidebar');
        $this->load->view('pemilik/data_admin', $data);
        $this->load->view('templates_pemilik/footer');
    }
}
