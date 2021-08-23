<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
    }


    // KARYAWAN
    public function index()
    {
        $data['companies'] = $this->cms->getGeneralList('v_g_companies');
        $data['counter']   = 1;

        $this->load->view('cms/employee/karyawan', $data);
    }

    public function karyawan_perusahaan()
    {
        $data['company'] = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));
        $data['employee'] = $this->cms->getSingularData('g_employee', 'EMPLOYEE_COMPANY_ID', $this->input->get('cid'));
        $data['counter']   = 1;

        if ($data['company']->num_rows() == 0) {
            $this->session->set_flashdata('query', 'invalid');
            redirect('employee');
        } else {
            $this->load->view('cms/employee/karyawan_perusahaan', $data);
        }
    }

    public function edit_karyawan_perusahaan()
    {
        $data['employee'] = $this->cms->getSingularData('g_employee', 'EMPLOYEE_ID', $this->input->get('eid'));
        $data['ptkp']     = $this->cms->getGeneralList('m_ptkp');

        if ($data['employee']->num_rows() == 0) {
            $this->session->set_flashdata('query', 'invalid');
            redirect('employee');
        } else {
            $this->load->view('cms/employee/edit_karyawan_perusahaan', $data);
        }
    }

    public function getEmployeeData()
    {
        $employeeCheck = $this->cms->getSingularData('g_employee', 'EMPLOYEE_ID', $this->input->post('employeeID'));

        if ($employeeCheck->num_rows() == 0) {

            header('Content-Type: application/json');

            echo json_encode(array(
                'code'      => 204,
                'status'    => 'invalid id'
            ));

            return;
        }

        header('Content-Type: application/json');

        $encodeResult = json_encode($employeeCheck->result());

        echo json_encode(array(
            'code'      => 200,
            'status'    => 'success',
            'message'   => json_decode($encodeResult)
        ));
    }

    public function addEmployee()
    {
        // $this->output->enable_profiler(TRUE);

        //1. Cek company ID yang dikirim bener atau engga
        $companyCheck = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->post('companyID'));

        if ($companyCheck->num_rows() == 0) {
            $this->session->set_flashdata('query', 'company_error');
            redirect('employee');
            return;
        }
        //EoL 1.

        //2. Tambah data employee ke database
        $companyOrder = $this->general->generateID('EMPLOYEE');
        $companyID    = $this->incube->generateID(10);

        $companyArr = array(
            'EMPLOYEE_ORDER_NO'         => $companyOrder,
            'EMPLOYEE_COMPANY_ID'       => $this->input->post('companyID'),
            'EMPLOYEE_ID'               => $companyID,
            'EMPLOYEE_NAME'             => $this->input->post('nama_karyawan'),
            'CREATED'                   => date('Y-m-d h:i:s'),
            'STATUS'                    => 'ACTIVE',
        );

        $this->db->trans_begin();

        $this->cms->insertGeneralData('g_employee', $companyArr);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('query', 'error');
            redirect('employee/detail?cid=' . $this->input->post('companyID'));
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('query', 'success');
            redirect('employee/detail?cid=' . $this->input->post('companyID'));
        }
        //EoL 2.
    }

    public function importXLSLFile()
    {
        $this->output->enable_profiler(TRUE);

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

        $npwpRegex = '/^[0-9]{2}.[0-9]{3}.[0-9]{3}.[0-9]{1}-[0-9]{3}.[0-9]{3}$/';
        $ktpRegex = '/^[0-9]{16}$/';

        $npwpTest = [
            '99.456.456.8-456.789',
            '99.456.456.8-456789',
            '99.456.48-4789'
        ];

        $ktpTest = [
            '12345678945',
            '987654321544784',
            '12345678912134567',
            '1234567891234567',
            '12345678912134567441234',
            '1d2d2456789121dwadajilj41234',
        ];

        //Temporary store the match
        $npwpMatch = [];
        $ktpMatch = [];

        foreach ($ktpTest as $ktp) {
            $formatCheck = preg_match($ktpRegex, $ktp);

            if ($formatCheck != 1) {
                // $match[] = $id;
                array_push($ktpMatch, $ktp);
            }
        }

        foreach ($npwpTest as $id) {

            $formatCheck = preg_match($npwpRegex, $id);

            if ($formatCheck != 1) {
                // $match[] = $id;
                array_push($npwpMatch, $id);
            }
        }

        var_dump($npwpMatch);
        var_dump($ktpMatch);


        // var_dump($sheet);
    }

    public function generateXLSFile()
    {
        $phpExcel = new Spreadsheet();

        $companyData = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', 'f2fcaf2c41');
        $employeeData = $this->cms->getSingularData('g_employee', 'EMPLOYEE_COMPANY_ID', '3241234123');

        $fileName = 'FORMAT_PEGAWAI_' . $companyData->row()->COMPANY_NAME . '_' . date('ymd') . '.xlsx';

        //1. Format dasar PHPExcel
        $sheet = $phpExcel->getActiveSheet();

        $phpExcel->getProperties()
            ->setCreator('MSM Consulting')
            ->setLastModifiedBy('MSM Consulting')
            ->setTitle('MSM Consulting Employee Form')
            ->setSubject('MSM Consulting Employee Form');

        $phpExcel->setActiveSheetIndex(0)->setTitle('FormatData Karyawan (Pegawai)');

        $sheet->setCellValue('A1', "No");
        $sheet->mergeCells('A1:A2');
        $sheet->getStyle('A1:A2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);

        $sheet->setCellValue('B1', "No. Urut Karyawan\n(Pegawai)");
        $sheet->mergeCells('B1:B2');
        $sheet->getStyle('B1:B2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);

        $sheet->setCellValue('C1', "Nama");
        $sheet->mergeCells('C1:C2');
        $sheet->getStyle('C1:C2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);

        $sheet->setCellValue('D1', 'NPWP');
        $sheet->mergeCells('D1:D2');
        $sheet->getStyle('D1:D2')->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);

        $sheet->setCellValue('E1', "NIK/Nmr.\nPassport");
        $sheet->mergeCells('E1:E2');
        $sheet->getStyle('E1:E2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);


        $sheet->setCelLValue('F1', 'Alamat');
        $sheet->mergeCells('F1:F2');
        $sheet->getStyle('F1:F2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);


        $sheet->setCellValue('G1', 'Jenis Kelamin');
        $sheet->mergeCells('G1:G2');
        $sheet->getStyle('G1:G2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);


        $sheet->setCellValue('H1', 'Jabatan');
        $sheet->mergeCells('H1:H2');
        $sheet->getStyle('H1:H2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);


        $sheet->setCellValue('I1', "Status\n/Tanggungan");
        $sheet->mergeCells('I1:I2');
        $sheet->getStyle('I1:I2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);


        $sheet->setCellValue('J1', "Lokal\n/Ekspatriat");
        $sheet->mergeCells('J1:J2');
        $sheet->getStyle('J1:J2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);

        $sheet->setCellValue('K1', 'Negara Domisili');
        $sheet->mergeCells('K1:K2');
        $sheet->getStyle('K1:K2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);


        $sheet->setCellValue('L1', "Periode Awal Kerja\n<YYYY-MM-DD>");
        $sheet->mergeCells('L1:L2');
        $sheet->getStyle('L1:L2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);


        $sheet->setCellValue('M1', "Periode Akhir Kerja\n<YYYY-MM-DD>");
        $sheet->mergeCells('M1:M2');
        $sheet->getStyle('M1:M2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);


        $sheet->setCellValue('N1', 'Kode Object Pajak');
        $sheet->mergeCells('N1:N2');
        $sheet->getStyle('N1:N2')
            ->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
            ->setWrapText(true);

        $phpExcel->getActiveSheet()
            ->getStyle('A1:N2')
            ->getFont()->getColor()->setRGB('ffffff');

        $phpExcel->getActiveSheet()
            ->getStyle('A1:N2')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('000066');

        foreach (range('B', 'Z') as $columnID) {
            $phpExcel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        //EoL 1

        //2. Isi Excel pake data
        if ($employeeData->num_rows() != 0) {

            $colCounter = 3;
            $numCounter = 1;

            foreach ($employeeData->result() as $employee) {

                $sheet->setCellValue('A' . $colCounter, $numCounter);
                $sheet->setCellValue('B' . $colCounter, $employee->EMPLOYEE_ORDER_NO);
                $sheet->setCellValue('C' . $colCounter, $employee->EMPLOYEE_NAME);
                $sheet->setCellValue('D' . $colCounter, $employee->EMPLOYEE_NPWP);
                $sheet->setCellValue('E' . $colCounter, $employee->EMPLOYEE_KTP);
                $sheet->setCellValue('F' . $colCounter, $employee->EMPLOYEE_ADDRESS);
                $sheet->setCellValue('G' . $colCounter, $employee->EMPLOYEE_GENDER);
                $sheet->setCellValue('H' . $colCounter, $employee->EMPLOYEE_POSITION);
                $sheet->setCellValue('I' . $colCounter, $employee->EMPLOYEE_PTKP_STATUS);
                $sheet->setCellValue('J' . $colCounter, $employee->NATIONALITY_STATUS);
                $sheet->setCellValue('K' . $colCounter, $employee->NATIONALITY);
                $sheet->setCellValue('L' . $colCounter, $employee->EMPLOYEE_WORK_START);
                $sheet->setCellValue('M' . $colCounter, $employee->EMPLOYEE_WORK_END);
                $sheet->setCellValue('N' . $colCounter, $employee->EMPLOYEE_WORK_END);

                $colCounter++;
                $numCounter++;
            }
        } else {
            //2.1 Isi pake data template

            $sheet->setCellValue('A3', "1");
            $sheet->setCellValue('B3', "EMPORDERNUMBER-001");
            $sheet->setCellValue('C3', "Nama Karyawan");
            $sheet->setCellValue('D3', "99.999.999.9-999.999");
            $sheet->setCellValue('E3', "123456789");
            $sheet->setCellValue('F3', "Alamat Rumah Karyawan");
            $sheet->setCellValue('G3', "Pria \ Wanita");
            $sheet->setCellValue('H3', "Posisi Karyawan Saat Ini");
            $sheet->setCellValue('I3', "TK-0 / TK-1 / TK-2 . . .");
            $sheet->setCellValue('J3', "Lokal / Ekspatriat");
            $sheet->setCellValue('K3', "Indonesia / Australia / Singapura . . .");
            $sheet->setCellValue('L3', "2021-01-01");
            $sheet->setCellValue('M3', "2021-01-31");
            $sheet->setCellValue('N3', "");

            $phpExcel->getActiveSheet()
                ->getStyle('A3:N3')
                ->getFont()
                ->setItalic(true)
                ->setBold(true);

            $sheet->getStyle('A3:N3')
                ->getAlignment()
                ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                ->setWrapText(true);

            $phpExcel->getActiveSheet()
                ->getStyle('A3:N3')
                ->getFont()
                ->getColor()
                ->setARGB('A9A9A9');
            //EoL 2.1
        }
        //EoL 2


        $writer = new Xlsx($phpExcel);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
        ob_end_clean();

        $output = $writer->save('php://output');
    }
}
