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
                  <div class="section-heading mt-4">
                      <img 
                        src="<?php echo base_url().'upload/company/'.$store['sbImage']; ?>"
                        alt="banar Image"
                        style="margin-top: -15px; width: 100%; height: 360px;"
                      >
                      <h1 class="mt-3"><?= $store['sName']; ?></h1>
                  </div>
              </div>
          </div>
          <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
              <?php foreach ($product as $item) { ?>

                <div class="col">
                  <div class="product-card">
                      <div class="product-media">
                          <a class="product-image" href="<?php echo base_url().'pDetails/'.$item['productID'].'/'.$store['sid']; ?>">
                            <?php if($item['image'] != null){ ?>
                              <img src="<?php echo base_url().'/upload/product/'.$item['image']; ?>" alt="product">
                            <?php } else{ ?>
                                <img src="/assets/store/images/product/01.jpg" alt="product">
                            <?php } ?>
                          </a>
                      </div>
                      <div class="product-content">
                          <h6 class="product-name">
                              <a href="<?php echo base_url().'pDetails/'.$item['productID'].'/'.$store['sid']; ?>"><?php echo $item['productName']; ?></a>
                          </h6>
                          <h6 class="product-price">
                              <span>৳ <?php echo $item['sprice']; ?></span>
                          </h6>
                          <button class="product-add" onclick='addToCart("<?= $item['productID'] ?>", "<?= $item['productName'] ?>", "<?= $item['sprice'] ?>")' title="Add to Cart">
                              <i class="fas fa-shopping-basket"></i>
                              <span>add</span>
                          </button>
                      </div>
                  </div>
                </div>

              <?php } ?>
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