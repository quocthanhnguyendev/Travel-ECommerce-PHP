<div class="reservation-form">
  <div class="container">
    <div class="col-lg-12">
      <form id="reservation-form" name="gs" action="index.php?ctrl=auth&&act=login" method="post">
        <div class="row fs-4">
          <div class="col-lg-12">
            <h4>
              <em>ORDER</em> DETAIL <em>TRAVELING</em>
            </h4>
          </div>

          <div class="col-lg-6 p-3">
            <span>Fullname:</span> <b>
              <?php
              if (!empty($_SESSION['auth'])) {
                echo $order_user['lastname'] . " " . $order_user['firstname'];
              } else {
                echo $getOneOrder['lastname'] . " " . $getOneOrder['firstname'];
              }
              ?>
            </b>
          </div>

          <div class="col-lg-6 p-3 text-end">
            <span>Invoice Number:</span> <b>
              <?php
              if (!empty($_SESSION['auth'])) {
                echo "#" . $order_user['order_id'];
              } else {
                echo "#" . $getOneOrder['order_id'];
              }
              ?>
            </b>
          </div>

          <div class="col-lg-6 p-3">
            <span>Email Address:</span> <b>
              <?php
              if (!empty($_SESSION['auth'])) {
                echo $order_user['email'];
              } else {
                echo $getOneOrder['email'];
              }
              ?>
            </b>
          </div>

          <div class="col-lg-6 p-3 text-end">
            <span>Status:</span> <b>
              <?php
              if (!empty($_SESSION['auth'])) {
                if ($order_user['status'] == 0) {
                  echo '<span class="text-info" > <i class="fa-solid fa-clock-rotate-left"></i> Pending</span>';
                } else if ($order_user['status'] > 0) {
                  echo '<span class="text-success" > <i class="fa-solid fa-circle-check"></i> Confirmed</span>';
                } else {
                  echo '<span class="text-danger" >  <i class="fa-solid fa-circle-xmark"></i> Cancel</span>';
                }
              } else {
                if ($getOneOrder['status'] == 0) {
                  echo '<span class="text-info" > <i class="fa-solid fa-clock-rotate-left"></i> Pending</span>';
                } else if ($getOneOrder['status'] > 0) {
                  echo '<span class="text-success" > <i class="fa-solid fa-circle-check"></i> Confirmed</span>';
                } else {
                  echo '<span class="text-danger" >  <i class="fa-solid fa-circle-xmark"></i> Cancel</span>';
                }
              }
              ?>

            </b>
          </div>

          <div class="col-lg-12 p-3">
            <span>Phone Number:</span> <b>
              <?php
              if (!empty($_SESSION['auth'])) {
                echo $order_user['phone'];
              } else {
                echo $getOneOrder['phone'];
              }
              ?>
            </b>
          </div>

          <div class="col-lg-12 p-3">
            <span>Address:</span> <b>
              <?php
              if (!empty($_SESSION['auth'])) {
                echo $order_user['address'];
              } else {
                echo $getOneOrder['address'];
              }
              ?>
            </b>
          </div>

          <div class="col-lg-16 p-3">
            <span>Order Date:</span> <b>
              <?php
              if (!empty($_SESSION['auth'])) {
                echo $format->DateTimeFormat($order_user['created']);
              } else {
                echo $format->DateTimeFormat($getOneOrder['created']);
              }
              ?>
            </b>
          </div>

          <hr class="my-4">

          <!-- sản phẩm -->
          <div class="col-lg-12 pb-2">

            <div class="row align-items-center">
              <?php
              $TourArray = array();
              if (!empty($_SESSION['auth'])) {
                $TourArray = $order_detail;
              } else {
                $TourArray = $getOneOrderDetailLogout;
              }
              foreach ($TourArray as $key => $value):
                ?>
                <div class="col-lg-2">
                  <img src="Public/assets/images/<?php echo $value['IMAGE_TOUR'] ?>" class="img-fluid rounded-3" />
                </div>

                <div class="col-lg-2 text-center">
                  <div class="text-muted">
                    <?php echo $value['NAME_COUNTRY'] ?>
                  </div>
                  <b class="mb-0">
                    <?php echo $value['NAME_TOUR'] ?>
                  </b>
                </div>

                <div class="col-lg-1 text-center">
                  <div>
                    <?php echo $value['transport'] ?>
                  </div>
                  <div>
                    <?php echo $value['ICON'] ?>
                  </div>
                </div>

                <div class="col-lg-2 text-center">
                  <div>
                    <?php echo $value['quatity'] ?>
                  </div>
                  <div><i class="fa-solid fa-users"></i></div>
                </div>

                <div class="col-lg-3">
                  <div class='mb-0'>Start Date:
                    <b>
                      <?php echo $format->DateFormat($value['start_date']) ?>
                    </b>
                  </div>
                  <div class='mb-0'>End Date:
                    <b>
                      <?php echo $format->DateFormat($value['end_date']) ?>
                    </b>
                  </div>
                </div>

                <div class="col-lg-2 text-end">
                  <b class='mb-0'>
                    <?php echo $format->Currency($value['amount']) ?>
                  </b>
                </div>
                <hr class="my-4">

              <?php endforeach; ?>
            </div>

          </div>
          <div class="text-end">Tổng tiền: <b class="text-danger">
              <?php if (isset($totalOrder['total'])) {
                echo $format->Currency($totalOrder['total']);
              } ?>
            </b></div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>