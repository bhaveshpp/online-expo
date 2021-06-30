<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {





	
	public function index()
	{
		$arr=array();
		$all=$this->db->query("select * from exhibition where status= 1 LIMIT 0,8");
		$run=$this->db->query("select * from exhibition where start_date <= CURDATE() and end_date >= CURDATE() and status=1 LIMIT 0,4");
		$upc=$this->db->query("select * from exhibition where start_date > CURDATE() and status=1 LIMIT 0,4");
		$pre=$this->db->query("select * from exhibition where end_date < CURDATE() and status=1 LIMIT 0,4");
		//echo $this->db->last_query();die;
		$arr['exhibition']=$all->result_array();
		$arr['running_expo']=$run->result_array();
		$arr['upcoming_expo']=$upc->result_array();
		$arr['previous_expo']=$pre->result_array();
		$arr['category']=get_table('category');
		$arr['city']=get_table('city');
		$this->load->view('visitor/home_page',@$arr);
	}
	function count()
	{
		$ip = $this->input->get('user_ip');
		{
			$this->db->where('ip',$ip);
			$sql = $this->db->get('user');
			$cnt = $sql->num_rows();
			if($cnt<=0)
			{
				$arr = array('ip'=>$ip);
				$sql =$this->db->insert("user",@$arr);
				echo $this->db->last_query();
			}
			else{
				$arr=$sql->row_array();
				$count=$arr['count'];
				$count++;
				$count_arr=array('count'=>$count);
				$this->db->where('ip',$ip);
				$this->db->update("user",@$count_arr);
		}
	}
	}
}
