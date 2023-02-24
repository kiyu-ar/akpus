<?php
    Class Sop extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
        public function tambah_divisi(){
            $divisi     = $this->input->post('newdiv'); 
            $table_last = $this->m_main->get_last_id('tbl_divisi_sop') + 1;
            $update_id  = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            $data = array(
                'id'        => $table_last,
                'divisi'    => $divisi,
                'update_id' => $update_id,
            );
            $this->m_main->insert_data($data, 'tbl_divisi_sop');
            redirect('Home/update_changelog/'.$update_id.'/'.$table_last.'/1/tbl_divisi_sop/sop/sop');
        }
        public function tambah_sop(){
            $id_divisi  = $this->input->post('id_divisi');
            $nomor      = $this->input->post('nomor');
            $nama_sop   = $this->input->post('nama_sop');
            $deskripsi  = $this->input->post('deskripsi');
            $file       = $_FILES['file'];
            $table_last = $this->m_main->get_last_id('list_sop') + 1;
            $update_id  = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            if ($file == ''){
                $file = '';
            }else{
                $config['upload_path'] = './assets/files/sop';
                $config['allowed_types'] = 'jpg|pdf';
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file')){
                    echo "upload gagal"; die();
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                'id'        => $table_last,
                'id_divisi' => $id_divisi,
                'nomor'     => $nomor,
                'nama_sop'  => $nama_sop,
                'deskripsi' => $deskripsi,
                'file'      => $file,
                'update_id' => $update_id,
            );
            $this->m_main->insert_data($data,'list_sop');
            redirect ('Home/update_changelog/'.$update_id.'/'.$table_last.'/1/list_sop/sop/sop');
        }
        public function sop(){
            $data['divisi'] = $this->m_main->get_data('tbl_divisi_sop')->result();
            $data['keyword'] = $this->input->get('keyword');
            if(!empty($this->input->get('keyword'))){
                $data['sop'] = $this->m_main->search_sop($data['keyword']);
            }else{
                $data['sop']= $this->m_main->get_sop();
            }

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('sop/v_sop',$data);
            $this->load->view('diffdash/footer');
        }
        public function view_file($id){
            
        }
        public function hapus_sop($id){
            $data_sop = new m_main;
            if($data_sop->cek_file_sop($id)){
                $data_s = $data_sop->cek_file_sop($id);
                if(file_exists("./assets/files/sop/".$data_s->file)){
                    unlink("./assets/files/sop/".$data_s->file);
                }
            $update_id = $this->m_main->get_last_id('changelog') + 1;
            $where = array ('id'=>$id);
            $this->m_main->delete_data($where, 'list_sop');
            redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_sop/sop/sop');
            }
        }
        public function edit_sop(){
            $id         = $this->input->post('id');
            //$id_divisi  = $this->input->post('id_divisi');
            $nomor      = $this->input->post('nomor');
            $nama_sop   = $this->input->post('nama_sop');
            $deskripsi  = $this->input->post('deskripsi');
            $file       = $_FILES['file'];
            $file_old   = $this->input->post('file_old');
            $update_id  = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            if ($file == ''){
                $file = '';
            }else{
                $config['upload_path'] = './assets/files/sop';
                $config['allowed_types'] = 'jpg|pdf';
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file')){
                    $file = $file_old;
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                //'id_divisi' => $id_divisi,
                'nomor'     => $nomor,
                'nama_sop'  => $nama_sop,
                'deskripsi' => $deskripsi,
                'file'      => $file,
                'update_id' => $update_id,
            );
            $where = array('id' => $id);
            $this->m_main->update_data($where, $data, 'list_sop');
            redirect('Home/update_changelog/'.$update_id.'/'.$id.'/2/list_sop/sop/sop');
        }
    }    
?>