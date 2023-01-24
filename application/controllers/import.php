<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Import extends CI_Controller {

        public function index()
        {
            // $data['title'] = 'Import Excel';
            // $data['pengadaan'] = $this->db->get('pengadaan')->result();
            // $this->load->view('koleksi/v_pengadaan', $data);
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('koleksi/v_pengadaan');
            $this->load->view('diffdash/footer');
        }

        public function create()
        {
            $data['title'] = "Upload File Excel";
            $this->load->view('koleksi/v_pengadaan', $data);
        }

        public function excel()
        {
            if(isset($_FILES["file"]["name"])){
                  // upload
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = $_FILES['file']['name'];
                $file_size =$_FILES['file']['size'];
                $file_type=$_FILES['file']['type'];
                // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
                
                $object = PHPExcel_IOFactory::load($file_tmp);
        
                foreach($object->getWorksheetIterator() as $worksheet){
        
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
        
                    for($row=4; $row<=$highestRow; $row++){
        
                        $nama            = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $fakultas        = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $program_studi   = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $judul_buku      = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $nama_pengarang  = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $penerbit        = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $tahun_publikasi = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $isbn            = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

                        $data[] = array(
                            'nama'              => $nama,
                            'fakultas'          =>$fakultas,
                            'program_studi'     =>$program_studi,
                            'judul_buku'        =>$judul_buku,
                            'nama_pengarang'    =>$nama_pengarang,
                            'penerbit'          =>$penerbit,
                            'tahun_publikasi'   =>$tahun_publikasi,
                            'isbn'              =>$isbn,
                        );
        
                    } 
        
                }
        
                $this->db->insert_batch('pengadaan', $data);
        
                $message = array(
                    'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('import/index');
            }
            else
            {
                 $message = array(
                    'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('import/index');
            }
        }

    }