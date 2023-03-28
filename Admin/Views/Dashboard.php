<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span>
        Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview
            <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="./Admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">
              Member
              <i class="mdi mdi-account menu-icon"></i>
            </h4>
            <h2 class="mb-5">
              <?php echo $quatityUser['quatity_user']; ?> Thành Viên
            </h2>
            <h6 class="card-text">Increased by 60%</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="./Admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">
              Orders
              <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">
              <?php echo $NumberOrder['quatity_order']; ?>
              Đơn Hàng
            </h2>
            <h6 class="card-text">Tổng tiền:
              <?php echo $format->Currency($totalOrder['sum_order']); ?>
            </h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="./Admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">
              Tourism
              <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">
              <?php echo $tourismBought['sum_tourism'] ?> Số Lượng Chuyến Du Lịch Đã Đặt
            </h2>
            <h6 class="card-text">Increased by 5%</h6>
          </div>
        </div>
      </div>

      <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="./Admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">
              Love Tourism
              <i class="fa-solid fa-heart"></i>
            </h4>
            <h2 class="mb-5">
              <?php echo $quatityLike['quatity_like'] ?> lượt Yêu Thích
            </h2>
            <h6 class="card-text">Increased by 60%</h6>
          </div>
        </div>
      </div>
      <div class="col-md-6 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="./Admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">
              Comment
              <i class="fa-solid fa-comment"></i>
            </h4>
            <h2 class="mb-5">
              <?php echo $quatityComment['quatity_comment'] ?> Lượt Bình Luận
            </h2>
            <h6 class="card-text">Decreased by 10%</h6>
          </div>
        </div>
      </div>

    </div>


    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="container-fluid d-flex justify-content-between">
        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com
          2021</span>
        <span class="float-none float-sm-end mt-1 mt-sm-0 text-end">
          Free
          <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a>
          from Bootstrapdash.com</span>
      </div>
    </footer>
    <!-- partial -->
  </div>