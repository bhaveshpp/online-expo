<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function check()
	{
		$exhibition_id = $this->input->post('exhibition_id');
		$amount =  $this->input->post('payble_amount');
	    $product_info = $this->input->post('product_info');
	    $customer_name = $this->input->post('customer_name');
	    $customer_emial = $this->input->post('customer_email');
	    $customer_mobile = $this->input->post('mobile_number');
	    $customer_address = $this->input->post('customer_address');
	    
	    	//payumoney details
	    
	    
	        $MERCHANT_KEY = "lERBAr6P"; //change  merchant with yours
	        $SALT = "4ofZH08TG3";  //change salt with yours 

	        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	        //optional udf values 
	        $udf1 = $exhibition_id;
	        $udf2 = '';
	        $udf3 = '';
	        $udf4 = '';
	        $udf5 = '';
	        
	         $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
	         $hash = strtolower(hash('sha512', $hashstring));
	         
	        $success = site_url('payment/welcome/success');  
	        $fail = site_url('payment/welcome/status');
	        $cancel = site_url('payment/welcome/status');
	        
	        
	         $data = array(
	            'mkey' => $MERCHANT_KEY,
	            'tid' => $txnid,
	            'hash' => $hash,
	            'amount' => $amount,           
	            'name' => $customer_name,
	            'productinfo' => $product_info,
	            'mailid' => $customer_emial,
	            'phoneno' => $customer_mobile,
	            'address' => $customer_address,
	            'action' => "https://sandboxsecure.payu.in", //for live change action  https://secure.payu.in
	            'sucess' => $success,
	            'failure' => $fail,
	            'cancel' => $cancel,
	            'udf1'=>$udf1            
	        );
	        $this->load->view('payment/confirmation', $data);   
     
	}

	function success(){
		//p($this->input->post());die;
		if($this->input->post('status')=='success'){
			//post();die;
			$udf1=$this->input->post();
			$udf1=$this->input->post('udf1');
			$exhibition_id=$udf1;
			$price=$this->input->post('amount');
			$date=$this->input->post('addedon');
			$transection_id=$this->input->post('txnid');
			$arr['exhibition_id']=$exhibition_id;
			$arr['price']=$price;
			$arr['date']=$date;
			$arr['transection_id']=$transection_id;
			$this->db->insert('payment',$arr);
			
			/*
			//$data = recipt data//
			$view = $this->load->view('recipt',$data,TRUE);
				if(send_email($email,'subject',$view,'html')){
					redirect('exhibitor/Ajax/update_status/'.$udf1);		
				}*/
			redirect('exhibitor/Ajax/update_status/'.$udf1);
		}
	}
	function status()
	{
		//p($this->input->post());die;
		$udf1=$this->input->post('udf1');
		redirect('exhibitor/Exhibitor/detail_exhibition/'.$udf1);
	}

	/********** For Customer ************/
	public function check_customer()
	{
		$exhibition_id = $this->input->post('exhibition_id');
		$category = $this->input->post('category_id');
		$stall_no = $this->input->post('stall_number');
		
		$amount =  $this->input->post('payble_amount');
	    $product_info = $this->input->post('product_info');
	    $customer_name = $this->input->post('customer_name');
	    $customer_emial = $this->input->post('customer_email');
	    $customer_mobile = $this->input->post('mobile_number');
	    $customer_address = $this->input->post('customer_address');
	    
	    	//payumoney details
	    
	    
	        $MERCHANT_KEY = "lERBAr6P"; //change  merchant with yours
	        $SALT = "4ofZH08TG3";  //change salt with yours 

	        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	        //optional udf values 
	        $udf1 = $exhibition_id;
	        $udf2 = $category;
	        $udf3 = $stall_no;
	        $udf4 = '';
	        $udf5 = '';
	        
	         $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
	         $hash = strtolower(hash('sha512', $hashstring));
	         
	        $success = site_url('payment/welcome/success_customer');  
	        $fail = site_url('payment/welcome/status_customer');
	        $cancel = site_url('payment/welcome/status_customer');
	        
	        
	         $data = array(
	            'mkey' => $MERCHANT_KEY,
	            'tid' => $txnid,
	            'hash' => $hash,
	            'amount' => $amount,           
	            'name' => $customer_name,
	            'productinfo' => $product_info,
	            'mailid' => $customer_emial,
	            'phoneno' => $customer_mobile,
	            'address' => $customer_address,
	            'action' => "https://sandboxsecure.payu.in", //for live change action  https://secure.payu.in
	            'sucess' => $success,
	            'failure' => $fail,
	            'cancel' => $cancel,
	            'udf1'=>$udf1,       
	            'udf2'=>$udf2,
	            'udf3'=>$udf3 
	                 
	        );
	        $this->load->view('payment/confirmation', $data);   
     
	}
	function success_customer(){
		//p($this->input->post());die;
		if($this->input->post('status')=='success'){
			//post();die;
			$t_id=$this->input->post('txnid');
			$udf1=$this->input->post('udf1');
			$udf2=$this->input->post('udf2');
			$udf3=$this->input->post('udf3');
			
			redirect('customer/Customer/booking/'.$udf1.'/'.$udf2.'/'.$udf3.'/'.$t_id);
		}
	}
	function status_customer()
	{
		//p($this->input->post());die;
		$udf1=$this->input->post('udf1');
		$udf2=$this->input->post('udf2');
		
		redirect('customer/Customer/book/'.$udf1.'/'.$udf2);
	}

}
