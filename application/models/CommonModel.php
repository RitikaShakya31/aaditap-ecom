<?php

class CommonModel extends CI_Model
{
	public function insertRow($table, $post)
	{
		$post['create_date'] = setDateTime();
		$clean_post = $this->security->xss_clean($post);
		return $this->db->insert($table, $clean_post);
	}

	

	public function insertRowWithXSS($table, $post)
	{
		$post['create_date'] = setDateTime();
		return $this->db->insert($table, $post);
	}

	function insertRowReturnId($table, $post)
	{
		$post['create_date'] = setDateTime();
		$clean_post = $this->security->xss_clean($post);
		$this->db->insert($table, $clean_post);
		return $this->db->insert_id();
	}

	function insertRowReturnIdWithClean($table, $post)
	{
		$post['create_date'] = setDateTime();
		$this->db->insert($table, $post);
		return $this->db->insert_id();
	}

	function insertRowInBatch($table, $post)
	{
		$clean_post = $this->security->xss_clean($post);
		return $this->db->insert_batch($table, $clean_post);
	}

	function updateRowById($table, $column, $id, $data)
	{
		$clean_post = $this->security->xss_clean($data);
		$clean_post['update_date'] = setDateTime();
		$this->db->set($clean_post)
			->where($column, $id)
			->update($table);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function updateRowByMoreId($table, $where, $data)
	{
		$clean_post = $this->security->xss_clean($data);
		$clean_post['update_date'] = setDateTime();
		$this->db->set($clean_post)
			->where($where)
			->update($table);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function updateRowByIdWithOutXss($table, $where, $data)
	{
		$this->db->set($data)
			->where($where)
			->update($table);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getAllRows($table)
	{
		$get = $this->db->select()
			->from($table)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getAllRowsInOrder($table, $orderColumn, $orderType)
	{
		$get = $this->db->select()
			->from($table)
			->order_by($orderColumn, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}


	public function getRowById($table, $column, $id)
	{
		$get = $this->db->select()
			->from($table)
			->where($column, $id)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getRowByIdInOrder($table, $where, $orderColumn, $orderType)
	{
		$get = $this->db->select()
			->from($table)
			->where($where)
			->order_by($orderColumn, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}
	public function getAllRowsInOrderWithLimit($table, $limit, $orderColumn, $orderType)
	{
		$get = $this->db->select()
			->from($table)
			->limit($limit)
			->order_by($orderColumn, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}
	public function getRowByIdInMultiOrder($table, $where, $order)
	{
		$get = $this->db->select()
			->from($table)
			->where($where)
			->order_by($order)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getRowByMoreId($table, $where)
	{
		$get = $this->db->select()
			->from($table)
			->where($where)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}	

	public function getSingleRowById($table, $where)
	{
		$get = $this->db->select()
			->from($table)
			->where($where)
			->get();
		if ($get->num_rows() > 0) {
			return $get->row_array();
		} else {
			return false;
		}
	}

	public function deleteRowById($table, $where)
	{
		return $this->db->where($where)->delete($table);
	}

	public function getNumRows($table, $where)
	{
		$ci = &get_instance();
		$get = $ci->db->select()
			->from($table)
			->where($where)
			->get();
		return $get->num_rows();
	}

	public function getColumnById($selectColumn, $table, $where)
	{
		$get = $this->db->select($selectColumn)
			->from($table)
			->where($where)
			->get();
		if ($get->num_rows() > 0) {
			return $get->row_array();
		} else {
			return false;
		}
	}


	public function getSumById($selectColumn, $table, $where)
	{
		$get = $this->db->select_sum($selectColumn)
			->from($table)
			->where($where)
			->get();
		if ($get->num_rows() > 0) {
			return $get->row_array();
		} else {
			return false;
		}
	}

	public function getRowByLikeInOrder($table, $where, $like, $name, $orderBy, $orderType)
	{
		$ci = &get_instance();
		$get = $ci->db->select()
			->from($table)
			->where($where)
			->like($like, $name, 'both')
			->order_by($orderBy, $orderType)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getRowByLikeInOrderWithLimit($table, $where, $like, $name, $orderBy, $orderType, $limit)
	{
		$ci = &get_instance();
		$get = $ci->db->select()
			->from($table)
			->where($where)
			->like($like, $name, 'both')
			->order_by($orderBy, $orderType)
			->limit($limit)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}
	public function getRowByOrderWithLimit($table, $where,  $orderBy, $orderType, $limit)
	{
		$ci = &get_instance();
		$get = $ci->db->select()
			->from($table)
			->where($where)

			->order_by($orderBy, $orderType)
			->limit($limit)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getRowByWhereIn($table, $column, $value)
	{
		$get = $this->db->select()
			->from($table)
			->where_in($column, $value)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getSingleRowByIdInOrder($table, $where, $orderColumn, $orderBy)
	{
		$get = $this->db->select()
			->from($table)
			->where($where)
			->order_by($orderColumn, $orderBy)
			->get();
		if ($get->num_rows() > 0) {
			return $get->row_array();
		} else {
			return false;
		}
	}

	public function getSingleRowByIdrand($table, $where)
	{
		$get = $this->db->select()
			->from($table)
			->where($where) 
			->order_by('rand()')
			->limit('3')
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function runQuery($query, $type = 1)
	{
		$query = $this->db->query($query);
		if ($query->num_rows() > 0) {
			return $type == 1 ? $query->result_array() : $query->row_array();
		} else {
			return false;
		}
	}

	public function getRowWithMultiJoin($select, $table, $searchQuery, $join_multi_array, $order_column, $order, $type = 1)
	{
		$get = $this->db->select($select);
		$this->db->from($table);
		if (count($join_multi_array) != 0 && is_array($join_multi_array)) {
			for ($i = 0; $i <  count($join_multi_array); $i++) {
				if (count($join_multi_array[$i]) == 2) {
					$this->db->join($join_multi_array[$i][0], $join_multi_array[$i][1]);
				} elseif (count($join_multi_array[$i]) == 3) {
					$this->db->join($join_multi_array[$i][0], $join_multi_array[$i][1], $join_multi_array[$i][2]);
				}
			}
		}
		$this->db->where($searchQuery);
		$this->db->order_by($order_column, $order);
		$get = $this->db->get();
		if ($get->num_rows() > 0) {
			return $type == 1 ? $get->result_array() : $get->row_array();
		} else {
			return false;
		}
	}

	public function getRowByIdfield($table, $column, $id, $field)
	{
		$get = $this->db->select($field)
			->from($table)
			->where($column, $id)
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}

	public function getRowByOr($table, $where, $or_where)
	{
		$get = $this->db->select()
			->from($table)
			->group_start()
			->where($where)
			->or_where($or_where)
			->group_end()
			->get();
		if ($get->num_rows() > 0) {
			return $get->result_array();
		} else {
			return false;
		}
	}
}
