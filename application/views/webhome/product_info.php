<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="">
    <meta name="keywords" content="">
    <title><?= $store['sName']; ?></title>
    <link rel="icon" href="/assets/store/images/favicon.png">
    <link rel="stylesheet" href="/assets/store/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/assets/store/fonts/icofont/icofont.min.css">
    <link rel="stylesheet" href="/assets/store/fonts/fontawesome/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/store/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/store/css/main.css">
    <link rel="stylesheet" href="/assets/store/css/index.css">
    <style>
      .header-form {
        display: flex;
      }
    </style>
</head>
<body>
  <div class="backdrop"></div>
  <a class="backtop fas fa-arrow-up" href="#"></a>

  <header class="header-part">
    <div class="container">
      <div class="header-content">
        <form class="header-form">
          <input type="text" name="search" placeholder="Search anything...">
          <button><i class="fas fa-search"></i></button>
        </form>
        <div class="header-widget-group">
          <a href="<?php echo base_url().'checkOut/'.$store['sid']; ?>" class="header-widget" title="Add to card">
            <i class="fas fa-shopping-basket"></i>
            <sup id="total_items">0</sup>
            <span>total price<small>৳ <span id="total_price">0</span></small></span>
          </a>
        </div>
      </div>
    </div>
  </header>

  <section class="section recent-part" style="margin-bottom: 10px !important;">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
              
              <div class="card mt-3">
                <div class="card-header text-center">
                  <h3 class="card-title m-0"><b>Product Information</b></h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mb-60" style="border-radius: 10px; padding: 10px;">
                      <div class="image">
                          <?php if($product['image'] != null){ ?>
                          <img src="<?php echo base_url().'/upload/product/'.$product['image']; ?>" alt="product" style="height: auto; width: 100%; border-radius: 20px;" >
                          <?php } else{ ?>
                          <img src="<?php echo base_url().'assets_for_checkout/web/product.jpg'; ?>" alt="product" style="height: auto; width: 100%; border-radius: 20px;">
                          <?php } ?>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                      <div class="content">
                        <div class="title-category">
                          <h3><b><?php echo $product['productName']; ?></b></h3>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 mt-2">
                          <h3>৳ <?php echo $product['sprice']; ?></h3>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                          <?php 
                          $query = $this->db->select('totalPices')->from('stock')->where('compid',$compid)->where('product',$product['productID'])->get()->row();
                          ?>
                          <h4>In Stock : <?php if($query){ ?> <?php echo $query->totalPices; ?> <?php } else { ?> <b><?php echo '0'; ?></b> <?php } ?></h4>
                        </div><br>
                        <div class="col-lg-12 col-md-12 col-12" style="padding-top: 20px;">
                          <button class="btn btn-info" onclick='addToCart("<?= $product['productID'] ?>", "<?= $product['productName'] ?>", "<?= $product['sprice'] ?>")' data-productid="<?php echo $product['productID']; ?>" data-productname="<?php echo $product['productName']; ?>" data-productprice="<?php echo $product['sprice']; ?>">add to cart</button>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12" style="padding-top: 20px;">
                          <a href="<?php echo base_url().'checkOut/'.$store['sid']; ?>" class="btn btn-secondary">Go to checkout</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="ps-product__content">
                    <ul class="tab-list" role="tablist">
                      <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Product Description</a></li>
                      <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Product Specification</a></li>
                    </ul>
                  </div>
                  <div class="tab-content mb-60">
                    <div class="tab-pane active" role="tabpanel" id="tab_01">
                      <p style="text-align: justify;"><?php echo $product['details']; ?></p>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab_02">
                      <p style="text-align: justify;"><?php echo $product['specifict']; ?></p>
                    </div>
                  </div> -->
                </div>
              </div>
              
              </div>
          </div>
      </div>
  </section>
    
  <hr>

  <footer class="footer-part" style="padding-top: 0px !important;">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-xl-8">
          <div class="footer-widget contact">
            <h3 class="footer-title"><?= $store['sName']; ?></h3>
            <ul class="footer-contact">
              <li>
                <i class="icofont-ui-email"></i>
                <p>
                  <span><?= $store['sEmail']; ?></span>
                </p>
              </li>
              <li>
                <i class="icofont-ui-touch-phone"></i>
                <p>
                  <span><?= $store['sMobile']; ?></span>
                </p>
              </li>
              <li>
                <i class="icofont-location-pin"></i>
                <p><?= $store['sAddress']; ?></p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-xl-4">
          <div class="footer-widget">
            <h3 class="footer-title">INFORMATION</h3>
            <div class="footer-links">
              <ul>
                <li><a href="<?php echo base_url().'infoPage/'.$store['sid'].'/'.$store['sName']; ?>" target="_blank">About Us</a></li>
                <li><a href="<?php echo base_url().'contactUs/'.$store['sid'].'/'.$store['sName']; ?>" target="_blank">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="footer-bottom text-center">
              <p class="footer-copytext">&copy;  All Copyrights Reserved by <a href="<?php echo base_url() . 'store/' . $store['slug']; ?>" target="_blank" ><?= $store['sName']; ?></a> .</p>
              <div class="footer-card">
                <a
                    style="
                        display: inline-block;
                        width: 30px;
                        height: 30px;
                        border: 1px solid white;
                        padding: 5px;
                        border-radius: 50%;
                        background-color: white;
                        text-align: center;
                        line-height: 21px;
                    "
                    target="_blank"
                    href="<?php echo $store['sFacebook']; ?>"
                >
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a
                    style="
                        display: inline-block;
                        width: 30px;
                        height: 30px;
                        border: 1px solid white;
                        padding: 5px;
                        border-radius: 50%;
                        background-color: white;
                        text-align: center;
                        line-height: 21px;
                    "
                    target="_blank"
                    href="<?php echo $store['sGoogle']; ?>"
                >
                    <i class="fab fa-google-plus-g"></i>
                </a>
                <a
                    style="
                        display: inline-block;
                        width: 30px;
                        height: 30px;
                        border: 1px solid white;
                        padding: 5px;
                        border-radius: 50%;
                        background-color: white;
                        text-align: center;
                        line-height: 21px;
                    "
                    target="_blank"
                    href="<?php echo $store['sTwitter']; ?>"
                >
                    <i class="fab fa-twitter"></i>
                </a>
                <a
                    style="
                        display: inline-block;
                        width: 30px;
                        height: 30px;
                        border: 1px solid white;
                        padding: 5px;
                        border-radius: 50%;
                        background-color: white;
                        text-align: center;
                        line-height: 21px;
                    "
                    target="_blank"
                    href="<?php echo $store['sInstagram']; ?>"
                >
                    <i class="fab fa-instagram"></i>
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </footer>

  <script type="text/javascript">
    function addToCart(pid, name, pprice) {
      fetch("<?php echo site_url('Webhome/add_to_cart');?>", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ pid, name, pprice })
        })
        .then(response => response.text())
        .then(data => {
          document.getElementById('total_items').textContent = JSON.parse(data).total_items
          document.getElementById('total_price').textContent = JSON.parse(data).total_price

          <?php if(!empty($store['FACEBOOK_PIXEL_ID'])) { ?>
            console.log("FACEBOOK_PIXEL_ID", "<?= $store['FACEBOOK_PIXEL_ID']; ?>")
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', "<?= $store['FACEBOOK_PIXEL_ID']; ?>");
            fbq('track', 'AddToCart', {
              content_ids: [pid],
              content_type: 'product',
              value: pprice,
              currency: 'USD'
            });
          <?php } ?>

          const message = new SpeechSynthesisUtterance("পণ্যটি সফলভাবে কার্টে যোগ করা হয়েছে")
          message.lang = "bn-BD"
          
          const voices = window.speechSynthesis.getVoices()
          const femaleVoice = voices.find(voice => voice.lang === "bn-BD" && voice.name.includes("female"))

          if (femaleVoice) message.voice = femaleVoice

          window.speechSynthesis.speak(message)
        })
        .catch(error => console.error('Error:', error))
    }

    function loadCart() {
      fetch("<?php echo site_url('Webhome/load_cart');?>")
        .then(response => response.text())
        .then(data => {
          document.getElementById('total_items').textContent = JSON.parse(data).total_items
          document.getElementById('total_price').textContent = JSON.parse(data).total_price
        })
        .catch(error => console.error('Error:', error))
    }
    loadCart()
  </script>
</body>
</html>