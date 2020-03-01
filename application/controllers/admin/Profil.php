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

		//$this->lang->load('admin/form', 'english');

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

		$id['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$id);


		$data->alert = $this->alert_model->alert($this->uri->segment(4));
		
		$company_id['id'] = $data->user->company_id;
		$data->company  = $this->crud_model->get_data_id($this->company,$company_id);

		$data->url = base_url();
		$data->title = $this->lang->line("profil");

	

		

		$this->load->view("admin/profil/content",$data);


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
            
            //$this->load->model("fileupload_model");
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
		$data['password']  	= $this->encrypt->encode($this->input->post('password'));
		$data['birthday']  = $this->input->post('birthday');
		$data['address']    = $this->input->post('address');
		$data['website']    = $this->input->post('website');
		$data['language']    = $this->input->post('language');
		

		// here we checked update
		if($this->crud_model->update($this->user,$data,$id))
		{
			$this->session->set_userdata('lang',$this->input->post('language'));
			redirect(base_url('admin/profil/index/updated'));
		}else
		{
			redirect(base_url('admin/profil/index/unupdated'));
		}

	}

	function test()
	{
	


	}


}
