<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller {
	protected $access = array('Admin', 'Petugas Barang','Petugas Penjualan');
	
	public function index()
	{
		$this->load->view('dashboard1');
	}
}
