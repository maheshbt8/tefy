<?php

class Payment extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->template = "template/admin/main";
        //check_access('school');
    }
    
    public function index(){
        $this->data['title'] = "School";
        $this->data['content'] = 'cashfree';
        $this->data['active_menu'] = 'cashfree';
        $this->_render_page($this->template, $this->data);
    }
    public function test()
    {
        $data=array(
            'orderId'=>12,
            'orderAmount'=>10,
            'orderNote'=>'hi this is for test',
            'customerName'=>'mahi',
            'customerPhone'=>'55555555555',
            'customerEmail'=>'mahi@g.com',
            'returnUrl'=>base_url('payment/respons'),
            'notifyUrl'=>base_url('payment/respons')
        );
        $this->cashfree($data);
    }
     public function admission_payment($admission_id,$chec_chec)
    {
        $admi=$this->common_model->select_results_info('admissions',array('id'=>$admission_id))->row_array();
        $total=$admi['total'];
        if($chec_chec==1){
        $walet=$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'walet_amount');
        $total=$total-$walet;
      }
      $this->session->set_userdata('chec_chec',$chec_chec);
        $data=array(
            'orderId'=>$admi['application_id'],
            'orderAmount'=>$total,
            'orderNote'=>'Admission Application ID:'.$admi['application_id'],
            'customerName'=>$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'first_name'),
            'customerPhone'=>$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'phone'),
            'customerEmail'=>$this->common_model->get_type_name_by_where('users',array('id'=>$this->session->userdata('user_id')),'email'),
            'returnUrl'=>base_url('student/admission_payment_respons'),
            'notifyUrl'=>base_url('student/admission_payment_respons')
            );
        //$this->load->cont

        /*$_POST=$data;
        redirect('payment/cashfree/',$_POST);*/
        $this->cashfree($data);
    }
    public function cashfree($data)
    {
        /*print_r($_POST);
        echo "string";die;
        print_r($data);die;*/
        $mode = $this->db->get_where('settings', array('setting_type' => 'cashfree_payment_mode'))->row()->description;
//extract($_POST);
  $secretKey = $this->db->get_where('settings', array('setting_type' => 'cashfree_secret_key'))->row()->description;
  $postData = array( 
  "appId" => $this->db->get_where('settings', array('setting_type' => 'cashfree_appId'))->row()->description, 
  "orderId" => $data['orderId'], 
  "orderAmount" => $data['orderAmount'],
  "orderCurrency" => 'INR', 
  "orderNote" => $data['orderNote'], 
  "customerName" => $data['customerName'], 
  "customerPhone" => $data['customerPhone'], 
  "customerEmail" => $data['customerEmail'],
  "returnUrl" => $data['returnUrl'], 
  "notifyUrl" => $data['notifyUrl'],
);

ksort($postData);
$signatureData = "";
foreach ($postData as $key => $value){
    $signatureData .= $key.$value;
}
/*print_r($signatureData);die;*/
$signature = hash_hmac('sha256', $signatureData, $secretKey,true);
$signature = base64_encode($signature);
        if ($mode == "PROD") {
            $url = "https://www.cashfree.com/checkout/post/submit";
        } else {
            $url = "https://test.cashfree.com/billpay/checkout/post/submit";
        }
        $postData['url']=$url;
        $postData['signature']=$signature;
        $this->load->view('request',$postData);
    }
 /*   public function respons()
    {
        $secretkey = "b52d32f895cd59ea095dbc3b64cfe409d307338f";
         $orderId = $_POST["orderId"];
         $orderAmount = $_POST["orderAmount"];
         $referenceId = $_POST["referenceId"];
         $txStatus = $_POST["txStatus"];
         $paymentMode = $_POST["paymentMode"];
         $txMsg = $_POST["txMsg"];
         $txTime = $_POST["txTime"];
         $signature = $_POST["signature"];
         $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
         $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
         $computedSignature = base64_encode($hash_hmac);
         
        if($signature==$computedSignature){
            return true;
         }else{
            return false;
         }
    }*/
    public function request($post_data)
    {
        $this->load->view('request',$post_data);
        /*print_r($_POST);die;
        $this->data['title'] = "School";
        $this->data['content'] = 'request';
        $this->data['active_menu'] = 'request';
        $this->data['post_data']=$_POST;
        $this->_render_page($this->template, $this->data);*/
        /*print_r($_POST);die;
        echo "string1";die;*/
    }
}

