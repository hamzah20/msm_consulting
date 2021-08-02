<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('welcome_message');
    }

    public function download() {
// Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $objPHPExcel = new PHPExcel();
        //Set document properties
        $objPHPExcel->getProperties()->setCreator("Maghfur")
                ->setLastModifiedBy("Maghfur")
                ->setTitle("Belajar Membuat File Excel 2")
                ->setSubject("Belajar Membuat File Excel 2")
                ->setDescription("Belajar membuat file excel dengan data dari database menggunakan library PHPExcel di Codeigniter")
                ->setKeywords("PHPExcel library Codeigniter excel Database")
                ->setCategory("belajar library php");
        //Set default font style and size
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')
                ->setSize(10);
        // $objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, 'Hello World');
        // Langkah 2
        $db = $this->db->get('mahasiswa')->result();
        $baris = 1;
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $baris, 'No.');
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, 'NIM');
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, 'Nama Mahasiswa');
        /*
          $no = 0;
          foreach ($db as $value) {
          $baris++;
          $no++;
          $objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $no);
          $objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $value->nim);
          $objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $value->nama);
          }
         */
        $objPHPExcel->getActiveSheet()->setCellValue('A' . '2', '$no');
        $objPHPExcel->getActiveSheet()->setCellValue('B' . '2', '$value->nim');
        $objPHPExcel->getActiveSheet()->setCellValue('C' . '2', '$value->nama');
        // End Langkah 2
        // Simpan file ke tmp_folder
        // $fileName = 'belajar1.xlsx';
        $fileName = 'belajar2.xlsx';
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=' . $fileName);
        $objWriter->save("php://output");
    }

    public function excel() {
        $e = $_FILES['excel']['name'];
        $x = explode(".", $e);
        $ekstensi = strtolower(end($x));
        $fileName = "tmp_" . date('d-m-Y_H:i:s') . "." . $ekstensi;

        $config['upload_path'] = './assets/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 3000;
        $config['file_name'] = $fileName;
        $config['detect_mime'] = false;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('excel')) {
            $inputFileName = './assets/' . $fileName;

            // Load plugin PHPExcel nya
            include APPPATH . 'libraries/PHPExcel.php';

            $excelreader = new PHPExcel_Reader_Excel2007();

            $loadexcel = $excelreader->load($inputFileName); // Load file yang telah diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
            $data = array();

            $numrow = 1;
            $perulangan = 0;
            foreach ($sheet as $rowData) {
                if ($numrow > 1) {
                    if (!empty(addslashes($rowData['A']))) {
                        $data[$perulangan] = array('nim' => $rowData['A'],
                            'nama' => $rowData['B']);
                        $perulangan++;
                    }
                }
                $numrow++;
            }
            if ($this->db->insert_batch('mahasiswa', $data)) {
                echo json_encode('1');
            } else {
                echo json_encode('0');
            }
            // End format inputan lengkap
            unlink('./assets/' . $fileName);
        }
    }

    public function tampil() {
        $data = $this->db->get('mahasiswa')->result();
        echo json_encode($data);
    }

}
