<div class="main-panel w-100">
  <div class="content-wrapper d-block">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Insert New Transport</h4>
          <p class="card-description"> Category Manager</p>
          <form class="forms-sample" action="index.php?ctrl=admin&page=category&table=transport&action=insert"
            enctype="multipart/form-data" method="post">

            <div class=" form-group">
              <label for="exampleInputName1">Name Transport</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter name tourism"
                name="name">
            </div>

            <div class=" form-group">
              <label for="exampleInputName1">Icon Transport</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter name tourism"
                name="icon">
            </div>

            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            <a href="index.php?ctrl=admin&page=category" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>