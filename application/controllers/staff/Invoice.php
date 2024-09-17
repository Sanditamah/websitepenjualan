<?php
class Invoice extends CI_Controller
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
        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('templates_staff/header');
        $this->load->view('templates_staff/sidebar');
        $this->load->view('staff/invoice', $data);
        $this->load->view('templates_staff/footer');
    }

    public function detail($id_invoice)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates_staff/header');
        $this->load->view('templates_staff/sidebar');
        $this->load->view('staff/detail_invoice', $data);
        $this->load->view('templates_staff/footer');
    }

    public function hapus($id)
    {
        $where = array('id_invoice' => $id);
        $this->model_invoice->hapus_invoice($where, 'tb_invoice');
        $this->session->set_flashdata('pesan', '<div class="alert-success" role="alert">Invoice Berhasil Dihapus!</div>');
        redirect('staff/invoice/index');
    }
}
