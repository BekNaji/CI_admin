<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $user = "users";
	private $company = "settings";
	private $menu = "menu";


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
		$data->alert = alert($this->uri->segment(4));

		$data->title = $this->lang->line("home");
		$id['id']  = $this->session->userdata('id');
		$data->user  = $this->crud_model->get_data_id($this->user,$id);

		$company_id['id'] = $data->user->company_id;
		$data->company  = $this->crud_model->get_data_id($this->company,$company_id);


		$top['topid'] = 0;
		$data->topmenu  = $this->crud_model->get_data($this->menu,$top);

		$sub['subid'] = 1;
		$data->submenu  = $this->crud_model->get_data($this->menu,$sub);

		


		

		$this->load->view("admin/home/content",$data);


	}


}
