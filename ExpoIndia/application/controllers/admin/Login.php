<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if(@$this->session->userdata('admin_id'))
		{
			redirect('admin/Admin');
		}
		
	}
	public function index()
	{
		$err=array();
		if($this->input->post())
		{	
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->db->where('email',$email);
			$this->db->where('password',$password);
			$qry=$this->db->get('admin');
			$num=$qry->num_rows();
			if($num==1)
			{
				$arr=$qry->row_array();
				$this->session->set_userdata('admin_id',$arr['id']);
				redirect('admin/Admin');
			}
			else
			{
				$err['err']="invalide";
			}
		}
		$this->load->view('admin/login_page',$err);

	}
}
