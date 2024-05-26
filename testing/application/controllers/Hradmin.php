<?php
if(!defined('BASEPATH'))
  exit('No direct script access allowed');

class Hradmin extends CI_Controller {

public function __construct()
  {
  parent::__construct();
  $this->load->model("prime_model","pm");
  $this->checkPermission();
}


// public function working_day_setup()
//   {
//   $data['title'] = 'Working Days';

//   $data['leaveType'] = $this->pm->get_data('working_day',false);
//     //var_dump($data['users']); exit();
//   $this->load->view('hradmin/working_day',$data);
// }

// public function save_working_day()
//   {
//   $info = $this->input->post();

//   $data = array(
//     'year'    => $info['year'],
//     'month'   => $info['month'],
//     'workday' => $info['workday'],
//     'note'    => $info['notes'],
//     'regby'   => $_SESSION['uid']
//         );
    
//   $result = $this->pm->insert_data('working_day',$data);

//   if($result)
//     {
//     $sdata = [
//       'exception' =>'<div class="alert alert-success alert-dismissible">
//       <h4><i class="icon fa fa-check"></i> Working Day Setup Successfully !</h4>
//       </div>'
//             ];  
//     }
//   else
//     {
//     $sdata = [
//       'exception' =>'<div class="alert alert-danger alert-dismissible">
//       <h4><i class="icon fa fa-ban"></i> Failed !</h4>
//       </div>'
//             ];
//     }
//   $this->session->set_userdata($sdata);
//   redirect('workDays');
// }

// public function get_working_day_data()
//   {
//   $grup = $this->pm->get_working_day_data($_POST['id']);
//   $someJSON = json_encode($grup);
//   echo $someJSON;
// }

// public function update_working_day()
//   {
//   $info = $this->input->post();

//   $data = array(
//     'year'    => $info['year'],
//     'month'   => $info['month'],
//     'workday' => $info['workday'],
//     'note'    => $info['notes'],
//     'upby'    => $_SESSION['uid']
//         );

//   $where = array(
//     'wd_id' => $info['ltid']
//         );
    
//   $result = $this->pm->update_data('working_day',$data,$where);

//   if($result)
//     {
//     $sdata = [
//       'exception' =>'<div class="alert alert-success alert-dismissible">
//       <h4><i class="icon fa fa-check"></i> Working Day Setup update Successfully !</h4>
//       </div>'
//             ];  
//     }
//   else
//     {
//     $sdata = [
//       'exception' =>'<div class="alert alert-danger alert-dismissible">
//       <h4><i class="icon fa fa-ban"></i> Failed !</h4>
//       </div>'
//             ];
//     }
//   $this->session->set_userdata($sdata);
//   redirect('workDays');
// }

// public function delete_working_day($id)
//   {
//   $where = array(
//     'wd_id' => $id
//         );
    
//   $result = $this->pm->delete_data('working_day',$where);

//   if($result)
//     {
//     $sdata = [
//       'exception' =>'<div class="alert alert-danger alert-dismissible">
//       <h4><i class="icon fa fa-check"></i> Working Day Setup delete Successfully !</h4>
//       </div>'
//             ];  
//     }
//   else
//     {
//     $sdata = [
//       'exception' =>'<div class="alert alert-danger alert-dismissible">
//       <h4><i class="icon fa fa-ban"></i> Failed !</h4>
//       </div>'
//             ];
//     }
//   $this->session->set_userdata($sdata);
//   redirect('workDays');
// }

public function employee_attendance()
  {
  $data['title'] = 'Attendance';

  $data['attendance'] = $this->pm->get_emp_attendance_data();
   $where = array(
        'compid' => $_SESSION['compid']
            );

//   $owhere = array(
//     'status' => 1
//         );

    // $offtime = $this->pm->get_data('office_time',$owhere);
    // $data['offtime'] = $offtime[0];

  $data['employee'] = $this->pm->get_data('employees', $where);
    //var_dump($data['attendance']); exit();
  $this->load->view('hradmin/attendance',$data);
}

public function new_employee_attendance()
  {
  $data['title'] = 'Attendance';
  $where = array(
    'status' => 'Active',
     'compid' => $_SESSION['compid']
        );
  $data['employee'] = $this->pm->get_data('employees',$where);
    //var_dump($data['attendance']); exit();
  $this->load->view('hradmin/new_attendance',$data);
}

public function saved_employee_attendance()
  {
  $info = $this->input->post();

  $length = count($info['employee']);

  for($i = 0; $i < $length; $i++)
    {
    $spdata = array(
      'accid'    => $info['employee'][$i],
      'device_id'=> 1,
      'compid'   => $_SESSION['compid'],
      'ename'    => $info['empName'][$i],
      'adate'    => date('Y-m-d', strtotime($info['date'])),
      'year'     => date('Y', strtotime($info['date'])),
      'month'    => date('m', strtotime($info['date'])),
      'ain'      => $info['inTime'][$i],                       
      'aout'     => $info['outTime'][$i],
      'early'    => '0',
      'oAddress' => $info['empOffice'][$i],
      'regby'    => $_SESSION['uid']
              );

    $result = $this->pm->insert_data('emp_dev_attendance',$spdata);
    }

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
      <h4><i class="icon fa fa-check"></i> Employee Attendance added Successfully !</h4>
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
  redirect('empAttend');
}

public function save_emp_attendance()
  {
  $info = $this->input->post();

  $emp = $this->db->select('employeeName')->from('employees')->where('employeeID',$info['employee'])->get()->row();

  $empin = strtotime($info['atime_in']);

//   $offt = $this->db->select('off_start,off_end')->from('office_time')->where('status',1)->get()->row();

//   $otime = strtotime($offt->off_start);

//   if($empin >= $otime)
//     {
//     $late = round(($empin-$otime)/60);
//     }
//   else
//     {
//     $late = 0;
//     }

  $data = array(
    'accid'     => $info['employee'],
    'device_id' => 1,
    'compid'    => $_SESSION['compid'],
    'ename'     => $emp->employeeName,
    'adate'     => date('Y-m-d'),
    'year'      => date('Y'),
    'month'     => date('m'),
    'ain'       => $info['atime_in'],
    // 'late'      => $late,
    'aout'      => '00:00:00',
    'early'     => '0',
    // 'off_start' => $offt->off_start,
    // 'off_end'   => $offt->off_end,
    'oAddress'  => $info['oAddress'],
    'regby'     => $_SESSION['uid']
        );
    
  $result = $this->pm->insert_data('emp_dev_attendance',$data);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
      <h4><i class="icon fa fa-check"></i> Employee Attendance added Successfully !</h4>
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
  redirect('empAttend');
}

public function update_emp_attendance($id)
  {
  $info = $this->input->post();

  $empin = strtotime($info['atime_out']);

//   $offt = $this->db->select('off_start,off_end')->from('office_time')->where('status',1)->get()->row();

//   $otime = strtotime($offt->off_end);

//   if($empin >= $otime)
//     {
//     $late = round(($empin-$otime)/60);
//     }
//   else if($empin <= $otime)
//     {
//     $late = round(($otime-$empin)/60);
//     }
//   else
//     {
//     $late = 0;
//     }

  $data = array(
    'aout'  => $info['atime_out'],
    // 'early' => $late,
    'upby'  => $_SESSION['uid']
        );
    //var_dump($data); exit();
  $where = array(
    'autoid' => $id,
      'compid' => $_SESSION['compid']
        );
    
  $result = $this->pm->update_data('emp_dev_attendance',$data,$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
      <h4><i class="icon fa fa-check"></i> Employee Attendance updated Successfully !</h4>
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
  redirect('empAttend');
}



public function emp_attendance_report()
  {
  $data['title'] = 'Attendance Report';
  $where = array(
      'compid' => $_SESSION['compid']
        );
  $data['employee'] = $this->pm->get_data('employees',$where);
  
  if(isset($_GET['search']))
    {
    $report = $_GET['reports'];
        
    if($report == 'dailyReports')
      {
      $sdate = date("Y-m-d", strtotime($_GET['sdate']));
      $edate = date("Y-m-d", strtotime($_GET['edate']));
      $empid = $_GET['demployee'];
      $data['sdate'] = $sdate;
      $data['edate'] = $edate;
      $data['report'] = $report;
      
      $data['attendance'] = $this->pm->get_emp_dattendance_data($empid,$sdate,$edate);
      }
    else if ($report == 'monthlyReports')
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
      elseif ($month == 2)
        {
        $name = 'February';
        }
      elseif ($month == 3)
        {
        $name = 'March';
        }
      elseif ($month == 4)
        {
        $name = 'April';
        }
      elseif ($month == 5)
        {
        $name = 'May';
        }
      elseif ($month == 6)
        {
        $name = 'June';
        }
      elseif ($month == 7)
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
      $empid = $_GET['memployee'];
      $data['attendance'] = $this->pm->get_emp_mattendance_data($empid,$year,$month);
      }
    else if ($report == 'yearlyReports')
      {
      $year = $_GET['ryear'];
      $data['year'] = $year;
      $data['report'] = $report;
      $empid = $_GET['yemployee'];
      
      $data['attendance'] = $this->pm->get_emp_yattendance_data($empid,$year);
      }
    }
  else
    {
    $data['attendance'] = $this->pm->get_emp_attendance_data();
    }

    //var_dump($data['attendance']); exit();
  $this->load->view('hradmin/attendance_report',$data);
}




}