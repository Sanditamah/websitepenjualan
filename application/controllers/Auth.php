<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    //Login dan Logout Customer
    public function login_customer()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Wajib diisi!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password Wajib diisi!!'
        ]);
        if ($this->form_validation->run() ==  FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/login/form_login');
            $this->load->view('templates/footer');
        } else {
            //validasinya sukses
            $auth = $this->model_auth->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Username atau Password Anda Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('auth/login_customer');
            } else {
                $this->session->set_userdata('username', $auth->username);
                redirect('dashboard');
            }
        }
    }

    public function logout()
    {
        $this->cart->destroy();
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Berhasil Logout!</div>');
        redirect('dashboard');
    }
    //Function Customer Berakhir


    // Login dan Logout admin
    public function login_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Wajib diisi!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password Wajib diisi!!'
        ]);
        if ($this->form_validation->run() ==  FALSE) {
            $this->load->view('templates_admin/header');
            $this->load->view('admin/form_login_admin');
            $this->load->view('templates_admin/footer');
        } else {
            $auth = $this->model_auth->cek_login_admin();
            if ($auth == FALSE) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Username atau Password Anda Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('auth/login_admin');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/dashboard_admin');
                        break;
                    case 2:
                        redirect('staff/dashboard_staff');
                        break;
                    case 3:
                        redirect('pemilik/dashboard_pemilik');
                        break;
                    case 4:
                        redirect('supplier/dashboard_supplier');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout_admin()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Berhasil Logout!</div>');
        redirect('dashboard');
    }
    //Function admin berakhir


    //Register Customer
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Wajib diisi!!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_customer.username]', [
            'required'  => 'Username Wajib diisi!!',
            'is_unique' => 'Opss Username sudah digunakan!'
        ]);
        $this->form_validation->set_rules('telp', 'Telp', 'required', [
            'required'  => 'Nomor Telepon Wajib diisi!!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'       => 'Password tidak sama!',
            'min_length'    => 'Password terlalu sedikit!',
            'required'      => 'Password Kosong!!'

        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/register/form_register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama'     => htmlspecialchars($this->input->post('nama', true)),
                'username' => $this->input->post('username', true),
                'telp' => $this->input->post('telp', true),
                'password' => $this->input->post('password1', true)
            ];

            $this->db->insert('tb_customer', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Registrasi Akun, Silahkan Login!</div>');
            redirect('auth/login_customer');
        }
    }
}
