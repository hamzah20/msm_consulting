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

	public function spt22_masa()
	{
		$this->load->view('cms/e_spt/spt_22_masa');
	}

	public function bukti_pungut_22()
	{
		$this->load->view('cms/e_spt/bukti_pungut_22');
	}


	public function pph_22_bulan()
	{ 
		$this->db->select('*')
			->from('v_g_companies_pph22_detail')
			->where('COMPANY_ID', $this->input->get('cid')); 

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
		$data['Getpph22']	= $this->cms->getGeneralData('g_pph22', 'PPH22_ID', $this->input->get('pid'));

		$this->db->select('*')
			->from('v_g_employee_pph22')
			->where('COMPANY_ID', trim($this->input->get('cid')))
			->where('PPH22_ID', trim($this->input->get('pid'))); 

		$data['employees'] 	= $this->db->get();
		$data['counter']	= 1;
		$data['payment']    = $this->cms->getSingularData('g_payment22', 'PPH22_ID', $this->input->get('pid'));
		$data['statuspph22']= $this->cms->cekstatuspph22($this->input->get('pid')); 

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

		$sheet->getStyle('A1:U2')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH22 Form')
			->setSubject('MSM Consulting PPH22 Form');

		$sheet->getStyle('A1:F2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');

		$sheet->getStyle('G1:U2')
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

		$sheet->setCellValue('C1', "ID Lawan \n Transaksi");
		$sheet->mergeCells('C1:C2');
		$sheet->getStyle('C1:C2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('D1', "Nama Lawan \n Transaksi");
		$sheet->mergeCells('D1:D2');
		$sheet->getStyle('D1:D2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('E1', "NPWP Lawan \n Transaksi");
		$sheet->mergeCells('E1:E2');
		$sheet->getStyle('E1:E2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('F1', "Alamat Lawan \n Transaksi");
		$sheet->mergeCells('F1:F2');
		$sheet->getStyle('F1:F2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('G1', "Nomor \n Bukti Potong");
		$sheet->mergeCells('G1:G2');
		$sheet->getStyle('G1:G2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('H1', "Tanggal Bukti \n Potong");
		$sheet->mergeCells('H1:H2');
		$sheet->getStyle('H1:H2')->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('I1', "Keterangan\nTransaksi");
		$sheet->mergeCells('I1:I2');
		$sheet->getStyle('I1:I2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('J1', 'Bidang Industri Tertentu');
		$sheet->mergeCells('J1:N1');
		$sheet->setCellValue('J2', "Penjualan Bruto \nSemen (Rp)");
		$sheet->setCellValue('K2', "Penjuakan Bruto \nKertas (Rp)");
		$sheet->setCellValue('L2', "Penjualan Bruto \nBaja (Rp)");
		$sheet->setCellValue('M2', "Penjualan Bruto \nOtomotif (Rp)");
		$sheet->setCellValue('N2', "Penjualan Bruto \nFarmasi (Rp)");
		$sheet->getStyle('J1:N1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('O1', 'BBM, BBG, Pelumas');
		$sheet->mergeCells('O1:Q1');
		$sheet->setCellValue('O2', "Penyalur/Agen \n (Jika ada BBM,\n BBG, dan \nPelumas maka \npenjualan bruto \nfarmasi harus \nnill)");
		$sheet->setCellValue('P2', "Penjualan Bruto \nBBM & BBG \n(Rp)");
		$sheet->setCellValue('Q2', "Penjualan Bruto \nPelumas \n(Rp)");
		$sheet->getStyle('O1:Q1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('R1', "Barang yang Tergolong \n Sangat Mewah");
		$sheet->mergeCells('R1:S1');
		$sheet->setCellValue('R2', "Jenis");
		$sheet->setCellValue('S2', 'Harga Jual (Rp)'); 
		$sheet->getStyle('R1:S1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCelLValue('T1', "Pembelian \nBahan-Bahan \nuntuk Keperluan \nIndustri atau \nEkspor dari \nPedagang \nPengumpul");
		$sheet->mergeCells('T1:T2');
		$sheet->getStyle('T1:T2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		$sheet->setCellValue('U1', "Pembelian \nBatubara, \nMineral Logam, \ndan Mineral \nBukan Logam, \ndari Badan atau \nOrang Pribadi \nPemegang Izin \nUsaha \nPertambangan \noleh Industri \natau Badan \nUsaha (Rp)");
		$sheet->mergeCells('U1:U2');
		$sheet->getStyle('U1:U2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER) 
			->setWrapText(true);  


		foreach (range('B', 'U') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		} 

		// Isi excel pake data yang ada di view
		if ($employeeData->num_rows() != 0) {

			$colCounter = 3;
			$numCounter = 1;

			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularDataDetail('v_g_employee_pph22', 'PPH22_ID', 'COMPANY_ID',$pphID,$companyID);
				
				//2.1 Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthName($pphData->row()->PERIOD_MONTH); 

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $employee->NO_FORMULIR);
				$sheet->setCellValue('C' . $colCounter, $employee->TRANSACTION_ID);
				$sheet->setCellValue('D' . $colCounter, $employee->TRANSACTION_NAME);
				$sheet->setCellValue('E' . $colCounter, $employee->TRANSACTION_NPWP);
				$sheet->setCellValue('F' . $colCounter, $employee->TRANSACTION_ADDRESS);
				$sheet->setCellValue('G' . $colCounter, $employee->NO_BUKTI_POTONG);
				$sheet->setCellValue('H' . $colCounter, $employee->TANGGAL_BUKTI_POTONG);
				$sheet->setCellValue('I' . $colCounter, $employee->TRANSACTION_NOTES);
				$sheet->setCellValue('J' . $colCounter, $employee->BRUTO_SEMEN);
				$sheet->setCellValue('K' . $colCounter, $employee->BRUTO_KERTAS);
				$sheet->setCellValue('L' . $colCounter, $employee->BRUTO_BAJA);
				$sheet->setCellValue('M' . $colCounter, $employee->BRUTO_OTOMOTIF);
				$sheet->setCellValue('N' . $colCounter, $employee->BRUTO_FARMASI);
				$sheet->setCellValue('O' . $colCounter, $employee->PENYALUR_AGEN);
				$sheet->setCellValue('P' . $colCounter, $employee->BRUTO_BBM_BBG);
				$sheet->setCellValue('Q' . $colCounter, $employee->BRUTO_PELUMAS);
				$sheet->setCellValue('R' . $colCounter, $employee->PRODUCT_TYPE);
				$sheet->setCellValue('S' . $colCounter, $employee->SELLING_PRICE);
				$sheet->setCellValue('T' . $colCounter, $employee->SELLING_INDUSTRI_MATERIALS);
				$sheet->setCellValue('U' . $colCounter, $employee->SELLING_BUSINESS_MINING); 

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

	public function generateXLSFileLaporPajak()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');
		//echo $pphID;
		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee_pph22', 'PPH22_ID', $pphID);

		$sql_pembetulan = $this->cms->count_pembetulan22($pphID);  
		

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
			$totaldpp = 0;
			$totaldpp_all = 0;
			$totalpph = 0;
			$totalpph_all = 0;
			foreach ($sql_pembetulan->result() as $pembetulan_r );

			foreach ($employeeData->result() as $employee) {
				//echo $employee->INCOME_ID;
				$pphData 		= $this->cms->getSingularData('v_g_employee_pph22', 'PPH22_ID',$pphID);
				
				// Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthNameLP($pphData->row()->PERIOD_MONTH);  

				// Cek Farmasi / BBM, Gas, Pelumas
				if($employee->BRUTO_FARMASI == 0){
					$data_jenis = "BBM, Gas, dan Pelumas";
				}else{
					$data_jenis = "Farmasi";
				}

				// Sektor 1
				if($employee->SELLING_INDUSTRI_MATERIALS > 0){
					$sektor1 = "Pembelian Barang Keperluan Industri";
				} else{
					$sektor1 = "";
				}

				// Sektor 2
				if($employee->SELLING_BUSINESS_MINING > 0){
					$sektor2 = "Pembelian Komoditas Pertambangan Tertentu dari Pemegang Izin Usaha Pertambangan oleh Industri atau Badan Usaha";
				} else{
					$sektor2 = "";
				} 	 	
				//echo $employee->PRODUCT_TYPE;
				// GET DATA RATES
				$list_rates = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', $employee->PRODUCT_TYPE);
				foreach ($list_rates->result() as $rates); 
				$presntase_rates = $rates->PRESENTASE; 


				// Count Barang Mewah PPH yang Dipungut


				$sheet->setCellValue('A'  . $colCounter, $employee->NO_FORMULIR);
				$sheet->setCellValue('B'  . $colCounter, $monthName);
				$sheet->setCellValue('C'  . $colCounter, $employee->PERIOD_YEAR);
				$sheet->setCellValue('D'  . $colCounter, $pembetulan_r->TOTAL_PEMBETULAN == null ? '0' : $pembetulan_r->TOTAL_PEMBETULAN);
				$sheet->setCellValue('E'  . $colCounter, str_replace('.','',str_replace('-', '',$employee->TRANSACTION_NPWP)));
				$sheet->setCellValue('F'  . $colCounter, $employee->TRANSACTION_NAME);
				$sheet->setCellValue('G'  . $colCounter, $employee->TRANSACTION_ADDRESS);
				$sheet->setCellValue('H'  . $colCounter, $employee->NO_BUKTI_POTONG);
				$sheet->setCellValue('I'  . $colCounter, $employee->TANGGAL_BUKTI_POTONG);
				$sheet->setCellValue('J'  . $colCounter, $employee->BRUTO_SEMEN);
				$sheet->setCellValue('K'  . $colCounter, $employee->BRUTO_SEMEN_RATES);
				$sheet->setCellValue('L'  . $colCounter, $employee->PPH_SEMEN);
				$sheet->setCellValue('M'  . $colCounter, $employee->BRUTO_KERTAS);
				$sheet->setCellValue('N'  . $colCounter, $employee->BRUTO_KERTAS_RATES);
				$sheet->setCellValue('O'  . $colCounter, $employee->PPH_KERTAS);
				$sheet->setCellValue('P'  . $colCounter, $employee->BRUTO_BAJA);
				$sheet->setCellValue('Q'  . $colCounter, $employee->BRUTO_BAJA_RATES);
				$sheet->setCellValue('R'  . $colCounter, $employee->PPH_BAJA);
				$sheet->setCellValue('S'  . $colCounter, $employee->BRUTO_OTOMOTIF);
				$sheet->setCellValue('T'  . $colCounter, $employee->BRUTO_OTOMOTIF_RATES);
				$sheet->setCellValue('U'  . $colCounter, $employee->PPH_OTOMOTIF);
				$sheet->setCellValue('V'  . $colCounter, $data_jenis);
				$sheet->setCellValue('W'  . $colCounter, $employee->BRUTO_FINAL);
				$sheet->setCellValue('X'  . $colCounter, $employee->TARIF_FINAL);
				$sheet->setCellValue('Y'  . $colCounter, $employee->PPH_FINAL);
				$sheet->setCellValue('Z'  . $colCounter, $data_jenis);
				$sheet->setCellValue('AA' . $colCounter, $employee->BRUTO_TIDAK_FINAL);
				$sheet->setCellValue('AB' . $colCounter, $employee->TARIF_TIDAK_FINAL);
				$sheet->setCellValue('AC' . $colCounter, $employee->PPH_TIDAK_FINAL);
				$sheet->setCellValue('AD' . $colCounter, $employee->PRODUCT_TYPE);				
				$sheet->setCellValue('AE' . $colCounter, $employee->SELLING_PRICE);	
				$sheet->setCellValue('AF' . $colCounter, $presntase_rates);
				$sheet->setCellValue('AG' . $colCounter, $employee->PPH_BARANG_MEWAH);			
				$sheet->setCellValue('AH' . $colCounter, $sektor1);
				$sheet->setCellValue('AI' . $colCounter, $employee->SELLING_INDUSTRI_MATERIALS);
				$sheet->setCellValue('AJ' . $colCounter, $employee->TARIF_SEKTOR1);
				$sheet->setCellValue('AK' . $colCounter, $employee->PPH_SEKTOR1);
				$sheet->setCellValue('AL' . $colCounter, $sektor2);
				$sheet->setCellValue('AM' . $colCounter, $employee->SELLING_BUSINESS_MINING);
				$sheet->setCellValue('AN' . $colCounter, $employee->TARIF_SEKTOR2);
				$sheet->setCellValue('AO' . $colCounter, $employee->PPH_SEKTOR2);
				$sheet->setCellValue('AP' . $colCounter, '');
				$sheet->setCellValue('AQ' . $colCounter, $employee->BRUTO_BADAN1);
				$sheet->setCellValue('AR' . $colCounter, $employee->TARIF_BADAN1);
				$sheet->setCellValue('AS' . $colCounter, $employee->PPH_BADAN1);
				$sheet->setCellValue('AT' . $colCounter, '');
				$sheet->setCellValue('AU' . $colCounter, $employee->BRUTO_BADAN2);
				$sheet->setCellValue('AV' . $colCounter, $employee->TARIF_BADAN2);
				$sheet->setCellValue('AW' . $colCounter, $employee->PPH_BADAN2);
				$sheet->setCellValue('AX' . $colCounter, $employee->TOTAL_DPP);
				$sheet->setCellValue('AY' . $colCounter, $employee->TOTAL_PPH22);   

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
		$this->db->select('BRUTO')
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
	}

	public function importXLSLFile()
	{
		$this->output->enable_profiler(TRUE); 

		//echo $this->input->post('pphID');

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$employeeCheck = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $this->input->post('companyID'));
		$pphCheck 	   = $this->cms->getSingularData('g_pph22', 'PPH22_ID', $this->input->post('pphID')); 

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
		}


		foreach ($sheet as $sheetData) {

			$incomeID   = $this->incube->generateID(10); 
			$PPH_ID 	= $this->input->post('pphID'); 
			
			// Update data sebelumnya, sebelum di inputkan data baru 
			$updatePPH22 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH22_ID', $pphID); 

			// ------------------------------------------------------ CEK RATES INDUSTRY 
				// Cek rates semen
				$SemenRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'SEMEN');
				foreach ($SemenRatesData->result() as $SemenRates); 
				$semen_presentase = $SemenRates->PRESENTASE;
				// Cek rates kertas
				$KertasRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'KERTAS');
				foreach ($KertasRatesData->result() as $KertasRates); 
				$kertas_presentase = $KertasRates->PRESENTASE;
				// Cek rates baja
				$BajaRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'BAJA');
				foreach ($BajaRatesData->result() as $BajaRates); 
				$baja_presentase = $BajaRates->PRESENTASE;
				// Cek rates otomotif
				$OtomotifRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'OTOMOTIF');
				foreach ($OtomotifRatesData->result() as $OtomotifRates); 
				$otomotif_presentase = $OtomotifRates->PRESENTASE;
				// Cek rates farmasi
				$FarmasiRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'FARMASI');
				foreach ($FarmasiRatesData->result() as $FarmasiRates); 
				$farmasi_presentase = $FarmasiRates->PRESENTASE; 
			// -------------------------------------------------------------------------

			// ------------------------------------------------------------ PPH INDUSTRY
				// PPH Semen
				if(empty($sheetData['E'])){
					$pph_semen = 2*$semen_presentase/100*$sheetData['J'];
				}else{
					$pph_semen = $semen_presentase/100*$sheetData['J'];
				}

				// PPH Kertas
				if(empty($sheetData['E'])){
					$pph_kertas = 2*$kertas_presentase/100*$sheetData['K'];
				}else{
					$pph_kertas = $kertas_presentase/100*$sheetData['K'];
				}

				// PPH Baja
				if(empty($sheetData['E'])){
					$pph_baja = 2*$baja_presentase/100*$sheetData['L'];
				}else{
					$pph_baja = $baja_presentase/100*$sheetData['L'];
				}

				// PPH Otomotif
				if(empty($sheetData['E'])){
					$pph_otomotif = 2*$otomotif_presentase/100*$sheetData['M'];
				}else{
					$pph_otomotif = $otomotif_presentase/100*$sheetData['M'];
				}
			// -------------------------------------------------------------------------

			// ------------------------------------------------------ CEK RATES EXPENSIVE 
				$ExpensiveRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', $sheetData['R']);
				foreach ($ExpensiveRatesData->result() as $ExpensiveRates); 
				$expensive_presentase = $ExpensiveRates->PRESENTASE;  
			// -------------------------------------------------------------------------

			// ---------------------------------- BRUTO, TARIF, PPH FINAL DAN TIDAK FINAL
				// Bruto Final
				if($sheetData['N'] > 0){
					$bruto_final = $sheetData['N'];
				} elseif($sheetData['O'] == 'Y'){
					$bruto_final = $sheetData['P'];
				}else{
					$bruto_final = 0;
				}

				// Tarif Final
				if($sheetData['N'] > 0){
					$tarif_final = 2*0.30;
				}else{
					$tarif_final = 0.30;
				}

				// PPH Final
				if(empty($sheetData['E'])){
					$pph_final = ($tarif_final/100*$bruto_final);
				}else{
					$pph_final = ($tarif_final/100*$bruto_final);
				}

				// Bruto Tidak Final
				if($sheetData['N'] > 0){
					$bruto_tidak_final = $sheetData['N'];
				} elseif($sheetData['O'] == 'N' AND ($sheetData['P'] > 0 OR $sheetData['Q'] > 0)){
					$bruto_tidak_final = $sheetData['P']+$sheetData['Q'];
				}else{
					$bruto_tidak_final = 0;
				}

				// Tarif Tidak Final
				if($sheetData['N'] > 0){
					$tarif_tidak_final = 0;
				}elseif($sheetData['O'] == 'N' AND $sheetData['P'] > 0){
					$tarif_tidak_final = 0.30*100;
				}else{
					$tarif_tidak_final = 0;
				}

				// PPH Tidak Final
				if($sheetData['N'] > 0){
					$pph_tidak_final = 0;
				}elseif(empty($sheetData['E'])){
					$pph_tidak_final = (2*$tarif_tidak_final/100*$bruto_tidak_final);
				}else{
					$pph_tidak_final = ($tarif_tidak_final/100*$bruto_tidak_final);
				} 
			// -------------------------------------------------------------------------

			// ----------------------------------------------------- BARANG SANGAT MEWAH
				// Tarif barang sangat mewah
				if($sheetData['S'] > 0){
					$tarif_barang_mewah = $expensive_presentase * 100;
				}else{
					$tarif_barang_mewah = 0;
				}

				// PPH barang sangat mewah
				if(empty($sheetData['E'])){
					$pph_barang_mewah = 2*$tarif_barang_mewah/100*$sheetData['S'];
				}else{
					$pph_barang_mewah = $tarif_barang_mewah/100*$sheetData['S'];
				}
			// -------------------------------------------------------------------------

			// ---------------------------------------------------------- SEKTOR 1 DAN 2
				// Tarif sektor 1 dan 2
				$tarif_sektor1 = 0.25*100;
				$tarif_sektor2 = 1.50*100;

				// PPH sektor 1 
				if(empty($sheetData['E'])){
					$pph_sektor1 = 2*$tarif_sektor1/100*$sheetData['T'];
				} else{
					$pph_sektor1 = $tarif_sektor1/100*$sheetData['T'];
				}

				// PPH sektor 2
				if(empty($sheetData['E'])){
					$pph_sektor2 = 2*$tarif_sektor2/100*$sheetData['U'];
				} else{
					$pph_sektor2 = $tarif_sektor2/100*$sheetData['U'];
				} 
			// -------------------------------------------------------------------------

			// -------------------------------------------------- BADAN TERTENTU LAINNYA
				// Tarif badan lainnya
				if($sheetData['B'] == 'F113304'){
					$tarif_badan = 1.50;
				}else{
					$tarif_badan = 0;
				} 

				// PPH badan lainnya
				if(empty($sheetData['E'])){
					$pph_badan = 2*$tarif_badan/100*0;
				} else{
					$pph_badan = $tarif_badan/100*0;
				} 
			// -------------------------------------------------------------------------


			// --------------------------------------------- HITUNG TOTAL DPP DAN PPH 23
				// Total DPP
				$total_dpp = $sheetData['J'] + $sheetData['K'] + $sheetData['L'] + $sheetData['M'] + $bruto_final + $bruto_tidak_final + $sheetData['S'] + $sheetData['T'] + $sheetData['U'];

				// Total PPH 22
				$total_pph22 = ($sheetData['J'] * $semen_presentase) + ($sheetData['K'] * $kertas_presentase) + ($sheetData['L'] * $baja_presentase) + ($sheetData['M'] * $otomotif_presentase) + $pph_final + $pph_tidak_final + $pph_barang_mewah + $pph_sektor1 + $pph_sektor2 +  $pph_badan + $pph_badan; 
			// ------------------------------------------------------------------------- 

			// Insert data excel ke tabe g_pph22_detail
			$employeeData = array(
				'INCOME_ID'                 	=> $incomeID,
				'COMPANY_ID'           			=> $this->input->post('companyID'),
				'PPH22_ID'						=> $pphID, 
				'NO_FORMULIR'					=> $sheetData['B'],
				'TRANSACTION_ID'				=> $sheetData['C'],
				'TRANSACTION_NAME'				=> $sheetData['D'],
				'TRANSACTION_NPWP'				=> $sheetData['E'],
				'TRANSACTION_ADDRESS'			=> $sheetData['F'],
				'NO_BUKTI_POTONG'				=> $sheetData['G'],
				'TANGGAL_BUKTI_POTONG'			=> $sheetData['H'],
				'TRANSACTION_NOTES'				=> $sheetData['I'],
				'BRUTO_SEMEN'					=> $sheetData['J'],
				'BRUTO_SEMEN_RATES'				=> $semen_presentase,
				'PPH_SEMEN'						=> $pph_semen,
				'BRUTO_KERTAS'					=> $sheetData['K'],
				'BRUTO_KERTAS_RATES'			=> $kertas_presentase,
				'PPH_KERTAS'					=> $pph_kertas,
				'BRUTO_BAJA'					=> $sheetData['L'],
				'BRUTO_BAJA_RATES'				=> $baja_presentase,
				'PPH_BAJA'						=> $pph_baja,
				'BRUTO_OTOMOTIF'				=> $sheetData['M'],
				'BRUTO_OTOMOTIF_RATES'			=> $otomotif_presentase,
				'PPH_OTOMOTIF'					=> $pph_otomotif,
				'BRUTO_FARMASI'					=> $sheetData['N'],
				'BRUTO_FARMASI_RATES'			=> $farmasi_presentase,
				'PENYALUR_AGEN'					=> $sheetData['O'],
				'BRUTO_BBM_BBG'					=> $sheetData['P'],
				'BRUTO_PELUMAS'					=> $sheetData['Q'],
				'BRUTO_FINAL'					=> $bruto_final,
				'TARIF_FINAL'					=> $tarif_final,
				'PPH_FINAL'						=> $pph_final,
				'BRUTO_TIDAK_FINAL'				=> $bruto_tidak_final,
				'TARIF_TIDAK_FINAL'				=> $tarif_tidak_final,
				'PPH_TIDAK_FINAL'				=> $pph_tidak_final,
				'PRODUCT_TYPE'					=> $sheetData['R'],
				'SELLING_PRICE'					=> $sheetData['S'],
				'TARIF_BARANG_MEWAH'			=> $tarif_barang_mewah,
				'PPH_BARANG_MEWAH'				=> $pph_barang_mewah,		
				'SELLING_INDUSTRI_MATERIALS'	=> $sheetData['T'],
				'SELLING_BUSINESS_MINING'		=> $sheetData['U'],  
				'TARIF_SEKTOR1'					=> $tarif_sektor1,
				'PPH_SEKTOR1'					=> $pph_sektor1, 
				'TARIF_SEKTOR2'					=> $tarif_sektor2,
				'PPH_SEKTOR2'					=> $pph_sektor2,
				'BRUTO_BADAN1'					=> 0,
				'TARIF_BADAN1'					=> $tarif_badan,	
				'PPH_BADAN1'					=> $pph_badan,
				'BRUTO_BADAN2'					=> 0,
				'TARIF_BADAN2'					=> $tarif_badan,
				'PPH_BADAN2'					=> $pph_badan,
				'TOTAL_DPP'						=> $total_dpp,
				'TOTAL_PPH22'					=> $total_pph22,
				'CREATED'						=> date('Y-m-d h:i:s'),
				'STATUS'						=> 'ON PROGRESS', 
				'PPHCOUNT_METHOD'				=> $companyCheck->row()->PPHCOUNT_METHOD
			); 

			$this->cms->insertGeneralData('g_pph22_detail', $employeeData);

		} 

		// ------------------------------------------ UPDATE COUNT ALL DPP AND PHH 22
		$all_dpp_pph22 = $this->cms->editPPH22($pphID);
		foreach ($all_dpp_pph22->result() as $all);
		$updatePPH22 = array(
			'COMPANY_PPHVAL22' 	=> $all->TOTAL_PPH22_ALL,
			'COMPANY_DPP'		=> $all->TOTAL_DPP_ALL,
			'UPDATED'			=> date('Y-m-d H:i:s'),
			'STATUS'			=> 'ON PROGRESS'
		);
		$this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH22_ID', $pphID);
		// -------------------------------------------------------------------------  

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
			'PPH22_ID'		=> $this->incube->generateID(10),
			'COMPANY_ID'	=> $this->input->post('companyID'),
			'PERIOD_YEAR'	=> $this->input->post('addPeriodeTahun'),
			'PERIOD_MONTH'	=> $this->input->post('addPeriodeBulan'),
			'CREATED'		=> date('Y-m-d h:i:s'),
			'STATUS'		=> ($queryGet->num_rows() > 0 ? 'HISTORY' : 'ON PROGRESS'),
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
		//$this->output->enable_profiler(TRUE);  

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID')); 
		$pphCheck 	   = $this->cms->getSingularData('g_pph22', 'PPH22_ID', $this->input->post('pphID'));  

		// Generate baru ID Income
		$incomeID     = $this->incube->generateID(10);  

		// ------------------------------------------------- GET VALUE FROM FORM EDIT 
		$formulir 	= $this->input->post('editNoForm');
		$id 	 	= $this->input->post('editID');
		$nama 	 	= $this->input->post('editNama');
		$npwp 	 	= $this->input->post('editNPWP');
		$alamat	 	= $this->input->post('editAlamat');
		$nopotong 	= $this->input->post('editNoBuktiPotong');
		$tglpotong 	= $this->input->post('editTglBuktiPotong');
		$keterangan	= $this->input->post('editKeterangan'); 

		$semen 		= str_replace(',','',$this->input->post('editSemen'));  
		$kertas 	= str_replace(',','',$this->input->post('editKertas'));  
		$baja 		= str_replace(',','',$this->input->post('editBaja'));  
		$otomotif 	= str_replace(',','',$this->input->post('editOtomotif'));  
		$farmasi 	= str_replace(',','',$this->input->post('editFarmasi'));  

		$type 	 	= $this->input->post('editType');
		$bbmbbg 	= str_replace(',','',$this->input->post('editBBMBBG'));  
		$pelumas 	= str_replace(',','',$this->input->post('editPelumas'));  

		$penyalur 	= $this->input->post('editPenyalur');
		$harga 	 	= str_replace(',','',$this->input->post('editHarga'));  
		$industri 	= str_replace(',','',$this->input->post('editIndustri'));   
		$mining 	= str_replace(',','',$this->input->post('editMining'));     
		// -------------------------------------------------------------------------

		// ------------------------------------------------------ CEK RATES INDUSTRY 
			// Cek rates semen
			$SemenRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'SEMEN');
			foreach ($SemenRatesData->result() as $SemenRates); 
			$semen_presentase = $SemenRates->PRESENTASE;
			// Cek rates kertas
			$KertasRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'KERTAS');
			foreach ($KertasRatesData->result() as $KertasRates); 
			$kertas_presentase = $KertasRates->PRESENTASE;
			// Cek rates baja
			$BajaRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'BAJA');
			foreach ($BajaRatesData->result() as $BajaRates); 
			$baja_presentase = $BajaRates->PRESENTASE;
			// Cek rates otomotif
			$OtomotifRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'OTOMOTIF');
			foreach ($OtomotifRatesData->result() as $OtomotifRates); 
			$otomotif_presentase = $OtomotifRates->PRESENTASE;
			// Cek rates farmasi
			$FarmasiRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'FARMASI');
			foreach ($FarmasiRatesData->result() as $FarmasiRates); 
			$farmasi_presentase = $FarmasiRates->PRESENTASE; 
		// -------------------------------------------------------------------------

		// ------------------------------------------------------------ PPH INDUSTRY
			// PPH Semen
			if(empty($npwp)){
				$pph_semen = 2*$semen_presentase/100*$semen;
			}else{
				$pph_semen = $semen_presentase/100*$semen;
			}

			// PPH Kertas
			if(empty($npwp)){
				$pph_kertas = 2*$kertas_presentase/100*$kertas;
			}else{
				$pph_kertas = $kertas_presentase/100*$kertas;
			}

			// PPH Baja
			if(empty($npwp)){
				$pph_baja = 2*$baja_presentase/100*$baja;
			}else{
				$pph_baja = $baja_presentase/100*$baja;
			}

			// PPH Otomotif
			if(empty($npwp)){
				$pph_otomotif = 2*$otomotif_presentase/100*$otomotif;
			}else{
				$pph_otomotif = $otomotif_presentase/100*$otomotif;
			}
		// -------------------------------------------------------------------------

		// ------------------------------------------------------ CEK RATES EXPENSIVE 
			$ExpensiveRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', $type);
			foreach ($ExpensiveRatesData->result() as $ExpensiveRates); 
			$expensive_presentase = $ExpensiveRates->PRESENTASE;  
		// -------------------------------------------------------------------------

		// ---------------------------------- BRUTO, TARIF, PPH FINAL DAN TIDAK FINAL
			// Bruto Final
			if($farmasi > 0){
				$bruto_final = $farmasi;
			} elseif($penyalur == 'Y'){
				$bruto_final = $bbmbbg;
			}else{
				$bruto_final = 0;
			}

			// Tarif Final
			if($farmasi > 0){
				$tarif_final = 2*0.30;
			}else{
				$tarif_final = 0.30;
			}

			// PPH Final
			if(empty($npwp)){
				$pph_final = ($tarif_final/100*$bruto_final);
			}else{
				$pph_final = ($tarif_final/100*$bruto_final);
			}

			// Bruto Tidak Final
			if($farmasi > 0){
				$bruto_tidak_final = $farmasi;
			} elseif($penyalur == 'N' AND ($bbmbbg > 0 OR $pelumas > 0)){
				$bruto_tidak_final = $bbmbbg+$pelumas;
			}else{
				$bruto_tidak_final = 0;
			}

			// Tarif Tidak Final
			if($farmasi > 0){
				$tarif_tidak_final = 0;
			}elseif($penyalur == 'N' AND $bbmbbg > 0){
				$tarif_tidak_final = 0.30*100;
			}else{
				$tarif_tidak_final = 0;
			}

			// PPH Tidak Final
			if($farmasi > 0){
				$pph_tidak_final = 0;
			}elseif(empty($npwp)){
				$pph_tidak_final = (2*$tarif_tidak_final/100*$bruto_tidak_final);
			}else{
				$pph_tidak_final = ($tarif_tidak_final/100*$bruto_tidak_final);
			} 
		// -------------------------------------------------------------------------

		// ----------------------------------------------------- BARANG SANGAT MEWAH
			// Tarif barang sangat mewah
			if($harga > 0){
				$tarif_barang_mewah = $expensive_presentase * 100;
			}else{
				$tarif_barang_mewah = 0;
			}

			// PPH barang sangat mewah
			if(empty($npwp)){
				$pph_barang_mewah = 2*$tarif_barang_mewah/100*$harga;
			}else{
				$pph_barang_mewah = $tarif_barang_mewah/100*$harga;
			}
		// -------------------------------------------------------------------------

		// ---------------------------------------------------------- SEKTOR 1 DAN 2
			// Tarif sektor 1 dan 2
			$tarif_sektor1 = 0.25*100;
			$tarif_sektor2 = 1.50*100;

			// PPH sektor 1 
			if(empty($npwp)){
				$pph_sektor1 = 2*$tarif_sektor1/100*$industri;
			} else{
				$pph_sektor1 = $tarif_sektor1/100*$mining;
			}

			// PPH sektor 2
			if(empty($npwp)){
				$pph_sektor2 = 2*$tarif_sektor2/100*$mining;
			} else{
				$pph_sektor2 = $tarif_sektor2/100*$mining;
			} 
		// -------------------------------------------------------------------------

		// -------------------------------------------------- BADAN TERTENTU LAINNYA
			// Tarif badan lainnya
			if($formulir == 'F113304'){
				$tarif_badan = 1.50;
			}else{
				$tarif_badan = 0;
			} 

			// PPH badan lainnya
			if(empty($npwp)){
				$pph_badan = 2*$tarif_badan/100*0;
			} else{
				$pph_badan = $tarif_badan/100*0;
			} 
		// -------------------------------------------------------------------------

		// --------------------------------------------- HITUNG TOTAL DPP DAN PPH 23
			// Total DPP
			$total_dpp = $semen + $kertas + $baja + $otomotif + $bruto_final + $bruto_tidak_final + $harga + $industri + $mining;

			// Total PPH 22
			$total_pph22 = ($semen * $semen_presentase) + ($kertas * $kertas_presentase) + ($baja * $baja_presentase) + ($otomotif * $otomotif_presentase) + $pph_final + $pph_tidak_final + $pph_barang_mewah + $pph_sektor1 + $pph_sektor2 +  $pph_badan + $pph_badan; 
		// ------------------------------------------------------------------------- 

		// ----------------------------------------------- CEK STATUS FROM FORM EDIT
		$this->db->select('STATUS')
				 ->from('g_pph22')
				 ->where('PPH22_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 
		foreach ($status->result() as $key); 
		// ------------------------------------------------------------------------- 

		// Jika status bukan lapor pajak, hapus terlebih dahulu data lama di g_pph22_detail
		if($key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING"){
			
			$processType = 'REVISI';

			// Ngehapus data di g_pph22_detail berdasarkan PPH ID dan Income ID
			$this->cms->deleteGeneralDataDouble('g_pph22_detail', 'PPH22_ID', $this->input->post('pphID'), 'INCOME_ID', $this->input->post('incomeID'));

			// Update status di g_pph22 menjadi ON PROGRESS
			$updatePPH22 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH22_ID', $this->input->post('pphID')); 
		} elseif ($key->STATUS == "LAPOR PAJAK" OR $key->STATUS  == "HARDCOPY" ) {
			//PEMBETULANN
			$processType='PEMBETULAN';

			// Update data sebelumnya, sebelum di inputkan data baru
			$updatePPH22 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH22_ID', $this->input->post('pphID')); 

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
			$this->cms->updateGeneralData('g_pph22', $updateStatusPPH22, 'PPH22_ID', $this->input->post('pphID')); 
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
		} 

		$transaksiData = array(
			'INCOME_ID'                 	=> $incomeID,
			'COMPANY_ID'           			=> $this->input->post('companyID'),
			'PPH22_ID'						=> $pphID, 
			'NO_FORMULIR'					=> $formulir,
			'TRANSACTION_ID'				=> $id,
			'TRANSACTION_NAME'				=> $nama,
			'TRANSACTION_NPWP'				=> $npwp,
			'TRANSACTION_ADDRESS'			=> $alamat,
			'NO_BUKTI_POTONG'				=> $nopotong,
			'TANGGAL_BUKTI_POTONG'			=> $tglpotong,
			'TRANSACTION_NOTES'				=> $keterangan,
			'BRUTO_SEMEN'					=> $semen,
			'BRUTO_SEMEN_RATES'				=> $semen_presentase,
			'PPH_SEMEN'						=> $pph_semen,
			'BRUTO_KERTAS'					=> $kertas,
			'BRUTO_KERTAS_RATES'			=> $kertas_presentase,
			'PPH_KERTAS'					=> $pph_kertas,
			'BRUTO_BAJA'					=> $baja,
			'BRUTO_BAJA_RATES'				=> $baja_presentase,
			'PPH_BAJA'						=> $pph_baja,
			'BRUTO_OTOMOTIF'				=> $otomotif,
			'BRUTO_OTOMOTIF_RATES'			=> $otomotif_presentase,
			'PPH_OTOMOTIF'					=> $pph_otomotif,
			'BRUTO_FARMASI'					=> $farmasi,
			'BRUTO_FARMASI_RATES'			=> $farmasi_presentase,
			'PENYALUR_AGEN'					=> $penyalur,
			'BRUTO_BBM_BBG'					=> $bbmbbg,
			'BRUTO_PELUMAS'					=> $pelumas,
			'BRUTO_FINAL'					=> $bruto_final,
			'TARIF_FINAL'					=> $tarif_final,
			'PPH_FINAL'						=> $pph_final,
			'BRUTO_TIDAK_FINAL'				=> $bruto_tidak_final,
			'TARIF_TIDAK_FINAL'				=> $tarif_tidak_final,
			'PPH_TIDAK_FINAL'				=> $pph_tidak_final,
			'PRODUCT_TYPE'					=> $type,
			'SELLING_PRICE'					=> $harga,
			'TARIF_BARANG_MEWAH'			=> $tarif_barang_mewah,
			'PPH_BARANG_MEWAH'				=> $pph_barang_mewah,		
			'SELLING_INDUSTRI_MATERIALS'	=> $industri,
			'SELLING_BUSINESS_MINING'		=> $mining,  
			'TARIF_SEKTOR1'					=> $tarif_sektor1,
			'PPH_SEKTOR1'					=> $pph_sektor1, 
			'TARIF_SEKTOR2'					=> $tarif_sektor2,
			'PPH_SEKTOR2'					=> $pph_sektor2,
			'BRUTO_BADAN1'					=> 0,
			'TARIF_BADAN1'					=> $tarif_badan,	
			'PPH_BADAN1'					=> $pph_badan,
			'BRUTO_BADAN2'					=> 0,
			'TARIF_BADAN2'					=> $tarif_badan,
			'PPH_BADAN2'					=> $pph_badan,
			'TOTAL_DPP'						=> $total_dpp,
			'TOTAL_PPH22'					=> $total_pph22,
			'CREATED'						=> date('Y-m-d h:i:s'),
			'STATUS'						=> 'ON PROGRESS', 
			'PPHCOUNT_METHOD'				=> $companyCheck->row()->PPHCOUNT_METHOD
		); 
		$this->cms->insertGeneralData('g_pph22_detail', $transaksiData);
		// ------------------------------------------ UPDATE COUNT ALL DPP AND PHH 22
		$all_dpp_pph22 = $this->cms->editPPH22($pphID);
		foreach ($all_dpp_pph22->result() as $all);
		$updatePPH22 = array(
			'COMPANY_PPHVAL22' 	=> $all->TOTAL_PPH22_ALL,
			'COMPANY_DPP'		=> $all->TOTAL_DPP_ALL,
			'UPDATED'			=> date('Y-m-d H:i:s'),
			'STATUS'			=> 'ON PROGRESS'
		);
		$this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH22_ID', $pphID);
		// ------------------------------------------------------------------------- 

		if($processType=="PEMBETULAN") {
			$this->cms->getCountDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('incomeID')); 

			$employeeNoEditData = $this->cms->getDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('incomeID'));
			foreach ($employeeNoEditData->result() as $employeeNoEdit) {
				$incomeID     = $this->incube->generateID(10);
				$transaksiData = array(
					'INCOME_ID'                 	=> $incomeID,
					'COMPANY_ID'           			=> $this->input->post('companyID'),
					'PPH22_ID'						=> $pphID, 
					'NO_FORMULIR'					=> $formulir,
					'TRANSACTION_ID'				=> $s,
					'TRANSACTION_NAME'				=> $nama,
					'TRANSACTION_NPWP'				=> $npwp,
					'TRANSACTION_ADDRESS'			=> $alamat,
					'NO_BUKTI_POTONG'				=> $nopotong,
					'TANGGAL_BUKTI_POTONG'			=> $tglpotong,
					'TRANSACTION_NOTES'				=> $keterangan,
					'BRUTO_SEMEN'					=> $semen,
					'BRUTO_SEMEN_RATES'				=> $semen_presentase,
					'PPH_SEMEN'						=> $pph_semen,
					'BRUTO_KERTAS'					=> $kertas,
					'BRUTO_KERTAS_RATES'			=> $kertas_presentase,
					'PPH_KERTAS'					=> $pph_kertas,
					'BRUTO_BAJA'					=> $baja,
					'BRUTO_BAJA_RATES'				=> $baja_presentase,
					'PPH_BAJA'						=> $pph_baja,
					'BRUTO_OTOMOTIF'				=> $otomotif,
					'BRUTO_OTOMOTIF_RATES'			=> $otomotif_presentase,
					'PPH_OTOMOTIF'					=> $pph_otomotif,
					'BRUTO_FARMASI'					=> $farmasi,
					'BRUTO_FARMASI_RATES'			=> $farmasi_presentase,
					'PENYALUR_AGEN'					=> $penyalur,
					'BRUTO_BBM_BBG'					=> $bbmbbg,
					'BRUTO_PELUMAS'					=> $pelumas,
					'BRUTO_FINAL'					=> $bruto_final,
					'TARIF_FINAL'					=> $tarif_final,
					'PPH_FINAL'						=> $pph_final,
					'BRUTO_TIDAK_FINAL'				=> $bruto_tidak_final,
					'TARIF_TIDAK_FINAL'				=> $tarif_tidak_final,
					'PPH_TIDAK_FINAL'				=> $pph_tidak_final,
					'PRODUCT_TYPE'					=> $type,
					'SELLING_PRICE'					=> $harga,
					'TARIF_BARANG_MEWAH'			=> $tarif_barang_mewah,
					'PPH_BARANG_MEWAH'				=> $pph_barang_mewah,		
					'SELLING_INDUSTRI_MATERIALS'	=> $industri,
					'SELLING_BUSINESS_MINING'		=> $mining,  
					'TARIF_SEKTOR1'					=> $tarif_sektor1,
					'PPH_SEKTOR1'					=> $pph_sektor1, 
					'TARIF_SEKTOR2'					=> $tarif_sektor2,
					'PPH_SEKTOR2'					=> $pph_sektor2,
					'BRUTO_BADAN1'					=> 0,
					'TARIF_BADAN1'					=> $tarif_badan,	
					'PPH_BADAN1'					=> $pph_badan,
					'BRUTO_BADAN2'					=> 0,
					'TARIF_BADAN2'					=> $tarif_badan,
					'PPH_BADAN2'					=> $pph_badan,
					'TOTAL_DPP'						=> $total_dpp,
					'TOTAL_PPH22'					=> $total_pph22,
					'CREATED'						=> date('Y-m-d h:i:s'),
					'STATUS'						=> 'ON PROGRESS', 
					'PPHCOUNT_METHOD'				=> $companyCheck->row()->PPHCOUNT_METHOD
				); 
				$this->cms->insertGeneralData('g_pph22_detail', $transaksiData);
			}

			// Update status karyawan dengan pph lama yang tidak di edit menjadi history
			foreach ($employeeNoEditData as $employeeNoEditUpdate) {
				$datalamaupdate = array(
					'STATUS'	=> 'HISTORY'
				);
				$this->cms->updateGeneralData('g_pph22', $datalamaupdate, 'PPH22_ID', $this->input->post('pphID')); 
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
		// ------------------------------------------ UPDATE COUNT ALL DPP AND PHH 22
		$all_dpp_pph22 = $this->cms->editPPH22($pphID);
		foreach ($all_dpp_pph22->result() as $all);
		$updatePPH22 = array(
			'COMPANY_PPHVAL22' 	=> $all->TOTAL_PPH22_ALL,
			'COMPANY_DPP'		=> $all->TOTAL_DPP_ALL,
			'UPDATED'			=> date('Y-m-d H:i:s'),
			'STATUS'			=> 'ON PROGRESS'
		);
		$this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH22_ID', $pphID);
		// ------------------------------------------------------------------------- 
	}

	public function aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/pph22_aktifitas_pajak');
	}

	public function edit_aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/edit_status_aktifitas_pajak');
	}

	// --------------------------------------------------------------- TRANSAKSI
	public function add_transaksi()
	{
		$data['NamaTransaksi']	= $this->cms->getGeneralList('g_transaction_profile');
		$data['ProductType']	= $this->cms->getSingularData('m_rates','CATEGORY','EXPENSIVE');
		$this->load->view('cms/hitung_pajak/add_pph22_bulan_summary_transaksi',$data);
	} 

	public function insert_transaksi()
	{
		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$pphCheck  	   = $this->cms->getSingularData('g_pph22', 'PPH22_ID', $this->input->post('pphID'));

		// Generate baru ID Income
		$incomeID     = $this->incube->generateID(10);  

		// ------------------------------------------------- GET VALUE FROM FORM EDIT 
		// Get data ID, NPWP and Address from transaction_name
		$TransactionProfileData    = $this->cms->getSingularData('g_transaction_profile', 'TRANSACTION_NAME', $this->input->post('addNama'));
		foreach ($TransactionProfileData->result() as $ProfileData); 
		$id     = $ProfileData->TRANSACTION_ID;
		$npwp   = $ProfileData->TRANSACTION_NPWP;
		$alamat = $ProfileData->TRANSACTION_ADDRESS;

		$pphID      = $this->input->post('pphID');
		$nama 	 	= $this->input->post('addNama'); 
		$formulir 	= $this->input->post('addNoForm'); 
		$nopotong 	= $this->input->post('addNoBuktiPotong');
		$tglpotong 	= $this->input->post('addTglBuktiPotong');
		$keterangan	= $this->input->post('addKeterangan'); 

		$semen 		= str_replace(',','',$this->input->post('addSemen'));  
		$kertas 	= str_replace(',','',$this->input->post('addKertas'));  
		$baja 		= str_replace(',','',$this->input->post('addBaja'));  
		$otomotif 	= str_replace(',','',$this->input->post('addOtomotif'));  
		$farmasi 	= str_replace(',','',$this->input->post('addFarmasi'));  

		$type 	 	= $this->input->post('addType');
		$bbmbbg 	= str_replace(',','',$this->input->post('addBBMBBG'));  
		$pelumas 	= str_replace(',','',$this->input->post('addPelumas'));  

		$penyalur 	= $this->input->post('addPenyalur');
		$harga 	 	= str_replace(',','',$this->input->post('addHarga'));  
		$industri 	= str_replace(',','',$this->input->post('addIndustri'));   
		$mining 	= str_replace(',','',$this->input->post('addMining'));     
		// -------------------------------------------------------------------------

		// ------------------------------------------------------ CEK RATES INDUSTRY 
			// Cek rates semen
			$SemenRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'SEMEN');
			foreach ($SemenRatesData->result() as $SemenRates); 
			$semen_presentase = $SemenRates->PRESENTASE;
			// Cek rates kertas
			$KertasRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'KERTAS');
			foreach ($KertasRatesData->result() as $KertasRates); 
			$kertas_presentase = $KertasRates->PRESENTASE;
			// Cek rates baja
			$BajaRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'BAJA');
			foreach ($BajaRatesData->result() as $BajaRates); 
			$baja_presentase = $BajaRates->PRESENTASE;
			// Cek rates otomotif
			$OtomotifRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'OTOMOTIF');
			foreach ($OtomotifRatesData->result() as $OtomotifRates); 
			$otomotif_presentase = $OtomotifRates->PRESENTASE;
			// Cek rates farmasi
			$FarmasiRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', 'FARMASI');
			foreach ($FarmasiRatesData->result() as $FarmasiRates); 
			$farmasi_presentase = $FarmasiRates->PRESENTASE; 
		// -------------------------------------------------------------------------

		// ------------------------------------------------------------ PPH INDUSTRY
			// PPH Semen
			if(empty($npwp)){
				$pph_semen = 2*$semen_presentase/100*$semen;
			}else{
				$pph_semen = $semen_presentase/100*$semen;
			}

			// PPH Kertas
			if(empty($npwp)){
				$pph_kertas = 2*$kertas_presentase/100*$kertas;
			}else{
				$pph_kertas = $kertas_presentase/100*$kertas;
			}

			// PPH Baja
			if(empty($npwp)){
				$pph_baja = 2*$baja_presentase/100*$baja;
			}else{
				$pph_baja = $baja_presentase/100*$baja;
			}

			// PPH Otomotif
			if(empty($npwp)){
				$pph_otomotif = 2*$otomotif_presentase/100*$otomotif;
			}else{
				$pph_otomotif = $otomotif_presentase/100*$otomotif;
			}
		// -------------------------------------------------------------------------

		// ------------------------------------------------------ CEK RATES EXPENSIVE 
			$ExpensiveRatesData    = $this->cms->getSingularDataDetail('m_rates', 'STATUS', 'TYPE_ID', 'ACTIVE', $type);
			foreach ($ExpensiveRatesData->result() as $ExpensiveRates); 
			$expensive_presentase = $ExpensiveRates->PRESENTASE;  
		// -------------------------------------------------------------------------

		// ---------------------------------- BRUTO, TARIF, PPH FINAL DAN TIDAK FINAL
			// Bruto Final
			if($farmasi > 0){
				$bruto_final = $farmasi;
			} elseif($penyalur == 'Y'){
				$bruto_final = $bbmbbg;
			}else{
				$bruto_final = 0;
			}

			// Tarif Final
			if($farmasi > 0){
				$tarif_final = 2*0.30;
			}else{
				$tarif_final = 0.30;
			}

			// PPH Final
			if(empty($npwp)){
				$pph_final = ($tarif_final/100*$bruto_final);
			}else{
				$pph_final = ($tarif_final/100*$bruto_final);
			}

			// Bruto Tidak Final
			if($farmasi > 0){
				$bruto_tidak_final = $farmasi;
			} elseif($penyalur == 'N' AND ($bbmbbg > 0 OR $pelumas > 0)){
				$bruto_tidak_final = $bbmbbg+$pelumas;
			}else{
				$bruto_tidak_final = 0;
			}

			// Tarif Tidak Final
			if($farmasi > 0){
				$tarif_tidak_final = 0;
			}elseif($penyalur == 'N' AND $bbmbbg > 0){
				$tarif_tidak_final = 0.30*100;
			}else{
				$tarif_tidak_final = 0;
			}

			// PPH Tidak Final
			if($farmasi > 0){
				$pph_tidak_final = 0;
			}elseif(empty($npwp)){
				$pph_tidak_final = (2*$tarif_tidak_final/100*$bruto_tidak_final);
			}else{
				$pph_tidak_final = ($tarif_tidak_final/100*$bruto_tidak_final);
			} 
		// -------------------------------------------------------------------------

		// ----------------------------------------------------- BARANG SANGAT MEWAH
			// Tarif barang sangat mewah
			if($harga > 0){
				$tarif_barang_mewah = $expensive_presentase * 100;
			}else{
				$tarif_barang_mewah = 0;
			}

			// PPH barang sangat mewah
			if(empty($npwp)){
				$pph_barang_mewah = 2*$tarif_barang_mewah/100*$harga;
			}else{
				$pph_barang_mewah = $tarif_barang_mewah/100*$harga;
			}
		// -------------------------------------------------------------------------

		// ---------------------------------------------------------- SEKTOR 1 DAN 2
			// Tarif sektor 1 dan 2
			$tarif_sektor1 = 0.25*100;
			$tarif_sektor2 = 1.50*100;

			// PPH sektor 1 
			if(empty($npwp)){
				$pph_sektor1 = 2*$tarif_sektor1/100*$industri;
			} else{
				$pph_sektor1 = $tarif_sektor1/100*$mining;
			}

			// PPH sektor 2
			if(empty($npwp)){
				$pph_sektor2 = 2*$tarif_sektor2/100*$mining;
			} else{
				$pph_sektor2 = $tarif_sektor2/100*$mining;
			} 
		// -------------------------------------------------------------------------

		// -------------------------------------------------- BADAN TERTENTU LAINNYA
			// Tarif badan lainnya
			if($formulir == 'F113304'){
				$tarif_badan = 1.50;
			}else{
				$tarif_badan = 0;
			} 

			// PPH badan lainnya
			if(empty($npwp)){
				$pph_badan = 2*$tarif_badan/100*0;
			} else{
				$pph_badan = $tarif_badan/100*0;
			} 
		// -------------------------------------------------------------------------

		// --------------------------------------------- HITUNG TOTAL DPP DAN PPH 23
			// Total DPP
			$total_dpp = $semen + $kertas + $baja + $otomotif + $bruto_final + $bruto_tidak_final + $harga + $industri + $mining;

			// Total PPH 22
			$total_pph22 = ($semen * $semen_presentase) + ($kertas * $kertas_presentase) + ($baja * $baja_presentase) + ($otomotif * $otomotif_presentase) + $pph_final + $pph_tidak_final + $pph_barang_mewah + $pph_sektor1 + $pph_sektor2 +  $pph_badan + $pph_badan; 
		// ------------------------------------------------------------------------- 

		$transaksiData = array(
			'INCOME_ID'                 	=> $incomeID,
			'COMPANY_ID'           			=> $this->input->post('companyID'),
			'PPH22_ID'						=> $pphID, 
			'NO_FORMULIR'					=> $formulir,
			'TRANSACTION_ID'				=> $id,
			'TRANSACTION_NAME'				=> $nama,
			'TRANSACTION_NPWP'				=> $npwp,
			'TRANSACTION_ADDRESS'			=> $alamat,
			'NO_BUKTI_POTONG'				=> $nopotong,
			'TANGGAL_BUKTI_POTONG'			=> $tglpotong,
			'TRANSACTION_NOTES'				=> $keterangan,
			'BRUTO_SEMEN'					=> $semen,
			'BRUTO_SEMEN_RATES'				=> $semen_presentase,
			'PPH_SEMEN'						=> $pph_semen,
			'BRUTO_KERTAS'					=> $kertas,
			'BRUTO_KERTAS_RATES'			=> $kertas_presentase,
			'PPH_KERTAS'					=> $pph_kertas,
			'BRUTO_BAJA'					=> $baja,
			'BRUTO_BAJA_RATES'				=> $baja_presentase,
			'PPH_BAJA'						=> $pph_baja,
			'BRUTO_OTOMOTIF'				=> $otomotif,
			'BRUTO_OTOMOTIF_RATES'			=> $otomotif_presentase,
			'PPH_OTOMOTIF'					=> $pph_otomotif,
			'BRUTO_FARMASI'					=> $farmasi,
			'BRUTO_FARMASI_RATES'			=> $farmasi_presentase,
			'PENYALUR_AGEN'					=> $penyalur,
			'BRUTO_BBM_BBG'					=> $bbmbbg,
			'BRUTO_PELUMAS'					=> $pelumas,
			'BRUTO_FINAL'					=> $bruto_final,
			'TARIF_FINAL'					=> $tarif_final,
			'PPH_FINAL'						=> $pph_final,
			'BRUTO_TIDAK_FINAL'				=> $bruto_tidak_final,
			'TARIF_TIDAK_FINAL'				=> $tarif_tidak_final,
			'PPH_TIDAK_FINAL'				=> $pph_tidak_final,
			'PRODUCT_TYPE'					=> $type,
			'SELLING_PRICE'					=> $harga,
			'TARIF_BARANG_MEWAH'			=> $tarif_barang_mewah,
			'PPH_BARANG_MEWAH'				=> $pph_barang_mewah,		
			'SELLING_INDUSTRI_MATERIALS'	=> $industri,
			'SELLING_BUSINESS_MINING'		=> $mining,  
			'TARIF_SEKTOR1'					=> $tarif_sektor1,
			'PPH_SEKTOR1'					=> $pph_sektor1, 
			'TARIF_SEKTOR2'					=> $tarif_sektor2,
			'PPH_SEKTOR2'					=> $pph_sektor2,
			'BRUTO_BADAN1'					=> 0,
			'TARIF_BADAN1'					=> $tarif_badan,	
			'PPH_BADAN1'					=> $pph_badan,
			'BRUTO_BADAN2'					=> 0,
			'TARIF_BADAN2'					=> $tarif_badan,
			'PPH_BADAN2'					=> $pph_badan,
			'TOTAL_DPP'						=> $total_dpp,
			'TOTAL_PPH22'					=> $total_pph22,
			'CREATED'						=> date('Y-m-d h:i:s'),
			'STATUS'						=> 'ON PROGRESS', 
			'PPHCOUNT_METHOD'				=> $companyCheck->row()->PPHCOUNT_METHOD
		); 
		$this->cms->insertGeneralData('g_pph22_detail', $transaksiData);

		// ------------------------------------------ UPDATE COUNT ALL DPP AND PHH 22
		$all_dpp_pph22 = $this->cms->editPPH22($pphID);
		foreach ($all_dpp_pph22->result() as $all);
		$updatePPH22 = array(
			'COMPANY_PPHVAL22' 	=> $all->TOTAL_PPH22_ALL,
			'COMPANY_DPP'		=> $all->TOTAL_DPP_ALL,
			'UPDATED'			=> date('Y-m-d H:i:s'),
			'STATUS'			=> 'ON PROGRESS'
		);
		$this->cms->updateGeneralData('g_pph22', $updatePPH22, 'PPH22_ID', $pphID);
		// ------------------------------------------------------------------------- 
		redirect('pph_22/bulan/summary?pid='.$this->input->post('pphID').'&cid='.$pphCheck->row()->COMPANY_ID.'&mid='.$pphCheck->row()->PERIOD_MONTH.'&yid='.$pphCheck->row()->PERIOD_YEAR);  

	}
	// ------------------------------------------------------------------------- 

	// --------------------------------------------------------- LAWAN TRANSAKSI
	public function LawanTransaksi()
	{
		$data['data_transaksi']	= $this->cms->getGeneralList('g_transaction_profile');
		$this->load->view('cms/hitung_pajak/lawan_transaksi',$data); 	
	}

	public function add_lawan_transaksi()
	{
		$transactionID   = $this->general->generateID('TRANSACTION');

		$transactionData = array(
			'TRANSACTION_ID'		=> $transactionID,
			'TRANSACTION_NAME'		=> $this->input->post('txtNama'),
			'TRANSACTION_NPWP'		=> $this->input->post('txtNPWP'),
			'TRANSACTION_ADDRESS'	=> $this->input->post('txtAlamat'),
			'CREATED'				=> date('Y-m-d h:i:s'),
			'STATUS'				=> 'ACTIVE'
		); 
		$queryInsert = $this->cms->insertGeneralData('g_transaction_profile', $transactionData);  
		redirect('pph_22/lawan_transaksi');
	}

	public function edit_lawan_transaksi()
	{
		$this->db->select('*')
			->from('g_transaction_profile') 
			->where('TRANSACTION_ID', $this->input->get('tid')); 

		$data['transaction'] 	= $this->db->get();

		if ($data['transaction']->num_rows() == 0) {
			redirect('pph_22/lawan_transaksi');
		}

		$this->load->view('cms/modal/edit_lawan_transaksi', $data);
	}	

	public function update_lawan_transaksi()
	{
		$transactionID   = $this->general->generateID('TRANSACTION');

		$transactionData = array(
			'TRANSACTION_ID'		=> $transactionID,
			'TRANSACTION_NAME'		=> $this->input->post('editNama'),
			'TRANSACTION_NPWP'		=> $this->input->post('editNPWP'),
			'TRANSACTION_ADDRESS'	=> $this->input->post('editAlamat'),
			'CREATED'				=> date('Y-m-d h:i:s'),
			'STATUS'				=> 'ACTIVE'
		); 
		$queryInsert = $this->cms->insertGeneralData('g_transaction_profile', $transactionData);  
		redirect('pph_22/lawan_transaksi');
	}

	public function delete_lawan_transaksi()
	{
		$this->cms->deleteGeneralData('g_transaction_profile', 'TRANSACTION_ID', $this->input->get('tid'));
		redirect('pph_22/lawan_transaksi');

	}
	// ------------------------------------------------------------------------- 
}
