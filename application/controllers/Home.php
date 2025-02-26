<?php

class Home extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model('m_user');
                $this->load->model('m_main');
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
        public function dashboard2(){
                $top= $this->m_user->get_top_monthly()->result_array();
                $data['prodi_top'] = array_column($top,'prodi');
                $data['jumlah_top'] = array_column($top, 'jumlah');
                
                $this->load->view('dashboard2',$data);
                $this->load->view('diffdash/footer_dashboard');
        }

        public function update_changelog($update_id, $id, $action, $t_name, $v_name, $f_name){
                $id_user = $this->session->userdata('id_user');
                if($action == 1) $action = 'create data';
                else if($action == 2) $action = 'update data';
                else $action = 'update password';
                
                $changelog = array(
                    'id'        => $update_id,
                    'id_user'   => $id_user,
                    'nama_tabel' => $t_name,
                    'item_id'   => $id,
                    'action'    => $action,
                    'tanggal'   => date("Y-m-d h:i:s"),
                );
                $where = array('id' => $update_id);
                $this->m_main->update_data($where, $changelog, 'changelog');
                if($f_name == "empty"){redirect($v_name);}
                else{redirect($v_name.'/'.$f_name);}
            }

        public function insert_changelog($update_id, $id, $t_name, $v_name, $f_name){
                $id_user = $this->session->userdata('id_user');
                $changelog = array(
                        'id'        => $update_id,
                        'id_user'   => $id_user,
                        'nama_tabel' => $t_name,
                        'item_id'   => $id,
                        'action'    => 'delete data',
                        'tanggal'   => date("Y-m-d h:i:s"),
                    );
                $this->m_main->insert_data($changelog, 'changelog');
                if($f_name == "empty"){redirect($v_name);}
                else{redirect($v_name.'/'.$f_name);}
        }
}


