<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Pph42 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$this->db->select('*')
				 ->from('v_g_companies_pph42');

		$queryGet = $this->db->get(); 

		$data['companies']	= $queryGet;
		$data['counter']	= 1;

		$this->load->view('cms/hitung_pajak/pph42', $data);
	}

	public function pph_42_bulan()
	{

		//$status = "STATUS='ACTIVE' OR STATUS='APPROVED'";

		$this->db->select('*')
			->from('v_g_companies_pph42_detail')
			->where('COMPANY_ID', $this->input->get('cid'));
			// ->where('STATUS', 'APPROVED');

		$queryGet = $this->db->get();

		$cid=$this->input->get('cid');
		$yid=$this->input->get('yid');

		$data['correction'] = $this->cms->getPembetulan42($cid,$yid);

		$data['companies'] 	= $queryGet;
		$data['counter'] 	= 1;
		$data['history'] 	= 0;

		if ($data['companies']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_42'));
			return;
		}

		$this->load->view('cms/hitung_pajak/pph42_bulan', $data); 
	}

	public function pph_42_bulan_summary()
	{ 
		$cid=$this->input->get('cid');
		$mid=$this->input->get('mid');
		$yid=$this->input->get('yid');
		// $mid=$this->input->get('yid');
		$data['correction'] = $this->cms->getPembetulanSummary($cid,$mid,$yid);
		$data['summary'] 	= $this->cms->getGeneralData('v_g_companies_pph42_detail', 'PPH42_ID', $this->input->get('pid'));
		$data['Getpph42']	= $this->cms->getGeneralData('g_pph42', 'PPH42_ID', $this->input->get('pid'));

		$this->db->select('*')
			->from('v_g_employee_pph42')
			->where('COMPANY_ID', trim($this->input->get('cid')))
			->where('PPH42_ID', trim($this->input->get('pid')));


		// $data['employees'] 	= $this->cms->getGeneralData('v_g_employee_pph42', 'COMPANY_ID', trim($this->input->get('cid')));
		$data['employees'] 	= $this->db->get();
		$data['counter']	= 1;
		$data['payment']    = $this->cms->getSingularData('g_payment', 'PPH_ID', $this->input->get('pid'));
		$data['statuspph42']= $this->cms->cekstatuspph42($this->input->get('pid'));

		// if ($data['summary']->num_rows() == 0) {
		// 	$this->session->set_flashdata('query', 'invalid');
		// 	echo 'ga ada';
		// 	// redirect(base_url('pph_42/bulan?cid=' . $this->input->get('cid')));
		// } else {
		// 	$this->load->view('cms/hitung_pajak/pph42_bulan_summary');
		// }

		$this->load->view('cms/hitung_pajak/pph42_bulan_summary', $data);
	}

	public function pph_42_bulan_summary_umkm()
	{ 
		$cid=$this->input->get('cid');
		$mid=$this->input->get('mid');
		$yid=$this->input->get('yid');
		// $mid=$this->input->get('yid');
		$data['correction'] = $this->cms->getPembetulanSummary($cid,$mid,$yid);
		$data['summary'] 	= $this->cms->getGeneralData('v_g_companies_pph42_detail', 'PPH42_ID', $this->input->get('pid'));
		$data['Getpph42']	= $this->cms->getGeneralData('g_pph42', 'PPH42_ID', $this->input->get('pid'));

		$this->db->select('*')
			->from('v_g_employee_pph42_umkm')
			->where('COMPANY_ID', trim($this->input->get('cid')))
			->where('PPH42_ID', trim($this->input->get('pid')));


		// $data['employees'] 	= $this->cms->getGeneralData('v_g_employee_pph42', 'COMPANY_ID', trim($this->input->get('cid')));
		$data['employees'] 	= $this->db->get();
		$data['counter']	= 1;
		$data['payment']    = $this->cms->getSingularData('g_payment', 'PPH_ID', $this->input->get('pid'));
		$data['statuspph42']= $this->cms->cekstatuspph42($this->input->get('pid'));

		// if ($data['summary']->num_rows() == 0) {
		// 	$this->session->set_flashdata('query', 'invalid');
		// 	echo 'ga ada';
		// 	// redirect(base_url('pph_42/bulan?cid=' . $this->input->get('cid')));
		// } else {
		// 	$this->load->view('cms/hitung_pajak/pph42_bulan_summary');
		// }

		$this->load->view('cms/hitung_pajak/pph42_bulan_summary_umkm', $data);
	}

	public function add_transaksi()
	{ 
		$data['NamaJenis']		= $this->cms->getGeneralList('m_tax_code42');
		$data['NamaDeposit']	= $this->cms->getGeneralList('m_deposit'); 
		$this->load->view('cms/hitung_pajak/add_pph42_bulan_summary_transaksi',$data);
	} 

	public function add_transaksi_umkm()
	{ 
		$data['NamaJenis']		= $this->cms->getGeneralList('m_tax_code42');
		$data['NamaDeposit']	= $this->cms->getGeneralList('m_deposit'); 
		$this->load->view('cms/hitung_pajak/add_pph42_bulan_summary_transaksi_umkm',$data);
	} 

	// --------------------------------------------------------------- TRANSAKSI
	public function insert_transaksi()
	{
		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$pphCheck  	   = $this->cms->getSingularData('g_pph42', 'PPH42_ID', $this->input->post('pphID'));

		// Generate baru ID Income
		$incomeID     = $this->incube->generateID(10);  

		// ------------------------------------------------- GET VALUE FROM FORM ADD 
		$pphID      = $this->input->post('pphID');
		$nama 	 	= $this->input->post('addNama');  
		$npwp 	 	= $this->input->post('addNPWP');  
		$nik	 	= $this->input->post('addNIK');  
		$alamat	 	= $this->input->post('addAlamat');  
		$no_potong 	= $this->input->post('addNoPotong');  
		$tanggal 	= $this->input->post('addTanggal');  
		$jenis 		= $this->input->post('addJenis');   

		$premi  	= $this->input->post('addPremi');  
		$uraian 	= $this->input->post('addUraian');  
		$stb_nop 	= $this->input->post('addSTBNOP');  
		$stb_lokasi	= $this->input->post('addSTBLokasi');  
		$bs_nop		= $this->input->post('addBSNOP');  
		$bs_lokasi	= $this->input->post('addBSLokasi');  
		$bs_ntpn 	= $this->input->post('addBSNTPN');  
		$bs_tanggal	= $this->input->post('addBSTanggalNTPN');   

		$jk_ntpn	= $this->input->post('addJKNTPN');  
		$jk_tanggal	= $this->input->post('addJKTanggalNTPN');  
		$pha_ntpn	= $this->input->post('addPHANTPN');  
		$pha_tanggal= $this->input->post('addPHATanggalNTPN');  
		$bruto		= $this->input->post('addBruto');      

		// --------------------------------------- CEK KODE OBJEK DAN TARIF PAJAK 42
			if($jenis<>''){
				$JenisDokumenData    = $this->cms->getSingularData('m_tax_code42', 'NAMA_OBJEK_PAJAK42', $jenis);
				$count=$JenisDokumenData->num_rows();
				if($count>0){
					foreach ($JenisDokumenData->result() as $JenisDokumen); 
					$kode_objek  = $JenisDokumen->KODE_OBJEK_PAJAK42;
					$tarif_objek = $JenisDokumen->TARIF_OBJEK_PAJAK42;
				}
				else{
					$kode_objek  = '';
				 	$tarif_objek = '0.005';	
				}
			} else{
				$kode_objek  = '';
				$tarif_objek = '0.005';	
			}
			
		// -------------------------------------------------------------------------

		// --------------------------------------------------------------- CEK DN/LN
			$DNLNData    = $this->cms->getSingularData('m_document', 'NAMA_JENIS_DOKUMEN', $premi);
			foreach ($DNLNData->result() as $DNLN);
			if($premi == 'Bunga Deposito/Tabungan yang Ditempatkan di Dalam Negeri'){
				$dnln = 'DN';
			}elseif ($premi == 'Bunga Deposito/Tabungan yang Ditempatkan di Luar Negeri') {
				$dnln = 'LN';
			} else{
				$dnln = '';
			} 
		// -------------------------------------------------------------------------

		// ------------------------------------------------------ HITUNG TOTAL PPH42  
			$total_pph42 = $bruto * $tarif_objek;
		// ------------------------------------------------------------------------- 

		$transaksiData = array( 
			'INCOME_ID'                 		=> $incomeID,
			'COMPANY_ID'           				=> $this->input->post('companyID'),
			'PPH42_ID'							=> $pphID,  
			'NAMA_WP_DIPOTONG'					=> $nama,
			'NPWP_WP_DIPOTONG'					=> $npwp,
			'NIK_LAWAN_TRANSAKSI'				=> $nik,
			'ALAMAT_WP_POTONG'					=> $alamat,
			'NOMOR_BUKTI_POTONG'				=> $no_potong,
			'TANGGAL_BUKTI_POTONG'				=> $tanggal,
			'KODE_OBJEK_PAJAK42'				=> $kode_objek, //
			'NAMA_OBJEK_PAJAK42'				=> $jenis,
			'DEPOSITO_NAME'						=> $premi,
			'DEPOSITO_DNLN'						=> $dnln, //
			'HU_URAIAN_PENGHASILAN'				=> $uraian,
			'STB_NOP'							=> $stb_nop,
			'STB_LOKASI_OBJEK_PAJAK'			=> $stb_lokasi,
			'STB_BS_NOP'						=> $bs_nop,
			'STB_BS_LOKASI_OBJEK_PAJAK'			=> $bs_lokasi,
			'STB_BS_NTPN'						=> $bs_ntpn,
			'STB_BS_TANGGAL_NTPN'				=> $bs_tanggal,
			'JK_BS_NTPN'						=> $jk_ntpn,
			'JK_BS_TANGGAL_NTPN'				=> $jk_tanggal,
			'PHTB_NTPN'							=> $pha_ntpn,
			'PHTB_TANGGAL_NTPN'					=> $pha_ntpn,
			'BRUTO'								=> $bruto,
			'TARIF_PAJAK'						=> $tarif_objek, // 
			'TOTAL_PPHVAL42'					=> $total_pph42, //
			'CREATED'							=> date('Y-m-d h:i:s'),
			'STATUS'							=> 'ON PROGRESS'
		);
		$this->cms->insertGeneralData('g_pph42_detail', $transaksiData);

		// ------------------------------------------ UPDATE COUNT ALL DPP AND PHH 22
		$all_dpp_pph42= $this->cms->editPPH42($pphID);
		foreach ($all_dpp_pph42->result() as $all);
		$updatePPH42 = array(
			'COMPANY_PPHVAL42' 	=> $all->TOTAL_PPH42_ALL, 
			'UPDATED'			=> date('Y-m-d H:i:s'),
			'STATUS'			=> 'ON PROGRESS'
		);
		$this->cms->updateGeneralData('g_pph42', $updatePPH42, 'PPH42_ID', $pphID);
		// ------------------------------------------------------------------------- 
		redirect('pph_42/bulan/summary?pid='.$this->input->post('pphID').'&cid='.$pphCheck->row()->COMPANY_ID.'&mid='.$pphCheck->row()->PERIOD_MONTH.'&yid='.$pphCheck->row()->PERIOD_YEAR);  

	} 

	// ----------------------------------------------------------- TRANSAKSI UMKM
	public function insert_transaksi_umkm()
	{
		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$pphCheck  	   = $this->cms->getSingularData('g_pph42', 'PPH42_ID', $this->input->post('pphID'));

		// Generate baru ID Income
		$incomeID     = $this->incube->generateID(10);  

		// ------------------------------------------------- GET VALUE FROM FORM ADD 
		$pphID      		= $this->input->post('pphID');
		$ntpn 	 			= $this->input->post('addNTPN');  
		$tanggal_ntpn  		= $this->input->post('addTanggalNTPN');  
		$nama	 			= $this->input->post('addNama');  
		$npwp	 			= $this->input->post('addNPWP');  
		$nik 				= $this->input->post('addNIK');   

		$jenis  			= $this->input->post('addJenis');  
		$tanggal_jalan  	= $this->input->post('addTanggalJalan');  
		$no_jalan 			= $this->input->post('addNoJalan');  
		$tanggal_invoice 	= $this->input->post('addTanggalInvoice');  
		$no_invoice			= $this->input->post('addNoInvoice');     

		$uraian				= $this->input->post('addUraian');     
		$bruto				= $this->input->post('addBruto');      

		// --------------------------------------- CEK KODE OBJEK DAN TARIF PAJAK 42
			if($jenis<>''){
				$JenisDokumenData    = $this->cms->getSingularData('m_tax_code42', 'NAMA_OBJEK_PAJAK42', $jenis);
				$count=$JenisDokumenData->num_rows();
				if($count>0){
					foreach ($JenisDokumenData->result() as $JenisDokumen); 
					$kode_objek  = $JenisDokumen->KODE_OBJEK_PAJAK42;
					$tarif_objek = $JenisDokumen->TARIF_OBJEK_PAJAK42;
				}
				else{
					$kode_objek  = '';
				 	$tarif_objek = '0.005';	
				}
			} else{
				$kode_objek  = '';
				$tarif_objek = '0.005';	
			}
			
		// ------------------------------------------------------------------------- 

		// ------------------------------------------------------ HITUNG TOTAL PPH42  
			$total_pph42 = $bruto * $tarif_objek;
		// ------------------------------------------------------------------------- 

		$transaksiData = array( 
			'INCOME_ID'                 			=> $incomeID,
				'COMPANY_ID'           				=> $this->input->post('companyID'),
				'PPH42_ID'							=> $pphID,  
				'UMKM_NTPN'							=> $ntpn, 
				'UMKM_TANGGAL_NTPN'					=> $tanggal_ntpn, 
				'UMKM_NAMA'							=> $nama, 
				'UMKM_NPWP'							=> $npwp, 
				'UMKM_NIK'							=> $nik, 
				'KODE_OBJEK_PAJAK42'				=> $kode_objek, 
				'NAMA_OBJEK_PAJAK42'				=> $jenis, 
				'UMKM_TANGGAL_SURAT_JALAN'			=> $tanggal_jalan, 
				'UMKM_NO_SURAT_JALAN'				=> $no_jalan, 
				'UMKM_TANGGAL_INVOICE'				=> $tanggal_invoice, 
				'UMKM_NO_INVOICE'					=> $no_invoice, 
				'UMKM_URAIAN'						=> $uraian, 
				'UMKM_BRUTO'						=> $bruto,
				'UMKM_TARIF_PAJAK'					=> $tarif_objek, 
				'UMKM_TOTAL_PPHVAL42'				=> $total_pph42, 
				'CREATED'							=> date('Y-m-d h:i:s'),
				'STATUS'							=> 'ON PROGRESS'
		);
		$this->cms->insertGeneralData('g_pph42_umkm', $transaksiData);

		// ------------------------------------------ UPDATE COUNT ALL DPP AND PHH 22
		$all_dpp_pph42= $this->cms->editPPH42($pphID);
		foreach ($all_dpp_pph42->result() as $all);
		$updatePPH42 = array(
			'COMPANY_PPHVAL42' 	=> $all->TOTAL_PPH42_ALL, 
			'UPDATED'			=> date('Y-m-d H:i:s'),
			'STATUS'			=> 'ON PROGRESS'
		);
		$this->cms->updateGeneralData('g_pph42', $updatePPH42, 'PPH42_ID', $pphID);
		// ------------------------------------------------------------------------- 
		redirect('pph_42/bulan/summary/umkm?pid='.$this->input->post('pphID').'&cid='.$pphCheck->row()->COMPANY_ID.'&mid='.$pphCheck->row()->PERIOD_MONTH.'&yid='.$pphCheck->row()->PERIOD_YEAR);  

	} 

	public function pph_42_bulan_approve()
	{
		$pid=$this->input->get('pid');
		$cid=$this->input->get('cid');
		$yid=$this->input->get('yid');

		$statusApprove = array(
			'STATUS'  => 'WAITING FOR APPROVAL'
		);

		$this->cms->updateGeneralData('g_pph42', $statusApprove, 'PPH_ID', $this->input->get('pid'));
		$this->cms->updateGeneralData('g_employee_income', $statusApprove, 'PPH_ID', $this->input->get('pid'));

		redirect('PPH/Pph42/pph_42_bulan?cid='.$cid.'&pid='.$yid.'');		
	}

	public function generateXLSFile()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee_pph42', 'PPH42_ID', $pphID);
		

		$fileName = 'FORMAT_PPH42_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.xlsx';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A1:U2')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH42 Form')
			->setSubject('MSM Consulting PPH42 Form');

		$sheet->getStyle('A1:H2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066'); 

		$sheet->getStyle('I1:I2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('800000'); 

		$sheet->getStyle('J1:J2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('483D8B'); 

		$sheet->getStyle('K1:L2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('006400'); 

		$sheet->getStyle('M1:P2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('4682B4'); 

		$sheet->getStyle('Q1:R2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('8B4513');

		$sheet->getStyle('S1:T2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('696969');

		$sheet->getStyle('U1:U2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('FFA303'); 


		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH42'); 

		$sheet->setCellValue('A1', "No");
		$sheet->mergeCells('A1:A2');
		$sheet->getStyle('A1:A2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('B1', "Nama WP Dipotong");
		$sheet->mergeCells('B1:B2');
		$sheet->getStyle('B1:B2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('C1', "NPWP WP Dipotong");
		$sheet->mergeCells('C1:C2');
		$sheet->getStyle('C1:C2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('D1', "NIK Lawan Transaksi (jika tidak memiliki NPWP)");
		$sheet->mergeCells('D1:D2');
		$sheet->getStyle('D1:D2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('E1', "Alamat WP Dipotong");
		$sheet->mergeCells('E1:E2');
		$sheet->getStyle('E1:E2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('F1', "Nomor Bukti Potong");
		$sheet->mergeCells('F1:F2');
		$sheet->getStyle('F1:F2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('G1', "Tanggal Bukti Potong");
		$sheet->mergeCells('G1:G2');
		$sheet->getStyle('G1:G2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('H1', "Jenis Penghasilan");
		$sheet->mergeCells('H1:H2');
		$sheet->getStyle('H1:H2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('I1', 'Premi Asuransi dibayar Pemberi Kerja');
		$sheet->mergeCells('I1:I1');
		$sheet->setCellValue('I2', 'Jenis'); 
		$sheet->getStyle('I1:I1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('J1', 'Hadiah Undian');
		$sheet->mergeCells('J1:J1');
		$sheet->setCellValue('J2', 'Uraian Penghasilan'); 
		$sheet->getStyle('J1:J1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('K1', 'Sewa Tanah Bangunan');
		$sheet->mergeCells('K1:L1');
		$sheet->setCellValue('K2', 'NOP');
		$sheet->setCellValue('L2', 'Lokasi Objek Pajak'); 
		$sheet->getStyle('K1:L1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('M1', 'Sewa Tanah Bangunan (dibayar sendiri)');
		$sheet->mergeCells('M1:P1');
		$sheet->setCellValue('M2', 'NOP');
		$sheet->setCellValue('N2', 'Lokasi Objek Pajak'); 
		$sheet->setCellValue('O2', 'NTPN'); 
		$sheet->setCellValue('P2', 'Tanggal NTPN'); 
		$sheet->getStyle('M1:P1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('Q1', 'Jasa Kontruksi (dibayar sendiri)');
		$sheet->mergeCells('Q1:R1');
		$sheet->setCellValue('Q2', 'NTPN');
		$sheet->setCellValue('R2', 'Tanggal NTPN'); 
		$sheet->getStyle('Q1:R1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('S1', 'Pengalihan Hak atas Tanah/Bangunan)');
		$sheet->mergeCells('S1:T1');
		$sheet->setCellValue('S2', 'NTPN');
		$sheet->setCellValue('T2', 'Tanggal NTPN'); 
		$sheet->getStyle('S1:T1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true); 

		$sheet->setCellValue('U1', "Bruto");
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
		//EoL 1

		//2. Isi Excel pake data
		if ($employeeData->num_rows() != 0) {

			$colCounter = 3;
			$numCounter = 1;

			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularDataDetail('v_g_employee_pph42', 'PPH42_ID', 'COMPANY_ID',$pphID,$companyID);
				//2.1 Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthName($pphData->row()->PERIOD_MONTH);
				//EoL 2.1

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $employee->NAMA_WP_DIPOTONG);
				$sheet->setCellValue('C' . $colCounter, $employee->NPWP_WP_DIPOTONG);
				$sheet->setCellValue('D' . $colCounter, $employee->NIK_LAWAN_TRANSAKSI);
				$sheet->setCellValue('E' . $colCounter, $employee->ALAMAT_WP_POTONG);
				$sheet->setCellValue('F' . $colCounter, $employee->NOMOR_BUKTI_POTONG);
				$sheet->setCellValue('G' . $colCounter, $employee->TANGGAL_BUKTI_POTONG);
				$sheet->setCellValue('H' . $colCounter, $employee->NAMA_OBJEK_PAJAK42);
				$sheet->setCellValue('I' . $colCounter, $employee->DESPOSITO_NAME);
				$sheet->setCellValue('J' . $colCounter, $employee->HU_URAIAN_PENGHASILAN);
				$sheet->setCellValue('K' . $colCounter, $employee->STB_NOP);
				$sheet->setCellValue('L' . $colCounter, $employee->STB_LOKASI_OBJEK_PAJAK);
				$sheet->setCellValue('M' . $colCounter, $employee->STB_BS_NOP);
				$sheet->setCellValue('N' . $colCounter, $employee->STB_BS_LOKASI_OBJEK_PAJAK);
				$sheet->setCellValue('O' . $colCounter, $employee->STB_BS_NTPN);
				$sheet->setCellValue('P' . $colCounter, $employee->STB_BS_TANGGAL_NTPN);
				$sheet->setCellValue('Q' . $colCounter, $employee->JK_BS_NTPN);
				$sheet->setCellValue('R' . $colCounter, $employee->JK_BS_TANGGAL_NTPN);
				$sheet->setCellValue('S' . $colCounter, $employee->PHTB_NTPN);
				$sheet->setCellValue('T' . $colCounter, $employee->PHTB_TANGGAL_NTPN);
				$sheet->setCellValue('U' . $colCounter, $employee->BRUTO);

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

	public function generateXLSFileUMKM()
	{
		$phpExcel = new Spreadsheet();

		$companyID      = $this->input->get('cid');
		$pphID			= $this->input->get('pid');

		$companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
		$employeeData   = $this->cms->getSingularData('v_g_employee_pph42_umkm', 'PPH42_ID', $pphID);
		

		$fileName = 'FORMAT_UMKM_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.xlsx';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A1:M2')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH42 Form')
			->setSubject('MSM Consulting PPH42 Form');

		$sheet->getStyle('A1:M2')
			->getFill()
			->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('000066');  


		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH42'); 

		$sheet->setCellValue('A1', "No");
		$sheet->mergeCells('A1:A2');
		$sheet->getStyle('A1:A2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('B1', "NTPN");
		$sheet->mergeCells('B1:B2');
		$sheet->getStyle('B1:B2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('C1', "Tanggal NTPN");
		$sheet->mergeCells('C1:C2');
		$sheet->getStyle('C1:C2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('D1', "Nama Lawan Transaksi");
		$sheet->mergeCells('D1:D2');
		$sheet->getStyle('D1:D2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('E1', "NPWP Lawan Transaksi");
		$sheet->mergeCells('E1:E2');
		$sheet->getStyle('E1:E2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('F1', "NIK Tanggal Transaksi");
		$sheet->mergeCells('F1:F2');
		$sheet->getStyle('F1:F2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('G1', "Jenis Penghasilan");
		$sheet->mergeCells('G1:G2');
		$sheet->getStyle('G1:G2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('H1', "Tanggal Surat Jalan");
		$sheet->mergeCells('H1:H2');
		$sheet->getStyle('H1:H2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('I1', "No Surat Jalan");
		$sheet->mergeCells('I1:I2');
		$sheet->getStyle('I1:I2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('J1', 'Tanggal Invoice');
		$sheet->mergeCells('J1:J1');
		$sheet->getStyle('J1:J1')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);  

		$sheet->setCellValue('K1', "No Invoice");
		$sheet->mergeCells('K1:K2');
		$sheet->getStyle('K1:K2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('L1', "Uraian");
		$sheet->mergeCells('L1:L2');
		$sheet->getStyle('L1:L2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);

		$sheet->setCellValue('M1', "Bruto");
		$sheet->mergeCells('M1:M2');
		$sheet->getStyle('M1:M2')
			->getAlignment()
			->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
			->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
			->setWrapText(true);


		foreach (range('B', 'M') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}
		//EoL 1

		//2. Isi Excel pake data
		if ($employeeData->num_rows() != 0) {

			$colCounter = 3;
			$numCounter = 1;

			foreach ($employeeData->result() as $employee) {
				$pphData 		= $this->cms->getSingularDataDetail('v_g_employee_pph42_umkm', 'PPH42_ID', 'COMPANY_ID',$pphID,$companyID);
				//2.1 Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthName($pphData->row()->PERIOD_MONTH);
				//EoL 2.1

				$sheet->setCellValue('A' . $colCounter, $numCounter);
				$sheet->setCellValue('B' . $colCounter, $employee->UMKM_NTPN);
				$sheet->setCellValue('C' . $colCounter, $employee->UMKM_TANGGAL_NTPN);
				$sheet->setCellValue('D' . $colCounter, $employee->UMKM_NAMA);
				$sheet->setCellValue('E' . $colCounter, $employee->UMKM_NPWP);
				$sheet->setCellValue('F' . $colCounter, $employee->UMKM_NIK);
				$sheet->setCellValue('G' . $colCounter, $employee->NAMA_OBJEK_PAJAK42);
				$sheet->setCellValue('H' . $colCounter, $employee->UMKM_TANGGAL_SURAT_JALAN);
				$sheet->setCellValue('I' . $colCounter, $employee->UMKM_NO_SURAT_JALAN);
				$sheet->setCellValue('J' . $colCounter, $employee->UMKM_TANGGAL_INVOICE);
				$sheet->setCellValue('K' . $colCounter, $employee->UMKM_NO_INVOICE);
				$sheet->setCellValue('L' . $colCounter, $employee->UMKM_URAIAN);
				$sheet->setCellValue('M' . $colCounter, $employee->UMKM_BRUTO); 

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
		

		$fileName = 'LAPOR_PAJAK_PPH42_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.csv';

		//1. Format dasar PHPExcel
		$sheet = $phpExcel->getActiveSheet();

		$sheet->getStyle('A1:I1')
			->getFont()
			->getColor()
			->setRGB('ffffff');

		$phpExcel->getProperties()
			->setCreator('MSM Consulting')
			->setLastModifiedBy('MSM Consulting')
			->setTitle('MSM Consulting PPH42 Lapor Pajak')
			->setSubject('MSM Consulting PPH42 Lapor Pajak');

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


		$phpExcel->setActiveSheetIndex(0)->setTitle('FormatData PPH42');

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
				$pphData 		= $this->cms->getSingularDataDetail('v_g_employee_pph42', 'PPH_ID', 'EMPLOYEE_ID',$pphID,$employee->EMPLOYEE_ID);
				//2.1 Convert Tanggal sesuai format, lihat di Libraries/Incube.php
				$monthName = $this->incube->convertMonthNameLP($pphData->row()->PERIOD_MONTH);
				foreach ($pphData->result() as $statusemployee);
				$cekstatusemployee = $statusemployee->EMPLOYEE_STATUS;

				if($cekstatusemployee == "TETAP"){
					$status = "42-100-01";
				} else{
					$status = "42-100-02";
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
			case (($yearlyBruto >= 47500000) && ($yearlyBruto <= 427500000)):
				// echo 'lapisan 2';
				$pphVal = ($yearlyBruto - 47500000) * (15 / 85) + 2500000;
				break;
			case (($yearlyBruto >= 427500000) && ($yearlyBruto <= 405000000)):
				// echo 'lapisan 3';
				$pphVal = ($yearlyBruto - 427500000) * (25 / 75) + 32500000;
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
		// 394257
	}

	public function importXLSLFile()
	{
		$this->output->enable_profiler(TRUE); 

		//echo $this->input->post('pphID');

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$employeeCheck = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $this->input->post('companyID'));
		$pphCheck 	   = $this->cms->getSingularData('g_pph42', 'PPH42_ID', $this->input->post('pphID'));  

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

		// Mengecek status pada table g_pph42, jika status belum PAID
		// Maka data lama pada g_pph42_detail akan dihapus terlebih dahulu, baru diinputkan data terbaru
		$processType='REVISI';
		$this->db->select('STATUS')
				 ->from('g_pph42')
				 ->where('PPH42_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 

		foreach ($status->result() as $key);

		// Jika status bukan Lapor Pajak, hapus terlebih dahulu data lama di g_pph42_detail
		if($key->STATUS == "ACTIVE" OR $key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING" ){
			//REVISI
			$this->cms->deleteGeneralData('g_pph42_detail', 'PPH42_ID', $this->input->post('pphID'));
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
			$this->cms->updateGeneralData('g_pph42', $updateStatusPPH22, 'PPH42_ID', $this->input->post('pphID')); 

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
				'STATUS'		=> 'RE PROGRESS',
			);

			$queryInsert = $this->cms->insertGeneralData('g_pph23', $companyData);
			//EoL 1
			
		}

		foreach ($sheet as $sheetData) {

			$incomeID   = $this->incube->generateID(10); 
			$pph_ID 	= $this->input->post('pphID'); 

			// Update data sebelumnya, sebelum di inputkan data baru 
			$updatePPH42 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph42', $updatePPH42, 'PPH42_ID', $pphID); 

			// --------------------------------------- CEK KODE OBJEK DAN TARIF PAJAK 42
			if($sheetData['H']<>''){
				$JenisDokumenData    = $this->cms->getSingularData('m_tax_code42', 'NAMA_OBJEK_PAJAK42', $sheetData['H']);
				$count=$JenisDokumenData->num_rows();
				if($count>0){
					foreach ($JenisDokumenData->result() as $JenisDokumen); 
					$kode_objek  = $JenisDokumen->KODE_OBJEK_PAJAK42;
					$tarif_objek = $JenisDokumen->TARIF_OBJEK_PAJAK42;
				}
				else{
					$kode_objek  = '';
				 	$tarif_objek = '0.005';	
				}
			} else{
				$kode_objek  = '';
				$tarif_objek = '0.005';	
			}
				
			// -------------------------------------------------------------------------

			// --------------------------------------------------------------- CEK DN/LN
				$DNLNData    = $this->cms->getSingularData('m_document', 'NAMA_JENIS_DOKUMEN', $sheetData['T']);
				foreach ($DNLNData->result() as $DNLN);
				if($sheetData['T'] == 'Bunga Deposito/Tabungan yang Ditempatkan di Dalam Negeri'){
					$dnln = 'DN';
				}elseif ($sheetData['T'] == 'Bunga Deposito/Tabungan yang Ditempatkan di Luar Negeri') {
					$dnln = 'LN';
				} else{
					$dnln = '';
				} 
			// -------------------------------------------------------------------------

			// ------------------------------------------------------ HITUNG TOTAL PPH42  
				$total_pph42 = $sheetData['U'] * $tarif_objek;
			// ------------------------------------------------------------------------- 

			// Insert data excel ke tabel g_pph23_detail
			$employeeData = array(
				'INCOME_ID'                 		=> $incomeID,
				'COMPANY_ID'           				=> $this->input->post('companyID'),
				'PPH42_ID'							=> $pphID,  
				'NAMA_WP_DIPOTONG'					=> $sheetData['B'],
				'NPWP_WP_DIPOTONG'					=> $sheetData['C'],
				'NIK_LAWAN_TRANSAKSI'				=> $sheetData['D'],
				'ALAMAT_WP_POTONG'					=> $sheetData['E'],
				'NOMOR_BUKTI_POTONG'				=> $sheetData['F'],
				'TANGGAL_BUKTI_POTONG'				=> $sheetData['G'],
				'KODE_OBJEK_PAJAK42'				=> $kode_objek,
				'NAMA_OBJEK_PAJAK42'				=> $sheetData['H'],
				'DEPOSITO_NAME'						=> $sheetData['I'],
				'DEPOSITO_DNLN'						=> $dnln,
				'HU_URAIAN_PENGHASILAN'				=> $sheetData['J'],
				'STB_NOP'							=> $sheetData['K'],
				'STB_LOKASI_OBJEK_PAJAK'			=> $sheetData['L'],
				'STB_BS_NOP'						=> $sheetData['M'],
				'STB_BS_LOKASI_OBJEK_PAJAK'			=> $sheetData['N'],
				'STB_BS_NTPN'						=> $sheetData['O'],
				'STB_BS_TANGGAL_NTPN'				=> $sheetData['P'],
				'JK_BS_NTPN'						=> $sheetData['Q'],
				'JK_BS_TANGGAL_NTPN'				=> $sheetData['R'],
				'PHTB_NTPN'							=> $sheetData['S'],
				'PHTB_TANGGAL_NTPN'					=> $sheetData['T'],
				'BRUTO'								=> $sheetData['U'],
				'TARIF_PAJAK'						=> $tarif_objek, 
				'TOTAL_PPHVAL42'					=> $total_pph42, 
				'CREATED'							=> date('Y-m-d h:i:s'),
				'STATUS'							=> 'ON PROGRESS'
			);

			$this->cms->insertGeneralData('g_pph42_detail', $employeeData);

		}  
		$this->update_g_pph42($pphID); 
		redirect('pph_42/bulan/summary?pid=' . $pphID . '&cid=' . $this->input->post('companyID'). '&mid=' . $this->input->post('monthID'). '&yid=' . $this->input->post('yearID'));
	}

	public function importXLSLFileUMKM()
	{
		$this->output->enable_profiler(TRUE); 

		//echo $this->input->post('pphID');

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));
		$employeeCheck = $this->cms->getSingularData('v_g_employee', 'EMPLOYEE_COMPANY_ID', $this->input->post('companyID'));
		$pphCheck 	   = $this->cms->getSingularData('g_pph42', 'PPH42_ID', $this->input->post('pphID'));  

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

		// Mengecek status pada table g_pph42, jika status belum PAID
		// Maka data lama pada g_pph42_detail akan dihapus terlebih dahulu, baru diinputkan data terbaru
		$processType='REVISI';
		$this->db->select('STATUS')
				 ->from('g_pph42')
				 ->where('PPH42_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 

		foreach ($status->result() as $key);

		// Jika status bukan Lapor Pajak, hapus terlebih dahulu data lama di g_pph42_detail
		if($key->STATUS == "ACTIVE" OR $key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING" ){
			//REVISI
			$this->cms->deleteGeneralData('g_pph42_umkm', 'PPH42_ID', $this->input->post('pphID'));
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
			$this->cms->updateGeneralData('g_pph42', $updateStatusPPH22, 'PPH42_ID', $this->input->post('pphID')); 

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
				'STATUS'		=> 'RE PROGRESS',
			);

			$queryInsert = $this->cms->insertGeneralData('g_pph42', $companyData);
			//EoL 1
			
		}

		foreach ($sheet as $sheetData) {

			$incomeID   = $this->incube->generateID(10); 
			$pph_ID 	= $this->input->post('pphID'); 

			// Update data sebelumnya, sebelum di inputkan data baru 
			$updatePPH42 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph42', $updatePPH42, 'PPH42_ID', $pphID); 

			// ------------------------------------------------------- TARIF PAJAK UMKM
			if($sheetData['G']<>''){
				$JenisDokumenData    = $this->cms->getSingularData('m_tax_code42', 'NAMA_OBJEK_PAJAK42', $sheetData['G']);
				$count=$JenisDokumenData->num_rows();
				if($count>0){
					foreach ($JenisDokumenData->result() as $JenisDokumen); 
					$kode_objek  = $JenisDokumen->KODE_OBJEK_PAJAK42;
					$tarif_objek = $JenisDokumen->TARIF_OBJEK_PAJAK42;
				}
				else{
					$kode_objek  = '';
				 	$tarif_objek = '0.005';	
				}
			} else{
				$kode_objek  = '';
				$tarif_objek = '0.005';	
			}
				

			// ------------------------------------------------------------------------- 

			// ------------------------------------------------------ HITUNG TOTAL PPH42  
				$total_pph42 = $sheetData['M'] * $tarif_objek;
			// ------------------------------------------------------------------------- 

			// Insert data excel ke tabel g_pph23_detail
			$employeeData = array(
				'INCOME_ID'                 		=> $incomeID,
				'COMPANY_ID'           				=> $this->input->post('companyID'),
				'PPH42_ID'							=> $pphID,  
				'UMKM_NTPN'							=> $sheetData['B'], 
				'UMKM_TANGGAL_NTPN'					=> $sheetData['C'], 
				'UMKM_NAMA'							=> $sheetData['D'], 
				'UMKM_NPWP'							=> $sheetData['E'], 
				'UMKM_NIK'							=> $sheetData['F'], 
				'KODE_OBJEK_PAJAK42'				=> $kode_objek, 
				'NAMA_OBJEK_PAJAK42'				=> $sheetData['G'], 
				'UMKM_TANGGAL_SURAT_JALAN'			=> $sheetData['H'], 
				'UMKM_NO_SURAT_JALAN'				=> $sheetData['I'], 
				'UMKM_TANGGAL_INVOICE'				=> $sheetData['J'], 
				'UMKM_NO_INVOICE'					=> $sheetData['K'], 
				'UMKM_URAIAN'						=> $sheetData['L'], 
				'UMKM_BRUTO'						=> $sheetData['M'],
				'UMKM_TARIF_PAJAK'					=> $tarif_objek, 
				'UMKM_TOTAL_PPHVAL42'				=> $total_pph42, 
				'CREATED'							=> date('Y-m-d h:i:s'),
				'STATUS'							=> 'ON PROGRESS'
			);

			$this->cms->insertGeneralData('g_pph42_umkm', $employeeData);

		}  
		$this->update_g_pph42($pphID); 
		redirect('pph_42/bulan/summary/umkm?pid=' . $pphID . '&cid=' . $this->input->post('companyID'). '&mid=' . $this->input->post('monthID'). '&yid=' . $this->input->post('yearID'));
	}

	// Waiting Approve by Customer
	public function approveCustomer()
	{
		// Update status g_pph42
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'WAITING FOR APPROVAL BY CUSTOMER'
		);
		$this->cms->updateGeneralData('g_pph42', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		// Update status g_pph42
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'WAITING FOR PAYMENT'
		);
		$this->cms->updateGeneralData('g_pph42', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		// Update status g_pph42
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'PAID'
		);
		$this->cms->updateGeneralData('g_pph42', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

		// Update status g_employee_income
		$updateApprovalEmployee = array( 
			'STATUS'	=> 'PAID'
		);
		$this->cms->updateGeneralData('g_employee_income', $updateApprovalEmployee, 'PPH_ID', $this->input->get('pphID'));

		// Cek sudah pernah melakukan pembayaran atau belum
		$this->db->select('PAID_PPH42')
				 ->from('g_payment')
				 ->where('PPH_ID', $this->input->post('pphID'));

		$cekstatuspayment = $this->db->get(); 

		foreach ($cekstatuspayment->result() as $statuspayment);

		// if(null($statuspayment)){
		// 	// Insert Payment
		// 	$insertPayment = array(
		// 		'PPH_ID'		=> $this->input->get('pphID'),
		// 		'COMPANY_ID' 	=> $this->input->get('cid'), 
		// 		'TOTAL_PPH42'	=> ,
		// 		'PAID_PPH42'	=> ,
		// 		'OWED_PPH42'	=> ,
		// 		'CREATED'		=> date('Y-m-d H:i:s')
		// 	);
		// 	$queryInsertPay = $this->cms->insertGeneralData('s_log', $insertLog);	
		// } else{
		// 	$updatePayment = array(
		// 		'TOTAL_PPH42'	=> ,
		// 		'PAID_PPH42'	=> ,
		// 		'OWED_PPH42'	=> ,
		// 		'UPDATED'		=> date('Y-m-d H:i:s')
		// 	);
		// 	$this->cms->updateGeneralData('g_pph42', $updateApproval, 'PPH_ID', $this->input->get('pphID'));
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
		// Update status g_pph42
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'TAX FILING'
		);
		$this->cms->updateGeneralData('g_pph42', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		// Update status g_pph42
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'HARDCOPY'
		);
		$this->cms->updateGeneralData('g_pph42', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		// Update status g_pph42
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'LAPOR PAJAK'
		);
		$this->cms->updateGeneralData('g_pph42', $updateApproval, 'PPH_ID', $this->input->get('pid'));

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

		redirect('pph_42/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid'). '&mid=' . $this->input->get('mid'). '&yid=' . $this->input->get('yid'));
	}

	// Closed
	public function Closed()
	{
		// Update status g_pph42
		$updateApproval = array(
			'UPDATED'	=> date('Y-m-d H:i:s'),
			'STATUS'	=> 'CLOSED'
		);
		$this->cms->updateGeneralData('g_pph42', $updateApproval, 'PPH_ID', $this->input->get('pphID'));

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
		$pphData 		= $this->cms->getSingularData('g_pph42', 'PPH_ID', $pphID);

		$phpExcel->getDefaultStyle()->getFont()->setName('Calibri')->setSize(12);
		$phpExcel->getActiveSheet()->setShowGridlines(false);
		$phpExcel->getActiveSheet()->getSheetView()->setZoomScale(85);
		$phpExcel->setActiveSheetIndex(0)->setTitle('Info PPh 42');
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
		$phpExcel->getActiveSheet()->setCellValue('B9', 'Perihal : INFO PPh 42 TERUTANG MASA ' . strtoupper($pphData->row()->PERIOD_MONTH) . ' TAHUN PAJAK ' . $pphData->row()->PERIOD_YEAR . '  YANG HARUS DISETOR');
		$phpExcel->getActiveSheet()->setCellValue('B11', "'1.");
		$phpExcel->getActiveSheet()->getStyle('B11')->getNumberFormat()->setFormatCode(PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

		$phpExcel->getActiveSheet()->mergeCells('C11:H11');
		$phpExcel->getActiveSheet()->setCellValue('C11', 'Perhitungan PPh 42 - Pegawai Tetap');

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
		$phpExcel->getActiveSheet()->setCellValue('E13', 'PPh 42 TERUTANG');

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
		$phpExcel->getActiveSheet()->setCellValue('G13', 'PPh 42 KURANG BAYAR');

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
		$phpExcel->getActiveSheet()->setCellValue('H15', '411142-100');


		$phpExcel->getActiveSheet()->mergeCells('C20:K20');
		$phpExcel->getActiveSheet()->setCellValue('C20', '>> Jadi PPh yang harus di bayar Masa ' . $pphData->row()->PERIOD_MONTH . ' Tahun Pajak ' . $pphData->row()->PERIOD_YEAR . ' adalah sebagai berikut  Rp. ' . number_format($pphData->row()->COMPANY_KBLB));

		$phpExcel->getActiveSheet()->mergeCells('C42:K42');
		$phpExcel->getActiveSheet()->setCellValue('C42', '>> Mohon disetorkan paling lambat tanggal 10 ' . $pphData->row()->PERIOD_MONTH . ' ' . $pphData->row()->PERIOD_YEAR);

		$phpExcel->getActiveSheet()->mergeCells('C42:K42');
		$phpExcel->getActiveSheet()->setCellValue('C42', '>> Jika sudah disetorkan mohon diupload NTPN-nya');

		$phpExcel->getActiveSheet()->mergeCells('C24:K24');
		$phpExcel->getActiveSheet()->setCellValue('C24', 'Terima Kasih');

		$phpExcel->getActiveSheet()->mergeCells('C27:K27');
		$phpExcel->getActiveSheet()->setCellValue('C27', 'Regards,');

		$phpExcel->getActiveSheet()->mergeCells('C28:K28');
		$phpExcel->getActiveSheet()->setCellValue('C28', 'Team MSM');

		$phpExcel->getActiveSheet()->mergeCells('C29:K29');
		$phpExcel->getActiveSheet()->setCellValue('C29', 'Ph : +6422 63858603/04');

		foreach (range('C', 'Z') as $columnID) {
			$phpExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}

		$phpExcel->getActiveSheet()->setSelectedCell('A1');
		$_objWriter = new Xlsx($phpExcel);
		$_varFLENME = 'REPORT_PPh42_' . date('Ymd') . '_' . $companyData->row()->COMPANY_NAME . '.xlsx';
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
			->from('g_pph42')
			->where('COMPANY_ID', $this->input->post('companyID'))
			->where('PERIOD_YEAR', $this->input->post('addPeriodeTahun'))
			->where('PERIOD_MONTH', $this->input->post('addPeriodeBulan'));

		$queryGet = $this->db->get();

		// echo $this->input->post('addPeriodeTahun');

		$companyData = array(
			'PPH42_ID'		=> $this->incube->generateID(10),
			'COMPANY_ID'	=> $this->input->post('companyID'),
			'PERIOD_YEAR'	=> $this->input->post('addPeriodeTahun'),
			'PERIOD_MONTH'	=> $this->input->post('addPeriodeBulan'),
			'CREATED'		=> date('Y-m-d h:i:s'),
			'STATUS'		=> ($queryGet->num_rows() > 0 ? 'HISTORY' : 'ACTIVE'),
		);

		$queryInsert = $this->cms->insertGeneralData('g_pph42', $companyData);
		//EoL 1

		if (!$queryInsert) {
			$this->session->set_flashdata('query', 'invalid');
		} else {
			$this->session->set_flashdata('query', 'success');
		}

		redirect(($this->input->post('pphFlag') == true ? base_url('pph_42/bulan?cid=' . $this->input->post('companyID')) : base_url('pph_42')));
	} 

	public function pph_42_tahun()
	{
		$this->load->view('cms/hitung_pajak/pph42_tahun');
	}

	public function pph_42_bulan_summary_karyawan()
	{
		$this->db->select('*')
			->from('v_g_employee_pph42')
			->where('EMPLOYEE_ID', trim($this->input->get('eid')))
			->where('PPH_ID', trim($this->input->get('pid')));


		$data['employee'] 	= $this->db->get();

		if ($data['employee']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_42/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')));
		}

		$this->load->view('cms/hitung_pajak/pph42_bulan_summary_karyawan', $data);
	} 

	public function edit_pph_42_bulan_summary_karyawan()
	{
		$this->db->select('*')
			->from('v_g_employee_pph42')
			->where('INCOME_ID', trim($this->input->get('eid')))
			->where('PPH42_ID', trim($this->input->get('pid')));


		$data['employee'] 		= $this->db->get();
		$data['NamaJenis']		= $this->cms->getGeneralList('m_tax_code42');
		$data['NamaDeposit']	= $this->cms->getGeneralList('m_deposit'); 

		if ($data['employee']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_42/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')));
		}

		$this->load->view('cms/hitung_pajak/edit_pph42_bulan_summary_karyawan', $data);
	}

	public function edit_pph_42_bulan_summary_karyawan_umkm()
	{
		$this->db->select('*')
			->from('v_g_employee_pph42_umkm')
			->where('INCOME_ID', trim($this->input->get('eid')))
			->where('PPH42_ID', trim($this->input->get('pid')));


		$data['employee'] 		= $this->db->get();
		$data['NamaJenis']		= $this->cms->getGeneralList('m_tax_code42');
		$data['NamaDeposit']	= $this->cms->getGeneralList('m_deposit'); 

		if ($data['employee']->num_rows() == 0) {
			$this->session->set_flashdata('query', 'invalid');
			redirect(base_url('pph_42/bulan/summary?pid=' . $this->input->get('pid') . '&cid=' . $this->input->get('cid')));
		}

		$this->load->view('cms/hitung_pajak/edit_pph42_bulan_summary_karyawan_umkm', $data);
	}

	public function update_pph_42_bulan_summary_karyawan()
	{
		// $this->output->enable_profiler(TRUE);  

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID')); 
		$pphCheck 	   = $this->cms->getSingularData('g_pph42', 'PPH42_ID', $this->input->post('pphID'));

		// Generate baru ID Income
		$incomeID     = $this->incube->generateID(10); 
		
		// ------------------------------------------------- GET VALUE FROM FORM EDIT 
		$pphID      = $this->input->post('pphID');
		$nama 	 	= $this->input->post('editNama');  
		$npwp 	 	= $this->input->post('editNPWP');  
		$nik	 	= $this->input->post('editNIK');  
		$alamat	 	= $this->input->post('editAlamat');  
		$no_potong 	= $this->input->post('editNoPotong');  
		$tanggal 	= $this->input->post('editTanggal');  
		$jenis 		= $this->input->post('editJenis');   

		$premi  	= $this->input->post('editPremi');  
		$uraian 	= $this->input->post('editUraian');  
		$stb_nop 	= $this->input->post('editSTBNOP');  
		$stb_lokasi	= $this->input->post('editSTBLokasi');  
		$bs_nop		= $this->input->post('editBSNOP');  
		$bs_lokasi	= $this->input->post('editSLokasi');  
		$bs_ntpn 	= $this->input->post('editBSNTPN');  
		$bs_tanggal	= $this->input->post('editBSTanggalNTPN');   

		$jk_ntpn	= $this->input->post('editJKNTPN');  
		$jk_tanggal	= $this->input->post('editJKTanggalNTPN');  
		$pha_ntpn	= $this->input->post('editPHANTPN');  
		$pha_tanggal= $this->input->post('editPHATanggalNTPN');  
		$bruto		= $this->input->post('editBruto');        
		// -------------------------------------------------------------------------

		// --------------------------------------- CEK KODE OBJEK DAN TARIF PAJAK 42
			if($jenis<>''){
				$JenisDokumenData    = $this->cms->getSingularData('m_tax_code42', 'NAMA_OBJEK_PAJAK42', $jenis);
				$count=$JenisDokumenData->num_rows();
				if($count>0){
					foreach ($JenisDokumenData->result() as $JenisDokumen); 
					$kode_objek  = $JenisDokumen->KODE_OBJEK_PAJAK42;
					$tarif_objek = $JenisDokumen->TARIF_OBJEK_PAJAK42;
				}
				else{
					$kode_objek  = '';
				 	$tarif_objek = '0.005';	
				}
			} else{
				$kode_objek  = '';
				$tarif_objek = '0.005';	
			}
			
		// -------------------------------------------------------------------------

		// --------------------------------------------------------------- CEK DN/LN
			$DNLNData    = $this->cms->getSingularData('m_document', 'NAMA_JENIS_DOKUMEN', $premi);
			foreach ($DNLNData->result() as $DNLN);
			if($premi == 'Bunga Deposito/Tabungan yang Ditempatkan di Dalam Negeri'){
				$dnln = 'DN';
			}elseif ($premi == 'Bunga Deposito/Tabungan yang Ditempatkan di Luar Negeri') {
				$dnln = 'LN';
			} else{
				$dnln = '';
			} 
		// -------------------------------------------------------------------------

		// ------------------------------------------------------ HITUNG TOTAL PPH42  
			$total_pph42 = $bruto * $tarif_objek;
		// ------------------------------------------------------------------------- 


		// ----------------------------------------------- CEK STATUS FROM FORM EDIT
		$this->db->select('STATUS')
				 ->from('g_pph42')
				 ->where('PPH42_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 
		foreach ($status->result() as $key); 
		// -------------------------------------------------------------------------  

		// Jika status bukan lapor pajak, hapus terlebih dahulu data lama di g_employee_income
		if($key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING"){
			
			$processType='REVISI';

			// Ngehapus data di g_employee_income berdasarkan PPH ID dan Employee ID
			$this->cms->deleteGeneralDataDouble('g_pph42_detail', 'PPH42_ID', $this->input->post('pphID'), 'INCOME_ID', $this->input->post('incomeID'));

			// Update status di g_pph23 dan g_employee_income menjadi ON PROGRESS
			$updatePPH42 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph42', $updatePPH42, 'PPH42_ID', $this->input->post('pphID')); 
		} elseif ($key->STATUS == "LAPOR PAJAK" OR $key->STATUS  == "HARDCOPY" ) {
			//PEMBETULANN
			$processType='PEMBETULAN'; 

			foreach ($pphCheck->result() as $cekPPH42);
			$monthCheck = $cekPPH42->PERIOD_MONTH;
			$yearCheck = $cekPPH42->PERIOD_YEAR;
			$prevPPHVAL = $cekPPH42->COMPANY_PPHVAL;

			$pembetulanKe = $this->cms->cekpembetulan42($this->input->post('companyID'), $monthCheck, $yearCheck); 

			// Ubah dulu status lama jadi HISTORY
			$updateStatusPPH23 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'HISTORY'
			);
			$this->cms->updateGeneralData('g_pph42', $updateStatusPPH42, 'PPH42_ID', $this->input->post('pphID')); 
		}

		if($processType=="REVISI") {
			$pphID = $this->input->post('pphID');
		}else {
			// Generate PPH ID baru
			$pphID = $this->incube->generateID(10);

			// Ambil data bulan dan tahun 
			foreach ($pphCheck->result() as $cekPPH42);
			$monthCheck = $cekPPH42->PERIOD_MONTH;
			$yearCheck = $cekPPH42->PERIOD_YEAR;

			$companyData = array(
				'PPH_ID'		=> $pphID,
				'COMPANY_ID'	=> $this->input->post('companyID'),
				'PERIOD_YEAR'	=> $yearCheck,
				'PERIOD_MONTH'	=> $monthCheck,
				'CREATED'		=> date('Y-m-d h:i:s'),
				'STATUS'		=> 'ON PROGRESS'
			);

			$queryInsert = $this->cms->insertGeneralData('g_pph42', $companyData); 
			
		}

		$employeeData = array(
			'INCOME_ID'                 		=> $incomeID,
			'COMPANY_ID'           				=> $this->input->post('companyID'),
			'PPH42_ID'							=> $pphID,  
			'NAMA_WP_DIPOTONG'					=> $nama,
			'NPWP_WP_DIPOTONG'					=> $npwp,
			'NIK_LAWAN_TRANSAKSI'				=> $nik,
			'ALAMAT_WP_POTONG'					=> $alamat,
			'NOMOR_BUKTI_POTONG'				=> $no_potong,
			'TANGGAL_BUKTI_POTONG'				=> $tanggal,
			'KODE_OBJEK_PAJAK42'				=> $kode_objek, //
			'NAMA_OBJEK_PAJAK42'				=> $jenis,
			'DEPOSITO_NAME'						=> $premi,
			'DEPOSITO_DNLN'						=> $dnln, //
			'HU_URAIAN_PENGHASILAN'				=> $uraian,
			'STB_NOP'							=> $stb_nop,
			'STB_LOKASI_OBJEK_PAJAK'			=> $stb_lokasi,
			'STB_BS_NOP'						=> $bs_nop,
			'STB_BS_LOKASI_OBJEK_PAJAK'			=> $bs_lokasi,
			'STB_BS_NTPN'						=> $bs_ntpn,
			'STB_BS_TANGGAL_NTPN'				=> $bs_tanggal,
			'JK_BS_NTPN'						=> $jk_ntpn,
			'JK_BS_TANGGAL_NTPN'				=> $jk_tanggal,
			'PHTB_NTPN'							=> $pha_ntpn,
			'PHTB_TANGGAL_NTPN'					=> $pha_ntpn,
			'BRUTO'								=> $bruto,
			'TARIF_PAJAK'						=> $tarif_objek, // 
			'TOTAL_PPHVAL42'					=> $total_pph42, //
			'CREATED'							=> date('Y-m-d h:i:s'),
			'STATUS'							=> 'ON PROGRESS'
		);

		$this->cms->insertGeneralData('g_pph42_detail', $employeeData);


		if($processType=="PEMBETULAN") {
			$this->cms->getCountDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('incomeID')); 

			$employeeNoEditData = $this->cms->getDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('incomeID'));
			foreach ($employeeNoEditData->result() as $employeeNoEdit) {
				$incomeID     = $this->incube->generateID(10);
				$databaru = array(
					'INCOME_ID'                 		=> $incomeID,
					'COMPANY_ID'           				=> $this->input->post('companyID'),
					'PPH42_ID'							=> $pphID,  
					'NAMA_WP_DIPOTONG'					=> $nama,
					'NPWP_WP_DIPOTONG'					=> $npwp,
					'NIK_LAWAN_TRANSAKSI'				=> $nik,
					'ALAMAT_WP_POTONG'					=> $alamat,
					'NOMOR_BUKTI_POTONG'				=> $no_potong,
					'TANGGAL_BUKTI_POTONG'				=> $tanggal,
					'KODE_OBJEK_PAJAK42'				=> $kode_objek, //
					'NAMA_OBJEK_PAJAK42'				=> $jenis,
					'DEPOSITO_NAME'						=> $premi,
					'DEPOSITO_DNLN'						=> $dnln, //
					'HU_URAIAN_PENGHASILAN'				=> $uraian,
					'STB_NOP'							=> $stb_nop,
					'STB_LOKASI_OBJEK_PAJAK'			=> $stb_lokasi,
					'STB_BS_NOP'						=> $bs_nop,
					'STB_BS_LOKASI_OBJEK_PAJAK'			=> $bs_lokasi,
					'STB_BS_NTPN'						=> $bs_ntpn,
					'STB_BS_TANGGAL_NTPN'				=> $bs_tanggal,
					'JK_BS_NTPN'						=> $jk_ntpn,
					'JK_BS_TANGGAL_NTPN'				=> $jk_tanggal,
					'PHTB_NTPN'							=> $pha_ntpn,
					'PHTB_TANGGAL_NTPN'					=> $pha_ntpn,
					'BRUTO'								=> $bruto,
					'TARIF_PAJAK'						=> $tarif_objek, // 
					'TOTAL_PPHVAL42'					=> $total_pph42, //
					'CREATED'							=> date('Y-m-d h:i:s'),
					'STATUS'							=> 'ON PROGRESS'
				);
				$this->cms->insertGeneralData('g_pph42_detail', $databaru);
			}

			// Update status karyawan dengan pph lama yang tidak di edit menjadi history
			foreach ($employeeNoEditData as $employeeNoEditUpdate) {
				$datalamaupdate = array(
					'STATUS'	=> 'HISTORY'
				);
				$this->cms->updateGeneralData('g_pph42', $datalamaupdate, 'PPH42_ID', $this->input->post('pphID')); 
			}
			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph42($pphID); 
		}

		if($processType == 'REVISI'){
			$pphID = $this->input->post('pphID');

			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph42($pphID); 
		}
		

		redirect('pph_42/bulan/summary?pid='. $pphID . '&cid=' . $this->input->post('companyID'). '&mid=' . $this->input->post('monthID'). '&yid=' . $this->input->post('yearID'));
	}

	public function update_pph_42_bulan_summary_karyawan_umkm()
	{
		// $this->output->enable_profiler(TRUE);  

		$companyCheck  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID')); 
		$pphCheck 	   = $this->cms->getSingularData('g_pph42', 'PPH42_ID', $this->input->post('pphID'));

		// Generate baru ID Income
		$incomeID     = $this->incube->generateID(10); 
		
		
		// ------------------------------------------------- GET VALUE FROM FORM ADD 
		$pphID      		= $this->input->post('pphID');
		$ntpn 	 			= $this->input->post('editNTPN');  
		$tanggal_ntpn  		= $this->input->post('editTanggalNTPN');  
		$nama	 			= $this->input->post('editNama');  
		$npwp	 			= $this->input->post('editNPWP');  
		$nik 				= $this->input->post('editNIK');   

		$jenis  			= $this->input->post('editJenis');  
		$tanggal_jalan  	= $this->input->post('editTanggalJalan');  
		$no_jalan 			= $this->input->post('editNoJalan');  
		$tanggal_invoice 	= $this->input->post('editTanggalInvoice');  
		$no_invoice			= $this->input->post('editNoInvoice');     

		$uraian				= $this->input->post('editUraian');     
		$bruto				= $this->input->post('editBruto');         
		// -------------------------------------------------------------------------

		// --------------------------------------- CEK KODE OBJEK DAN TARIF PAJAK 42
			if($jenis<>''){
				$JenisDokumenData    = $this->cms->getSingularData('m_tax_code42', 'NAMA_OBJEK_PAJAK42', $jenis);
				$count=$JenisDokumenData->num_rows();
				if($count>0){
					foreach ($JenisDokumenData->result() as $JenisDokumen); 
					$kode_objek  = $JenisDokumen->KODE_OBJEK_PAJAK42;
					$tarif_objek = $JenisDokumen->TARIF_OBJEK_PAJAK42;
				}
				else{
					$kode_objek  = '';
				 	$tarif_objek = '0.005';	
				}
			} else{
				$kode_objek  = '';
				$tarif_objek = '0.005';	
			}
			
		// -------------------------------------------------------------------------

		// --------------------------------------------------------------- CEK DN/LN
			$DNLNData    = $this->cms->getSingularData('m_document', 'NAMA_JENIS_DOKUMEN', $premi);
			foreach ($DNLNData->result() as $DNLN);
			if($premi == 'Bunga Deposito/Tabungan yang Ditempatkan di Dalam Negeri'){
				$dnln = 'DN';
			}elseif ($premi == 'Bunga Deposito/Tabungan yang Ditempatkan di Luar Negeri') {
				$dnln = 'LN';
			} else{
				$dnln = '';
			} 
		// -------------------------------------------------------------------------

		// ------------------------------------------------------ HITUNG TOTAL PPH42  
			$total_pph42 = $bruto * $tarif_objek;
		// ------------------------------------------------------------------------- 


		// ----------------------------------------------- CEK STATUS FROM FORM EDIT
		$this->db->select('STATUS')
				 ->from('g_pph42')
				 ->where('PPH42_ID', $this->input->post('pphID'));

		$status = $this->db->get(); 
		foreach ($status->result() as $key); 
		// -------------------------------------------------------------------------  

		// Jika status bukan lapor pajak, hapus terlebih dahulu data lama di g_employee_income
		if($key->STATUS == "ON PROGRESS" OR $key->STATUS  == "WAITING FOR APPROVAL" OR $key->STATUS  == "WAITING FOR CUSTOMER APPROVAL" OR $key->STATUS  == "WAITING FOR PAYMENT" OR $key->STATUS  == "PAID" OR $key->STATUS  == "TAX FILING"){
			
			$processType='REVISI';

			// Ngehapus data di g_employee_income berdasarkan PPH ID dan Employee ID
			$this->cms->deleteGeneralDataDouble('g_pph42_umkm', 'PPH42_ID', $this->input->post('pphID'), 'INCOME_ID', $this->input->post('incomeID'));

			// Update status di g_pph23 dan g_employee_income menjadi ON PROGRESS
			$updatePPH42 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'ON PROGRESS'
			);
			$this->cms->updateGeneralData('g_pph42', $updatePPH42, 'PPH42_ID', $this->input->post('pphID')); 
		} elseif ($key->STATUS == "LAPOR PAJAK" OR $key->STATUS  == "HARDCOPY" ) {
			//PEMBETULANN
			$processType='PEMBETULAN'; 

			foreach ($pphCheck->result() as $cekPPH42);
			$monthCheck = $cekPPH42->PERIOD_MONTH;
			$yearCheck = $cekPPH42->PERIOD_YEAR;
			$prevPPHVAL = $cekPPH42->COMPANY_PPHVAL;

			$pembetulanKe = $this->cms->cekpembetulan42($this->input->post('companyID'), $monthCheck, $yearCheck); 

			// Ubah dulu status lama jadi HISTORY
			$updateStatusPPH23 = array(
				'UPDATED'	=> date('Y-m-d H:i:s'),
				'STATUS'	=> 'HISTORY'
			);
			$this->cms->updateGeneralData('g_pph42', $updateStatusPPH42, 'PPH42_ID', $this->input->post('pphID')); 
		}

		if($processType=="REVISI") {
			$pphID = $this->input->post('pphID');
		}else {
			// Generate PPH ID baru
			$pphID = $this->incube->generateID(10);

			// Ambil data bulan dan tahun 
			foreach ($pphCheck->result() as $cekPPH42);
			$monthCheck = $cekPPH42->PERIOD_MONTH;
			$yearCheck = $cekPPH42->PERIOD_YEAR;

			$companyData = array(
				'PPH_ID'		=> $pphID,
				'COMPANY_ID'	=> $this->input->post('companyID'),
				'PERIOD_YEAR'	=> $yearCheck,
				'PERIOD_MONTH'	=> $monthCheck,
				'CREATED'		=> date('Y-m-d h:i:s'),
				'STATUS'		=> 'ON PROGRESS'
			);

			$queryInsert = $this->cms->insertGeneralData('g_pph42', $companyData); 
			
		}

		$employeeData = array(
			'INCOME_ID'                 		=> $incomeID,
			'COMPANY_ID'           				=> $this->input->post('companyID'),
			'PPH42_ID'							=> $pphID,  
			'UMKM_NTPN'							=> $ntpn, 
			'UMKM_TANGGAL_NTPN'					=> $tanggal_ntpn, 
			'UMKM_NAMA'							=> $nama, 
			'UMKM_NPWP'							=> $npwp, 
			'UMKM_NIK'							=> $nik, 
			'KODE_OBJEK_PAJAK42'				=> $kode_objek, 
			'NAMA_OBJEK_PAJAK42'				=> $jenis, 
			'UMKM_TANGGAL_SURAT_JALAN'			=> $tanggal_jalan, 
			'UMKM_NO_SURAT_JALAN'				=> $no_jalan, 
			'UMKM_TANGGAL_INVOICE'				=> $tanggal_invoice, 
			'UMKM_NO_INVOICE'					=> $no_invoice, 
			'UMKM_URAIAN'						=> $uraian, 
			'UMKM_BRUTO'						=> $bruto,
			'UMKM_TARIF_PAJAK'					=> $tarif_objek, 
			'UMKM_TOTAL_PPHVAL42'				=> $total_pph42, 
			'CREATED'							=> date('Y-m-d h:i:s'),
			'STATUS'							=> 'ON PROGRESS'
		);

		$this->cms->insertGeneralData('g_pph42_umkm', $employeeData);


		if($processType=="PEMBETULAN") {
			$this->cms->getCountDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('incomeID')); 

			$employeeNoEditData = $this->cms->getDataKaryawanNoEdit($this->input->post('pphID'), $this->input->post('incomeID'));
			foreach ($employeeNoEditData->result() as $employeeNoEdit) {
				$incomeID     = $this->incube->generateID(10);
				$databaru = array(
					'INCOME_ID'                 		=> $incomeID,
					'COMPANY_ID'           				=> $this->input->post('companyID'),
					'PPH42_ID'							=> $pphID,  
					'UMKM_NTPN'							=> $ntpn, 
					'UMKM_TANGGAL_NTPN'					=> $tanggal_ntpn, 
					'UMKM_NAMA'							=> $nama, 
					'UMKM_NPWP'							=> $npwp, 
					'UMKM_NIK'							=> $nik, 
					'KODE_OBJEK_PAJAK42'				=> $kode_objek, 
					'NAMA_OBJEK_PAJAK42'				=> $jenis, 
					'UMKM_TANGGAL_SURAT_JALAN'			=> $tanggal_jalan, 
					'UMKM_NO_SURAT_JALAN'				=> $no_jalan, 
					'UMKM_TANGGAL_INVOICE'				=> $tanggal_invoice, 
					'UMKM_NO_INVOICE'					=> $no_invoice, 
					'UMKM_URAIAN'						=> $uraian, 
					'UMKM_BRUTO'						=> $bruto,
					'UMKM_TARIF_PAJAK'					=> $tarif_objek, 
					'UMKM_TOTAL_PPHVAL42'				=> $total_pph42, 
					'CREATED'							=> date('Y-m-d h:i:s'),
					'STATUS'							=> 'ON PROGRESS'
				);
				$this->cms->insertGeneralData('g_pph42_umkm', $databaru);
			}

			// Update status karyawan dengan pph lama yang tidak di edit menjadi history
			foreach ($employeeNoEditData as $employeeNoEditUpdate) {
				$datalamaupdate = array(
					'STATUS'	=> 'HISTORY'
				);
				$this->cms->updateGeneralData('g_pph42', $datalamaupdate, 'PPH42_ID', $this->input->post('pphID')); 
			}
			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph42($pphID); 
		}

		if($processType == 'REVISI'){
			$pphID = $this->input->post('pphID');

			// Cek Company Bruto kembali yang sudah diubah
			$this->update_g_pph42($pphID); 
		}
		

		redirect('pph_42/bulan/summary/umkm?pid='. $pphID . '&cid=' . $this->input->post('companyID'). '&mid=' . $this->input->post('monthID'). '&yid=' . $this->input->post('yearID'));
	}


	public function update_g_pph42($pphid)
	{ 
		// ------------------------------------------ UPDATE COUNT ALL DPP AND PHH 22
		$all_dpp_pph42 = $this->cms->editPPH42($pphid);
		foreach ($all_dpp_pph42->result() as $all);
		$updatePPH42 = array(
			'COMPANY_PPHVAL42' 	=> $all->TOTAL_PPH42_ALL, 
			'UPDATED'			=> date('Y-m-d H:i:s'),
			'STATUS'			=> 'ON PROGRESS'
		);
		$this->cms->updateGeneralData('g_pph42', $updatePPH42, 'PPH42_ID', $pphid);
		// ------------------------------------------------------------------------- 
	}

	public function aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/pph42_aktifitas_pajak');
	}

	public function edit_aktifitas_pajak()
	{
		$this->load->view('cms/hitung_pajak/edit_status_aktifitas_pajak');
	}
}
