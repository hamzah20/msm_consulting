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

    public function getSingularDataPPH21(){
        
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

    public function updateGeneralData($table, $data, $filter, $query)
    {
        $this->db->where($filter, $query);

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

    public function getPembetulan($cid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH_ID)-1 from v_g_companies_pph21_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph21_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.STATUS IN ('ACTIVE', 'APPROVED')");
        return $sql;
    }

    public function getPembetulanSummary($cid,$mid){

        $sql = $this->db->query("SELECT a.*,(select count(b.PPH_ID) from v_g_companies_pph21_detail as b where b.COMPANY_ID=a.COMPANY_ID and (b.PERIOD_MONTH=a.PERIOD_MONTH and b.PERIOD_YEAR=a.PERIOD_YEAR)) AS TOTAL_PEMBETULAN FROM `v_g_companies_pph21_detail` AS a WHERE a.COMPANY_ID='".$cid."' AND a.PERIOD_MONTH='".$mid."'");
        return $sql;
    }
}
