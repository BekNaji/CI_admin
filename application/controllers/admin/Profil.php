<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	
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
		
		//$this->lang->load('admin/form', 'english');

		
		$this->load->helper('alert_helper');
		$this->load->model("crud_model");
		// we will use this parser model
		$this->load->library('parser');
	}

	// this is home page of admin panel
	public function index()
	{
		// here we are controlling user
		if(!$this->user_login->isLoggin())
		{
		 	redirect(base_url('login'));
		 	die();
		}

		$data = new stdClass();
		$data->alert = alert($this->uri->segment(4));
		$data->company  = $this->crud_model->get_data($this->company);
		$data->url = base_url();
		$id['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$id);

		$this->load->view("admin/profil/content",$data);


	}

	
	public function update()
	{
		// here we are controlling user
		if(!$this->user_login->isLoggin())
		{
		 	redirect(base_url('login'));
		 	die();
		}
		$id['id']			= $this->input->post('id');

		// here we defined some variables to img upload
	 	$name = rand(3333,4444);
    	$config['upload_path']          = "assets/images/admin/";
        $config['allowed_types']        = 'gif|jpg|png';
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
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name']  = $this->input->post('last_name');
		$data['email']  	= $this->input->post('email');
		$data['birthday']  = $this->input->post('birthday');
		$data['address']    = $this->input->post('address');
		$data['website']    = $this->input->post('website');
		

		// here we checked update
		if($this->crud_model->update($this->user,$data,$id))
		{
			redirect(base_url('admin/profil/index/updated'));
		}else
		{
			redirect(base_url('admin/profil/index/unupdated'));
		}

	}


}
