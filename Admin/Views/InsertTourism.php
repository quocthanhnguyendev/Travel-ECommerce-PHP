<div class="main-panel w-100">
  <div class="content-wrapper d-block">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Insert New Tourism</h4>
          <p class="card-description"> Tourism Manager</p>
          <form class="forms-sample" action="index.php?ctrl=admin&page=tourism&act=insert" enctype="multipart/form-data"
            method="post">
            <div class=" form-group">
              <label for="exampleInputName1">Name Tourism</label>
              <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter name tourism"
                name="name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Price Tourism</label>
              <input type="number" class="form-control" id="exampleInputEmail3" placeholder="Enter price tourism"
                name="price">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4">Price Sale</label>
              <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Enter price sale"
                name="sale">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword4">Quatity</label>
              <input type="number" class="form-control" id="exampleInputPassword4" placeholder="Enter quatity tourism"
                name="quatity">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword4">Start Date</label>
              <input type="date" class="form-control" id="exampleInputPassword4" name="startdate">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword4">End Date</label>
              <input type="date" class="form-control" id="exampleInputPassword4" name="enddate">
            </div>

            <div class="form-group">
              <label for="exampleSelectGender">Transport</label>
              <select class="form-control" id="exampleSelectGender" name="transport">
                <?php while ($result = $transportData->fetch()): ?>
                  <option value="<?php echo $result['ID_TRANSPORT'] ?>"><?php echo $result['NAME_TRANSPORT'] ?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleSelectGender">Country</label>
              <select class="form-control" id="exampleSelectGender" name="country">
                <?php while ($result = $countryData->fetch()): ?>
                  <option value="<?php echo $result['ID_COUNTRY'] ?>"><?php echo $result['NAME_COUNTRY'] ?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleSelectGender">Trending</label>
              <select class="form-control" id="exampleSelectGender" name="trending">
                <option value="0">Normal</option>
                <option value="1">Trending</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleTextarea1">Description</label>
              <textarea class="form-control" name="desc" id="exampleTextarea1" rows="4"></textarea>
            </div>

            <div class="form-group">
              <label class="form-label" for="customFile">Image Tourism</label>
              <input type="file" name="image" class="form-control" id="customFile" />
            </div>

            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            <a href="index.php?ctrl=admin&page=tourism" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>