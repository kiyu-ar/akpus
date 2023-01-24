<?php 
    class M_user extends CI_Model{
//---Dashboard---
        function get_top_monthly(){
            $this->slim = $this->load->database('slim',TRUE);
            $query = $this->slim->query('SELECT SUBSTRING(m.pin, 1, 3) as kode_prodi, p.nama_prodi as prodi, count(l.is_lent) as jumlah 
            FROM loan_history as l 
            LEFT JOIN member as m ON m.member_id = l.member_id
            LEFT JOIN mst_prodi as p ON SUBSTRING(m.pin, 1, 3) = p.nim_awal
            WHERE MONTH(l.input_date) = "04" AND YEAR(l.input_date) = "2022"
            group BY SUBSTRING(m.pin, 1, 3) order by count(l.is_lent) DESC LIMIT 5');
            return $query;
        }
//---User---
        function login($username){
            return $this->db->query("SELECT * FROM login WHERE username='$username'")->row();
        }
        public function get_data(){
            return $this->db->query("SELECT * FROM login WHERE id != 0");
            //return $this->db->get('login');
        }
        public function search_user($keyword){
            $where = "AND (username like '%$keyword%' OR nama like '%$keyword%')";
            return $this->db->query("SELECT * FROM login WHERE id != 0 $where");
            //return $this->db->get('login');
        }
        public function input_data($data, $tabel){
            $this->db->insert($tabel, $data);
        }
        public function hapus_data($where, $tabel){
            $this->db->where($where);
            $this->db->delete($tabel);
        }
        public function edit_data($where, $tabel){
            return $this->db->get_where($tabel, $where);
        }
        public function update_data($where, $data, $tabel){
            $this->db->where($where);
            $this->db->update($tabel, $data);
        }
        public function get_unsla(){
            $this->slim = $this->load->database('slim',TRUE);
            return $this->slim->query("SELECT * FROM mst_label");
        }
    }
?>