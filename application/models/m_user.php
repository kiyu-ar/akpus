<?php 
    class M_user extends CI_Model{
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