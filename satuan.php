
<?php include 'partial/header.php';?>
<!-- <?php include 'formSatuan/modal_add.php'?> -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Master Satuan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Master Satuan</li>
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
                <h3 class="card-title">Data Master Satuan</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group">
                <button class="btn btn-info btn-sm" id="btn_add_satuan">Add Data</button>
                
              </div>
                <table id="tabel" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Satuan</th>
                    <th>Satuan</th>
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
    </section>
    <!-- /.content -->
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- untuk mencari no urut / id satuan auto -->
<div id="konten"></div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include 'partial/footer.php';?>
  <script src="./assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="formSatuan/satuan.js"></script>
