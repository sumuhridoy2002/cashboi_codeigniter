<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Category extends CI_Controller {

public function __construct()
  {
  parent::__construct();
  $this->load->model("prime_model","pm");
  $this->checkPermission();
}

public function index()
  {
  $data['title'] = 'Category';

  $where = array(
    'compid' => $_SESSION['compid']
          );

  $data['category'] = $this->pm->get_data('categories',$where);
  
  $this->load->view('category/category',$data);
}

public function save_category()
  {
  $info = $this->input->post();

  $data = array(
    'compid'       => $_SESSION['compid'],
    'categoryName' => $info['catName'],
    'fpShow'       => $info['fpShow'], 
    'regby'        => $_SESSION['uid']
        );

  $result = $this->pm->insert_data('categories',$data);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Category add Successfully !</h4>
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
  redirect('Category');
}

public function get_category_data()
  {
  $section = $this->pm->get_category_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function update_category()
  {
  $info = $this->input->post();

  $data = array(
    'compid'       => $_SESSION['compid'],
    'categoryName' => $info['categoryName'],
    'fpShow'       => $info['fpShow'], 
    'status'       => $info['status'],            
    'upby'         => $_SESSION['uid']
        );

  $where = array(
    'categoryID' => $info['cat_id']
        );

  $result = $this->pm->update_data('categories',$data,$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Category update Successfully !</h4>
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
  redirect('Category');
}

public function delete_category($id)
  {
  $where = array(
    'categoryID' => $id
        );

  $empu = $this->pm->get_data('products',$where);

  if(!$empu)
    {
    $result = $this->pm->delete_data('categories',$where);

    if($result)
      {
      $sdata = [
        'exception' =>'<div class="alert alert-danger alert-dismissible">
          <h4><i class="icon fa fa-check"></i> Category delete Successfully !</h4>
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
  else
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> All ready add this Category in Product !</h4>
        </div>'
            ];
    }
  $this->session->set_userdata($sdata);
  redirect('Category');
}

public function product_units()
  {
  $data['title'] = 'Unit';

//   $where = array(
//     'compid' => $_SESSION['compid']
//         );

//   $data['unit'] = $this->pm->get_data('sma_units',$where);
  $data['unit'] = $this->pm->get_sma_units_data();

  $this->load->view('category/product_units',$data);
}

public function save_units()
  {
  $info = $this->input->post();

  $data = array(
    'compid'   => $_SESSION['compid'],
    'unitName' => $info['unitName'],         
    'regby'    => $_SESSION['uid']
        );

  $result = $this->pm->insert_data('sma_units',$data);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i>Units add Successfully !</h4>
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
  redirect('Unit');
}

public function get_unit_data()
  {
  $section = $this->pm->get_unit_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function update_units()
  {
  $info = $this->input->post();

  $data = array(
    'compid'   => $_SESSION['compid'],
    'unitName' => $info['unitName'],
    'status'   => $info['status'],            
    'upby'     => $_SESSION['uid']
        );

  $where = array(
    'id' => $info['unit_id']
        );

  $result = $this->pm->update_data('sma_units',$data,$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i>Unit update Successfully !</h4>
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
  redirect('Unit');
}

public function delete_units($id)
  {
  $where = array(
    'unit' => $id
        );
  $empu = $this->pm->get_data('products',$where);

  if(!$empu)
    {
    $uwhere = array(
      'id' => $id
          );

    $result = $this->pm->delete_data('sma_units',$uwhere);

    if($result)
      {
      $sdata = [
        'exception' =>'<div class="alert alert-danger alert-dismissible">
          <h4><i class="icon fa fa-check"></i> Unit delete Successfully !</h4>
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
  else
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> All ready add this Unit in Product !</h4>
        </div>'
            ];
    }
  $this->session->set_userdata($sdata);
  redirect('Unit');
}

public function online_store_info()
  {
  $data['title'] = 'Online Store';

  $where = array(
    'compid' => $_SESSION['compid']
        );

  $data['store'] = $this->pm->get_data('store',$where);
  //$data['store'] = $onlinestore[0];

  $this->load->view('category/online_store',$data);
}

public function save_online_store()
  {
  $info = $this->input->post();

  $config['upload_path'] = './upload/company/';
  $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG';
  $config['max_size'] = 0;
  $config['max_width'] = 0;
  $config['max_height'] = 0;

  $this->load->library('upload',$config);
  $this->upload->initialize($config);
  
  $store = $this->db->select('sbImage')
                  ->from('store')
                  ->where('compid',$_SESSION['compid'])
                  ->get()
                  ->row();
                    
  if($this->upload->do_upload('userfile'))
    {
    $limg = $this->upload->data('file_name');
    }
  else
    {
    if($store)
      {
      $limg = $store->sbImage;
      }
    else
      {
      $limg = '';
      }
    } 

  $data = [
    'compid'    => $_SESSION['compid'],
    'sName'  => $info['sName'],
    'slug'  => str_replace(" ", "-", $info['sName']),
    'sMobile' => $info['sMobile'],
    'sEmail'   => $info['sEmail'],
    'sAddress' => $info['sAddress'],
    'sdCharge' => $info['sdCharge'],
    'sFacebook' => $info['sFacebook'],
    'sGoogle' => $info['sGoogle'],
    'sTwitter' => $info['sTwitter'],
    'sInstagram' => $info['sInstagram'],
    'sbImage'    => $limg,
    'regby'       => $_SESSION['uid']
          ];
        //var_dump($info); exit();
    
  if($store)
    {
    $where = array(
      'compid' => $_SESSION['compid']
          );

    $result = $this->pm->update_data('store',$data,$where);
    }
  else
    {
    $result = $this->pm->insert_data('store',$data);
    }

    
  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
      <h4><i class="icon fa fa-check"></i> Online Store Setting Successfully !</h4></div>'
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
  redirect('onlineStore');
}

// Area-Territory Part
public function area_list()
  {
  $data['title'] = 'Area';
  $where = array(
    'compid' => $_SESSION['compid']  
         );

  $data['area'] = $this->pm->get_data('territory',$where);

  $this->load->view('category/area',$data);
}

public function save_area()
{
    $info = $this->input->post();

    
    $existingArea = $this->db->select('*')
                             ->from('territory')
                             ->where('trName',$info['trName'])
                             ->where('compid',$_SESSION['compid'])
                             ->get()
                             ->row();
 
    if ($existingArea) {
        $sdata = [
            'exception' => '<div class="alert alert-warning alert-dismissible">
                                <h4><i class="icon fa fa-warning"></i> Area already exists!</h4>
                            </div>'
        ];
    } else {
        $data = array(
            'compid' => $_SESSION['compid'],
            'trName' => $info['trName'],
            'regby'  => $_SESSION['uid']
        );

        $result = $this->pm->insert_data('territory', $data);

        if ($result) {
            $sdata = [
                'exception' => '<div class="alert alert-success alert-dismissible">
                                    <h4><i class="icon fa fa-check"></i> Area added Successfully!</h4>
                                </div>'
            ];
        } else {
            $sdata = [
                'exception' => '<div class="alert alert-danger alert-dismissible">
                                    <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                                </div>'
            ];
        }
    }

    $this->session->set_userdata($sdata);
    redirect('Area');
}


public function get_area_data()
  {
  $section = $this->pm->get_area_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function update_area()
  {
  $info = $this->input->post();
  
    $existingArea = $this->db->select('*')
                             ->from('territory')
                             ->where('trName',$info['trName'])
                             ->where('compid',$_SESSION['compid'])
                             ->get()
                             ->row();
                             
    // $areaRow=mysqli_num_rows($existingArea);

    if ($existingArea) {
        $sdata = [
            'exception' => '<div class="alert alert-warning alert-dismissible">
                                <h4><i class="icon fa fa-warning"></i> Area already exists!</h4>
                            </div>'
        ];
    } 
    else {
        
  $data = array(
    'compid' => $_SESSION['compid'],
    'trName' => $info['trName'],
    'status' => $info['status'],            
    'upby'   => $_SESSION['uid']
        );

  $where = array(
    'trid' => $info['trid']
        );

  $result = $this->pm->update_data('territory',$data,$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Area updated Successfully !</h4>
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
  redirect('Area');
}
public function delete_area($id)
  {
    $where = array(
      'trid' => $id
          );

    $result = $this->pm->delete_data('territory',$where);

    if($result)
      {
      $sdata = [
        'exception' =>'<div class="alert alert-danger alert-dismissible">
          <h4><i class="icon fa fa-check"></i> Area deleted Successfully !</h4>
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
  redirect('Area');
}


// sub category

public function sub_category_list()
  {
  $data['title'] = 'Sub Category';
  
  $other = array(
    'join' => 'left',
    'order_by' => 'scatid'
        );
  $field = array(
    'sub_category' => 'sub_category.*',
    'categories' => 'categories.categoryName'
        );
  $join = array(
    'categories' => 'categories.categoryID = sub_category.catid'
        );

    $where = array(
        'compid' => $_SESSION['compid']
              );
  
  $data['subcategory'] = $this->pm->get_data('sub_category',$where,$field,$join,$other);
    
  $data['category'] = $this->pm->get_data('categories',$where);
  
  $this->load->view('category/sub_category',$data);
}

public function save_sub_category()
  {
  $info = $this->input->post();

  $data = array(
    'catid'    => $info['category'],
    'scatName' => $info['scatName'],
    'regby'    => $_SESSION['uid']
        );

  $result = $this->pm->insert_data('sub_category',$data);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Sub Category add Successfully !</h4>
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
  redirect('subCategory');
}

public function get_sub_category_data()
  {
  $section = $this->pm->get_sub_category_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function update_sub_category()
  {
  $info = $this->input->post();

  $data = array(
    'catid'    => $info['category'],
    'scatName' => $info['scatName'],
    'status'   => $info['status'],            
    'upby'     => $_SESSION['uid']
        );

  $where = array(
    'scatid' => $info['scatid']
        );

  $result = $this->pm->update_data('sub_category',$data,$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Sub Category update Successfully !</h4>
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
  redirect('subCategory');
}

public function delete_sub_category($id)
  {
  $where = array(
    'scatid' => $id
        );

  $result = $this->pm->delete_data('sub_category',$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
      <h4><i class="icon fa fa-check"></i> Sub Category delete Successfully !</h4>
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
  redirect('subCategory');
}

public function product_brand()
  {
  $data['title'] = 'Brand';
  
  $other = array(
    'order_by' => 'brid'
        );
   $uwhere = array(
        'compid' => $_SESSION['compid']  
            );
  $data['brands'] = $this->pm->get_data('brands',$uwhere,false,false,$other);
  
  $this->load->view('category/brands',$data);
}

public function save_brand()
  {
  $info = $this->input->post();

  $data = array(
    'bName' => $info['bName'],
    'compid' =>  $_SESSION['compid'],     
    'regby' => $_SESSION['uid']
        );

  $result = $this->pm->insert_data('brands',$data);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Brand added Successfully !</h4>
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
  redirect('Brand');
}

public function get_brand_data()
  {
  $section = $this->pm->get_brand_data($_POST['id']);
  $someJSON = json_encode($section);
  echo $someJSON;
}

public function update_brand()
  {
  $info = $this->input->post();

  $data = array(
    'bName'  => $info['bName'],
    'status' => $info['status'],            
    'upby'   => $_SESSION['uid']
        );

  $where = array(
    'brid' => $info['brid']
        );

  $result = $this->pm->update_data('brands',$data,$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-success alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Brands updated Successfully !</h4>
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
  redirect('Brand');
}

public function delete_brand($id)
  {
  $where = array(
    'brid' => $id
        );

  $result = $this->pm->delete_data('brands',$where);

  if($result)
    {
    $sdata = [
      'exception' =>'<div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-check"></i> Brand Deleted Successfully !</h4>
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
  redirect('Brand');
}




}