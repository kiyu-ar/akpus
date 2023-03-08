<?php
    Class Pustakawan extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
//DAFTAR STAFF
        public function daftar_staf(){
            $data['akses'] = $this->session->userdata('akses');
            $data['staf'] = $this->m_main->get_pegawai()->result();
            
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_daftar_staf',$data);
            $this->load->view('diffdash/footer');
        }
        public function tambah(){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                $nama       = $this->input->post('nama');
                $pangkat    = $this->input->post('pangkat');
                $fungsional = $this->input->post('fungsional');
                $pendidikan = $this->input->post('pendidikan');
                $pendidikan_lain = $this->input->post('pendidikan_lain');
                $pendidikan_tertinggi = $this->input->post('pendidikan_tertinggi');
                $change_last     = $this->m_main->get_last_id('changelog') + 1;
                $table_last      = $this->m_main->get_last_id('list_pegawai') + 1;

                $change_log = array('id'=> $change_last);
                $this->m_main->insert_data($change_log, 'changelog');

                $data = array(
                    'id'    => $table_last,
                    'nama'  => $nama,
                    'pangkat' => $pangkat,
                    'jabatan' => "pustakawan",
                    'fungsional' => $fungsional,
                    'pendidikan' => $pendidikan,
                    'pendidikan_lain' => $pendidikan_lain,
                    'pendidikan_tertinggi' => $pendidikan_tertinggi,
                    'status'    => "aktif",
                    'update_id' => $change_last,
                );

                $this->m_main->insert_data($data, 'list_pegawai');
                redirect('Home/update_changelog/'.$change_last.'/'.$table_last.'/1/list_pegawai/pustakawan/daftar_staf');
            }
        }
        public function tambah_non(){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                $nama       = $this->input->post('nama');
                $pangkat    = $this->input->post('pangkat');
                $jabatan    = $this->input->post('jabatan');
                $pendidikan = $this->input->post('pendidikan');
                $pendidikan_lain = $this->input->post('pendidikan_lain');
                $pendidikan_tertinggi = $this->input->post('pendidikan_tertinggi');
                $change_last     = $this->m_main->get_last_id('changelog') + 1;
                $table_last      = $this->m_main->get_last_id('list_pegawai') + 1;

                $change_log = array('id'=> $change_last);
                $this->m_main->insert_data($change_log, 'changelog');

                $data = array(
                    'id'    => $table_last,
                    'nama'  => $nama,
                    'pangkat' => $pangkat,
                    'jabatan' => $jabatan,
                    'fungsional' => "-",
                    'pendidikan' => $pendidikan,
                    'pendidikan_lain' => $pendidikan_lain,
                    'pendidikan_tertinggi' => $pendidikan_tertinggi,
                    'status'    => "aktif",
                    'update_id' => $change_last,
                );

                $this->m_main->insert_data($data, 'list_pegawai');
                redirect('Home/update_changelog/'.$change_last.'/'.$table_last.'/1/list_pegawai/pustakawan/daftar_staf');
            }
        }
        public function hapus($id){
            $where = array ('id'=>$id);
            $update_id = $this->m_main->get_last_id('changelog') + 1;
            $this->m_main->delete_data($where, 'list_pegawai');

            redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_pegawai/pustakawan/daftar_staf');
        }
        public function edit_staf(){
            $id             = $this->input->post('id');
            $nama           = $this->input->post('nama');
            $pangkat        = $this->input->post('pangkat');
            $jabatan        = $this->input->post('jabatan');
            $fungsional     = $this->input->post('fungsional');
            $pendidikan     = $this->input->post('pendidikan');
            $pendidikan_lain        = $this->input->post('pendidikan_lain');
            $pendidikan_tertinggi   = $this->input->post('pendidikan_tertinggi');
            $status         = $this->input->post('status');
            $change_last    = $this->m_main->get_last_id('changelog') + 1;

            $update_id = array('id'=> $change_last);
            $this->m_main->insert_data($update_id, 'changelog');
            $data = array(
                'nama'              => $nama,
                'pangkat'           => $pangkat,
                'jabatan'           => $jabatan,
                'fungsional'        => $fungsional,
                'pendidikan'        => $pendidikan,
                'pendidikan_lain'   => $pendidikan_lain,
                'pendidikan_tertinggi' => $pendidikan_tertinggi,
                'status'            => $status,
                'update_id'         => $change_last,
            );
            $where = array('id' => $id);
            $this->m_main->update_data($where, $data, 'list_pegawai');
            redirect('Home/update_changelog/'.$change_last.'/'.$id.'/2/list_pegawai/pustakawan/daftar_staf');
        }
//DATA STATISTIK PUSTAKAWAN
        public function pstatistik(){
            $data['tabel1'] = $this->m_main->get_tabel_p()[0];
            $data['tabel2'] = $this->m_main->get_tabel_f()[0];
            $data['tabel3'] = $this->m_main->get_tabel_j()[0];
            $data['tabel4'] = $this->m_main->get_tabel_ptinggi()[0];

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_pstatistik', $data);
            $this->load->view('diffdash/footer');
        }
        public function sdm(){
            $data['keyword'] = $this->input->get('keyword');
            if(!empty($this->input->get('keyword'))){
                $data['psdm_kepala'] = $this->m_main->search_psdm_kepala($data['keyword']);
                $data['psdm'] = $this->m_main->search_psdm($data['keyword']);
            }
            else{
                $data['psdm_kepala'] = $this->m_main->get_data_order('list_psdm_kepala', 'jenis')->result();    
                $data['psdm'] = $this->m_main->get_data_order('list_psdm', 'jenis')->result();
            }
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_sdm', $data);
            $this->load->view('diffdash/footer');
        }
        public function tambah_psdm($psdm){
            $jenis      = $this->input->post('jenis');
            $nama       = $this->input->post('nama');
            $peserta    = $this->input->post('peserta');
            $tanggal_dari    = $this->input->post('tanggal_dari');
            $tanggal_hingga    = $this->input->post('tanggal_hingga');
            $file       = $_FILES['filePdf'];
            $change_last     = $this->m_main->get_last_id('changelog') + 1;
            if($psdm == 1){$table_last      = $this->m_main->get_last_id('list_psdm_kepala') + 1;}
            else          {$table_last      = $this->m_main->get_last_id('list_psdm') + 1;}

            $change_log = array('id'=> $change_last);
            $this->m_main->insert_data($change_log, 'changelog');


            if ($file == ''){
                $file = '';
            }else{
                $config['upload_path'] = './assets/files/psdm';
                $config['allowed_types'] = 'jpeg|jpg|pdf';
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('filePdf')){
                    echo "upload gagal"; die();
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                'id'        => $table_last,
                'jenis'     => $jenis,
                'nama'      => $nama,
                'peserta'   => $peserta,
                'tanggal_dari'   => $tanggal_dari,
                'tanggal_hingga' => $tanggal_hingga,
                'file'           => $file,
                'update_id'      => $change_last,
            );
            if($psdm == 1){
                $this->m_main->insert_data($data,'list_psdm_kepala');
                redirect ('Home/update_changelog/'.$change_last.'/'.$table_last.'/1/list_psdm_kepala/pustakawan/sdm');
            }else{
                $this->m_main->insert_data($data,'list_psdm');
                redirect ('Home/update_changelog/'.$change_last.'/'.$table_last.'/1/list_psdm/pustakawan/sdm');
            }
        }
        public function hapus_psdm($tabel,$id){
            $where = array ('id'=>$id);
            $update_id = $this->m_main->get_last_id('changelog') + 1;
            if($tabel == 1){
                $this->m_main->delete_data($where, 'list_psdm_kepala');
                redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_psdm_kepala/pustakawan/sdm');
            }else{
                $this->m_main->delete_data($where, 'list_psdm');
                redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_psdm/pustakawan/sdm');
            }
        }
        public function edit_psdm($tabel){
            $id             = $this->input->post('id');  
            $jenis          = $this->input->post('jenis');
            $nama           = $this->input->post('nama');
            $peserta        = $this->input->post('peserta');
            $tanggal_dari   = $this->input->post('tanggal_dari');
            $tanggal_hingga = $this->input->post('tanggal_hingga');
            $file_old       = $this->input->post('file_old');
            $file           = $_FILES['fileinput'];
            $update_id      = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array('id'=> $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            if($file == ''){
                $file = $file_old;
            }else{
                $config['upload_path'] = './assets/files/psdm';
                $config['allowed_types'] = 'png|jpg|jpeg';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('fileinput')){
                    $file = $file_old;
                }else{
                    $file = $this->upload->data('file_name');
                }
            }
            $data = array(
                'jenis'     => $jenis,
                'nama'      => $nama,
                'peserta'   => $peserta,
                'tanggal_dari'   => $tanggal_dari,
                'tanggal_hingga' => $tanggal_hingga,
                'file'           => $file,
                'update_id'      => $update_id,
            );

            $where = array ('id'=>$id);
            if($tabel == 1){
                $this->m_main->update_data($where, $data, 'list_psdm_kepala');
                redirect('Home/update_changelog/'.$update_id.'/'.$id.'/2/list_psdm_kepala/pustakawan/sdm') ;
            }else{
                $this->m_main->update_data($where, $data, 'list_psdm');
                redirect('Home/update_changelog/'.$update_id.'/'.$id.'/2/list_psdm/pustakawan/sdm');
            }
        }

    }    
?>