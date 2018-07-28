<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesan extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemesan/index.html';
            $config['first_url'] = base_url() . 'pemesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemesan_model->total_rows($q);
        $pemesan = $this->Pemesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemesan_data' => $pemesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('pemesan/pemesan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pemesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemesan' => $row->id_pemesan,
		'Nama' => $row->Nama,
		'jenis_k' => $row->jenis_k,
		'alamat' => $row->alamat,
		'provinsi' => $row->provinsi,
		'kota' => $row->kota,
		'kode_pos' => $row->kode_pos,
		'email' => $row->email,
		'password' => $row->password,
		'telepon' => $row->telepon,
	    );
            $this->load->view('pemesan/pemesan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemesan/create_action'),
	    'id_pemesan' => set_value('id_pemesan'),
	    'Nama' => set_value('Nama'),
	    'jenis_k' => set_value('jenis_k'),
	    'alamat' => set_value('alamat'),
	    'provinsi' => set_value('provinsi'),
	    'kota' => set_value('kota'),
	    'kode_pos' => set_value('kode_pos'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'telepon' => set_value('telepon'),
	);
        $this->load->view('pemesan/pemesan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
		'jenis_k' => $this->input->post('jenis_k',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
	    );

            $this->Pemesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('auth2'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemesan/update_action'),
		'id_pemesan' => set_value('id_pemesan', $row->id_pemesan),
		'Nama' => set_value('Nama', $row->Nama),
		'jenis_k' => set_value('jenis_k', $row->jenis_k),
		'alamat' => set_value('alamat', $row->alamat),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kota' => set_value('kota', $row->kota),
		'kode_pos' => set_value('kode_pos', $row->kode_pos),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
		'telepon' => set_value('telepon', $row->telepon),
	    );
            $this->load->view('pemesan/pemesan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemesan', TRUE));
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
		'jenis_k' => $this->input->post('jenis_k',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
	    );

            $this->Pemesan_model->update($this->input->post('id_pemesan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pemesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemesan_model->get_by_id($id);

        if ($row) {
            $this->Pemesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jenis_k', 'jenis k', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');

	$this->form_validation->set_rules('id_pemesan', 'id_pemesan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pemesan.xls";
        $judul = "pemesan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis K");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Pos");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Telepon");

	foreach ($this->Pemesan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_k);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_pos);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telepon);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pemesan.doc");

        $data = array(
            'pemesan_data' => $this->Pemesan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pemesan/pemesan_doc',$data);
    }

}

/* End of file Pemesan.php */
/* Location: ./application/controllers/Pemesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-18 21:52:40 */
/* http://harviacode.com */