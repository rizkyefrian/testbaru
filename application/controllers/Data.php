<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("DataModel");
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data = [
            'data' => $this->DataModel->getAll(),
            'isi' => 'data/list',
        ];
        $this->load->view('template/wrapper', $data); 
    }

    public function view_export()
    {
        $data = [
            'data' => $this->DataModel->getAll(),
            'isi' => 'data/export',
        ];
        $this->load->view('template/wrapper', $data); 
    }
    
    public function add()
    {
       $data = $this->DataModel;
        $validation = $this->form_validation;
        $validation->set_rules($data->rules());
        
        if ($validation->run()) {
           $data->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
       
        $data = [
            'isi' => 'data/new_form',
        ];
        $this->load->view('template/wrapper', $data);  		
    }
    

    public function export(){
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data")
                 ->setSubject("Data")
                 ->setDescription("Laporan Semua Data ")
                 ->setKeywords("Data ");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_tbl = array(
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "PT Perkebunan Nusantara VI"); 
    $excel->setActiveSheetIndex(0)->setCellValue('A2', "Unit Usaha Kayu ARO"); 
    $excel->setActiveSheetIndex(0)->setCellValue('I1', "RENCANA KERJA ANGGARAN PERUSAHAAN (RKAP) TAHUN 2019"); 
    $excel->getActiveSheet()->getStyle('A3:AP12')->applyFromArray($style_col);

    $startRow = 1;
    $row = 2;
    $cellToMerge = 'I'.$startRow.':AF'.$row;
    $excel->getActiveSheet()->mergeCells($cellToMerge);
    $excel->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "No Rekg"); 
    $excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A3:A5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('A3:A5');

    $excel->setActiveSheetIndex(0)->setCellValue('A6', "1");     
    $excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);

    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Uraian"); 
    $excel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('B3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('B3:D5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('B3:D5');

    $excel->setActiveSheetIndex(0)->setCellValue('B6', "2");     
    $excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('B6:D6');

    $excel->setActiveSheetIndex(0)->setCellValue('E3', "PROGNOSA 2019"); 
    $excel->getActiveSheet()->getStyle('E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('E3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('E3:F5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('E3:F5');

    $excel->setActiveSheetIndex(0)->setCellValue('E6', "3");     
    $excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('E6:F6');
    
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "RKAP TAHUN 2019"); 
    $excel->getActiveSheet()->getStyle('G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('G3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('G3:H5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('G3:H5');

    $excel->setActiveSheetIndex(0)->setCellValue('G6', "3");     
    $excel->getActiveSheet()->getStyle('G6')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('G6:H6');
    
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "TRIWULAN I"); 
    $excel->getActiveSheet()->getStyle('I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('I3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('I3:P4')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('I3:P4');
    
    $excel->setActiveSheetIndex(0)->setCellValue('I5', "JANUARI"); 
    $excel->getActiveSheet()->getStyle('I5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('I5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('I5:J5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('I5:J5');

    $excel->setActiveSheetIndex(0)->setCellValue('K5', "FEBRUARI"); 
    $excel->getActiveSheet()->getStyle('K5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('K5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('K5:L5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('K5:L5');

    $excel->setActiveSheetIndex(0)->setCellValue('M5', "MARET"); 
    $excel->getActiveSheet()->getStyle('M5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('M5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('M5:N5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('M5:N5');
    
    $excel->setActiveSheetIndex(0)->setCellValue('O5', "JUMLAH"); 
    $excel->getActiveSheet()->getStyle('O5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('O5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('O5:P5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('O5:P5');

    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "TRIWULAN II"); 
    $excel->getActiveSheet()->getStyle('Q3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('Q3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('Q3:X4')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('Q3:X4');
    
    $excel->setActiveSheetIndex(0)->setCellValue('Q5', "APRIL"); 
    $excel->getActiveSheet()->getStyle('Q5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('Q5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('Q5:R5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('Q5:R5');

    $excel->setActiveSheetIndex(0)->setCellValue('S5', "MEI"); 
    $excel->getActiveSheet()->getStyle('S5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('S5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('S5:T5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('S5:T5');

    $excel->setActiveSheetIndex(0)->setCellValue('U5', "JUNI"); 
    $excel->getActiveSheet()->getStyle('U5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('U5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('U5:V5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('U5:V5');
    
    $excel->setActiveSheetIndex(0)->setCellValue('W5', "JUMLAH"); 
    $excel->getActiveSheet()->getStyle('W5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('W5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('W5:X5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('W5:X5');

    $excel->setActiveSheetIndex(0)->setCellValue('Y3', "TRIWULAN III"); 
    $excel->getActiveSheet()->getStyle('Y3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('Y3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('Y3:AF4')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('Y3:AF4');
    
    $excel->setActiveSheetIndex(0)->setCellValue('Y5', "JULI"); 
    $excel->getActiveSheet()->getStyle('Y5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('Y5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('Y5:Z5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('Y5:Z5');

    $excel->setActiveSheetIndex(0)->setCellValue('AA5', "AGUSTUS"); 
    $excel->getActiveSheet()->getStyle('AA5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('AA5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('AA5:AB5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('AA5:AB5');

    $excel->setActiveSheetIndex(0)->setCellValue('AC5', "SEPTEMBER"); 
    $excel->getActiveSheet()->getStyle('AC5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('AC5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('AC5:AD5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('AC5:AD5');
    
    $excel->setActiveSheetIndex(0)->setCellValue('AE5', "JUMLAH"); 
    $excel->getActiveSheet()->getStyle('AE5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('AE5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('AE5:AF5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('AE5:AF5');

    $excel->setActiveSheetIndex(0)->setCellValue('AG3', "TRIWULAN IV"); 
    $excel->getActiveSheet()->getStyle('AG3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('AG3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('AG3:AN4')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('AG3:AN4');
    
    $excel->setActiveSheetIndex(0)->setCellValue('AG5', "OKTOBER"); 
    $excel->getActiveSheet()->getStyle('AG5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('AG5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('AG5:AH5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('AG5:AH5');

    $excel->setActiveSheetIndex(0)->setCellValue('AI5', "NOVEMBER"); 
    $excel->getActiveSheet()->getStyle('AI5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('AI5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('AI5:AJ5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('AI5:AJ5');

    $excel->setActiveSheetIndex(0)->setCellValue('AK5', "DESEMBER"); 
    $excel->getActiveSheet()->getStyle('AK5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('AK5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('AK5:AL5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('AK5:AL5');
    
    $excel->setActiveSheetIndex(0)->setCellValue('AM5', "JUMLAH"); 
    $excel->getActiveSheet()->getStyle('AM5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('AM5')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('AM5:AN5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('AM5:AN5');

    $excel->setActiveSheetIndex(0)->setCellValue('AO3', "JUMLAH SETAHUN"); 
    $excel->getActiveSheet()->getStyle('AO3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('AO3')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('AO3:AP5')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('AO3:AP5');

    $excel->setActiveSheetIndex(0)->setCellValue('B12', "Jumlah"); 
    $excel->getActiveSheet()->getStyle('B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
    $excel->getActiveSheet()->getStyle('B12')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('B12:D12')->applyFromArray($style_col);
    $excel->getActiveSheet()->mergeCells('B12:D12');

    $excel->setActiveSheetIndex(0)->setCellValue('A8', "1"); 
    $excel->getActiveSheet()->getStyle('A8')->getFont()->setBold(TRUE); 
    $excel->getActiveSheet()->getStyle('A8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

    $excel->setActiveSheetIndex(0)->setCellValue('B8', "Luas Area(Ha)"); 
    $excel->getActiveSheet()->getStyle('B8')->getFont()->setBold(TRUE); 
    
    $s = $this->DataModel->getAll();

    $numrow = 9; // Set baris pertama untuk isi tabel adalah baris ke 9
    foreach($s as $data){ 
      // $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, '-');
      // $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->uraian);
      // $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->prognosa);
      // $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->rkap);
      // $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->januari);
      // $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->februari);
      // $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->maret);
      // $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->triwulan1);
      // $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->april);
      // $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->mei);
      // $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->juni);
      // $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->triwulan2);
      // $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->juli);
      // $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->agustus);
      // $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->september);
      // $excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->triwulan3);
      // $excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->oktober);
      // $excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->november);
      // $excel->getActiveSheet()->getStyle('AI'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->desember);
      // $excel->getActiveSheet()->getStyle('AK'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data->triwulan4);
      // $excel->getActiveSheet()->getStyle('AM'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->jumlah_setahun);
 
      // $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
   
    $d2 = $this->DataModel->getSum();
    // $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 12; // Set baris pertama untuk isi tabel adalah baris ke 12
    foreach($d2 as $data2){ 
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data2->tot_prognosa);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data2->tot_rkap);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data2->tot_januari);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data2->tot_februari);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data2->tot_maret);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data2->tot_triwulan1);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data2->tot_april);
      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);

      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data2->tot_mei);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data2->tot_juni);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data2->tot_triwulan2);
      $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data2->tot_juli);
      $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
      
      $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data2->tot_agustus);
      $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data2->tot_september);
      $excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data2->tot_triwulan3);
      $excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data2->tot_oktober);
      $excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data2->tot_november);
      $excel->getActiveSheet()->getStyle('AI'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data2->tot_desember);
      $excel->getActiveSheet()->getStyle('AK'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data2->tot_triwulan4);
      $excel->getActiveSheet()->getStyle('AM'.$numrow)->applyFromArray($style_row);
     
      $excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data2->tot_jumlah_setahun);
     
      // $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
   
    // Set width kolom
    // $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    // $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    // $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    // $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    // $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    // $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
    }
    
}
