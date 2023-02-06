<?php

class Home extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model('m_user');
        }
        public function index(){
                $this->load->view('diffdash/header');
                $this->load->view('diffdash/sidebar');
                $this->load->view('home_view');
                                
                $this->load->view('diffdash/footer_dashboard');
        }

        public function dashboard(){
                //$data['top'] = $this->m_user->get_top_monthly()->result();
                $top= $this->m_user->get_top_monthly()->result_array();
                $data['prodi_top'] = array_column($top,'prodi');
                $data['jumlah_top'] = array_column($top, 'jumlah');

                $this->load->view('dashboard',$data);
                $this->load->view('diffdash/footer_dashboard');
        }
}


