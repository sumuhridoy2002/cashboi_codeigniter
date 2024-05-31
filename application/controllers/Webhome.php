<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webhome extends CI_Controller

################################################################################
{             // Code Start From Here
################################################################################

public function __construct()
  {
  parent::__construct();

  $this->load->model('Prime_model','pm');
}
        #######################################
        #         /*  Pages Start */          #
        #######################################


public function index()
  {
  $data = [
    'title'   => 'Home',
    'contact' => $this->pm->get_data('com_profile',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false),
    'area'    => $this->pm->get_data('area',false),
    'ptype'   => $this->pm->get_data('product_type',false),
    'msg'     => $this->pm->get_data('user_message',false),
    'hbanner' => $this->pm->get_data('home_banner',false),
    //'delivery' => $this->pm->dparcel_order(),
    //'client'  => $this->pm->get_merchant_user(),
    //'merchant' => $this->pm->get_merchant_user(),
    //'order'   => $this->pm->parcel_order()
            ];
    //var_dump($data['hbanner']); exit();
  $this->load->view('web/webhome',$data);
}

public function store_details($slug)
  {
  $data['title'] = 'Home';

  $where = ['slug' => $slug];

  $store = $this->pm->get_data('store', $where);
  $data['store'] = $store[0];

  $pwhere = ['compid' => $store[0]['compid'], 'spstatus' => 1];

  $other = ['limit' => 100, 'order_by' => 'productID'];

  $data['product'] = $this->pm->get_data('products', $pwhere, false, false, $other);

  $cwhere = [ 'compid' => $store[0]['compid'], 'fpShow' => 1];

  $cother = ['limit' => 5, 'order_by' => 'categoryID'];

  $data['category'] = $this->pm->get_data('categories', $cwhere, false, false, $cother);
  $data['compid'] = $store[0]['compid'];
  
  $cmother = ['limit' => 3, 'order_by' => 'categoryID'];

  $data['mcategory'] = $this->pm->get_data('categories', $cwhere, false, false, $cmother);
    
  $this->load->view('webhome/product_home', $data);
}

public function category_product_details($id,$id2)
  {
  $data['title'] = 'Home';

  $where = [
    'sid' => $id2
        ];

  $store = $this->pm->get_data('store',$where);
  $data['store'] = $store[0];

  $pwhere = [
    'categoryID' => $id,
    'compid' => $store[0]['compid'],
    'spstatus' => 1
        ];
  //var_dump($data['title']); exit();
  $data['product'] = $this->pm->get_data('products',$pwhere);
  
  $cwhere = [
    'compid' => $store[0]['compid'],
    'fpShow' => 1
        ];
  $cother = array(
    'limit' => 5,
    'order_by' => 'categoryID'
        );
  $data['category'] = $this->pm->get_data('categories',$cwhere,false,false,$cother);
  $data['compid'] = $store[0]['compid'];
  
  $cmother = array(
    'limit' => 3,
    'order_by' => 'categoryID'
        );
  $data['mcategory'] = $this->pm->get_data('categories',$cwhere,false,false,$cmother);
    
  $this->load->view('webhome/cat_product',$data);
}

public function product_details($id, $id2)
{
  $data['title'] = 'Home';

  $where = [ 'sid' => $id2 ];

  $store = $this->pm->get_data('store', $where);
  $data['store'] = $store[0];

  $pwhere = [ 'productID' => $id ];
  $products = $this->pm->get_data('products', $pwhere);
  $data['product'] = $products[0];
  
  $cwhere = [
    'compid' => $store[0]['compid'],
    'fpShow' => 1
  ];

  $cother = [
    'limit' => 5,
    'order_by' => 'categoryID'
  ];

  $data['category'] = $this->pm->get_data('categories',$cwhere,false,false,$cother);
  $data['compid'] = $store[0]['compid'];
  
  $cmother = [
    'limit' => 3,
    'order_by' => 'categoryID'
  ];
  
  $data['mcategory'] = $this->pm->get_data('categories',$cwhere,false,false,$cmother);
    
  $this->load->view('webhome/product_info',$data);
}

# Hridoy
public function add_to_cart()
{
  ini_set('display_errors', 0);
  error_reporting(0);

  $this->cart->insert([
      "id"    => $this->input->post("pid"),
      "name"  => $this->input->post("name"),
      "price" => $this->input->post("pprice"),
      "qty"   => 1
  ]);

  $response = [
      "total_items" => count($this->cart->contents()),
      "total_price" => number_format($this->cart->total(), 2) // Ensuring it has two decimal places
  ];

  header('Content-Type: application/json');
  echo json_encode($response);
}

public function get_cart_quantity()
  {
  $someJSON = json_encode($psid);
  echo $someJSON;
}
 
public function show_cart()
  {
  $output = '';
  $no = 0;
  foreach ($this->cart->contents() as $items)
    {
    $no++;
    $output .='
      <tr>
        <td>'.$items['name'].'</td>
        <td>'.number_format($items['price']).'</td>
        <td>'.$items['qty'].'</td>
        <td>'.number_format($items['subtotal']).'</td>
        <td><button type="button" onclick="removeFromCart(\''.addslashes($items['rowid']).'\')" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>
      </tr>';
    }
  $output .= '
    <tr>
      <th colspan="3">Total Amount</th>
      <th colspan="2">'.'৳ '.number_format($this->cart->total()).'</th>
    </tr>';
  return $output;
}
 
# Hridoy
public function load_cart()
{
  ini_set('display_errors', 0);
  error_reporting(0);

  $response = [
      "total_items" => count($this->cart->contents()),
      "total_price" => number_format($this->cart->total(), 2) // Ensuring it has two decimal places
  ];

  header('Content-Type: application/json');
  echo json_encode($response);
}
 
public function delete_cart()
  { 
  $data = array(
    'rowid' => $this->input->post('row_id'), 
    'qty' => 0, 
        );
  $this->cart->update($data);
  echo $this->show_cart();
}

public function check_out_order($id)
  {
  $data['title'] = 'Check Out';
  $where = [
    'sid' => $id
        ];

  $store = $this->pm->get_data('store',$where);
  $data['store'] = $store[0];
  
  $cwhere = [
    'compid' => $store[0]['compid'],
    'fpShow' => 1
        ];
  $cother = array(
    'limit' => 5,
    'order_by' => 'categoryID'
        );
  $data['category'] = $this->pm->get_data('categories',$cwhere,false,false,$cother);
  $data['compid'] = $store[0]['compid'];
  
  $cmother = array(
    'limit' => 3,
    'order_by' => 'categoryID'
        );
  $data['mcategory'] = $this->pm->get_data('categories',$cwhere,false,false,$cmother);

  $this->load->view('webhome/check_out',$data);
}

public function load_product_cart()
  { 
  echo $this->show_product_cart();
}

public function show_product_cart()
{ 
    $output = '';
    $no = 0;
    foreach ($this->cart->contents() as $items) {
        $no++;
        $output .= '
            <tr>
                <td>'.$items['name'].'<input type="hidden" name="product[]" value="'.$items['id'].'" required></td>
                <td>'.number_format($items['price']).'<input type="hidden" name="price[]" value="'.$items['price'].'" id="salePrice_'.$items['id'].'" onkeyup="totalPrice('.$items['id'].')" required></td>
                <td><input type="text" class="text-center" style="border: 1px solid darkgray;border-radius: 20px;" name="quantity[]" value="'.$items['qty'].'" id="pices_'.$items['id'].'" onkeyup="totalPrice('.$items['id'].')" required></td>
                <td><input type="text" class="text-center tPrice" style="border: 1px solid darkgray;border-radius: 20px; background-color: #d3cbcb;" name="tprice[]" value="'.$items['subtotal'].'" id="totalPrice_'.$items['id'].'" required readonly></td>
                <td><button type="button" onclick="removeFromCart(\''.addslashes($items['rowid']).'\')" id="'.$items['rowid'].'" class="romove_cart btn btn-danger btn-sm">Cancel</button></td>
            </tr>';
    }
    $output .= '
        <tr>
            <th colspan="3">Total Amount</th>
            <th colspan="2" id="tamount">'.$this->cart->total().'</th>
        </tr>';
    return $output;
}

// public function save_order_product()
//   {
//   $info = $this->input->post();
  
//   $query = $this->db->select('order_no')
//                 ->from('order')
//                 ->limit(1)
//                 ->order_by('oid','DESC')
//                 ->get()
//                 ->row();
//   if($query)
//     {
//     $sn = substr($query->order_no,5)+1;
//     }
//   else
//     {
//     $sn = 1;
//     }
    
//   $pc = sprintf("%'05d",$sn);

//   $cusid = 'O-'.$pc;
  
//   $id = $info['sid'];
//   $id2 = $info['sName'];

//   $sale = array(
//     'compid'     => $info['compid'],
//     'order_no'   => $cusid,
//     'custName'   => $info['name'],
//     'custMobile' => $info['mobile'],
//     'custEmail'  => $info['email'],
//     'custAddres' => $info['address'],
//     'tAmount'    => array_sum($info['tprice'])
//             );
//         //var_dump($sale); exit();
//   $result = $this->pm->insert_data('order',$sale);
       
//   $length = count($info['product']);

//   for($i = 0; $i < $length; $i++)
//     {
//     $spdata = array(
//       'oid'      => $result,
//       'product'  => $info['product'][$i],                    
//       'quantity' => $info['quantity'][$i],
//       'sprice'   => $info['price'][$i],
//       'tPrice'   => $info['tprice'][$i]
//           );

//     $result2 = $this->pm->insert_data('order_product',$spdata); 
//     }

//   if($result2)
//     {
//     $sdata = [
//       'exception' =>'<div class="alert alert-success alert-dismissible">
//         <h4><i class="icon fa fa-check"></i> Product Order Place Successfully !</h4>
//         </div>'
//             ];  
//     }
//   else
//     {
//     $sdata = [
//       'exception' =>'<div class="alert alert-danger alert-dismissible">
//         <h4><i class="icon fa fa-ban"></i> Failed !</h4>
//         </div>'
//             ];
//     }
//   $this->session->set_userdata($sdata);

//   $message = urlencode("A new order placed on your store.");
//   $to = urlencode($info['shop_mobile']);
//   $token = urlencode("yfynrvxm-erdvybul-5lkgcewi-ivyfmpg8-r220zvby");

//   $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
            
//   $ch = curl_init();
//   curl_setopt($ch, CURLOPT_URL,$url);
//   curl_setopt($ch, CURLOPT_ENCODING, '');
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   $result = curl_exec($ch);

//   print_r($result);

//   $this->cart->destroy();
//   redirect('store/'.$info['slug']);
// }

public function save_order_product()
{
    $info = $this->input->post();
    $query = $this->db->select('order_no')
                      ->from('order')
                      ->limit(1)
                      ->order_by('oid', 'DESC')
                      ->get()
                      ->row();

    if($query) {
        $sn = substr($query->order_no, 5) + 1;
    } else {
        $sn = 1;
    }

    $pc = sprintf("%'05d", $sn);
    $cusid = 'O-'.$pc;
    
    $id = $info['sid'];
    $id2 = $info['sName'];

    $sale = array(
        'compid'     => $info['compid'],
        'order_no'   => $cusid,
        'custName'   => $info['name'],
        'custMobile' => $info['mobile'],
        'custEmail'  => $info['email'],
        'custAddres' => $info['address'],
        'tAmount'    => array_sum($info['tprice'])
    );

    $result = $this->pm->insert_data('order', $sale);

    $length = count($info['product']);

    for($i = 0; $i < $length; $i++) {
        $spdata = array(
            'oid'      => $result,
            'product'  => $info['product'][$i],                    
            'quantity' => $info['quantity'][$i],
            'sprice'   => $info['price'][$i],
            'tPrice'   => $info['tprice'][$i]
        );

        $result2 = $this->pm->insert_data('order_product', $spdata); 
    }

    if($result2) {
        $sdata = [
            'exception' =>'<div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i> Product Order Place Successfully !</h4>
            </div>'
        ];  
    } else {
        $sdata = [
            'exception' =>'<div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> Failed !</h4>
            </div>'
        ];
    }

    $this->session->set_userdata($sdata);

    $store = $this->pm->get_data('store', ['sid' => $info['sid']])[0];
    
    if ($info['courier_type'] == "Pathao") {
      // Static data for Pathao order
      $pathaoOrderData = [
        'recipient_name'    => $info['name'],
        'recipient_phone'   => $info['mobile'],
        'recipient_address' => $info['address'],
        'recipient_city'    => 1, // Assuming Dhaka
        'recipient_zone'    => 941, // Assuming Uttara Sector 10
        'store_id'          => 194158, // Fixed for this store
        'delivery_type'     => 48, // Normal Delivery
        'amount_to_collect' => array_sum($info['tprice']), // Amount to collect
        'item_quantity'     => count($info['product']), // Quantity of items
        'item_weight'       => 0.5, // Assuming minimum weight
        'item_type'         => 2, // Parcel
        'invoice_id'        => uniqid() // Unique invoice ID
      ];

      // Call placePathaoOrder function and handle response
      $isPathaoOrderPlaced = $this->placePathaoOrder($pathaoOrderData, $store['PATHAO_USER_NAME'], $store['PATHAO_PASSWORD'], $store['PATHAO_CLIENT_ID'], $store['PATHAO_CLIENT_SECRET']);

      // echo "<pre>";
      // var_dump($isPathaoOrderPlaced);
      // die();
    } elseif ($info['courier_type'] == "Steadfast") {
      // Static data for Steadfast order
      $steadfastOrderData = [
        'recipient_name'    => $info['name'],
        'recipient_phone'   => $info['mobile'],
        'recipient_address' => $info['address'],
        'cod_amount'        => array_sum($info['tprice']), // Amount to collect
        'invoice'           => uniqid(), // Unique invoice ID,
        'note'              => "An order to deliver from CashBoi."
      ];

      // Call placeSteadfastOrder function and handle response
      $isSteadfastOrderPlaced = $this->placeSteadfastOrder($steadfastOrderData, $store['STEADFAST_API_KEY'], $store['STEADFAST_API_SECRET']);

      // echo "<pre>";
      // var_dump($isSteadfastOrderPlaced);
      // die();
    }
    
    if ((isset($isPathaoOrderPlaced) && $isPathaoOrderPlaced) || (isset($isSteadfastOrderPlaced) && $isSteadfastOrderPlaced)) {
        $sdata = [
            'exception' => '<div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i> Product Order Place Successfully !</h4>
            </div>'
        ];
    } else {
        $sdata = [
            'exception' => '<div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> Failed to place order !</h4>
            </div>'
        ];
    }

    $this->session->set_userdata($sdata);

    $this->cart->destroy();
    redirect('store/'.$info['slug']);
}

private function placePathaoOrder(array $data = [], string $PATHAO_USER_NAME = '', string $PATHAO_PASSWORD = '', string $PATHAO_CLIENT_ID = '', string $PATHAO_CLIENT_SECRET = ''): bool
{
    try {
        // HTTP request to get access token
        $accessTokenResponse = $this->curl_request('POST', 'https://api-hermes.pathao.com/aladdin/api/v1/issue-token', [
            'grant_type' => 'password',
            'username' => $PATHAO_USER_NAME,
            'password' => $PATHAO_PASSWORD,
            'client_id' => $PATHAO_CLIENT_ID,
            'client_secret' => $PATHAO_CLIENT_SECRET
        ]);

        $accessToken = json_decode($accessTokenResponse, true)['access_token']; // Get access token

        // HTTP request to place order
        $orderResponse = $this->curl_request('POST', 'https://api-hermes.pathao.com/aladdin/api/v1/orders', $data, [
            'Authorization: Bearer ' . $accessToken
        ]);

        return $orderResponse;

        // Check response type
        if ($orderResponse) {
            return true;
        }
    } catch (\Exception $e) {
        return false;
    }

    return false;
}

private function placeSteadfastOrder(array $data = [], string $STEADFAST_API_KEY = '', string $STEADFAST_API_SECRET = ''): bool
{
    try {
        // HTTP request to place order
        $orderResponse = $this->curl_request('POST', 'https://portal.steadfast.com.bd/api/v1/create_order', $data, [
          'Api-Key'      => $STEADFAST_API_KEY,
          'Secret-Key'   => $STEADFAST_API_SECRET,
          'Content-Type' => "application/json"
        ]);

        // return $orderResponse;

        // Check response type
        if ($orderResponse) {
            return true;
        }
    } catch (\Exception $e) {
        return false;
    }

    return false;
}

protected function curl_request($method, $url, $params = [], $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    }

    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

public function order_product_list()
  {
  $data['title'] = 'Order';

  $where = [
    'compid' => $_SESSION['compid']
        ];
  $other = array(
    'order_by' => 'oid'
        );

  $data['order'] = $this->pm->get_data('order',$where,false,false,$other);
    
  $this->load->view('webhome/product_order',$data);
}

public function order_product_details($id)
  {
  $data['title'] = 'Home';
  
  $where = [
    'oid' => $id
        ];
  
  $field = array(
    'order' => 'order.*',
    'customers' => 'customers.*'
        );
  $join = array(
    'customers' => 'customers.customerID = order.customerID'
        );
  $store = $this->pm->get_data('order',$where);
  $data['order'] = $store[0];
  $other = array(
    'join' => 'left'
        );
  $field = array(
    'order_product' => 'order_product.*',
    'products' => 'products.productName,products.productcode'
        );
  $join = array(
    'products' => 'products.productID = order_product.product'
        );
  $data['product'] = $this->pm->get_data('order_product',$where,$field,$join,$other);
  $data['company'] = $this->pm->company_details();
  
  $this->load->view('webhome/order_view',$data);
}

public function information_page_details($id,$id2)
  {
  $data['title'] = 'Home';
  
  $where = [
    'sid' => $id
        ];

  $store = $this->pm->get_data('store',$where);
  $data['store'] = $store[0];

  $cwhere = [
    'compid' => $store[0]['compid'],
    'fpShow' => 1
        ];
  $cother = array(
    'limit' => 5,
    'order_by' => 'categoryID'
        );
  $data['category'] = $this->pm->get_data('categories',$cwhere,false,false,$cother);
  $data['compid'] = $store[0]['compid'];
  
  $cmother = array(
    'limit' => 3,
    'order_by' => 'categoryID'
        );
  $data['mcategory'] = $this->pm->get_data('categories',$cwhere,false,false,$cmother);
  
    //var_dump($data['title']); exit();
  $data['page'] = $this->pm->get_data('page_setting',$where);
  
  $this->load->view('webhome/page_info',$data);
}

public function contact_information($id,$id2)
  {
  $data['title'] = 'Contact Us';

  $where = [
    'sid' => $id
        ];

  $store = $this->pm->get_data('store',$where);
  $data['store'] = $store[0];

  $cwhere = [
    'compid' => $store[0]['compid'],
    'fpShow' => 1
        ];
  $cother = array(
    'limit' => 5,
    'order_by' => 'categoryID'
        );
  $data['category'] = $this->pm->get_data('categories',$cwhere,false,false,$cother);
  $data['compid'] = $store[0]['compid'];
  
  $cmother = array(
    'limit' => 3,
    'order_by' => 'categoryID'
        );
  $data['mcategory'] = $this->pm->get_data('categories',$cwhere,false,false,$cmother);
    
  $this->load->view('webhome/contact_us',$data);
}

public function save_notice_msg()
  {
  $info = $this->input->post();
  
  $id = $info['sid'];
  $id2 = $info['sName'];

  $data = array(
    'ntype'  => $info['ntype'],
    'subject' => $info['subject'],
    'message' => $info['message']
        );
  //var_dump($data); exit();
  $result = $this->pm->insert_data('notice',$data);
  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Message Send Successfully !</h4>
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
  redirect('store/'.$id.'/'.$id2);
}
  

        #####################################
        #         /*  Pages End */          #
        #####################################
    
    
########################################################################################
}             // Code End From Here
########################################################################################