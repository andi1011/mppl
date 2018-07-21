<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');
        $this->load->library('form_validation');
    }
    public function index()
	{	$this->load->view('register');
    }
  
    public function create() 
    {
        $data = array(
            'button' => 'create',
            'action' => site_url('register/create_action'),
	    'id_pemesan' => set_value('id_pemesan'),
	    'Nama' => set_value('Nama'),
	    'jenis_k' => set_value('jenis_k'),
	    'alamat' => set_value('alamat'),
	    'provinsi' => set_value('provinsi'),
	    'kota' => set_value('kota'),
	    'kode_pos' => set_value('kode_pos'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'telepon' => set_value('telepon')
    );
        
        $this->load->view('register', $data);
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
		'telepon' => $this->input->post('telepon',TRUE)
	    );

            $this->register_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('auth2'));
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

}