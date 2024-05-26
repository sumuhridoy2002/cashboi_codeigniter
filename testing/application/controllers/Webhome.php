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

public function get_product_charge()
  {
  $section = $this->pm->get_product_charge($_POST['id'],$_POST['id2']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function about_us()
  {
  $data = [
    'title'   => 'About Us',
    'contact' => $this->pm->get_data('com_profile',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false),
    'area'    => $this->pm->get_data('area',false),
    'ptype'   => $this->pm->get_data('product_type',false),
    'msg'     => $this->pm->get_data('user_message',false),
    'hbanner' => $this->pm->get_data('home_banner',false),
      ];
    //var_dump($data['tomcva']); exit();
  $this->load->view('web/about_us',$data);
}

public function tracking()
  {
  $data = [
    'title'   => 'Tracking',
    'contact' => $this->pm->get_data('contact_us',false)
      ];

  if(isset($_GET['search']))
    {
    $where = array(
      'parcel_id' => $_GET['parcel']
          );
    $other = array(
      'join' => 'left'
          );
    $field = array(
      'parcel' => 'parcel.pa_id,parcel.parcel_id,parcel.cname,parcel.regdate',
      'area' => 'area.area'
          );
    $join = array(
      'area' => 'area.ct_id = parcel.ca_id'
          );
    $data['parcel'] = $this->pm->get_data('parcel',$where,$field,$join,$other);
    }
  else
    {
    $data['parcel'] = '';
    }
    //var_dump($data['tomcva']); exit();
  $this->load->view('web/tracking',$data);
}

public function pricing()
  {
  $other = array(
    'join' => 'left'
        );
  $field = array(
    'pricing'      => 'pricing.*',
    'pricing_type' => 'pricing_type.*'
        );
  $join = array(
    'pricing_type' => 'pricing_type.pt_id = pricing.ptype'
        );

  $data = [
    'title'   => 'Pricing',
    'contact' => $this->pm->get_data('com_profile',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false),
    'area'    => $this->pm->get_data('area',false),
    'ptype'   => $this->pm->get_data('product_type',false),
    'msg'     => $this->pm->get_data('user_message',false),
    'hbanner' => $this->pm->get_data('home_banner',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false)
      ];
    //var_dump($data['tomcva']); exit();
  $this->load->view('web/pricing',$data);
}

public function get_emp_salary()
  {
  $section = $this->aam->get_salary_emp($_POST['id'],$_POST['id2']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function contact_us()
  {
  $data = [
    'title'   => 'Contact Us',
    'contact' => $this->pm->get_data('com_profile',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false),
    'area'    => $this->pm->get_data('area',false),
    'ptype'   => $this->pm->get_data('product_type',false),
    'msg'     => $this->pm->get_data('user_message',false),
    'hbanner' => $this->pm->get_data('home_banner',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false)
      ];
    //var_dump($data['tomcva']); exit();
  $this->load->view('web/contact_us',$data);
}

public function why_1st_pick()
  {
  $data = [
    'title'   => 'Feature',
    'contact' => $this->pm->get_data('com_profile',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false),
    'area'    => $this->pm->get_data('area',false),
    'ptype'   => $this->pm->get_data('product_type',false),
    'msg'     => $this->pm->get_data('user_message',false),
    'hbanner' => $this->pm->get_data('home_banner',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false)
      ];
    //var_dump($data['tomcva']); exit();
  $this->load->view('web/features',$data);
}

public function blog()
  {
  $other = array(
    'join' => 'left'
        );
  $field = array(
    'coverage_area' => 'coverage_area.*',
    'area' => 'area.*',
    'area_charge' => 'area_charge.*'
        );
  $join = array(
    'area' => 'area.ct_id = coverage_area.ct_id',
    'area_charge' => 'area_charge.acid = area.area'
        );
  $data = [
    'title'=> 'Blog',
    'contact' => $this->pm->get_data('com_profile',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false),
    'area'    => $this->pm->get_data('area',false),
    'ptype'   => $this->pm->get_data('product_type',false),
    'msg'     => $this->pm->get_data('user_message',false),
    'hbanner' => $this->pm->get_data('home_banner',false),
    'why1st'  => $this->pm->get_data('why_1stpick',false)
      ];

    //var_dump($data['message']); exit();
  $this->load->view('web/blog',$data);
}

public function policy()
  {
  $where = array(
    'pid' => 1
        );

  $data = [
    'title'   => 'Policy',
    'contact' => $this->pm->get_data('contact_us',false),
    'policy'  => $this->pm->get_data('policy',$where)
      ];
    //var_dump($data['tomcva']); exit();
  $this->load->view('web/policy',$data);
}
  

        #####################################
        #         /*  Pages End */          #
        #####################################
    
    
########################################################################################
}             // Code End From Here
########################################################################################