<?php

Class Crud extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('model');
	}

	public function index(){
		$data['siswa'] = $this->model->view_siswa();
		$this->load->view('index', $data);


	}

	public function simpan_siswa(){
		if($this->model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah true
          $this->model->save(); // Panggil fungsi save() yang ada di SiswaModel.php
          // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
          $html = $this->load->view('view', array('siswa'=>$this->model->view_siswa()), true);
          $callback = array(
            'status'=>'sukses',
            'pesan'=>'Data berhasil disimpan',
            'html'=>$html
          );
        }else{
          $callback = array(
            'status'=>'gagal',
            'pesan'=>validation_errors()
          );
        }
        echo json_encode($callback);
	}

	public function ubah_siswa($id){
		if($this->model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah true
          $this->model->edit($id); // Panggil fungsi save() yang ada di SiswaModel.php
          // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
          $html = $this->load->view('view', array('siswa'=>$this->model->view_siswa()), true);
          $callback = array(
            'status'=>'sukses',
            'pesan'=>'Data berhasil disimpan',
            'html'=>$html
          );
        }else{
          $callback = array(
            'status'=>'gagal',
            'pesan'=>validation_errors()
          );
        }
        echo json_encode($callback);
	}

	public function hapus_siswa($id){
		$this->model->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
        // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
        $html = $this->load->view('view', array('siswa'=>$this->model->view_siswa()), true);
        $callback = array(
          'status'=>'sukses',
          'pesan'=>'Data berhasil dihapus',
          'html'=>$html
        );
        echo json_encode($callback);
	}
}