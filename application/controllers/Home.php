<?php

class Home extends CI_Controller {
	public function index()
	{
        $this->load->view('diffdash/header');
        $this->load->view('diffdash/sidebar');
        $this->load->view('home_view');
        
        $this->load->view('diffdash/footer');
	}
}


