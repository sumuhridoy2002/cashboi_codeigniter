<div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Alert Product Stock Report</h3>
              </div>

              <div class="card-body">
                <div id="print">
                    
                  <table id="example" class="table table-responsive table-bordered" >
                    <thead>
                      <tr>
                        <th style="width: 5%;">#SN.</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th style="width: 15%;">Stock Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      $tpq = 0;
                      $tsq = 0;
                      $tq = 0;
                      $tr = 0;
                      $taq = 0;
                      foreach ($stock as $result){
                      $i++;
                      $pid = $result['product'];
                      $cid = $result['compid'];

                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['productcode']; ?></td>
                        <td><?php echo $result['productName']; ?></td>
                        <td><?php echo $result['totalPices']; $tq += $result['totalPices']; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><br>
               
              </div>
            </div>
          </div>
        </div>
      </div>
