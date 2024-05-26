<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_payment extends CI_Controller{

public function __construct()
    {
    parent::__construct();       
    $this->load->model("prime_model","pm");
    $this->checkPermission();
}

// public function index()
//     {
//     $data['title'] = 'Employee Payments';

//     $where = array(
//         'employee_payment.compid' => $_SESSION['compid']
//             );
//     $field = array(
//         'employee_payment' => 'employee_payment.*',
//         'employees' => 'employees.employeeName'
//             );
//     $join = array(
//         'employees' => 'employee_payment.empid = employees.employeeID'
//             );
//     $other = array(
//         'order_by' => 'empPid',
//         'join' => 'left'
//             );
    
//     $data['employees'] = $this->pm->get_data('employee_payment',$where,$field,$join,$other);

//     $this->load->view('employeePayment/infos',$data);
// }

public function index()
{
    $data['title'] = 'Employee Payments';

    $where = array(
        'employee_payment.compid' => $_SESSION['compid']
    );

    // Count total records
    $total_records = $this->pm->get_data('employee_payment', $where);

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    $total_pages = ceil(count($total_records) / $limit);

    // Fetch employee payment data with pagination
    $field = array(
        'employee_payment' => 'employee_payment.*',
        'employees' => 'employees.employeeName'
    );

    $join = array(
        'employees' => 'employee_payment.empid = employees.employeeID'
    );

    $other = array(
        'order_by' => 'empPid',
        'join' => 'left'
    );

    $data['employees'] = $this->pm->get_data('employee_payment', $where, $field, $join, $other, $limit, $offset);

    // Pagination HTML generation
    $pagination_html = '<ul class="pagination">';
    if ($page > 1) {
        $pagination_html .= '<li class="paginated"><a href="?page=' . ($page - 1) . '">Previous</a></li>';
    }
    for ($i = 1; $i <= $total_pages; $i++) {
        $pagination_html .= '<li class="paginated';
        if ($page == $i) {
            $pagination_html .= ' active'; // Adding "active" class here
        }
        $pagination_html .= '"><a href="?page=' . $i . '">' . $i . '</a></li>';
    }
    if ($page < $total_pages) {
        $pagination_html .= '<li class="paginated"><a href="?page=' . ($page + 1) . '">Next</a></li>';
    }
    $pagination_html .= '</ul>';

    $data['pagination_html'] = $pagination_html;

    $this->load->view('employeePayment/infos', $data);
}

public function AddInfo()
    {
    $data['title'] = 'Employee Payment';
    $where = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );
    $data['employee'] = $this->pm->get_data('employees',$where);

    $this->load->view('employeePayment/new_payment',$data);
}

public function get_emp_salary()
    {
    $section = $this->pm->get_salary_emp($_POST['id'],$_POST['id2'],$_POST['id3']);
    $someJSON = json_encode($section);
    echo $someJSON;
}

public function Saveinfo()
    {        
    $info = $this->input->post();

    $emps = array(
        'empid'       => $info['empid'],
        'compid'      => $_SESSION['compid'],
        'month'       => $info['month'],
        'year'        => $info['year'],
        'salary'      => $info['salary'],
        'paid'      => $info['pAmount'],
        'accountType' => $info['accountType'],
        'accountNo'   => $info['accountNo'],
        'note'        => $info['note'],
        'regby'       => $_SESSION['uid']
                );
        //var_dump($emps); exit();
    $result = $this->pm->insert_data('employee_payment',$emps);

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Employee Payments add Successfully !</h4>
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
    redirect('empPayment');
}

public function emp_payment_details($id)
    {
    $data['title'] = 'Employee Payment';

    $data['company'] = $this->pm->company_details();

    $where = array(
        'empPid' => $id
            );
              
    $field = array(
        'employee_payment' => 'employee_payment.*',
        'employees' => 'employees.employeeName,employees.empaddress,employees.phone,employees.email,employees.emp_id',
        'department' => 'department.dept_name',
        'com_profile' => 'com_profile.com_pid,com_profile.com_name'
            );
    $join = array(
        'employees' => 'employees.employeeID = employee_payment.empid',
        'department' => 'department.dpt_id = employees.dpt_id',
        'com_profile' => 'com_profile.compid = employee_payment.compid'
            );
    $other = array(
        'join' => 'left'
            );
    $collection = $this->pm->get_data('employee_payment',$where,$field,$join,$other);
    $data['empp'] = $collection[0];

    $this->load->view('employeePayment/emppDetails',$data);
}

public function edit_Employee_Payment($id){
    $data['title'] = 'Employee Payment';
    $where = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );
    $ewhere = array(
        'compid' => $_SESSION['compid'],
        'empPid' => $id
            );
    $data['employee'] = $this->pm->get_data('employees',$where);
    $payment= $this->pm->get_data('employee_payment',$ewhere);
    $data['payment']=$payment[0];
    

    $this->load->view('employeePayment/edit_payment',$data);
}

public function update_Employee_Payment()
    {        
    $info = $this->input->post();
    $where = array(
        'empPid' => $info['empPid']
        );

    $emps = array(
        'empid'       => $info['empid'],
        'month'       => $info['month'],
        'year'        => $info['year'],
        'salary'      => $info['salary'],
        'paid'        => $info['pAmount'],
        'accountType' => $info['accountType'],
        'accountNo'   => $info['accountNo'],
        'note'        => $info['note'],
        'upby'       => $_SESSION['uid']
                );
        //var_dump($emps); exit();
    $result = $this->pm->update_data('employee_payment',$emps,$where);

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Employee Payments updated Successfully !</h4>
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
    redirect('empPayment');
}

public function delete_salary($id)
    {
    $where = array(
        'empPid' => $id
            );
        $result = $this->pm->delete_data('employee_payment',$where);

        if($result)
            {
            $sdata = [
              'exception' =>'<div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-check"></i> Salary deleted Successfully !</h4>
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
    redirect('empPayment');
}

public function employeePayReport()
  {
  $data = ['title' => 'Payment Reports'];
  $bwhere = array('compid'=> $_SESSION['compid']);

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
      $demployee = $_GET['demployee'];

      $where = array(
        'employee_payment.compid' => $_SESSION['compid'],
        'DATE(employee_payment.regdate) >=' => $sdate,
        'DATE(employee_payment.regdate) <=' => $edate,
        'employee_payment.empid' => $_GET['demployee']
            );
    $allwhere = array(
        'DATE(employee_payment.regdate) >=' => $sdate,
        'DATE(employee_payment.regdate) <=' => $edate,
        'employee_payment.compid' => $_SESSION['compid']
          );
    $ewhere = array(
      'employees.compid' => $_SESSION['compid']
          );
    $field = array(
        'employee_payment' => 'employee_payment.*',
        'employees' => 'employees.employeeName'
            );
    $join = array(
        'employees' => 'employee_payment.empid = employees.employeeID'
            );
    $other = array(
        'order_by' => 'empPid',
        'join' => 'left'
            );
    $data['employee'] = $this->pm->get_data('employees',$ewhere);
    if($demployee != 'All'){
      $data['employees'] = $this->pm->get_data('employee_payment',$where,$field,$join,$other);
    }else{
      $data['employees'] = $this->pm->get_data('employee_payment',$allwhere,$field,$join,$other);
    }
      }
  else if ($report == 'monthlyReports')
      {
      $month = $_GET['month'];
      $data['month'] = $month;
      $year = $_GET['year'];
      $data['year'] = $year;
      $yemployee = $_GET['memployee'];

      $data['report'] = $report;
      $data['title'] = 'Payment Reports';

      $where = array(
          'employee_payment.compid' => $_SESSION['compid'],
          'employee_payment.year' => $year,
          'employee_payment.month' => $month,
          'employee_payment.empid' => $_GET['memployee']
              );
      $allwhere = array(
            'employee_payment.year' => $year,
            'employee_payment.month' => $month,
            'employee_payment.compid' => $_SESSION['compid']
            );
      $ewhere = array(
        'employees.compid' => $_SESSION['compid']
            );
      $field = array(
          'employee_payment' => 'employee_payment.*',
          'employees' => 'employees.employeeName'
              );
      $join = array(
          'employees' => 'employee_payment.empid = employees.employeeID'
              );
      $other = array(
          'order_by' => 'empPid',
          'join' => 'left'
              );
      $data['employee'] = $this->pm->get_data('employees',$ewhere);
      if($yemployee != 'All'){
        $data['employees'] = $this->pm->get_data('employee_payment',$where,$field,$join,$other);
      }else{
        $data['employees'] = $this->pm->get_data('employee_payment',$allwhere,$field,$join,$other);
      }
      }
  else if ($report == 'yearlyReports')
      {
      $year = $_GET['ryear'];
      $data['year'] = $year;
      $data['report'] = $report;
      $yemployee = $_GET['yemployee'];
      // var_dump($yemployee);
      // die();

      $data['title'] = 'Payment Reports';

      $where = array(
          'employee_payment.compid' => $_SESSION['compid'],
          'employee_payment.year' => $_GET['ryear'],
          'employee_payment.empid' => $_GET['yemployee']
              );
      $allwhere = array(
        'employee_payment.year' => $_GET['ryear'],
        'employee_payment.compid' => $_SESSION['compid']
            );
      $ewhere = array(
        'employees.compid' => $_SESSION['compid']
            );
      $field = array(
          'employee_payment' => 'employee_payment.*',
          'employees' => 'employees.employeeName'
              );
      $join = array(
          'employees' => 'employee_payment.empid = employees.employeeID'
              );
      $other = array(
          'order_by' => 'empPid',
          'join' => 'left'
              );
      $data['employee'] = $this->pm->get_data('employees',$ewhere);
      if($yemployee != 'All'){
        $data['employees'] = $this->pm->get_data('employee_payment',$where,$field,$join,$other);
      }else{
        $data['employees'] = $this->pm->get_data('employee_payment',$allwhere,$field,$join,$other);
      }

      }
  }
  else
    {
        $data['title'] = 'Payment Reports';

        $where = array(
            'employee_payment.compid' => $_SESSION['compid']
                );
        $ewhere = array(
          'employees.compid' => $_SESSION['compid']
              );
        $field = array(
            'employee_payment' => 'employee_payment.*',
            'employees' => 'employees.employeeName'
                );
        $join = array(
            'employees' => 'employee_payment.empid = employees.employeeID'
                );
        $other = array(
            'order_by' => 'empPid',
            'join' => 'left'
                );

        $data['employee'] = $this->pm->get_data('employees',$ewhere);
        $data['employees'] = $this->pm->get_data('employee_payment',$where,$field,$join,$other);
    }

  $this->load->view('employeePayment/employeePaymentReport',$data);
}




}