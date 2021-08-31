<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mysqlScript()
    {
        //1. Insert S_GROUP_APPL SCRIPT
        $no = 0;

        $this->db->select('*');
        $this->db->from('s_appl');

        $queryGet = $this->db->get();

        foreach ($queryGet->result() as $apps) {


            $insertArray = array(
                'GROUP_ID'  => 'ADMIN',
                'APPL_ID'   => $apps->ID,
                'ROLE'      => 'VIEW;ADD;EDIT;DELETE;UPLOAD',
                'ID'        => $no++
            );

            $this->db->insert('s_group_appl', $insertArray);
        }
        //EoL 1
    }

    public function getAllCompany()
    {
        header('Content-Type: application/json');

        //1. Ambil semua data dari table g_company buat ditampilin
        $this->db->select('COMPANY_NAME, COMPANY_ID')
            ->from('v_g_companies');

        $queryGet = $this->db->get();

        if ($queryGet->num_rows() == 0) {
            echo json_encode(array(
                'code'      => 204,
                'status'    => 'empty array',
            ));

            return;
        }

        $jsonEncode = json_encode($queryGet->result());

        echo json_encode(array(
            'code'      => 200,
            'status'    => 'success',
            'data'      => json_decode($jsonEncode)
        ));
        //EoL 1
    }
}
