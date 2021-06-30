<?php 
function send_email($to='',$subject='',$msg='',$type='text')
{

	$ci =&get_instance();
	$ci->load->library('email');
	$config['protocol']='smtp';
	$config['smtp_host']='ssl://smtp.gmail.com';
	$config['smtp_user']='onlineexpoindia@gmail.com';
	$config['smtp_pass']='oei123oei';
	$config['smtp_port']=465;
	$config['newline']="\r\n";
	$config['mailtype']=$type;
	$ci->email->initialize($config); 
	$ci->email->from('onlineexpoindia@gmail.com');
	$ci->email->to($to);
	$ci->email->subject($subject);
	$ci->email->message($msg);
	if($ci->email->send()){
		return true;
	}
	else{
		return false;
	}
}

function p($arr=array())
{
	echo "<pre>";
	print_r($arr);
}
function post($key='')
{
	$ci = &get_instance();
	if(@$key){
		return $ci->input->post($key);
	}else{
		echo '<pre>';
		print_r($ci->input->post());
	}
}
function pagination($total='',$per_page='',$base_url='')
{
	$ci = &get_instance();
	$ci->load->library('pagination');
	$config['base_url'] = $base_url;
	$config['total_rows'] = $total;
	$config['per_page'] = $per_page;
	$config['full_tag_open']='<div class="pagination">';
	$config['full_tag_close']='</div>';
	$config['cur_tag_open']='<a class="active">';
	$config['cur_tag_close']='</a>';
    $config['next_link'] = '<i class="fa fa-caret-right"></i>';
    $config['prev_link'] = '<i class="fa fa-caret-left"></i>';  
    $config['first_link'] = '<i class="fa fa-chevron-left"></i><i class="fa fa-caret-left"></i>'; 
    $config['last_link'] = '<i class="fa fa-caret-right"></i><i class="fa fa-chevron-right"></i>';
	$ci->pagination->initialize($config);
	return $ci->pagination->create_links();
		
}

function file_upload($path='',$type='jpg|png|jpeg',$tool_name='image')
{
	$ci = &get_instance();
	$config['upload_path']= $path;
    $config['allowed_types']= $type;
    $config['max_size']= 9999999999999999999999999999999999999999999999999999999999999999999999999999999999;
    $ci->load->library('upload', $config);
    //echo $file=rand(1,100).$_FILES[$tool_name]['name'];die();
    if ($ci->upload->do_upload($tool_name))
    {
    	return true;
    }
    else
    {
       // $error = array('error' => $ci->upload->display_errors());
        return false;
    }
}

// this function is usedfor geting data, count record, and delete image from folder

function get_table($table)
{
	$ci = &get_instance();
	$qry=$ci->db->get($table);
	return $qry->result_array();

}
function get_data($data='',$fname='',$tname='')
{
	$ci = &get_instance();
	$ci->db->where($fname,$data);
	$qry = $ci->db->get($tname);
	return $qry->row_array();
}

function get_records($data='',$fname='',$tname='')
{
	$ci = &get_instance();
	$ci->db->where($fname,$data);
	$qry = $ci->db->get($tname);
	return $qry->result_array();
}


function delete_record($id='',$table='',$image_url='')
{
	$ci = &get_instance();
	if (@$image_url) {
		$arr=get_data($id,'id','exhibition');
		if(@$arr['image'])
		{
			$file=$image_url.$arr['image'];
			if(file_exists($file)){
				if(unlink($file)){
					$file=true;
				}else{
					$file=false;
				}
			}
		}
	}
	$ci->db->where('id',$id);
	if(($ci->db->delete($table))&&($file)){
		return true;
	}else{
		return false;
	}
	
}

function count_record($tbl='')
{
	$ci = &get_instance();
	$qry = $ci->db->get($tbl);
	return $qry->num_rows();
}

function delete_image($id='',$fname='',$tname='',$path='',$img_name='')
{
	$ci = &get_instance();
	$ci->db->where($fname,$id);
	$qry = $ci->db->get($tname);
	$arr = $qry->row_array();
	if($arr[$img_name]!='')
	{
		$x=$path.$arr[$img_name];
		unlink($x);
	}
}
// below function is user for checking internet connection
function is_connected()
{
    $connected = @fsockopen("www.google.com", 80); 
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}
// below function is user for get all record from passwed argumented table

?>
