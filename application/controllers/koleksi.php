<?php
    Class Koleksi extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
        public function pengadaan(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('koleksi/v_pengadaan');
            $this->load->view('diffdash/footer');
        }
        public function jeniscetak(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('koleksi/v_jenis_cetak');
            $this->load->view('diffdash/footer');
        }
        public function koran(){
            $data['koran'] = $this->m_main->get_koran();
            $this->load->view('koleksi/iframe_koran',$data);
        }
        public function majalah(){
            $data['majalah'] = $this->m_main->get_majalah();
            $this->load->view('koleksi/iframe_majalah',$data);
        }
        public function jeniselektronik(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('koleksi/v_jenis_elektronik');
            $this->load->view('diffdash/footer');
        }
        public function statistik(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('koleksi/v_statistik');
            $this->load->view('diffdash/footer');
        }
    }    
?>