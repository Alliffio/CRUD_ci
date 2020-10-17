<table class="table table-striped table-bordered" style="width: 100%">
	<thead>
		<tr>
			<td>No</td>
			<td>Nama</td>
			<td>Kelas</td>
			<td>Alamat</td>
			<td>Tempat Lahir</td>
			<td colspan="2" class="text-center"> Action </td>
		</tr>
	</thead>
	<tbody>
		<?php
                $no = 1;
            foreach($siswa as $datas){
            ?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $datas->nama;?></td>
			<td><?php echo $datas->kelas;?></td>
			<td><?php echo $datas->alamat;?></td>
			<td><?php echo $datas->tempat_lahir;?></td>
			<td class="d-sm justify-content-between mb-4">
				  <a href="javascript:void();" data-id="<?php echo $datas->id; ?>" data-toggle="modal" data-target="#form-modal" class="btn btn-primary btn-form-ubah">Edit</a>
                      
	              <!-- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah -->
	              <input type="hidden" class="nama-value" value="<?php echo $datas->nama; ?>">
	              <input type="hidden" class="kelas-value" value="<?php echo $datas->kelas; ?>">
	              <input type="hidden" class="alamat-value" value="<?php echo $datas->alamat; ?>">
	              <input type="hidden" class="tempatlahir-value" value="<?php echo $datas->tempat_lahir; ?>">
	              
	            </td>

	            <td class="align-middle text-center">
	              <a href="javascript:void();" data-id="<?php echo $datas->id; ?>" data-toggle="modal" data-target="#delete-modal" class="btn btn-danger btn-alert-hapus">Delete</a>
	            </td>
		</tr>
		<?php
                  $no++; // Tambah 1 setiap kali looping
                }
                ?>
	</tbody>
</table>