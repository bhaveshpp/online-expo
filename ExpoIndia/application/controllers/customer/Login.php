<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		if(@$this->session->userdata('customer_id'))
		{
			redirect('customer/Customer');
		}
	}
	/*******************costomer Login*****************/
	public function index($id='',$cat='')
	{
		$arr=array();
		$arr['user']='customer';
		if($this->input->post())
		{	
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$this->db->where('email',$email);
			$this->db->where('password',$password);
			$qry=$this->db->get('customer');
			$num=$qry->num_rows();
			if($num==1)
			{
				$row=$qry->row_array();
				$this->session->set_userdata('customer_id',$row['id']);
				if($id>0)
				{
					redirect('customer/Customer/book/'.$id.'/'.$cat);
				}
				redirect('customer/Customer');
			}
			else
			{
				$arr['invalid']="Invalide";
			}
		}
		$this->load->view('comman/login_page',@$arr);
	}
	/******************* costomer Register *****************/
	function reg()
	{
		$arr['user']='customer';
		$this->load->library('form_validation');
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
					if($_FILES['image']['name']=='') 
					{
						$arr['file_error']='please upload image';
					}
					else
					{
						$email=$this->input->post('email');
						$this->db->where('email',$email);
						$qry=$this->db->get('customer');
						$res=$qry->num_rows();
						if($res==0)
						{
							 $name=$this->input->post('name');
							 $password=rand(1111,9999);	
							 $mobile=$this->input->post('mobile');
							if(is_connected())
							{

								if(file_upload('./assets/web_images/customer/','jpg|png','image'))
								{
									if($arr['sendsuccess']=send_email($email,'Expo India Password',$name.':'.$password,'html'))
									{
										$image=$this->upload->data('file_name');
										$row=array('name'=>$name,'email'=>$email,'password'=>$password, 'mobile'=>$mobile,'image'=>$image);
										if($this->db->insert('customer',$row))
										{
											$arr['connection']="<b style='color:lightblue;'>Your password send to your Email.</b>";
										}
										else
										{
											echo 'server error';die;
										}
									}else{
										
									}
									
								}
								else
								{
									$arr['err_file']=$this->upload->display_errors();
								}
							}
							else
							{
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
	/*********** Customer Forgot Password ***************/
	function forgot()
	{
		$arr=array();
		$arr['user']='customer';
		if(@$this->input->post())
		{
			$email=@$this->input->post('email');
			$this->db->where('email',$email);
			$qry=$this->db->get('customer');
			$x=$qry->row_array();
			$res=$qry->num_rows();
				if($res==0)
				{
					$arr['email']="<b style='color:red;'>!Your Email Is Not Register.</b>";
				}
				else
				{
					if(is_connected())
					{
						if(send_email($email,'Expo India Password',$x['name'].':'.$x['password'],'html'))
						{

							$arr['sendsuccess']="<b style='color:green;'>Password Send to Your Email.</b>";
						}
					}
					else
					{
						$arr['connection']="<b style='color:red;'>Internet connection Problam .</b>";
					}
				}
		}
		$this->load->view('comman/forgot_page',$arr);
	}
}
?>