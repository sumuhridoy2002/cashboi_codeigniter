<?php $this->load->view('header/header'); ?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->

<body class="hold-transition sidebar-mini">
    <div class="wrapper row">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-white navbar-light" style="background: #000; color: #fff; width:100%">
            <ul class="navbar-nav col-md-6" class="left_div" style="align-items: baseline;">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>Dashboard" style="color: #fff;">
                        &nbsp &nbsp <i class="fa-solid fa-house-user"></i> Home
                    </a>
                </li>

                <!--<span style="color: #fff; align: right;" ></span>-->
            </ul>

            <ul class="navbar-nav col-md-6" class="right_div" style="align-items: baseline;justify-content: end;">

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>uReport" class="nav-link" style="color: #fff;">
                        <span class="glyphicon glyphicon-th"></span><i class="fas fa-file" style="margin-right:5px;"></i>Reports
                    </a>
                </li>
                <li>
                    <button class="btn" title="Full Screen" onclick="openFullscreen();" id="fullscreen"
                        style="color:white;">
                        <i class="fa-solid fa-expand"></i></button>
                </li>
                <li>
                    <button class="btn" title="Exit Full Screen" onclick="closeFullscreen();" id="screen"
                        style="color:white;">
                        <i class="fa-solid fa-compress"></i></button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn todays_sale" data-toggle="modal"
                        data-target=".bs-example-modal-todays_sale" style="color: white;align-items: baseline;">
                        <i class="fa-solid fa-cart-shopping"></i> Today's Sale
                    </button>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>lowStock" class="nav-link" style="color: #fff;">
                        <i class="fa-solid fa-triangle-exclamation"></i> Stock Alert
                    </a>
                </li>

                <!--<span style="color: #fff; align: right;" ><?php echo date('d-m-Y'); ?></span>-->
            </ul>
        </nav>

        <div class="modal fade bs-example-modal-todays_sale" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" id="DivIdToPrint">
                <div class="modal-content" style="padding: 20px 20px;">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: blue; "><b>Todays Sale</b></h4>
                        <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <label>&nbsp Date: <?php echo date('d-m-Y'); ?></label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12 no-print">
                                <button class="btn btn-warning" style="float: right;"
                                    onclick="printDiv('print')"> <i class="fa-solid fa-print"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="print">
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Products' Revenue</td>
                                <td><?php echo $sum->total; ?></td>
                            </tr>
                            <tr>
                                <td>Order Discount</td>
                                <td><?php echo $discount->ds; ?></td>
                            </tr>
                            <tr>
                                <td>Products' Cost</td>
                                <td><?php echo $purchase->pprice; ?></td>
                            </tr>
                            <tr>
                                <td>Expense</td>
                                <td><?php echo $expense->expense; ?></td>
                            </tr>
                            <tr>
                                <?php
                $profit = number_format(($sum->total - ($discount->ds + $expense->expense + $purchase->pprice)), 2);
                if ($profit >= 0) {

                  echo "<td>Profit</td>";
                } else {
                  echo "<td>Loss</td>";
                }
                echo "<td>" . $profit . "</td>";
                ?>
                            </tr>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var elem = document.documentElement;

            function openFullscreen() {
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.webkitRequestFullscreen) {
                    /* Safari */
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    /* IE11 */
                    elem.msRequestFullscreen();
                }
            }

            function closeFullscreen() {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    /* Safari */
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    /* IE11 */
                    document.msExitFullscreen();
                }
            }

            function printDiv() {
                var divToPrint = document.getElementById('DivIdToPrint');
                var newWin = window.open('', 'Print-Window');
                newWin.document.open();
                newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
                newWin.document.close();
                setTimeout(function() {
                    newWin.close();
                }, 10);
            }
        </script>