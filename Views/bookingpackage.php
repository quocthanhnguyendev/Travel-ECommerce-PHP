<section class="h-100 h-custom">
   <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
         <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
               <div class="card-body p-0">
                  <div class="row g-0">
                     <div class="col-lg-9">
                        <form action="index.php?ctrl=tourist&act=bookingpackage&param=update" method="post">
                           <div class="d-flex justify-content-between shadow-bottom align-items-center text-center p-4">
                              <h1 class="fw-bold mb-0 text-info">Booking Package</h1>
                              <h6 class="mb-0 text-muted">
                                 <?php echo count($_SESSION['package']) ?> items
                              </h6>
                           </div>
                           <div class="p-5 scroll-content-left">
                              <?php
                              $package = new BookingPackage();
                              $format = new Format();
                              if (count($_SESSION['package']) > 0):
                                 foreach ($_SESSION['package'] as $key => $item):
                                    ?>
                                    <div class="row mb-4 text-center d-flex justify-content-between align-items-center">
                                       <div class="col-md-12 col-lg-2 col-xl-2">
                                          <img src="Public/assets/images/<?php echo $item['image'] ?>"
                                             class="img-fluid rounded-3" alt="Cotton T-shirt">
                                       </div>
                                       <div class="col-md-12 col-lg-2 col-xl-2 text-Title text-start">
                                          <h6 class="text-muted">
                                             <?php echo $item['namecountry'] ?>
                                          </h6>
                                          <h4 class="mb-0">
                                             <?php echo $item['nametour'] ?>
                                          </h4>
                                       </div>

                                       <div class="col-sm-6 col-md-6 col-lg-2 col-xl-1">
                                          <p class='mb-0'>
                                             <?php echo $item['icontransport'] ?>
                                          </p>
                                          <p class='mb-0'>
                                             <?php echo $item['transport'] ?>
                                          </p>
                                       </div>

                                       <div class="col-sm-6 col-md-6 col-lg-2 col-xl-1">
                                          <p class='mb-0'><i class="fa fa-clock"></i></p>
                                          <p class='mb-0'>
                                             <?php echo $format->sumDay($item['startdate'], $item['enddate']) ?>
                                          </p>
                                       </div>

                                       <div class="col-md-12 col-lg-2 col-xl-2 d-flex">
                                          <div class="btn btn-link px-2"
                                             onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                             <i class="fas fa-minus"></i>
                                          </div>

                                          <input id="form1" name="quantity[<?php echo $key ?>]"
                                             value="<?php echo $item['numberpeople'] ?>" type="number"
                                             class="form-control form-control-sm" />

                                          <div class="btn btn-link px-2"
                                             onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                             <i class="fas fa-plus"></i>
                                          </div>
                                       </div>


                                       <div class="col-md-12 col-lg-1 col-xl-1 text-end">
                                          <button type="submit" class="border-0 bg-transparent p-0 text-muted"><i
                                                class="fa-solid fa-arrows-rotate"></i></button>
                                       </div>

                                       <div class="col-md-12 col-lg-1 col-xl-1 text-end">
                                          <a href="index.php?ctrl=tourist&act=bookingpackage&param=delete&id=<?php echo $item['id'] ?>"
                                             class="text-muted"><i class="fas fa-times"></i></a>
                                       </div>
                                    </div>
                                    <hr class="my-4">
                                    <?php
                                 endforeach;
                              else:
                                 ?>
                                 <p class="text-center">Booking package is emty right now !</p>
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
                     <div class="col-lg-3 bg-main">
                        <div class="p-5">
                           <h3 class="fw-bold mb-5 mt-2 pt-1 text-light">Summary</h3>
                           <hr class="my-4">

                           <div class="d-flex justify-content-between mb-4">
                              <h5 class="text-uppercase text-light">People </h5>
                              <h5 class="text-light">4</h5>
                           </div>
                           <?php if (empty($_SESSION['auth'])): ?>
                              <div class="d-flex justify-content-between mb-4">
                                 <h5 class="text-uppercase text-light">Login to have bonus point</h5>
                              </div>
                           <?php endif; ?>

                           <?php if (!empty($_SESSION['auth'])): ?>
                              <div class="d-flex justify-content-between mb-4">
                                 <h5 class="text-uppercase text-light">Bonus point</h5>
                                 <?php if (isset($_SESSION['auth']['point'])): ?>
                                    <h5 class="text-light">
                                       <?php echo $_SESSION['auth']['point'] ?>
                                       <i class="fa-brands fa-bitcoin"></i>
                                    </h5>
                                 <?php else: ?>
                                    <h5 class="text-light">
                                       <?php echo 0 ?>
                                       <i class="fa-brands fa-bitcoin"></i>
                                    </h5>
                                 <?php endif; ?>
                              </div>

                              <form action="index.php?ctrl=tourist&act=bookingpackage&param=usepoint" method="post">
                                 <div class="mb-5">
                                    <div class="form-outline">
                                       <input type="number" name="point" value="<?php if (isset($_SESSION['usePoint'])) {
                                          echo $_SESSION['usePoint'];
                                       } ?>" id="form3Examplea2" class="form-control form-control-lg" />
                                       <label class="form-label text-light" for="form3Examplea2">Enter your point</label>
                                    </div>
                                    <button type="submit" class="btn btn-light w-100 rounded-1 mt-2">Confirm Use
                                       Point</button>
                                 </div>
                              </form>
                           <?php endif; ?>

                           <hr class="my-4">

                           <div class="d-flex justify-content-between mb-5">
                              <h5 class="text-uppercase text-light">Total price</h5>
                              <h5 class="text-light">
                                 <?php echo $format->Currency($package->getTotalPackage()) ?>
                              </h5>
                           </div>

                           <a href="index.php?ctrl=tourist&act=payment" class="btn btn-light btn-block btn-lg"
                              data-mdb-ripple-color="dark">Payment</a>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>