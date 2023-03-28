<div class="main-panel">
   <div class="content-wrapper">
      <div class="page-header">
         <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
               <i class="mdi mdi-home"></i>
            </span>
            Category Manager
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
         <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">COUNTRY</h4>
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
                              <th>DATE CREATED</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php while ($result = $countryData->fetch()) : ?>
                           <tr>
                              <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1) : ?>
                              <td>
                                 <a
                                    href="index.php?ctrl=admin&page=category&table=country&action=delete&id=<?php echo $result['ID_COUNTRY']; ?>"><i
                                       class="mdi mdi-trash-can fs-3 text-danger"></i></a>
                                 <a
                                    href="index.php?ctrl=admin&page=category&table=country&action=update&id=<?php echo $result['ID_COUNTRY']; ?>"><i
                                       class="mdi mdi-repeat fs-3 text-success"></i></a>
                              </td>
                              <?php endif; ?>
                              <td>
                                 <b>
                                    <?php echo "#" . $result['ID_COUNTRY']; ?>
                                 </b>
                              </td>
                              <td>
                                 <?php echo $result['NAME_COUNTRY']; ?>
                              </td>
                              <td>
                                 <img style="width: 100%; height: 100%; border-radius: 10px; object-fit: cover;"
                                    src="Public/assets/images/<?php echo $result['IMAGE_COUNTRY']; ?>" class="me-4" />
                              </td>
                              <td>
                                 <?php echo $format->DateTimeFormat($result['CREATED']); ?>
                              </td>
                           </tr>
                           <?php endwhile; ?>
                        </tbody>
                        <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1) : ?>
                        <div class="mb-3">
                           <span class="text-end">
                              <a href="index.php?ctrl=admin&page=category&table=country&action=deleteall"
                                 style="color: inherit; text-decoration: none"><span
                                    class="btn btn-inverse-danger w-auto">Delete
                                    All</span>
                              </a>
                           </span>
                           <span class="text-end">
                              <a href="index.php?ctrl=admin&page=category&table=country&action=insert"
                                 style="color: inherit; text-decoration: none"><span
                                    class="btn btn-inverse-success w-auto">Insert
                                    Country</span></a>
                           </span>
                        </div>
                        <?php endif; ?>
                     </table>
                  </div>
               </div>

               <span class="text-end m-2">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-inverse-primary w-auto" data-mdb-toggle="modal"
                     data-mdb-target="#exampleModal">
                     Upload CSV
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Upload Country</h5>
                              <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                 aria-label="Close"></button>
                           </div>
                           <form action="index.php?ctrl=admin&page=category&table=country&action=uploadcsv"
                              enctype="multipart/form-data" method="post">

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
         <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">TRANSPORT</h4>
                  <div class="table-responsive">
                     <table class="table">
                        <thead>
                           <tr>
                              <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1) : ?>
                              <th>ACTION</th>
                              <?php endif; ?>
                              <th>ID</th>
                              <th>NAME</th>
                              <th>ICON</th>
                              <th>DATE CREATED</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php while ($result = $transportData->fetch()) : ?>
                           <tr>
                              <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1) : ?>
                              <td>
                                 <a
                                    href="index.php?ctrl=admin&page=category&table=transport&action=delete&id=<?php echo $result['ID_TRANSPORT']; ?>"><i
                                       class="mdi mdi-trash-can fs-3 text-danger"></i></a>
                                 <a
                                    href="index.php?ctrl=admin&page=category&table=transport&action=update&id=<?php echo $result['ID_TRANSPORT']; ?>"><i
                                       class="mdi mdi-repeat fs-3 text-success"></i></a>
                              </td>
                              <?php endif; ?>

                              <td>
                                 <b>
                                    <?php echo "#" . $result['ID_TRANSPORT']; ?>
                                 </b>
                              </td>
                              <td>
                                 <?php echo $result['NAME_TRANSPORT']; ?>
                              </td>
                              <td>
                                 <?php echo $result['ICON']; ?>
                              </td>
                              <td>
                                 <?php echo $format->DateTimeFormat($result['CREATED']); ?>
                              </td>
                           </tr>
                           <?php endwhile; ?>

                        </tbody>
                        <?php if ($_SESSION['auth']['role'] != 0 && $_SESSION['auth']['role'] != 1) : ?>
                        <div class="mb-3">
                           <span class="text-end">
                              <a href="index.php?ctrl=admin&page=category&table=transport&action=deleteall"
                                 style="color: inherit; text-decoration: none"><span
                                    class="btn btn-inverse-danger w-auto">Delete
                                    All</span>
                              </a>
                           </span>

                           <span class="text-end">
                              <a href="index.php?ctrl=admin&page=category&table=transport&action=insert"
                                 style="color: inherit; text-decoration: none"><span
                                    class="btn btn-inverse-success w-auto">Insert
                                    Transport</span></a>
                           </span>

                        </div>
                        <?php endif; ?>
                     </table>
                  </div>
               </div>
               <span class="text-end m-2">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-inverse-primary w-auto" data-mdb-toggle="modal"
                     data-mdb-target="#exampleModaltransport">
                     Upload CSV
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModaltransport" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Upload Transport</h5>
                              <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                 aria-label="Close"></button>
                           </div>
                           <form action="index.php?ctrl=admin&page=category&table=transport&action=uploadcsv"
                              enctype="multipart/form-data" method="post">

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
</div>