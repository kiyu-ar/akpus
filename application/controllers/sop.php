<?php
    Class Sop extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
        public function tambah_divisi(){
            $id         = $this->input->post('id');
            $divisi     = $this->input->post('newdiv'); 
            $data = array(
                'id' => $id,
                'divisi' => $divisi,
            );
            $this->m_main->input_data($data, 'tbl_divisi_sop');
            redirect('sop/pengolahan');
        }
        public function tambah_pengolahan(){
            //$id = $this->input->post('id');
            $id_divisi  = $this->input->post('id_divisi');
            $nomor      = $this->input->post('nomor');
            $nama_sop   = $this->input->post('namaSop');
            $deskripsi  = $this->input->post('deskripsi');
            $file       = $_FILES['filePdf'];

            if ($file == ''){
                $file = '';
            }else{
                $config['upload_path'] = './assets/files';
                $config['allowed_types'] = 'jpg|pdf';
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('filePdf')){
                    echo "upload gagal"; die();
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                'id' => $id,
                'id_divisi' => $id_divisi,
                'nomor' => $nomor,
                'nama_sop' => $nama_sop,
                'deskripsi' => $deskripsi,
                'file' => $file,
            );
            $this->m_main->input_data($data,'sop_pengolahan');
            redirect ('sop/pengolahan');
        }
        public function pengolahan(){
            $data['divisi'] = $this->m_main->get_divisi_sop();
            $data['sop']= $this->m_main->get_sop_pengolahan();
            $data['keyword'] = $this->input->get('keyword');
            if(!empty($this->input->get('keyword'))){
                $data['sop'] = $this->m_main->search_sop($data['keyword']);
            }

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('sop/v_pengolahan',$data);
            $this->load->view('diffdash/footer');
        }
        public function view_file($id){
            
        }
        public function hapus_sop($id){
            $where = array ('id'=>$id);
            $this->m_main->delete_data($where, 'sop_pengolahan');
            redirect('sop/pengolahan');
        }
        public function edit_sop($id){
            $where = array ('id'=>$id);
            $data['divisi'] = $this->m_main->get_divisi_sop();
            $data['sop'] = $this->m_main->edit_sop($where,'sop_pengolahan')->result();
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('sop/v_edit_sop',$data);
            $this->load->view('diffdash/footer');
        }
        public function update_sop(){
            $id         = $this->input->post('id');
            $id_divisi  = $this->input->post('id_divisi');
            $nomor      = $this->input->post('nomor');
            $nama_sop   = $this->input->post('nama_sop');
            $deskripsi  = $this->input->post('deskripsi');
            $file       = $_FILE('file');

            $data = array(
                'id' => $id,
                'id_divisi' => $id_divisi,
                'nomor'     => $nomor,
                'nama_sop'  => $nama_sop,
                'deskripsi' => $deskripsi,
                'file'      => $file,
            );
            $where = array('id' => $id);
            $this->m_main->update_sop($where, $data, 'sop_pengolahan');
            redirect(sop/pengolahan);
        }
        public function lain(){
            
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('sop/v_edit');
            $this->load->view('diffdash/footer');
        }
    }    
?>