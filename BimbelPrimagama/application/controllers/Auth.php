<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Pendaftar_model');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Auth');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header_auth");
            $this->load->view("auth/login");
            $this->load->view("layout/footer_auth");
        } else {
            $this->cek_login();
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('#');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[5]',
            [

                'required' => 'Password harus diisi'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('layout/header_auth', $data);
            $this->load->view('auth/registrasi');
            $this->load->view("layout/footer_auth");
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => "User",
                'tanggal_daftar' => time()
            ];
            $this->userrole->insert($data);
            echo '<script type="text/javascript"> window.onload = function () { alert("Akun Berhasil DiBuat !"); } </script>';
            redirect('auth');
        }
    }

    public function cek_login()
    {

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);
                $id = $this->session->userdata['id'];
                $datap = $this->db->get_where('data_pendaftar', array('id_user' => $id))->row_array();
                $datax = $this->db->get_where('pembayaran', array('id_user' => $id))->row_array();

                if ($user['role'] == 'Admin') {
                    redirect('Admin');
                } else if ($datap['id_user'] == $id and $datap['id_pendaftar'] == $datax['id_pendaftar']) {
                    redirect('User/Dashboard_late');
                   }   else if ($datap['id_user'] == $id) {
                        redirect('User');
                } else {
                    redirect('User/pendaftaran');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar !</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout! </div>');
        redirect('Index');
    }
}
