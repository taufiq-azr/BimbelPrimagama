<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Pendaftar_model');
        $this->load->model('Program_model');
        $this->load->model('Kelas_model');
        $this->load->model('Pembayaran_model');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_pendaftar'] = $this->Pendaftar_model->get();
        $data['program_bimbel'] = $this->Program_model->get();
        $this->load->view("layout/header_admin");
        $this->load->view("admin/vw_data_user", $data);
        $this->load->view("layout/footer_admin");
    }
    public function View_Data($id)
    {
        $data['kelas'] = $this->Kelas_model->get();
        $data['program_bimbel'] = $this->Program_model->get();
        $data['data_pendaftar'] = $this->Pendaftar_model->getById($id);
        //$data['data_pendaftar'] = $this->Pendaftar_model->getId($id);
        $this->load->view("layout/header_admin");
        $this->load->view("admin/view_detail_user", $data);
        $this->load->view("layout/footer_admin");
    }

    public function View_Kelola()
    {
        $data['kelas'] = $this->Kelas_model->get();
       
      
        $data['user'] = $this->userrole->get_user();
        $this->load->view("layout/header_admin");
        $this->load->view("admin/view_kelola_user", $data);
        $this->load->view("layout/footer_admin");
    }
    public function View_Kelola_Admin()
    {
        $data['kelas'] = $this->Kelas_model->get();
        $data['user'] = $this->userrole->get_admin();
        $this->load->view("layout/header_admin");
        $this->load->view("admin/view_kelola_admin", $data);
        $this->load->view("layout/footer_admin");
    }
    public function View_Tambah_Admin()
    {

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
            $this->load->view('admin/view_tambah_admin');
            $this->load->view("layout/footer_auth");
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => "Admin",
                'tanggal_daftar' => time()
            ];
            $this->userrole->insert($data);
            echo '<script type="text/javascript"> window.onload = function () { alert("Akun Berhasil DiBuat !"); } </script>';
            redirect('Admin/View_Kelola_Admin');
        }
    }

    public function hapus($id)
    {
        $this->userrole->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon
                fas fa-info-circle"></i>Data Prodi tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
                class="icon fas fa-check-circle"></i>Data Prodi Berhasil Dihapus!</div>');
        }
        redirect('Admin/View_Kelola');
    }
    public function hapus_pembayaran($id)
    {
        $this->Pembayaran_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon
                fas fa-info-circle"></i>Data Prodi tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
                class="icon fas fa-check-circle"></i>Data Prodi Berhasil Dihapus!</div>');
        }
        redirect('Admin/View_Kelola_pembayaran');
    }
    public function hapus_pendaftar($id)
    {
        $this->Pendaftar_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon
                fas fa-info-circle"></i>Data Prodi tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
                class="icon fas fa-check-circle"></i>Data Prodi Berhasil Dihapus!</div>');
        }
        redirect('Admin');
    }
    public function hapus_admin($id)
    {
        $this->userrole->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon
                fas fa-info-circle"></i>Data Prodi tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
                class="icon fas fa-check-circle"></i>Data Prodi Berhasil Dihapus!</div>');
        }
        redirect('Admin/View_Kelola_Admin');
    }
    public function View_Kelola_Pembayaran()
    {

        $data['user'] = $this->Pembayaran_model->get();
        $this->load->view("layout/header_admin");
        $this->load->view("admin/view_kelola_pembayaran", $data);
        $this->load->view("layout/footer_admin");
    }
    public function View_Edit_Pembayaran($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembayaran'] = $this->Pembayaran_model->getById($id);
        $this->form_validation->set_rules('status', 'Status', 'required', [
			'required' => 'Status Pendaftar Wajib di isi'
		]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header_admin");
            $this->load->view("admin/view_pembayaran", $data);
            $this->load->view("layout/footer_admin");
        } else {
            $data = [
                'id_pendaftar' => $this->input->post('id_pendaftar'),     
                'nama_pembayaran' => $this->input->post('nama_pembayaran'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'program_bimbel' => $this->input->post('program_bimbel'),
                'total_pembayaran' => $this->input->post('total_pembayaran'),
                'tanggal_bayar' => $this->input->post('tanggal_bayar'),
                'status' => $this->input->post('status'),

            ];
            $this->Pembayaran_model->update(['id' => $id], $data);
            redirect('Admin/View_Kelola_Pembayaran');
            
        }
    }
   
}
