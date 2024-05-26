<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prime_model extends CI_Model {

public function get_data($table,$where = false,$fields = false,$join_table = false,$other = false)
  {
  if ($fields != false)
    {
    foreach ($fields as $coll => $value)
      {
      $this->db->select($value);
      }
    }

  $this->db->from($table);

  if($join_table != false)
    {
    if(is_array($other) && array_key_exists('join',$other))
      {
      foreach($join_table as $coll => $value)
        {
        $this->db->join($coll, $value, $other['join']);
        }
      }
    else
      {
      foreach($join_table as $coll => $value)
        {
        $this->db->join($coll, $value);
        }
      }
    }

  if($where != false)
    {
    $this->db->where($where);
    }

  if($other != false)
    {
    if(array_key_exists('or_where', $other))
      {
      $this->db->or_where($other['or_where']);
      }
    if(array_key_exists('order_by', $other))
      {
      $this->db->order_by($other['order_by'], 'desc');
      }
    if(array_key_exists('group_by', $other))
      {
      $this->db->group_by($other['group_by']);
      }
    if(array_key_exists('limit', $other))
      {
      if(array_key_exists('offset', $other))
        {
        $this->db->limit($other['limit'], $other['offset']);
        }
      else
        {
        $this->db->limit($other['limit']);
        }
      }

    if(array_key_exists('like', $other))
      {
      foreach ($other['like'] as $key => $value)
        {
        $this->db->like($key, $value);
        }
      }
    if(array_key_exists('or_like', $other))
      {
      foreach ($other['or_like'] as $key => $value)
        {
        $this->db->or_like($key, $value);
        }
      }
    }
  $query = $this->db->get();
  // $query2=$this->db->last_query();
  // var_dump($query2);
  // die();

  $result = $query->result_array();

  return $result;
}


public function get_data_service()
  {

    $query = $this->db->select("any_value(service_info.siid) as siid,any_value(service_info.siCode) as siCode,any_value(service_info.compid) as compid,any_value(service_info.image) as image,any_value(service_info.siName) as siName,any_value(service_info.siPrice) as siPrice,any_value(service_info.categoryID) as categoryID,any_value(categories.categoryName) as categoryName,any_value(sma_units.unitName) as unitName")
                      ->from('service_info')
                      ->join('categories','categories.categoryID = service_info.categoryID','left')
                      ->join('sma_units','sma_units.id = service_info.unit','left')
                      ->where('service_info.compid',$_SESSION['compid'])
                      ->group_by('service_info.siid')
                      ->get()
                      ->result_array();

                      // var_dump($query);
                      // die();
    return $query;
  
}

public function insert_data($table,$data)
  {
  $this->db->insert($table,$data);
  
  return $this->db->insert_id();
}

public function update_data($table,$data = false,$where = false)
  {
  $this->db->update($table,$data,$where);

  return $this->db->affected_rows();
}

public function delete_data($table, $where)
  {
  $this->db->where($where);
  $this->db->delete($table);
  
  return $this->db->affected_rows();
}

public function count_all($tbl)
  {
  return $this->db->count_all($tbl);
}

public function all_query($sql)
  {
  return $result = $this->db->query($sql)->result_array();
}

public function check_user_email($id)
  {
  $query = $this->db->select('*')
                ->from('users')
                ->where('email',$id)
                ->get();

  $count_row = $query->num_rows();

  if($count_row == 0)
    {
    return 1;
    }
  else
    {
    return 0;
    }
}

public function get_category_data($id)
  {
  $query = $this->db->select('*')
                ->from('categories')
                ->where('categoryID',$id)
                ->get()
                ->row();
  return $query;
}

public function get_sub_category_data($id)
  {
  $query = $this->db->select('*')
                ->from('sub_category')
                ->where('scatid',$id)
                ->get()
                ->row();
  return $query;
}

public function get_subcategory_data($id)
  {
  $query = $this->db->select('*')
                ->from('sub_category')
                ->where('catid',$id)
                ->get()
                ->result();
  return $query;
}

public function get_brand_data($id)
  {
  $query = $this->db->select('*')
                ->from('brands')
                ->where('brid',$id)
                ->get()
                ->row();
  return $query;  
}

public function get_unit_data($id)
  {
  $query = $this->db->select('*')
                ->from('sma_units')
                ->where('id',$id)
                ->get()
                ->row();
  return $query;
}

public function get_cost_type_data($id)
  {
  $query = $this->db->select("*")
                  ->from('cost_type')
                  ->where('ct_id',$id)
                  ->get()
                  ->row();

  return $query;  
}

public function get_dept_data($id)
  {
  $query = $this->db->select('*')
                  ->from('department')
                  ->where('dpt_id',$id)
                  ->get()
                  ->row();
  return $query; 
}
public function get_area_data($id)
  {
  $query = $this->db->select('*')
                  ->from('territory')
                  ->where('trid',$id)
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query; 
}


public function get_bank_account($id)
  {
  $query = $this->db->select('*')
                ->from('bankaccount')
                ->where('ba_id',$id)
                ->get()
                ->row();
  return $query;
}

public function get_mobile_transaction($id)
  {
  $query = $this->db->select('*')
                ->from('mobileaccount')
                ->where('ma_id',$id)
                ->get()
                ->row();
  return $query;
}

public function get_user_notice()
  {
  $query = $this->db->select('*')
                    ->from('notice')
                    ->or_where('ntype','All')
                    ->or_where('ntype',$_SESSION['uid'])
                    ->order_by('nid','DESC')
                    ->get()
                    ->result();
  return $query;
}

public function get_user_role_data($id)
  {
  $query = $this->db->select('*')
                ->from('access_lavels')
                ->where('ax_id',$id)
                ->get()
                ->row();
  return $query;
}

public function get_customer_data($id)
  {
  $query = $this->db->select('*')
                  ->from('customers')
                  ->where('customerID',$id)
                  ->get()
                  ->row();
  return $query; 
}

public function get_supplier_data($id)
  {
  $query = $this->db->select('*')
                  ->from('suppliers')
                  ->where('supplierID',$id)
                  ->get()
                  ->row();
  return $query; 
}

public function get_emp_data($id)
  {
  $query = $this->db->select('*')
                  ->from('employees')
                  ->where('employeeID',$id)
                  ->get()
                  ->row();
  return $query; 
}

public function get_employee()
  {
  $emp = $this->db->select('empid')
        ->from('users')
        ->where('compid',$_SESSION['compid'])
        ->get()
        ->result_array();
    //var_dump($emp); exit();
  $emp_id = array_map (function($value){
  return $value['empid'];
  },$emp);
    //var_dump($emp_id); exit();
  if($emp_id == NULL)
      {
      $empid = 0;
      }
  else{
      $empid = $emp_id;
      }
    //var_dump($empid); exit();
  return $this->db->select('employeeID,employeeName')
              ->from('employees')
              ->where_not_in('employeeID',$empid)
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->result();
}

public function get_user_data($id)
  {
  $query = $this->db->select('*')
                ->from('users')
                ->where('uid',$id)
                ->get()
                ->row();
  return $query;
}

public function company_details()
  {
  $query = $this->db->select('*')
              ->from('com_profile')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
  return $query;  
}

public function supplier_purchases_due_details($id,$sid)
  {
  $query = $this->db->select("SUM(`due`) as total")
                  ->FROM('purchase')
                  ->where_not_in('purchaseID',$id)
                  ->where('supplier',$sid)
                  ->get()
                  ->row();
  return $query;  
}

public function supplier_paid_details($sid)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('supplier',$sid)
                  ->get()
                  ->row();
  return $query;  
}

public function customer_sales_due_details($id,$cusid)
  {
  $query = $this->db->select("SUM(`dueamount`) as total")
                  ->FROM('sales')
                  ->where_not_in('saleID',$id)
                  ->WHERE('customerID',$cusid)
                  ->get()
                  ->row();
  return $query;  
}

public function customer_vaucher_paid_details($cusid)
  {
  $query = $this->db->select('SUM(`totalamount`) as total')
                  ->from('vaucher')
                  ->where('customerID',$cusid)
                  ->where('vauchertype','Credit Voucher')
                  ->get()
                  ->row();
  return $query; 
}

public function customer_returns_details($cusid)
  {
  $query = $this->db->select('SUM(`paidAmount`) as total')
                  ->from('returns')
                  ->where('customerID',$cusid)
                  ->get()
                  ->row();
  return $query; 
}

public function get_profile_data()
  {
  $query = $this->db->select('*')
                ->from('users')
                ->where('uid',$_SESSION['uid'])
                ->get()
                ->row();
  return $query;
}

public function current_password_check($cpassword)
  {
  return $this->db->select('*')
                ->from('users')
                ->where('password',$cpassword)
                ->get()
                ->row();
}

public function get_sales_data()
  {
  $query = $this->db->select('
                          sales.*,
                          customers.cus_id,
                          customers.customerName,
                          users.empid,
                          users.name')
                  ->from('sales')
                  ->join('customers','customers.customerID = sales.customerID','left')
                  ->join('users','users.uid = sales.regby','left')
                  ->where('sales.compid',$_SESSION['compid'])
                  ->get()
                  ->result();
  return $query;  
}

public function get_dsales_data($sdate,$edate,$customer,$employee)
  {
  if ($customer == 'All' && $employee == 'All')
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('sales.saleDate >=',$sdate)
                    ->where('sales.saleDate <=',$edate)
                    ->where('sales.compid',$_SESSION['compid'])
                    ->get()
                    ->result();
    }
  else if ($customer == 'All')
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('sales.saleDate >=',$sdate)
                    ->where('sales.saleDate <=',$edate)
                    ->where('sales.regby',$employee)
                    ->get()
                    ->result();
    }
  else if ($employee == 'All')
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('sales.saleDate >=',$sdate)
                    ->where('sales.saleDate <=',$edate)
                    ->where('sales.customerID',$customer)
                    ->get()
                    ->result();
    }
  else
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('sales.saleDate >=',$sdate)
                    ->where('sales.saleDate <=',$edate)
                    ->where('sales.customerID',$customer)
                    ->where('sales.regby',$employee)
                    ->get()
                    ->result();
    }
  return $query;  
}

public function get_msales_data($month,$year,$customer,$employee)
  {
  if ($customer == 'All' && $employee == 'All')
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('MONTH(sales.saleDate)',$month)
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sales.compid',$_SESSION['compid'])
                    ->get()
                    ->result();
    }
  else if ($customer == 'All')
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('MONTH(sales.saleDate)',$month)
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sales.regby',$employee)
                    ->get()
                    ->result();
    }
  else if ($employee == 'All')
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('MONTH(sales.saleDate)',$month)
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sales.customerID',$customer)
                    ->get()
                    ->result();
    }
  else
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('MONTH(sales.saleDate)',$month)
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sales.customerID',$customer)
                    ->where('sales.regby',$employee)
                    ->get()
                    ->result();
    }
  return $query;  
}

public function get_ysales_data($year,$customer,$employee)
  {
  if ($customer == 'All' && $employee == 'All')
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sales.compid',$_SESSION['compid'])
                    ->get()
                    ->result();
    }
  else if ($customer == 'All')
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sales.regby',$employee)
                    ->get()
                    ->result();
    }
  else if ($employee == 'All')
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sales.customerID',$customer)
                    ->get()
                    ->result();
    }
  else
    {
    $query = $this->db->select('
                            sales.*,
                            customers.cus_id,
                            customers.customerName,
                            users.empid,
                            users.name')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->join('users','users.uid = sales.regby','left')
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sales.customerID',$customer)
                    ->where('sales.regby',$employee)
                    ->get()
                    ->result();
    }
  return $query;  
}

public function get_purchses_data()
  {
  $query = $this->db->select('
                          purchase.*,
                          suppliers.sup_id,
                          suppliers.supplierName,users.name')
                  ->from('purchase')
                  ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                  ->join('users','users.uid = purchase.regby','left')
                  ->where('purchase.compid',$_SESSION['compid'])
                  ->get()
                  ->result();
  return $query;
}

public function get_dpurchses_data($sdate,$edate,$supplier,$user)
  {
    if ($supplier == 'All' && $user == 'All')
      {
        $query = $this->db->select('
                          purchase.*,
                          suppliers.sup_id,
                          suppliers.supplierName,users.name,users.uid')
                  ->from('purchase')
                  ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                  ->join('users','users.uid = purchase.regby','left')
                  ->where('purchase.purchaseDate >=',$sdate)
                  ->where('purchase.purchaseDate <=',$edate)                
                  ->where('purchase.compid',$_SESSION['compid'])
                  ->get()
                  ->result();
      }
    else if($user != 'All' && $supplier == 'All'){
        $query = $this->db->select('
                          purchase.*,
                          suppliers.sup_id,
                          suppliers.supplierName,users.name,users.uid')
                  ->from('purchase')
                  ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                  ->join('users','users.uid = purchase.regby','left')
                  ->where('purchase.purchaseDate >=',$sdate)
                  ->where('purchase.purchaseDate <=',$edate)               
                  ->where('purchase.regby',$user)
                  ->get()
                  ->result();
      }
      else if($user != 'All' && $supplier != 'All'){
        $query = $this->db->select('
                            purchase.*,
                            suppliers.sup_id,
                            suppliers.supplierName,users.name,users.uid')
                    ->from('purchase')
                    ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                    ->join('users','users.uid = purchase.regby','left')
                    ->where('purchase.purchaseDate >=',$sdate)
                    ->where('purchase.purchaseDate <=',$edate)                 
                    ->where('purchase.regby',$user)
                    ->where('purchase.supplier',$supplier)
                    ->get()
                    ->result();
        }else{
        $query = $this->db->select('
                          purchase.*,
                          suppliers.sup_id,
                          suppliers.supplierName,users.name,users.uid')
                  ->from('purchase')
                  ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                  ->join('users','users.uid = purchase.regby','left')
                  ->where('purchase.purchaseDate >=',$sdate)
                  ->where('purchase.purchaseDate <=',$edate)
                  ->where('purchase.supplier',$supplier)
                  ->get()
                  ->result();
      }
    return $query;  
}

public function get_mpurchses_data($month,$year,$supplier,$user)
  {
  if ($supplier == 'All' && $user == 'All')
    {
      $query = $this->db->select('
                        purchase.*,
                        suppliers.sup_id,
                        suppliers.supplierName,users.name,users.uid')
                ->from('purchase')
                ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                ->join('users','users.uid = purchase.regby','left')
                ->where('MONTH(purchaseDate)',$month)
                ->where('YEAR(purchaseDate)',$year)                
                ->where('purchase.compid',$_SESSION['compid'])
                ->get()
                ->result();
    }
  else if($user != 'All' && $supplier == 'All'){
      $query = $this->db->select('
                        purchase.*,
                        suppliers.sup_id,
                        suppliers.supplierName,users.name,users.uid')
                ->from('purchase')
                ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                ->join('users','users.uid = purchase.regby','left')
                ->where('MONTH(purchaseDate)',$month)
                ->where('YEAR(purchaseDate)',$year)                
                ->where('purchase.regby',$user)
                ->get()
                ->result();
    }
    else if($user != 'All' && $supplier != 'All'){
      $query = $this->db->select('
                          purchase.*,
                          suppliers.sup_id,
                          suppliers.supplierName,users.name,users.uid')
                  ->from('purchase')
                  ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                  ->join('users','users.uid = purchase.regby','left')
                  ->where('MONTH(purchaseDate)',$month)
                  ->where('YEAR(purchaseDate)',$year)                  
                  ->where('purchase.regby',$user)
                  ->where('purchase.supplier',$supplier)
                  ->get()
                  ->result();
      }else{
      $query = $this->db->select('
                        purchase.*,
                        suppliers.sup_id,
                        suppliers.supplierName,users.name,users.uid')
                ->from('purchase')
                ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                ->join('users','users.uid = purchase.regby','left')
                ->where('MONTH(purchaseDate)',$month)
                ->where('YEAR(purchaseDate)',$year)
                ->where('purchase.supplier',$supplier)
                ->get()
                ->result();
    }
  return $query;  
}

public function get_ypurchses_data($year,$supplier,$user)
  {
  if ($supplier == 'All' && $user == 'All')
    {
      $query = $this->db->select('
                        purchase.*,
                        suppliers.sup_id,
                        suppliers.supplierName,users.name,users.uid')
                ->from('purchase')
                ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                ->join('users','users.uid = purchase.regby','left')
                ->where('YEAR(purchaseDate)',$year)
                ->where('purchase.compid',$_SESSION['compid'])
                ->get()
                ->result();
    }
  else if($user != 'All' && $supplier == 'All'){
      $query = $this->db->select('
                        purchase.*,
                        suppliers.sup_id,
                        suppliers.supplierName,users.name,users.uid')
                ->from('purchase')
                ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                ->join('users','users.uid = purchase.regby','left')
                ->where('YEAR(purchaseDate)',$year)
                ->where('purchase.regby',$user)
                ->get()
                ->result();
    }
    else if($user != 'All' && $supplier != 'All'){
      $query = $this->db->select('
                          purchase.*,
                          suppliers.sup_id,
                          suppliers.supplierName,users.name,users.uid')
                  ->from('purchase')
                  ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                  ->join('users','users.uid = purchase.regby','left')
                  ->where('YEAR(purchaseDate)',$year)
                  ->where('purchase.regby',$user)
                  ->where('purchase.supplier',$supplier)
                  ->get()
                  ->result();
      }else{
      $query = $this->db->select('
                        purchase.*,
                        suppliers.sup_id,
                        suppliers.supplierName,users.name,users.uid')
                ->from('purchase')
                ->join('suppliers','suppliers.supplierID = purchase.supplier','left')
                ->join('users','users.uid = purchase.regby','left')
                ->where('YEAR(purchaseDate)',$year)
                ->where('purchase.supplier',$supplier)
                ->get()
                ->result();
    }
  return $query;  
}

public function total_sales_amount()
  {
  $query = $this->db->select("SUM(paidAmount) as total, SUM(totalAmount) as ttotal")
                  ->FROM('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query;  
}

public function total_service_sales_amount()
  {
  $query = $this->db->select("SUM(pAmount) as total,SUM(amount) as ttotal")
                  ->FROM('service_sale')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query;  
}

public function total_purchases_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total,SUM(`totalPrice`) as ttotal")
                  ->FROM('purchase')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query;  
}

public function total_emp_payments_amount()
  {
  $query = $this->db->select("SUM(`paid`) as total,SUM(`paid`) as paid")
                  ->FROM('employee_payment')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query;  
}

public function total_returns_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query;  
}
public function total_preturns_amount()
  {
  $query = $this->db->select("SUM(`paidPrice`) as total")
                  ->FROM('preturns')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query;  
}
public function total_area_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query;  
}

public function total_cvoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Credit Voucher')
                   ->where('status',1)
                  ->get()
                  ->row();
  return $query;  
}

public function total_dvoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Debit Voucher')
                   ->where('status',1)
                  ->get()
                  ->row();
  return $query;  
}

public function total_svoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Supplier Pay')
                   ->where('status',1)
                  ->get()
                  ->row();
  return $query;  
}
// cogs= cost of goods sold
public function total_cogs_amount()
  {
  $query = $this->db->select("sale_product.quantity, products.productID,products.pprice")
                  ->FROM('sale_product')
                  ->join('products','products.productID=sale_product.productID','left')
                  // ->join('purchase_product','products.productID=purchase_product.productID','left')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->result();

  // $query = $this->db->select("sale_product.quantity, products.productID")
  //                 ->FROM('products')
  //                 ->join('sale_product','products.productID=sale_product.productID','left')
  //                 // ->join('purchase_product','products.productID=purchase_product.productID','left')
  //                 ->where('compid',$_SESSION['compid'])
  //                 ->get()
  //                 ->result();
  return $query;  
}

public function total_dcogs_amount($sdate,$edate)
  {
  $query = $this->db->select("purchase_product.pprice, sale_product.quantity, products.productID")
                  ->FROM('products')
                  ->join('sale_product','products.productID=sale_product.productID','left')
                  ->join('purchase_product','products.productID=purchase_product.productID','left')
                  ->where('compid',$_SESSION['compid'])
                  ->where('products.regdate >=', $sdate)
                  ->where('products.regdate <=', $edate)
                  ->get()
                  ->result();
  return $query;  
}

public function total_mcogs_amount($month,$year)
  {
  $query = $this->db->select("purchase_product.pprice, sale_product.quantity, products.productID")
                  ->FROM('products')
                  ->join('sale_product','products.productID=sale_product.productID','left')
                  ->join('purchase_product','products.productID=purchase_product.productID','left')
                  ->where('compid',$_SESSION['compid'])
                  ->where('MONTH(products.regdate)',$month)
                  ->where('YEAR(products.regdate)',$year)
                  ->get()
                  ->result();
  return $query;  
}
public function total_ycogs_amount($year)
  {
  $query = $this->db->select("purchase_product.pprice, sale_product.quantity, products.productID")
                  ->FROM('products')
                  ->join('sale_product','products.productID=sale_product.productID','left')
                  ->join('purchase_product','products.productID=purchase_product.productID','left')
                  ->where('compid',$_SESSION['compid'])
                  ->where('YEAR(products.regdate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function total_dsales_amount($sdate,$edate)
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('sales')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('sales.saleDate >=', $sdate)
                  ->where('sales.saleDate <=', $edate)
                  ->get()
                  ->row();
  return $query;  
}
public function total_dservice_sales_amount($sdate,$edate)
  {
  $query = $this->db->select("SUM(`pAmount`) as total")
                  ->FROM('service_sale')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('service_sale.regdate >=', $sdate)
                  ->where('service_sale.regdate <=', $edate)
                  ->get()
                  ->row();
  return $query;  
}


public function total_dpurchases_amount($sdate,$edate)
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('purchase')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('purchaseDate >=', $sdate)
                  ->where('purchaseDate <=', $edate)
                  ->get()
                  ->row();
  return $query;  
}

public function total_demp_payments_amount($sdate,$edate)
  {
  $query = $this->db->select("SUM(`salary`) as total,SUM(`paid`) as paid")
                  ->FROM('employee_payment')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('regdate >=', $sdate)
                  ->where('regdate <=', $edate)
                  ->get()
                  ->row();
  return $query;  
}

public function total_dreturns_amount($sdate,$edate)
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('returnDate >=', $sdate)
                  ->where('returnDate <=', $edate)
                  ->get()
                  ->row();
  return $query;  
}

public function total_dcvoucher_amount($sdate,$edate)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Credit Voucher')
                  ->where('voucherdate >=', $sdate)
                  ->where('voucherdate <=', $edate)
                  ->get()
                  ->row();
  return $query;  
}

public function total_ddvoucher_amount($sdate,$edate)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Debit Voucher')
                  ->where('voucherdate >=', $sdate)
                  ->where('voucherdate <=', $edate)
                  ->get()
                  ->row();
  return $query;  
}

public function total_dsvoucher_amount($sdate,$edate)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Supplier Pay')
                  ->where('voucherdate >=', $sdate)
                  ->where('voucherdate <=', $edate)
                  ->get()
                  ->row();
  return $query;  
}

public function total_msales_amount($month,$year)
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('sales')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('MONTH(sales.regdate)',$month)
                  ->where('YEAR(sales.regdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}
public function total_mservice_sales_amount($month,$year)
  {
  $query = $this->db->select("SUM(`pAmount`) as total")
                  ->FROM('service_sale')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('MONTH(service_sale.regdate)',$month)
                  ->where('YEAR(service_sale.regdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_mpurchases_amount($month,$year)
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('purchase')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('MONTH(purchaseDate)',$month)
                  ->where('YEAR(purchaseDate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_memp_payments_amount($month,$year)
  {
  $query = $this->db->select("SUM(`salary`) as total,SUM(`paid`) as paid")
                  ->FROM('employee_payment')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('MONTH(regdate)',$month)
                  ->where('YEAR(regdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_mreturns_amount($month,$year)
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('MONTH(returnDate)',$month)
                  ->where('YEAR(returnDate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_mcvoucher_amount($month,$year)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Credit Voucher')
                  ->where('MONTH(voucherdate)',$month)
                  ->where('YEAR(voucherdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_mdvoucher_amount($month,$year)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Debit Voucher')
                  ->where('MONTH(voucherdate)',$month)
                  ->where('YEAR(voucherdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_msvoucher_amount($month,$year)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Supplier Pay')
                  ->where('MONTH(voucherdate)',$month)
                  ->where('YEAR(voucherdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_ysales_amount($year)
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('sales')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('YEAR(sales.regdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}
public function total_yservice_sales_amount($year)
  {
  $query = $this->db->select("SUM(`pAmount`) as total")
                  ->FROM('service_sale')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('YEAR(service_sale.regdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_ypurchases_amount($year)
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('purchase')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('YEAR(purchaseDate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_yemp_payments_amount($year)
  {
  $query = $this->db->select("SUM(`salary`) as total,SUM(`paid`) as paid")
                  ->FROM('employee_payment')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('YEAR(regdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_yreturns_amount($year)
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->where('YEAR(returnDate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_ycvoucher_amount($year)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Credit Voucher')
                  ->where('YEAR(voucherdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_ydvoucher_amount($year)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Debit Voucher')
                  ->where('YEAR(voucherdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function total_ysvoucher_amount($year)
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->WHERE('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Supplier Pay')
                  ->where('YEAR(voucherdate)',$year)
                  ->get()
                  ->row();
  return $query;  
}

public function check_email($empemail)
  {
  return $this->db->select('*')
                    ->from('users')
                    ->where('email',$empemail)
                    ->get()
                    ->row();
}

public function check_mobile_number($mid)
  {
  return $this->db->select('*')
                    ->from('users')
                    ->where('mobile',$mid)
                    ->get()
                    ->row();
}

public function sales_cust_ledger_data($customer)
  {
  $query = $this->db->select("*")
                  ->FROM('sales')
                  ->WHERE('customerID',$customer)
                  ->get()
                  ->result();
  return $query;  
}

public function voucher_cust_ledger_data($customer)
  {
  $query = $this->db->select("vaucher.*")
                  ->FROM('vaucher')
                  ->join('vaucher_particular','vaucher_particular.vuid=vaucher.vuid','left')
                  ->WHERE('vaucher_particular.vutid',$customer)
                  ->where('vaucher.vauchertype','Credit Voucher')
                  ->get()
                  ->result();
  return $query;  
}

public function return_cust_ledger_data($customer)
  {
  $query = $this->db->select("*")
                  ->FROM('returns')
                  ->WHERE('customerID',$customer)
                  ->get()
                  ->result();
  return $query;  
}

public function sales_dcust_ledger_data($customer,$sdate,$edate)
  {
  $query = $this->db->select("*")
                  ->FROM('sales')
                  ->WHERE('customerID',$customer)
                  ->where('saleDate >=', $sdate)
                  ->where('saleDate <=', $edate)
                  ->get()
                  ->result();
  return $query;  
}

public function voucher_dcust_ledger_data($customer,$sdate,$edate)
  {

$query = $this->db->select("vaucher.*")
                  ->FROM('vaucher')
                  ->join('vaucher_particular','vaucher_particular.vuid=vaucher.vuid','left')
                  ->WHERE('vaucher_particular.vutid',$customer)
                  ->where('vaucher.voucherdate >=', $sdate)
                  ->where('vaucher.voucherdate <=', $edate)
                  ->where('vaucher.vauchertype','Credit Voucher')
                  ->get()
                  ->result();
  // $query = $this->db->select("*")
  //                 ->FROM('vaucher')
  //                 ->WHERE('customerID',$customer)
  //                 ->where('voucherdate >=', $sdate)
  //                 ->where('voucherdate <=', $edate)
  //                 ->where('vauchertype','Credit Voucher')
  //                 ->get()
  //                 ->result();
  return $query;  
}

public function return_dcust_ledger_data($customer,$sdate,$edate)
  {
  $query = $this->db->select("*")
                  ->FROM('returns')
                  ->WHERE('customerID',$customer)
                  ->where('returnDate >=', $sdate)
                  ->where('returnDate <=', $edate)
                  ->get()
                  ->result();
  return $query;  
}

public function sales_mcust_ledger_data($customer,$month,$year)
  {
  $query = $this->db->select("*")
                  ->FROM('sales')
                  ->WHERE('customerID',$customer)
                  ->where('MONTH(saleDate)',$month)
                  ->where('YEAR(saleDate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function voucher_mcust_ledger_data($customer,$month,$year)
  {

  $query = $this->db->select("vaucher.*")
                  ->FROM('vaucher')
                  ->join('vaucher_particular','vaucher_particular.vuid=vaucher.vuid','left')
                  ->WHERE('vaucher_particular.vutid',$customer)
                  ->where('MONTH(vaucher.voucherdate)',$month)
                  ->where('YEAR(vaucher.voucherdate)',$year)
                  ->where('vaucher.vauchertype','Credit Voucher')
                  ->get()
                  ->result();
  // $query = $this->db->select("*")
  //                 ->FROM('vaucher')
  //                 ->WHERE('customerID',$customer)
  //                 ->where('MONTH(voucherdate)',$month)
  //                 ->where('YEAR(voucherdate)',$year)
  //                 ->where('vauchertype','Credit Voucher')
  //                 ->get()
  //                 ->result();
  return $query;  
}

public function return_mcust_ledger_data($customer,$month,$year)
  {
  $query = $this->db->select("*")
                  ->FROM('returns')
                  ->WHERE('customerID',$customer)
                  ->where('MONTH(returnDate)',$month)
                  ->where('YEAR(returnDate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function sales_ycust_ledger_data($customer,$year)
  {
  $query = $this->db->select("*")
                  ->FROM('sales')
                  ->WHERE('customerID',$customer)
                  ->where('YEAR(saleDate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function voucher_ycust_ledger_data($customer,$year)
  {

    $query = $this->db->select("vaucher.*")
                  ->FROM('vaucher')
                  ->join('vaucher_particular','vaucher_particular.vuid=vaucher.vuid','left')
                  ->WHERE('vaucher_particular.vutid',$customer)
                  ->where('YEAR(vaucher.voucherdate)',$year)
                  ->where('vaucher.vauchertype','Credit Voucher')
                  ->get()
                  ->result();
  // $query = $this->db->select("*")
  //                 ->FROM('vaucher')
  //                 ->WHERE('customerID',$customer)
  //                 ->where('YEAR(voucherdate)',$year)
  //                 ->where('vauchertype','Credit Voucher')
  //                 ->get()
  //                 ->result();
    return $query;  
}

public function return_ycust_ledger_data($customer,$year)
  {
  $query = $this->db->select("*")
                  ->FROM('returns')
                  ->WHERE('customerID',$customer)
                  ->where('YEAR(returnDate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function get_voucher_data()
  {
  $query = $this->db->select("*")
                  ->from('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->result();
  return $query;  
}

public function get_dall_voucher_data($sdate,$edate,$vtype)
  {
  if($vtype == 'All')
    {
    $query = $this->db->select("*")
                    ->from('vaucher')
                    ->where('voucherdate >=', $sdate)
                    ->where('voucherdate <=', $edate)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
    }
  else
    {
    $query = $this->db->select("*")
                    ->from('vaucher')
                    ->where('voucherdate >=', $sdate)
                    ->where('voucherdate <=', $edate)
                    ->where('vauchertype',$vtype)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
    }
  return $query;  
}

public function get_mall_voucher_data($month,$year,$vtype)
  {
  if($vtype == 'All')
    {
    $query = $this->db->select("*")
                    ->from('vaucher')
                    ->where('MONTH(voucherdate)',$month)
                    ->where('YEAR(voucherdate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
    }
  else
    {
    $query = $this->db->select("*")
                    ->from('vaucher')
                    ->where('MONTH(voucherdate)',$month)
                    ->where('YEAR(voucherdate)',$year)
                    ->where('vauchertype',$vtype)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
    }
  return $query;  
}

public function get_yall_voucher_data($year,$vtype)
  {
  if($vtype == 'All')
    {
    $query = $this->db->select("*")
                    ->from('vaucher')
                    ->where('YEAR(voucherdate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
    }
  else
    {
    $query = $this->db->select("*")
                    ->from('vaucher')
                    ->where('YEAR(voucherdate)',$year)
                    ->where('vauchertype',$vtype)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
    }
  return $query;  
}

public function today_sales_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalAmount`) as total")
                  ->FROM('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->where('saleDate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_cservice_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`pAmount`) as total")
                  ->FROM('service_sale')
                  ->where('compid',$_SESSION['compid'])
                  ->where('ssDate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_purchases_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalPrice`) as total")
                  ->FROM('purchase')
                  ->where('compid',$_SESSION['compid'])
                  ->where('purchaseDate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_emp_payments_amount()
  {
  $d = date('d');
  $m = date('m');
  $y = date('Y');
  $query = $this->db->select("SUM(`salary`) as total,SUM(`paid`) as paid")
                  ->FROM('employee_payment')
                  ->where('compid',$_SESSION['compid'])
                  ->where('DAY(regdate)',$d)
                  ->where('MONTH(regdate)',$m)
                  ->where('YEAR(regdate)',$y)
                  ->get()
                  ->row();
  return $query;  
}

public function today_returns_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->where('compid',$_SESSION['compid'])
                  ->where('returnDate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_cpreturns_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalPrice`) as total")
                  ->FROM('preturns')
                  ->where('compid',$_SESSION['compid'])
                  ->where('prDate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_cvoucher_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Credit Voucher')
                  ->where('voucherdate',$date)
                  ->where('status',1)
                  ->get()
                  ->row();
  return $query;  
}

public function today_dvoucher_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Debit Voucher')
                  ->where('voucherdate',$date)
                  ->where('status',1)
                  ->get()
                  ->row();
  return $query;  
}

public function today_svoucher_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Supplier Pay')
                  ->where('voucherdate',$date)
                  ->where('status',1)
                  ->get()
                  ->row();
  return $query;  
}

public function pre_sales_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->where('saleDate <',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function pre_purchases_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('purchase')
                  ->where('compid',$_SESSION['compid'])
                  ->where('purchaseDate <',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function pre_emp_payments_amount()
  {
  $d = date('d');
  $m = date('m');
  $y = date('Y');
  $query = $this->db->select("SUM(`salary`) as total")
                  ->FROM('employee_payment')
                  ->where('compid',$_SESSION['compid'])
                  ->where('DAY(regdate) <',$d)
                  ->where('MONTH(regdate) <=',$m)
                  ->where('YEAR(regdate) <=',$y)
                  ->get()
                  ->row();
  return $query;  
}

public function pre_returns_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->where('compid',$_SESSION['compid'])
                  ->where('returnDate <',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function pre_cvoucher_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Credit Voucher')
                  ->where('voucherdate <',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function pre_dvoucher_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Debit Voucher')
                  ->where('voucherdate <',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function pre_svoucher_amount()
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Supplier Pay')
                  ->where('voucherdate <',$date)
                  ->get()
                  ->row();
  return $query;  
}
public function get_product_data()
  {
  $query = $this->db->select("products.*,categories.categoryName,sma_units.unitName")
                  ->from('products')
                  ->join('categories','categories.categoryID = products.categoryID', 'left')
                  ->join('sma_units','sma_units.id = products.unit', 'left')
                  ->get()
                  ->result();
  return $query;  
}


public function get_all_product_data($pType)
  {
  $query = $this->db->select("products.*,categories.categoryName,sma_units.unitName")
                      ->from('products')
                      ->join('categories','categories.categoryID = products.categoryID', 'left')
                      ->join('sma_units','sma_units.id = products.unit', 'left')
                    ->where('pType',$pType)
                    ->get()
                    ->result();
  return $query;  
}

public function get_sales_product_data()
  {
  $query = $this->db->select('sale_product.*,sales.invoice_no,sales.saleDate,products.productName,products.productcode,customers.customerName,customers.mobile')
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID', 'left')
                    ->join('products','products.productID = sale_product.productID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid', $_SESSION['compid'])
                    ->order_by('sale_product.saleID', 'DESC' ) 
                    // ->limit(10000)
                    ->get()
                    ->result();

  return $query;  
}

public function get_dsales_product_data($sdate,$edate,$pid)
  {
  if($pid == 'All')
    {
    $query = $this->db->select('sale_product.*,sales.invoice_no,sales.saleDate,products.productName,products.productcode,customers.customerName,customers.mobile')
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID', 'left')
                    ->join('products','products.productID = sale_product.productID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid', $_SESSION['compid'])
                    ->where('sales.saleDate >=',$sdate)
                    ->where('sales.saleDate <=',$edate)
                    ->get()
                    ->result();
    }
  else
    {
    $query = $this->db->select('sale_product.*,sales.invoice_no,sales.saleDate,products.productName,products.productcode,customers.customerName,customers.mobile')
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID', 'left')
                    ->join('products','products.productID = sale_product.productID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid', $_SESSION['compid'])
                    ->where('sales.saleDate >=',$sdate)
                    ->where('sales.saleDate <=',$edate)
                    ->where('sale_product.productID',$pid)
                    ->get()
                    ->result();
    }
  return $query;  
}

public function get_msales_product_data($month,$year,$pid)
  {
  if($pid == 'All')
    {
    $query = $this->db->select('sale_product.*,sales.invoice_no,sales.saleDate,products.productName,products.productcode,customers.customerName,customers.mobile')
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID', 'left')
                    ->join('products','products.productID = sale_product.productID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid', $_SESSION['compid'])
                    ->where('MONTH(sales.saleDate)',$month)
                    ->where('YEAR(sales.saleDate)',$year)
                    ->get()
                    ->result();
    }
  else
    {
    $query = $this->db->select('sale_product.*,sales.invoice_no,sales.saleDate,products.productName,products.productcode,customers.customerName,customers.mobile')
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID', 'left')
                    ->join('products','products.productID = sale_product.productID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid', $_SESSION['compid'])
                    ->where('MONTH(sales.saleDate)',$month)
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sale_product.productID',$pid)
                    ->get()
                    ->result();
    }
  return $query;  
}

public function get_ysales_product_data($year,$pid)
  {
  if($pid == 'All')
    {
    $query = $this->db->select('sale_product.*,sales.invoice_no,sales.saleDate,products.productName,products.productcode,customers.customerName,customers.mobile')
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID', 'left')
                    ->join('products','products.productID = sale_product.productID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid', $_SESSION['compid'])
                    ->where('YEAR(sales.saleDate)',$year)
                    ->get()
                    ->result();
    }
  else
    {
    $query = $this->db->select('sale_product.*,sales.invoice_no,sales.saleDate,products.productName,products.productcode,customers.customerName,customers.mobile')
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID', 'left')
                    ->join('products','products.productID = sale_product.productID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid', $_SESSION['compid'])
                    ->where('YEAR(sales.saleDate)',$year)
                    ->where('sale_product.productID',$pid)
                    ->get()
                    ->result();
    }
  return $query;  
}

public function get_dspurchase_data($sdate,$edate,$sid)
  {
  $query = $this->db->select('*')
                  ->from('purchase')
                  ->where('purchaseDate >=', $sdate)
                  ->where('purchaseDate <=', $edate)
                  ->where('supplier',$sid)
                  ->get()
                  ->result();

  return $query;  
}

public function get_dsvoucher_data($sdate,$edate,$sid)
  {
  $query = $this->db->select('*')
                  ->from('vaucher')
                  ->join('vaucher_particular','vaucher_particular.vuid=vaucher.vuid','left')
                  ->WHERE('vutype',3)
                  ->WHERE('vutid',$sid)
                  ->where('voucherdate >=', $sdate)
                  ->where('voucherdate <=', $edate)
                  ->where_not_in('vauchertype','Credit Voucher')
                  ->get()
                  ->result();

  return $query;  
}

public function get_mspurchase_data($month,$year,$sid)
  {
  $query = $this->db->select('*')
                  ->from('purchase')
                  ->where('MONTH(purchaseDate)',$month)
                  ->where('YEAR(purchaseDate)',$year)
                  ->where('supplier',$sid)
                  ->get()
                  ->result();

  return $query;  
}

public function get_msvoucher_data($month,$year,$sid)
  {
  $query = $this->db->select('*')
              ->from('vaucher')
              ->join('vaucher_particular','vaucher_particular.vuid=vaucher.vuid','left')
              ->WHERE('vutype',3)
              ->WHERE('vutid',$sid)
              ->where('MONTH(voucherdate)',$month)
              ->where('YEAR(voucherdate)',$year)
              ->where_not_in('vauchertype','Credit Voucher')
              ->get()
              ->result();

  return $query;  
}

public function get_yspurchase_data($year,$sid)
  {
  $query = $this->db->select('*')
              ->from('purchase')
              ->where('YEAR(purchaseDate)',$year)
              ->where('supplier',$sid)
              ->get()
              ->result();

  return $query;  
}

public function get_ysvoucher_data($year,$sid)
  {
  $query = $this->db->select('*')
              ->from('vaucher')
              ->join('vaucher_particular','vaucher_particular.vuid=vaucher.vuid','left')
              ->WHERE('vutype',3)
              ->WHERE('vutid',$sid)
              ->where('YEAR(voucherdate)',$year)
              ->where_not_in('vauchertype','Credit Voucher')
              ->get()
              ->result();

  return $query;  
}

public function total_category()
  {
  $query = $this->db->select('*')
                ->from('categories')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_unit()
  {
  $query = $this->db->select('*')
                ->from('sma_units')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_expense_type()
  {
  $query = $this->db->select('*')
                ->from('cost_type')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_depertment()
  {
  $query = $this->db->select('*')
                ->from('department')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}
public function total_area()
  {
  $query = $this->db->select('*')
                ->from('territory')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_bank_account()
  {
  $query = $this->db->select('*')
                ->from('bankaccount')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_mobile_account()
  {
  $query = $this->db->select('*')
                ->from('mobileaccount')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_notice()
  {
  $query = $this->db->select('*')
                ->from('notice')
                ->or_where('ntype','All')
                ->or_where('ntype',$_SESSION['uid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_user_type()
  {
  $query = $this->db->select('*')
                ->from('access_lavels')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function product_fetch_data()
  {
  $this->db->order_by("productID","DESC");
  $this->db->where('compid',$_SESSION['compid']);
  $query = $this->db->get("products");
  
  return $query->result();
}

public function insert_product_data($data)
  {
  $this->db->insert_batch('products',$data);
}

public function get_purchase_payment($id)
  {
  $query = $this->db->select('paidAmount,due')
              ->from('purchase')
              ->where('purchaseID',$id)
              ->get()
              ->row();
  return $query; 
}

public function get_sales_payment($id)
  {
  $query = $this->db->select('paidAmount,dueamount')
              ->from('sales')
              ->where('saleID',$id)
              ->get()
              ->row();
  return $query; 
}

public function total_customer()
  {
  $query = $this->db->select('*')
                ->from('customers')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_supplier()
  {
  $query = $this->db->select('*')
                ->from('suppliers')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_employee()
  {
  $query = $this->db->select('*')
                ->from('employees')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_user()
  {
  $query = $this->db->select('*')
                ->from('users')
                ->where('compid',$_SESSION['compid'])
                ->get();

  $count_row = $query->num_rows();

  return $count_row;
}

public function total_products()
  {
  $query = $this->db->select('*')
                ->from('products')
                ->where('compid',$_SESSION['compid'])
                ->get();

    $count_row = $query->num_rows();

  return $count_row;
}

public function total_sale()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total, sales.compid")
                  ->FROM('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query;  
}

public function total_purchase()
  {
  $query = $this->db->select("SUM(`totalPrice`) as total")
                  ->FROM('purchase')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
  return $query;  
}

public function total_stock()
  {
  $query = $this->db->select('SUM(`totalPices`) as total')
                ->from('stock')
                ->where('compid',$_SESSION['compid'])
                ->get()
                ->row();
  return $query;
}

public function total_voucher()
    {
    $query = $this->db->select("SUM(`totalamount`) as total")
                    ->FROM('vaucher')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->row();
    return $query;  
}

public function get_stock_data($id)
  {
  $query = $this->db->select('totalPices')
                ->from('stock')
                ->where('product',$id)
                ->where('compid',$_SESSION['compid'])
                ->get()
                ->row();
  return $query;
}

public function customer_fetch_data($compid)
  {
  $this->db->where('compid',$compid);
  $query = $this->db->get("customers");
  return $query->result();
}

public function insert_customer_data($data)
  {
  $this->db->insert_batch('customers',$data);
}

public function supplier_fetch_data($compid)
  {
  $this->db->order_by("supplierID","DESC");
  $this->db->where('compid',$compid);
  $query = $this->db->get("suppliers");
  return $query->result();
}

public function insert_supplier_data($data)
  {
  $this->db->insert_batch('suppliers',$data);
}

public function count_all_user()
  {
  $query = $this->db->select('*')
                ->from('users')
                ->where('userrole',2)
                ->get();

  $count_row = $query->num_rows();
  return $count_row;
}

public function count_all_asset()
  {
  $query = $this->db->select('*')
                ->from('assets')
                // ->where('userrole',2)
                ->get();

  $count_row = $query->num_rows();
  return $count_row;
}

public function count_all_active_user()
  {
  $query = $this->db->select('*')
                ->from('users')
                ->where('userrole',2)
                ->where('status','Active')
                ->get();

  $count_row = $query->num_rows();
  return $count_row;
}

public function count_all_inactive_user()
  {
  $query = $this->db->select('*')
                ->from('users')
                ->where('userrole',2)
                ->where('status','Inactive')
                ->get();

  $count_row = $query->num_rows();
  return $count_row;
}

public function count_all_today_user()
  {
  $d = date('d'); $m = date('m'); $y = date('Y');

  $query = $this->db->select('*')
                ->from('users')
                ->where('userrole',2)
                ->where('DAY(regdate)',$d)
                ->where('MONTH(regdate)',$m)
                ->where('YEAR(regdate)',$y)
                ->get();

  $count_row = $query->num_rows();
  return $count_row;
}

public function count_all_month_user()
  {
  $m = date('m'); $y = date('Y');

  $query = $this->db->select('*')
                ->from('users')
                ->where('userrole',2)
                ->where('MONTH(regdate)',$m)
                ->where('YEAR(regdate)',$y)
                ->get();

  $count_row = $query->num_rows();
  return $count_row;
}

public function graph_data_point()
  {
  $date_arr = $this->getLastNDays(7, 'Y-m-d');
  $dataPoints = array();

  for($i = 0; $i < 7; $i++)
    {
    array_push($dataPoints, array("y" => $this->get_today_sale(preg_replace('/[^A-Za-z0-9\-]/','',$date_arr[$i])),"label" => preg_replace('/[^A-Za-z0-9\-]/','',$date_arr[$i])));
    }

    return $dataPoints;
}

public function get_today_sale($date)
  {
  $query = $this->db->select("SUM(`totalAmount`) as total")
                  ->FROM('sales')
                  ->where('saleDate',$date)
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();

  if($query->total)
    {
    return $query->total;
    }
  else
    {
    $dt = 0;
    return $dt;
    }
}

public function getLastNDays($days, $format = 'd-m-Y')
  {
  $m = date("m"); $de= date("d"); $y= date("Y");
  $dateArray = array();
  for($i=0; $i<=$days-1; $i++)
    {
    $dateArray[] = '"'.date($format, mktime(0,0,0,$m,($de-$i),$y)).'"'; 
    }
  return array_reverse($dateArray);
}

public function get_page_and_function()
  {
  $query = $this->db->select('
              tbl_page_functions.pfunc_id,
              tbl_page_functions.pageid,
              tbl_page_functions.fcname,
              tbl_pages.pageid,
              tbl_pages.master_page,
              tbl_pages.cname,
              tbl_master_page_title.master_id,
              tbl_master_page_title.c_master_title')
            ->from('tbl_pages')
            ->join('tbl_master_page_title','tbl_master_page_title.master_id = tbl_pages.master_page','left')
            ->join('tbl_page_functions','tbl_page_functions.pageid = tbl_pages.pageid','left')
            ->get()
            ->result();
  return $query;
}

public function saveNewMaster_data($data)
  {
  $column = $data['master_title'] ;
  $table = 'tbl_user_m_permission';

  $fields = array(
    'preferences' => array('type' => 'INT','constraint' => 5 )
      );

  $fields2 = array(
    'preferences' => array(
      'name' => $column ,
      'type' => 'INT',
      'constraint' => 5
        ),
      );
    // $add = mysql_query("ALTER TABLE $table ADD $column INT( 1 ) NOT NULL");
  $this->load->dbforge();
  $this->dbforge->add_column('tbl_user_m_permission',$fields);

  $this->load->dbforge();
  $add = $this->dbforge->modify_column('tbl_user_m_permission',$fields2);
  // var_dump($add); exit();
  return $this->db->insert('tbl_master_page_title', $data); 
}

public function saveNewPage_data($data)
  {
  $column = $data['pagename'] ;
  $table = 'tbl_user_p_permission';

  $fields = array(
    'preferences' => array('type' => 'INT','constraint' => 5 )
      );

  $fields2 = array(
    'preferences' => array(
      'name' => $column,
      'type' => 'INT',
      'constraint' => 5
        ),
      );
    // $add = mysql_query("ALTER TABLE $table ADD $column INT( 1 ) NOT NULL");
  $this->load->dbforge();
  $this->dbforge->add_column('tbl_user_p_permission',$fields);

  $this->load->dbforge();
  $add = $this->dbforge->modify_column('tbl_user_p_permission',$fields2);
    // var_dump($add); exit();
  return $this->db->insert('tbl_pages', $data); 
}

public function saveNewPageFunction_data($data)
  {
  $column = $data['pfunc_name'] ;
  $table = 'tbl_user_f_permission';

  $fields = array(
    'preferences' => array('type' => 'INT','constraint' => 5 )
      );

  $fields2 = array(
    'preferences' => array(
      'name' => $column,
      'type' => 'INT',
      'constraint' => 5
        ),
      );
    // $add = mysql_query("ALTER TABLE $table ADD $column INT( 1 ) NOT NULL");
  $this->load->dbforge();
  $this->dbforge->add_column('tbl_user_f_permission',$fields);

  $this->load->dbforge();
  $add = $this->dbforge->modify_column('tbl_user_f_permission', $fields2);
    // var_dump($add); exit();
  return $this->db->insert('tbl_page_functions',$data); 
}

public function get_page_data_by_master($id)
  {
  $query = $this->db->select('*')
            ->from('tbl_pages')
            ->where('master_page',$id)
            ->get()
            ->result();
  return $query;
}

public function get_user_permission_data()
  {
  $emp = $this->db->select('compid')
                ->from('tbl_user_m_permission')
                ->get()
                ->result_array();
  //var_dump($emp); exit();
  $emp_id = array_map (function($value){
    return $value['compid'];
    },$emp);

  if ($emp_id == null) {
    $emp_id = 0;
    }

  $emps = $this->db->select('compid,name,compname')
                ->from('users')
                ->where_not_in('compid',$emp_id)
                ->where('userrole',2)
                ->get()
                ->result();
  return $emps;
}

public function total_sales_product()
  {
  $query = $this->db->select("
                        SUM(sale_product.quantity) as tq,
                        SUM(sale_product.totalPrice) as ta,
                        sale_product.productID,
                        sales.compid")
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID','left')
                    ->group_by('productID')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
  return $query;
}

public function total_dsales_product($sdate,$edate)
  {
  $query = $this->db->select("
                        SUM(sale_product.quantity) as tq,
                        SUM(sale_product.totalPrice) as ta,
                        sale_product.productID,
                        sales.compid")
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID','left')
                    ->where('compid',$_SESSION['compid'])
                    ->where('saleDate >=', $sdate)
                    ->where('saleDate <=', $edate)
                    ->group_by('productID')
                    ->get()
                    ->result();
  return $query;
}

public function total_msales_product($month,$year)
  {
  $query = $this->db->select("
                        SUM(sale_product.quantity) as tq,
                        SUM(sale_product.totalPrice) as ta,
                        sale_product.productID,
                        sales.compid")
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID','left')
                    ->where('compid',$_SESSION['compid'])
                    ->where('MONTH(sale_product.regdate)',$month)
                    ->where('YEAR(sale_product.regdate)',$year)
                    ->group_by('productID')
                    ->get()
                    ->result();
  return $query;
}

public function total_ysales_product($year)
  {
  $query = $this->db->select("
                        SUM(sale_product.quantity) as tq,
                        SUM(sale_product.totalPrice) as ta,
                        sale_product.productID,
                        sales.compid")
                    ->from('sale_product')
                    ->join('sales','sales.saleID = sale_product.saleID','left')
                    ->where('compid',$_SESSION['compid'])
                    ->where('YEAR(sale_product.regdate)',$year)
                    ->group_by('productID')
                    ->get()
                    ->result();
  return $query;
}

public function get_help_reply_data($id)
  {
  $query = $this->db->select("help_support_reply.reply,users.name")
                    ->from('help_support_reply')
                    ->join('users','users.uid = help_support_reply.regby','left')
                    ->where('hp_id',$id)
                    ->get()
                    ->result();
  return $query;
}

public function get_user_notice_data($id)
  {
  $query = $this->db->select('*')
                  ->from('notice')
                  ->where('nid',$id)
                  ->get()
                  ->row();
  return $query; 
}

public function today_sales($cid)
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalAmount`) as total,SUM(`paidAmount`) as ptotal")
                  ->FROM('sales')
                  ->where('compid',$cid)
                  ->where('saleDate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_purchases($cid)
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalPrice`) as total,SUM(`paidAmount`) as ptotal")
                  ->FROM('purchase')
                  ->where('compid',$cid)
                  ->where('purchaseDate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_emp_payments($cid)
  {
  $d = date('d');
  $m = date('m');
  $y = date('Y');
  $query = $this->db->select("SUM(`salary`) as total")
                  ->FROM('employee_payment')
                  ->where('compid',$cid)
                  ->where('DAY(regdate)',$d)
                  ->where('MONTH(regdate)',$m)
                  ->where('YEAR(regdate)',$y)
                  ->get()
                  ->row();
  return $query;  
}

public function today_returns($cid)
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->where('compid',$cid)
                  ->where('returnDate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_cvouchers($cid)
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$cid)
                  ->WHERE('vauchertype','Credit Voucher')
                  ->where('voucherdate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_dvouchers($cid)
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$cid)
                  ->WHERE('vauchertype','Debit Voucher')
                  ->where('voucherdate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function today_svouchers($cid)
  {
  $date = date('Y-m-d');
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$cid)
                  ->WHERE('vauchertype','Supplier Pay')
                  ->where('voucherdate',$date)
                  ->get()
                  ->row();
  return $query;  
}

public function cash_sales_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Cash')
                  ->get()
                  ->row();
  return $query;  
}

public function cash_purchases_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('purchase')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Cash')
                  ->get()
                  ->row();
  return $query;  
}

public function cash_cvoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Credit Voucher')
                  ->where('accountType','Cash')
                  ->get()
                  ->row();
  return $query;  
}

public function cash_dvoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Debit Voucher')
                  ->where('accountType','Cash')
                  ->get()
                  ->row();
  return $query;  
}

public function cash_svoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Supplier Pay')
                  ->where('accountType','Cash')
                  ->get()
                  ->row();
  return $query;  
}

public function cash_emp_payments_amount()
  {
  $query = $this->db->select("SUM(`salary`) as total")
                  ->FROM('employee_payment')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Cash')
                  ->get()
                  ->row();
  return $query;  
}

public function cash_returns_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Cash')
                  ->get()
                  ->row();
  return $query;  
}

public function bank_sales_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Bank')
                  ->get()
                  ->row();
  return $query;  
}

public function bank_purchases_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('purchase')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Bank')
                  ->get()
                  ->row();
  return $query;  
}

public function bank_cvoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Credit Voucher')
                  ->where('accountType','Bank')
                  ->get()
                  ->row();
  return $query;  
}

public function bank_dvoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Debit Voucher')
                  ->where('accountType','Bank')
                  ->get()
                  ->row();
  return $query;  
}

public function bank_svoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Supplier Pay')
                  ->where('accountType','Bank')
                  ->get()
                  ->row();
  return $query;  
}

public function bank_emp_payments_amount()
  {
  $query = $this->db->select("SUM(`salary`) as total")
                  ->FROM('employee_payment')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Bank')
                  ->get()
                  ->row();
  return $query;  
}

public function bank_returns_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Bank')
                  ->get()
                  ->row();
  return $query;  
}

public function mobile_sales_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Mobile')
                  ->get()
                  ->row();
  return $query;  
}

public function mobile_purchases_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('purchase')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Mobile')
                  ->get()
                  ->row();
  return $query;  
}

public function mobile_cvoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Credit Voucher')
                  ->where('accountType','Mobile')
                  ->get()
                  ->row();
  return $query;  
}

public function mobile_dvoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Debit Voucher')
                  ->where('accountType','Mobile')
                  ->get()
                  ->row();
  return $query;  
}

public function mobile_svoucher_amount()
  {
  $query = $this->db->select("SUM(`totalamount`) as total")
                  ->FROM('vaucher')
                  ->where('compid',$_SESSION['compid'])
                  ->WHERE('vauchertype','Supplier Pay')
                  ->where('accountType','Mobile')
                  ->get()
                  ->row();
  return $query;  
}

public function mobile_emp_payments_amount()
  {
  $query = $this->db->select("SUM(`salary`) as total")
                  ->FROM('employee_payment')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Mobile')
                  ->get()
                  ->row();
  return $query;  
}

public function mobile_returns_amount()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total")
                  ->FROM('returns')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Mobile')
                  ->get()
                  ->row();
  return $query;  
}

public function cost_type_data()
  {
  $query = $this->db->select("*")
                  ->FROM('cost_type')
                  ->where('compid',$_SESSION['compid'])
                  ->or_where('compid','All')
                  ->get()
                  ->result();
  return $query;  
}

public function get_sma_units_data()
  {
  $query = $this->db->select("*")
                  ->FROM('sma_units')
                  ->where('compid',$_SESSION['compid'])
                  ->or_where('compid','All')
                  ->get()
                  ->result();
  return $query;  
}

public function get_salary_emp($id,$id2,$id3)
  {
  $emp = $this->db->select('empid')
                ->from('employee_payment')
                ->where('month',$id)
                ->where('year',$id2)
                ->where('empid',$id3)
                ->where('compid',$_SESSION['compid'])
                ->get()
                ->row();
  //var_dump($emp); exit();
//   $emp_id = array_map (function($value)
//     {
//     return $value['empid'];
//     },$emp);

  if($emp)
    {
    $empid = $emp->empid;
    $emps = $this->db->select('
                    employees.employeeID,
                    employees.employeeName,
                    employees.joiningDate,
                    employees.salary,
                    department.dept_name,
                    SUM(employee_payment.salary) as total,SUM(employee_payment.paid) as paid')
                ->from('employees')
                ->join('department','department.dpt_id = employees.dpt_id','left')
                ->join('employee_payment','employee_payment.empid = employees.employeeID','left')
                ->where('employees.employeeID',$empid)
                ->where('month',$id)
                ->where('year',$id2)
                ->where('employees.compid',$_SESSION['compid'])
                ->get()
                ->row();
    }
  else
    {
    $empid = $id3;
    $emps = $this->db->select('
                    employees.employeeID,
                    employees.employeeName,
                    employees.joiningDate,
                    employees.salary,
                    department.dept_name,
                   employees.employeeID as total,employee_payment.paid')
                ->from('employees')
                ->join('department','department.dpt_id = employees.dpt_id','left')
                ->join('employee_payment','employee_payment.empid = employees.employeeID','left')
                ->where('employees.employeeID',$empid)
                ->where('employees.compid',$_SESSION['compid'])
                ->get()
                ->row();
    }

//   $emps = $this->db->select('
//                     employees.employeeID,
//                     employees.employeeName,
//                     employees.joiningDate,
//                     employees.salary,
//                     department.dept_name,
//                     SUM(employee_payment.salary) as total')
//                 ->from('employees')
//                 ->join('department','department.dpt_id = employees.dpt_id','left')
//                 ->join('employee_payment','employee_payment.empid = employees.employeeID','left')
//                 ->where('employees.employeeID',$empid)
//                 ->where('employees.compid',$_SESSION['compid'])
//                 ->get()
//                 ->row();
  return $emps;
}

public function get_salary_empu($id,$id2,$id3,$id4)
  {
  $emp = $this->db->select('empid')
                ->from('employee_payment')
                ->where('month',$id)
                ->where('year',$id2)
                ->where('empid',$id3)
                ->where('compid',$_SESSION['compid'])
                ->get()
                ->row();

  if($emp)
    {
    $empid = $emp->empid;
    $emps = $this->db->select('
                    employees.employeeID,
                    employees.employeeName,
                    employees.joiningDate,
                    employees.salary,
                    department.dept_name,
                    SUM(employee_payment.salary) as total,SUM(employee_payment.paid) as paid')
                ->from('employees')
                ->join('department','department.dpt_id = employees.dpt_id','left')
                ->join('employee_payment','employee_payment.empid = employees.employeeID','left')
                ->where('employees.employeeID',$empid)
                ->where('month',$id)
                ->where('year',$id2)
                ->where('employees.compid',$_SESSION['compid'])
                ->where_not_in('employee_payment.empPid',$id4)
                ->get()
                ->row();
    }
  else
    {
    $empid = $id3;
    $emps = $this->db->select('
                    employees.employeeID,
                    employees.employeeName,
                    employees.joiningDate,
                    employees.salary,
                    department.dept_name,
                   employees.employeeID as total,employee_payment.paid')
                ->from('employees')
                ->join('department','department.dpt_id = employees.dpt_id','left')
                ->join('employee_payment','employee_payment.empid = employees.employeeID','left')
                ->where('employees.employeeID',$empid)
                ->where('employees.compid',$_SESSION['compid'])
                ->where_not_in('employee_payment.empPid',$id4)
                ->get()
                ->row();
    }

  return $emps;
}

public function get_page_setting_data($id)
  {
  $emps = $this->db->select('*')
                ->from('page_setting')
                ->where('psid',$id)
                ->get()
                ->row();
  return $emps;
}

public function get_service_info_data($id)
  {
  $query = $this->db->select('*')
                ->from('service_info')
                ->where('siid',$id)
                ->get()
                ->row();
  return $query;
}



public function user_dorder_ledger($sdate,$edate)
  {
    $query = $this->db->select('*')
                ->from('order')
                ->where('Date(regdate) >=',$sdate)
                ->where('Date(regdate) <=',$edate)
                ->where('compid',$_SESSION['compid'])
                ->get()
                ->result();
  return $query;  
}

public function user_morder_ledger($month,$year)
  {
    $query = $this->db->select('*')
                ->from('order')
                ->where('MONTH(regdate)',$month)
                ->where('YEAR(regdate)',$year)
                ->where('compid',$_SESSION['compid'])
                ->get()
                ->result();
  return $query;  
}

public function user_yorder_ledger($year)
  {
    $query = $this->db->select('*')
                ->from('order')
                ->where('YEAR(regdate)',$year)
                ->where('compid',$_SESSION['compid'])
                ->get()
                ->result();
  return $query;  
}

public function user_aorder_ledger()
  {
  $query = $this->db->select('*')
                ->from('order')
                ->where('compid',$_SESSION['compid'])
                ->get()
                ->result();
  return $query;  
}

public function sales_adata()
  {
  $query = $this->db->select('*')
                  ->from('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->result();
  return $query;  
}

public function sales_ddata($sdate,$edate)
  {
    $query = $this->db->select('*')
                    ->from('sales')
                    ->where('saleDate >=',$sdate)
                    ->where('saleDate <=',$edate)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
  return $query;  
}

public function sales_mdata($month,$year)
  {
    $query = $this->db->select('*')
                    ->from('sales')
                    ->where('MONTH(saleDate)',$month)
                    ->where('YEAR(saleDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
  return $query;  
}

public function sales_ydata($year)
  {
    $query = $this->db->select('*')
                    ->from('sales')
                    ->where('YEAR(saleDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function sales_due_adata()
  {
  $query = $this->db->select('sales.*,customers.customerName,customers.mobile,')
                  ->from('sales')
                  ->join('customers','customers.customerID = sales.customerID','left')
                  ->where('totalAmount > paidAmount')
                  ->where('sales.compid',$_SESSION['compid'])
                  ->get()
                  ->result();
  return $query;  
}

public function sales_due_ddata($sdate,$edate)
  {
    $query = $this->db->select('sales.*,customers.customerName,customers.mobile,')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->where('totalAmount > paidAmount')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('saleDate >=',$sdate)
                    ->where('saleDate <=',$edate)
                    ->get()
                    ->result();
  return $query;  
}

public function sales_due_mdata($month,$year)
  {
    $query = $this->db->select('sales.*,customers.customerName,customers.mobile,')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->where('totalAmount > paidAmount')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('MONTH(saleDate)',$month)
                    ->where('YEAR(saleDate)',$year)
                    ->get()
                    ->result();
  return $query;  
}

public function sales_due_ydata($year)
  {
    $query = $this->db->select('sales.*,customers.customerName,customers.mobile,')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID','left')
                    ->where('totalAmount > paidAmount')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('YEAR(saleDate)',$year)
                    ->get()
                    ->result();

  return $query;  
}

public function get_top_sales_product_data()
    {
    $query = $this->db->select('sma_units.unitName,categories.categoryName,sales.compid,products.productName,products.image,products.productcode,SUM(sale_product.quantity) as total')
                    ->from('sale_product')
                    ->join('products','products.productID = sale_product.productID','left')
                    ->join('sma_units','products.unit = sma_units.id','left')
                    ->join('categories','categories.categoryID = products.categoryID','left')
                    ->join('sales','sales.saleID = sale_product.saleID','left')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->group_by('sale_product.productID')
                    ->order_by('total','DESC')
                    ->get()
                    ->result();

  return $query;  
}





public function get_cost_report_data()
  {
  $query = $this->db->select('any_value(vaucher.voucherdate) as voucherdate ,any_value(vaucher.invoice) as invoice,any_value(vaucher.reference) as reference,any_value(vaucher.accountType) as accountType,any_value(vaucher.totalamount) as totalamount, any_value(cost_type.costName) as costName')
                ->from('vaucher')
                ->join('vaucher_particular','vaucher_particular.vuid = vaucher.vuid','left')
                ->join('cost_type','cost_type.ct_id = vaucher_particular.vutid','left')
                ->where('vaucher.vauchertype','Debit Voucher')
                ->where('vaucher.compid',$_SESSION['compid'])
                ->group_by('vaucher.invoice')
                ->get()
                ->result();
                // $query2=$this->db->last_query($query);
                // var_dump($query2);
                // die();
  return $query; 
}

public function get_dcost_report_data($sdate,$edate,$vtype)
  {
      if($vtype=='All'){
          $query = $this->db->select('any_value(vaucher.voucherdate) as voucherdate ,any_value(vaucher.invoice) as invoice,any_value(vaucher.reference) as reference,any_value(vaucher.accountType) as accountType,any_value(vaucher.totalamount) as totalamount, any_value(cost_type.costName) as costName')
                ->from('vaucher')
                ->join('vaucher_particular','vaucher_particular.vuid = vaucher.vuid','left')
                ->join('cost_type','cost_type.ct_id = vaucher_particular.vutid','left')
                ->where('vaucher.vauchertype','Debit Voucher')
                ->where('DATE(voucherdate) >=',$sdate)
                ->where('DATE(voucherdate) <=',$edate)
                // ->where('vaucher.costType',$vtype)
                ->where('vaucher.compid',$_SESSION['compid'])
                ->group_by('vaucher.invoice')
                ->get()
                ->result();
      }
      else{
        $query = $this->db->select('any_value(vaucher.voucherdate) as voucherdate ,any_value(vaucher.invoice) as invoice,any_value(vaucher.reference) as reference,any_value(vaucher.accountType) as accountType,any_value(vaucher.totalamount) as totalamount, any_value(cost_type.costName) as costName')
                        ->from('vaucher')
                        ->join('vaucher_particular','vaucher_particular.vuid = vaucher.vuid','left')
                        ->join('cost_type','cost_type.ct_id = vaucher_particular.vutid','left')
                        ->where('vaucher.vauchertype','Debit Voucher')
                        ->where('DATE(voucherdate) >=',$sdate)
                        ->where('DATE(voucherdate) <=',$edate)
                        ->where('cost_type.ct_id',$vtype)
                        ->where('vaucher.compid',$_SESSION['compid'])
                        ->group_by('vaucher.invoice')
                        ->get()
                        ->result();
      }
  return $query; 
}

public function get_mcost_report_data($month,$year,$vtype)
  {
      if($vtype=='All'){
          $query = $this->db->select('any_value(vaucher.voucherdate) as voucherdate ,any_value(vaucher.invoice) as invoice,any_value(vaucher.reference) as reference,any_value(vaucher.accountType) as accountType,any_value(vaucher.totalamount) as totalamount, any_value(cost_type.costName) as costName')
                ->from('vaucher')
                ->join('vaucher_particular','vaucher_particular.vuid = vaucher.vuid','left')
                ->join('cost_type','cost_type.ct_id = vaucher_particular.vutid','left')
                ->where('vaucher.vauchertype','Debit Voucher')
                ->where('MONTH(vaucher.voucherdate)',$month)
                ->where('YEAR(vaucher.voucherdate)',$year)
                // ->where('vaucher.costType',$vtype)
                ->where('vaucher.compid',$_SESSION['compid'])
                ->group_by('vaucher.invoice')
                ->get()
                ->result();
      }
      else{
      $query = $this->db->select('any_value(vaucher.voucherdate) as voucherdate ,any_value(vaucher.invoice) as invoice,any_value(vaucher.reference) as reference,any_value(vaucher.accountType) as accountType,any_value(vaucher.totalamount) as totalamount, any_value(cost_type.costName) as costName')
                    ->from('vaucher')
                    ->join('vaucher_particular','vaucher_particular.vuid = vaucher.vuid','left')
                    ->join('cost_type','cost_type.ct_id = vaucher_particular.vutid','left')
                    ->where('vaucher.vauchertype','Debit Voucher')
                    ->where('MONTH(vaucher.voucherdate)',$month)
                    ->where('YEAR(vaucher.voucherdate)',$year)
                    ->where('cost_type.ct_id',$vtype)
                    ->where('vaucher.compid',$_SESSION['compid'])
                    ->group_by('vaucher.invoice')
                    ->get()
                    ->result();
      }
  return $query; 
}

public function get_ycost_report_data($year,$vtype)
  {
   if($vtype=='All'){   
      $query = $this->db->select('any_value(vaucher.voucherdate) as voucherdate ,any_value(vaucher.invoice) as invoice,any_value(vaucher.reference) as reference,any_value(vaucher.accountType) as accountType,any_value(vaucher.totalamount) as totalamount, any_value(cost_type.costName) as costName')
                    ->from('vaucher')
                    ->join('vaucher_particular','vaucher_particular.vuid = vaucher.vuid','left')
                    ->join('cost_type','cost_type.ct_id = vaucher_particular.vutid','left')
                    ->where('vaucher.vauchertype','Debit Voucher')
                    ->where('YEAR(vaucher.voucherdate)',$year)
                    // ->where('vaucher.costType',$vtype)
                    ->where('vaucher.compid',$_SESSION['compid'])
                    ->group_by('vaucher.invoice')
                    ->get()
                    ->result();
   }
   else{
      $query = $this->db->select('any_value(vaucher.voucherdate) as voucherdate ,any_value(vaucher.invoice) as invoice,any_value(vaucher.reference) as reference,any_value(vaucher.accountType) as accountType,any_value(vaucher.totalamount) as totalamount, any_value(cost_type.costName) as costName')
                    ->from('vaucher')
                    ->join('vaucher_particular','vaucher_particular.vuid = vaucher.vuid','left')
                    ->join('cost_type','cost_type.ct_id = vaucher_particular.vutid','left')
                    ->where('vaucher.vauchertype','Debit Voucher')
                    ->where('YEAR(vaucher.voucherdate)',$year)
                    ->where('cost_type.ct_id',$vtype)
                    ->where('vaucher.compid',$_SESSION['compid'])
                    ->group_by('vaucher.invoice')
                    ->get()
                    ->result();
   }
  return $query; 
}

public function get_bank_purchase_data()
  {
  $query = $this->db->select('*')
                    ->from('purchase')
                    ->where('accountType','Bank')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_sale_data()
  {
  $query = $this->db->select('*')
                    ->from('sales')
                    ->where('accountType','Bank')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_sreturn_data()
  {
  $query = $this->db->select('*')
                    ->from('returns')
                    ->where('accountType','Bank')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_preturn_data()
  {
  $query = $this->db->select('*')
                    ->from('preturns')
                    ->where('accountType','Bank')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_voucher_data()
  {
  $query = $this->db->select('*')
                    ->from('vaucher')
                    ->where('accountType','Bank')
                    ->where('status',1)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_salary_data()
  {
  $query = $this->db->select('*')
                    ->from('employee_payment')
                    ->where('accountType','Bank')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dpurchase_data($sdate,$edate)
  {
  $query = $this->db->select('*')
                    ->from('purchase')
                    ->where('accountType','Bank')
                    ->where('purchaseDate >=',$sdate)
                    ->where('purchaseDate <=',$edate)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dsale_data($sdate,$edate)
  {
  $query = $this->db->select('*')
                    ->from('sales')
                    ->where('accountType','Bank')
                    ->where('saleDate >=',$sdate)
                    ->where('saleDate <=',$edate)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dsreturn_data($sdate,$edate)
  {
  $query = $this->db->select('*')
                    ->from('returns')
                    ->where('accountType','Bank')
                    ->where('returnDate >=',$sdate)
                    ->where('returnDate <=',$edate)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dpreturn_data($sdate,$edate)
  {
  $query = $this->db->select('*')
                    ->from('preturns')
                    ->where('accountType','Bank')
                    ->where('prDate >=',$sdate)
                    ->where('prDate <=',$edate)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dvoucher_data($sdate,$edate)
  {
  $query = $this->db->select('*')
                    ->from('vaucher')
                    ->where('accountType','Bank')
                    ->where('voucherdate >=',$sdate)
                    ->where('voucherdate <=',$edate)
                    ->where('status',1)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dsalary_data($sdate,$edate)
  {
  $query = $this->db->select('*')
                    ->from('employee_payment')
                    ->where('accountType','Bank')
                    ->where('regdate >=',$sdate)
                    ->where('regdate <=',$edate)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_mpurchase_data($month,$year)
  {
  $query = $this->db->select('*')
                    ->from('purchase')
                    ->where('accountType','Bank')
                    ->where('MONTH(purchaseDate)',$month)
                    ->where('YEAR(purchaseDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_msale_data($month,$year)
  {
  $query = $this->db->select('*')
                    ->from('sales')
                    ->where('accountType','Bank')
                    ->where('MONTH(saleDate)',$month)
                    ->where('YEAR(saleDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_msreturn_data($month,$year)
  {
  $query = $this->db->select('*')
                    ->from('returns')
                    ->where('accountType','Bank')
                    ->where('MONTH(returnDate)',$month)
                    ->where('YEAR(returnDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_mpreturn_data($month,$year)
  {
  $query = $this->db->select('*')
                    ->from('preturns')
                    ->where('accountType','Bank')
                    ->where('MONTH(prDate)',$month)
                    ->where('YEAR(prDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_mvoucher_data($month,$year)
  {
  $query = $this->db->select('*')
                    ->from('vaucher')
                    ->where('accountType','Bank')
                    ->where('MONTH(voucherdate)',$month)
                    ->where('YEAR(voucherdate)',$year)
                    ->where('status',1)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_msalary_data($month,$year)
  {
  $query = $this->db->select('*')
                    ->from('employee_payment')
                    ->where('accountType','Bank')
                    ->where('MONTH(regdate)',$month)
                    ->where('YEAR(regdate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ypurchase_data($year)
  {
  $query = $this->db->select('*')
                    ->from('purchase')
                    ->where('accountType','Bank')
                    ->where('YEAR(purchaseDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ysale_data($year)
  {
  $query = $this->db->select('*')
                    ->from('sales')
                    ->where('accountType','Bank')
                    ->where('YEAR(saleDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ysreturn_data($year)
  {
  $query = $this->db->select('*')
                    ->from('returns')
                    ->where('accountType','Bank')
                    ->where('YEAR(returnDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ypreturn_data($year)
  {
  $query = $this->db->select('*')
                    ->from('preturns')
                    ->where('accountType','Bank')
                    ->where('YEAR(prDate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_yvoucher_data($year)
  {
  $query = $this->db->select('*')
                    ->from('vaucher')
                    ->where('accountType','Bank')
                    ->where('YEAR(voucherdate)',$year)
                    ->where('status',1)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ysalary_data($year)
  {
  $query = $this->db->select('*')
                    ->from('employee_payment')
                    ->where('accountType','Bank')
                    ->where('YEAR(regdate)',$year)
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function sales_due_paypent_ddata()
  {
  $query = $this->db->select('sales_payment.*,sales.invoice_no,customers.customerName,customers.mobile')
                    ->from('sales_payment')
                    ->join('sales','sales.saleID = sales_payment.saleID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

public function sales_ddue_paypent_ddata($sdate,$edate)
  {
  $query = $this->db->select('sales_payment.*,sales.invoice_no,customers.customerName,customers.mobile')
                    ->from('sales_payment')
                    ->join('sales','sales.saleID = sales_payment.saleID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('DATE(sales_payment.regdate) >=',$sdate)
                    ->where('DATE(sales_payment.regdate) <=',$edate)
                    ->get()
                    ->result();

  return $query;  
}

public function sales_mdue_paypent_ddata($month,$year)
  {
  $query = $this->db->select('sales_payment.*,sales.invoice_no,customers.customerName,customers.mobile')
                    ->from('sales_payment')
                    ->join('sales','sales.saleID = sales_payment.saleID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('MONTH(sales_payment.regdate)',$month)
                    ->where('YEAR(sales_payment.regdate)',$year)
                    ->get()
                    ->result();

  return $query;  
}

public function sales_ydue_paypent_ddata($year)
  {
  $query = $this->db->select('sales_payment.*,sales.invoice_no,customers.customerName,customers.mobile')
                    ->from('sales_payment')
                    ->join('sales','sales.saleID = sales_payment.saleID', 'left')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('YEAR(sales_payment.regdate)',$year)
                    ->get()
                    ->result();

  return $query;  
}

public function get_sales_vat_data()
  {
  $query = $this->db->select('sales.*,customers.customerName,customers.mobile')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('sCost > 0')
                    ->get()
                    ->result();

  return $query;  
}

public function get_sales_dvat_data($sdate,$edate)
  {
  $query = $this->db->select('sales.*,customers.customerName,customers.mobile')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('sCost > 0')
                    ->where('sales.saleDate >=',$sdate)
                    ->where('sales.saleDate <=',$edate)
                    ->get()
                    ->result();

  return $query;  
}

public function get_sales_mvat_data($month,$year)
  {
  $query = $this->db->select('sales.*,customers.customerName,customers.mobile')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('sCost > 0')
                    ->where('MONTH(sales.saleDate)',$month)
                    ->where('YEAR(sales.saleDate)',$year)
                    ->get()
                    ->result();

  return $query;  
}

public function get_sales_yvat_data($year)
  {
  $query = $this->db->select('sales.*,customers.customerName,customers.mobile')
                    ->from('sales')
                    ->join('customers','customers.customerID = sales.customerID', 'left')
                    ->where('sales.compid',$_SESSION['compid'])
                    ->where('sCost > 0')
                    ->where('YEAR(sales.saleDate)',$year)
                    ->get()
                    ->result();

  return $query;  
}

public function get_stock_product()
  {
  $emp = $this->db->select('productID')
        ->from('products')
        ->where('compid',$_SESSION['compid'])
        ->get()
        ->result_array();
    //var_dump($emp); exit();
  $emp_id = array_map (function($value){
  return $value['productID'];
  },$emp);
    //var_dump($emp_id); exit();
  if($emp_id == NULL)
      {
      $empid = 0;
      }
  else{
      $empid = $emp_id;
      }
    //var_dump($empid); exit();
  return $this->db->select('any_value(stock.stockID) as stockID,any_value(products.sprice) as sprice,any_value(stock.compid) as compid,any_value(stock.totalPices) as totalPices,any_value(stock.regby) as regby,any_value(stock.regdate) as regdate,any_value(stock.upby) as upby,any_value(stock.product) as product,any_value(products.productName) as productName,any_value(products.productcode) as productcode,any_value(products.pprice) as pprice,(sum(purchase_product.pprice)/ count(purchase_product.pp_id) * any_value(stock.totalPices)) as avg_purchase')
              ->from('stock')
              ->join('products','products.productID = stock.product','left')
              ->join('purchase_product','purchase_product.productID = stock.product','left')
              ->where_in('product',$empid)
              ->where('stock.compid',$_SESSION['compid'])
              ->group_by('stock.product')
              ->get()
              ->result();
              //  $query2=$this->db->last_query($sql);
              //  var_dump($query2);
              //  die();
}

public function get_salesdata($sid)
  {
  return $this->db->select('
                    sales.*,
                    customers.customerName,customers.mobile')
                ->from('sales')
                ->join('customers','customers.customerID = sales.customerID','left')
                //->join('employees','employees.empid = sales.employee','left')
                ->where('saleID',$sid)
                ->get()
                ->row();
}

public function get_sales_products_data($sid)
  {
  return $this->db->select('sale_product.*,products.productID,products.productName')
                ->from('sale_product')
                ->join('products','products.productID = sale_product.productID','left')
                ->where('saleID',$sid)
                ->get()
                ->result();
}

public function total_cash()
  {
  $sa = $this->db->select('
                    SUM(totalAmount) as total,
                    SUM(paidAmount) as ptotal,
                    SUM(discountAmount) as dtotal,
                    SUM(sCost) as stotal,
                    SUM(vAmount) as vtotal')
              ->from('sales')
              ->where('accountType','Cash')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
                                        //var_dump($sa); //exit();
  if($sa)
    {
    //$saa = $sa->total-($sa->ptotal+$sa->dtotal+$sa->stotal+$sa->vtotal);
    $saa = $sa->ptotal;
    }
  else
    {
    $saa = 0;
    }
            
  $pa = $this->db->select("
                      SUM(totalPrice) as total,
                      SUM(paidAmount) as ptotal,
                      SUM(disAmount) as dtotal,
                      SUM(sCost) as stotal,
                      SUM(vAmount) as vtotal")
              ->from('purchase')
              ->where('accountType','Cash')
              ->where('compid',$_SESSION['compid'])
              //->where('purchaseDate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($pa);// exit();
  if($pa)
    {
    //$paa = $pa->total-($pa->ptotal+$pa->dtotal+$pa->stotal+$pa->vtotal);
    $paa = $pa->ptotal;
    }
  else
    {
    $paa = 0;
    }
            
  $va = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Cash')
              ->where('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              //->where('voucherdate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($va); //exit();
  if($va)
    {
    $vaa = $va->total;
    }
  else
    {
    $vaa = 0;
    }
            
  $va2 = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Cash')
              ->where_not_in('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              //->where('voucherdate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($va2); //exit();
  if($va2)
    {
    $vaa2 = $va2->total;
    }
  else{
    $vaa2 = 0;
    }
  $tva = $vaa-$vaa2;
            
  $temp = $this->db->select("SUM(salary) as total")
              ->from('employee_payment')
              ->where('accountType','Cash')
              ->where('compid',$_SESSION['compid'])
              //->where('regdate',date("Y-m-d"))
              ->get()
              ->row();
  //var_dump($temp); //exit();
  if($temp)
    {
    $tempa = $temp->total;
    }
  else
    {
    $tempa = 0;
    }
            
  $tr = $this->db->select("SUM(totalPrice) as total,SUM(scAmount) as sctotal")
              ->from('returns')
              ->where('accountType','Cash')
              ->where('compid',$_SESSION['compid'])
              //->where('returnDate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($tr); //exit();
  if($tr)
    {
    $tra = $tr->total-$tr->sctotal;
    }
  else
    {
    $tra = 0;
    }
                                        
  $tfbt = $this->db->select("SUM(amount) as total")
              ->from('transfer_account')
              ->where('facType','Cash')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
    //var_dump($pa); //exit();
  if($tfbt)
    {
    $tfbta = $tfbt->total;
    }
  else
    {
    $tfbta = 0;
    }
                                        
  $ttbt = $this->db->select("SUM(amount) as total")
              ->from('transfer_account')
              ->where('sacType','Cash')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
  //var_dump($pa); //exit();
  if($ttbt)
    {
    $ttbta = $ttbt->total;
    }
  else
    {
    $ttbta = 0;
    }

  $cop = $this->db->select("SUM(balance) as total")
              ->from('cash')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
  //var_dump($pa); //exit();
  if($cop)
    {
    $copa = $cop->total;
    }
  else
    {
    $copa = 0;
    }

  $query = (($copa+$saa+$tva+$ttbta)-($paa+$tempa+$tra+$tfbta));

  return $query;
}

public function total_bank()
  {
  $sa = $this->db->select('
                    SUM(totalAmount) as total,
                    SUM(paidAmount) as ptotal,
                    SUM(discountAmount) as dtotal,
                    SUM(sCost) as stotal,
                    SUM(vAmount) as vtotal')
              ->from('sales')
              ->where('accountType','Bank')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
                                        //var_dump($sa); //exit();
  if($sa)
    {
    $saa = $sa->ptotal;
    }
  else
    {
    $saa = 0;
    }
            
  $pa = $this->db->select("
                      SUM(totalPrice) as total,
                      SUM(paidAmount) as ptotal,
                      SUM(disAmount) as dtotal,
                      SUM(sCost) as stotal,
                      SUM(vAmount) as vtotal")
              ->from('purchase')
              ->where('accountType','Bank')
              ->where('compid',$_SESSION['compid'])
              //->where('purchaseDate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($pa);// exit();
  if($pa)
    {
    $paa = $pa->ptotal;
    }
  else
    {
    $paa = 0;
    }
            
  $va = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Bank')
              ->where('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              //->where('voucherdate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($va); //exit();
  if($va)
    {
    $vaa = $va->total;
    }
  else
    {
    $vaa = 0;
    }
            
  $va2 = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Bank')
              ->where_not_in('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              //->where('voucherdate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($va2); //exit();
  if($va2)
    {
    $vaa2 = $va2->total;
    }
  else{
    $vaa2 = 0;
    }
  $tva = $vaa-$vaa2;
            
  $temp = $this->db->select("SUM(salary) as total")
              ->from('employee_payment')
              ->where('accountType','Bank')
              ->where('compid',$_SESSION['compid'])
              //->where('regdate',date("Y-m-d"))
              ->get()
              ->row();
  //var_dump($temp); //exit();
  if($temp)
    {
    $tempa = $temp->total;
    }
  else
    {
    $tempa = 0;
    }
            
  $tr = $this->db->select("SUM(totalPrice) as total,SUM(scAmount) as sctotal")
              ->from('returns')
              ->where('accountType','Bank')
              ->where('compid',$_SESSION['compid'])
              //->where('returnDate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($tr); //exit();
  if($tr)
    {
    $tra = $tr->total-$tr->sctotal;
    }
  else
    {
    $tra = 0;
    }
                                        
  $tfbt = $this->db->select("SUM(amount) as total")
              ->from('transfer_account')
              ->where('facType','Bank')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
    //var_dump($pa); //exit();
  if($tfbt)
    {
    $tfbta = $tfbt->total;
    }
  else
    {
    $tfbta = 0;
    }
                                        
  $ttbt = $this->db->select("SUM(amount) as total")
              ->from('transfer_account')
              ->where('sacType','Bank')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
  //var_dump($pa); //exit();
  if($ttbt)
    {
    $ttbta = $ttbt->total;
    }
  else
    {
    $ttbta = 0;
    }

  $cop = $this->db->select("SUM(balance) as total")
              ->from('bankaccount')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
  //var_dump($pa); //exit();
  if($cop)
    {
    $copa = $cop->total;
    }
  else
    {
    $copa = 0;
    }

  $query = (($copa+$saa+$tva+$ttbta)-($paa+$tempa+$tra+$tfbta));
  
  return $query;
}

public function total_mobile()
  {
  $sa = $this->db->select('
                    SUM(totalAmount) as total,
                    SUM(paidAmount) as ptotal,
                    SUM(discountAmount) as dtotal,
                    SUM(sCost) as stotal,
                    SUM(vAmount) as vtotal')
              ->from('sales')
              ->where('accountType','Mobile')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
                                        //var_dump($sa); //exit();
  if($sa)
    {
    $saa = $sa->ptotal;
    }
  else
    {
    $saa = 0;
    }
            
  $pa = $this->db->select("
                      SUM(totalPrice) as total,
                      SUM(paidAmount) as ptotal,
                      SUM(disAmount) as dtotal,
                      SUM(sCost) as stotal,
                      SUM(vAmount) as vtotal")
              ->from('purchase')
              ->where('accountType','Mobile')
              ->where('compid',$_SESSION['compid'])
              //->where('purchaseDate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($pa);// exit();
  if($pa)
    {
    $paa = $pa->ptotal;
    }
  else
    {
    $paa = 0;
    }
            
  $va = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Mobile')
              ->where('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              //->where('voucherdate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($va); //exit();
  if($va)
    {
    $vaa = $va->total;
    }
  else
    {
    $vaa = 0;
    }
            
  $va2 = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Mobile')
              ->where_not_in('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              //->where('voucherdate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($va2); //exit();
  if($va2)
    {
    $vaa2 = $va2->total;
    }
  else{
    $vaa2 = 0;
    }
  $tva = $vaa-$vaa2;
            
  $temp = $this->db->select("SUM(salary) as total")
              ->from('employee_payment')
              ->where('accountType','Mobile')
              ->where('compid',$_SESSION['compid'])
              //->where('regdate',date("Y-m-d"))
              ->get()
              ->row();
  //var_dump($temp); //exit();
  if($temp)
    {
    $tempa = $temp->total;
    }
  else
    {
    $tempa = 0;
    }
            
  $tr = $this->db->select("SUM(totalPrice) as total,SUM(scAmount) as sctotal")
              ->from('returns')
              ->where('accountType','Mobile')
              ->where('compid',$_SESSION['compid'])
              //->where('returnDate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($tr); //exit();
  if($tr)
    {
    $tra = $tr->total-$tr->sctotal;
    }
  else
    {
    $tra = 0;
    }
                                        
  $tfbt = $this->db->select("SUM(amount) as total")
              ->from('transfer_account')
              ->where('facType','Mobile')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
    //var_dump($pa); //exit();
  if($tfbt)
    {
    $tfbta = $tfbt->total;
    }
  else
    {
    $tfbta = 0;
    }
                                        
  $ttbt = $this->db->select("SUM(amount) as total")
              ->from('transfer_account')
              ->where('sacType','Mobile')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
  //var_dump($pa); //exit();
  if($ttbt)
    {
    $ttbta = $ttbt->total;
    }
  else
    {
    $ttbta = 0;
    }

  $cop = $this->db->select("SUM(balance) as total")
              ->from('mobileaccount')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
  //var_dump($pa); //exit();
  if($cop)
    {
    $copa = $cop->total;
    }
  else
    {
    $copa = 0;
    }

  $query = (($copa+$saa+$tva+$ttbta)-($paa+$tempa+$tra+$tfbta));
  
  return $query;
}

public function total_credit()
  {
  $sa = $this->db->select('
                    SUM(totalAmount) as total,
                    SUM(paidAmount) as ptotal,
                    SUM(discountAmount) as dtotal,
                    SUM(sCost) as stotal,
                    SUM(vAmount) as vtotal')
              ->from('sales')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
                                        //var_dump($sa); //exit();
  if($sa)
    {
    $saa = $sa->total-($sa->ptotal+$sa->dtotal+$sa->stotal+$sa->vtotal);
    }
  else
    {
    $saa = 0;
    }
            
  
            
  $va = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Cash')
              ->where('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
    //var_dump($va); //exit();
  if($va)
    {
    $vaa = $va->total;
    }
  else
    {
    $vaa = 0;
    }
            
  $tr = $this->db->select("SUM(paidAmount) as total")
              ->from('returns')
              ->where('compid',$_SESSION['compid'])
              //->where('returnDate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($tr); //exit();
  if($tr)
    {
    $tra = $tr->total;
    }
  else
    {
    $tra = 0;
    }

  $query = (($saa)-($vaa+$tra));

  return $query;
}

public function total_debit()
  {      
  $pa = $this->db->select("
                      SUM(totalPrice) as total,
                      SUM(paidAmount) as ptotal,
                      SUM(disAmount) as dtotal,
                      SUM(sCost) as stotal,
                      SUM(vAmount) as vtotal")
              ->from('purchase')
              ->where('accountType','Bank')
              ->where('compid',$_SESSION['compid'])
              //->where('purchaseDate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($pa);// exit();
  if($pa)
    {
    $paa = $pa->total-($pa->ptotal+$pa->dtotal+$pa->stotal+$pa->vtotal);
    }
  else
    {
    $paa = 0;
    }
            
  $va2 = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Bank')
              ->where_not_in('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              //->where('voucherdate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($va2); //exit();
  if($va2)
    {
    $vaa2 = $va2->total;
    }
  else
    {
    $vaa2 = 0;
    }
            

  $query = ($paa-$vaa2);
  
  return $query;
}

public function total_rsales_amount()
  {      
  $tr = $this->db->select("SUM(totalPrice) as total")
              ->from('returns')
              ->where('compid',$_SESSION['compid'])
              //->where('returnDate',date("Y-m-d"))
              ->get()
              ->row();
    //var_dump($tr); //exit();
  if($tr)
    {
    $tra = $tr->total;
    }
  else
    {
    $tra = 0;
    }

  $query = $tra;

  return $query;
}

public function total_cash_credit()
  {
  $sa = $this->db->select('
                    SUM(totalAmount) as total,
                    SUM(paidAmount) as ptotal,
                    SUM(discountAmount) as dtotal,
                    SUM(sCost) as stotal,
                    SUM(vAmount) as vtotal')
              ->from('sales')
              ->where('compid',$_SESSION['compid'])
              ->where('accountType','Cash')
              ->get()
              ->row();
                                        //var_dump($sa); //exit();
  if($sa)
    {
    $saa = $sa->total-($sa->ptotal+$sa->dtotal+$sa->stotal+$sa->vtotal);
    }
  else
    {
    $saa = 0;
    }
            
  
            
  $va = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Cash')
              ->where('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              ->where('accountType','Cash')
              ->get()
              ->row();
    //var_dump($va); //exit();
  if($va)
    {
    $vaa = $va->total;
    }
  else
    {
    $vaa = 0;
    }
            
  $tr = $this->db->select("SUM(paidAmount) as total")
              ->from('returns')
              ->where('compid',$_SESSION['compid'])
              ->where('accountType','Cash')
              ->get()
              ->row();
    //var_dump($tr); //exit();
  if($tr)
    {
    $tra = $tr->total;
    }
  else
    {
    $tra = 0;
    }

  $query = (($saa)-($vaa+$tra));

  return $query;
}

public function total_cash_debit()
  {      
  $pa = $this->db->select("
                      SUM(totalPrice) as total,
                      SUM(paidAmount) as ptotal,
                      SUM(disAmount) as dtotal,
                      SUM(sCost) as stotal,
                      SUM(vAmount) as vtotal")
              ->from('purchase')
              ->where('accountType','Bank')
              ->where('compid',$_SESSION['compid'])
              ->where('accountType','Cash')
              ->get()
              ->row();
    //var_dump($pa);// exit();
  if($pa)
    {
    $paa = $pa->total-($pa->ptotal+$pa->dtotal+$pa->stotal+$pa->vtotal);
    }
  else
    {
    $paa = 0;
    }
            
  $va2 = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('accountType','Bank')
              ->where_not_in('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              ->where('accountType','Cash')
              ->get()
              ->row();
    //var_dump($va2); //exit();
  if($va2)
    {
    $vaa2 = $va2->total;
    }
  else
    {
    $vaa2 = 0;
    }
            

  $query = ($paa-$vaa2);
  
  return $query;
}

public function total_cash_rsales_amount()
  {      
  $tr = $this->db->select("SUM(totalPrice) as total")
              ->from('returns')
              ->where('compid',$_SESSION['compid'])
              ->where('accountType','Cash')
              ->get()
              ->row();
    //var_dump($tr); //exit();
  if($tr)
    {
    $tra = $tr->total;
    }
  else
    {
    $tra = 0;
    }

  $query = $tra;

  return $query;
}

public function total_cash_sales()
  {
  $query = $this->db->select("SUM(paidAmount) as total,SUM(totalAmount) as ttotal")
                  ->FROM('sales')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Cash')
                  ->get()
                  ->row();
  return $query;  
}

public function total_cash_purchases()
  {
  $query = $this->db->select("SUM(`paidAmount`) as total,SUM(`totalPrice`) as ttotal")
                  ->FROM('purchase')
                  ->where('compid',$_SESSION['compid'])
                  ->where('accountType','Cash')
                  ->get()
                  ->row();
  return $query;  
}

public function total_store_amount()
  {
  $query = $this->db->select("stock_store.*,products.pprice")
                  ->FROM('stock_store')
                  ->join('products','products.productID = stock_store.product','left')
                  ->where('stock_store.compid',$_SESSION['compid'])
                  ->get()
                  ->result();
  return $query;  
}

public function total_stock_amount()
  {
  $query = $this->db->select("stock.*,products.pprice")
                  ->FROM('stock')
                  ->join('products','products.productID = stock.product','left')
                  ->where('stock.compid',$_SESSION['compid'])
                  ->get()
                  ->result();
  return $query;  
}

public function total_profit_amount()
  {
  $sa = $this->db->select('
                    SUM(totalAmount) as total,
                    SUM(paidAmount) as ptotal,
                    SUM(discountAmount) as dtotal,
                    SUM(sCost) as stotal,
                    SUM(vAmount) as vtotal')
              ->from('sales')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
                                        //var_dump($sa); //exit();
  if($sa)
    {
    //$saa = $sa->total-($sa->ptotal+$sa->dtotal+$sa->stotal+$sa->vtotal);
    $saa = $sa->ptotal;
    }
  else
    {
    $saa = 0;
    }
            
  $pa = $this->db->select("
                      SUM(totalPrice) as total,
                      SUM(paidAmount) as ptotal,
                      SUM(disAmount) as dtotal,
                      SUM(sCost) as stotal,
                      SUM(vAmount) as vtotal")
              ->from('purchase')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
    //var_dump($pa);// exit();
  if($pa)
    {
    //$paa = $pa->total-($pa->ptotal+$pa->dtotal+$pa->stotal+$pa->vtotal);
    $paa = $pa->ptotal;
    }
  else
    {
    $paa = 0;
    }
            
  $va = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
    //var_dump($va); //exit();
  if($va)
    {
    $vaa = $va->total;
    }
  else
    {
    $vaa = 0;
    }
            
  $va2 = $this->db->select("SUM(totalamount) as total")
              ->from('vaucher')
              ->where_not_in('vauchertype','Credit Voucher')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
    //var_dump($va2); //exit();
  if($va2)
    {
    $vaa2 = $va2->total;
    }
  else{
    $vaa2 = 0;
    }
  $tva = $vaa-$vaa2;
            
  $temp = $this->db->select("SUM(salary) as total")
              ->from('employee_payment')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
  //var_dump($temp); //exit();
  if($temp)
    {
    $tempa = $temp->total;
    }
  else
    {
    $tempa = 0;
    }
            
  $tr = $this->db->select("SUM(paidAmount) as total,SUM(scAmount) as sctotal")
              ->from('returns')
              ->where('compid',$_SESSION['compid'])
              ->get()
              ->row();
    //var_dump($tr); //exit();
  if($tr)
    {
    $tra = $tr->total;
    }
  else
    {
    $tra = 0;
    }

  $query1 = (($saa+$tva));
  $query2 = (($paa+$tempa+$tra));
  $query = (($saa+$tva)-($paa+$tempa+$tra));
  //var_dump($query1); var_dump($query2); exit();
  return $query;
}


public function update_stock_product($pid,$taqnt)
	{
	$data = array('totalPices'=> $taqnt);

	$this->db->where('product', $pid);
	$this->db->where('compid', $_SESSION['compid']);
	$this->db->update('stock', $data);
}

public function get_stock_in_hand()
  {
  $query = $this->db->select('purchase_product.*,products.productName,products.productcode')
                ->from('purchase_product')
                ->join('products','products.productID = purchase_product.productID','left')
                ->where('compid',$_SESSION['compid'])
                ->group_by('purchase_product.productID')
                ->get()
                ->result();
  return $query;
}

public function insert_product_excel_file($data){
    $this->db->insert('products',$data);
    return true;
}

public function todays_sale()
{
    $date= date('y-m-d');
    $query = $this->db->select("SUM(`paidAmount`) as total")
                    ->FROM('sales')
                    ->where('saleDate',$date)
                    ->get()
                    ->row();
    return $query;
   // echo "HIIIIII";
}
public function todays_discount()
{
    $date= date('y-m-d');
    $query = $this->db->select("SUM(`discountAmount`) as ds")
                    ->FROM('sales')
                    ->where('saleDate',$date)
                    ->get()
                    ->row();
    return $query;
   // echo "HIIIIII";
}
public function todays_purchase()
{
  $date= date('y-m-d');
  $query = $this->db->select('sale_product.productID,sale_product.quantity,sale_product.regdate,products.productID,SUM(products.pprice*sale_product.quantity) as pprice')
                  ->from('sale_product')
                  ->join('products','products.productID = sale_product.productID','left')
                  ->where('DATE(sale_product.regdate)',$date)
                  ->get()
                  ->row();
return $query;
}
public function todays_expense()
{
    $date= date('y-m-d');
    $debit= "Debit Voucher";
    $supply= "Supplier Pay";
    $query = $this->db->select("SUM(`totalamount`) as expense")
                    ->FROM('vaucher')
                    ->where('voucherdate',$date)
                    ->where("(vauchertype='Debit Voucher' OR vauchertype='Supplier Pay')")
                    ->get()
                    ->row();
    return $query;
   // echo "HIIIIII";
}

public function get_district_data($id)
  {
  $query = $this->db->select("*")
                ->from('districts')
                ->where('division_id',$id)
                ->get()
                ->result();
  return $query;  
}

public function get_upazila_data($id)
  {
  $query = $this->db->select("*")
                ->from('upazilas')
                ->where('district_id',$id)
                ->get()
                ->result();
  return $query;  
}
public function get_territory_data($id)
  {
  $query = $this->db->select('*')
                ->from('territory')
                ->where('trid',$id)
                ->get()
                ->row();
  return $query;
}


public function sales_cust_trcode_data($trcode)
  {
  $query = $this->db->select("sales.*,customers.trCode")
                  ->FROM('sales')
                  ->join('customers','customers.customerID = sales.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->get()
                  ->result();
  return $query;  
}

public function voucher_cust_trcode_data($trcode)
  {
  $query = $this->db->select("vaucher.*,customers.trCode")
                  ->FROM('vaucher')
                  ->join('customers','customers.customerID = vaucher.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('vauchertype','Credit Voucher')
                  ->get()
                  ->result();
  return $query;  
}

public function return_cust_trcode_data($trcode)
  {
  $query = $this->db->select("returns.*,customers.trCode")
                  ->FROM('returns')
                  ->join('customers','customers.customerID = returns.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->get()
                  ->result();
  return $query;  
}

public function sales_dcust_trcode_data($trcode,$sdate,$edate)
  {
  $query = $this->db->select("sales.*,customers.trCode")
                  ->FROM('sales')
                  ->join('customers','customers.customerID = sales.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('saleDate >=', $sdate)
                  ->where('saleDate <=', $edate)
                  ->get()
                  ->result();
  return $query;  
}

public function voucher_dcust_trcode_data($trcode,$sdate,$edate)
  {
  $query = $this->db->select("vaucher.*,customers.trCode")
                  ->FROM('vaucher')
                  ->join('customers','customers.customerID = vaucher.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('vauchertype','Credit Voucher')
                  ->where('voucherdate >=', $sdate)
                  ->where('voucherdate <=', $edate)
                  ->get()
                  ->result();
  return $query;  
}

public function return_dcust_trcode_data($trcode,$sdate,$edate)
  {
  $query = $this->db->select("returns.*,customers.trCode")
                  ->FROM('returns')
                  ->join('customers','customers.customerID = returns.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('returnDate >=', $sdate)
                  ->where('returnDate <=', $edate)
                  ->get()
                  ->result();
  return $query;  
}

public function sales_mcust_trcode_data($trcode,$month,$year)
  {
  $query = $this->db->select("sales.*,customers.trCode")
                  ->FROM('sales')
                  ->join('customers','customers.customerID = sales.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('MONTH(saleDate)',$month)
                  ->where('YEAR(saleDate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function voucher_mcust_trcode_data($trcode,$month,$year)
  {
  $query = $this->db->select("vaucher.*,customers.trCode")
                  ->FROM('vaucher')
                  ->join('customers','customers.customerID = vaucher.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('vauchertype','Credit Voucher')
                  ->where('MONTH(voucherdate)',$month)
                  ->where('YEAR(voucherdate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function return_mcust_trcode_data($trcode,$month,$year)
  {
  $query = $this->db->select("returns.*,customers.trCode")
                  ->FROM('returns')
                  ->join('customers','customers.customerID = returns.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('MONTH(returnDate)',$month)
                  ->where('YEAR(returnDate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function sales_ycust_trcode_data($trcode,$year)
  {
  $query = $this->db->select("sales.*,customers.trCode")
                  ->FROM('sales')
                  ->join('customers','customers.customerID = sales.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('YEAR(saleDate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function voucher_ycust_trcode_data($trcode,$year)
  {
  $query = $this->db->select("vaucher.*,customers.trCode")
                  ->FROM('vaucher')
                  ->join('customers','customers.customerID = vaucher.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('vauchertype','Credit Voucher')
                  ->where('YEAR(voucherdate)',$year)
                  ->get()
                  ->result();
  return $query;  
}

public function return_ycust_trcode_data($trcode,$year)
  {
  $query = $this->db->select("returns.*,customers.trCode")
                  ->FROM('returns')
                  ->join('customers','customers.customerID = returns.customerID','left')
                  ->WHERE('trCode',$trcode)
                  ->where('YEAR(returnDate)',$year)
                  ->get()
                  ->result();
  return $query;  
}


public function get_emp_target_data($id)
  {
  $query = $this->db->select('*')
                  ->from('emp_targer')
                  ->where('etid',$id)
                  ->get()
                  ->row();
  return $query; 
}
public function get_cash_account_data($id)
  {
  $query = $this->db->select('*')
                  ->from('cash')
                  ->where('ca_id',$id)
                  ->where('compid', $_SESSION['compid'])
                  ->get()
                  ->row();
  return $query; 
}


public function get_bank_dlpurchase_data($sdate,$edate,$baid)
  {
  $query = $this->db->select('*')
                    ->from('purchase')
                    ->where('accountType','Bank')
                    ->where('purchaseDate >=',$sdate)
                    ->where('purchaseDate <=',$edate)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dlsale_data($sdate,$edate,$baid)
  {
  $query = $this->db->select('*')
                    ->from('sales')
                    ->where('accountType','Bank')
                    ->where('saleDate >=',$sdate)
                    ->where('saleDate <=',$edate)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dlsreturn_data($sdate,$edate,$baid)
  {
  $query = $this->db->select('*')
                    ->from('returns')
                    ->where('accountType','Bank')
                    ->where('returnDate >=',$sdate)
                    ->where('returnDate <=',$edate)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dlvoucher_data($sdate,$edate,$baid)
  {
  $query = $this->db->select('*')
                    ->from('vaucher')
                    ->where('accountType','Bank')
                    ->where('voucherdate >=',$sdate)
                    ->where('voucherdate <=',$edate)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dlfbank_data($sdate,$edate,$baid)
  {
  $query = $this->db->select('*')
                    ->from('transfer_account')
                    ->where('facType','Bank')
                    ->where('DATE(regdate) >=',$sdate)
                    ->where('DATE(regdate) <=',$edate)
                    ->where('facAcno',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_dltbank_data($sdate,$edate,$baid)
  {
  $query = $this->db->select('*')
                    ->from('transfer_account')
                    ->where('sacType','Bank')
                    ->where('DATE(regdate) >=',$sdate)
                    ->where('DATE(regdate) <=',$edate)
                    ->where('sacAcno',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_mlpurchase_data($month,$year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('purchase')
                    ->where('accountType','Bank')
                    ->where('MONTH(purchaseDate)',$month)
                    ->where('YEAR(purchaseDate)',$year)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_mlsale_data($month,$year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('sales')
                    ->where('accountType','Bank')
                    ->where('MONTH(saleDate)',$month)
                    ->where('YEAR(saleDate)',$year)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_mlsreturn_data($month,$year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('returns')
                    ->where('accountType','Bank')
                    ->where('MONTH(returnDate)',$month)
                    ->where('YEAR(returnDate)',$year)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_mlvoucher_data($month,$year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('vaucher')
                    ->where('accountType','Bank')
                    ->where('MONTH(voucherdate)',$month)
                    ->where('YEAR(voucherdate)',$year)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_mlfbank_data($month,$year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('transfer_account')
                    ->where('facType','Bank')
                    ->where('MONTH(regdate)',$month)
                    ->where('YEAR(regdate)',$year)
                    ->where('facAcno',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_mltbank_data($month,$year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('transfer_account')
                    ->where('sacType','Bank')
                    ->where('MONTH(regdate)',$month)
                    ->where('YEAR(regdate)',$year)
                    ->where('sacAcno',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ylpurchase_data($year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('purchase')
                    ->where('accountType','Bank')
                    ->where('YEAR(purchaseDate)',$year)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ylsale_data($year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('sales')
                    ->where('accountType','Bank')
                    ->where('YEAR(saleDate)',$year)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ylsreturn_data($year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('returns')
                    ->where('accountType','Bank')
                    ->where('YEAR(returnDate)',$year)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ylvoucher_data($year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('vaucher')
                    ->where('accountType','Bank')
                    ->where('YEAR(voucherdate)',$year)
                    ->where('accountNo',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_ylfbank_data($year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('transfer_account')
                    ->where('facType','Bank')
                    ->where('YEAR(regdate)',$year)
                    ->where('facAcno',$baid)
                    ->get()
                    ->result();

  return $query;  
}

public function get_bank_yltbank_data($year,$baid)
  {
  $query = $this->db->select('*')
                    ->from('transfer_account')
                    ->where('sacType','Bank')
                    ->where('YEAR(regdate)',$year)
                    ->where('sacAcno',$baid)
                    ->get()
                    ->result();

  return $query;  
}

// ////////////employee attendance
public function get_emp_attendance_data()
  {
  $query = $this->db->select('
                        emp_dev_attendance.*,
                        employees.emp_id,
                        employees.employeeName,
                        department.dept_name')
                ->from('emp_dev_attendance')
                ->join('employees','employees.employeeID = emp_dev_attendance.accid','left')
                ->join('department','department.dpt_id = employees.dpt_id','left')
                ->order_by('autoid','DESC')
                ->where('emp_dev_attendance.compid',$_SESSION['compid'])
                //->group_by('adate')
                ->get()
                ->result();
  return $query;  
}
public function get_emp_dattendance_data($empid,$sdate,$edate)
  {
    if($empid != 'All'){
                $query = $this->db->select('
                                      emp_dev_attendance.*,
                                      employees.emp_id,
                                      employees.employeeName,
                                    department.dept_name')
                              ->from('emp_dev_attendance')
                              ->join('employees','employees.employeeID = emp_dev_attendance.accid','left')
                              ->join('department','department.dpt_id = employees.dpt_id','left')
                              ->where('emp_dev_attendance.accid',$empid)
                              ->where('(emp_dev_attendance.adate) >=',$sdate)
                              ->where('(emp_dev_attendance.adate) <=',$edate)
                              ->get()
                              ->result();
    }else{
      $query = $this->db->select('
                                      emp_dev_attendance.*,
                                      employees.emp_id,
                                      employees.employeeName,
                                    department.dept_name')
                              ->from('emp_dev_attendance')
                              ->join('employees','employees.employeeID = emp_dev_attendance.accid','left')
                              ->join('department','department.dpt_id = employees.dpt_id','left')
                              ->where('(emp_dev_attendance.adate) >=',$sdate)
                              ->where('(emp_dev_attendance.adate) <=',$edate)
                              ->get()
                              ->result();

    }
  return $query;  
}

public function get_emp_mattendance_data($empid,$year,$month)
  {
    if($empid != 'All'){
                    $query = $this->db->select('
                                          emp_dev_attendance.*,
                                          employees.emp_id,
                                          employees.employeeName,
                                          department.dept_name')
                                  ->from('emp_dev_attendance')
                                  ->join('employees','employees.employeeID = emp_dev_attendance.accid','left')
                                  ->join('department','department.dpt_id = employees.dpt_id','left')
                                  ->where('emp_dev_attendance.accid',$empid)
                                  ->where('MONTH(emp_dev_attendance.adate)',$month)
                                  ->where('YEAR(emp_dev_attendance.adate)',$year)
                                  ->get()
                                  ->result();
    }else{
                    $query = $this->db->select('
                                      emp_dev_attendance.*,
                                      employees.emp_id,
                                      employees.employeeName,
                                      department.dept_name')
                              ->from('emp_dev_attendance')
                              ->join('employees','employees.employeeID = emp_dev_attendance.accid','left')
                              ->join('department','department.dpt_id = employees.dpt_id','left')
                              ->where('MONTH(emp_dev_attendance.adate)',$month)
                              ->where('YEAR(emp_dev_attendance.adate)',$year)
                              ->get()
                              ->result();
    }
  return $query;  
}

public function get_emp_yattendance_data($empid,$year)
  {
    if($empid != 'All'){ 
                    $query = $this->db->select('
                                          emp_dev_attendance.*,
                                          employees.emp_id,
                                          employees.employeeName,
                                          department.dept_name')
                                  ->from('emp_dev_attendance')
                                  ->join('employees','employees.employeeID = emp_dev_attendance.accid','left')
                                  ->join('department','department.dpt_id = employees.dpt_id','left')
                                  ->where('emp_dev_attendance.accid',$empid)
                                  ->where('YEAR(emp_dev_attendance.adate)',$year)
                                  ->get()
                                  ->result();
    }else{
                  $query = $this->db->select('
                                    emp_dev_attendance.*,
                                    employees.emp_id,
                                    employees.employeeName,
                                    department.dept_name')
                            ->from('emp_dev_attendance')
                            ->join('employees','employees.employeeID = emp_dev_attendance.accid','left')
                            ->join('department','department.dpt_id = employees.dpt_id','left')
                            ->where('YEAR(emp_dev_attendance.adate)',$year)
                            ->get()
                            ->result();
    }
  return $query;  
}

public function cash_calculation($id){
    
    $sser = $this->db->select('SUM(pAmount) as total')
                      ->from('service_sale')
                      ->where('accountType','Cash')
                      ->where('accountNo',$id)
                    //   ->where('compid',$_SESSION['compid'])
                      //->where('saleDate',date("Y-m-d"))
                      ->get()
                      ->row();
          //var_dump($sa); //exit();
          if($sser == null){
            $sserv = 0;
            }
          else{
            $sserv = $sser->total;
            }
    
    $sa = $this->db->select('SUM(pAmount) as total')
                ->from('sales')
                ->where('accountType','Cash')
                ->where('accountNo',$id)
                ->get()
                ->row();
    //var_dump($sa); //exit();
    if($sa == null){
        $saa = 0;
        }
    else{
        $saa = $sa->total;
        }
    
       // money receipt
     $smr = $this->db->select('SUM(amount) as total')
                  ->from('sales_payment')
                  ->where('accountType','Cash')
                   ->where('accountNo',$id)
                  ->get()
                  ->row();
      if($smr == null){
        $srec = 0;
        }
      else{
        $srec = $smr->total;
        }
        
  $pmr = $this->db->select('SUM(amount) as total')
                  ->from('purchase_payment')
                  ->where('accountType','Cash')
                   ->where('accountNo',$id)
                  ->get()
                  ->row();
      if($pmr == null){
        $prec = 0;
        }
      else{
        $prec = $pmr->total;
        }
    
    $pa = $this->db->select("SUM(pAmount) as total")
                ->from('purchase')
                ->where('accountType','Cash')
                ->where('accountNo',$id)
                ->get()
                ->row();
    //var_dump($pa);// exit();
    if($pa == null){
        $paa = 0;
        }
    else{
        $paa = $pa->total;
        }

    $va = $this->db->select("SUM(totalamount) as total")
                ->from('vaucher')
                ->where('accountType','Cash')
                ->where('vauchertype','Credit Voucher')
                ->where('accountNo',$id)
                ->where('status',1)
                ->get()
                ->row();
    //var_dump($va); //exit();
    if($va == null){
        $vaa = 0;
        }
    else{
        $vaa = $va->total;
        }

    $va2 = $this->db->select("SUM(totalamount) as total")
                ->from('vaucher')
                ->where('accountType','Cash')
                ->where_not_in('vauchertype','Credit Voucher')
                ->where('accountNo',$id)
                ->where('status',1)
                ->get()
                ->row();
    //var_dump($va2); //exit();
    if($va2 == null){
        $vaa2 = 0;
        }
    else{
        $vaa2 = $va2->total;
        }
    $tva = $vaa-$vaa2;

    $temp = $this->db->select("SUM(paid) as total")
                ->from('employee_payment')
                ->where('accountType','Cash')
                ->where('accountNo',$id)
                ->get()
                ->row();
    //var_dump($temp); //exit();
    if($temp == null){
        $tempa = 0;
        }
    else{
        $tempa = $temp->total;
        }

    $tr = $this->db->select("SUM(paidAmount) as total")
                ->from('returns')
                ->where('accountType','Cash')
                ->where('accountNo',$id)
                ->get()
                ->row();
    //var_dump($tr); //exit();
    if($tr == null){
        $tra = 0;
        }
    else{
        $tra = $tr->total;
        }
        
    $ptr = $this->db->select("SUM(totalPrice) as total")
                      ->from('preturns')
                      ->where('accountType','Cash')
                      ->where('accountNo',$id)
                      //->where('compid',$_SESSION['compid'])
                      ->get()
                      ->row();
          //var_dump($pa); //exit();
          if($ptr == null){
            $tptr = 0;
            }
          else{
            $tptr = $ptr->total;
            }
    
    $tfbt = $this->db->select("SUM(amount) as total")
                ->from('transfer_account')
                ->where('facType','Cash')
                ->where('facAcno',$id)
                ->get()
                ->row();
    //var_dump($pa); //exit();
    if($tfbt)
      {
      $tfbta = $tfbt->total;
      }
    else
      {
      $tfbta = 0;
      }
    
    $ttbt = $this->db->select("SUM(amount) as total")
                ->from('transfer_account')
                ->where('sacType','Cash')
                ->where('sacAcno',$id)
                ->get()
                ->row();
    //var_dump($pa); //exit();
    if($ttbt)
      {
      $ttbta = $ttbt->total;
      }
    else
      {
      $ttbta = 0;
      }
      
    $total_cash=(($saa+$srec+$sserv+$tva+$ttbta+$tptr)-($paa+$prec+$tempa+$tra+$tfbta));
    
    return $total_cash;
      
}

public function get_product_info_data($id){
  $query = $this->db->select("type,productID")
                    ->from('products')
                    ->where('productID',$id)
                    ->get()
                    ->row();

                    
  return $query;

}

public function get_service_data($productID){
  $query = $this->db->select("*")
                    ->from('products')
                    ->where('productID',$productID)
                    ->get()
                    ->result_array();

                    
  return $query;

}

public function get_all_purchase_data()
  {
  $query = $this->db->select('*')
                    ->from('purchase')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();
// var_dump($query);exit();
  return $query;  
}

public function get_all_sale_data()
  {
  $query = $this->db->select('*')
                    ->from('sales')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}

// public function get_all_service_data()
//   {
//   $query = $this->db->select('*')
//                     ->from('service_sale')
//                     ->get()
//                     ->result();

//   return $query;  
// }

public function get_all_voucher_data()
  {
  $query = $this->db->select('*')
                    ->from('vaucher')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->result();

  return $query;  
}
public function get_all_dpurchase_data($sdate,$edate,$dparticular)
  {
    if($dparticular == 'purchase' || $dparticular == 'All' ){

        $query = $this->db->select('*')
                          ->from('purchase')
                          ->where('purchaseDate >=',$sdate)
                          ->where('purchaseDate <=',$edate)
                          ->where('compid',$_SESSION['compid'])
                          ->get()
                          ->result();

        return $query;  
    }
}

public function get_all_dsale_data($sdate,$edate,$dparticular)
  {
    if($dparticular == 'sales' || $dparticular == 'All' ){

        $query = $this->db->select('*')
                          ->from('sales')
                          ->where('saleDate >=',$sdate)
                          ->where('saleDate <=',$edate)
                          ->where('compid',$_SESSION['compid'])
                          ->get()
                          ->result();

        return $query;  
    }
}

// public function get_all_dservice_data($sdate,$edate,$dparticular)
//   {
//     if($dparticular == 'Service Sale' || $dparticular == 'All' ){

//         $query = $this->db->select('*')
//                           ->from('service_sale')
//                           ->where('ssDate >=',$sdate)
//                           ->where('ssDate <=',$edate)
//                           ->get()
//                           ->result();

//         return $query;  
//     }
// }


public function get_all_dvoucher_data($sdate,$edate,$dparticular)
  {
    if($dparticular == 'Credit Voucher' || $dparticular == 'Debit Voucher' || $dparticular == 'Supplier Pay'){

            $query = $this->db->select('*')
                              ->from('vaucher')
                              ->where('voucherdate >=',$sdate)
                              ->where('voucherdate <=',$edate)
                              ->where('vauchertype',$dparticular)
                              ->where('compid',$_SESSION['compid'])
                              ->get()
                              ->result();

            return $query;  
    }else if($dparticular == 'All'){
            $query = $this->db->select('*')
                              ->from('vaucher')
                              ->where('voucherdate >=',$sdate)
                              ->where('voucherdate <=',$edate)
                              ->where('compid',$_SESSION['compid'])
                              ->get()
                              ->result();

            return $query;
    }
}

public function get_all_mpurchase_data($month,$year,$mparticular)
  {
    if($mparticular == 'purchase' || $mparticular == 'All' ){

        $query = $this->db->select('*')
                          ->from('purchase')
                          ->where('MONTH(purchaseDate)',$month)
                          ->where('YEAR(purchaseDate)',$year)
                          ->where('compid',$_SESSION['compid'])
                          ->get()
                          ->result();

        return $query; 
    } 
}

public function get_all_msale_data($month,$year,$mparticular)
  {
    if($mparticular == 'sales' || $mparticular == 'All' ){

        $query = $this->db->select('*')
                          ->from('sales')
                          ->where('MONTH(saleDate)',$month)
                          ->where('YEAR(saleDate)',$year)
                          ->where('compid',$_SESSION['compid'])
                          ->get()
                          ->result();

        return $query;  
    }
}

// public function get_all_mservice_data($month,$year,$mparticular)
//   {
//     if($mparticular == 'Service Sale' || $mparticular == 'All' ){

//             $query = $this->db->select('*')
//                               ->from('service_sale')
//                               ->where('MONTH(ssDate)',$month)
//                               ->where('YEAR(ssDate)',$year)
//                               ->get()
//                               ->result();

//             return $query; 
//     } 
// }


public function get_all_mvoucher_data($month,$year,$mparticular)
  {
    if($mparticular == 'Credit Voucher' || $mparticular == 'Debit Voucher' || $mparticular == 'Supplier Pay'){

            $query = $this->db->select('*')
                              ->from('vaucher')
                              ->where('MONTH(voucherdate)',$month)
                              ->where('YEAR(voucherdate)',$year)
                              ->where('vauchertype',$mparticular)
                              ->where('compid',$_SESSION['compid'])
                              ->get()
                              ->result();

            return $query; 
  
    }else if($mparticular == 'All'){
            $query = $this->db->select('*')
                          ->from('vaucher')
                          ->where('MONTH(voucherdate)',$month)
                          ->where('YEAR(voucherdate)',$year)
                          ->where('compid',$_SESSION['compid'])
                          ->get()
                          ->result();

            return $query;

    }
}

public function get_all_ypurchase_data($year,$rparticular)
  {
    if($rparticular == 'purchase' || $rparticular == 'All'){
      $query = $this->db->select('*')
                        ->from('purchase')
                        ->where('YEAR(purchaseDate)',$year)
                        ->where('compid',$_SESSION['compid'])
                        ->get()
                        ->result();

      return $query;
    }  
}

public function get_all_ysale_data($year,$rparticular)
  {
  if($rparticular == 'sales' || $rparticular == 'All'){
      $query = $this->db->select('*')
                        ->from('sales')
                        ->where('YEAR(saleDate)',$year)
                        ->where('compid',$_SESSION['compid'])
                        ->get()
                        ->result();

      return $query;  
  }
}

// public function get_all_yservice_data($year,$rparticular)
//   {
//     if($rparticular == 'Service Sale' || $rparticular == 'All'){

//         $query = $this->db->select('*')
//                           ->from('service_sale')
//                           ->where('YEAR(ssDate)',$year)
//                           ->get()
//                           ->result();

//         return $query;  
//     }
// }


public function get_all_yvoucher_data($year,$rparticular)
  {
    if($rparticular == 'Credit Voucher' || $rparticular == 'Debit Voucher' || $rparticular == 'Supplier Pay'){

              $query = $this->db->select('*')
                                ->from('vaucher')
                                ->where('YEAR(voucherdate)',$year)
                                ->where('vauchertype',$rparticular)
                                ->where('compid',$_SESSION['compid'])
                                ->get()
                                ->result();

              return $query;  
    }else if($rparticular == 'All'){
              $query = $this->db->select('*')
                                ->from('vaucher')
                                ->where('YEAR(voucherdate)',$year)
                                ->where('compid',$_SESSION['compid'])
                                ->get()
                                ->result();

              return $query; 
    }
}
public function get_data_products($where){
  $query = $this->db->select('p.*,s.totalPices,(sum(pp.pprice)/ count(pp.pp_id)) as avg_purchase')
                    ->from('products p')
                    ->join('stock s','s.product=p.productID','left')
                    ->join('purchase_product pp','pp.productID = p.productID','left')
                    ->where('p.compid',$where['compid'])
                    ->where('p.status',$where['status'])
                    ->group_by('p.productID')
                    ->get()
                    ->result_array();
                    // var_dump($query);
                    // die();

              return $query;
}

public function balance(){
  $query = $this->db->select('sum(balance) as balance')
                    ->from('bankaccount')
                    ->where('compid',$_SESSION['compid'])
                    ->get()
                    ->row();
                    
  return $query;
}
public function get_cash_balance($id){
 $cash = $this->db->select('c.balance')
                    ->from('cash c')
                    ->where('c.ca_id',$id)
                    ->get()
                    ->row();
                    $cashTotal  = $cash->balance;
  

  $sser = $this->db->select('SUM(pAmount) as total')
                                                          ->from('service_sale')
                                                          ->where('accountType','Cash')
                                                          ->where('accountNo',$id)
                                                        //   ->where('compid',$_SESSION['compid'])
                                                          //->where('saleDate',date("Y-m-d"))
                                                          ->get()
                                                          ->row();
                                              //var_dump($sa); //exit();
                                              if($sser == null){
                                                $sserv = 0;
                                                }
                                              else{
                                                $sserv = $sser->total;
                                                }
                                        
                                        $sa = $this->db->select('SUM(pAmount) as total')
                                                    ->from('sales')
                                                    ->where('accountType','Cash')
                                                    ->where('accountNo',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($sa); //exit();
                                        if($sa == null){
                                            $saa = 0;
                                            }
                                        else{
                                            $saa = $sa->total;
                                            }
                                        
                                           // money receipt
                                         $smr = $this->db->select('SUM(amount) as total')
                                                      ->from('sales_payment')
                                                      ->where('accountType','Cash')
                                                       ->where('accountNo',$id)
                                                      ->get()
                                                      ->row();
                                          if($smr == null){
                                            $srec = 0;
                                            }
                                          else{
                                            $srec = $smr->total;
                                            }
                                            
                                      $pmr = $this->db->select('SUM(amount) as total')
                                                      ->from('purchase_payment')
                                                      ->where('accountType','Cash')
                                                       ->where('accountNo',$id)
                                                      ->get()
                                                      ->row();
                                          if($pmr == null){
                                            $prec = 0;
                                            }
                                          else{
                                            $prec = $pmr->total;
                                            }
                                        
                                        $pa = $this->db->select("SUM(pAmount) as total")
                                                    ->from('purchase')
                                                    ->where('accountType','Cash')
                                                    ->where('accountNo',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($pa);// exit();
                                        if($pa == null){
                                            $paa = 0;
                                            }
                                        else{
                                            $paa = $pa->total;
                                            }
            
                                        $va = $this->db->select("SUM(totalamount) as total")
                                                    ->from('vaucher')
                                                    ->where('accountType','Cash')
                                                    ->where('vauchertype','Credit Voucher')
                                                    ->where('accountNo',$id)
                                                    ->where('status',1)
                                                    ->get()
                                                    ->row();
                                        //var_dump($va); //exit();
                                        if($va == null){
                                            $vaa = 0;
                                            }
                                        else{
                                            $vaa = $va->total;
                                            }
            
                                        $va2 = $this->db->select("SUM(totalamount) as total")
                                                    ->from('vaucher')
                                                    ->where('accountType','Cash')
                                                    ->where_not_in('vauchertype','Credit Voucher')
                                                    ->where('accountNo',$id)
                                                    ->where('status',1)
                                                    ->get()
                                                    ->row();
                                        //var_dump($va2); //exit();
                                        if($va2 == null){
                                            $vaa2 = 0;
                                            }
                                        else{
                                            $vaa2 = $va2->total;
                                            }
                                        $tva = $vaa-$vaa2;
            
                                        $temp = $this->db->select("SUM(paid) as total")
                                                    ->from('employee_payment')
                                                    ->where('accountType','Cash')
                                                    ->where('accountNo',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($temp); //exit();
                                        if($temp == null){
                                            $tempa = 0;
                                            }
                                        else{
                                            $tempa = $temp->total;
                                            }
            
                                        $tr = $this->db->select("SUM(paidAmount) as total")
                                                    ->from('returns')
                                                    ->where('accountType','Cash')
                                                    ->where('accountNo',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($tr); //exit();
                                        if($tr == null){
                                            $tra = 0;
                                            }
                                        else{
                                            $tra = $tr->total;
                                            }
                                            
                                        $ptr = $this->db->select("SUM(totalPrice) as total")
                                                          ->from('preturns')
                                                          ->where('accountType','Cash')
                                                          ->where('accountNo',$id)
                                                          //->where('compid',$_SESSION['compid'])
                                                          ->get()
                                                          ->row();
                                              //var_dump($pa); //exit();
                                              if($ptr == null){
                                                $tptr = 0;
                                                }
                                              else{
                                                $tptr = $ptr->total;
                                                }
                                        
                                        $tfbt = $this->db->select("SUM(amount) as total")
                                                    ->from('transfer_account')
                                                    ->where('facType','Cash')
                                                    ->where('facAcno',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($pa); //exit();
                                        if($tfbt)
                                          {
                                          $tfbta = $tfbt->total;
                                          }
                                        else
                                          {
                                          $tfbta = 0;
                                          }
                                        
                                        $ttbt = $this->db->select("SUM(amount) as total")
                                                    ->from('transfer_account')
                                                    ->where('sacType','Cash')
                                                    ->where('sacAcno',$id)
                                                    ->get()
                                                    ->row();
                                        //var_dump($pa); //exit();
                                        if($ttbt)
                                          {
                                          $ttbta = $ttbt->total;
                                          }
                                        else
                                          {
                                          $ttbta = 0;
                                          }

                                       $total['balance'] =  (($cashTotal+$saa+$srec+$sserv+$tva+$ttbta+$tptr)-($paa+$prec+$tempa+$tra+$tfbta));
                                       return $total;

                       
}

public function get_bank_balance($id){
  $cash = $this->db->select('b.balance')
                     ->from('bankaccount b')
                     ->where('b.ba_id',$id)
                     ->get()
                     ->row();
                     $cashTotal  = $cash->balance;
   
 
                     $sser = $this->db->select('SUM(pAmount) as total')
                     ->from('service_sale')
                     ->where('accountType','Bank')
                     ->where('accountNo',$id)
                   //   ->where('compid',$_SESSION['compid'])
                     //->where('saleDate',date("Y-m-d"))
                     ->get()
                     ->row();
         //var_dump($sa); //exit();
         if($sser == null){
           $sserv = 0;
           }
         else{
           $sserv = $sser->total;
           }
   
   $sa = $this->db->select('SUM(pAmount) as total')
               ->from('sales')
               ->where('accountType','Bank')
               ->where('accountNo',$id)
               ->get()
               ->row();
   //var_dump($sa); //exit();
   if($sa == null){
       $saa = 0;
       }
   else{
       $saa = $sa->total;
       }
   
      // money receipt
    $smr = $this->db->select('SUM(amount) as total')
                 ->from('sales_payment')
                 ->where('accountType','Bank')
                  ->where('accountNo',$id)
                 ->get()
                 ->row();
     if($smr == null){
       $srec = 0;
       }
     else{
       $srec = $smr->total;
       }
       
 $pmr = $this->db->select('SUM(amount) as total')
                 ->from('purchase_payment')
                 ->where('accountType','Bank')
                  ->where('accountNo',$id)
                 ->get()
                 ->row();
     if($pmr == null){
       $prec = 0;
       }
     else{
       $prec = $pmr->total;
       }
   
   $pa = $this->db->select("SUM(pAmount) as total")
               ->from('purchase')
               ->where('accountType','Bank')
               ->where('accountNo',$id)
               ->get()
               ->row();
   //var_dump($pa);// exit();
   if($pa == null){
       $paa = 0;
       }
   else{
       $paa = $pa->total;
       }

   $va = $this->db->select("SUM(totalamount) as total")
               ->from('vaucher')
               ->where('accountType','Bank')
               ->where('vauchertype','Credit Voucher')
               ->where('accountNo',$id)
               ->where('status',1)
               ->get()
               ->row();
   //var_dump($va); //exit();
   if($va == null){
       $vaa = 0;
       }
   else{
       $vaa = $va->total;
       }

   $va2 = $this->db->select("SUM(totalamount) as total")
               ->from('vaucher')
               ->where('accountType','Bank')
               ->where_not_in('vauchertype','Credit Voucher')
               ->where('accountNo',$id)
               ->where('status',1)
               ->get()
               ->row();
   //var_dump($va2); //exit();
   if($va2 == null){
       $vaa2 = 0;
       }
   else{
       $vaa2 = $va2->total;
       }
   $tva = $vaa-$vaa2;

   $temp = $this->db->select("SUM(paid) as total")
               ->from('employee_payment')
               ->where('accountType','Bank')
               ->where('accountNo',$id)
               ->get()
               ->row();
   //var_dump($temp); //exit();
   if($temp == null){
       $tempa = 0;
       }
   else{
       $tempa = $temp->total;
       }

   $tr = $this->db->select("SUM(paidAmount) as total")
               ->from('returns')
               ->where('accountType','Bank')
               ->where('accountNo',$id)
               ->get()
               ->row();
   //var_dump($tr); //exit();
   if($tr == null){
       $tra = 0;
       }
   else{
       $tra = $tr->total;
       }
       
   $ptr = $this->db->select("SUM(totalPrice) as total")
                     ->from('preturns')
                     ->where('accountType','Bank')
                     ->where('accountNo',$id)
                     //->where('compid',$_SESSION['compid'])
                     ->get()
                     ->row();
         //var_dump($pa); //exit();
         if($ptr == null){
           $tptr = 0;
           }
         else{
           $tptr = $ptr->total;
           }
   
   $tfbt = $this->db->select("SUM(amount) as total")
               ->from('transfer_account')
               ->where('facType','Bank')
               ->where('facAcno',$id)
               ->get()
               ->row();
   //var_dump($pa); //exit();
   if($tfbt)
     {
     $tfbta = $tfbt->total;
     }
   else
     {
     $tfbta = 0;
     }
   
   $ttbt = $this->db->select("SUM(amount) as total")
               ->from('transfer_account')
               ->where('sacType','Bank')
               ->where('sacAcno',$id)
               ->get()
               ->row();
   //var_dump($pa); //exit();
   if($ttbt)
     {
     $ttbta = $ttbt->total;
     }
   else
     {
     $ttbta = 0;
     }
 
  $total['balance'] =  (($cashTotal+$saa+$srec+$sserv+$tva+$ttbta+$tptr)-($paa+$prec+$tempa+$tra+$tfbta));
  return $total;
 
                        
 }

 public function get_mobile_balance($id){
  $cash = $this->db->select('m.balance')
                     ->from('mobileaccount m')
                     ->where('m.ma_id',$id)
                     ->get()
                     ->row();
                     $cashTotal  = $cash->balance;
   
 
                     $sser = $this->db->select('SUM(pAmount) as total')
                     ->from('service_sale')
                     ->where('accountType','Mobile')
                     ->where('accountNo',$id)
                   //   ->where('compid',$_SESSION['compid'])
                     //->where('saleDate',date("Y-m-d"))
                     ->get()
                     ->row();
         //var_dump($sa); //exit();
         if($sser == null){
           $sserv = 0;
           }
         else{
           $sserv = $sser->total;
           }
   
   $sa = $this->db->select('SUM(pAmount) as total')
               ->from('sales')
               ->where('accountType','Mobile')
               ->where('accountNo',$id)
               ->get()
               ->row();
   //var_dump($sa); //exit();
   if($sa == null){
       $saa = 0;
       }
   else{
       $saa = $sa->total;
       }
   
      // money receipt
    $smr = $this->db->select('SUM(amount) as total')
                 ->from('sales_payment')
                 ->where('accountType','Mobile')
                  ->where('accountNo',$id)
                 ->get()
                 ->row();
     if($smr == null){
       $srec = 0;
       }
     else{
       $srec = $smr->total;
       }
       
 $pmr = $this->db->select('SUM(amount) as total')
                 ->from('purchase_payment')
                 ->where('accountType','Mobile')
                  ->where('accountNo',$id)
                 ->get()
                 ->row();
     if($pmr == null){
       $prec = 0;
       }
     else{
       $prec = $pmr->total;
       }
   
   $pa = $this->db->select("SUM(pAmount) as total")
               ->from('purchase')
               ->where('accountType','Mobile')
               ->where('accountNo',$id)
               ->get()
               ->row();
   //var_dump($pa);// exit();
   if($pa == null){
       $paa = 0;
       }
   else{
       $paa = $pa->total;
       }

   $va = $this->db->select("SUM(totalamount) as total")
               ->from('vaucher')
               ->where('accountType','Mobile')
               ->where('vauchertype','Credit Voucher')
               ->where('accountNo',$id)
               ->where('status',1)
               ->get()
               ->row();
   //var_dump($va); //exit();
   if($va == null){
       $vaa = 0;
       }
   else{
       $vaa = $va->total;
       }

   $va2 = $this->db->select("SUM(totalamount) as total")
               ->from('vaucher')
               ->where('accountType','Mobile')
               ->where_not_in('vauchertype','Credit Voucher')
               ->where('accountNo',$id)
               ->where('status',1)
               ->get()
               ->row();
   //var_dump($va2); //exit();
   if($va2 == null){
       $vaa2 = 0;
       }
   else{
       $vaa2 = $va2->total;
       }
   $tva = $vaa-$vaa2;

   $temp = $this->db->select("SUM(paid) as total")
               ->from('employee_payment')
               ->where('accountType','Mobile')
               ->where('accountNo',$id)
               ->get()
               ->row();
   //var_dump($temp); //exit();
   if($temp == null){
       $tempa = 0;
       }
   else{
       $tempa = $temp->total;
       }

   $tr = $this->db->select("SUM(paidAmount) as total")
               ->from('returns')
               ->where('accountType','Mobile')
               ->where('accountNo',$id)
               ->get()
               ->row();
   //var_dump($tr); //exit();
   if($tr == null){
       $tra = 0;
       }
   else{
       $tra = $tr->total;
       }
       
   $ptr = $this->db->select("SUM(totalPrice) as total")
                     ->from('preturns')
                     ->where('accountType','Mobile')
                     ->where('accountNo',$id)
                     //->where('compid',$_SESSION['compid'])
                     ->get()
                     ->row();
         //var_dump($pa); //exit();
         if($ptr == null){
           $tptr = 0;
           }
         else{
           $tptr = $ptr->total;
           }
   
   $tfbt = $this->db->select("SUM(amount) as total")
               ->from('transfer_account')
               ->where('facType','Mobile')
               ->where('facAcno',$id)
               ->get()
               ->row();
   //var_dump($pa); //exit();
   if($tfbt)
     {
     $tfbta = $tfbt->total;
     }
   else
     {
     $tfbta = 0;
     }
   
   $ttbt = $this->db->select("SUM(amount) as total")
               ->from('transfer_account')
               ->where('sacType','Mobile')
               ->where('sacAcno',$id)
               ->get()
               ->row();
   //var_dump($pa); //exit();
   if($ttbt)
     {
     $ttbta = $ttbt->total;
     }
   else
     {
     $ttbta = 0;
     }
 
  $total['balance'] =  (($cashTotal+$saa+$srec+$sserv+$tva+$ttbta+$tptr)-($paa+$prec+$tempa+$tra+$tfbta));
  return $total;
 
                        
 }

}