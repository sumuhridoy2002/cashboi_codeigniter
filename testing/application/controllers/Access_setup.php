<?php 
defined ('BASEPATH') OR exit('no direct script access allowed');
class Access_setup extends CI_Controller

##############################################################################
{   	/* Code Start From Here */
##############################################################################

public function __construct()
	{
  parent::__construct();
 	$this->load->model("prime_model","pm");
  	$this->checkPermission();
}

	#############################################################
	#				/* Pages start*/							#
	#############################################################
						
public function index()
	{
	$data = [
		'title' => 'Page Setup'
			];
	$data['master'] = $this->pm->get_data('tbl_master_page_title',false);
	$data['pagelist'] = $this->pm->get_page_and_function();

	$this->load->view('user_role/page_setup',$data);
}

public function add_master_title()
	{
  $info = $this->input->post();

	$data = [
		'c_master_title' => $info['c_master_title'],
		'master_title'   => $info['master_title'],
		'regby'          => $_SESSION['uid']
			];
		// var_dump($data); exit();

	$result = $this->pm->saveNewMaster_data($data);

	if($result)
		{
		$sdata = [
			'exception'  =>'<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4><i class ="icon fa fa-check"></i>Master Page Add Successfully !</h4>
				</div>'
				];
		}
	else
		{
		$sdata = [
			'exception'  => '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4><i class ="icon fa fa-warning"></i> Failed !</h4>
				</div>'
				];
		}
  $this->session->set_userdata($sdata);
  redirect('pageSetup');
}	

public function add_page_title()
	{
  $info = $this->input->post();

	$data = [
		'pagename'    => $info['pagename'],
		'cname'       => $info['cname'],
		'master_page' => $info['master_page'],
		'regby'       => $_SESSION['uid']
			];
		// var_dump($data); exit();

	$result = $this->pm->saveNewPage_data($data);

	if($result)
		{
		$sdata = [
			'exception'  =>'<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4><i class ="icon fa fa-check"></i> Page Add Successfully !</h4>
				</div>'
				];
		}
	else
		{
		$sdata = [
			'exception'  => '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4><i class ="icon fa fa-warning"></i> Failed !</h4>
				</div>'
				];
		}
  $this->session->set_userdata($sdata);
  redirect('pageSetup');	
}

public function get_page_data()
  {
  $master = $this->pm->get_page_data_by_master($_POST['id']);
  $someJSON = json_encode($master);
  echo $someJSON;
}

public function add_page_function_title()
	{
  $info = $this->input->post();

	$data = [
		'master'     => $info['master'],
		'pageid'     => $info['pageid'],
		'fcname'     => $info['fcname'],
		'pfunc_name' => $info['pfunc_name'],
		'regby'      => $_SESSION['uid']
			];
		// var_dump($data); exit();

	$result = $this->pm->saveNewPageFunction_data($data);

	if($result)
		{
		$sdata = [
			'exception'  =>'<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4><i class ="icon fa fa-check"></i> Page Function Add Successfully !</h4>
				</div>'
				];
		}
	else
		{
		$sdata = [
			'exception'  => '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4><i class ="icon fa fa-warning"></i> Failed !</h4>
				</div>'
				];
		}
  $this->session->set_userdata($sdata);
  redirect('pageSetup');
}

public function access_setup()
	{
	$data = [
		'title' => 'Access Setup'
			];

  $where = array('userrole'=> 2);
  $data['user'] = $this->pm->get_data('users',$where);
	
  $this->load->view('user_role/access_setup',$data);
}

public function view_access_setup($id)
  {
  $data = [
    'title' => 'Access Setup'
      ];

  $where = array('compid'=> $id);
  //var_dump($where); exit();
  $data['user'] = $this->pm->get_data('users',$where);
  $data['master'] = $this->pm->get_data('tbl_user_m_permission',$where);
  $data['page'] = $this->pm->get_data('tbl_user_p_permission',$where);
  $data['function'] = $this->pm->get_data('tbl_user_f_permission',$where);
  //var_dump($data['master']); exit();
  
  $this->load->view('user_role/view_access_setup',$data);
}

public function edit_access_setup($id)
  {
  $data = [
    'title' => 'Access Setup'
      ];

  $where = array('compid'=> $id);
  $data['user'] = $this->pm->get_data('users',$where);
  $data['master'] = $this->pm->get_data('tbl_user_m_permission',$where);
  $data['page'] = $this->pm->get_data('tbl_user_p_permission',$where);
  $data['function'] = $this->pm->get_data('tbl_user_f_permission',$where);
  
  $this->load->view('user_role/edit_access_setup',$data);
}

public function setup_user_type($id)
  {
  $info = $this->input->post();

  $where = array(
    'compid' => $id
        );

  if($info['dashboard'] == '1')
    {
    $dashboard = '1';
    }
  else
    {
    $dashboard = '0';
    }
  if($info['product'] == '1')
    {
    $product = '1';
    }
  else
    {
    $product = '0';
    }
  if($info['purchase'] == '1')
    {
    $purchase = '1';
    }
  else
    {
    $purchase = '0';
    }
  if($info['sales'] == '1')
    {
    $sales = '1';
    }
  else
    {
    $sales = '0';
    }
  if($info['return'] == '1')
    {
    $return = '1';
    }
  else
    {
    $return = '0';
    }
  if($info['quotation'] == '1')
    {
    $quotation = '1';
    }
  else
    {
    $quotation = '0';
    }
  if($info['voucher'] == '1')
    {
    $voucher = '1';
    }
  else
    {
    $voucher = '0';
    }
  if($info['users'] == '1')
    {
    $users = '1';
    }
  else
    {
    $users = '0';
    }
  if($info['report'] == '1')
    {
    $report = '1';
    }
  else
    {
    $report = '0';
    }
  if($info['setting'] == '1')
    {
    $setting = '1';
    }
  else
    {
    $setting = '0';
    }
  if($info['access_setup'] == '1')
    {
    $access_setup = '1';
    }
  else
    {
    $access_setup = '0';
    }
  if($info['help_support'] == '1')
    {
    $help_support = '1';
    }
  else
    {
    $help_support = '0';
    }
  if($info['Employee_payment'] == '1')
    {
    $Employee_payment = '1';
    }
  else
    {
    $Employee_payment = '0';
    }

  $data = [
    'dashboard'    => $dashboard,
    'product'      => $product,
    'purchase'     => $purchase,
    'sales'        => $sales,
    'return'       => $return,
    'quotation'    => $quotation,
    'voucher'      => $voucher,
    'users'        => $users,
    'report'       => $report,
    'setting'      => $setting,
    'access_setup' => $access_setup,
    'help_support' => $help_support,
    'Employee_payment' => $Employee_payment,
    'upby'         => $_SESSION['uid']
      ];

  $result = $this->pm->update_data('tbl_user_m_permission',$data,$where);
  
  $result2 = $this->pm->update_data('tbl_user_p_permission',$data,$where);

  if($info['add_product'] == '1')
    {
    $add_product = '1';
    }
  else
    {
    $add_product = '0';
    }
  if($info['view_product'] == '1')
    {
    $view_product = '1';
    }
  else
    {
    $view_product = '0';
    }
  if($info['edit_product'] == '1')
    {
    $edit_product = '1';
    }
  else
    {
    $edit_product = '0';
    }
  if($info['delete_product'] == '1')
    {
    $delete_product = '1';
    }
  else
    {
    $delete_product = '0';
    }
  if($info['store_product'] == '1')
    {
    $store_product = '1';
    }
  else
    {
    $store_product = '0';
    }
  if($info['import_product'] == '1')
    {
    $import_product = '1';
    }
  else
    {
    $import_product = '0';
    }
  if($info['new_purchase'] == '1')
    {
    $new_purchase = '1';
    }
  else
    {
    $new_purchase = '0';
    }
  if($info['edit_purchase'] == '1')
    {
    $edit_purchase = '1';
    }
  else
    {
    $edit_purchase = '0';
    }
  if($info['view_purchase'] == '1')
    {
    $view_purchase = '1';
    }
  else
    {
    $view_purchase = '0';
    }
  if($info['delete_purchase'] == '1')
    {
    $delete_purchase = '1';
    }
  else
    {
    $delete_purchase = '0';
    }
  if($info['new_sale'] == '1')
    {
    $new_sale = '1';
    }
  else
    {
    $new_sale = '0';
    }
  if($info['view_sale'] == '1')
    {
    $view_sale = '1';
    }
  else
    {
    $view_sale = '0';
    }
  if($info['edit_sale'] == '1')
    {
    $edit_sale = '1';
    }
  else
    {
    $edit_sale = '0';
    }
  if($info['delete_sale'] == '1')
    {
    $delete_sale = '1';
    }
  else
    {
    $delete_sale = '0';
    }
  if($info['new_return'] == '1')
    {
    $new_return = '1';
    }
  else
    {
    $new_return = '0';
    }
  if($info['view_return'] == '1')
    {
    $view_return = '1';
    }
  else
    {
    $view_return = '0';
    }
  if($info['edit_return'] == '1')
    {
    $edit_return = '1';
    }
  else
    {
    $edit_return = '0';
    }
  if($info['delete_return'] == '1')
    {
    $delete_return = '1';
    }
  else
    {
    $delete_return = '0';
    }
  if($info['new_quotation'] == '1')
    {
    $new_quotation = '1';
    }
  else
    {
    $new_quotation = '0';
    }
  if($info['view_quotation'] == '1')
    {
    $view_quotation = '1';
    }
  else
    {
    $view_quotation = '0';
    }
  if($info['edit_quotation'] == '1')
    {
    $edit_quotation = '1';
    }
  else
    {
    $edit_quotation = '0';
    }
  if($info['delete_quotation'] == '1')
    {
    $delete_quotation = '1';
    }
  else
    {
    $delete_quotation = '0';
    }
  if($info['new_voucher'] == '1')
    {
    $new_voucher = '1';
    }
  else
    {
    $new_voucher = '0';
    }
  if($info['view_voucher'] == '1')
    {
    $view_voucher = '1';
    }
  else
    {
    $view_voucher = '0';
    }
  if($info['edit_voucher'] == '1')
    {
    $edit_voucher = '1';
    }
  else
    {
    $edit_voucher = '0';
    }
  if($info['delete_voucher'] == '1')
    {
    $delete_voucher = '1';
    }
  else
    {
    $delete_voucher = '0';
    }
  if($info['customer'] == '1')
    {
    $customer = '1';
    }
  else
    {
    $customer = '0';
    }
  if($info['supplier'] == '1')
    {
    $supplier = '1';
    }
  else
    {
    $supplier = '0';
    }
  if($info['employee'] == '1')
    {
    $employee = '1';
    }
  else
    {
    $employee = '0';
    }
  if($info['user'] == '1')
    {
    $user = '1';
    }
  else
    {
    $user = '0';
    }
  if($info['sales_report'] == '1')
    {
    $sales_report = '1';
    }
  else
    {
    $sales_report = '0';
    }
  if($info['purchase_report'] == '1')
    {
    $purchase_report = '1';
    }
  else
    {
    $purchase_report = '0';
    }
  if($info['profit_loss_report'] == '1')
    {
    $profit_loss_report = '1';
    }
  else
    {
    $profit_loss_report = '0';
    }
  if($info['sales_purchase_report'] == '1')
    {
    $sales_purchase_report = '1';
    }
  else
    {
    $sales_purchase_report = '0';
    }
  if($info['customer_report'] == '1')
    {
    $customer_report = '1';
    }
  else
    {
    $customer_report = '0';
    }
  if($info['customer_ledger'] == '1')
    {
    $customer_ledger = '1';
    }
  else
    {
    $customer_ledger = '0';
    }
  if($info['supplier_report'] == '1')
    {
    $supplier_report = '1';
    }
  else
    {
    $supplier_report = '0';
    }
  if($info['supplier_ledger'] == '1')
    {
    $supplier_ledger = '1';
    }
  else
    {
    $supplier_ledger = '0';
    }
  if($info['stock_report'] == '1')
    {
    $stock_report = '1';
    }
  else
    {
    $stock_report = '0';
    }
  if($info['voucher_report'] == '1')
    {
    $voucher_report = '1';
    }
  else
    {
    $voucher_report = '0';
    }
  if($info['daily_report'] == '1')
    {
    $daily_report = '1';
    }
  else
    {
    $daily_report = '0';
    }
  if($info['cash_book'] == '1')
    {
    $cash_book = '1';
    }
  else
    {
    $cash_book = '0';
    }
  if($info['bank_book'] == '1')
    {
    $bank_book = '1';
    }
  else
    {
    $bank_book = '0';
    }
  if($info['mobile_book'] == '1')
    {
    $mobile_book = '1';
    }
  else
    {
    $mobile_book = '0';
    }
  if($info['category'] == '1')
    {
    $category = '1';
    }
  else
    {
    $category = '0';
    }
  if($info['unit'] == '1')
    {
    $unit = '1';
    }
  else
    {
    $unit = '0';
    }
  if($info['expense_type'] == '1')
    {
    $expense_type = '1';
    }
  else
    {
    $expense_type = '0';
    }
  if($info['department'] == '1')
    {
    $department = '1';
    }
  else
    {
    $department = '0';
    }
  if($info['bank_account'] == '1')
    {
    $bank_account = '1';
    }
  else
    {
    $bank_account = '0';
    }
  if($info['mobile_account'] == '1')
    {
    $mobile_account = '1';
    }
  else
    {
    $mobile_account = '0';
    }
  if($info['notice'] == '1')
    {
    $notice = '1';
    }
  else
    {
    $notice = '0';
    }
  if($info['user_type'] == '1')
    {
    $user_type = '1';
    }
  else
    {
    $user_type = '0';
    }
  if($info['newPayment'] == '1')
    {
    $newPayment = '1';
    }
  else
    {
    $newPayment = '0';
    }

  $data2 = [
    'add_product'           => $add_product,
    'view_product'          => $view_product,
    'edit_product'          => $edit_product,
    'delete_product'        => $delete_product,
    'store_product'         => $store_product,
    'import_product'        => $import_product,
    'new_purchase'          => $new_purchase,
    'edit_purchase'         => $edit_purchase,
    'view_purchase'         => $view_purchase,
    'delete_purchase'       => $delete_purchase,
    'new_sale'              => $new_sale,
    'view_sale'             => $view_sale,
    'edit_sale'             => $edit_sale,
    'delete_sale'           => $delete_sale,
    'new_return'            => $new_return,
    'view_return'           => $view_return,
    'edit_return'           => $edit_return,
    'delete_return'         => $delete_return,
    'new_quotation'         => $new_quotation,
    'view_quotation'        => $view_quotation,
    'edit_quotation'        => $edit_quotation,
    'delete_quotation'      => $delete_quotation,
    'new_voucher'           => $new_voucher,
    'view_voucher'          => $view_voucher,
    'edit_voucher'          => $edit_voucher,
    'delete_voucher'        => $delete_voucher,
    'customer'              => $customer,
    'supplier'              => $supplier,
    'employee'              => $employee,
    'user'                  => $user,
    'sales_report'          => $sales_report,
    'purchase_report'       => $purchase_report,
    'profit_loss_report'    => $profit_loss_report,
    'sales_purchase_report' => $sales_purchase_report,
    'customer_report'       => $customer_report,
    'customer_ledger'       => $customer_ledger,
    'supplier_report'       => $supplier_report,
    'supplier_ledger'       => $supplier_ledger,
    'stock_report'          => $stock_report,
    'voucher_report'        => $voucher_report,
    'daily_report'          => $daily_report,
    'cash_book'             => $cash_book,
    'bank_book'             => $bank_book,
    'mobile_book'           => $mobile_book,
    'category'              => $category,
    'unit'                  => $unit,
    'expense_type'          => $expense_type,
    'department'            => $department,
    'bank_account'          => $bank_account,
    'mobile_account'        => $mobile_account,
    'notice'                => $notice,
    'user_type'             => $user_type,
    'newPayment'            => $newPayment,
    'upby'                  => $_SESSION['uid']
      ];

  $result3 = $this->pm->update_data('tbl_user_f_permission',$data2,$where);

  if($result && $result && $result3)
    {
    $sdata=[
      'exception' =>'<div class="alert alert-success alert-dismissible">
      <h4><i class="icon fa fa-check"></i> User Page and Function Access add Successfully !</h4>
      </div>'
          ];    
    }
  else
    {
    $sdata=[
      'exception' =>'<div class="alert alert-danger alert-dismissible">
      <h4><i class="icon fa fa-ban"></i> Failed !</h4>
      </div>'
          ];
    }

  $this->session->set_userdata($sdata);
  redirect('accesSetup');
}

public function user_access_setup()
  {
  $data = [
    'title' => 'Access Setup'
      ];

  $where = array('compid'=> $_SESSION['compid']);
  $data['user'] = $this->pm->get_data('access_lavels',$where);
  
  $this->load->view('user_role/user_access_setup',$data);
}

public function view_uaccess_setup($id)
  {
  $data = [
    'title' => 'Access Setup'
      ];

  $where = array('utype'=> $id);
  $data['master'] = $this->pm->get_data('tbl_user_m_permission',$where);
  $data['page'] = $this->pm->get_data('tbl_user_p_permission',$where);
  $data['function'] = $this->pm->get_data('tbl_user_f_permission',$where);

  $uwhere = array('compid'=> $_SESSION['compid']);
  $awhere = array('ax_id'=> $id);
  $data['user'] = $this->pm->get_data('access_lavels',$awhere);
  $data['umaster'] = $this->pm->get_data('tbl_user_m_permission',$uwhere);
  $data['upage'] = $this->pm->get_data('tbl_user_p_permission',$uwhere);
  $data['ufunction'] = $this->pm->get_data('tbl_user_f_permission',$uwhere);
  
  $this->load->view('user_role/view_uaccess_setup',$data);
}

public function edit_uaccess_setup($id)
  {
  $data = [
    'title' => 'Access Setup'
      ];

  $where = array('utype'=> $id);
  $data['master'] = $this->pm->get_data('tbl_user_m_permission',$where);
  $data['page'] = $this->pm->get_data('tbl_user_p_permission',$where);
  $data['function'] = $this->pm->get_data('tbl_user_f_permission',$where);

  $uwhere = array('compid'=> $_SESSION['compid']);
  $awhere = array('ax_id'=> $id);
  $data['user'] = $this->pm->get_data('access_lavels',$awhere);
  $data['umaster'] = $this->pm->get_data('tbl_user_m_permission',$uwhere);
  $data['upage'] = $this->pm->get_data('tbl_user_p_permission',$uwhere);
  $data['ufunction'] = $this->pm->get_data('tbl_user_f_permission',$uwhere);
  
  $this->load->view('user_role/edit_uaccess_setup',$data);
}

public function setup_user_access($id)
  {
  $info = $this->input->post();

  $where = array(
    'utype' => $id
        );

  if($info['dashboard'] == '1')
    {
    $dashboard = '1';
    }
  else
    {
    $dashboard = '0';
    }
  if($info['product'] == '1')
    {
    $product = '1';
    }
  else
    {
    $product = '0';
    }
  if($info['purchase'] == '1')
    {
    $purchase = '1';
    }
  else
    {
    $purchase = '0';
    }
  if($info['sales'] == '1')
    {
    $sales = '1';
    }
  else
    {
    $sales = '0';
    }
  if($info['return'] == '1')
    {
    $return = '1';
    }
  else
    {
    $return = '0';
    }
  if($info['quotation'] == '1')
    {
    $quotation = '1';
    }
  else
    {
    $quotation = '0';
    }
  if($info['voucher'] == '1')
    {
    $voucher = '1';
    }
  else
    {
    $voucher = '0';
    }
  if($info['users'] == '1')
    {
    $users = '1';
    }
  else
    {
    $users = '0';
    }
  if($info['report'] == '1')
    {
    $report = '1';
    }
  else
    {
    $report = '0';
    }
  if($info['setting'] == '1')
    {
    $setting = '1';
    }
  else
    {
    $setting = '0';
    }
  if($info['access_setup'] == '1')
    {
    $access_setup = $info['access_setup'];
    }
  else
    {
    $access_setup = '0';
    }
  if($info['help_support'] == '1')
    {
    $help_support = '1';
    }
  else
    {
    $help_support = '0';
    }
  if($info['Employee_payment'] == '1')
    {
    $Employee_payment = '1';
    }
  else
    {
    $Employee_payment = '0';
    }

  $data = [
    'dashboard'    => $dashboard,
    'product'      => $product,
    'purchase'     => $purchase,
    'sales'        => $sales,
    'return'       => $return,
    'quotation'    => $quotation,
    'voucher'      => $voucher,
    'users'        => $users,
    'report'       => $report,
    'setting'      => $setting,
    'access_setup' => $access_setup,
    'help_support' => $help_support,
    'Employee_payment' => $Employee_payment,
    'upby'         => $_SESSION['uid']
      ];
  //var_dump($where); var_dump($data); exit();
  $result = $this->pm->update_data('tbl_user_m_permission',$data,$where);
  
  $result2 = $this->pm->update_data('tbl_user_p_permission',$data,$where);

  if($info['add_product'] == '1')
    {
    $add_product = '1';
    }
  else
    {
    $add_product = '0';
    }
  if($info['view_product'] == '1')
    {
    $view_product = '1';
    }
  else
    {
    $view_product = '0';
    }
  if($info['edit_product'] == '1')
    {
    $edit_product = '1';
    }
  else
    {
    $edit_product = '0';
    }
  if($info['delete_product'] == '1')
    {
    $delete_product = '1';
    }
  else
    {
    $delete_product = '0';
    }
  if($info['store_product'] == '1')
    {
    $store_product = '1';
    }
  else
    {
    $store_product = '0';
    }
  if($info['import_product'] == '1')
    {
    $import_product = '1';
    }
  else
    {
    $import_product = '0';
    }
  if($info['new_purchase'] == '1')
    {
    $new_purchase = '1';
    }
  else
    {
    $new_purchase = '0';
    }
  if($info['edit_purchase'] == '1')
    {
    $edit_purchase = '1';
    }
  else
    {
    $edit_purchase = '0';
    }
  if($info['view_purchase'] == '1')
    {
    $view_purchase = '1';
    }
  else
    {
    $view_purchase = '0';
    }
  if($info['delete_purchase'] == '1')
    {
    $delete_purchase = '1';
    }
  else
    {
    $delete_purchase = '0';
    }
  if($info['new_sale'] == '1')
    {
    $new_sale = '1';
    }
  else
    {
    $new_sale = '0';
    }
  if($info['view_sale'] == '1')
    {
    $view_sale = '1';
    }
  else
    {
    $view_sale = '0';
    }
  if($info['edit_sale'] == '1')
    {
    $edit_sale = '1';
    }
  else
    {
    $edit_sale = '0';
    }
  if($info['delete_sale'] == '1')
    {
    $delete_sale = '1';
    }
  else
    {
    $delete_sale = '0';
    }
  if($info['new_return'] == '1')
    {
    $new_return = '1';
    }
  else
    {
    $new_return = '0';
    }
  if($info['view_return'] == '1')
    {
    $view_return = '1';
    }
  else
    {
    $view_return = '0';
    }
  if($info['edit_return'] == '1')
    {
    $edit_return = '1';
    }
  else
    {
    $edit_return = '0';
    }
  if($info['delete_return'] == '1')
    {
    $delete_return = '1';
    }
  else
    {
    $delete_return = '0';
    }
  if($info['new_quotation'] == '1')
    {
    $new_quotation = '1';
    }
  else
    {
    $new_quotation = '0';
    }
  if($info['view_quotation'] == '1')
    {
    $view_quotation = '1';
    }
  else
    {
    $view_quotation = '0';
    }
  if($info['edit_quotation'] == '1')
    {
    $edit_quotation = '1';
    }
  else
    {
    $edit_quotation = '0';
    }
  if($info['delete_quotation'] == '1')
    {
    $delete_quotation = '1';
    }
  else
    {
    $delete_quotation = '0';
    }
  if($info['new_voucher'] == '1')
    {
    $new_voucher = '1';
    }
  else
    {
    $new_voucher = '0';
    }
  if($info['view_voucher'] == '1')
    {
    $view_voucher = '1';
    }
  else
    {
    $view_voucher = '0';
    }
  if($info['edit_voucher'] == '1')
    {
    $edit_voucher = '1';
    }
  else
    {
    $edit_voucher = '0';
    }
  if($info['delete_voucher'] == '1')
    {
    $delete_voucher = '1';
    }
  else
    {
    $delete_voucher = '0';
    }
  if($info['customer'] == '1')
    {
    $customer = '1';
    }
  else
    {
    $customer = '0';
    }
  if($info['supplier'] == '1')
    {
    $supplier = '1';
    }
  else
    {
    $supplier = '0';
    }
  if($info['employee'] == '1')
    {
    $employee = '1';
    }
  else
    {
    $employee = '0';
    }
  if($info['user'] == '1')
    {
    $user = '1';
    }
  else
    {
    $user = '0';
    }
  if($info['sales_report'] == '1')
    {
    $sales_report = '1';
    }
  else
    {
    $sales_report = '0';
    }
  if($info['purchase_report'] == '1')
    {
    $purchase_report = '1';
    }
  else
    {
    $purchase_report = '0';
    }
  if($info['profit_loss_report'] == '1')
    {
    $profit_loss_report = '1';
    }
  else
    {
    $profit_loss_report = '0';
    }
  if($info['sales_purchase_report'] == '1')
    {
    $sales_purchase_report = '1';
    }
  else
    {
    $sales_purchase_report = '0';
    }
  if($info['customer_report'] == '1')
    {
    $customer_report = '1';
    }
  else
    {
    $customer_report = '0';
    }
  if($info['customer_ledger'] == '1')
    {
    $customer_ledger = '1';
    }
  else
    {
    $customer_ledger = '0';
    }
  if($info['supplier_report'] == '1')
    {
    $supplier_report = '1';
    }
  else
    {
    $supplier_report = '0';
    }
  if($info['supplier_ledger'] == '1')
    {
    $supplier_ledger = '1';
    }
  else
    {
    $supplier_ledger = '0';
    }
  if($info['stock_report'] == '1')
    {
    $stock_report = '1';
    }
  else
    {
    $stock_report = '0';
    }
  if($info['voucher_report'] == '1')
    {
    $voucher_report = '1';
    }
  else
    {
    $voucher_report = '0';
    }
  if($info['daily_report'] == '1')
    {
    $daily_report = '1';
    }
  else
    {
    $daily_report = '0';
    }
  if($info['cash_book'] == '1')
    {
    $cash_book = '1';
    }
  else
    {
    $cash_book = '0';
    }
  if($info['bank_book'] == '1')
    {
    $bank_book = '1';
    }
  else
    {
    $bank_book = '0';
    }
  if($info['mobile_book'] == '1')
    {
    $mobile_book = '1';
    }
  else
    {
    $mobile_book = '0';
    }
  if($info['category'] == '1')
    {
    $category = '1';
    }
  else
    {
    $category = '0';
    }
  if($info['unit'] == '1')
    {
    $unit = '1';
    }
  else
    {
    $unit = '0';
    }
  if($info['expense_type'] == '1')
    {
    $expense_type = '1';
    }
  else
    {
    $expense_type = '0';
    }
  if($info['department'] == '1')
    {
    $department = '1';
    }
  else
    {
    $department = '0';
    }
  if($info['bank_account'] == '1')
    {
    $bank_account = '1';
    }
  else
    {
    $bank_account = '0';
    }
  if($info['mobile_account'] == '1')
    {
    $mobile_account = '1';
    }
  else
    {
    $mobile_account = '0';
    }
  if($info['notice'] == '1')
    {
    $notice = '1';
    }
  else
    {
    $notice = '0';
    }
  if($info['user_type'] == '1')
    {
    $user_type = '1';
    }
  else
    {
    $user_type = '0';
    }
  if($info['newPayment'] == '1')
    {
    $newPayment = '1';
    }
  else
    {
    $newPayment = '0';
    }

  $data2 = [
    'add_product'           => $add_product,
    'view_product'          => $view_product,
    'edit_product'          => $edit_product,
    'delete_product'        => $delete_product,
    'store_product'         => $store_product,
    'import_product'        => $import_product,
    'new_purchase'          => $new_purchase,
    'edit_purchase'         => $edit_purchase,
    'view_purchase'         => $view_purchase,
    'delete_purchase'       => $delete_purchase,
    'new_sale'              => $new_sale,
    'view_sale'             => $view_sale,
    'edit_sale'             => $edit_sale,
    'delete_sale'           => $delete_sale,
    'new_return'            => $new_return,
    'view_return'           => $view_return,
    'edit_return'           => $edit_return,
    'delete_return'         => $delete_return,
    'new_quotation'         => $new_quotation,
    'view_quotation'        => $view_quotation,
    'edit_quotation'        => $edit_quotation,
    'delete_quotation'      => $delete_quotation,
    'new_voucher'           => $new_voucher,
    'view_voucher'          => $view_voucher,
    'edit_voucher'          => $edit_voucher,
    'delete_voucher'        => $delete_voucher,
    'customer'              => $customer,
    'supplier'              => $supplier,
    'employee'              => $employee,
    'user'                  => $user,
    'sales_report'          => $sales_report,
    'purchase_report'       => $purchase_report,
    'profit_loss_report'    => $profit_loss_report,
    'sales_purchase_report' => $sales_purchase_report,
    'customer_report'       => $customer_report,
    'customer_ledger'       => $customer_ledger,
    'supplier_report'       => $supplier_report,
    'supplier_ledger'       => $supplier_ledger,
    'stock_report'          => $stock_report,
    'voucher_report'        => $voucher_report,
    'daily_report'          => $daily_report,
    'cash_book'             => $cash_book,
    'bank_book'             => $bank_book,
    'mobile_book'           => $mobile_book,
    'category'              => $category,
    'unit'                  => $unit,
    'expense_type'          => $expense_type,
    'department'            => $department,
    'bank_account'          => $bank_account,
    'mobile_account'        => $mobile_account,
    'notice'                => $notice,
    'user_type'             => $user_type,
    'newPayment'            => $newPayment,
    'upby'                  => $_SESSION['uid']
      ];
  //var_dump($data2); exit();
  $result3 = $this->pm->update_data('tbl_user_f_permission',$data2,$where);

  if($result && $result && $result3)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
      <h4><i class="icon fa fa-check"></i> User Page and Function Access add Successfully !</h4>
      </div>'
          ];    
    }
  else
    {
    $sdata=[
      'exception' =>'<div class="alert alert-danger alert-dismissible">
      <h4><i class="icon fa fa-ban"></i> Failed !</h4>
      </div>'
          ];
    }

  $this->session->set_userdata($sdata);
  redirect('userAccess');
}




	#########################################################
	#				/* Pages End */							#
	#########################################################


############################################################################
}   	/* Code Ends Here */
############################################################################