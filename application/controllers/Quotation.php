<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Quotation extends CI_Controller {

public function __construct()
  {
  parent::__construct();
  $this->load->model("prime_model","pm");
  $this->checkPermission();
}

// public function index()
//   {
//   $data['title'] = 'Quotation';

//   $where = array(
//     'quotation.compid' => $_SESSION['compid']
//         );
//   $other = array(
//     'order_by' => 'qutid',
//     'join' => 'left'
//         );
//   $field = array(
//     'quotation' => 'quotation.*',
//     'customers' => 'customers.*'
//         );
//   $join = array(
//     'customers' => 'customers.customerID = quotation.customerID'
//         );

//   $data['quotation'] = $this->pm->get_data('quotation',$where,$field,$join,$other);
//   //var_dump($data['purchase']); exit();
//   $this->load->view('quotation/quotationlist',$data);
// }

public function index()
{
    $data['title'] = 'Quotation';

    $where = array(
        'quotation.compid' => $_SESSION['compid']
    );

    // Count total records
    $total_records = $this->pm->get_data('quotation', $where);

    // Pagination variables
    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    $total_pages = ceil(count($total_records) / $limit);

    // Fetch quotation data with pagination
    $other = array(
        'order_by' => 'qutid',
        'join' => 'left'
    );

    $field = array(
        'quotation' => 'quotation.*',
        'customers' => 'customers.*'
    );

    $join = array(
        'customers' => 'customers.customerID = quotation.customerID'
    );

    $data['quotation'] = $this->pm->get_data('quotation', $where, $field, $join, $other, $limit, $offset);

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

    $this->load->view('quotation/quotationlist', $data);
}

public function new_quotation() 
  {
  $data['title'] = 'Quotation';

  $where = array(
    'compid' => $_SESSION['compid']
        );

  $data['product'] = $this->pm->get_data('products',$where);

  $this->load->view('quotation/newQuotation',$data);
}

public function getProduct($id)
  {
  $where = array(
    'productID' => $id
        );

  $productlist = $this->pm->get_data('products',$where);

  $str = "";
  foreach ($productlist as $value)
    {
    $id = $value['productID'];
    $str .= "<tr>
    <td>".$value['productName']."<input type='hidden' readonly='readonly' name='product_id[]' value='".$value['productID']."'></td>
    <td><input type='text' class='form-control' id='quantity_".$value['productID']."' onkeyup='getTotal(".$id.")' name='quantity[]' value='00'></td>
    <td><input type='text' class='form-control' onkeyup='getTotal(".$id.")' id='tp_".$value['productID']."' name='tp[]' value='".$value['sprice']."'></td>
    <td>
    <input readonly='readonly' class='form-control' type='text' id='totalPrice_".$value['productID']."' name='total_price[]' value='0.00' readonly>
    </td><td>
    <span class='item_remove btn btn-danger btn-xs' onclick='deleteProduct(this)'>x</span>
    </td></tr>";
    }
  echo json_encode($str);
}

public function save_quotation()
  {
  $info = $this->input->post();

    $config['upload_path'] = './upload/quotation/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|doc|pdf|DOC|PDF';
    $config['max_size'] = 0;
    $config['max_width'] = 0;
    $config['max_height'] = 0;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
    if ($this->upload->do_upload('userfile'))
        {
        $file = $this->upload->data('file_name');
        }
    else
        {
        $file = '';
        }

  $query = $this->db->select('qinvoice')
                ->from('quotation')
                ->where('compid',$_SESSION['compid'])
                ->limit(1)
                ->order_by('qinvoice','DESC')
                ->get()
                ->row();
  if($query)
    {
    $sn = substr($query->qinvoice,5)+1;
    }
  else
    {
    $sn = 1;
    }

  $cn = strtoupper(substr($_SESSION['compname'],0,3));
  $pc = sprintf("%'05d",$sn);

  $cusid = 'Q-'.$cn.$pc;

  $quotation = array(
    'compid'        => $_SESSION['compid'],
    'qinvoice'      => $cusid,
    'quotationDate' => date('Y-m-d',strtotime($info['date'])),
    'customerID'    => $info['customerID'],
    'totalPrice'    => $info['totalPrice'],
    'totalQuantity' => array_sum($info['quantity']),
    'message'       => $info['message'],
    'terms'         => $info['terms'],
    'note'          => $info['note'],
    'file'          => $file,
    'regby'         => $_SESSION['uid']
        );
      //var_dump($quotation); exit();
  $result = $this->pm->insert_data('quotation',$quotation);
        //var_dump($purchase_id); exit();

  if($result)
    {
    $length = count($info['product_id']);
    
    for ($i = 0; $i < $length; $i++)
      {
      $qdata = array(
        'qutid'      => $result,
        'productID'  => $info['product_id'][$i],
        'salePrice'  => $info['tp'][$i],
        'quantity'   => $info['quantity'][$i],                 
        'totalPrice' => $info['total_price'][$i],
        'regby'      => $_SESSION['uid']
            );
      //var_dump($purchase_product);            
      $result2 = $this->pm->insert_data('quotation_product',$qdata);
      }
    }
  if($result2)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Quotation add Successfully !</h4>
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
  redirect('Quotation');
}

public function view_quotation($id)
  {
  $data['title'] = 'Quotation';

  $where = array(
    'qutid' => $id
        );
  $join = array(
    'products' => 'products.productID = quotation_product.productID'
        );
  $data['pquotation'] = $this->pm->get_data('quotation_product',$where,false,$join);
  
  $field = array(
    'quotation' => 'quotation.*',
    'customers'=>'customers.*'
        );

  $join = array(
    'customers' => 'customers.customerID = quotation.customerID'
        );
  $quotation = $this->pm->get_data('quotation',$where,$field,$join);
  $data['quotation'] = $quotation[0];    
  
  $data['company'] = $this->pm->company_details();
  
  $this->load->view('quotation/viewquotation',$data);
}

public function edit_quotation($id)
  {
  $data['title'] = 'Quotation';

  $cwhere = array(
    'compid' => $_SESSION['compid'],
    'status' => 'Active'
        );
  $data['customer'] = $this->pm->get_data('customers',$cwhere);
  $data['product'] = $this->pm->get_data('products',$cwhere);

  $where = array(
    'qutid' => $id
        );
  $join = array(
    'products' => 'products.productID = quotation_product.productID'
        );
  $data['pquotation'] = $this->pm->get_data('quotation_product',$where,false,$join);

  $quotation = $this->pm->get_data('quotation',$where);
  $data['quotation'] = $quotation[0];    
  
  $this->load->view('quotation/editquotation',$data);
}

public function update_Quotation()
  {

  
    $info = $this->input->post();
  
    $config['upload_path'] = './upload/quotation/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|doc|pdf|DOC|PDF';
    $config['max_size'] = 0;
    $config['max_width'] = 0;
    $config['max_height'] = 0;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
    
    if ($this->upload->do_upload('userfile')) {
        $file = $this->upload->data('file_name');
    } else {
      
        $pimg = $this->db->select('file')->from('quotation')->where('qutid', $info['qutid'])->get()->row();
        if ($pimg) {
            $file = $pimg->file;
        } else {
            $file = '';
        }
    }  

  $quotation = array(
        'compid' => $_SESSION['compid'],
        'quotationDate' => date('Y-m-d', strtotime($info['date'])),
        'customerID' => $info['customer'],
        'totalPrice' => $info['totalPrice'],
        'totalQuantity' => array_sum($info['quantity']),
        'message' => $info['message'],
        'terms' => $info['terms'],
        'note' => $info['note'],
        'file' => $file, // Update the 'file' field with the new or existing file name
        'upby' => $_SESSION['uid']
    );

   $where = array('qutid' => $info['qutid']);
    $result = $this->pm->update_data('quotation', $quotation, $where);

  $this->pm->delete_data('quotation_product',$where);
  
  $length = count($this->input->post('product_id'));

  for($i = 0; $i < $length; $i++)
    {
    $quotation_product = array(
      'qutid'      => $info['qutid'],
      'productID'  => $info['product_id'][$i],
      'salePrice'  => $info['tp'][$i],
      'quantity'   => $info['quantity'][$i],                 
      'totalPrice' => $info['total_price'][$i],
      'regby'      => $_SESSION['uid']
          );
    //var_dump($quotation_product); exit();
    $result2 = $this->pm->insert_data('quotation_product',$quotation_product);
    }
  if($result && $result2)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Quotation updated Successfully !</h4>
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
  redirect('Quotation');
}

public function delete_quotation($id)
  {
  $where = array(
      'qutid' => $id
          );

  $result = $this->pm->delete_data('quotation',$where);
  $result2 = $this->pm->delete_data('quotation_product',$where);
  
  if($result && $result2)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Quotation delete Successfully !</h4>
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
  redirect('Quotation');
}





}