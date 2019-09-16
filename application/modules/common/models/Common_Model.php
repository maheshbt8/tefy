<?php

class Common_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }
    public function select_results_info($table,$where='',$order_by='')
    {
    	if($where!=''){
    		$this->db->where($where);
    	}
    	if($order_by!=''){
    		$this->db->order_by($order_by);
    	}
    	return $this->db->get($table);
    }
    public function select_row_info($table,$where)
    {
    	$this->db->where($where);
    	return $this->db->get($table);
    }
}