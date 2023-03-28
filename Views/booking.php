<div class="reservation-form">
  <div class="container">
    <div class="col-lg-12">
      <form id="reservation-form" name="gs" action="index.php?ctrl=tourist&act=booking" method="post"
        onsubmit="return validateSignupForm()">
        <div class="row">
          <div class="col-lg-12">
            <h4>
              <em>BOOKING</em> A TRAVELING <em>RIGHT NOW</em>
            </h4>
          </div>

          <?php if (!empty($_SESSION['auth'])): ?>
            <input type="hidden" name="user_id" class="Name" value="<?php echo $_SESSION['auth']['user_id']; ?>"
              autocomplete="on" />
          <?php endif; ?>

          <div class="col-lg-12 text-center text-danger">
            <span style="display: none; font-weight: bolder; padding: 10px;" id="error"></span>
          </div>
          <?php if (empty($_SESSION['auth'])): ?>
            <div class="col-lg-6">
              <fieldset>
                <label for="Name" class="form-label">First Name</label>
                <input type="text" name="firstname" class="Name" placeholder="Enter your first name" autocomplete="on" />

              </fieldset>
            </div>

            <div class="col-lg-6">
              <fieldset>
                <label for="Name" class="form-label">Last Name</label>
                <input type="text" name="lastname" class="Name" placeholder="Enter your last name" autocomplete="on" />
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <label for="Name" class="form-label">Email Address</label>
                <input type="text" name="email" class="Name" placeholder="Enter your email address" autocomplete="on" />
              </fieldset>
            </div>

            <div class="col-lg-6">
              <fieldset>
                <label for="Number" class="form-label">Your Phone Number</label>
                <input type="number" name="phonenumber" class="Number" placeholder="+84 xxx xxx xxx" autocomplete="on" />
              </fieldset>
            </div>
          <?php endif; ?>
          <div class="<?php
          if (empty($_SESSION['auth'])) {
            echo "col-lg-6";
          } else {
            echo "col-lg-12";
          }
          ?>">
            <fieldset>
              <label for="Number" class="form-label">Quatity</label>
              <input type="number" name="quatity" class="Number" placeholder="Enter quatity people" autocomplete="on" />
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset>
              <label for="chooseGuests" class="form-label">Transport</label>
              <select name="transport" class="form-select" aria-label="Default select example" id="chooseGuests"
                onChange="this.form.click()">
                <?php
                $tranSport = new Transport();
                $transportData = $tranSport->getTransport();
                while ($result = $transportData->fetch()):
                  ?>
                  <option value="<?php echo $result['NAME_TRANSPORT']; ?>"><?php echo $result['NAME_TRANSPORT']; ?>
                  </option>
                <?php endwhile; ?>
              </select>
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset>
              <label for="chooseGuests" class="form-label">Tourism Name</label>
              <select name="tourismname" class="form-select" aria-label="Default select example" id="chooseGuests"
                onChange="this.form.click()">
                <?php
                $country = new Country();
                $tourism = new Tourist();

                $countryData = $country->getCountry();

                while ($resultCountry = $countryData->fetch()):
                  ?>
                  <optgroup label="<?php echo $resultCountry['NAME_COUNTRY']; ?>">
                    <?php
                    $tourData = $tourism->getTouristByNameCountry($resultCountry['NAME_COUNTRY']);
                    while ($resultTour = $tourData->fetch()):
                      ?>
                      <option value="<?php echo $resultTour['ID_TOUR'] ?>"><?php echo $resultTour['NAME_TOUR'] ?></option>
                      <?php
                    endwhile;
                    ?>

                  </optgroup>
                <?php endwhile; ?>
              </select>
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset>
              <label for="Number" class="form-label">Start Date</label>
              <input type="date" name="startdate" class="date" />
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset>
              <label for="Number" class="form-label">End Date</label>
              <input type="date" name="enddate" class="date" />
            </fieldset>
          </div>
          <?php if (empty($_SESSION['auth'])): ?>
            <div class="col-lg-12">
              <fieldset>
                <label for="Number" class="form-label">Address</label>
                <input type="text" name="address" class="form-select" placeholder="Enter your address" />
              </fieldset>
            </div>
          <?php endif; ?>

          <div class="col-lg-12">
            <fieldset>
              <button class="main-button" type="submit">
                BOOKING NOW
              </button>
            </fieldset>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<script>
  function validateSignupForm() {
    let error = document.getElementById('error');
    let email = document.forms["gs"]["email"];
    let password = document.forms["gs"]["password"];
    let firstname = document.forms["gs"]["firstname"];
    let lastname = document.forms["gs"]["lastname"];
    let confirmpassword = document.forms["gs"]["confirmpassword"];
    let phonenumber = document.forms["gs"]["phonenumber"];
    let address = document.forms["gs"]["address"];
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (firstname.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Firstname can not empty!";
      firstname.focus();
      return false;
    }

    if (lastname.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Firstname can not empty!";
      lastname.focus();
      return false;
    }

    if (email.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Email can not empty!";
      email.focus();
      return false;
    } else if (!filter.test(email.value)) {
      error.style.display = "block";
      error.innerHTML = "*Your email is in valid !";
      email.focus();
      return false;
    }

    if (password.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Password can not empty!";
      password.focus();
      return false;
    } else if (password.value.length < 6 || password.value.length > 20) {
      error.style.display = "block";
      error.innerHTML = "*Your password must have 6 to 20 characters !";
      password.focus();
      return false;
    }

    if (confirmpassword.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Confirm Password can not empty!";
      confirmpassword.focus();
      return false;
    } else if (confirmpassword.value != password.value) {
      error.style.display = "block";
      error.innerHTML = "*Confirm password is not match!";
      confirmpassword.focus();
      return false;
    }

    if (phonenumber.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Phone number can not empty!";
      phonenumber.focus();
      return false;
    } else if (phonenumber.value.length != 10) {
      error.innerHTML = "*Your phone number is in valid !";
      phonenumber.focus();
      return false;
    }

    if (address.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Address can not empty!";
      address.focus();
      return false;
    }

  }
</script>