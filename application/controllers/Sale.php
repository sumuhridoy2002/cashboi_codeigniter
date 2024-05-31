<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sale extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model("prime_model","pm");
    $this->checkPermission();
}

// public function index()
//     {
//     $data['title'] = 'Sale';
    
//     $where = array(
//         'sales.compid' => $_SESSION['compid']
//             );
//     $other = array(
//         'join' => 'left',
//         'order_by' => 'saleID'
//             );
//     $field = array(
//         'sales' => 'sales.*',
//         'users' => 'users.name',
//         'customers' => 'customers.customerName,customers.mobile'
//             );
//     $join = array(
//         'customers' => 'customers.customerID = sales.customerID',
//         'users' => 'users.uid = sales.regby'

//             );
//     $data['sales'] = $this->pm->get_data('sales',$where,$field,$join,$other);

//     $swhere = array(
//         'compid' => $_SESSION['compid']
//             );
//     $data['customer'] = $this->pm->get_data('customers',$swhere);
//     $data['product'] = $this->pm->get_data('products',$swhere);

//     $this->load->view('sale/sales_list',$data);
// }

public function index()
{
    $data['title'] = 'Sale';

    $where = array(
        'sales.compid' => $_SESSION['compid']
    );

    // Count total records
    $total_records = $this->pm->get_data('sales', $where);

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    $total_pages = ceil(count($total_records) / $limit);

    // Fetch sale data with pagination
    $other = array(
        'join' => 'left',
        'order_by' => 'saleID'
    );

    $field = array(
        'sales' => 'sales.*',
        'users' => 'users.name',
        'customers' => 'customers.customerName, customers.mobile'
    );

    $join = array(
        'customers' => 'customers.customerID = sales.customerID',
        'users' => 'users.uid = sales.regby'
    );

    $data['sales'] = $this->pm->get_data('sales', $where, $field, $join, $other, $limit, $offset);

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

    $swhere = array(
        'compid' => $_SESSION['compid']
    );
    $data['customer'] = $this->pm->get_data('customers', $swhere);
    $data['product'] = $this->pm->get_data('products', $swhere);

    $this->load->view('sale/sales_list', $data);
}

public function new_sale()
    {
		unset($_SESSION['stockProducts']);
    $data['title'] = 'Sale';

    $where = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );
    // $other = array(
    //     'join' => 'left',
    //         );
    // $field = array(
    //     'products' => 'products.*',
    //     'stock' => 'stock.totalPices',

    //         );
    // $join = array(
    //     'stock' => 'stock.product=products.productID'
    //                 );

    $data['customer'] = $this->pm->get_data('customers',$where);
    $data['product'] = $this->pm->get_data_products($where);

    $this->load->view('sale/NewSale',$data);
}

public function get_sale_customer()
    {
    $other = array(
    'order_by' => 'customerID'
        );
    $where = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );
    $section = $this->pm->get_data('customers',$where,false,false,$other);
    $someJSON = json_encode($section);
    echo $someJSON;
}

public function getDetails($id)
    {
    // $join = false;
    // $other = false;
    // $table = $this->input->post('table');
    // $id = $this->input->post('id');

   
    $custid = $this->input->post('custid');
    $table = 'products';
    // $proInfo = $this->pm->get_product_info_data($id);


	if(isset($_SESSION['stockProducts'])){
		$tempStock= $_SESSION['stockProducts'];
		 if( in_array($id , $tempStock) )
		 {
			 
			  echo json_encode(1);
		 }
		 else{
			 array_push($tempStock,$id);
			 $this->session->set_userdata('stockProducts', $tempStock);
			 $this->getDetailsAjax($id,$custid);
			 
		 }
	 }
	 else{
		 $tempStock=array($id);
		 $this->session->set_userdata('stockProducts', $tempStock);
		 $this->getDetailsAjax($id,$custid);
		 
	 }
}

public function getDetailsAjax($id,$custid)
  {
  $customer = $this->db->select('custType')->from('customers')->where('customerID',$custid)->get()->row();
      $proInfo = $this->pm->get_product_info_data($id);

    $where = array(
      'productID' => $id,
      'totalPices >' => 0,
      'stock.compid' => $_SESSION['compid']
            );
    $join = array(
      'stock' => 'products.productID = stock.product'
            );
    $other = array(
      'join' => 'left'
            );
  $products = $this->pm->get_data('products',$where,false,$join,$other);
    // var_dump($proInfo->type); exit();
  $str='';
 if($products && $proInfo->type == 'product'){
  foreach($products as $value){
    $id = $value['productID'];
    $tpq = $value['totalPices'];
    if($customer->custType == 2)
      {
      $sprice = $value['wprice'];
      }
    else
      {
      $sprice = $value['sprice'];
      }
    $str.="<tr>
        <td>".$value['productName']."<input type='hidden' name='productID[]' value='".$value['productID']."' required ></td>
        <td id='stock'>".$value['totalPices']."</td>
        <td><input type='text' class='form-control' onkeyup='totalPrice(".$id.")' name='pices[]' id='pices_".$value['productID']."' value='0' max='$tpq' min='1' required ></td>
        <td><input type='text' class='form-control' onkeyup='totalPrice(".$id.")' name='salePrice[]' id='salePrice_".$value['productID']."' value='".$sprice."' required></td>
        <td><input type='text' class='totalPrice form-control'  name='totalPrice[]' readonly id='totalPrice_".$value['productID']."' value='0' required ></td>
        <td><span class='item_remove btn btn-danger btn-sm'  onclick='deleteProduct(this)'><i class='fa fa-trash'></i></span></td>
        </tr>";
        }
    echo json_encode($str);
 }else if($proInfo->type == 'service'){

    $productID = $proInfo->productID;
            
       
      $service = $this->pm->get_service_data($productID);
    //   var_dump($service);
    //         die();
      $str='';
      foreach($service as $value)
        {
            $id = $value['productID'];
            // $tpq = $value['totalPices'];
            if($customer->custType == 2)
              {
              $sprice = $value['wprice'];
              }
            else
              {
              $sprice = $value['sprice'];
              }
            $str.="<tr>
                <td>".$value['productName']."<input type='hidden' name='productID[]' value='".$value['productID']."' required ></td>
                <td id='stock'>".$value['type']."</td>
                <td><input type='text' class='form-control' onkeyup='totalPrice(".$id.")' name='pices[]' id='pices_".$value['productID']."' value='0' max='$id' min='1' required ></td>
                <td><input type='text' class='form-control' onkeyup='totalPrice(".$id.")' name='salePrice[]' id='salePrice_".$value['productID']."' value='".$sprice."' required></td>
                <td><input type='text' class='totalPrice form-control'  name='totalPrice[]' readonly id='totalPrice_".$value['productID']."' value='0' required ></td>
                <td><span class='item_remove btn btn-danger btn-sm'  onclick='deleteProduct(this)'><i class='fa fa-trash'></i></span></td>
                </tr>";
                }
                echo json_encode($str);}else{
    echo json_encode(2);

  }
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

public function saved_sale()
    {
    $info = $this->input->post();

    $query = $this->db->select('saleID')
                  ->from('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->limit(1)
                  ->order_by('saleID','DESC')
                  ->get()
                  ->row();
    if($query)
        {
        $sn = $query->saleID+1;
        }
    else
        {
        $sn = 1;
        }
    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d", $sn);

    $cusid = 'INV-'.$cn.$pc;

   //var_dump($due); exit();
    $sale = array(
        'compid'         => $_SESSION['compid'],
        'invoice_no'     => $cusid,
        'saleDate'       => date('Y-m-d', strtotime($info['date'])),
        'customerID'     => $info['customerID'],
        'totalAmount'    => $info['totalprice'],
        'paidAmount'     => $info['total_paid'],
        'pAmount'        => $info['total_paid'],
        'dueamount'      => $info['due'],
        'discount'       => $info['discount'],             
        'discountType'   => $info['disType'],
        'discountAmount' => $info['disAmount'],
        'sCost'          => $info['sCost'],
        'vCost'          => $info['vCost'],
        'vType'          => $info['vType'],             
        'vAmount'        => $info['vAmount'],
        'accountType'    => $info['accountType'],
        'accountNo'      => $info['accountNo'],
        'terms'          => $info['terms'],
        'note'           => $info['note'],             
        'regby'          => $_SESSION['uid']
            );
    //var_dump($sale); exit();
    
    
    if(isset($info['productID']))
      {
    $result = $this->pm->insert_data('sales',$sale);
    $log = [
        'activity' => 'Sale is added ('.$cusid.')',
        'user_id'       => $_SESSION['uid'],
        'compid'       => $_SESSION['compid'],
  
                  ];
    $this->pm->insert_data('activity_logs',$log);

    $length = count($info['productID']);
    for ($i = 0; $i < $length; $i++)
        {
        $spdata = array(
            'saleID'     => $result,
            'productID'  => $info['productID'][$i],                       
            'quantity'   => $info['pices'][$i],
            'sprice'     => $info['salePrice'][$i],
            'totalPrice' => $info['totalPrice'][$i],
            'regby'      => $_SESSION['uid']
                );

        $this->pm->insert_data('sale_product',$spdata);

        $pid = $info['productID'][$i];
        $aid = $_SESSION['compid'];

        $swhere = array(
            'product' => $pid,
            'compid' => $aid
                    );

        $stpd = $this->pm->get_data('stock',$swhere);

        $this->pm->delete_data('stock',$swhere);

        if($stpd)
            {
            $tquantity = $stpd[0]['totalPices']-$info['pices'][$i];
            }
        else{
            $tquantity = '-'.$info['pices'][$i];
            }

        $stock_info = array(
            'compid'     => $_SESSION['compid'],
            'product'    => $info['productID'][$i],
            'totalPices' => $tquantity,
            'regby'      => $_SESSION['uid']
                    );
        //var_dump($stock_info);    
        $this->pm->insert_data('stock',$stock_info);  
        }
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Product Sold Successfully !</h4>
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
    //redirect('Sale');
    redirect('viewSale/'.$result);
      }
    else
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> Select Product First !</h4>
            </div>'
                ];
        $this->session->set_userdata($sdata);
        redirect('newSale');
        }
    
}

public function view_invoice($id)
    {
    $data['title'] = 'Sale Invoice';

    $where = array(
        'saleID' => $id
            );
    $other = array( 
        'join' => 'left'
            );
    $field = array(
        'sales' => 'sales.*',
        'customers' => 'customers.*'
            );
    $join = array(
        'customers' => 'customers.customerID = sales.customerID'
            );
    $prints = $this->pm->get_data('sales',$where,$field,$join,$other);
    $data['prints'] = $prints[0];

    $pfield = array(
        'sale_product' => 'sale_product.*',
        'products' => 'products.productName,products.productcode'
            );
    $pjoin = array(
        'products' => 'products.productID = sale_product.productID'
            );

    $data['salesp'] = $this->pm->get_data('sale_product',$where,$pfield,$pjoin,$other);

    $cusid = $prints[0]['customerID'];
    //var_dump($cusid); exit();
    $data['csdue'] = $this->pm->customer_sales_due_details($id,$cusid);
    $data['cvpa'] = $this->pm->customer_vaucher_paid_details($cusid);
    $data['cra'] = $this->pm->customer_returns_details($cusid);
    $data['company'] = $this->pm->company_details();
    
    $this->load->view('sale/print_page',$data);
}

public function sale_delivery_chalan($id)
    {
    $data['title'] = 'Sale Invoice';

    $where = array(
        'saleID' => $id
            );
    $other = array(
        'join' => 'left'
            );
    $field = array(
        'sales' => 'sales.*',
        'customers' => 'customers.*'
            );
    $join = array(
        'customers' => 'customers.customerID = sales.customerID'
            );
    $prints = $this->pm->get_data('sales',$where,$field,$join,$other);
    $data['prints'] = $prints[0];

    $pfield = array(
        'sale_product' => 'sale_product.*',
        'products' => 'products.productName,products.productcode'
            );
    $pjoin = array(
        'products' => 'products.productID = sale_product.productID'
            );

    $data['salesp'] = $this->pm->get_data('sale_product',$where,$pfield,$pjoin,$other);
    $cusid = $prints[0]['customerID'];
    //var_dump($cusid); exit();
    $data['company'] = $this->pm->company_details();
    
    $this->load->view('sale/delivery_chalan',$data);
}

public function edit_sale($id)
    {
    $data['title'] = 'Sale';

    $where = array(
        'saleID' => $id
            );

    $prints = $this->pm->get_data('sales',$where);
    $data['sale'] = $prints[0];

    $other = array(
        'join' => 'left'
            );
    $pfield = array(
        'sale_product' => 'sale_product.*',
        'products' => 'products.productName,products.productcode'
            );
    $pjoin = array(
        'products' => 'products.productID = sale_product.productID'
            );

    $data['salesp'] = $this->pm->get_data('sale_product',$where,$pfield,$pjoin,$other);
    $cwhere = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );
    $data['customer'] = $this->pm->get_data('customers',$cwhere);
    $data['product'] = $this->pm->get_data_products($cwhere);

    $this->load->view('sale/EditSale',$data);
}

public function update_sale()
    {
    $info = $this->input->post();

    $sale = array(
        'compid'         => $_SESSION['compid'],
        'saleDate'       => date('Y-m-d', strtotime($info['date'])),
        'customerID'     => $info['customerID'],
        'totalAmount'    => $info['totalprice'],
        'paidAmount'     => $info['total_paid'],
        'pAmount'        => $info['total_paid'],
        'dueamount'      => $info['due'],
        'discount'       => $info['discount'],             
        'discountType'   => $info['disType'],
        'discountAmount' => $info['disAmount'],
        'sCost'          => $info['sCost'],
        'vCost'          => $info['vCost'],
        'vType'          => $info['vType'],             
        'vAmount'        => $info['vAmount'],
        'accountType'    => $info['accountType'],
        'accountNo'      => $info['accountNo'],
        'terms'          => $info['terms'],
        'note'           => $info['note'],             
        'upby'           => $_SESSION['uid']
            );

    $where = array(
        'saleID' => $info['saleID']
            );
    //var_dump($sale); exit();
    $result = $this->pm->update_data('sales',$sale,$where);

    $prname = $this->db->select('invoice_no')
                     ->from('sales')
                     ->where('saleID', $info['saleID'])
                     ->get()
                     ->row();
    
    $log = [
      'activity' => 'Sale is updated ('.$prname->invoice_no.')',
       'compid'       => $_SESSION['compid'],
      'user_id'       => $_SESSION['uid']
                ];
    $this->pm->insert_data('activity_logs',$log);

    $pp = $this->pm->get_data('sale_product',$where);
    $this->pm->delete_data('sale_product',$where);
    
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
          $tsqnt = $s2tpd[0]['totalPices']+$pp[$i]['quantity'];
          }
        else
          {
          $tsqnt = $pp[$i]['quantity'];
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
        
    $length = count($info['productID']);
    for ($i = 0; $i < $length; $i++)
        {
        $spdata = array(
            'saleID'     => $info['saleID'],
            'productID'  => $info['productID'][$i],                       
            'quantity'   => $info['pices'][$i],
            'sprice'     => $info['salePrice'][$i],
            'totalPrice' => $info['totalPrice'][$i],
            'regby'      => $_SESSION['uid']
                );

        $this->pm->insert_data('sale_product',$spdata);

        $pid = $info['productID'][$i];
        $aid = $_SESSION['compid'];

        $swhere = array(
            'product' => $pid,
            'compid' => $aid
                    );

        $stpd = $this->pm->get_data('stock',$swhere);

        $this->pm->delete_data('stock',$swhere);

        if($stpd)
            {
            $tquantity = $stpd[0]['totalPices']-$info['pices'][$i];
            }
        else{
            $tquantity = '-'.$info['pices'][$i];
            }

        $stock_info = array(
            'compid'     => $_SESSION['compid'],
            'product'    => $info['productID'][$i],
            'totalPices' => $tquantity,
            'regby'      => $_SESSION['uid']
                    );
        //var_dump($stock_info);    
        $this->pm->insert_data('stock',$stock_info);  
        }

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Sale product update Successfully !</h4>
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
    redirect('Sale');
}

public function delete_sales($id)
    {
    $where = array(
        'saleID' => $id
            );
    $prname = $this->db->select('invoice_no')
                        ->from('sales')
                        ->where('saleID', $id)
                        ->get()
                        ->row();
    //var_dump($sale); exit();
    $result = $this->pm->delete_data('sales',$where);
    $pp = $this->pm->get_data('sale_product',$where);
    $result2 = $this->pm->delete_data('sale_product',$where);
    
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
          $tsqnt = $s2tpd[0]['totalPices']+$pp[$i]['quantity'];
          }
        else
          {
          $tsqnt = $pp[$i]['quantity'];
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

        $log = [
            'activity' => 'Sale is deleted ('.$prname->invoice_no.')',
            'user_id'       => $_SESSION['uid'],
            'compid'       => $_SESSION['compid'],
                    ];
        $this->pm->insert_data('activity_logs',$log);

    
    if($result && $result2)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Sale product delete Successfully !</h4>
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
    redirect('Sale');
}

// public function all_sales_reports()
//     {
//     $data['title'] = 'Sales Report';

//     $where = array(
//         'compid' => $_SESSION['compid'],
//             );
//     $data['customer'] = $this->pm->get_data('customers',$where);
//     $data['employee'] = $this->pm->get_data('users',$where);
//     $data['company'] = $this->pm->company_details();

//     if(isset($_GET['search']))
//         {
//         $report = $_GET['reports'];
        
//         if($report == 'dailyReports')
//             {
//             $sdate = date("Y-m-d", strtotime($_GET['sdate']));
//             $edate = date("Y-m-d", strtotime($_GET['edate']));
//             $customer = $_GET['dcustomer'];
//             $employee = $_GET['demployee'];
//             $data['sdate'] = $sdate;
//             $data['edate'] = $edate;
//             $data['report'] = $report;
//             //var_dump($employee); exit();
//             $data['sales'] = $this->pm->get_dsales_data($sdate,$edate,$customer,$employee);
//             }
//         else if ($report == 'monthlyReports')
//             {
//             $month = $_GET['month'];
//             $data['month'] = $month;
//             $year = $_GET['year'];
//             $data['year'] = $year;
//             //var_dump($data['month']); exit();
//             if($month == 01)
//                 {
//                 $name = 'January';
//                 }
//             elseif ($month == 02)
//                 {
//                 $name = 'February';
//                 }
//             elseif ($month == 03)
//                 {
//                 $name = 'March';
//                 }
//             elseif ($month == 04)
//                 {
//                 $name = 'April';
//                 }
//             elseif ($month == 05)
//                 {
//                 $name = 'May';
//                 }
//             elseif ($month == 06)
//                 {
//                 $name = 'June';
//                 }
//             elseif ($month == 07)
//                 {
//                 $name = 'July';
//                 }
//             elseif ($month == 8)
//                 {
//                 $name = 'August';
//                 }
//             elseif ($month == 9)
//                 {
//                 $name = 'September';
//                 }
//             elseif ($month == 10)
//                 {
//                 $name = 'October';
//                 }
//             elseif ($month == 11)
//                 {
//                 $name = 'November';
//                 }
//             else
//                 {
//                 $name = 'December';
//                 }
//             $customer = $_GET['mcustomer'];
//             $employee = $_GET['memployee'];
//             $data['name'] = $name;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->get_msales_data($month,$year,$customer,$employee);
//             }
//         else if ($report == 'yearlyReports')
//             {
//             $year = $_GET['ryear'];
//             $customer = $_GET['ycustomer'];
//             $employee = $_GET['yemployee'];
//             $data['year'] = $year;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->get_ysales_data($year,$customer,$employee);
//             }
//         }
//     else
//         {
//         $data['sales'] = $this->pm->get_sales_data();
//         }

//     $this->load->view('sale/all_sales',$data);
// }

public function all_sales_reports()
{
    $data['title'] = 'Sales Report';

    // Set up the basic where clause
    $where = array(
        'compid' => $_SESSION['compid'],
    );

    // Fetch basic data
    $data['customer'] = $this->pm->get_data('customers', $where);
    $data['employee'] = $this->pm->get_data('users', $where);
    $data['company'] = $this->pm->company_details();

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Initialize variables
    $sales = [];
    $total_records = 0;

    if (isset($_GET['search'])) {
        $report = $_GET['reports'];

        if ($report == 'dailyReports') {
            $sdate = date("Y-m-d", strtotime($_GET['sdate']));
            $edate = date("Y-m-d", strtotime($_GET['edate']));
            $customer = $_GET['dcustomer'];
            $employee = $_GET['demployee'];
            $data['sdate'] = $sdate;
            $data['edate'] = $edate;
            $data['report'] = $report;

            // Fetch total records
            $total_records = count($this->pm->get_dsales_data($sdate, $edate, $customer, $employee));

            // Fetch paginated data
            $sales = $this->pm->get_dsales_data($sdate, $edate, $customer, $employee, $limit, $offset);
        } elseif ($report == 'monthlyReports') {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $customer = $_GET['mcustomer'];
            $employee = $_GET['memployee'];
            $data['month'] = $month;
            $data['year'] = $year;
            $data['report'] = $report;
            $data['name'] = date("F", mktime(0, 0, 0, $month, 10)); // Get month name

            // Fetch total records
            $total_records = count($this->pm->get_msales_data($month, $year, $customer, $employee));

            // Fetch paginated data
            $sales = $this->pm->get_msales_data($month, $year, $customer, $employee, $limit, $offset);
        } elseif ($report == 'yearlyReports') {
            $year = $_GET['ryear'];
            $customer = $_GET['ycustomer'];
            $employee = $_GET['yemployee'];
            $data['year'] = $year;
            $data['report'] = $report;

            // Fetch total records
            $total_records = count($this->pm->get_ysales_data($year, $customer, $employee));

            // Fetch paginated data
            $sales = $this->pm->get_ysales_data($year, $customer, $employee, $limit, $offset);
        }
    } else {
        // Fetch total records
        $total_records = count($this->pm->get_sales_data());

        // Fetch paginated data
        $sales = $this->pm->get_sales_data($limit, $offset);
    }

    $data['sales'] = $sales;

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

    $this->load->view('sale/all_sales', $data);
}

public function get_sales_payment()
    {
    $section = $this->pm->get_sales_payment($_POST['id']);
    $data = json_encode($section);
    echo $data;
}

public function save_sales_payment()
    {
    $info = $this->input->post();

    $sale = [
        'saleID' => $info['saleID'],
        'amount' => $info['amount'],   
         'accountType' => $info['accountType'],            
        'accountNo' => $info['accountNo'],
        'regby'  => $_SESSION['uid']
            ];
    //var_dump($sale); exit();
    $result = $this->pm->insert_data('sales_payment',$sale);

    $where = array(
        'saleID' => $info['saleID']
                );

    $data = [
        'paidAmount' => $info['amount']+$info['pamount'],
        'dueamount'  => $info['damount']-$info['amount'],
        'upby'       => $_SESSION['uid']
            ];
       
    $result2 = $this->pm->update_data('sales',$data,$where);
    $prname = $this->db->select('invoice_no')
                     ->from('sales')
                     ->where('saleID', $info['saleID'])
                     ->get()
                     ->row();
    
    $log = [
      'activity' => 'Sale payment is made of '.$info['amount'].' ('.$prname->invoice_no.')',
      'user_id'       => $_SESSION['uid'],
      'compid'       => $_SESSION['compid'],
                ];
    $this->pm->insert_data('activity_logs',$log);
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Sale Payment added Successfully !</h4>
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
    redirect('Sale');
}

public function view_sale_money_receipt($id)
  {
  $data['title'] = 'Money Receipt';

  $where = array(
    'saleID' => $id
        );
        
  $other = array( 
    'join' => 'left'
        );
  $field = array(
    'sales' => 'sales.saleID,sales.accountType',
    'customers' => 'customers.*',
        // 'sales_payment' => 'sales_payment.*',
    
    // 'projects' => 'projects.*',
    // 'currency' => 'currency.cName,currency.cSym'
        );
  $join = array(
    'customers' => 'customers.customerID = sales.customerID',
    // 'projects' => 'projects.prid = sales.prid',
    // 'currency' => 'currency.cid = sales.cid'
        );
  $prints = $this->pm->get_data('sales',$where,$field,$join,$other);
  $data['prints'] = $prints[0];

  $data['salesp'] = $this->pm->get_data('sales_payment',$where);
   
  $data['company'] = $this->pm->company_details();
    
  $this->load->view('sale/view_sale_payment',$data);
}

// public function sales_invoice_reports()
//     {
//     $data['title'] = 'Sales Report';


//     if(isset($_GET['search']))
//         {
//         $report = $_GET['reports'];
        
//         if($report == 'dailyReports')
//             {
//             $sdate = date("Y-m-d", strtotime($_GET['sdate']));
//             $edate = date("Y-m-d", strtotime($_GET['edate']));
//             $data['sdate'] = $sdate;
//             $data['edate'] = $edate;
//             $data['report'] = $report;
//             //var_dump($employee); exit();
//             $data['sales'] = $this->pm->sales_ddata($sdate,$edate);
//             }
//         else if ($report == 'monthlyReports')
//             {
//             $month = $_GET['month'];
//             $data['month'] = $month;
//             $year = $_GET['year'];
//             $data['year'] = $year;
//             //var_dump($data['month']); exit();
//             if($month == 01)
//                 {
//                 $name = 'January';
//                 }
//             elseif ($month == 02)
//                 {
//                 $name = 'February';
//                 }
//             elseif ($month == 03)
//                 {
//                 $name = 'March';
//                 }
//             elseif ($month == 04)
//                 {
//                 $name = 'April';
//                 }
//             elseif ($month == 05)
//                 {
//                 $name = 'May';
//                 }
//             elseif ($month == 06)
//                 {
//                 $name = 'June';
//                 }
//             elseif ($month == 07)
//                 {
//                 $name = 'July';
//                 }
//             elseif ($month == 8)
//                 {
//                 $name = 'August';
//                 }
//             elseif ($month == 9)
//                 {
//                 $name = 'September';
//                 }
//             elseif ($month == 10)
//                 {
//                 $name = 'October';
//                 }
//             elseif ($month == 11)
//                 {
//                 $name = 'November';
//                 }
//             else
//                 {
//                 $name = 'December';
//                 }
//             $data['name'] = $name;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->sales_mdata($month,$year);
//             }
//         else if ($report == 'yearlyReports')
//             {
//             $year = $_GET['ryear'];
//             $data['year'] = $year;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->sales_ydata($year);
//             }
//         }
//     else
//         {
//         $data['sales'] = $this->pm->sales_adata();
//         }
    
//     $data['company'] = $this->pm->company_details();

//     $this->load->view('sale/sales_ireport',$data);
// }

public function sales_invoice_reports()
{
    $data['title'] = 'Sales Report';

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
            
            $total_records = count($this->pm->sales_ddata($sdate, $edate));
            $data['sales'] = $this->pm->sales_ddata($sdate, $edate, $limit, $offset);
        } else if ($report == 'monthlyReports') {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $data['month'] = $month;
            $data['year'] = $year;
            
            $name = date("F", mktime(0, 0, 0, $month, 10)); // Get month name
            $data['name'] = $name;
            $data['report'] = $report;
            
            $total_records = count($this->pm->sales_mdata($month, $year));
            $data['sales'] = $this->pm->sales_mdata($month, $year, $limit, $offset);
        } else if ($report == 'yearlyReports') {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;
            
            $total_records = count($this->pm->sales_ydata($year));
            $data['sales'] = $this->pm->sales_ydata($year, $limit, $offset);
        }
    } else {
        $total_records = count($this->pm->sales_adata());
        $data['sales'] = $this->pm->sales_adata($limit, $offset);
    }

    $data['company'] = $this->pm->company_details();

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

    $this->load->view('sale/sales_ireport', $data);
}

// public function sales_due_reports()
//     {
//     $data['title'] = 'Due Report';


//     if(isset($_GET['search']))
//         {
//         $report = $_GET['reports'];
        
//         if($report == 'dailyReports')
//             {
//             $sdate = date("Y-m-d", strtotime($_GET['sdate']));
//             $edate = date("Y-m-d", strtotime($_GET['edate']));
//             $data['sdate'] = $sdate;
//             $data['edate'] = $edate;
//             $data['report'] = $report;
//             //var_dump($employee); exit();
//             $data['sales'] = $this->pm->sales_due_ddata($sdate,$edate);
//             }
//         else if ($report == 'monthlyReports')
//             {
//             $month = $_GET['month'];
//             $data['month'] = $month;
//             $year = $_GET['year'];
//             $data['year'] = $year;
//             //var_dump($data['month']); exit();
//             if($month == 01)
//                 {
//                 $name = 'January';
//                 }
//             elseif ($month == 02)
//                 {
//                 $name = 'February';
//                 }
//             elseif ($month == 03)
//                 {
//                 $name = 'March';
//                 }
//             elseif ($month == 04)
//                 {
//                 $name = 'April';
//                 }
//             elseif ($month == 05)
//                 {
//                 $name = 'May';
//                 }
//             elseif ($month == 06)
//                 {
//                 $name = 'June';
//                 }
//             elseif ($month == 07)
//                 {
//                 $name = 'July';
//                 }
//             elseif ($month == 8)
//                 {
//                 $name = 'August';
//                 }
//             elseif ($month == 9)
//                 {
//                 $name = 'September';
//                 }
//             elseif ($month == 10)
//                 {
//                 $name = 'October';
//                 }
//             elseif ($month == 11)
//                 {
//                 $name = 'November';
//                 }
//             else
//                 {
//                 $name = 'December';
//                 }
//             $data['name'] = $name;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->sales_due_mdata($month,$year);
//             }
//         else if ($report == 'yearlyReports')
//             {
//             $year = $_GET['ryear'];
//             $data['year'] = $year;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->sales_due_ydata($year);
//             }
//         }
//     else
//         {
//         $data['sales'] = $this->pm->sales_due_adata();
//         }
    
//     $data['company'] = $this->pm->company_details();

//     $this->load->view('sale/sales_dreport',$data);
// }

public function sales_due_reports()
{
    $data['title'] = 'Due Report';

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

            $total_records = count($this->pm->sales_due_ddata($sdate, $edate));
            $data['sales'] = $this->pm->sales_due_ddata($sdate, $edate, $limit, $offset);
        } else if ($report == 'monthlyReports') {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $data['month'] = $month;
            $data['year'] = $year;

            $name = date("F", mktime(0, 0, 0, $month, 10)); // Get month name
            $data['name'] = $name;
            $data['report'] = $report;

            $total_records = count($this->pm->sales_due_mdata($month, $year));
            $data['sales'] = $this->pm->sales_due_mdata($month, $year, $limit, $offset);
        } else if ($report == 'yearlyReports') {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;

            $total_records = count($this->pm->sales_due_ydata($year));
            $data['sales'] = $this->pm->sales_due_ydata($year, $limit, $offset);
        }
    } else {
        $total_records = count($this->pm->sales_due_adata());
        $data['sales'] = $this->pm->sales_due_adata($limit, $offset);
    }

    $data['company'] = $this->pm->company_details();

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

    $this->load->view('sale/sales_dreport', $data);
}

// public function top_sale_product_report()
//     {
//     $data['title'] = 'Top Sale Product';

//     $data['sales'] = $this->pm->get_top_sales_product_data();
    
//     $data['company'] = $this->pm->company_details();

//     $this->load->view('sale/top_sale_product',$data);
// }

public function top_sale_product_report()
{
    $data['title'] = 'Top Sale Product';

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Fetch total records for pagination calculation
    $total_records = count($this->pm->get_top_sales_product_data());

    // Fetch paginated data
    $data['sales'] = $this->pm->get_top_sales_product_data($limit, $offset);
    
    $data['company'] = $this->pm->company_details();

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

    $this->load->view('sale/top_sale_product', $data);
}

// public function sales_payment_reports()
//     {
//     $data['title'] = 'Due Payment Report';


//     if(isset($_GET['search']))
//         {
//         $report = $_GET['reports'];
        
//         if($report == 'dailyReports')
//             {
//             $sdate = date("Y-m-d", strtotime($_GET['sdate']));
//             $edate = date("Y-m-d", strtotime($_GET['edate']));
//             $data['sdate'] = $sdate;
//             $data['edate'] = $edate;
//             $data['report'] = $report;
//             //var_dump($employee); exit();
//             $data['sales'] = $this->pm->sales_ddue_paypent_ddata($sdate,$edate);
//             }
//         else if ($report == 'monthlyReports')
//             {
//             $month = $_GET['month'];
//             $data['month'] = $month;
//             $year = $_GET['year'];
//             $data['year'] = $year;
//             //var_dump($data['month']); exit();
//             if($month == 01)
//                 {
//                 $name = 'January';
//                 }
//             elseif ($month == 02)
//                 {
//                 $name = 'February';
//                 }
//             elseif ($month == 03)
//                 {
//                 $name = 'March';
//                 }
//             elseif ($month == 04)
//                 {
//                 $name = 'April';
//                 }
//             elseif ($month == 05)
//                 {
//                 $name = 'May';
//                 }
//             elseif ($month == 06)
//                 {
//                 $name = 'June';
//                 }
//             elseif ($month == 07)
//                 {
//                 $name = 'July';
//                 }
//             elseif ($month == 8)
//                 {
//                 $name = 'August';
//                 }
//             elseif ($month == 9)
//                 {
//                 $name = 'September';
//                 }
//             elseif ($month == 10)
//                 {
//                 $name = 'October';
//                 }
//             elseif ($month == 11)
//                 {
//                 $name = 'November';
//                 }
//             else
//                 {
//                 $name = 'December';
//                 }
//             $data['name'] = $name;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->sales_mdue_paypent_ddata($month,$year);
//             }
//         else if ($report == 'yearlyReports')
//             {
//             $year = $_GET['ryear'];
//             $data['year'] = $year;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->sales_ydue_paypent_ddata($year);
//             }
//         }
//     else
//         {
//         $data['sales'] = $this->pm->sales_due_paypent_ddata();
//         }
    
//     $data['company'] = $this->pm->company_details();

//     $this->load->view('sale/sales_preport',$data);
// }

public function sales_payment_reports()
{
    $data['title'] = 'Due Payment Report';

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
            // Fetch sales data with pagination
            $data['sales'] = $this->pm->sales_ddue_paypent_ddata($sdate,$edate, $limit, $offset);
        }
        else if ($report == 'monthlyReports')
        {
            $month = $_GET['month'];
            $data['month'] = $month;
            $year = $_GET['year'];
            $data['year'] = $year;
            // Fetch sales data with pagination
            $data['sales'] = $this->pm->sales_mdue_paypent_ddata($month,$year, $limit, $offset);
        }
        else if ($report == 'yearlyReports')
        {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;
            // Fetch sales data with pagination
            $data['sales'] = $this->pm->sales_ydue_paypent_ddata($year, $limit, $offset);
        }
    }
    else
    {
        // Fetch sales data with pagination
        $data['sales'] = $this->pm->sales_due_paypent_ddata($limit, $offset);
    }

    $data['company'] = $this->pm->company_details();

    // Calculate total pages
    $total_sales = count($data['sales']);
    $total_pages = ceil($total_sales / $limit);

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

    $this->load->view('sale/sales_preport',$data);
}

// public function sales_vat_reports()
//     {
//     $data['title'] = 'Sales Report';

//     $data['company'] = $this->pm->company_details();

//     if(isset($_GET['search']))
//         {
//         $report = $_GET['reports'];
        
//         if($report == 'dailyReports')
//             {
//             $sdate = date("Y-m-d", strtotime($_GET['sdate']));
//             $edate = date("Y-m-d", strtotime($_GET['edate']));
//             $data['sdate'] = $sdate;
//             $data['edate'] = $edate;
//             $data['report'] = $report;
//             //var_dump($employee); exit();
//             $data['sales'] = $this->pm->get_sales_dvat_data($sdate,$edate);
//             }
//         else if ($report == 'monthlyReports')
//             {
//             $month = $_GET['month'];
//             $data['month'] = $month;
//             $year = $_GET['year'];
//             $data['year'] = $year;
//             //var_dump($data['month']); exit();
//             if($month == 01)
//                 {
//                 $name = 'January';
//                 }
//             elseif ($month == 02)
//                 {
//                 $name = 'February';
//                 }
//             elseif ($month == 03)
//                 {
//                 $name = 'March';
//                 }
//             elseif ($month == 04)
//                 {
//                 $name = 'April';
//                 }
//             elseif ($month == 05)
//                 {
//                 $name = 'May';
//                 }
//             elseif ($month == 06)
//                 {
//                 $name = 'June';
//                 }
//             elseif ($month == 07)
//                 {
//                 $name = 'July';
//                 }
//             elseif ($month == 8)
//                 {
//                 $name = 'August';
//                 }
//             elseif ($month == 9)
//                 {
//                 $name = 'September';
//                 }
//             elseif ($month == 10)
//                 {
//                 $name = 'October';
//                 }
//             elseif ($month == 11)
//                 {
//                 $name = 'November';
//                 }
//             else
//                 {
//                 $name = 'December';
//                 }
//             $data['name'] = $name;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->get_sales_mvat_data($month,$year);
//             }
//         else if ($report == 'yearlyReports')
//             {
//             $year = $_GET['ryear'];
//             $data['year'] = $year;
//             $data['report'] = $report;

//             $data['sales'] = $this->pm->get_sales_yvat_data($year);
//             }
//         }
//     else
//         {
//         $data['sales'] = $this->pm->get_sales_vat_data();
//         }

//     $this->load->view('sale/sales_vreports',$data);
// }

public function sales_vat_reports()
{
    $data['title'] = 'Sales Report';
    $data['company'] = $this->pm->company_details();

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
            $data['sales'] = $this->pm->get_sales_dvat_data($sdate, $edate, $offset, $limit);
        }
        elseif ($report == 'monthlyReports')
        {
            $month = $_GET['month'];
            $data['month'] = $month;
            $year = $_GET['year'];
            $data['year'] = $year;
            
            // Your month name logic here
            
            $data['name'] = $name;
            $data['report'] = $report;
            $data['sales'] = $this->pm->get_sales_mvat_data($month, $year, $offset, $limit);
        }
        elseif ($report == 'yearlyReports')
        {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;
            $data['sales'] = $this->pm->get_sales_yvat_data($year, $offset, $limit);
        }
    }
    else
    {
        $data['sales'] = $this->pm->get_sales_vat_data($offset, $limit);
    }

    // Count total sales for pagination
    $total_sales = count($this->pm->get_sales_vat_data());

    // Calculate total pages
    $total_pages = ceil($total_sales / $limit);

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

    $this->load->view('sale/sales_vreports', $data);
}

########### Pos Sales start ##################################

public function pos_sales_info()
  {
      unset($_SESSION['stockProducts']);
  $other = array(
    'limit' => 30
        );
  $where = array(
    'compid' => $_SESSION['compid']
        );
  $data = [
    'title'    => 'Pos Sales',
    'company' => $this->pm->company_details(),
    'products' => $this->pm->get_data('products',$where),
    'sum' => $this->pm->todays_sale(),
    'discount' => $this->pm->todays_discount(),
    'purchase' => $this->pm->todays_purchase(),
    'expense' => $this->pm->todays_expense(),
    'sproduct' => $this->pm->get_data('products',$where,false,false,$other)
        ];
        $date= date('y-m-d');
        // $data ['sum'] = $this->db->select('SUM(totalAmount) as total' )
        //                 ->from('sales')
        //                 ->where('regdate',$date)
        //                 ->get()
        //                 ->row();

  $this->load->view('sale/pos_sales',$data);
}

public function get_pos_sale_details($id)
  {
    $join = false;
    $other = false;
    $table = 'products';
    // $table = $this->input->post('table');
    // $id = $this->input->post('id');

  	if(isset($_SESSION['stockProducts'])){
		$tempStock= $_SESSION['stockProducts'];
		
		 if( in_array($id , $tempStock) )
		 {
			  echo json_encode(1);
			  
		 }
		 else{
			 array_push($tempStock,$id);
			 $this->session->set_userdata('stockProducts', $tempStock);
			 $this->get_pos_sale_detailsAjax($id,$table);
			 
		 }
	 }
	 else{
		 $tempStock=array($id);
		 $this->session->set_userdata('stockProducts', $tempStock);
		 $this->get_pos_sale_detailsAjax($id,$table);
		 
	 }
}

public function get_pos_sale_detailsAjax($id,$table)
  {
   	if ($table == "products") 
        {
        $where = array(
            'productcode' => $id,
            'totalPices >' => 0,
            'stock.compid' => $_SESSION['compid']
                );
        $join = array(
            'stock' => 'products.productID = stock.product'
                );
        $other = array(
            'join' => 'left'
                );
        }

    $products = $this->pm->get_data($table,$where,false,$join,$other);

  $str = '';
//   var_dump($products);exit();
  foreach($products as $value)
    {
    $id = $value['productID'];
    $tpq = $value['totalPices'];
    $str.="<tr>
      <td>".$value['productName']."<input type='hidden' name='productID[]' value='".$value['productID']."' required ><input type='hidden' id='productcode' value='".$value['productcode']."' required ></td>
      <td id='stock'>".$tpq."</td>
      <td><input type='text' class='form-control' onkeyup='getTotal(".$id.")' name='pices[]' id='quantity_".$value['productID']."' value='1' min='1' max='".$tpq."' required ></td>
      <td><input type='text' class='form-control' onkeyup='getTotal(".$id.")' name='salePrice[]' id='tp_".$value['productID']."' value='".$value['sprice']."' required ></td>
      <td><input type='text' class='form-control totalPrice'  name='tPrice[]' id='totalPrice_".$value['productID']."' value='".$value['sprice']."' required readonly ></td>
      <td><span class='item_remove btn btn-danger btn-sm' onclick='deleteProduct(this)' ><i class='fa fa-trash'> </i></span></td>
      </tr>";
    }
  //var_dump($str); exit();
  echo json_encode($str);
}

public function delete_session_data($productcode) {
    if(isset($_SESSION['stockProducts'])){
         $tempStock = $_SESSION['stockProducts'];
        if( in_array($productcode , $tempStock) )
    		 {
    		    $key=array_search($productcode, $tempStock);
    		    //print_r($key);die;
                if($key!==false)
                unset($tempStock[$key]);
                //$_SESSION["name"] = array_values($_SESSION["name"]);
                echo "ok";
    		 }
    }
}

public function save_pos_sale()
  {
  $info = $this->input->post();
  
   $query = $this->db->select('invoice_no')
                  ->from('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->limit(1)
                  ->order_by('saleID','DESC')
                  ->get()
                  ->row();
    if($query)
        {
        $sn = substr($query->invoice_no,7)+1;
        }
    else
        {
        $sn = 1;
        }
    
    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d", $sn);

    $cusid = 'INV-'.$cn.$pc;

   //var_dump($due); exit();
    $sale = array(
        'compid'         => $_SESSION['compid'],
        'invoice_no'     => $cusid,
        'saleDate'       => date('Y-m-d'),
        'customerID'     => $info['customerID'],
        'totalAmount'    => $info['nAmount'],
        'paidAmount'     => $info['totalprice'],
        'dueamount'      => $info['dAmount'],
        'discount'       => $info['discount'],           
        'discountType'   => $info['disType'],
        'discountAmount' => $info['disAmount'],
        'sCost'          => $info['sCost'],   
        'vCost'          => $info['vCost'],
        'vType'          => $info['vType'],           
        'vAmount'        => $info['vAmount'],
        'accountType'    => $info['accountType'],
        'accountNo'      => $info['accountNo'],
        'note'           => $info['note'],
        'status'         => 2,             
        'regby'          => $_SESSION['uid']
            );
            
  $sid = $this->pm->insert_data('sales',$sale);
  //var_dump($pid);exit();

  $pid = $info['productID'];
  //var_dump($prid);exit();
  $length = count($pid);
    //var_dump($length);exit();
  for ($i = 0; $i < $length; $i++)
    {
    $data = array(
      'saleID'     => $sid,
      'productID'  => $info['productID'][$i],                       
      'quantity'   => $info['pices'][$i],
      'sprice'     => $info['salePrice'][$i],
      'totalPrice' => $info['tPrice'][$i],
      'regby'      => $_SESSION['uid']
          );
    //var_dump($data);exit();
    $proid = $info['productID'][$i];

    $this->pm->insert_data('sale_product',$data);

    $pid = $info['productID'][$i];
    $aid = $_SESSION['compid'];

    $swhere = array(
        'product' => $pid,
        'compid' => $aid
                );

    $stpd = $this->pm->get_data('stock',$swhere);

    $this->pm->delete_data('stock',$swhere);

    if($stpd)
        {
        $tquantity = $stpd[0]['totalPices']-($info['pices'][$i]);
        }
    else{
        $tquantity = '-'.($info['pices'][$i]);
        }

    $stock_info = array(
        'compid'     => $_SESSION['compid'],
        'product'    => $info['productID'][$i],
        'totalPices' => $tquantity,
        'regby'      => $_SESSION['uid']
                );
    //var_dump($stock_info);    
    $result = $this->pm->insert_data('stock',$stock_info);  
    }
  if($result)
    {
    redirect('printPSale/'.$sid);
    }
  else
    {
    $sdata = [
      'exception' => '<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> something is error !</h4>
        </div>'
            ];
    
    $this->session->set_userdata($sdata);
    redirect('posSales');
    }
}


public function pos_sales_details($sid)
  {
  $pid = $sid;
  $data = [
    'title'   => 'Sales',
    'company' => $this->pm->company_details(),
    'sales'   => $this->pm->get_salesdata($pid),
    'salesp'  => $this->pm->get_sales_products_data($pid)
      ];
  
  //$this->load->view('sale/view_pos_sales',$data);
  $this->load->view('sale/pos_print_details',$data);
}
########### Pos Sales End   ##################################

public function getAllProductDetailsWithJSON(){
    $where = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );
    $section = $this->pm->get_data_products($where);
    echo json_encode($section);     
    // echo json_encode($products);
}
public function get_pos_sale_details_with_code($code){
     $products = $this->db->where('compid', $_SESSION['compid'])->where('productcode',$code)->get("products")->row();
     echo json_encode($products);
}

// public function sales_product_reports()
//   {
//   $data['title'] = 'Sales Product Report';
  
//   $data['product'] = $this->pm->get_data('products',false);
//   $data['company'] = $this->pm->company_details();

//   if(isset($_GET['search']))
//     {
//     $report = $_GET['reports'];
    
//     if($report == 'dailyReports')
//         {
//         $sdate = date("Y-m-d", strtotime($_GET['sdate']));
//         $edate = date("Y-m-d", strtotime($_GET['edate']));
//         $pid = $_GET['dproduct'];
//         $data['sdate'] = $sdate;
//         $data['edate'] = $edate;
//         $data['report'] = $report;
//         //var_dump($data); exit();
//         $data['sales'] = $this->pm->get_dsales_product_data($sdate,$edate,$pid);
//         }
//     else if ($report == 'monthlyReports')
//         {
//         $month = $_GET['month'];
//         $data['month'] = $month;
//         $year = $_GET['year'];
//         $data['year'] = $year;
//         //var_dump($data['month']); exit();
//         if($month == 01)
//             {
//             $name = 'January';
//             }
//         elseif ($month == 02)
//             {
//             $name = 'February';
//             }
//         elseif ($month == 03)
//             {
//             $name = 'March';
//             }
//         elseif ($month == 04)
//             {
//             $name = 'April';
//             }
//         elseif ($month == 05)
//             {
//             $name = 'May';
//             }
//         elseif ($month == 06)
//             {
//             $name = 'June';
//             }
//         elseif ($month == 07)
//             {
//             $name = 'July';
//             }
//         elseif ($month == 8)
//             {
//             $name = 'August';
//             }
//         elseif ($month == 9)
//             {
//             $name = 'September';
//             }
//         elseif ($month == 10)
//             {
//             $name = 'October';
//             }
//         elseif ($month == 11)
//             {
//             $name = 'November';
//             }
//         else
//             {
//             $name = 'December';
//             }
//         $data['name'] = $name;
//         $data['report'] = $report;
//         $pid = $_GET['mproduct'];

//         $data['sales'] = $this->pm->get_msales_product_data($month,$year,$pid);
//         }
//     else if ($report == 'yearlyReports')
//         {
//         $year = $_GET['ryear'];
//         $data['year'] = $year;
//         $data['report'] = $report;
//         $pid = $_GET['yproduct'];

//         $data['sales'] = $this->pm->get_ysales_product_data($year,$pid);
//         }
//     }
//   else
//     {
//     $data['sales'] = $this->pm->get_sales_product_data();
//     }

//     $this->load->view('sale/sales_product',$data);
// }

public function sales_product_reports()
{
    $data['title'] = 'Sales Product Report';
  
    $data['product'] = $this->pm->get_data('products', false);
    $data['company'] = $this->pm->company_details();

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    if (isset($_GET['search'])) {
        $report = $_GET['reports'];

        if ($report == 'dailyReports') {
            $sdate = date("Y-m-d", strtotime($_GET['sdate']));
            $edate = date("Y-m-d", strtotime($_GET['edate']));
            $pid = $_GET['dproduct'];
            $data['sdate'] = $sdate;
            $data['edate'] = $edate;
            $data['report'] = $report;
            $data['sales'] = $this->pm->get_dsales_product_data($sdate, $edate, $pid, $limit, $offset);
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
            $pid = $_GET['mproduct'];

            $data['sales'] = $this->pm->get_msales_product_data($month, $year, $pid, $limit, $offset);
        } else if ($report == 'yearlyReports') {
            $year = $_GET['ryear'];
            $data['year'] = $year;
            $data['report'] = $report;
            $pid = $_GET['yproduct'];

            $data['sales'] = $this->pm->get_ysales_product_data($year, $pid, $limit, $offset);
        }
    } else {
        $data['sales'] = $this->pm->get_sales_product_data($limit, $offset);
    }

    // Calculate total pages
    $total_sales = count($data['sales']);
    $total_pages = ceil($total_sales / $limit);

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

    $this->load->view('sale/sales_product', $data);
}

}