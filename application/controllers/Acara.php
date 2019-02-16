<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends CI_Controller {

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
			'acara' => $this->Crud_m->read('tbl_acara', array('id_acara' => 1))->row()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/acara/acara', $data);
		$this->load->view('admin/footer');
	}

	public function Update(){
		$data = array(
			"nama_acara" => $this->input->post('nama_acara'),
			"tgl_acara" => $this->input->post('tgl_acara'),
			"jam_acara" => $this->input->post('jam_acara'),
			"deskripsi_acara" => $this->input->post('deskripsi_acara'),
			"long" => $this->input->post('lng'),
			"lat" => $this->input->post('lat'),
			"alamat_acara" => $this->input->post('alamat_acara'),
			"create_by" => $this->input->post('create_by'),
			"term" => $this->input->post('term'),
			"about" => $this->input->post('about')
		);

		$this->Crud_m->update('tbl_acara', $data, array('id_acara' => 1));
		redirect('Acara');
	}
}
