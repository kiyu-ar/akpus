<?php
    Class Pemustaka extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_main');
        }
        // Fungsi View
        public function keanggotaan(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pemustaka/v_keanggotaan');
            $this->load->view('diffdash/footer');
        }
        public function fisik(){
            $data['akses'] = $this->session->userdata('akses');
            //$data['kunjungan'] = $this->m_main->get_data('list_kunjungan')->result();
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pemustaka/v_fisik', $data);
            $this->load->view('diffdash/footer');
        }
        public function instansi(){
            $data['akses'] = $this->session->userdata('akses');
            $data['kunjungan'] = $this->m_main->get_data('list_kunjungan')->result();
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pemustaka/v_instansi', $data);
            $this->load->view('diffdash/footer');
        }
        public function eresource(){
            $data['eresource'] = $this->m_main->get_data('list_eresource')->result();
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pemustaka/v_eresource', $data);
            $this->load->view('diffdash/footer');
        }
        public function sirkulasi(){
            $data['fakultas'] = $this->m_main->get_data('tbl_fakultas')->result();
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('pemustaka/v_sirkulasi',$data);
            $this->load->view('diffdash/footer');
        }

        // Fungsi Kunjungan Fisik
        public function tambah_kunjungan(){
            $tanggal           = $this->input->post('tanggal_kunjungan');
            $instansi          = $this->input->post('nama_instansi');
            $tujuan            = $this->input->post('tujuan_kunjungan');
            $jumlah_tamu       = $this->input->post('tamu_kunjungan');
            $dokumentasi       = $_FILES['dokumentasi_kunjungan'];

            if ($dokumentasi == ''){
                $dokumentasi = '';
            }else{
                $config['upload_path']   = './assets/files/kunjungan';
                $config['allowed_types'] = 'jpg|pdf|png|jpeg';
                $config['max_size']      = 51200;
                
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('dokumentasi_kunjungan')){
                    $this->session->set_flashdata('pesan','<div class ="alert alert-danger alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                    Format file upload tidak sesuai
                    </div>');
                    redirect('pemustaka/kunjungan');
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

            $this->m_main->insert_data($data,'list_kunjungan');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Data Berhasil Ditambahkan
            </div>');
            redirect('pemustaka/kunjungan');
        }

        public function hapus_kunjungan($id){
            $data_kunjungan = new m_main;
            if($data_kunjungan->cek_file($id)){
                $data_k = $data_kunjungan->cek_file($id);
                if(file_exists("./assets/files/".$data_k->dokumentasi)){
                    unlink("./assets/files/".$data_k->dokumentasi);
                }
            $where = array ('id'=>$id);
            $this->m_main->delete_data($where, 'list_kunjungan');
            redirect('pemustaka/kunjungan');
            }
        }
        public function edit_kunjungan(){
        $dokumentasi       = $_FILES['dokumentasi_kunjungan'];
        $id                = $this->input->post('id');
        $tanggal           = $this->input->post('tanggal_kunjungan');
        $instansi          = $this->input->post('nama_instansi');
        $tujuan            = $this->input->post('tujuan_kunjungan');
        $jumlah_tamu       = $this->input->post('tamu_kunjungan');

        if ($dokumentasi == ''){
            $dokumentasi = '';
        }else{
            $config['upload_path']   = './assets/files/kunjungan';
            $config['allowed_types'] = 'jpg|pdf|png|jpeg';
            $config['max_size']      = 51200;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('dokumentasi_kunjungan')) {
                $tanggal           = $this->input->post('tanggal_kunjungan');
                $instansi          = $this->input->post('nama_instansi');
                $tujuan            = $this->input->post('tujuan_kunjungan');
                $jumlah_tamu       = $this->input->post('tamu_kunjungan');

                $data = array(
                    'id' => $id,
                    'tanggal' => $tanggal,
                    'instansi' => $instansi,
                    'tujuan' => $tujuan,
                    'jumlah_tamu' => $jumlah_tamu,
                );

                $where = array('id' => $id);
                $this->m_main->update_data($where, $data, 'list_kunjungan');
                $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                Data Berhasil Diedit
                </div>');
                redirect('pemustaka/kunjungan');
            } else {
                $dokumentasi       = $this->upload->data('file_name');
            }

        $data = array(
            'id'    => $id,
            'tanggal' => $tanggal,
            'instansi' => $instansi,
            'tujuan' => $tujuan,
            'jumlah_tamu' => $jumlah_tamu,
            'dokumentasi' => $dokumentasi,
        );

        $where = array('id' => $id);
        $this->m_main->update_data($where, $data, 'list_kunjungan');
        $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
        Data Berhasil Diedit
        </div>');
        redirect('pemustaka/kunjungan');
            }
        }
    
        //Fungsi E-Resource dan Kunjungan Virtual
        public function tambah_eresource(){
            $nama       = $this->input->post('nama'); 
            $catatan    = $this->input->post('catatan');
            $file       = $_FILES['fileinput'];
            $table_last  = $this->m_main->get_last_id('list_eresource') + 1;
            $update_id = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array('id' => $update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            if($file == ''){
                $file ='';
            }else{
                $config['upload_path'] = './assets/files/eresource';
                $config['allowed_types'] = 'png|jpg|jpeg';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('fileinput')){
                    echo "upload gagal"; die();
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                'id'        => $table_last,
                'nama'      => $nama,
                'catatan'   => $catatan,
                'file'      => $file,
                'update_id' => $update_id,
            );

            $this->m_main->insert_data($data, 'list_eresource');
            redirect('Home/update_changelog/'.$update_id.'/'.$table_last.'/1/list_eresource/pemustaka/eresource');
        }
        public function hapus_eresource($id){
            $where = array ('id' => $id);
            $update_id = $this->m_main->get_last_id('changelog') + 1;
            $this->m_main->delete_data($where, 'list_eresource');

            redirect('Home/insert_changelog/'.$update_id.'/'.$id.'/list_eresource/pemustaka/eresource/');
        }
        public function edit_eresource(){
            $id         = $this->input->post('id');
            $nama       = $this->input->post('nama');
            $catatan    = $this->input->post('catatan');
            $file_old   = $this->input->post('file_old');
            $file       = $_FILES['fileinput'];
            $update_id  = $this->m_main->get_last_id('changelog') + 1;

            $change_log = array('id'=>$update_id);
            $this->m_main->insert_data($change_log, 'changelog');

            if($file == ""){
                $file = $file_old;
            }else{
                $config['upload_path'] = './assets/files/eresource';
                $config['allowed_types'] = 'png|jpg|jpeg';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('fileinput')){
                    $file = $file_old;
                }else{
                    $file = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama'      => $nama,
                'catatan'   => $catatan,
                'file'      => $file,
                'update_id' => $update_id,
            );
            $where = array('id'  => $id);
            $this->m_main->update_data($where, $data, 'list_eresource');
            redirect('Home/update_changelog/'.$update_id.'/'.$id.'/2/list_eresource/pemustaka/eresource');
        }

//DATA SIRKULASI PEMINJAMAN
        
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
//DATA LITERASI
        public function literasi(){
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('diffdash/footer');
        }
//DATA UPLOAD MANDIRI
        public function mandiri(){
            $data['fakultas'] = $this->m_main->get_data('tbl_fakultas')->result();
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
        
}?>