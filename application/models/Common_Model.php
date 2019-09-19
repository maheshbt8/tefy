<?php
class Common_Model extends CI_Model{
    protected $table;
    protected $order_by;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }
    
    /**
     *@author Mahesh
     *@param table string
     *@param input_data Array
     *@desc To Insert data to respective table
     */
    public function insert_results_info($table, $input_data)
    {
        $result=$this->db->insert($table,$input_data);
        if($result){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    /**
     *@author Mahesh
     *@param table string
     *@param where Array
     *@param order_by Array
     *@desc To fetch data from respective table with given condition and order
     */
    public function select_results_info($table, $where='', $order_by='')
    {
    	if($where != ''){
    		$this->db->where($where);
    	}
    	if($order_by!=''){
    		$this->db->order_by($order_by);
    	}
    	return $this->db->get($table);
    }
    
    /**
     *@author Mahesh
     *@param table string
     *@param where Array
     *@param input_data Array
     *@desc To Update data from respective table with given condition
     */
    public function update_results_info($table, $where='', $input_data)
    {
        if($where != ''){
            $this->db->where($where);
        }
        return $this->db->update($table,$input_data);
    }
    
    /**
     *@author Mahesh
     *@param table string
     *@param where Array
     *@param row_status String
     *@desc To Set Row Status data from respective table with given condition
     */
    public function set_row_status($table, $where='', $row_status=0)
    {
        $input_data['row_status']=$row_status;
        if($where != ''){
            $this->db->where($where);
        }
        return $this->db->update($table,$input_data);
    }
    
    /**
     *@author Mahesh
     *@param table string
     *@param where Array
     *@desc To Delete data from respective table with given condition
     */
    public function delete_table_records($table, $where='')
    {
        if($where != ''){
            $this->db->where($where);
        }
        return $this->db->delete($table);
    }

    /**
     *@author Mahesh
     *@param table string
     *@param where Array
     *@param field string
     *@desc To any field data from respective table with given condition
     */
    function get_type_name_by_where($table, $where = '', $field = 'name')
    {
        if ($where != '') {
            $this->db->where($where);
            }
            $l = $this->db->get($type);
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }else{
                return FALSE;
            }
    }
    
    /**
     *@author Mahesh
     *@param table string
     *@param where Array
     *@desc To get count of all records from respective table with given condition
     */
    function count_records( $table, $where = '' ){
        if($where != ''){
            $this->db->where($where);
        }
        $this->db->from($table);
        $reocrds = $this->db->count_all_results();
        return $reocrds;
    }
    
    
    
    
    
    
    
    
}