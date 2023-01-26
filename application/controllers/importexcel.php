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
        }

        # Pengembalian Setelah melakukan aksi
        public function index()
        {
            $this->load->view('diffdash/header');
            $this->load->view('diffdash/sidebar');
            $this->load->view('koleksi/v_pengadaan');
            $this->load->view('diffdash/footer');
        }

        # Fungsi Download Template
        public function download_template()
        {
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Laporan_Pengadaan.xlsx"');

            # Style Value
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->mergeCells('A1:H2');
            $sheet->getStyle('A1:H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('A1:H3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
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
            $sheet->setCellValue('A3', 'Nama');
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
    }