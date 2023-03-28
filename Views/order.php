<section class="h-100 h-custom">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-12">
                <form action="index.php?ctrl=tourist&act=bookingpackage&param=update" method="post">
                  <div class="d-flex justify-content-between shadow-bottom align-items-center text-center p-4">
                    <h1 class="fw-bold mb-0 text-info"><span style="color: black;">Order</span> Tourism</h1>

                    <h6 class="mb-0 text-muted">
                      <?php
                      $order = new Orders();
                      $result = $order->getQuatityOrder($_SESSION['auth']['user_id']);
                      if (isset($result['quatity'])):
                        echo $result['quatity'];
                      else:
                        echo 0;
                      endif;
                      ?> Orders
                    </h6>
                  </div>
                  <div class="p-5 scroll-content-left row">
                    <?php
                    $order = new Orders();
                    $format = new Format();
                    if (isset($_SESSION['auth'])) {
                      $result = $order->getOrderOfUser($_SESSION['auth']['user_id']);
                      $quatityOrder = $order->getQuatityOrder($_SESSION['auth']['user_id']);
                    }
                    if (!empty($quatityOrder['quatity'])):
                      while ($set = $result->fetch()):
                        ?>

                        <div class="col-lg-12">
                          <div class="row align-items-center">
                            <div class="col-lg-2 text-center" style="font-weight: bold;">#
                              <?php echo $set['order_id'] ?>
                            </div>
                            <div class="col-lg-2 text-center align-items-center">
                              <?php echo $set['lastname'] . " " . $set['firstname'] ?>
                            </div>
                            <div class="col-lg-2 text-center">
                              <?php echo $set['phone'] ?>
                            </div>
                            <div class="col-lg-2 text-center">
                              <?php echo $set['address'] ?>
                            </div>
                            <div class="col-lg-2 text-center">
                              <?php
                              if ($set['status'] == 0): ?>
                                <span style="width: 60%;"
                                  class="badge rounded-pill text-bg-info text-light p-3 fs-5">Pending</span>
                              <?php elseif ($set['status'] == 1):
                                ?>
                                <span style="width: 60%;"
                                  class="badge rounded-pill text-bg-success text-light p-3 fs-5">Confirmed</span>
                                <?php
                              else:
                                ?>
                                <span style="width: 60%;"
                                  class="badge rounded-pill text-bg-danger text-light p-3 fs-5">Cancel</span>
                              <?php endif; ?>

                            </div>
                            <div class="col-lg-2 text-center" style="font-weight: bold;">
                              <?php echo $format->Currency($set['total']) ?>
                            </div>
                            <div class="col-lg-6 text-start mt-5"><a href="">Date created at
                                <?php echo $format->DateTimeFormat($set['created']) ?>
                              </a></div>
                            <div class="col-lg-6 text-end  mt-5"><a
                                href="index.php?ctrl=tourist&act=orderdetail&id=<?php echo $set['order_id'] ?>">Detail
                                Order <i class="fas fa-long-arrow-alt-right"></i></a></div>
                          </div>
                          <hr class="my-4">
                        </div>

                        <?php
                      endwhile;
                    else: ?>
                      <p class="text-center">Order Tourism is emty right now !</p>
                      <?php
                    endif;
                    ?>
                  </div>
                  <div class="p-4">
                    <h6 class="mb-0"><a href="index.php?ctrl=tourist" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>