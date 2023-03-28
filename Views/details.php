<div class="wrapper">
  <form id="reservation-form" action="index.php?ctrl=tourist&act=bookingpackage" method="post">
    <!-- hidden -->
    <input type="hidden" name="id_tour" value="<?php echo $set['ID_TOUR']; ?>">
    <input type="hidden" name="name_tour" value="<?php echo $set['NAME_TOUR']; ?>">
    <input type="hidden" name="price_tour" value="<?php echo $set['PRICE_TOUR']; ?>">
    <input type="hidden" name="start_date" value="<?php echo $set['START_DATE']; ?>">
    <input type="hidden" name="end_date" value="<?php echo $set['END_DATE']; ?>">
    <input type="hidden" name="sale" value="<?php echo $set['SALE']; ?>">
    <input type="hidden" name="image_tour" value="<?php echo $set['IMAGE_TOUR']; ?>">
    <input type="hidden" name="name_country" value="<?php echo $set['NAME_COUNTRY']; ?>">
    <input type="hidden" name="transport" value="<?php echo $set['NAME_TRANSPORT']; ?>">

    <div class="row">
      <div class="product-left col-lg-6">
        <div class="header">
          <h1>
            <?php echo $set['NAME_TOUR']; ?>
          </h1>
          <h2>
            <?php echo $set['NAME_COUNTRY']; ?>
          </h2>
        </div>
        <!--DESCRIPITON / DETAILS-->
        <div class="product-main">
          <div class="row">
            <div class="col-lg-3">Schedule:</div>
            <div class="col-lg-9">
              <div class="row">
                <div class="col-lg-6 text-dark"><i class="fa-solid fa-calendar-days"></i>
                  <?php echo $format->DateFormat($set['START_DATE']); ?>
                </div>
                <div class="col-lg-6 text-dark"><i class="fa-solid fa-calendar-check"></i>
                  <?php echo $format->DateFormat($set['END_DATE']); ?>
                </div>
              </div>
            </div>

            <div class="col-lg-3">Transport:</div>
            <div class="col-lg-9 text-dark">
              <?php echo $set['ICON']; ?>
              <?php echo $set['NAME_TRANSPORT']; ?>
            </div>

            <div class="col-lg-3">Quatity:</div>
            <div class="col-lg-9 text-dark">
              <?php echo $set['QUATITY']; ?> <i class="fa-solid fa-user-group"></i>
            </div>

            <div class="col-lg-5">Number of people:</div>
            <div class="col-lg-7"><input type="number" name="number_people" id="people" value="1" class="people-number">
            </div>

            <div class="col-lg-3">Views:</div>
            <div class="col-lg-9 text-dark">
              <?php echo $set['VIEWS']; ?>
              <i class="fa-solid fa-eye"></i>
            </div>

          </div>
        </div>
        <!--CHOOSE PRODUCT DETAILS-->
        <div class="product-details">

          <!--PRODUCT TOTAL-->
          <div class="product-total">
            <h3>Total Price</h3>
            <?php
            if (isset($set['SALE']) && $set['SALE'] != 0) {
              echo "<strike><span>" . $format->Currency($set['PRICE_TOUR']) . "</span></strike>";
              echo ' <p>' . $format->Currency($set['SALE']) . '</p>';
            } else {
              echo '<p>' . $format->Currency($set['PRICE_TOUR']) . '</p>';
            }
            ?>
          </div>
        </div>
        <!-- ADD TO CART BUTTON -->
        <?php if (!empty($_SESSION['auth']) || !empty($_SESSION['user'])): ?>
          <div class="product-btns">
            <button <?php if ($set['QUATITY'] <= 0) {
              echo "disabled";
            }
            ; ?> type="submit" class="product-add">
              <?php if ($set['QUATITY'] <= 0) {
                echo "out of stock";
              } else {
                echo "Booking Now";
              }
              ; ?>
            </button>
          </div>
        <?php else: ?>
          <div class="product-btns">
            <a class="product-add" data-mdb-toggle="modal" data-mdb-target="<?php if ($set['QUATITY'] > 0) {
              echo "#exampleModal";
            } ?>">
              <?php if ($set['QUATITY'] <= 0) {
                echo "out of stock";
              } else {
                echo "Booking Now";
              }
              ; ?>
            </a>
          </div>
        <?php endif; ?>

        <?php
        if (!empty($_SESSION['auth'])):
          $likedCheck = $likes->getOneLike($_SESSION['auth']['user_id'], $set['ID_TOUR']);
          ?>
          <div class="product-btns">
            <a href="index.php?ctrl=tourist&act=like&userId=<?php echo $_SESSION['auth']['user_id']; ?>&tourId=<?php echo $set['ID_TOUR'] ?>"
              class="product-add" <?php if ($likedCheck) {
                echo "style='background-color: #22b3c1;'";
              } ?>>
              <?php if (!$likedCheck): ?>
                <span>
                  <?php echo $numberLike['likeNumber'] . " <i class='fa-regular fa-heart'></i>"; ?>
                </span>

              <?php else: ?>
                <span class="text-light">
                  <?php echo $numberLike['likeNumber'] . " <i class='fa-solid fa-heart'></i>"; ?>
                </span>
              <?php endif; ?>
            </a>
          </div>
          <?php

        endif;
        ?>

      </div>
      <div class="product-right col-lg-6">
        <img style="object-fit: cover;" src="Public/assets/images/<?php echo $set['IMAGE_TOUR']; ?>" alt="">
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Order <span class="text-info">Tourism</span></h4>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Firstname</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter your firstname" name="firstname">
                </div>
              </div>

              <div class="col-lg-6 mb-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Lastname</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter your lastname" name="lastname">
                </div>
              </div>

              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter your email" name="email">
                </div>
              </div>

              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter your address" name="address">
                </div>
              </div>

              <div class="col-lg-12 mb-2">
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone Number</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter your phone number" name="phonenumber">
                </div>
              </div>


            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
            <div class="product-btn">
              <button type="submit" class="btn btn-info">Booking Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <?php if (!empty($_SESSION['auth'])): ?>
    <form action="index.php?ctrl=tourist&act=comment" method="post">
      <div class="p-5 mt-5 mb-5 row justify-content-end" style="background-color: #f5f5f5; border-radius: 10px; ">
        <input type="hidden" name="tourId" value="<?php echo $set['ID_TOUR']; ?>">
        <input type="hidden" name="userId" value="<?php echo $_SESSION['auth']['user_id']; ?>">

        <div class="row justify-content-center align-items-center p-0 pb-2">
          <img src="Public/assets/images/avatar/<?php if (!empty($_SESSION['auth']['avatar'])) {
            echo $_SESSION['auth']['avatar'];
          } else {
            echo "avatardefault.png";
          } ?>" class="rounded-circle col-lg-1 p-3" style="width: 80px;" alt="" srcset="">
          <input type="text" name="textcomment" placeholder="What do you think about Tour ?"
            class="border-0 p-3 col-lg-11" id="" required style="border-radius: 30px;">
        </div>


        <input type="submit" class="border-0 mt-3 mb-3 p-3 col-lg-11 text-light" value="Comment"
          style="background-color: #22b3c1; border-radius: 30px;">

      </div>
    </form>
  <?php endif; ?>

  <div class="tabs">
    <!-- Tabs navs -->
    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
          aria-controls="ex1-tabs-1" aria-selected="true">Description</a>
      </li>

      <li class="nav-item" role="presentation">
        <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab"
          aria-controls="ex1-tabs-2" aria-selected="false">Comment</a>
      </li>
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content" id="ex1-content">
      <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
        <?php echo $set['DESCRIPTION']; ?>
      </div>
      <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">

        <?php
        if (!empty($commentData)):
          $format = new Format();
          while ($set = $commentData->fetch()):
            ?>
            <div class="row justify-content-center align-items-center p-3">
              <div class="col-lg-1">
                <img src="Public/assets/images/avatar/<?php if (!empty($set['avatar'])) {
                  echo $set['avatar'];
                } else {
                  echo "avatardefault.png";
                } ?>" class="rounded-circle col-lg-1 p-3" style="width: 80px;" alt="" srcset="">
              </div>

              <div class="col-lg-11">
                <div><b>
                    <?php echo $set['lastname'] . " " . $set['firstname'] ?>
                  </b>
                  <p>
                    <?php echo $format->DateTimeFormat($set['comment_created']); ?>
                  </p>
                </div>

                <div style="word-wrap: break-word;">
                  <?php echo $set['textcomment']; ?>
                </div>
              </div>
              <hr class="m-5">
            </div>
            <?php
          endwhile;
        else:
          echo "Not Have Comment!";
        endif;
        ?>

      </div>
    </div>
    <!-- Tabs content -->
    </body>
    <!-- MDB -->
  </div>
</div>