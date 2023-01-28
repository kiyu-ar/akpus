<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Excel extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_batch($data){
        $this->db->insert_batch('pengadaan',$data);
        if($this->db->affected_rows()>0)
        {
            return 1;
        }else
        {
            return 0;
        }
    }

    public function list_pengadaan()
    {
        $this->db->select('*');
        $this->db->from('pengadaan');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampilan_tabel()
    {
        $query = $this->db->get('pengadaan');
        return $query->result();
    }
}