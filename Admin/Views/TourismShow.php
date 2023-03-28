<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span>
        Tourism Manager
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
            <h4 class="card-title">Tourism</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1) : ?>
                      <th>ACTION</th>
                    <?php endif; ?>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>PRICE</th>
                    <th>SALE</th>
                    <th>DATE START</th>
                    <th>DATE END</th>
                    <th>DESCRIPTION</th>
                    <th>QUATITY</th>
                    <th>COUNTRY</th>
                    <th>TRENDING</th>
                    <th>VIEWS</th>
                    <th>TRANSPORT</th>
                    <th>DATE CREATED</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($result = $tourData->fetch()) : ?>
                    <tr>
                      <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1) : ?>
                        <td>
                          <a href="index.php?ctrl=admin&page=tourism&act=delete&id=<?php echo $result['ID_TOUR']; ?>"><i class="mdi mdi-trash-can fs-3 text-danger"></i></a>
                          <a href="index.php?ctrl=admin&page=tourism&act=update&id=<?php echo $result['ID_TOUR']; ?>"><i class="mdi mdi-repeat fs-3 text-success"></i></a>
                        </td>
                      <?php endif; ?>
                      <td>
                        <b>#
                          <?php echo $result['ID_TOUR'] ?>
                        </b>
                      </td>

                      <td>
                        <?php echo $result['NAME_TOUR'] ?>
                      </td>

                      <td>
                        <img style="width: 100%; height: 100%; border-radius: 10px; object-fit: cover;" src="Public/assets/images/<?php echo $result['IMAGE_TOUR']; ?>" class="me-4" />
                      </td>

                      <td>
                        <?php echo $format->Currency($result['PRICE_TOUR']) ?>
                      </td>

                      <td>
                        <?php echo $format->Currency($result['SALE']) ?>
                      </td>

                      <td>
                        <?php echo $format->DateFormat($result['START_DATE']) ?>
                      </td>

                      <td>
                        <?php echo $format->DateFormat($result['END_DATE']) ?>
                      </td>

                      <td>
                        <textarea style="border: none;" disabled cols="50" rows="5"><?php echo $result['DESCRIPTION'] ?></textarea>
                      </td>

                      <td>
                        <?php echo $result['QUATITY'] ?>
                      </td>

                      <td>
                        <?php echo $result['NAME_COUNTRY'] ?>
                      </td>

                      <td>
                        <?php
                        if ($result['TRENDING'] == true) {
                          echo "<label class='badge badge-gradient-danger'>Trending</label>";
                        } else {
                          echo "<label class='badge badge-gradient-info'>Normal</label>";
                        }
                        ?>
                      </td>

                      <td>
                        <?php echo $result['VIEWS'] ?>
                      </td>

                      <td>
                        <div>
                          <?php echo $result['NAME_TRANSPORT'] ?>
                        </div>
                      </td>

                      <td>
                        <?php echo $format->DateTimeFormat($result['CREATED_DATE']) ?>
                      </td>

                    </tr>

                  <?php endwhile; ?>
                </tbody>
                <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1) : ?>
                  <span class="text-end">
                    <a href="index.php?ctrl=admin&page=tourism&act=deleteall" style="color: inherit; text-decoration: none"><span class="btn btn-inverse-danger w-25">Delete
                        All</span>
                    </a>
                  </span>
                  <span class="text-end">
                    <a href="index.php?ctrl=admin&page=tourism&act=insert" style="color: inherit; text-decoration: none"><span class="btn btn-inverse-success w-25">Insert
                        Tourism</span></a>
                  </span>
                <?php endif; ?>
              </table>
            </div>
          </div>
          <span class="text-end m-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-inverse-primary w-auto" data-mdb-toggle="modal" data-mdb-target="#exampleModaltransport">
              Upload CSV
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModaltransport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Transport</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="index.php?ctrl=admin&page=tourism&act=uploadcsv" enctype="multipart/form-data" method="post">

                    <div class="modal-body">
                      <div class="form-group">
                        <label class="form-label" for="customFile">CSV File</label>
                        <input type="file" name="csvfile" class="form-control" id="customFile" />
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Upload Now</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </span>
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
        <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
          template</a>
        from Bootstrapdash.com</span>
    </div>
  </footer>
  <!-- partial -->
</div>