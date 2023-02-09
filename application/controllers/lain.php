<?php
    Class Lain extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
        public function sarpras2(){
            $data['sarpras'] = $this->m_main->get_sarpras()->result();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_sarpras2', $data);
            $this->load->view('diffdash/footer');
        }
        public function sarpras(){
            $data['sarpras'] = $this->m_main->get_data('list_sarpras2')->result();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_sarpras', $data);
            $this->load->view('diffdash/footer');
        }
        public function kuesioner(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_kuesioner');
            $this->load->view('diffdash/footer');
        }
        public function promosi(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_promosi');
            $this->load->view('diffdash/footer');
        }
        public function restools(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('diffdash/footer');
        }
        public function anggaran(){
            $data['akses'] = $this->session->userdata('akses');
            $data['anggaran'] = $this->m_main->get_data('list_anggaran')->result();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_anggaran', $data);
            $this->load->view('diffdash/footer');
        }
        public function kerjasama(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_kerjasama');
            $this->load->view('diffdash/footer');
        }
        
        public function penguat(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('diffdash/footer');
        }
    }    
?>