<div class="reservation-form">
  <div class="container">
    <div class="col-lg-12">
      <form id="reservation-form" name="gs" action="index.php?ctrl=auth&act=register" method="post"
        onsubmit="return validateSignupForm()">
        <div class="row">
          <div class="col-lg-12">
            <h4>
              <em>BECOME</em> A MEMBER <em>RIGHT NOW</em>
            </h4>
          </div>

          <div class="col-lg-12 text-center text-danger">
            <span style="display: none; font-weight: bolder; padding: 10px;" id="error"></span>
          </div>

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

          <div class="col-lg-12">
            <fieldset>
              <label for="Name" class="form-label">Password</label>
              <input type="password" name="password" class="Name" placeholder="Enter your password" autocomplete="on" />
            </fieldset>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <label for="Name" class="form-label">Confirm Password</label>
              <input type="password" name="confirmpassword" class="Name" placeholder="Enter again password"
                autocomplete="on" />
            </fieldset>
          </div>




          <div class="col-lg-6">
            <fieldset>
              <label for="Number" class="form-label">Your Phone Number</label>
              <input type="number" name="phonenumber" class="Number" placeholder="+84 xxx xxx xxx" autocomplete="on" />
            </fieldset>
          </div>

          <div class="col-lg-6">
            <fieldset>
              <label for="chooseGuests" class="form-label">Gender</label>
              <select name="gender" class="form-select" aria-label="Default select example" id="chooseGuests"
                onChange="this.form.click()">
                <option value="1">Male</option>
                <option value="0">Female</option>
              </select>
            </fieldset>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <label for="Number" class="form-label">Address</label>
              <input type="text" name="address" class="form-select" placeholder="Enter your address" />
            </fieldset>
          </div>

          <div class="col-lg-12 text-center p-5">
            <span>You are already a member? <a href="index.php?ctrl=auth&act=login">Login</a></span>
            </fieldset>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <button class="main-button" type="submit">
                REGISTER
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