<?php

use PhpParser\Node\Expr\FuncCall;

    Class Lain extends CI_Controller{
        // Fungsi View
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
            $data['akses'] = $this->session->userdata('akses');
            $data['kuesioner'] = $this->m_main->get_data('list_kuesioner')->result();
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_kuesioner', $data);
            $this->load->view('diffdash/footer');
        }
        public function promosi(){
            $data['promosi'] = $this->m_main->get_data('list_promosi')->result();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_promosi', $data);
            $this->load->view('diffdash/footer');
        }
        public function restools(){
            $data['restools'] = $this->m_main->get_data('list_restools')->result();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_restools', $data);
            $this->load->view('diffdash/footer');
        }

        // Fungsi Anggaran
        public function anggaran(){
            $data['akses'] = $this->session->userdata('akses');
            $data['anggaran'] = $this->m_main->get_data_order('list_anggaran','jenis')->result();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_anggaran', $data);
            $this->load->view('diffdash/footer');
        }

        public function tambah_anggaran(){
            $asal           = $this->input->post('asal');
            $nominal          = $this->input->post('nominal');
            $jenis            = $this->input->post('jenis_anggaran');
            
            $data = array(
                'asal' => $asal,
                'nominal' => $nominal,
                'jenis' => $jenis,
            );

            $this->m_main->input_data($data,'list_anggaran');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Data Berhasil Ditambahkan
            </div>');
            redirect('lain/anggaran');
        }

        public function hapus_anggaran($id){
            $where = array ('id'=>$id);
            $this->m_main->delete_data($where, 'list_anggaran');
            redirect('lain/anggaran');
        }

        public function edit_anggaran(){
            $id                = $this->input->post('id');
            $asal           = $this->input->post('asal');
            $nominal          = $this->input->post('nominal');
            $jenis            = $this->input->post('jenis_anggaran');
            
            $data = array(
                'id' => $id,
                'asal' => $asal,
                'nominal' => $nominal,
                'jenis' => $jenis,
            );

            $where = array('id' => $id);
            $this->m_main->update_anggaran($where, $data, 'list_anggaran');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Data Berhasil Diedit
            </div>');
            redirect('lain/anggaran');
        }
        
        // Fungsi KerjaSama
        public function kerjasama(){
            $data['akses'] = $this->session->userdata('akses');
            
            $data['kerjasama'] = $this->m_main->get_data_order('list_kerjasama','jenis')->result();
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_kerjasama', $data);
            $this->load->view('diffdash/footer');
        }

        public function tambah_kerjasama(){
            $instansi       = $this->input->post('instansi');
            $jenis          = $this->input->post('jenis');
            $tanggal_dari   = $this->input->post('tanggal_dari');
            $tanggal_hingga = $this->input->post('tanggal_hingga');
            $change_last     = $this->m_main->get_last_id('changelog') + 1;
            $table_last      = $this->m_main->get_last_id('list_kerjasama') + 1;

            $change_log = array('id'=> $change_last);
            $this->m_main->input_data($change_log, 'changelog');

            $data = array(
                'id'        => $table_last,
                'instansi'  => $instansi,
                'jenis'     => $jenis,
                'tanggal_dari'      => $tanggal_dari,
                'tanggal_hingga'    => $tanggal_hingga,
                'update_id'         => $change_last,
            );

            $this->m_main->input_data($data, 'list_kerjasama');            
            redirect('Home/update_changelog/'.$change_last.'/'.$table_last.'/1/list_kerjasama/lain/kerjasama');
        }

        public function hapus_kerjasama($id){
            $where = array ('id'=>$id);
            $update_id = $this->m_main->get_last_id('changelog') + 1;
            $this->m_main->delete_data($where, 'list_kerjasama');
            
            redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_kerjasama/lain/kerjasama');
        }

        public function edit_kerjasama(){
            $id             = $this->input->post('id');  
            $instansi       = $this->input->post('nama_instansi');
            $tanggal_dari   = $this->input->post('tanggal_mulai');
            $tanggal_hingga = $this->input->post('tanggal_selesai');
            $deskripsi      = $this->input->post('deskripsi');
            $change_last    = $this->m_main->get_last_id('changelog') + 1;

            $update_id = array('id'=> $change_last);
            $this->m_main->input_data($update_id, 'changelog');

            $data = array(
                'instansi'  => $instansi,
                'tanggal_dari'  => $tanggal_dari,
                'tanggal_hingga' => $tanggal_hingga,
                'deskripsi' => $deskripsi,   
                'update_id' => $change_last
            );

            $where = array ('id'=>$id);
            $this->m_main->update_data($where, $data, 'list_kerjasama');
            redirect('Home/update_changelog/'.$change_last.'/'.$id.'/2/list_kerjasama/lain/kerjasama');
        }
        
        public function penguat(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('diffdash/footer');
        }

        // Fungsi Kuesioner
        public function tambah_kuesioner(){
            $nama           = $this->input->post('nama_kuesioner');
            $deskripsi      = $this->input->post('deskripsi');
            $bukti          = $_FILES['file_kuesioner'];

            if ($bukti == ''){
                $bukti = '';
            }else{
                $config['upload_path']   = './assets/files';
                $config['allowed_types'] = 'pdf|docx|doc|xls|xlsx';
                $config['max_size']      = 51200;
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file_kuesioner')){
                    $this->session->set_flashdata('pesan','<div class ="alert alert-danger alert-dismissible fade in" style="margin-top: 5px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                    Format file upload tidak sesuai
                    </div>');
                    redirect('lain/kuesioner');
                }else{
                    $bukti = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'file' => $bukti,
            );

            $this->m_main->input_data($data,'list_kuesioner');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Data Berhasil Ditambahkan
            </div>');
            redirect('lain/kuesioner');
        }

        public function hapus_kuesioner($id){
            $data_kuesioner = new m_main;
            if($data_kuesioner->cek_file_kuesioner($id)){
                $data_k = $data_kuesioner->cek_file_kuesioner($id);
                if(file_exists("./assets/files/".$data_k->file)){
                    unlink("./assets/files/".$data_k->file);
                }
            $where = array ('id'=>$id);
            $this->m_main->delete_data($where, 'list_kuesioner');
            redirect('lain/kuesioner');
            }
        }

        public function edit_kuesioner(){
        $id             = $this->input->post('id');
        $nama           = $this->input->post('nama_kuesioner');
        $deskripsi      = $this->input->post('deskripsi');
        $bukti          = $_FILES['file_kuesioner'];

        if ($bukti == ''){
            $bukti = '';
        }else{
            $config['upload_path']   = './assets/files';
            $config['allowed_types'] = 'jpg|pdf|png|jpeg';
            $config['max_size']      = 51200;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_kuesioner')) {
                $nama           = $this->input->post('nama_kuesioner');
                $deskripsi      = $this->input->post('deskripsi');

                $data = array(
                    'id' => $id,
                    'nama' => $nama,
                    'deskripsi' => $deskripsi,
                );

                $where = array('id' => $id);
                $this->m_main->update_data($where, $data, 'list_kuesioner');
                $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                Data Berhasil Diedit
                </div>');
                redirect('lain/kuesioner');
            } else {
                $bukti       = $this->upload->data('file_name');
            }

        
        $data = array(
            'id'    => $id,
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'file' => $bukti,
        );

        $where = array('id' => $id);
        $this->m_main->update_data($where, $data, 'list_kuesioner');
        $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
        Data Berhasil Diedit
        </div>');
        redirect('lain/kuesioner');
        }
        }

        public function cetak_file($id){
            $this->load->helper('download');
            $fileinfo = $this->m_main->download($id);
            $file = './assets/files/'.$fileinfo['file'];
            force_download($file, NULL);
        }
    }    
?>