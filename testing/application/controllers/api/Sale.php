<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'third_party/REST_Controller.php';
require APPPATH . 'third_party/Format.php';
use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Sale extends REST_Controller
{
    public function __construct() {

        parent::__construct();

        /*
        ## Load these helper to create JWT tokens
        */
        $this->load->helper(['jwt', 'authorization']); 

        /*
        ## Load sale model
        */
        $this->load->model('api/sale_model');
        $this->load->model("prime_model","pm");
    }
    

    private function verify_request()
	{
	    /*
	    ## Get all the headers
	    */
	    $headers = $this->input->request_headers();
	    /*
	    ## Extract the token
	    */
	    $token = $headers['Authorization'];
	    /*
	    ## Use try-catch
	    ## JWT library throws exception if the token is not valid
	    */
	    try {
	        /*
	        ## Validate the token
	        ## Successfull validation will return the decoded user data else returns false
	        */
	        $data = AUTHORIZATION::validateToken($token);
	        if ($data === false) {
	            $status = parent::HTTP_UNAUTHORIZED;
	            $response = ['status' => $status, 'msg' => 'Unauthorized Access!'];
	            $this->response($response, $status);
	            exit();
	        } else {
	            return $data;
	        }
	    } catch (Exception $e) {
	        /*
	        ## Token is invalid
	        ## Send the unathorized access message
	        */
	        $status = parent::HTTP_UNAUTHORIZED;
	        $response = ['status' => $status, 'msg' => 'Unauthorized Access! '];
	        $this->response($response, $status);
	    }
	}

	/*
	## Get All sale Data (Http Get Request)
	*/
	public function sales_get($company_id = null)
	{
		 $this->verify_request();

		/*
		## Call get sale model request
		*/
		$sales = $this->sale_model->get_sale($company_id);

		$status = parent::HTTP_OK;
	    $response = ['status' => $status, 'data' => $sales];
	    $this->response($response, $status);
	}

	/*
	## Get single sale data (Http Get Request)
	*/
	public function sale_get($sale_id = null)
	{
		 $this->verify_request();

		/*
		## Call get single sale request
		*/
		$sale = $this->sale_model->get_single_sale($sale_id);

		if($sale) {
			$status = parent::HTTP_OK;
	    	$response = ['status' => $status, 'data' => $sale];
	    	$this->response($response, $status);
		} else {
			$status = parent::HTTP_NOT_FOUND;
	    	$response = ['status' => $status, 'message' => 'ID: '.$sale_id.' not found!'];
	    	$this->response($response, $status);
		}

	}

	/*
	## Add new sale data (Http Post Request)
	*/
	public function sale_post()
	{
		/*
		## verify token
		*/
	 	$this->verify_request();

		/*
		## Define flag variable
		*/
		$sale = $this->sale_model->post_sale($this->post());


		if($sale)
		{
			$status = parent::HTTP_OK;
			$response = ['status' => $status, 'message' => 'Sale add Successfull', 'data' => $sale];
			$this->response($response, $status);
		}
		else
		{
			$status = parent::HTTP_BAD_REQUEST;
			$response = ['status' => $status, 'message' => 'sale add failed!'];
			$this->response($response, $status);
		}
	}

	/*
	## sale edit get (Http get Request)
	*/
	public function sale_edit_get($sale_id = null)
	{
		/*
		## verify token
		*/
		 $this->verify_request();


		$sale = $this->sale_model->get_sale_edit($sale_id);

		if($sale)
		{
			$status = parent::HTTP_OK;
			$response = ['status' => $status, 'data' => $sale];
			$this->response($response, $status);
		}
		else
		{
			$status = parent::HTTP_BAD_REQUEST;
			$response = ['status' => $status, 'message' => 'sale edit get failed!'];
			$this->response($response, $status);
		}
	}


	/*
	## sale update (Http Put Request)
	*/
	public function sale_put($sale_id = null)
	{
		/*
		## verify token
		*/
		 $this->verify_request();


		$sale = $this->sale_model->put_sale($sale_id, $this->put());

		if($sale)
		{
			$status = parent::HTTP_OK;
			$response = ['status' => $status, 'data' => $sale];
			$this->response($response, $status);
		}
		else
		{
			$status = parent::HTTP_BAD_REQUEST;
			$response = ['status' => $status, 'message' => 'sale add failed!'];
			$this->response($response, $status);
		}
	}

	/*
	## sale delete (Http Delete Request)
	*/
	public function sale_delete($sale_id = null)
	{
		 $this->verify_request();

		/*
		## Send request sale delete with category_id
		*/
		$result = $this->sale_model->delete_sale($sale_id);

		/*
		## Check sale delete
		## Success OR Fail
		*/

		if($result)
		{
			$status = parent::HTTP_OK;
			$message = 'sale delete successfull';
		}
		else
		{
			$status = parent::HTTP_NOT_FOUND;
			$message = 'ID '.$sale_id.' not found';
		}

	    $response = ['status' => $status, 'message' => $message];
	    $this->response($response, $status);
	}
	

public function sales_due_report_post($company_id = null)
  {
  $this->verify_request();
  
  $report = $this->post('rType');
  //var_dump($report); exit();
  if($report == "dailyReports")
    {
    $sdate = date("Y-m-d", strtotime($this->post('sdate')));
    $edate = date("Y-m-d", strtotime($this->post('edate')));
    //var_dump($sdate); var_dump($edate); exit();
    $purchase = $this->sale_model->sales_due_ddata($company_id,$sdate,$edate);
    }
  else
    {
    $purchase = $this->sale_model->sales_due_adata($company_id);
    }
  
  $status = parent::HTTP_OK;
  $response = ['status' => $status,'sales' => $purchase];
  $this->response($response,$status);
}

public function sales_profit_report_post($company_id = null)
  {
  $this->verify_request();
  
  $report = $this->post('rType');
  //var_dump($report); exit();
  if($report == "dailyReports")
    {
    $sdate = date("Y-m-d", strtotime($this->post('sdate')));
    $edate = date("Y-m-d", strtotime($this->post('edate')));
    //var_dump($sdate); var_dump($edate); exit();
    $purchase = $this->sale_model->sales_profit_ddata($company_id,$sdate,$edate);
    }
  else
    {
    $purchase = $this->sale_model->sales_profit_adata($company_id);
    }
  
  $status = parent::HTTP_OK;
  $response = ['status' => $status,'sales' => $purchase];
  $this->response($response,$status);
}

public function cart_save_post()
  {
  $this->verify_request();
  
  $product = $this->db->select('*')
                ->from('cart_product')
                ->where('pid',$this->post('productID'))
                ->where('uid',$this->post('created_by'))
                ->get()
                ->row();
  if($product)
    {
    $tqunt = $product->quantity;
    }
  else
    {
    $tqunt = 0;
    }
    
  $query = $this->db->select('*')
                ->from('products')
                ->where('productID',$this->post('productID'))
                ->get()
                ->row();
    //var_dump($this->post('productID')); var_dump($query); exit();
  $sales = array(
    'uid'      => $this->post('created_by'),
    'pid'      => $this->post('productID'),
    'quantity' => $tqunt+1,
    'uprice'   => $query->sprice,
    'tprice'   => $query->sprice*($tqunt+1)
              );
  if($product)
    {
    $pid = $this->post('productID');
    $uid = $this->post('created_by');
    
    $sale = $this->sale_model->put_cart_save($sales,$pid,$uid);
    }
  else
    {
    $sale = $this->sale_model->post_cart_save($sales);
    }
  if($sale)
    {
    $status = parent::HTTP_OK;
    $response = ['status' => $status, 'message' => 'Cart add Successfull', 'data' => $sale];
    $this->response($response, $status);
    }
  else
    {
    $status = parent::HTTP_BAD_REQUEST;
    $response = ['status' => $status, 'message' => 'Cart add failed!'];
    $this->response($response, $status);
    }
}

public function cart_products_get($created_by = null)
	{
	$this->verify_request();

	$sale = $this->sale_model->get_cart_products($created_by);

	if($sale)
		{
		$status = parent::HTTP_OK;
		$response = ['status' => $status, 'data' => $sale];
		$this->response($response, $status);
		}
	else
		{
		$status = parent::HTTP_BAD_REQUEST;
		$response = ['status' => $status, 'message' => 'Failed!'];
		$this->response($response, $status);
		}
}

public function pos_sale_post()
  {
  /*## verify token*/
  $this->verify_request();
  
  $stock = $this->sale_model->post_pos_sale($this->post());

  if($stock)
    {
    $status = parent::HTTP_OK;
    $response = ['status' => $status, 'message' => 'Sale add Successfull', 'data' => $stock];
    $this->response($response, $status);
    }
  else
    {
    $status = parent::HTTP_BAD_REQUEST;
    $response = ['status' => $status, 'message' => 'sale add failed!'];
    $this->response($response, $status);
    }
}

public function cart_update_post($pid = null,$created_by = null)
  {
  $this->verify_request();
  $uid = $created_by;
  
  $product = $this->db->select('*')
                ->from('cart_product')
                ->where('pid',$pid)
                ->where('uid',$uid)
                ->get()
                ->row();
  if($product)
    {
    $tqunt = $product->quantity;
    }
  else
    {
    $tqunt = 0;
    }
  if($tqunt > 1)
    {
    $cqunt = $tqunt-1;
    $query = $this->db->select('*')
                ->from('service_info')
                ->where('siid',$pid)
                ->get()
                ->row();
                
    $sales = array(
    'uid'      => $uid,
    'pid'      => $pid,
    'quantity' => $cqunt,
    'uprice'   => $query->siPrice,
    'tprice'   => ($query->siPrice*$cqunt)
              );
    $sale = $this->sale_model->put_cart_save($sales,$pid,$uid);
    }
  else
    {
    //$sale = $this->sale_model->delete_cart_2product($pid,$uid);
    $status = parent::HTTP_BAD_REQUEST;
    $response = ['status' => $status, 'message' => 'Cart Quantity is One!'];
    $this->response($response, $status);
    }
    //var_dump($this->post('productID')); var_dump($query); exit();
  if($sale)
    {
    $status = parent::HTTP_OK;
    $response = ['status' => $status, 'message' => 'Cart update Successfull', 'data' => $sale];
    $this->response($response, $status);
    }
  else
    {
    $status = parent::HTTP_BAD_REQUEST;
    $response = ['status' => $status, 'message' => 'Cart add failed!'];
    $this->response($response, $status);
    }
}

public function cart_product_delete($cpid = null)
	{
	$this->verify_request();

	$result = $this->sale_model->delete_cart_product($cpid);

	if($result)
		{
			$status = parent::HTTP_OK;
			$message = 'Cart delete successfull';
		}
		else
		{
			$status = parent::HTTP_NOT_FOUND;
			$message = 'ID '.$cpid.' not found';
		}

	    $response = ['status' => $status, 'message' => $message];
	    $this->response($response, $status);
	}
	
public function today_sale_amount_get($company_id = null)
	{
	 $this->verify_request();

	/*
	## Call get single sale request
	*/
	$sale = $this->sale_model->get_today_sale_amount($company_id);

	if($sale) {
		$status = parent::HTTP_OK;
    	$response = ['status' => $status, 'data' => $sale];
    	$this->response($response, $status);
	} else {
		$status = parent::HTTP_NOT_FOUND;
    	$response = ['status' => $status, 'message' => 'ID: '.$sale_id.' not found!'];
    	$this->response($response, $status);
	}

}
	


}
