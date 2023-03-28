<div class="reservation-form">
  <div class="container">
    <div class="col-lg-12">
      <form id="reservation-form" name="gs" action="index.php?ctrl=auth&&act=verify" method="post"
        onsubmit="return validateLoginForm()">
        <div class="row">
          <div class="col-lg-12">
            <h4>
              VERIFY <em>CODE</em>
            </h4>
          </div>
          <input type="hidden" name="email" value="<?php echo $email; ?>">

          <div class="col-lg-12">
            <fieldset>
              <label for="Name" class="form-label">Code</label>
              <input type="text" name="verifycode" class="Name" placeholder="Enter your code" autocomplete="on" />
            </fieldset>
          </div>

          <div class="col-lg-12">
            <fieldset>
              <button type="submit" name="btnVerify" class="main-button">
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