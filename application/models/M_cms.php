<?php class M_cms extends CI_Model
{
    public function getGeneralList($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        $query = $this->db->get();

        return $query;
    }

    public function getGeneralData($table, $field, $query)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field, $query);

        $query = $this->db->get();

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
            ->order_by('ORDER', 'ASC');

        $query = $this->db->get();

        return $query;
    }

    public function getChildSidebar($groupID, $parentID)
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('s_group_appl a');
        $this->db->join('s_appl b', 'a.APPL_ID = b.ID');
        $this->db->where('a.GROUP_ID', $groupID);
        $this->db->where('APPL_PARENT_ID', $parentID);
        $this->db->where('b.LINK !=', 'null');

        $this->db->order_by('ORDER_NO', 'ASC');

        $query = $this->db->get();

        return $query;
    }
}
