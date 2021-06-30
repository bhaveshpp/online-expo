<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exhibition extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
	}
	public function index($id='*',$type='')
	{
		$arr=array();

		if (@$type) {
			$arr['run_expo']=$type;
			$res=$this->db->query("select * from exhibition_image where exhibition_id=".$id);
			$arr['gallary']=$res->result_array();
		}
		else
		{
			$res=$this->db->query("select * from stall_category c,stall s where c.id=s.category_id and s.exhibition_id=".$id);
			$arr['category']=$res->result_array();

			$this->db->select('count(stall_no) book');
			$this->db->where('exhibition_id',$id);
			$sql = $this->db->get('stall_booking');
			$row=$sql->row_array();
			$arr['total_booked_stall']=$row['book'];
		
		}
		$res=$this->db->query("select * from exhibition_image where exhibition_id=".$id);
		$arr['gallary']=$res->result_array();

		$this->db->where('exhibition_id',$id);
		$q=$this->db->get('stall');
		$arr['stall']=$q->result_array();

		
		
		$this->db->select('sum(count) count');
		$sql = $this->db->get('user');
		$row=$sql->row_array();
		$arr['visitor']=$row['count'];

	
	
		
		$this->db->where('id',$id);
		$qry=$this->db->get('exhibition');
		$arr['cur_expo']=$qry->row_array();

		$this->load->view('visitor/exhibition_page',$arr);
	}
	function select_run_expo()
	{
		$start = $this->input->post('start') ? $this->input->post('start') :0;
		$arr['expo']=$this->running_expo($start);
		$arr['type']='run';
		$this->load->view('ajax_expo',@$arr);
	}

	function select_up_expo()
	{
		$start = $this->input->post('start') ? $this->input->post('start') :0;
		$arr['expo']=$this->upcoming_expo($start);
		$arr['type']='up';
		$this->load->view('ajax_expo',@$arr);
	}
	function select_pre_expo()
	{
		$start = $this->input->post('start') ? $this->input->post('start') :0;
		$arr['expo']=$this->previous_expo($start);
		$arr['type']='pre';
		$this->load->view('ajax_expo',@$arr);
	}
	function book($id="",$cat='')
	{
		if($this->session->userdata('customer_id')=='')
		{
			redirect('customer/Login/index/'.$id.'/'.$cat);
		}
			redirect('customer/Customer/book/'.$id.'/'.$cat);
		//$this->load->view("customer/booking_page",$data);


	}
	function running_expo($start=0)
	{
		//SELECT * FROM exhibition WHERE start_date <= CURDATE() and end_date >= CURDATE();
		 $date=date('Y-m-d');
		$qry=$this->db->query("select * from exhibition where start_date<= CURDATE() and end_date>= CURDATE() and status=1 LIMIT $start,4");
		//echo $this->db->last_query();die;
		return $qry->result_array();
		
	}
	function upcoming_expo($start=0)
	{
		//SELECT * FROM exhibition WHERE start_date <= CURDATE() and end_date >= CURDATE();
		 $date=date('Y-m-d');
		$qry=$this->db->query("select * from exhibition where start_date > CURDATE() and status=1 LIMIT $start,4");
		//echo $this->db->last_query();die;
		return $qry->result_array();
	
	}
	function previous_expo($start=0)
	{
		//SELECT * FROM exhibition WHERE start_date <= CURDATE() and end_date >= CURDATE();
		 $date=date('Y-m-d');
		$qry=$this->db->query("select * from exhibition where end_date < CURDATE() and status=1 LIMIT $start,4");
		//echo $this->db->last_query();die;
		return $qry->result_array();
		
	}
}
