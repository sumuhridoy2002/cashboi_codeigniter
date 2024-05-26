<?php
if(!defined('BASEPATH'))
  exit('No direct script access allowed');

class Customer extends CI_Controller {

public function __construct()
  {
  parent::__construct();
  $this->load->model("prime_model","pm");
  $this->checkPermission();
  $this->load->library('PHPExcel');
  $this->load->library('excel');
}

public function index()
  {
  $data['title'] = 'Customer';

  $where = array(
    'customers.compid' => $_SESSION['compid']  
         );
         
  $other = array(
    'order_by' => 'customerID',
    'join'     => 'left' 
         );
  $field = array(
    'customers'   => 'customers.*',
    'divisions' => 'divisions.name as dbName',
    'districts' => 'districts.name as dsName',
    'upazilas' => 'upazilas.name as upName',
         );
  $join = array(
    'divisions' => 'divisions.id = customers.divid',
    'districts' => 'districts.id = customers.disid',
    'upazilas' => 'upazilas.id = customers.upzid',
         );
  
  if($_SESSION['role'] > 2)
    {
    $swhere = array(
        'customers.trCode' => $_SESSION['trCode'],
        'customers.compid' => $_SESSION['compid']  
        
            );
    $data['customer'] = $this->pm->get_data('customers',$swhere,$field,$join,$other);
    }
  else
    {
    $data['customer'] = $this->pm->get_data('customers',$where,$field,$join,$other);
    }

  $data['division'] = $this->pm->get_data('divisions',false);
  $data['territory'] = $this->pm->get_data('territory',false);

  $this->load->view('customers/customer',$data);
}

public function get_district_data()
  {
  $section = $this->pm->get_district_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function get_upazila_data()
  {
  $section = $this->pm->get_upazila_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function save_customer()
  {
  $info = $this->input->post();

  $custMob = $this->db->select('mobile')->from('customers')->where('mobile',$info['mobile'])->get()->row();

  if($custMob)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> This Customer Allready added !</h4>
        </div>'
            ];
    }
  else
    {
    $query = $this->db->select('customerID')
                  ->from('customers')
                  //->where('compid',$_SESSION['compid'])
                  ->limit(1)
                  ->order_by('customerID','DESC')
                  ->get()
                  ->row();
    if($query)
      {
      $sn = $query->customerID+1;
      }
    else
      {
      $sn = 1;
      }
    //var_dump($sn); exit();
    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d",$sn);

    $cusid = 'C-'.$cn.$pc;

    $data = array(
      'compid'       => $_SESSION['compid'],
      'cus_id'       => $cusid,
      'customerName' => $info['customerName'],
      'custCompany'  => $info['custCompany'],
      'mobile'       => $info['mobile'],
      'custMobile'   => $info['custMobile'],
      'email'        => $info['email'],
      'address'      => $info['address'],
    //   'divid'        => $info['division'],
    //   'disid'        => $info['district'],
    //   'upzid'        => $info['upazila'],
      'custNotes'    => $info['custNotes'],
      'custLimit'    => $info['custLimit'],
      'balance'      => $info['balance'],
      'trCode'       => $info['trCode'],
    //   'custTerms'    => $info['custTerms'],
      'custType'     => $info['custType'],
      'regby'        => $_SESSION['uid']
            );

    $result = $this->pm->insert_data('customers',$data);
    $log = [
      'activity' => 'Customer is added ('.$cusid.')',
      'user_id'       => $_SESSION['uid'],
      'compid'       => $_SESSION['compid'],
                ];
    $this->pm->insert_data('activity_logs',$log);

    if($result)
      {
      $sdata = [
        'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Customer add Successfully !</h4>
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
    }
  $this->session->set_userdata($sdata);
  redirect('Customer');
}

public function get_customer_data()
  {
  $section = $this->pm->get_customer_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function update_customer()
  {
  $info = $this->input->post();

  $data = array(
    'compid'       => $_SESSION['compid'],
    'customerName' => $info['customerName'],
    'custCompany'  => $info['custCompany'],
    'mobile'       => $info['mobile'],
    'custMobile'   => $info['custMobile'],
    'email'        => $info['email'],
    'address'      => $info['address'],
    // 'divid'        => $info['division'],
    // 'disid'        => $info['district'],
    // 'upzid'        => $info['upazila'],
    'custNotes'    => $info['custNotes'],
    'balance'      => $info['balance'],
    'custLimit'    => $info['custLimit'],
    'trCode'       => $info['trCode'],
    // 'custTerms'    => $info['custTerms'],
    'custType'     => $info['custType'],
    'status'       => $info['status'],              
    'upby'         => $_SESSION['uid']
            );

  $where = array(
    'customerID' => $info['cus_id']
        );

  $result = $this->pm->update_data('customers',$data,$where);

  $prname = $this->db->select('roll')
                     ->from('customers')
                     ->where('customerID', $info['cus_id'])
                     ->get()
                     ->row();

  $log = [
    'activity' => 'Customer is updated ('.$prname->roll.')',
    'user_id'       => $_SESSION['uid'],
    'compid'       => $_SESSION['compid'],
              ];
  $this->pm->insert_data('activity_logs',$log);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Customer update Successfully !</h4>
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
  redirect('Customer');
}

public function delete_customer($id)
    {
    $where = array(
        'customerID' => $id
            );
    $sales = $this->pm->get_data('sales',$where);

    $prname = $this->db->select('roll')
                     ->from('customers')
                     ->where('customerID', $id)
                     ->get()
                     ->row();

    if ($sales)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> All ready sales on this customer !</h4>
            </div>'
                ];
        }
    else
        {
        $result = $this->pm->delete_data('customers',$where);

        $log = [
          'activity' => 'Customer is deleted ('.$prname->roll.')',
          'user_id'       => $_SESSION['uid'],
          'compid'       => $_SESSION['compid'],
                    ];
        $this->pm->insert_data('activity_logs',$log);
        if($result)
            {
            $sdata = [
              'exception' =>'<div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-check"></i> Customer delete Successfully !</h4>
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
        }
    $this->session->set_userdata($sdata);
    redirect('Customer');
}

public function add_customer()
    {
    $query = $this->db->select('cus_id')
                  ->from('customers')
                  ->where('compid',$_SESSION['compid'])
                  ->limit(1)
                  ->order_by('customerID','DESC')
                  ->get()
                  ->row();
    if ($query)
        {
        $sn = substr($query->cus_id,5)+1;
        }
    else
        {
        $sn = 1;
        }

    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d",$sn);

    $cusid = 'C-'.$cn.$pc;

    $data = array(
        'compid'       => $_SESSION['compid'],
        'cus_id'       => $cusid,
        'customerName' => $_POST['customerName'],
        'mobile'       => $_POST['mobile'],
        'email'        => $_POST['email'],
        'address'      => $_POST['address'],
        'balance'      => $_POST['balance'],         
        'regby'        => $_SESSION['uid']
            );

    $result = $this->pm->insert_data('customers',$data);

    $log = [
      'activity' => 'Customer is added ('.$cusid.')',
      'user_id'       => $_SESSION['uid'],
      'compid'       => $_SESSION['compid'],
                ];
    $this->pm->insert_data('activity_logs',$log);

    if($result)
        {
        $where = array(
            'compid' => $_SESSION['compid']
                );
        $customers = $this->pm->get_data('customers',$where);
        $append = '<div id="customer_hide"><label>Customer *</label>
                    <select class="form-control chosen" name="customerID" onchange="myFunction()" id="customerID" required>
                    <option value="">Select One</option>
                    ';
        foreach($customers as $value)
            {
            $append .= '<option value=" '.$value['customerID'] .' ">'.$value['customerName'].'('.$value['cus_id'].')</option>';
            }
        $append .= '</select></div>';
        echo $append;
        }
    else{
        echo "Customer Added Failed!";
        }
}

public function view_customer($id)
  {
  $data['title'] = 'Customer'; 

  $where = array(
    'customers.customerID' => $id  
          );
  $where2 = array(
    'customers.customerID' => $id  ,
    'vutype' =>1
          );
    $other = array(
    'join'   => 'left' 
         );
    $field = array(
        'customers'  => 'customers.*',
        
        'divisions' => 'divisions.name as dbName',
        'districts' => 'districts.name as dsName',
        'upazilas' => 'upazilas.name as upName',
             );
      $join = array(
        'divisions' => 'divisions.id = customers.divid',
        'districts' => 'districts.id = customers.disid',
        'upazilas' => 'upazilas.id = customers.upzid',
             );
    
    $field2 = array(
        // 'customers'  => 'customers.*',
        'vaucher'  => 'vaucher.invoice,vaucher.vuid,vaucher.voucherdate',
        'vaucher_particular' => 'vaucher_particular.vutype,vaucher_particular.particulars,vaucher_particular.amount'
              );
    
    $field3 = array(
        'customers'  => 'customers.*',
        'quotation'  => 'quotation.qinvoice,quotation.quotationDate,quotation.qutid'
              );
    $field1 =array(
        'customers'  => 'customers.*',
       'sales'  => 'sales.invoice_no,sales.saleID,sales.saleDate,sales.dueamount,sales.totalAmount,sales.paidAmount',
        );

    $join1 = array(
        'sales' => 'sales.customerID = customers.customerID'
        
             );
    $join2 = array(
        'vaucher_particular' => 'vaucher_particular.vutid = customers.customerID',
        'vaucher' => 'vaucher.vuid = vaucher_particular.vuid'
        
             );
             
    $join3 = array(
        'quotation' => 'quotation.customerID = customers.customerID'
        
             );
             

  $customer = $this->pm->get_data('customers',$where,$field,$join,$other);
  $data['customer'] = $customer[0];
  
  $data['cust'] = $this->pm->get_data('customers',$where,$field1,$join1,$other);
  $data['cust2'] = $this->pm->get_data('customers',$where2,$field2,$join2,$other);
  $data['cust3'] = $this->pm->get_data('customers',$where,$field3,$join3,$other);

  $this->load->view('customers/customerView',$data);
}

public function all_customer_reports()
  {
  $data = ['title' => 'Customers Report'];
  $where = array(
    'customers.compid' => $_SESSION['compid']  
         );
  $other = array(
    'join'   => 'left' 
         );
  $field = array(
    'customers'   => 'customers.*',
    'divisions' => 'divisions.name as dbName',
    'districts' => 'districts.name as dsName',
    'upazilas' => 'upazilas.name as upName',
         );
  $join = array(
    'divisions' => 'divisions.id = customers.divid',
    'districts' => 'districts.id = customers.disid',
    'upazilas' => 'upazilas.id = customers.upzid',
         );
  $data['customer'] = $this->pm->get_data('customers',$where,$field,$join,$other);
    $data['company'] = $this->pm->company_details();

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
            }
        else if ($report == 'monthlyReports')
            {
            $month = $_GET['month'];
            $data['month'] = $month;
            $year = $_GET['year'];
            $data['year'] = $year;
            //var_dump($data['month']); exit();
            if($month == 01)
                {
                $name = 'January';
                }
            elseif ($month == 02)
                {
                $name = 'February';
                }
            elseif ($month == 03)
                {
                $name = 'March';
                }
            elseif ($month == 04)
                {
                $name = 'April';
                }
            elseif ($month == 05)
                {
                $name = 'May';
                }
            elseif ($month == 06)
                {
                $name = 'June';
                }
            elseif ($month == 07)
                {
                $name = 'July';
                }
            elseif ($month == 8)
                {
                $name = 'August';
                }
            elseif ($month == 9)
                {
                $name = 'September';
                }
            elseif ($month == 10)
                {
                $name = 'October';
                }
            elseif ($month == 11)
                {
                $name = 'November';
                }
            else
                {
                $name = 'December';
                }

            $data['name'] = $name;
            $data['report'] = $report;
            }
        else if ($report == 'yearlyReports')
            {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;
            }
        }
    else
        {
        
        }

    $this->load->view('customers/customerReport',$data);
}

public function customer_ledger_report()
  {
  $data = ['title' => 'Customers Ledger'];
  $where = array('compid' => $_SESSION['compid']);
  $other = array(
    'join'   => 'left' 
         );
  $field = array(
    'customers'   => 'customers.*',
    'divisions' => 'divisions.name as dbName',
    'districts' => 'districts.name as dsName',
    'upazilas' => 'upazilas.name as upName',
         );
  $join = array(
    'divisions' => 'divisions.id = customers.divid',
    'districts' => 'districts.id = customers.disid',
    'upazilas' => 'upazilas.id = customers.upzid',
         );
    $data['customer'] = $this->pm->get_data('customers',$where);
    $data['company'] = $this->pm->company_details();

    if(isset($_GET['search']))
        {
        $report = $_GET['reports'];
        
        if($report == 'dailyReports')
            {
            $sdate = date("Y-m-d", strtotime($_GET['sdate']));
            $edate = date("Y-m-d", strtotime($_GET['edate']));
            $customer = $_GET['dcustomer'];
            $data['sdate'] = $sdate;
            $data['edate'] = $edate;
            $data['report'] = $report;

            $cwhere = array('customerID' => $customer);

            $data['cust'] = $this->pm->get_data('customers',$cwhere,$field,$join,$other);
            $data['sale'] = $this->pm->sales_dcust_ledger_data($customer,$sdate,$edate);
            $data['voucher'] = $this->pm->voucher_dcust_ledger_data($customer,$sdate,$edate);
            $data['return'] = $this->pm->return_dcust_ledger_data($customer,$sdate,$edate);
            }
        else if ($report == 'monthlyReports')
            {
            $month = $_GET['month'];
            $data['month'] = $month;
            $year = $_GET['year'];
            $data['year'] = $year;
            $customer = $_GET['mcustomer'];
            //var_dump($data['month']); exit();
            if($month == 01)
                {
                $name = 'January';
                }
            elseif ($month == 02)
                {
                $name = 'February';
                }
            elseif ($month == 03)
                {
                $name = 'March';
                }
            elseif ($month == 04)
                {
                $name = 'April';
                }
            elseif ($month == 05)
                {
                $name = 'May';
                }
            elseif ($month == 06)
                {
                $name = 'June';
                }
            elseif ($month == 07)
                {
                $name = 'July';
                }
            elseif ($month == 8)
                {
                $name = 'August';
                }
            elseif ($month == 9)
                {
                $name = 'September';
                }
            elseif ($month == 10)
                {
                $name = 'October';
                }
            elseif ($month == 11)
                {
                $name = 'November';
                }
            else
                {
                $name = 'December';
                }

            $data['name'] = $name;
            $data['report'] = $report;

            $cwhere = array('customerID' => $customer);

            $data['cust'] = $this->pm->get_data('customers',$cwhere,$field,$join,$other);
            $data['sale'] = $this->pm->sales_mcust_ledger_data($customer,$month,$year);
            $data['voucher'] = $this->pm->voucher_mcust_ledger_data($customer,$month,$year);
            $data['return'] = $this->pm->return_mcust_ledger_data($customer,$month,$year);
            }
        else if ($report == 'yearlyReports')
            {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;
            $customer = $_GET['ycustomer'];

            $cwhere = array('customerID' => $customer);

            $data['cust'] = $this->pm->get_data('customers',$cwhere,$field,$join,$other);
            $data['sale'] = $this->pm->sales_ycust_ledger_data($customer,$year);
            $data['voucher'] = $this->pm->voucher_ycust_ledger_data($customer,$year);
            $data['return'] = $this->pm->return_ycust_ledger_data($customer,$year);
            }
        else if ($report == 'ocust')
            {
            $data['report'] = $report;
            $customer = $_GET['customer'];

            $cwhere = array('customerID' => $customer);

            $data['cust'] = $this->pm->get_data('customers',$cwhere,$field,$join,$other);
            $data['sale'] = $this->pm->sales_cust_ledger_data($customer);
            $data['voucher'] = $this->pm->voucher_cust_ledger_data($customer);
            $data['return'] = $this->pm->return_cust_ledger_data($customer);
            }
        }
    else
        {
        
        }
    
    $this->load->view('customers/customerLedger',$data);
}

public function export_action()
    {
    $this->load->library("excel");
    $object = new PHPExcel();

    $object->setActiveSheetIndex(0);

    $table_columns = array("Customer Name","Mobile","Email","Address","Balance");

    $column = 0;

    foreach($table_columns as $field)
        {
        $object->getActiveSheet()->setCellValueByColumnAndRow($column,1,$field);
        $column++;
        }

    $customer_data = $this->pm->customer_fetch_data($_SESSION['compid']);

    $excel_row = 2;

    foreach($customer_data as $row)
        {
        $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row->customerName);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row->mobile);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row->email);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row->address);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$row->balance);
        $excel_row++;
        }

    $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel2007');
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Customers Data.xls"');
    if (ob_get_length() > 0) { ob_end_clean(); }
    $object_writer->save('php://output');
}

public function excel_import()
    {
    if(isset($_FILES["file"]["name"]))
        {
        $path = $_FILES["file"]["tmp_name"];
        $object = PHPExcel_IOFactory::load($path);
        foreach($object->getWorksheetIterator() as $worksheet)
            {
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for($row=2; $row<=$highestRow; $row++)
                {
                $customerName = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
                $mobile = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
                $address = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
                $email = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
                $bal = $worksheet->getCellByColumnAndRow(4,$row)->getValue();
                
                
                $query = $this->db->select('customerID')
                              ->from('customers')
                              ->where('compid',$_SESSION['compid'])
                              ->limit(1)
                              ->order_by('customerID','DESC')
                              ->get()
                              ->row();
                if($query)
                    {
                    $sn = $query->customerID+1;
                    }
                else
                    {
                    $sn = 1;
                    }

                $cn = strtoupper(substr($_SESSION['compname'],0,3));
                $pc = sprintf("%'05d",$sn);

                $cusid = 'C-'.$cn.$pc;

                $data = array(
                    'compid'       => $_SESSION['compid'],
                    'cus_id'       => $cusid,
                    'customerName' => $customerName,
                    'mobile'       => $mobile,
                    'email'        => $email,
                    'address'      => $address,
                    'balance'      => $bal,
                    'regby'        => $_SESSION['uid']
                        );
        $result=$this->db->insert('customers',$data);
                }
            }
            if($result)
            {
            $sdata = [
              'exception' =>'<div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i> Customer import Successfully !</h4>
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
        // $progress = 50; // Example progress value (in percentage)
        // echo json_encode(['progress' => $progress]);
        // echo 'Customer Data Imported successfully';
        }   
}

public function customer_territory_reports()
  {
  $data = ['title' => 'Territory Report'];
  $where = array(
    'compid' => $_SESSION['compid']  
         );
  $data['territory'] = $this->pm->get_data('territory',$where);
  $data['company'] = $this->pm->company_details();

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
            }
        else if ($report == 'monthlyReports')
            {
            $month = $_GET['month'];
            $data['month'] = $month;
            $year = $_GET['year'];
            $data['year'] = $year;
            //var_dump($data['month']); exit();
            if($month == 01)
                {
                $name = 'January';
                }
            elseif ($month == 02)
                {
                $name = 'February';
                }
            elseif ($month == 03)
                {
                $name = 'March';
                }
            elseif ($month == 04)
                {
                $name = 'April';
                }
            elseif ($month == 05)
                {
                $name = 'May';
                }
            elseif ($month == 06)
                {
                $name = 'June';
                }
            elseif ($month == 07)
                {
                $name = 'July';
                }
            elseif ($month == 8)
                {
                $name = 'August';
                }
            elseif ($month == 9)
                {
                $name = 'September';
                }
            elseif ($month == 10)
                {
                $name = 'October';
                }
            elseif ($month == 11)
                {
                $name = 'November';
                }
            else
                {
                $name = 'December';
                }

            $data['name'] = $name;
            $data['report'] = $report;
            }
        else if ($report == 'yearlyReports')
            {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;
            }
        }
    else
        {
        
        }

    $this->load->view('customers/territory_report',$data);
}

public function territory_ledger_report()
  {
  $data = ['title' => 'Territory Report'];
  
  $data['territory'] = $this->pm->get_data('territory',false);
  $data['company'] = $this->pm->company_details();

  if(isset($_GET['search']))
    {
    $report = $_GET['reports'];
    
    if($report == 'dailyReports')
      {
      $sdate = date("Y-m-d", strtotime($_GET['sdate']));
      $edate = date("Y-m-d", strtotime($_GET['edate']));
      $trcode = $_GET['dcustomer'];
      $data['sdate'] = $sdate;
      $data['edate'] = $edate;
      $data['report'] = $report;

      $data['sale'] = $this->pm->sales_dcust_trcode_data($trcode,$sdate,$edate);
      $data['voucher'] = $this->pm->voucher_dcust_trcode_data($trcode,$sdate,$edate);
      $data['return'] = $this->pm->return_dcust_trcode_data($trcode,$sdate,$edate);
      }
    else if ($report == 'monthlyReports')
      {
      $month = $_GET['month'];
      $data['month'] = $month;
      $year = $_GET['year'];
      $data['year'] = $year;
      $trcode = $_GET['mcustomer'];
            //var_dump($data['month']); exit();
      if($month == 01)
        {
        $name = 'January';
        }
      elseif ($month == 02)
        {
        $name = 'February';
        }
      elseif ($month == 03)
        {
        $name = 'March';
        }
      elseif ($month == 04)
        {
        $name = 'April';
        }
      elseif ($month == 05)
        {
        $name = 'May';
        }
      elseif ($month == 06)
        {
        $name = 'June';
        }
      elseif ($month == 07)
        {
        $name = 'July';
        }
      elseif ($month == 8)
        {
        $name = 'August';
        }
      elseif ($month == 9)
        {
        $name = 'September';
        }
      elseif ($month == 10)
        {
        $name = 'October';
        }
      elseif ($month == 11)
        {
        $name = 'November';
        }
      else
        {
        $name = 'December';
        }

      $data['name'] = $name;
      $data['report'] = $report;

      $data['sale'] = $this->pm->sales_mcust_trcode_data($trcode,$month,$year);
      $data['voucher'] = $this->pm->voucher_mcust_trcode_data($trcode,$month,$year);
      $data['return'] = $this->pm->return_mcust_trcode_data($trcode,$month,$year);
      }
    else if ($report == 'yearlyReports')
      {
      $year = $_GET['ryear'];
      $data['year'] = $year;
      $data['report'] = $report;
      $trcode = $_GET['ycustomer'];

      $data['sale'] = $this->pm->sales_ycust_trcode_data($trcode,$year);
      $data['voucher'] = $this->pm->voucher_ycust_trcode_data($trcode,$year);
      $data['return'] = $this->pm->return_ycust_trcode_data($trcode,$year);
      }
    else if ($report == 'ocust')
      {
      $data['report'] = $report;
      $trcode = $_GET['customer'];
    
      $data['sale'] = $this->pm->sales_cust_trcode_data($trcode);
      $data['voucher'] = $this->pm->voucher_cust_trcode_data($trcode);
      $data['return'] = $this->pm->return_cust_trcode_data($trcode);
      }
    }
  else
    {
    
    }

  $this->load->view('customers/territory_ledger',$data);
}

// Area-Territory Part
public function area_reports()
  {
  $data = ['title' => 'Area Report'];
  $where = array(
    'compid' => $_SESSION['compid']  
         );
  
  $data['area'] = $this->pm->get_data('territory',$where);
  $data['company'] = $this->pm->company_details();

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
            }
        else if ($report == 'monthlyReports')
            {
            $month = $_GET['month'];
            $data['month'] = $month;
            $year = $_GET['year'];
            $data['year'] = $year;
            //var_dump($data['month']); exit();
            if($month == 01)
                {
                $name = 'January';
                }
            elseif ($month == 02)
                {
                $name = 'February';
                }
            elseif ($month == 03)
                {
                $name = 'March';
                }
            elseif ($month == 04)
                {
                $name = 'April';
                }
            elseif ($month == 05)
                {
                $name = 'May';
                }
            elseif ($month == 06)
                {
                $name = 'June';
                }
            elseif ($month == 07)
                {
                $name = 'July';
                }
            elseif ($month == 8)
                {
                $name = 'August';
                }
            elseif ($month == 9)
                {
                $name = 'September';
                }
            elseif ($month == 10)
                {
                $name = 'October';
                }
            elseif ($month == 11)
                {
                $name = 'November';
                }
            else
                {
                $name = 'December';
                }

            $data['name'] = $name;
            $data['report'] = $report;
            }
        else if ($report == 'yearlyReports')
            {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;
            }
        }
    else
        {
        
        }

    $this->load->view('customers/area_report',$data);
}

public function area_ledger_report()
  {
  $data = ['title' => 'Area Report'];
   $where = array(
    'compid' => $_SESSION['compid']  
         );
  $data['area'] = $this->pm->get_data('territory',$where);
  $data['company'] = $this->pm->company_details();

  if(isset($_GET['search']))
    {
    $report = $_GET['reports'];
    
    if($report == 'dailyReports')
      {
      $sdate = date("Y-m-d", strtotime($_GET['sdate']));
      $edate = date("Y-m-d", strtotime($_GET['edate']));
      $trcode = $_GET['dcustomer'];
      $data['sdate'] = $sdate;
      $data['edate'] = $edate;
      $data['report'] = $report;

      $data['sale'] = $this->pm->sales_dcust_trcode_data($trcode,$sdate,$edate);
      $data['voucher'] = $this->pm->voucher_dcust_trcode_data($trcode,$sdate,$edate);
      $data['return'] = $this->pm->return_dcust_trcode_data($trcode,$sdate,$edate);
      }
    else if ($report == 'monthlyReports')
      {
      $month = $_GET['month'];
      $data['month'] = $month;
      $year = $_GET['year'];
      $data['year'] = $year;
      $trcode = $_GET['mcustomer'];
            //var_dump($data['month']); exit();
      if($month == 01)
        {
        $name = 'January';
        }
      elseif ($month == 02)
        {
        $name = 'February';
        }
      elseif ($month == 03)
        {
        $name = 'March';
        }
      elseif ($month == 04)
        {
        $name = 'April';
        }
      elseif ($month == 05)
        {
        $name = 'May';
        }
      elseif ($month == 06)
        {
        $name = 'June';
        }
      elseif ($month == 07)
        {
        $name = 'July';
        }
      elseif ($month == 8)
        {
        $name = 'August';
        }
      elseif ($month == 9)
        {
        $name = 'September';
        }
      elseif ($month == 10)
        {
        $name = 'October';
        }
      elseif ($month == 11)
        {
        $name = 'November';
        }
      else
        {
        $name = 'December';
        }

      $data['name'] = $name;
      $data['report'] = $report;

      $data['sale'] = $this->pm->sales_mcust_trcode_data($trcode,$month,$year);
      $data['voucher'] = $this->pm->voucher_mcust_trcode_data($trcode,$month,$year);
      $data['return'] = $this->pm->return_mcust_trcode_data($trcode,$month,$year);
      }
    else if ($report == 'yearlyReports')
      {
      $year = $_GET['ryear'];
      $data['year'] = $year;
      $data['report'] = $report;
      $trcode = $_GET['ycustomer'];

      $data['sale'] = $this->pm->sales_ycust_trcode_data($trcode,$year);
      $data['voucher'] = $this->pm->voucher_ycust_trcode_data($trcode,$year);
      $data['return'] = $this->pm->return_ycust_trcode_data($trcode,$year);
      }
    else if ($report == 'ocust')
      {
      $data['report'] = $report;
      $trcode = $_GET['customer'];
    
      $data['sale'] = $this->pm->sales_cust_trcode_data($trcode);
      $data['voucher'] = $this->pm->voucher_cust_trcode_data($trcode);
      $data['return'] = $this->pm->return_cust_trcode_data($trcode);
      }
    }
  else
    {
    
    }

  $this->load->view('customers/area_ledger',$data);
}





}