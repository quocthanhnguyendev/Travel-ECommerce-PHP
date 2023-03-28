<div class="second-page-heading">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4>Book Prefered Deal Here</h4>
        <h2>Make Your Reservation</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt uttersi labore et dolore magna aliqua is
          ipsum suspendisse ultrices gravida
        </p>
        <div class="main-button">
          <a href="about.html">Discover More</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="more-info reservation-info">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <div class="info-item">
          <i class="fa fa-phone"></i>
          <h4>Make a Phone Call</h4>
          <a href="#">+123 456 789 (0)</a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="info-item">
          <i class="fa fa-envelope"></i>
          <h4>Contact Us via Email</h4>
          <a href="#">company@email.com</a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="info-item">
          <i class="fa fa-map-marker"></i>
          <h4>Visit Our Offices</h4>
          <a href="#">24th Street North Avenue London, UK</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="reservation-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div id="map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth"
            width="100%" height="450px" frameborder="0" style="
                  border: 0;
                  border-top-left-radius: 23px;
                  border-top-right-radius: 23px;
                " allowfullscreen=""></iframe>
        </div>
      </div>
      <div class="col-lg-12">
        <form id="reservation-form" name="gs" method="post" action="index.php?ctrl=contact">
          <div class="row">
            <div class="col-lg-12">
              <h4>
                Make Your <em>Contact</em> To <em>Traveling</em>
              </h4>
            </div>

            <div class="col-lg-6">
              <fieldset>
                <label for="Name" class="form-label">Your Name</label>
                <input type="text" value="<?php if (!empty($_SESSION['auth'])) {
                  echo $_SESSION['auth']['lastname'] . " " . $_SESSION['auth']['firstname'];
                } ?>" name="fullname" class="Name" placeholder="Ex. John Smithee" autocomplete="on" required />
              </fieldset>
            </div>

            <div class="col-lg-6">
              <fieldset>
                <label for="Number" class="form-label">Your Phone Number</label>
                <input type="number" value="<?php if (!empty($_SESSION['auth'])) {
                  echo $_SESSION['auth']['phone'];
                } ?>" name="phonenumber" class="Number" placeholder="Ex. +xxx xxx xxx" autocomplete="on" required />
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <label for="Number" class="form-label">Email</label>
                <input type="email" value="<?php if (!empty($_SESSION['auth'])) {
                  echo $_SESSION['auth']['email'];
                } ?>" name="email" class="Number" placeholder="Enter your email" autocomplete="on" required />
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <label for="text" class="form-label">Text Content</label>
                <textarea name="txtContent" class="rounded border bg-transparent mb-5"
                  style="border: 1px solid #e0e0e0;" id="" cols="130" rows="10"></textarea>
              </fieldset>
            </div>

            <div class="col-lg-12">
              <fieldset>
                <button class="main-button">
                  Send
                </button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>