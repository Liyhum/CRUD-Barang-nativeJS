<?php include 'partial/header.php'; ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jenis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Jenis</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Jenis</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                    <button class="btn btn-info btn-sm" id="btn_add">Add Data</button>
                </div>
                <table id="tabel" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Jenis</th>
                    <th>Jenis</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
<div id="konten"></div>
<?php include 'partial/footer.php'; ?>
<script src="formJenis/jenis.js"></script>
