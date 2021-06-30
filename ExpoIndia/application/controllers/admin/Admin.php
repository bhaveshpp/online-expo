<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller 
{







	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('admin_id')=='')
		{
			redirect('admin/Login');
		}
		$arr=array();
		$id=$this->session->userdata('admin_id');
		$this->db->where('id',$id);
		$qry=$this->db->get('admin');
		$res=$qry->row_array();
		$arr['data']=$res;
		$this->db->where('status',0);
		$qry=$this->db->get('exhibitor');
		$arr['reg_exhibitor']=$qry->result_array();
		$arr['user']='admin';
		$this->load->view('admin/header',@$arr);

	}
	public function index()
	{
		$sql="select exhibitor.name,exhibition.title,payment.price from exhibitor,exhibition,payment where exhibition.exhibitor_id=exhibitor.id and payment.exhibition_id=exhibition.id";
		$res=$this->db->query($sql);
		$per_page=6;
		$start=0;
		if(@$this->uri->segment(4)){$start=@$this->uri->segment(4);}
		
		$total=$res->num_rows();
		$base_url=site_url('admin/Admin/index/');
	
		$data['page_link']=pagination($total,$per_page,$base_url);

		$sql="select exhibitor.name,exhibition.title,payment.price from exhibitor,exhibition,payment where exhibition.exhibitor_id=exhibitor.id and payment.exhibition_id=exhibition.id limit $start,$per_page";
		$res=$this->db->query($sql);
		
		$data['payment']=$res->result_array();

		$data['exhibitor']=count_record("exhibitor");
		$data['visitors']=count_record("user");
		$data['customer']=count_record("customer");
		$this->db->select('sum(count) count');
		$sql = $this->db->get('user');
		$row=$sql->row_array();
		$data['visits']=$row['count'];

		$all=count_record("exhibition");
		$this->db->select('count(id) count');
		$this->db->where('status',1);
		$sql = $this->db->get('exhibition');
		$row=$sql->row_array();
		$published=$row['count'];
		$data['precentage']=100*$published/$all;
		$this->db->limit(8,0);
		$this->db->order_by('id','desc');
		$data['all_exhibitor']=get_table('exhibitor');
		
		$this->load->view('admin/dashboard_page',@$data);
	}
	function logout()
	{
		if($this->session->userdata('admin_id'))
		{
			$this->session->unset_userdata('admin_id');
		}
		redirect('admin/Login');
	}
	
	/********** Profile ****************/
		public function profile()
	{
		$id=$this->session->userdata('admin_id');
		$arr['data']=get_data($id,'id','admin');
		$arr['user']='admin';
		$this->load->view('comman/profile_page',$arr);
	}

	function edit_profile()
	{
		$arr['edit']=true;
		$arr['user']='admin';
		$id=$this->session->userdata('admin_id');
		$arr['data']=get_data($id,'id','admin');
		$this->load->view('comman/profile_page',$arr);
		if (post('submit')) {
			$name=post('name');
			if(file_upload('./assets/web_images/admin/','jpg|png','image'))
				{
					delete_image($id,'id','admin','./assets/web_images/admin/','image');
					$image=$this->upload->data('file_name');
					$row=array('name'=>$name,'image'=>$image);
					$this->db->where('id',$id);
					$this->db->update('admin',$row);
					redirect('admin/Admin/profile');
				}
				else
				{
					$row=array('name'=>$name);
					$this->db->where('id',$id);
					$this->db->update('admin',$row);
					redirect('admin/Admin/profile');
				}
		}
	}

	function change_password()
	{
		$arr=array();
		$id=$this->session->userdata('admin_id');
		$data=get_data($id,'id','admin');
		$pass=$data['password'];
        $this->load->library('form_validation');
		$this->form_validation->set_rules('opass', 'Old password', 'required');
	    $this->form_validation->set_rules('npass', 'New Password', 'required');
		$this->form_validation->set_rules('cpass', 'Conform Password', 'required|matches[npass]');

	if(@$this->input->post('save'))
		{
			//echo $this->form_validation->run();
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
						//echo "yes";
						$arr['password']=$this->input->post('cpass');
						$this->db->where('id',$id);
						$this->db->update('admin',$arr);
						redirect("admin/Admin/logout");
				 }
		}
		$arr['data']=get_data($id,'id','admin');
		$arr['user']='admin';
		$this->load->view('comman/change_password_page',$arr);
	}

	function add_admin()
	{
		$arr=array();
        $this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'User name', 'required|alpha');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[16]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

	if(@$this->input->post())
		{
			//echo $this->form_validation->run();
			  if ($this->form_validation->run() == FALSE)
                {	
							$arr['name']=set_value('name');
							$arr['email']=set_value('email');
							$arr['password']=set_value('password');
                }
				else
				 {
				 	$email=$this->input->post('email');
				 	$this->db->where('email',$email);
					$qry=$this->db->get('admin');
					$num=$qry->num_rows();
						if($num==0){
			
				 			if($_FILES['image']['name']=='') {
								$arr['file_error']='please upload image';
								$arr['name']=set_value('name');
								$arr['email']=set_value('email');
								$arr['password']=set_value('password');
							}
							else{
								$name=$this->input->post('name');
								$email=$this->input->post('email');
								$password=$this->input->post('password');

								if(file_upload('./assets/web_images/admin/','gif|jpg|png|jpeg','image')){
									$image=$this->upload->data('file_name');
									$arr=array('name'=>$name,'email'=>$email,'password'=>$password,'image'=>$image);
									$this->db->insert('admin',$arr);
									redirect('admin/Admin/view_admin');
								}
								else{
									echo $this->upload->display_errors();die;
								}
									
							}
						}else{$arr['exist']='Record Exist';}
				 }
		}
		$this->load->view('admin/add_admin_page',$arr);
	}
	
	function view_admin(){
		
		$per_page=3;
		$start=0;
		$start=$this->uri->segment(4);
		$total=count_record('admin');
		$base_url=site_url('admin/Admin/view_admin');
		
		$arr['page_link']=pagination($total,$per_page,$base_url);
		$user=$this->session->userdata('admin_id');
		// $this->db->where('id!=',$user);
		$this->db->limit($per_page,$start);
		$this->db->order_by('id','desc');
		$q1=$this->db->get('admin');
		$arr['row']=$q1->result_array();

		$this->load->view('admin/view_admin_page',$arr);
		
	}

	function update_admin($id='')
	{
	
		$this->load->library('form_validation');
		$res =get_data($id,'id','admin');
		$arr['data']=$res;
		$arr['name']=$res['name'];
		$arr['email']=$res['email'];
		$arr['password']=$res['password'];
		$arr['image']=$res['image'];
		if($this->input->post('save')){
				$this->form_validation->set_rules('name', 'User name', 'required|alpha');
				$this->form_validation->set_rules('password', 'Password', 'required|max_length[16]');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');				
				if($this->form_validation->run()==FALSE)
				{
					$arr['name']=set_value('name');
					$arr['email']=set_value('email');
					$arr['password']=set_value('password');
					
				}else{
					$arr=get_data($id,'id','admin');	
					//	print_r($arr);
						$name=$this->input->post('name');
						$email=$this->input->post('email');
						$password=$this->input->post('password');
							$config['upload_path']          = './assets/web_images/admin/';
			                $config['allowed_types']        = 'jpg|png|jpeg';
			                $this->load->library('upload', $config);
							
							if($this->upload->do_upload('image')){
								unlink('./assets/web_images/admin/'.$arr['image']);
								$image=$this->upload->data('file_name');
								$arr=array('name'=>$name,'email'=>$email,'password'=>$password,'image'=>$image);
								$this->db->where('id',$id);
								$this->db->update('admin',$arr);	
							}
							else
							{
								$arr=array('name'=>$name,'email'=>$email,'password'=>$password);
								$this->db->where('id',$id);
								$this->db->update('admin',$arr);
							
							}
							redirect('admin/Admin/view_admin');
				}
		}
		$this->load->view('admin/add_admin_page',$arr);
	}
	
	
	function delete_admin($id='')
	{
		$arr=get_data($id,'id','admin');
		if(@$arr['image'])
		{
			unlink('assets/web_images/admin/'.$arr['image']);
		}
		$this->db->where('id',$id);
		$this->db->delete('admin');
		echo $this->db->last_query();
		redirect('admin/Admin/view_admin/');
	}


	function view_exhibitor(){

		$per_page=3;
		$start=0;
		$start=$this->uri->segment(4);
		$total=count_record('exhibitor');
		$base_url=site_url('admin/Admin/view_exhibitor');
	
		$arr['page_link']=pagination($total,$per_page,$base_url);

		$this->db->limit($per_page,$start);
		$this->db->order_by('id','desc');
		$q1=$this->db->get('exhibitor');
		$arr['row']=$q1->result_array();
		$this->load->view('admin/view_exhibitor_page',$arr);
	}
	
	function update_status()
	{
		$id=$this->input->post('id');
		$row=get_data($id,'id','exhibitor');
		$arr=array();
		if(@$row['status']==0){
			$arr['status']=1;
			{
				$this->db->where('id',$id);
				$this->db->update('exhibitor',$arr);
				redirect("admin/Admin/view_exhibitor");
			}
		}else{
			$arr['status']=0;
			{
				$this->db->where('id',$id);
				$this->db->update('exhibitor',$arr);
				redirect("admin/Admin/view_exhibitor");
			}
		}
	}
	function delete_exhibitor($id='')
	{
		$arr=get_data($id,'id','exhibitor');
		//		print_r($arr);
		if(@$arr['image'])
		{
			unlink('assets/web_images/exhibitor/'.$arr['image']);
		}
		$this->db->where('id',$id);
		$this->db->delete('exhibitor');
		echo $this->db->last_query();
		redirect('admin/Admin/view_exhibitor');
	}

	function all_expo()
	{
		$arr=array();
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/admin/Admin/all_expo');
		$page_link=pagination($total,$per_page,$base_url);
 
		$this->db->order_by('id','desc');
		$this->db->limit($per_page,$start);
		$qry=$this->db->get('exhibition');
		$arr['row']=$qry->result_array();
		if($total==0){
			$arr['err1']="No Record Found";
			$this->load->view('admin/all_expo_page',$arr);
		}
		else{
			$arr['city']=get_table('city');
			$arr['page_link']=$page_link;
			$this->load->view('admin/all_expo_page',$arr);
		}
	}


	function view_up_exhibition(){
		$arr=array();
		$arr['type']='Upcomming';
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		$date=date('Y-m-d');
		$this->db->where('start_date >',$date);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/admin/Admin/view_up_exhibition');
		$page_link=pagination($total,$per_page,$base_url);
		$this->db->where('start_date >',$date);
		$this->db->order_by('id','desc');
		$this->db->limit($per_page,$start);
		$qry=$this->db->get('exhibition');
		$arr['row']=$qry->result_array();

		if($total==0){
			$arr['err1']="No Record Found";
			$this->load->view('admin/all_expo_page',$arr);
		}
		else{
			$arr['city']=get_table('city');
			$arr['page_link']=$page_link;
			$this->load->view('admin/all_expo_page',$arr);
		}
	}

	function view_run_exhibition(){
		$arr=array();
		$arr['type']='Running';
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		$date=date('Y-m-d');
		$this->db->where('start_date <=',$date);
		$this->db->where('end_date >=',$date);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/admin/Admin/view_run_exhibition');
		$page_link=pagination($total,$per_page,$base_url);
		$this->db->where('start_date <=',$date);
		$this->db->where('end_date >=',$date);
		$this->db->order_by('id','desc');
		$this->db->limit($per_page,$start);
		$qry=$this->db->get('exhibition');
		$arr['row']=$qry->result_array();
		if($total==0){
			$arr['err1']="No Record Found";
			$this->load->view('admin/all_expo_page',$arr);
		}
		else{
			$arr['city']=get_table('city');
			$arr['page_link']=$page_link;
			$this->load->view('admin/all_expo_page',$arr);
		}
	}

	function view_pre_exhibition(){
		$arr=array();
		$arr['type']='Previous';
		$per_page=4;
		$start=0;
		$date=date('Y-m-d');
		$start=$this->uri->segment(4);
		$this->db->where('end_date <',$date);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/admin/Admin/view_pre_exhibition');
		$page_link=pagination($total,$per_page,$base_url);
		$this->db->where('end_date <',$date);
		$this->db->order_by('id','desc');
		$this->db->limit($per_page,$start);
		$qry=$this->db->get('exhibition');
		$arr['row']=$qry->result_array();
		if($total==0){
			$arr['err1']="No Record Found";
			$this->load->view('admin/all_expo_page',$arr);
		}
		else{
			$arr['city']=get_table('city');
			$arr['page_link']=$page_link;
			$this->load->view('admin/all_expo_page',$arr);
		}
	}



	function detail_exhibition($id='')
	{
		$arr=array();
		$row=get_data($id,'id','exhibition');
		$city=$row['city'];
		$state=$row['state'];
		$category=$row['category'];
		$arr['expo']=get_data($id,'id','exhibition');
		$arr['city']=get_data($city,'id','city');
		$arr['category']=get_data($category,'id','category');
		$arr['state']=get_data($state,'id','state');
		$arr['id']=$id;
		
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
		$this->load->view('admin/detail_exhibition_page',@$arr);
		
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

	public function view_photos()
	{
		$data=array();
		$sql='select DISTINCT(exhibition_id) FROM exhibition_image';
		$q=$this->db->query($sql);
		$start=0;
		$start=$start=$this->uri->segment(4);
		$total=$q->num_rows();
		$per_page=1;
		$base_url=site_url('/exhibitor/Exhibitor/view_photos');
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
	function delete_image($ex='',$id='')
	{
		$path='assets/web_images/exhibition_images/';
		$img_name='name';
		$this->db->where('exhibition_id',$ex);
		delete_image($id,'id','exhibition_image',$path,$img_name);
		$this->db->where('id',$id);
		$this->db->delete('exhibition_image');
		redirect('admin/Admin/view_photos');
	}

}
?>