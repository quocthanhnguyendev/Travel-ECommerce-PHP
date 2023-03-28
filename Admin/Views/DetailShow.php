<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span>
        Order Detail
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
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title d-flex justify-content-between">
              <?php echo strtoupper("Detail Order " . $_GET['order']); ?>
              <b>
                <?php echo "#" . $id; ?>
              </b>
            </h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>NAME TOUR</th>
                    <th>IMAGE TOUR</th>
                    <th>QUATITY</th>
                    <th>DATE START</th>
                    <th>DATE END</th>
                    <th>TRANSPORT</th>
                    <th>AMOUNT</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($result = $detailData->fetch()): ?>

                  <tr>

                    <td>
                      <?php echo $result['NAME_TOUR'] ?>
                    </td>

                    <td>
                      <img style="width: 50%; height: 50%; border-radius: 10px; object-fit: cover;"
                        src="Public/assets/images/<?php echo $result['IMAGE_TOUR']; ?>" class="me-4" />
                    </td>

                    <td>
                      <?php echo $result['quatity'] ?>
                    </td>

                    <td>
                      <?php echo $format->DateFormat($result['start_date']) ?>
                    </td>

                    <td>
                      <?php echo $format->DateFormat($result['end_date']) ?>
                    </td>

                    <td>
                      <?php echo $result['transport'] ?>
                    </td>

                    <td>
                      <?php echo $format->Currency($result['amount']); ?>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
                <!-- <span class="text-end">
                  <a href="index.php?ctrl=admin&page=tourism&act=deleteall"
                    style="color: inherit; text-decoration: none"><span class="btn btn-inverse-danger w-25">Delete
                      All</span>
                  </a>
                </span> -->
              </table>
            </div>
          </div>
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