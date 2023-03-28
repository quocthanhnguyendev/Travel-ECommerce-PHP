<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span>
        User Manager
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
            <h4 class="card-title">User</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>FULLNAME</th>
                    <th>AVATAR</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>GENDER</th>
                    <th>POINT</th>
                    <th>WATER</th>
                    <th>ROLE</th>
                    <th>DATE CREATED</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($result = $UserData->fetch()): ?>
                  <tr>
                    <td>
                      <b>#
                        <?php echo $result['user_id'] ?>
                      </b>
                    </td>

                    <td>
                      <?php echo $result['lastname'] . " " . $result['firstname'] ?>
                    </td>

                    <td>
                      <img src="Public/assets/images/avatar/<?php if (!empty($result['avatar'])) {
                          echo $result['avatar'];
                        } else {
                          echo "avatardefault.png";
                        } ?>" class="me-4" />
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

                    <td>
                      <?php if ($result['gender']) {
                          echo "Male";
                        } else {
                          echo "Female";
                        } ?>
                    </td>

                    <td>
                      <?php
                        echo $result['point'];
                        ?>
                    </td>

                    <td>
                      <?php echo $result['water'] ?>
                    </td>

                    <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1): ?>
                    <td>
                      <div class="input-group-prepend">
                        <button class="btn <?php
                            if ($result['role'] == 0) {
                              echo "btn-inverse-info";
                            } else if ($result['role'] == 1) {
                              echo "btn-inverse-success";
                            } else {
                              echo "btn-inverse-danger";
                            }
                            ?> dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">
                          <?php
                              if ($result['role'] == 0) {
                                echo "Member";
                              } else if ($result['role'] == 1) {
                                echo "Employee";
                              } else {
                                echo "Admin";
                              }
                              ?>
                        </button>
                        <div class="dropdown-menu">
                          <?php
                              if ($result['role'] == 0):
                                ?>
                          <a class="dropdown-item"
                            href="index.php?ctrl=admin&page=member&role=1&id=<?php echo $result['user_id']; ?>">Employee</a>
                          <a class="dropdown-item"
                            href="index.php?ctrl=admin&page=member&role=2&id=<?php echo $result['user_id']; ?>">Admin</a>
                          <?php
                              elseif ($result['role'] == 1):
                                ?>
                          <a class="dropdown-item"
                            href="index.php?ctrl=admin&page=member&role=0&id=<?php echo $result['user_id']; ?>">Member</a>
                          <a class="dropdown-item"
                            href="index.php?ctrl=admin&page=member&role=2&id=<?php echo $result['user_id']; ?>">Admin</a>
                          <?php
                              else:
                                ?>
                          <a class="dropdown-item"
                            href="index.php?ctrl=admin&page=member&role=0&id=<?php echo $result['user_id']; ?>">Member</a>
                          <a class="dropdown-item"
                            href="index.php?ctrl=admin&page=member&role=1&id=<?php echo $result['user_id']; ?>">Employee</a>
                          <?php
                              endif;
                              ?>
                        </div>
                      </div>
                    </td>
                    <?php else: ?>
                    <td>
                      <?php if ($result['role'] == 0): ?>
                      <label class='badge badge-gradient-info'>Member</label>
                      <?php elseif ($result['role'] == 1): ?>
                      <label class='badge badge-gradient-success'>Employee</label>
                      <?php else: ?>
                      <label class='badge badge-gradient-danger'>Admin</label>
                      <?php endif; ?>
                    </td>
                    <?php endif; ?>

                    <td>
                      <?php echo $format->DateTimeFormat($result['user_created']) ?>
                    </td>
                  </tr>

                  <?php endwhile; ?>
                </tbody>

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