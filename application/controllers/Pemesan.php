<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesan extends CI_Controller {

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
			"pesanan" => $this->Crud_m->read('tbl_pemesan')->result()
		);

		$this->load->view('admin/header');
		$this->load->view('admin/pemesan/pemesan', $data);
		$this->load->view('admin/footer');
	}

	public function view($id){

		$getPesanan = $this->db->query("
				SELECT 
					a.id_pemesan,
					a.jumlah,
					a.total,
					b.nama_pemesan,
					c.nama_kategori
				FROM 
					tbl_pesanan as a
				JOIN tbl_pemesan as b ON a.id_pemesan = b.id_pemesan
				JOIN tbl_kategori as c ON c.id_kategori = a.id_kategori
				WHERE a.id_pemesan = '".$id."'
			")->result();

		$TotalPembayaran = $this->db->query("
				SELECT SUM(total) as totalp FROM tbl_pesanan WHERE id_pemesan = '".$id."'
			")->row();

		$Pesanan = array();
		foreach($getPesanan as $item){
			array_push($Pesanan, array(
				'pemesan' => $item->nama_pemesan,
				'kategori' => $item->nama_kategori,
				'jumlah' => $item->jumlah,
				'total' => $item->total
			));
		}

		$data = array(
			'Tiket' => $Pesanan,
			'TotalPembayaran' => $TotalPembayaran
		);

		echo json_encode($data);
	}

}
