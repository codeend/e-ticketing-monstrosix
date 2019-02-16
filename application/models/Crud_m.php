<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_m extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set('Asia/Jakarta');
	}
	
	public function create($table, $data) {
		return $this->db->insert($table, $data);
	}
	
	public function read($table, $where = null, $order_by = null, $limit = null, $distinct = null, $select = null, $group_by = null, $having = null) {
		
		if ($where != null)
			$this->db->where($where);
		
		if ($order_by != null)
			$this->db->order_by($order_by);
		
		if ($limit != null)
			$this->db->limit($limit);
		
		if ($distinct != null)
			$this->db->distinct();
		
		if ($select != null)
			$this->db->select($select);
		
		if ($group_by != null)
			$this->db->group_by($group_by);
		
		if ($having != null)
			$this->db->having($having);
		
		return $this->db->get($table);
	}
	
	public function update($table, $data, $where) {
		return $this->db->update($table, $data, $where);
	}
	
	public function delete($table, $where = null) {
		if ($where != null)
			return $this->db->delete($table, $where);
		else
			return $this->db->empty_table($table);
	}
}