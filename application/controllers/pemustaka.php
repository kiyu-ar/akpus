<?php
    Class Pemustaka extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }

        public function keanggotaan(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pemustaka/v_keanggotaan');
            $this->load->view('diffdash/footer');
        }
        public function kunjungan(){
            $data['kunjungan'] = $this->m_main->get_kunjungan();
            $this->load->view('diffdash/header', $data);
            $this->load->view('diffdash/sidebar', $data);
            $this->load->view('pemustaka/v_kunjungan', $data);
            $this->load->view('diffdash/footer', $data);
        }
        public function eresource(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('diffdash/footer');
        }
        public function sirkulasi(){
            $data['fakultas'] = $this->m_main->get_fakultas();
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pemustaka/v_sirkulasi',$data);
            $this->load->view('diffdash/footer');
        }
        public function sirkulasi_prodi(){
            $kode_prodi = $this->uri->segment(3);
            $data['sirkulasi_p'] = $this->m_main->sirkulasi_prodi($kode_prodi)->result();
            $this->load->view('pemustaka/iframe_sirkulasi_prodi',$data);
        }
        public function sirkulasi_total(){
            $data['sirkulasi_t'] = $this->m_main->sirkulasi_total()->result();
            $this->load->view('pemustaka/iframe_sirkulasi_total',$data);
        }
        public function export_csv($type,$id){
            $filename = 'sirkulasi_'.date('Ymd').'.csv';
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=$filename"); 
            header("Content-Type: application/csv; ");
            //data type
            if($type == 1){
                
            }else if($type == 2){
                $data = $this->m_main->sirkulasi_total();
            }else if(type == 3){

            }else{

            }
            $file = fopen('php://output', 'w');

        }
        public function literasi(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('diffdash/footer');
        }
        public function mandiri(){
            $data['fakultas'] = $this->m_main->get_fakultas();
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pemustaka/v_mandiri',$data);
            $this->load->view('diffdash/footer');
        }
        public function mandiri_prodi(){
            $kode_prodi = $this->uri->segment(3);
            $data['mandiri_p'] = $this->m_main->mandiri_prodi($kode_prodi)->result();
            $this->load->view('pemustaka/iframe_mandiri_prodi',$data);
        }
        public function mandiri_total(){
            $data['mandiri_t'] = $this->m_main->mandiri_total()->result();
            $this->load->view('pemustaka/iframe_mandiri_total',$data);
        }
        public function getdataprodi(){
            $id_fakultas = $this->input->post();
            $getprodi = $this->m_main->get_prodi($id_fakultas);
            //var_dump($getprodi);
            echo json_encode($getprodi);
        }
        public function getkodeprodi(){
            $id_prodi = $this->input->post();
            $getkode = $this->m_main->get_kode_prodi($id_prodi);
            echo json_encode($getkode);
        }
        
        // Kunjungan
        public function tambah_kunjungan(){
            $tanggal           = $this->input->post('tanggal_kunjungan');
            $instansi          = $this->input->post('nama_instansi');
            $tujuan            = $this->input->post('tujuan_kunjungan');
            $jumlah_tamu       = $this->input->post('tamu_kunjungan');
            $dokumentasi      = $_FILES['dokumentasi_kunjungan'];

            if ($dokumentasi == ''){
                $dokumentasi = '';
            }else{
                $config['upload_path']   = './assets/files';
                $config['allowed_types'] = 'jpg|pdf|png|jpeg';
                $config['max_size']      = 51200;
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('dokumentasi_kunjungan')){
                    echo "upload gagal"; die();
                }else{
                    $dokumentasi = $this->upload->data('file_name');
                }
            }

            $data = array(
                'id' => $id,
                'tanggal' => $tanggal,
                'instansi' => $instansi,
                'tujuan' => $tujuan,
                'jumlah_tamu' => $jumlah_tamu,
                'dokumentasi' => $dokumentasi,
            );

            $masukandata = $this->m_main->input_data($data,'list_kunjungan');
            if($masukandata)
            {
                $this->session->set_flashdata('pesan','<div class ="alert alert-danger"> Data Tidak Berhasil Ditambahkan.</div>');
                redirect('pemustaka/kunjungan');
            }else
            {
                $this->session->set_flashdata('pesan','<div class ="alert alert-success"> Data Berhasil Ditambahkan.</div>');
                redirect('pemustaka/kunjungan');
            }
        }

        public function hapus_kunjungan($id){
            $where = array ('id' => $id);
            $this->m_main->delete_data($where, 'list_kunjungan');
            redirect('pemustaka/kunjungan');
        }
    }  
?>