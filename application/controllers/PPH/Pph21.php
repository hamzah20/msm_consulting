<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Pph21 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->db->select('*')
			->from('v_g_companies_pph21')
			->where('STATUS', 'ACTIVE');

		$queryGet = $this->db->get();

		$data['companies']	= $queryGet;
		$data['counter']	= 1;

		$this->load->view('cms/hitung_pajak/pph21', $data);
	}

	public function pph_21_bulan()
	{
		$this->db->select('*')
			->from('v_g_companies_pph21')
			->where('COMPANY_ID', $this->input->get('cid'))
			->where('STATUS', 'ACTIVE');

		$queryGet = $this->db->get();

		$this->db->select('*')
			->from('v_g_companies_pph21')
			->where('COMPANY_ID', $this->input->get('cid'));

		$data['correction'] = $this->db->get();
		$data['companies'] 	= $queryGet;
		$data['counter'] 	= 1;
		$data['history'] 	= 0;

		if ($data['companies']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_21'));
			return;
		}

		$this->load->view('cms/hitung_pajak/pph21_bulan', $data);
	}

	public function pph_21_bulan_summary()
	{
		$data['summary'] 	= $this->cms->getGeneralData('v_g_companies_pph21', 'PPH_ID', $this->input->get('pid'));
		$data['employees'] 	= $this->cms->getGeneralData('v_g_employee_pph21', 'COMPANY_ID', trim($this->input->get('cid')));
		$data['counter']	= 1;

		// if ($data['summary']->num_rows() == 0) {
		// 	$this->session->set_flashdata('query', 'invalid');
		// 	echo 'ga ada';
		// 	// redirect(base_url('pph_21/bulan?cid=' . $this->input->get('cid')));
		// } else {
		// 	$this->load->view('cms/hitung_pajak/pph21_bulan_summary');
		// }

		$this->load->view('cms/hitung_pajak/pph21_bulan_summary', $data);
	}

	public function generateXLSFile()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $companyID);
		$pphData 		= $this->cms->getSingularData('g_pph21', 'PPH_ID', $pphID);

		$fileName = 'FORMAT_PPH21_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.xlsx';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A1:X2')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH21 Form')
			->setSubject('MSM Consulting PPH21 Form');

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


		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH21');

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

				//2.1 Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthName($pphData->row()->PERIOD_MONTH);
				//EoL 2.1

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $pphData->row()->PERIOD_YEAR . '-' . $monthName);
				$sheet->setCellValue('C' . $colCounter, $employee->EMPLOYEE_INTERNAL_ID);
				$sheet->setCellValue('D' . $colCounter, $employee->EMPLOYEE_NAME);
				$sheet->setCellValue('E' . $colCounter, 0);
				$sheet->setCellValue('F' . $colCounter, 0);
				$sheet->setCellValue('G' . $colCounter, 0);
				$sheet->setCellValue('H' . $colCounter, 0);
				$sheet->setCellValue('I' . $colCounter, 0);
				$sheet->setCellValue('J' . $colCounter, 0);
				$sheet->setCellValue('K' . $colCounter, 0);
				$sheet->setCellValue('L' . $colCounter, 0);
				$sheet->setCellValue('M' . $colCounter, 0);
				$sheet->setCellValue('N' . $colCounter, 0);
				$sheet->setCellValue('O' . $colCounter, 0);
				$sheet->setCellValue('P' . $colCounter, 0);
				$sheet->setCellValue('Q' . $colCounter, 0);
				$sheet->setCellValue('R' . $colCounter, 0);
				$sheet->setCellValue('S' . $colCounter, 0);
				$sheet->setCellValue('T' . $colCounter, 0);
				$sheet->setCellValue('U' . $colCounter, 0);
				$sheet->setCellValue('V' . $colCounter, 0);
				$sheet->setCellValue('W' . $colCounter, 0);
				$sheet->setCellValue('X' . $colCounter, 0);

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
			case (($yearlyBruto >= 47500000) && ($yearlyBruto <= 217500000)):
				// echo 'lapisan 2';
				$pphVal = ($yearlyBruto - 47500000) * (15 / 85) + 2500000;
				break;
			case (($yearlyBruto >= 217500000) && ($yearlyBruto <= 405000000)):
				// echo 'lapisan 3';
				$pphVal = ($yearlyBruto - 217500000) * (25 / 75) + 32500000;
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
		// 392157
	}

	public function importXLSLFile()
	{
		$this->output->enable_profiler(TRUE);

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$employeeCheck = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $this->input->post('companyID'));
		$pphCheck 	   = $this->cms->getSingularData('g_pph21', 'PPH_ID', $this->input->post('pphID'));

		//Deklrasi Variabel awal
		$companyBruto = 0;
		$companyNeto  = 0;
		$companyPPH21 = 0;

		if ($companyCheck->num_rows() == 0) {
			echo 'tidak ada perusahaan';
			return;
		}

		if ($employeeCheck->num_rows() == 0) {
			echo 'tidak ada pegawai aktif';
			return;
		}

		$employeeArr = [];

		foreach ($employeeCheck->result() as $employee) {

			$tmpArr = array(
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

			array_push($employeeArr, $tmpArr);
		}


		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

		$config['upload_path']          = './assets/upload/docs/';
		$config['allowed_types']        = 'xlsx';
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

		//Hapus data array yang buat header
		unset($sheet[1]);
		unset($sheet[2]);

		if (sizeof($sheet) == 0) {
			echo 'ini file kosong';
			return;
		}

		foreach ($sheet as $sheetData) {

			$employeeID     = $this->incube->generateID(10);

			//Cek data pegawai ada atau engga & ambil PKTP Tarif Mereka
			//Ngeceknya pake array dan bukan pake database, biar lebih cepet dan aman. Kalau misalnya data ada 1000, kalau masing-
			//masing ngecek ke database, pasti ada error/mysql timeout
			$employeeIndex = array_search($sheetData['C'], array_column($employeeArr, 'INTERNAL_ID'));



			//Kalkulasi Bruto, Neto & Jumlah Pengurang (TUNJANGAN, IURAN, PREMI, DLL)
			$totalTunjangan = $sheetData['G'] + $sheetData['H'] + $sheetData['I'] + $sheetData['J'] + $sheetData['K'] + $sheetData['L'] + $sheetData['M'] + $sheetData['O'] + $sheetData['P'];
			$totalPremi 	= $sheetData['R'] + $sheetData['S'] + $sheetData['T'];
			$iuran 			= $sheetData['W'] + $sheetData['X'];

			$totalBruto 	= $sheetData['E'] + $sheetData['F'] + $totalTunjangan + $sheetData['Q'] + $totalPremi + $sheetData['U'] + $sheetData['V'];
			$totalPengurang	= 0.05 * $totalBruto + $iuran;

			//Tarif PTKP Pegawai
			$ptkpTarif = $employeeArr[$employeeIndex]['PTKP_TARIF'];

			//Kalkulasi PPH21 Non-Gross Up
			if (strlen($employeeArr[$employeeIndex]['NPWP']) == 0) {
				//Kalau misalnya pegawai ga punya NPWP
				$yearlyNeto = 12 * ($totalBruto - $totalPengurang);
				$yearlyPKP  = $yearlyNeto - $ptkpTarif;

				//Dibulatkan biar 3 digit dibelakang jadi 0
				$yearlyPKP = (floor($yearlyPKP / 1000)) * 1000;
				$yearlyPPH = 0.05 * $yearlyPKP;
				$monthlyPPH = ($yearlyPPH / 12) * 1.2;
			} else {
				//Kalau misalnya pegawai punya NPWP
				$yearlyNeto = 12 * ($totalBruto - $totalPengurang);
				$yearlyPKP  = $yearlyNeto - $ptkpTarif;

				//Dibulatkan biar 3 digit dibelakang jadi 0
				$yearlyPKP = (floor($yearlyPKP / 1000)) * 1000;
				$yearlyPPH = 0.05 * $yearlyPKP;
				$monthlyPPH = $yearlyPPH / 12;
			}

			// DEBUG HASIL PERHITUNGAN PPH 21
			// echo 'Bruto tahun - ' . number_format($totalBruto) . '</br>';
			// echo 'Neto setahun - ' . number_format($yearlyNeto) . '</br>';
			// echo 'PTPKP - ' . number_format($ptkpTarif) . '</br>';
			// echo 'PPH Tahunan - ' . number_format($yearlyPPH) . '</br>';
			// echo 'PPH Bulanan - ' . number_format($monthlyPPH) . '</br>';
			// echo 'PKP Setahun - ' . number_format($yearlyPKP) . '</br></br>';
			//EoL PPH21 Non-Gross Up

			//Kalkulasi PPH21 Gross UP
			if ($companyCheck->row()->PPHCOUNT_METHOD == 'GROSS UP') {
				$yearlyBruto = (((12 * $totalBruto) - (12 * $totalPengurang)) - $ptkpTarif);

				switch ($yearlyBruto) {
					case ($yearlyBruto <= 47500000):
						// echo 'lapisan 1';
						$pphVal = ($yearlyBruto - 0) *  (5 / 95) + 0;
						break;
					case (($yearlyBruto >= 47500000) && ($yearlyBruto <= 217500000)):
						// echo 'lapisan 2';
						$pphVal = ($yearlyBruto - 47500000) * (15 / 85) + 2500000;
						break;
					case (($yearlyBruto >= 217500000) && ($yearlyBruto <= 405000000)):
						// echo 'lapisan 3';
						$pphVal = ($yearlyBruto - 217500000) * (25 / 75) + 32500000;
						break;
					case ($yearlyBruto >= 405000000):
						// echo 'lapisan 4';
						$pphVal = ($yearlyBruto - 405000000) * (30 / 70) + 95000000;
						break;
					default:
						break;
				}
			}
			//EoL PPH21 Gross Up

			$employeeData = array(
				'INCOME_ID'                 	=> $employeeID,
				'PPH_ID'						=> $this->input->post('pphID'),
				'COMPANY_ID'           			=> $this->input->post('companyID'),
				'EMPLOYEE_ID'             		=> $employeeArr[$employeeIndex]['ID'],
				'EMPLOYEE_GAJI_POKOK'			=> $sheetData['E'],
				'EMPLOYEE_TUNJANGAN_PPH'		=> $sheetData['F'],
				'EMPLOYEE_TUNJANGAN_LAINNYA'	=> $totalTunjangan,
				'EMPLOYEE_HONORARIUM'			=> $sheetData['Q'],
				'EMPLOYEE_PREMI'				=> $totalPremi,
				'EMPLOYEE_NATURA'				=> $sheetData['U'],
				'EMPLOYEE_TANTIEMBONUS'			=> $sheetData['V'],
				'EMPLOYEE_IURAN_PENSIUN'		=> $iuran,
				'EMPLOYEE_BIAYA_JABATAN'		=> 0.05 * $totalBruto,
				'EMPLOYEE_BRUTO'				=> $totalBruto,
				'EMPLOYEE_NETTO'				=> $totalBruto - $totalPengurang,
				'CREATED'						=> date('Y-m-d h:i:s'),
				'STATUS'						=> 'ACTIVE',
				'EMPLOYEE_PPHVAL'				=> round($monthlyPPH)
			);

			$companyBruto 	= $companyBruto + $totalBruto;
			$companyNeto  	= $companyNeto + ($totalBruto - $totalPengurang);
			$companyPPH21   = $companyPPH21 + round($monthlyPPH);

			// DEBUG DATA YANG MAU DIMASUKIN
			// echo json_encode($employeeData);

			$this->cms->insertGeneralData('g_employee_income', $employeeData);
		}

		//Tambah data ke NETTO & BRUTO PERUSAHAAN
		$companyData = array(
			'COMPANY_BRUTO'		=> $companyBruto,
			'COMPANY_NETTO'		=> $companyNeto,
			'COMPANY_KBLB'		=> $companyPPH21
		);

		//DEBUG DATA YANG MAU DIMASUKIN
		// echo json_encode($companyData);

		$this->cms->updateGeneralData('g_pph21', $companyData, 'PPH_ID', $this->input->post('pphID'));

		redirect('pph_21/bulan/summary?pid=' . $this->input->post('pphID') . '&cid= ' . $this->input->post('companyID'));
	}

	public function generateReport()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $companyID);
		$pphData 		= $this->cms->getSingularData('g_pph21', 'PPH_ID', $pphID);

		$phpExcel->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
		$phpExcel->getActiveSheet()->setShowGridlines(false);
		$phpExcel->getActiveSheet()->getSheetView()->setZoomScale(85);
		$phpExcel->setActiveSheetIndex(0)->setTitle('Info PPh 21');
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
		$phpExcel->getActiveSheet()->setCellValue('B9', 'Perihal : INFO PPh 21 TERUTANG MASA ' . strtoupper($pphData->row()->PERIOD_MONTH) . ' TAHUN PAJAK ' . $pphData->row()->PERIOD_YEAR . '  YANG HARUS DISETOR');
		$phpExcel->getActiveSheet()->setCellValue('B11', "'1.");
		$phpExcel->getActiveSheet()->getStyle('B11')->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

		$phpExcel->getActiveSheet()->mergeCells('C11:H11');
		$phpExcel->getActiveSheet()->setCellValue('C11', 'Perhitungan PPh 21 - Pegawai Tetap');

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
		$phpExcel->getActiveSheet()->setCellValue('E13', 'PPh 21 TERUTANG');

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
		$phpExcel->getActiveSheet()->setCellValue('G13', 'PPh 21 KURANG BAYAR');

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
		$phpExcel->getActiveSheet()->setCellValue('H15', '411121-100');


		$phpExcel->getActiveSheet()->mergeCells('C20:K20');
		$phpExcel->getActiveSheet()->setCellValue('C20', '>> Jadi PPh yang harus di bayar Masa ' . $pphData->row()->PERIOD_MONTH . ' Tahun Pajak ' . $pphData->row()->PERIOD_YEAR . ' adalah sebagai berikut  Rp. ' . number_format($pphData->row()->COMPANY_KBLB));

		$phpExcel->getActiveSheet()->mergeCells('C21:K21');
		$phpExcel->getActiveSheet()->setCellValue('C21', '>> Mohon disetorkan paling lambat tanggal 10 ' . $pphData->row()->PERIOD_MONTH . ' ' . $pphData->row()->PERIOD_YEAR);

		$phpExcel->getActiveSheet()->mergeCells('C22:K22');
		$phpExcel->getActiveSheet()->setCellValue('C22', '>> Jika sudah disetorkan mohon diupload NTPN-nya');

		$phpExcel->getActiveSheet()->mergeCells('C24:K24');
		$phpExcel->getActiveSheet()->setCellValue('C24', 'Terima Kasih');

		$phpExcel->getActiveSheet()->mergeCells('C27:K27');
		$phpExcel->getActiveSheet()->setCellValue('C27', 'Regards,');

		$phpExcel->getActiveSheet()->mergeCells('C28:K28');
		$phpExcel->getActiveSheet()->setCellValue('C28', 'Team MSM');

		$phpExcel->getActiveSheet()->mergeCells('C29:K29');
		$phpExcel->getActiveSheet()->setCellValue('C29', 'Ph : +6221 63858603/04');

		foreach (range('C', 'Z') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}

		$phpExcel->getActiveSheet()->setSelectedCell('A1');
		$_objWriter = new Xlsx($phpExcel);
		$_varFLENME = 'REPORT_PPh21_' . date('Ymd') . '_' . $companyData->row()->COMPANY_NAME . '.xlsx';
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
			->from('g_pph21')
			->where('COMPANY_ID', $this->input->post('companyID'))
			->where('PERIOD_YEAR', $this->input->post('addPeriodeTahun'))
			->where('PERIOD_MONTH', $this->input->post('addPeriodeBulan'));

		$queryGet = $this->db->get();


		$companyData = array(
			'PPH_ID'		=> $this->incube->generateID(10),
			'COMPANY_ID'	=> $this->input->post('companyID'),
			'PERIOD_YEAR'	=> $this->input->post('addPeriodeTahun'),
			'PERIOD_MONTH'	=> $this->input->post('addPeriodeBulan'),
			'CREATED'		=> date('Y-m-d h:i:s'),
			'STATUS'		=> ($queryGet->num_rows() > 0 ? 'HISTORY' : 'ACTIVE'),
		);

		$queryInsert = $this->cms->insertGeneralData('g_pph21', $companyData);
		//EoL 1

		if (!$queryInsert) {
			$this->session->set_flashdata('query', 'invalid');
		} else {
			$this->session->set_flashdata('query', 'success');
		}

		redirect(($this->input->post('pphFlag') == true ? base_url('pph_21/bulan?cid=' . $this->input->post('companyID')) : base_url('pph_21')));
	}

	public function pph_21_tahun()
	{
		$this->load->view('cms/hitung_pajak/pph21_tahun');
	}



	public function pph_21_bulan_summary_karyawan()
	{
		$this->load->view('cms/hitung_pajak/pph21_bulan_summary_karyawan');
	}

	public function aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/pph21_aktifitas_pajak');
	}

	public function edit_aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/edit_status_aktifitas_pajak');
	}
}
