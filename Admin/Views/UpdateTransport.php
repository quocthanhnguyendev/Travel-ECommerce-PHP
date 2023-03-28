<div class="main-panel w-100">
  <div class="content-wrapper d-block">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Update Transport</h4>
          <p class="card-description"> Category Manager</p>
          <form class="forms-sample" action="index.php?ctrl=admin&page=category&table=transport&action=update"
            enctype="multipart/form-data" method="post">

            <input type="hidden" name="idTransport" value="<?php echo $id; ?>">

            <div class=" form-group">
              <label for="exampleInputName1">Name Transport</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter name tourism"
                value="<?php echo $transportData['NAME_TRANSPORT'] ?>" name="name">
            </div>

            <div class=" form-group">
              <label for="exampleInputName1">Icon Transport</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter name tourism"
                value='<?php echo $transportData['ICON']; ?>' name="icon" />
            </div>

            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            <a href="index.php?ctrl=admin&page=category" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>