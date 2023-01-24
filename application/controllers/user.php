<?php
//empty($this->session->userdata('status'))
    Class User extends CI_Controller{
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
                $id = $this->input->post('id');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $passhash = password_hash($password, PASSWORD_DEFAULT);
                $nama = $this->input->post('nama');
                $akses = $this->input->post('akses');

                $data = array(
                    'id' => $id,
                    'username'  => $username,
                    'password' => $passhash,
                    'nama' => $nama,
                    'akses' => $akses,
                );

                $this->m_user->input_data($data, 'login');
                redirect('user');
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
                    $this->m_user->hapus_data($where, 'login');
                    redirect('user');
                }else{
                    redirect ('home');
                }
        }}

        public function edit($id){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                if(($this->session->userdata('akses')==0) ||($this->session->userdata('akses')==1)){
                    $where = array ('id'=>$id);
                    $data['login'] = $this->m_user->edit_data($where, 'login')->result();
                    $this->load->view('diffdash/header');
                    $this->load->view('diffdash/sidebar');
                    $this->load->view('admin/v_edituser',$data);
                    $this->load->view('diffdash/footer');
                }else{
                    redirect ('home');
                }
        }}

        public function update(){
            $id         = $this->input->post('id');
            $username   = $this->input->post('username');
            $nama       = $this->input->post('nama');
            $akses      = $this->input->post('akses');

            $data = array(
                'username'  => $username,
                'nama'      => $nama,
                'akses'     => $akses,
            );
            $where = array('id' => $id);

            $this->m_user->update_data($where, $data, 'login');
            redirect('user');
        }

        public function editpassword($id){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                if(($this->session->userdata('akses')==0) ||($this->session->userdata('akses')==1)){
                    $where = array ('id'=>$id);
                    $data['login'] = $this->m_user->edit_data($where, 'login')->result();
                    $this->load->view('diffdash/header');
                    $this->load->view('diffdash/sidebar');
                    $this->load->view('admin/v_gantipassword',$data);
                    $this->load->view('diffdash/footer');
                }else{
                    redirect ('home');
                }
        }}

        public function updatepassword(){
            $id = $this->input->post('id');
            $password = $this->input->post('password');
            $passhash = password_hash($password, PASSWORD_DEFAULT);
            $data = array('password'  => $passhash);
            $where = array('id' => $id);

            $this->m_user->update_data($where, $data, 'login');
            redirect('user');
        }

        public function print(){
            $data['user'] = $this->m_user->get_data('login')->result();
            $this->load->view('print_user',$data);
        }
    }
?>