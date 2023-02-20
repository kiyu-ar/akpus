<?php
//empty($this->session->userdata('status'))
    Class User extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
        public function index(){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                if(($this->session->userdata('akses')==0) ||($this->session->userdata('akses')==1)){
                $data['login'] = $this->m_user->get_data()->result();
                $data['keyword'] = $this->input->get('keyword');
                if(!empty($this->input->get('keyword'))){
                    $data['login'] = $this->m_user->search_user($data['keyword'])->result();
                }

                $this->load->view('diffdash/header');
                $this->load->view('diffdash/sidebar');
                $this->load->view('admin/v_user',$data);
                $this->load->view('diffdash/footer');
                }else{
                     redirect ('home');
                }
        }}
        
        public function tambah(){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                if(($this->session->userdata('akses')==0) ||($this->session->userdata('akses')==1)){
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $passhash = password_hash($password, PASSWORD_DEFAULT);
                $nama = $this->input->post('nama');
                $akses = $this->input->post('akses');
                $change_last     = $this->m_main->get_last_id('changelog') + 1;
                $table_last      = $this->m_main->get_last_id('login') + 1;
                
                $update = array('id'=> $change_last);
                $this->m_main->input_data($update, 'changelog');

                $data = array(
                    'id' => $table_last,
                    'username'  => $username,
                    'password' => $passhash,
                    'nama' => $nama,
                    'akses' => $akses,
                    'update_id' => $change_last,
                );

                $this->m_user->input_data($data, 'login');
                redirect('Home/update_changelog/'.$change_last.'/'.$table_last.'/1/login/user/empty');
                }else{
                    redirect ('home');
            }
        }}

        public function hapus($id){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                if(($this->session->userdata('akses')==0) ||($this->session->userdata('akses')==1)){
                    $where = array ('id'=>$id);
                    $update_id = $this->m_main->get_last_id('changelog') + 1;
                    $this->m_user->hapus_data($where, 'login');
                    redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/login/user/empty');
                }else{
                    redirect ('home');
                }
        }}

        public function edit(){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                if(($this->session->userdata('akses')==0) ||($this->session->userdata('akses')==1)){
                    $id         = $this->input->post('id');
                    $username   = $this->input->post('username');
                    $nama       = $this->input->post('nama');
                    $akses      = $this->input->post('akses');
                    $change_last    = $this->m_main->get_last_id('changelog') + 1;

                    $update_id = array('id'=> $change_last);
                    $this->m_main->input_data($update_id, 'changelog');

                    $data = array(
                        'username'  => $username,
                        'nama'      => $nama,
                        'akses'     => $akses,
                        'update_id' => $change_last
                    );
                    $where = array('id' => $id);

                    $this->m_user->update_data($where, $data, 'login');
                    redirect('Home/update_changelog/'.$change_last.'/'.$id.'/2/login/user/empty');
                }else{
                    redirect ('home');
                }
        }}

        public function editpassword(){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                if(($this->session->userdata('akses')==0) ||($this->session->userdata('akses')==1)){
                    $id = $this->input->post('id');
                    $password = $this->input->post('password');
                    $passhash = password_hash($password, PASSWORD_DEFAULT);
                    $change_last    = $this->m_main->get_last_id('changelog') + 1;

                    $update_id = array('id'=> $change_last);
                    $this->m_main->input_data($update_id, 'changelog');

                    $data = array(
                        'password'  => $passhash,
                        'update_id' => $change_last,
                    );
                    $where = array('id' => $id);
                    $this->m_user->update_data($where, $data, 'login');
                    redirect('Home/update_changelog/'.$change_last.'/'.$id.'/3/login/user/empty');
                }else{
                    redirect ('home');
                }
        }}

        public function print(){
            $data['user'] = $this->m_user->get_data('login')->result();
            $this->load->view('print_user',$data);
        }
    }
?>