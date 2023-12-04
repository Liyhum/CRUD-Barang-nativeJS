<?php 
include "../koneksi.php";

$user_id = $_GET['user_id'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_user where user_id='$user_id'");
while ($r = mysqli_fetch_array($data)) {
?>
<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Edit Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">User ID</label>
                <input type="text" class="form-control" id="user_id_e" name="user_id_e" value="<?php echo $r['user_id']; ?>" readonly>
                <label for="">Username</label>
                <input type="text" class="form-control" id="username_e" name="username_e" value="<?php echo $r['username']; ?>">
                <label for="editPassword">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="editPassword" name="editPassword" value="<?php echo $r['password']; ?>">

                                <button class="btn btn-outline-secondary" type="button" onClick="togglePassword()">
                                    <i id="toggleIcon" class="fa fa-eye"></i>
                                </button>
                            </div>
                <label for="">Status</label>
                <select name="status_e" class="form-control" id="status_e">
                    <option <?php if ($r['status'] == 1){ echo 'selected'; } ?> value="1">Aktif</option>
                    <option <?php if ($r['status'] == 2){ echo 'selected'; } ?> value="2">Tidak Aktif</option>
                </select>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" id="btn_ubah" onClick="updateData()">Ubah</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<script src="formUser/user.js"></script>
