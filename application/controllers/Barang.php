<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'barang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'barang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'barang/index.html';
            $config['first_url'] = base_url() . 'barang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Barang_model->total_rows($q);
        $barang = $this->Barang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'barang_data' => $barang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('template/head');
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('barang/barang_list', $data);
        $this->load->view('template/js');
        $this->load->view('template/foot');
    }

    public function read($id) 
    {
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'id_user' => $row->id_user,
		'foto' => $row->foto,
		'nama_barang' => $row->nama_barang,
		'warna' => $row->warna,
		'bahan' => $row->bahan,
		'M' => $row->M,
		'L' => $row->L,
		'XL' => $row->XL,
		'XXL' => $row->XXL,
		'XXXL' => $row->XXXL,
		'harga' => $row->harga,
		'diskon' => $row->diskon,
	    );
        
        $this->load->view('template/head');
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');    
        $this->load->view('barang/barang_read', $data);
        $this->load->view('template/js');
        $this->load->view('template/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create() 
    {
       
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
	    'id_barang' => set_value('id_barang'),
	    'id_user' => set_value('id_user'),
	    'foto' => set_value('foto'),
	    'nama_barang' => set_value('nama_barang'),
	    'warna' => set_value('warna'),
	    'bahan' => set_value('bahan'),
	    'M' => set_value('M'),
	    'L' => set_value('L'),
	    'XL' => set_value('XL'),
	    'XXL' => set_value('XXL'),
	    'XXXL' => set_value('XXXL'),
	    'harga' => set_value('harga'),
	    'diskon' => set_value('diskon'),
    );
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
    $this->load->view('barang/barang_form', $data);
    $this->load->view('template/js');
    $this->load->view('template/foot');
           
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        
		'id_user' => $this->input->post('id_user',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'warna' => $this->input->post('warna',TRUE),
		'bahan' => $this->input->post('bahan',TRUE),
		'M' => $this->input->post('M',TRUE),
		'L' => $this->input->post('L',TRUE),
		'XL' => $this->input->post('XL',TRUE),
		'XXL' => $this->input->post('XXL',TRUE),
		'XXXL' => $this->input->post('XXXL',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'diskon' => $this->input->post('diskon',TRUE),
	    );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'id_user' => set_value('id_user', $row->id_user),
		'foto' => set_value('foto', $row->foto),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'warna' => set_value('warna', $row->warna),
		'bahan' => set_value('bahan', $row->bahan),
		'M' => set_value('M', $row->M),
		'L' => set_value('L', $row->L),
		'XL' => set_value('XL', $row->XL),
		'XXL' => set_value('XXL', $row->XXL),
		'XXXL' => set_value('XXXL', $row->XXXL),
		'harga' => set_value('harga', $row->harga),
		'diskon' => set_value('diskon', $row->diskon),
	    );
        $this->load->view('template/head');
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');    
        $this->load->view('barang/barang_form', $data);
        $this->load->view('template/js');
        $this->load->view('template/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'id_user' => $this->input->post('id_user',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'warna' => $this->input->post('warna',TRUE),
		'bahan' => $this->input->post('bahan',TRUE),
		'M' => $this->input->post('M',TRUE),
		'L' => $this->input->post('L',TRUE),
		'XL' => $this->input->post('XL',TRUE),
		'XXL' => $this->input->post('XXL',TRUE),
		'XXXL' => $this->input->post('XXXL',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'diskon' => $this->input->post('diskon',TRUE),
	    );

            $this->Barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('warna', 'warna', 'trim|required');
	$this->form_validation->set_rules('bahan', 'bahan', 'trim|required');
	$this->form_validation->set_rules('M', 'm', 'trim|required');
	$this->form_validation->set_rules('L', 'l', 'trim|required');
	$this->form_validation->set_rules('XL', 'xl', 'trim|required');
	$this->form_validation->set_rules('XXL', 'xxl', 'trim|required');
	$this->form_validation->set_rules('XXXL', 'xxxl', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('diskon', 'diskon', 'trim|required');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "barang.xls";
        $judul = "barang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Warna");
	xlsWriteLabel($tablehead, $kolomhead++, "Bahan");
	xlsWriteLabel($tablehead, $kolomhead++, "M");
	xlsWriteLabel($tablehead, $kolomhead++, "L");
	xlsWriteLabel($tablehead, $kolomhead++, "XL");
	xlsWriteLabel($tablehead, $kolomhead++, "XXL");
	xlsWriteLabel($tablehead, $kolomhead++, "XXXL");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "diskon");

	foreach ($this->Barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->warna);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bahan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->M);
	    xlsWriteNumber($tablebody, $kolombody++, $data->L);
	    xlsWriteNumber($tablebody, $kolombody++, $data->XL);
	    xlsWriteNumber($tablebody, $kolombody++, $data->XXL);
	    xlsWriteNumber($tablebody, $kolombody++, $data->XXXL);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga);
	    xlsWriteNumber($tablebody, $kolombody++, $data->diskon);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=barang.doc");

        $data = array(
            'barang_data' => $this->Barang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('barang/barang_doc',$data);
    }

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-12 06:31:32 */
/* http://harviacode.com */