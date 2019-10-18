<?php
class Common_model extends CI_Model{
    protected $table;
    protected $order_by;
    public $type_of;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->type_of = '';
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
    public function select_results_info($table, $where='', $order_by='',$limit='',$data_start='')
    {
        if($where != ''){
            $this->db->where($where);
        }
        if($order_by!=''){
            $this->db->order_by($order_by);
        }
        if($limit!=''){
            $this->db->limit($limit,$data_start);
        }
        $query = $this->db->get($table);
        if($this->type_of != '' && $this->type_of == 'array')
            return $query->result_array();
        elseif($this->type_of != '' && $this->type_of == 'object')
             return $query->result_object();
        else
            return $query;
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
    /*public function set_row_status($table, $where='', $row_status=0)
    {
        $input_data['row_status']=$row_status;
        if($where != ''){
            $this->db->where($where);
        }
        return $this->db->update($table,$input_data);
    }*/
    function set_row_status($table,$type,$where,$row_status=0){
        $data['row_status']=$row_status;
        $data['modified_at']=date('Y-m-d H:i:s');
        return $this->db->where($type,$where)->update($table,$data);
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
            $l = $this->db->get($table);
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
    
    
    public function get_days($value='')
    {
        $timestamp = strtotime('next Monday');
        $days = array();
        for ($i = 0; $i < 7; $i++) {
        $days[] = strftime('%A', $timestamp);
        $timestamp = strtotime('+1 day', $timestamp);
        }

        $start = "01:00"; //you can write here 00:00:00 but not need to it
    $end = "24:00";

    $tStart = strtotime($start);
    $tEnd = strtotime($end);
    $tNow = $tStart;
    
    while($tNow <= $tEnd){
        $loop[]=date("h A",$tNow);
        $tNow = strtotime('+60 minutes',$tNow);
    }
    $result['days']=$days;
    $result['timings']=$loop;
        return $result;
    }
    function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
    /*******rating of a product*******/
    function rating_of_product( $table, $where = '', $type_col = ''){
$rating=0;
        if($table!=''){
        if($where != ''){
            $this->db->where($where);
        }
$rating = $this->db->select("sum(".$table.".".$type_col.") as ".$type_col)->get($table)->row()->$type_col;
if($rating!=0){
$count=$this->common_model->count_records('ratings',$where);
$rating=$rating/$count;
}
}
return $rating;
    }
    
    function get_image_url($type = '', $id = '') {
         if (file_exists('uploads/' . $type . '/' . $id . '.jpg')){
            $image_url ='uploads/' . $type . '/' . $id . '.jpg';
        }else{
            $image_url ='uploads/users/user.jpg';
        }
        return $image_url;
    }
    function generate_encryption_key($string){
    $ret=$this->encryption->encrypt($string);
if ( !empty($string) )
    {
        $ret = strtr(
                $ret,
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                )
            );
    }
    return $ret;
    }
     function generate_decryption_key($string){
         $string = strtr(
            $string,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
    );
    $ret=$this->encryption->decrypt($string);
    return $ret;
    }
    function email_verification($data="")
    {
    $reg_id=$this->common_model->generate_decryption_key($data);
    $email_verify=$this->db->get_where('users', array('id' => $reg_id))->row();
    $created_at=$email_verify->created_on;
/*    $past_time = strtotime($email_verify->modified_at);*/
    $current_time = time();
    $difference = $current_time - $created_at;
    $difference_minute =  $difference/60;
    if(intval($difference_minute)<30){
            if($email_verify->active==0){
            $yes=$this->db->where('id',$reg_id)->update('users',array('active' =>1));
        if($yes){
            echo "Your Email Verified Successfully"."<br/>";
            echo "<a href='".base_url()."'>Visit Tefy Home</a>";
        }else{
            echo "Your Email Not Verified"."<br/>";
            echo "<a href='".base_url()."'>Visit Tefy Home</a>";
        }
        }else{
            echo "You Already Verified Your Email"."<br/>";
            echo "<a href='".base_url()."'>Visit Tefy Home</a>";
        }
        }else{
            echo "Your Email Verification Link Expired"."<br/>";
            echo "<a href='".base_url()."'>Visit Tefy Home</a>";
        }
    }
}