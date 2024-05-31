<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class BankAccount extends  CI_Controller {

public function __construct()
  {
  parent::__construct(); 
  $this->load->model("prime_model","pm");
  $this->checkPermission();
}

public function index()
  {
  $data['title'] = 'Bank Account';    

  $where = array('compid'=> $_SESSION['compid']);

  $data['bank'] = $this->pm->get_data('bankaccount',$where);

  $this->load->view('bankaccount/bankAccountList',$data);
}

public function save_bank_account()
  {
  $info = $this->input->post();

  $data = array(
    'compid'     => $_SESSION['compid'],
    'accountName'=> $info['accountName'],
    'accountNo'  => $info['accountNo'],
    'bankName'   => $info['bankName'],
    'branchName' => $info['branchName'],      
    'balance'    => $info['balance'],        
    'regby'      => $_SESSION['uid']
        );
  //var_dump($sale); exit();
  
  $result = $this->pm->insert_data('bankaccount',$data);

  if($result)
    {
    $sdata = [
      'exception' => '<div class="alert alert-primary alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Bank Account Added !</h4>
        </div>'
            ]; 
    }
  else
    {
    $sdata = [
      'exception' => '<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Failed !</h4>
        </div>'
            ]; 
    }
  $this->session->set_userdata($sdata);
  redirect('BankAccount');
}

public function get_bank_account()
  {
  $grup = $this->pm->get_bank_account($_POST['id']);
  $someJSON = json_encode($grup);
  echo $someJSON;
}

public function update_bank_account()
  {
  $info = $this->input->post();

  $data = array(
    'compid'     => $_SESSION['compid'],
    'accountName'=> $info['accountName'],
    'accountNo'  => $info['accountNo'],
    'bankName'   => $info['bankName'],
    'branchName' => $info['branchName'],      
    'balance'    => $info['balance'],        
    'status'     => $info['status'],        
    'upby'       => $_SESSION['uid']
        );
  //var_dump($sale); exit();
  $where = [
    'ba_id' => $info['bankAccountId']
          ]; 
  $result = $this->pm->update_data('bankaccount',$data,$where);

  if($result)
    {
    $sdata = [
      'exception' => '<div class="alert alert-primary alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Bank Account updated !</h4>
        </div>'
            ]; 
    }
  else
    {
    $sdata = [
      'exception' => '<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Failed !</h4>
        </div>'
            ]; 
    }
  $this->session->set_userdata($sdata);
  redirect('BankAccount');
}

public function bank_account_delete($id)
  {
  $where = array(
    'ba_id' => $id
          );

  $result = $this->pm->delete_data('bankaccount',$where);
  
  if($result)
    {
    $sdata = [
      'exception' => '<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Bank Account deleted !</h4>
        </div>'
            ]; 
    }
  else
    {
    $sdata = [
      'exception' => '<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Failed !</h4>
        </div>'
            ]; 
    }
  $this->session->set_userdata($sdata);
  redirect('BankAccount');
}

public function mobile_reports()
  {
  $data['title'] = 'Bank Book';
  $where = array('compid'=> $_SESSION['compid']);
  
  $data['bank'] = $this->pm->get_data('bankaccount',$where);
  $data['company'] = $this->pm->company_details();

  $this->load->view('bankaccount/bankreports',$data);
}

// public function bank_transation_reports()
//   {
//   $data = ['title' => 'Bank Report'];

//   if(isset($_GET['search']))
//     {
//     $report = $_GET['reports'];
        
//     if($report == 'dailyReports')
//       {
//       $sdate = date("Y-m-d", strtotime($_GET['sdate']));
//       $edate = date("Y-m-d", strtotime($_GET['edate']));
//       $data['sdate'] = $sdate;
//       $data['edate'] = $edate;
//       $data['report'] = $report;
      
//       $data['pruchase'] = $this->pm->get_bank_dpurchase_data($sdate,$edate);
//       $data['sale'] = $this->pm->get_bank_dsale_data($sdate,$edate);
//       $data['sreturn'] = $this->pm->get_bank_dsreturn_data($sdate,$edate);
//       $data['preturn'] = $this->pm->get_bank_dpreturn_data($sdate,$edate);
//       $data['voucher'] = $this->pm->get_bank_dvoucher_data($sdate,$edate);
//       $data['salary'] = $this->pm->get_bank_dsalary_data($sdate,$edate);
//       }
//     else if ($report == 'monthlyReports')
//       {
//       $month = $_GET['month'];
//       $data['month'] = $month;
//       $year = $_GET['year'];
//       $data['year'] = $year;
//       if($month == 1)
//         {
//         $name = 'January';
//         }
//       elseif ($month == 2)
//         {
//         $name = 'February';
//         }
//       elseif ($month == 3)
//         {
//         $name = 'March';
//         }
//       elseif ($month == 4)
//         {
//         $name = 'April';
//         }
//       elseif ($month == 5)
//         {
//         $name = 'May';
//         }
//       elseif ($month == 6)
//         {
//         $name = 'June';
//         }
//       elseif ($month == 7)
//         {
//         $name = 'July';
//         }
//       elseif ($month == 8)
//         {
//         $name = 'August';
//         }
//       elseif ($month == 9)
//         {
//         $name = 'September';
//         }
//       elseif ($month == 10)
//         {
//         $name = 'October';
//         }
//       elseif ($month == 11)
//         {
//         $name = 'November';
//         }
//       else
//         {
//         $name = 'December';
//         }

//       $data['name'] = $name;
//       $data['report'] = $report;
      
//       $data['pruchase'] = $this->pm->get_bank_mpurchase_data($month,$year);
//       $data['sale'] = $this->pm->get_bank_msale_data($month,$year);
//       $data['sreturn'] = $this->pm->get_bank_msreturn_data($month,$year);
//       $data['preturn'] = $this->pm->get_bank_mpreturn_data($month,$year);
//       $data['voucher'] = $this->pm->get_bank_mvoucher_data($month,$year);
//       $data['salary'] = $this->pm->get_bank_msalary_data($month,$year);
//       }
//     else if ($report == 'yearlyReports')
//       {
//       $year = $_GET['ryear'];
//       $data['year'] = $year;
//       $data['report'] = $report;
      
//       $data['pruchase'] = $this->pm->get_bank_ypurchase_data($year);
//       $data['sale'] = $this->pm->get_bank_ysale_data($year);
//       $data['sreturn'] = $this->pm->get_bank_ysreturn_data($year);
//       $data['preturn'] = $this->pm->get_bank_ypreturn_data($year);
//       $data['voucher'] = $this->pm->get_bank_yvoucher_data($year);
//       $data['salary'] = $this->pm->get_bank_ysalary_data($year);
//       }
//     }
//   else
//     {
//     $data['pruchase'] = $this->pm->get_bank_purchase_data();
//     $data['sale'] = $this->pm->get_bank_sale_data();
//     $data['sreturn'] = $this->pm->get_bank_sreturn_data();
//     $data['preturn'] = $this->pm->get_bank_preturn_data();
//     $data['voucher'] = $this->pm->get_bank_voucher_data();
//     $data['salary'] = $this->pm->get_bank_salary_data();
//     }

//   $this->load->view('bankaccount/bank_treport',$data);
// }

public function bank_transation_reports()
{
    $data = ['title' => 'Bank Report'];

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    if (isset($_GET['search'])) {
        $report = $_GET['reports'];

        if ($report == 'dailyReports') {
            $sdate = date("Y-m-d", strtotime($_GET['sdate']));
            $edate = date("Y-m-d", strtotime($_GET['edate']));
            $data['sdate'] = $sdate;
            $data['edate'] = $edate;
            $data['report'] = $report;

            $data['pruchase'] = array_slice($this->pm->get_bank_dpurchase_data($sdate, $edate), $offset, $limit);
            $data['sale'] = array_slice($this->pm->get_bank_dsale_data($sdate, $edate), $offset, $limit);
            $data['sreturn'] = array_slice($this->pm->get_bank_dsreturn_data($sdate, $edate), $offset, $limit);
            $data['preturn'] = array_slice($this->pm->get_bank_dpreturn_data($sdate, $edate), $offset, $limit);
            $data['voucher'] = array_slice($this->pm->get_bank_dvoucher_data($sdate, $edate), $offset, $limit);
            $data['salary'] = array_slice($this->pm->get_bank_dsalary_data($sdate, $edate), $offset, $limit);
        } else if ($report == 'monthlyReports') {
            $month = $_GET['month'];
            $data['month'] = $month;
            $year = $_GET['year'];
            $data['year'] = $year;

            if ($month == 1) {
                $name = 'January';
            } elseif ($month == 2) {
                $name = 'February';
            } elseif ($month == 3) {
                $name = 'March';
            } elseif ($month == 4) {
                $name = 'April';
            } elseif ($month == 5) {
                $name = 'May';
            } elseif ($month == 6) {
                $name = 'June';
            } elseif ($month == 7) {
                $name = 'July';
            } elseif ($month == 8) {
                $name = 'August';
            } elseif ($month == 9) {
                $name = 'September';
            } elseif ($month == 10) {
                $name = 'October';
            } elseif ($month == 11) {
                $name = 'November';
            } else {
                $name = 'December';
            }

            $data['name'] = $name;
            $data['report'] = $report;

            $data['pruchase'] = array_slice($this->pm->get_bank_mpurchase_data($month, $year), $offset, $limit);
            $data['sale'] = array_slice($this->pm->get_bank_msale_data($month, $year), $offset, $limit);
            $data['sreturn'] = array_slice($this->pm->get_bank_msreturn_data($month, $year), $offset, $limit);
            $data['preturn'] = array_slice($this->pm->get_bank_mpreturn_data($month, $year), $offset, $limit);
            $data['voucher'] = array_slice($this->pm->get_bank_mvoucher_data($month, $year), $offset, $limit);
            $data['salary'] = array_slice($this->pm->get_bank_msalary_data($month, $year), $offset, $limit);
        } else if ($report == 'yearlyReports') {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;

            $data['pruchase'] = array_slice($this->pm->get_bank_ypurchase_data($year), $offset, $limit);
            $data['sale'] = array_slice($this->pm->get_bank_ysale_data($year), $offset, $limit);
            $data['sreturn'] = array_slice($this->pm->get_bank_ysreturn_data($year), $offset, $limit);
            $data['preturn'] = array_slice($this->pm->get_bank_ypreturn_data($year), $offset, $limit);
            $data['voucher'] = array_slice($this->pm->get_bank_yvoucher_data($year), $offset, $limit);
            $data['salary'] = array_slice($this->pm->get_bank_ysalary_data($year), $offset, $limit);
        }
    } else {
        $data['pruchase'] = array_slice($this->pm->get_bank_purchase_data(), $offset, $limit);
        $data['sale'] = array_slice($this->pm->get_bank_sale_data(), $offset, $limit);
        $data['sreturn'] = array_slice($this->pm->get_bank_sreturn_data(), $offset, $limit);
        $data['preturn'] = array_slice($this->pm->get_bank_preturn_data(), $offset, $limit);
        $data['voucher'] = array_slice($this->pm->get_bank_voucher_data(), $offset, $limit);
        $data['salary'] = array_slice($this->pm->get_bank_salary_data(), $offset, $limit);
    }

    // Fetch the total counts for pagination
    $total_count = count($this->pm->get_bank_purchase_data()); // Assuming the count is the same for all types of data

    // Calculate total pages
    $total_pages = ceil($total_count / $limit);

    // Generate pagination HTML
    $pagination_html = '<ul class="pagination">';
    if ($page > 1) {
        $pagination_html .= '<li class="paginated"><a href="?page=' . ($page - 1) . '">Previous</a></li>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagination_html .= '<li class="paginated';
        if ($page == $i) {
            $pagination_html .= ' active';
        }
        $pagination_html .= '"><a href="?page=' . $i . '">' . $i . '</a></li>';
    }
    if ($page < $total_pages) {
        $pagination_html .= '<li class="paginated"><a href="?page=' . ($page + 1) . '">Next</a></li>';
    }
    $pagination_html .= '</ul>';

    $data['pagination_html'] = $pagination_html;

    $this->load->view('bankaccount/bank_treport', $data);
}

// public function bank_transation_legder()
//   {
//   $data = ['title' => 'Bank Ledger'];
//   $bwhere = array('compid'=> $_SESSION['compid']);
//   $data['bank'] = $this->pm->get_data('bankaccount',$bwhere);

//   if(isset($_GET['search']))
//     {
//     $report = $_GET['reports'];
        
//     if($report == 'dailyReports')
//       {
//       $sdate = date("Y-m-d", strtotime($_GET['sdate']));
//       $edate = date("Y-m-d", strtotime($_GET['edate']));
//       $data['sdate'] = $sdate;
//       $data['edate'] = $edate;
//       $data['report'] = $report;
//       $baid = $_GET['dbank'];
      
//       $where = array(
//         'ba_id' => $baid
//             );
            
//       $data['bledger'] = $this->pm->get_data('bankaccount',$where);
      
//       $data['pruchase'] = $this->pm->get_bank_dlpurchase_data($sdate,$edate,$baid);
//       $data['sale'] = $this->pm->get_bank_dlsale_data($sdate,$edate,$baid);
//       $data['sreturn'] = $this->pm->get_bank_dlsreturn_data($sdate,$edate,$baid);
//       $data['voucher'] = $this->pm->get_bank_dlvoucher_data($sdate,$edate,$baid);
//       $data['fbank'] = $this->pm->get_bank_dlfbank_data($sdate,$edate,$baid);
//       $data['tbank'] = $this->pm->get_bank_dltbank_data($sdate,$edate,$baid);
//       }
//     else if ($report == 'monthlyReports')
//       {
//       $month = $_GET['month'];
//       $data['month'] = $month;
//       $year = $_GET['year'];
//       $data['year'] = $year;
//             //var_dump($data['month']); exit();
//       if($month == 1)
//         {
//         $name = 'January';
//         }
//       elseif ($month == 2)
//         {
//         $name = 'February';
//         }
//       elseif ($month == 3)
//         {
//         $name = 'March';
//         }
//       elseif ($month == 4)
//         {
//         $name = 'April';
//         }
//       elseif ($month == 5)
//         {
//         $name = 'May';
//         }
//       elseif ($month == 6)
//         {
//         $name = 'June';
//         }
//       elseif ($month == 7)
//         {
//         $name = 'July';
//         }
//       elseif ($month == 8)
//         {
//         $name = 'August';
//         }
//       elseif ($month == 9)
//         {
//         $name = 'September';
//         }
//       elseif ($month == 10)
//         {
//         $name = 'October';
//         }
//       elseif ($month == 11)
//         {
//         $name = 'November';
//         }
//       else
//         {
//         $name = 'December';
//         }

//       $data['name'] = $name;
//       $data['report'] = $report;
//       $baid = $_GET['mbank'];

//       $where = array(
//         'ba_id' => $baid
//             );
            
//       $data['bledger'] = $this->pm->get_data('bankaccount',$where);
      
//       $data['pruchase'] = $this->pm->get_bank_mlpurchase_data($month,$year,$baid);
//       $data['sale'] = $this->pm->get_bank_mlsale_data($month,$year,$baid);
//       $data['sreturn'] = $this->pm->get_bank_mlsreturn_data($month,$year,$baid);
//       $data['voucher'] = $this->pm->get_bank_mlvoucher_data($month,$year,$baid);
//       $data['fbank'] = $this->pm->get_bank_mlfbank_data($month,$year,$baid);
//       $data['tbank'] = $this->pm->get_bank_mltbank_data($month,$year,$baid);
//       }
//     else if ($report == 'yearlyReports')
//       {
//       $year = $_GET['ryear'];
//       $data['year'] = $year;
//       $data['report'] = $report;
//       $baid = $_GET['ybank'];
      
//       $where = array(
//         'ba_id' => $baid
//             );
            
//       $data['bledger'] = $this->pm->get_data('bankaccount',$where);
      
//       $data['pruchase'] = $this->pm->get_bank_ylpurchase_data($year,$baid);
//       $data['sale'] = $this->pm->get_bank_ylsale_data($year,$baid);
//       $data['sreturn'] = $this->pm->get_bank_ylsreturn_data($year,$baid);
//       $data['voucher'] = $this->pm->get_bank_ylvoucher_data($year,$baid);
//       $data['fbank'] = $this->pm->get_bank_ylfbank_data($year,$baid);
//       $data['tbank'] = $this->pm->get_bank_yltbank_data($year,$baid);
//       }
//     }
//   else
//     {
//     }

//   $this->load->view('bankaccount/bank_ledger',$data);
// }

public function bank_transation_legder()
{
    $data = ['title' => 'Bank Ledger'];
    $bwhere = array('compid'=> $_SESSION['compid']);
    $data['bank'] = $this->pm->get_data('bankaccount',$bwhere);

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    if(isset($_GET['search']))
    {
        $report = $_GET['reports'];
        
        if($report == 'dailyReports')
        {
            $sdate = date("Y-m-d", strtotime($_GET['sdate']));
            $edate = date("Y-m-d", strtotime($_GET['edate']));
            $data['sdate'] = $sdate;
            $data['edate'] = $edate;
            $data['report'] = $report;
            $baid = $_GET['dbank'];
      
            $where = array('ba_id' => $baid);
            $data['bledger'] = $this->pm->get_data('bankaccount', $where, [], [], [], $limit, $offset);

            $data['pruchase'] = $this->pm->get_bank_dlpurchase_data($sdate, $edate, $baid, $limit, $offset);
            $data['sale'] = $this->pm->get_bank_dlsale_data($sdate, $edate, $baid, $limit, $offset);
            $data['sreturn'] = $this->pm->get_bank_dlsreturn_data($sdate, $edate, $baid, $limit, $offset);
            $data['voucher'] = $this->pm->get_bank_dlvoucher_data($sdate, $edate, $baid, $limit, $offset);
            $data['fbank'] = $this->pm->get_bank_dlfbank_data($sdate, $edate, $baid, $limit, $offset);
            $data['tbank'] = $this->pm->get_bank_dltbank_data($sdate, $edate, $baid, $limit, $offset);
      
            $total_records = count($this->pm->get_bank_dlpurchase_data($sdate, $edate, $baid)) +
                             count($this->pm->get_bank_dlsale_data($sdate, $edate, $baid)) +
                             count($this->pm->get_bank_dlsreturn_data($sdate, $edate, $baid)) +
                             count($this->pm->get_bank_dlvoucher_data($sdate, $edate, $baid)) +
                             count($this->pm->get_bank_dlfbank_data($sdate, $edate, $baid)) +
                             count($this->pm->get_bank_dltbank_data($sdate, $edate, $baid));
        }
        else if ($report == 'monthlyReports')
        {
            $month = $_GET['month'];
            $data['month'] = $month;
            $year = $_GET['year'];
            $data['year'] = $year;

            $data['name'] = date("F", mktime(0, 0, 0, $month, 10)); // Get the month name
            $data['report'] = $report;
            $baid = $_GET['mbank'];

            $where = array('ba_id' => $baid);
            $data['bledger'] = $this->pm->get_data('bankaccount', $where, [], [], [], $limit, $offset);

            $data['pruchase'] = $this->pm->get_bank_mlpurchase_data($month, $year, $baid, $limit, $offset);
            $data['sale'] = $this->pm->get_bank_mlsale_data($month, $year, $baid, $limit, $offset);
            $data['sreturn'] = $this->pm->get_bank_mlsreturn_data($month, $year, $baid, $limit, $offset);
            $data['voucher'] = $this->pm->get_bank_mlvoucher_data($month, $year, $baid, $limit, $offset);
            $data['fbank'] = $this->pm->get_bank_mlfbank_data($month, $year, $baid, $limit, $offset);
            $data['tbank'] = $this->pm->get_bank_mltbank_data($month, $year, $baid, $limit, $offset);

            $total_records = count($this->pm->get_bank_mlpurchase_data($month, $year, $baid)) +
                             count($this->pm->get_bank_mlsale_data($month, $year, $baid)) +
                             count($this->pm->get_bank_mlsreturn_data($month, $year, $baid)) +
                             count($this->pm->get_bank_mlvoucher_data($month, $year, $baid)) +
                             count($this->pm->get_bank_mlfbank_data($month, $year, $baid)) +
                             count($this->pm->get_bank_mltbank_data($month, $year, $baid));
        }
        else if ($report == 'yearlyReports')
        {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;
            $baid = $_GET['ybank'];
      
            $where = array('ba_id' => $baid);
            $data['bledger'] = $this->pm->get_data('bankaccount', $where, [], [], [], $limit, $offset);
      
            $data['pruchase'] = $this->pm->get_bank_ylpurchase_data($year, $baid, $limit, $offset);
            $data['sale'] = $this->pm->get_bank_ylsale_data($year, $baid, $limit, $offset);
            $data['sreturn'] = $this->pm->get_bank_ylsreturn_data($year, $baid, $limit, $offset);
            $data['voucher'] = $this->pm->get_bank_ylvoucher_data($year, $baid, $limit, $offset);
            $data['fbank'] = $this->pm->get_bank_ylfbank_data($year, $baid, $limit, $offset);
            $data['tbank'] = $this->pm->get_bank_yltbank_data($year, $baid, $limit, $offset);
      
            $total_records = count($this->pm->get_bank_ylpurchase_data($year, $baid)) +
                             count($this->pm->get_bank_ylsale_data($year, $baid)) +
                             count($this->pm->get_bank_ylsreturn_data($year, $baid)) +
                             count($this->pm->get_bank_ylvoucher_data($year, $baid)) +
                             count($this->pm->get_bank_ylfbank_data($year, $baid)) +
                             count($this->pm->get_bank_yltbank_data($year, $baid));
        }
    }

    // Calculate total pages
    $total_pages = ceil($total_records / $limit);

    // Generate pagination HTML
    $pagination_html = '<ul class="pagination">';
    if ($page > 1) {
        $pagination_html .= '<li class="paginated"><a href="?page=' . ($page - 1) . '">Previous</a></li>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagination_html .= '<li class="paginated';
        if ($page == $i) {
            $pagination_html .= ' active';
        }
        $pagination_html .= '"><a href="?page=' . $i . '">' . $i . '</a></li>';
    }
    if ($page < $total_pages) {
        $pagination_html .= '<li class="paginated"><a href="?page=' . ($page + 1) . '">Next</a></li>';
    }
    $pagination_html .= '</ul>';

    $data['pagination_html'] = $pagination_html;

    $this->load->view('bankaccount/bank_ledger', $data);
}

}