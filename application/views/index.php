<!DOCTYPE html>
<html>
<head>
	<title>CRUD AJAX</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
	<script>
		var base_url = '<?= base_url()?>';
	</script>
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				Crud AJAX
			</div>

			<div class="card-body">
				<a href="#" style="float: right;" class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm" data-toggle="modal" data-target="#form-modal" id="btn-tambah"><i class="fas fa-plus fa-sm text-50"></i> Tambah Data</a>

				<div id="pesan-sukses" class="alert alert-success" style="margin: 10px 20px;"></div>

				<div id="view" style="margin: 10px 20px;">
					<?php $this->load->view('view', array('siswa'=>$siswa));?>
				</div>
			</div>

		</div>
	</div>

<div class="modal fade" id="form-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <span id="modal-title"></span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="pesan-error" class="alert alert-danger"></div>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input type="text" class="form-control" id="nama" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="class">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Alamat</label>
                    <textarea class="form-control" id="alamat" name="address" rows="6"> </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempatlahir" name="birth">
                </div>
                </form>
                
          </div>
      <div class="modal-footer">
        <div id="loading-simpan" class="pull-left">
          <b>Sedang menyimpan...</b>
        </div>
        <div id="loading-ubah" class="pull-left">
          <b>Sedang mengubah...</b>
        </div>
        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
        <button type="submit" class="btn btn-primary" id="btn-ubah">Ubah</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="delete-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <!-- Beri id "btn-hapus" untuk tombol hapus nya -->
                    <button type="button" class="btn btn-primary" id="btn-hapus">Ya</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>

 <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url("assets/vendor/jquery/jquery.min.js") ?>"></script>
  <script src="<?= base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url("assets/vendor/jquery-easing/jquery.easing.min.js") ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url("assets/js/sb-admin-2.min.js") ?>"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url("assets/vendor/chart.js/Chart.min.js") ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url("assets/js/demo/chart-area-demo.js") ?>"></script>
  <script src="<?= base_url("assets/js/demo/chart-pie-demo.js") ?>"></script>
  <script src="<?= base_url("assets/js/custom.js") ?>"></script>

</body>
</html>