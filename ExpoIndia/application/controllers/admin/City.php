<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('admin_id')=='')
		{
			redirect('admin/Login');
		}
		$this->load->model('admin/City_model');
		$id=$this->session->userdata('admin_id');
		$this->db->where('id',$id);
		$qry=$this->db->get('admin');
		$res=$qry->row_array();
		$arr['data']=$res;
		$this->db->where('status',0);
		$qry=$this->db->get('exhibitor');
		$arr['reg_exhibitor']=$qry->result_array();

		$this->load->view('admin/header',$arr);
	}
	function index(){
		if(@$this->input->post('save'))
		{
			
			$this->City_model->add_city();
			
		}
			$this->load->library('pagination');
			$per_page=3;
			$start=0;
			$start=$this->uri->segment(4);
			$total=$this->City_model->rowcount();
			$config['total_rows']=$total;
			$config['base_url']=site_url('admin/City/index');
			$config['per_page']=$per_page;
			$config['full_tag_open']='<div class="pagination">';
			$config['full_tag_close']='</div>';
			$config['cur_tag_open']='<a class="active">';
			$config['cur_tag_close']='</a>';
			$this->pagination->initialize($config);
			$arr['row']=$this->City_model->viewdata($per_page,$start);
			$arr['state_name']=$this->City_model->get_state();
			$this->load->view('admin/city_page',$arr);
			//heu
			
			/*$arr['row']=$this->Admin_model->get_data();		
			$this->load->view('admin/view_admin',$arr);*/
		}
	function delete_city($id='')
	{
		$this->City_model->deletedata($id);
	}
	function update_city($id='')
	{
		$arr=array();
		$arr['city']=$this->City_model->get_one($id);
		//print_r($arr);die;
		$arr['state_name']=$this->City_model->get_state();
		if(@$this->input->post('save'))
		{
			$this->City_model->updatecity($id);
		}
		$this->load->view('admin/city_page',$arr);
	}
}