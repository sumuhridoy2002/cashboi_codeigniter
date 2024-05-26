<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asset extends CI_Controller {

public function __construct(){
    parent::__construct();       
    $this->load->model("prime_model",'pm');            
    $this->checkPermission();   
    $this->load->library('PHPExcel');
    $this->load->library('excel');
    $this->load->library('zend');
    $this->zend->load('Zend/Barcode'); 
}

public function test(){
   
	
	$sql= "INSERT INTO myguests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";
	$query = $this->db->query($sql);
}

public function index()
    {
    $data['title'] = 'Asset'; 

    $where = array(
       'assets.compid' => $_SESSION['compid']  
            );
    $other = array(
       'order_by' => 'asID',
    //   'join'     => 'left' 
            );
    $field = array(
        'assets'  => 'assets.*',
        // 'currency'  => 'currency.cName,currency.cSym'
            );
    // $join = array(
    //     'currency' => 'currency.cid = assets.currency',
        
    //         );
    $data['asset'] = $this->pm->get_data('assets',$where,$field,false,$other);
    // $data['currency'] = $this->pm->get_data('currency');
    
    $this->load->view('assets/asset.php',$data);
}

public function save_asset()
    {
    $info = $this->input->post();
    //var_dump('hello'); exit();

    $query = $this->db->select('ascode')
                  ->from('assets')
                  ->where('compid',$_SESSION['compid'])
                  ->limit(1)
                  ->order_by('ascode','DESC')
                  ->get()
                  ->row();
    if($query)
        {
        $sn = substr($query->ascode,5)+1;
        }
    else
        {
        $sn = 1;
        }

    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d",$sn);

    $cusid = 'A-'.$cn.$pc;
    //var_dump($cusid); exit();
    $info = [
        'compid'      => $_SESSION['compid'],
        'ascode' => $cusid,
        'asName' => $info['asName'],
        'pprice'      => $info['pprice'],
        // 'currency'      => $info['currency'],
        'qty'      => $info['qty'],
        'regby'       => $_SESSION['uid']
            ];
    //var_dump($productID); exit();
       
    $result = $this->pm->insert_data('assets',$info);

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Asset added Successfully !</h4>
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
    redirect('Asset');
}


public function edit_assets($id)
    {
    $data['title'] = 'Asset';

    $where = array(
        'compid' => $_SESSION['compid']
            );

    $pwhere = array(
        'asID' => $id
            );

    // $data['currency'] = $this->pm->get_data('currency');
    $asset = $this->pm->get_data('assets',$pwhere);
    $data['asset'] = $asset[0];
    //var_dump($data['unit']);
    $this->load->view('assets/edit_asset',$data);
}

public function update_asset()
    {
    $info = $this->input->post();
    $pid = $info['asID'];
    //var_dump($pid); exit();
   
    $info = [
        'asName'=> $info['asName'],
        
        'pprice'     => $info['pprice'],
        // 'currency'     => $info['currency'],
        'qty'     => $info['qty'],
        
        'upby'       => $_SESSION['uid']
            ];
    //var_dump($info); exit();
    $where = array(
        'asID' => $pid
            );
    //var_dump($where); exit();
    $result = $this->pm->update_data('assets',$info,$where);
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Asset updated Successfully !</h4>
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
    redirect('Asset');
}

public function delete_asset($pid)
    {
   
      $where = array(
        'asID' => $pid
            );
    //var_dump($where); exit();
    $result = $this->pm->delete_data('assets',$where);
    $swhere = array(
        'asset' => $pid
            );
    
    
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Asset deleted Successfully !</h4>
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
    redirect('Asset');
}

// public function product_reports()
//     {
//     $data['title'] = 'Stock Report'; 

//     $other = array(
//       'join' => 'left'         
//             );
//     $where = array(
//       'stock.compid' => $_SESSION['compid']    
//             );
//     $field = array(
//         'stock' => 'stock.*',
//         'products' => 'products.productName,products.productcode,products.pprice'
//             );
//     $join = array(
//         'products' => 'products.productID = stock.product'
//             );

//     //$data['stock'] = $this->pm->get_data('stock',$where,$field,$join,$other);
//     $data['stock'] = $this->pm->get_stock_product();
//     $data['company'] = $this->pm->company_details();
//     //var_dump($data['products']); exit();
//     $this->load->view('products/product_report',$data);
// }

public function asset_report()
  {
  $data = ['title' => 'Asset Report'];
  
//   $other = array(
//     'join'   => 'left' 
//          );
  $field = array(
    'assets'   => 'assets.*',
    // 'currency' => 'currency.cName,currency.cSym',
    
         );
//   $join = array(
//     'currency' => 'currency.cid = assets.currency',
    
//          );
  $data['asset'] = $this->pm->get_data('assets',false,$field,false);
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

    $this->load->view('assets/asset_report',$data);
}


}
