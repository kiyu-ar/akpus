<?php
    class M_main extends CI_Model{
        public function get_fakultas(){
            return $this->db->get('tbl_fakultas')->result();
        }
        public function get_prodi($postData){
            $id_fakultas = array('id_fakultas' => $postData['dfakultas']);
            $q = $this->db->get_where('tbl_prodi', $id_fakultas)->result();
            return $q;
        }
        public function get_kode_prodi($postData){
            $id_prodi = $postData['dprodi'];
            $this->db->select('kode');
            $this->db->where('id_prodi = ', $id_prodi);
            return $this->db->get('tbl_prodi')->row('kode');
            //return $this->db->query("SELECT kode from tbl_prodi where id_prodi = '$id_prodi'")->result();
        }
        public function sirkulasi_prodi($kode_prodi){
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
            and SUBSTRING(member_id,1,3) = '$kode_prodi' GROUP BY YEAR(loan_date)) AS dok1 
        JOIN (SELECT YEAR(loan_date) AS tahun2, COUNT(*) AS total FROM `loan_history` where is_return = 1
            and SUBSTRING(member_id,1,3) = '$kode_prodi' GROUP BY YEAR(loan_date)) AS dok2 ON dok2.tahun2 = dok1.tahun");
        }
        public function sirkulasi_total(){
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
        public function mandiri_prodi($kode_prodi){
            $this->digilib = $this->load->database('digilib',TRUE);
            return $this->digilib->query("SELECT * FROM (SELECT YEAR(tgl_upload) as tahun, 
                COUNT(CASE WHEN MONTH(tgl_upload)=1 THEN 1 END) AS januari, 
                COUNT(CASE WHEN MONTH(tgl_upload)=2 THEN 1 END) AS februari, 
                COUNT(CASE WHEN MONTH(tgl_upload)=3 THEN 1 END) AS maret, 
                COUNT(CASE WHEN MONTH(tgl_upload)=4 THEN 1 END) AS april, 
                COUNT(CASE WHEN MONTH(tgl_upload)=5 THEN 1 END) AS mei, 
                COUNT(CASE WHEN MONTH(tgl_upload)=6 THEN 1 END) AS juni, 
                COUNT(CASE WHEN MONTH(tgl_upload)=7 THEN 1 END) AS juli, 
                COUNT(CASE WHEN MONTH(tgl_upload)=8 THEN 1 END) AS agustus, 
                COUNT(CASE WHEN MONTH(tgl_upload)=9 THEN 1 END) AS september, 
                COUNT(CASE WHEN MONTH(tgl_upload)=10 THEN 1 END) AS oktober, 
                COUNT(CASE WHEN MONTH(tgl_upload)=11 THEN 1 END) AS november, 
                COUNT(CASE WHEN MONTH(tgl_upload)=12 THEN 1 END) AS desember FROM `dok_detail` where no_klas IS NULL and op_id = 0 and status = 1
                and SUBSTRING(nim,1,3) = '$kode_prodi' GROUP BY YEAR(tgl_upload)) AS dok1 
            JOIN (SELECT YEAR(tgl_upload) AS tahun2, COUNT(*) AS total FROM `dok_detail` where no_klas IS NULL and op_id = 0 and status = 1 
                and SUBSTRING(nim,1,3) = '$kode_prodi' GROUP BY YEAR(tgl_upload)) AS dok2 ON dok2.tahun2 = dok1.tahun");
        }
        public function mandiri_total(){
            $this->digilib = $this->load->database('digilib',TRUE);
            return $this->digilib->query("SELECT * FROM (SELECT YEAR(tgl_upload) as tahun, 
                COUNT(CASE WHEN MONTH(tgl_upload)=1 THEN 1 END) AS januari, 
                COUNT(CASE WHEN MONTH(tgl_upload)=2 THEN 1 END) AS februari, 
                COUNT(CASE WHEN MONTH(tgl_upload)=3 THEN 1 END) AS maret, 
                COUNT(CASE WHEN MONTH(tgl_upload)=4 THEN 1 END) AS april, 
                COUNT(CASE WHEN MONTH(tgl_upload)=5 THEN 1 END) AS mei, 
                COUNT(CASE WHEN MONTH(tgl_upload)=6 THEN 1 END) AS juni, 
                COUNT(CASE WHEN MONTH(tgl_upload)=7 THEN 1 END) AS juli, 
                COUNT(CASE WHEN MONTH(tgl_upload)=8 THEN 1 END) AS agustus, 
                COUNT(CASE WHEN MONTH(tgl_upload)=9 THEN 1 END) AS september, 
                COUNT(CASE WHEN MONTH(tgl_upload)=10 THEN 1 END) AS oktober, 
                COUNT(CASE WHEN MONTH(tgl_upload)=11 THEN 1 END) AS november, 
                COUNT(CASE WHEN MONTH(tgl_upload)=12 THEN 1 END) AS desember FROM `dok_detail` where no_klas IS NULL and op_id = 0 and status = 1 
                GROUP BY YEAR(tgl_upload)) AS dok1 
            JOIN (SELECT YEAR(tgl_upload) AS tahun2, COUNT(*) AS total FROM `dok_detail` where no_klas IS NULL and op_id = 0 and status = 1 
                GROUP BY YEAR(tgl_upload)) AS dok2 ON dok2.tahun2 = dok1.tahun");
        }
        public function get_divisi_sop(){
            return $this->db->get('tbl_divisi_sop')->result();
        }
        public function input_divisi($data, $tabel){
            $this->db->insert($tabel, $data);
        }
        public function get_sop_pengolahan(){
            return $this->db->query("SELECT sp.*, tds.divisi FROM sop_pengolahan AS sp left join tbl_divisi_sop AS tds ON sp.id_divisi = tds.id order by id_divisi,nomor")->result();
        }
        public function search_sop($keyword){
            $where = "WHERE tds.divisi like '%$keyword%' OR sp.nomor like '%$keyword%' OR sp.nama_sop like '%$keyword%' OR sp.deskripsi like '%$keyword%'";
            return $this->db->query("SELECT sp.*, tds.divisi FROM sop_pengolahan AS sp left join tbl_divisi_sop AS tds ON sp.id_divisi = tds.id $where order by id_divisi,nomor")->result();
        }
        public function input_sop($data, $tabel){
            $this->db->insert($tabel, $data);
        }
        public function edit_sop($where,$table){
            return $this->db->get_where($table, $where);
        }
        public function update_sop($where, $data, $tabel){
            $this->db->where($where);
            $this->db->update($tabel, $data);
        }
        public function delete_sop($where, $tabel){
            $this->db->where($where);
            $this->db->delete($tabel);
        }
    }
?>