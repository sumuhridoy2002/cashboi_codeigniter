<?php
if(!defined('BASEPATH'))
  exit('No direct script access allowed');

class Payment extends CI_Controller
{
  // private $USERNAME = '01714044180';
  // private $PASSWORD = '$6%LQl2AfVn';
  // private $APP_KEY = 'sHjCHZBEDWIZWfucEw7K8jkftc';
  // private $APP_SECRET = '6MzcaUdgoJc28KETkQgCOxz2GWtBvsm8jY1s0BLnAUdtGGNXjnqh';
  // private $URL_PREFIX = 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/';
  
  private $USERNAME = 'sandboxTokenizedUser02';
  private $PASSWORD = 'sandboxTokenizedUser02@12345';
  private $APP_KEY = '4f6o0cjiki2rfm34kfdadl1eqq';
  private $APP_SECRET = '2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b';
  private $URL_PREFIX = 'https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/';
  private $GRANT_TOKEN_URL;
  private $CREATE_PAYMENT_URL;
  private $EXECUTE_PAYMENT_URL;

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Prime_model", 'pm');
    $this->load->helper('cookie');
    $this->load->library('session');

    $this->GRANT_TOKEN_URL = $this->URL_PREFIX . 'token/grant';
    $this->CREATE_PAYMENT_URL = $this->URL_PREFIX . 'create';
    $this->EXECUTE_PAYMENT_URL = $this->URL_PREFIX . 'execute';
  }

  private function grantToken() {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->GRANT_TOKEN_URL,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'app_key' => $this->APP_KEY,
        'app_secret' => $this->APP_SECRET
      ]),
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'username: ' . $this->USERNAME,
        'password: ' . $this->PASSWORD
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $data = json_decode($response, true);
    return $data['id_token'] ?? null;
  }

  public function request_api_hosted()
  {
    $info = $this->input->post();
    
    if($info['payment_method'] == 'Bkash') {
      // Create payment request
      $data = [
        'mode' => '0011',
        'payerReference' => '01619777282',
        'callbackURL' => base_url('bkash/callback'),
        'amount' => $info['amount'],
        'currency' => 'BDT',
        'intent' => 'sale',
        'merchantInvoiceNumber' => uniqid(),
        'merchantName' => 'CashBoi',
        'merchantLogo' => 'https://freelogopng.com/images/all_img/1656227518bkash-logo-png.png'
      ];

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->CREATE_PAYMENT_URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'X-APP-Key: ' . $this->APP_KEY,
          'authorization: ' . $this->grantToken()
        ),
      ));

      $response = curl_exec($curl);
      
      curl_close($curl);
      $responseData = json_decode($response, true);

      if (isset($responseData['bkashURL'])) {
        $paymentData = [
          'compid'  => $_SESSION['compid'],
          'package' => $info['utype'],
          'amount'  => $info['amount'], 
          'uid'     => $_SESSION['uid'],
          'ptime'   => $info['ptime'],
          'pstatus' => 0,
          'pdate'   => date('Y-m-d H:i:s'),
          'regby'   => $_SESSION['uid']
        ];
        $result = $this->pm->insert_data('user_payments', $paymentData);
        $this->session->set_userdata('paymentId', $result);
        $this->session->set_userdata('bkashPaymentID', $responseData['paymentID']);
        redirect($responseData['bkashURL']);
      } else {
        echo 'Error: ' . json_encode($responseData);
      }

    }elseif ($info['payment_method'] == 'SslCommerz') {
      $where = ['uid' => $_SESSION['uid']];
      $payment = $this->db->select('*')->from('user_payments')->where('uid', $_SESSION['uid'])->where('pstatus', 1)->order_by('up_id', 'desc')->get()->row();
      $user = $this->pm->get_data('users', $where);
      
      if($payment) $pcdate = date('Y-m-d h:i:s',strtotime($payment->pdate));
      else $pcdate = date('Y-m-d h:i:s',strtotime($user[0]['regdate']));
      if($info['ptime'] == 1) $pdate = date('Y-m-d h:i:s',strtotime($pcdate. ' + 1 months'));
      elseif($info['ptime'] == 2) $pdate = date('Y-m-d h:i:s',strtotime($pcdate. ' + 3 months'));
      elseif($info['ptime'] == 3) $pdate = date('Y-m-d h:i:s',strtotime($pcdate. ' + 6 months'));
      elseif($info['ptime'] == 4) $pdate = date('Y-m-d h:i:s',strtotime($pcdate. ' + 1 year'));
      $data = [
        'compid'  => $_SESSION['compid'],
        'package' => $info['utype'],
        'amount'  => $info['amount'], 
        'uid'     => $_SESSION['uid'],
        'ptime'   => $info['ptime'],
        'pstatus' => 0,
        'pdate'   => $pdate,
        'regby'   => $_SESSION['uid']
      ];
      $result = $this->pm->insert_data('user_payments',$data);
      $userId=$_SESSION['uid'];
      $post_data = array();
      $post_data['total_amount'] = $info['amount'];
      $post_data['currency'] = "BDT";
      $post_data['tran_id'] = "SSLC".uniqid();
      $post_data['success_url'] = base_url()."success";
      $post_data['fail_url'] = base_url()."fail";
      $post_data['cancel_url'] = base_url()."cancel";
      $post_data['ipn_url'] = base_url()."ipn";

      # CUSTOMER INFORMATION
      $post_data['cus_name'] = $_SESSION['name'];
      $post_data['cus_email'] = $_SESSION['email'];
      $post_data['cus_add1'] = $_SESSION['name'];
      $post_data['cus_city'] = $_SESSION['name'];
      $post_data['cus_state'] = $_SESSION['name'];
      $post_data['cus_postcode'] = $_SESSION['name'];
      $post_data['cus_country'] = $_SESSION['name'];
      $post_data['cus_phone'] = $_SESSION['name'];

      # SHIPMENT INFORMATION
      $post_data['ship_name'] = $this->input->post('fname');
      $post_data['ship_add1'] = $this->input->post('add1');
      $post_data['ship_city'] = $this->input->post('state');
      $post_data['ship_state'] = $this->input->post('state');
      $post_data['ship_postcode'] = $this->input->post('postcode');
      $post_data['ship_country'] = $this->input->post('country');

      # OPTIONAL PARAMETERS
      $post_data['value_a'] = "ref001";
      $post_data['value_b'] = "ref002";
      $post_data['value_c'] = "ref003";
      $post_data['value_d'] = "ref004";

      $post_data['product_profile'] = "physical-goods";
      $post_data['shipping_method'] = "YES";
      $post_data['num_of_item'] = "3";
      $post_data['product_name'] = "Computer,Speaker";
      $post_data['product_category'] = "Ecommerce";
      $x = [
        'tran_id'  => $post_data['tran_id'],
        'amount'   => $post_data['total_amount'],
        'currency' => $post_data['currency']];
      $this->session->set_userdata('tarndata',$x);
      $this->session->set_userdata('smsData',$data);
      $this->session->set_userdata('paymentId', $result);
      $this->session->set_userdata('userId', $userId);

      $cookie= [
        'name'   => 'paymentId',
        'value'  => $result,                            
        'expire' => '300000',                                                                                   
        'secure' => TRUE
      ];
      $this->input->set_cookie($cookie);

      $cookie= [
        'name'   => 'userId',
        'value'  => $userId,                            
        'expire' => '300000',                                                                                   
        'secure' => TRUE
      ];

      $this->input->set_cookie($cookie);

      $storeid = "sunshinecombdlive";
      $storepass = "61D2CEAA8AECA83134";
      if($this->sslcommerz->RequestToSSLC($post_data,$storeid,$storepass)) echo "Pending";
      else{
        $sdata = ['exception' =>'<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-check"></i> Payment Successfully !</h4></div>']; 
        $this->session->set_userdata($sdata);
        redirect('uBill');
      }
    }
  }

  public function bkashCallback()
  {
    $status = $this->input->get('status');
    $paymentID = $this->session->userdata('bkashPaymentID');

    if ($status == 'success') {
        // Execute Payment
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->EXECUTE_PAYMENT_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode(['paymentID' => $paymentID]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'X-APP-Key: ' . $this->APP_KEY,
                'authorization: ' . $this->grantToken()
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $responseData = json_decode($response, true);

        // Check transaction status
        if ($responseData['transactionStatus'] == 'Completed') {
            $paymentId = $this->session->userdata('paymentId');
            $this->pm->update_data('user_payments', 'up_id', $paymentId, ['pstatus' => 1]);
            $this->session->set_flashdata('message', 'Payment successful');

            // Sending SMS
            $paymentData = $this->pm->get_data('user_payments', ['up_id' => $paymentId]);
            $user = $this->pm->get_data('users', ['uid' => $paymentData[0]['uid']]);
            $userName = $user[0]['name'];
            $userEmail = $user[0]['email'];
            $started = date('d-m-Y');
            $expired = date('d-m-Y', strtotime($paymentData[0]['pdate']));
            $msg = 'Hello, ' . $userName . '! Your Membership started at ' . $started . ' and it will expire on ' . $expired . '. Thank you. Team SunshineApp | Hotline: 01714044180';
            $message = urlencode($msg);
            $to = urlencode($user[0]['mobile']);
            $token = urlencode("yfynrvxm-erdvybul-5lkgcewi-ivyfmpg8-r220zvby");

            $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $sms_result = curl_exec($ch);
            curl_close($ch);

            // Send email
            send_email($userEmail, $userName, $msg, 'Your Membership Started at SunshineApp');

            redirect('uBill');
        } else {
            $message = 'Error in executePayment method - transactionStatus is not Completed - ' . $responseData['statusMessage'];
        }
    } elseif ($status == 'failure') {
        $message = 'Bkash Payment Callback returns status: failure';
    } elseif ($status == 'cancel') {
        $message = 'Bkash Payment Callback returns status: cancel';
    } else {
        $message = 'Error in callback method';
    }

    $this->load->view('bkash_error', ['message' => $message]);
  }

  public function easycheckout_endpoint()
  {
    $tran_id = $_REQUEST['order'];
    $jsondata = json_decode($_REQUEST['cart_json'], true);

    $post_data = array();
    $post_data['total_amount'] = $jsondata['amount'];
    $post_data['currency'] = "USD";
    $post_data['tran_id'] = $tran_id;
    $post_data['success_url'] = base_url()."success";
    $post_data['fail_url'] = base_url()."fail";
    $post_data['cancel_url'] = base_url()."cancel";
    $post_data['ipn_url'] = base_url()."ipn";

    # CUSTOMER INFORMATION
    $post_data['cus_name'] = $jsondata['cus_name'];
    $post_data['cus_email'] = $jsondata['email'];
    $post_data['cus_add1'] = $jsondata['address'];
    $post_data['cus_city'] = $jsondata['state'];
    $post_data['cus_state'] = $jsondata['state'];
    $post_data['cus_postcode'] = $jsondata['amount'];
    $post_data['cus_country'] = $jsondata['zip'];
    $post_data['cus_phone'] = $jsondata['phone'];

    # SHIPMENT INFORMATION
    $post_data['ship_name'] = $jsondata['cus_name'];
    $post_data['ship_add1'] = $jsondata['address'];
    $post_data['ship_city'] = $jsondata['state'];
    $post_data['ship_state'] = $jsondata['state'];
    $post_data['ship_postcode'] = $jsondata['zip'];
    $post_data['ship_country'] = $jsondata['country'];

    # OPTIONAL PARAMETERS
    $post_data['value_a'] = "ref001";
    $post_data['value_b'] = "ref002";
    $post_data['value_c'] = "ref003";
    $post_data['value_d'] = "ref004";

    $post_data['product_profile'] = "physical-goods";
    $post_data['shipping_method'] = "YES";
    $post_data['num_of_item'] = "3";
    $post_data['product_name'] = "Computer,Speaker";
    $post_data['product_category'] = "Ecommerce";

    $session = [
      'tran_id' => $post_data['tran_id'],
      'amount' => $post_data['total_amount'],
      'currency' => $post_data['currency']];
    $this->session->set_userdata('tarndata', $session);

    if($this->sslcommerz->EasyCheckout($post_data, SSLCZ_STORE_ID, SSLCZ_STORE_PASSWD)) echo "Pending";
  }

  public function success_payment()
  {
    $paymentId=$this->input->cookie('paymentId',true);
    $userId=$this->input->cookie('userId',true);
      
    $this->Common->update_data('user_payments','up_id',$paymentId,['pstatus'=>1]);
    $user_info=$this->Common->get_single_row_information('user_payments','up_id',$paymentId);
      
    $userId=$user_info->uid;
    $_SESSION['uid']=$userId;
        
    $this->session->userdata('smsData');
    $where = ['uid' => $userId];
    $user = $this->pm->get_data('users',$where);
    $expired=date('d-m-Y',strtotime($user_info->pdate));
    $started=date('d-m-Y');

    # Send SMS
    $userName=$user[0]['name'];
    $userEmail=$user[0]['email'];
    $msg='Hello,'.$userName.' your Membership Started at '.$started.' & it Will Expired on '.$expired.' Thank You.Team SunshineApp | Hotline: 01714044180';
    $message = urlencode($msg);
    $to = urlencode($user[0]['mobile']);
    $token = urlencode("yfynrvxm-erdvybul-5lkgcewi-ivyfmpg8-r220zvby");

    $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
              
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $sms_result = curl_exec($ch);

    send_email($userEmail,$userName,$msg,'Your Membership Started at SunshineApp');
        
    $database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
    $sesdata = $this->session->userdata('tarndata');
      
    if(($sesdata['tran_id'] == $_POST['tran_id']) && ($sesdata['amount'] == $_POST['currency_amount']) && ($sesdata['currency'] == 'USD')){
      if($this->sslcommerz->ValidateResponse($_POST['currency_amount'], $sesdata['currency'], $_POST)){
        if($database_order_status == 'Pending'){
          echo "Transaction Successful<br>";
          echo "Processing";
        } else echo "Just redirect to your success page";
      }
    }
    redirect('uBill');
  }

  public function fail_payment()
  {
    $userId=$this->input->cookie('userId',true);
    $this->session->set_userdata('uid', $userId);
    redirect('uBill');
    $database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
    if($database_order_status == 'Pending') echo "Transaction Faild";
    else echo "Just redirect to your failed page";
  }

  public function cancel_payment()
  {
    $userId=$this->input->cookie('userId',true);
    $this->session->set_userdata('uid', $userId);
    redirect('uBill');
    $database_order_status = 'Pending'; // Check this from your database here Pending is dummy data,
    if($database_order_status == 'Pending') echo "Transaction Canceled";
    else echo "Just redirect to your failed page";
  }

  public function ipn_listener()
  {
    $database_order_status = 'Pending';
    $store_passwd = SSLCZ_STORE_PASSWD;
    if($ipn = $this->sslcommerz->ipn_request($store_passwd, $_POST)){
      if(($ipn['gateway_return']['status'] == 'VALIDATED' || $ipn['gateway_return']['status'] == 'VALID') && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS'){
        if($database_order_status == 'Pending'){
          echo $ipn['gateway_return']['status']."<br>";
          echo $ipn['ipn_result']['hash_validation_status']."<br>";
        }
      } elseif ($ipn['gateway_return']['status'] == 'FAILED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS'){
          if($database_order_status == 'Pending'){
            echo $ipn['gateway_return']['status']."<br>";
            echo $ipn['ipn_result']['hash_validation_status']."<br>";
          }
      } elseif ($ipn['gateway_return']['status'] == 'CANCELLED' && $ipn['ipn_result']['hash_validation_status'] == 'SUCCESS'){
        if($database_order_status == 'Pending'){
          echo $ipn['gateway_return']['status']."<br>";
          echo $ipn['ipn_result']['hash_validation_status']."<br>";
        }
      } else if($database_order_status == 'Pending') echo "Order status not ".$ipn['gateway_return']['status'];
    }
  }
}