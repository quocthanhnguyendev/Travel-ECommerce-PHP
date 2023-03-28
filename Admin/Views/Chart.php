<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span>
        Chart

      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">

          </li>
        </ul>
      </nav>
    </div>


    <div class="mb-5">
      <form action="" method="post" class="d-flex flex-row">
        <select class="form-control" id="exampleSelectGender" name="month" class="d-inline">
          <option value="" disabled selected>Tháng</option>
          <option value="0">Tất cả</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select>

        <select class="form-control" id="exampleSelectGender" name="year" class="d-inline">
          <option value="" disabled selected>Năm</option>
          <option value="0">Tất cả</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>

        </select>

        <button type="submit" class="btn btn-inverse-danger w-25">Xem</button>
      </form>
    </div>




    <div class="row">
      <div class="col-md-6 grid-margin stretch-card" id="chart_div">
        <div class="card">
          <div class="card-body">
            <div class="clearfix">
              <h4 class="card-title float-left">
                Visit And Sales Statistics
              </h4>
              <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right">
              </div>
            </div>
            <canvas id="visit-sale-chart" class="mt-4"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card" id="chartLogout">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Traffic Sources</h4>
            <canvas id="traffic-chart"></canvas>
            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', { 'packages': ['corechart'] });
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Chart Tourism Order Login
      var dataMember = new google.visualization.DataTable();
      var rows = new Array()


      <?php

      while ($item = $resultLogin->fetch()) {
        echo "rows.push(['" . $item['tourism_name'] . "'," . $item['number_booking'] . "]);";
      }
      ?>

      // Create columns for the DataTable
      dataMember.addColumn('string', "Tên Chuyến Du Lịch");
      dataMember.addColumn('number', 'Số Lượng đặt chuyến du lịch');
      // Create Rows with dataMember
      dataMember.addRows(rows
      );
      //Create option for chart
      var optionsMember = {
        title: 'THỐNG KÊ CÁC CHUYẾN DU LỊCH ĐÃ ĐƯỢC ĐẶT CỦA THÀNH VIÊN',
        "is3D": true
      };

      // Instantiate and draw our chart, passing in some options.
      var chartMember = new google.visualization.PieChart(document.getElementById('chart_div'));
      chartMember.draw(dataMember, optionsMember);
      // End Chart Tourism Order Login


      // Chart Tourism Order Logout
      var dataUser = new google.visualization.DataTable();
      var rowsUser = new Array()


      <?php
      while ($item = $resultLogout->fetch()) {
        echo "rowsUser.push(['" . $item['tourism_name'] . "'," . $item['number_booking'] . "]);";
      }
      ?>


      // Create columns for the DataTable
      dataUser.addColumn('string');
      dataUser.addColumn('number', 'Devices');
      // Create Rows with dataUser
      dataUser.addRows(rowsUser
      );
      //Create option for chart
      var optionsUser = {
        title: 'THỐNG KÊ CÁC CHUYẾN DU LỊCH ĐÃ ĐƯỢC ĐẶT CỦA KHÁCH HÀNG',
        "is3D": true
      };
      var chartUser = new google.visualization.PieChart(document.getElementById('chartLogout'));
      chartUser.draw(dataUser, optionsUser);
      // End Tourism Order Logout

    }
  </script>


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