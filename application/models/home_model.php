<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_model {

	public function __construct()
	{
		$this->load->database();
    }
    
    public function get_filmkategori($foto = FALSE)
	{	
			if ($foto === FALSE)
		{
			$query = $this->db->get('barang');	
			
		return $query->result_array();
				
					
		}
			
		$this->db->select('*');
		$this->db->from('barang');
			$this->db->where(array('foto' => $foto));
			$query = $this->db->get();
			 return $query->row_array();
	}

	


}

