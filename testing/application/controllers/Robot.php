<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Robot extends CI_Controller {

	public function __construct(){
		parent::__construct();       
		$this->load->model("prime_model",'pm');            

	}
	
	
	public function stock_alert()
{
	$userCount=$this->Common->table_count('users');
	$currentDate = date('Y-m-d');
	$updatedDate = date('Y-m-d',strtotime($currentDate. ' + 1 days'));
	$userActivityCount=$this->Common->table_count_multi('users',[
		
		'stock_alert' => 1,
		'stock_alert_date' => $currentDate
	]
	);
	if($userCount==$userActivityCount){
		$this->Common->update_data('users','stock_alert',1,[
			'stock_alert'=>0,
			'stock_alert_date'=>$updatedDate,
		]);
	}
	$userInfo=$this->Common->get_data_multi_conditional_row('users',[
		
		'stock_alert_date' => $currentDate
	]
	);
	if($userInfo){
		$this->Common->update_data('users','uid',$userInfo->uid,['stock_alert_date'=>$updatedDate]);
		$data['title'] = 'Stock Report'; 

		$other = array(
		   'join' => 'left'         
				);
		$where = array(
		   'stock.compid' => $userInfo->compid,
		   'stock.totalPices <' => 1
		);
		$field = array(
			'stock' => 'stock.*',
			'products' => 'products.productName,products.productcode,products.pprice'
				);
		$join = array(
			'products' => 'products.productID = stock.product'
				);
	
		$data['stock'] = $this->pm->get_data('stock',$where,$field,$join,$other);
		if($data['stock']){
		   	$msg=$this->load->view('bot/lowstock',$data,true);
		   	send_email($userInfo->email,$userInfo->name,$msg,'Sunshine Stock Alert Report');
		}
		else{
		    
		}
		
	
		
	}
    
}
	
	
public function daily_report()
{
	$userCount=$this->Common->table_count('users');
	$currentDate = date('Y-m-d');
	$updatedDate = date('Y-m-d',strtotime($currentDate. ' + 1 days'));
	$userActivityCount=$this->Common->table_count_multi('users',[
		
		'daily_alert' => 1,
		'daily_alert_date' => $currentDate
	]
	);
	if($userCount==$userActivityCount){
		$this->Common->update_data('users','daily_alert',1,[
			'daily_alert'=>0,
			'daily_alert_date'=>$updatedDate,
		]);
	}
	$userInfo=$this->Common->get_data_multi_conditional_row('users',[
		
		'daily_alert_date' => $currentDate
	]
	);
	if($userInfo){
		$this->Common->update_data('users','uid',$userInfo->uid,['daily_alert_date'=>$updatedDate]);

		$data['title'] = 'Daily Report';
		$_SESSION['compid'] = $userInfo->compid;

		$data['psale'] = $this->pm->pre_sales_amount();
		$data['ppurchase'] = $this->pm->pre_purchases_amount();
		$data['pcvoucher'] = $this->pm->pre_cvoucher_amount();
		$data['pdvoucher'] = $this->pm->pre_dvoucher_amount();
		$data['psvoucher'] = $this->pm->pre_svoucher_amount();
		$data['pempp'] = $this->pm->pre_emp_payments_amount();
		$data['preturn'] = $this->pm->pre_returns_amount();

		$data['csale'] = $this->pm->today_sales_amount();
		$data['cpurchase'] = $this->pm->today_purchases_amount();
		$data['ccvoucher'] = $this->pm->today_cvoucher_amount();
		$data['cdvoucher'] = $this->pm->today_dvoucher_amount();
		$data['csvoucher'] = $this->pm->today_svoucher_amount();
		$data['cempp'] = $this->pm->today_emp_payments_amount();
		$data['creturn'] = $this->pm->today_returns_amount();
		$data['company'] = $this->pm->company_details();
		
		$msg=$this->load->view('bot/dailyreport',$data,true);
		send_email($userInfo->email,$userInfo->name,$msg,'Sunshine Daily Report');


	}
    
}


}
