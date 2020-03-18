<?php
class Student_Model extends Common_Model
{
    
    public function __construct()
    {
        parent::__construct();
        /*$this->table = 'student';
        $this->order_by = ['id', 'DESC'];
        $this->select_results_info($this->table, '', $this->order_by);*/
    }
    public function get_bookmarked_info($where='')
    {
    	$this->db->select('*,bookmarks.row_status as book_row_status');
		$this->db->from('bookmarks');
		if($where !=''){
		$this->db->where($where);
		}
		$this->db->join('listings', 'listings.id = bookmarks.listing_id');
		$query = $this->db->get();
		return $query;
    }
    
}

