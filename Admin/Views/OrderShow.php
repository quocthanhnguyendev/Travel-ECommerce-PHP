<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span>
        Order Manager
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
            <h4 class="card-title">Order Member</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>ACTION</th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>TOTAL</th>
                    <th>DATE CREATED</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($result = $orderData->fetch()): ?>
                    <tr>
                      <td>
                        <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1): ?>
                          <a
                            href="index.php?ctrl=admin&page=order&act=delete&order=member&id=<?php echo $result['order_id'] ?>"><i
                              class="mdi mdi-trash-can fs-3 text-danger"></i></a>
                        <?php endif; ?>
                        <a
                          href="index.php?ctrl=admin&page=order-detail&order=member&id=<?php echo $result['order_id'] ?>"><i
                            class="mdi mdi-alert-circle-outline fs-3"></i>
                          </i></a>
                      </td>

                      <td>
                        <b>
                          <?php echo "#" . $result['order_id'] ?>
                        </b>
                      </td>

                      <td>
                        <?php echo $result['lastname'] . " " . $result['firstname'] ?>
                      </td>

                      <td>
                        <?php echo $result['email'] ?>
                      </td>

                      <td>
                        <?php echo $result['phone'] ?>
                      </td>

                      <td>
                        <?php echo $result['address'] ?>
                      </td>

                      <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1): ?>
                        <td>
                          <div class="input-group-prepend">
                            <button class="btn <?php
                            if ($result['status'] == 0) {
                              echo "btn-inverse-info";
                            } else if ($result['status'] > 0) {
                              echo "btn-inverse-success";
                            } else {
                              echo "btn-inverse-danger";
                            }
                            ?> btn-fw dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">
                              <?php
                              if ($result['status'] == 0) {
                                echo "Pending";
                              } else if ($result['status'] > 0) {
                                echo "Confirmed";
                              } else {
                                echo "Cancel";
                              }
                              ?>
                            </button>
                            <div class="dropdown-menu">
                              <?php
                              if ($result['status'] == 0):
                                ?>
                                <a class="dropdown-item"
                                  href="index.php?ctrl=admin&page=order&order=member&id=<?php echo $result['order_id'] ?>&status=1">Confirmed</a>
                                <a class="dropdown-item"
                                  href="index.php?ctrl=admin&page=order&order=member&id=<?php echo $result['order_id'] ?>&status=-1">Cancel</a>
                              <?php elseif ($result['status'] > 0): ?>
                                <a class="
                                                                                                                                        dropdown-item"
                                  href="index.php?ctrl=admin&page=order&order=member&id=<?php echo $result['order_id'] ?>&status=-1">Cancel</a>
                                <?php
                              else:
                                ?>
                                <a class="
                                                                                                                            dropdown-item"
                                  href="index.php?ctrl=admin&page=order&order=member&id=<?php echo $result['order_id'] ?>&status=1">Confirmed</a>
                              <?php endif; ?>

                            </div>
                          </div>
                        </td>
                      <?php else: ?>
                        <td>
                          <?php if ($result['status'] == 0): ?>
                            <label class='badge badge-gradient-info'>Pending</label>
                          <?php elseif ($result['status'] > 0): ?>
                            <label class='badge badge-gradient-success'>Confirmed</label>
                          <?php else: ?>
                            <label class='badge badge-gradient-danger'>Cancel</label>
                          <?php endif; ?>
                        </td>

                      <?php endif; ?>


                      <td>
                        <?php echo $format->Currency($result['total']) ?>

                      </td>

                      <td>
                        <?php echo $format->DateTimeFormat($result['created']) ?>
                      </td>

                    </tr>

                  <?php endwhile; ?>
                </tbody>
                <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1): ?>
                  <a href="index.php?ctrl=admin&page=order&act=deleteall&order=member"
                    style="color: inherit; text-decoration: none">
                    <span class="btn btn-inverse-danger w-25">Delete All</span>
                  </a>
                <?php endif; ?>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Order User</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>ACTION</th>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>TOTAL</th>
                    <th>DATE CREATED</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($result = $orderLogoutData->fetch()): ?>
                    <tr>
                      <td>
                        <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1): ?>
                          <a
                            href="index.php?ctrl=admin&page=order&act=delete&order=user&id=<?php echo $result['order_id'] ?>"><i
                              class="mdi mdi-trash-can fs-3 text-danger"></i></a>
                        <?php endif; ?>
                        <a href="index.php?ctrl=admin&page=order-detail&order=user&id=<?php echo $result['order_id'] ?>"><i
                            class="mdi mdi-alert-circle-outline fs-3"></i></a>
                      </td>

                      <td>
                        <b>
                          <?php echo "#" . $result['order_id'] ?>
                        </b>
                      </td>

                      <td>
                        <?php echo $result['lastname'] . " " . $result['firstname'] ?>
                      </td>

                      <td>
                        <?php echo $result['email'] ?>
                      </td>

                      <td>
                        <?php echo $result['phone'] ?>
                      </td>

                      <td>
                        <?php echo $result['address'] ?>
                      </td>

                      <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1): ?>
                        <td>
                          <div class="input-group-prepend">
                            <button class="btn <?php
                            if ($result['status'] == 0) {
                              echo "btn-inverse-info";
                            } else if ($result['status'] > 0) {
                              echo "btn-inverse-success";
                            } else {
                              echo "btn-inverse-danger";
                            }
                            ?> btn-fw dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">
                              <?php
                              if ($result['status'] == 0) {
                                echo "Pending";
                              } else if ($result['status'] > 0) {
                                echo "Confirmed";
                              } else {
                                echo "Cancel";
                              }
                              ?>
                            </button>
                            <div class="dropdown-menu">
                              <?php
                              if ($result['status'] == 0):
                                ?>
                                <a class="dropdown-item"
                                  href="index.php?ctrl=admin&page=order&order=user&id=<?php echo $result['order_id'] ?>&status=1">Confirmed</a>
                                <a class="dropdown-item"
                                  href="index.php?ctrl=admin&page=order&order=user&id=<?php echo $result['order_id'] ?>&status=-1">Cancel</a>
                              <?php elseif ($result['status'] > 0): ?>
                                <a class="
                                                                                                                    dropdown-item"
                                  href="index.php?ctrl=admin&page=order&order=user&id=<?php echo $result['order_id'] ?>&status=-1">Cancel</a>
                                <?php
                              else:
                                ?>
                                <a class="
                                                                                                                    dropdown-item"
                                  href="index.php?ctrl=admin&page=order&order=user&id=<?php echo $result['order_id'] ?>&status=1">Confirmed</a>
                              <?php endif; ?>

                            </div>
                          </div>
                        </td>
                      <?php else: ?>
                        <td>
                          <?php if ($result['status'] == 0): ?>
                            <label class='badge badge-gradient-info'>Pending</label>
                          <?php elseif ($result['status'] > 0): ?>
                            <label class='badge badge-gradient-success'>Confirmed</label>
                          <?php else: ?>
                            <label class='badge badge-gradient-danger'>Cancel</label>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>

                      <td>
                        <?php echo $format->Currency($result['total']) ?>

                      </td>

                      <td>
                        <?php echo $format->DateTimeFormat($result['created']) ?>
                      </td>

                    </tr>

                  <?php endwhile; ?>
                </tbody>
                <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1): ?>
                  <span class=" text-end">
                    <a href="index.php?ctrl=admin&page=order&act=deleteall&order=user"
                      style="color: inherit; text-decoration: none">
                      <span class="btn btn-inverse-danger w-25">Delete All</span>
                    </a>
                  <?php endif; ?>
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