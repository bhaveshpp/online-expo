<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		if(@$this->session->userdata('exhibitor_id'))
		{
			redirect('exhibitor/Exhibitor');
		}
	}
	/******************* Exhibitor Login*****************/
	public function index($id='',$cat='')
	{
		$arr=array();
		$arr['user']='exhibitor';
		if($this->input->post())
		{	
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->db->where('email',$email);
			$this->db->where('password',$password);
			$qry=$this->db->get('exhibitor');
			$num=$qry->num_rows();
			if($num==1)
			{
				$this->db->where('status',1);
				$this->db->where('email',$email);
				$this->db->where('password',$password);
				$qry=$this->db->get('exhibitor');
				$num=$qry->num_rows();
				if($num==1)
				{
					$row=$qry->row_array();
					$this->session->set_userdata('exhibitor_id',$row['id']);
					
					redirect('exhibitor/Exhibitor');
				}else{
					$arr['statuszero']="status zero";
				}
			}
			else
			{
				$arr['invalid']="invalid Email or Password";
			}
		}
		$this->load->view('comman/login_page',@$arr);
	}
	/******************* Exhibitor Register *****************/
	function reg()
	{
		$arr['user']='exhibitor';$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'User name', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10]|max_length[10]');

	if(@$this->input->post())
		{
			  if ($this->form_validation->run() == FALSE)
                {	
		
					$arr['name']=set_value('name');
					$arr['email']=set_value('email');
					$arr['mobile']=set_value('mobile');
        		}
				else
				{
			if($_FILES['image']['name']=='') {
			$arr['file_error']='please upload image';
								
			}
			else{
				$email=$this->input->post('email');
				$this->db->where('email',$email);
				$qry=$this->db->get('exhibitor');
				
				$res=$qry->num_rows();
				if($res==0)
				{

					$name=$this->input->post('name');
					$password=rand(1111,9999);	
					$mobile=$this->input->post('mobile');
					if(is_connected()){

						if($arr['sendsuccess']=send_email($email,'Expo India Password',$name.':'.$password,'html')){
							
							if(file_upload('./assets/web_images/exhibitor/','jpg|png','image')){
								/*when file if uploaded*/
								$image=$this->upload->data('file_name');
								$row=array('name'=>$name,'email'=>$email,'password'=>$password, 'mobile'=>$mobile,'image'=>$image);
								if($this->db->insert('exhibitor',$row)){
									$arr['connection']="<b style='color:lightblue;'>Your password send to your Email.</b>";
								}
								else{echo 'server error';die;}
							}else{echo $this->upload->display_errors();}
						}
					}else{
						$arr['connection']="<b style='color:red;'>Internet connection Problam .</b>";
					}
						
				}
				else
				{
					$arr['exist']="<b style='color:red;'>!Your Email Is Already Register.</b>";
				}	
			}
		}
		}
		$arr['invalid']='';
		$this->load->view('comman/reg_page',@$arr);
	}
	/*********** exhibitor Forgot Password ***************/
	function forgot()
	{
		$arr=array();
		$arr['user']='exhibitor';
		if(@$this->input->post())
		{
			$email=@$this->input->post('email');
			$this->db->where('email',$email);
			$qry=$this->db->get('exhibitor');
			$x=$qry->row_array();
			$res=$qry->num_rows();
				if($res==0)
				{
					$arr['email']="<b style='color:red;'>!Your Email Is Not Register.</b>";
				}
				else
				{
					if(is_connected()){
						if(send_email($email,'Expo India Password',$x['password'])){
							$arr['sendsuccess']="<b style='color:green;'>Password Send to Your Email.</b>";
						}
					}else{
						$arr['connection']="<b style='color:red;'>Internet connection Problam .</b>";
					}
				}
		}
		$this->load->view('comman/forgot_page',$arr);
	}
}
?>