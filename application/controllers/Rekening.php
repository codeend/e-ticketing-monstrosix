<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

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
			"Rekening" => $this->Crud_m->read('tbl_rek')->result()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/rekening/rekening', $data);
		$this->load->view('admin/footer');
	}

	public function Add(){
		$this->load->view('admin/header');
		$this->load->view('admin/rekening/add');
		$this->load->view('admin/footer');
	}

	public function AddProses(){
		
		$data = array(
			"nama_bank" => $this->input->post('nama_bank'),
			"atas_nama" => $this->input->post('atas_nama'),
			"no_rek" => $this->input->post('no_rek')
		);

		$this->Crud_m->create('tbl_rek', $data);

		redirect('Rekening');
	}

	public function Edit($id){
		$data = array(
			"rekening" => $this->Crud_m->read('tbl_rek', array('id_rek' => $id))->row()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/rekening/edit', $data);
		$this->load->view('admin/footer');
	}

	public function EditProses(){
		$data = array(
			"nama_bank" => $this->input->post('nama_bank'),
			"atas_nama" => $this->input->post('atas_nama'),
			"no_rek" => $this->input->post('no_rek')
		);

		$this->Crud_m->update('tbl_rek', $data, array('id_rek' => $this->input->post('id_rek')));

		redirect('rekening');
	}

	public function hapus(){
		$id = $this->input->post("id");

		$tabel = "tbl_rek";
		$where = array("id_rek" => $id);

		//Hapus di database //
		$check = $this->Crud_m->delete($tabel,$where);
	}
}
