<?php
class State_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function rowcount(){
		$qry=$this->db->get('state');
		return $qry->num_rows();
	}
	function viewdata($per_page=3,$start=0){
				$this->db->limit($per_page,$start);
				$this->db->order_by('id','desc');
				$qry=$this->db->get('state');
				$arr=$qry->result_array();
      return $arr;
	}
	function add_state($name)
	{
		$this->db->insert('state',$name);
	//	echo $this->db->last_query();
	
	}
	function deletedata($id='')
	{
		$this->db->where('id',$id);
		$this->db->delete('state');
		redirect('admin/State');
	}
	function get_one($id='')
	{
		$this->db->where('id',$id);
		$qry=$this->db->get('state');
		return $qry->row_array();
	}
	function updatestate($id='')
	{
		$name=$this->input->post('name');
		$arr=array('name'=>$name);
		$this->db->where('id',$id);
		$this->db->update('state',$arr);
		//echo $this->db->last_query();
		redirect('admin/State');
	}
}