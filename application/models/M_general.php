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
        }

        return $new_ads_id;
    }
}
