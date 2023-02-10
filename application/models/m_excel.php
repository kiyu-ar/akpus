<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Excel extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_batch($data){
        $this->db->insert_batch('list_pengadaan',$data);
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
        $this->db->from('list_pengadaan');
        $query = $this->db->get();
        return $query->result();
    }

    public function list_sirkulasi_total()
    {
        $this->slim = $this->load->database('slim',TRUE);
        return $this->slim->query("SELECT * FROM (SELECT YEAR(loan_date) as tahun, 
            COUNT(CASE WHEN MONTH(loan_date)=1 THEN 1 END) AS januari, 
            COUNT(CASE WHEN MONTH(loan_date)=2 THEN 1 END) AS februari, 
            COUNT(CASE WHEN MONTH(loan_date)=3 THEN 1 END) AS maret, 
            COUNT(CASE WHEN MONTH(loan_date)=4 THEN 1 END) AS april, 
            COUNT(CASE WHEN MONTH(loan_date)=5 THEN 1 END) AS mei, 
            COUNT(CASE WHEN MONTH(loan_date)=6 THEN 1 END) AS juni, 
            COUNT(CASE WHEN MONTH(loan_date)=7 THEN 1 END) AS juli, 
            COUNT(CASE WHEN MONTH(loan_date)=8 THEN 1 END) AS agustus, 
            COUNT(CASE WHEN MONTH(loan_date)=9 THEN 1 END) AS september, 
            COUNT(CASE WHEN MONTH(loan_date)=10 THEN 1 END) AS oktober, 
            COUNT(CASE WHEN MONTH(loan_date)=11 THEN 1 END) AS november, 
            COUNT(CASE WHEN MONTH(loan_date)=12 THEN 1 END) AS desember FROM `loan_history` where is_lent = 1 
            GROUP BY YEAR(loan_date)) AS dok1 
        JOIN (SELECT YEAR(loan_date) AS tahun2, COUNT(*) AS total FROM `loan_history` where is_return = 1
            GROUP BY YEAR(loan_date)) AS dok2 ON dok2.tahun2 = dok1.tahun");
    }

    public function tampilan_tabel()
    {
        $query = $this->db->get('list_pengadaan');
        return $query->result();
    }
}