<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		//echo '<pre>';print_r($this->session->all_userdata());die;
		if($this->session->userdata('customer_id')=='')
		{
			redirect('customer/Login');
		}
		$id=$this->session->userdata('customer_id');
		$this->db->where('id',$id);
		$qry=$this->db->get('customer');
		$res=$qry->row_array();
		$arr['data']=$res;
		$this->load->view('customer/header',$arr);
	}
	public function index()
	{
		//$arr=array();
		//$this->load->view('customer/dashboard_page',$arr);
		$this->all_expo();
	}
	function logout()
	{
		if($this->session->userdata('customer_id'))
		{
		$this->session->unset_userdata('customer_id');
		}
		redirect('customer/Customer');
	}

	/********** Profile ****************/
	public function profile()
	{
		$id=$this->session->userdata('customer_id');
		$arr['data']=get_data($id,'id','customer');
		$arr['user']='customer';
		$this->load->view('comman/profile_page',$arr);
	}

	function edit_profile()
	{
		$arr['edit']=true;
		$id=$this->session->userdata('customer_id');
		$arr['data']=get_data($id,'id','customer');
		$arr['user']='customer';
		$this->load->view('comman/profile_page',$arr);
		if (post('submit')) {
			$name=post('name');
			$mobile=post('mobile');
			$business=post('business');
			if(file_upload('./assets/web_images/customer/','jpg|png','image'))
				{
					delete_image($id,'id','customer','./assets/web_images/customer/','image');
					$image=$this->upload->data('file_name');
					$row=array('name'=>$name,'business'=>$business,'mobile'=>$mobile,'image'=>$image);
					$this->db->where('id',$id);
					$this->db->update('customer',$row);
					redirect('customer/Customer/profile');
				}
				else
				{
					$row=array('name'=>$name,'business'=>$business,'mobile'=>$mobile);
					$this->db->where('id',$id);
					$this->db->update('customer',$row);
					redirect('customer/Customer/profile');
				}
		}
	}

	function change_password()
	{
		$arr=array();
		$id=$this->session->userdata('customer_id');
		$data=get_data($id,'id','customer');
		$pass=$data['password'];
        $this->load->library('form_validation');
		$this->form_validation->set_rules('opass', 'Old password', 'required');
	    $this->form_validation->set_rules('npass', 'New Password', 'required');
		$this->form_validation->set_rules('cpass', 'Conform Password', 'required|matches[npass]');

	if(@$this->input->post('save'))
		{
			$opass=$this->input->post('opass');
			if($data['password']!=$opass)
			{
				$arr['opm']="Please Enter Your Correct Old Password";
			}
			  if ($this->form_validation->run() == FALSE)
                {	
				
							$arr['opass']=set_value('opass');
							$arr['npass']=set_value('npass');
							$arr['cpass']=set_value('cpass');
                }
				else
				 {
						$x['password']=$this->input->post('cpass');
						$this->db->where('id',$id);
						$this->db->update('customer',$x);
						redirect("customer/Customer/logout");
				 }
		}
		$arr['data']=get_data($id,'id','customer');
		$arr['user']='customer';
		$this->load->view('comman/change_password_page',$arr);
	}
	

	/***********************************/
	

	function calender()
	{
		$this->db->order_by('id','desc');
		$this->db->where('status',1);
		$this->db->limit(8,0);
		$all=$this->db->get("exhibition");
		$arr['expo']=$all->result_array();
		$this->load->view('comman/calender',@$arr);
	}

	function book($id="",$cat='')
	{
		if($this->session->userdata('customer_id')=='')
		{
			redirect('customer/Login/index/'.$id.'/'.$cat);
		}
			

			$this->db->where('id',$cat);
			$qry=$this->db->get('stall_category');
			$arr=$qry->row_array();
			$data['stall_category']=$arr;

			$this->db->where('id',$id);
			$qry=$this->db->get('exhibition');
			$arr=$qry->row_array();
			$data['expo']=$arr;

			$this->db->where('exhibition_id',$id);
			$this->db->where('category_id',$cat);
			$qry=$this->db->get('stall');
			$arr=$qry->row_array();
			//print_r($arr);die;

			$qry1=$this->db->get('stall');
			$arr1=$qry1->result_array();
			$data['stall']=$arr;

			$data['num']=$arr['stalls'];
			$data['ex_id']=$id;
			$data['cat_id']=$cat;
			$this->db->where('exhibition_id',$id);
			$this->db->where('cat_id',$cat);
			$qr=$this->db->get('stall_booking');
			$data['booked_stall_no']=$qr->result_array();
			$data['owner']=$this->booked($id,$cat);

		$this->load->view("customer/booking_page",$data);
	}
	function booked($id='',$cat='')
	{
		$this->db->select('stall_booking.*,customer.*');
	    $this->db->from('stall_booking');
	    $this->db->join('customer', 'stall_booking.customer_id = customer.id', 'right outer'); 
	    $query = $this->db->get();
	    return $query->result();
	    

	}

	function booking($ex_id='',$cat_id='',$stallno='',$t_id='')
	{
		$user_id=$this->session->userdata("customer_id");
		$arr=array('exhibition_id'=>$ex_id,'customer_id'=>$user_id,'cat_id'=>$cat_id,'stall_no'=>$stallno,'transection_id'=>$t_id);
		$this->db->insert('stall_booking',$arr);
		redirect('customer/Customer/book/'.$ex_id."/".$cat_id);
	}

	function all_expo()
	{
		$arr=array();
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		$this->db->where('status',1);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/customer/Customer/all_expo');
		$page_link=pagination($total,$per_page,$base_url);
 
 		$this->db->where('status',1);
		$this->db->order_by('id','desc');
		$this->db->limit($per_page,$start);
		$qry=$this->db->get('exhibition');
		$arr['row']=$qry->result_array();
		if($total==0){
			$arr['err1']="No Record Found";
			$this->load->view('exhibitor/view_exhibition_page',$arr);
		}
		else{
			$arr['city']=get_table('city');
			$arr['page_link']=$page_link;
			$this->load->view('customer/all_expo_page',$arr);
		}
	}

	function detail_exhibition($id='')
	{
		$arr=array();
		$sql='select cat_id,count(stall_no) stall from stall_booking where exhibition_id='.$id.' GROUP by cat_id';
		$res=$this->db->query($sql);
		$arr['booked']=$res->result_array();
		
	
		$this->db->where('exhibition_id',$id);
		$res=$this->db->get('stall');
		$arr["stall"]=$res->result_array();
		
		$this->db->where('id',$id);
		$qry=$this->db->get('exhibition');
		$arr["row"]=$qry->row_array();
		//p($arr);die;
		$row=get_data($id,'id','exhibition');
		$city=$row['city'];
		$state=$row['state'];
		$category=$row['category'];
		$arr['expo']=get_data($id,'id','exhibition');
		$arr['city']=get_data($city,'id','city');
		$arr['category']=get_data($category,'id','category');
		$arr['state']=get_data($state,'id','state');
		$arr['id']=$id;
		$this->load->view('customer/detail_exhibition_page',@$arr);
		
	}


	public function view_photos()
	{
		$data=array();
		$sql='select DISTINCT(exhibition_id) FROM exhibition_image';
		$q=$this->db->query($sql);
		$start=0;
		$start=$start=$this->uri->segment(4);
		$total=$q->num_rows();
		$per_page=1;
		$base_url=site_url('/customer/Customer/view_photos');
		$page_link=pagination($total,$per_page,$base_url);
		$data['page_link']=$page_link;
		$this->db->select('exhibition_image.*');
    	$this->db->from('exhibition');
   	 	$this->db->join('exhibition_image', 'exhibition.id = exhibition_image.exhibition_id', 'full outer'); 
    	$query = $this->db->get();
    	$data['key']= $query->result_array();
		foreach ($data['key'] as $k => $a) {$ar[$k]=$a['exhibition_id'];}
		$this->db->select('id');
		$this->db->select('title');
		$this->db->where('status',1);
		$this->db->where_in('id', $ar);
		$this->db->order_by('id','desc');
		$this->db->limit($per_page,$start);
		$q1=$this->db->get('exhibition');
		$data['exhi']=$q1->result_array();
		$this->load->view('comman/view_gallary_page',$data);
	}
	function booked_stall()
	{
		$user_id=$this->session->userdata("customer_id");
		$this->db->where('customer_id',$user_id);
		$this->db->order_by('id','desc');
		$q=$this->db->get('stall_booking');
		
		$start=0;
		$start=$start=$this->uri->segment(4);
		$total=$q->num_rows();
		$per_page=4;
		$base_url=site_url('/customer/Customer/booked_stall');
		$page_link=pagination($total,$per_page,$base_url);
		$data['page_link']=$page_link;
		




		$this->db->limit($per_page,$start);
		$this->db->where('customer_id',$user_id);
		$this->db->order_by('id','desc');
		$qry=$this->db->get('stall_booking');
		$arr=$qry->result_array();
		$data['stall_booking']=$arr;
		//p($data['stall_booking']);//die;

		$this->db->select('id,title,helpline,status');
		$qry=$this->db->get('exhibition');
		$arr=$qry->result_array();
		$data['exhibition']=$arr;
		//p($data['exhibition']);//die;

		
		$qry=$this->db->get('stall');
		$arr=$qry->result_array();
		$data['stall']=$arr;
		//p($data['stall']);die;


		

		$this->load->view('customer/booked_stall_page',$data);
	}
}
?>