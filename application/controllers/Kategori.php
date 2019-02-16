<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
			"kategori" => $this->Crud_m->read('tbl_kategori')->result()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/kategori/kategori', $data);
		$this->load->view('admin/footer');
	}

	public function Add(){
		$this->load->view('admin/header');
		$this->load->view('admin/kategori/add');
		$this->load->view('admin/footer');
	}

	public function AddProses(){
		
		$data = array(
			"nama_kategori" => $this->input->post('nama_kategori'),
			"deskripsi" => $this->input->post('deskripsi'),
			"harga" => str_replace(['Rp. ','.'], '', $this->input->post('harga')),
			"kapasitas" => $this->input->post('kapasitas'),
			"create_date" => $this->input->post('create_date')
		);

		$this->Crud_m->create('tbl_kategori', $data);

		redirect('Kategori');
	}

	public function Edit($id){
		$data = array(
			"kategori" => $this->Crud_m->read('tbl_kategori', array('id_kategori' => $id))->row()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/kategori/edit', $data);
		$this->load->view('admin/footer');
	}

	public function EditProses(){
		$data = array(
			"nama_kategori" => $this->input->post('nama_kategori'),
			"deskripsi" => $this->input->post('deskripsi'),
			"harga" => str_replace(['Rp. ','.'], '', $this->input->post('harga')),
			"kapasitas" => $this->input->post('kapasitas'),
			"create_date" => $this->input->post('create_date')
		);

		$this->Crud_m->update('tbl_kategori', $data, array('id_kategori' => $this->input->post('id_kategori')));

		redirect('Kategori');
	}

	public function hapus(){
		$id = $this->input->post("id");

		$tabel = "tbl_kategori";
		$where = array("id_kategori" => $id);

		//Hapus di database //
		$check = $this->Crud_m->delete($tabel,$where);
	}
}
