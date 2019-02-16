<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function Token($id)
	{	
		$data = array(
			"pemesan" => $this->Crud_m->read('tbl_pemesan', array('id_pemesan' => base64_decode($id)))->row(),
			"token" => $id
		);

		$this->load->view('admin/header_k');
		$this->load->view('konfirmasi/konfirmasi', $data);
		$this->load->view('admin/footer');
	}

	public function AddProses(){
		$id_pemesan = base64_decode($this->input->post('id_pemesan'));
		$gambar = $_FILES['upload']['name'];
		if($gambar != ''){
			$namagambar = str_replace('', '-', $id_pemesan.'-'.date("YmdHis"));
			$config['upload_path'] = './temp/file/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
			$config['max_size'] = '4096';
			$config['file_name'] = $namagambar;
			$this->load->library('upload',$config);
			$this->upload->do_upload('upload');
			$upload_gambar = $this->upload->data();
			$finalgambar = $upload_gambar['file_name'];

			$data = array(
				'foto_upload' => $finalgambar,
				'id_pemesan' => $id_pemesan
			);

			$konfirm = array(
				'status' => 'Konfirmasi Pembayaran'
			);
			$this->Crud_m->update('tbl_pemesan', $konfirm, array('id_pemesan' => $id_pemesan));
			$this->Crud_m->create('tbl_konfirmasi', $data);
			redirect('Konfirmasi/Konfirm');
		}else{
			$this->load->view('admin/header_k');
			$this->load->view('konfirmasi/kosong');
			$this->load->view('admin/footer');	
		}
	}

	public function Konfirm(){
		$this->load->view('admin/header_k');
		$this->load->view('konfirmasi/konfirm');
		$this->load->view('admin/footer');
	}

	public function View($id){
		$getFoto = $this->Crud_m->read('tbl_konfirmasi', array('id_pemesan' => $id))->result();

		$Foto = array();
		foreach($getFoto as $item){
			array_push($Foto, array(
				'foto' => $item->foto_upload
			));
		}

		$data = array(
			'foto' => $Foto
		);

		echo json_encode($data);
	}

	public function CreateTiket($id){
		$mpdf = new \Mpdf\Mpdf(
            ['format' => [190, 50], 
            'margin_left' => 0, 
            'margin_right' => 0, 
            'margin_top' => 0, 
            'margin_bottom' => 0, 
            'margin_header' => 0, 
            'margin_footer' => 0,]);
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './tiket'; //string, the default is application/cache/
        $config['errorlog']     = './tiket/'; //string, the default is application/logs/
        $config['imagedir']     = './tiket/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
		
		$konfirm = array(
			'status' => 'Sukses'
		);
		$update = $this->Crud_m->update('tbl_pemesan', $konfirm, array('id_pemesan' => $id));

		$getPemesan = $this->Crud_m->read('tbl_pesanan', array('id_pemesan' => $id))->result();

		$getAcara = $this->Crud_m->read('tbl_acara', array('id_acara' => 1))->row();
		$Jam = str_replace('"','',json_encode($getAcara->jam_acara));
		$Tanggal = str_replace('"','',json_encode($getAcara->tgl_acara));
		
		foreach($getPemesan as $item){
			$getKategori = $this->Crud_m->read('tbl_kategori', array('id_kategori' => $item->id_kategori))->row();
			$nama_kategori = json_encode($getKategori->nama_kategori);
			$harga = json_encode($getKategori->harga);

			$getNamaPemesan = $this->Crud_m->read('tbl_pemesan', array('id_pemesan' => $id))->row();
			$nama_pemesan = json_encode($getNamaPemesan->nama_pemesan);
			
			for($x = 0; $x < $item->jumlah; $x++){
				$id_tiket = $this->randomString('20');
				$create = array(
					'id_tiket' => $id_tiket,
					'id_pemesan' => $id,
					'kategori' => $item->id_kategori
				);				
				$this->Crud_m->create('tbl_tiket', $create);
				$image_name= $id_tiket.'.png';
				$params['data'] = $id_tiket;
				$params['level'] = 'H';
				$params['size'] = 10;
				$params['savename'] = FCPATH.$config['imagedir'].$image_name;
				$this->ciqrcode->generate($params);
				$html = '
					<table border="1" width="100%">
						<tr>
							<td width="20%" style="text-align: center; vertical-align: top;">
								<br><img src="'.base_url().'temp/logo.png" width="20%">
								<br><br><strong>'.str_replace('"','',$nama_kategori).'</strong>
								<br><strong>'.number_format(str_replace('"','',$harga),0).'</strong>
							</td>
							<td style="text-align: left; vertical-align: top;">
								<br>&nbsp;&nbsp;&nbsp;<font size="5"><strong>'.str_replace('"','',$nama_pemesan).'</strong></font>
								<br><br>&nbsp;&nbsp;&nbsp;MONSTROSIX CORONA
								<br>&nbsp;&nbsp;&nbsp;'.date("H:i", strtotime($Jam)).' + '.date("d/M/Y", strtotime($Tanggal)).'
								<br><br>
								&nbsp;&nbsp;&nbsp;GOR Padjajaran Bogor, Kota Bogor<br>
								&nbsp;&nbsp;&nbsp;Tanah Sareal, Jawa Barat<br>
								&nbsp;&nbsp;&nbsp;16161
							</td>
							<td width="25%">
								<img src="'.base_url().'tiket/'.$id_tiket.'.png" width="25%">
							</td>
						</tr>
					</table>
				';
				$mpdf->WriteHTML($html);
			}
		}
		$mpdf->Output('tiket_pdf/tiket-'.$id.'.pdf', 'F');

		if($update){
			$data = array(
				'state' => 0,
				'message' => 'Sukses'
			);
		}else{
			$data = array(
				'state' => 1,
				'message' => 'Gagal'
			);
		}

		echo json_encode($data);
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

	function KirimTiket($id){
		$getDataPengirim = $this->Crud_m->read('tbl_pemesan', array('id_pemesan' => $id))->row();
		$emailPemesan = json_encode($getDataPengirim->email);
		$noTelp = json_encode($getDataPengirim->no_telp);

		$attched_file= $_SERVER["DOCUMENT_ROOT"]."/tiket/tiket_pdf/tiket-".$id.".pdf";

		$konfirm = array(
			'status' => 'Terkirim'
		);
		$update = $this->Crud_m->update('tbl_pemesan', $konfirm, array('id_pemesan' => $id));
		
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
		$this->email->to($emailPemesan); 
		$this->email->subject('Tiket-'.$noTelp);

		$this->email->message("Terimakasih atas pembelian tiket.");
		$this->email->attach($attched_file);
		if($this->email->send()){
			$data = array(
				'state' => 0,
				'message' => 'Sukses Mengirim Tiket'
			);
		}else{
			$data = array(
				'state' => 1,
				'message' => 'Gagal Mengirim Tiket'
			);
		}
	    echo json_encode($data);
	}

	function HapusPemesanan($id){
		$delete_pemesan = $this->Crud_m->delete('tbl_pemesan', array('id_pemesan' => $id));
		$delete_pesanan = $this->Crud_m->delete('tbl_pesanan', array('id_pemesan' => $id));

		if($delete_pemesan && $delete_pesanan){
			$data = array(
				'state' => 0,
				'message' => 'Pemesan Berhasil Dihapus'
			);
		}else{
			$data = array(
				'state' => 1,
				'message' => 'Pemesan Gagal Dihapus'
			);
		}
	    echo json_encode($data);
	}
}
