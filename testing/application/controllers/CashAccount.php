<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class CashAccount extends  CI_Controller {

public function __construct()
  {
  parent::__construct();
  $this->load->model("prime_model","pm");
  $this->checkPermission();
}
public function index()
  {
  $data['title'] = 'Cash Account';
  $where = array('compid'=> $_SESSION['compid']);
  $data['cash'] = $this->pm->get_data('cash',$where);
  $this->load->view('cashaccount/cash_account',$data);
}

public function save_cash_account()
  {
  $info = $this->input->post();
 
  $data = array(
    'compid'   => $_SESSION['compid'],
    'cashName' => $info['cashName'],
    'balance'  => $info['balance'],
    'regby'    => $_SESSION['uid']
        );
  
  $result = $this->pm->insert_data('cash',$data);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Cash Account Added Successfully !</h4>
        </div>'
            ];
    }
  else
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Something is error !</h4>
        </div>'
            ];
    }
  $this->session->set_userdata($sdata);
  redirect('CashAccount');
}

public function get_cash_account_data()
  {
  $section = $this->pm->get_cash_account_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function update_cash_account()
  {
  $info = $this->input->post();
 
  $data = array(
    'compid'   => $_SESSION['compid'],
    'cashName' => $info['cashName'],
    'balance'  => $info['balance'],
    'status'   => $info['status'],
    'regby'    => $_SESSION['uid']
        );
  $where = array(
    'ca_id' => $info['ca_id']
        );
  $result = $this->pm->update_data('cash',$data,$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Cash Account updated Successfully !</h4>
        </div>'
            ];
    }
  else
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Something is error !</h4>
        </div>'
            ];
    }
  $this->session->set_userdata($sdata);
  redirect('CashAccount');
}

public function delete_cash_account($id)
  {
  $where = array(
    'ca_id' => $id
        );
  $result = $this->pm->delete_data('cash',$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Cash Account Delete Successfully !</h4>
        </div>'
            ];
    }
  else
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Something is error !</h4>
        </div>'
            ];
    }
  $this->session->set_userdata($sdata);
  redirect('CashAccount');
}

public function cash_reports()
  {
  $data['title'] = 'Cash Book';
  $where = array('compid'=> $_SESSION['compid']);
  $data['cash'] = $this->pm->get_data('cash',$where);
  $data['company'] = $this->pm->company_details();

  $this->load->view('cashaccount/cashreports',$data);
}

public function transfer_account_list()
  {
  $data['title'] = 'Transfer Account';
  $where = array('compid'=> $_SESSION['compid']);
  $data['cash'] = $this->pm->get_data('transfer_account',$where);
  $data['balances'] = $this->pm->balance('bankaccount');
  $this->load->view('cashaccount/transfer_account',$data);
}

public function account_balance_cash($id){
    $section = $this->pm->get_cash_balance($id);
    $someJSON = json_encode($section);
    echo $someJSON;
}

public function account_balance_bank($id){
  $section = $this->pm->get_bank_balance($id);
  $someJSON = json_encode($section);
  echo $someJSON;
}
public function account_balance_mobile($id){
  $section = $this->pm->get_mobile_balance($id);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function save_transfer_account()
  {
  $info = $this->input->post();

  $data = array(
    'compid'  => $_SESSION['compid'],
    'facType' => $info['accountType'],
    'facAcno' => $info['accountNo'],
    'sacType' => $info['account2Type'],
    'sacAcno' => $info['account2No'],
    'amount'  => $info['amount'],
    'note'    => $info['note'],
    'regby'   => $_SESSION['uid']
        );
  
  $result = $this->pm->insert_data('transfer_account',$data);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Successfully Add transfer Account !</h4>
        </div>'
            ];
    }
  else
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Something is error !</h4>
        </div>'
            ];
    }
  $this->session->set_userdata($sdata);
  redirect('transAccount');
}

public function edit_transfer_account($id)
  {
  $data['title'] = 'Transfer Account';
  $where = array(
      'compid'=> $_SESSION['compid'],
      'ta_id' => $id
      );
  $cash = $this->pm->get_data('transfer_account',$where);
  $data['cash'] = $cash[0];
  $data['balances'] = $this->pm->balance('bankaccount');
  $this->load->view('cashaccount/edit_transfer_account',$data);
}

public function update_transfer_account()
  {
  $info = $this->input->post();
  
  $tid= $info['ta_id'];
  
  $where = array(
      'ta_id' => $tid
      );

  $data = array(

    'facType' => $info['accountType'],
    'facAcno' => $info['accountNo'],
    'sacType' => $info['account2Type'],
    'sacAcno' => $info['account2No'],
    'amount'  => $info['amount'],
    'note'    => $info['note'],
    'upby'    => $_SESSION['uid']
        );
  
  $result = $this->pm->update_data('transfer_account',$data,$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Successfully updated transfer Account !</h4>
        </div>'
            ];
    }
  else
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Failed !</h4>
        </div>'
            ];
    }
  $this->session->set_userdata($sdata);
  redirect('transAccount');
}

public function delete_balance_transfer($id)
  {
  $where = array(
    'ta_id' => $id
        );
  
  $result = $this->pm->delete_data('transfer_account',$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Successfully delete transfer Account !</h4>
        </div>'
            ];
    }
  else
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Something is error !</h4>
        </div>'
            ];
    }
  $this->session->set_userdata($sdata);
  redirect('transAccount');
}

public function balance_adjustment()
  {
    $data['title'] = 'Voucher';
    
    $where = array(
        'compid' => $_SESSION['compid']
            );
            
    $data['customer'] = $this->pm->get_data('customers',$where);
    $data['supplier'] = $this->pm->get_data('suppliers',$where);

  $this->load->view('cashaccount/balance_adjustment',$data);
}

public function getAccountNo()
    {
    $str = '';
    $where = array(
        'status' => 'Active',
        'compid' => $_SESSION['compid']
            );

    $accountType = $this->input->post('id');
    if ($accountType == 'Bank')
        {
        $accounts = $this->pm->get_data('bankaccount',$where);
        if (count($accounts) == 0)
            {
            $str .= "<option value='0'>Please Add Bank account</option>";
            } 
        else 
            {
            foreach ($accounts as $value) {
                $str .= "<option value='".$value['ba_id']."'>".$value['bankName'].' '.$value['branchName'].' '.$value['accountNo'].' '.$value['accountName']."</option>";
            }
        }
        } 
    else if ($accountType == 'Mobile')
        {
        $accounts = $this->pm->get_data('mobileaccount',$where);
        if (count($accounts) == 0) 
            {
            $str .= "<option value='0'>Please Add mobile account</option>";
            } 
        else 
            {
            foreach ($accounts as $value) {
                $str .= "<option value='".$value['ma_id']."'>".$value['accountName'].' '.$value['accountNo']."</option>";
                }
            }
        } 
    else if ($accountType == 'Cash') 
        {
        $accounts = $this->pm->get_data('cash',$where);
        if (count($accounts) == 0) 
        
            {
            $str .= "<option value='0'>Please Add cash account</option>";
            } 
            
        else 
            {
            foreach ($accounts as $value) {
                $str .= "<option value='".$value['ca_id']."'>".$value['cashName']."</option>";
                }
            }
        } 
    else 
        {
        $str .= "<option >Please account Type</option>";
        }
    echo json_encode($str);
}

public function get_cost_type()
    {
    $where = array(
        'compid' => $_SESSION['compid']
            );
    $section = $this->pm->get_data('cost_type',$where);
    $someJSON = json_encode($section);
    echo $someJSON;
}

public function adjustment_list()
  {
  $data['title'] = 'Adjustment List';

  $where = array(
    'compid' => $_SESSION['compid']
        );
  $other = array(
    'order_by' => 'id'
        );

  $data['adjustment'] = $this->pm->get_data('balance_adjustment',$where,false,false,$other);
  $this->load->view('cashaccount/balance_adjustment_list',$data);
}

public function save_balance_adjustment()
    {
    $info = $this->input->post();

    $data = array(
        'date' => date('Y-m-d',strtotime($info['date'])),
        'compid'      => $_SESSION['compid'],
        'empid'       => $_SESSION['empid'],
        'note'    => $info['note'],
        'adjustment_type' => $info['adjustment_type'],
        'accountType' => $info['accountType'],
        'accountNo'   => $info['accountNo'],
        'amount'      => $info['amount'],
        'regby'       => $_SESSION['uid']
            );
    
    $result = $this->pm->insert_data('balance_adjustment',$data);
    $insert_id=$this->db->insert_id();
    $get_recent_adjustment_details = $this->db->select('*')
                                              ->from('balance_adjustment')
                                              ->where('id',$insert_id)
                                              ->get()
                                              ->row();
    if($get_recent_adjustment_details->accountType=='Cash'){
        $query =  $this->db->select('*')
                              ->from('cash')
                              ->where('ca_id',$get_recent_adjustment_details->accountNo)
                              ->get()
                              ->row();

        if($get_recent_adjustment_details->adjustment_type=='Deposit'){
          $total_amount = $query->balance+$get_recent_adjustment_details->amount;
        }else{
          $total_amount = $query->balance-$get_recent_adjustment_details->amount;
        }

        $where = array(
          'ca_id' => $query->ca_id
          );
              
          $data = array(
            'balance' => $total_amount,
          );
                
          $result2 = $this->pm->update_data('cash',$data,$where);
                              
        }else if($get_recent_adjustment_details->accountType=='Bank'){
          $query =  $this->db->select('*')
                              ->from('bankaccount')
                              ->where('ba_id',$get_recent_adjustment_details->accountNo)
                              ->get()
                              ->row();
  
          if($get_recent_adjustment_details->adjustment_type=='Deposit'){
            $total_amount = $query->balance+$get_recent_adjustment_details->amount;
          }else{
            $total_amount = $query->balance-$get_recent_adjustment_details->amount;
          }
  
          $where = array(
            'ba_id' => $query->ba_id
            );
                
            $data = array(
              'balance' => $total_amount,
            );
                  
            $result2 = $this->pm->update_data('bankaccount',$data,$where);
                                
          }else if($get_recent_adjustment_details->accountType=='Mobile'){
            $query =  $this->db->select('*')
                                ->from('mobileaccount')
                                ->where('ma_id',$get_recent_adjustment_details->accountNo)
                                ->get()
                                ->row();
    
            if($get_recent_adjustment_details->adjustment_type=='Deposit'){
              $total_amount = $query->balance+$get_recent_adjustment_details->amount;
            }else{
              $total_amount = $query->balance-$get_recent_adjustment_details->amount;
            }
    
            $where = array(
              'ma_id' => $query->ma_id
              );
                  
              $data = array(
                'balance' => $total_amount,
              );
                    
              $result2 = $this->pm->update_data('mobileaccount',$data,$where);
                                  
            }

    if($result && $result2)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Balance Adjustment Add Successfully !</h4>
            </div>'
                ];  
        }
    else
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> Failed !</h4>
            </div>'
                ];
        }
    $this->session->set_userdata($sdata);
    redirect('adjustment_list');
}



 
}