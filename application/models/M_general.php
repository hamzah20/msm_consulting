<?php class M_general extends CI_Model
{
    function getiklanid()
    {
        $this->db->from('g_company')
            ->order_by('COMPANY_NO', 'DESC')
            ->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $ads_id = $query->first_row()->COMPANY_NO;
            return $ads_id;
        } else {
            $ads_id = '0';
            return $ads_id;
        }
    }

    function getEmployeeID()
    {
        $this->db->from('g_employee')
            ->order_by('EMPLOYEE_ORDER_NO', 'DESC')
            ->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $ads_id = $query->first_row()->EMPLOYEE_ORDER_NO;
            return $ads_id;
        } else {
            $ads_id = '0';
            return $ads_id;
        }
    }

    function getTaxOfficeID()
    {
        $this->db->from('g_tax_office')
            ->order_by('OFFICE_NO', 'DESC')
            ->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $ads_id = $query->first_row()->OFFICE_NO;
            return $ads_id;
        } else {
            $ads_id = '0';
            return $ads_id;
        }
    }

    function getVendorsID()
    {
        $this->db->from('g_vendors')
            ->order_by('VENDOR_NO', 'DESC')
            ->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $ads_id = $query->first_row()->VENDOR_NO;
            return $ads_id;
        } else {
            $ads_id = '0';
            return $ads_id;
        }
    }

    function getMSMID()
    {
        $this->db->from('g_msm_group')
            ->order_by('MSMGROUP_NO', 'DESC')
            ->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $ads_id = $query->first_row()->MSMGROUP_NO;
            return $ads_id;
        } else {
            $ads_id = '0';
            return $ads_id;
        }
    }

    function getTransaksiID()
    {
        $this->db->from('g_transaction_profile')
            ->order_by('TRANSACTION_ID', 'DESC')
            ->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $ads_id = $query->first_row()->TRANSACTION_ID;
            return $ads_id;
        } else {
            $ads_id = '0';
            return $ads_id;
        }
    }

    function generateID($type)
    {
        if ($type == 'EMPLOYEE') {

            $ads_id = $this->getEmployeeID();

            if ($ads_id == '0') {
                $last_ads_id = 1;
            } else {

                $last_ads_id = intval(substr($ads_id, -6)) + 1;
            }

            $new_ads_id = "EMP" . date("ym") . str_pad(strval($last_ads_id), 6, "0", STR_PAD_LEFT);
        } else if ($type == 'COMPANY') {

            $ads_id = $this->getiklanid();

            if ($ads_id == '0') {
                $last_ads_id = 1;
            } else {

                $last_ads_id = intval(substr($ads_id, -6)) + 1;
            }

            $new_ads_id = "MSM" . date("ym") . str_pad(strval($last_ads_id), 6, "0", STR_PAD_LEFT);
        } else if ($type == 'TAX_OFFICE') {

            $ads_id = $this->getTaxOfficeID();

            if ($ads_id == '0') {
                $last_ads_id = 1;
            } else {

                $last_ads_id = intval(substr($ads_id, -6)) + 1;
            }

            $new_ads_id = "TAX" . date("ym") . str_pad(strval($last_ads_id), 6, "0", STR_PAD_LEFT);
        } else if ($type == 'VENDORS') {

            $ads_id = $this->getVendorsID();

            if ($ads_id == '0') {
                $last_ads_id = 1;
            } else {

                $last_ads_id = intval(substr($ads_id, -6)) + 1;
            }

            $new_ads_id = "VEN" . date("ym") . str_pad(strval($last_ads_id), 6, "0", STR_PAD_LEFT);
        } else if ($type == 'MSM_GROUP') {

            $ads_id = $this->getMSMID();

            if ($ads_id == '0') {
                $last_ads_id = 1;
            } else {

                $last_ads_id = intval(substr($ads_id, -6)) + 1;
            }

            $new_ads_id = "MSG" . date("ym") . str_pad(strval($last_ads_id), 6, "0", STR_PAD_LEFT);
        } else if ($type == 'TRANSACTION') {

            $ads_id = $this->getTransaksiID();

            if ($ads_id == '0') {
                $last_ads_id = 1;
            } else {

                $last_ads_id = intval(substr($ads_id, -6)) + 1;
            }

            $new_ads_id = "TRA" . date("ym") . str_pad(strval($last_ads_id), 6, "0", STR_PAD_LEFT);
        }

        return $new_ads_id;
    }
}
