<?php
    class M_main extends CI_Model{
        public function get_data($table){
            return $this->db->get($table);
        }
        public function input_data($data, $table){
            $this->db->insert($table, $data);
        }
        public function delete_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        public function edit_data($where, $table){
            return $this->db->get_where($table, $where);
        }
        public function update_data($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table, $data);
        }
//---Informasi Koleksi---
        public function get_koran(){
            return $this->db->get('list_koran')->result();
        }
        public function get_majalah(){
            return $this->db->query('SELECT id, nama_majalah, concat(tahun_dari, " - ", tahun_hingga) as tahun_tersedia FROM list_majalah')->result();
        }
        public function get_ebook(){
            return $this->db->query('SELECT * FROM list_ebook order by nama_buku, id')->result();
        }
        public function get_ejournal(){
            return $this->db->get('list_ejournal')->result();
        }

//---Informasi Pemustaka---
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
            COUNT(CASE WHEN MONTH(loan_date)=12 THEN 1 END) AS desember FROM loan_history where is_lent = 1
            and SUBSTRING(member_id,1,3) = '$kode_prodi' GROUP BY YEAR(loan_date)) AS dok1 
            JOIN (SELECT YEAR(loan_date) AS tahun2, COUNT(*) AS total FROM loan_history where is_return = 1
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
            COUNT(CASE WHEN MONTH(loan_date)=12 THEN 1 END) AS desember FROM loan_history where is_lent = 1 
            GROUP BY YEAR(loan_date)) AS dok1 
        JOIN (SELECT YEAR(loan_date) AS tahun2, COUNT(*) AS total FROM loan_history where is_return = 1
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
                COUNT(CASE WHEN MONTH(tgl_upload)=12 THEN 1 END) AS desember FROM dok_detail where no_klas IS NULL and op_id = 0 and status = 1
                and SUBSTRING(nim,1,3) = '$kode_prodi' GROUP BY YEAR(tgl_upload)) AS dok1 
            JOIN (SELECT YEAR(tgl_upload) AS tahun2, COUNT(*) AS total FROM dok_detail where no_klas IS NULL and op_id = 0 and status = 1 
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
                COUNT(CASE WHEN MONTH(tgl_upload)=12 THEN 1 END) AS desember FROM dok_detail where no_klas IS NULL and op_id = 0 and status = 1 
                GROUP BY YEAR(tgl_upload)) AS dok1 
            JOIN (SELECT YEAR(tgl_upload) AS tahun2, COUNT(*) AS total FROM dok_detail where no_klas IS NULL and op_id = 0 and status = 1 
                GROUP BY YEAR(tgl_upload)) AS dok2 ON dok2.tahun2 = dok1.tahun");
        }

        public function get_kunjungan(){
            return $this->db->get('list_kunjungan')->result();
        }

//---Informasi Pustakawan---
        public function get_pegawai(){
            return $this->db->query('SELECT CASE when jabatan = "Kepala Perpustakaan" then 1 else 2 end as sort, t.* FROM list_pegawai as t 
            order by sort, substring(pangkat,1,1) DESC, substring(pangkat, 2,1) DESC');
        }
        public function get_tabel_p(){
            return $this->db->query('SELECT 
            count(CASE WHEN (pendidikan like "%S3%" AND pendidikan like "%perpustakaan%") THEN 1 END ) as S3,
            count(CASE WHEN (pendidikan like "%S2%" AND pendidikan like "%perpustakaan%") THEN 1 END ) as S2,
            count(CASE WHEN (pendidikan like "%S1%" AND pendidikan like "%perpustakaan%") THEN 1 END ) as S1,
            count(CASE WHEN (pendidikan like "%D4%" AND pendidikan like "%perpustakaan%") THEN 1 END ) as D4,
            count(CASE WHEN (pendidikan like "%D3%" AND pendidikan like "%perpustakaan%") THEN 1 END ) as D3,
            count(CASE WHEN (pendidikan like "%D2%" AND pendidikan like "%perpustakaan%") THEN 1 END ) as D2,
            count(CASE WHEN (pendidikan like "%D1%" AND pendidikan like "%perpustakaan%") THEN 1 END ) as D1,
            count(CASE WHEN (pendidikan not like "%perpustakaan%") THEN 1 END ) as Lain,
            count(*) as Total
            FROM list_pegawai WHERE jabatan="pustakawan"')->result_array();
        }
        public function get_tabel_f(){
            return $this->db->query('SELECT 
            count(CASE WHEN fungsional = "PUSTAKAWAN MADYA" THEN 1 END) as "PUSTAKAWAN MADYA",
            count(CASE WHEN fungsional = "PUSTAKAWAN MUDA" THEN 1 END) as "PUSTAKAWAN MUDA",
            count(CASE WHEN fungsional = "PUSTAKAWAN PERTAMA" THEN 1 END) as "PUSTAKAWAN PERTAMA",
            count(CASE WHEN fungsional = "PUSTAKAWAN PENYELIA" THEN 1 END) as "PUSTAKAWAN PENYELIA",
            count(CASE WHEN fungsional = "PUSTAKAWAN PELAKSANA LANJUTAN" THEN 1 END) as "PUSTAKAWAN PELAKSANA LANJUTAN",
            count(CASE WHEN fungsional = "PUSTAKAWAN PELAKSANA" THEN 1 END) as "PUSTAKAWAN PELAKSANA",
            count(*) as Total
            FROM list_pegawai WHERE jabatan="pustakawan"')->result_array();
        }
        public function get_tabel_j(){
            return $this->db->query('SELECT
            count(CASE WHEN pangkat = "4c" THEN 1 END) as "IV/c",
            count(CASE WHEN pangkat = "4b" THEN 1 END) as "IV/b",
            count(CASE WHEN pangkat = "4a" THEN 1 END) as "IV/a", 
            count(CASE WHEN pangkat = "3d" THEN 1 END) as "III/d",
            count(CASE WHEN pangkat = "3c" THEN 1 END) as "III/c",
            count(CASE WHEN pangkat = "3b" THEN 1 END) as "III/b",
            count(CASE WHEN pangkat = "3a" THEN 1 END) as "III/a",
            count(CASE WHEN pangkat = "2d" THEN 1 END) as "II/d",
            count(*) as Total
            FROM list_pegawai WHERE jabatan="pustakawan"')->result_array();
        }
        public function get_tabel_ptinggi(){
            return $this->db->query('SELECT count(CASE WHEN pendidikan_tertinggi = "Master" THEN 1 END) as "Master",
            count(CASE WHEN pendidikan_tertinggi = "Sarjana" THEN 1 END) as "Sarjana",
            count(CASE WHEN pendidikan_tertinggi = "Diploma" THEN 1 END) as "Diploma",
            count(CASE WHEN pendidikan_tertinggi = "SMA/Sederajat" THEN 1 END) as "SMA/Sederajat",
            count(*) as Total FROM list_pegawai')->result_array();
        }
        public function get_psdm(){
            return $this->db->query('SELECT * FROM list_psdm ORDER BY jenis')->result();
        }
        public function search_psdm($keyword){
            $where = "WHERE peserta like '%$keyword%' OR nama like '%$keyword%' ";
            return $this->db->query("SELECT * FROM list_psdm $where order by jenis")->result();
        }
//---Informasi Lain---
        public function get_sarpras(){
            return $this->db->query('SELECT * FROM list_sarpras ORDER BY jenis, subjenis, id');
        }
//---Informasi SOP---
        public function get_sop(){
            return $this->db->query("SELECT sp.*, tds.divisi FROM list_sop AS sp left join tbl_divisi_sop AS tds ON sp.id_divisi = tds.id order by id_divisi,nomor")->result();
        }
        public function search_sop($keyword){
            $where = "WHERE tds.divisi like '%$keyword%' OR sp.nomor like '%$keyword%' OR sp.nama_sop like '%$keyword%' OR sp.deskripsi like '%$keyword%'";
            return $this->db->query("SELECT sp.*, tds.divisi FROM list_sop AS sp left join tbl_divisi_sop AS tds ON sp.id_divisi = tds.id $where order by id_divisi,nomor")->result();
        }
        public function edit_sop($where,$table){
            return $this->db->get_where($table, $where);
        }
        public function update_sop($where, $data, $tabel){
            $this->db->where($where);
            $this->db->update($tabel, $data);
        }
    }
?>