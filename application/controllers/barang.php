<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('barang_model');
	$this->load->model('jenis_model');
	$this->load->model('satuan_model');
  }
	
	public function index()
	{
		$data['title'] = 'Barang';
		$data['barang'] = $this->barang_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/index');
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
		$data['jenis'] = $this->jenis_model->data()->result();
        $data['satuan'] = $this->satuan_model->data()->result();

        //jml
		$data['jmlJenis'] = $this->satuan_model->data()->num_rows();
		$data['jmlSatuan'] = $this->satuan_model->data()->num_rows();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/form_tambah');
		$this->load->view('templates/footer');
    }
    
    public function ubah($id)
	{
        $data['title'] = 'Barang';

        //menampilkan data berdasarkan id
		$where = array('id_barang'=>$id);
        $data['data'] = $this->barang_model->detail_data($where, 'barang')->result();
        
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
        
		$kode = 	$this->barang_model->buat_kode();
		$barang = 	$this->input->post('barang');
		$jenis = 	$this->input->post('jenis');
		$satuan = 	$this->input->post('satuan');
		$harga	=	$this->input->post('harga');
		$harga_jual = $this->input->post('harga_jual');
        $stok = 	$this->input->post('stok');
        
		
		$data=array(
			'id_barang'		=> $kode,
			'nama_barang'	=> $barang,
			'id_jenis'		=> $jenis,
            'id_satuan'		=> $satuan,
			'harga'			=> $harga,
			'harga_jual'	=> $harga_jual,
			'stok'			=> $stok,
		);

		$this->barang_model->tambah_data($data, 'barang');
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
    	redirect('barang');
	}

	public function proses_ubah()
	{
        
		$kode =    $this->input->post('idbarang');
		$barang =  $this->input->post('barang');
		$jenis = 	$this->input->post('jenis');
        $satuan = 	$this->input->post('satuan');
		$harga = 	$this->input->post('harga');
		$harga_jual = $this->input->post('harga_jual');
		$stok = 	$this->input->post('stok');
        
       
		
		$data=array(
			'nama_barang'	=> $barang,
			'id_jenis'		=> $jenis,
            'id_satuan'		=> $satuan,
			'harga' 		=> $harga,
			'harga_jual' 		=> $harga_jual,
			'stok'			=> $stok,
		);

		$where = array(
			'id_barang'=>$kode
		);

		$this->barang_model->ubah_data($where, $data, 'barang');
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
    	redirect('barang');
	}

	public function proses_hapus($id)
	{
		$where = array('id_barang' => $id );
		
			
		$this->barang_model->hapus_data($where, 'barang');
		

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
		redirect('barang');
	}


	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_barang' => $id );
    	$data = $this->barang_model->detail_data($where, 'barang')->result();
    	echo json_encode($data);
	}

	public function getDetailLengkap($id)
	{
		header('Content-Type: application/json');
		$data = $this->db->get_where('barang', ['id_barang' => $id])->result()[0];
		$satuan = $this->db->get_where('satuan', ['id_satuan' => $data->id_satuan])->result()[0];
		$jenis = $this->db->get_where('jenis', ['id_jenis' => $data->id_jenis])->result()[0];
		$harga = $data->harga_jual;

		echo "$satuan->id_satuan:$satuan->nama_satuan , $jenis->id_jenis:$jenis->nama_jenis , harga:$harga";
	}

}

