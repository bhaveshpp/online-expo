<?php
class Category_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function rowcount(){
		$qry=$this->db->get('category');
		return $qry->num_rows();
	}
	function viewdata($per_page=3,$start=0){
				$this->db->limit($per_page,$start);
				$this->db->order_by('id','desc');
				$qry=$this->db->get('category');
				$arr=$qry->result_array();
      return $arr;
	}
	function add_category($name)
	{
		$this->db->insert('category',$name);
	//	echo $this->db->last_query();
	
	}
	function deletedata($id='')
	{
		$this->db->where('id',$id);
		$this->db->delete('category');
		///echo $this->db->last_query();
		redirect('admin/Category');
	}
	function get_one($id='')
	{
		$this->db->where('id',$id);
		$qry=$this->db->get('category');
		return $qry->row_array();
	}
	function updatecategory($id='')
	{
		$name=$this->input->post('name');
		$arr=array('name'=>$name);
		$this->db->where('id',$id);
		$this->db->update('category',$arr);
		//echo $this->db->last_query();
		redirect('admin/Category');
	}
	function get_category()
	{
				$qry=$this->db->get('category');
      			return $qry->result_array();
	}
}