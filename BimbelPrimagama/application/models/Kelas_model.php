<?php
defined('BASEPATH') or exit('No direct script access
allowed');
class Kelas_model extends CI_Model
{
    public $table = 'kelas';
    public $id = 'kelas.id_kelas';
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {

        $this->db->from($this->table);
        $this->db->order_by("desc_kelas", "asc");
        $query = $this->db->get();
        return $query->result_array();

       
    }
    function Bimbel($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $this->db->order_by('id_program_bimbel', 'ASC');
        return $this->db->from('program_bimbel')
            ->get()
            ->result();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
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
