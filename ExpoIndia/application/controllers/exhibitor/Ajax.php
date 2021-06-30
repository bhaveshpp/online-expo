<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		//echo '<pre>';print_r($this->session->all_userdata());die;
		if($this->session->userdata('exhibitor_id')=='')
		{
			redirect('exhibitor/Login');
		}
	}

/*********** Ajax Select city through State **************/
	function select_city()
	{
		$state_id= $this->input->post('sid');
		$this->db->where('state_id',$state_id);
		$qry = $this->db->get('city');
		$arr['city']=$qry->result_array();
		$this->load->view('exhibitor/ajax_city',@$arr);
	}
/*********************************************************/
	function select_cat()
	{
		$ex_id=$this->input->post('ex_id');
		$this->db->where('exhibition_id',$ex_id);
		$qry = $this->db->get('stall');
		$res=$qry->result_array();
		
		foreach ($res as $key => $a) {
    		$ar[$key]=$a['category_id'];

    	}
		$this->db->where_not_in('id',$ar);
		$qry1 = $this->db->get('stall_category');
		$arr['stall_category']=$qry1->result_array();
		$this->load->view('exhibitor/ajax_catagory',@$arr);
	}
	function update_status($id='')
	{
		$arr=array();
		$arr['status']=1;
		$this->db->where('id',$id);
		$this->db->update('exhibition',$arr);
		redirect("exhibitor/exhibitor/detail_exhibition/".$id);
	}
}
?>