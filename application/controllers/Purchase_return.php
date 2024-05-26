<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_return extends CI_Controller {

public function __construct(){
    parent::__construct();
    $this->load->model("prime_model","pm");
    $this->checkPermission();
}

// public function purchase_return_list()
//     {
//     $data['title'] = 'Purchase Return';
    
//     $other = array(
//         'join' => 'left',
//         'order_by' => 'prid',
//         'suppliers.status' => 'Active'
//             );
//     $field = array(
//         'preturns' => 'preturns.*',
//         'suppliers' => 'suppliers.supplierName,suppliers.sup_id'
//             );
//     $join = array(
//         'suppliers' => 'suppliers.supplierID = preturns.customerID'
//             );
    
//     $where = array(
//         'preturns.compid' => $_SESSION['compid']
//             );

//     $data['return'] = $this->pm->get_data('preturns',$where,$field,$join,$other);

//     $this->load->view('purchase_return/purchase_returns',$data);
// }

public function purchase_return_list()
{
    $data['title'] = 'Purchase Return';

    $where = array(
        'preturns.compid' => $_SESSION['compid']
    );

    // Count total records
    $total_records = $this->pm->get_data('preturns', $where);

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    $total_pages = ceil(count($total_records) / $limit);

    // Fetch purchase return data with pagination
    $other = array(
        'join' => 'left',
        'order_by' => 'prid',
        'suppliers.status' => 'Active'
    );

    $field = array(
        'preturns' => 'preturns.*',
        'suppliers' => 'suppliers.supplierName, suppliers.sup_id'
    );

    $join = array(
        'suppliers' => 'suppliers.supplierID = preturns.customerID'
    );

    $data['return'] = $this->pm->get_data('preturns', $where, $field, $join, $other, $limit, $offset);

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

    $this->load->view('purchase_return/purchase_returns', $data);
}

public function new_purchase_return()
    {
    $data['title'] = 'Purchase Return';
    
    $where = array(
        'compid' => $_SESSION['compid']
            );
    $cwhere = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );
            
    $data['customer'] = $this->pm->get_data('suppliers',$cwhere);
    $data['product'] = $this->pm->get_data('products',$where);

    $this->load->view('purchase_return/new_preturn',$data);
}

public function getDetails()
    {
    $join = false;
    $other = false;
    $table = $this->input->post('table');
    $id = $this->input->post('id');
 
    if($table == "products")
        {
        $where = array('productID' => $id);
        }

    $products = $this->pm->get_data($table,$where,false,$join,$other);
    $str='';
    foreach($products as $value){
        $id=$value['productID'];
        $str.="<tr>
        <td>".$value['productName']." ( ".$value['productcode']." )"."<input type='hidden' name='productID[]' value='".$value['productID']."'>
        </td>
        <td><input type='text' onkeyup='totalPrice(".$id.")' name='pices[]' id='pices_".$value['productID']."' value='0'>
        </td>
        <td><input type='text' onkeyup='totalPrice(".$id.")' name='salePrice[]' id='salePrice_".$value['productID']."' value='".$value['sprice']."'>
        </td>
        <td><input type='text' class='totalPrice' name='totalPrice[]' readonly id='totalPrice_".$value['productID']."' value='0'>
        </td>
        <td><input type='button' class='btn btn-danger' value='Remove' onClick='$(this).parent().parent().remove();''></td>
        </tr>";
        }
    echo json_encode($str);
}

public function returns_by_purchase_invoice()
    {
    $id = $this->input->post('prid');
    
    $where = array(
        'challanNo' => $id
            );
    $sales = $this->pm->get_data('purchase',$where);
    
    if($sales)
        {
    $data['returns'] = $sales[0];
    
    $data['title'] = 'Returns';

    $cwhere = array(
        'compid' => $_SESSION['compid']
            );  
    $spwhere = array(
        'compid' => $_SESSION['compid'],
        'status' => 'Active'
            );  

    $data['customer'] = $this->pm->get_data('suppliers',$spwhere);
    $data['product'] = $this->pm->get_data('products',$cwhere);
    
    $pwhere = array(
        'purchaseID' => $sales[0]['purchaseID']
            );

    $field = array(
        'purchase_product' => 'purchase_product.*',
        'products' => 'products.productName,products.productcode'
            );
    $join = array(
        'products' => 'products.productID = purchase_product.productID'
            );
    $other = array(
        'join'=>'left'
            );
    $data['rproduct'] = $this->pm->get_data('purchase_product',$pwhere,$field,$join,$other);

    $this->load->view('purchase_return/edit_preturn',$data);
        }
    else
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> This Invoice ID does not exist !</h4>
            </div>'
                ];
        $this->session->set_userdata($sdata);
        redirect('newpReturn');
        }
}

public function save_preturns()
    {
    $info = $this->input->post();

    $query = $this->db->select('prid')
                  ->from('preturns')
                  ->limit(1)
                  ->order_by('prid','DESC')
                  ->get()
                  ->row();
    if($query)
        {
        $sn = $query->prid+1;
        }
    else
        {
        $sn = 1;
        }

    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d", $sn);

    $cusid = 'PR-'.$cn.$pc;

    $data = array(
        'prDate'     => date('Y-m-d',strtotime($info['date'])),
        'compid'     => $_SESSION['compid'],
        'prCode'     => $cusid,
        'customerID' => $info['customer'],
        'challanNo'  => $info['invoice'],
        'totalPrice' => $info['totalprice'],
        'paidPrice'  => $info['totalprice'],
        'accountType'=> $info['accountType'],
        'accountNo'  => $info['accountNo'], 
        'note'       => $info['note'],          
        'regby'      => $_SESSION['uid']
            );
    //var_dump($sale); exit();
    
    $result = $this->pm->insert_data('preturns',$data);
       
    $length = count($info['productID']);

    for ($i = 0;$i < $length;$i++)
        {
        $rpdata = array(
            'prid'     => $result,
            'product'  => $info['productID'][$i],
            'quantity' => $info['pices'][$i],
            'pPrice'   => $info['salePrice'][$i],
            'tPrice'   => $info['totalPrice'][$i],
            'regby'    => $_SESSION['uid']
                );

        $result2 = $this->pm->insert_data('preturns_product',$rpdata);

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
            // $dtqnt = $stpd[0]['dtquantity'];
            }
        else{
            $tquantity = '-'.$info['pices'][$i];
            $dtqnt = 0;
            }

        $stock_info = array(
            'compid'     => $_SESSION['compid'],
            'product'    => $info['productID'][$i],
            'totalPices' => $tquantity,
            // 'dtquantity' => $dtqnt,
            'regby'      => $_SESSION['uid']
                    );
        //var_dump($stock_info);    
        $this->pm->insert_data('stock',$stock_info); 
        }
        
    if($result && $result2)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Purchase Returns add Successfully !</h4>
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
    redirect('pReturn');
}

public function view_purchase_return($id)
    {
    $data['title'] = 'Return View';

    $other = array(
        'join' => 'left'
            );
    $where = array(
        'prid' => $id
            );
    $field = array(
        'preturns' => 'preturns.*',
        'suppliers' => 'suppliers.*'
            );
    $join = array(
        'suppliers' => 'suppliers.supplierID = preturns.customerID'
            );

    $returns = $this->pm->get_data('preturns',$where,$field,$join,$other);
    $data['returns'] = $returns[0];

    $rfield = array(
        'preturns_product' => 'preturns_product.*',
        'products' => 'products.productName,products.productcode'
            );
    $rjoin = array(
        'products' => 'products.productID = preturns_product.product',
            );

    $data['rproduct']=$this->pm->get_data('preturns_product',$where,$rfield,$rjoin,$other);
    $data['company'] = $this->pm->company_details();

    $this->load->view('purchase_return/view_preturns',$data);
}

public function edit_purchase_return($id)
    {
    $data['title'] = 'Returns';

    $cwhere = array(
        'compid' => $_SESSION['compid']
            );  

    $data['customer'] = $this->pm->get_data('suppliers',$cwhere);
    $data['product'] = $this->pm->get_data('products',$cwhere);

    $where = array(
        'prid' => $id
            );
    $sales = $this->pm->get_data('preturns',$where);
    $data['returns'] = $sales[0];

    $field = array(
        'preturns_product' => 'preturns_product.*',
        'products' => 'products.productName,products.productcode'
            );
    $join = array(
        'products' => 'products.productID = preturns_product.product',
            );
    $other = array(
        'join'=>'left'
            );
    $data['rproduct'] = $this->pm->get_data('preturns_product',$where,$field,$join,$other);

    $this->load->view('purchase_return/edit_preturn',$data);
}

public function update_preturns()
  {
  $info = $this->input->post();

  $sale = array(
    'prDate'      => date('Y-m-d',strtotime($info['date'])),
    'customerID'  => $info['customer'],
    'challanNo'   => $info['invoice'],
    'totalPrice'  => $info['totalprice'],
    'paidPrice'   => $info['totalprice'],
    'accountType' => $info['accountType'],
    'accountNo'   => $info['accountNo'], 
    'note'        => $info['note'],            
    'upby'        => $_SESSION['uid']
          );
    //var_dump($sale); exit();
  $where = array(
    'prid' => $info['prid']
        );

  $result = $this->pm->update_data('preturns',$sale,$where);

  $pp = $this->pm->get_data('preturns_product',$where);
  $this->pm->delete_data('preturns_product',$where);
  
  $lnth = count($pp);

  for($i = 0; $i < $lnth; $i++)
    {
    $swhere = array(
      'product' => $pp[$i]['product']
            );

    $spd = $this->pm->get_data('stock',$swhere);
    $this->pm->delete_data('stock',$swhere);
        
    if($spd)
      {
      if($pp)
        {
        $tquantity = ($spd[0]['totalPices']-$pp[$i]['quantity']);
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

    $stockinfo = array(
      'compid'     => $_SESSION['compid'],
      'product'    => $pp[$i]['product'],
      'totalPices' => $tquantity,
    //   'dtquantity' => $dtqnt,
      'regby'      => $_SESSION['uid']
              );
        //var_dump($stock_info);    
    $this->pm->insert_data('stock',$stockinfo); 
    }

  $length = count($info['productID']);
        //var_dump($length); exit();
  for($i = 0;$i < $length;$i++)
    {
    $return_product = array(
      'prid'     => $info['prid'],
      'product'  => $info['productID'][$i],
      'quantity' => $info['pices'][$i],
      'pPrice'   => $info['salePrice'][$i],
      'tPrice'   => $info['totalPrice'][$i],
      'regby'    => $_SESSION['uid']
            );

    $rp_id = $this->pm->insert_data('preturns_product',$return_product);

    $pid = $info['productID'][$i];
    $aid = $_SESSION['compid'];

    $swhere = array(
      'product' => $pid
              );

    $stpd = $this->pm->get_data('stock',$swhere);
    $this->pm->delete_data('stock',$swhere);

    if($stpd)
      {
      $tquantity = $stpd[0]['totalPices']-$info['pices'][$i];
    //   $dtqnt = $stpd[0]['dtquantity'];
      }
    else
      {
      $tquantity = '-'.$info['pices'][$i];
    //   $dtqnt = 0;
      }

    $stock_info = array(
      'compid'     => $_SESSION['compid'],
      'product'    => $info['productID'][$i],
      'totalPices' => $tquantity,
    //   'dtquantity' => $dtqnt,
      'regby'      => $_SESSION['uid']
              );
        //var_dump($stock_info);    
    $this->pm->insert_data('stock',$stock_info); 
    }
    
  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
      <h4><i class="icon fa fa-check"></i> Purchase Returns update Successfully !</h4></div>'
            ];  
    }
  else
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
      <h4><i class="icon fa fa-ban"></i> Failed !</h4></div>'
            ];
    }
  $this->session->set_userdata($sdata);
  redirect('pReturn');
}

public function delete_preturns($id)
    {
    $where = array(
        'prid' => $id
            );

    $result = $this->pm->delete_data('preturns',$where);
    $pproduct = $this->pm->get_data('preturns_product',$where);
    $result2 = $this->pm->delete_data('preturns_product',$where);
    
    $length = count($pproduct);

  for($i = 0; $i < $length; $i++)
    {
    $swhere = array(
      'product' => $pproduct[$i]['product']
            );

    $spd = $this->pm->get_data('stock',$swhere);
    
    $this->pm->delete_data('stock',$swhere);
        
    if($spd)
      {
      if($pproduct)
        {
        $tquantity = ($spd[0]['totalPices']+$pproduct[$i]['quantity']);
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
      'compid'  => $_SESSION['compid'],
      'product' => $pproduct[$i]['product'],
      'totalPices' => $tquantity,
    //   'dtquantity' => $dtqnt,
      'regby'   => $_SESSION['uid']
              );
        //var_dump($stock_info);    
    $this->pm->insert_data('stock',$stock_info); 
    }
    
    if($result && $result2)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-check"></i> purchase Returns delete Successfully !</h4>
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
    redirect('pReturn');
}

}