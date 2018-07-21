<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok extends CI_Controller {
    public function index()
	{	  $this->load->view('template/head');
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('kelompok'); 
        $this->load->view('template/js');
        $this->load->view('template/foot');
    }

}