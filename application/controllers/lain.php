<?php

use PhpParser\Node\Expr\FuncCall;

    Class Lain extends CI_Controller{
        // Fungsi View
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
        // public function sarpras2(){
        //     $data['sarpras'] = $this->m_main->get_sarpras()->result();

        //     $this->load->view('diffdash/header');
        //     $this->load->view('diffdash/sidebar');
        //     $this->load->view('lain/v_sarpras2', $data);
        //     $this->load->view('diffdash/footer');
        // }
     
        // Fungsi Sarpras
        public function sarpras(){
            $data['sarpras'] = $this->m_main->get_data('list_sarpras')->result();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_sarpras', $data);
            $this->load->view('diffdash/footer');
        }
        public function tambah_sarpras(){
            $nama   = $this->input->post('nama');
            $jumlah = $this->input->post('jumlah');
            $deskripsi  = $this->input->post('deskripsi');
            $change_last  = $this->m_main->get_last_id('changelog') + 1;
            $table_last   = $this->m_main->get_last_id('list_sarpras') + 1;

            $changelog = array('id'=> $change_last);
            $this->m_main->insert_data($changelog, 'changelog');

            $data = array(
                'id'    => $table_last,
                'nama'  => $nama,
                'jumlah'=> $jumlah,
                'deskripsi' => $deskripsi,
                'update_id' => $change_last,
            );

            $this->m_main->insert_data($data, 'list_sarpras');
            redirect('Home/update_changelog/'.$change_last.'/'.$table_last.'/1/list_sarpras/lain/sarpras');
        }
        public function edit_sarpras(){
            $id     = $this->input->post('id');
            $nama   = $this->input->post('nama');
            $jumlah = $this->input->post('jumlah');
            $deskripsi  = $this->input->post('deskripsi');
            $update_id  = $this->m_main->get_last_id('changelog') + 1;

            $changelog = array('id'=> $update_id);
            $this->m_main->insert_data($changelog, 'changelog');

            $data = array(
                'nama'  => $nama,
                'jumlah'=> $jumlah,
                'deskripsi' => $deskripsi,
                'update_id' => $update_id,
            );

            $where = array('id' => $id);
            $this->m_main->update_data($where, $data, 'list_sarpras');
            redirect('Home/update_changelog/'.$update_id.'/'.$id.'/2/list_sarpras/lain/sarpras');
        }
        public function hapus_sarpras($id){
            $where = array('id' => $id);
            $update_id = $this->m_main->get_last_id('changelog') + 1;
            $this->m_main->delete_data($where, 'list_sarpras');
            redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_sarpras/lain/sarpras');
        }
        // Fungsi Kuesioner
        public function kuesioner(){
            if($this->session->userdata('status')=="login"){
                $data['akses'] = $this->session->userdata('akses');
                $data['kuesioner'] = $this->m_main->get_data('list_kuesioner')->result();
                $this->load->view('diffdash/header');
                $this->load->view('diffdash/sidebar');
                $this->load->view('lain/v_kuesioner', $data);
                $this->load->view('diffdash/footer');
            }else{
                redirect('home');
            }
        }
        public function tambah_kuesioner(){
            $nama           = $this->input->post('nama_kuesioner');
            $deskripsi      = $this->input->post('deskripsi');
            $bukti1         = $_FILES['file_pertanyaan'];
            $bukti2         = $_FILES['file_data'];
            $bukti3         = $_FILES['file_laporan'];
            $table_last     = $this->m_main->get_last_id('list_kuesioner') + 1;
            $update_id      = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array ('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            if ($bukti1 == ''){
                $bukti1 == '';
            }else{
                $config['upload_path']   = './assets/files';
                $config['allowed_types'] = 'pdf|docx|doc|xls|xlsx';
                $config['max_size']      = 51200;
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file_pertanyaan')){
                    $this->session->set_flashdata('pesan','<div class ="alert alert-danger alert-dismissible fade in" style="margin-top: 5px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                    Format file upload tidak sesuai
                    </div>');
                    redirect('lain/kuesioner');
                }else{
                    $bukti1 = $this->upload->data('file_name');
                }
            }

            if ($bukti2 == ''){
                $bukti2 == '';
            }else{
                $config['upload_path']   = './assets/files';
                $config['allowed_types'] = 'pdf|docx|doc|xls|xlsx';
                $config['max_size']      = 51200;
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file_data')){
                    $this->session->set_flashdata('pesan','<div class ="alert alert-danger alert-dismissible fade in" style="margin-top: 5px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                    Format file upload tidak sesuai
                    </div>');
                    redirect('lain/kuesioner');
                }else{
                    $bukti2 = $this->upload->data('file_name');
                }
            }

            if ($bukti3 == ''){
                $bukti3 == '';
            }else{
                $config['upload_path']   = './assets/files';
                $config['allowed_types'] = 'pdf|docx|doc|xls|xlsx';
                $config['max_size']      = 51200;
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('file_laporan')){
                    $this->session->set_flashdata('pesan','<div class ="alert alert-danger alert-dismissible fade in" style="margin-top: 5px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                    Format file upload tidak sesuai
                    </div>');
                    redirect('lain/kuesioner');
                }else{
                    $bukti3 = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'file_pertanyaan' => $bukti1,
                'file_data' => $bukti2,
                'file_laporan' => $bukti3,
                'update_id'         => $update_id,
            );

            $this->m_main->insert_data($data,'list_kuesioner');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Data Berhasil Ditambahkan
            </div>');
            redirect('Home/update_changelog/'.$update_id.'/'.$table_last.'/1/list_kuesioner/lain/kuesioner');
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
        $bukti1         = $_FILES['file_pertanyaan'];
        $bukti2         = $_FILES['file_data'];
        $bukti3         = $_FILES['file_laporan'];
        $file_old       = $this->input->post('file_old');
        $update_id      = $this->m_main->get_last_id('changelog') + 1;

        $change_log = array ('id' => $update_id);
        $this->m_main->insert_data($change_log, 'changelog');

        if($bukti1 == ''){
            $bukti1 = $file_old;
        }else{
            $config['upload_path']   = './assets/files/promosi';
            $config['allowed_types'] = 'png|jpg|pdf';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file_pertanyaan')){
                $bukti1 = $file_old;
            }else{
                $bukti1 = $this->upload->data('file_name');
            }
        }

        if($bukti2 == ''){
            $bukti2 = $file_old;
        }else{
            $config['upload_path']   = './assets/files/promosi';
            $config['allowed_types'] = 'png|jpg|pdf';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file_data')){
                $bukti2 = $file_old;
            }else{
                $bukti2 = $this->upload->data('file_name');
            }
        }

        if($bukti3 == ''){
            $bukti3 = $file_old;
        }else{
            $config['upload_path']   = './assets/files/promosi';
            $config['allowed_types'] = 'png|jpg|pdf';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file_laporan')){
                $bukti3 = $file_old;
            }else{
                $bukti3 = $this->upload->data('file_name');
            }
        }

        // if ($bukti1 == ''){
        //     $bukti1 = $file_old;
        // }else{
        //     $config['upload_path']   = './assets/files';
        //     $config['allowed_types'] = 'jpg|pdf|png|jpeg';
        //     $config['max_size']      = 51200;
        //     $this->load->library('upload', $config);
        //     if (!$this->upload->do_upload('file_pertanyaan')) {
        //         $nama           = $this->input->post('nama_kuesioner');
        //         $deskripsi      = $this->input->post('deskripsi');

        //         $data = array(
        //             'id' => $id,
        //             'nama' => $nama,
        //             'deskripsi' => $deskripsi,
        //         );

        //         $where = array('id' => $id);
        //         $this->m_main->update_data($where, $data, 'list_kuesioner');
        //         $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
        //         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
        //         Data Berhasil Diedit
        //         </div>');
        //         redirect('lain/kuesioner');
        //     } else {
        //         $bukti1      = $this->upload->data('file_name');
        //     }
        // }

        // if ($bukti2 == ''){
        //     $bukti2 = '';
        // }else{
        //     $config['upload_path']   = './assets/files';
        //     $config['allowed_types'] = 'jpg|pdf|png|jpeg';
        //     $config['max_size']      = 51200;
        //     $this->load->library('upload', $config);
        //     if (!$this->upload->do_upload('file_data')) {
        //         $nama           = $this->input->post('nama_kuesioner');
        //         $deskripsi      = $this->input->post('deskripsi');

        //         $data = array(
        //             'id' => $id,
        //             'nama' => $nama,
        //             'deskripsi' => $deskripsi,
        //         );

        //         $where = array('id' => $id);
        //         $this->m_main->update_data($where, $data, 'list_kuesioner');
        //         $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
        //         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
        //         Data Berhasil Diedit
        //         </div>');
        //         redirect('lain/kuesioner');
        //     } else {
        //         $bukti2      = $this->upload->data('file_name');
        //     }
        // }
           
        // if ($bukti3 == ''){
        //     $bukti3 = '';
        // }else{
        //     $config['upload_path']   = './assets/files';
        //     $config['allowed_types'] = 'jpg|pdf|png|jpeg';
        //     $config['max_size']      = 51200;
        //     $this->load->library('upload', $config);
        //     if (!$this->upload->do_upload('file_laporan')) {
        //         $nama           = $this->input->post('nama_kuesioner');
        //         $deskripsi      = $this->input->post('deskripsi');

        //         $data = array(
        //             'id' => $id,
        //             'nama' => $nama,
        //             'deskripsi' => $deskripsi,
        //         );

        //         $where = array('id' => $id);
        //         $this->m_main->update_data($where, $data, 'list_kuesioner');
        //         $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
        //         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
        //         Data Berhasil Diedit
        //         </div>');
        //         redirect('lain/kuesioner');
        //     } else {
        //         $bukti3      = $this->upload->data('file_name');
        //     }
        // }
            $data = array(
                'id'    => $id,
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'file_pertanyaan' => $bukti1,
                'file_data' => $bukti2,
                'file_laporan' => $bukti3,
                'update_id'         => $update_id,
            );

            $where = array('id' => $id);
            $this->m_main->update_data($where, $data, 'list_kuesioner');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Data Berhasil Diedit
            </div>');
            redirect('Home/update_changelog/'.$update_id.'/'.$id.'/2/list_kuesioner/lain/kuesioner');
        }

        public function cetak_file($id){
            $this->load->helper('download');
            $fileinfo = $this->m_main->download($id);
            $file1 = './assets/files/'.$fileinfo['file_pertanyaan'];
            $file2 = './assets/files/'.$fileinfo['file_data'];
            $file3 = './assets/files/'.$fileinfo['file_laporan'];
            force_download($file1,$file2,$file3, NULL);
        }
       
        // Fungsi Promosi
        public function promosi(){
            $data['promosi'] = $this->m_main->get_promosi();
            $data['jenis_promosi'] = $this->m_main->get_data('tbl_jenis_promosi')->result();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_promosi', $data);
            $this->load->view('diffdash/footer');
        }
        public function tambah_jenis_promosi(){
            $nama       = $this->input->post('jenis_promosi');
            $table_last = $this->m_main->get_last_id('tbl_jenis_promosi') + 1;
            $update_id  = $this->m_main->get_last_id('changelog') + 1;

            $change_log    = array('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            $data = array(
                'id'        => $table_last,
                'nama_jenis'  => $nama,
                'update_id' => $update_id,
            );
            $this->m_main->insert_data($data, 'tbl_jenis_promosi');
            redirect('Home/update_changelog/'.$update_id.'/'.$table_last.'/1/tbl_jenis_promosi/lain/promosi');
        }
        public function tambah_promosi(){
            $nama           = $this->input->post('nama');
            $jenis          = $this->input->post('jenis');
            $deskripsi      = $this->input->post('deskripsi');
            $tanggal_dari   = $this->input->post('tanggal_dari');
            $tanggal_hingga = $this->input->post('tanggal_hingga');
            $file           = $_FILES['file'];
            $table_last     = $this->m_main->get_last_id('list_promosi') + 1;
            $update_id      = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array ('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            if($file == ''){
                $file = '';
            }else{
                $config['upload_path']   = './assets/files/promosi';
                $config['allowed_types'] = 'png|jpg|pdf';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('file')){
                    echo "upload gagal!"; die();
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                'id'        => $table_last,
                'nama'      => $nama,
                'jenis'     => $jenis,
                'deskripsi' => $deskripsi,
                'tanggal_dari'      => $tanggal_dari,
                'tanggal_hingga'    => $tanggal_hingga,
                'file'              => $file,
                'update_id'         => $update_id,
            );
            $this->m_main->insert_data($data, 'list_promosi');
            redirect('Home/update_changelog/'.$update_id.'/'.$table_last.'/1/list_promosi/lain/promosi');
        }
        public function edit_promosi(){
            $id             = $this->input->post('id');
            $nama           = $this->input->post('nama');
            $jenis          = $this->input->post('jenis');
            $deskripsi      = $this->input->post('deskripsi');
            $tanggal_dari   = $this->input->post('tanggal_dari');
            $tanggal_hingga = $this->input->post('tanggal_hingga');
            $file           = $_FILES['file'];
            $file_old       = $this->input->post('file_old');
            $update_id      = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array ('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            if($file == ''){
                $file = $file_old;
            }else{
                $config['upload_path']   = './assets/files/promosi';
                $config['allowed_types'] = 'png|jpg|pdf';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('file')){
                    $file = $file_old;
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama'      => $nama,
                'jenis'     => $jenis,
                'deskripsi' => $deskripsi,
                'tanggal_dari'      => $tanggal_dari,
                'tanggal_hingga'    => $tanggal_hingga,
                'file'              => $file,
                'update_id'         => $update_id,
            );
            $where = array('id' => $id);
            $this->m_main->update_data($where, $data, 'list_promosi');
            redirect('Home/update_changelog/'.$update_id.'/'.$table_last.'/2/list_promosi/lain/promosi');

        }
        public function hapus_promosi($id){
            $update_id = $this->m_main->get_last_id('changelog') + 1;
            $where = array('id' => $id);
            $this->m_main->delete_data($where, 'list_promosi');
            redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_promosi/lain/promosi');
        }
        // Fungsi Research Tools
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

            $this->m_main->insert_data($data,'list_anggaran');
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
            $this->m_main->update_data($where, $data, 'list_anggaran');
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
            $this->m_main->insert_data($change_log, 'changelog');

            $data = array(
                'id'        => $table_last,
                'instansi'  => $instansi,
                'jenis'     => $jenis,
                'tanggal_dari'      => $tanggal_dari,
                'tanggal_hingga'    => $tanggal_hingga,
                'update_id'         => $change_last,
            );

            $this->m_main->insert_data($data, 'list_kerjasama');            
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
            $update_id      = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array('id'=> $update_id);
            $this->m_main->inserst_data($change_log, 'changelog');

            $data = array(
                'instansi'  => $instansi,
                'tanggal_dari'  => $tanggal_dari,
                'tanggal_hingga' => $tanggal_hingga,
                'deskripsi' => $deskripsi,   
                'update_id' => $update_id,
            );

            $where = array ('id'=>$id);
            $this->m_main->update_data($where, $data, 'list_kerjasama');
            redirect('Home/update_changelog/'.$update_id.'/'.$id.'/2/list_kerjasama/lain/kerjasama');
        }
        // Fungsi Komponen Penguat
        public function komponen(){
            $data['komponen'] = $this->m_main->get_komponen();
            $data['jenis_komponen'] = $this->m_main->get_data('tbl_jenis_komponen')->result();

            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('lain/v_komponen', $data);
            $this->load->view('diffdash/footer');
        }
        public function tambah_jenis_komponen(){
            $nama       = $this->input->post('komponen');
            $table_last = $this->m_main->get_last_id('tbl_jenis_komponen') + 1;
            $update_id  = $this->m_main->get_last_id('changelog') + 1;

            $change_log    = array('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            $data = array(
                'id'        => $table_last,
                'komponen'  => $nama,
                'update_id' => $update_id,
            );
            $this->m_main->insert_data($data, 'tbl_jenis_komponen');
            redirect('Home/update_data/'.$update_id.'/'.$table_last.'/1/tbl_jenis_komponen/lain/komponen');
        }
        public function tambah_komponen(){
            $nama       = $this->input->post('nama');
            $jenis      = $this->input->post('jenis'); 
            $deskripsi  = $this->input->post('deskripsi');
            $file       = $_FILES['file'];
            $table_last = $this->m_main->get_last_id('list_komponen') + 1;
            $update_id  = $this->m_main->get_last_id('changelog') + 1 ;

            $change_log = array('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            if($file == ""){
                $file="";
            }else{
                $config['upload_path'] = './assets/files/komponen';
                $config['allowed_types'] = 'jpg|jpeg|pdf';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('file')){
                    $error = $this->upload->display_errors();
                    echo $error; die();
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                'id'        => $table_last,
                'nama'      => $nama,
                'jenis'     => $jenis,
                'deskripsi' => $deskripsi,
                'file'      => $file,
                'update_id' => $update_id,
            );

            $this->m_main->insert_data($data, 'list_komponen');
            redirect('Home/update_changelog/'.$update_id.'/'.$table_last.'/1/list_komponen/lain/komponen');
        }
        public function hapus_komponen($id){
            $update_id  = $this->m_main->get_last_id('changelog') + 1;
            $where = array('id' => $id);
            $this->m_main->delete_data($where,'list_komponen');
            redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_komponen/lain/komponen');
        }
        public function edit_komponen(){

        }

    }  
?>