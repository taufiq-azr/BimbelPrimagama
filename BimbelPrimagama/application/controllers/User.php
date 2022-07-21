<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dompdf\Dompdf as Dompdf;

class User extends CI_Controller
{
   

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Daftar_model');
        $this->load->model('Pendaftar_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Bukti_model');
        $this->load->model('Kelas_model');
        $this->load->model('Program_model');
        $this->load->model('User_model', 'userrole');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_pendaftar'] = $this->Pendaftar_model->get();
        $data['user'] = $this->Kelas_model->get();
        
        $this->load->view("layout/header", $data);
        $this->load->view("user/dashboard_user", $data);
        $this->load->view("layout/footer", $data);
    }
    public function export($id)
    {
        
        $data['kelas'] = $this->Kelas_model->get();
        $data['program_bimbel'] = $this->Program_model->get();
        $data['data_pendaftar']= $this->Pendaftar_model->get_pdf($id);
        $dompdf = new Dompdf();
        $this->data['all_jual'] = $this->Pendaftar_model->get_pdf($id);
        $this->data['title'] = 'Form Pendaftaran Bimbel Primagama';
        $this->data['no'] = 1;
        $dompdf->setPaper('A4', 'potrait');
        $html = $this->load->view('user/View_Pdf', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Form Data Pendaftar Bimbel Primagam Tanggal ' . date('d F Y'), array("Attachment" => false));
        $this->index();
    }

    public function View_Data($id)
    {
        $data['kelas'] = $this->Kelas_model->get();
        $data['program_bimbel'] = $this->Program_model->get();
        $data['data_pendaftar']= $this->Pendaftar_model->get_view($id);
      
        //$data['data_pendaftar'] = $this->Pendaftar_model->getId($id);
       
       $this->load->view("user/view_data_user", $data);
    
       // $this->load->view("layout/footer");
    }
    public function Pembayaran($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->get();
        
        
        $id_s = $this->session->userdata['id'];
        $id = $this->db->get_where('data_pendaftar', array('id_user' => $id_s))->row_array();
        $datap = $this->db->get_where('pembayaran', array('id_pendaftar' => $id['id_pendaftar']))->row_array();
        $data['program_bimbel'] = $this->Program_model->get();
        $data['data_pendaftar'] = $this->Pendaftar_model->get_view($id);
        $dataP = $this->Pendaftar_model->get_view($id);
        $this->form_validation->set_rules('tanggal_bayar', 'Tanggal Pembayaran', 'required', [
            'required' => 'Tanggal Pembayaran Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("user/vw_pembayaran", $data);
        }else{

        $data = [
            'id_user' => $id_s,
            'id_pendaftar'  => $dataP['id_pendaftar'],
            'nama_pembayaran' => $dataP['nama'],
            'jenis_kelamin' => $dataP['jenis_kelamin'],
            'program_bimbel' =>$dataP['program_bimbel'],
            'total_pembayaran' => $dataP['harga'],
            'tanggal_bayar' => $this->input->post('tanggal_bayar'),
           
        ];

        $this->Pembayaran_model->insert($data);
        redirect('User/Dashboard_late');
        
    }
    }
    public function Slide(){
        $id_s = $this->session->userdata['id'];
        $id = $this->db->get_where('data_pendaftar', array('id_user' => $id_s))->row_array();
        $datap = $this->db->get_where('pembayaran', array('id_pendaftar' => $id['id_pendaftar']))->row_array();
        $dataR = $this->db->get_where('pembayaran', array('id_pendaftar' => $datap['id_pendaftar']))->row_array();
       if($dataR['jenis_pembayaran'] == "Transfer"){
        redirect('User/Upload_Gambar');
       }else {
        redirect('User');
       }
    }
    public function Upload_Gambar(){

      
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       
        $id_s = $this->session->userdata['id'];
        $id = $this->db->get_where('data_pendaftar', array('id_user' => $id_s))->row_array();
        $this->form_validation->set_rules('tanggal_bayar', 'Tanggal Pembayaran', 'required', [
            'required' => 'Tanggal Pembayaran Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
       // $this->load->view("layout/header", $data);
		$this->load->view("user/vw_tambah_gambar", $data);
        //$this->load->view("layout/footer");
        } else {
        $data = [
            'id_pendaftar' => $id['nama'],
            'tanggal_bayar' => $this->input->post('tanggal_bayar'),
            
        ];
        $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/pembayaran/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
            }
        }
        $this->Bukti_model->insert($data, $upload_image);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data
            Mahasiswa Berhasil Ditambah!</div>');
        //redirect('Auth/logout');
        }  
    }
    public function Pembayaran_data($id)
    {
        $data['kelas'] = $this->Kelas_model->get();
        $data['program_bimbel'] = $this->Program_model->get();
        $data['data_pendaftar'] = $this->Pendaftar_model->get_view($id);
        $dataP = $this->Pendaftar_model->get_view($id);

        $this->load->view("user/vw_pembayaran", $data);
        
    
         
    }
    
    public function Dashboard_late()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_pendaftar'] = $this->Pendaftar_model->get();
        $data['user'] = $this->Kelas_model->get();
        
        $this->load->view("layout/header", $data);
        $this->load->view("user/dashboard_user_late", $data);
     
    }

    public function View_Edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_pendaftar'] = $this->Pendaftar_model->getById($id);
        $data['kelas'] = $this->Kelas_model->get();
        $data['program_bimbel'] = $this->Program_model->get();
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required', [
            'required' => 'Nama Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('nim', 'NIM', 'required', [
            'required' => 'NIM Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required', [
            'required' => 'Prodi Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required', [
            'required' => 'Asal Sekolah Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric', [
            'required' => 'NO HP Mahasiswa Wajib di isi',
            'numeric' => 'NO HP harus Angka'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin Mahasiswa Wajib di isi',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data );
            $this->load->view("user/vw_edit_pendaftar", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'no_hp' => $this->input->post('no_hp'),
                'agama' => $this->input->post('agama'),
                'kecamatan' => $this->input->post('kecamatan'),
                'program_bimbel' => $this->input->post('program_bimbel'),
                'biaya_bimbel' => $this->input->post('biaya_bimbel'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'no_telpon_ayah' => $this->input->post('no_telpon_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'no_telpon_ibu' => $this->input->post('no_telpon_ibu'),
                'tanggal_daftar' => time()
            ];
            $id = $this->input->post('id_pendaftar');
            $this->Pendaftar_model->update(['id_pendaftar' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success"
                role="alert">Data Pendaftar Berhasil DiUbah!</div>');
            redirect('User');
        }
    }

    public function pendaftaran()
    {
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Kelas_model->get();
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama Pendaftar Wajib di isi'
        ]);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required', [
            'required' => 'Kelas Pendaftar Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin Pendaftar Wajib di isi'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
            'required' => 'Tanggal Lahir Pendaftar Wajib di isi'
        ]);
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required', [
            'required' => 'No Hp Pendaftar Wajib di isi'
        ]);
        $this->form_validation->set_rules('agama', 'Agama', 'required', [
            'required' => 'Agama Pendaftar Wajib di isi'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
            'required' => 'Kecamatan Pendaftar Wajib di isi',
        ]);
        $this->form_validation->set_rules('program_bimbel', 'Program Bimbel', 'required', [
            'required' => 'Program Bimbel Pendaftar Wajib di isi',
        ]);
        $this->form_validation->set_rules('biaya_bimbel', 'Biaya Bimbel', 'required', [
            'required' => 'Biaya Bimbel Pendaftar Wajib di isi',
        ]);
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required', [
            'required' => 'Nama Ayah Pendaftar Wajib di isi',
        ]);
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required', [
            'required' => 'Nama Ibu Pendaftar Wajib di isi',
        ]);
        $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'required', [
            'required' => 'Pekerjaan Ayah Pendaftar Wajib di isi',
        ]);
        $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required', [
            'required' => 'Pekerjaan Ibu Pendaftar Wajib di isi',
        ]);
        $this->form_validation->set_rules('no_telpon_ayah', 'No Telpon Ayah', 'required', [
            'required' => 'NO Telpon Ayah Pendaftar Wajib di isi',
        ]);
        $this->form_validation->set_rules('no_telpon_ibu', 'No Telpon Ibu', 'required', [
            'required' => 'No Telpon Ibu Pendaftar Wajib di isi',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("user/vw_pendaftar", $data);
          
        } else {
            $data = [
                'id_user' =>$this->session->userdata('id'),
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'no_hp' => $this->input->post('no_hp'),
                'agama' => $this->input->post('agama'),
                'kecamatan' => $this->input->post('kecamatan'),
                'program_bimbel' => $this->input->post('program_bimbel'),
                'biaya_bimbel' => $this->input->post('biaya_bimbel'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'no_telpon_ayah' => $this->input->post('no_telpon_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'no_telpon_ibu' => $this->input->post('no_telpon_ibu'),
                'tanggal_daftar' => time()
            ];
            $this->Daftar_model->insert($data);
           
            redirect('User');
          
           
        }
    }


    function get_bimbel()
    {
        $id_kelas = $this->input->post('id_kelas');
        $data = $this->Kelas_model->Bimbel($id_kelas);
        echo json_encode($data);
    }
}
