<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Webhome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['signUp'] = 'Login/register_account';
$route['OTP'] = 'Login/otp_checked';
$route['forgetPassword'] = 'Login/forget_password';
$route['otpPassword'] = 'Login/otp_password';
$route['passwordSetup'] = 'Login/password_setup';
$route['sitelog'] = 'Activity_log';

$route['Home'] = 'Webhome';
$route['About'] = 'Webhome/about_us';
$route['Feature'] = 'Webhome/why_1st_pick';
$route['Package'] = 'Webhome/pricing';
$route['Blog'] = 'Webhome/blog';
$route['Contact'] = 'Webhome/contact_us';

$route['myProfile'] = 'Home/profile';
$route['comProfile'] = 'Home/company_profile';
$route['aSetting'] = 'Home/account_setting';

$route['Dashboard'] = 'Home';
$route['Setting'] = 'Home/setting_pages';
$route['uSetting'] = 'Home/user_setting_pages';
$route['uReport'] = 'Home/user_reports_pages';

$route['Category'] = 'Category';
$route['subCategory'] = 'Category/sub_category_list';
$route['Brand'] = 'Category/product_brand';
$route['Unit'] = 'Category/product_units';
$route['onlineStore'] = 'Category/online_store_info';

$route['Expense'] = 'Cost';
$route['costReport'] = 'Cost/expense_report_list';

$route['Department'] = 'Employee/emp_department';
$route['Employee'] = 'Employee/employee_info';
$route['empTarget'] = 'Employee/employee_target';
$route['empTSale'] = 'Employee/employee_target_sale_reports';
$route['empLedger'] = 'Employee/employee_ledger_report';

$route['empAttend'] = 'Hradmin/employee_attendance';
$route['newempAttend'] = 'Hradmin/new_employee_attendance';
$route['empAReport'] = 'Hradmin/emp_attendance_report';

$route['Area'] = 'Category/area_list';


$route['PayMyBill'] = 'PayMyBill';

$route['Asset'] = 'Asset';
$route['editAsset/(:num)'] = 'Asset/edit_assets/$1';
$route['assetReport'] = 'Asset/asset_report';

$route['cashReport'] = 'CashAccount/cash_reports';
$route['transAccount'] = 'CashAccount/transfer_account_list';
$route['editTransAccount/(:num)'] = 'CashAccount/edit_transfer_account/$1';
$route['adjustment_list'] = 'CashAccount/adjustment_list';
$route['balance_adjustment'] = 'CashAccount/balance_adjustment';


$route['BankAccount'] = 'BankAccount';
$route['bankReport'] = 'BankAccount/mobile_reports';
$route['bankTReport'] = 'BankAccount/bank_transation_reports';
$route['bankLReport'] = 'BankAccount/bank_transation_legder';

$route['MobileAccount'] = 'MobileAccount';
$route['mobileReport'] = 'MobileAccount/mobile_reports';

$route['uNotice'] = 'User/user_notice_lists';
$route['noticeView/(:num)'] = 'User/view_notice/$1';

$route['uRole'] = 'User/user_role';
$route['User'] = 'User/user_list';
$route['helpSupport'] = 'User/help_support';
$route['helpASupport'] = 'User/help_Asupport';
$route['userList'] = 'User/all_user_lists';

$route['Customer'] = 'Customer';
$route['cusReport'] = 'Customer/all_customer_reports';
$route['cusLedger'] = 'Customer/customer_ledger_report';
$route['custTReport'] = 'Customer/area_reports';
$route['TRLedger'] = 'Customer/area_ledger_report';
$route['customerView/(:num)'] = 'Customer/view_customer/$1';



$route['Supplier'] = 'Supplier';
$route['supplierReport'] = 'Supplier/supplier_report';
$route['supplierLedger'] = 'Supplier/supplier_ledger';
$route['supplierView/(:num)'] = 'Supplier/view_supplier/$1';


$route['Product'] = 'Product';
$route['viewProduct/(:num)'] = 'Product/view_product/$1';
$route['editProduct/(:num)'] = 'Product/edit_products/$1';
$route['stockReport'] = 'Product/product_reports';
$route['stockinhand'] = 'Product/stock_in_hand';
$route['lowStock'] = 'Product/low_product_stock_reports';
$route['pBarcode/(:num)'] = 'Product/create_product_barcode/$1';

$route['Purchase'] = 'Purchase';
$route['newPurchase'] = 'Purchase/new_purchase';
$route['viewPurchase/(:num)'] = 'Purchase/view_purchase/$1';
$route['editPurchase/(:num)'] = 'Purchase/edit_purchase/$1';
$route['purchaseReport'] = 'Purchase/purchases_reports';

$route['Sale'] = 'Sale';
$route['newSale'] = 'Sale/new_sale';
$route['viewSale/(:num)'] = 'Sale/view_invoice/$1';
$route['editSale/(:num)'] = 'Sale/edit_sale/$1';
$route['saleReport'] = 'Sale/all_sales_reports';
$route['deliveryChalan/(:num)'] = 'Sale/sale_delivery_chalan/$1';
$route['tsProduct'] = 'Sale/top_sale_product_report';
$route['salepReport'] = 'Sale/sales_payment_reports';
$route['salevReport'] = 'Sale/sales_vat_reports';
$route['posSales']  = 'Sale/pos_sales_info';
$route['printPSale/(:num)'] = 'Sale/pos_sales_details/$1'; 
$route['saleProduct'] = 'Sale/sales_product_reports';
$route['smReceipt/(:num)'] = 'Sale/view_sale_money_receipt/$1'; 



$route['Return'] = 'Returns';
$route['newReturn'] = 'Returns/new_return';
$route['viewReturn/(:num)'] = 'Returns/view_return/$1';
$route['editReturn/(:num)'] = 'Returns/edit_returns/$1';

$route['pReturn'] = 'Purchase_return/purchase_return_list';
$route['newpReturn'] = 'Purchase_return/new_purchase_return';
$route['viewpReturn/(:num)'] = 'Purchase_return/view_purchase_return/$1';
$route['editpReturn/(:num)'] = 'Purchase_return/edit_purchase_return/$1';

$route['Voucher'] = 'Voucher';
$route['newVoucher'] = 'Voucher/new_voucher';
$route['viewVoucher/(:num)'] = 'Voucher/voucher_details/$1';
$route['editVoucher/(:num)'] = 'Voucher/voucher_edit/$1';
$route['profil-Loss'] = 'Voucher/profit_loss';
$route['incomeStatement'] = 'Voucher/income_statement_reports';
$route['vReports'] = 'Voucher/voucher_report';
$route['dReport'] = 'Voucher/daily_report';
$route['spReports'] = 'Voucher/sale_purchase_profit_report';
$route['notice'] = 'Voucher/user_notice';
$route['uPayment'] = 'Voucher/user_payment_list';
$route['uBill'] = 'Voucher/user_bill_list';
$route['payBill'] = 'Voucher/user_bill_payment';

$route['Quotation'] = 'Quotation';
$route['newQuotation'] = 'Quotation/new_quotation';
$route['viewQuotation/(:num)'] = 'Quotation/view_quotation/$1';
$route['editQuotation/(:num)'] = 'Quotation/edit_quotation/$1';

$route['pageSetup'] = 'Access_setup';
$route['accesSetup'] = 'Access_setup/access_setup';
$route['viewAccess/(:num)'] = 'Access_setup/view_access_setup/$1';
$route['editAccess/(:num)'] = 'Access_setup/edit_access_setup/$1';
$route['userAccess'] = 'Access_setup/user_access_setup';
$route['viewUAccess/(:num)'] = 'Access_setup/view_uaccess_setup/$1';
$route['editUAccess/(:num)'] = 'Access_setup/edit_uaccess_setup/$1';

$route['empPayment'] = 'Employee_payment';
$route['newempPayment'] = 'Employee_payment/AddInfo';
$route['editEmpPayment/(:num)'] = 'Employee_payment/edit_Employee_Payment/$1';
$route['empPaymentDetails/(:num)'] = 'Employee_payment/emp_payment_details/$1';
$route['employeePayReport'] = 'Employee_payment/employeePayReport';


$route['store/(:any)'] = 'Webhome/store_details/$1';
$route['catProduct/(:num)/(:any)'] = 'Webhome/category_product_details/$1/$2';
$route['pDetails/(:num)/(:any)'] = 'Webhome/product_details/$1/$2';
$route['checkOut/(:num)'] = 'Webhome/check_out_order/$1';
$route['order'] = 'Webhome/order_product_list';
$route['odView/(:num)'] = 'Webhome/order_product_details/$1';
$route['infoPage/(:num)/(:any)'] = 'Webhome/information_page_details/$1/$2';
$route['contactUs/(:num)/(:any)'] = 'Webhome/contact_information/$1/$2';

$route['pageSetting'] = 'Webseting/page_setting_list';

$route['serviceInfo'] = 'Service/service_information';
$route['serviceSale'] = 'Service/service_sale_info';
$route['newSService'] = 'Service/new_sale_service';
$route['viewSService/(:num)'] = 'Service/view_sale_service/$1';
$route['editSService/(:num)'] = 'Service/edit_sale_service/$1';

$route['saleOrder/(:num)'] = 'Order/sale_Order/$1';
$route['orderReport'] = 'Order/order_ledger_report';

$route['salesiReport'] = 'Sale/sales_invoice_reports';
$route['salesdReport'] = 'Sale/sales_due_reports';

$route['trialBalance'] = 'AccountBalance/trial_balance_reports';
$route['balanceSheet'] = 'AccountBalance/balance_sheet_reports';
$route['cashFlow'] = 'AccountBalance/cash_flow_reports';

# EASY CHECKOUT SSLC
$route['requestapih'] = 'Payment/request_api_hosted';
$route['easyendpoint'] = 'Payment/easycheckout_endpoint';

# COMMON ROUTE SSLC
$route['success'] = 'Payment/success_payment';
$route['fail'] = 'Payment/fail_payment';
$route['cancel'] = 'Payment/cancel_payment';
$route['ipn'] = 'Payment/ipn_listener';
$route['allTransaction'] = 'Home/all_transaction_report';
