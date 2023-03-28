<div class="reservation-form">
  <div class="container">
    <div class="col-lg-12">
      <form id="reservation-form" name="gs" action="index.php?ctrl=auth&&act=login" method="post">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <h4>
              YOUR <em>PROFILE</em>
            </h4>
          </div>

          <div class="col-lg-4">
            <img src="Public/assets/images/avatar/<?php if (!empty($_SESSION['auth']['avatar'])) {
              echo $_SESSION['auth']['avatar'];
            } else {
              echo "avatardefault.png";
            } ?>" alt=""
              style="width: 300px; height: 300px; object-fit: cover; border-radius: 50%; border: 3px solid lightblue;">
          </div>

          <div class="col-lg-8">
            <div class="row fs-3 justify-content-center ">
              <div class="col-lg-8 mb-4">
                <fieldset>
                  <span>Your Name: </span> <b>
                    <?php echo $_SESSION['auth']['lastname'] . " " . $_SESSION['auth']['firstname'] ?>
                  </b>
                </fieldset>
              </div>

              <div class="col-lg-4 mb-4">
                <fieldset>
                  <span>Point: </span> <b>
                    <?php echo $_SESSION['auth']['point']; ?>
                    <i class="fa-brands fa-bitcoin"></i>
                  </b>
                </fieldset>
              </div>

              <div class="col-lg-8 mb-4">
                <fieldset>
                  <span>Phone: </span> <b>
                    <?php echo $_SESSION['auth']['phone']; ?>
                  </b>
                </fieldset>
              </div>

              <div class="col-lg-4 mb-4">
                <fieldset>
                  <span>Gender: </span> <b>
                    <?php
                    if ($_SESSION['auth']['gender'] == 0) {
                      echo "Female";
                    } else {
                      echo "Male";
                    }
                    ?>
                  </b>
                </fieldset>
              </div>

              <div class="col-lg-12 mb-4">
                <fieldset>
                  <span>Email: </span>
                  <b>
                    <?php echo $_SESSION['auth']['email']; ?>
                  </b>
                </fieldset>
              </div>



              <div class="col-lg-12 mb-4">
                <fieldset>
                  <span>Address: </span> <b>
                    <?php echo $_SESSION['auth']['address']; ?>
                  </b>
                </fieldset>
              </div>

              <div class="col-lg-12 mb-4">
                <fieldset>
                  <span>Date Created Account: </span>
                  <b>
                    <?php
                    echo $format->DateTimeFormat($_SESSION['auth']['user_created']);
                    ; ?>
                  </b>
                </fieldset>
              </div>

            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>