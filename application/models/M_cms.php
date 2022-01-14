<?php class M_cms extends CI_Model
{
    public function getGeneralList($table)
    {
        $this->db->select('*')
            ->from($table);

        $query = $this->db->get();

        return $query;
    }

    public function getSingularData($table, $column, $data)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column, $data);

        $query = $this->db->get();

        return $query;
    }

    public function getSingularDataLimit($table, $column, $data, $limit, $start)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column, $data)
            ->limit($limit,$start);

        $query = $this->db->get();

        return $query;
    }

    public function getSingularDataPayment($table, $column1, $data1, $column2, $data2, $column3, $data3)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column1, $data1)
            ->where($column2, $data2)
            ->where($column3, $data3)
            ->order_by("REC_ID", "desc");

        $query = $this->db->get();

        return $query;
    }

    public function getSingularDataDetail($table, $column1, $column2, $data1, $data2)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column1, $data1) /* COMPANY ID */
            ->where($column2, $data2); /* DOC ID */

        $query = $this->db->get();

        return $query;
    }
    
    public function getSingularDataTriple($table, $column1, $column2,$column3, $data1, $data2,$data3)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column1, $data1) /* COMPANY ID */
            ->where($column2, $data2) /* DOC ID */
            ->where($column3, $data3); /* DOC ID */

        $query = $this->db->get();

        return $query;
    }

    public function getSingularDataTripleOrder($table, $column1, $column2,$column3, $data1, $data2,$data3)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column1, $data1) /* COMPANY ID */
            ->where($column2, $data2) /* DOC ID */
            ->where($column3, $data3) /* DOC ID */
            ->order_by("REC_ID", "ASC");

        $query = $this->db->get();

        return $query;
    }

    public function getSingularDataFour($table, $column1, $column2,$column3, $column4, $data1, $data2,$data3, $data4)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column1, $data1) /* COMPANY ID */
            ->where($column2, $data2) /* DOC ID */
            ->where($column3, $data3) /* DOC ID */
            ->where($column4, $data4); /* DOC ID */

        $query = $this->db->get();

        return $query;
    }

    public function getGeneralData($table, $field, $query)
    {
        $this->db->select('*')
            ->from($table)
            ->where($field, $query);

        $query = $this->db->get();

        return $query;
    }

    public function insertGeneralData($table, $data)
    {
        $query = $this->db->insert($table, $data);

        return $query;
    }

    public function deleteGeneralData($table, $filter, $query)
    {
        $query = $this->db->where($filter, $query)
            ->delete($table);

        return $query;
    }

    public function deleteGeneralDataDouble($table, $filter1, $query1, $filter2, $query2)
    {
        $query = $this->db->where($filter1, $query1)
                          ->where($filter2, $query2)
                          ->delete($table);

        return $query;
    }

    public function deleteGeneralDataFour($table, $filter1, $filter2, $filter3, $filter4, $query1, $query2, $query3,$query4)
    {
        $query = $this->db->where($filter1, $query1)
                          ->where($filter2, $query2)
                          ->where($filter3, $query3)
                          ->where($filter4, $query4)
                          ->delete($table);

        return $query;
    }

    public function updateGeneralData($table, $data, $filter, $query)
    {
        $this->db->where($filter, $query);

        $query = $this->db->update($table, $data);

        return $query;
    }

    public function updateGeneralDataDouble($table, $data, $filter1, $query1, $filter2, $query2)
    {
        $this->db->where($filter1, $query1);
        $this->db->where($filter2, $query2);

        $query = $this->db->update($table, $data);

        return $query;
    }

    public function updateGeneralDataTriple($table, $data, $filter1, $query1, $filter2, $query2, $filter3, $query3)
    {
        $this->db->where($filter1, $query1);
        $this->db->where($filter2, $query2);
        $this->db->where($filter3, $query3);

        $query = $this->db->update($table, $data);

        return $query;
    }

    public function updateGeneralDataFour($table, $data, $filter1, $query1, $filter2, $query2, $filter3, $query3, $filter4, $query4)
    {
        $this->db->where($filter1, $query1);
        $this->db->where($filter2, $query2);
        $this->db->where($filter3, $query3);
        $this->db->where($filter4, $query4);

        $query = $this->db->update($table, $data);

        return $query;
    }

    public function checkShowPayment()
    {

    }

    public function getHeadingSidebar($groupID)
    {
        $this->db->distinct()
            ->select('s_appl_parent.ID, s_appl_parent.NAME, s_appl_parent.DESCRIPTION as ICON,  s_appl_parent.ORDER_NO as ORDER, s_appl.APPL_PARENT_ID as PARENT')
            ->from('s_group_appl')
            ->join('s_appl', 's_group_appl.APPL_ID = s_appl.ID', 'inner')
            ->join('s_appl_group', 's_appl.APPL_GROUP_ID = s_appl_group.ID', 'inner')
            ->join('s_appl_parent', 's_appl.APPL_PARENT_ID = s_appl_parent.ID', 'inner')
            ->where('GROUP_ID', $groupID)
            ->order_by('ORDER', 'ASC');

        $query = $this->db->get();

        return $query;
    }

    public function getParentSidebar($groupID, $parentID)
    {
        $this->db->distinct()
            ->select('s_appl_group.ID, s_appl_group.NAME, s_appl_group.ORDER_NO as ORDER, s_appl_group.DESCRIPTION as ICON')
            ->from('s_group_appl')
            ->join('s_appl', 's_group_appl.APPL_ID = s_appl.ID', 'inner')
            ->join('s_appl_group', 's_appl.APPL_GROUP_ID = s_appl_group.ID', 'inner')
            ->join('s_appl_parent', 's_appl.APPL_PARENT_ID = s_appl_parent.ID', 'inner')
            ->where('GROUP_ID', $groupID)
            ->where('s_appl.APPL_PARENT_ID', $parentID)
            ->order_by('s_appl_group.ORDER_NO', 'ASC');

        $query = $this->db->get();

        return $query;
    } 

    public function kblbFix($pphID,$total,$total_paid)
    {
        // $sql = $this->db->query("SELECT ".$total." - ".$total_paid." AS OWED_FIX_TOTAL FROM `g_payment`  WHERE PPH_ID='".$pphID."'");
        // return $sql;

        // $sql = $sql = $this->db->query("SELECT COUNT(".$total." - ".$total_paid.") AS OWED_FIX_TOTAL FROM `g_payment`  WHERE PPH_ID='".$pphID."'");
        $sql = $sql = $this->db->query("SELECT ".$total." - ".$total_paid." AS KBLB_FIX_TOTAL FROM `g_payment` WHERE PPH_ID='".$pphID."'");
        return $sql;
    }

    public function totalPayment($comID,$years,$month)
    {
        $sql = $this->db->query("SELECT SUM(PAID_PPH21) AS PAID_PPH21_TOTAL FROM `g_payment`  WHERE COMPANY_ID='".$comID."' AND PERIOD_YEAR='".$years."' AND PERIOD_MONTH='".$month."'");
        return $sql;
    } 

    public function totalSSE($comID,$years,$month)
    {
        $sql = $this->db->query("SELECT SUM(TOTAL_SSE21) AS ALL_TOTAL_SSE21 FROM `g_payment`  WHERE COMPANY_ID='".$comID."' AND PERIOD_MONTH='".$month."' AND PERIOD_YEAR='".$years."'");
        return $sql;
    } 

    public function totalSEEDebt($comID,$years,$month)
    {
        $sql = $this->db->query("SELECT SUM(TOTAL_SSE21) AS ALL_TOTALDEBT_SSE21 FROM `g_payment`  WHERE COMPANY_ID='".$comID."' AND PERIOD_MONTH='".$month."' AND PERIOD_YEAR='".$years."'");
        return $sql;
    }     

    public function totalBrutoResign($comID,$years,$month,$employeeID)
    {
        $sql = $this->db->query("SELECT SUM(EMPLOYEE_BRUTO) AS ALL_EMPLOYEE_BRUTO, SUM(EMPLOYEE_BRUTO - EMPLOYEE_TANTIEMBONUS) AS ALL_EMPLOYEE_BRUTO_NOTHR, SUM(1) AS TOTAL_BULAN_RESIGN FROM `v_g_employee_pph21`  WHERE COMPANY_ID='".$comID."' AND  PERIOD_YEAR='".$years."' AND EMPLOYEE_ID='".$employeeID."' and PERIOD_MONTH <> '".$month."'");
        return $sql;
    }     

    
    public function calculateTotalPTT($pid_ptt)
    {
        $query = $this->db->query("SELECT SUM(PENGHASILAN_BRUTO) AS TOTAL_BRUTO,SUM(PENGHASILAN_LAINNYA) AS TOTAL_LAINNYA, SUM(PPHVAL_PTT) AS TOTAL_PPHVAL_PTT FROM `g_pph21_detail_ptt` WHERE PPH_ID_PTT=" . $pid_ptt);

        return $query;
    }

    public function countYear($cid,$yid,$eid){ 
        $sql = $this->db->query("SELECT a.PERIOD_YEAR, a.COMPANY_ID, b.EMPLOYEE_ID, 

                 sum(1) AS TTL_MONTH,

                 sum(b.EMPLOYEE_GAJI_POKOK) AS EMPLOYEE_GAJI_POKOK_YEAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_JAN,
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_FEB,
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_MAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_APR,
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_MEI,
                 sum(CASE WHEN a.PERIOD_MONTH ='JUN' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_JUN,
                 sum(CASE WHEN a.PERIOD_MONTH ='JUL' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_JUL,
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_AUG,
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_SEP,
                 sum(CASE WHEN a.PERIOD_MONTH ='OCTOBER' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_OCT,
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_NOV,
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_GAJI_POKOK else 0 END) as EMPLOYEE_GAJI_POKOK_DES,

                 sum(b.EMPLOYEE_TUNJANGAN_PPH) AS EMPLOYEE_TUNJANGAN_PPH_YEAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_JAN,
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_FEB,
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_MAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_APR,
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_MEI,
                 sum(CASE WHEN a.PERIOD_MONTH ='JUNI' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_JUN,
                 sum(CASE WHEN a.PERIOD_MONTH ='JULI' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_JUL,
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_AUG,
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_SEP,
                 sum(CASE WHEN a.PERIOD_MONTH ='OCTOBER' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_OCT,
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_NOV,
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_TUNJANGAN_PPH else 0 END) as EMPLOYEE_TUNJANGAN_PPH_DES,

                 sum(b.EMPLOYEE_TUNJANGAN_LAINNYA) AS EMPLOYEE_TUNJANGAN_LAINNYA_YEAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_JAN,
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_FEB,
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_MAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_APR,
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_MEI,
                 sum(CASE WHEN a.PERIOD_MONTH ='JUNI' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_JUN,
                 sum(CASE WHEN a.PERIOD_MONTH ='JULI' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_JUL,
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_AUG,
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_SEP,
                 sum(CASE WHEN a.PERIOD_MONTH ='OCTOBER' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_OCT,
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_NOV,
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_TUNJANGAN_LAINNYA else 0 END) as EMPLOYEE_TUNJANGAN_LAINNYA_DES,
                 
                 sum(b.EMPLOYEE_HONORARIUM) AS EMPLOYEE_HONORARIUM_YEAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_JAN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_FEB, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_MAR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_APR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_MEI, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JUNI' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_JUN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JULI' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_JUL, 
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_AUG, 
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_SEP, 
                 sum(CASE WHEN a.PERIOD_MONTH ='OCTOBER' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_OCT, 
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_NOV, 
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_HONORARIUM else 0 END) as EMPLOYEE_HONORARIUM_DES,

                 sum(b.EMPLOYEE_PREMI) AS EMPLOYEE_PREMI_YEAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_JAN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_FEB, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_MAR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_APR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_MEI, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JUNI' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_JUN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JULI' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_JUL, 
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_AUG, 
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_SEP, 
                 sum(CASE WHEN a.PERIOD_MONTH ='OKTOBER' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_OCT, 
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_NOV, 
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_PREMI else 0 END) as EMPLOYEE_PREMI_DES, 
                
                 sum(b.EMPLOYEE_NATURA) AS EMPLOYEE_NATURA_YEAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_JAN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_FEB, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_MAR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_APR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_MEI, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JUNI' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_JUN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JULI' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_JUL, 
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_AUG, 
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_SEP, 
                 sum(CASE WHEN a.PERIOD_MONTH ='OKTOBER' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_OCT, 
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_NOV, 
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_NATURA else 0 END) as EMPLOYEE_NATURA_DES, 

                 sum(b.EMPLOYEE_TANTIEMBONUS) AS EMPLOYEE_TANTIEMBONUS_YEAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_JAN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_FEB, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_MAR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_APR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_MEI, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JUNI' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_JUN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JULI' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_JUL, 
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_AUG, 
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_SEP, 
                 sum(CASE WHEN a.PERIOD_MONTH ='OKTOBER' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_OCT, 
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_NOV, 
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_TANTIEMBONUS else 0 END) as EMPLOYEE_TANTIEMBONUS_DES,

                 sum(b.EMPLOYEE_IURAN_THT) AS EMPLOYEE_IURAN_THT_YEAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_JAN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_FEB, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_MAR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_APR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_MEI, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JUNI' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_JUN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JULI' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_JUL, 
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_AUG, 
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_SEP, 
                 sum(CASE WHEN a.PERIOD_MONTH ='OKTOBER' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_OCT, 
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_NOV, 
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_IURAN_THT else 0 END) as EMPLOYEE_IURAN_THT_DES,

                 sum(b.EMPLOYEE_IURAN_JP) AS EMPLOYEE_IURAN_JP_YEAR,
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_JAN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_FEB, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_MAR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_APR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_MEI, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JUNI' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_JUN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JULI' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_JUL, 
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_AUG, 
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_SEP, 
                 sum(CASE WHEN a.PERIOD_MONTH ='OKTOBER' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_OCT, 
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_NOV, 
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_IURAN_JP else 0 END) as EMPLOYEE_IURAN_JP_DES,

                 sum(b.EMPLOYEE_BIAYA_JABATAN) AS EMPLOYEE_BIAYA_JABATAN_YEAR,
                 sum(b.EMPLOYEE_IURAN_PENSIUN) AS EMPLOYEE_IURAN_PENSIUN_YEAR,

                 sum(b.EMPLOYEE_BRUTO) AS EMPLOYEE_BRUTO_YEAR,                 
                 sum(CASE WHEN a.PERIOD_MONTH ='JANUARI' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_JAN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='FEBRUARI' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_FEB, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MARET' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_MAR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='APRIL' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_APR, 
                 sum(CASE WHEN a.PERIOD_MONTH ='MEI' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_MEI, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JUNI' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_JUN, 
                 sum(CASE WHEN a.PERIOD_MONTH ='JULI' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_JUL, 
                 sum(CASE WHEN a.PERIOD_MONTH ='AGUSTUS' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_AUG, 
                 sum(CASE WHEN a.PERIOD_MONTH ='SEPTEMBER' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_SEP, 
                 sum(CASE WHEN a.PERIOD_MONTH ='OKTOBER' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_OCT, 
                 sum(CASE WHEN a.PERIOD_MONTH ='NOVEMBER' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_NOV, 
                 sum(CASE WHEN a.PERIOD_MONTH ='DESEMBER' then EMPLOYEE_BRUTO else 0 END) as EMPLOYEE_BRUTO_DES  
                 
                 FROM `g_pph21` a inner join g_employee_income b on a.PPH_ID=b.PPH_ID WHERE a.`PERIOD_YEAR` ='".$yid."' and a.`COMPANY_ID`='".$cid."' 
                 and a.STATUS<>'HISTORY' and b.`EMPLOYEE_ID`='".$eid."' GROUP BY PERIOD_YEAR, EMPLOYEE_ID, COMPANY_ID");

        return $sql;
    }

    public function getChildSidebar($groupID, $parentID)
    {
        $this->db->distinct()
            ->select('*')
            ->from('s_group_appl a')
            ->join('s_appl b', 'a.APPL_ID = b.ID')
            ->where('a.GROUP_ID', $groupID)
            ->where('APPL_PARENT_ID', $parentID)
            ->where('b.LINK !=', 'null')
            ->order_by('ORDER_NO', 'ASC');

        $query = $this->db->get();

        return $query;
    } 

    public function getPidPTT($cid, $mid, $yid, $table)
    {
        $this->db->select('*')
            ->from($table)
            ->where('PERIOD_YEAR', $yid)
            ->where('PERIOD_MONTH', $mid)
            ->order_by('REC_ID', 'DESC')
            ->limit(1);

        $query = $this->db->get();
        return $query;
    }

    public function getMilestoneProject($table, $project_id )
    {
        $proj_id = $this->db->escape_str($project_id);

        $sql = $this->db->query("SELECT * FROM $table WHERE PROJECT_ID = '$proj_id' AND MILESTONE_ID != 0 GROUP BY(MILESTONE_ID) ORDER BY MILESTONE_SORT_NO");
        return $sql;
    }

    public function getSingularDataDetailTask($table, $column1, $column2, $data1, $data2)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column1, $data1) 
            ->where($column2, $data2)
            ->group_by("TASK_ID")
            ->order_by("TASK_SORT_NO", "asc");

        $query = $this->db->get();

        return $query;
    }

    public function cekpembetulan($cid, $month, $year){
         $sql = $this->db->query("SELECT count(*) as TOTAL_PEMBETULAN FROM `g_pph21` WHERE STATUS='HISTORY' AND  COMPANY_ID='".$cid."' AND PERIOD_MONTH='".$month."' AND PERIOD_YEAR='".$year."'");
        return $sql;
    }

    public function cekpembetulan42($cid, $month, $year){
         $sql = $this->db->query("SELECT count(*) as TOTAL_PEMBETULAN FROM `g_pph42` WHERE STATUS='HISTORY' AND  COMPANY_ID='".$cid."' AND PERIOD_MONTH='".$month."' AND PERIOD_YEAR='".$year."'");
        return $sql;
    }

    public function cekstatuspph21($pid){
        $sql = $this->db->query("SELECT STATUS FROM `g_pph21` WHERE PPH_ID='".$pid."'");
        return $sql;
    }

    public function cekstatuspph22($pid){
        $sql = $this->db->query("SELECT STATUS FROM `g_pph22` WHERE PPH22_ID='".$pid."'");
        return $sql;
    }

    public function cekstatuspph23($pid){
        $sql = $this->db->query("SELECT STATUS FROM `g_pph23` WHERE PPH23_ID='".$pid."'");
        return $sql;
    }

    public function cekstatuspph42($pid){
        $sql = $this->db->query("SELECT STATUS FROM `g_pph42` WHERE PPH42_ID='".$pid."'");
        return $sql;
    }

    public function count_pembetulan($pid){
        $sql = $this->db->query("SELECT count(*) as TOTAL_PEMBETULAN FROM `g_pph21` WHERE 'STATUS'='ON PROGRESS'");
        return $sql;
        //var_dump($sql->num_rows());
    }

    public function count_pembetulan22($pid){
        $sql = $this->db->query("SELECT count(*) as TOTAL_PEMBETULAN FROM `g_pph22` WHERE 'STATUS'='ON PROGRESS' AND PPH22_ID='".$pid."'");
        return $sql; 
    }

    public function count_pembetulan23($pid){
        $sql = $this->db->query("SELECT count(*) as TOTAL_PEMBETULAN FROM `g_pph23` WHERE 'STATUS'='ON PROGRESS' AND PPH23_ID='".$pid."'");
        return $sql; 
    }

    public function total_bruto_netto($pid){
        $sql = $this->db->query("SELECT SUM(EMPLOYEE_BRUTO) AS TOTAL_BRUTTO,SUM(EMPLOYEE_NETTO) AS TOTAL_NETTO, SUM(EMPLOYEE_PPHVAL) AS TOTAL_PPH21 FROM `g_employee_income` WHERE PPH_ID='".$pid."'");
        return $sql;
    }

    public function getPembetulan($cid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH_ID)-1 from v_g_companies_pph21_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph21_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.STATUS IN ('ACTIVE','ON PROGRESS', 'APPROVED','SSE','WAITING OF PAYMENT','PAID','LAPOR PAJAK','RE PROGRESS') ORDER BY MONTH_VAL ASC");
        return $sql;
    }

    public function getPembetulan22($cid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH22_ID)-1 from v_g_companies_pph22_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph22_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.STATUS IN ('ACTIVE','ON PROGRESS', 'APPROVED','PAID','LAPOR PAJAK','RE PROGRESS') ORDER BY MONTH_VAL ASC");
        return $sql;
    }

    public function getPembetulan23($cid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH23_ID)-1 from v_g_companies_pph23_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph23_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.STATUS IN ('ACTIVE','ON PROGRESS', 'APPROVED','PAID','LAPOR PAJAK','RE PROGRESS') ORDER BY MONTH_VAL ASC");
        return $sql;
    }

     public function getPembetulan42($cid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH42_ID)-1 from v_g_companies_pph42_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph42_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.STATUS IN ('ACTIVE','ON PROGRESS', 'APPROVED','PAID','LAPOR PAJAK','RE PROGRESS') ORDER BY MONTH_VAL ASC");
        return $sql;
    }

    public function getPembetulan25($cid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH25_ID)-1 from v_g_companies_pph25_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph25_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.STATUS IN ('ACTIVE','ON PROGRESS', 'APPROVED','PAID','LAPOR PAJAK','RE PROGRESS') ORDER BY MONTH_VAL ASC");
        return $sql;
    }

    public function getPembetulanSummary($cid,$mid,$yid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH_ID)-1 from v_g_companies_pph21_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph21_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.PERIOD_MONTH='".$mid."' AND a.PERIOD_YEAR='".$yid."'");
        return $sql;
    }

    public function getPembetulanSummary22($cid,$mid,$yid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH22_ID)-1 from v_g_companies_pph22_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph22_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.PERIOD_MONTH='".$mid."' AND a.PERIOD_YEAR='".$yid."'");
        return $sql;
    }

    public function getPersen($bruto){
          $sql = $this->db->query("SELECT PRESENTASE FROM m_tax_netto WHERE (  SALARY_END>='0' and SALARY_START<='".$bruto."') OR (  SALARY_END>='".$bruto."' and SALARY_START<='".$bruto."')");
                                                                             
        return $sql;
    }

    public function getDataKaryawanNoEdit($pid,$eid){
        $sql = $this->db->query("SELECT * FROM `g_employee_income` WHERE PPH_ID='".$pid."' AND EMPLOYEE_ID!='".$eid."'");
        return $sql;
    }

    public function getCountDataKaryawanNoEdit($pid,$eid){
        $sql = $this->db->query("SELECT SUM(EMPLOYEE_BRUTO) AS TOTAL_BRUTTO_LAMA,SUM(EMPLOYEE_NETTO) AS TOTAL_NETTO_LAMA, SUM(EMPLOYEE_PPHVAL) AS TOTAL_PPH21_LAMA FROM `g_employee_income` WHERE PPH_ID='".$pid."' AND EMPLOYEE_ID!='".$eid."'");
        return $sql;
    } 

    public function editPPH22($pid){
        $sql = $this->db->query("SELECT SUM(TOTAL_DPP) AS TOTAL_DPP_ALL,SUM(TOTAL_PPH22) AS TOTAL_PPH22_ALL FROM `g_pph22_detail` WHERE PPH22_ID='".$pid."'");
        return $sql;
    } 

    public function editPPH23($pid){
        $sql = $this->db->query("SELECT SUM(TOTAL_DPP23) AS TOTAL_DPP_ALL,SUM(TOTAL_PPHVAL23) AS TOTAL_PPH23_ALL FROM `g_pph23_detail` WHERE PPH23_ID='".$pid."'");
        return $sql;
    } 

    public function editPPH42($pid){
        $sql = $this->db->query("SELECT SUM(TOTAL_PPHVAL42) + (SELECT SUM(UMKM_TOTAL_PPHVAL42) FROM g_pph42_umkm  WHERE PPH42_ID='".$pid."' ) AS TOTAL_PPH42_ALL FROM `g_pph42_detail` WHERE PPH42_ID='".$pid."'");
        return $sql;
    } 

    public function rowJenisPajak23($table,$pph,$jenis){
        $sql = $this->db->query("SELECT count(*) as TOTAL_BARIS23 FROM ".$table." WHERE PPH23_ID='".$pph."' AND  JENIS_PAJAK='".$jenis."'");
        return $sql;
    } 
    public function rowJenisPajak26($table,$pph,$jenis){
        $sql = $this->db->query("SELECT count(*) as TOTAL_BARIS26 FROM ".$table." WHERE PPH23_ID='".$pph."' AND  JENIS_PAJAK='".$jenis."'");
        return $sql;
    } 
     public function getTasktotal($milestone_id){
        $sql=$this->db->query("SELECT SORT_NO FROM g_task where MILESTONE_ID='".$milestone_id."' order by SORT_NO DESC LIMIT 1");
        return $sql;
    }

}
