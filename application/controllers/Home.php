<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Home extends CI_Controller {

public function __construct()
  {
  parent::__construct();
  $this->load->model("prime_model",'pm');       
  $this->checkPermission();
}

        ################################################
        #   /* Pages  start*/                          #
        ################################################

public function index()
  {
  $data['title'] = 'Dashboard';

  $data['sale'] = $this->pm->today_sales_amount();
  $data['purchase'] = $this->pm->today_purchases_amount();
  $data['cvoucher'] = $this->pm->today_cvoucher_amount();
  $data['dvoucher'] = $this->pm->today_dvoucher_amount();
  $data['svoucher'] = $this->pm->today_svoucher_amount();

  $data['user'] = $this->pm->count_all_user();
  $data['auser'] = $this->pm->count_all_active_user();
  $data['iuser'] = $this->pm->count_all_inactive_user();
  $data['tuser'] = $this->pm->count_all_today_user();
  $data['muser'] = $this->pm->count_all_month_user();
  
  $data['tsale'] = $this->pm->total_sales_amount();
  $data['service'] = $this->pm->total_service_sales_amount();
  // $data['purchase'] = $this->pm->total_purchases_amount();
  $data['empp'] = $this->pm->total_emp_payments_amount();
  $data['return'] = $this->pm->total_returns_amount();
  $data['preturn'] = $this->pm->total_preturns_amount();
  $data['tcvoucher'] = $this->pm->total_cvoucher_amount();
  $data['tdvoucher'] = $this->pm->total_dvoucher_amount();
  $data['tsvoucher'] = $this->pm->total_svoucher_amount();
  $data['cost'] = $this->pm->total_cogs_amount();
  
  $data['company'] = $this->pm->company_details();
  
  //best sale part
  $data['sales'] = $this->pm->get_top_sales_product_data();
  //low stock part
  $pwhere = array(
            'compid' =>  $_SESSION['compid']
            );
        
        $product = $this->pm->get_data('products',$pwhere);
        
        foreach($product as $pro){
            $stock = $this->db->select('stock.*,products.*')
                              ->from('stock')
                              ->join('products','products.productID=stock.product')
                              ->where('stock.totalPices <',$pro['alertqty'])
                              ->where('stock.compid',$_SESSION['compid'])
                              ->get()
                              ->result();
        $data['stock'] = $stock;
        }
  $wheret = array('compid'=> $_SESSION['compid']);
  $data['cash'] = $this->pm->get_data('cash',$wheret);
    
  $this->load->view('home',$data);
}

public function setting_pages()
  {
  $data['title'] = 'Setting';

  $data['category'] = $this->pm->total_category();
  $data['unit'] = $this->pm->total_unit();
  $data['expense'] = $this->pm->total_expense_type();
  $data['dept'] = $this->pm->total_depertment();
   $data['area'] = $this->pm->total_area();
   $data['asset'] = $this->pm->count_all_asset();
  $data['bank'] = $this->pm->total_bank_account();
  $data['mobile'] = $this->pm->total_mobile_account();
  $data['notice'] = $this->pm->total_notice();
  $data['utype'] = $this->pm->total_user_type();
  
  $this->load->view('setting_pages',$data);
}

public function user_setting_pages()
  {
  $data['title'] = 'User';

  $data['customer'] = $this->pm->total_customer();
  $data['supplier'] = $this->pm->total_supplier();
  $data['employee'] = $this->pm->total_employee();
  $data['user'] = $this->pm->total_user();
  
  $this->load->view('user_setting',$data);
}

public function user_reports_pages()
  {
  $data['title'] = 'User Reports';

  $data['sale'] = $this->pm->total_sale();
  $data['purchase'] = $this->pm->total_purchase();
  $data['psale'] = $this->pm->total_sales_amount();
  $data['ppurchase'] = $this->pm->total_purchases_amount();
  $data['pempp'] = $this->pm->total_emp_payments_amount();
  $data['preturn'] = $this->pm->total_returns_amount();
  $data['pcvoucher'] = $this->pm->total_cvoucher_amount();
  $data['pdvoucher'] = $this->pm->total_dvoucher_amount();
  $data['psvoucher'] = $this->pm->total_svoucher_amount();
  $data['customer'] = $this->pm->total_customer();
  $data['supplier'] = $this->pm->total_supplier();
  $data['stock'] = $this->pm->total_stock();
  $data['voucher'] = $this->pm->total_voucher();
  
  $data['psale'] = $this->pm->pre_sales_amount();
  $data['ppurchase'] = $this->pm->pre_purchases_amount();
  $data['pcvoucher'] = $this->pm->pre_cvoucher_amount();
  $data['pdvoucher'] = $this->pm->pre_dvoucher_amount();
  $data['psvoucher'] = $this->pm->pre_svoucher_amount();
  $data['pempp'] = $this->pm->pre_emp_payments_amount();
  $data['preturn'] = $this->pm->pre_returns_amount();

  $data['csale'] = $this->pm->today_sales_amount();
  $data['cpurchase'] = $this->pm->today_purchases_amount();
  $data['ccvoucher'] = $this->pm->today_cvoucher_amount();
  $data['cdvoucher'] = $this->pm->today_dvoucher_amount();
  $data['csvoucher'] = $this->pm->today_svoucher_amount();
  $data['cempp'] = $this->pm->today_emp_payments_amount();
  $data['creturn'] = $this->pm->today_returns_amount();
  
  $data['ksale'] = $this->pm->cash_sales_amount();
  $data['kpurchase'] = $this->pm->cash_purchases_amount();
  $data['kcvoucher'] = $this->pm->cash_cvoucher_amount();
  $data['kdvoucher'] = $this->pm->cash_dvoucher_amount();
  $data['ksvoucher'] = $this->pm->cash_svoucher_amount();
  $data['kempp'] = $this->pm->cash_emp_payments_amount();
  $data['kreturn'] = $this->pm->cash_returns_amount();

  $data['bsale'] = $this->pm->bank_sales_amount();
  $data['bpurchase'] = $this->pm->bank_purchases_amount();
  $data['bcvoucher'] = $this->pm->bank_cvoucher_amount();
  $data['bdvoucher'] = $this->pm->bank_dvoucher_amount();
  $data['bsvoucher'] = $this->pm->bank_svoucher_amount();
  $data['bempp'] = $this->pm->bank_emp_payments_amount();
  $data['breturn'] = $this->pm->bank_returns_amount();

  $data['msale'] = $this->pm->mobile_sales_amount();
  $data['mpurchase'] = $this->pm->mobile_purchases_amount();
  $data['mcvoucher'] = $this->pm->mobile_cvoucher_amount();
  $data['mdvoucher'] = $this->pm->mobile_dvoucher_amount();
  $data['msvoucher'] = $this->pm->mobile_svoucher_amount();
  $data['mempp'] = $this->pm->mobile_emp_payments_amount();
  $data['mreturn'] = $this->pm->mobile_returns_amount();

  $data['product'] = $this->pm->total_products();
  
  $this->load->view('report_settings',$data);
}

public function profile() 
  {
  $data['title'] = 'User Profile';

  $data['user'] = $this->pm->get_profile_data();
  
  $this->load->view('profile',$data);
}

public function profile_update()
  {
  $config['upload_path'] = './upload/users/';
  $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG';
  $config['max_size'] = 0;
  $config['max_width'] = 0;
  $config['max_height'] = 0;

  $this->load->library('upload', $config);
  $this->upload->initialize($config);
  if($this->upload->do_upload('user_photo'))
    {
    $img = $this->upload->data('file_name');
    }
  else
    {
    $img = '';
    }

  $data = array('photo' =>  $img);
  $where = array('uid' => $this->input->post('uid'));
  $result = $this->pm->update_data('users',$data,$where);

  redirect('myProfile');
}

public function company_profile()
  {
  $data['title'] = 'Profile';
  $data['company'] = $this->pm->company_details();
  
  $this->load->view('company_profile',$data);
}

public function account_setting()
  {
  $data['title'] = 'Account Setting';
    
  $this->load->view('accountSetting',$data);
}

public function save_account_setting()
  {
  $cpassword = $this->input->post('cpassword');
  $password  = $this->input->post('password');
  $npassword = $this->input->post('npassword');

  if ($password == $npassword)
    {
    $cpc = $this->pm->current_password_check($cpassword);
    //var_dump($fpe); exit();
    if($cpc)
      {
      $empdata = [
        'password' => $password,
        'upby'     => $_SESSION['uid']
            ];

      $where = [
        'compid' => $_SESSION['compid'],
        'uid'    => $_SESSION['uid']
            ];   
            
      $result = $this->pm->update_data('users',$empdata,$where);

      if($result)
        {
        $sdata = [
          'exception' => '<div class="alert alert-primary alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Account Setting is complete. !</h4>
            </div>'
                ]; 

        $this->session->set_userdata($sdata);
        redirect('Home');
         }
      else
        {
        $sdata = [
          'exception' => '<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Some things is worng. Check !</h4>
            </div>'
                ]; 

        $this->session->set_userdata($sdata);
        redirect('aSetting');
        }
      }
    else
      {
      $sdata = [
        'exception' => '<div class="alert alert-danger alert-dismissible">
          <h4><i class="icon fa fa-check"></i> Can not mass previous Password !</h4>
          </div>'
              ]; 

      $this->session->set_userdata($sdata);
      redirect('aSetting');
      }
    }
  else
    {
    $sdata = [
      'exception' => '<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Confirm Your Password !</h4>
        </div>'
            ]; 

    $this->session->set_userdata($sdata);
    redirect('aSetting');
    }
}

// public function all_transaction_report()
//   {
//   $data = ['title' => 'Ledger Book'];

//   if(isset($_GET['search']))
//     {
//     $report = $_GET['reports'];
        
//     if($report == 'dailyReports')
//       {
//       $sdate = date("Y-m-d", strtotime($_GET['sdate']));
//       $edate = date("Y-m-d", strtotime($_GET['edate']));
//       $dparticular = $_GET['dparticular'];
//       $data['sdate'] = $sdate;
//       $data['edate'] = $edate;
//       $data['report'] = $report;
//       $data['dparticular'] = $dparticular;

      
//       $data['pruchase'] = $this->pm->get_all_dpurchase_data($sdate,$edate,$dparticular);
//       $data['sale'] = $this->pm->get_all_dsale_data($sdate,$edate,$dparticular);
//       // $data['service'] = $this->pm->get_all_service_data($sdate,$edate,$dparticular);
//       $data['voucher'] = $this->pm->get_all_dvoucher_data($sdate,$edate,$dparticular);
//       }
//     else if ($report == 'monthlyReports')
//       {
//       $month = $_GET['month'];
//       $data['month'] = $month;
//       $year = $_GET['year'];
//       $data['year'] = $year;
//       $mparticular = $_GET['mparticular'];

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
//       $data['mparticular'] = $mparticular;
      
//       $data['pruchase'] = $this->pm->get_all_mpurchase_data($month,$year,$mparticular);
//       $data['sale'] = $this->pm->get_all_msale_data($month,$year,$mparticular);
//       // $data['service'] = $this->pm->get_all_mservice_data($month,$year,$mparticular);
//       $data['voucher'] = $this->pm->get_all_mvoucher_data($month,$year,$mparticular);
//       }
//     else if ($report == 'yearlyReports')
//       {
//       $year = $_GET['ryear'];
//       $rparticular = $_GET['rparticular'];
//       $data['year'] = $year;
//       $data['rparticular'] = $rparticular;
//       $data['report'] = $report;
      
//       $data['pruchase'] = $this->pm->get_all_ypurchase_data($year,$rparticular);
//       $data['sale'] = $this->pm->get_all_ysale_data($year,$rparticular);
//       // $data['service'] = $this->pm->get_all_yservice_data($year,$rparticular);
//       $data['voucher'] = $this->pm->get_all_yvoucher_data($year,$rparticular);
//       }
//     }
//   else
//     {
//     $data['pruchase'] = $this->pm->get_all_purchase_data();
//     $data['sale'] = $this->pm->get_all_sale_data();
//     // $data['service'] = $this->pm->get_all_service_data();
//     $data['voucher'] = $this->pm->get_all_voucher_data();
//     }

//   $this->load->view('ledgerbook',$data);
// }

public function all_transaction_report()
{
    $data = ['title' => 'Ledger Book'];

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Initialize variables
    $purchase = [];
    $sale = [];
    $voucher = [];
    $total_records = 0;

    if (isset($_GET['search'])) {
        $report = $_GET['reports'];

        if ($report == 'dailyReports') {
            $sdate = date("Y-m-d", strtotime($_GET['sdate']));
            $edate = date("Y-m-d", strtotime($_GET['edate']));
            $dparticular = $_GET['dparticular'];
            $data['sdate'] = $sdate;
            $data['edate'] = $edate;
            $data['report'] = $report;
            $data['dparticular'] = $dparticular;

            // Fetch total records for each type
            $total_purchase_records = count($this->pm->get_all_dpurchase_data($sdate, $edate, $dparticular));
            $total_sale_records = count($this->pm->get_all_dsale_data($sdate, $edate, $dparticular));
            $total_voucher_records = count($this->pm->get_all_dvoucher_data($sdate, $edate, $dparticular));

            // Fetch paginated data
            $purchase = $this->pm->get_all_dpurchase_data($sdate, $edate, $dparticular, $limit, $offset);
            $sale = $this->pm->get_all_dsale_data($sdate, $edate, $dparticular, $limit, $offset);
            $voucher = $this->pm->get_all_dvoucher_data($sdate, $edate, $dparticular, $limit, $offset);

            // Calculate total records
            $total_records = $total_purchase_records + $total_sale_records + $total_voucher_records;
        } elseif ($report == 'monthlyReports') {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $mparticular = $_GET['mparticular'];
            $data['month'] = $month;
            $data['year'] = $year;
            $data['report'] = $report;
            $data['name'] = date("F", mktime(0, 0, 0, $month, 10)); // Get month name
            $data['mparticular'] = $mparticular;

            // Fetch total records for each type
            $total_purchase_records = count($this->pm->get_all_mpurchase_data($month, $year, $mparticular));
            $total_sale_records = count($this->pm->get_all_msale_data($month, $year, $mparticular));
            $total_voucher_records = count($this->pm->get_all_mvoucher_data($month, $year, $mparticular));

            // Fetch paginated data
            $purchase = $this->pm->get_all_mpurchase_data($month, $year, $mparticular, $limit, $offset);
            $sale = $this->pm->get_all_msale_data($month, $year, $mparticular, $limit, $offset);
            $voucher = $this->pm->get_all_mvoucher_data($month, $year, $mparticular, $limit, $offset);

            // Calculate total records
            $total_records = $total_purchase_records + $total_sale_records + $total_voucher_records;
        } elseif ($report == 'yearlyReports') {
            $year = $_GET['ryear'];
            $rparticular = $_GET['rparticular'];
            $data['year'] = $year;
            $data['rparticular'] = $rparticular;
            $data['report'] = $report;

            // Fetch total records for each type
            $total_purchase_records = count($this->pm->get_all_ypurchase_data($year, $rparticular));
            $total_sale_records = count($this->pm->get_all_ysale_data($year, $rparticular));
            $total_voucher_records = count($this->pm->get_all_yvoucher_data($year, $rparticular));

            // Fetch paginated data
            $purchase = $this->pm->get_all_ypurchase_data($year, $rparticular, $limit, $offset);
            $sale = $this->pm->get_all_ysale_data($year, $rparticular, $limit, $offset);
            $voucher = $this->pm->get_all_yvoucher_data($year, $rparticular, $limit, $offset);

            // Calculate total records
            $total_records = $total_purchase_records + $total_sale_records + $total_voucher_records;
        }
    } else {
        // Fetch total records for each type
        $total_purchase_records = count($this->pm->get_all_purchase_data());
        $total_sale_records = count($this->pm->get_all_sale_data());
        $total_voucher_records = count($this->pm->get_all_voucher_data());

        // Fetch paginated data
        $purchase = $this->pm->get_all_purchase_data($limit, $offset);
        $sale = $this->pm->get_all_sale_data($limit, $offset);
        $voucher = $this->pm->get_all_voucher_data($limit, $offset);

        // Calculate total records
        $total_records = $total_purchase_records + $total_sale_records + $total_voucher_records;
    }

    $data['purchase'] = $purchase;
    $data['sale'] = $sale;
    $data['voucher'] = $voucher;

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
            $pagination_html .= ' active'; // Adding "active" class for the current page
        }
        $pagination_html .= '"><a href="?page=' . $i . '">' . $i . '</a></li>';
    }
    if ($page < $total_pages) {
        $pagination_html .= '<li class="paginated"><a href="?page=' . ($page + 1) . '">Next</a></li>';
    }
    $pagination_html .= '</ul>';

    $data['pagination_html'] = $pagination_html;

    $this->load->view('ledgerbook', $data);
}

        ################################################
        #   /* Pages  end*/                            #
        ################################################
}