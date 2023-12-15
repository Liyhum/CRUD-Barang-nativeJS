<?php include 'partial/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="userCount"></h3>
                <p>Pengguna</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="itemCount"></h3>
                <p>Jumlah Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="incomingCount"></h3>
                <p>Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="outgoingCount"></h3>
                <p>Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="assets/AdminLTE/#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Chart data barang
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div id="chart" style="max-height: 200px;"></div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      loadData();
    });

    function loadData() {
      $.ajax({
        url: "getData.php",
        type: "get",
        dataType: "json", // Tambahkan dataType untuk memberi tahu jQuery bahwa respons adalah JSON
        success: function(data) {
          // Setelah data diambil, panggil fungsi fillDataToCards untuk mengisi card dengan data yang diambil
          fillDataToCards(data);

          // Ambil data barang masuk dan keluar dari database
          $.ajax({
            url: "getChartData.php", // Gantilah dengan nama file yang sesuai
            type: "get",
            dataType: "json",
            success: function(chartData) {
              buildApexChart(chartData);
            },
            error: function(xhr, status, error) {
              console.error("Error while fetching chart data:", error);
            },
          });
        },
        error: function(xhr, status, error) {
          console.error("Error while fetching data:", error);
        },
      });
    }

    function fillDataToCards(data) {
      document.getElementById("userCount").innerText = data.userData;
      document.getElementById("itemCount").innerText = data.itemCountData;
      document.getElementById("incomingCount").innerText = data.incomingData;
      document.getElementById("outgoingCount").innerText = data.outgoingData;
    }

    function buildApexChart(chartData) {
      // Gunakan chartData untuk membangun grafik ApexCharts
      var options = {
        chart: {
          height: 350,
          type: 'bar'
        },
        series: [{
            name: 'Barang Masuk',
            data: chartData.masuk
          },
          {
            name: 'Barang Keluar',
            data: chartData.keluar
          }
        ],
        xaxis: {
          categories: chartData.categories
        },
        yaxis: {
          title: {
            text: 'Jumlah'
          }
        },
        title: {
          text: 'Grafik Barang Masuk dan Keluar'
        },
        legend: {
          position: 'top'
        }
      };

      var chart = new ApexCharts(document.getElementById('chart'), options);
      chart.render();
    }
  </script>
  <?php include 'partial/footer.php'; ?>