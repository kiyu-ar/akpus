<?php
    Class Koleksi extends CI_Controller{
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