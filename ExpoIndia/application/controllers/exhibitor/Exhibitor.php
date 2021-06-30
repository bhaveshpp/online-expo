<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exhibitor extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		//echo '<pre>';print_r($this->session->all_userdata());die;
		if($this->session->userdata('exhibitor_id')=='')
		{
			redirect('exhibitor/Login');
		}
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('id',$id);
		$qry=$this->db->get('exhibitor');
		$res=$qry->row_array();
		$arr['data']= $res;
		$arr['user']='exhibitor';
		$this->load->view('exhibitor/header',@$arr);
	}
	public function index()
	{
		$sql="SELECT customer.name name,exhibition.title,stall_category.name cat_name,stall_booking.stall_no,stall.price from customer,exhibition,stall_category,stall_booking,stall where customer.id=stall_booking.customer_id and exhibition.id=stall_booking.exhibition_id and stall_category.id=stall_booking.cat_id and stall.category_id=stall_booking.cat_id and stall.exhibition_id=stall_booking.exhibition_id";
		$res=$this->db->query($sql);
		$per_page=6;
		$start=0;
		if(@$this->uri->segment(4)){$start=@$this->uri->segment(4);}
		
		$total=$res->num_rows();
		$base_url=site_url('exhibitor/Exhibitor/index/');
	
		$data['page_link']=pagination($total,$per_page,$base_url);

		$sql="SELECT customer.name name,exhibition.title,stall_category.name cat_name,stall_booking.stall_no,stall.price from customer,exhibition,stall_category,stall_booking,stall where customer.id=stall_booking.customer_id and exhibition.id=stall_booking.exhibition_id and stall_category.id=stall_booking.cat_id and stall.category_id=stall_booking.cat_id and stall.exhibition_id=stall_booking.exhibition_id limit $start,$per_page";
		$res=$this->db->query($sql);
		
		$data['payment']=$res->result_array();

		$data['visitors']=count_record("user");
		$data['customer']=count_record("customer");
		$this->db->select('sum(count) count');
		$sql = $this->db->get('user');
		$row=$sql->row_array();
		$data['visits']=$row['count'];

		$all=count_record("exhibition");
		$id=$this->session->userdata('exhibitor_id');
		$this->db->select('count(id) count');
		$this->db->where('exhibitor_id',$id);
		$this->db->where('status',1);
		$sql = $this->db->get('exhibition');
		$row=$sql->row_array();
		$published=$row['count'];
		$data['precentage']=100*$published/$all;
		
		$this->load->view('exhibitor/dashboard_page',@$data);
	}
	function logout()
	{
		if($this->session->userdata('exhibitor_id'))
		{
		$this->session->unset_userdata('exhibitor_id');
		}
		redirect('exhibitor/Login');
	}

	/********** Profile ****************/
		public function profile()
	{
		$id=$this->session->userdata('exhibitor_id');
		$arr['data']=get_data($id,'id','exhibitor');
		$arr['user']='exhibitor';
		$this->load->view('comman/profile_page',$arr);
	}
	function edit_profile()
	{
		$arr['edit']=true;
		$arr['user']='exhibitor';
		$id=$this->session->userdata('exhibitor_id');
		$arr['data']=get_data($id,'id','exhibitor');
		$this->load->view('comman/profile_page',$arr);
		if (post('submit')) {
			$name=post('name');
			$mobile=post('mobile');
			
			if(file_upload('./assets/web_images/exhibitor/','jpg|png','image'))
				{
					delete_image($id,'id','exhibitor','./assets/web_images/exhibitor/','image');
					$image=$this->upload->data('file_name');
					$row=array('name'=>$name,'mobile'=>$mobile,'image'=>$image);
					$this->db->where('id',$id);
					$this->db->update('exhibitor',$row);
					redirect('exhibitor/Exhibitor/profile');
				}
				else
				{
					$row=array('name'=>$name,'mobile'=>$mobile);
					$this->db->where('id',$id);
					$this->db->update('exhibitor',$row);
					redirect('exhibitor/Exhibitor/profile');
				}
		}
	}

	function change_password()
	{
		$arr=array();
		$id=$this->session->userdata('exhibitor_id');
		$data=get_data($id,'id','exhibitor');
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
						$this->db->update('exhibitor',$arr);
						redirect("exhibitor/Exhibitor/logout");
				 }
		}
		$arr['data']=get_data($id,'id','exhibitor');
		$arr['user']='exhibitor';
		$this->load->view('comman/change_password_page',$arr);
	}
	

	/***********************************/
	
	function add_exhibition()
	{
		$arr=array();
		$arr["category"]=get_table('category');
		$arr["state"]=get_table('state');
		$arr["city"]=get_table('city');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Exhibition name', 'required');
		$this->form_validation->set_rules('category', 'Select category', 'required');
		$this->form_validation->set_rules('address', 'Exhibition Address', 'required');
		$this->form_validation->set_rules('state', 'Exhibition State','required');
		$this->form_validation->set_rules('city', 'Exhibition City', 'required');
		$this->form_validation->set_rules('helpline', 'Exhibition helpline', 'required');
		$this->form_validation->set_rules('stalls', 'Exhibition stalls', 'required|numeric|is_natural_no_zero');
		$this->form_validation->set_rules('start_date', 'Exhibition start_date', 'required');
		$this->form_validation->set_rules('end_date', 'Exhibition end_date', 'required');
		$this->form_validation->set_rules('start_time', 'Exhibition start_time', 'required');
		$this->form_validation->set_rules('end_time', 'Exhibition end_time', 'required');
		$this->form_validation->set_rules('discription', 'Exhibition discription', 'required');
		
		if(@$this->input->post())
		{
			 if ($this->form_validation->run() == FALSE)
                {
							$arr['set_title']=set_value('title');
							$arr['set_category']=set_value('category');
							$arr['set_address']=set_value('address');
							$arr['set_state']=set_value('state');
							$arr['set_city']=set_value('city');
							$arr['helpline']=set_value('helpline');
							$arr['stalls']=set_value('stalls');
							$arr['start_date']=set_value('start_date');
							$arr['end_date']=set_value('end_date');
							$arr['start_time']=set_value('start_time');
							$arr['end_time']=set_value('end_time');
							$arr['discription']=set_value('discription');

				}
				else
				 {
				 	if($err=$this->add_expo()){
							$arr['img_err']=$err;
							$arr['set_discription']=set_value('discription');
							$arr['set_title']=set_value('title');
							$arr['set_category']=set_value('category');
							$arr['set_address']=set_value('address');
							$arr['set_state']=set_value('state');
							$arr['set_city']=set_value('city');
							$arr['helpline']=set_value('helpline');
							$arr['stalls']=set_value('stalls');
							$arr['start_date']=set_value('start_date');
							$arr['end_date']=set_value('end_date');
							$arr['start_time']=set_value('start_time');
							$arr['end_time']=set_value('end_time');
						}		
				 }
			
		}
		$this->load->view('exhibitor/add_exhibition_page',$arr);
	}

	function add_expo()
	{
		$row=array();
			$row['title']=$this->input->post('title');
			$row['category']=$this->input->post('category');
			$row['state']=$this->input->post('state');
			$row['address']=$this->input->post('address');
			$row['city']=$this->input->post('city');
			$row['helpline']=$this->input->post('helpline');
			$row['start_date']=$this->input->post('start_date');
			$row['end_date']=$this->input->post('end_date');
			$row['start_time']=$this->input->post('start_time');
			$row['end_time']=$this->input->post('end_time');
			$row['stalls']=$this->input->post('stalls');
			$row['discription']=$this->input->post('discription');
			$row['exhibitor_id']=$this->session->userdata('exhibitor_id');
			$row['image']=	$_FILES['image']['name'];
						//print_r($row);
				$config['upload_path']          = './assets/web_images/exhibition/';
                $config['allowed_types']        = 'jpg|png';

                $this->load->library('upload', $config);
				
				if($this->upload->do_upload('image')){
					$image=$this->upload->data('file_name');
					$row['image']=$image;				
					$this->db->insert('exhibition',$row);
					redirect('exhibitor/Exhibitor/price_list');
				}
				else{
					return $this->upload->display_errors();
				}
	}

	function update_exhibition($id='')
	{
		$arr=array();
		$arr["category"]=get_table('category');
		$arr["state"]=get_table('state');
		$arr["city"]=get_table('city');
		$ex=get_data($id,'id','exhibition');
			$arr['set_title']=$ex['title'];
			$arr['set_category']=$ex['category'];
			$arr['set_address']=$ex['address'];
			$arr['set_state']=$ex['state'];
			$arr['set_city']=$ex['city'];
			$arr['helpline']=$ex['helpline'];
			$arr['stalls']=$ex['stalls'];
			$arr['start_date']=$ex['start_date'];
			$arr['end_date']=$ex['end_date'];
			$arr['start_time']=$ex['start_time'];
			$arr['end_time']=$ex['end_time'];
			$arr['set_discription']=$ex['discription'];
			$arr['image']=$ex['image'];
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Exhibition name', 'required');
		$this->form_validation->set_rules('category', 'Select category', 'required');
		$this->form_validation->set_rules('address', 'Exhibition Address', 'required');
		$this->form_validation->set_rules('state', 'Exhibition State','required');
		$this->form_validation->set_rules('city', 'Exhibition City', 'required');
		$this->form_validation->set_rules('helpline', 'Exhibition helpline', 'required');
		$this->form_validation->set_rules('stalls', 'Exhibition stalls', 'required|numeric|is_natural_no_zero');
		$this->form_validation->set_rules('start_date', 'Exhibition start_date', 'required');
		$this->form_validation->set_rules('end_date', 'Exhibition end_date', 'required');
		$this->form_validation->set_rules('start_time', 'Exhibition start_time', 'required');
		$this->form_validation->set_rules('end_time', 'Exhibition end_time', 'required');
		$this->form_validation->set_rules('discription', 'Exhibition discription', 'required');
		
		if(@$this->input->post())
		{
			 if ($this->form_validation->run() == FALSE)
                {
							$arr['set_title']=set_value('title');
							$arr['set_category']=set_value('category');
							$arr['set_address']=set_value('address');
							$arr['set_state']=set_value('state');
							$arr['set_city']=set_value('city');
							$arr['helpline']=set_value('helpline');
							$arr['stalls']=set_value('stalls');
							$arr['start_date']=set_value('start_date');
							$arr['end_date']=set_value('end_date');
							$arr['start_time']=set_value('start_time');
							$arr['end_time']=set_value('end_time');
							$arr['discription']=set_value('discription');

				}
				else
				 {
				 	if($err=$this->update_expo($id)){
							$arr['img_err']=$err;
							$arr['set_discription']=set_value('discription');
							$arr['set_title']=set_value('title');
							$arr['set_category']=set_value('category');
							$arr['set_address']=set_value('address');
							$arr['set_state']=set_value('state');
							$arr['set_city']=set_value('city');
							$arr['helpline']=set_value('helpline');
							$arr['stalls']=set_value('stalls');
							$arr['start_date']=set_value('start_date');
							$arr['end_date']=set_value('end_date');
							$arr['start_time']=set_value('start_time');
							$arr['end_time']=set_value('end_time');
						}		
				 }
			
		}
		$this->load->view('exhibitor/add_exhibition_page',$arr);
	}

	function update_expo($id='')
	{
		$row=array();
			$row['title']=$this->input->post('title');
			$row['category']=$this->input->post('category');
			$row['state']=$this->input->post('state');
			$row['address']=$this->input->post('address');
			$row['city']=$this->input->post('city');
			$row['helpline']=$this->input->post('helpline');
			$row['start_date']=$this->input->post('start_date');
			$row['end_date']=$this->input->post('end_date');
			$row['start_time']=$this->input->post('start_time');
			$row['end_time']=$this->input->post('end_time');
			$row['stalls']=$this->input->post('stalls');
			$row['discription']=$this->input->post('discription');
			$row['exhibitor_id']=$this->session->userdata('exhibitor_id');
			//$row['image']=	$_FILES['image']['name'];
						//print_r($row);
				$config['upload_path']          = './assets/web_images/exhibition/';
                $config['allowed_types']        = 'jpg|png';

                $this->load->library('upload', $config);
				
				if($this->upload->do_upload('image')){
					$image=$this->upload->data('file_name');
					$row['image']=$image;	
					$this->db->where('id',$id);			
					$this->db->update('exhibition',$row);
					redirect('exhibitor/Exhibitor/view_exhibition');
				}
				else{
					$this->db->where('id',$id);			
					$this->db->update('exhibition',$row);
					redirect('exhibitor/Exhibitor/view_exhibition');
				}
	}


	function view_exhibition(){
		$arr=array();
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		$id=$this->session->userdata('exhibitor_id');

		$this->db->where('exhibitor_id',$id);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/exhibitor/Exhibitor/view_exhibition');
		$page_link=pagination($total,$per_page,$base_url);
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('exhibitor_id',$id);
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
			$this->load->view('exhibitor/view_exhibition_page',$arr);
		}
	}

	function view_up_exhibition(){
		$arr=array();
		$arr['type']='Upcomming';
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		$id=$this->session->userdata('exhibitor_id');
		$date=date('Y-m-d');
		$this->db->where('exhibitor_id',$id);
		$this->db->where('start_date >',$date);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/exhibitor/Exhibitor/view_up_exhibition');
		$page_link=pagination($total,$per_page,$base_url);
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('exhibitor_id',$id);
		$this->db->where('start_date >',$date);
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
			$this->load->view('exhibitor/view_exhibition_page',$arr);
		}
	}

	function view_run_exhibition(){
		$arr=array();
		$arr['type']='Running';
		$per_page=4;
		$start=0;
		$start=$this->uri->segment(4);
		$date=date('Y-m-d');
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('start_date <=',$date);
		$this->db->where('end_date >=',$date);
		$this->db->where('exhibitor_id',$id);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		//echo $this->db->last_query();die();
		$base_url=site_url('/exhibitor/Exhibitor/view_run_exhibition');
		$page_link=pagination($total,$per_page,$base_url);
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('start_date <=',$date);
		$this->db->where('end_date >=',$date);
		$this->db->where('exhibitor_id',$id);
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
			$this->load->view('exhibitor/view_exhibition_page',$arr);
		}
	}

	function view_pre_exhibition(){
		$arr=array();
		$arr['type']='Previous';
		$per_page=4;
		$start=0;
		$date=date('Y-m-d');
		$start=$this->uri->segment(4);
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('exhibitor_id',$id);
		$this->db->where('end_date <',$date);
		$qry=$this->db->get('exhibition');
//echo $this->db->last_query();die;
		$total=$qry->num_rows();
		$base_url=site_url('/exhibitor/Exhibitor/view_pre_exhibition');
		$page_link=pagination($total,$per_page,$base_url);
		$this->db->where('end_date <',$date);
		$this->db->where('exhibitor_id',$id);
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
			$this->load->view('exhibitor/view_exhibition_page',$arr);
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
		$row=get_data($id,'id','exhibition');
		$city=$row['city'];
		$state=$row['state'];
		$category=$row['category'];
		$arr['expo']=get_data($id,'id','exhibition');
		$arr['city']=get_data($city,'id','city');
		$arr['category']=get_data($category,'id','category');
		$arr['state']=get_data($state,'id','state');
		$arr['id']=$id;
		$this->load->view('exhibitor/detail_exhibition_page',$arr);
	}


	function delete_exhibition($id='')
	{
		if(delete_record($id,'exhibition','assets/exhibitor/exhibition/images/')){
			redirect('exhibitor/Exhibitor/view_exhibition');
		}
	}
	
	function price_list()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('exhibition_id', 'Select Exhibition', 'required');
		$this->form_validation->set_rules('category_id', 'Select category', 'required');
		$this->form_validation->set_rules('stalls', 'Select Stalls', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('width', 'Width', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('length', 'Length', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('price', 'Price', 'required|is_natural_no_zero');

		if($this->input->post('save'))
		{
			 if ($this->form_validation->run() == FALSE)
                {

							$arr['exhibition_id']=set_value('exhibition_id');
							$arr['category_id']=set_value('category_id');
							$arr['stalls']=set_value('stalls');
							$arr['width']=set_value('width');
							$arr['length']=set_value('length');
							$arr['price']=set_value('price');
				}
				else
				{
					$id=$this->input->post('exhibition_id');
					$stalls=$this->input->post('stalls');
					$expo=get_data($id,'id','exhibition');
					$total=$expo['stalls'];
					$this->db->select('sum(stalls) stalls');
					$this->db->where('exhibition_id',$id);
					$qrt=$this->db->get('stall');
					$arr=$qrt->row_array();
					$set=$arr['stalls'];
					$avl=$total-$set;
					if($stalls<=$avl)
					{
						$row['exhibition_id']=$this->input->post('exhibition_id');
						$row['category_id']=$this->input->post('category_id');
						$row['stalls']=$this->input->post('stalls');
						$row['length']=$this->input->post('length');
						$row['width']=$this->input->post('width');
						$row['price']=$this->input->post('price');
						$this->db->insert('stall',$row);
						redirect('exhibitor/Exhibitor/stall_view');
					}
					else
					{
							$arr['exhibition_id']=set_value('exhibition_id');
							$arr['category_id']=set_value('category_id');
							$arr['stalls']=set_value('stalls');
							$arr['width']=set_value('width');
							$arr['length']=set_value('length');
							$arr['price']=set_value('price');
							$arr['err_stall']="Enter 1 to ".$avl;
					}

					//
				}
		}
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('exhibitor_id',$id);
		$qry=$this->db->get('exhibition');
		$arr["exhibition"]=$qry->result_array();
		$arr["stall_category"]=get_table('stall_category');
		$this->load->view('exhibitor/price_list_page',@$arr);
	}

	function stall_view()
	{
		$arr=array();
		$per_page=1;
		$start=0;
		$start=$this->uri->segment(4);
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('exhibitor_id',$id);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/exhibitor/Exhibitor/stall_view');

		$arr['page_link']=pagination($total,$per_page,$base_url);
			if($total==0){
				$arr['err1']="No Record Found";
				$this->load->view('exhibitor/view_price_list_page',@$arr);
			}
			else{
				$arr["stall"]=get_table('stall');
				$arr["stall_category"]=get_table('stall_category');
				$sql="SELECT exhibition_id,cat_id,count(id) stalls FROM stall_booking GROUP by exhibition_id,cat_id";
				$res=$this->db->query($sql);
				$arr['booked']=$res->result_array();
				$id=$this->session->userdata('exhibitor_id');
				$this->db->limit($per_page,$start);
				$this->db->order_by('id','desc');
				$this->db->where('exhibitor_id',$id);
				$qry=$this->db->get('exhibition');
				$arr["row"]=$qry->result_array();
				$this->load->view('exhibitor/view_price_list_page',@$arr);
			}
		
	}
	function stall_up_view()
	{
		$arr=array();
		$arr['type']='Upcomming';
		$per_page=1;
		$start=0;
		$date=date('Y-m-d');
		$start=$this->uri->segment(4);
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('start_date >',$date);
		$this->db->where('exhibitor_id',$id);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/exhibitor/Exhibitor/stall_up_view');

		$arr['page_link']=pagination($total,$per_page,$base_url);
			if($total==0){
				$arr['err1']="No Record Found";
				$this->load->view('exhibitor/view_price_list_page',@$arr);
			}
			else{
				$arr["stall"]=get_table('stall');
				$arr["stall_category"]=get_table('stall_category');
				$sql="SELECT exhibition_id,cat_id,count(id) stalls FROM stall_booking GROUP by exhibition_id,cat_id";
				$res=$this->db->query($sql);
				$arr['booked']=$res->result_array();
				$id=$this->session->userdata('exhibitor_id');
				$this->db->limit($per_page,$start);
				$this->db->order_by('id','desc');
				$this->db->where('exhibitor_id',$id);
				$this->db->where('start_date >',$date);
				$qry=$this->db->get('exhibition');
				$arr["row"]=$qry->result_array();
				$this->load->view('exhibitor/view_price_list_page',@$arr);
			}
		
	}
	function stall_run_view()
	{
		$arr=array();
		$arr['type']='Running';
		$per_page=1;
		$start=0;
		$date=date('Y-m-d');
		$start=$this->uri->segment(4);
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('start_date <=',$date);
		$this->db->where('end_date >=',$date);
		$this->db->where('exhibitor_id',$id);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/exhibitor/Exhibitor/stall_run_view');

		$arr['page_link']=pagination($total,$per_page,$base_url);
			if($total==0){
				$arr['err1']="No Record Found";
				$this->load->view('exhibitor/view_price_list_page',@$arr);
			}
			else{
				$arr["stall"]=get_table('stall');
				$arr["stall_category"]=get_table('stall_category');
				$sql="SELECT exhibition_id,cat_id,count(id) stalls FROM stall_booking GROUP by exhibition_id,cat_id";
				$res=$this->db->query($sql);
				$arr['booked']=$res->result_array();
				$id=$this->session->userdata('exhibitor_id');
				$this->db->limit($per_page,$start);
				$this->db->order_by('id','desc');
				$this->db->where('exhibitor_id',$id);
				$this->db->where('start_date <=',$date);
				$this->db->where('end_date >=',$date);
				$qry=$this->db->get('exhibition');
				$arr["row"]=$qry->result_array();
				$this->load->view('exhibitor/view_price_list_page',@$arr);
			}
		
	}
	function stall_pre_view()
	{
		$arr=array();
		$arr['type']='Previous';
		$per_page=1;
		$start=0;
		$date=date('Y-m-d');
		$start=$this->uri->segment(4);
		$id=$this->session->userdata('exhibitor_id');
		$this->db->where('end_date <',$date);
		$this->db->where('exhibitor_id',$id);
		$qry=$this->db->get('exhibition');
		$total=$qry->num_rows();
		$base_url=site_url('/exhibitor/Exhibitor/stall_pre_view');

		$arr['page_link']=pagination($total,$per_page,$base_url);
			if($total==0){
				$arr['err1']="No Record Found";
				$this->load->view('exhibitor/view_price_list_page',@$arr);
			}
			else{
				$arr["stall"]=get_table('stall');
				$arr["stall_category"]=get_table('stall_category');
				$sql="SELECT exhibition_id,cat_id,count(id) stalls FROM stall_booking GROUP by exhibition_id,cat_id";
				$res=$this->db->query($sql);
				$arr['booked']=$res->result_array();
				$id=$this->session->userdata('exhibitor_id');
				$this->db->limit($per_page,$start);
				$this->db->order_by('id','desc');
				$this->db->where('exhibitor_id',$id);
				$this->db->where('end_date <',$date);
				$qry=$this->db->get('exhibition');
				$arr["row"]=$qry->result_array();
				$this->load->view('exhibitor/view_price_list_page',@$arr);
			}
		
	}
	
	function book($id="",$cat='')
	{
			
			$this->db->where('exhibition_id',$id);
			$this->db->where('category_id',$cat);
			$qry=$this->db->get('stall');
			$arr=$qry->row_array();
			//print_r($arr);die;
			$data['num']=$arr['stalls'];
			$data['ex_id']=$id;
			$data['cat_id']=$cat;

			$this->db->where('exhibition_id',$id);
			$this->db->where('cat_id',$cat);
			$qr=$this->db->get('stall_booking');
			//echo $this->db->last_query();
			$data['booked_stall_no']=$qr->result_array();
			//print_r($data);
			//exit;
			$data['owner']=$this->booked($id,$cat);




			
		$this->load->view("exhibitor/booking_page",$data);
	}

	function booked($id='',$cat='')
	{
		$this->db->select('stall_booking.*,customer.*');
	    $this->db->from('stall_booking');
	    $this->db->join('customer', 'stall_booking.customer_id = customer.id', 'right outer'); 
	    $query = $this->db->get();
	    return $query->result();
	}


	function calender()
	{
		$this->db->order_by('id','desc');
		$this->db->where('status',1);
		$this->db->limit(8,0);
		$all=$this->db->get("exhibition");
		$arr['expo']=$all->result_array();
		$this->load->view('comman/calender',@$arr);
	}

	function add_photos()
	{
			$id=$this->session->userdata('exhibitor_id');
			//$this->db->select('title');
			$data=array();
			$this->db->where('exhibitor_id',$id);
			$q=$this->db->get('exhibition');
			$data['exhi']=$q->result_array();
			if(@$this->input->post('save'))
			{
				$ex_id=$this->input->post('ex');
				$path='assets/web_images/exhibition_images/';
		 		$img_name=implode("/",$_FILES['file']['name']);
				$img=array();
	
					foreach ($_FILES['file']['name'] as $key => $value) {
						$img[$key]=$value;
						$arr=array("name"=>$img[$key],"exhibition_id"=>$ex_id);
						$this->db->insert('exhibition_image',$arr);
						}
					
						foreach ($_FILES['file']['tmp_name'] as $key => $value) {
						move_uploaded_file($value,$path.$img[$key]);
						}
						redirect('exhibitor/exhibitor/view_photos');

			}
			
			$this->load->view('exhibitor/gallary_page',$data);
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
		//echo $this->db->last_query();die;
		redirect('exhibitor/Exhibitor/view_photos');
	}
}
?>