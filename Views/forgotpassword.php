<div class="reservation-form">
  <div class="container">
    <div class="col-lg-12">
      <form id="reservation-form" name="gs" action="index.php?ctrl=auth&act=newpassword" method="post"
        onsubmit="return validateChangePassForm()">
        <div class="row">

          <div class="col-lg-12">
            <h4>
              <em>NEW</em> YOUR <em>PASSWORD</em>
            </h4>
          </div>

          <div class="col-lg-12 text-center text-danger border-danger border-2">
            <span style="display: none;" id="error"></span>
          </div>

          <input type="hidden" name="emailforgot" value="<?php if (isset($_GET['user'])) {
            echo $_GET['user'];
          } ?>">

          <div class="col-lg-12">
            <fieldset>
              <label for="Name" class="form-label">New Password</label>
              <input type="password" name="newpassword" class="Name" placeholder="Enter your new password"
                autocomplete="on" />
            </fieldset>
          </div>


          <div class="col-lg-12">
            <fieldset>
              <label for="Name" class="form-label">Confirm New Password</label>
              <input type="password" name="confirmnewpassword" class="Name"
                placeholder="Enter your confirm new password" autocomplete="on" />
            </fieldset>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <button class="main-button" name="btnNewPass">
                CONFIRM
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
  function validateChangePassForm() {
    let error = document.getElementById('error');
    let confirmnewpassword = document.forms["gs"]["confirmnewpassword"];
    let currentpassword = document.forms["gs"]["password"];
    let newpassword = document.forms["gs"]["newpassword"];

    if (currentpassword.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Password can not empty !";
      currentpassword.focus();
      return false;
    }

    if (newpassword.value == "") {
      error.style.display = "block";
      error.innerHTML = "*New password can not empty !";
      newpassword.focus();
      return false;
    } else if (newpassword.value.length < 6 || newpassword.value.length > 20) {
      error.style.display = "block";
      error.innerHTML = "*Your new password must have 6 to 20 characters !";
      newpassword.focus();
      return false;
    }

    if (confirmnewpassword.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Confirm new password can not empty!";
      confirmnewpassword.focus();
      return false;
    } else if (confirmnewpassword.value != newpassword.value) {
      error.style.display = "block";
      error.innerHTML = "*Confirm new password is not match!";
      confirmnewpassword.focus();
      return false;
    }

  }
</script>