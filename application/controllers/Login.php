<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		/*if(! $this->session->userdata('id_pengguna')){
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible">
                <h4><center><i class="icon fa fa-warning"></i> Akses Ditolak</center></h4></div>');
			redirect('Login');
		}*/
	}

	public function index()
	{
		$this->load->view('login/login');
	}

	public function Masuk(){
		$where = array(
			"email" => $this->input->post("email"),
			"password" => md5($this->input->post("password"))
		);

		$query = $this->Crud_m->read('tbl_pengguna',$where)->row();

		if($query){
			$data = array(
				"id_pengguna" => $query->id_pengguna,
				"email" => $query->email,
				"logged_in" => true
			);
			$this->session->set_userdata($data);
			$logged_in = $this->session->userdata('logged_in');
			redirect('Dashboard');
		}else{
			redirect('/');
		}
	}

	public function Keluar(){
		$this->session->sess_destroy();
		redirect(site_url());
	}

}
