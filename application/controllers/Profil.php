<?php

class Profil extends CI_Controller
{
    public function data_profil()
    {
        $data['profil'] = $this->db->get_where('tb_customer', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/profil/profil', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profil()
    {
        $data['profil'] = $this->db->get_where('tb_customer', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('user/profil/edit_profil', $data);
            $this->load->view('templates/footer');
        } else {
            $nama       = $this->input->post('nama');
            $username   = $this->input->post('username');
            $alamat     = $this->input->post('alamat');
            $telp       = $this->input->post('telp');
            $jenkel     = $this->input->post('jenkel');


            $this->db->set('nama', $nama);
            $this->db->set('alamat', $alamat);
            $this->db->set('telp', $telp);
            $this->db->set('jenkel', $jenkel);
            $this->db->where('username', $username);
            $this->db->update('tb_customer');


            $this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">
            Profil berhasil di Update!</div>');
            redirect('profil/edit_profil');
        }
    }

    public function edit_password()
    {
        $data['profil'] = $this->db->get_where('tb_customer', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim', [
            'required'      => 'Password Wajib diisi!!'
        ]);
        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[3]|matches[password2]', [
            'required'      => 'Password Wajib diisi!!',
            'matches'       => 'Password tidak sama!',
            'min_length'    => 'Password terlalu sedikit!'
        ]);
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('user/profil/edit_password', $data);
            $this->load->view('templates/footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password1 = $this->input->post('password1');
            if (password_verify($password_lama, $data['profil']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Password Lama Salah!</div>');
                redirect('profil/edit_password');
            } else {
                if ($password_lama == $password1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Tidak Boleh Sama!</div>');
                    redirect('profil/edit_password');
                } else {
                    //password sudah ok
                    $password = $password1;

                    $this->db->set('password', $password);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('tb_customer');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil Di Ubah!</div>');
                    redirect('profil/edit_password');
                }
            }
        }
    }
}
