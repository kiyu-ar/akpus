<?php
    Class Koleksi extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->model('M_excel');
            $this->load->model('m_main');
        }
        public function pengadaan(){
            $data['akses'] = $this->session->userdata('akses');
            $data['ab'] = $this->M_excel->tampilan_tabel();
            $this->load->view('diffdash/header', $data);
            $this->load->view('diffdash/sidebar', $data);
            $this->load->view('koleksi/v_pengadaan', $data);
            $this->load->view('diffdash/footer', $data);
            // $this->load->view('diffdash/header');
            // $this->load->view('diffdash/sidebar');
            // $this->load->view('koleksi/v_pengadaan');
            // $this->load->view('diffdash/footer');
        }
        public function jeniscetak(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('koleksi/v_jenis_cetak');
            $this->load->view('diffdash/footer');
        }
        public function koran(){
            $data['status'] = $this->session->userdata('status');
            $data['koran']  = $this->m_main->get_data('list_koran');
            $this->load->view('koleksi/iframe_koran',$data);
        }
        public function tambah_koran(){
            $id         = $this->input->post('id');
            $nama_koran = $this->input->post('nama_koran');
            $data = array(
                'id'          => $id,
                'nama_koran' => $nama_koran,
            );
            $this->m_main->input_data($data, 'list_koran');
            redirect('koleksi/jeniscetak');
        }
        public function majalah(){
            $data['status']  = $this->session->userdata('status');
            $data['majalah'] = $this->m_main->get_majalah();
            $this->load->view('koleksi/iframe_majalah',$data);
        }
        public function tambah_majalah(){
            $id           = $this->input->post('id');
            $nama_majalah = $this->input->post('nama_majalah');
            $tahun_dari   = $this->input->post('tahun_dari');
            $tahun_hingga = $this->input->post('tahun_hingga');
            $data = array(
                'id'            => $id,
                'nama_majalah'  => $nama_majalah,
                'tahun_dari'    => $tahun_dari,
                'tahun_hingga'  => $tahun_hingga,
            );
            $this->m_main->input_data($data, 'list_majalah');
            redirect('koleksi/jeniscetak');
        }
        public function hapus_tabel($id_tabel,$id){
            if($id_tabel == "3"){
                $tabel = 'list_koran';
            }else if ($id_tabel == "4"){
                $tabel = 'list_majalah';
            }else if ($id_tabel == "5"){
                $tabel = 'list_ebook';
            }else if ($id_tabel == "6"){
                $tabel = 'list_ejournal';
            }
            
            $where = array ('id'=>$id);
            $this->m_main->delete_data($where, $tabel);
            if($id_tabel == "3"){
                redirect('koleksi/koran');
            }else if ($id_tabel == "4"){
                redirect('koleksi/majalah');
            }else if ($id_tabel == "5"){
                redirect('koleksi/ebook');
            }else if ($id_tabel == "6"){
                redirect('koleksi/ejournal');
            }
        }
        public function edit_tabel($id){
            if(empty($this->session->userdata('status'))){
                redirect ('home');
            }else{
                if($id == '1'){
                    //$data['prosiding']
                } else if($id =='2'){
                    //$data['jurnal']
                } else if($id == '3'){
                    $data['koran'] = $this->m_main->get_data('list_koran')->result();
                } else if($id == '4'){
                    $data['majalah'] = $this->m_main->get_majalah();
                } else{
                    redirect('koleksi/jeniscetak');
                }
                $data['id'] = $id;
                $this->load->view('diffdash/header');
                $this->load->view('diffdash/sidebar');
                $this->load->view('koleksi/v_edit_tabel',$data);
                $this->load->view('diffdash/footer');
            }
        }
        public function jeniselektronik(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('koleksi/v_jenis_elektronik');
            $this->load->view('diffdash/footer');
        }
        public function ebook(){ 
            $data['status'] = $this->session->userdata('status');
            $data['ebook']  = $this->m_main->get_ebook();
            $this->load->view('koleksi/iframe_ebook',$data);
        }
        public function tambah_ebook(){
            $id = $this->input->post('id');
            $nama_ebook = $this->input->post('nama_ebook');
            $tahun      = $this->input->post('tahun');
            $link_ebook = $this->input->post('link_ebook');
            $data = array(
                'id'           => $id,
                'nama_buku'    => $nama_ebook,
                'tahun'        => $tahun,
                'link_buku'    => $link_ebook,
            );
            $this->m_main->input_data($data, 'list_ebook');
            redirect('koleksi/jeniselektronik');
        }
        public function ejournal(){
            $data['status']   = $this->session->userdata('status');
            $data['ejournal'] = $this->m_main->get_data('list_ejournal')->result();
            $this->load->view('koleksi/iframe_ejournal',$data);
        }
        public function tambah_ejournal(){
            $id             = $this->input->post('id');
            $nama_ejournal  = $this->input->post('nama_ejournal');
            $link_ejournal  = $this->input->post('link_ejournal');
            $data = array(
                'id'          => $id,
                'nama_jurnal' => $nama_ejournal,
                'link_jurnal' => $link_ejournal,
            );
            $this->m_main->input_data($data, 'list_ejournal');
            redirect('koleksi/jeniselektronik');
        }
        public function statistik(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('koleksi/v_statistik');
            $this->load->view('diffdash/footer');
        }
    }    
?>