<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->helper(array('url','form'));
		echo validation_errors();
	}

	//membuat fungsi home
	public function index()
	{
		//$data['filmkategori'] = $this->home_model->get_filmkategori();
    
		//$this->load->view('penjualan/home', $data);
		
		$data['list_barang'] = $this->db->get('barang')->result();
		$data['view'] = 'frontend/home';
				
		$this->load->view('frontend/template', $data);
	}
	
	public function detail($id_barang){
		$data['barang'] = $this->db->get_where('barang', array('id_barang'=>$id_barang))->row();
		$data['view'] = 'frontend/detail';
	
		$this->load->view('frontend/template', $data);		
	}
	
	public function order(){
		$quantity = $this->input->post('QUANTITY');
		$id_barang = $this->input->post('ID_BARANG');
		
		$data = array('id_barang'=>$id_barang, 'quantity'=>$quantity);
		$this->db->insert('pemesanan', $data);
		
		$barang = $this->db->get_where('barang', array('id_barang'=>$id_barang))->row();		
		echo $barang->nama_barang;
		
	}

	
}