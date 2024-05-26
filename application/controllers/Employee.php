<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller {

public function __construct()
    {
    parent::__construct();       
    $this->load->model("prime_model","pm");
    $this->checkPermission();
}


public function emp_department()
    {
    $data['title'] = 'Department';

    $where = array(
        'compid' => $_SESSION['compid']
            );

    $data['dept'] = $this->pm->get_data('department',$where);

    $this->load->view('employees/department',$data);
}

public function save_department()
    {       
    $info = $this->input->post();
           
    $data = array(
        'compid'    => $_SESSION['compid'],
        'dept_name' => $info['department'],
        'regby'     => $_SESSION['uid']
            );
    
    $result = $this->pm->insert_data('department',$data);

    $log = [
      'activity' => 'Department is added ('.$info['department'].')',
      'user_id'       => $_SESSION['uid'],
      'compid'       => $_SESSION['compid'],
                ];
    $this->pm->insert_data('activity_logs',$log);

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Staff department add Successfully !</h4>
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
    redirect('Department');
}

public function get_dept_data()
    {
    $section = $this->pm->get_dept_data($_POST['id']);
    $someJSON = json_encode($section);
    echo $someJSON;
}

public function update_dept()
    {       
    $info = $this->input->post();
           
    $data = array(
        'compid'    => $_SESSION['compid'],
        'dept_name' => $info['department'],
        'status'    => $info['status'],
        'upby'      => $_SESSION['uid']
            );

    $where = array(
        'dpt_id' => $info['dept_id']
            );

    $result = $this->pm->update_data('department',$data,$where);

    $log = [
      'activity' => 'Department is updated ('.$info['department'].')',
      'user_id'       => $_SESSION['uid'],
      'compid'       => $_SESSION['compid'],
                ];
    $this->pm->insert_data('activity_logs',$log);

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Staff Department update Successfully !</h4>
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
    redirect('Department');
}

public function delete_dept($dpt_id)
    {
    $where = array(
        'dpt_id' => $dpt_id
            );

    $empd = $this->pm->get_data('employees',$where);

    $prname = $this->db->select('dept_name')
                     ->from('department')
                     ->where('dpt_id', $dpt_id)
                     ->get()
                     ->row();

    if (!$empd)
        {
        $result = $this->pm->delete_data('department',$where);
        $log = [
          'activity' => 'Department is deleted ('.$prname->dept_name.')',
          'user_id'       => $_SESSION['uid'],
          'compid'       => $_SESSION['compid'],

                    ];
        $this->pm->insert_data('activity_logs',$log);

        if($result)
            {
            $sdata = [
              'exception' =>'<div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i>Staff department delete Successfully !</h4>
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
    else
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> All ready add this department in employees !</h4>
            </div>'
                ];
        }
    $this->session->set_userdata($sdata);
    redirect('Department');
}

public function employee_info()
    {
    $data['title'] = 'Staff / Employee';

    $where = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );

    $data['employee'] = $this->pm->get_data('employees',$where);
    $data['dept'] = $this->pm->get_data('department',$where);
    
    $this->load->view('employees/employees',$data);
}

public function save_employee()
    {       
    $info = $this->input->post();
    $config['upload_path'] = './upload/employee/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG';
    $config['max_size'] = 0;
    $config['max_width'] = 0;
    $config['max_height'] = 0;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
    if ($this->upload->do_upload('userfile'))
        {
        $img = $this->upload->data('file_name');
        }
    else
        {
        $img = '';
        }
    // var_dump($img);exit();
    
    $custMob = $this->db->select('phone')->from('employees')->where('phone',$info['phone'])->get()->row();

  if($custMob)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> This Mobile Number is already added !</h4>
        </div>'
            ];
    }
  else
    {

    $query = $this->db->select('emp_id')
                  ->from('employees')
                  ->where('compid',$_SESSION['compid'])
                  ->limit(1)
                  ->order_by('employeeID','DESC')
                  ->get()
                  ->row();
    if($query)
        {
        $sn = substr($query->emp_id,5)+1;
        }
    else
        {
        $sn = 1;
        }

    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d",$sn);

    $cusid = 'E-'.$cn.$pc;

    $employee = array(
        'compid'      => $_SESSION['compid'],
        'emp_id'      => $cusid,
        'employeeName'=> $info['employeeName'],
        'dpt_id'      => $info['dpt_id'],
        'empaddress'  => $info['empaddress'],
        'phone'       => $info['phone'],
        'email'       => $info['email'],
        'joiningDate' => date('Y-m-d', strtotime($info['joiningDate'])),
        'salary'      => $info['salary'],
        'nid'         => $info['nid'],
        'image'       => $img,
        'regby'       => $_SESSION['uid']
                );

    $result = $this->pm->insert_data('employees',$employee);
    
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Staff / Employee added Successfully !</h4>
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
    redirect('Employee');
}

public function get_emp_data()
    {
    $section = $this->pm->get_emp_data($_POST['id']);
    $someJSON = json_encode($section);
    echo $someJSON;
}

public function update_Employee()
    {       
    $info = $this->input->post();
    $pid = $info['emp_id'];
    $config['upload_path'] = './upload/employee/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG';
    $config['max_size'] = 0;
    $config['max_width'] = 0;
    $config['max_height'] = 0;

    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    
    if ($this->upload->do_upload('userfile'))
        {
        $img = $this->upload->data('file_name');
        }
    else
        {
        $pimg = $this->db->select('image')->from('employees')->where('employeeID ',$pid)->get()->row();
        if($pimg)
            {
            $img = $pimg->image;
            }
        else
            {
            $img = '';
            }
        }  

    $employee = array(
        'compid'       => $_SESSION['compid'],
        'employeeName' => $info['employeeName'],
        'dpt_id'       => $info['dpt_id'],
        'empaddress'   => $info['empaddress'],
        'phone'        => $info['phone'],
        'email'        => $info['email'],
        'joiningDate'  => date('Y-m-d', strtotime($info['joiningDate'])),
        'salary'       => $info['salary'],
        'nid'          => $info['nid'],
        'image'        => $img,
        'status'       => $info['status'],
        'upby'         => $_SESSION['uid']
                );
    //var_dump($employee); exit();
    $where = array(
        'employeeID' => $info['emp_id']
            );

    $result = $this->pm->update_data('employees',$employee,$where);
    
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Staff update Successfully !</h4>
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
    redirect('Employee');
}

public function delete_Employee($id)
    {
    $where = array(
        'employeeID' => $id
            );

    $result = $this->pm->delete_data('employees',$where);

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Staff / Employee delete Successfully !</h4>
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
    redirect('Employee');
}

///////////////////////////target
public function employee_target()
  {
  $data['title'] = 'Employee Target';

  $where = array(
    'employees.compid' => $_SESSION['compid']
        );
  
  $other = array(
    'order_by' => 'etid',
    'join' => 'left'
        );
  $field = array(
    'emp_targer' => 'emp_targer.*',
    'employees' => 'employees.emp_id,employees.employeeName,employees.trCode'
        );
  $join = array(
    'employees' => 'employees.employeeID = emp_targer.empid'
        );

  $data['target'] = $this->pm->get_data('emp_targer',$where,$field,$join,$other);

  $data['employee'] = $this->pm->get_data('employees',$where);

  $this->load->view('employees/employee_target',$data);
}

public function save_emp_target()
  {       
  $info = $this->input->post();

  $employee = array(
    'compid'  => $_SESSION['compid'],
    'month'   => $info['month'],
    'year'    => $info['year'],
    'empid'   => $info['employee'],
    'tAmount' => $info['tAmount'],
    'notes'   => $info['notes'],
    'regby'   => $_SESSION['uid']
            );

  $result = $this->pm->insert_data('emp_targer',$employee);
    
  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Employee Target added Successfully !</h4>
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
  redirect('empTarget');
}

public function get_emp_target_data()
  {
  $section = $this->pm->get_emp_target_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function update_emp_target()
  {       
  $info = $this->input->post();

  $employee = array(
    'compid'  => $_SESSION['compid'],
    'month'   => $info['month'],
    'year'    => $info['year'],
    'empid'   => $info['employee'],
    'tAmount' => $info['tAmount'],
    'notes'   => $info['notes'],
    'upby'    => $_SESSION['uid']
            );
  $where = array(
    'etid' => $info['etid']
        );
        
  $result = $this->pm->update_data('emp_targer',$employee,$where);
    
  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Employee Target updated Successfully !</h4>
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
  redirect('empTarget');
}

public function delete_emp_target($id)
  {
  $where = array(
    'etid' => $id
        );
        
  $result = $this->pm->delete_data('emp_targer',$where);
    
  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Employee Target deleted Successfully !</h4>
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
  redirect('empTarget');
}

public function employee_target_sale_reports()
  {
  $data['title'] = 'Employee Target';
  
  $other = array(
    'order_by' => 'etid',
    'join' => 'left'
        );
  $field = array(
    'emp_targer' => 'emp_targer.*',
    'employees' => 'employees.emp_id,employees.employeeName,employees.trCode',
    'users' => 'users.uid',
        );
  $join = array(
    'employees' => 'employees.employeeID = emp_targer.empid',
    'users' => 'users.empid = employees.employeeID'
        );

  $data['company'] = $this->pm->company_details();

  if(isset($_GET['search']))
    {
    $report = $_GET['reports'];
    
    if ($report == 'monthlyReports')
      {
      $month = $_GET['month'];
      $data['month'] = $month;
      $year = $_GET['year'];
      $data['year'] = $year;
            //var_dump($data['month']); exit();
      if($month == 1)
        {
        $name = 'January';
        }
      else if($month == 2)
        {
        $name = 'February';
        }
      else if($month == 3)
        {
        $name = 'March';
        }
      else if($month == 4)
        {
        $name = 'April';
        }
      else if($month == 5)
        {
        $name = 'May';
        }
      else if($month == 6)
        {
        $name = 'June';
        }
      else if($month == 7)
        {
        $name = 'July';
        }
      else if($month == 8)
        {
        $name = 'August';
        }
      else if($month == 9)
        {
        $name = 'September';
        }
      else if($month == 10)
        {
        $name = 'October';
        }
      else if($month == 11)
        {
        $name = 'November';
        }
      else
        {
        $name = 'December';
        }

      $data['name'] = $name;
      $data['report'] = $report;
      
      $where = array(
        'emp_targer.month' => $month,
        'emp_targer.year' => $year
                );
                
      $data['target'] = $this->pm->get_data('emp_targer',$where,$field,$join,$other);
      }
    else if($report == 'yearlyReports')
      {
      $year = $_GET['ryear'];
      $data['year'] = $year;
      $data['report'] = $report;
      
      $where = array(
        'emp_targer.year' => $year
                );
        
      $data['target'] = $this->pm->get_data('emp_targer',$where,$field,$join,$other);
      }
    }
  else
    {
    $data['target'] = $this->pm->get_data('emp_targer',false,$field,$join,$other);
    }

  $this->load->view('employees/sale_target_reports',$data);
}

public function employee_ledger_report()
    {
    $data = ['title' => 'Employees Ledger'];
    $where = array('compid' => $_SESSION['compid']);

    $data['employee'] = $this->pm->get_data('employees',$where);
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

            $data['cust'] = $this->pm->get_data('customers',$cwhere);
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

            $data['cust'] = $this->pm->get_data('customers',$cwhere);
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

            $data['cust'] = $this->pm->get_data('customers',$cwhere);
            $data['sale'] = $this->pm->sales_ycust_ledger_data($customer,$year);
            $data['voucher'] = $this->pm->voucher_ycust_ledger_data($customer,$year);
            $data['return'] = $this->pm->return_ycust_ledger_data($customer,$year);
            }
        else if ($report == 'ocust')
            {
            $data['report'] = $report;
            $customer = $_GET['customer'];

            $cwhere = array('customerID' => $customer);

            $data['cust'] = $this->pm->get_data('customers',$cwhere);
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







}