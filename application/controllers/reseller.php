<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('reseller_model');
  }
	
	public function index()
	{
		$data['title'] = 'Re-Seller';
		$data['reseller'] = $this->reseller_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('reseller/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kode = 	$this->reseller_model->buat_kode();
		$reseller = $this->input->post('reseller');
		$notelp = 	$this->input->post('notelp');
		$alamat = 	$this->input->post('alamat');
		
		$data=array(
			'id_reseller'=> $kode,
			'nama_reseller'=> $reseller,
			'notelp'=> $notelp,
			'alamat'=> $alamat
		);

		$this->reseller_model->tambah_data($data, 'reseller');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('reseller');
	}

	public function proses_ubah()
	{
		$kode = 	$this->input->post('idreseller');
		$reseller = $this->input->post('reseller');
		$notelp = 	$this->input->post('notelp');
		$alamat = 	$this->input->post('alamat');
		
		$data=array(
			'nama_reseller'=> $reseller,
			'notelp'=> $notelp,
			'alamat'=> $alamat
		);

		$where = array(
			'id_reseller'=>$kode
		);

		$this->reseller_model->ubah_data($where, $data, 'reseller');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('reseller');
	}

	public function proses_hapus($id)
	{
		$where = array('id_reseller' => $id );
		$this->reseller_model->hapus_data($where, 'reseller');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('reseller');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_reseller' => $id );
    	$data = $this->reseller_model->detail_data($where, 'reseller')->result();
    	echo json_encode($data);
	}

}
