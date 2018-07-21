<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth2_model extends CI_Model {

	private $table = "pemesan";
	private $_data = array();

	public function validate()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->db->select('id_pemesan, email, password, Nama');
		$this->db->where("email", $email);

		$query = $this->db->get($this->table);

		if ($query->num_rows()) 
		{
			// found row by username	
			$row = $query->row_array();

			// now check for the password
			if ($row['password'] == sha1($password)) 
			{
				// we not need password to store in session
				unset($row['password']);
				$this->_data = $row;
				return 'ERR_NONE';
			}

			// password not match
			return 'ERR_INVALID_PASSWORD';
		}
		else {
			// not found
			return 'ERR_INVALID_USERNAME';
		}
	}

	public function get_data()
	{
		return $this->_data;
	}

	public function get_id()
	{
		# code...
	}

}