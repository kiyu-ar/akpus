<?php
    Class Login extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_user');
            $this->load->library('session');
        }
        public function index(){
            if(empty($this->session->userdata('status'))){
            $this->load->view('v_login.php');
            }
            else redirect('home/index');
        }
        public function proses_login(){
            $uname = $this->input->post('uname');
            $pass = $this->input->post('pass');
            $cek_login = $this->m_user->login($uname);

            if(empty($cek_login)){
                $this->session->set_flashdata('message','User tidak ditemukan');
                redirect('login/index');
            }else if ($uname == $cek_login->username){
                if(password_verify($pass, $cek_login->password)){
                    $data_session = array(
                        'status'    => 'login',
                        'id_user'   => $cek_login->id,
                        'akses'     => $cek_login->akses,
                        'username'  => $cek_login->username,
                        'password'  => $cek_login->password,
                        'nama'      => $cek_login->nama
                    );
                $this->session->set_userdata($data_session);
                redirect('home');
                }else{
                $this->session->set_flashdata('message','Password anda salah');
                redirect('login/index');}
            }else{
                $this->session->set_flashdata('message','Password anda salah');
                redirect('login/index');
            }
        }
        public function logout(){
            $this->session->sess_destroy();
            redirect(base_url());
        }
        public function hashpass(){
            //echo password_hash('admin', PASSWORD_DEFAULT);
            $cek_login = $this->m_user->login('admin', '$2y$10$GNc87hB30mupRFgyHevfiu/WbzdQemKqai7ht.wtBmxP8V/bpDaoO');
            if(password_verify('admin', $cek_login->password)){
                echo 'login berhasil';
            }
        }
    }
        
        
?>