<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class register_model extends CI_Model
{

    public $table = 'pemesan';
    public $id_pemesan = 'id_pemesan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id_pemesan, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id_pemesan
    function get_by_id_pemesan($id_pemesan)
    {
        $this->db->where($this->id_pemesan, $id_pemesan);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pemesan', $q);
	$this->db->or_like('Nama', $q);
	$this->db->or_like('jenis_k', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('provinsi', $q);
	$this->db->or_like('kota', $q);
	$this->db->or_like('kode_pos', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('telepon', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id_pemesan, $this->order);
       
        $this->db->like('id_pemesan', $q);
	$this->db->or_like('Nama', $q);
	$this->db->or_like('jenis_k', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('provinsi', $q);
	$this->db->or_like('kota', $q);
	$this->db->or_like('kode_pos', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
    $this->db->or_like('telepon', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

}
