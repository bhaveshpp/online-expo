<?php
class City_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function rowcount(){
		$qry=$this->db->get('city');
		return $qry->num_rows();
	}
	function viewdata($per_page=3,$start=0){
				$this->db->limit($per_page,$start);
				$this->db->order_by('id','desc');
				$qry=$this->db->get('city');
				$arr=$qry->result_array();
      return $arr;
	}
	function get_city(){
				$qry=$this->db->get('city');
      			return $qry->result_array();
	}
	function add_city()
	{
		$name=$this->input->post('name');	
		$state_id=$this->input->post('state_id');		
		
			$config['upload_path']          = './assets/web_images/city/';
                $config['allowed_types']        = 'jpg|png';
                $this->load->library('upload', $config);
				
				if($this->upload->do_upload('image')){
					$image=$this->upload->data('file_name');
					$arr=array('state_id'=>$state_id,'name'=>$name,'image'=>$image);
					$this->db->insert('city',$arr);
				}
				else{
					echo $this->upload->display_errors();
				}
		//echo $this->db->last_query();
	}
	function deletedata($id='')
	{
		$this->db->where('id',$id);
		$this->db->delete('city');
		//echo $this->db->last_query();
		redirect('admin/City');
	}
	function get_one($id='')
	{
		$this->db->where('id',$id);
		$qry=$this->db->get('city');
		return $qry->row_array();
	}
	function updatecity($id='')
	{
		$arr=$this->get_one($id);
		$name=$this->input->post('name');
		$state_id=$this->input->post('state_id');		

				$config['upload_path']          = './assets/web_images/city/';
                $config['allowed_types']        = 'jpg|png';
                $this->load->library('upload', $config);
				/**/
				if($this->upload->do_upload('image')){
					unlink('./assets/admin/city/images/'.$arr['image']);
					$image=$this->upload->data('file_name');
					$arr=array('state_id'=>$state_id,'name'=>$name,'image'=>$image);
					$this->db->where('id',$id);
					$this->db->update('city',$arr);
					
				}
				else
				{
					$arr=array('state_id'=>$state_id,'name'=>$name);
					$this->db->where('id',$id);
					$this->db->update('city',$arr);
				
				}
		//echo $this->db->last_query();
		redirect('admin/City');
	}
	function get_state(){
		$qry=$this->db->get('state');
		return $qry->result_array(); 
	}
}