<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('id_pengguna')){
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible">
                <h4><center><i class="icon fa fa-warning"></i> Akses Ditolak</center></h4></div>');
			redirect('Login');
		}
	}

	public function index()
	{	
		$data = array(
			"pengguna" => $this->Crud_m->read('tbl_pengguna')->result()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/pengguna/pengguna', $data);
		$this->load->view('admin/footer');
	}

	public function Add(){
		$this->load->view('admin/header');
		$this->load->view('admin/pengguna/add');
		$this->load->view('admin/footer');	
	}

	public function AddProses(){
		if($this->input->post('password') != $this->input->post('repassword')){
			echo "<script>alert('Password Tidak Sama');</script>";
			redirect('Pengguna/Add');
		}else{
			$data = array(
				'nama_pengguna' => $this->input->post('nama_pengguna'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'create_date' => $this->input->post('create_date')
			);

			$this->Crud_m->create('tbl_pengguna', $data);

			redirect('Pengguna');
		}
	}

	public function Edit($id){
		$data = array(
			"pengguna" => $this->Crud_m->read('tbl_pengguna', array('id_pengguna' => $id))->row()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/pengguna/edit', $data);
		$this->load->view('admin/footer');
	}

	public function EditProses(){
		if(!empty($this->input->post('password')) ||  !empty($this->input->post('repassword'))){
			if($this->input->post('password') != $this->input->post('repassword')){
				echo "<script>alert('Password Tidak Sama');</script>";
				redirect('Pengguna/Edit/'.$this->input->post('id_pengguna'));
			}else{
				$data = array(
					'nama_pengguna' => $this->input->post('nama_pengguna'),
					'no_telp' => $this->input->post('no_telp'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'create_date' => $this->input->post('create_date')
				);
			}
		}else{
			$data = array(
				'nama_pengguna' => $this->input->post('nama_pengguna'),
				'no_telp' => $this->input->post('no_telp'),
				'email' => $this->input->post('email'),
				'create_date' => $this->input->post('create_date')
			);
		}

		$this->Crud_m->update('tbl_pengguna', $data, array('id_pengguna' => $this->input->post('id_pengguna')));

		redirect('Pengguna');
	}

	public function hapus(){
		$id = $this->input->post("id");

		$tabel = "tbl_pengguna";
		$where = array("id_pengguna" => $id);

		//Hapus di database //
		$check = $this->Crud_m->delete($tabel,$where);
	}

}
