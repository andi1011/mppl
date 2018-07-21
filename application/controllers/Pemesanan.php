<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesanan/index.html';
            $config['first_url'] = base_url() . 'pemesanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemesanan_model->total_rows($q);
        //$barang = $this->Barang_model->get_limit_data($config['per_page'], $start, $q);
		$pemesanan = $this->Pemesanan_model->get_limit_data($config['per_page'], $start, $q);
		

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemesanan_data' => $pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('template/head');
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('pemesanan/pemesanan_list', $data); 
        $this->load->view('template/js');
        $this->load->view('template/foot');
    }
	
	public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "Pemesanan.xls";
        $judul = "Pemesanan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Kuantitas");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");	

	foreach ($this->Pemesanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->quantity);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga*$data->quantity);	    

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pemesanan.doc");

        $data = array(
            'pemesanan_data' => $this->Pemesanan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pemesanan/pemesanan_doc',$data);
    }
}