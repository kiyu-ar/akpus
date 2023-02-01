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
                    'id' => $id,
                    'nama'  => $nama,
                    'pangkat' => $pangkat,
                    'jabatan' => $jabatan,
                    'fungsional' => $fungsional,
                    'pendidikan' => $pendidikan,
                    'pendidikan_lain' => $pendidikan_lain,
                    'pendidikan_tertinggi' => $pendidikan_tertinggi,
                    'status'    => $status,
                );

                $this->m_main->input_data($data, 'tbl_pegawai');
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
                    'id' => $id,
                    'nama'  => $nama,
                    'pangkat' => $pangkat,
                    'jabatan' => $jabatan,
                    'fungsional' => $fungsional,
                    'pendidikan' => $pendidikan,
                    'pendidikan_lain' => $pendidikan_lain,
                    'pendidikan_tertinggi' => $pendidikan_tertinggi,
                    'status'    => $status,
                );

                $this->m_main->input_data($data, 'tbl_pegawai');
                redirect('pustakawan/daftar_staf');
            }
        }
        public function hapus($id){
            $where = array ('id'=>$id);
            $this->m_main->delete_data($where, 'tbl_pegawai');
            redirect('pustakawan/daftar_staf');
        }
        public function edit($id){
            $where = array ('id'=>$id);
            $data['pustakawan'] = $this->m_main->edit_data($where,'tbl_pegawai')->result();
            
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_edit_pustakawan',$data);
            $this->load->view('diffdash/footer');
        }
        public function edit_non($id){
            $where = array ('id'=>$id);
            $data['nonpustakawan'] = $this->m_main->edit_data($where,'tbl_pegawai')->result();
            
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_edit_nonpustakawan',$data);
            $this->load->view('diffdash/footer');
        }
        public function update(){
            $id             = $this->input->post('id');
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

            $this->m_main->update_data($where, $data, 'tbl_pegawai');
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

        public function sdm(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_sdm');
            $this->load->view('diffdash/footer');
        }
    }    
?>