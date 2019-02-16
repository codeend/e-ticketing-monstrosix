<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merch extends CI_Controller {

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
			"Merch" => $this->Crud_m->read('tbl_merch')->result()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/merch/merch', $data);
		$this->load->view('admin/footer');
	}

	public function Add(){
		$this->load->view('admin/header');
		$this->load->view('admin/merch/add');
		$this->load->view('admin/footer');
	}

	public function AddProses(){
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $_FILES['upload']['name'];
		if($gambar != ''){
			$namagambar = str_replace(' ', '-', date("YmdHis"));
			$config['upload_path'] = './temp/merch/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '4096';
			$config['file_name'] = $namagambar;
			$this->load->library('upload',$config);
			$this->upload->do_upload('upload');
			$upload_gambar = $this->upload->data();
			$finalgambar = $upload_gambar['file_name'];

			$data = array(
				'deskripsi' => $deskripsi,
				'foto' => $finalgambar
			);

			$this->Crud_m->create('tbl_merch', $data);
			redirect('Merch');
		}else{
			$data = array(
				'deskripsi' => $deskripsi,
				'foto' => ''
			);
			$this->Crud_m->create('tbl_merch', $data);
			redirect('Merch');
		}
	}

	public function Edit($id){
		$data = array(
			"Merch" => $this->Crud_m->read('tbl_merch', array('id_merch' => $id))->row()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/merch/edit', $data);
		$this->load->view('admin/footer');
	}

	public function EditProses(){
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $_FILES['upload']['name'];
		if($gambar != ''){
			$namagambar = str_replace(' ', '-', date("YmdHis"));
			$config['upload_path'] = './temp/merch/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '4096';
			$config['file_name'] = $namagambar;
			$this->load->library('upload',$config);
			$this->upload->do_upload('upload');
			$upload_gambar = $this->upload->data();
			$finalgambar = $upload_gambar['file_name'];

			$data = array(
				'deskripsi' => $deskripsi,
				'foto' => $finalgambar
			);
			$this->Crud_m->update('tbl_merch', $data, array('id_merch' => $this->input->post('id_merch')));
			redirect('Merch');
		}else{
			$data = array(
				'deskripsi' => $deskripsi
			);
			$this->Crud_m->update('tbl_merch', $data, array('id_merch' => $this->input->post('id_merch')));
			redirect('Merch');
		}
	}

	public function hapus(){
		$id = $this->input->post("id");

		$tabel = "tbl_merch";
		$where = array("id_merch" => $id);

		//Hapus di database //
		$check = $this->Crud_m->delete($tabel,$where);
	}
}
