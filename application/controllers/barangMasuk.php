<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangMasuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('pagination');
		$this->load->helper('cookie');
		$this->load->model('supplier_model');
		$this->load->model('barang_model');
		$this->load->model('jenis_model');
		$this->load->model('satuan_model');
		$this->load->model('barangMasuk_model');
	}

	public function index()
	{
		$data['title'] = 'Barang Masuk';
		$data['bmasuk'] = $this->barangMasuk_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barangMasuk/index');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Barang Masuk';

		$this->load->view('templates/header', $data);
		$this->load->view('barangMasuk/laporan');
		$this->load->view('templates/footer');
	}

	public function getBarangMasuk()
	{
    	$data = $this->barangMasuk_model->dataJoin()->result();
    	echo json_encode($data);
	}

	public function filterBarangMasuk($tglawal, $tglakhir)
	{
      	$data = $this->barangMasuk_model->lapdata($tglawal, $tglakhir)->result();
    	echo json_encode($data);
	}


	public function tambah()
	{
		$data['title'] = 'Barang Masuk';

		//data untuk select
		$data['barang'] 	= $this->barang_model->data()->result();
		$data['supplier'] 	= $this->supplier_model->data()->result();
		$data['jenis'] 		= $this->jenis_model->data()->result();
		$data['satuan'] 	= $this->satuan_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barangMasuk/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Barang Masuk';

		//menampilkan data berdasarkan id
		$where = array('id_barang_masuk' => $id);
		$data['data'] = $this->barang_model->detail_data($where, 'barang_masuk')->result();

		//data untuk select
		$data['jenis'] = $this->jenis_model->data()->result();
		$data['satuan'] = $this->satuan_model->data()->result();

		//jml
		$data['jmlJenis'] = $this->satuan_model->data()->num_rows();
		$data['jmlSatuan'] = $this->satuan_model->data()->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Barang';

		//menampilkan data berdasarkan id
		$data['data'] = $this->barang_model->detail_join($id, 'barang')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{


		$kode 	= 				$this->barangMasuk_model->buat_kode();
		$tgl_masuk = 			$this->input->post('tgl_masuk');
		$supplier = 			$this->input->post('supplier');
		$barang = 				$this->input->post('barang');
		$jenis = 				$this->input->post('jenis');
		$satuan = 				$this->input->post('satuan');
		$harga_msk	=			$this->input->post('harga_msk');
		$jumlah_masuk = 		$this->input->post('jumlah_masuk');


		$data = array(
			'id_barang_masuk'		=> $kode,
			'tgl_masuk'		=> $tgl_masuk,
			'id_supplier'	=> $supplier,
			'id_barang'		=> $barang,
			'id_jenis'		=> $jenis,
			'id_satuan'		=> $satuan,
			'harga_msk'		=> $harga_msk,
			'jumlah_masuk'	=> $jumlah_masuk,
		);

		$stok = $this->db->get_where('barang', ['id_barang' => $barang])->result()[0]->stok;
		$data_update = [
			'harga' => $harga_msk,
			'stok' => $stok + $jumlah_masuk
		];
		$this->db->where('id_barang', $barang);
		$this->db->update('barang', $data_update);

		$this->barangMasuk_model->tambah_data($data, 'barang_masuk');
		$this->session->set_flashdata('Pesan', '
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
		redirect('barang_masuk');
	}

	public function proses_hapus($id)
	{
		$where = array('id_barang_masuk' => $id);


		$this->barang_model->hapus_data($where, 'barang_masuk');


		$this->session->set_flashdata('Pesan', '
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
		redirect('barang_masuk');
	}


	public function getData()
	{
		$id = $this->input->post('id');
		$where = array('id_barang_masuk' => $id);
		$data = $this->barang_model->detail_data($where, 'barang_masuk')->result();
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
