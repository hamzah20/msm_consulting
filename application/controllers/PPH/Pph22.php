<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Pph22 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->db->select('*')
				 ->from('v_g_companies_pph22');

		$queryGet = $this->db->get(); 

		$data['companies']	= $queryGet;
		$data['counter']	= 1;
       


		$this->load->view('cms/hitung_pajak/pph22', $data);
	}

	public function pph_22_bulan()
	{

		//$status = "STATUS='ACTIVE' OR STATUS='APPROVED'";

		$this->db->select('*')
			->from('v_g_companies_pph22_detail')
			->where('COMPANY_ID', $this->input->get('cid'));
			// ->where('STATUS', 'APPROVED');

		$queryGet = $this->db->get();

		$cid=$this->input->get('cid');
		$yid=$this->input->get('yid');

		$data['correction'] = $this->cms->getPembetulan22($cid,$yid);

		$data['companies'] 	= $queryGet;
		$data['counter'] 	= 1;
		$data['history'] 	= 0;

		if ($data['companies']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_22'));
			return;
		}

		$this->load->view('cms/hitung_pajak/pph22_bulan', $data); 
	}

	public function pph_22_bulan_summary()
	{ 
		//$this->output->enable_profiler(TRUE);

		$cid=$this->input->get('cid');
		$mid=$this->input->get('mid');
		$yid=$this->input->get('yid');
		// $mid=$this->input->get('yid');
		$data['statuspph22'] = $this->cms->cekstatuspph22($this->input->get('pid')); 
		$data['correction'] = $this->cms->getPembetulanSummary22($cid,$mid,$yid);
		$data['summary'] 	= $this->cms->getGeneralData('v_g_companies_pph22_detail', 'PPH22_ID', $this->input->get('pid'));

		$this->db->select('*')
			->from('v_g_employee_pph22')
			->where('COMPANY_ID', trim($this->input->get('cid')))
			->where('PPH22_ID', trim($this->input->get('pid')));


		// $data['employees'] 	= $this->cms->getGeneralData('v_g_employee_pph22', 'COMPANY_ID', trim($this->input->get('cid')));
		$data['employees'] 	= $this->db->get();
		$data['counter']	= 1;
		$data['payment']    = $this->cms->getSingularData('g_payment22', 'PPH22_ID', $this->input->get('pid'));
		$data['statuspph22']= $this->cms->cekstatuspph22($this->input->get('pid'));

		// if ($data['summary']->num_rows() == 0) {
		// 	$this->session->set_flashdata('query', 'invalid');
		// 	echo 'ga ada';
		// 	// redirect(base_url('pph_22/bulan?cid=' . $this->input->get('cid')));
		// } else {
		// 	$this->load->view('cms/hitung_pajak/pph22_bulan_summary');
		// }

		$this->load->view('cms/hitung_pajak/pph22_bulan_summary', $data);
	}

	public function pph_22_bulan_approve()
	{
		$pid=$this->input->get('pid');
		$cid=$this->input->get('cid');
		$yid=$this->input->get('yid');

		$statusApprove = array(
			'STATUS'  => 'WAITING FOR APPROVAL'
		);

		$this->cms->updateGeneralData('g_pph22', $statusApprove, 'PPH22_ID', $this->input->get('pid'));
		$this->cms->updateGeneralData('g_employee_income', $statusApprove, 'PPH22_ID', $this->input->get('pid'));

		redirect('PPH/Pph22/pph_22_bulan?cid='.$cid.'&pid='.$yid.'');		
	}

	public function generateXLSFile()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee_pph22', 'PPH22_ID', $pphID);
		

		$fileName = 'FORMAT_PPH22_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.xlsx';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A1:X2')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH22 Form')
			->setSubject('MSM Consulting PPH22 Form');

		$sheet->getStyle('A1:D2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');

		$sheet->getStyle('E1:E2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('BB0F0F');

		$sheet->getStyle('F1:F2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('BB0F0F');

		$sheet->getStyle('G1:P2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('BB0F0F');

		$sheet->getStyle('Q1:Q2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('BB0F0F');

		$sheet->getStyle('R1:R2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('BB0F0F'); 

		$sheet->getStyle('S1:S2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('BB0F0F');

		$sheet->getStyle('T1:T2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('BB0F0F');  


		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH22');

		$sheet->setCellValue('A1', "No");
		$sheet->mergeCells('A1:A2');
		$sheet->getStyle('A1:A2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('B1', "Nomor \n Formulir");
		$sheet->mergeCells('B1:B2');
		$sheet->getStyle('B1:B2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('C1', "Nama Lawan \n Transaksi");
		$sheet->mergeCells('C1:C2');
		$sheet->getStyle('C1:C2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('D1', "NPWP Lawan \n Transaksi)");
		$sheet->mergeCells('D1:D2');
		$sheet->getStyle('D1:D2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('E1', "Alamat Lawan \n Transaksi)");
		$sheet->mergeCells('E1:E2');
		$sheet->getStyle('E1:E2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('F1', "Nomor \n Bukti Potong");
		$sheet->mergeCells('F1:F2');
		$sheet->getStyle('F1:F2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('G1', "Tanggal Bukti \n Potong");
		$sheet->mergeCells('G1:G2');
		$sheet->getStyle('G1:G2')->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('H1', "Keterangan\nTransaksi");
		$sheet->mergeCells('H1:H2');
		$sheet->getStyle('H1:H2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('I1', 'Bidang Industri Tertentu');
		$sheet->mergeCells('I1:M1');
		$sheet->setCellValue('I2', "Penjualan Bruto \n Semen (Rp)");
		$sheet->setCellValue('J2', "Penjuakan Bruto \n Kertas (Rp)");
		$sheet->setCellValue('K2', "Penjualan Bruto \n Baja (Rp)");
		$sheet->setCellValue('L2', "Penjualan Bruto \n Otomotif (Rp)");
		$sheet->setCellValue('M2', "Penjualan Bruto \n Farmasi (Rp)");
		$sheet->getStyle('I1:M1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('N1', 'BBM, BBG, Pelumas');
		$sheet->mergeCells('N1:P1');
		$sheet->setCellValue('N2', "Penyalur/Agen \n (Jika ada BBM,\n BBG, dan \nPelumas maka \npenjualan bruto \nfarmasi harus \nnill)");
		$sheet->setCellValue('O2', "Penjualan Bruto \nBBM & BBG \n(Rp)");
		$sheet->setCellValue('P2', "Penjualan Bruto \nPelumas \n(Rp)");
		$sheet->getStyle('N1:P1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('Q1', "Barang yang Tergolong \n Sangat Mewah");
		$sheet->mergeCells('Q1:R1');
		$sheet->setCellValue('Q2', "Jenis");
		$sheet->setCellValue('R2', 'Harga Jual (Rp)'); 
		$sheet->getStyle('Q1:R1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCelLValue('S1', "Pembelian \nBahan-Bahan \nuntuk Keperluan \nIndustri atau \nEkspor dari \nPedagang \nPengumpul");
		$sheet->mergeCells('S1:S2');
		$sheet->getStyle('S1:S2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('T1', "Pembelian \nBatubara, \nMineral Logam, \ndan Mineral \nBukan Logam, \ndari Badan atau \nOrang Pribadi \nPemegang Izin \nUsaha \nPertambangan \noleh Industri \natau Badan \nUsaha (Rp)");
		$sheet->mergeCells('T1:T2');
		$sheet->getStyle('T1:T2')
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
				$pphData 		= $this->cms->getSingularDataDetail('v_g_employee_pph22', 'PPH22_ID', 'COMPANY_ID',$pphID,$companyID);
				//2.1 Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthName($pphData->row()->PERIOD_MONTH);
				//EoL 2.1

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $employee->NO_FORMULIR);
				$sheet->setCellValue('C' . $colCounter, $employee->TRANSACTION_NAME);
				$sheet->setCellValue('D' . $colCounter, $employee->TRANSACTION_NPWP);
				$sheet->setCellValue('E' . $colCounter, $employee->TRANSACTION_ADDRESS);
				$sheet->setCellValue('F' . $colCounter, $employee->NO_BUKTI_POTONG);
				$sheet->setCellValue('G' . $colCounter, $employee->TANGGAL_BUKTI_POTONG);
				$sheet->setCellValue('H' . $colCounter, $employee->TRANSACTION_NOTES);
				$sheet->setCellValue('I' . $colCounter, $employee->EMPLOYEE_BRUTO_SEMEN);
				$sheet->setCellValue('J' . $colCounter, $employee->EMPLOYEE_BRUTO_KERTAS);
				$sheet->setCellValue('K' . $colCounter, $employee->EMPLOYEE_BRUTO_BAJA);
				$sheet->setCellValue('L' . $colCounter, $employee->EMPLOYEE_BRUTO_OTOMOTIF);
				$sheet->setCellValue('M' . $colCounter, $employee->EMPLOYEE_BRUTO_FARMASI);
				$sheet->setCellValue('N' . $colCounter, $employee->PENYALUR_AGEN);
				$sheet->setCellValue('O' . $colCounter, $employee->EMPLOYEE_BRUTO_BBM_BBG);
				$sheet->setCellValue('P' . $colCounter, $employee->EMPLOYEE_BRUTO_PELUMAS);
				$sheet->setCellValue('Q' . $colCounter, $employee->PRODUCT_TYPE);
				$sheet->setCellValue('R' . $colCounter, $employee->SELLING_PRICE);
				$sheet->setCellValue('S' . $colCounter, $employee->SELLING_INDUSTRI_MATERIALS);
				$sheet->setCellValue('T' . $colCounter, $employee->SELLING_BUSINESS_MINING); 

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
		$employeeData   = $this->cms->getSingularData('v_g_employee_pph22', 'PPH22_ID', $pphID);

		$sql_pembetulan = $this->cms->count_pembetulan22($pphID); 
		// foreach ($sql_pembetulan->result() as $key) {
		// 	echo $key->TOTAL_PEMBETULAN;
		// }
		// foreach ($employeeData->result() as $employee) {
		// 	echo $employee->TRANSACTION_NAME;
		// 	echo"<br>";
		// }
		

		$fileName = 'LAPOR_PAJAK_PPH22_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.csv';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A1:AY1')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH 22 Lapor Pajak')
			->setSubject('MSM Consulting PPH 22 Lapor Pajak');

		$sheet->getStyle('A1:AY1')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');  

		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH22');

		$sheet->setCellValue('A1', "Nomor Formulir");
		$sheet->mergeCells('A1:A1');
		$sheet->getStyle('A1:A1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('B1', "Masa Pajak");
		$sheet->mergeCells('B1:B1');
		$sheet->getStyle('B1:B1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('C1', "Tahun Pajak");
		$sheet->mergeCells('C1:C1');
		$sheet->getStyle('C1:C1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('D1', "Pembetulan");
		$sheet->mergeCells('D1:D1');
		$sheet->getStyle('D1:D1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('E1', "NPWP Lawan Transaksi");
		$sheet->mergeCells('E1:E1');
		$sheet->getStyle('E1:E1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('F1', "Nama Lawan Transaksi");
		$sheet->mergeCells('F1:F1');
		$sheet->getStyle('F1:F1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('G1', "Alamat");
		$sheet->mergeCells('G1:G1');
		$sheet->getStyle('G1:G1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('H1', "No Bukti Potong");
		$sheet->mergeCells('H1:H1');
		$sheet->getStyle('H1:H1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('I1', "Tanggal Bukti Potong");
		$sheet->mergeCells('I1:I1');
		$sheet->getStyle('I1:I1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('J1', "Penjualan Bruto Semen (Rp)");
		$sheet->mergeCells('J1:J1');
		$sheet->getStyle('J1:J1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('K1', "Tarif (%)");
		$sheet->mergeCells('K1:K1');
		$sheet->getStyle('K1:K1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('L1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('L1:L1');
		$sheet->getStyle('L1:L1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('M1', "Penjualan Bruto Kertas (Rp)");
		$sheet->mergeCells('M1:M1');
		$sheet->getStyle('M1:M1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('N1', "Tarif (%)");
		$sheet->mergeCells('N1:N1');
		$sheet->getStyle('N1:N1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('O1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('O1:O1');
		$sheet->getStyle('O1:O1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('P1', "Penjualan Bruto Baja (Rp)");
		$sheet->mergeCells('P1:P1');
		$sheet->getStyle('P1:P1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('Q1', "Tarif (%)");
		$sheet->mergeCells('Q1:Q1');
		$sheet->getStyle('Q1:Q1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('R1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('R1:R1');
		$sheet->getStyle('R1:R1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('S1', "Penjualan Bruto Otomotif (Rp)");
		$sheet->mergeCells('S1:S1');
		$sheet->getStyle('S1:S1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('T1', "Tarif (%)");
		$sheet->mergeCells('T1:T1');
		$sheet->getStyle('T1:T1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('U1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('U1:U1');
		$sheet->getStyle('U1:U1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('V1', "Farmasi/BBM, Gas, Pelumas (Final)");
		$sheet->mergeCells('V1:V1');
		$sheet->getStyle('V1:V1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('W1', "Penjualan Bruto (Rp)");
		$sheet->mergeCells('W1:W1');
		$sheet->getStyle('W1:W1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('X1', "Tarif (%)");
		$sheet->mergeCells('X1:X1');
		$sheet->getStyle('X1:X1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('Y1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('Y1:Y1');
		$sheet->getStyle('Y1:Y1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('Z1', "Farmasi/BBM, Gas, Pelumas (Tidak Final)");
		$sheet->mergeCells('Z1:Z1');
		$sheet->getStyle('Z1:Z1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AA1', "Penjualan Bruto (Rp)");
		$sheet->mergeCells('AA1:AA1');
		$sheet->getStyle('AA1:AA1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AB1', "Tarif (%)");
		$sheet->mergeCells('AB1:AB1');
		$sheet->getStyle('AB1:AB1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AC1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('AC1:AC1');
		$sheet->getStyle('AC1:AC1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AD1', "Barang Sangat Mewah");
		$sheet->mergeCells('AD1:AD1');
		$sheet->getStyle('AD1:AD1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AE1', "Harga Jual (Rp)");
		$sheet->mergeCells('AE1:AE1');
		$sheet->getStyle('AE1:AE1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AF1', "Tarif (%)");
		$sheet->mergeCells('AF1:AF1');
		$sheet->getStyle('AF1:AF1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AG1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('AG1:AG1');
		$sheet->getStyle('AG1:AG1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AH1', "Sektor 1");
		$sheet->mergeCells('AH1:AH1');
		$sheet->getStyle('AH1:AH1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AI1', "Pembelian Bruto (Rp)");
		$sheet->mergeCells('AI1:AI1');
		$sheet->getStyle('AI1:AI1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AJ1', "Tarif (%)");
		$sheet->mergeCells('AJ1:AJ1');
		$sheet->getStyle('AJ1:AJ1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AK1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('AK1:AK1');
		$sheet->getStyle('AK1:AK1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AL1', "Sektor 2");
		$sheet->mergeCells('AL1:AL1');
		$sheet->getStyle('AL1:AL1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AM1', "Pembelian Bruto (Rp)");
		$sheet->mergeCells('AM1:AM1');
		$sheet->getStyle('AM1:AM1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AN1', "Tarif (%)");
		$sheet->mergeCells('AN1:AN1');
		$sheet->getStyle('AN1:AN1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AO1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('AO1:AO1');
		$sheet->getStyle('AO1:AO1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AP1', "Badan Tertentu Lainnya 1");
		$sheet->mergeCells('AP1:AP1');
		$sheet->getStyle('AP1:AP1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AQ1', "Pembelian Bruto (Rp)");
		$sheet->mergeCells('AQ1:AQ1');
		$sheet->getStyle('AQ1:AQ1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AR1', "Tarif (%)");
		$sheet->mergeCells('AR1:AR1');
		$sheet->getStyle('K1:K1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AS1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('AS1:AS1');
		$sheet->getStyle('AS1:AS1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AT1', "Badan Tertentu Lainnya 2");
		$sheet->mergeCells('AT1:AT1');
		$sheet->getStyle('AT1:AT1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AU1', "Pembelian Bruto (Rp)");
		$sheet->mergeCells('AU1:AU1');
		$sheet->getStyle('AU1:AU1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AV1', "Tarif (%)");
		$sheet->mergeCells('AV1:AV1');
		$sheet->getStyle('AV1:AV1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AW1', "PPh yang Dipungut (Rp)");
		$sheet->mergeCells('AW1:AW1');
		$sheet->getStyle('AW1:AW1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AX1', "Total DPP (Rp)");
		$sheet->mergeCells('AX1:AX1');
		$sheet->getStyle('AX1:AX1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AY1', "Total PPh yang Dipungut (Rp)");
		$sheet->mergeCells('AY1:AY1');
		$sheet->getStyle('AY1:AY1')
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
			foreach ($sql_pembetulan->result() as $pembetulan_r );
			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularData('v_g_employee_pph22', 'PPH22_ID',$pphID);
				
				// Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthNameLP($pphData->row()->PERIOD_MONTH); 
				
				$count_bruto_final 		= 0;
				$count_bruto_tidakfinal	= 0;
				
				if(!empty($employee->EMPLOYEE_BRUTO_FARMASI)){
					$count_bruto_final 		= $employee->EMPLOYEE_BRUTO_FARMASI;
					$count_bruto_tidakfinal = 0;
				} elseif($employee->PENYALUR_AGEN == "Y"){
					$count_bruto_final 		= $employee->EMPLOYEE_BRUTO_BBM_BBG;
					$count_bruto_tidakfinal = $employee->EMPLOYEE_BRUTO_PELUMAS;
				}elseif($employee->PENYALUR_AGEN == "N"){
					$count_bruto_final 		= 0;
					$count_bruto_tidakfinal = $employee->EMPLOYEE_BRUTO_BBM_BBG + $employee->EMPLOYEE_BRUTO_PELUMAS;
				}

				$sheet->setCellValue('A' . $colCounter, $employee->NO_FORMULIR);
				$sheet->setCellValue('B' . $colCounter, $monthName);
				$sheet->setCellValue('C' . $colCounter, $employee->PERIOD_YEAR);
				$sheet->setCellValue('D' . $colCounter, $pembetulan_r->TOTAL_PEMBETULAN == null ? '0' : $pembetulan_r->TOTAL_PEMBETULAN);
				$sheet->setCellValue('E' . $colCounter, str_replace('.','',str_replace('-', '',$pphData->row()->TRANSACTION_NPWP)));
				$sheet->setCellValue('F' . $colCounter, $employee->TRANSACTION_NAME);
				$sheet->setCellValue('G' . $colCounter, $employee->TRANSACTION_ADDRESS);
				$sheet->setCellValue('H' . $colCounter, $employee->NO_BUKTI_POTONG);
				$sheet->setCellValue('I' . $colCounter, $employee->TANGGAL_BUKTI_POTONG);
				$sheet->setCellValue('J' . $colCounter, $employee->EMPLOYEE_BRUTO_SEMEN);
				$sheet->setCellValue('K' . $colCounter, $employee->BRUTO_SEMEN_RATES);
				$sheet->setCellValue('L' . $colCounter, $employee->PPH_SEMEN);
				$sheet->setCellValue('M' . $colCounter, $employee->EMPLOYEE_BRUTO_KERTAS);
				$sheet->setCellValue('N' . $colCounter, $employee->BRUTO_KERTAS_RATES);
				$sheet->setCellValue('O' . $colCounter, $employee->PPH_KERTAS);
				$sheet->setCellValue('P' . $colCounter, $employee->EMPLOYEE_BRUTO_BAJA);
				$sheet->setCellValue('Q' . $colCounter, $employee->BRUTO_BAJA_RATES);
				$sheet->setCellValue('R' . $colCounter, $employee->PPH_BAJA);
				$sheet->setCellValue('S' . $colCounter, $employee->EMPLOYEE_BRUTO_OTOMOTIF);
				$sheet->setCellValue('T' . $colCounter, $employee->BRUTO_OTOMOTIF_RATES);
				$sheet->setCellValue('U' . $colCounter, $employee->PPH_OTOMOTIF);
				$sheet->setCellValue('V' . $colCounter, '');
				$sheet->setCellValue('W' . $colCounter, $count_bruto_final);
				$sheet->setCellValue('X' . $colCounter, 0.30);
				$sheet->setCellValue('Y' . $colCounter, $count_bruto_final * 0.30);
				$sheet->setCellValue('Z' . $colCounter, '');
				$sheet->setCellValue('AA' . $colCounter, $count_bruto_tidakfinal);
				$sheet->setCellValue('AB' . $colCounter, 0.30);
				$sheet->setCellValue('AC' . $colCounter, $count_bruto_tidakfinal * 0.30);
				$sheet->setCellValue('AD' . $colCounter, $employee->PRODUCT_TYPE);				
				$sheet->setCellValue('AE' . $colCounter, $employee->SELLING_PRICE);	
				$sheet->setCellValue('AF' . $colCounter, '');
				$sheet->setCellValue('AG' . $colCounter, '');			
				$sheet->setCellValue('AH' . $colCounter, '');
				$sheet->setCellValue('AI' . $colCounter, '');
				$sheet->setCellValue('AJ' . $colCounter, '');
				$sheet->setCellValue('AK' . $colCounter, '');
				$sheet->setCellValue('AL' . $colCounter, '');
				$sheet->setCellValue('AM' . $colCounter, '');
				$sheet->setCellValue('AN' . $colCounter, '');
				$sheet->setCellValue('AO' . $colCounter, '');
				$sheet->setCellValue('AP' . $colCounter, '');
				$sheet->setCellValue('AQ' . $colCounter, '');
				$sheet->setCellValue('AR' . $colCounter, '');
				$sheet->setCellValue('AS' . $colCounter, '');
				$sheet->setCellValue('AT' . $colCounter, '');
				$sheet->setCellValue('AU' . $colCounter, '');
				$sheet->setCellValue('AV' . $colCounter, '');
				$sheet->setCellValue('AW' . $colCounter, '');
				$sheet->setCellValue('AX' . $colCounter, '');
				$sheet->setCellValue('AY' . $colCounter, '');  

				// $sheet->setCellValue('I' . $colCounter, $pphData->row()->COUNTRY_CODE == 'INA' ? '' : $pphData->row()->COUNTRY_CODE);  

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
			case (($yearlyBruto >= 47500000) && ($yearlyBruto <= 227500000)):
				// echo 'lapisan 2';
				$pphVal = ($yearlyBruto - 47500000) * (15 / 85) + 2500000;
				break;
			case (($yearlyBruto >= 227500000) && ($yearlyBruto <= 405000000)):
				// echo 'lapisan 3';
				$pphVal = ($yearlyBruto - 227500000) * (25 / 75) + 32500000;
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
		// 392257
	}

	public function importXLSLFile()
	{
		$this->output->enable_profiler(TRUE); 

		//echo $this->input->post('pphID');

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$employeeCheck = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $this->input->post('companyID'));
		$pphCheck 	   = $this->cms->getSingularData('g_pph22', 'PPH22_ID', $this->input->post('pphID')); 

		//Deklrasi Variabel awal
		// $companyBruto = 0;
		// $companyNeto  = 0;
		$companyPPH22 = 0;

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

		// Mengecek status pada table g_pph22, jika status belum PAID
		// Maka data lama pada g_employee_income akan dihapus terlebih dahulu, baru diinputkan data terbaru
		$processType='REVISI';
		$this->db->select('STATUS')
				 ->from('g_pph22')
				 ->where('PPH22_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 

		foreach ($status->result() as $key);

		// Jika status bukan Lapor Pajak, hapus terlebih dahulu data lama di g_pph22_detail
		if($key->STATUS == "ACTIVE" OR $key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING" ){
			//REVISI
			$this->cms->deleteGeneralData('g_pph22_detail', 'PPH22_ID', $this->input->post('pphID'));
		} elseif ($key->STATUS == "LAPOR PAJAK" OR $key->STATUS  == "HARDCOPY" ) {
			//PEMBETULANN
			$processType='PEMBETULAN';
			$pembetulanKe = $this->cms->cekpembetulan($this->input->post('companyID'), $this->input->post('monthID'), $this->input->post('yearID'));
		
			foreach ($pphCheck->result() as $cekPPH22);
			$prevPPHVAL = $cekPPH22->COMPANY_PPHVAL;
			// Ubah dulu status lama jadi HISTORY
			$updateStatusPPH22 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'HISTORY'
			);
			$this->cms->updateGeneralData('g_pph22', $updateStatusPPH22, 'PPH22_ID', $this->input->post('pphID'));


		}

		if($processType=="REVISI") {
			$pphID = $this->input->post('pphID');
		}else {
			$pphID = $this->incube->generateID(10);
			$companyData = array(
				'PPH_ID'		=> $pphID,
				'COMPANY_ID'	=> $this->input->post('companyID'),
				'PERIOD_YEAR'	=> $this->input->post('yearID'),
				'PERIOD_MONTH'	=> $this->input->post('monthID'),
				'CREATED'		=> date('Y-m-d h:i:s'),
				'STATUS'		=> 'ON PROGRESS',
			);

			$queryInsert = $this->cms->insertGeneralData('g_pph22', $companyData);
			//EoL 1
			
		}


		foreach ($sheet as $sheetData) {

			$employeeID     = $this->incube->generateID(10);

			//Cek data pegawai ada atau engga & ambil PKTP Tarif Mereka
			//Ngeceknya pake array dan bukan pake database, biar lebih cepet dan aman. Kalau misalnya data ada 1000, kalau masing-
			//masing ngecek ke database, pasti ada error/mysql timeout
			$employeeIndex = array_search($sheetData['C'], array_column($employeeArr, 'INTERNAL_ID'));
			//echo $employeeIndex;
			// Check NPWP
			$this->db->select('*')
					 ->from('g_employee')
					 ->where('EMPLOYEE_INTERNAL_ID', $sheetData['C']);

			$CheckEmpNPWP = $this->db->get(); 

			foreach ($CheckEmpNPWP->result() as $CheckNPWP);  

			$totalTunjangan=0; 

			$PPH_ID=$this->input->post('pphID'); 
			
			// Update data sebelumnya, sebelum di inputkan data baru 
			$updatePPH22 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH22_ID', $pphID); 

			// Cek rates dari tiap jenis bruto (HARDCODE)
			$this->db->select('TYPE_ID')
					 ->from('m_rates')
					 ->where('STATUS', 'ACTIVE');

			$cekRates = $this->db->get(); 

			foreach ($cekRates->result() as $rates);

			//EoL PPH22 Gross Up
			$employeeData = array(
				'INCOME_ID'                 	=> $employeeID,
				'COMPANY_ID'           			=> $this->input->post('companyID'),
				'PPH22_ID'						=> $pphID, 
				'NO_FORMULIR'					=> $sheetData['B'],
				'TRANSACTION_NAME'				=> $sheetData['C'],
				'TRANSACTION_ADDRESS'			=> $sheetData['E'],
				'NO_BUKTI_POTONG'				=> $sheetData['F'],
				'TANGGAL_BUKTI_POTONG'			=> $sheetData['G'],
				'TRANSACTION_NOTES'				=> $sheetData['H'],
				'EMPLOYEE_BRUTO_SEMEN'			=> $sheetData['I'],
				'BRUTO_SEMEN_RATES'				=> 0.25,
				'EMPLOYEE_BRUTO_KERTAS'			=> $sheetData['J'],
				'BRUTO_KERTAS_RATES'			=> 0.10,
				'EMPLOYEE_BRUTO_BAJA'			=> $sheetData['K'],
				'BRUTO_BAJA_RATES'				=> 0.30,
				'EMPLOYEE_BRUTO_OTOMOTIF'		=> $sheetData['L'],
				'BRUTO_OTOMOTIF_RATES'			=> 0.45,
				'EMPLOYEE_BRUTO_FARMASI'		=> $sheetData['M'],
				'BRUTO_FARMASI_RATES'			=> 0.30,
				'PENYALUR_AGEN'					=> $sheetData['N'],
				'EMPLOYEE_BRUTO_BBM_BBG'		=> $sheetData['O'],
				'EMPLOYEE_BRUTO_PELUMAS'		=> $sheetData['P'],
				'PRODUCT_TYPE'					=> $sheetData['Q'],
				'SELLING_PRICE'					=> $sheetData['R'],
				'SELLING_INDUSTRI_MATERIALS'	=> $sheetData['S'],
				'SELLING_BUSINESS_MINING'		=> $sheetData['T'], 
				'CREATED'						=> date('Y-m-d h:i:s'),
				'STATUS'						=> 'ON PROGRESS', 
				'PPHCOUNT_METHOD'				=> $companyCheck->row()->PPHCOUNT_METHOD
			); 

			$this->cms->insertGeneralData('g_pph22_detail', $employeeData);

		} 

		// TAMBAH DATA KE DPP, TAX RATE, DAN PPH PERUSAHAAN
		$companyData = array( 
			'INVOICE_DATE'		=> date('Y-m-d H:i:s'),
			'COMPANY_PPHVAL22'	=> 10000000
		); 

		$this->cms->updateGeneralData('g_pph22', $companyData, 'PPH22_ID', $pphID);

		redirect('pph_22/bulan/summary?pid=' . $pphID . '&cid=' . $this->input->post('companyID'). '&mid=' . $this->input->post('monthID'). '&yid=' . $this->input->post('yearID'));
	}

	// Waiting Approve by Customer
	public function approveCustomer()
	{
		// Update status g_pph22
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'WAITING FOR APPROVAL BY CUSTOMER'
		);
		$this->cms->updateGeneralData('g_pph22', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		// Update status g_pph22
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'WAITING FOR PAYMENT'
		);
		$this->cms->updateGeneralData('g_pph22', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		// Update status g_pph22
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'PAID'
		);
		$this->cms->updateGeneralData('g_pph22', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'PAID'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pphID'));

		// Cek sudah pernah melakukan pembayaran atau belum
		$this->db->select('PAID_PPH22')
				 ->from('g_payment22')
				 ->where('PPH22_ID', $this->input->post('pphID'));

		$cekstatuspayment = $this->db->get(); 

		foreach ($cekstatuspayment->result() as $statuspayment);

		// if(null($statuspayment)){
		// 	// Insert Payment
		// 	$insertPayment = array(
		// 		'PPH_ID'		=> $this->input->get('pphID'),
		// 		'COMPANY_ID' 	=> $this->input->get('cid'), 
		// 		'TOTAL_PPH22'	=> ,
		// 		'PAID_PPH22'	=> ,
		// 		'OWED_PPH22'	=> ,
		// 		'CREATED'		=> date('Y-m-d H:i:s')
		// 	);
		// 	$queryInsertPay = $this->cms->insertGeneralData('s_log', $insertLog);	
		// } else{
		// 	$updatePayment = array(
		// 		'TOTAL_PPH22'	=> ,
		// 		'PAID_PPH22'	=> ,
		// 		'OWED_PPH22'	=> ,
		// 		'UPDATED'		=> date('Y-m-d H:i:s')
		// 	);
		// 	$this->cms->updateGeneralData('g_pph22', $updateApproval, 'PPH_ID', $this->input->get('pphID'));
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
		// Update status g_pph22
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'TAX FILING'
		);
		$this->cms->updateGeneralData('g_pph22', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		// Update status g_pph22
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'HARDCOPY'
		);
		$this->cms->updateGeneralData('g_pph22', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		// Update status g_pph22
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'LAPOR PAJAK'
		);
		$this->cms->updateGeneralData('g_pph22', $updateApproval, 'PPH_ID', $this->input->get('pid'));

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

		redirect('pph_22/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid'). '&mid=' . $this->input->get('mid'). '&yid=' . $this->input->get('yid'));
	}

	// Closed
	public function Closed()
	{
		// Update status g_pph22
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'CLOSED'
		);
		$this->cms->updateGeneralData('g_pph22', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		$pphData 		= $this->cms->getSingularData('g_pph22', 'PPH22_ID', $pphID);

		$phpExcel->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
		$phpExcel->getActiveSheet()->setShowGridlines(false);
		$phpExcel->getActiveSheet()->getSheetView()->setZoomScale(85);
		$phpExcel->setActiveSheetIndex(0)->setTitle('Info PPh 22');
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
		$phpExcel->getActiveSheet()->setCellValue('B9', 'Perihal : INFO PPh 22 TERUTANG MASA ' . strtoupper($pphData->row()->PERIOD_MONTH) . ' TAHUN PAJAK ' . $pphData->row()->PERIOD_YEAR . '  YANG HARUS DISETOR');
		$phpExcel->getActiveSheet()->setCellValue('B11', "'1.");
		$phpExcel->getActiveSheet()->getStyle('B11')->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

		$phpExcel->getActiveSheet()->mergeCells('C11:H11');
		$phpExcel->getActiveSheet()->setCellValue('C11', 'Perhitungan PPh 22 - Pegawai Tetap');

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
		$phpExcel->getActiveSheet()->setCellValue('E13', 'PPh 22 TERUTANG');

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
		$phpExcel->getActiveSheet()->setCellValue('G13', 'PPh 22 KURANG BAYAR');

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
		$phpExcel->getActiveSheet()->setCellValue('H15', '411122-100');


		$phpExcel->getActiveSheet()->mergeCells('C20:K20');
		$phpExcel->getActiveSheet()->setCellValue('C20', '>> Jadi PPh yang harus di bayar Masa ' . $pphData->row()->PERIOD_MONTH . ' Tahun Pajak ' . $pphData->row()->PERIOD_YEAR . ' adalah sebagai berikut  Rp. ' . number_format($pphData->row()->COMPANY_KBLB));

		$phpExcel->getActiveSheet()->mergeCells('C22:K22');
		$phpExcel->getActiveSheet()->setCellValue('C22', '>> Mohon disetorkan paling lambat tanggal 10 ' . $pphData->row()->PERIOD_MONTH . ' ' . $pphData->row()->PERIOD_YEAR);

		$phpExcel->getActiveSheet()->mergeCells('C22:K22');
		$phpExcel->getActiveSheet()->setCellValue('C22', '>> Jika sudah disetorkan mohon diupload NTPN-nya');

		$phpExcel->getActiveSheet()->mergeCells('C24:K24');
		$phpExcel->getActiveSheet()->setCellValue('C24', 'Terima Kasih');

		$phpExcel->getActiveSheet()->mergeCells('C27:K27');
		$phpExcel->getActiveSheet()->setCellValue('C27', 'Regards,');

		$phpExcel->getActiveSheet()->mergeCells('C28:K28');
		$phpExcel->getActiveSheet()->setCellValue('C28', 'Team MSM');

		$phpExcel->getActiveSheet()->mergeCells('C29:K29');
		$phpExcel->getActiveSheet()->setCellValue('C29', 'Ph : +6222 63858603/04');

		foreach (range('C', 'Z') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}

		$phpExcel->getActiveSheet()->setSelectedCell('A1');
		$_objWriter = new Xlsx($phpExcel);
		$_varFLENME = 'REPORT_PPh22_' . date('Ymd') . '_' . $companyData->row()->COMPANY_NAME . '.xlsx';
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
			->from('g_pph22')
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

		$queryInsert = $this->cms->insertGeneralData('g_pph22', $companyData);
		//EoL 1

		if (!$queryInsert) {
			$this->session->set_flashdata('query', 'invalid');
		} else {
			$this->session->set_flashdata('query', 'success');
		}

		redirect(($this->input->post('pphFlag') == true ? base_url('pph_22/bulan?cid=' . $this->input->post('companyID')) : base_url('pph_22')));
	} 

	public function pph_22_tahun()
	{
		$this->load->view('cms/hitung_pajak/pph22_tahun');
	}

	public function pph_22_bulan_summary_karyawan()
	{
		$this->db->select('*')
			->from('v_g_employee_pph22')
			->where('EMPLOYEE_ID', trim($this->input->get('eid')))
			->where('PPH_ID', trim($this->input->get('pid')));


		$data['employee'] 	= $this->db->get();

		if ($data['employee']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_22/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')));
		}

		$this->load->view('cms/hitung_pajak/pph22_bulan_summary_karyawan', $data);
	}

	public function edit_pph_22_bulan_summary_karyawan()
	{
		$this->db->select('*')
			->from('v_g_employee_pph22')
			->where('INCOME_ID', trim($this->input->get('eid')))
			->where('PPH22_ID', trim($this->input->get('pid')));


		$data['employee'] 	= $this->db->get();

		if ($data['employee']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_22/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')));
		}

		$this->load->view('cms/hitung_pajak/edit_pph22_bulan_summary_karyawan', $data);
	}

	public function update_pph_22_bulan_summary_karyawan()
	{
		$this->output->enable_profiler(TRUE);  

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$employeeCheck = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_ID', $this->input->post('employeeID'));
		$pphCheck 	   = $this->cms->getSingularData('g_pph22', 'PPH_ID', $this->input->post('pphID'));

		//Deklrasi Variabel awal
		$companyBruto = 0;
		$companyNeto  = 0;
		$companyPPH22 = 0;

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

		//Kalkulasi PPH22 Non-Gross Up
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

		//Kalkulasi PPH22 Gross UP
		if ($companyCheck->row()->PPHCOUNT_METHOD == 'GROSS UP') {
			
			switch ($yearlyPKP) {
				case ($yearlyPKP <= 47500000):
					// echo 'lapisan 1';
					$Tunjpph = ($yearlyPKP - 0) *  (5 / 95) + 0;
					break;
				case (($yearlyPKP >= 47500000) && ($yearlyPKP <= 227500000)):
					// echo 'lapisan 2';
					$Tunjpph = ($yearlyPKP - 47500000) * (15 / 85) + 2500000;
					break;
				case (($yearlyPKP >= 227500000) && ($yearlyPKP <= 405000000)):
					// echo 'lapisan 3';
					$Tunjpph = ($yearlyPKP - 227500000) * (25 / 75) + 32500000;
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
			
		

		// Mengecek status pada table g_pph22, jika status belum LAPOR PAJAK
		// Maka data lama pada g_employee_income akan dihapus terlebih dahulu, baru diinputkan data terbaru
		$this->db->select('STATUS')
				 ->from('g_pph22')
				 ->where('PPH_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 

		foreach ($status->result() as $key); 

		// Jika status bukan lapor pajak, hapus terlebih dahulu data lama di g_employee_income
		if($key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING"){
			
			$processType='REVISI';

			// Ngehapus data di g_employee_income berdasarkan PPH ID dan Employee ID
			$this->cms->deleteGeneralDataDouble('g_employee_income', 'PPH_ID', $this->input->post('pphID'), 'EMPLOYEE_ID', $this->input->post('employeeID'));

			// Update status di g_pph22 dan g_employee_income menjadi ON PROGRESS
			$updatePPH22 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH_ID', $this->input->post('pphID')); 
		} elseif ($key->STATUS == "LAPOR PAJAK" OR $key->STATUS  == "HARDCOPY" ) {
			//PEMBETULANN
			$processType='PEMBETULAN';

			// // Update data sebelumnya, sebelum di inputkan data baru
			// $updatePPH22 = array(
			// 	'UPDATED'	=> date('Y-m-d H:i:s'),
			// 	'STATUS'	=> 'ON PROGRESS'
			// );
			// $this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH_ID', $this->input->post('pphID')); 

			foreach ($pphCheck->result() as $cekPPH22);
			$monthCheck = $cekPPH22->PERIOD_MONTH;
			$yearCheck = $cekPPH22->PERIOD_YEAR;
			$prevPPHVAL = $cekPPH22->COMPANY_PPHVAL;

			$pembetulanKe = $this->cms->cekpembetulan($this->input->post('companyID'), $monthCheck, $yearCheck); 

			// Ubah dulu status lama jadi HISTORY
			$updateStatusPPH22 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'HISTORY'
			);
			$this->cms->updateGeneralData('g_pph22', $updateStatusPPH22, 'PPH_ID', $this->input->post('pphID')); 
		}

		if($processType=="REVISI") {
			$pphID = $this->input->post('pphID');
		}else {
			// Generate PPH ID baru
			$pphID = $this->incube->generateID(10);

			// Ambil data bulan dan tahun 
			foreach ($pphCheck->result() as $cekPPH22);
			$monthCheck = $cekPPH22->PERIOD_MONTH;
			$yearCheck = $cekPPH22->PERIOD_YEAR;

			$companyData = array(
				'PPH_ID'		=> $pphID,
				'COMPANY_ID'	=> $this->input->post('companyID'),
				'PERIOD_YEAR'	=> $yearCheck,
				'PERIOD_MONTH'	=> $monthCheck,
				'CREATED'		=> date('Y-m-d h:i:s'),
				'STATUS'		=> 'ON PROGRESS'
			);

			$queryInsert = $this->cms->insertGeneralData('g_pph22', $companyData);
			//EoL 1
			
		}

		//EoL PPH22 Gross Up
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
					'EMPLOYEE_PPH22_YEAR_TERATUR'			=> $employeeNoEdit->EMPLOYEE_PPH22_YEAR_TERATUR,
					'EMPLOYEE_PPH22_YEAR_TIDAK_TERATUR'		=> $employeeNoEdit->EMPLOYEE_PPH22_YEAR_TIDAK_TERATUR,
					'EMPLOYEE_PPH22_YEAR_KESELURUHAN'		=> $employeeNoEdit->EMPLOYEE_PPH22_YEAR_KESELURUHAN,
					'EMPLOYEE_PPH22_DIPOTONG_YEAR_AGO'		=> $employeeNoEdit->EMPLOYEE_PPH22_DIPOTONG_YEAR_AGO,
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
				$this->cms->updateGeneralData('g_pph22', $datalamaupdate, 'PPH_ID', $this->input->post('pphID')); 
			}
			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph22($pphID); 
		}

		if($processType == 'REVISI'){
			$pphID = $this->input->post('pphID');

			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph22($pphID); 
		}
		

		redirect('pph_22/bulan/summary?pid='. $pphID . '&cid=' . $this->input->post('companyID'). '&mid=' . $this->input->post('monthID'). '&yid=' . $this->input->post('yearID'));
	}


	public function update_g_pph22($pphid)
	{ 
		$query_total = $this->cms->total_bruto_netto($pphid);
		
		foreach ($query_total->result() as $key);
		$total_bruto = $key->TOTAL_BRUTTO;
		$total_netto  = $key->TOTAL_NETTO;
		$total_pphval = $key->TOTAL_PPH22;

		// Update total bruto karyawan dengan PPH ID yang sama
		$UpdateCompanyData = array(
			'COMPANY_BRUTO'		=> $total_bruto,
			'COMPANY_NETTO'		=> $total_netto,
			'COMPANY_PPHVAL'	=> $total_pphval,
			'COMPANY_KBLB'		=> 0 // Lupa dapet nya dari mana :(
		); 

		$this->cms->updateGeneralData('g_pph22', $UpdateCompanyData, 'PPH_ID', $pphid);
	}

	public function aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/pph22_aktifitas_pajak');
	}

	public function edit_aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/edit_status_aktifitas_pajak');
	}
}
