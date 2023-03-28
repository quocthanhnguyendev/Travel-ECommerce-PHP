<div class="page-heading <?php if (empty($_SESSION['auth'])) {
  echo "p-5";
} ?> ">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php if (empty($_SESSION['auth'])): ?>
          <div class="reservation-form">
            <div class="container">
              <div class="col-lg-12">
                <form id="reservation-form" action="index.php?ctrl=tourist" method="post" style="background: none;"
                  name="gs">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4 style="font-size: 50px;">
                        <em>SEARCH</em> <span>YOUR</span> <em> ORDER</em>
                      </h4>
                    </div>

                    <div class="col-lg-12">
                      <fieldset>
                        <input type="number" name="idOrder" class="Name text-light" placeholder="Enter your order code" />
                      </fieldset>
                    </div>

                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" class="main-button">
                          SEARCH YOUR ORDER
                        </button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php else: ?>
          <h4>Discover Our Weekly Offers</h4>
          <h2>Amazing Prices &amp; More</h2>
          <div class="border-button">
            <a href="about.html">Discover More</a>
          </div>

        <?php endif; ?>

      </div>
    </div>
  </div>
</div>

<div class="search-form">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <form id="search-form" name="gs" method="post" role="search" action="index.php?ctrl=tourist&act=sort">
          <div class="row">
            <div class="col-lg-2">
              <h4>Sort Deals By:</h4>
            </div>
            <div class="col-lg-4">
              <fieldset>
                <select name="Location" class="form-select" aria-label="Default select example" id="chooseLocation"
                  onChange="this.form.click()">
                  <option selected>Destinations</option>
                  <?php while ($setCountry = $countryData->fetch()): ?>
                    <option type="checkbox" value="<?php echo $setCountry['ID_COUNTRY']; ?>">
                      <?php echo $setCountry['NAME_COUNTRY']; ?>
                    </option>
                  <?php endwhile; ?>

                </select>
              </fieldset>
            </div>
            <div class="col-lg-4">
              <fieldset>
                <select name="Price" class="form-select" aria-label="Default select example" id="choosePrice"
                  onChange="this.form.click()">
                  <option selected>Price Range</option>
                  <option value="249">Under $250</option>
                  <option value="250">$250 - $500</option>
                  <option value="501">Over $500</option>
                </select>
              </fieldset>
            </div>
            <div class="col-lg-2">
              <fieldset>
                <button class="border-button">Search Results</button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="amazing-deals">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading text-center">
          <h2>Best Weekly Offers In Each City</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore.
          </p>
        </div>
      </div>

      <?php

      while ($set = $tourData->fetch()):
        ?>
        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                <div class="image">
                  <img src="Public/assets/images/<?php echo $set['IMAGE_TOUR']; ?>" alt="" />
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <h4 class="text-center">
                    <?php echo $set['NAME_TOUR']; ?>
                  </h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa-solid fa-calendar-days"></i>
                      <span class="list">
                        <?php echo $format->DateFormat($set['START_DATE']); ?>
                      </span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list">
                        <?php echo $format->DateFormat($set['END_DATE']); ?>
                      </span>
                    </div>
                  </div>
                  <p>
                    <i class="fa-solid fa-globe"></i>
                    <?php echo $set['NAME_COUNTRY']; ?>
                    </br>
                    <?php echo $set['ICON']; ?>
                    <?php echo $set['NAME_TRANSPORT']; ?></br>
                    <i class="fa-sharp fa-solid fa-money-check-dollar"></i>
                    <?php
                    if (isset($set['SALE']) && $set['SALE'] != 0) {
                      echo "<strike><span>" . $format->Currency($set['PRICE_TOUR']) . "</span></strike> <span class='text-info'>" . $format->Currency($set['SALE']) . "<sub>/people</sub></span>";
                    } else {
                      echo "<span class='text-info'>" . $format->Currency($set['PRICE_TOUR']) . "<sub>/people</sub></span>";
                    }
                    ?>
                  </p>

                  <div class="main-button text-center">
                    <a href="index.php?ctrl=tourist&act=details&id=<?php echo $set['ID_TOUR']; ?>">Booking Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      endwhile;
      ?>
      <div class="col-lg-12">
        <ul class="page-numbers">
          <?php if ($_GET['page'] > 1 || empty($_GET['page'])): ?>
            <li>
              <a href="index.php?ctrl=tourist&page=<?php echo $_GET['page'] - 1; ?>"><i class="fa fa-arrow-left"></i></a>
            </li>
          <?php endif; ?>
          <?php for ($i = 1; $i <= $allPage; $i++): ?>
            <li <?php if ($i == $CurrentPage) {
              echo "class='active'";
            } ?>><a
                href="index.php?ctrl=tourist&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php endfor; ?>
          <?php if ($_GET['page'] < $allPage): ?>
            <li>
              <a href="index.php?ctrl=tourist&page=<?php echo $_GET['page'] + 1; ?>"><i class="fa fa-arrow-right"></i></a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>