<?php
    Class Pustakawan extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
        public function daftar_pustakawan(){
            $data['akses'] = $this->session->userdata('akses');
            $data['pustakawan'] = $this->m_main->get_pustakawan();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pustakawan/v_daftar_pustakawan',$data);
            $this->load->view('diffdash/footer');
        }
        public function tambah(){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                $id         = $this->input->post('id');
                $nama       = $this->input->post('nama');
                $pangkat    = $this->input->post('pangkat');
                $fungsional = $this->input->post('fungsional');
                $pendidikan = $this->input->post('pendidikan');
                $pendidikan_lain = $this->input->post('pendidikan_lain');
                $pendidikan_tertinggi = $this->input->post('pendidikan_tertinggi');

                $data = array(
                    'id' => $id,
                    'nama'  => $nama,
                    'pangkat' => $pangkat,
                    'fungsional' => $fungsional,
                    'pendidikan' => $pendidikan,
                    'pendidikan_lain' => $pendidikan_lain,
                    'pendidikan_tertinggi' => $pendidikan_tertinggi,
                );

                $this->m_main->input_data($data, 'pustakawan');
                redirect('pustakawan/daftar_pustakawan');
            }
        }
        public function hapus($id){
            $this->m_main->delete_data($id, 'pustakawan');
            redirect('pustakawan/daftar_pustakawan');
        }
        public function edit($id){

        }
        public function pstatistik(){
            $tabel1 = $this->m_main->get_tabel1();
            $tabel2 = $this->m_main->get_tabel2();
            $tabel3 = $this->m_main->get_tabel3();
            $data['tabel1'] = $tabel1[0];
            $data['tabel2'] = $tabel2[0];
            $data['tabel3'] = $tabel3[0];


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