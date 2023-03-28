<div class="reservation-form">
  <div class="container">
    <div class="col-lg-12">
      <form id="reservation-form" name="gs" action="index.php?ctrl=settings&act=general" method="post">
        <div class="row">
          <div class="col-lg-12">
            <h4>
              YOUR <em>PROFILE</em>
            </h4>
          </div>

          <div class="col-lg-6">
            <fieldset>
              <label for="Name" class="form-label">First Name</label>
              <input type="text" name="firstname" class="Name" placeholder="Enter your first name" autocomplete="on"
                required value="<?php echo $_SESSION['auth']['firstname'] ?>" />
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset>
              <label for="Name" class="form-label">Last Name</label>
              <input type="text" name="lastname" class="Name" placeholder="Enter your last name" autocomplete="on"
                required value="<?php echo $_SESSION['auth']['lastname'] ?>" />
            </fieldset>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <label for="Name" class="form-label">Email Address</label>
              <input disabled type="email" name="email" class="Name text-muted" placeholder="Enter your email address"
                autocomplete="on" value="<?php echo $_SESSION['auth']['email'] ?>" />
            </fieldset>
          </div>


          <div class="col-lg-6">
            <fieldset>
              <label for="Number" class="form-label">Your Phone Number</label>
              <input type="number" name="phonenumber" class="Number" placeholder="+84 xxx xxx xxx" autocomplete="on"
                required value="<?php if (isset($_SESSION['auth']['phone'])) {
                  echo $_SESSION['auth']['phone'];
                } ?>" />
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset>
              <label for="chooseGuests" class="form-label">Gender</label>
              <select name="gender" class="form-select" aria-label="Default select example" id="chooseGuests"
                onChange="this.form.click()">

                <option value="1" <?php if ($_SESSION['auth']['gender'] == 1):
                  echo "selected";
                endif; ?>>Male</option>
                <option value="0" <?php if ($_SESSION['auth']['gender'] == 0):
                  echo "selected";
                endif; ?>>Female</option>

              </select>
            </fieldset>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <label for="Number" class="form-label">Address</label>
              <input type="text" name="address" class="Name" placeholder="Enter your address" required
                value="<?php echo $_SESSION['auth']['address'] ?>" />
            </fieldset>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <button class="main-button" type="submit">
                UPDATE YOUR PROFILE
              </button>
            </fieldset>
          </div>

          <div class="pt-5">
            <h6 class="mb-0"><a href="index.php?ctrl=settings" class="text-body"><i
                  class="fas fa-long-arrow-alt-left me-2"></i>Back to settings</a></h6>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>