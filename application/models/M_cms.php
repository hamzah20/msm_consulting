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

    public function getSingularDataDetail($table, $column1, $column2, $data1, $data2)
    {
        $this->db->select('*')
            ->from($table)
            ->where($column1, $data1) /* COMPANY ID */
            ->where($column2, $data2); /* DOC ID */

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

    public function cekpembetulan($cid, $month, $year){
         $sql = $this->db->query("SELECT count(*) as TOTAL_PEMBETULAN FROM `g_pph21` WHERE STATUS='HISTORY' AND  COMPANY_ID='".$cid."' AND PERIOD_MONTH='".$month."' AND PERIOD_YEAR='".$year."'");
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

    public function count_pembetulan($pid){
        $sql = $this->db->query("SELECT count(*) as TOTAL_PEMBETULAN FROM `g_pph21` WHERE 'STATUS'='ON PROGRESS'");
        return $sql;
        //var_dump($sql->num_rows());
    }

    public function count_pembetulan22($pid){
        $sql = $this->db->query("SELECT count(*) as TOTAL_PEMBETULAN FROM `g_pph22` WHERE 'STATUS'='ON PROGRESS' AND PPH22_ID='".$pid."'");
        return $sql;
        //var_dump($sql->num_rows());
    }

    public function total_bruto_netto($pid){
        $sql = $this->db->query("SELECT SUM(EMPLOYEE_BRUTO) AS TOTAL_BRUTTO,SUM(EMPLOYEE_NETTO) AS TOTAL_NETTO, SUM(EMPLOYEE_PPHVAL) AS TOTAL_PPH21 FROM `g_employee_income` WHERE PPH_ID='".$pid."'");
        return $sql;
    }

    public function getPembetulan($cid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH_ID)-1 from v_g_companies_pph21_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph21_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.STATUS IN ('ACTIVE','ON PROGRESS', 'APPROVED','PAID','LAPOR PAJAK','RE PROGRESS') ORDER BY MONTH_VAL ASC");
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
}
