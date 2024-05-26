<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

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

// public function index()
//     {
//     $data['title'] = 'Product'; 

//     $where = array(
//        'products.compid' => $_SESSION['compid']  
//             );
//     $swhere = array(
//        'compid' => $_SESSION['compid']  
//             );
//     $other = array(
//        'group_by' => 'products.productID',
//        'order_by' => 'productID',
//        'join'     => 'left' 
//             );
//     $field = array(
//         'products'  => 'any_value(products.productID) as productID,any_value(products.productcode) as productcode,any_value(products.image) as image,any_value(products.productName) as productName,any_value(products.pprice) as pprice,any_value(products.sprice) as sprice,any_value(products.alertqty) as alertqty',
//         'purchase_product'  => '(sum(purchase_product.pprice)/ count(purchase_product.pp_id)) as avg_purchase',
//         'categories' => 'any_value(categories.categoryName) as categoryName',
//         'sma_units'  => 'any_value(sma_units.unitName) as unitName'
//             );
//     $join = array(
//         'categories' => 'categories.categoryID = products.categoryID',
//         'sma_units'  => 'sma_units.id = products.unit',
//         'purchase_product'  => 'purchase_product.productID	 = products.productID',

//             );

//     // $data['product'] = $this->pm->get_data('products',$where,$field,$join,$other);

//     $page = isset($_GET['page']) ? $_GET['page'] : 1;
//     $limit = 10; // Number of items per page
//     $offset = ($page - 1) * $limit;
//     $data['product'] = $this->pm->get_data('products', $where, $field, $join, $other, $limit, $offset);

//     // $data['service'] = $this->pm->get_data_service();
//     $data['service'] = [];

//     $uwhere = array(
//         'status' => 'Active',
//         'compid' => $_SESSION['compid']  
//             );

//     $data['category'] = $this->pm->get_data('categories',$uwhere);
//     $data['brands'] = $this->pm->get_data('brands',$uwhere);
//     $data['unit'] = $this->pm->get_data('sma_units',$uwhere);
    
//     $this->load->view('products/product', $data);
// }

public function index()
{
    $data['title'] = 'Product'; 

    $where = array(
        'products.compid' => $_SESSION['compid']  
    );

    $swhere = array(
        'compid' => $_SESSION['compid']  
    );

    $other = array(
        'group_by' => 'products.productID',
        'order_by' => 'productID',
        'join'     => 'left' 
    );

    $field = array(
        'products'  => 'any_value(products.productID) as productID,any_value(products.productcode) as productcode,any_value(products.image) as image,any_value(products.productName) as productName,any_value(products.pprice) as pprice,any_value(products.sprice) as sprice,any_value(products.alertqty) as alertqty',
        'purchase_product'  => '(sum(purchase_product.pprice)/ count(purchase_product.pp_id)) as avg_purchase',
        'categories' => 'any_value(categories.categoryName) as categoryName',
        'sma_units'  => 'any_value(sma_units.unitName) as unitName'
    );

    $join = array(
        'categories' => 'categories.categoryID = products.categoryID',
        'sma_units'  => 'sma_units.id = products.unit',
        'purchase_product'  => 'purchase_product.productID	 = products.productID'
    );

    $limit = 25; // Number of items per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Fetch products data
    $data['product'] = $this->pm->get_data('products', $where, $field, $join, $other, $limit, $offset);

    // Fetch total number of records
    $total_records = $this->pm->get_data('products', $where);

    // Calculate total number of pages
    $total_pages = ceil(count($total_records) / $limit);

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

    // Load other necessary data
    $data['service'] = [];
    $uwhere = array(
        'status' => 'Active',
        'compid' => $_SESSION['compid']  
    );

    $data['category'] = $this->pm->get_data('categories', $uwhere);
    $data['brands'] = $this->pm->get_data('brands', $uwhere);
    $data['unit'] = $this->pm->get_data('sma_units', $uwhere);

    // Pass pagination HTML and other data to the view
    $data['pagination_html'] = $pagination_html;

    $this->load->view('products/product', $data);
}

public function get_subcategory_data()
  {
  $section = $this->pm->get_subcategory_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function save_product()
    {
    $info = $this->input->post();
   // var_dump($info); exit();
   if($info["item_type"]=='Product'){
    $config['upload_path'] = './upload/product/';
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

    if($info['categoryID'] == 'newCategory')
        {
        $cdata = [
            'compid'       => $_SESSION['compid'],
            'categoryName' => $info['newCategory'],
            'regby'        => $_SESSION['uid']
                ];
           
        $catdata = $this->pm->insert_data('categories',$cdata);

        $catid = $catdata;
        }
    else
        {
        $catid = $info['categoryID'];
        }

    if($info['units'] == 'newUnit')
        {
        $udata = [
            'compid'   => $_SESSION['compid'],
            'unitName' => $info['newUnit'],
            'regby'    => $_SESSION['uid']
                ];
       
        $utdata = $this->pm->insert_data('sma_units',$udata);

        $utid = $utdata;
        }
    else
        {
        $utid = $info['units'];
        }

    $query = $this->db->select('productID')
                  ->from('products')
                  ->where('compid',$_SESSION['compid'])
                  ->limit(1)
                  ->order_by('productID','DESC')
                  ->get()
                  ->row();
    if($query)
        {
        $sn = $query->productID;
        }
    else
        {
        $sn = 1;
        }

    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d",$sn);

    $cusid = 'P-'.$cn.$pc;
    //var_dump($cusid); exit();
    $info = [
        'compid'      => $_SESSION['compid'],
        'productcode' => $cusid,
        'productName' => $info['productName'],
        'categoryID'  => $catid,
        'scategory'   => $info['scategory'],
        'brand'       => $info['brand'],
        'unit'        => $utid,
        'pprice'      => $info['pprice'],
        'sprice'      => $info['sprice'],
        // 'wprice'      => $info['wprice'],
        'details'     => $info['details'],
        'alertqty'    => $info['alertqty'],
        'specifict'   => $info['specification'],
        'image'       => $img,
        'spstatus'    => $info['spstatus'],
        'regby'       => $_SESSION['uid'],
        'type'        => 'product'
            ];
    // var_dump($info); exit();
       
    $result = $this->pm->insert_data('products',$info);
    $log = [
        'activity' => 'Product is added ('.$info['productName'].')',
        'user_id'       => $_SESSION['uid'],
        'compid'       => $_SESSION['compid'],
                  ];
      $this->pm->insert_data('activity_logs',$log);

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Product add Successfully !</h4>
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
    redirect('Product');
   }
   if($info["item_type"]=='Service'){

    $config['upload_path'] = './upload/product/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG';
    $config['max_size'] = 0;
    $config['max_width'] = 0;
    $config['max_height'] = 0;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('units_service'))
        {
        $img = $this->upload->data('file_name');
        }
    else
        {
        $img = '';
        }

    if($info['category'] == 'newCategory')
        {
        $cdata = [
            'compid'       => $_SESSION['compid'],
            'categoryName' => $info['newCategory'],
            'regby'        => $_SESSION['uid']
                ];
           
        $catdata = $this->pm->insert_data('categories',$cdata);

        $catid = $catdata;
        }
    else
        {
        $catid = $info['category'];
        }

    if($info['units_service'] == 'newUnit')
        {
        $udata = [
            'compid'   => $_SESSION['compid'],
            'unitName' => $info['newUnit'],
            'regby'    => $_SESSION['uid']
                ];
       
        $utdata = $this->pm->insert_data('units_service',$udata);

        $utid = $utdata;
        }
    else
        {
        $utid = $info['units_service'];
        }
       
      $query = $this->db->select('siid')
                    ->from('service_info')
                    ->limit(1)
                    ->order_by('siid','DESC')
                    ->get()
                    ->row();
      if($query)
        {
        $sn = $query->siid+1;
        }
      else
        {
        $sn = 1;
        }
    
      $cn = strtoupper(substr($_SESSION['compname'],0,3));
      $pc = sprintf("%'05d",$sn);
    
      $cusid = 'S-'.$cn.$pc;
    
      $service = array(
        'compid'    => $_SESSION['compid'],
        'productcode'    => $cusid,
        'productName'    => $info['sName'],
        'sprice'   => $info['sPrice'],
        'categoryID'  => $catid,
        'unit'        => $utid,
        'image'       => $img,
        'details' => $info['sDetails'],
        'regby'     => $_SESSION['uid'],
        'type'     => 'service'

            );
          //var_dump($quotation); exit();
      $result = $this->pm->insert_data('products',$service);
            //var_dump($purchase_id); exit();
      
      if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i> Service added Successfully !</h4>
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
      redirect('Product');
   }
}

public function view_product($id)
    {
    $data['title'] = 'Product'; 

    $where = array(
       'products.productID' => $id  
            );
    $other = array(
       'join' => 'left' 
            );
    $field = array(
        'products'  => 'products.*',
        'purchase_product'  => '(sum(purchase_product.pprice)/ count(purchase_product.pp_id)) as avg_purchase',
        'categories' => 'categories.categoryName',
        'sma_units'  => 'sma_units.unitName'
            );
    $join = array(
        'categories' => 'categories.categoryID = products.categoryID',
        'sma_units'  => 'sma_units.id = products.unit',
        'purchase_product'  => 'purchase_product.productID	 = products.productID',
            );

    $data['product'] = $product = $this->pm->get_data('products',$where,$field,$join,$other);
    $data['product'] = $product[0];

    $this->load->view('products/productView',$data);
}

public function edit_products($id)
    {
    $data['title'] = 'Product';

    $where = array(
        'status' => 'Active',
        'compid' => $_SESSION['compid']
            );

    $data['category'] = $this->pm->get_data('categories',$where);
    $data['brand'] = $this->pm->get_data('brands',false);
    $data['subcategory'] = $this->pm->get_data('sub_category');
    $data['unit'] = $this->pm->get_sma_units_data();

    $pwhere = array(
        'productID' => $id
            );

    $product = $this->pm->get_data('products',$pwhere);
    $data['product'] = $product[0];
    //var_dump($data['unit']);
    $this->load->view('products/edit_product',$data);
}

public function update_product()
    {
    $info = $this->input->post();
    $pid = $info['productid'];
    //var_dump($pid); exit();
    $config['upload_path'] = './upload/product/';
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
        $pimg = $this->db->select('image')->from('products')->where('productID',$pid)->get()->row();
        if($pimg)
            {
            $img = $pimg->image;
            }
        else
            {
            $img = '';
            }
        }  

    $info = [
        'productName'=> $info['productName'],
        'categoryID' => $info['categoryID'],
        'scategory'  => $info['scategory'],
        'brand'      => $info['brand'],
        'unit'       => $info['units'],
        'pprice'     => $info['pprice'],
        'sprice'     => $info['sprice'],
        // 'wprice'     => $info['wprice'],
        'details'    => $info['details'],
        'alertqty'   => $info['alertqty'],
        'specifict'  => $info['specification'],
        'image'      => $img,
        'spstatus'   => $info['spstatus'],
        'upby'       => $_SESSION['uid']
            ];
    //var_dump($info); exit();
    $where = array(
        'productID' => $pid
            );
    //var_dump($where); exit();
    $result = $this->pm->update_data('products',$info,$where);
    $log = [
        'activity' => 'Product is updated ('.$info['productName'].')',
        'user_id'       => $_SESSION['uid'],
        'compid'       => $_SESSION['compid'],
                  ];
      $this->pm->insert_data('activity_logs',$log);
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Product updated Successfully !</h4>
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
    redirect('Product');
}


public function update_service()
    {
    $info = $this->input->post();
    $pid = $info['productid'];
    //var_dump($pid); exit();
    $config['upload_path'] = './upload/product/';
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
        $pimg = $this->db->select('image')->from('products')->where('productID',$pid)->get()->row();
        if($pimg)
            {
            $img = $pimg->image;
            }
        else
            {
            $img = '';
            }
        }  

    $info = [
        'productName'=> $info['productName'],
        'categoryID' => $info['categoryID'],
        // 'scategory'  => $info['scategory'],
        // 'brand'      => $info['brand'],
        'unit'       => $info['units'],
        // 'pprice'     => $info['pprice'],
        'sprice'     => $info['sprice'],
        // 'wprice'     => $info['wprice'],
        'details'    => $info['details'],
        // 'alertqty'   => $info['alertqty'],
        'specifict'  => $info['specification'],
        'image'      => $img,
        // 'spstatus'   => $info['spstatus'],
        'upby'       => $_SESSION['uid']
            ];
    //var_dump($info); exit();
    $where = array(
        'productID' => $pid
            );
    //var_dump($where); exit();
    $result = $this->pm->update_data('products',$info,$where);
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Service updated Successfully !</h4>
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
    redirect('Product');
}

public function delete_products($pid)
    {
    $pswhere = array(
        'product' => $pid,
        'totalPices >' => 0
            );
    $prname = $this->db->select('productName')
                        ->from('products')
                        ->where('productID', $pid)
                        ->get()
                        ->row();
    $stock = $this->pm->get_data('stock',$pswhere);
    if($stock)
      {
      $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> You can not delete this Product. This product has Stock!</h4>
            </div>'
                ];
      }
    else
      {
      $where = array(
        'productID' => $pid
            );
    //var_dump($where); exit();
    $result = $this->pm->delete_data('products',$where);
    $swhere = array(
        'product' => $pid
            );
    $this->pm->delete_data('stock',$swhere);
    if($result)
        {
        $log = [
            'activity' => 'Product is deleted ('.$prname->productName.')',
            'compid'       => $_SESSION['compid'],
            'user_id'       => $_SESSION['uid']
                        ];
            $this->pm->insert_data('activity_logs',$log);
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-check"></i> '.$prname->productName.' - Delete Successfully !</h4>
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
    redirect('Product');
}

public function product_reports()
    {
    $data['title'] = 'Stock Report'; 

    $other = array(
        'group_by' => 'products.productID',
        'join' => 'left'         
            );
    $where = array(
       'stock.compid' => $_SESSION['compid']    
            );
    $field = array(
        'stock' => 'any_value(stock.stockID) as stockID,any_value(stock.compid) as compid,any_value(stock.totalPices) as totalPices,any_value(stock.regby) as regby,any_value(stock.regdate) as regdate,any_value(stock.upby) as upby,any_value(stock.update) as update,any_value(stock.product) as product',
        'products' => 'any_value(products.productName) as productName,any_value(products.productcode) as productcode,any_value(products.pprice) as pprice',
        'purchase_product'  => '(sum(purchase_product.pprice)/ count(purchase_product.pp_id)) as avg_purchase',
        
            );
    $join = array(
        'products' => 'products.productID = stock.product',
        'purchase_product'  => 'purchase_product.productID	 = products.productID',

            );

    //$data['stock'] = $this->pm->get_data('stock',$where,$field,$join,$other);
    $data['stock'] = $this->pm->get_stock_product();
    $data['service'] = $this->pm->get_data('service_info');
    // echo "<pre>";
    // print_r($data['service']);
    // die();
    $data['company'] = $this->pm->company_details();
    //var_dump($data['products']); exit();
    $this->load->view('products/product_report',$data);
}

public function save_product_store()
    {
    $info = $this->input->post();

    if($info['quantity']<0){
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> Quantity cannot be less than 0 </h4>
            </div>'
                ];
    }
    else{
    $swhere = array(
        'product' => $info['product'],
        'compid' => $_SESSION['compid']
                );

    $stpd = $this->pm->get_data('stock',$swhere);

    $this->pm->delete_data('stock',$swhere);

    if($stpd)
        {
        $tquantity = $stpd[0]['totalPices']+$info['quantity'];
        }
    else{
        $tquantity = $info['quantity'];
        }

    $info = [
        'compid'     => $_SESSION['compid'],
        'product'    => $info['product'],
        'totalPices' => $tquantity,
        'regby'      => $_SESSION['uid']
            ];
    //var_dump($productID); exit();
    $result = $this->pm->insert_data('stock',$info);
    
    $sinfo = [
        'compid'     => $_SESSION['compid'],
        'product'    => $info['product'],
        'totalPices' => $this->input->post('quantity'),
        'regby'      => $_SESSION['uid']
            ];
    //var_dump($productID); exit();
    $this->pm->insert_data('stock_store',$sinfo);
    $prname = $this->db->select('productName')
                     ->from('products')
                     ->where('productID', $info['product'])
                     ->get()
                     ->row();
    
    $log = [
      'activity' => 'Product stock is stored ('.$prname->productName.')',
      'compid'       => $_SESSION['compid'],
      'user_id'       => $_SESSION['uid']
                ];
    $this->pm->insert_data('activity_logs',$log);

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Product Store Successfully !</h4>
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
    redirect('Product');
}

public function export_action()
    {
    $this->load->library("excel");
    $object = new PHPExcel();

    $object->setActiveSheetIndex(0);

    $table_columns = array("Product Name", "Product Code", "Category", "Unit", "Purchase price", "Retail Price", "Wholesale Price", "Product Description", "Product Specification");

    $column = 0;

    foreach($table_columns as $field)
        {
        $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
        $column++;
        }

    $product_data = $this->pm->product_fetch_data();
    //print_r($product_data); exit();
    $excel_row = 2;

    foreach($product_data as $row)
        {
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->productName);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->productcode);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->categoryID);
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->unit);
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->pprice);
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->sprice);
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->wprice);
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->details);
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->specifict);
        $excel_row++;
        }


    $object->getActiveSheet()->setTitle('Products');

    //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
    $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');

    header("Last-Modified: ".gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Products.xls"');
    ob_end_clean();
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
            $catid = '';
            for($row=2; $row<=$highestRow; $row++)
                {
                $productName = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $code = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $categoryID = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $units = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $pprice = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $sprice = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $wprice = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                $details = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                $specifict = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                
                
                
                $cat = $this->db->select('categoryID')->from('categories')->where('categoryID', $categoryID)->get()->row();
                $unt = $this->db->select('id')->from('sma_units')->where('id', $units)->get()->row();
                
                if(!$cat && !is_numeric($categoryID)){
                    $data = array(
                        'compid'       => $_SESSION['compid'],
                        'categoryName' => $categoryID,
                        'regby'        => $_SESSION['uid']
                            );
                    $this->db->insert('categories',$data);
                    $catn = $this->db->select('categoryID')->from('categories')->where('categoryName', $categoryID)->get()->row();
                    $categoryID = intval($catn->categoryID);
                }
                if(!$unt && !is_numeric($units)){
                    $data = array(
                        'compid'   => $_SESSION['compid'],
                        'unitName' => $units,         
                        'regby'    => $_SESSION['uid']
                            );
                    $this->db->insert('sma_units',$data);
                    $unit = $this->db->select('id')->from('sma_units')->where('unitName', $units)->get()->row();
                    $units = intval($unit->id);
                }

                if($code){
                    $cusid = $code;
                }else{
                    
                    $query = $this->db->select('productcode')
                                      ->from('products')
                                      ->where('compid',$_SESSION['compid'])
                                      ->limit(1)
                                      ->order_by('productcode','DESC')
                                      ->get()
                                      ->row();
                    if($query)
                        {
                        $sn = substr($query->productcode,5)+1;
                        }
                    else
                        {
                        $sn = 1;
                        }
    
                    $cn = strtoupper(substr($_SESSION['compname'],0,3));
                    $pc = sprintf("%'05d",$sn);
    
                    $cusid = 'P-'.$cn.$pc;
                }


                $data = array(
                    'compid'      => $_SESSION['compid'],
                    'productName' => $productName,
                    'productcode' => $cusid,
                    'categoryID'  => $categoryID,
                    'unit'        => $units,
                    'pprice'      => $pprice,
                    'sprice'      => $sprice,
                    'wprice'      => $wprice,
                    'details'     => $details,
                    'specifict'   => $specifict,
                    'regby'       => $_SESSION['uid']
                        );
                // var_dump($data);exit();
                $result = $this->db->insert('products', $data);
                }
            }

            $log = [
                'activity' => 'Imported Products',
                'user_id'       => $_SESSION['uid'],
                'compid'       => $_SESSION['compid'],
                          ];
              $this->pm->insert_data('activity_logs',$log);
            
        // var_dump($result);exit();
        if($result)
            {
            $sdata = [
              'exception' =>'<div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i> Product imported Successfully !</h4>
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
    }   
}

public function add_product()
    {
        
    $query = $this->db->select('productcode')
                  ->from('products')
                  ->where('compid',$_SESSION['compid'])
                  ->limit(1)
                  ->order_by('productcode','DESC')
                  ->get()
                  ->row();
    if($query)
        {
        $sn = substr($query->productcode,5)+1;
        }
    else
        {
        $sn = 1;
        }

    $cn = strtoupper(substr($_SESSION['compname'],0,3));
    $pc = sprintf("%'05d", $sn);

    $cusid = 'P-'.$cn.$pc;

    $data = array(
        'compid'      => $_SESSION['compid'],
        'productName' => $_POST['productName'],
        'productcode' => $cusid,
        'categoryID'  => $_POST['categoryID'],
        'unit'        => $_POST['unit'],
        'pprice'      => $_POST['pprice'],
        'sprice'      => $_POST['sprice'],            
        'scategory'   => $_POST['scategory'],
        'brand'       => $_POST['brand'],
        'details'     => $_POST['details'],
        'alertqty'    => $_POST['alertqty'],
        'specifict'   => $_POST['specification'],
        
        'regby'       => $_SESSION['uid']
        
            );

    $result = $this->pm->insert_data('products',$data);


    if($result)
        {
        $swhere = array(
            'compid' => $_SESSION['compid']
                );
        $products = $this->pm->get_data('products',$swhere);

        $append = '<div id="customer_hide"><label>Product *</label>
                    <select class="form-control chosen" name="products" onchange="myFunction()" id="products" required>
                    <option value="">Select One</option>
                    ';
        foreach($products as $value)
            {
            $append .= '<option value=" '.$value['productID'] .' ">'.$value['productName'].'('.$value['productcode'].')</option>';
            }
        $append .= '</select></div>';
        echo $append;
        }
    else
        {
        echo "Product Added Failed!";
        }
}

public function low_product_stock_reports()
    {
    $data['title'] = 'Stock Report'; 

    $other = array(
       'join' => 'left'         
            );
    
    $where = array(
        'stock.compid' => $_SESSION['compid'],
    );
    
    $field = array(
        'stock' => 'stock.*',
        'products' => 'products.productName,products.productcode,products.pprice,alertqty'
            );
    $join = array(
        'products' => 'products.productID = stock.product'
            );

    // $data['stock'] = $this->pm->get_data('stock',$where,$field,$join,$other);
    // $data['company'] = $this->pm->company_details();
    //var_dump($data['products']); exit();
    
    

    $all_stock = $this->pm->get_data('stock', $where, $field, $join);
    $low_stock = array();

    foreach ($all_stock as $stock) {
        if ($stock['totalPices'] < $stock['alertqty']) {
            $low_stock[] = $stock;
        }
    }

    $data['stock'] = $low_stock;
    $data['company'] = $this->pm->company_details();

    // Add this line to get the count of low stock products
    $data['low_stock_count'] = count($low_stock);
    
    
    // 
    $this->load->view('products/low_product_stock',$data);
}

public function stock_in_hand()
  {
  $data['title'] = 'Stock In Hand';
  
  if(isset($_GET['search']))
    {
    $puType = $_GET['puType'];
    
    $data['stock'] = $this->pm->get_stock_sproduct_data($puType);
    }
  else
    {
    $data['stock'] = $this->pm->get_stock_in_hand();
    }
  
  $data['company'] = $this->pm->company_details();
    //var_dump($data['products']); exit();
  $this->load->view('products/stockInHand',$data);
}

public function create_product_barcode($id)
  {
  $data['title'] = 'Product';

  if(isset($_GET['search']))
    {
    $nopack = $_GET['nopack'];
    $data['nopack'] = $nopack;
    $data['product'] = $id;

    $where = array(
      'productID' => $id
          );

    //$data['product'] = $this->pm->get_data('products',$where);
	$data['product'] = $this->db->where($where)->get('products')->row();
			// echo "<pre>";
			// print_r($data['product']);
			// die;
    }
  else
    {
    $where = array(
      'productID' => $id
          );

    //$data['product'] = $this->pm->get_data('products',$where)->row();
    $data['product'] = $this->db->where($where)->get('products')->row();

    }
	// 	echo "<pre>";
	// var_dump($data['product']); exit();
  $this->load->view('products/product_barcode',$data);
}




}