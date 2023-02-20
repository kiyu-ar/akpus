<?php
    Class Lain extends CI_Controller{
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
            $changelast     = $this->m_main->get_last_id('changelog') + 1;
            $tablelast      = $this->m_main->get_last_id('list_kerjasama') + 1;

            $changelog = array('id'=> $changelast);
            $this->m_main->input_data($changelog, 'changelog');

            $data = array(
                'id'        => $tablelast,
                'instansi'  => $instansi,
                'jenis'     => $jenis,
                'tanggal_dari'      => $tanggal_dari,
                'tanggal_hingga'    => $tanggal_hingga,
                'update_id'         => $changelast,
            );

            $this->m_main->input_data($data, 'list_kerjasama');            
            redirect('Home/update_changelog/'.$changelast.'/'.$tablelast.'/1/list_kerjasama/lain/kerjasama');
        }

        public function hapus_kerjasama($id){
            $where = array ('id'=>$id);
            $update_id = $this->m_main->get_last_id('changelog') + 1;
            $this->m_main->delete_data($where, 'list_kerjasama');
            
            redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_kerjasama/lain/kerjasama');
            //redirect('lain/kerjasama');
        }

        public function edit_kerjasama(){
            $id             = $this->input->post('id');  
            $instansi       = $this->input->post('nama_instansi');
            $tanggal_dari       = $this->input->post('tanggal_mulai');
            $tanggal_hingga     = $this->input->post('tanggal_selesai');
            $deskripsi      = $this->input->post('deskripsi');

            $data = array(
                'id'        => $id,
                'instansi'  => $instansi,
                'tanggal_dari'  => $tanggal_dari,
                'tanggal_hingga' => $tanggal_hingga,
                'deskripsi' => $deskripsi,   
            );

            $where = array ('id'=>$id);
            $this->m_main->update_data($where, $data, 'list_kerjasama');
            redirect('lain/kerjasama');
        }
        
        public function penguat(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('diffdash/footer');
        }

        
    }    
?>