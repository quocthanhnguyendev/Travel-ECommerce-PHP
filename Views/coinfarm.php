<style>
  .main {
    height: 100%;
    position: relative;
    background: url('Public/assets/images/covercf2.jpg') no-repeat;
    width: 100%;
    height: 600px;
    background-size: 100%;
  }

  .image-tree-4 {
    position: absolute;
    width: 20%;
    top: 25%;
    left: 40%;
  }

  .image-tree-3 {
    position: absolute;
    width: 20%;
    top: 25%;
    left: 40%;
  }

  .image-tree-2 {
    position: absolute;
    width: 16%;
    top: 40%;
    left: 42%;
  }

  .image-tree-1 {
    position: absolute;
    width: 12%;
    top: 69%;
    left: 44%;
  }

  .image-tree-0 {
    position: absolute;
    width: 15%;
    top: 65%;
    left: 42%;
  }

  .btn-drill {
    position: absolute;
    top: 45 %;
    left: 45%;
    fontsite
  }
</style>
<section class="h-100 h-custom">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-12">
                <form action="index.php?ctrl=tourist&act=bookingpackage&param=update" method="post">
                  <div class="d-flex justify-content-between shadow-bottom align-items-center text-center p-4">
                    <h1 class="fw-bold mb-0 text-info" style="font-size: 50px;"><span style="color: black;">Coin</span>
                      Farm</h1>

                    <h6 class="mb-0 text-muted">
                      <?php
                      if (isset($_SESSION['auth']['water'])) {
                        echo $_SESSION['auth']['water'];
                      }
                      ?> Water
                    </h6>
                  </div>
                  <div class="main">
                    <?php
                    if (!empty($TreeData)):
                      if ($TreeData['level_tree'] == 4):
                        ?>
                        <img src="Public/assets/images/treelv4.png" class="image-tree-4" style="" alt="" srcset="">
                      <?php elseif ($TreeData['level_tree'] == 3): ?>
                        <img src="Public/assets/images/treelv3.png" class="image-tree-3" style="" alt="" srcset="">
                      <?php elseif ($TreeData['level_tree'] == 2): ?>
                        <img src="Public/assets/images/treelv2.png" class="image-tree-2" style="" alt="" srcset="">
                      <?php elseif ($TreeData['level_tree'] == 1): ?>
                        <img src="Public/assets/images/treelv1.png" class="image-tree-1" style="" alt="" srcset="">
                        <?php
                      endif;
                    endif;

                    ?>

                    <?php if (empty($TreeData)): ?>
                      <img src="Public/assets/images/treelv0.png" class="image-tree-0" style="" alt="" srcset="">
                    <?php endif; ?>

                    <?php
                    if (!empty($TreeData)):
                      $process = round((300 - $TreeData['water_tree']) / (300 / 100), 1);
                      ?>
                      <div class="progress" style="height: 20px;">
                        <div class="progress-bar bg-info fs-5" role="progressbar" style="width: <?php echo $process; ?>%;"
                          aria-valuenow="<?php echo $process; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $process; ?>%</div>
                      </div>
                    <?php endif; ?>

                    <?php if (empty($TreeData)): ?>
                      <div class="main-button text-center" style="position: absolute; top: 40%; left: 44%">
                        <a href="index.php?ctrl=coinfarm&act=drills&userid=<?php echo $_SESSION['auth']['user_id'] ?>">Gieo
                          Hạt</a>
                      </div>
                    <?php endif; ?>

                    <?php
                    if (!empty($TreeData)):
                      if ($TreeData['level_tree'] == 4):
                        ?>
                        <div class="main-button text-center" style="position: absolute; top: 15%; left: 44%">
                          <a href="index.php?ctrl=coinfarm&act=harvest&userid=<?php echo $_SESSION['auth']['user_id'] ?>">Thu
                            Hoạch</a>
                        </div>
                        <?php
                      endif;
                    endif;
                    ?>

                    <?php
                    if (!empty($TreeData)):
                      if ($TreeData['level_tree'] != 4 || $TreeData['water_tree'] != 0):
                        ?>
                        <a href="index.php?ctrl=coinfarm&act=waterthetrees&userid=<?php echo $_SESSION['auth']['user_id'] ?>&water=<?php if (isset($_SESSION['auth']['water'])) {
                             if ($_SESSION['auth']['water'] >= 25) {
                               echo 25;
                             } else {
                               echo $_SESSION['auth']['water'];
                             }
                           } ?>" style="position: absolute; width: 10%; top: 20px; right: 20px">
                          <img src="Public/assets/images/watertree.png" style="" alt="" srcset=""></a>
                        <span class="badge rounded-pill bg-info" style="position: absolute; top: 40px; right: 50px">
                          <?php
                          if (isset($_SESSION['auth']['water'])) {
                            if ($_SESSION['auth']['water'] >= 25) {
                              echo 25;
                            } else {
                              echo $_SESSION['auth']['water'];
                            }
                          } else {
                            echo 25;
                          }
                          ?>
                        </span>

                        <?php
                      endif;
                    endif;

                    ?>
                  </div>



                  <div class="p-4">
                    <h6 class="mb-0"><a href="index.php?ctrl=home" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to home</a></h6>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>