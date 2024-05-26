<?php $this->load->view('web/header/header'); ?>

    <style>
  .pricing-wrap {
   
    background: #f7f7f7;
}
 .more-about:before {
   
    height: 0px;
     
 }
 
 .more-about2 h5{
     
     color: #fff;
 }
 
 
 
 * {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color:#1284e5bf;
  color: white;
  font-size: 25px;
  border-radius: 10px;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
    font-weight: bold;
    color: #0b0b93;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px 35px;
  text-align:;
  color: #1d1d69;
}


.button {
  background-color: #004AAD;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
  border-radius: 5px;
}

  .line-divider{
          background-color:#004AAD;
      }

</style>
     <section class="pricing-wrap pad-80" >                
      <div class="theme-container container">    
        <!--<span class="bg-text center wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> Delivery Charge </span>-->
        <div class="title-wrap text-center pb-50">
          <h2 class="section-title wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">Pakage</h2>
              <hr class="line-divider">  
        </div>
    
    
    
    <div class="columns">
  <ul class="price">
    <li style="background: #4BA1EA; color: white;text-align: center;">Basic Package <br>
    199 Taka / Month
    </li>

    
    <li>Product Limit- 300</li>
    <li>Purchase  Management</li>
    <li>Sales  Management</li>
    <li>Expense  Management</li>
    <li>User-1 (PC & Mobile)</li>
     <li>Web Panel & Mobile Apps</li>
     <li style="color: red;">Quotation-No</li>
      <li style="color: red;">Salary-No</li>
      <li style="color: red;">Online Store-No</li>
        <li style="color: red;">Data Backup-No</li>
        <li>Inventory management</li>
        <li>SMS (100 messages)</li>
        <li>Reports
 Limited (Sales, Purchase, Expense)
</li>
        <li>Support for Single businesses</li>
        <li>Sync across single devices</li>
        <li>Online Offline APPS Mode</li> 
        <li>Warehouse-1 </li>
        <li>Customer Support</li>
        <li>Online Training</li>
        
        
    <li class="grey"><a href="https://cashboi.xyz/Login" class="button">Sign Up</a></li>
  </ul>
</div>



<div class="columns">
  <ul class="price">
    <li style="background: #004AAD; color: white;text-align: center;">Busiess Package  <br>
    499 Taka / Month</li>
    
    
    <li><i class="">Product Limit- 1000</i></li>
    <li><i class="">Purchase  Management</i></li>
    <li>Sales  Management</li>
    <li>Expense  Management</li>
    <li>User-4 (PC-2 & Mobile-2)</li>
     <li>Web Panel & Mobile Apps</li>
     <li>Quotation</li>
      <li>Salary</li>
      <li>Online Store</li>
        <li>Data Backup (Weekly)</li>
        <li>Inventory management</li>
        <li>SMS (500 messages)</li>
        <li>All Reports</li>
        <li>Support for Single businesses</li>
        <li>Sync across 2 devices</li>
        <li>Online Offline APPS Mode</li> 
        <li>Warehouse-2 </li>
        <li>Customer Support</li>
        <li>Online Training</li>
        
        
    <li class="grey"><a href="https://cashboi.xyz/Login" class="button">Sign Up</a></li>
  </ul>
</div>



<div class="columns">
  <ul class="price">
    <li style="background: #28003D; color: white;text-align: center;">Corporate Package  <br>
    999 Taka / Month</li>
    
    
    <li><i class="">Product Limit-Unlimited </i></li>
    <li><i class="">Purchase  Management</i></li>
    <li>Sales  Management</li>
    <li>Expense  Management</li>
    <li>User-10 (PC-5 & Mobile-5)</li>
     <li>Web Panel & Mobile Apps</li>
     <li>Quotation</li>
      <li>Salary</li>
      <li>Online Store</li>
        <li> Data Backup (Daily)</li>
        <li>Inventory management</li>
        <li>SMS (1000 messages)</li>
        <li>All Reports</li>
        <li>Support for Multi businesses</li>
        <li>Sync across 10 devices</li>
        <li>Online Offline APPS Mode</li> 
        <li>Warehouse-5 </li>
        <li>Customer Support</li>
        <li>Online Training</li>
        
        
    <li class="grey"><a href="https://cashboi.xyz/Login" class="button">Sign Up</a></li>
  </ul>
</div>
        
        
      </div>            
    </section>

<?php $this->load->view('web/footer/footer'); ?>
  
  <script type="text/javascript">
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
          output.innerHTML = this.value;
        }
    </script>
    
    <script type="text/javascript">
      $(document).ready(function(){
      $('.acharge').click(function(){
      
        var id = $('.acharge').val();
        var slider = document.getElementById("myRange");
        var id2 = slider.value;
        //alert(charge);

        var url = "<?php echo base_url(); ?>Home/get_product_charge";

         $.ajax({
            method: "POST",
            url     : url,
            dataType: 'json',
            data    : {"id" : id,"id2" : id2},
            success:function(data){ 
            //alert(data);
              HTML = "<span>" + data["tca"]+"</span>";
        //alert(HTML);
              $("#charge").html(HTML);
              },
            error:function(data){
              alert('error');
              }
            });
        
        });
        });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#myRange').click(function(){
          var acharge = document.getElementsByClassName("acharge");
          var aid = acharge.value;
          if(aid)
            {
            var id = aid;
            }
          else
            {
            var id = 1;
            }
          var slider = document.getElementById("myRange");
          var id2 = slider.value;
        //alert(id2);
          var url = "<?php echo base_url(); ?>Home/get_product_charge";

          $.ajax({
            method: "POST",
            url     : url,
            dataType: 'json',
            data    : {"id":id,"id2":id2},
            success:function(data){ 
            //alert(data);
              HTML = "<span>" + data["tca"]+"</span>";
        //alert(HTML);
              $("#charge").html(HTML);
              },
            error:function(data){
              alert('error');
              }
            });
          });
        });
    </script>
    