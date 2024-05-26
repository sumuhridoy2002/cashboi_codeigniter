<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Purchase extends CI_Controller {

public function __construct()
    {
    parent::__construct();
    $this->load->model("prime_model","pm");
    $this->checkPermission();
}

// public function index()
//     {
//     $data['title'] = 'Purchase';

//     $where = array(
//        'purchase.compid' => $_SESSION['compid']  
//             );
//     $join = array(
//         'suppliers' => 'suppliers.supplierID = purchase.supplier',
//         'users' => 'users.uid = purchase.regby'
//             );
//     $other = array(
//         'order_by'=>'purchaseID',
//         'join' => 'left'
//             );
//     $field = array(
//         'purchase' => 'purchase.*',
//         'suppliers' => 'suppliers.supplierName,suppliers.mobile',
//         'users' => 'users.name',

//             );    
//     $data['purchase'] = $this->pm->get_data('purchase',$where,$field,$join,$other);

//     $this->load->view('purchase/purchase_list',$data);
// }

public function index()
{
    $data['title'] = 'Purchase';

    $where = array(
        'purchase.compid' => $_SESSION['compid']  
    );

    // Count total records
    $total_records = $this->pm->get_data('purchase', $where);

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    $total_pages = ceil(count($total_records) / $limit);

    // Fetch purchase data with pagination
    $join = array(
        'suppliers' => 'suppliers.supplierID = purchase.supplier',
        'users' => 'users.uid = purchase.regby'
    );

    $other = array(
        'order_by' => 'purchaseID',
        'join' => 'left'
    );

    $field = array(
        'purchase' => 'purchase.*',
        'suppliers' => 'suppliers.supplierName, suppliers.mobile',
        'users' => 'users.name',
    );

    $data['purchase'] = $this->pm->get_data('purchase', $where, $field, $join, $other, $limit, $offset);

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

    $this->load->view('purchase/purchase_list', $data);
}

public function new_purchase() 
    {
        unset($_SESSION['stockProducts']);
       
    $data['title'] = 'Purchase';

    $where = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );
    $uwhere = array(
        'status' => 'Active',
        'compid' => $_SESSION['compid']  
            );

    $data['product'] = $this->pm->get_data('products',$where);
    $data['supplier'] = $this->pm->get_data('suppliers',$where);
    $data['category'] = $this->pm->get_data('categories',$uwhere);
    $data['brands'] = $this->pm->get_data('brands',$uwhere);
    $data['unit'] = $this->pm->get_sma_units_data();

    $this->load->view('purchase/newPurchase',$data);
}

public function get_purchase_supplier()
  {
    $where = array(
        'compid' => $_SESSION['compid']
            );
  $grup = $this->pm->get_data('suppliers',$where);
  $someJSON = json_encode($grup);
  echo $someJSON;
}

public function get_purchase_product()
  {
  $where = array(
    'compid' => $_SESSION['compid'],
    'status' => 'Active'
        );
  $grup = $data['product'] = $this->pm->get_data_products($where);
  $someJSON = json_encode($grup);
  echo $someJSON;
}

public function get_Product($id)
    {
        if(isset($_SESSION['stockProducts'])){
           $tempStock= $_SESSION['stockProducts'];
            if( in_array($id , $tempStock) )
            {
                
                 echo json_encode(1);
            }
            else{
                array_push($tempStock,$id);
                $this->session->set_userdata('stockProducts', $tempStock);
                $this->get_Product_Ajax($id);
                
            }
        }
        else{
            $tempStock=array($id);
            $this->session->set_userdata('stockProducts', $tempStock);
            $this->get_Product_Ajax($id);
            
        }
    
}

public function get_Product_Ajax($id){
    $str = "";

    $where = array(
        'productID' => $id
            );

    $productlist = $this->pm->get_data('products',$where);
    // $stock = $this->pm->get_stock_data($id);
    foreach ($productlist as $value)
        {
        $id = $value['productID'];
        $str .= "<tr>
        <td>".$value['productName']."<input type='hidden' readonly='readonly' name='product_id[]' value='".$value['productID']."'></td>
        <td><input type='text' class='form-control' id='quantity_".$value['productID']."' onkeyup='getTotal(".$id.")' name='quantity[]' value='0'></td>
        <td><input type='text' class='form-control' onkeyup='getTotal(".$id.")' id='tp_".$value['productID']."' name='pprice[]' value='".$value['pprice']."'></td>
        <td><input type='text' class='tPrice form-control' id='totalPrice_" . $value['productID']."' name='total_price[]' value='0.00' readonly ></td>
        <td onClick='getC(".$id.")'><span id=".$id." class='item_remove btn btn-danger btn-sm' onclick='deleteProduct(this)'><i class='fa fa-trash'></i></span></td>
        </tr>";
        }
    echo json_encode($str);
    
}
public function get_Product_Remove(){
    $id=$this->input->post('id');
    //unset($_SESSION['stockProducts']);
    $oldData = $_SESSION['stockProducts'];
    $newAlpha = array();
    foreach($oldData as $va){
        if($va!=$id){
            array_push($newAlpha,$va);
        }
        
        
    }
    $_SESSION['stockProducts']=$newAlpha;
    //echo $id;
    echo json_encode($newAlpha);
}

public function savedPurchase()
    {
    $info = $this->input->post();

    $query = $this->db->select('challanNo')
                  ->from('purchase')
                  ->where('compid',$_SESSION['compid'])
                  ->limit(1)
                  ->order_by('challanNo','DESC')
                  ->get()
                  ->row();
    if($query)
        {
        $sn = substr($query->challanNo,6)+1;
        }
    else
        {
        $sn = 1;
        }
    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d",$sn);

    $cusid = 'PO-'.$cn.$pc;
    //var_dump($cusid); exit();
    $purchase = array(
        'compid'       => $_SESSION['compid'],
        'challanNo'    => $cusid,
        'purchaseDate' => date('Y-m-d', strtotime($info['date'])),
        'supplier'     => $info['suppliers'],
        'totalPrice'   => $info['totalPrice'],
        'paidAmount'   => $info['Paid'],
        'pAmount'      => $info['Paid'],
        'due'          => $info['totalPrice']-$info['Paid'],
        'sCost'        => $info['sCost'],
        'vCost'        => $info['vCost'],
        'vType'        => $info['vType'],
        'vAmount'      => $info['vAmount'],
        'discount'     => $info['discount'],
        'disType'      => $info['disType'],
        'disAmount'    => $info['disAmount'],
        'accountType'  => $info['accountType'],
        'accountNo'    => $info['accountNo'],
        'terms'        => $info['terms'],
        'note'         => $info['note'],
        'regby'        => $_SESSION['uid']
            );
       // var_dump($purchase); exit();
    $result = $this->pm->insert_data('purchase',$purchase);

    $length = count($info['product_id']);
        
    for ($i = 0; $i < $length; $i++)
        {
        $purchase_product = array(
            'purchaseID' => $result,
            'productID'  => $info['product_id'][$i],
            'quantity'   => $info['quantity'][$i],
            'pprice'     => $info['pprice'][$i],                    
            'totalPrice' => $info['total_price'][$i],
            'regby'      => $_SESSION['uid']
                );
        //var_dump($purchase_product);            
        $result2 = $this->pm->insert_data('purchase_product',$purchase_product); 

        $pid = $info['product_id'][$i];
        $aid = $_SESSION['compid'];

        $swhere = array(
            'product' => $pid,
            'compid'  => $aid
                    );

        $stpd = $this->pm->get_data('stock',$swhere);

        $this->pm->delete_data('stock',$swhere);

        if($stpd)
            {
            $tquantity = $info['quantity'][$i]+$stpd[0]['totalPices'];
            }
        else{
            $tquantity = $info['quantity'][$i];
            }

        $stock_info = array(
            'compid'     => $_SESSION['compid'],
            'product'    => $info['product_id'][$i],
            'totalPices' => $tquantity,
            'regby'      => $_SESSION['uid']
                    );
    //var_dump($stock_info);    
        $this->pm->insert_data('stock',$stock_info);                 
        }
        $log = [
            'activity' => 'Purchase is added ('.$cusid.')',
            'compid'       => $_SESSION['compid'],
            'user_id'       => $_SESSION['uid']
                      ];
          $this->pm->insert_data('activity_logs',$log);
    if($result && $result2)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Purchase add Successfully !</h4>
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
    redirect('Purchase');
}

public function view_purchase($id)
    {
    $data['title'] = 'Purchase';

    $pwhere = array(
        'purchaseID' => $id
            );
    $pfield = array(
        'purchase_product' => 'purchase_product.*',
        'products' => 'products.productName,products.productcode'
            );
    $pjoin = array(
        'products' => 'products.productID = purchase_product.productID'
            );
    $pother = array(
        'join' => 'left'
            );

    $data['pproduct'] = $this->pm->get_data('purchase_product',$pwhere,$pfield,$pjoin,$pother);
    //var_dump($data['pproduct']);exit();

    $join = array(
        'suppliers' => 'purchase.supplier = suppliers.supplierID'
            );
    $field = array(
        'purchase' => 'purchase.*',
        'supplier' => 'suppliers.*'
            );

    $purchase = $this->pm->get_data('purchase',$pwhere,$field,$join,$pother);
    $data['purchase'] = $purchase[0];

    $sid = $purchase[0]['supplier'];
    //var_dump($cusid); exit();
    $data['csdue'] = $this->pm->supplier_purchases_due_details($id,$sid);
    $data['cvpa'] = $this->pm->supplier_paid_details($sid);
    //var_dump($data['csdue']);var_dump($data['cvpa']); exit();
    $data['company'] = $this->pm->company_details();
    
    $this->load->view('purchase/viewPurchase',$data);
}

public function edit_purchase($id)
    {
    $data['title'] = 'Purchase';

    $pwhere = array(
        'purchaseID' => $id
            );
    $pfield = array(
        'purchase_product' => 'purchase_product.*',
        'products' => 'products.productName,products.productcode'
            );
    $pjoin = array(
        'products' => 'products.productID = purchase_product.productID'
            );
    $pother = array(
        'join' => 'left'
            );

    $data['pproduct'] = $this->pm->get_data('purchase_product',$pwhere,$pfield,$pjoin,$pother);

    $purchase = $this->pm->get_data('purchase',$pwhere);
    $data['purchase'] = $purchase[0];

    $where = array(
       'compid' => $_SESSION['compid']  
            );
    $ppwhere = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );

    $data['product'] = $this->pm->get_data_products($ppwhere);
    $data['supplier'] = $this->pm->get_data('suppliers',$where);

    $this->load->view('purchase/editPurchase',$data);
}

public function update_purchase()
    {
    $info = $this->input->post();
    
    // echo '<pre>';
    // print_r($info);
    // exit();

    $purchase = array(
        'compid'      => $_SESSION['compid'],
        'purchaseDate'=> date('Y-m-d',strtotime($info['date'])),
        'supplier'    => $info['suppliers'],
        'totalPrice'  => $info['totalPrice'],
        'paidAmount'  => $info['Paid'],
        'pAmount'     => $info['Paid'],
        'due'         => $info['totalPrice']-$info['Paid'],
        'sCost'       => $info['sCost'],
        'vCost'       => $info['vCost'],
        'vType'       => $info['vType'],
        'vAmount'     => $info['vAmount'],
        'discount'    => $info['discount'],
        'disType'     => $info['disType'],
        'disAmount'   => $info['disAmount'],
        'accountType' => $info['accountType'],
        'accountNo'   => $info['accountNo'],
        'terms'       => $info['terms'],
        'note'        => $info['note'],
        'upby'        => $_SESSION['uid']
            );

    $where = array(
        'purchaseID' => $info['purhcase_id']
            );

    $result = $this->pm->update_data('purchase',$purchase,$where);
    
    
    
    //////////////////////////////////////////////////////////////////
    $pproduct = $this->pm->get_data('purchase_product',$where);
     $this->pm->delete_data('purchase_product',$where);
     
     $length = count($pproduct);
        
    for ($i = 0; $i < $length; $i++)
    {
        // $purchase_product = array(
        //     'purchaseID' => $info['purhcase_id'],
        //     'productID'  => $info['product_id'][$i],
        //     'quantity'   => $info['quantity'][$i],
        //     'pprice'     => $info['pprice'][$i],                    
        //     'totalPrice' => $info['total_price'][$i],
        //     'regby'      => $_SESSION['uid']
        //         );
        // //var_dump($purchase_product);            
        // $result2 = $this->pm->insert_data('purchase_product',$purchase_product); 
        // // print_r($result2);
        // // exit();
        
        
        
        // Stock Updated
        
        $swhere = array(
      'compid'  => $_SESSION['compid'],
      'product' => $pproduct[$i]['productID']
            );

        $spd = $this->pm->get_data('stock',$swhere);

        $this->pm->delete_data('stock',$swhere);

        if($spd)
          {
          if($pproduct)
            {
            $tquantity = ($spd[0]['totalPices']-$pproduct[$i]['quantity']);
            // $dtqnt = $spd[0]['dtquantity'];
            }
          else
            {
            $tquantity = $spd[0]['totalPices'];
            // $dtqnt = $spd[0]['dtquantity'];
            }
          }
        else
          {
          $tquantity = 0;
          $dtqnt = 0;
          }

        $stock_info = array(
            'compid'     => $_SESSION['compid'],
            'product'    => $pproduct[$i]['productID'],
            'totalPices' => $tquantity,
            // 'dtquantity' => $dtqnt,
            'regby'      => $_SESSION['uid']
                    );
    //var_dump($stock_info);    
        $this->pm->insert_data('stock',$stock_info); 
        
    }
    
    $length2 = count($info['product_id']);
    //var_dump($length); exit();
  for($i = 0; $i < $length2; $i++)
    {
    $purproduct = array(
      'purchaseID' => $info['purhcase_id'],
      'productID'  => $info['product_id'][$i],
      'quantity'   => $info['quantity'][$i],
      'pprice'     => $info['pprice'][$i],                    
      'totalPrice' => $info['total_price'][$i],
      'regby'      => $_SESSION['uid']
          );
        //var_dump($purchase_product);            
    $this->pm->insert_data('purchase_product',$purproduct); 
    
    $pid = $this->input->post('product_id')[$i];
    $aid = $_SESSION['compid'];

    $swhere = array(
      'compid'  => $_SESSION['compid'],
      'product' => $pid
              );

    $stpd = $this->pm->get_data('stock',$swhere);
    $this->pm->delete_data('stock',$swhere);

    if($stpd)
      {
      $tquantity = $info['quantity'][$i]+$stpd[0]['totalPices'];
    //   $dtqnt = $stpd[0]['dtquantity'];
      }
    else
      {
      $tquantity = $info['quantity'][$i];
      $dtqnt = 0;
      }

    $stock_info = array(
      'compid'     => $_SESSION['compid'],
      'product'    => $this->input->post('product_id')[$i],
      'totalPices' => $tquantity,
    //   'dtquantity' => $dtqnt,
      'regby'      => $_SESSION['uid']
              );
        //var_dump($stock_info); exit();    
    $this->pm->insert_data('stock',$stock_info);                 
    }
    $prname = $this->db->select('challanNo')
                     ->from('purchase')
                     ->where('purchaseID', $info['purhcase_id'])
                     ->get()
                     ->row();
    
    $log = [
      'activity' => 'Purchase is updated ('.$prname->challanNo.')',
      'compid'       => $_SESSION['compid'],
      'user_id'       => $_SESSION['uid']
                ];
    $this->pm->insert_data('activity_logs',$log);
    /////////////////////////////////////////////////////////////////////////////////////
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Purchase update Successfully !</h4>
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
    redirect('Purchase');
     

}

public function delete_purchases($id)
    {
    $where = array(
        'purchaseID' => $id
            );

    $prname = $this->db->select('challanNo')
                        ->from('purchase')
                        ->where('purchaseID', $id)
                        ->get()
                        ->row();

    $result = $this->pm->delete_data('purchase',$where);
    
    $pp = $this->pm->get_data('purchase_product',$where);
    $this->pm->delete_data('purchase_product',$where);
    
    $lnth = count($pp);

    for($i = 0; $i < $lnth; $i++)
      {
      $sswhere = array(
        'product' => $pp[$i]['productID'],
        'compid' => $_SESSION['compid']
            );

        $s2tpd = $this->pm->get_data('stock',$sswhere);

        $this->pm->delete_data('stock',$sswhere);

        if($s2tpd)
          {
          $tsqnt = $s2tpd[0]['totalPices']-$pp[$i]['quantity'];
          }
        else
          {
          $tsqnt = '-'.$pp[$i]['quantity'];
          }

        $stock = array(
          'compid'     => $_SESSION['compid'],
          'product'    => $pp[$i]['productID'],
          'totalPices' => $tsqnt,
          'regby'      => $_SESSION['uid']
                    );
        //var_dump($stock_info);    
        $this->pm->insert_data('stock',$stock);  
        }

    if($result)
        {
            $log = [
                'activity' => 'Purchase is deleted ('.$prname->challanNo.')',
                'user_id'       => $_SESSION['uid'],
                'compid'       => $_SESSION['compid'],
                 ];
            $this->pm->insert_data('activity_logs',$log);
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Purchase delete Successfully !</h4>
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
    redirect('Purchase');
}

public function purchases_reports()
    {
    $data = ['title' => 'Purchase Reports'];
    $where = array('compid' => $_SESSION['compid']);

    $data['supplier'] = $this->pm->get_data('suppliers',$where);
    $data['users'] = $this->pm->get_data('users');
    $data['company'] = $this->pm->company_details();

    if(isset($_GET['search']))
        {
        $report = $_GET['reports'];
        
        if($report == 'dailyReports')
            {
            $sdate = date("Y-m-d", strtotime($_GET['sdate']));
            $edate = date("Y-m-d", strtotime($_GET['edate']));
            $supplier = $_GET['dsupplier'];
            $user = $_GET['demployee'];
            $data['sdate'] = $sdate;
            $data['edate'] = $edate;
            $data['report'] = $report;
            //var_dump($employee); exit();
            $data['purchase'] = $this->pm->get_dpurchses_data($sdate,$edate,$supplier,$user);
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
            $supplier = $_GET['msupplier'];
            $user = $_GET['memployee'];
            $data['name'] = $name;
            $data['report'] = $report;

            $data['purchase'] = $this->pm->get_mpurchses_data($month,$year,$supplier,$user);
            }
        else if ($report == 'yearlyReports')
            {
            $year = $_GET['ryear'];
            $supplier = $_GET['ysupplier'];
            $user = $_GET['yemployee'];
            $data['year'] = $year;
            $data['report'] = $report;

            $data['purchase'] = $this->pm->get_ypurchses_data($year,$supplier,$user);
            }
        }
    else
        {
        $data['purchase'] = $this->pm->get_purchses_data();
        }

    $this->load->view('purchase/purchase_reports',$data);
}

public function get_purchase_payment()
    {
    $section = $this->pm->get_purchase_payment($_POST['id']);
    $someJSON = json_encode($section);
    echo $someJSON;
}

public function save_purchase_payment()
    {
    $info = $this->input->post();

    $sale = [
        'pur_id'      => $info['purchaseID'],
        'amount'      => $info['amount'],            
        'accountType' => $info['accountType'],            
        'accountNo'   => $info['accountNo'],            
        'regby'       => $_SESSION['uid']
            ];
    //var_dump($sale); exit();
    $result = $this->pm->insert_data('purchase_payment',$sale);

    $where = array(
        'purchaseID' => $info['purchaseID']
                );

    $data = [
        'paidAmount' => $info['amount']+$info['pamount'],
        'due'        => $info['damount']-$info['amount'],
        'upby'       => $_SESSION['uid']
            ];
       
    $result2 = $this->pm->update_data('purchase',$data,$where);

    $prname = $this->db->select('challanNo')
                     ->from('purchase')
                     ->where('purchaseID', $info['purchaseID'])
                     ->get()
                     ->row();
    $log = [
        'activity' => 'Purchase payment is made of '.$info['amount'].' ('.$prname->challanNo.')',
        'user_id'       => $_SESSION['uid'],
        'compid'       => $_SESSION['compid'],
                  ];
    $this->pm->insert_data('activity_logs',$log);
    if($result && $result2)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Purchase Payment add Successfully !</h4>
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
    redirect('Purchase');
}





}