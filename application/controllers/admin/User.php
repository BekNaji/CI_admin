<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $user = "users";
	private $company = "settings";
	public function __construct()
	{
		parent::__construct();
		//we got user login model
		$this->load->model("user_login");
			// here we are controlling user
		if(!$this->user_login->isLoggin())
		{
		 	redirect(base_url('login'));
		 	die();
		}


		if($this->session->userdata('lang')=='turkish')
		{
			$this->lang->load("admin/home","turkish");
		}
		else
		{
			$this->lang->load("admin/home","english");
		}

		$this->load->helper('alert_helper');

		$this->load->model("crud_model");
		// we will use this parser model
		$this->load->library('parser');
	}

	
	public function index()
	{
			// here we are controlling user
		if(!$this->user_login->isLoggin())
		{
		 	redirect(base_url('login'));
		 	die();
		}

		$data = new stdClass();
		$data->url = base_url();

		$data->alert = $this->alert_model->alert($this->uri->segment(4));
		$data->company  = $this->crud_model->get_data($this->company);

		$data->title = $this->lang->line("user_list");
		
		$data->users  = $this->crud_model->get_datas($this->user);

		$user['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$user);

		$this->load->view("admin/user/list",$data);
	}

	public function create()
	{
				// here we are controlling user
		if(!$this->user_login->isLoggin())
		{
		 	redirect(base_url('login'));
		 	die();
		}

		$data = new stdClass();
		$data->url = base_url();
		$data->title = $this->lang->line("add_user");

		$data->alert = $this->alert_model->alert($this->uri->segment(4));
		$data->company  = $this->crud_model->get_data($this->company);
		

		$user['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$user);

		$this->load->view("admin/user/create",$data);
	}

	public function store()
	{
		

		// here we defined some variables to img upload
	 	$name = rand(3333,4444);
    	$config['upload_path']          = "assets/images/admin/";
        $config['allowed_types']        = '*';
        $config['file_name']            =  $name;
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        // called upload function  from  library and send $config variable
        $this->load->library('upload', $config);

        // this if statmend is checking upload file
        if ($this->upload->do_upload("image") != "")
        {
            
            $data['image'] = "assets/images/admin/".$this->upload->data("file_name");
        }

		// we already controlled form validation with javascript  before sending 
		// thats why we dont use CI form validation
		// here we defined array with came POST values. we will send this variables to db	
		$data['first_name'] 	= $this->input->post('first_name');
		$data['last_name']  	= $this->input->post('last_name');
		$data['email']  		= $this->input->post('email');
		$data['birthday']  	    = $this->input->post('birthday');
		$data['address']    	= $this->input->post('address');
		$data['website']    	= $this->input->post('website');
		$data['language']    	= $this->input->post('language');
		$data['who']    		= $this->input->post('who');
		

		// here we checked update * we have to send tablename and data
		if($this->crud_model->insertData($this->user,$data))
		{
			
			redirect(base_url('admin/user/index/saved'));
		}else
		{
			redirect(base_url('admin/user/index/saved'));
		}

	}

	public function edit($id)
	{
		$edit_id['id'] = $id;

		$data = new stdClass();
		$data->url = base_url();
		$data->title = $this->lang->line("add_user");

		$data->edit = $this->crud_model->get_data_id($this->user,$edit_id);

		$data->alert = $this->alert_model->alert($this->uri->segment(4));
		$data->company  = $this->crud_model->get_data($this->company);
		

		$user['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$user);

		$this->load->view("admin/user/edit",$data);
	}

	
	public function update()
	{
		
		$id['id']			= $this->input->post('id');

		// here we defined some variables to img upload
	 	$name = rand(3333,4444);
    	$config['upload_path']          = "assets/images/admin/";
        $config['allowed_types']        = '*';
        $config['file_name']            =  $name;
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        // called upload function  from  library and send $config variable
        $this->load->library('upload', $config);

        // this if statmend is checking upload file
        if ($this->upload->do_upload("image") != "")
        {
            
            $this->load->model("fileupload_model");
            $user  = $this->crud_model->get_data_id($this->user,$id);
            @unlink($user->image);
            $data['image'] = "assets/images/admin/".$this->upload->data("file_name");
        }

		// we already controlled form validation with javascript  before sending 
		// thats why we dont use CI form validation
		// here we defined array with came POST values. we will send this variables to db	
		$data['first_name'] 	= $this->input->post('first_name');
		$data['last_name']  	= $this->input->post('last_name');
		$data['email']  		= $this->input->post('email');
		$data['birthday']  		= $this->input->post('birthday');
		$data['address']    	= $this->input->post('address');
		$data['website']    	= $this->input->post('website');
		$data['who']    		= $this->input->post('who');
		$data['language']    	= $this->input->post('language');
		

		// here we checked update
		if($this->crud_model->update($this->user,$data,$id))
		{
			
			redirect(base_url('admin/user/index/updated'));
		}else
		{
			redirect(base_url('admin/user/index/unupdated'));
		}

	}

	public function delete($id)
	{
		$user_id['id'] = $id;

		if($id == $this->session->userdata('id'))
		{
			redirect(base_url('admin/user/index/undeleted'));
		}
		if($id != "")
		{

            $user = $this->crud_model->get_data_id($this->user,$user_id);
            @unlink($user->image);
            if($this->crud_model->deleteData($this->user,$user_id))
			{
				redirect(base_url('admin/user/index/deleted'));
			}else
			{
				redirect(base_url('admin/user/index/undeleted'));
			}

		}
		
	}
}
