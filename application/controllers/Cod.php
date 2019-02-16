<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cod extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('id_pengguna')){
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible">
                <h4><center><i class="icon fa fa-warning"></i> Akses Ditolak</center></h4></div>');
			redirect('Login');
		}
	}

	public function index(){

		$data = array(
			"Cod" => $this->Crud_m->read('tbl_cod')->result()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/cod/cod', $data);
		$this->load->view('admin/footer');
	}

	public function Add(){
		$this->load->view('admin/header');
		$this->load->view('admin/cod/add');
		$this->load->view('admin/footer');
	}

	public function AddProses(){
		
		$data = array(
			"nama" => $this->input->post('nama'),
			"no_hp" => $this->input->post('no_hp')
		);

		$this->Crud_m->create('tbl_cod', $data);

		redirect('Cod');
	}

	public function Edit($id){
		$data = array(
			"cod" => $this->Crud_m->read('tbl_cod', array('id_cod' => $id))->row()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/cod/edit', $data);
		$this->load->view('admin/footer');
	}

	public function EditProses(){
		$data = array(
			"nama" => $this->input->post('nama'),
			"no_hp" => $this->input->post('no_hp')
		);

		$this->Crud_m->update('tbl_cod', $data, array('id_cod' => $this->input->post('id_cod')));

		redirect('cod');
	}

	public function hapus(){
		$id = $this->input->post("id");

		$tabel = "tbl_cod";
		$where = array("id_cod" => $id);

		//Hapus di database //
		$check = $this->Crud_m->delete($tabel,$where);
	}
}
