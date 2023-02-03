<?php
    Class Pustakawan extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
        public function daftar_staf(){
            $data['akses'] = $this->session->userdata('akses');
            $data['pustakawan'] = $this->m_main->get_pegawai()->result();
            

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_daftar_staf',$data);
            $this->load->view('diffdash/footer');
        }
        public function tambah(){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                $id         = $this->input->post('id');
                $nama       = $this->input->post('nama');
                $pangkat    = $this->input->post('pangkat');
                $jabatan    = "pustakawan";
                $fungsional = $this->input->post('fungsional');
                $pendidikan = $this->input->post('pendidikan');
                $pendidikan_lain = $this->input->post('pendidikan_lain');
                $pendidikan_tertinggi = $this->input->post('pendidikan_tertinggi');
                $status = "aktif";

                $data = array(
                    'id'    => $id,
                    'nama'  => $nama,
                    'pangkat' => $pangkat,
                    'jabatan' => $jabatan,
                    'fungsional' => $fungsional,
                    'pendidikan' => $pendidikan,
                    'pendidikan_lain' => $pendidikan_lain,
                    'pendidikan_tertinggi' => $pendidikan_tertinggi,
                    'status'    => $status,
                );

                $this->m_main->input_data($data, 'list_pegawai');
                redirect('pustakawan/daftar_staf');
            }
        }
        public function tambah_non(){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                $id         = $this->input->post('id');
                $nama       = $this->input->post('nama');
                $pangkat    = $this->input->post('pangkat');
                $jabatan    = $this->input->post('jabatan');
                $fungsional = "-";
                $pendidikan = $this->input->post('pendidikan');
                $pendidikan_lain = $this->input->post('pendidikan_lain');
                $pendidikan_tertinggi = $this->input->post('pendidikan_tertinggi');
                $status     = "aktif";

                $data = array(
                    'id'    => $id,
                    'nama'  => $nama,
                    'pangkat' => $pangkat,
                    'jabatan' => $jabatan,
                    'fungsional' => $fungsional,
                    'pendidikan' => $pendidikan,
                    'pendidikan_lain' => $pendidikan_lain,
                    'pendidikan_tertinggi' => $pendidikan_tertinggi,
                    'status'    => $status,
                );

                $this->m_main->input_data($data, 'list_pegawai');
                redirect('pustakawan/daftar_staf');
            }
        }
        public function hapus($id){
            $where = array ('id'=>$id);
            $this->m_main->delete_data($where, 'list_pegawai');
            redirect('pustakawan/daftar_staf');
        }
        public function edit($id){
            $where = array ('id'=>$id);
            $data['pustakawan'] = $this->m_main->edit_data($where,'list_pegawai')->result();
            
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_edit_pustakawan',$data);
            $this->load->view('diffdash/footer');
        }
        public function edit_non($id){
            $where = array ('id'=>$id);
            $data['nonpustakawan'] = $this->m_main->edit_data($where,'list_pegawai')->result();
            
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_edit_nonpustakawan',$data);
            $this->load->view('diffdash/footer');
        }
        public function update(){
            $nama           = $this->input->post('nama');
            $pangkat        = $this->input->post('pangkat');
            $jabatan        = $this->input->post('jabatan');
            $fungsional     = $this->input->post('fungsional');
            $pendidikan     = $this->input->post('pendidikan');
            $pendidikan_lain        = $this->input->post('pendidikan_lain');
            $pendidikan_tertinggi   = $this->input->post('pendidikan_tertinggi');
            $status         = $this->input->post('status');
            $data = array(
                'nama'              => $nama,
                'pangkat'           => $pangkat,
                'jabatan'           => $jabatan,
                'fungsional'        => $fungsional,
                'pendidikan'        => $pendidikan,
                'pendidikan_lain'   => $pendidikan_lain,
                'pendidikan_tertinggi' => $pendidikan_tertinggi,
                'status'            => $status,
            );
            $where = array('id' => $id);

            $this->m_main->update_data($where, $data, 'list_pegawai');
            redirect('pustakawan/daftar_staf');
        }
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
        public function tambah_psdm(){
            $id         = $this->input->post('id');
            $jenis      = $this->input->post('jenis');
            $nama       = $this->input->post('nama');
            $peserta    = $this->input->post('peserta');
            $tanggal_dari    = $this->input->post('tanggal_dari');
            $tanggal_hingga    = $this->input->post('tanggal_hingga');
            $file       = $_FILES['filePdf'];

            if ($file == ''){
                $file = '';
            }else{
                $config['upload_path'] = './assets/files';
                $config['allowed_types'] = 'jpg|pdf';
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('filePdf')){
                    echo "upload gagal"; die();
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                'id' => $id,
                'jenis' => $jenis,
                'nama' => $nama,
                'peserta' => $peserta,
                'tanggal_dari' => $tanggal_dari,
                'tanggal_hingga' => $tanggal_hingga,
                'file' => $file,
            );
            $this->m_main->input_data($data,'list_psdm');
            redirect ('pustakawan/sdm');
        }

        public function sdm(){
            $data['keyword'] = $this->input->get('keyword');
            if(!empty($this->input->get('keyword'))){
                $data['psdm'] = $this->m_main->search_psdm($data['keyword']);
            }
            else{
                $data['psdm'] = $this->m_main->get_psdm();
            }

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_sdm', $data);
            $this->load->view('diffdash/footer');
        }
    }    
?>