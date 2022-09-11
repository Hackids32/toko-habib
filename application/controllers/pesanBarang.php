<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PesanBarang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('pagination');
		$this->load->helper('cookie');
		$this->load->model('pesan_barang_model');
		$this->load->model('barang_model');
		$this->load->model('jenis_model');
		$this->load->model('satuan_model');
	}

	public function index()
	{
		$data['title'] = 'Pesan Barang';
		$data['pesanbarang'] = $this->pesan_barang_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('pesanbarang/index');
		$this->load->view('templates/footer');
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Stok Barang';

		$this->load->view('templates/header', $data);
		$this->load->view('barang/laporan');
		$this->load->view('templates/footer');
	}

	public function getBarang()
	{
		$data = $this->barang_model->dataJoin()->result();
		echo json_encode($data);
	}

	public function tambah()
	{
		$data['title'] = 'Barang';

		//data untuk select
		$data['barang'] 	= $this->barang_model->data()->result();
		$data['jenis'] 		= $this->jenis_model->data()->result();
		$data['satuan'] 	= $this->satuan_model->data()->result();


		$this->load->view('templates/header', $data);
		$this->load->view('pesanbarang/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Barang';

		//menampilkan data berdasarkan id
		$where = array('id' => $id);
		$data['data'] = $this->pesan_barang_model->detail_data($where, 'pesanbarang')->result();

		//data untuk select
		$data['jenis'] = $this->jenis_model->data()->result();
		$data['satuan'] = $this->satuan_model->data()->result();

		//jml
		$data['jmlJenis'] = $this->satuan_model->data()->num_rows();
		$data['jmlSatuan'] = $this->satuan_model->data()->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('pesanbarang/form_ubah');
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


		$barang 	= 	$this->input->post('barang');
		$jenis 		= 	$this->input->post('jenis');
		$satuan 	= 	$this->input->post('satuan');
		$harga		=	$this->input->post('harga_jual');
		$jumlah 	= 	$this->input->post('jumlah_pesan');
		$total	 	= 	$this->input->post('total_harga');
		$reseller 	= 	$this->input->post('reseller');



		$data = array(
			'id_barang'		=> $barang,
			'id_jenis'		=> $jenis,
			'id_satuan'		=> $satuan,
			'harga' 		=> $harga,
			'jumlah'		=> $jumlah,
			'total'			=> $total,
			'reseller'		=> $reseller
		);

		$this->pesan_barang_model->tambah_data($data, 'pesanbarang');
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
		redirect('pesanbarang/index');
	}

	public function verifikasi($id)
	{

		$verifikasi = 	"Selesai";

		$data = array(
			'verifikasi'	=> $verifikasi,

		);

		$where = array(
			'id' => $id
		);

		$this->pesan_barang_model->ubah_data($where, $data, 'pesanbarang');
		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Pesanan Diterima!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('pesanbarang/index');
	}

	public function proses_terima($id)
	{
		$where = array('id' => $id);
		$data = array(
			'verifikasi' => 'Diterima'
		);

		$this->pesan_barang_model->ubah_data($where, $data, 'pesanbarang');

		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil Diterima!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('pesanbarang/index');
	}

	public function proses_kirim($id)
	{
		$where = array('id' => $id);
		$data = array(
			'verifikasi' => 'Dikirim'
		);

		$this->pesan_barang_model->ubah_data($where, $data, 'pesanbarang');

		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil Dikirim!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('pesanbarang/index');
	}

	public function proses_tolak($id)
	{
		$where = array('id' => $id);
		$data = array(
			'verifikasi' => 'Ditolak'
		);

		$this->pesan_barang_model->ubah_data($where, $data, 'pesanbarang');

		$this->session->set_flashdata('Pesan', '
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil Ditolak!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('pesanbarang/index');
	}

	public function getData()
	{
		$id = $this->input->post('id');
		$where = array('id_barang' => $id);
		$data = $this->barang_model->detail_data($where, 'barang')->result();
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
