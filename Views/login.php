<div class="reservation-form">
  <div class="container">
    <div class="col-lg-12">
      <form id="reservation-form" name="gs" action="index.php?ctrl=auth&&act=login" method="post"
        onsubmit="return validateLoginForm()">
        <div class="row">
          <div class="col-lg-12">
            <h4>
              <em>LOGIN TO</em> TRAVELING <em>RIGHT NOW</em>
            </h4>
          </div>

          <div class="col-lg-12 text-center text-danger border-danger border-2">
            <span style="display: none;" id="error"></span>
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

          <!-- Button trigger modal -->
          <div class="col-lg-12 text-end">
            <span>
              <a href="index.php?ctrl=auth&act=register" data-mdb-toggle="modal"
                data-mdb-target="#staticBackdrop">Forgot password ?</a>
            </span>
          </div>

          <div class="col-lg-12 text-center p-5">
            <span>You are not a member? <a href="index.php?ctrl=auth&act=register">Register</a></span>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <button type="submit" class="main-button">
                LOGIN
              </button>
            </fieldset>
          </div>
        </div>
      </form>

      <form id="reservation-form" name="gs" action="index.php?ctrl=auth&act=verify" method="post">
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Forgot <span class="text-info">Password</span>
                </h5>
                <a type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></a>
              </div>
              <div class="modal-body">
                <fieldset>
                  <label for="Name" class="form-label">Email Address</label>
                  <input type="text" name="email" class="Name" placeholder="Enter your email address"
                    autocomplete="on" />
                </fieldset>
              </div>
              <div class="modal-footer">
                <button type="submit" name="btnSubmit" class="btn btn-primary">Continue</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</div>
<script>
  function validateLoginForm() {
    let error = document.getElementById('error');
    let email = document.forms["gs"]["email"];
    let password = document.forms["gs"]["password"];
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (email.value == "" || password.value == "") {
      error.style.display = "block";
      error.innerHTML = "*Email or Password can not empty!";
      return false;
    }

    if (!filter.test(email.value)) {
      error.style.display = "block";
      error.innerHTML = "*Your email is in valid !";
      return false;
    }

    if (password.value.length < 6 || password.value.length > 20) {
      error.style.display = "block";
      error.innerHTML = "*Your password must have 6 to 20 characters !";
      return false;
    }
  }
</script>