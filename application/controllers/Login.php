<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct()
    {
    parent::__construct();
    $this->load->model("prime_model",'pm');
    $this->load->library('form_validation');
    $this->load->library('email');
		
}

        ################################################
        #   /* Pages  start*/                          #
        ################################################


public function index()
    {
    $data['title'] = 'Sign In';
        
    $this->load->view('login',$data);
}

public function loginProcess()
    {
    $info = $this->input->post();

    $uname = $info['username'];
    if(is_numeric($uname))
        {     
        $where = array(
            'mobile'   => '+88'.$info['username'],
            'status'   => 'Active',
            'password' => $info['password']
                );
        }
    else
        {
        $where = array(
            'email'    => $info['username'],
            'status'   => 'Active',
            'password' => $info['password']
                );
        }
    // var_dump($where); //exit();
    $user_data = $this->pm->get_data('users',$where);
    //var_dump($user_data); exit();
    if($user_data)
        {
        $udata = [
            'uid'      => $user_data[0]['uid'],
            'name'     => $user_data[0]['name'],
            'compname' => $user_data[0]['compname'],
            'email'    => $user_data[0]['email'],
            'role'     => $user_data[0]['userrole'],
            'compid'   => $user_data[0]['compid'],
            'empid'    => $user_data[0]['empid']
                ];
        //var_dump($udata); //exit();
        $this->session->set_userdata($udata);
        $log = [
          'activity' => 'User Logged in to dashboard',
          'user_id'       => $user_data[0]['uid'],
          'compid'       => $_SESSION['compid'],
          
                    ];
        $this->pm->insert_data('activity_logs',$log);
        $pwhere = array(
            'utype'  => $user_data[0]['userrole'],
            'compid' => $user_data[0]['compid']
                );

        $page = $this->pm->get_data('tbl_user_p_permission',$pwhere);
        $function = $this->pm->get_data('tbl_user_f_permission',$pwhere);
        //var_dump($pwhere); var_dump($page); var_dump($function); //exit();
        if($page)
            {
        $pdata = [
            'dashboard'    => $page[0]['dashboard'],
            'product'      => $page[0]['product'],
            'purchase'     => $page[0]['purchase'],
            'sales'        => $page[0]['sales'],
            'return'       => $page[0]['return'],
            'quotation'    => $page[0]['quotation'],
            'voucher'      => $page[0]['voucher'],
            'users'        => $page[0]['users'],
            'report'       => $page[0]['report'],
            'setting'      => $page[0]['setting'],
            'access_setup' => $page[0]['access_setup'],
            'help_support' => $page[0]['help_support'],
            'Employee_payment' => $page[0]['Employee_payment']
                            ];

        $fdata = [
            'add_product'           => $function[0]['add_product'],
            'view_product'          => $function[0]['view_product'],
            'edit_product'          => $function[0]['edit_product'],
            'delete_product'        => $function[0]['delete_product'],
            'store_product'         => $function[0]['store_product'],
            'import_product'        => $function[0]['import_product'],
            'new_purchase'          => $function[0]['new_purchase'],
            'edit_purchase'         => $function[0]['edit_purchase'],
            'view_purchase'         => $function[0]['view_purchase'],
            'delete_purchase'       => $function[0]['delete_purchase'],
            'new_sale'              => $function[0]['new_sale'],
            'view_sale'             => $function[0]['view_sale'],
            'edit_sale'             => $function[0]['edit_sale'],
            'delete_sale'           => $function[0]['delete_sale'],
            'new_return'            => $function[0]['new_return'],
            'view_return'           => $function[0]['view_return'],
            'edit_return'           => $function[0]['edit_return'],
            'delete_return'         => $function[0]['delete_return'],
            'new_quotation'         => $function[0]['new_quotation'],
            'view_quotation'        => $function[0]['view_quotation'],
            'edit_quotation'        => $function[0]['edit_quotation'],
            'delete_quotation'      => $function[0]['delete_quotation'],
            'new_voucher'           => $function[0]['new_voucher'],
            'view_voucher'          => $function[0]['view_voucher'],
            'edit_voucher'          => $function[0]['edit_voucher'],
            'delete_voucher'        => $function[0]['delete_voucher'],
            'customer'              => $function[0]['customer'],
            'supplier'              => $function[0]['supplier'],
            'employee'              => $function[0]['employee'],
            'user'                  => $function[0]['user'],
            'sales_report'          => $function[0]['sales_report'],
            'purchase_report'       => $function[0]['purchase_report'],
            'profit_loss_report'    => $function[0]['profit_loss_report'],
            'sales_purchase_report' => $function[0]['sales_purchase_report'],
            'customer_report'       => $function[0]['customer_report'],
            'customer_ledger'       => $function[0]['customer_ledger'],
            'supplier_report'       => $function[0]['supplier_report'],
            'supplier_ledger'       => $function[0]['supplier_ledger'],
            'stock_report'          => $function[0]['stock_report'],
            'voucher_report'        => $function[0]['voucher_report'],
            'daily_report'          => $function[0]['daily_report'],
            'cash_book'             => $function[0]['cash_book'],
            'bank_book'             => $function[0]['bank_book'],
            'mobile_book'           => $function[0]['mobile_book'],
            'category'              => $function[0]['category'],
            'unit'                  => $function[0]['unit'],
            'expense_type'          => $function[0]['expense_type'],
            'department'            => $function[0]['department'],
            'bank_account'          => $function[0]['bank_account'],
            'mobile_account'        => $function[0]['mobile_account'],
            'notice'                => $function[0]['notice'],
            'user_type'             => $function[0]['user_type'],
            'newPayment'            => $function[0]['newPayment']
                    ];
        //var_dump($pdata); var_dump($fdata); exit();
        $this->session->set_userdata($pdata);
        $this->session->set_userdata($fdata);
            }
        redirect('Dashboard');
        }
    else
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> Invalid Login id or Password !</h4>
            </div>'
                ];

        $this->session->set_userdata($sdata);
        redirect('Login');
        }
}

public function register_account()
    {
    $data['title'] = 'Sign Up';
        
    $this->load->view('register',$data);
}

public function user_registration()
{
        if ($_POST) {
            $username = $this->input->post('name');
            $password = $this->input->post('password');
            $mobile = $this->input->post('mobile');
            $slug = $this->generateSlug($username);
            $database_name = 'cashboi_com_' . $slug;

            $query = $this->db->select('uid')->from('users')->order_by('uid', 'DESC')->limit(1)->get()->row();

            $sn = 1;
            if ($query) $sn = $query->uid + 1;

            $cn = strtoupper(substr($username, 0, 3));
            $pc = sprintf("%'05d", $sn);

            $companyID = 'COM-' . $cn . $pc;
            $this->db->insert('users', [
                'name' => $username,
                'compid' => $companyID,
                'compname' => $username,
                'password' => $password,
                'database_name' => $database_name,
                'mobile' => "+88" . $mobile
            ]);
            
            $cdata = [
              'com_name' => $username,
              'compid' => $companyID,
            ];

            $this->pm->insert_data('com_profile', $cdata);


            # Send SMS
            $message = urlencode("Your account created successfully. Please contact with website administrator to active your account.");
            $to = urlencode($mobile);
            $token = urlencode("yfynrvxm-erdvybul-5lkgcewi-ivyfmpg8-r220zvby");

            $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
                      
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);

            // Create the user's database
            // You'll need to have appropriate privileges to do this
            $this->load->dbforge();
            $this->dbforge->create_database($database_name);

            $str = 'use ' . $database_name;
            $this->db->query($str);

            // Get the list of tables from the main database
            $main_db_name = $this->db->database; // Replace with your main database name
            $main_db_tables = $this->db->query("SHOW TABLES FROM $main_db_name")->result_array();

            // foreach ($main_db_tables as $table) {
            //     $table_name = $table['Tables_in_' . $main_db_name];

            //     // Retrieve the structure of the main database table
            //     $main_db_table_structure = $this->db->query("SHOW CREATE TABLE $main_db_name.$table_name")->row_array();

            //     // Create the same table in the new database
            //     $this->db->query($main_db_table_structure['Create Table']);

            //     // Copy data from the main database table to the new database table
            //     $this->db->query("INSERT INTO $database_name.$table_name SELECT * FROM $main_db_name.$table_name");
            // }

            // foreach ($main_db_tables as $table) {
            //     $table_name = $table['Tables_in_' . $main_db_name];

            //     // Retrieve the structure of the main database table
            //     $main_db_table_structure = $this->db->query("SHOW CREATE TABLE $main_db_name.$table_name")->row_array();

            //     // Extract the CREATE TABLE SQL statement from the result
            //     $create_table_sql = $main_db_table_structure['Create Table'];

            //     // Modify the database name in the CREATE TABLE statement to point to the new database
            //     $create_table_sql = str_replace("CREATE TABLE $main_db_name.", "CREATE TABLE $database_name.", $create_table_sql);

            //     // Create the table in the new database with the same structure
            //     $this->db->query($create_table_sql);
            // }

            // foreach ($main_db_tables as $table) {
            //     $table_name = $table['Tables_in_' . $main_db_name];

            //     // Determine the action based on table name
            //     if (in_array($table_name, ['access_lavels'])) {
            //         // Tables to copy as-is
            //         $create_table_sql = $this->getCreateTableSQL($main_db_name, $table_name);
            //     } elseif (in_array($table_name, ['caccount_type', 'child_atype', 'sub_atype', 'major_atype', 'tbl_user_f_permission', 'tbl_user_m_permission', 'tbl_user_p_permission'])) {
            //         // Tables to modify and then copy
            //         $this->modifyAndCopyTable($main_db_name, $table_name, $database_name);
            //         continue; // Skip to next table after modifying and copying
            //     } else {
            //         // Tables to empty and then copy
            //         $this->emptyAndCopyTable($main_db_name, $table_name, $database_name);
            //         continue; // Skip to next table after emptying and copying
            //     }

            //     // Create the table in the new database with the same structure
            //     $this->db->query($create_table_sql);
            // }

            foreach ($main_db_tables as $table) {
              $table_name = $table['Tables_in_' . $main_db_name];
              // Check if the table should be copied as is, modified with new values, or emptied
              if (in_array($table_name, ['access_lavels', 'area', 'cash','districts', 'divisions', 'country', 'tbl_user_f_permission', 'tbl_user_m_permission', 'tbl_user_p_permission', 'upazilas'])) {
                // var_dump($table_name);exit();
                  // Case 1: Copy table as is
                  $this->copyTableAsIs($table_name, $main_db_name, $database_name);
              } elseif (in_array($table_name, ['com_profile', 'users'])) {
                  // Case 2: Add new values and then copy the table
                  $this->addValuesAfterCopyingTable($table_name, $main_db_name, $database_name, $companyID, $username, $password);
              } else {
                  // Case 3: Empty the table and then copy it
                  $this->emptyAndCopyTable($main_db_name, $table_name, $database_name);
              }
          }

            redirect('signUp'); // Redirect to the login page
        }

        $this->load->view('signUp'); // Load the registration form view
    }

    // Function to copy a table as is
private function copyTableAsIs($table_name, $source_db_name, $target_db_name) {
  $create_table_sql = $this->getCreateTableSQL($table_name, $source_db_name, $target_db_name);
  $this->db->query($create_table_sql);

  $copy_data_sql = "INSERT INTO $target_db_name.$table_name SELECT * FROM $source_db_name.$table_name";
  $this->db->query($copy_data_sql);
}

// Function to add new values and then copy the table
// private function addValuesAndCopyTable($table_name, $source_db_name, $target_db_name) {
//   // Add new values to the table in the source database first (example)
//   $this->db->query("INSERT INTO $source_db_name.$table_name (column1, column2) VALUES ('value1', 'value2')");

//   // Then copy the modified table to the target database
//   $this->copyTableAsIs($table_name, $source_db_name, $target_db_name);
// }

private function addValuesAfterCopyingTable($table_name, $source_db_name, $target_db_name, $companyID, $username, $password) {
  // Copy the structure to the target database
  $this->copyTableStructure($table_name, $source_db_name, $target_db_name);

  // Add new values to the table in the target database
  $this->addValuesToTable($table_name, $source_db_name, $target_db_name, $companyID, $username, $password);
}

// Function to copy table structure to the target database
private function copyTableStructure($table_name, $source_db_name, $target_db_name) {
  $create_table_sql = $this->getCreateTableSQL($table_name, $source_db_name, $target_db_name);
  $this->db->query($create_table_sql);
}

// Function to add new values to the table in the target database
private function addValuesToTable($table_name, $source_db_name, $target_db_name, $companyID, $username, $password) {
  // Add new values to the table in the target database (example)
  if($table_name == 'com_profile'){
    $this->db->query("INSERT INTO $target_db_name.$table_name (`com_pid`, `compid`, `com_name`) VALUES ('', '$companyID', '$username')");
  }elseif($table_name == 'users'){
    $this->db->query("INSERT INTO $target_db_name.$table_name (`uid`, `compid`, `empid`, `name`, `compname`, `email`, `mobile`, `password`, `userrole`,`status`) VALUES
                                                              ('', '$companyID', 0, 'admin', '$username', '', '', '$password', 2, 'Active' )");
  }else{}
}

// Function to empty the table and then copy it
// private function emptyAndCopyTable($table_name, $target_db_name) {
//   // Empty the table in the target database
//   $this->db->query("DELETE FROM $target_db_name.$table_name");

//   // Copy the structure (empty table) to the target database
//   $create_table_sql = $this->getCreateTableSQL($table_name, $main_db_name, $target_db_name);
//   $this->db->query($create_table_sql);
// }

// Helper function to retrieve the CREATE TABLE SQL statement
private function getCreateTableSQL($table_name, $source_db_name, $target_db_name) {
  $main_db_table_structure = $this->db->query("SHOW CREATE TABLE $source_db_name.$table_name")->row_array();
  $create_table_sql = $main_db_table_structure['Create Table'];

  // Modify the database name in the CREATE TABLE statement to point to the target database
  $create_table_sql = str_replace("CREATE TABLE $source_db_name.", "CREATE TABLE $target_db_name.", $create_table_sql);

  return $create_table_sql;
}

    private function generateSlug($businessName)
    {
        // Remove special characters and replace spaces with hyphens
        $slug = strtolower(preg_replace('/[^a-zA-Z0-9\s]/', '', $businessName));
        $slug = str_replace(' ', '_', $slug);

        // Generate a random number between 1000 and 9999
        $randomNumber = rand(1000, 9999);

        // Concatenate the random number with the slug
        $finalSlug = $slug . '_' . $randomNumber;

        return $finalSlug;
    }
/**
 * Helper function to retrieve the CREATE TABLE SQL statement for a table.
 *
 * @param string $main_db_name Name of the main database
 * @param string $table_name Name of the table
 * @return string CREATE TABLE SQL statement
 */
    // private function getCreateTableSQL($main_db_name, $table_name)
    // {
    //     $main_db_table_structure = $this->db->query("SHOW CREATE TABLE $main_db_name.$table_name")->row_array();
    //     return $main_db_table_structure['Create Table'];
    // }

/**
 * Helper function to modify and copy a table to the new database.
 *
 * @param string $main_db_name Name of the main database
 * @param string $table_name Name of the table
 * @param string $new_db_name Name of the new database
 */
    private function modifyAndCopyTable($main_db_name, $table_name, $new_db_name)
    {
        // Perform necessary modifications (e.g., adding new values) to the table in the main database
        // Example:
        // $this->db->query("INSERT INTO $main_db_name.$table_name (column1, column2) VALUES ('value1', 'value2')");

        // Create the table in the new database with the modified structure and data
        $this->db->query("CREATE TABLE $new_db_name.$table_name LIKE $main_db_name.$table_name");
        $this->db->query("INSERT INTO $new_db_name.$table_name SELECT * FROM $main_db_name.$table_name");
    }

/**
 * Helper function to empty and copy a table to the new database.
 *
 * @param string $main_db_name Name of the main database
 * @param string $table_name Name of the table
 * @param string $new_db_name Name of the new database
 */
    private function emptyAndCopyTable($main_db_name, $table_name, $new_db_name)
    {
        // Empty the table in the main database

        // Create the table in the new database and copy structure/data
        $this->db->query("CREATE TABLE $new_db_name.$table_name LIKE $main_db_name.$table_name");
        $this->db->query("INSERT INTO $new_db_name.$table_name SELECT * FROM $main_db_name.$table_name");
        $this->db->query("TRUNCATE TABLE $new_db_name.$table_name");
    }

public function check_user_email()
  {
  $grup = $this->pm->check_user_email($_POST['id']);
  $someJSON = json_encode($grup);
  echo $someJSON;
}

public function save_register()
  {
  $info = $this->input->post();

  $ewhere = array(
    'email' => $info['email']
        );
  $edata = $this->pm->get_data('users',$ewhere);

  $mwhere = array(
    'mobile' => '+88'.$info['mobile']
        );
    //var_dump($mwhere); exit();
  $mdata = $this->pm->get_data('users',$mwhere);
  if($edata && $edata[0]['email'])
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> This email all ready Used !</h4>
        </div>'
        ];

    $this->session->set_userdata($sdata);
    redirect('signUp');
    }
  else if($mdata)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> This mobile number all ready Used !</h4>
        </div>'
        ];

    $this->session->set_userdata($sdata);
    redirect('signUp');
    }
  else
    {
    $digits = 6;
    $otp = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    $msg = $otp.' is your otp code for verify Account. Expires in 10 minites. Sunshine it';
    
    $mob = '+88'.$info['mobile'];

    $token = urlencode("hdisolyp-8b0czxjl-jjlheqln-yfcuqywa-pjjec9lh");
    $message = urlencode($msg);
    $to = urlencode($mob);
    $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
            
            //var_dump($url);exit();
    $data = array(
      'to'      => "$to",
      'message' => "$message",
      'token'   => "$token"
            );
                  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);
        
    $udata = array(
      'name'     => $info['name'],
      'otp'      => $otp,
      'compname' => $info['name'],
      'email'    => $info['email'],
      'mobile'   => '+88'.$info['mobile'],
      'password' => $info['password']
          );

    $this->session->set_userdata($udata);

    if($smsresult)
      {
      $sdata = [
        'exception' =>'<div class="alert alert-success alert-dismissible">
          <h4><i class="icon fa fa-check"></i>User Register Successfully!. Enter OTP code, for verify your account.</h4>
          </div>'
          ];

      $this->session->set_userdata($sdata);
      redirect('OTP');
      }
    else
      {
      $sdata = [
        'exception' =>'<div class="alert alert-success alert-dismissible">
          <h4><i class="icon fa fa-check"></i> Somethings is Wrong !</h4>
          </div>'
          ];

      $this->session->set_userdata($sdata);
      redirect('signUp');
      }
    }
}

// public function save_register()
//     {
//     $info = $this->input->post();

//     $ewhere = array(
//         'email' => $info['email']
//             );
//     $edata = $this->pm->get_data('users',$ewhere);

//     $mwhere = array(
//         'mobile' => '+88'.$info['mobile']
//             );
//     //var_dump($mwhere); exit();
//     $mdata = $this->pm->get_data('users',$mwhere);
//     if($edata && $edata[0]['email'])
//         {
//         $sdata = [
//           'exception' =>'<div class="alert alert-danger alert-dismissible">
//             <h4><i class="icon fa fa-ban"></i> This email all ready Used !</h4>
//             </div>'
//             ];

//         $this->session->set_userdata($sdata);
//         redirect('signUp');
//         }
//     else if($mdata)
//         {
//         $sdata = [
//           'exception' =>'<div class="alert alert-danger alert-dismissible">
//             <h4><i class="icon fa fa-ban"></i> This mobile number all ready Used !</h4>
//             </div>'
//             ];

//         $this->session->set_userdata($sdata);
//         redirect('signUp');
//         }
//     else
//         {
//         $query = $this->db->select('compid')
//                   ->from('users')
//                   ->limit(1)
//                   ->order_by('compid','DESC')
//                   ->get()
//                   ->row();
//         if($query)
//             {
//             $sn = substr($query->compid,7)+1;
//             }
//         else
//             {
//             $sn = 1;
//             }
//         //var_dump($sn); exit();
//         $cn = strtoupper(substr($info['name'],0,2));
//         $pc = sprintf("%'05d",$sn);

//         $empid = 'SUN-'.$cn.'-'.$pc;
        
//         $data = array(
//             'name'     => $info['name'],
//             'compid'   => $empid,
//             'compname' => $info['name'],
//             'email'    => $info['email'],
//             'mobile'   => '+88'.$info['mobile'],
//             'password' => $info['password']
//                 );

//         $result = $this->pm->insert_data('users',$data);

//         $udata = [
//             'uid'      => $result,
//             'name'     => $info['name'],
//             'compname' => $info['name'],
//             'email'    => $info['email'],
//             'role'     => 2,
//             'compid'   => $empid
//                 ];
//         //var_dump($sdata); exit();
//         $this->session->set_userdata($udata);
        
//         $cdata = array(
//             'com_name'   => $info['name'],
//             'compid'     => $empid,
//             'com_mobile' => '+88'.$info['mobile'],
//             'com_email'  => $info['email']
//                 );

//         $result = $this->pm->insert_data('com_profile',$cdata);
        
//         $pdata = [
//             'utype'        => 2,
//             'compid'       => $empid,
//             'regby'        => $result,
//             'dashboard'    => 1,
//             'product'      => 1,
//             'purchase'     => 1,
//             'sales'        => 1,
//             'return'       => 1,
//             'quotation'    => 1,
//             'voucher'      => 1,
//             'users'        => 1,
//             'report'       => 1,
//             'setting'      => 1,
//             'access_setup' => 1,
//             'help_support' => 1,
//             'Employee_payment' => 1
//                             ];

//         $fdata = [
//             'utype'                 => 2,
//             'compid'                => $empid,
//             'regby'                 => $result,
//             'add_product'           => 1,
//             'view_product'          => 1,
//             'edit_product'          => 1,
//             'delete_product'        => 1,
//             'store_product'         => 1,
//             'import_product'        => 1,
//             'new_purchase'          => 1,
//             'edit_purchase'         => 1,
//             'view_purchase'         => 1,
//             'delete_purchase'       => 1,
//             'new_sale'              => 1,
//             'view_sale'             => 1,
//             'edit_sale'             => 1,
//             'delete_sale'           => 1,
//             'new_return'            => 1,
//             'view_return'           => 1,
//             'edit_return'           => 1,
//             'delete_return'         => 1,
//             'new_quotation'         => 1,
//             'view_quotation'        => 1,
//             'edit_quotation'        => 1,
//             'delete_quotation'      => 1,
//             'new_voucher'           => 1,
//             'view_voucher'          => 1,
//             'edit_voucher'          => 1,
//             'delete_voucher'        => 1,
//             'customer'              => 1,
//             'supplier'              => 1,
//             'employee'              => 1,
//             'user'                  => 1,
//             'sales_report'          => 1,
//             'purchase_report'       => 1,
//             'profit_loss_report'    => 1,
//             'sales_purchase_report' => 1,
//             'customer_report'       => 1,
//             'customer_ledger'       => 1,
//             'supplier_report'       => 1,
//             'supplier_ledger'       => 1,
//             'stock_report'          => 1,
//             'voucher_report'        => 1,
//             'daily_report'          => 1,
//             'cash_book'             => 1,
//             'bank_book'             => 1,
//             'mobile_book'           => 1,
//             'category'              => 1,
//             'unit'                  => 1,
//             'expense_type'          => 1,
//             'department'            => 1,
//             'bank_account'          => 1,
//             'mobile_account'        => 1,
//             'notice'                => 1,
//             'user_type'             => 1,
//             'newPayment'            => 1
//                     ];

//         $this->pm->insert_data('tbl_user_m_permission',$pdata);
//         $this->pm->insert_data('tbl_user_p_permission',$pdata);
//         $this->pm->insert_data('tbl_user_f_permission',$fdata);
        
//         $cash = array(
//             'compid'   => $empid,
//             'cashName' => 'Cash in Hand',
//             'regby'    => $result
//                 );

//         $this->pm->insert_data('cash',$cash);

//         if($result)
//             {
//             $digits = 6;
//             $otp = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
//             $msg = $otp.' is your otp code for verify Account. Expires in 10 minites. Sunshine it';
            
//             $mob = '+88'.$info['mobile'];
//             //$token = "44515996325214391599632521";
//             $token = urlencode("hdisolyp-8b0czxjl-jjlheqln-yfcuqywa-pjjec9lh");
//             $message = urlencode($msg);
//             $to = urlencode($mob);
//             $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
            
//             //$url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
//             //var_dump($url);exit();
//             $data = array(
//                 'to'      => "$to",
//                 'message' => "$message",
//                 'token'   =>"$token"
//                   );
                  
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL,$url);
//             curl_setopt($ch, CURLOPT_ENCODING, '');
//             curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//             $smsresult = curl_exec($ch);
//             //var_dump($smsresult); exit();
//             $udata = array(
//                 'otp'  => $otp,
//                 'uid' => $_SESSION['uid']
//                   );
//             //var_dump($udata); exit();

//             $uwhere = array(
//                 'mobile' => $mob,
//                 'uid' => $_SESSION['uid']
//                   );

//             $result2 = $this->pm->update_data('users',$udata,$uwhere);

//             if($result2)
//                 {
//                 $msg2 =  'User account id & password is https://sunshine.com.bd/app/ User: '.$info['mobile'].'Pass: '.$info['password'].' Sunshine It';
//                 //var_dump($msg2);
//                 $mob2 = '+8801714044180';
//                 //$token = "44515996325214391599632521";
//                 //$token2 = urlencode("4cc079b5-c2a5-4cdc-ac07-1ee0fe8e6b5d");
//                 $message2 = urlencode($msg2);
//                 $to2 = urlencode($mob2);
//                 $token2 = urlencode("hdisolyp-8b0czxjl-jjlheqln-yfcuqywa-pjjec9lh");
//                 $url2 = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token2&sid=NONSUNSHINEIT&sms=$msg2&msisdn=$to2&csms_id=1";
//                 //$url2 = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token2&sid=NONSUNSHINEIT&sms=$message2&msisdn=$to2&csms_id=1";
            
//               //var_dump($url); //exit();
//                 $mdata = array(
//                     'to'      => "$to2",
//                     'message' => "$message2",
//                     'token'   =>"$token2"
//                       );
                      
//                 $ch = curl_init();
//                 curl_setopt($ch, CURLOPT_URL,$url2);
//                 curl_setopt($ch, CURLOPT_ENCODING, '');
//                 curl_setopt($ch, CURLOPT_POSTFIELDS,$mdata);
//                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                 $smsresult = curl_exec($ch);
                
//                 //var_dump($smsresult);exit();
            
//                 $sdata = [
//                   'exception' =>'<div class="alert alert-success alert-dismissible">
//                     <h4><i class="icon fa fa-check"></i>User Register Successfully!. Enter OTP code, for verify your account.</h4>
//                     </div>'
//                     ];

//                 $this->session->set_userdata($sdata);
//                 redirect('OTP');
//                 }
//             else
//                 {
//                 $sdata = [
//                   'exception' =>'<div class="alert alert-success alert-dismissible">
//                     <h4><i class="icon fa fa-check"></i>Somethings is Wrong !</h4>
//                     </div>'
//                     ];

//                 $this->session->set_userdata($sdata);
//                 redirect('signUp');
//                 }
//             }
//         else
//             {
//             $sdata = [
//               'exception' =>'<div class="alert alert-danger alert-dismissible">
//                 <h4><i class="icon fa fa-ban"></i> Failed !</h4>
//                 </div>'
//                     ];

//             $this->session->set_userdata($sdata);
//             redirect('signUp');
//             }
//         }
// }

public function otp_checked()
    {
    $data['title'] = 'Account Verify';
        
    $this->load->view('otp_checked',$data);
}

public function save_otp_check()
  {
  $info = $this->input->post();
  $ewhere = array(
    'email' => $_SESSION['email']
        );
  $edata = $this->pm->get_data('users',$ewhere);

  $mwhere = array(
    'mobile' => $_SESSION['mobile']
        );
    //var_dump($mwhere); exit();
  $mdata = $this->pm->get_data('users',$mwhere);
  if($edata && $edata[0]['email'])
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> This email all ready Used !</h4>
        </div>'
        ];

    $this->session->set_userdata($sdata);
    redirect('OTP');
    }
  else if($mdata)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> This mobile number all ready Used !</h4>
        </div>'
        ];

    $this->session->set_userdata($sdata);
    redirect('OTP');
    }
  else if($info['otp'] == isset($_SESSION['otp']))
    {
    $query = $this->db->select('uid')
                  ->from('users')
                  ->limit(1)
                  ->order_by('uid','DESC')
                  ->get()
                  ->row();
    if($query)
      {
      $sn = $query->uid+1;
      }
    else
      {
      $sn = 1;
      }
        //var_dump($sn); exit();
    $cn = strtoupper(substr($_SESSION['name'],0,2));
    $pc = sprintf("%'05d",$sn);

    $empid = 'SUN-'.$cn.'-'.$pc;
        
    $data = array(
      'name'     => $_SESSION['name'],
      'compid'   => $empid,
      'compname' => $_SESSION['name'],
      'email'    => $_SESSION['email'],
      'mobile'   => $_SESSION['mobile'],
      'password' => $_SESSION['password'],
      'status'   => 'Active',
          );
    
    $result = $this->pm->insert_data('users',$data);

    $cdata = array(
      'com_name'   => $_SESSION['name'],
      'compid'     => $empid,
      'com_mobile' => $_SESSION['mobile'],
      'com_email'  => $_SESSION['email']
          );

    $this->pm->insert_data('com_profile',$cdata);
    
    $pdata = [
        'utype'        => 2,
        'compid'       => $empid,
        'regby'        => $result,
        'dashboard'    => 1,
        'product'      => 1,
        'purchase'     => 1,
        'sales'        => 1,
        'return'       => 1,
        'quotation'    => 1,
        'voucher'      => 1,
        'users'        => 1,
        'report'       => 1,
        'setting'      => 1,
        'access_setup' => 1,
        'help_support' => 1,
        'Employee_payment' => 1
                        ];

    $fdata = [
        'utype'                 => 2,
        'compid'                => $empid,
        'regby'                 => $result,
        'add_product'           => 1,
        'view_product'          => 1,
        'edit_product'          => 1,
        'delete_product'        => 1,
        'store_product'         => 1,
        'import_product'        => 1,
        'new_purchase'          => 1,
        'edit_purchase'         => 1,
        'view_purchase'         => 1,
        'delete_purchase'       => 1,
        'new_sale'              => 1,
        'view_sale'             => 1,
        'edit_sale'             => 1,
        'delete_sale'           => 1,
        'new_return'            => 1,
        'view_return'           => 1,
        'edit_return'           => 1,
        'delete_return'         => 1,
        'new_quotation'         => 1,
        'view_quotation'        => 1,
        'edit_quotation'        => 1,
        'delete_quotation'      => 1,
        'new_voucher'           => 1,
        'view_voucher'          => 1,
        'edit_voucher'          => 1,
        'delete_voucher'        => 1,
        'customer'              => 1,
        'supplier'              => 1,
        'employee'              => 1,
        'user'                  => 1,
        'sales_report'          => 1,
        'purchase_report'       => 1,
        'profit_loss_report'    => 1,
        'sales_purchase_report' => 1,
        'customer_report'       => 1,
        'customer_ledger'       => 1,
        'supplier_report'       => 1,
        'supplier_ledger'       => 1,
        'stock_report'          => 1,
        'voucher_report'        => 1,
        'daily_report'          => 1,
        'cash_book'             => 1,
        'bank_book'             => 1,
        'mobile_book'           => 1,
        'category'              => 1,
        'unit'                  => 1,
        'expense_type'          => 1,
        'department'            => 1,
        'bank_account'          => 1,
        'mobile_account'        => 1,
        'notice'                => 1,
        'user_type'             => 1,
        'newPayment'            => 1
                ];

    $this->pm->insert_data('tbl_user_m_permission',$pdata);
    $this->pm->insert_data('tbl_user_p_permission',$pdata);
    $this->pm->insert_data('tbl_user_f_permission',$fdata);

    $cash = array(
      'compid'   => $empid,
      'cashName' => 'Cash in Hand',
      'regby'    => $result
          );

    $this->pm->insert_data('cash',$cash);
    
    $mob = $_SESSION['mobile'];
    $pass = $_SESSION['password'];

		$email_name = $_SESSION['name'];
		$email_email = $_SESSION['email'];
    $this->session->sess_destroy();
    
    $msg = "Welcome To Sunshine. Your software is ready tos use \nURL: https://sunshine.com.bd/app/"."\nID : ".$mob."\nPass : ".$pass."\nThank You\nSunshine IT";
        //var_dump($msg); exit();
    $message = urlencode($msg);
    $to = urlencode($mob);
    $token = urlencode("hdisolyp-8b0czxjl-jjlheqln-yfcuqywa-pjjec9lh");
    $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
          //var_dump($url); //exit();
    $data = array(
      'to'      => "$to",
      'message' => "$message",
      'token'   =>"$token"
        );
                  
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    
    $ms2g = "Sass New User : ".$_SESSION['name']."\nMobile : ".$mob;
        //var_dump($msg); exit();
    $mess2age = urlencode($ms2g);
    $to2 = '01714044180';;
    $url2 = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$mess2age&msisdn=$to2&csms_id=1";
          //var_dump($url); //exit();
    $data2 = array(
      'to'      => "$to2",
      'message' => "$mess2age",
      'token'   => "$token"
        );
                  
    $c2h = curl_init();
    curl_setopt($c2h, CURLOPT_URL,$url2);
    curl_setopt($c2h, CURLOPT_ENCODING, '');
    curl_setopt($c2h, CURLOPT_POSTFIELDS,$data2);
    curl_setopt($c2h, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($c2h);

		send_email($email_email,$email_name,$msg,'Welcome To Sunshine');
    //var_dump($smsresult); exit();
    if($result)
      {
      $sdata = [
        'exception' =>'<div class="alert alert-success alert-dismissible">
          <h4><i class="icon fa fa-check"></i>Account Verify Successfully !</h4>
          </div>'
              ];  

      $this->session->set_userdata($sdata);
      redirect('Login');
      }
    else
      {
      $sdata = [
        'exception' =>'<div class="alert alert-danger alert-dismissible">
          <h4><i class="icon fa fa-ban"></i> Failed !</h4>
          </div>'
              ];

      $this->session->set_userdata($sdata);
      redirect('OTP');
      }
    }
  else
    {
    $sdata = [
        'exception' =>'<div class="alert alert-danger alert-dismissible">
          <h4><i class="icon fa fa-ban"></i> OTP can not Match !</h4>
          </div>'
              ];

      $this->session->set_userdata($sdata);
      redirect('OTP');
    }
}

// public function save_otp_check()
//     {
//     $info = $this->input->post();

//     $where = array(
//         'otp' => $info['otp'],
//         'uid' => $_SESSION['uid']
//             );

//     $data = array(
//         'status' => 'Active',
//         'upby'   => $_SESSION['uid']
//             );
//         //var_dump($where); exit();
//     $result = $this->pm->update_data('users',$data,$where);
    
//     $users = $this->pm->get_data('users',$where);
    
//     $mob = $users[0]['mobile'];
//     $snmob = substr($mob,3);
//     $pass = $users[0]['password'];
    
//     $msg = "Welcome To Sunshine. Your software is ready tos use \nURL: https://sunshine.com.bd/app/"."\nID : ".$snmob."\nPass : ".$pass."\nThank You\nSunshine IT";
//         //var_dump($msg); exit();
//     //$token = "44515996325214391599632521";
//     //$token = urlencode("4cc079b5-c2a5-4cdc-ac07-1ee0fe8e6b5d");
//     $message = urlencode($msg);
//     $to = urlencode($mob);
//     $token = urlencode("hdisolyp-8b0czxjl-jjlheqln-yfcuqywa-pjjec9lh");
//     $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
//     //$url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
//           //var_dump($url); //exit();
//     $data = array(
//         'to'      => "$to",
//         'message' => "$message",
//         'token'   =>"$token"
//           );
                  
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL,$url);
//     curl_setopt($ch, CURLOPT_ENCODING, '');
//     curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $smsresult = curl_exec($ch);

//     if($result)
//         {
//         $sdata = [
//           'exception' =>'<div class="alert alert-success alert-dismissible">
//             <h4><i class="icon fa fa-check"></i>Account Verify Successfully !</h4>
//             </div>'
//                 ];  

//         $this->session->set_userdata($sdata);
//         redirect('Login');
//         }
//     else
//         {
//         $sdata = [
//           'exception' =>'<div class="alert alert-danger alert-dismissible">
//             <h4><i class="icon fa fa-ban"></i> Failed !</h4>
//             </div>'
//                 ];

//         $this->session->set_userdata($sdata);
//         redirect('OTP');
//         }
// }

public function forget_password()
    {
    $data['title'] = 'Forget Password';
        
    $this->load->view('forget_password',$data);
}

public function check_forget_password_email()
  {
  $this->load->library('email');

  $empemail = $this->input->post('username');
  
  if(is_numeric($empemail))
    {
    $mid = '+88'.$this->input->post('username');
    $fpe = $this->pm->check_mobile_number($mid);
    // var_dump($fpe); var_dump($mid); exit();
    
    if($fpe)
        {
        $prdata = [
            'useruid' => $fpe->uid
                ];
        
        $this->session->set_userdata($prdata);
        
        $digits = 6;
        $otp = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        $msg = $otp.' is your otp code for verify. Expires in 10 minites. SunshineApp';
        
        # Send SMS
        $message = urlencode($msg);
        $to = urlencode($mid);
        $token = urlencode("yfynrvxm-erdvybul-5lkgcewi-ivyfmpg8-r220zvby");

        $url = "https://smsplus.sslwireless.com/api/v3/send-sms?api_token=$token&sid=NONSUNSHINEIT&sms=$message&msisdn=$to&csms_id=1";
                  
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $sms_result = curl_exec($ch);
        
        $udata = array(
            'otp'  => $otp,
            'upby' => $_SESSION['useruid']
              );

        $uwhere = array(
            'mobile' => $mid,
            'uid'    => $_SESSION['useruid']
              );

        $result = $this->pm->update_data('users',$udata,$uwhere);
            
        if($result)
            {
            $sdata = [
                'exception' =>'<div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i> Enter Your OTP code !</h4>
                </div>'
                    ];
    
            $this->session->set_userdata($sdata);
            redirect('otpPassword');
            }
        else
            {
            $sdata = [
                'exception' =>'<div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> Somethings is Wrong !</h4>
                </div>'
                    ];
        
            $this->session->set_userdata($sdata);
            redirect('forgetPassword');
            }
        }
      else
        {
        $sdata = [
            'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> This mobile is not exit !</h4>
            </div>'
                ];
    
        $this->session->set_userdata($sdata);
        redirect('forgetPassword');
        }
    }
    else
      {
      $fpe = $this->pm->check_email($empemail);
      
      $prdata = [
        'useruid' => $fpe->uid
            ];
    
        $this->session->set_userdata($prdata);
        //var_dump($fpe); exit();
      if($fpe)
        {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://sunshine.com.bd', 
            'smtp_port' => 465,
            'smtp_user' => 'example@gmail.com',
            'smtp_pass' => 'password',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'text',
            'smtp_timeout' => '4', 
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
                );

        $to = $fpe->email;

        $message = "Reset your SunshineApp account password.We received a request to reset your SunshineApp account password. Please use the following one-time password to verify yourself. then click the link given below to confirm your identity and reset your password. The link is valid for 6 hours till 15 Jan 2022";
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from('example@gmail.com'); // change it to yours
        $this->email->to($to);// change it to yours
        $this->email->subject('Forget Password');
        $this->email->message($message);
        //var_dump($this->email->send()); exit();
        if($this->email->send())
            {
            $sdata = [
                'exception' =>'<div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i>Check Your email !</h4>
                </div>'
                        ];  
    
            $this->session->set_userdata($sdata);
            redirect('Login');
            }
        else
            {
            $sdata = [
                'exception' =>'<div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> Somethings is Wrong !</h4>
                </div>'
                    ];
    
            $this->session->set_userdata($sdata);
            redirect('forgetPassword');
            }
        }
      else
        {
        $sdata = [
            'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> This email id is not exit !</h4>
            </div>'
                ];
    
        $this->session->set_userdata($sdata);
        redirect('forgetPassword');
        }
    }
}

public function otp_password()
    {
    $data['title'] = 'Forget Password';
        
    $this->load->view('otp_password',$data);
}

public function check_otp()
    {
    $info = $this->input->post();

    $where = array(
        'otp' => $info['otp'],
        'uid' => $_SESSION['useruid']
            );
    
    $result = $this->pm->get_data('users',$where);
   // var_dump($result); exit();

    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>Password Setup !</h4>
            </div>'
                ];  

        $this->session->set_userdata($sdata);
        redirect('passwordSetup');
        }
    else
        {
        $sdata = [
          'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> Failed !</h4>
            </div>'
                ];

        $this->session->set_userdata($sdata);
        redirect('forgetPassword');
        }
}

public function logout()
    {
      $log = [
        'activity' => 'User Logged Out',
        'user_id'       => $_SESSION['uid'],
        'compid'       => $_SESSION['compid'],
      ];
      $this->pm->insert_data('activity_logs',$log);
    $this->session->sess_destroy();
    redirect('Login');
}

public function account_verify()
    {
    $where = [
        'email' => $_SESSION['useremail']
            ];

    $info = [
        'status' => 'Active',
        'upby'   => $_SESSION['uid']
            ];
       
    $result = $this->pm->update_data('users',$info,$where);
    if($result)
        {
        $sdata = [
          'exception' =>'<div class="alert alert-success alert-dismissible">
            <h4><i class="icon fa fa-check"></i>User verify Successfully !</h4>
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
    redirect('Login');
}

public function password_setup()
    {
    $data['title'] = 'Password Setup';
        
    $this->load->view('pass_setup',$data);
}

public function save_passord_setup()
    {
    $info = $this->input->post();

    $npassword = $info['npassword'];
    $cpassword = $info['cpassword'];

    if($npassword == $cpassword)
        {
        $info = [
            'password' => $info['npassword'],
            'upby'     => $_SESSION['useruid']
                ];
        
        $where = array(
            'uid' => $_SESSION['useruid']
                );
        //var_dump($where); exit();
        $result = $this->pm->update_data('users',$info,$where);

        if($result)
            {
            $sdata = [
              'exception' =>'<div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i>New Password Setup Successfully !</h4>
                </div>'
                    ];  

            $this->session->set_userdata($sdata);
            //$this->session->unset_userdata($prdata);
            redirect('Login');
            }
        else
            {
            $sdata = [
              'exception' =>'<div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> Failed !</h4>
                </div>'
                    ];

            $this->session->set_userdata($sdata);
            redirect('passwordSetup');
            }
        }
    else
        {
        $sdata = [
            'exception' =>'<div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> Password can not match !</h4>
            </div>'
                ];

        $this->session->set_userdata($sdata);
        redirect('passwordSetup');
        }
}



        ################################################
        #   /* Pages  end*/                            #
        ################################################
}
