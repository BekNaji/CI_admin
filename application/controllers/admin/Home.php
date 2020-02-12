<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $website = "NBM: ";
	private $table = "users";

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

		echo "Cookie = ".get_cookie("email");
		echo "<hr>";
		echo "Session = ".$this->session->userdata("email");
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
		$data->title = "Home Page";
		$data->text  = "Hello World";
		$data->user  = "Bekzod";
		$data->age   = 22;

		echo $this->parser->parse("admin/home",$data,true);


	}
}
