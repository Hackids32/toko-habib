<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangKeluar extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('reseller_model');
	$this->load->model('barang_model');
	$this->load->model('jenis_model');
	$this->load->model('satuan_model');
	$this->load->model('barangKeluar_model');
  }
	
	public function index()
	{
		$data['title'] = 'BarangKeluar';
		$data['bkeluar'] = $this->barangKeluar_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barangKeluar/index');
		$this->load->view('templates/footer');
	} 

	public function laporan()
	{
		$data['title'] = 'Laporan Barang Keluar';

		$this->load->view('templates/header', $data);
		$this->load->view('barangKeluar/laporan');
		$this->load->view('templates/footer');
	}

	public function getBarangKeluar()
	{
    	$data = $this->barangKeluar_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filterBarangKeluar($tglawal, $tglakhir)
	{
      	$data = $this->barangKeluar_model->lapdata($tglawal, $tglakhir)->result();
    	echo json_encode($data);
	}

	public function tambah()
	{
        $data['title'] = 'Barang Keluar';
        
        //data untuk select
		$data['barang'] 	= $this->barang_model->data()->result();
        $data['reseller'] 	= $this->reseller_model->data()->result();
		$data['jenis'] 		= $this->jenis_model->data()->result();
		$data['satuan'] 	= $this->satuan_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barangKeluar/form_tambah');
		$this->load->view('templates/footer');
    }

	public function proses_tambah()
	{

        
		$kode 	= 				$this->barangKeluar_model->buat_kode();
		$tgl_keluar = 			$this->input->post('tgl_keluar');
		$reseller = 			$this->input->post('reseller');
		$barang = 				$this->input->post('barang');
		$jenis = 				$this->input->post('jenis');
		$satuan = 				$this->input->post('satuan');
		$harga_kel	=			$this->input->post('harga_kel');
        $jumlah_keluar = 		$this->input->post('jumlah_keluar');
        
		
		$data=array(
			'id_barang_keluar'		=> $kode,
			'tgl_keluar'		=> $tgl_keluar,
			'id_reseller'	=> $reseller,
			'id_barang'		=> $barang,
			'id_jenis'		=> $jenis,
            'id_satuan'		=> $satuan,
			'harga_kel'		=> $harga_kel,
			'jumlah_keluar'	=> $jumlah_keluar,
		);

		$stok = $this->db->get_where('barang', ['id_barang' => $barang])->result()[0]->stok;
		$data_update = [
			'stok' => $stok - $jumlah_keluar
		];
		$this->db->where('id_barang', $barang);
		$this->db->update('barang', $data_update);
		
		$this->barangKeluar_model->tambah_data($data, 'barang_keluar');
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
    	redirect('barang_keluar');
	}

	public function proses_hapus($id)
	{
		$where = array('id_barang_keluar' => $id );
		
			
		$this->barang_model->hapus_data($where, 'barang_keluar');
		

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
		redirect('barang_keluar');
	}


	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_barang_keluar' => $id );
    	$data = $this->barang_model->detail_data($where, 'barang_keluar')->result();
    	echo json_encode($data);
	}
	public function getDetail($id)
	{
		header('Content-Type: application/json');
		$data = $this->db->get_where('barang', ['id_barang' => $id])->result()[0];
		$satuan = $this->db->get_where('satuan', ['id_satuan' => $data->id_satuan])->result()[0];
		$jenis = $this->db->get_where('jenis', ['id_jenis' => $data->id_jenis])->result()[0];

		echo "$satuan->id_satuan:$satuan->nama_satuan , $jenis->id_jenis:$jenis->nama_jenis";
	}
}