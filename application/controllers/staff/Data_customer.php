<?php

class data_customer extends CI_Controller
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
        $data['customer'] = $this->model_customer->tampil_customer()->result();
        $this->load->view('templates_staff/header');
        $this->load->view('templates_staff/sidebar');
        $this->load->view('staff/data_customer', $data);
        $this->load->view('templates_staff/footer');
    }

    public function hapus($id)
    {
        $where = array('id_customer' => $id);
        $this->model_customer->hapus_customer($where, 'tb_customer');
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('staff/data_customer/index');
    }
}
