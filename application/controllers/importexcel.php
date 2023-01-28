<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    require FCPATH. 'vendor/autoload.php';
    
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\Color;
    class Importexcel extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model('M_excel');
        }

        # Pengembalian Setelah melakukan aksi
        public function index()
        {
            $data['ab'] = $this->M_excel->tampilan_tabel();
            $this->load->view('diffdash/header', $data);
            $this->load->view('diffdash/sidebar', $data);
            $this->load->view('koleksi/v_pengadaan', $data);
            $this->load->view('diffdash/footer', $data);
        }

        # Fungsi Download Template
        public function download_template()
        {
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Template_Laporan_Pengadaan.xlsx"');

            # Style Value
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->mergeCells('A1:H2');
            $sheet->getStyle('A:H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A:H')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('A1:H5')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('A1:H3')->getFont()->setBold(True)->setSize(13);
            $sheet->getStyle('A1:H2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ec5c0e');
            $sheet->getStyle('A3:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ece80e');
            $sheet->getColumnDimension('A')->setAutoSize(false);
            $sheet->getColumnDimension('B')->setAutoSize(false);
            $sheet->getColumnDimension('C')->setAutoSize(false);
            $sheet->getColumnDimension('D')->setAutoSize(false);
            $sheet->getColumnDimension('E')->setAutoSize(false);
            $sheet->getColumnDimension('F')->setAutoSize(false);
            $sheet->getColumnDimension('G')->setAutoSize(false);
            $sheet->getColumnDimension('H')->setAutoSize(false);
            $sheet->getColumnDimension('A')->setWidth(33);
            $sheet->getColumnDimension('B')->setWidth(33);
            $sheet->getColumnDimension('C')->setWidth(33);
            $sheet->getColumnDimension('D')->setWidth(33);
            $sheet->getColumnDimension('E')->setWidth(33);
            $sheet->getColumnDimension('F')->setWidth(33);
            $sheet->getColumnDimension('G')->setWidth(33);
            $sheet->getColumnDimension('H')->setWidth(33);

            # Isi Value
            $sheet->setCellValue('A1', 'Data Laporan Inputan Permintaan / Pengadaan Buku');
            $sheet->setCellValue('A3', 'Nama Pengusul');
            $sheet->setCellValue('B3', 'Fakultas');
            $sheet->setCellValue('C3', 'Program Studi');
            $sheet->setCellValue('D3', 'Judul Buku');
            $sheet->setCellValue('E3', 'Nama Pengarang');
            $sheet->setCellValue('F3', 'Penerbit');
            $sheet->setCellValue('G3', 'Tahun Publikasi (YYYY)');
            $sheet->setCellValue('H3', 'ISBN');
            
            # Output Value
            $writer = new Xlsx($spreadsheet);
            $writer->save("php://output");
        }

        public function import_excel()
        {
            $file = $_FILES['file']['name'];
            $extension = pathinfo($file,PATHINFO_EXTENSION);
            if($extension == 'csv')
            {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            }else if ($extension == 'xls')
            {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }else
            {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $sheetdata = $spreadsheet->getActiveSheet()->toArray();
            $sheetcount = count($sheetdata);
            if($sheetcount > 1);
            {
                $data = array();
                for ($i=3; $i<$sheetcount; $i++){
                    $nama            = $sheetdata[$i][0];
                    $fakultas        = $sheetdata[$i][1];
                    $program_studi   = $sheetdata[$i][2];
                    $judul_buku      = $sheetdata[$i][3];
                    $nama_pengarang  = $sheetdata[$i][4];
                    $penerbit        = $sheetdata[$i][5];
                    $tahun_publikasi = $sheetdata[$i][6];
                    $isbn            = $sheetdata[$i][7];
                    $data[] = array(
                        'nama'              =>$nama,
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
            $insertdata = $this->M_excel->insert_batch($data);
            if($insertdata)
            {
                $this->session->set_flashdata('message','<div class ="alert alert-success"> Data Berhasil Ditambahkan.</div>');
                redirect('importexcel');
            }else
            {
                $this->session->set_flashdata('message','<div class ="alert alert-danger"> Data Tidak Berhasil Ditambahkan.</div>');
                redirect('importexcel');
            }
        }

        public function export_excel()
        {
            # Mengambil Data
            $listpengadaan = $this->M_excel->list_pengadaan();

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Laporan_Pengadaan.xlsx"');

            # Style Value
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->mergeCells('A1:H2');
            $sheet->getStyle('A:H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A:H')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            $sheet->getStyle('A1:H3')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('A1:H3')->getFont()->setBold(True)->setSize(13);
            $sheet->getStyle('A1:H2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ec5c0e');
            $sheet->getStyle('A3:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ece80e');
            $sheet->getColumnDimension('A')->setAutoSize(false);
            $sheet->getColumnDimension('B')->setAutoSize(false);
            $sheet->getColumnDimension('C')->setAutoSize(false);
            $sheet->getColumnDimension('D')->setAutoSize(false);
            $sheet->getColumnDimension('E')->setAutoSize(false);
            $sheet->getColumnDimension('F')->setAutoSize(false);
            $sheet->getColumnDimension('G')->setAutoSize(false);
            $sheet->getColumnDimension('H')->setAutoSize(false);
            $sheet->getColumnDimension('A')->setWidth(33);
            $sheet->getColumnDimension('B')->setWidth(33);
            $sheet->getColumnDimension('C')->setWidth(33);
            $sheet->getColumnDimension('D')->setWidth(33);
            $sheet->getColumnDimension('E')->setWidth(33);
            $sheet->getColumnDimension('F')->setWidth(33);
            $sheet->getColumnDimension('G')->setWidth(33);
            $sheet->getColumnDimension('H')->setWidth(33);

            # Isi Value
            $sheet->setCellValue('A1', 'Data Laporan Inputan Permintaan / Pengadaan Buku');
            $sheet->setCellValue('A3', 'Nama Pengusul');
            $sheet->setCellValue('B3', 'Fakultas');
            $sheet->setCellValue('C3', 'Program Studi');
            $sheet->setCellValue('D3', 'Judul Buku');
            $sheet->setCellValue('E3', 'Nama Pengarang');
            $sheet->setCellValue('F3', 'Penerbit');
            $sheet->setCellValue('G3', 'Tahun Publikasi (YYYY)');
            $sheet->setCellValue('H3', 'ISBN');
            
            $isi = 4;
            foreach ($listpengadaan as $list)
            {
                $sheet->setCellValue('A'.$isi, $list->nama);
                $sheet->setCellValue('B'.$isi, $list->fakultas);
                $sheet->setCellValue('C'.$isi, $list->program_studi);
                $sheet->setCellValue('D'.$isi, $list->judul_buku);
                $sheet->setCellValue('E'.$isi, $list->nama_pengarang);
                $sheet->setCellValue('F'.$isi, $list->penerbit);
                $sheet->setCellValue('G'.$isi, $list->tahun_publikasi);
                $sheet->setCellValue('H'.$isi, $list->isbn);
                $isi++;
            }

            # Output Value
            $writer = new Xlsx($spreadsheet);
            $writer->save("php://output");
        }
    }