<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$data = array(
			"home" => $this->Crud_m->read('tbl_acara', array('id_acara' => 1))->row(),
			"tiket" => $this->Crud_m->read('tbl_kategori')->result(),
			"token" => $this->randomString('20'),
			"merch" => $this->Crud_m->read('tbl_merch')->result()
		);
		
		$this->load->view('home/content', $data);
	}

	function randomString($length) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

	public function Simpan(){

		$config = Array(  
	    	'protocol' => 'smtp',  
	    	'smtp_host' => 'ssl://smtp.googlemail.com',  
	    	'smtp_port' => 465,
	    	'smtp_user' => 'codeend2@gmail.com',   
	    	'smtp_pass' => 'Bodoamat123',   
	    	'mailtype' => 'html',   
	    	'charset' => 'iso-8859-1'  
	   	);

		$id_pemesan = $this->input->post('id_pemesan');
		$tgl_pesan = $this->input->post('tgl_pesan');
		$tgl_bayar = $this->input->post('tgl_bayar');
		$nama_pemesan = $this->input->post('nama_pemesan');
		$email = $this->input->post('email');
		$no_telp = $this->input->post('no_telp');

		$getKategori = $this->input->post('kategori');
		$kategori = explode(',', $getKategori);

		$countTiket = $this->input->post('jumlah');
		$jumlah = explode(',', $countTiket);

		$totalTiket = $this->input->post('total');
		$total = explode(',', $totalTiket);

		$namakategori = $this->input->post('namaKategori');
		$nama_kategori = explode(',', $namakategori);

		/*$test = array();*/

		$jum = $this->Crud_m->read('tbl_kategori')->num_rows();

		for($x = 0; $x < $jum; $x++){
			$pesanan = array(
				'id_pemesan' => $id_pemesan,
				'id_kategori' => $kategori[$x],
				'jumlah' => $jumlah[$x],
				'total' => $total[$x]
			);
			$this->Crud_m->create('tbl_pesanan',$pesanan);
		}
		
		$data = array(
			'id_pemesan' => $id_pemesan,
			'nama_pemesan' => $nama_pemesan,
			'no_telp' => $no_telp,
			'email' => $email,
			'tgl_pesan' => $tgl_pesan,
			'tgl_bayar' => $tgl_bayar,
			'status' => 'Pesan'
		);
		
		$check = $this->Crud_m->create('tbl_pemesan',$data);

		// $this->load->library('email', $config);  
	   	// $this->email->set_mailtype("html");
	   	// $this->email->set_newline("\r\n");  
	   	// $this->email->from('codeend2@gmail.com', 'Admin Tiket MonstroSix');   
	   	// $this->email->to($email);
		// $this->email->subject('Tiket-'.$tgl_pesan);
		   
		$this->load->library('email');
		$mail_config['smtp_host'] = 'smtp.gmail.com';
		$mail_config['smtp_port'] = '587';
		$mail_config['smtp_user'] = 'codeend2@gmail.com';
		$mail_config['_smtp_auth'] = TRUE;
		$mail_config['smtp_pass'] = 'Bodoamat123';
		$mail_config['smtp_crypto'] = 'tls';
		$mail_config['protocol'] = 'smtp';
		$mail_config['mailtype'] = 'html';
		$mail_config['send_multipart'] = FALSE;
		$mail_config['charset'] = 'utf-8';
		$mail_config['wordwrap'] = TRUE;
		$this->email->initialize($mail_config);
		
		$this->email->set_newline("\r\n");

		$this->email->from('noreply@monstrosix.com', 'Admin Tiket MonstroSix');
		$this->email->to($email); 
		$this->email->subject('Tiket-'.$tgl_pesan);

	   	$htmlContent .= '<html>
				    <head>
				    	<style>
				    		.button {
							  	background-color: #4CAF50; /* Green */
							  	border: none;
							  	color: black;
							  	padding: 7px 16px;
							  	text-align: center;
							  	text-decoration: none;
							  	display: inline-block;
							  	font-size: 12px;
							}
				    	</style>
				    </head>
				    <body>
				    	<center>
				        <h1>Terima Kasih Sudah Melakukan Pemesanan Tiket.</h1>
				        <table cellspacing="0" style="border: 2px dashed #000; width: 500px; height: 200px;">
				            <tr>
				                <th>Nama </th><td>'.$nama_pemesan.'</td>
				            </tr>
				            <tr style="background-color: #e0e0e0;">
				                <th>No Telp</th><td>'.$no_telp.'</td>
				            </tr>
				            <tr>
				                <th>Email</th><td>'.$email.'</td>
				            </tr>
				            <tr style="background-color: #e0e0e0;">
				                <th>Tgl Pemesanan</th><td>'.$tgl_pesan.'m</td>
				            </tr>
				            <tr>
				                <th>Max Tgl Pembayaran</th><td>'.$tgl_bayar.'</td>
				            </tr>';
		$totalPembayaran = 0;		            
		for($x = 0; $x < $jum; $x++){
			$htmlContent .= '<tr style="background-color: #e0e0e0;"><th>Kategori</th><td>'.$nama_kategori[$x].'</td></tr>
				            	<tr><th>Jumlah</th><td>'.$jumlah[$x].'</td></tr>';
			$totalPembayaran += $total[$x];
		}

		$htmlContent .= '<tr style="background-color: #ffbf00;"><th>Total Pembayaran</th><td><strong>Rp. '.number_format($totalPembayaran,0,',','.').'</strong></td></th>';
		$htmlContent .= '</table><br><br>';

		$htmlContent .= '<p>Silahkan transfer ke Bank berikut : </p>';

		$getBank = $this->Crud_m->read('tbl_rek')->result();
		$htmlContent .= '<table cellspacing="0" style="border: 2px dashed #000; width: 400px; height: 100px;">';
		foreach ($getBank as $item) {
			$htmlContent .= '<tr><td>'.$item->nama_bank.'</td><td>'.$item->no_rek.'</td><td> an : '.$item->atas_nama.'</td><tr>';
		}
		$htmlContent .= '</table>';

		$htmlContent .= '<p>Atau untuk COD silahkan hubungi Nomor Whatsapp berikut : </p>';

		$getcod = $this->Crud_m->read('tbl_cod')->result();
		$htmlContent .= '<table cellspacing="0" style="border: 2px dashed #000; width: 400px; height: 100px;">';
		foreach ($getcod as $itemcod) {
			$htmlContent .= '<tr><td>Nama : '.$itemcod->nama.'</td><td> No Whatsapp : '.$itemcod->no_hp.'</td><tr>';
		}
		$htmlContent .= '</table>';

		$htmlContent .= '<p><strong>SIMPAN BUKTI PEMBAYARAN.</strong> Lakukan konfirmasi pembayaran dengan klik tombol dibawah ini dan upload bukti pembayaran.</p>';

		$htmlContent .= '<a href="'.site_url('Konfirmasi/Token/'.base64_encode($id_pemesan)).'" class="button">Konfirmasi Pembayaran</a>';
		//$htmlContent .= '<a href="http://monstrosix.com/beta/index.php/Konfirmasi/Token/'.base64_encode($id_pemesan).'" class="button">Konfirmasi Pembayaran</a>';

		$htmlContent .= '</center></body></html>';

	   	$this->email->message($htmlContent);
	    $this->email->send();

		if($check == TRUE){
			$output = array(
				'state' => 0,
				'message' => 'Data Berhasil Diinput'
			);
		}else{
			$output = array(
				'state' => 1,
				'message' => 'Data Gagal Diinput'
			);
		}
		echo json_encode($test);
	}

	public function Send(){
		$this->load->library('email');
		$mail_config['smtp_host'] = 'smtp.gmail.com';
		$mail_config['smtp_port'] = '587';
		$mail_config['smtp_user'] = 'codeend2@gmail.com';
		$mail_config['_smtp_auth'] = TRUE;
		$mail_config['smtp_pass'] = 'Bodoamat123';
		$mail_config['smtp_crypto'] = 'tls';
		$mail_config['protocol'] = 'smtp';
		$mail_config['mailtype'] = 'html';
		$mail_config['send_multipart'] = FALSE;
		$mail_config['charset'] = 'utf-8';
		$mail_config['wordwrap'] = TRUE;
		$this->email->initialize($mail_config);
		
		$this->email->set_newline("\r\n");

		$this->email->from('noreply@monstrosix.com','Gateway Restaurent Contact');
		$this->email->to('hardi.subagyo@gmail.com'); 
		$this->email->subject('Gateway Restaurent Contact Enquiry');

		$this->email->message('PESAN');  
		$send = $this->email->send();
		if($send) {
			echo json_encode("send");
		} else {
			$error = $this->email->print_debugger(array('headers'));
			echo json_encode($error);
		}
	}

	public function Pdf(){
		//$this->load->library('m_pdf');
		// $this->m_pdf->pdf->WriteHTML('Test');
		// $this->m_pdf->pdf->Output();

		echo $_SERVER["DOCUMENT_ROOT"];
	}
}
