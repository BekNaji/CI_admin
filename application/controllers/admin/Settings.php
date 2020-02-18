<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public $logoname = "Your Logo Name";
	public $user = "users";
	public $company = "settings";




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
		// here we called lang files
		
		if($this->session->userdata('lang')=='turkish')
		{
			$this->lang->load("admin/home","turkish");
		}
		else
		{
			$this->lang->load("admin/home","english");
		}
		//$this->lang->load('admin/form', 'english');
		
		
		
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
		$data->alert = $this->alert_model->alert($this->uri->segment(4));
		$data->company  = $this->crud_model->get_data($this->company);

		$data->url = base_url();
		$data->title = $this->lang->line("settings");

		$id['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$id);


		$this->load->view("admin/settings/content",$data);


	}

	public function update()
	{
		// here we defined some variables to img upload
	 	$name = rand(1111,2222);
    	$config['upload_path']          = "assets/images/admin/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            =  $name;
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        // called upload function  from  library and send $config variable
        $this->load->library('upload', $config);

        // this if statmend is checking upload file
        if ($this->upload->do_upload("picture") != "")
        {
            
            $this->load->model("fileupload_model");
            $company  = $this->crud_model->get_data($this->company);
            $d = @unlink($company->logo);
            $data['logo'] = "assets/images/admin/".$this->upload->data("file_name");
        }
        
		
		// we already controlled form validation with javascript  before sending 
		// thats why we dont use CI form validation
		// here we defined array with came POST values. we will send this variables to db	
		$id['id']			= $this->input->post('id');
		$data['name'] 		= $this->input->post('name');
		$data['address']    = $this->input->post('address');
		$data['website']    = $this->input->post('website');
		$data['registration'] = $this->input->post('registration');
	
		// here we checked update
		if($this->crud_model->update($this->company,$data,$id))
		{
			redirect(base_url('admin/settings/index/updated'));
		}else
		{
			redirect(base_url('admin/settings/index/unupdated'));
		}
	}


}
