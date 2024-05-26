<?php $this->load->view('web/header/header'); ?>

	<style>
    .slidecontainer {
      width: 100%;
        }

    .slider {
      -webkit-appearance: none;
      width: 100%;
      height: 10px;
      background: #4c4646;
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
        }

    .slider:hover {
      opacity: 1;
        }

    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 20px;
      height: 20px;
      background: #ed1c24;
      cursor: pointer;
        }

    .slider::-moz-range-thumb {
      width: 20px;
      height: 20px;
      background: #ed1c24;
      cursor: pointer;
        }

    .topnav {
      overflow: hidden;
      background-color: #ed1c24;
        }

    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
        }

    .topnav a:hover {
      background-color: #fff;
      color: black;
        }

    .topnav a.active {
      background-color: #4CAF50;
      color: white;
        }

    .topnav .icon {
      display: none;
        }

    @media screen and (max-width: 600px) {
      .topnav a:not(:first-child) {display: none;}
      .topnav a.icon {
        float: left;
        display: block;
            }
        }
    .acharge{
      margin: 10px;
      border-radius: 25px; border: 2px solid #25247b;
      background-color: #fff;
      width: 20%;
      height: 40px;
      color: #000;
        }
    .acharge:focus{
      border: 2px solid #ed1c24;
      background-color: #25247b;
      width: 20%;
      height: 40px;
      color: #fff;
        }

        button.btn.acharge:hover {
          background: #ed1c24;
          color: #fff;
          border: none;
      }

    @media only screen and (max-device-width: 600px) {
    .bimage{
      display:none;
        }
        .acharge {
          width: 35%;
        }  
      }

    /*@media (max-device-width: 600px) {*/

    /*.banner {*/
    /*  background-image: url('../img/background/banner-1.jpg');*/
    /*  background-image: none;*/
    /*    }*/
    /*  }*/

    @media (max-device-width: 600px) {

    .list-items {
      display: none;
        }
      }
      
      @media only screen and (min-width: 900px) {
        section.mask-overlay.pt-30 {
            height:380px;
        }
       
      }
      
      @media only screen and (min-width: 1400px) {
        section.mask-overlay.pt-30 {
            height:500px;
        }
       
      }
      
      .ask p {
          font-family:"Kalpurush";
      }
      
      .ask h4 {
          font-family:"Kalpurush";
      }
      
      .track-prod{
          background:#fac014;
      }
      .btn-1{
          background:#000;
      }
      .line-divider{
          background-color:#004AAD;
      }
      .footer-widget h2 b {
            border-bottom: 3px solid #fac014;
            padding-bottom: 15px;
        }
        
.more-about {
    border: 1px solid #99999973;
    padding: 18px 15px 10px;
    background: #f5f5f5;
    height:170px;
     box-shadow: 5px 10px 8px #888888;
     border-radius: 5px

    
}

.more-about:hover {
    background:  #004AAD;
    color: #fff;
}

.more-about:hover h5 {
   
    color: #fff;
}
.more-about2 {
    border: 1px solid #337ab7;
    padding: 18px 15px 10px;
    background: #004AAD;
    height:170px;
     box-shadow: 5px 10px 8px #888888;
     border-radius: 5px

    
}

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

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}


div.scroll-container {
  background-color: ;
  overflow: auto;
  white-space: nowrap;
  padding: 10px;
}

div.scroll-container img {
  padding: 10px;
}

.social {
    background: #fff;
    box-shadow: 0 10px 55px 5px rgba(137,173,255,.35);
    border-radius: 8px;
    padding-top: 15px;
    margin: 10px 10px;
   transition: background 0.5s, transform 0.5s;
}
.social:hover{
    background: #fff;
    transform: translateY(-10px);
}
.more-about2{
    transition: background 0.5s, transform 0.5s;
}
   .more-about2:hover{
    background: #086bf1;
    transform: translateY(-10px);
}

.more-about3{
    border: 1px solid #9999992b;
    padding: 18px 15px ;
    background: #f5f5f5;
    height:270px;
     box-shadow: 5px 10px 8px #888888;
     border-radius: 5px
    
}










.slider{
  width: 1200px;
  height: 300px;
  border-radius: 10px;
  overflow: hidden;
}

.slides{
  width: 500%;
  height: 500px;
  display: flex;
}

.slides input{
  display: none;
}

.slide{
  width: 20%;
  transition: 2s;
}

.slide img{
  width: 200px;
  height: 100px;
}

/*css for manual slide navigation*/

.navigation-manual{
  position: absolute;
  width: 800px;
  margin-top: -40px;
  display: flex;
  justify-content: center;
}

.manual-btn{
  border: 2px solid #40D3DC;
  padding: 5px;
  border-radius: 10px;
  cursor: pointer;
  transition: 1s;
}

.manual-btn:not(:last-child){
  margin-right: 40px;
}

.manual-btn:hover{
  background: #40D3DC;
}

#radio1:checked ~ .first{
  margin-left: 0;
}

#radio2:checked ~ .first{
  margin-left: -20%;
}

#radio3:checked ~ .first{
  margin-left: -40%;
}

#radio4:checked ~ .first{
  margin-left: -60%;
}

/*css for automatic navigation*/

.navigation-auto{
  position: absolute;
  display: flex;
  width: 800px;
  justify-content: center;
  margin-top: 460px;
}

.navigation-auto div{
  border: 2px solid #40D3DC;
  padding: 5px;
  border-radius: 10px;
  transition: 1s;
}

.navigation-auto div:not(:last-child){
  margin-right: 40px;
}

#radio1:checked ~ .navigation-auto .auto-btn1{
  background: #4
  </style>

  <article> 
      <section class="" style="height: ; width:100%;">
          <div class="row">
              
               <div class="col-md-6 col-sm-6 col-xs-12" data-wow-offset="50" data-wow-delay=".20s" style="padding: 80px; ">
                   
                   <h2 class="title-1" style="text-align: left; color:rgb(0, 11, 135); font-size: 30px;margin-bottom:30px;" >Who We Are</h2>
                   <p style="text-align: justify;">Sunshine IT is a fast growing software manufacturing company in Bangladesh providing software and solutions to SMEs, NGO’s, government agencies, and private companies. Our team is highly experienced in developing Web Applications and business software solutions, like POS systems, inventory management, accounting, ERP, E-commerce, custom solutions, etc. We build software to grow our clients’ businesses.We have served 800+ clients locally and internationally. With our software, businesses have achieved process improvements, saved valuable time and resources, and generated higher revenue. Our clients, both domestic and international, have expressed high satisfaction with our services.</p>
                   
               </div>
               <div class="col-md-6 col-sm-6 col-xs-12" data-wow-offset="50" data-wow-delay=".20s"  style="padding: 80px;">
                   <img src="<?php echo base_url().'assets/web/img/icons/ma.png'; ?>" >
                   
               </div>
          </div>
      </section>
      
      
  </article>
  
   <section class="" style="height: ; width:100%;">
       
       <div class="row">
          
          <div class="col-md-12 col-sm-12 col-xs-12" data-wow-offset="50" data-wow-delay=".20s" style="padding: 0px 80px; ">
              
              <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" style="margin-bottom: 20px;">
                        <div class="more-about3 clrbg-before">
                          <div style="text-align: center; height: 75px; width: auto;">
                            <img src="<?php echo base_url().'assets/web/img/icons/mission.png'; ?>" width="100px" height="50px">
                          </div>
                          <h2 class="title-1" style="text-align: center; color:rgb(0, 11, 135);" >Our Mission</h2>
                          <p style="height: 100px; width: 100%;"> The passion & dedication of their team members for their work are really awesome. Wish to have a more success in future...! Go ahead...Sunshine...!!</p>
                        </div>
               </div>
               
               <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" style="margin-bottom: 20px;">
                        <div class="more-about3 clrbg-before">
                          <div style="text-align: center; height: 75px; width: auto;">
                            <img src="<?php echo base_url().'assets/web/img/icons/vision.png'; ?>" width="80px" height="50px">
                          </div>
                          <h2 class="title-1" style="text-align: center; color:rgb(0, 11, 135);" >Our Vision</h2>
                          <p style="height: 100px; width: 100%;"> The passion & dedication of their team members for their work are really awesome. Wish to have a more success in future...! Go ahead...Sunshine...!!</p>
                        </div>
               </div>
               
               <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" style="margin-bottom: 20px;">
                        <div class="more-about3 clrbg-before">
                          <div style="text-align: center; height: 75px; width: auto;">
                            <img src="<?php echo base_url().'assets/web/img/icons/mission.png'; ?>" width="100px" height="50px">
                          </div>
                          <h2 class="title-1" style="text-align: center; color:rgb(0, 11, 135);" >Our Target</h2>
                          <p style="height: 100px; width: 100%;"> Need quality, not quantity.That is why we strive to offer quality work to the customer. That is why we strive to offer quality work to the customer.</p>
                        </div>
                </div>
              
          </div> 
           
           
        </div>   
       
       
   </section>
    <!-- /.Content Wrapper -->

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
          var id = $(this).data('id');
        //alert(id);
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
    
    
<script type="text/javascript">
        $(document).ready(function(){
            $('#cminus').click(function(){
                $('#cminus').attr('class', 'hidden');
                $('#cplus').removeAttr('class','hidden');
                $('#comonication').attr('class','hidden');
                });

            $('#cplus').click(function(){
                $('#cminus').removeAttr('class', 'hidden');
                $('#cplus').attr('class','hidden');
                $('#comonication').removeAttr('class','hidden');
                });

            $('#rminus').click(function(){
                $('#rminus').attr('class', 'hidden');
                $('#rplus').removeAttr('class','hidden');
                $('#request').attr('class','hidden');
                });

            $('#rplus').click(function(){
                $('#rminus').removeAttr('class', 'hidden');
                $('#rplus').attr('class','hidden');
                $('#request').removeAttr('class','hidden');
                });

            $('#dminus').click(function(){
                $('#dminus').attr('class', 'hidden');
                $('#dplus').removeAttr('class','hidden');
                $('#delivery').attr('class','hidden');
                });

            $('#dplus').click(function(){
                $('#dminus').removeAttr('class', 'hidden');
                $('#dplus').attr('class','hidden');
                $('#delivery').removeAttr('class','hidden');
                });
        });
    </script>
    
    <script type="text/javascript">
        function omitLeadZero(mobile)
            {   
           var mob = document.getElementById(mobile);
            $(mob).keyup(function(){
                var value = $(this).val();
                value = value.replace(/^(0*)/,"");
            $(this).val(value);
            });
            }
    </script>

    <script type="text/javascript">
        function isNumberKey(evt)
            {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
            }
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});

</script>
    
