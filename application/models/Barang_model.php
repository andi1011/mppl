<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    public $table = 'barang';
    public $id = 'id_barang';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_barang', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('foto', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('warna', $q);
	$this->db->or_like('bahan', $q);
	$this->db->or_like('M', $q);
	$this->db->or_like('L', $q);
	$this->db->or_like('XL', $q);
	$this->db->or_like('XXL', $q);
	$this->db->or_like('XXXL', $q);
    $this->db->or_like('harga', $q);    
	$this->db->or_like('diskon', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_barang', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('foto', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('warna', $q);
	$this->db->or_like('bahan', $q);
	$this->db->or_like('M', $q);
	$this->db->or_like('L', $q);
	$this->db->or_like('XL', $q);
	$this->db->or_like('XXL', $q);
	$this->db->or_like('XXXL', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('diskon', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-12 06:31:32 */
/* http://harviacode.com */