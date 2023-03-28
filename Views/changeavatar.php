<div class="reservation-form">
  <div class="container">
    <div class="col-lg-6 m-auto">
      <form id="reservation-form" name="gs" action="index.php?ctrl=settings&act=changeavatar" method="post"
        enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center pb-5">
            <img src="Public/assets/images/avatar/<?php if (!empty($_SESSION['auth']['avatar'])) {
              echo $_SESSION['auth']['avatar'];
            } else {
              echo "avatardefault.png";
            } ?>" alt="" style="width: 300px; height: 300px; object-fit: cover; border-radius: 50%;">
          </div>

          <div class="col-lg-12">
            <div class="mb-3">
              <input class="form-control border-info" name="avatar" type="file" id="formFileMultiple" multiple
                style="font-size: 15px; padding: 10px;">
            </div>
          </div>
          <div class="col-lg-12">
            <fieldset>
              <button class="main-button" type="submit">
                UPDATE YOUR AVATAR
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