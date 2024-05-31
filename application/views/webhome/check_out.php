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
      .th-product {
        width: 40%;
      }

      .th-price,
      .th-qty,
      .th-total,
      .th-action {
        width: 15%;
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
                    <h3 class="card-title m-0"><b>Checkout Information</b></h3>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo base_url('Webhome/save_order_product'); ?>" method="post" >
                      <input type="hidden" class="form-control" name="shop_mobile" value="<?php echo $store['sMobile']; ?>" required  >
                      <input type="hidden" class="form-control" name="slug" value="<?php echo $store['slug']; ?>" required  >
                      <input type="hidden" class="form-control" name="sid" value="<?php echo $store['sid']; ?>" required  >
                      <input type="hidden" class="form-control" name="sName" value="<?php echo $store['sName']; ?>"  required  >
                      <input type="hidden" class="form-control" name="compid" value="<?php echo $store['compid']; ?>"  required  >
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                          <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name *" required  >
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="mobile" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" placeholder="Mobile Number *" required >
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Delivery Address *" required >
                          </div>
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email (Optional)" >
                          </div>
                          <div class="form-group">
                            <select name="courier_type" class="form-control" required>
                              <option selected value="" disabled>Choose Courier Type</option>
                              <option value="Pathao">Pathao</option>
                              <option value="Steadfast">Steadfast</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                          <table class="table table-striped">
                            <thead>
                              <tr style="font-size: 1.7rem;">
                                <th class="th-product">Product</th>
                                <th class="th-price">Price</th>
                                <th class="th-qty">Qty</th>
                                <th class="th-total">Total</th>
                                <th class="th-action">Action</th>
                              </tr>
                            </thead>
                            <tbody id="cart_product"></tbody>
                          </table>
                        </div>
                      </div>
                      <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-top:20px; text-align: center;">
                        <button style="background-color: #66BB6A;" type="submit" class="btn btn-info">Order Now</button>
                      </div>
                    </form>
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

    function removeFromCart(rowid) {
      fetch("<?php echo site_url('Webhome/delete_cart');?>", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams({ row_id: rowid })
        })
        .then(response => response.text())
        .then(data => {
          document.getElementById('cart_product').innerHTML = data
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

    function loadCartProducts() {
      fetch("<?php echo site_url('Webhome/load_product_cart');?>")
        .then(response => response.text())
        .then(data => {
          document.getElementById('cart_product').innerHTML = data
        })
        .catch(error => console.error('Error:', error))
    }
    loadCartProducts()

    function totalPrice(id) {
      var pices = document.getElementById('pices_' + id).value
      var salePrice = document.getElementById('salePrice_' + id).value

      var totalPrice = (parseFloat(salePrice).toFixed(2) * pices).toFixed(2)
      document.getElementById('totalPrice_' + id).value = totalPrice

      calculateTotalPrice()
    }

    function calculateTotalPrice() {
      var sum = 0
      var tPrices = document.querySelectorAll('.tPrice')

      tPrices.forEach(function(tPrice) {
        sum += parseFloat(tPrice.value)
      })

      var HTML = '<span>' + sum.toFixed(2) + '</span>'
      document.getElementById('tamount').innerHTML = HTML
    }
  </script>
</body>
</html>