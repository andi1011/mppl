<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends MY_Controller {
	protected $access = array('Admin','Petugas Barang','Petugas Penjualan');
	
	public function index()
	{
		$this->load->view('dashboard1');
	}
}
