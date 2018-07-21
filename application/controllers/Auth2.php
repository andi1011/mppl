<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class auth2 extends CI_Controller {	

	public function logged_in_check()
	{
		if ($this->session->userdata("logged_in")) {
			redirect('home','refresh');
		}
	}

	public function index()
	{	
		$this->logged_in_check();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("email", "email", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		if ($this->form_validation->run() == true) 
		{
			$this->load->model('auth2_model', 'auth2');	
			// check the email & password of user
			$status = $this->auth2->validate();
			if ($status == 'ERR_INVALID_email') {
				$this->session->set_flashdata('result_login', '<br>Maaf, email atau Password yang anda masukkan salah.');
				redirect('auth2','refresh');
			}
			elseif ($status == 'ERR_INVALID_PASSWORD') {
				$this->session->set_flashdata('result_login', '<br>Maaf, email atau Password yang anda masukkan salah.');
               redirect('auth2','refresh');
			}
			else
			{
				// success
				// store the user data to session
				$this->session->set_userdata($this->auth2->get_data());
				$this->session->set_userdata("logged_in", true);
				// redirect to dashboard
				redirect('home','refresh');
			}
			
		}
 
		$this->load->view('auth2');

	}


	public function logout()
	{
		$this->session->unset_userdata("logged_in");
		$this->session->sess_destroy();
		redirect("auth2");
	}

	public function forget()
	{
		$this->load->view('forget');
	}

}