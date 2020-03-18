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
    function multi_unique($src){
     $output = array_map("unserialize",
     array_unique(array_map("serialize", $src)));
        return $output;
    }
    public function select_listing_results_info($where,$where_cls='', $order_by='', $limit='',$data_start='')
    {
        //echo $where;die;
        $this->db->distinct('listings.id');
if($where_cls!=''){
        $this->db->select('listings.*,school_class_prices.listing_id,school_class_prices.admission_fee,school_class_prices.tution_fee');
        }else{
        $this->db->select('listings.*');
        }
$this->db->from('listings');
if($where_cls!=''){
        $this->db->join('school_class_prices', 'listings.id = school_class_prices.listing_id');
        }
$this->db->where($where);
if($where_cls!=''){
$this->db->where($where_cls);
}
if($order_by!=''){
            $this->db->order_by($order_by);
        }
        if($limit!=''){
            $this->db->limit($limit,$data_start);
        }
$query = $this->db->get();
//echo $this->db->last_query();
//echo "<pre>";

//$output=$this->multi_unique($query->result_array());
//echo "<pre>";
$query=$query->result_array();
$tempArr = array_unique(array_column($query, 'id'));
$qry=array_intersect_key($query, $tempArr);
//print_r($output);die;
/*if(count($qry) == 0){
    $this->db->select('listings.*');
    if($order_by!=''){
            $this->db->order_by($order_by);
        }
        if($limit!=''){
            $this->db->limit($limit,$data_start);
        }
$qry = $this->db->get('listings')->result_array();
}*/
//print_r($query->result_array());die;
return $qry;
/*echo "<pre>";
print_r($query->result_array());die;*/
    }
/*    public function select_listing_results_info($table, $where='', $order_by='',$limit='',$data_start='',$join_table='')
    {
        $this->db->select('*');
        if($where != ''){
            $this->db->where($where);
        }
        if($order_by!=''){
            $this->db->order_by($order_by);
        }
        if($limit!=''){
            $this->db->limit($limit,$data_start);
        }
        $this->db->from($table);
        if($join_table != ''){
            $this->db->join($join_table, )
        }
        $query = $this->db->get();
        if($this->type_of != '' && $this->type_of == 'array')
            return $query->result_array();
        elseif($this->type_of != '' && $this->type_of == 'object')
             return $query->result_object();
        else
            return $query;
    }*/

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

    public function get_address_by_latlong($lat,$long)
    {
           
    }
    public function get_users($id=1,$status='')
    {
        //$this->trigger_events('get_users_group');

        // if no id was passed use the current users id
        //$id || $id = $this->session->userdata('user_id');
        $this->db->select('users.*' );
        $this->db->where('users_groups.group_id', $id);
        $this->db->join('users', 'users_groups.user_id=users.id');
        if($status!=''){
        $this->db->where('users.'.$status);
        }
        return $this->db->get('users_groups');
    }


    function thousandsCurrencyFormat($num) {

  if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display.'+';

     }

     return $num;
    }

function get_last_unique_id($group_id){
        return $this->db->get_where('groups', array('id' => $group_id))->row()->unique_id;
    }
function get_tables_code($group_id){
        return $this->db->get_where('groups', array('id' => $group_id))->row()->code;
    }
    function update_last_unique_id($group_id,$unique_id){
        $data['unique_id'] = $unique_id;
        $this->db->where('id',$group_id);
        return $this->db->update('groups', $data);
    }
    function generate_unique_id($lid,$group_id){
if($lid==1){
$num=1001;
}elseif($lid!=1){
/*$my=explode('_',$this->common_model->get_last_unique_id($group_id));
$year=substr($my[0], -2);
if($year==date('y')){
$num=$my[1]+1;
}else{
$num=1001;
}*/
$my=$this->common_model->get_last_unique_id($group_id);
$my_n=substr($my,4);
$num=$my_n+1;
}
//$code=$this->common_model->get_tables_code($group_id);
$code=$this->db->get_where('users',array('id'=>$lid))->row()->first_name;
$code=strtoupper(substr($code,0,4));
$pid=$code.$num;
//$pid=$code.'_'.$num;
$this->common_model->update_last_unique_id($group_id,$pid);
return $pid;
    }

public function generate_application_id($user_id,$school_id)
{
    $school_code=$this->common_model->get_type_name_by_where('listings',array('id'=>$school_id),'school_code');
    $unique_id=$this->common_model->get_type_name_by_where('users',array('id'=>$user_id),'unique_id');
    $my_code=explode('_', $unique_id);
    return $code=$my_code[1].$school_code;
}








}