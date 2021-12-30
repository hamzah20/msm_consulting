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
        $data['company']  = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $this->input->get('cid'));
        $data['employee'] = $this->cms->getSingularData('g_employee', 'EMPLOYEE_COMPANY_ID', $this->input->get('cid'));
        $data['counter']  = 1;

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

    public function editEmployee()
    {
        $dataUpdate = array(
            'EMPLOYEE_ORDER_NO'             => $this->input->post('employeeOrderNo'),
            'EMPLOYEE_NAME'                 => $this->input->post('employeeName'),
            'EMPLOYEE_KTP'                  => $this->input->post('employeeKTP'),
            'EMPLOYEE_PTKP_STATUS'          => $this->input->post('employeePTKPStatus'),
            'EMPLOYEE_EFIN'                 => $this->input->post('employeeEFIN'),
            'EMPLOYEE_NPWP_STATUS'          => $this->input->post('employeeNPWPStatus'),
            'EMPLOYEE_NPWP'                 => $this->input->post('employeeNPWP'),
            'EMPLOYEE_INTERNAL_ID'          => $this->input->post('employeeInternalID'),
            'EMPLOYEE_POSITION'             => $this->input->post('employeePosition'),
            'EMPLOYEE_WORK_START'           => $this->input->post('employeeDateBegin'),
            'EMPLOYEE_WORK_END'             => $this->input->post('employeeDateEnd'),
            'EMPLOYEE_NATIONALITY'          => $this->input->post('employeeNationality'),
            'EMPLOYEE_NATIONALITY_STATUS'   => $this->input->post('employeeType'),
            'EMPLOYEE_GENDER'               => $this->input->post('employeeGender'),
            'EMPLOYEE_ADDRESS'              => $this->input->post('employeeAddress'),
            'EMPLOYEE_PHONE'                => $this->input->post('employeePhone'),
            'EMPLOYEE_EMAIL'                => $this->input->post('employeeEmail'), 
            'UPDATED'                       => date('Y-m-d h:i:s')
        );

        $queryUpdate = $this->cms->updateGeneralData('g_employee', $dataUpdate, 'EMPLOYEE_ID', $this->input->post('employeeID'));

        if ($queryUpdate) {
            $this->session->set_flashdata('employee_update', 'success');
            redirect(base_url('employee/edit?eid=' . $this->input->post('employeeID')));
        } else {
            $this->session->set_flashdata('employee_update', 'error');
            redirect(base_url('employee/edit?eid=' . $this->input->post('employeeID')));
        }

        // public function updateGeneralData($table, $data, $filter, $query)

    }

    public function deleteEmployee()
    {
        // $this->output->enable_profiler(TRUE);

        //kalo udah ada employee income gabisa dihapus
        $getEmployeeIncome = $this->cms->getSingularData('g_employee_income', 'EMPLOYEE_ID', $this->input->post('employeeID'));
        if ($getEmployeeIncome->num_rows() == 0) {

            header('Content-Type: application/json');
            $cid = $this->cms->getSingularData('g_employee', 'EMPLOYEE_ID', $this->input->post('employeeID'))->row()->EMPLOYEE_COMPANY_ID;
            $queryDelete = $this->cms->deleteGeneralData('g_employee', 'EMPLOYEE_ID', $this->input->post('employeeID'));
            $redir = 'detail?cid='.$cid;

            if ($queryDelete) {
                echo json_encode(array(
                    'code'      => 200,
                    'status'    => 'success',
                    'redir'  => $redir,
                ));
            } else {
                echo json_encode(array(
                    'code'      => 204,
                    'status'    => 'error',
                ));
            }

        }else{
            echo json_encode(array(
                'code'      => 204,
                'status'    => 'error',
            ));
        }
        
    }

    public function importXLSLFile()
    {

        //Ambil kode negara & kode PTKP
        $queryPTKP      = $this->cms->getGeneralList('m_ptkp');
        $queryCountry   = $this->cms->getGeneralList('m_country');

        $ptkppArr   = [];
        $countryArr = [];
        $errArr     = [];

        foreach ($queryPTKP->result() as $ptkp) {
            array_push($ptkppArr, $ptkp->TK_ID);
        }

        foreach ($queryCountry->result() as $country) {
            array_push($countryArr, $country->COUNTRY_DESC);
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


        //Tampung data ke array buat diproses
        $npwpTest       = [];
        $ktpTest        = [];
        $ptkpTest       = [];
        $countryTest    = [];
        $genderTest     = [];
        $ekspatTest     = [];

        foreach ($sheet as $sheetData) {
            array_push($npwpTest, $sheetData['D']);
            array_push($ktpTest, $sheetData['E']);
            array_push($ptkpTest, $sheetData['I']);
            array_push($countryTest, $sheetData['K']);
            array_push($genderTest, $sheetData['G']);
            array_push($ekspatTest, $sheetData['J']);
        }

        if (sizeof($npwpTest) != 0) {
            $npwpRes        = $this->incube->checkNPWPFormat($npwpTest);

            foreach ($npwpRes as $value) {
                $errMsg = 'Kolom ' . $value['counter'] . ' masih belum sesuai format NPWP. Nomor harus berjumlah 16 digit.';
                array_push($errArr, $errMsg);
            }
        }

        if (sizeof($ktpTest) != 0) {
            $ktpRes         = $this->incube->checkKTPFormat($ktpTest);

            foreach ($ktpRes as $value) {
                $errMsg = 'Kolom ' . $value['counter'] . ' masih belum sesuai format KTP. Nomor harus berjumlah 16 digit.';
                array_push($errArr, $errMsg);
            }
        }

        if (sizeof($ptkpTest) != 0) {
            $ptkpRes        = $this->incube->checkPTKPFormat($ptkppArr, $ptkpTest);

            foreach ($ptkpRes as $value) {
                $errMsg = 'Kolom ' . $value['counter'] . ' masih belum sesuai format PTKP. Contoh (TK-0, TK-1, K-1)';
                array_push($errArr, $errMsg);
            }
        }

        if (sizeof($countryTest) != 0) {
            $countryRes     = $this->incube->checkCountryFormat($countryArr, $countryTest);

            foreach ($countryRes as $value) {
                $errMsg = 'Kolom ' . $value['counter'] . ' masih belum sesuai format Negara Asal. Contoh: (Indonesia, Amerika Serikat, Brazil)';
                array_push($errArr, $errMsg);
            }
        }

        if (sizeof($genderTest) != 0) {
            $genderRes      = $this->incube->checkGenderFormat($genderTest);

            foreach ($genderRes as $value) {
                $errMsg = 'Kolom ' . $value['counter'] . ' masih belum sesuai format Jenis Kelamin. Contoh: (Pria, Wanita)';
                array_push($errArr, $errMsg);
            }
        }


        if (sizeof($ekspatTest) != 0) {
            $expatRes       = $this->incube->checkExpatFormat($ekspatTest);

            foreach ($expatRes as $value) {
                $errMsg = 'Kolom ' . $value['counter'] . ' masih belum sesuai format. Contoh: (Lokal, Ekspatriat)';
                array_push($errArr, $errMsg);
            }
        }

        // header('Content-Type: application/json');
        // echo json_encode($errArr);

        if (sizeof($errArr) != 0) {
            $this->session->set_flashdata('import_err', $errArr);
            redirect(base_url('employee/detail?cid=' . $this->input->post('companyID')));

            return;
        }

        //Kalau datanya aman, tambahin ke database
        $employeeCounter = 0;

        foreach ($sheet as $sheetData) {

            $employee_db = $this->cms->getSingularData('g_employee', 'EMPLOYEE_ORDER_NO', $sheetData['B']);

            if ($employee_db->num_rows() == 1) {
                $employeeOrder  = $employee_db->row()->EMPLOYEE_ORDER_NO;
                $employeeID  = $employee_db->row()->EMPLOYEE_ID;
                $update_db = true;
            }else{
                $employeeOrder  = $this->general->generateID('EMPLOYEE');
                $employeeID     = $this->incube->generateID(10);
                $incomeID       = $this->incube->generateID(10);
                $update_db = false;
            }

            $employeeData = array(
                'EMPLOYEE_COMPANY_ID'           => $this->input->post('companyID'),
                'EMPLOYEE_ID'                   => $employeeID,
                'EMPLOYEE_ORDER_NO'             => $employeeOrder,
                'EMPLOYEE_NAME'                 => $sheetData['C'],
                'EMPLOYEE_KTP'                  => $sheetData['E'],
                'EMPLOYEE_PTKP_STATUS'          => $sheetData['I'],
                'EMPLOYEE_NPWP_STATUS'          => ($sheetData['D'] != null ? 'true' : 'false'),
                'EMPLOYEE_NPWP'                 => ($sheetData['D'] != null ? $sheetData['D'] : '-'),
                'EMPLOYEE_INTERNAL_ID'          => $sheetData['B'],
                'EMPLOYEE_POSITION'             => $sheetData['H'],
                'EMPLOYEE_WORK_START'           => $sheetData['L'],
                'EMPLOYEE_WORK_END'             => $sheetData['M'],
                'EMPLOYEE_NATIONALITY'          => $sheetData['K'],
                'EMPLOYEE_NATIONALITY_STATUS'   => $sheetData['J'],
                'EMPLOYEE_GENDER'               => $sheetData['G'],
                'EMPLOYEE_ADDRESS'              => $sheetData['F'],
                'CREATED'                       => date('Y-m-d h:i:s'),
                'STATUS'                        => 'ACTIVE',
            );

            if ($update_db == true) {
                $queryEmployee  = $this->cms->updateGeneralData('g_employee', $employeeData, 'EMPLOYEE_ID', $employeeID);
            }else{
                $queryEmployee  = $this->cms->insertGeneralData('g_employee', $employeeData);
            };

            if ($queryEmployee) {
                $employeeCounter++;
            }
        }


        $this->session->set_flashdata('import_success', $employeeCounter);
        redirect(base_url('employee/detail?cid=' . $this->input->post('companyID')));

        return;
    }

    public function generateXLSFile()
    {
        $phpExcel = new Spreadsheet();

        $companyID      = $this->input->get('companyID');

        $companyData    = $this->cms->getSingularData('v_g_companies', 'COMPANY_ID', $companyID);
        $employeeData   = $this->cms->getSingularData('g_employee', 'EMPLOYEE_COMPANY_ID', $companyID);

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


        $sheet->setCellValue('N1', 'Kode Objek Pajak');
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
                $sheet->setCellValue('J' . $colCounter, $employee->EMPLOYEE_NATIONALITY_STATUS);
                $sheet->setCellValue('K' . $colCounter, $employee->EMPLOYEE_NATIONALITY);
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
