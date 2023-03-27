<?php
    class M_main extends CI_Model{
        public function get_data($table){
            return $this->db->get($table);
        }
        public function insert_data($data, $table){
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
        public function get_last_id($table){
            $this->db->select_max('id');
            return $this->db->get($table)->row()->id;
        }
        public function get_data_order($table, $column){
            $this->db->order_by($column);
            return $this->db->get($table);
        }
        public function get_nama_prodi($kode_prodi){
            $sql = "SELECT prodi FROM tbl_prodi where kode = ?";
            return $this->db->query($sql, array($kode_prodi))->row()->prodi;
        }
//---Informasi Koleksi---
        public function get_ebook(){
            return $this->db->query('SELECT * FROM list_ebook order by nama_buku, id')->result();
        }

//---Informasi Pemustaka---
        public function get_prodi($postData){
            $id_fakultas = array('id_fakultas' => $postData['dfakultas']);
            return $this->db->get_where('tbl_prodi', $id_fakultas)->result();
        }
        public function get_kode_prodi($postData){
            $id_prodi = $postData['dprodi'];
            $this->db->select('kode');
            $this->db->where('id_prodi = ', $id_prodi);
            return $this->db->get('tbl_prodi')->row('kode');
            //return $this->db->query("SELECT kode from tbl_prodi where id_prodi = '$id_prodi'")->result();
        }
        public function kunjungan_prodi($kode_prodi){
            $this->loker = $this->load->database('loker',TRUE);
            $sql = "SELECT YEAR(waktu_pinjam) as tahun, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=1 THEN 1 END) AS januari, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=2 THEN 1 END) AS februari, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=3 THEN 1 END) AS maret, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=4 THEN 1 END) AS april, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=5 THEN 1 END) AS mei, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=6 THEN 1 END) AS juni, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=7 THEN 1 END) AS juli, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=8 THEN 1 END) AS agustus, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=9 THEN 1 END) AS september, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=10 THEN 1 END) AS oktober, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=11 THEN 1 END) AS november, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=12 THEN 1 END) AS desember,
            COUNT(*) as total FROM 
            (SELECT m.pin, h.waktu_pinjam FROM history as h LEFT JOIN member as m 
             ON m.member_id = h.barcode_anggota WHERE SUBSTRING(m.pin,1,3) = ?) AS loker 
            GROUP BY YEAR(loker.waktu_pinjam)";
            return $this->loker->query($sql, array($kode_prodi));
        }
        public function kunjungan_total(){
            $this->loker = $this->load->database('loker',TRUE);
            return $this->loker->query("SELECT YEAR(waktu_pinjam) as tahun, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=1 THEN 1 END) AS januari, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=2 THEN 1 END) AS februari, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=3 THEN 1 END) AS maret, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=4 THEN 1 END) AS april, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=5 THEN 1 END) AS mei, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=6 THEN 1 END) AS juni, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=7 THEN 1 END) AS juli, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=8 THEN 1 END) AS agustus, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=9 THEN 1 END) AS september, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=10 THEN 1 END) AS oktober, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=11 THEN 1 END) AS november, 
            COUNT(CASE WHEN MONTH(loker.waktu_pinjam)=12 THEN 1 END) AS desember, 
            COUNT(*) as total FROM 
            (SELECT m.pin, h.waktu_pinjam FROM history as h LEFT JOIN member as m 
             ON m.member_id = h.barcode_anggota) AS loker
            GROUP BY YEAR(loker.waktu_pinjam)");
        }
        public function sirkulasi_prodi($kode_prodi){
            $this->slim = $this->load->database('slim',TRUE);
            $sql = "SELECT YEAR(loan_date) as tahun, 
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
            COUNT(CASE WHEN MONTH(loan_date)=12 THEN 1 END) AS desember,
            COUNT(*) as total FROM loan_history where is_lent = 1
            and SUBSTRING(member_id,1,3) = ? GROUP BY YEAR(loan_date)";
            return $this->slim->query($sql, array($kode_prodi));
        }
        public function sirkulasi_total(){
            $this->slim = $this->load->database('slim',TRUE);
            return $this->slim->query("SELECT YEAR(loan_date) as tahun, 
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
            COUNT(CASE WHEN MONTH(loan_date)=12 THEN 1 END) AS desember,
            COUNT(*) as total FROM loan_history where is_lent = 1 
            GROUP BY YEAR(loan_date)");
        }
        public function mandiri_prodi($kode_prodi){
            $this->digilib = $this->load->database('digilib',TRUE);
            $sql = "SELECT YEAR(tgl_upload) as tahun, 
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
                COUNT(CASE WHEN MONTH(tgl_upload)=12 THEN 1 END) AS desember,
                COUNT(*) as total FROM dok_detail where no_klas IS NULL and op_id = 0 and status = 1
                and SUBSTRING(nim,1,3) = ? GROUP BY YEAR(tgl_upload)";
                return $this->digilib->query($sql, array($kode_prodi));
        }
        public function mandiri_total(){
            $this->digilib = $this->load->database('digilib',TRUE);
            return $this->digilib->query("SELECT YEAR(tgl_upload) as tahun, 
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
                COUNT(CASE WHEN MONTH(tgl_upload)=12 THEN 1 END) AS desember,
                COUNT(*) as total FROM dok_detail where no_klas IS NULL and op_id = 0 and status = 1 
                GROUP BY YEAR(tgl_upload)");
        }

        public function cek_file($id){
            $query = $this->db->get_where('list_kunjungan', ['id' => $id]);
            return $query->row();
        }
//---Informasi Pustakawan---
        public function get_pegawai(){
            $sql = "SELECT CASE when jabatan = 'Kepala Perpustakaan' then 1 else 2 end as sort, t.* FROM list_pegawai as t 
            order by sort, substring(pangkat,1,1) DESC, substring(pangkat, 2,1) DESC";
            return $this->db->query($sql);
        }
        
        public function get_tabel_p(){
            $sql = "SELECT 
            count(CASE WHEN (pendidikan like '%S3%' AND pendidikan like '%perpustakaan%') THEN 1 END ) as S3,
            count(CASE WHEN (pendidikan like '%S2%' AND pendidikan like '%perpustakaan%') THEN 1 END ) as S2,
            count(CASE WHEN (pendidikan like '%S1%' AND pendidikan like '%perpustakaan%') THEN 1 END ) as S1,
            count(CASE WHEN (pendidikan like '%D4%' AND pendidikan like '%perpustakaan%') THEN 1 END ) as D4,
            count(CASE WHEN (pendidikan like '%D3%' AND pendidikan like '%perpustakaan%') THEN 1 END ) as D3,
            count(CASE WHEN (pendidikan like '%D2%' AND pendidikan like '%perpustakaan%') THEN 1 END ) as D2,
            count(CASE WHEN (pendidikan like '%D1%' AND pendidikan like '%perpustakaan%') THEN 1 END ) as D1,
            count(CASE WHEN (pendidikan not like '%perpustakaan%') THEN 1 END ) as Lain,
            count(*) as Total
            FROM list_pegawai WHERE jabatan = ? ";
            return $this->db->query($sql,array('pustakawan'))->result_array();
        }
        public function get_tabel_f(){
            $sql = "SELECT 
            count(CASE WHEN fungsional = 'PUSTAKAWAN MADYA' THEN 1 END) as 'PUSTAKAWAN MADYA',
            count(CASE WHEN fungsional = 'PUSTAKAWAN MUDA' THEN 1 END) as 'PUSTAKAWAN MUDA',
            count(CASE WHEN fungsional = 'PUSTAKAWAN PERTAMA' THEN 1 END) as 'PUSTAKAWAN PERTAMA',
            count(CASE WHEN fungsional = 'PUSTAKAWAN PENYELIA' THEN 1 END) as 'PUSTAKAWAN PENYELIA',
            count(CASE WHEN fungsional = 'PUSTAKAWAN PELAKSANA LANJUTAN' THEN 1 END) as 'PUSTAKAWAN PELAKSANA LANJUTAN',
            count(CASE WHEN fungsional = 'PUSTAKAWAN PELAKSANA' THEN 1 END) as 'PUSTAKAWAN PELAKSANA',
            count(*) as Total FROM list_pegawai WHERE jabatan='pustakawan'";
            return $this->db->query($sql)->result_array();
        }
        public function get_tabel_j(){
            $sql = "SELECT
            count(CASE WHEN pangkat = '4c' THEN 1 END) as 'IV/c',
            count(CASE WHEN pangkat = '4b' THEN 1 END) as 'IV/b',
            count(CASE WHEN pangkat = '4a' THEN 1 END) as 'IV/a', 
            count(CASE WHEN pangkat = '3d' THEN 1 END) as 'III/d',
            count(CASE WHEN pangkat = '3c' THEN 1 END) as 'III/c',
            count(CASE WHEN pangkat = '3b' THEN 1 END) as 'III/b',
            count(CASE WHEN pangkat = '3a' THEN 1 END) as 'III/a',
            count(CASE WHEN pangkat = '2d' THEN 1 END) as 'II/d',
            count(*) as Total FROM list_pegawai WHERE jabatan='pustakawan'";
            return $this->db->query($sql)->result_array();
        }
        public function get_tabel_ptinggi(){
            $sql = "SELECT 
            count(CASE WHEN pendidikan_tertinggi = 'Master' THEN 1 END) as 'Master',
            count(CASE WHEN pendidikan_tertinggi = 'Sarjana' THEN 1 END) as 'Sarjana',
            count(CASE WHEN pendidikan_tertinggi = 'Diploma' THEN 1 END) as 'Diploma',
            count(CASE WHEN pendidikan_tertinggi = 'SMA/Sederajat' THEN 1 END) as 'SMA/Sederajat',
            count(*) as Total FROM list_pegawai";
            return $this->db->query($sql)->result_array();
        }
        public function search_psdm($keyword){
            $key = $this->db->escape_like_str($keyword);
            $sql = "SELECT * FROM list_psdm WHERE peserta like '%".$key."%' OR nama like '%".$key."%'  order by jenis";
            return $this->db->query($sql)->result();
        }
        public function search_psdm_kepala($keyword){
            $key = $this->db->escape_like_str($keyword);
            $sql = "SELECT * FROM list_psdm_kepala WHERE peserta like '%".$key."%' OR nama like '%".$key."%'  order by jenis";
            return $this->db->query($sql)->result();
        }
//---Informasi Lain---
        public function get_sarpras(){
            $this->db->order_by('jenis');
            $this->db->order_by('subjenis');
            $this->db->order_by('id');
            $sql = $this->db->get('list_sarpras');
            return $sql;
        }
        public function get_kerjasama(){
            $this->db->order_by('jenis');
            $sql = $this->db->get('list_kerjasama');
            return $sql;
        }
        public function cek_file_kuesioner($id){
            $query = $this->db->get_where('list_kuesioner', ['id' => $id]);
            return $query->row();
        }
        public function download($id){
			$query = $this->db->get_where('list_kuesioner',['id'=>$id]);
			return $query->row_array();
		}
        public function get_promosi(){
            $sql = "SELECT *, tbl.nama_jenis FROM list_promosi as l LEFT JOIN tbl_jenis_promosi as tbl ON l.jenis=tbl.id ORDER BY l.tanggal_dari DESC";
            return $this->db->query($sql)->result();
        }
        public function get_komponen(){
            $sql = "SELECT *, tbl.komponen FROM list_komponen as l LEFT JOIN tbl_jenis_komponen as tbl ON l.jenis = tbl.id";
            return $this->db->query($sql)->result();
        }
//---Informasi SOP---
        public function get_sop(){
            $sql = "SELECT sp.*, tds.divisi FROM list_sop AS sp left join tbl_divisi_sop AS tds ON sp.id_divisi = tds.id order by id_divisi,nomor";
            return $this->db->query($sql)->result();
        }
        public function search_sop($keyword){
            $key = $this->db->escape_like_str($keyword);
            $sql = "SELECT sp.*, tds.divisi FROM list_sop AS sp left join tbl_divisi_sop AS tds ON sp.id_divisi = tds.id 
                    WHERE tds.divisi like '%".$key."%' OR sp.nomor like '%".$key."%' OR sp.nama_sop like '%".$key."%' 
                    OR sp.deskripsi like '%".$key."%' order by id_divisi,nomor";
                return $this->db->query($sql)->result();
        }
        public function cek_file_sop($id){
            $query = $this->db->get_where('list_sop', ['id' => $id]);
            return $query->row();
        }
    }
?>