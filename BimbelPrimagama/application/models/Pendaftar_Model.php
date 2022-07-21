<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Pendaftar_model extends CI_Model
{
    public $table = 'data_pendaftar';
    public $id = 'data_pendaftar.id_pendaftar';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->select('*');
        $this->db->from('data_pendaftar m');
        $this->db->join('kelas p', 'm.kelas = p.id_kelas');
        $this->db->join('program_bimbel b', 'm.program_bimbel = b.id_program_bimbel');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_2()
    {
        $this->db->select('id_user');
        $this->db->from('data_pendaftar');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getdata()
    {
        
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        
        $this->db->select('*');
        $this->db->from('data_pendaftar m');
        $this->db->join('kelas p', 'm.kelas = p.id_kelas');
        $this->db->join('program_bimbel b', 'm.program_bimbel = b.id_program_bimbel');
        $this->db->where('m.id_pendaftar', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_view($id)
    {
        $id = $this->session->userdata['id'];  // dapatkan id user yg login
        $this->db->select('*');
        $this->db->from('data_pendaftar m');
        $this->db->join('kelas p', 'm.kelas = p.id_kelas');
        $this->db->join('program_bimbel b', 'm.program_bimbel = b.id_program_bimbel');
        $this->db->where('m.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_pdf($id)
    {
        $id = $this->session->userdata['id'];  // dapatkan id user yg login
        $this->db->select('*');
        $this->db->from('data_pendaftar m');
        $this->db->join('kelas p', 'm.kelas = p.id_kelas');
        $this->db->join('program_bimbel b', 'm.program_bimbel = b.id_program_bimbel');
        $this->db->join('pembayaran d', 'm.id_pendaftar = d.id_pendaftar');
        $this->db->where('m.id_user', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
   

  
    
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
   public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}