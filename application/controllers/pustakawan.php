<?php
    Class Pustakawan extends CI_Controller{
        public function pstatistik(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('diffdash/footer');
        }
        public function sdm(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('diffdash/footer');
        }
    }    
?>