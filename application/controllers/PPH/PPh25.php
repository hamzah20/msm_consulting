<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Pph25 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->db->select('*')
				 ->from('g_pph25_masukan');

		$queryGet = $this->db->get(); 

		$data['companies']	= $queryGet;
		$data['counter']	= 1;

		$this->load->view('cms/hitung_pajak/pph25',$data);
	}

	public function pph_25_fpdl()
	{
		$this->db->select('*')
				 ->from('g_pph25_fpdl');

		$queryGet = $this->db->get(); 

		$data['companies']	= $queryGet;
		$data['counter']	= 1;

		$this->load->view('cms/hitung_pajak/pph25_fpdl',$data);
	}
	
	public function pph_25_edit_masukan()
	{
		$this->db->select('*,IFNULL(RIVIEW,"BELUM") as RIVIEW_F,IFNULL(STATUS,"NORMAL") as STATUS_F,IFNULL(CREDITABLE,"0") as CREDITABLE_F')
			->from('g_pph25_masukan')
			->where('REC_ID', $this->input->get('id')); 

		$queryGet = $this->db->get();

		$id=$this->input->get('id');

		$data['masukan'] 	= $queryGet;
		$data['counter'] 	= 1;

		$this->load->view('cms/hitung_pajak/edit_pph25_masukan', $data); 
	}

	public function pph_25_bulan()
	{

		//$status = "STATUS='ACTIVE' OR STATUS='APPROVED'";

		$this->db->select('*')
			->from('v_g_companies_pph25_detail')
			->where('COMPANY_ID', $this->input->get('cid'));
			// ->where('STATUS', 'APPROVED');

		$queryGet = $this->db->get();

		$cid=$this->input->get('cid');
		$yid=$this->input->get('yid');

		$data['correction'] = $this->cms->getPembetulan25($cid,$yid);

		$data['companies'] 	= $queryGet;
		$data['counter'] 	= 1;
		$data['history'] 	= 0;

		if ($data['companies']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_25'));
			return;
		}

		$this->load->view('cms/hitung_pajak/pph25_bulan', $data); 
	}

	public function pph_25_bulan_summary()
	{ 
		$cid=$this->input->get('cid');
		$mid=$this->input->get('mid');
		$yid=$this->input->get('yid');
		// $mid=$this->input->get('yid');
		$data['correction'] = $this->cms->getPembetulanSummary($cid,$mid,$yid);
		$data['summary'] 	= $this->cms->getGeneralData('v_g_companies_pph25_detail', 'PPH_ID', $this->input->get('pid'));

		$this->db->select('*')
			->from('v_g_employee_pph25')
			->where('COMPANY_ID', trim($this->input->get('cid')))
			->where('PPH_ID', trim($this->input->get('pid')));


		// $data['employees'] 	= $this->cms->getGeneralData('v_g_employee_pph25', 'COMPANY_ID', trim($this->input->get('cid')));
		$data['employees'] 	= $this->db->get();
		$data['counter']	= 1;
		$data['payment']    = $this->cms->getSingularData('g_payment', 'PPH_ID', $this->input->get('pid'));
		$data['statuspph25']= $this->cms->cekstatuspph25($this->input->get('pid'));

		// if ($data['summary']->num_rows() == 0) {
		// 	$this->session->set_flashdata('query', 'invalid');
		// 	echo 'ga ada';
		// 	// redirect(base_url('pph_25/bulan?cid=' . $this->input->get('cid')));
		// } else {
		// 	$this->load->view('cms/hitung_pajak/pph25_bulan_summary');
		// }

		$this->load->view('cms/hitung_pajak/pph25_bulan_summary', $data);
	}

	public function pph_25_bulan_approve()
	{
		$pid=$this->input->get('pid');
		$cid=$this->input->get('cid');
		$yid=$this->input->get('yid');

		$statusApprove = array(
			'STATUS'  => 'WAITING FOR APPROVAL'
		);

		$this->cms->updateGeneralData('g_pph25', $statusApprove, 'PPH_ID', $this->input->get('pid'));
		$this->cms->updateGeneralData('g_employee_income', $statusApprove, 'PPH_ID', $this->input->get('pid'));

		redirect('PPH/Pph25/pph_25_bulan?cid='.$cid.'&pid='.$yid.'');		
	}

	public function generateXLSFile()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $companyID);
		

		$fileName = 'FORMAT_PPH25_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.xlsx';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A1:X2')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH25 Form')
			->setSubject('MSM Consulting PPH25 Form');

		$sheet->getStyle('A1:D2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');

		$sheet->getStyle('E1:E2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('0000FF');

		$sheet->getStyle('F1:F2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('3333FF');

		$sheet->getStyle('G1:P2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('6666FF');

		$sheet->getStyle('Q1:Q2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('9999FF');

		$sheet->getStyle('R1:T2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('FF8400');

		$sheet->getStyle('U1:U2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('FFA303');

		$sheet->getStyle('V1:V2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('508026');

		$sheet->getStyle('W1:X2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('FFC896');


		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH25');

		$sheet->setCellValue('A1', "No");
		$sheet->mergeCells('A1:A2');
		$sheet->getStyle('A1:A2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('B1', "Periode\n(YYYY-MM)");
		$sheet->mergeCells('B1:B2');
		$sheet->getStyle('B1:B2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('C1', "No. Urut\nKaryawan (Pegawai)");
		$sheet->mergeCells('C1:C2');
		$sheet->getStyle('C1:C2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('D1', 'Nama');
		$sheet->mergeCells('D1:D2');
		$sheet->getStyle('D1:D2')->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('E1', "Gaji/Pensiun\natau THT/JHT");
		$sheet->mergeCells('E1:E2');
		$sheet->getStyle('E1:E2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCelLValue('F1', 'Tunjangan PPh');
		$sheet->mergeCells('F1:F2');
		$sheet->getStyle('F1:F2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('G1', 'Tunjangan Lainnya');
		$sheet->mergeCells('G1:P2');
		$sheet->getStyle('G1:P2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('Q1', "Honorarium & Imbalan\nLainnya Sejenisnya");
		$sheet->mergeCells('Q1:Q2');
		$sheet->getStyle('Q1:Q2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('R1', 'Premi Asuransi dibayar Pemberi Kerja');
		$sheet->mergeCells('R1:T1');
		$sheet->setCellValue('R2', 'Premi JKK');
		$sheet->setCellValue('S2', 'Premi JKM');
		$sheet->setCellValue('T2', 'BPJS Kesehatan');
		$sheet->getStyle('R1:T1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('U1', "Natura & Kenikmatan\nLainnya");
		$sheet->mergeCells('U1:U2');
		$sheet->getStyle('U1:U2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('V1', "Tantiem, Bonus, Gratifikasi,\nJasa Produksi & THR");
		$sheet->mergeCells('V1:V2');
		$sheet->getStyle('V1:V2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('W1', 'Iuran');
		$sheet->setCellValue('W2', 'Iuran THT/JHT');
		$sheet->setCellValue('X2', 'Iuran JP');
		$sheet->mergeCells('W1:X1');
		$sheet->getStyle('W1:W2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		foreach (range('B', 'X') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}
		//EoL 1

		//2. Isi Excel pake data
		if ($employeeData->num_rows() != 0) {

			$colCounter = 3;
			$numCounter = 1;

			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularDataDetail('v_g_employee_pph25', 'PPH_ID', 'EMPLOYEE_ID',$pphID,$employee->EMPLOYEE_ID);
				//2.1 Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthName($pphData->row()->PERIOD_MONTH);
				//EoL 2.1

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $pphData->row()->PERIOD_YEAR . '-' . $monthName);
				$sheet->setCellValue('C' . $colCounter, $employee->EMPLOYEE_INTERNAL_ID);
				$sheet->setCellValue('D' . $colCounter, $employee->EMPLOYEE_NAME);
				$sheet->setCellValue('E' . $colCounter, $pphData->row()->EMPLOYEE_GAJI_POKOK);
				$sheet->setCellValue('F' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_PPH);
				$sheet->setCellValue('G' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_1 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_1); 
				$sheet->setCellValue('H' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_2 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_2);
				$sheet->setCellValue('I' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_3 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_3);
				$sheet->setCellValue('J' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_4 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_4);
				$sheet->setCellValue('K' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_5 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_5);
				$sheet->setCellValue('L' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_6 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_6);
				$sheet->setCellValue('M' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_7 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_7);
				$sheet->setCellValue('N' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_8 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_8);
				$sheet->setCellValue('O' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_9 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_9);
				$sheet->setCellValue('P' . $colCounter, $pphData->row()->EMPLOYEE_TUNJANGAN_10 == null ? '0' : $pphData->row()->EMPLOYEE_TUNJANGAN_10);
				$sheet->setCellValue('Q' . $colCounter, $pphData->row()->EMPLOYEE_HONORARIUM);
				$sheet->setCellValue('R' . $colCounter, $pphData->row()->EMPLOYEE_PREMI_JKK == null ? '0' : $pphData->row()->EMPLOYEE_PREMI_JKK);
				$sheet->setCellValue('S' . $colCounter, $pphData->row()->EMPLOYEE_PREMI_JKM == null ? '0' : $pphData->row()->EMPLOYEE_PREMI_JKM);
				$sheet->setCellValue('T' . $colCounter, $pphData->row()->EMPLOYEE_PREMI_BPJS == null ? '0' : $pphData->row()->EMPLOYEE_PREMI_BPJS);
				$sheet->setCellValue('U' . $colCounter, $pphData->row()->EMPLOYEE_NATURA);
				$sheet->setCellValue('V' . $colCounter, $pphData->row()->EMPLOYEE_TANTIEMBONUS);
				$sheet->setCellValue('W' . $colCounter, $pphData->row()->EMPLOYEE_IURAN_THT == null ? '0' : $pphData->row()->EMPLOYEE_IURAN_THT);
				$sheet->setCellValue('X' . $colCounter, $pphData->row()->EMPLOYEE_IURAN_JP == null ? '0' : $pphData->row()->EMPLOYEE_IURAN_JP);

				$colCounter++;
				$numCounter++;
			}
		}
		// //EoL 2


		$writer = new Xlsx($phpExcel);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
		ob_end_clean();

		$output = $writer->save('php://output');
	}

	public function generateXLSFileLaporPajak()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $companyID);

		$sql_pembetulan = $this->cms->count_pembetulan($pphID); 
		

		$fileName = 'LAPOR_PAJAK_PPH25_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.csv';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A1:I1')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH25 Lapor Pajak')
			->setSubject('MSM Consulting PPH25 Lapor Pajak');

		$sheet->getStyle('A1:A1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 

		$sheet->getStyle('B1:B1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 

		$sheet->getStyle('C1:C1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 

		$sheet->getStyle('D1:D1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 

		$sheet->getStyle('E1:E1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 

		$sheet->getStyle('F1:F1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 

		$sheet->getStyle('G1:G1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 

		$sheet->getStyle('H1:H1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 

		$sheet->getStyle('I1:I1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 


		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH25');

		$sheet->setCellValue('A1', "Masa Pajak");
		$sheet->mergeCells('A1:A1');
		$sheet->getStyle('A1:A1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('B1', "Tahun Pajak");
		$sheet->mergeCells('B1:B1');
		$sheet->getStyle('B1:B1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('C1', "Pembetulan");
		$sheet->mergeCells('C1:C1');
		$sheet->getStyle('C1:C1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('D1', "NPWP");
		$sheet->mergeCells('D1:D1');
		$sheet->getStyle('D1:D1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('E1', "Nama");
		$sheet->mergeCells('E1:E1');
		$sheet->getStyle('E1:E1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('F1', "Kode Pajak");
		$sheet->mergeCells('F1:F1');
		$sheet->getStyle('F1:F1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('G1', "Jumlah Bruto");
		$sheet->mergeCells('G1:G1');
		$sheet->getStyle('G1:G1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('H1', "Jumlah PPh");
		$sheet->mergeCells('H1:H1');
		$sheet->getStyle('H1:H1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('I1', "Kode Negara");
		$sheet->mergeCells('I1:I1');
		$sheet->getStyle('I1:I1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		foreach (range('B', 'X') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		} 

		if ($employeeData->num_rows() != 0) {

			$colCounter = 2;
			$numCounter = 1;

			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularDataDetail('v_g_employee_pph25', 'PPH_ID', 'EMPLOYEE_ID',$pphID,$employee->EMPLOYEE_ID);
				//2.1 Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthNameLP($pphData->row()->PERIOD_MONTH);
				foreach ($pphData->result() as $statusemployee);
				$cekstatusemployee = $statusemployee->EMPLOYEE_STATUS;

				if($cekstatusemployee == "TETAP"){
					$status = "25-100-01";
				} else{
					$status = "25-100-02";
				} 

				$sheet->setCellValue('A' . $colCounter, $monthName);
				$sheet->setCellValue('B' . $colCounter, $pphData->row()->PERIOD_YEAR);
				$sheet->setCellValue('C' . $colCounter, $sql_pembetulan->TOTAL_PEMBETULAN == null ? '0' : $sql_pembetulan->TOTAL_PEMBETULAN);
				$sheet->setCellValue('D' . $colCounter, str_replace('.','',str_replace('-', '',$pphData->row()->EMPLOYEE_NPWP)));
				$sheet->setCellValue('E' . $colCounter, $pphData->row()->EMPLOYEE_NAME);
				$sheet->setCellValue('F' . $colCounter, $status);
				$sheet->setCellValue('G' . $colCounter, $pphData->row()->EMPLOYEE_BRUTO);
				$sheet->setCellValue('H' . $colCounter, $pphData->row()->EMPLOYEE_PPHVAL);
				$sheet->setCellValue('I' . $colCounter, $pphData->row()->COUNTRY_CODE == 'INA' ? '' : $pphData->row()->COUNTRY_CODE);  

				$colCounter++;
				$numCounter++;
			}
		} 

		$writer = new Xlsx($phpExcel);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
		ob_end_clean();

		$output = $writer->save('php://output');
	}

	public function nett()
	{
		$this->db->select('EMPLOYEE_BRUTO')
				 ->from('g_employee_income')
				 ->where('PPH_ID', $this->input->post('pphID'))
				 ->where('EMPLOYEE_ID', $this->input->post('empID'));

		$EmpBrutoCheck = $this->db->get(); 

		foreach ($EmpBrutoCheck->result() as $EmpBruto); 	

	}

	public function testGrossUp()
	{
		$ptkpTarif = 54000000;
		$total     = 10000000;
		$totalPengurang = 0.05 * $total;

		// echo $totalPengurang;

		// $pphNon = (((0.05 * ((($total - $totalPengurang) * 12) - $ptkpTarif)) / 12));
		$pphVal = (((0.05 * (($total - $totalPengurang) * 12) - $ptkpTarif)) * 1.2) / 12;

		// $pphVal = (((0.05 * (($total - $totalPengurang) * 12) - $ptkpTarif)) * 1.2) / 12;

		echo $pphVal;


		$yearlyBruto = (((12 * $total) - (12 * $totalPengurang)) - $ptkpTarif);

		switch ($yearlyBruto) {
			case ($yearlyBruto <= 47500000):
				// echo 'lapisan 1';
				$pphVal = ($yearlyBruto - 0) *  (5 / 95) + 0;
				break;
			case (($yearlyBruto >= 47500000) && ($yearlyBruto <= 257500000)):
				// echo 'lapisan 2';
				$pphVal = ($yearlyBruto - 47500000) * (15 / 85) + 2500000;
				break;
			case (($yearlyBruto >= 257500000) && ($yearlyBruto <= 405000000)):
				// echo 'lapisan 3';
				$pphVal = ($yearlyBruto - 257500000) * (25 / 75) + 32500000;
				break;
			case ($yearlyBruto >= 405000000):
				// echo 'lapisan 4';
				$pphVal = ($yearlyBruto - 405000000) * (30 / 70) + 95000000;
				break;
			default:
				// echo 'ga kemana';
				break;
		}

		// echo round($pphVal / 12);
		// 392557
	}

	public function importMasukan()
	{
		$this->output->enable_profiler(TRUE);   

		$employeeArr = []; 


		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();

		$config['upload_path']          = './assets/upload/docs/';
		$config['allowed_types']        = 'csv';
		$config['overwrite']            = true;
		$config['encrypt_name']         = true;
		$config['remove_spaces']        = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('fileImport')) {
			echo 'ada yang salah';
			return;
		}

		$data = $this->upload->data();

		$loadExcel = $reader->load('assets/upload/docs/' .  $data['file_name']);
		$sheet = $loadExcel->getActiveSheet()->toArray(null, true, true, true);

		unset($sheet[1]);

		foreach ($sheet as $sheetData) { 

			$employeeData = array(
				'KODE_JENIS'                 	=> $sheetData['B'], 
				'FG_PENGGANTI'					=> $sheetData['C'],
				'NOMOR_DIREKTUR'				=> $sheetData['D'],
				'PERIOD_MONTH'					=> $sheetData['E'],
				'PERIOD_YEAR'					=> $sheetData['F'],
				'FACTURE_DATE'					=> $sheetData['G'],
				'FACTURE_NPWP'					=> $sheetData['H'],
				'FACTURE_NAME'					=> $sheetData['I'],
				'FACTURE_ADDRESS'				=> $sheetData['J'],
				'TOTAL_DPP'						=> $sheetData['K'],
				'TOTAL_PPN'						=> $sheetData['L'],
				'TOTAL_PPNBM'					=> $sheetData['M'],
				'CREDITABLE'					=> $sheetData['N'],
				'CREATED'					    => date('Y-m-d H:i:s')
			);  

			$this->cms->insertGeneralData('g_pph25_masukan', $employeeData);
		}
		redirect('pph_25'); 
	}

	public function importFPDL()
	{
		$this->output->enable_profiler(TRUE);   

		$employeeArr = []; 


		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();

		$config['upload_path']          = './assets/upload/docs/';
		$config['allowed_types']        = 'csv';
		$config['overwrite']            = true;
		$config['encrypt_name']         = true;
		$config['remove_spaces']        = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('fileImport')) {
			echo 'ada yang salah';
			return;
		}

		$data = $this->upload->data();

		$loadExcel = $reader->load('assets/upload/docs/' .  $data['file_name']);
		$sheet = $loadExcel->getActiveSheet()->toArray(null, true, true, true);

		unset($sheet[1]);

		foreach ($sheet as $sheetData) { 
			//echo $sheetData['A'];
			$datar=str_replace('"', '', $sheetData['A']);
			//echo $datar;
			$dataE=explode(',',$datar);
			//echo $dataE;
			//foreach ($dataE->result() as $key ) {
				echo $dataE[0];	
			//}
			$employeeData = array(
				'DK_DM'                 => $dataE[0], 
				'JENIS_TRANSAKSI'		=> $dataE[1],
				'JENIS_DOKUMEN'			=> $dataE[2],
				'KODE_JENIS_TRANSAKSI'	=> $dataE[3],
				'FG_PENGGANTI'			=> $dataE[4],
				'NOMOR_DOK_LAIN_GANTI'	=> $dataE[5],
				'NOMOR_DOK_LAIN'		=> $dataE[6],
				'TANGGAL_DOK_LAIN'		=> $dataE[7],
				'PERIOD_MONTH'			=> $dataE[8],
				'PERIOD_YEAR'			=> $dataE[9],
				'NPWP'					=> $dataE[10],
				'NAME'					=> $dataE[11],
				'ADDRESS'				=> $dataE[12],
				'TOTAL_DPP'				=> $dataE[13],
				'TOTAL_PPN'				=> $dataE[14],
				'TOTAL_PPNBM'			=> $dataE[15],
				'KETERANGAN'			=> $dataE[16],
				'FAPR'					=> $dataE[17],
				'TANGGAL_APPROVAL'		=> $dataE[18],
				'CREATED'				=> date('Y-m-d H:i:s')
			);  

			$this->cms->insertGeneralData('g_pph25_fpdl', $employeeData);
		}
		redirect('pph_25/fpdl'); 
	} 

	// Waiting Approve by Customer
	public function approveCustomer()
	{
		// Update status g_pph25
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'WAITING FOR APPROVAL BY CUSTOMER'
		);
		$this->cms->updateGeneralData('g_pph25', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'WAITING FOR APPROVAL BY CUSTOMER'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pphID'));

		// INSERT LOG
		$insertLog = array(
			'LOG_DATE' 	=> date('Y-m-d H:i:s'),
			'ACTION'	=> 'APPROVED',
			'USER_ID'	=> 'ADMIN',
			'REF_NO'	=> '00000',
			'SQLSYNTAX'	=> '..........'
		);
		$queryInsert = $this->cms->insertGeneralData('s_log', $insertLog);
	}

	// Waiting for Payment
	public function waitingPayment()
	{
		// Update status g_pph25
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'WAITING FOR PAYMENT'
		);
		$this->cms->updateGeneralData('g_pph25', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'WAITING FOR PAYMENT'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pphID'));

		// INSERT LOG
		$insertLog = array(
			'LOG_DATE' 	=> date('Y-m-d H:i:s'),
			'ACTION'	=> 'APPROVED',
			'USER_ID'	=> 'ADMIN',
			'REF_NO'	=> '00000',
			'SQLSYNTAX'	=> '..........'
		);
		$queryInsert = $this->cms->insertGeneralData('s_log', $insertLog);
	}

	// Payment
	public function Payment()
	{
		// Update status g_pph25
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'PAID'
		);
		$this->cms->updateGeneralData('g_pph25', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'PAID'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pphID'));

		// Cek sudah pernah melakukan pembayaran atau belum
		$this->db->select('PAID_PPH25')
				 ->from('g_payment')
				 ->where('PPH_ID', $this->input->post('pphID'));

		$cekstatuspayment = $this->db->get(); 

		foreach ($cekstatuspayment->result() as $statuspayment);

		// if(null($statuspayment)){
		// 	// Insert Payment
		// 	$insertPayment = array(
		// 		'PPH_ID'		=> $this->input->get('pphID'),
		// 		'COMPANY_ID' 	=> $this->input->get('cid'), 
		// 		'TOTAL_PPH25'	=> ,
		// 		'PAID_PPH25'	=> ,
		// 		'OWED_PPH25'	=> ,
		// 		'CREATED'		=> date('Y-m-d H:i:s')
		// 	);
		// 	$queryInsertPay = $this->cms->insertGeneralData('s_log', $insertLog);	
		// } else{
		// 	$updatePayment = array(
		// 		'TOTAL_PPH25'	=> ,
		// 		'PAID_PPH25'	=> ,
		// 		'OWED_PPH25'	=> ,
		// 		'UPDATED'		=> date('Y-m-d H:i:s')
		// 	);
		// 	$this->cms->updateGeneralData('g_pph25', $updateApproval, 'PPH_ID', $this->input->get('pphID'));
		// } 

		// INSERT LOG
		$insertLog = array(
			'LOG_DATE' 	=> date('Y-m-d H:i:s'),
			'ACTION'	=> 'PAYMENT',
			'USER_ID'	=> 'ADMIN',
			'REF_NO'	=> '00000',
			'SQLSYNTAX'	=> '..........'
		);
		$queryInsert = $this->cms->insertGeneralData('s_log', $insertLog);
	}

	// Tax Filing
	public function TaxFiling()
	{
		// Update status g_pph25
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'TAX FILING'
		);
		$this->cms->updateGeneralData('g_pph25', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'TAX FILING'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pphID'));

		// INSERT LOG
		$insertLog = array(
			'LOG_DATE' 	=> date('Y-m-d H:i:s'),
			'ACTION'	=> 'TAX FILING',
			'USER_ID'	=> 'ADMIN',
			'REF_NO'	=> '00000',
			'SQLSYNTAX'	=> '..........'
		);
		$queryInsert = $this->cms->insertGeneralData('s_log', $insertLog);
	}

	// HardCopy
	public function Hardcopy()
	{
		// Update status g_pph25
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'HARDCOPY'
		);
		$this->cms->updateGeneralData('g_pph25', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'HARDCOPY'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pphID'));

		// INSERT LOG
		$insertLog = array(
			'LOG_DATE' 	=> date('Y-m-d H:i:s'),
			'ACTION'	=> 'HARDCOPY',
			'USER_ID'	=> 'ADMIN',
			'REF_NO'	=> '00000',
			'SQLSYNTAX'	=> '..........'
		);
		$queryInsert = $this->cms->insertGeneralData('s_log', $insertLog);
	}

	// Lapor Pajak
	public function LaporPajak()
	{
		// Update status g_pph25
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'LAPOR PAJAK'
		);
		$this->cms->updateGeneralData('g_pph25', $updateApproval, 'PPH_ID', $this->input->get('pid'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'LAPOR PAJAK'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pid'));

		// INSERT LOG
		$insertLog = array(
			'LOG_DATE' 	=> date('Y-m-d H:i:s'),
			'ACTION'	=> 'LAPOR PAJAK',
			'USER_ID'	=> 'ADMIN',
			'REF_NO'	=> '00000',
			'SQLSYNTAX'	=> '..........'
		);
		$queryInsert = $this->cms->insertGeneralData('s_log', $insertLog);

		redirect('pph_25/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid'). '&mid=' . $this->input->get('mid'). '&yid=' . $this->input->get('yid'));
	}

	// Closed
	public function Closed()
	{
		// Update status g_pph25
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'CLOSED'
		);
		$this->cms->updateGeneralData('g_pph25', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'CLOSED'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pphID'));

		// INSERT LOG
		$insertLog = array(
			'LOG_DATE' 	=> date('Y-m-d H:i:s'),
			'ACTION'	=> 'CLOSED',
			'USER_ID'	=> 'ADMIN',
			'REF_NO'	=> '00000',
			'SQLSYNTAX'	=> '..........'
		);
		$queryInsert = $this->cms->insertGeneralData('s_log', $insertLog);
	}


	public function generateReport()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $companyID);
		$pphData 		= $this->cms->getSingularData('g_pph25', 'PPH_ID', $pphID);

		$phpExcel->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
		$phpExcel->getActiveSheet()->setShowGridlines(false);
		$phpExcel->getActiveSheet()->getSheetView()->setZoomScale(85);
		$phpExcel->setActiveSheetIndex(0)->setTitle('Info PPh 25');
		$phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(2.50);
		$phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(2.50);
		$phpExcel->getActiveSheet()->getStyle('C13:H13')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');
		$phpExcel->getActiveSheet()->getStyle('C18:H18')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f0f0f0');

		$_oBdr = array(
			'borders' => array(
				'allBorders' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('argb' => 'bfbfbf'),
				),
			),
		);

		$phpExcel->getActiveSheet()->getStyle('C13:H18')->applyFromArray($_oBdr);

		$phpExcel->getActiveSheet()->mergeCells('B2:K2');
		$phpExcel->getActiveSheet()->setCellValue('B2', 'Jakarta, ' . date('d-m-Y'));

		$phpExcel->getActiveSheet()->mergeCells('B4:K4');
		$phpExcel->getActiveSheet()->setCellValue('B4', 'Kepada Yth.');

		$phpExcel->getActiveSheet()->mergeCells('B5:K5');
		$phpExcel->getActiveSheet()->setCellValue('B5', $companyData->row()->COMPANY_NAME);

		$phpExcel->getActiveSheet()->mergeCells('B6:K6');
		$phpExcel->getActiveSheet()->setCellValue('B6', 'NPWP : ' . $companyData->row()->COMPANY_NPWP);

		$phpExcel->getActiveSheet()->mergeCells('B7:K7');
		$phpExcel->getActiveSheet()->setCellValue('B7',  $companyData->row()->COMPANY_ADDRESS);

		$phpExcel->getActiveSheet()->mergeCells('B9:K9');
		$phpExcel->getActiveSheet()->setCellValue('B9', 'Perihal : INFO PPh 25 TERUTANG MASA ' . strtoupper($pphData->row()->PERIOD_MONTH) . ' TAHUN PAJAK ' . $pphData->row()->PERIOD_YEAR . '  YANG HARUS DISETOR');
		$phpExcel->getActiveSheet()->setCellValue('B11', "'1.");
		$phpExcel->getActiveSheet()->getStyle('B11')->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

		$phpExcel->getActiveSheet()->mergeCells('C11:H11');
		$phpExcel->getActiveSheet()->setCellValue('C11', 'Perhitungan PPh 25 - Pegawai Tetap');

		$phpExcel->getActiveSheet()->mergeCells('C13:C14');
		$phpExcel->getActiveSheet()
			->getStyle('C13:C14')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('C13', 'JUMLAH PEGAWAI TETAP');

		$phpExcel->getActiveSheet()->mergeCells('D13:D14');
		$phpExcel->getActiveSheet()->getStyle('D13:D14')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('D13', 'TOTAL PENGHASILAN BRUTO');

		$phpExcel->getActiveSheet()->mergeCells('E13:E14');
		$phpExcel->getActiveSheet()->getStyle('E13:E14')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('E13', 'PPh 25 TERUTANG');

		$phpExcel->getActiveSheet()->mergeCells('F13:F14');
		$phpExcel->getActiveSheet()->getStyle('F13:F14')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('F13', 'KOMPENSASI');

		$phpExcel->getActiveSheet()->mergeCells('G13:G14');
		$phpExcel->getActiveSheet()->getStyle('G13:G14')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('G13', 'PPh 25 KURANG BAYAR');

		$_oWid = 10;
		$phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth($_oWid + 2);

		$phpExcel->getActiveSheet()->mergeCells('H13:H14');
		$phpExcel->getActiveSheet()->getStyle('H13:H14')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('H13', 'KODE JENIS SETORAN');

		$phpExcel->getActiveSheet()->mergeCells('C15:C17');
		$phpExcel->getActiveSheet()->getStyle('C15:C17')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('C15', $employeeData->num_rows());

		$phpExcel->getActiveSheet()->setCellValue('C18', '(Total)');
		$phpExcel->getActiveSheet()->getStyle('C18')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->getStyle('C18')->getFont()->setBold(true);

		$phpExcel->getActiveSheet()->mergeCells('D15:D17');
		$phpExcel->getActiveSheet()->getStyle('D15:D17')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('D15', $pphData->row()->COMPANY_BRUTO);
		$phpExcel->getActiveSheet()->getStyle('D15')->getNumberFormat()->setFormatCode('#,##0');

		$phpExcel->getActiveSheet()->setCellValue('D18', $pphData->row()->COMPANY_KBLB);
		$phpExcel->getActiveSheet()->getStyle('D18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		$phpExcel->getActiveSheet()->getStyle('D18')->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('D18')->getNumberFormat()->setFormatCode('#,##0');

		$phpExcel->getActiveSheet()->mergeCells('E15:E17');
		$phpExcel->getActiveSheet()->getStyle('E15:E17')->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('E15', $pphData->row()->COMPANY_BRUTO);
		$phpExcel->getActiveSheet()->getStyle('E15')->getNumberFormat()->setFormatCode('#,##0');

		$phpExcel->getActiveSheet()->setCellValue('E18', $pphData->row()->COMPANY_BRUTO);
		$phpExcel->getActiveSheet()->getStyle('E18')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->getStyle('E18')->getNumberFormat()->setFormatCode('#,##0');

		$phpExcel->getActiveSheet()->mergeCells('F15:F17');
		$phpExcel->getActiveSheet()->getStyle('F15:F17')->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('F15', $pphData->row()->COMPANY_COMPENSATION);
		$phpExcel->getActiveSheet()->getStyle('F15')->getNumberFormat()->setFormatCode('#,##0');

		$phpExcel->getActiveSheet()->setCellValue('F18', $pphData->row()->COMPANY_COMPENSATION);
		$phpExcel->getActiveSheet()->getStyle('F18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		$phpExcel->getActiveSheet()->getStyle('F18')->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('F18')->getNumberFormat()->setFormatCode('#,##0');

		$phpExcel->getActiveSheet()->mergeCells('G15:G17');
		$phpExcel->getActiveSheet()->getStyle('G15:G17')->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('G15', $pphData->row()->COMPANY_KBLB);
		$phpExcel->getActiveSheet()->getStyle('G15')->getNumberFormat()->setFormatCode('#,##0');

		$phpExcel->getActiveSheet()->setCellValue('G18', $pphData->row()->COMPANY_KBLB);
		$phpExcel->getActiveSheet()->getStyle('G18')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		$phpExcel->getActiveSheet()->getStyle('G18')->getFont()->setBold(true);
		$phpExcel->getActiveSheet()->getStyle('G18')->getNumberFormat()->setFormatCode('#,##0');

		$phpExcel->getActiveSheet()->mergeCells('H15:H17');
		$phpExcel->getActiveSheet()->getStyle('H15:H17')->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$phpExcel->getActiveSheet()->setCellValue('H15', '411125-100');


		$phpExcel->getActiveSheet()->mergeCells('C20:K20');
		$phpExcel->getActiveSheet()->setCellValue('C20', '>> Jadi PPh yang harus di bayar Masa ' . $pphData->row()->PERIOD_MONTH . ' Tahun Pajak ' . $pphData->row()->PERIOD_YEAR . ' adalah sebagai berikut  Rp. ' . number_format($pphData->row()->COMPANY_KBLB));

		$phpExcel->getActiveSheet()->mergeCells('C25:K25');
		$phpExcel->getActiveSheet()->setCellValue('C25', '>> Mohon disetorkan paling lambat tanggal 10 ' . $pphData->row()->PERIOD_MONTH . ' ' . $pphData->row()->PERIOD_YEAR);

		$phpExcel->getActiveSheet()->mergeCells('C25:K25');
		$phpExcel->getActiveSheet()->setCellValue('C25', '>> Jika sudah disetorkan mohon diupload NTPN-nya');

		$phpExcel->getActiveSheet()->mergeCells('C24:K24');
		$phpExcel->getActiveSheet()->setCellValue('C24', 'Terima Kasih');

		$phpExcel->getActiveSheet()->mergeCells('C27:K27');
		$phpExcel->getActiveSheet()->setCellValue('C27', 'Regards,');

		$phpExcel->getActiveSheet()->mergeCells('C28:K28');
		$phpExcel->getActiveSheet()->setCellValue('C28', 'Team MSM');

		$phpExcel->getActiveSheet()->mergeCells('C29:K29');
		$phpExcel->getActiveSheet()->setCellValue('C29', 'Ph : +6252 63858603/04');

		foreach (range('C', 'Z') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}

		$phpExcel->getActiveSheet()->setSelectedCell('A1');
		$_objWriter = new Xlsx($phpExcel);
		$_varFLENME = 'REPORT_PPh25_' . date('Ymd') . '_' . $companyData->row()->COMPANY_NAME . '.xlsx';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $_varFLENME);
		header('Cache-Control: max-age=0');
		$_objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($phpExcel, 'Xlsx');
		ob_end_clean();

		$_objWriter->save('php://output');
	}

	public function addCompany()
	{
		//1. Cek data yang ditambah termasuk ke PEMBETULAN atau DATA BARU
		$this->db->select('*')
			->from('g_pph25')
			->where('COMPANY_ID', $this->input->post('companyID'))
			->where('PERIOD_YEAR', $this->input->post('addPeriodeTahun'))
			->where('PERIOD_MONTH', $this->input->post('addPeriodeBulan'));

		$queryGet = $this->db->get();

		// echo $this->input->post('addPeriodeTahun');

		$companyData = array(
			'PPH_ID'		=> $this->incube->generateID(10),
			'COMPANY_ID'	=> $this->input->post('companyID'),
			'PERIOD_YEAR'	=> $this->input->post('addPeriodeTahun'),
			'PERIOD_MONTH'	=> $this->input->post('addPeriodeBulan'),
			'CREATED'		=> date('Y-m-d h:i:s'),
			'STATUS'		=> ($queryGet->num_rows() > 0 ? 'HISTORY' : 'ACTIVE'),
		);

		$queryInsert = $this->cms->insertGeneralData('g_pph25', $companyData);
		//EoL 1

		if (!$queryInsert) {
			$this->session->set_flashdata('query', 'invalid');
		} else {
			$this->session->set_flashdata('query', 'success');
		}

		redirect(($this->input->post('pphFlag') == true ? base_url('pph_25/bulan?cid=' . $this->input->post('companyID')) : base_url('pph_25')));
	} 

	public function pph_25_tahun()
	{
		$this->load->view('cms/hitung_pajak/pph25_tahun');
	}

	public function pph_25_bulan_summary_karyawan()
	{
		$this->db->select('*')
			->from('v_g_employee_pph25')
			->where('EMPLOYEE_ID', trim($this->input->get('eid')))
			->where('PPH_ID', trim($this->input->get('pid')));


		$data['employee'] 	= $this->db->get();

		if ($data['employee']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_25/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')));
		}

		$this->load->view('cms/hitung_pajak/pph25_bulan_summary_karyawan', $data);
	}

	public function edit_pph_25_bulan_summary_karyawan()
	{
		$this->db->select('*')
			->from('v_g_employee_pph25')
			->where('EMPLOYEE_ID', trim($this->input->get('eid')))
			->where('PPH_ID', trim($this->input->get('pid')));


		$data['employee'] 	= $this->db->get();

		if ($data['employee']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_25/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')));
		}

		$this->load->view('cms/hitung_pajak/edit_pph25_bulan_summary_karyawan', $data);
	}

	public function update_pph_25_masukan()
	{ 
		$updatePPH25 = array(
			'CREDITABLE'	=> $this->input->post('editCreditable'),  
			'RIVIEW'		=> $this->input->post('editRiview'),  
			'STATUS' 	 	=> $this->input->post('editStatus'),  
			'NOTES' 		=> $this->input->post('editNotes'), 
			'DATE_RIVIEW'	=> date('Y-m-d H:i:s') 
		);

		$this->cms->updateGeneralData('g_pph25_masukan', $updatePPH25, 'REC_ID', $this->input->post('id')); 
		redirect('pph_25');
	}

	public function update_pph_25_bulan_summary_karyawan()
	{
		$this->output->enable_profiler(TRUE);  

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$employeeCheck = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_ID', $this->input->post('employeeID'));
		$pphCheck 	   = $this->cms->getSingularData('g_pph25', 'PPH_ID', $this->input->post('pphID'));

		//Deklrasi Variabel awal
		$companyBruto = 0;
		$companyNeto  = 0;
		$companyPPH25 = 0;

		// Cek apakah perusahaan tersedia
		if ($companyCheck->num_rows() == 0) {
			echo 'tidak ada perusahaan';
			return;
		}

		// Cek apakah karywan terdaftar 
		if ($employeeCheck->num_rows() == 0) {
			echo 'tidak ada pegawai aktif';
			return;
		} 

		foreach ($employeeCheck->result() as $employee);

		$employeeArr = array(
			'NAME'					=> $employee->EMPLOYEE_NAME,
			'KTP'					=> $employee->EMPLOYEE_KTP,
			'NPWP'					=> $employee->EMPLOYEE_NPWP,
			'PTKP'					=> $employee->EMPLOYEE_PTKP_STATUS,
			'PTKP_TARIF'			=> $employee->TK_TARIF,
			'NATIONALITY'			=> $employee->EMPLOYEE_NATIONALITY,
			'NATIONALITY_STATUS'	=> $employee->EMPLOYEE_NATIONALITY_STATUS,
			'INTERNAL_ID'			=> $employee->EMPLOYEE_INTERNAL_ID,
			'ID'					=> $employee->EMPLOYEE_ID
		); 

		// nanti taro dibawah sini 

		// Generate baru ID Income
		$incomeID     = $this->incube->generateID(10);

		// Cek data pegawai ada atau engga & ambil PKTP Tarif Mereka
		
		// Check NPWP
		$this->db->select('*')
				 ->from('g_employee')
				 ->where('EMPLOYEE_ID', $this->input->post('employeeID'));

		$CheckEmpNPWP = $this->db->get(); 
		foreach ($CheckEmpNPWP->result() as $CheckNPWP);  

		// Memberi nilai awal untuk total tunjangan
		$totalTunjangan = 0;

		// Menangkap value dari form edit
		$gaji 		 = str_replace(',','',$this->input->post('editGaji'));  
		$Tunjpph=0;
		$tunjangan1  = str_replace(',','',$this->input->post('editTunjangan1')); 
		$tunjangan2  = str_replace(',','',$this->input->post('editTunjangan2')); 
		$tunjangan3  = str_replace(',','',$this->input->post('editTunjangan3')); 
		$tunjangan4  = str_replace(',','',$this->input->post('editTunjangan4')); 
		$tunjangan5  = str_replace(',','',$this->input->post('editTunjangan5')); 
		$tunjangan6  = str_replace(',','',$this->input->post('editTunjangan6')); 
		$tunjangan7  = str_replace(',','',$this->input->post('editTunjangan7')); 
		$tunjangan8  = str_replace(',','',$this->input->post('editTunjangan8')); 
		$tunjangan9  = str_replace(',','',$this->input->post('editTunjangan9')); 
		$tunjangan10 = str_replace(',','',$this->input->post('editTunjangan10')); 

		$premijkk  = str_replace(',','',$this->input->post('editJKK')); 
		$premijkm  = str_replace(',','',$this->input->post('editJKM')); 
		$premibpjs = str_replace(',','',$this->input->post('editBPJS')); 

		$iuranJHT  = str_replace(',','',$this->input->post('editJHT')); 
		$iuranJP   = str_replace(',','',$this->input->post('editJP')); 

		$honarium  = str_replace(',','',$this->input->post('editHonarium')); 
		$natura    = str_replace(',','',$this->input->post('editNatura')); 
		$tantiem   = str_replace(',','',$this->input->post('editTantiem')); 

		//Kalkulasi Bruto, Neto & Jumlah Pengurang (TUNJANGAN, IURAN, PREMI, DLL) 
		$totalTunjangan = $tunjangan1 + $tunjangan2 + $tunjangan3 + $tunjangan4 + $tunjangan5 + $tunjangan6 + $tunjangan7 + $tunjangan8 + $tunjangan9 + $tunjangan10;
		$totalPremi 	= $premijkk + $premijkm + $premibpjs;
		$iuran 			= $iuranJHT + $iuranJP;

		$totalBruto 	= $gaji + $totalTunjangan + $honarium + $totalPremi + $natura + $tantiem;

		// Menghitung biaya Jabatan (Max 500.000)
		$bijab = 0.05 * $totalBruto;
		if($bijab>500000) {
			$bijab= 500000;
		}
		$totalPengurang	= $bijab + $iuran;

		//Tarif PTKP Pegawai 
		foreach ($employeeCheck->result() as $employee);
		$ptkpTarif = $employee->TK_TARIF;

		//Kalkulasi PPH25 Non-Gross Up
		$CheckNPWP->EMPLOYEE_ID;
		$PPH_ID=$this->input->post('pphID');

		$this->db->select('*')
		 		 ->from('g_employee_income')
		 		 ->where('EMPLOYEE_ID', $CheckNPWP->EMPLOYEE_ID)
		 		 ->where('PPH_ID', $PPH_ID);

		$CheckBruto = $this->db->get(); 

		foreach ($CheckBruto->result() as $BrutoEmp){
			$persen=$this->cms->getPersen($BrutoEmp->EMPLOYEE_BRUTO);
			foreach ($persen->result() as $CheckPersen){
				echo  $BrutoEmp->EMPLOYEE_BRUTO." - ".$CheckPersen->PRESENTASE."<br>"; 
			}
		}
			
		$yearlyNeto = 12 * ($totalBruto - $totalPengurang);
		$yearlyPKP  = $yearlyNeto - $ptkpTarif;

		//Dibulatkan biar 3 digit dibelakang jadi 0
		$yearlyPKP = (floor($yearlyPKP / 1000)) * 1000;

		//Kalkulasi PPH25 Gross UP
		if ($companyCheck->row()->PPHCOUNT_METHOD == 'GROSS UP') {
			
			switch ($yearlyPKP) {
				case ($yearlyPKP <= 47500000):
					// echo 'lapisan 1';
					$Tunjpph = ($yearlyPKP - 0) *  (5 / 95) + 0;
					break;
				case (($yearlyPKP >= 47500000) && ($yearlyPKP <= 257500000)):
					// echo 'lapisan 2';
					$Tunjpph = ($yearlyPKP - 47500000) * (15 / 85) + 2500000;
					break;
				case (($yearlyPKP >= 257500000) && ($yearlyPKP <= 405000000)):
					// echo 'lapisan 3';
					$Tunjpph = ($yearlyPKP - 257500000) * (25 / 75) + 32500000;
					break;
				case ($yearlyPKP >= 405000000):
					// echo 'lapisan 4';
					$Tunjpph = ($yearlyPKP - 405000000) * (30 / 70) + 95000000;
					break;
				default:
					break;
			}

			$Tunjpph = $Tunjpph/12; 

			$monthlyPPH = 0;

			//while $tunjpph <> $monnthlyPPH
			while ($Tunjpph != $monthlyPPH) { 
				//HITUNG YearlyPKP (after tunjanganpph)
				 $totalBruto 	= $gaji + $Tunjpph + $totalTunjangan + $honarium + $totalPremi + $natura + $tantiem; 


				// Biaya jabatan max 500 ribu
				// Biaya jabatan dihitung 5% dari total bruto
				// Jika setalah dihitung biaya jabatan > 500 ribu, 
				// Maka akan dibuat sebesar 500 ribu
				$bijab = 0.05 * $totalBruto;
				if($bijab>500000) {
					$bijab= 500000;
				}
				$totalPengurang	= $bijab + $iuran;
						
				$yearlyNeto = 12 * ($totalBruto - $totalPengurang);
				$yearlyPKP  = $yearlyNeto - $ptkpTarif;

				//Dibulatkan biar 3 digit dibelakang jadi 0
				$yearlyPKP = (floor($yearlyPKP / 1000)) * 1000;


				if ($yearlyPKP > 0) {
				    if ($yearlyPKP > 500000000) {
				        $tier1 = 0.05 * 50000000;
				        $tier2 = 0.15 * 200000000;
				        $tier3 = 0.25 * 250000000;
				        $tier4 = 0.3 * ($yearlyPKP - 500000000);
				        $yearlyPPH = $tier1 + $tier2 + $tier3 + $tier4;
				    } elseif ($yearlyPKP > 250000000) {
				        $tier1 = 0.05 * 50000000;
				        $tier2 = 0.15 * 200000000;
				        $tier3 = 0.25 * ($yearlyPKP - 250000000);
				        $yearlyPPH = $tier1 + $tier2 + $tier3;
				    } elseif ($yearlyPKP > 50000000) {
				        $tier1 = 0.05 * 50000000;
				        $tier2 = 0.15 * ($yearlyPKP - 50000000);
				        $yearlyPPH = $tier1 + $tier2;
				    } else {
				        $tier1 = 0.05 * $yearlyPKP;
				        $yearlyPPH = $tier1;
				    }
				}		

				$monthlyPPH = ($yearlyPPH / 12);

				if($Tunjpph != $monthlyPPH){
					
					$Tunjpph = $monthlyPPH;
					$monthlyPPH = 0;
				}

			}
		}


		if ($yearlyPKP > 0) {
		    if ($yearlyPKP > 500000000) {
		        $tier1 = 0.05 * 50000000;
		        $tier2 = 0.15 * 200000000;
		        $tier3 = 0.25 * 250000000;
		        $tier4 = 0.3 * ($yearlyPKP - 500000000);
		        $yearlyPPH = $tier1 + $tier2 + $tier3 + $tier4;
		    } elseif ($yearlyPKP > 250000000) {
		        $tier1 = 0.05 * 50000000;
		        $tier2 = 0.15 * 200000000;
		        $tier3 = 0.25 * ($yearlyPKP - 250000000);
		        $yearlyPPH = $tier1 + $tier2 + $tier3;
		    } elseif ($yearlyPKP > 50000000) {
		        $tier1 = 0.05 * 50000000;
		        $tier2 = 0.15 * ($yearlyPKP - 50000000);
		        $yearlyPPH = $tier1 + $tier2;
		    } else {
		        $tier1 = 0.05 * $yearlyPKP;
		        $yearlyPPH = $tier1;
		    }
		}		

		$monthlyPPH = ($yearlyPPH / 12);

		if (empty($CheckNPWP)) {
			//Kalau misalnya pegawai ga punya NPWP
			$monthlyPPHFinal = $monthlyPPH  * 1.2;
		} else {
			//Kalau misalnya pegawai punya NPWP		
			$monthlyPPHFinal = $monthlyPPH;
		} 
			
		

		// Mengecek status pada table g_pph25, jika status belum LAPOR PAJAK
		// Maka data lama pada g_employee_income akan dihapus terlebih dahulu, baru diinputkan data terbaru
		$this->db->select('STATUS')
				 ->from('g_pph25')
				 ->where('PPH_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 

		foreach ($status->result() as $key); 

		// Jika status bukan lapor pajak, hapus terlebih dahulu data lama di g_employee_income
		if($key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING"){
			
			$processType='REVISI';

			// Ngehapus data di g_employee_income berdasarkan PPH ID dan Employee ID
			$this->cms->deleteGeneralDataDouble('g_employee_income', 'PPH_ID', $this->input->post('pphID'), 'EMPLOYEE_ID', $this->input->post('employeeID'));

			// Update status di g_pph25 dan g_employee_income menjadi ON PROGRESS
			$updatePPH25 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph25', $updatePPH25, 'PPH_ID', $this->input->post('pphID')); 
		} elseif ($key->STATUS == "LAPOR PAJAK" OR $key->STATUS  == "HARDCOPY" ) {
			//PEMBETULANN
			$processType='PEMBETULAN';

			// // Update data sebelumnya, sebelum di inputkan data baru
			// $updatePPH25 = array(
			// 	'UPDATED'	=> date('Y-m-d H:i:s'),
			// 	'STATUS'	=> 'ON PROGRESS'
			// );
			// $this->cms->updateGeneralData('g_pph25', $updatePPH25, 'PPH_ID', $this->input->post('pphID')); 

			foreach ($pphCheck->result() as $cekPPH25);
			$monthCheck = $cekPPH25->PERIOD_MONTH;
			$yearCheck = $cekPPH25->PERIOD_YEAR;
			$prevPPHVAL = $cekPPH25->COMPANY_PPHVAL;

			$pembetulanKe = $this->cms->cekpembetulan($this->input->post('companyID'), $monthCheck, $yearCheck); 

			// Ubah dulu status lama jadi HISTORY
			$updateStatusPPH25 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'HISTORY'
			);
			$this->cms->updateGeneralData('g_pph25', $updateStatusPPH25, 'PPH_ID', $this->input->post('pphID')); 
		}

		if($processType=="REVISI") {
			$pphID = $this->input->post('pphID');
		}else {
			// Generate PPH ID baru
			$pphID = $this->incube->generateID(10);

			// Ambil data bulan dan tahun 
			foreach ($pphCheck->result() as $cekPPH25);
			$monthCheck = $cekPPH25->PERIOD_MONTH;
			$yearCheck = $cekPPH25->PERIOD_YEAR;

			$companyData = array(
				'PPH_ID'		=> $pphID,
				'COMPANY_ID'	=> $this->input->post('companyID'),
				'PERIOD_YEAR'	=> $yearCheck,
				'PERIOD_MONTH'	=> $monthCheck,
				'CREATED'		=> date('Y-m-d h:i:s'),
				'STATUS'		=> 'ON PROGRESS'
			);

			$queryInsert = $this->cms->insertGeneralData('g_pph25', $companyData);
			//EoL 1
			
		}

		//EoL PPH25 Gross Up
		$employeeData = array(
			'INCOME_ID'                 	=> $incomeID,
			'PPH_ID'						=> $pphID,
			'COMPANY_ID'           			=> $this->input->post('companyID'),
			'EMPLOYEE_ID'             		=> $this->input->post('employeeID'),
			'EMPLOYEE_GAJI_POKOK'			=> $gaji,
			'EMPLOYEE_TUNJANGAN_PPH'		=> $Tunjpph,
			'EMPLOYEE_TUNJANGAN_1'			=> $tunjangan1,
			'EMPLOYEE_TUNJANGAN_2'			=> $tunjangan2,
			'EMPLOYEE_TUNJANGAN_3'			=> $tunjangan3,
			'EMPLOYEE_TUNJANGAN_4'			=> $tunjangan4,
			'EMPLOYEE_TUNJANGAN_5'			=> $tunjangan5,
			'EMPLOYEE_TUNJANGAN_6'			=> $tunjangan6,
			'EMPLOYEE_TUNJANGAN_7'			=> $tunjangan7,
			'EMPLOYEE_TUNJANGAN_8'			=> $tunjangan8,
			'EMPLOYEE_TUNJANGAN_9'			=> $tunjangan9,
			'EMPLOYEE_TUNJANGAN_10'			=> $tunjangan10,
			'EMPLOYEE_TUNJANGAN_LAINNYA'	=> $totalTunjangan,
			'EMPLOYEE_HONORARIUM'			=> $honarium,
			'EMPLOYEE_PREMI_JKK'			=> $premijkk,
			'EMPLOYEE_PREMI_JKM'			=> $premijkm,
			'EMPLOYEE_PREMI_BPJS'			=> $premibpjs,
			'EMPLOYEE_PREMI'				=> $totalPremi,
			'EMPLOYEE_NATURA'				=> $natura,
			'EMPLOYEE_TANTIEMBONUS'			=> $tantiem,
			'EMPLOYEE_IURAN_THT'			=> $iuranJHT,
			'EMPLOYEE_IURAN_JP'				=> $iuranJP,
			'EMPLOYEE_IURAN_PENSIUN'		=> $iuran,
			'EMPLOYEE_BIAYA_JABATAN'		=> $bijab,
			'EMPLOYEE_TOTAL_PENGURANGAN'	=> $iuran+$bijab,
			'EMPLOYEE_BRUTO'				=> $totalBruto,
			'EMPLOYEE_NETTO'				=> $totalBruto - $totalPengurang,
			'EMPLOYEE_NETTO_YEAR'			=> (floor($totalBruto) - $totalPengurang)*12,
			'EMPLOYEE_PTKP'					=> $ptkpTarif,
			'EMPLOYEE_PKP_YEAR'				=> $yearlyPKP,
			'EMPLOYEE_PPHVAL_YEAR'			=> round($yearlyPPH),
			'EMPLOYEE_PPHVAL_MASA'			=> round($monthlyPPH),
			'EMPLOYEE_PPHVAL'				=> round($monthlyPPHFinal),
			'CREATED'						=> date('Y-m-d h:i:s'),
			'STATUS'						=> 'ON PROGRESS', 
			'PPHCOUNT_METHOD'				=> $companyCheck->row()->PPHCOUNT_METHOD
		);

		$this->cms->insertGeneralData('g_employee_income', $employeeData);


		if($processType=="PEMBETULAN") {
			$this->cms->getCountDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('employeeID'));
			//ECHO $this->input->post('pphID');
			//ECHO "<BR>";
			//ECHO $this->input->post('employeeID');

			$employeeNoEditData = $this->cms->getDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('employeeID'));
			foreach ($employeeNoEditData->result() as $employeeNoEdit) {
				$incomeID     = $this->incube->generateID(10);
				$databaru = array(
					'INCOME_ID'								=> $incomeID,
					'PPH_ID'								=> $pphID,
					'COMPANY_ID'							=> $employeeNoEdit->COMPANY_ID,
					'EMPLOYEE_ID'							=> $employeeNoEdit->EMPLOYEE_ID,
					'EMPLOYEE_GAJI_POKOK'					=> $employeeNoEdit->EMPLOYEE_GAJI_POKOK,
					'EMPLOYEE_TUNJANGAN_PPH'				=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_PPH,
					'EMPLOYEE_TUNJANGAN_1'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_1,
					'EMPLOYEE_TUNJANGAN_2'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_2,
					'EMPLOYEE_TUNJANGAN_3'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_3,
					'EMPLOYEE_TUNJANGAN_4'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_4,
					'EMPLOYEE_TUNJANGAN_5'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_5,
					'EMPLOYEE_TUNJANGAN_6'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_6,
					'EMPLOYEE_TUNJANGAN_7'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_7,
					'EMPLOYEE_TUNJANGAN_8'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_8,
					'EMPLOYEE_TUNJANGAN_9'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_9,
					'EMPLOYEE_TUNJANGAN_10'					=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_10,
					'EMPLOYEE_TUNJANGAN_LAINNYA'			=> $employeeNoEdit->EMPLOYEE_TUNJANGAN_LAINNYA,
					'EMPLOYEE_HONORARIUM'					=> $employeeNoEdit->EMPLOYEE_HONORARIUM,
					'EMPLOYEE_PREMI_JKK'					=> $employeeNoEdit->EMPLOYEE_PREMI_JKM,
					'EMPLOYEE_PREMI_JKM'					=> $employeeNoEdit->EMPLOYEE_PREMI_JKK,
					'EMPLOYEE_PREMI_BPJS'					=> $employeeNoEdit->EMPLOYEE_PREMI_BPJS,
					'EMPLOYEE_PREMI'						=> $employeeNoEdit->EMPLOYEE_PREMI,
					'EMPLOYEE_NATURA'						=> $employeeNoEdit->EMPLOYEE_NATURA,
					'EMPLOYEE_TANTIEMBONUS'					=> $employeeNoEdit->EMPLOYEE_TANTIEMBONUS,
					'EMPLOYEE_IURAN_THT'					=> $employeeNoEdit->EMPLOYEE_IURAN_THT,
					'EMPLOYEE_IURAN_JP'						=> $employeeNoEdit->EMPLOYEE_IURAN_JP,
					'EMPLOYEE_IURAN_PENSIUN'				=> $employeeNoEdit->EMPLOYEE_IURAN_PENSIUN,
					'EMPLOYEE_BIAYA_JABATAN'				=> $employeeNoEdit->EMPLOYEE_BIAYA_JABATAN,
					'EMPLOYEE_TOTAL_PENGURANGAN'			=> $employeeNoEdit->EMPLOYEE_TOTAL_PENGURANGAN,
					'EMPLOYEE_BRUTO'						=> $employeeNoEdit->EMPLOYEE_BRUTO,
					'EMPLOYEE_NETTO'						=> $employeeNoEdit->EMPLOYEE_NETTO,
					'EMPLOYEE_NETTO_YEAR'					=> $employeeNoEdit->EMPLOYEE_NETTO_YEAR,
					'EMPLOYEE_NETTO_YEAR_AGO'				=> $employeeNoEdit->EMPLOYEE_NETTO_YEAR_AGO,
					'EMPLOYEE_PTKP'							=> $employeeNoEdit->EMPLOYEE_PTKP,
					'EMPLOYEE_PKP_YEAR'						=> $employeeNoEdit->EMPLOYEE_PKP_YEAR,
					'EMPLOYEE_PKP_YEAR_TERATUR'				=> $employeeNoEdit->EMPLOYEE_PKP_YEAR_TERATUR,
					'EMPLOYEE_PPH25_YEAR_TERATUR'			=> $employeeNoEdit->EMPLOYEE_PPH25_YEAR_TERATUR,
					'EMPLOYEE_PPH25_YEAR_TIDAK_TERATUR'		=> $employeeNoEdit->EMPLOYEE_PPH25_YEAR_TIDAK_TERATUR,
					'EMPLOYEE_PPH25_YEAR_KESELURUHAN'		=> $employeeNoEdit->EMPLOYEE_PPH25_YEAR_KESELURUHAN,
					'EMPLOYEE_PPH25_DIPOTONG_YEAR_AGO'		=> $employeeNoEdit->EMPLOYEE_PPH25_DIPOTONG_YEAR_AGO,
					'EMPLOYEE_PPHVAL_YEAR'					=> $employeeNoEdit->EMPLOYEE_YEAR,
					'EMPLOYEE_PPHVAL_MASA'					=> $employeeNoEdit->EMPLOYEE_MASA,
					'EMPLOYEE_PPHVAL'						=> $employeeNoEdit->EMPLOYEE_PPHVAL,
					'PPHCOUNT_METHOD'						=> $employeeNoEdit->PPHCOUNT_METHOD,
					'CREATED'								=> date('Y-m-d H:i:s'),
					'STATUS'								=> "ON PROGRESS"
				);
				$this->cms->insertGeneralData('g_employee_income', $databaru);
			}

			// Update status karyawan dengan pph lama yang tidak di edit menjadi history
			foreach ($employeeNoEditData as $employeeNoEditUpdate) {
				$datalamaupdate = array(
					'STATUS'	=> 'HISTORY'
				);
				$this->cms->updateGeneralData('g_pph25', $datalamaupdate, 'PPH_ID', $this->input->post('pphID')); 
			}
			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph25($pphID); 
		}

		if($processType == 'REVISI'){
			$pphID = $this->input->post('pphID');

			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph25($pphID); 
		}
		

		redirect('pph_25/bulan/summary?pid='. $pphID . '&cid=' . $this->input->post('companyID'). '&mid=' . $this->input->post('monthID'). '&yid=' . $this->input->post('yearID'));
	}


	public function update_g_pph25($pphid)
	{ 
		$query_total = $this->cms->total_bruto_netto($pphid);
		
		foreach ($query_total->result() as $key);
		$total_bruto = $key->TOTAL_BRUTTO;
		$total_netto  = $key->TOTAL_NETTO;
		$total_pphval = $key->TOTAL_PPH25;

		// Update total bruto karyawan dengan PPH ID yang sama
		$UpdateCompanyData = array(
			'COMPANY_BRUTO'		=> $total_bruto,
			'COMPANY_NETTO'		=> $total_netto,
			'COMPANY_PPHVAL'	=> $total_pphval,
			'COMPANY_KBLB'		=> 0 // Lupa dapet nya dari mana :(
		); 

		$this->cms->updateGeneralData('g_pph25', $UpdateCompanyData, 'PPH_ID', $pphid);
	}

	public function aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/pph25_aktifitas_pajak');
	}

	public function edit_aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/edit_status_aktifitas_pajak');
	}
	public function edit_pph(){
		$id=$this->input->post('id');
		$dataMasukan=$this->cms->getSingularData('g_pph25_masukan', 'REC_ID', $id);
		foreach ($dataMasukan->result() as $Getdata );
		echo$Getdata->REC_ID;
	}
}
