<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembayaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembayaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembayaran/index.html';
            $config['first_url'] = base_url() . 'pembayaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembayaran_model->total_rows($q);
        $pembayaran = $this->Pembayaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembayaran_data' => $pembayaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        ); 
        $this->load->view('template/head');
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('pembayaran/pembayaran_list', $data);
        $this->load->view('template/js');
        $this->load->view('template/foot');
    }

    public function read($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pembayaran' => $row->id_pembayaran,
		'id_pemesan' => $row->id_pemesan,
		'id_barang' => $row->id_barang,
		'jumlah' => $row->jumlah,
		'total_harga' => $row->total_harga,
        );
        $this->load->view('template/head');
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('pembayaran/pembayaran_read', $data);
        $this->load->view('template/js');
        $this->load->view('template/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran/create_action'),
	    'id_pembayaran' => set_value('id_pembayaran'),
	    'id_pemesan' => set_value('id_pemesan'),
	    'id_barang' => set_value('id_barang'),
	    'jumlah' => set_value('jumlah'),
	    'total_harga' => set_value('total_harga'),
    );
    $this->load->view('template/head');
    $this->load->view('template/topbar');
    $this->load->view('template/sidebar');
    $this->load->view('pembayaran/pembayaran_form', $data);
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
		'id_pemesan' => $this->input->post('id_pemesan',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
	    );

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran/update_action'),
		'id_pembayaran' => set_value('id_pembayaran', $row->id_pembayaran),
		'id_pemesan' => set_value('id_pemesan', $row->id_pemesan),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'total_harga' => set_value('total_harga', $row->total_harga),
        );
        $this->load->view('template/head');
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('pembayaran/pembayaran_form', $data);
        $this->load->view('template/js');
        $this->load->view('template/foot');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pembayaran', TRUE));
        } else {
            $data = array(
		'id_pemesan' => $this->input->post('id_pemesan',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
	    );

            $this->Pembayaran_model->update($this->input->post('id_pembayaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pemesan', 'id pemesan', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('total_harga', 'total harga', 'trim|required');

	$this->form_validation->set_rules('id_pembayaran', 'id_pembayaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pembayaran.xls";
        $judul = "pembayaran";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pemesan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Total Harga");

	foreach ($this->Pembayaran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pemesan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->total_harga);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pembayaran.doc");

        $data = array(
            'pembayaran_data' => $this->Pembayaran_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pembayaran/pembayaran_doc',$data);
    }

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-11 15:43:39 */
/* http://harviacode.com */