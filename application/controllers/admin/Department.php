<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	private $user = "users";
	private $company = "settings";
	private $menu = "menu";
	private $department  = "department";

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

		$data->url = base_url();
		$data->alert = $this->alert_model->alert($this->uri->segment(4));

		$data->title = $this->lang->line("home");
		$id['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$id);

		$data->department = $this->crud_model->get_datas($this->department);

		$company_id['id'] = $data->user->company_id;
		$data->company  = $this->crud_model->get_data_id($this->company,$company_id);




		$top['topid'] = 0;
		$data->topmenu  = $this->crud_model->get_data($this->menu,$top);

		$sub['subid'] = 1;
		$data->submenu  = $this->crud_model->get_data($this->menu,$sub);

		


		

		$this->load->view("admin/department/content",$data);


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
		$data->alert = $this->alert_model->alert($this->uri->segment(4));

		$data->title = $this->lang->line("home");
		$id['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$id);

		$company_id['id'] = $data->user->company_id;
		$data->company  = $this->crud_model->get_data_id($this->company,$company_id);


		$top['topid'] = 0;
		$data->topmenu  = $this->crud_model->get_data($this->menu,$top);

		$sub['subid'] = 1;
		$data->submenu  = $this->crud_model->get_data($this->menu,$sub);

		


		

		$this->load->view("admin/department/create",$data);


	}

	public function edit($value)
	{
		// here we are controlling user
		if(!$this->user_login->isLoggin())
		{
		 	redirect(base_url('login'));
		 	die();
		}
		if($value == "")
		{
			echo $error;
			die();
		}
		
	
		$data = new stdClass();

		$data->url = base_url();
		$data->alert = $this->alert_model->alert($this->uri->segment(4));

		$id['id'] = $value;
		$data->department  = $this->crud_model->get_data_id($this->department,$id);

		$data->title = $this->lang->line("home");
		$id['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$id);

		$company_id['id'] = $data->user->company_id;
		$data->company  = $this->crud_model->get_data_id($this->company,$company_id);


		$top['topid'] = 0;
		$data->topmenu  = $this->crud_model->get_data($this->menu,$top);

		$sub['subid'] = 1;
		$data->submenu  = $this->crud_model->get_data($this->menu,$sub);

		
		$this->load->view("admin/department/edit",$data);


	}

	public function Store()
	{
		if($this->input->post("name") != "")
		{
			$data['name'] = $this->input->post("name");

			if($this->crud_model->insertData($this->department,$data))
			{
				redirect(base_url("admin/department/index/saved"));
			}
		}
		else{
			redirect(base_url("admin/department/create/free"));
		}
	}

	public function Update()
	{
		if($this->input->post("name") != "")
		{
			$data['name'] = $this->input->post("name");
			$id['id'] = $this->input->post("id");

			if($this->crud_model->update($this->department,$data,$id))
			{
				redirect(base_url("admin/department/index/updated"));
			}else
			{
				redirect(base_url("admin/department/index/unupdated"));
			}
		}
		else{
			redirect(base_url("admin/department/create/free"));
		}
	}

	public function Delete($value)
	{
		if($value != "")
		{
			$id['id'] = $value;
			if($this->crud_model->deleteData($this->department,$id))
			{
				redirect(base_url("admin/department/index/deleted"));
			}
			else
			{
				redirect(base_url("admin/department/index/undeleted"));
			}

		}
		
	}
	
}
