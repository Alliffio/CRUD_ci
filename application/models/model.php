<?php

Class Model extends CI_Model{
	public function view_siswa(){
		return $this->db->get('siswa')->result();
	}

	public function validation($mode){
    $this->load->library('form_validation');

	    if($mode == "save")
	      $this->form_validation->set_rules('name', 'Nama', 'required|max_length[50]');
	  	$this->form_validation->set_rules('class', 'Kelas', 'required|max_length[50]');
	  	$this->form_validation->set_rules('address', 'Alamat', 'required');
	  	$this->form_validation->set_rules('birth', 'Tempat Lahir', 'required|max_length[50]');
	    
	    if($this->form_validation->run())
	      return true;
	    else
	      return false;
 	}

 	public function save(){
        $data = array(
          'nama' => $this->input->post('name'),
          'kelas' => $this->input->post('class'),
          'alamat' => $this->input->post('address'),
          'tempat_lahir' => $this->input->post('birth'),

        );
        $this->db->insert('siswa', $data);
    }

    public function edit($id){
        $data = array(
          'nama' => $this->input->post('name'),
          'kelas' => $this->input->post('class'),
          'alamat' => $this->input->post('address'),
          'tempat_lahir' => $this->input->post('birth'),

        );
        $this->db->where('id', $id);
        $this->db->update('siswa', $data);
    }

     public function delete($id){
	    $this->db->where('id', $id);
	    $this->db->delete('siswa');
	}
}