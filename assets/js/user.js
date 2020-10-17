var id = 0

$(document).ready(function(){
	$('#loading-ubah, #pesan-sukses, #pesan-error').hide()

	// Fungsi ini akan dipanggil ketika tombol edit diklik
	$('#view').on('click', '.btn-form-ubah', function(){
    id = $(this).data('id') 
    
    // Set judul modal dialog menjadi Form Ubah Data
    $('#modal-title').html('Form Ubah data')
    var tr = $(this).closest('tr') 
    var nik = tr.find('.nik-value').val() 
    var nama = tr.find('.nama-value').val() 
    var username = tr.find('.username-value').val() 
    var password = tr.find('.password-value').val() 
    var telp = tr.find('.telepon-value').val() 
    $('#nik').val(nik) 
    $('#nama').val(nama) 
    $('#username').val(username)
    $('#password').val(password) 
    $('#telp').val(telp) 
  })
	
	// Fungsi ini akan dipanggil ketika tombol hapus diklik
  $('#view').on('click', '.btn-alert-hapus', function(){ 
    id = $(this).data('id')
  })

	// $('#btn-tambah').click(function(){
	// 	$('#btn-simpan').show()

	// 	$('#btn-ubah').hide()

	// 	$('#modal-title').html('Form Simpan Data')

	// })

	// $('#btn-simpan').click(function(){
	// 	$('#loading-simpan').show()

	// 	$.ajax({
	// 		url: base_url + 'dashboard/simpan_petugas',
	// 		type: 'POST',
	// 		data: $("#form-modal form").serialize(),
	// 		dataType: 'json',
	// 		beforeSend: function(e) {
	// 			if (e && e.overrideMimeType) {
	// 				e.overrideMimeType('application/jsoncharset=UTF-8')
	// 			}
	// 		},
	// 		success: function(response){
	// 			$('#loading-simpan').hide()

	// 			if (response.status == 'sukses') {
	// 				$('#view').html(response.html)

	// 				$('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut()

	// 				$('#form-modal').modal('hide')
	// 			}else{
	// 				$('#pesan-error').html(response.pesan).show()
	// 			}
	// 		}
	// 	})
	// })
	$('#btn-ubah').click(function(){ // Ketika tombol ubah di klik
	    $('#loading-ubah').show() // Munculkan loading ubah
	    
	    $.ajax({
	      url: base_url + 'dashboard/ubah_masyarakat/' + id, // URL tujuan
	      type: 'POST', // Tentukan type nya POST atau GET
	      data: $("#form-modal form").serialize(), // Ambil semua data yang ada didalam tag form
	      dataType: 'json',
	      beforeSend: function(e) {
	        if(e && e.overrideMimeType) {
	          e.overrideMimeType('application/jsoncharset=UTF-8')
	        }
	      },
	      success: function(response){ // Ketika proses pengiriman berhasil
	        $('#loading-ubah').hide() // Sembunyikan loading ubah
		        if(response.status == 'sukses'){ // Jika Statusnya = sukses
		          // Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
		          $('#view').html(response.html)
		          /*
		          * Ambil pesan suksesnya dan set ke div pesan-sukses
		          * Lalu munculkan div pesan-sukes nya
		          * Setelah 10 detik, sembunyikan kembali pesan suksesnya
		          */
		          $('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut()
		          $('#form-modal').modal('hide') // Close / Tutup Modal Dialog
		        }else{ // Jika statusnya = gagal
		          /*
		          * Ambil pesan errornya dan set ke div pesan-error
		          * Lalu munculkan div pesan-error nya
		          */
		          $('#pesan-error').html(response.pesan).show()
		        }
	        }
	    })
    })
    $('#btn-hapus').click(function(){ // Ketika tombol hapus di klik
    $('#loading-hapus').show() // Munculkan loading hapus
    $.ajax({
      url: base_url + 'dashboard/hapus_masyarakat/' + id, // URL tujuan
      type: 'GET', // Tentukan type nya POST atau GET
      dataType: 'json',
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType('application/jsoncharset=UTF-8')
        }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
        $('#loading-hapus').hide() // Sembunyikan loading hapus
        // Ganti isi dari div view dengan view yang diambil dari proses_hapus.php
        $('#view').html(response.html)
        /*
        * Ambil pesan suksesnya dan set ke div pesan-sukses
        * Lalu munculkan div pesan-sukes nya
        * Setelah 10 detik, sembunyikan kembali pesan suksesnya
        */
        $('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut()
        $('#delete-modal').modal('hide') // Close / Tutup Modal Dialog
      }
    })
  })
    $('#form-modal').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
    $('#form-modal input, #form-modal select, #form-modal textarea').val('') // Clear inputan menjadi kosong
  })
})