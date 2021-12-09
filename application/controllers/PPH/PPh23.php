<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Pph23 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->db->select('*')
				 ->from('v_g_companies_pph23');

		$queryGet = $this->db->get(); 

		$data['companies']	= $queryGet;
		$data['counter']	= 1;

		$this->load->view('cms/hitung_pajak/pph23', $data);
	}

	public function spt23_masa()
	{
		$this->load->view('cms/e_spt/spt_23_masa');
	}

	public function pph_23_bulan()
	{

		//$status = "STATUS='ACTIVE' OR STATUS='APPROVED'";

		$this->db->select('*')
			->from('v_g_companies_pph23_detail')
			->where('COMPANY_ID', $this->input->get('cid'));
			// ->where('STATUS', 'APPROVED');

		$queryGet = $this->db->get();

		$cid=$this->input->get('cid');
		$yid=$this->input->get('yid');

		$data['correction'] = $this->cms->getPembetulan23($cid,$yid);

		$data['companies'] 	= $queryGet;
		$data['counter'] 	= 1;
		$data['history'] 	= 0;

		if ($data['companies']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_23'));
			return;
		}

		$this->load->view('cms/hitung_pajak/pph23_bulan', $data); 
	}

	public function pph_23_bulan_summary()
	{ 
		$cid=$this->input->get('cid');
		$mid=$this->input->get('mid');
		$yid=$this->input->get('yid');
		// $mid=$this->input->get('yid');
		$data['correction'] = $this->cms->getPembetulanSummary($cid,$mid,$yid);
		$data['summary'] 	= $this->cms->getGeneralData('v_g_companies_pph23_detail', 'PPH23_ID', $this->input->get('pid'));
		$data['Getpph23']	= $this->cms->getGeneralData('g_pph23', 'PPH23_ID', $this->input->get('pid'));

		$this->db->select('*')
			->from('v_g_employee_pph23')
			->where('COMPANY_ID', trim($this->input->get('cid')))
			->where('PPH23_ID', trim($this->input->get('pid')));


		// $data['employees'] 	= $this->cms->getGeneralData('v_g_employee_pph23', 'COMPANY_ID', trim($this->input->get('cid')));
		$data['employees'] 	= $this->db->get();
		$data['counter']	= 1;
		$data['payment']    = $this->cms->getSingularData('g_payment', 'PPH_ID', $this->input->get('pid'));
		$data['statuspph23']= $this->cms->cekstatuspph23($this->input->get('pid')); 

		$this->load->view('cms/hitung_pajak/pph23_bulan_summary', $data);
	}

	public function pph_23_bulan_approve()
	{
		$pid=$this->input->get('pid');
		$cid=$this->input->get('cid');
		$yid=$this->input->get('yid');

		$statusApprove = array(
			'STATUS'  => 'WAITING FOR APPROVAL'
		);

		$this->cms->updateGeneralData('g_pph23', $statusApprove, 'PPH23_ID', $this->input->get('pid'));
		$this->cms->updateGeneralData('g_employee_income', $statusApprove, 'PPH_ID', $this->input->get('pid'));

		redirect('PPH/Pph23/pph_23_bulan?cid='.$cid.'&pid='.$yid.'');		
	}

	public function generateXLSFile()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee_pph23', 'PPH23_ID', $pphID);
		

		$fileName = 'FORMAT_PPH23_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.xlsx';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A1:AI2')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH23 Form')
			->setSubject('MSM Consulting PPH23 Form');

		$sheet->getStyle('A1:G2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');

		$sheet->getStyle('H1:H2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000000');

		$sheet->getStyle('I1:AA2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('FF8C00'); 

		$sheet->getStyle('AB1:AI2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('B12345'); 		

		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH23');

		$sheet->setCellValue('A1', 'No');
		$sheet->mergeCells('A1:A2');
		$sheet->getStyle('A1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('B1', 'ID Lawan Transaksi');
		$sheet->mergeCells('B1:B2');
		$sheet->getStyle('B1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('C1', 'Nama Lawan Transaksi');
		$sheet->mergeCells('C1:C2');
		$sheet->getStyle('C1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('D1', "NPWP Lawan Transaksi");
		$sheet->mergeCells('D1:D2');
		$sheet->getStyle('D1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('E1', "NIK Lawan Transaksi (Jika tidak memiliki NPWP)");
		$sheet->mergeCells('E1:E2');
		$sheet->getStyle('E1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('F1', "Alamat (Kabupaten/Kota)");
		$sheet->mergeCells('F1:F2');
		$sheet->getStyle('F1:F2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('G1', "Alamat (Provinsi)");
		$sheet->mergeCells('G1:G2');
		$sheet->getStyle('G1:G2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('H1', "Jenis Pajak");
		$sheet->mergeCells('H1:H2');
		$sheet->getStyle('H1:H2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('I1', 'TIN (dengan format/tanda baca)'); 
		$sheet->mergeCells('I1:I2');
		$sheet->getStyle('I1:I2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('J1', "Tanggal Lahir WP Terpotong");
		$sheet->mergeCells('J1:J2');
		$sheet->getStyle('J1:J2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('K1', "Alamat WP Terpotong");
		$sheet->mergeCells('K1:K2');
		$sheet->getStyle('K1:K2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('L1', "No Paspor WP Terpotong");
		$sheet->mergeCells('L1:L2');
		$sheet->getStyle('L1:L2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('M1', "No Kitas WP Terpotong");
		$sheet->mergeCells('M1:M2');
		$sheet->getStyle('M1:M2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('N1', "Kode Negara");
		$sheet->mergeCells('N1:N2');
		$sheet->getStyle('N1:N2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('O1', "Penggunaan perkiraan penghasilan Netto");
		$sheet->mergeCells('O1:O2');
		$sheet->getStyle('O1:O2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('P1', "Perkiraan Hasil Neto (%)");
		$sheet->mergeCells('P1:P2');
		$sheet->getStyle('P1:P2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('Q1', "Memilik Surat Keterangan Domisili");
		$sheet->mergeCells('Q1:Q2');
		$sheet->getStyle('Q1:Q2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('R1', "Ada P3B");
		$sheet->mergeCells('R1:R2');
		$sheet->getStyle('R1:R2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('S1', "Tarif P3B");
		$sheet->mergeCells('S1:S2');
		$sheet->getStyle('S1:S2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('T1', "Jenis Dokumen");
		$sheet->mergeCells('T1:T2');
		$sheet->getStyle('T1:T2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('U1', "Tanggal Dokumen");
		$sheet->mergeCells('U1:U2');
		$sheet->getStyle('U1:U2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('V1', "Keteranggan Transaksi");
		$sheet->mergeCells('V1:V2');
		$sheet->getStyle('V1:V2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('W1', "Tanggal Invoice");
		$sheet->mergeCells('W1:W2');
		$sheet->getStyle('W1:W2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('X1', "Nomor Invoice");
		$sheet->mergeCells('X1:X2');
		$sheet->getStyle('X1:X2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('Y1', "Tanggal Pembayaran");
		$sheet->mergeCells('Y1:Y2');
		$sheet->getStyle('Y1:Y2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('Z1', "Penghasilan Bruto");
		$sheet->mergeCells('Z1:Z2');
		$sheet->getStyle('Z1:Z2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AA1', "Kode Objek Pajak");
		$sheet->mergeCells('AA1:AA2');
		$sheet->getStyle('AA1:AA2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AB1', "Nomor Telpon");
		$sheet->mergeCells('AB1:AB2');
		$sheet->getStyle('AB1:AB2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AC1', "Penanda Tangan BP Pengurus (Y/N)");
		$sheet->mergeCells('AC1:AC2');
		$sheet->getStyle('AC1:AC2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AD1', "Mendapatkan Fasilitas (N/SKD/DTP)");
		$sheet->mergeCells('AD1:AD2');
		$sheet->getStyle('AD1:AD2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AE1', "Nomor SKB (23)");
		$sheet->mergeCells('AE1:AE2');
		$sheet->getStyle('AE1:AE2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AF1', "Nomor SKD (26)");
		$sheet->mergeCells('AF1:AF2');
		$sheet->getStyle('AF1:AF2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AG1', "Tarif SKD");
		$sheet->mergeCells('AG1:AG2');
		$sheet->getStyle('AG1:AG2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AH1', "Nomor Aturan DTP");
		$sheet->mergeCells('AH1:AH2');
		$sheet->getStyle('AH1:AH2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('AI1', "NTPN DTP");
		$sheet->mergeCells('AI1:AI2');
		$sheet->getStyle('AI1:AI2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		foreach (range('B', 'AI') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		} 

		// Isi Excel pake data
		if ($employeeData->num_rows() != 0) {

			$colCounter = 3;
			$numCounter = 1;

			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularDataDetail('v_g_employee_pph23', 'PPH23_ID', 'COMPANY_ID',$pphID,$companyID);
				
				// Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthName($pphData->row()->PERIOD_MONTH); 

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $employee->TRANSACTION23_ID);
				$sheet->setCellValue('C' . $colCounter, $employee->TRANSACTION23_NAME);
				$sheet->setCellValue('D' . $colCounter, $employee->TRANSACTION23_NPWP);
				$sheet->setCellValue('E' . $colCounter, $employee->TRANSACTION23_NIK);
				$sheet->setCellValue('F' . $colCounter, $employee->TRANSACTION23_CITY);
				$sheet->setCellValue('G' . $colCounter, $employee->TRANSACTION23_PROVINCE);
				$sheet->setCellValue('H' . $colCounter, $employee->JENIS_PAJAK);
				$sheet->setCellValue('I' . $colCounter, $employee->TIN);
				$sheet->setCellValue('J' . $colCounter, $employee->TANGGAL_WP_TERPOTONG);
				$sheet->setCellValue('K' . $colCounter, $employee->ALAMAT_WP_TERPOTONG);
				$sheet->setCellValue('L' . $colCounter, $employee->PASPOR_WP_TERPOTONG);
				$sheet->setCellValue('M' . $colCounter, $employee->NOKITAS_WP_TERPOTONG);
				$sheet->setCellValue('N' . $colCounter, $employee->COUNTRY_CODE);
				$sheet->setCellValue('O' . $colCounter, $employee->PERKIRAAN_HASIL_NETO);
				$sheet->setCellValue('P' . $colCounter, $employee->PRESENTASE_PERKIRAAN_HASIL_NETO);
				$sheet->setCellValue('Q' . $colCounter, $employee->SURAT_KETERANGAN_DOMISILI);
				$sheet->setCellValue('R' . $colCounter, $employee->P3B); 
				$sheet->setCellValue('S' . $colCounter, $employee->TARIF_P3B);
				$sheet->setCellValue('T' . $colCounter, $employee->NAMA_JENIS_DOKUMEN); 
				$sheet->setCellValue('U' . $colCounter, $employee->TANGGAL_DOKUMEN);
				$sheet->setCellValue('V' . $colCounter, $employee->KETERANGAN_TRANSAKSI);
				$sheet->setCellValue('W' . $colCounter, $employee->TANGGAL_INVOICE); 
				$sheet->setCellValue('X' . $colCounter, $employee->NO_INVOICE); 
				$sheet->setCellValue('Y' . $colCounter, $employee->TANGGAL_PEMBAYARAN);
				$sheet->setCellValue('Z' . $colCounter, $employee->PENGHASILAN_BRUTO);
				$sheet->setCellValue('AA' . $colCounter, $employee->KODE_OBJEK_PAJAK);  
				$sheet->setCellValue('AB' . $colCounter, $employee->NO_TELPON);  
				$sheet->setCellValue('AC' . $colCounter, $employee->PENANDA_TANGAN_BP);  
				$sheet->setCellValue('AD' . $colCounter, $employee->FASILITAS);  
				$sheet->setCellValue('AE' . $colCounter, $employee->NO_SKB23);  
				$sheet->setCellValue('AF' . $colCounter, $employee->NO_SKD26);  
				$sheet->setCellValue('AG' . $colCounter, $employee->TARIF_SKD);  
				$sheet->setCellValue('AH' . $colCounter, $employee->NO_ATURAN_DTP);  
				$sheet->setCellValue('AI' . $colCounter, $employee->NTPN_DTP);  

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

	public function generateXLSFileLaporPajak23()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularDataDetail('v_g_employee_pph23', 'PPH23_ID', 'JENIS_PAJAK', $pphID, '23');

		$sql_pembetulan = $this->cms->count_pembetulan23($pphID); 
		

		// PPH 23
		$fileName = 'LAPOR_PAJAK_PPH23_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.csv';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A2:O2')
			->getFont()->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH23 Lapor Pajak')
			->setSubject('MSM Consulting PPH23 Lapor Pajak');

		$sheet->getStyle('A2:O2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');
  
		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH23');

		$sheet->setCellValue('A2', "No");
		$sheet->mergeCells('A2:A2');
		$sheet->getStyle('A2:A2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('B2', "Masa Pajak");
		$sheet->mergeCells('B2:B2');
		$sheet->getStyle('B1:B1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('C2', "Tahun Pajak");
		$sheet->mergeCells('C2:C2');
		$sheet->getStyle('C2:C2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('D2', "Tanggal Pemotongan \n (dd/MM/YY)");
		$sheet->mergeCells('D2:D2');
		$sheet->getStyle('D2:D2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('E2', "Ber-NPWP (Y/N)");
		$sheet->mergeCells('E2:E2');
		$sheet->getStyle('E2:E2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('F2', "NPWP (tanpa format/tanda baca)");
		$sheet->mergeCells('F2:F2');
		$sheet->getStyle('F2:F2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('G2', "NIK (tanpa format/tanda baca)");
		$sheet->mergeCells('G2:G2');
		$sheet->getStyle('G2:G2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('H2', "Nomor Telp");
		$sheet->mergeCells('H2:H2');
		$sheet->getStyle('H2:H2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('I2', "Kode Objek Pajak");
		$sheet->mergeCells('I2:I2');
		$sheet->getStyle('I2:I2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('J2', "Penanda Tangan BP \nPengurus (Y/N)");
		$sheet->mergeCells('J2:J2');
		$sheet->getStyle('J2:J2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('K2', "Penghasil Bruto");
		$sheet->mergeCells('K2:K2');
		$sheet->getStyle('K2:K2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('L2', "Mendapatkan Fasilitas (N/SKD/SKB)");
		$sheet->mergeCells('L2:L2');
		$sheet->getStyle('L2:L2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('M2', "Nomor SKB");
		$sheet->mergeCells('M2:M2');
		$sheet->getStyle('M2:M2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('N2', "Nomor Aturan DTP");
		$sheet->mergeCells('N2:N2');
		$sheet->getStyle('N2:N2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('O2', "NTPN/DTP");
		$sheet->mergeCells('O2:O2');
		$sheet->getStyle('O2:O2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		foreach (range('B', 'O') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		} 

		if ($employeeData->num_rows() != 0) {

			$colCounter = 3;
			$numCounter = 1;

			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularData('v_g_employee_pph23', 'PPH23_ID', $pphID);
				
				// Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthNameLP($pphData->row()->PERIOD_MONTH);

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $monthName);
				$sheet->setCellValue('C' . $colCounter, $employee->PERIOD_YEAR); 
				$sheet->setCellValue('D' . $colCounter, $employee->TANGGAL_WP_TERPOTONG); 
				$sheet->setCellValue('E' . $colCounter, $employee->TRANSACTION23_NPWP == null ? 'N' : 'Y'); 
				$sheet->setCellValue('F' . $colCounter, str_replace('.','',str_replace('-', '',$employee->TRANSACTION23_NPWP))); 
				$sheet->setCellValue('G' . $colCounter, str_replace('.','',str_replace('-', '',$employee->TRANSACTION23_NIK))); 
				$sheet->setCellValue('H' . $colCounter, $employee->NO_TELPON); 
				$sheet->setCellValue('I' . $colCounter, $employee->KODE_OBJEK_PAJAK); 
				$sheet->setCellValue('J' . $colCounter, $employee->PENANDA_TANGAN_BP); 
				$sheet->setCellValue('K' . $colCounter, $employee->PENGHASILAN_BRUTO); 
				$sheet->setCellValue('L' . $colCounter, $employee->FASILITAS); 
				$sheet->setCellValue('M' . $colCounter, $employee->NO_SKB23); 
				$sheet->setCellValue('N' . $colCounter, $employee->NO_ATURAN_DTP); 
				$sheet->setCellValue('O' . $colCounter, $employee->NTPN_DTP); 

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

	public function generateXLSFileLaporPajak26()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularDataDetail('v_g_employee_pph23', 'PPH23_ID', 'JENIS_PAJAK', $pphID, '26');

		$sql_pembetulan = $this->cms->count_pembetulan23($pphID); 
		

		// PPH 23
		$fileName = 'LAPOR_PAJAK_PPH26_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.csv';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A2:T2')
			->getFont()->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH23 Lapor Pajak')
			->setSubject('MSM Consulting PPH23 Lapor Pajak');

		$sheet->getStyle('A2:T2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');
  
		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH23');

		$sheet->setCellValue('A2', "No");
		$sheet->mergeCells('A2:A2');
		$sheet->getStyle('A2:A2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('B2', "Masa Pajak");
		$sheet->mergeCells('B2:B2');
		$sheet->getStyle('B1:B1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('C2', "Tahun Pajak");
		$sheet->mergeCells('C2:C2');
		$sheet->getStyle('C2:C2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('D2', "Tanggal Pemotongan \n (dd/MM/YY)");
		$sheet->mergeCells('D2:D2');
		$sheet->getStyle('D2:D2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('E2', "TIN (dengan format/tanda baca)");
		$sheet->mergeCells('E2:E2');
		$sheet->getStyle('E2:E2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('F2', "Nama WP Terpotong");
		$sheet->mergeCells('F2:F2');
		$sheet->getStyle('F2:F2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('G2', "Tanggal Lahir WP Terpotong");
		$sheet->mergeCells('G2:G2');
		$sheet->getStyle('G2:G2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('H2', "Alamat WP Terpotong");
		$sheet->mergeCells('H2:H2');
		$sheet->getStyle('H2:H2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('I2', "No Paspor WP Terpotong");
		$sheet->mergeCells('I2:I2');
		$sheet->getStyle('I2:I2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('J2', "No Kitas WP Terpotong");
		$sheet->mergeCells('J2:J2');
		$sheet->getStyle('J2:J2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('K2', "Kode Negara");
		$sheet->mergeCells('K2:K2');
		$sheet->getStyle('K2:K2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('L2', "Kode Objek Pajak");
		$sheet->mergeCells('L2:L2');
		$sheet->getStyle('L2:L2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('M2', "Penanda Tangan BP Pengurus (Y/N)");
		$sheet->mergeCells('M2:M2');
		$sheet->getStyle('M2:M2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('N2', "Penghasilan Bruto");
		$sheet->mergeCells('N2:N2');
		$sheet->getStyle('N2:N2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('O2', "Perkiraan Penghasilan Netto (%)");
		$sheet->mergeCells('O2:O2');
		$sheet->getStyle('O2:O2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('P2', "Mendapatkan Fasilitas (N/SKD/DTP)");
		$sheet->mergeCells('P2:P2');
		$sheet->getStyle('P2:P2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('Q2', "Nomor Tanda Terima SKD");
		$sheet->mergeCells('Q2:Q2');
		$sheet->getStyle('Q2:Q2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('R2', "Tarif SKD");
		$sheet->mergeCells('R2:R2');
		$sheet->getStyle('R2:R2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('S2', "Nomor Aturan DTP");
		$sheet->mergeCells('S2:S2');
		$sheet->getStyle('S2:S2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('T2', "NTPN DTP");
		$sheet->mergeCells('T2:T2');
		$sheet->getStyle('T2:T2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		foreach (range('B', 'T') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		} 

		if ($employeeData->num_rows() != 0) {

			$colCounter = 3;
			$numCounter = 1;

			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularData('v_g_employee_pph23', 'PPH23_ID', $pphID);
				
				// Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthNameLP($pphData->row()->PERIOD_MONTH);

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $monthName);
				$sheet->setCellValue('C' . $colCounter, $employee->PERIOD_YEAR); 
				$sheet->setCellValue('D' . $colCounter, $employee->TANGGAL_PEMBAYARAN); 
				$sheet->setCellValue('E' . $colCounter, $employee->TIN); 
				$sheet->setCellValue('F' . $colCounter, $employee->TRANSACTION23_NAME); 
				$sheet->setCellValue('G' . $colCounter, $employee->TANGGAL_WP_TERPOTONG); 
				$sheet->setCellValue('H' . $colCounter, $employee->ALAMAT_WP_TERPOTONG); 
				$sheet->setCellValue('I' . $colCounter, $employee->PASPOR_WP_TERPOTONG); 
				$sheet->setCellValue('J' . $colCounter, $employee->NOKITAS_WP_TERPOTONG); 
				$sheet->setCellValue('K' . $colCounter, $employee->COUNTRY_CODE); 
				$sheet->setCellValue('L' . $colCounter, $employee->KODE_OBJEK_PAJAK); 
				$sheet->setCellValue('M' . $colCounter, $employee->PENANDA_TANGAN_BP); 
				$sheet->setCellValue('N' . $colCounter, $employee->PENGHASILAN_BRUTO); 
				$sheet->setCellValue('O' . $colCounter, $employee->PERKIRAAN_HASIL_NETO); 
				$sheet->setCellValue('P' . $colCounter, $employee->FASILITAS); 
				$sheet->setCellValue('Q' . $colCounter, $employee->NO_SKD26); 
				$sheet->setCellValue('R' . $colCounter, $employee->TARIF_SKD); 
				$sheet->setCellValue('S' . $colCounter, $employee->NO_ATURAN_DTP); 
				$sheet->setCellValue('T' . $colCounter, $employee->NTPN_DTP); 

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

	public function generateXLSFileLaporPajakPemotongan()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee_pph23', 'PPH23_ID', $pphID);

		$sql_pembetulan = $this->cms->count_pembetulan23($pphID); 
		

		$fileName = 'LAPOR_PAJAK_PPH_PEMOTONGAN_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.csv';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A2:E2')
			->getFont()->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH23 Lapor Pajak')
			->setSubject('MSM Consulting PPH23 Lapor Pajak');

		$sheet->getStyle('A2:E2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');
  
		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH23');

		$sheet->setCellValue('A2', "No");
		$sheet->mergeCells('A2:A2');
		$sheet->getStyle('A2:A2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('B2', "Jenis Pajak");
		$sheet->mergeCells('B2:B2');
		$sheet->getStyle('B1:B1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('C2', "Jenis Dokumen");
		$sheet->mergeCells('C2:C2');
		$sheet->getStyle('C2:C2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('D2', "Nomor Dokumen");
		$sheet->mergeCells('D2:D2');
		$sheet->getStyle('D2:D2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('E2', "Tanggal Dokumen (dd/MM/yy)");
		$sheet->mergeCells('E2:E2');
		$sheet->getStyle('E2:E2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		foreach (range('B', 'E') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		} 

		if ($employeeData->num_rows() != 0) {

			$colCounter = 3;
			$numCounter = 1;

			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularData('v_g_employee_pph23', 'PPH23_ID', $pphID);
				
				// Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthNameLP($pphData->row()->PERIOD_MONTH);

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $employee->JENIS_PAJAK);
				$sheet->setCellValue('C' . $colCounter, $employee->NAMA_JENIS_DOKUMEN); 
				$sheet->setCellValue('D' . $colCounter, $employee->KODE_JENIS_DOKUMEN); 
				$sheet->setCellValue('E' . $colCounter, $employee->TANGGAL_DOKUMEN);  

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

	public function generateXLSFileLaporPajakRekap()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee_pph23', 'PPH23_ID', $pphID);

		$sql_pembetulan = $this->cms->count_pembetulan23($pphID); 
		

		$fileName = 'LAPOR_PAJAK_PPH_REKAP_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.csv';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('B3:B4')
			->getFont()->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH23 Lapor Pajak')
			->setSubject('MSM Consulting PPH23 Lapor Pajak');

		$sheet->getStyle('B3:B4')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');
  
		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH23');

		$sheet->setCellValue('B3', "Jumlah Bukti Potong PPH Masa Pasal 23");
		$sheet->mergeCells('B3:B3');
		$sheet->getStyle('B3:B3')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('B4', "Jumlah Bukti Potong PPH Masa Pasal 26");
		$sheet->mergeCells('B4:B4');
		$sheet->getStyle('B4:B4')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 


		foreach (range('B', 'C') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}   

		$colCounter =4;

		foreach ($employeeData->result() as $employee);
		$pphData 		= $this->cms->getSingularData('v_g_employee_pph23', 'PPH23_ID', $pphID);
		$jumlah23 		= $this->cms->rowJenisPajak23('g_pph23_detail',$pphID,'23');
		foreach($jumlah23->result() as $pph23_row);
		$jumlah26 		= $this->cms->rowJenisPajak26('g_pph23_detail',$pphID,'26');
		foreach($jumlah26->result() as $pph26_row);
		
		// Convert Tanggal sesuai format, lihat di Libraries/Incube.php
		$monthName = $this->incube->convertMonthNameLP($pphData->row()->PERIOD_MONTH);
 
		$sheet->setCellValue('C3', $pph23_row->TOTAL_BARIS23); 
		$sheet->setCellValue('C4', $pph26_row->TOTAL_BARIS26);    

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
			case (($yearlyBruto >= 47500000) && ($yearlyBruto <= 237500000)):
				// echo 'lapisan 2';
				$pphVal = ($yearlyBruto - 47500000) * (15 / 85) + 2500000;
				break;
			case (($yearlyBruto >= 237500000) && ($yearlyBruto <= 405000000)):
				// echo 'lapisan 3';
				$pphVal = ($yearlyBruto - 237500000) * (25 / 75) + 32500000;
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
		// 392357
	}

	public function importXLSLFile()
	{
		$this->output->enable_profiler(TRUE); 

		//echo $this->input->post('pphID');

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$employeeCheck = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $this->input->post('companyID'));
		$pphCheck 	   = $this->cms->getSingularData('g_pph23', 'PPH23_ID', $this->input->post('pphID'));  

		$companyPPH23 = 0;

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
 
		unset($sheet[1]);
		unset($sheet[2]);

		if (sizeof($sheet) == 0) {
			echo 'ini file kosong';
			return;
		}

		// Mengecek status pada table g_pph23, jika status belum PAID
		// Maka data lama pada g_employee_income akan dihapus terlebih dahulu, baru diinputkan data terbaru
		$processType='REVISI';
		$this->db->select('STATUS')
				 ->from('g_pph23')
				 ->where('PPH23_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 

		foreach ($status->result() as $key);

		// Jika status bukan Lapor Pajak, hapus terlebih dahulu data lama di g_employee_income
		if($key->STATUS == "ACTIVE" OR $key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING" ){
			//REVISI
			$this->cms->deleteGeneralDataDouble('g_pph23_detail', 'PPH23_ID', $this->input->post('pphID'), 'INCOME_ID', $this->input->post('incomeID'));
		} elseif ($key->STATUS == "LAPOR PAJAK" OR $key->STATUS  == "HARDCOPY" ) {
			//PEMBETULANN
			$processType='PEMBETULAN';
			$pembetulanKe = $this->cms->cekpembetulan($this->input->post('companyID'), 'Januari', '2023');
		
			foreach ($pphCheck->result() as $cekPPH23);
			$prevPPHVAL = $cekPPH23->COMPANY_PPHVAL;
			// Ubah dulu status lama jadi HISTORY
			$updateStatusPPH23 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'HISTORY'
			);
			$this->cms->updateGeneralData('g_pph23', $updateStatusPPH23, 'PPH23_ID', $this->input->post('pphID')); 
		}

		if($processType=="REVISI") {
			$pphID = $this->input->post('pphID');
		}else {
			$pphID = $this->incube->generateID(10);
			$companyData = array(
				'PPH_ID'		=> $pphID,
				'COMPANY_ID'	=> $this->input->post('companyID'),
				'PERIOD_YEAR'	=> '2023',
				'PERIOD_MONTH'	=> 'Januari',
				'CREATED'		=> date('Y-m-d h:i:s'),
				'STATUS'		=> 'RE PROGRESS',
			);

			$queryInsert = $this->cms->insertGeneralData('g_pph23', $companyData);
			//EoL 1
			
		}


		foreach ($sheet as $sheetData) {

			$incomeID   = $this->incube->generateID(10); 
			$pph_ID 	= $this->input->post('pphID'); 

			// Update data sebelumnya, sebelum di inputkan data baru 
			$updatePPH23 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph23', $updatePPH23, 'PPH23_ID', $pphID); 

			// --------------------------------------------------------- CEK NO DOCUMENT
				$DocumentData    = $this->cms->getSingularData('m_document', 'NAMA_JENIS_DOKUMEN', $sheetData['T']);
				foreach ($DocumentData->result() as $Document); 
				if(empty($Document)){
					$kode_document = 0; 
				} else{
					$kode_document = $Document->KODE_JENIS_DOKUMEN; 
				}
			// -------------------------------------------------------------------------

			// ------------------------------------------- CEK NAMA OBJEK PAJAK DAN TARIF
				$JenisDokumenData    = $this->cms->getSingularData('m_tax_code', 'KODE_OBJEK_PAJAK', $sheetData['AA']);
				foreach ($JenisDokumenData->result() as $JenisDokumen); 
				if(empty($JenisDokumen)){
					$nama_objek_pajak  = 'NULL';
					$tarif_objek_pajak = 0.00;
				} else{
					$nama_objek_pajak  = $JenisDokumen->NAMA_OBJEK_PAJAK;
					$tarif_objek_pajak = $JenisDokumen->TARIF_OBJEK_PAJAK;
				}
			// -------------------------------------------------------------------------

			// ---------------------------------------------- HITUNG TOTAL DPP DAN PPH23
				// Total DPP
				if($sheetData['H'] == '26' AND $sheetData['O'] == 'Y'){
					$total_dpp = $sheetData['P']*$sheetData['Z'];
				} else{
					$total_dpp = $sheetData['Z'];
				}

				// Total PPH23
				if($sheetData['AD'] == 'SKD' OR $sheetData['AD'] == 'DTP'){
					$total_pph23 = 0;
				} elseif ($sheetData['H'] == '23') {
					if(empty($sheetData['D'])){
						$total_pph23 = 2 * $tarif_objek_pajak * $total_dpp;
					} else{
						$total_pph23 = $tarif_objek_pajak * $total_dpp;
					}
				} else if ($sheetData['H'] == '26'){
					$total_pph23 = $tarif_objek_pajak * $total_dpp;
				} 
				
			// ------------------------------------------------------------------------- 

			// Insert data excel ke tabel g_pph23_detail
			$employeeData = array(
				'INCOME_ID'                 		=> $incomeID,
				'COMPANY_ID'           				=> $this->input->post('companyID'),
				'PPH23_ID'							=> $pphID,  
				'TRANSACTION23_ID'					=> $sheetData['B'],
				'TRANSACTION23_NAME'				=> $sheetData['C'],
				'TRANSACTION23_NPWP'				=> $sheetData['D'],
				'TRANSACTION23_NIK'					=> $sheetData['E'],
				'TRANSACTION23_CITY'				=> $sheetData['F'],
				'TRANSACTION23_PROVINCE'			=> $sheetData['G'],
				'JENIS_PAJAK'						=> $sheetData['H'],
				'TIN'								=> $sheetData['I'],
				'TANGGAL_WP_TERPOTONG'				=> $sheetData['J'],
				'ALAMAT_WP_TERPOTONG'				=> $sheetData['K'],
				'PASPOR_WP_TERPOTONG'				=> $sheetData['L'],
				'NOKITAS_WP_TERPOTONG'				=> $sheetData['M'],
				'COUNTRY_CODE'						=> $sheetData['N'],
				'PERKIRAAN_HASIL_NETO'				=> $sheetData['O'],
				'PRESENTASE_PERKIRAAN_HASIL_NETO'	=> $sheetData['P'],
				'SURAT_KETERANGAN_DOMISILI'			=> $sheetData['Q'],
				'P3B'								=> $sheetData['R'],
				'TARIF_P3B'							=> $sheetData['S'],
				'KODE_JENIS_DOKUMEN'				=> $kode_document,
				'NAMA_JENIS_DOKUMEN'				=> $sheetData['T'],
				'TANGGAL_DOKUMEN'					=> $sheetData['U'],
				'KETERANGAN_TRANSAKSI'				=> $sheetData['V'],
				'TANGGAL_INVOICE'					=> $sheetData['W'],
				'NO_INVOICE'						=> $sheetData['X'],
				'TANGGAL_PEMBAYARAN'				=> $sheetData['Y'],
				'PENGHASILAN_BRUTO'					=> $sheetData['Z'],
				'KODE_OBJEK_PAJAK'					=> $sheetData['AA'],
				'NAMA_OBJEK_PAJAK'					=> $nama_objek_pajak,
				'TARIF_PAJAK'						=> $tarif_objek_pajak,
				'NO_TELPON'							=> $sheetData['AB'],
				'PENANDA_TANGAN_BP'					=> $sheetData['AC'],
				'FASILITAS'							=> $sheetData['AD'],
				'NO_SKB23'							=> $sheetData['AE'],
				'NO_SKD26'							=> $sheetData['AF'],
				'TARIF_SKD'							=> $sheetData['AG'],
				'NO_ATURAN_DTP'						=> $sheetData['AH'],
				'NTPN_DTP'							=> $sheetData['AI'],
				'NAMA_OBJEK_PAJAK'					=> $nama_objek_pajak,
				'TARIF_PAJAK'						=> $tarif_objek_pajak,
				'TOTAL_DPP23'						=> $total_dpp,
				'TOTAL_PPHVAL23'					=> $total_pph23, 
				'CREATED'							=> date('Y-m-d h:i:s'),
				'STATUS'							=> 'ON PROGRESS'
			);

			$this->cms->insertGeneralData('g_pph23_detail', $employeeData);

		}  

		redirect('pph_23/bulan/summary?pid=' . $pphID . '&cid=' . $this->input->post('companyID'). '&mid=' . $this->input->post('monthID'). '&yid=' . $this->input->post('yearID'));
	}

	// Waiting Approve by Customer
	public function approveCustomer()
	{
		// Update status g_pph23
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'WAITING FOR APPROVAL BY CUSTOMER'
		);
		$this->cms->updateGeneralData('g_pph23', $updateApproval, 'PPH23_ID', $this->input->get('pphID'));

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
		// Update status g_pph23
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'WAITING FOR PAYMENT'
		);
		$this->cms->updateGeneralData('g_pph23', $updateApproval, 'PPH23_ID', $this->input->get('pphID'));

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
		// Update status g_pph23
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'PAID'
		);
		$this->cms->updateGeneralData('g_pph23', $updateApproval, 'PPH23_ID', $this->input->get('pphID'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'PAID'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pphID'));

		// Cek sudah pernah melakukan pembayaran atau belum
		$this->db->select('PAID_PPH23')
				 ->from('g_payment')
				 ->where('PPH_ID', $this->input->post('pphID'));

		$cekstatuspayment = $this->db->get(); 

		foreach ($cekstatuspayment->result() as $statuspayment);

		// if(null($statuspayment)){
		// 	// Insert Payment
		// 	$insertPayment = array(
		// 		'PPH_ID'		=> $this->input->get('pphID'),
		// 		'COMPANY_ID' 	=> $this->input->get('cid'), 
		// 		'TOTAL_PPH23'	=> ,
		// 		'PAID_PPH23'	=> ,
		// 		'OWED_PPH23'	=> ,
		// 		'CREATED'		=> date('Y-m-d H:i:s')
		// 	);
		// 	$queryInsertPay = $this->cms->insertGeneralData('s_log', $insertLog);	
		// } else{
		// 	$updatePayment = array(
		// 		'TOTAL_PPH23'	=> ,
		// 		'PAID_PPH23'	=> ,
		// 		'OWED_PPH23'	=> ,
		// 		'UPDATED'		=> date('Y-m-d H:i:s')
		// 	);
		// 	$this->cms->updateGeneralData('g_pph23', $updateApproval, 'PPH_ID', $this->input->get('pphID'));
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
		// Update status g_pph23
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'TAX FILING'
		);
		$this->cms->updateGeneralData('g_pph23', $updateApproval, 'PPH23_ID', $this->input->get('pphID'));

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
		// Update status g_pph23
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'HARDCOPY'
		);
		$this->cms->updateGeneralData('g_pph23', $updateApproval, 'PPH23_ID', $this->input->get('pphID'));

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
		// Update status g_pph23
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'LAPOR PAJAK'
		);
		$this->cms->updateGeneralData('g_pph23', $updateApproval, 'PPH23_ID', $this->input->get('pid'));

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

		redirect('pph_23/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid'). '&mid=' . $this->input->get('mid'). '&yid=' . $this->input->get('yid'));
	}

	// Closed
	public function Closed()
	{
		// Update status g_pph23
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'CLOSED'
		);
		$this->cms->updateGeneralData('g_pph23', $updateApproval, 'PPH23_ID', $this->input->get('pphID'));

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
		$pphData 		= $this->cms->getSingularData('g_pph23', 'PPH23_ID', $pphID);

		$phpExcel->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
		$phpExcel->getActiveSheet()->setShowGridlines(false);
		$phpExcel->getActiveSheet()->getSheetView()->setZoomScale(85);
		$phpExcel->setActiveSheetIndex(0)->setTitle('Info PPh 23');
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
		$phpExcel->getActiveSheet()->setCellValue('B9', 'Perihal : INFO PPh 23 TERUTANG MASA ' . strtoupper($pphData->row()->PERIOD_MONTH) . ' TAHUN PAJAK ' . $pphData->row()->PERIOD_YEAR . '  YANG HARUS DISETOR');
		$phpExcel->getActiveSheet()->setCellValue('B11', "'1.");
		$phpExcel->getActiveSheet()->getStyle('B11')->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

		$phpExcel->getActiveSheet()->mergeCells('C11:H11');
		$phpExcel->getActiveSheet()->setCellValue('C11', 'Perhitungan PPh 23 - Pegawai Tetap');

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
		$phpExcel->getActiveSheet()->setCellValue('E13', 'PPh 23 TERUTANG');

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
		$phpExcel->getActiveSheet()->setCellValue('G13', 'PPh 23 KURANG BAYAR');

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
		$phpExcel->getActiveSheet()->setCellValue('H15', '411123-100');


		$phpExcel->getActiveSheet()->mergeCells('C20:K20');
		$phpExcel->getActiveSheet()->setCellValue('C20', '>> Jadi PPh yang harus di bayar Masa ' . $pphData->row()->PERIOD_MONTH . ' Tahun Pajak ' . $pphData->row()->PERIOD_YEAR . ' adalah sebagai berikut  Rp. ' . number_format($pphData->row()->COMPANY_KBLB));

		$phpExcel->getActiveSheet()->mergeCells('C23:K23');
		$phpExcel->getActiveSheet()->setCellValue('C23', '>> Mohon disetorkan paling lambat tanggal 10 ' . $pphData->row()->PERIOD_MONTH . ' ' . $pphData->row()->PERIOD_YEAR);

		$phpExcel->getActiveSheet()->mergeCells('C22:K22');
		$phpExcel->getActiveSheet()->setCellValue('C22', '>> Jika sudah disetorkan mohon diupload NTPN-nya');

		$phpExcel->getActiveSheet()->mergeCells('C24:K24');
		$phpExcel->getActiveSheet()->setCellValue('C24', 'Terima Kasih');

		$phpExcel->getActiveSheet()->mergeCells('C27:K27');
		$phpExcel->getActiveSheet()->setCellValue('C27', 'Regards,');

		$phpExcel->getActiveSheet()->mergeCells('C28:K28');
		$phpExcel->getActiveSheet()->setCellValue('C28', 'Team MSM');

		$phpExcel->getActiveSheet()->mergeCells('C29:K29');
		$phpExcel->getActiveSheet()->setCellValue('C29', 'Ph : +6223 63858603/04');

		foreach (range('C', 'Z') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}

		$phpExcel->getActiveSheet()->setSelectedCell('A1');
		$_objWriter = new Xlsx($phpExcel);
		$_varFLENME = 'REPORT_PPh23_' . date('Ymd') . '_' . $companyData->row()->COMPANY_NAME . '.xlsx';
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
			->from('g_pph23')
			->where('COMPANY_ID', $this->input->post('companyID'))
			->where('PERIOD_YEAR', $this->input->post('addPeriodeTahun'))
			->where('PERIOD_MONTH', $this->input->post('addPeriodeBulan'));

		$queryGet = $this->db->get();

		// echo $this->input->post('addPeriodeTahun');

		$companyData = array(
			'PPH23_ID'		=> $this->incube->generateID(10),
			'COMPANY_ID'	=> $this->input->post('companyID'),
			'PERIOD_YEAR'	=> $this->input->post('addPeriodeTahun'),
			'PERIOD_MONTH'	=> $this->input->post('addPeriodeBulan'),
			'CREATED'		=> date('Y-m-d h:i:s'),
			'STATUS'		=> ($queryGet->num_rows() > 0 ? 'HISTORY' : 'ACTIVE'),
		);

		$queryInsert = $this->cms->insertGeneralData('g_pph23', $companyData);
		//EoL 1

		if (!$queryInsert) {
			$this->session->set_flashdata('query', 'invalid');
		} else {
			$this->session->set_flashdata('query', 'success');
		}

		redirect(($this->input->post('pphFlag') == true ? base_url('pph_23/bulan?cid=' . $this->input->post('companyID')) : base_url('pph_23')));
	} 

	public function pph_23_tahun()
	{
		$this->load->view('cms/hitung_pajak/pph23_tahun');
	}

	public function pph_23_bulan_summary_karyawan()
	{
		$this->db->select('*')
			->from('v_g_employee_pph23')
			->where('EMPLOYEE_ID', trim($this->input->get('eid')))
			->where('PPH23_ID', trim($this->input->get('pid')));


		$data['employee'] 	= $this->db->get();

		if ($data['employee']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_23/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')));
		}

		$this->load->view('cms/hitung_pajak/pph23_bulan_summary_karyawan', $data);
	}

	public function add_transaksi()
	{
		$data['NamaTransaksi']	= $this->cms->getGeneralList('g_transaction_profile23');
		$data['NamaNegara']		= $this->cms->getGeneralList('m_country');
		$data['JenisDokumen']	= $this->cms->getSingularData('m_document','STATUS','ACTIVE');
		$data['KodeObjek']		= $this->cms->getGeneralList('m_tax_code');
		$data['ProductType']	= $this->cms->getSingularData('m_rates','CATEGORY','EXPENSIVE');
		$this->load->view('cms/hitung_pajak/add_pph23_bulan_summary_transaksi',$data);
	} 

	public function edit_pph_23_bulan_summary_karyawan()
	{
		$this->db->select('*')
			->from('v_g_employee_pph23')
			->where('INCOME_ID', trim($this->input->get('eid')))
			->where('PPH23_ID', trim($this->input->get('pid')));


		$data['employee'] 		= $this->db->get();
		$data['NamaNegara']		= $this->cms->getGeneralList('m_country');
		$data['KodeObjek']		= $this->cms->getGeneralList('m_tax_code');
		$data['JenisDokumen']	= $this->cms->getSingularData('m_document','STATUS','ACTIVE');

		if ($data['employee']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_23/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')));
		}

		$this->load->view('cms/hitung_pajak/edit_pph23_bulan_summary_karyawan', $data);
	}

	public function update_pph_23_bulan_summary_karyawan()
	{
		// $this->output->enable_profiler(TRUE);  

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID')); 
		$pphCheck 	   = $this->cms->getSingularData('g_pph23', 'PPH23_ID', $this->input->post('pphID'));

		// Generate baru ID Income
		$incomeID     = $this->incube->generateID(10); 
		
		// ------------------------------------------------- GET VALUE FROM FORM EDIT 
		$pphID      = $this->input->post('pphID');
		$nama 	 	= $this->input->post('editNama');  
		$npwp 	 	= $this->input->post('editNPWP');  
		$nik 	 	= $this->input->post('editNIK');  
		$kota 	 	= $this->input->post('editKota');  
		$profinsi 	= $this->input->post('editProfinsi');  
		$jenis 	 	= $this->input->post('editJenis');  
		$negara	 	= $this->input->post('editNegara');  
		$tin	 	= $this->input->post('editTIN');  
		$tanggal 	= $this->input->post('editTanggal');  
		$alamat 	= $this->input->post('editAlamat');  
		$kitas 		= $this->input->post('editKitas');  
		$paspor 	= $this->input->post('editPaspor');  

		$netto  	= $this->input->post('editNetto');  
		$perkiraan 	= $this->input->post('editPerkiraan');  
		$domisili 	= $this->input->post('editDomisili');  
		$p3b 		= $this->input->post('editP3B');  
		$tarif 		= $this->input->post('editTarif');  
		$dokumen	= $this->input->post('editDokumen');  
		$tglDok 	= $this->input->post('editTglDokumen');  
		$transaksi 	= $this->input->post('editKeterangan');  
		$tglInvoice	= $this->input->post('editTglInvoice');  
		$noInvoice	= $this->input->post('editNoInvoice');  
		$tglBayar	= $this->input->post('editTglPembayaran');

		$bruto		= $this->input->post('editBruto');  
		$objek		= $this->input->post('editObjek');  
		$telpon		= $this->input->post('editTelpon');  
		$pengurus	= $this->input->post('editBPPPengurus');  
		$fasilitas	= $this->input->post('editFasilitas');  
		$skb 		= $this->input->post('editSKB');  
		$skd 		= $this->input->post('editSKD');  
		$tarifskd	= $this->input->post('editTarifSKD');  
		$aturan 	= $this->input->post('editAturan');  
		$ntpndtp	= $this->input->post('editNTPNDTP');  
		// -------------------------------------------------------------------------

		// -------------------------------------------------- CEK ID LAWAN TRANSAKSI
			$DocumentData    = $this->cms->getSingularData('g_transaction_profile23', 'TRANSACTION23_NAME', $nama);
			foreach ($DocumentData->result() as $Transaksi);  
			$id = $Transaksi->TRANSACTION23_ID;  
		// -------------------------------------------------------------------------

		// --------------------------------------------------------- CEK NO DOCUMENT
			$DocumentData    = $this->cms->getSingularData('m_document', 'NAMA_JENIS_DOKUMEN', $dokumen);
			foreach ($DocumentData->result() as $Document); 
			if(empty($Document)){
				$kode_document = 0; 
			} else{
				$kode_document = $Document->KODE_JENIS_DOKUMEN; 
			}
		// -------------------------------------------------------------------------

		// ------------------------------------------- CEK NAMA OBJEK PAJAK DAN TARIF
			$JenisDokumenData    = $this->cms->getSingularData('m_tax_code', 'KODE_OBJEK_PAJAK', $objek);
			foreach ($JenisDokumenData->result() as $JenisDokumen); 
			if(empty($JenisDokumen)){
				$nama_objek_pajak  = 'NULL';
				$tarif_objek_pajak = 0.00;
			} else{
				$nama_objek_pajak  = $JenisDokumen->NAMA_OBJEK_PAJAK;
				$tarif_objek_pajak = $JenisDokumen->TARIF_OBJEK_PAJAK;
			}
		// -------------------------------------------------------------------------

		// ---------------------------------------------- HITUNG TOTAL DPP DAN PPH23
			// Total DPP
			if($jenis == '26' AND $netto == 'Y'){
				$total_dpp = $perkiraan * $bruto;
			} else{
				$total_dpp = $bruto;
			} 

			// Total PPH23
			if($fasilitas == 'SKD' OR $fasilitas == 'DTP'){
				$total_pph23 = 0;
			} elseif ($jenis == '23') {
				if(empty($npwp)){
					$total_pph23 = 2 * $tarif_objek_pajak * $total_dpp;
				} else{
					$total_pph23 = $tarif_objek_pajak * $total_dpp;
				}
			} else if ($jenis == '26'){
				$total_pph23 = $tarif_objek_pajak * $total_dpp;
			}  
			
		// -------------------------------------------------------------------------   

		// ----------------------------------------------- CEK STATUS FROM FORM EDIT
		$this->db->select('STATUS')
				 ->from('g_pph23')
				 ->where('PPH23_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 
		foreach ($status->result() as $key); 
		// -------------------------------------------------------------------------  

		// Jika status bukan lapor pajak, hapus terlebih dahulu data lama di g_employee_income
		if($key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING"){
			
			$processType='REVISI';

			// Ngehapus data di g_employee_income berdasarkan PPH ID dan Employee ID
			$this->cms->deleteGeneralDataDouble('g_pph23_detail', 'PPH23_ID', $this->input->post('pphID'), 'INCOME_ID', $this->input->post('incomeID'));

			// Update status di g_pph23 dan g_employee_income menjadi ON PROGRESS
			$updatePPH23 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph23', $updatePPH23, 'PPH23_ID', $this->input->post('pphID')); 
		} elseif ($key->STATUS == "LAPOR PAJAK" OR $key->STATUS  == "HARDCOPY" ) {
			//PEMBETULANN
			$processType='PEMBETULAN'; 

			foreach ($pphCheck->result() as $cekPPH23);
			$monthCheck = $cekPPH23->PERIOD_MONTH;
			$yearCheck = $cekPPH23->PERIOD_YEAR;
			$prevPPHVAL = $cekPPH23->COMPANY_PPHVAL;

			$pembetulanKe = $this->cms->cekpembetulan($this->input->post('companyID'), $monthCheck, $yearCheck); 

			// Ubah dulu status lama jadi HISTORY
			$updateStatusPPH23 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'HISTORY'
			);
			$this->cms->updateGeneralData('g_pph23', $updateStatusPPH23, 'PPH23_ID', $this->input->post('pphID')); 
		}

		if($processType=="REVISI") {
			$pphID = $this->input->post('pphID');
		}else {
			// Generate PPH ID baru
			$pphID = $this->incube->generateID(10);

			// Ambil data bulan dan tahun 
			foreach ($pphCheck->result() as $cekPPH23);
			$monthCheck = $cekPPH23->PERIOD_MONTH;
			$yearCheck = $cekPPH23->PERIOD_YEAR;

			$companyData = array(
				'PPH_ID'		=> $pphID,
				'COMPANY_ID'	=> $this->input->post('companyID'),
				'PERIOD_YEAR'	=> $yearCheck,
				'PERIOD_MONTH'	=> $monthCheck,
				'CREATED'		=> date('Y-m-d h:i:s'),
				'STATUS'		=> 'ON PROGRESS'
			);

			$queryInsert = $this->cms->insertGeneralData('g_pph23', $companyData); 
			
		}

		$employeeData = array(
			'INCOME_ID'                 		=> $incomeID,
			'COMPANY_ID'           				=> $this->input->post('companyID'),
			'PPH23_ID'							=> $pphID,  
			'TRANSACTION23_ID'					=> $id,
			'TRANSACTION23_NAME'				=> $nama,
			'TRANSACTION23_NPWP'				=> $npwp,
			'TRANSACTION23_NIK'					=> $nik,
			'TRANSACTION23_CITY'				=> $kota,
			'TRANSACTION23_PROVINCE'			=> $profinsi,
			'JENIS_PAJAK'						=> $jenis,
			'TIN'								=> $tin,
			'TANGGAL_WP_TERPOTONG'				=> $tanggal,
			'ALAMAT_WP_TERPOTONG'				=> $alamat,
			'PASPOR_WP_TERPOTONG'				=> $paspor,
			'NOKITAS_WP_TERPOTONG'				=> $kitas,
			'COUNTRY_CODE'						=> $negara,
			'PERKIRAAN_HASIL_NETO'				=> $netto,
			'PRESENTASE_PERKIRAAN_HASIL_NETO'	=> $perkiraan,
			'SURAT_KETERANGAN_DOMISILI'			=> $domisili,
			'P3B'								=> $p3b,
			'TARIF_P3B'							=> $tarif,
			'KODE_JENIS_DOKUMEN'				=> $kode_document,
			'NAMA_JENIS_DOKUMEN'				=> $dokumen,
			'TANGGAL_DOKUMEN'					=> $tglDok,
			'KETERANGAN_TRANSAKSI'				=> $transaksi,
			'TANGGAL_INVOICE'					=> $tglInvoice,
			'NO_INVOICE'						=> $noInvoice,
			'TANGGAL_PEMBAYARAN'				=> $tglBayar,
			'PENGHASILAN_BRUTO'					=> $bruto,
			'KODE_OBJEK_PAJAK'					=> $objek,
			'NAMA_OBJEK_PAJAK'					=> $nama_objek_pajak,
			'TARIF_PAJAK'						=> $tarif_objek_pajak,
			'NO_TELPON'							=> $telpon,
			'PENANDA_TANGAN_BP'					=> $pengurus,
			'FASILITAS'							=> $fasilitas,
			'NO_SKB23'							=> $skb,
			'NO_SKD26'							=> $skd,
			'TARIF_SKD'							=> $tarifskd,
			'NO_ATURAN_DTP'						=> $aturan,
			'NTPN_DTP'							=> $ntpndtp,
			'NAMA_OBJEK_PAJAK'					=> $nama_objek_pajak,
			'TARIF_PAJAK'						=> $tarif_objek_pajak,
			'TOTAL_DPP23'						=> $total_dpp,
			'TOTAL_PPHVAL23'					=> $total_pph23, 
			'CREATED'							=> date('Y-m-d h:i:s'),
			'STATUS'							=> 'ON PROGRESS'
		);

		$this->cms->insertGeneralData('g_pph23_detail', $employeeData);


		if($processType=="PEMBETULAN") {
			$this->cms->getCountDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('incomeID')); 

			$employeeNoEditData = $this->cms->getDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('incomeID'));
			foreach ($employeeNoEditData->result() as $employeeNoEdit) {
				$incomeID     = $this->incube->generateID(10);
				$databaru = array(
					'INCOME_ID'                 		=> $incomeID,
					'COMPANY_ID'           				=> $this->input->post('companyID'),
					'PPH23_ID'							=> $pphID,  
					'TRANSACTION23_ID'					=> $id,
					'TRANSACTION23_NAME'				=> $nama,
					'TRANSACTION23_NPWP'				=> $npwp,
					'TRANSACTION23_NIK'					=> $nik,
					'TRANSACTION23_CITY'				=> $city,
					'TRANSACTION23_PROVINCE'			=> $province,
					'JENIS_PAJAK'						=> $jenis,
					'TIN'								=> $tin,
					'TANGGAL_WP_TERPOTONG'				=> $tanggal,
					'ALAMAT_WP_TERPOTONG'				=> $alamat,
					'PASPOR_WP_TERPOTONG'				=> $paspor,
					'NOKITAS_WP_TERPOTONG'				=> $kitas,
					'COUNTRY_CODE'						=> $negara,
					'PERKIRAAN_HASIL_NETO'				=> $netto,
					'PRESENTASE_PERKIRAAN_HASIL_NETO'	=> $perkiraan,
					'SURAT_KETERANGAN_DOMISILI'			=> $domisili,
					'P3B'								=> $p3b,
					'TARIF_P3B'							=> $tarif,
					'KODE_JENIS_DOKUMEN'				=> $kode_document,
					'NAMA_JENIS_DOKUMEN'				=> $dokumen,
					'TANGGAL_DOKUMEN'					=> $tglDok,
					'KETERANGAN_TRANSAKSI'				=> $transaksi,
					'TANGGAL_INVOICE'					=> $tglInvoice,
					'NO_INVOICE'						=> $noInvoice,
					'TANGGAL_PEMBAYARAN'				=> $tglBayar,
					'PENGHASILAN_BRUTO'					=> $bruto,
					'KODE_OBJEK_PAJAK'					=> $objek,
					'NAMA_OBJEK_PAJAK'					=> $nama_objek_pajak,
					'TARIF_PAJAK'						=> $tarif_objek_pajak,
					'NO_TELPON'							=> $telpon,
					'PENANDA_TANGAN_BP'					=> $pengurus,
					'FASILITAS'							=> $fasilitas,
					'NO_SKB23'							=> $skb,
					'NO_SKD26'							=> $skd,
					'TARIF_SKD'							=> $tarifskd,
					'NO_ATURAN_DTP'						=> $aturan,
					'NTPN_DTP'							=> $ntpndtp,
					'NAMA_OBJEK_PAJAK'					=> $nama_objek_pajak,
					'TARIF_PAJAK'						=> $tarif_objek_pajak,
					'TOTAL_DPP23'						=> $total_dpp,
					'TOTAL_PPHVAL23'					=> $total_pph23, 
					'CREATED'							=> date('Y-m-d h:i:s'),
					'STATUS'							=> 'ON PROGRESS'
				);
				$this->cms->insertGeneralData('g_employee_income', $databaru);
			}

			// Update status karyawan dengan pph lama yang tidak di edit menjadi history
			foreach ($employeeNoEditData as $employeeNoEditUpdate) {
				$datalamaupdate = array(
					'STATUS'	=> 'HISTORY'
				);
				$this->cms->updateGeneralData('g_pph23', $datalamaupdate, 'PPH23_ID', $this->input->post('pphID')); 
			}
			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph23($pphID); 
		}

		if($processType == 'REVISI'){
			$pphID = $this->input->post('pphID');

			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph23($pphID); 
		}
		

		redirect('pph_23/bulan/summary?pid='. $pphID . '&cid=' . $this->input->post('companyID'). '&mid=' . $this->input->post('monthID'). '&yid=' . $this->input->post('yearID'));
	}


	public function update_g_pph23($pphid)
	{ 
		// ------------------------------------------ UPDATE COUNT ALL DPP AND PHH 22
		$all_dpp_pph23 = $this->cms->editPPH22($pphID);
		foreach ($all_dpp_pph23->result() as $all);
		$updatePPH23 = array(
			'COMPANY_PPHVAL23' 	=> $all->TOTAL_PPH23_ALL,
			'COMPANY_DPP'		=> $all->TOTAL_DPP_ALL,
			'UPDATED'			=> date('Y-m-d H:i:s'),
			'STATUS'			=> 'ON PROGRESS'
		);
		$this->cms->updateGeneralData('g_pph23', $updatePPH23, 'PPH23_ID', $pphID);
		// ------------------------------------------------------------------------- 
	}

	public function aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/pph23_aktifitas_pajak');
	}

	public function edit_aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/edit_status_aktifitas_pajak');
	}

	// ------------------------------------------------------------------------- 

	// --------------------------------------------------------------- TRANSAKSI
	public function insert_transaksi()
	{
		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$pphCheck  	   = $this->cms->getSingularData('g_pph23', 'PPH23_ID', $this->input->post('pphID'));

		// Generate baru ID Income
		$incomeID     = $this->incube->generateID(10);  

		// ------------------------------------------------- GET VALUE FROM FORM EDIT 
		// Get data ID, NPWP, NIK, City and Province from transaction_name
		$TransactionProfileData    = $this->cms->getSingularData('g_transaction_profile23', 'TRANSACTION23_NAME', $this->input->post('addNama'));
		foreach ($TransactionProfileData->result() as $ProfileData); 
		$id       = $ProfileData->TRANSACTION23_ID;
		$npwp     = $ProfileData->TRANSACTION23_NPWP;
		$nik      = $ProfileData->TRANSACTION23_NIK;
		$city     = $ProfileData->TRANSACTION23_CITY;
		$province = $ProfileData->TRANSACTION23_PROVINCE;

		$pphID      = $this->input->post('pphID');
		$nama 	 	= $this->input->post('addNama');  
		$jenis 	 	= $this->input->post('addJenis');  
		$negara	 	= $this->input->post('addNegara');  
		$tin	 	= $this->input->post('addTIN');  
		$tanggal 	= $this->input->post('addTanggal');  
		$alamat 	= $this->input->post('addAlamat');  
		$kitas 		= $this->input->post('addKitas');  
		$paspor 	= $this->input->post('addPaspor');  

		$netto  	= $this->input->post('addNetto');  
		$perkiraan 	= $this->input->post('addPerkiraan');  
		$domisili 	= $this->input->post('addDomisili');  
		$p3b 		= $this->input->post('addP3B');  
		$tarif 		= $this->input->post('addP3BTarif');  
		$dokumen	= $this->input->post('addDokumen');  
		$tglDok 	= $this->input->post('addTglDokumen');  
		$transaksi 	= $this->input->post('addKetTransaksi');  
		$tglInvoice	= $this->input->post('addTglInvoice');  
		$noInvoice	= $this->input->post('addNoInvoice');  
		$tglBayar	= $this->input->post('addTglPembayaran');

		$bruto		= $this->input->post('addBruto');  
		$objek		= $this->input->post('addObjek');  
		$telpon		= $this->input->post('addTelpon');  
		$pengurus	= $this->input->post('addBPPengurus');  
		$fasilitas	= $this->input->post('addFasilitas');  
		$skb 		= $this->input->post('addSKB');  
		$skd 		= $this->input->post('addSKD');  
		$tarifskd	= $this->input->post('addTarifSKD');  
		$aturan 	= $this->input->post('addAturan');  
		$ntpndtp	= $this->input->post('addNTPNDTP');  

		// $semen 		= str_replace(',','',$this->input->post('addSemen'));       
		// -------------------------------------------------------------------------

		// --------------------------------------------------------- CEK NO DOCUMENT
			$DocumentData    = $this->cms->getSingularData('m_document', 'NAMA_JENIS_DOKUMEN', $dokumen);
			foreach ($DocumentData->result() as $Document); 
			if(empty($Document)){
				$kode_document = 0; 
			} else{
				$kode_document = $Document->KODE_JENIS_DOKUMEN; 
			}
		// -------------------------------------------------------------------------

		// ------------------------------------------- CEK NAMA OBJEK PAJAK DAN TARIF
			$JenisDokumenData    = $this->cms->getSingularData('m_tax_code', 'KODE_OBJEK_PAJAK', $objek);
			foreach ($JenisDokumenData->result() as $JenisDokumen); 
			if(empty($JenisDokumen)){
				$nama_objek_pajak  = 'NULL';
				$tarif_objek_pajak = 0.00;
			} else{
				$nama_objek_pajak  = $JenisDokumen->NAMA_OBJEK_PAJAK;
				$tarif_objek_pajak = $JenisDokumen->TARIF_OBJEK_PAJAK;
			}
		// -------------------------------------------------------------------------

		// ---------------------------------------------- HITUNG TOTAL DPP DAN PPH23
			// Total DPP
			if($jenis == '26' AND $netto == 'Y'){
				$total_dpp = $perkiraan * $bruto;
			} else{
				$total_dpp = $bruto;
			}

			// Total PPH23
			if($fasilitas == 'SKD' OR $fasilitas == 'DTP'){
				$total_pph23 = 0;
			} elseif ($jenis == '23') {
				if(empty($npwp)){
					$total_pph23 = 2 * $tarif_objek_pajak * $total_dpp;
				} else{
					$total_pph23 = $tarif_objek_pajak * $total_dpp;
				}
			} else if ($jenis == '26'){
				$total_pph23 = $tarif_objek_pajak * $total_dpp;
			} 

			
		// ------------------------------------------------------------------------- 

		$transaksiData = array(
			'INCOME_ID'                 		=> $incomeID,
			'COMPANY_ID'           				=> $this->input->post('companyID'),
			'PPH23_ID'							=> $pphID,  
			'TRANSACTION23_ID'					=> $id,
			'TRANSACTION23_NAME'				=> $nama,
			'TRANSACTION23_NPWP'				=> $npwp,
			'TRANSACTION23_NIK'					=> $nik,
			'TRANSACTION23_CITY'				=> $city,
			'TRANSACTION23_PROVINCE'			=> $province,
			'JENIS_PAJAK'						=> $jenis,
			'TIN'								=> $tin,
			'TANGGAL_WP_TERPOTONG'				=> $tanggal,
			'ALAMAT_WP_TERPOTONG'				=> $alamat,
			'PASPOR_WP_TERPOTONG'				=> $paspor,
			'NOKITAS_WP_TERPOTONG'				=> $kitas,
			'COUNTRY_CODE'						=> $negara,
			'PERKIRAAN_HASIL_NETO'				=> $netto,
			'PRESENTASE_PERKIRAAN_HASIL_NETO'	=> $perkiraan,
			'SURAT_KETERANGAN_DOMISILI'			=> $domisili,
			'P3B'								=> $p3b,
			'TARIF_P3B'							=> $tarif,
			'KODE_JENIS_DOKUMEN'				=> $kode_document,
			'NAMA_JENIS_DOKUMEN'				=> $dokumen,
			'TANGGAL_DOKUMEN'					=> $tglDok,
			'KETERANGAN_TRANSAKSI'				=> $transaksi,
			'TANGGAL_INVOICE'					=> $tglInvoice,
			'NO_INVOICE'						=> $noInvoice,
			'TANGGAL_PEMBAYARAN'				=> $tglBayar,
			'PENGHASILAN_BRUTO'					=> $bruto,
			'KODE_OBJEK_PAJAK'					=> $objek,
			'NAMA_OBJEK_PAJAK'					=> $nama_objek_pajak,
			'TARIF_PAJAK'						=> $tarif_objek_pajak,
			'NO_TELPON'							=> $telpon,
			'PENANDA_TANGAN_BP'					=> $pengurus,
			'FASILITAS'							=> $fasilitas,
			'NO_SKB23'							=> $skb,
			'NO_SKD26'							=> $skd,
			'TARIF_SKD'							=> $tarifskd,
			'NO_ATURAN_DTP'						=> $aturan,
			'NTPN_DTP'							=> $ntpndtp,
			'NAMA_OBJEK_PAJAK'					=> $nama_objek_pajak,
			'TARIF_PAJAK'						=> $tarif_objek_pajak,
			'TOTAL_DPP23'						=> $total_dpp,
			'TOTAL_PPHVAL23'					=> $total_pph23, 
			'CREATED'							=> date('Y-m-d h:i:s'),
			'STATUS'							=> 'ON PROGRESS'
		);
		$this->cms->insertGeneralData('g_pph23_detail', $transaksiData);

		// ------------------------------------------ UPDATE COUNT ALL DPP AND PHH 22
		$all_dpp_pph23= $this->cms->editPPH23($pphID);
		foreach ($all_dpp_pph23->result() as $all);
		$updatePPH23 = array(
			'COMPANY_PPHVAL23' 	=> $all->TOTAL_PPH23_ALL,
			'COMPANY_DPP'		=> $all->TOTAL_DPP_ALL,
			'UPDATED'			=> date('Y-m-d H:i:s'),
			'STATUS'			=> 'ON PROGRESS'
		);
		$this->cms->updateGeneralData('g_pph23', $updatePPH23, 'PPH23_ID', $pphID);
		// ------------------------------------------------------------------------- 
		redirect('pph_23/bulan/summary?pid='.$this->input->post('pphID').'&cid='.$pphCheck->row()->COMPANY_ID.'&mid='.$pphCheck->row()->PERIOD_MONTH.'&yid='.$pphCheck->row()->PERIOD_YEAR);  

	} 
	// ------------------------------------------------------------------------- 

	// --------------------------------------------------------- LAWAN TRANSAKSI
	public function LawanTransaksi()
	{
		$data['data_transaksi']	= $this->cms->getGeneralList('g_transaction_profile23');
		$this->load->view('cms/hitung_pajak/lawan_transaksi23',$data); 	
	}

	public function add_lawan_transaksi()
	{
		$transactionID   = $this->general->generateID('TRANSACTION');

		$transactionData = array(
			'TRANSACTION23_ID'			=> $transactionID,
			'TRANSACTION23_NAME'		=> $this->input->post('txtNama'),
			'TRANSACTION23_NPWP'		=> $this->input->post('txtNPWP'),
			'TRANSACTION23_NIK'			=> $this->input->post('txtNIK'),
			'TRANSACTION23_CITY'		=> $this->input->post('txtCity'),
			'TRANSACTION23_PROVINCE'	=> $this->input->post('txtProvince'),
			'CREATED'					=> date('Y-m-d h:i:s'),
			'STATUS'					=> 'ACTIVE'
		); 
		$queryInsert = $this->cms->insertGeneralData('g_transaction_profile23', $transactionData);  
		redirect('pph_23/lawan_transaksi');
	}

	public function edit_lawan_transaksi()
	{
		$this->db->select('*')
			->from('g_transaction_profile23') 
			->where('TRANSACTION23_ID', $this->input->get('tid')); 

		$data['transaction'] 	= $this->db->get();

		if ($data['transaction']->num_rows() == 0) {
			redirect('pph_23/lawan_transaksi');
		}

		$this->load->view('cms/modal/edit_lawan_transaksi', $data);
	}	

	public function update_lawan_transaksi()
	{
		$transactionID   = $this->general->generateID('TRANSACTION');

		$transactionData = array(
			'TRANSACTION23_ID'		=> $transactionID,
			'TRANSACTION23_NAME'		=> $this->input->post('editNama'),
			'TRANSACTION23_NPWP'		=> $this->input->post('editNPWP'),
			'TRANSACTION23_ADDRESS'	=> $this->input->post('editAlamat'),
			'CREATED'				=> date('Y-m-d h:i:s'),
			'STATUS'				=> 'ACTIVE'
		); 
		$queryInsert = $this->cms->insertGeneralData('g_transaction_profile23', $transactionData);  
		redirect('pph_23/lawan_transaksi');
	}

	public function delete_lawan_transaksi()
	{
		$this->cms->deleteGeneralData('g_transaction_profile23', 'TRANSACTION23_ID', $this->input->get('tid'));
		redirect('pph_23/lawan_transaksi');

	}
	// ------------------------------------------------------------------------- 
}
