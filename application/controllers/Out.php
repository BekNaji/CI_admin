<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Out extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


	}

	public function index()
	{
		session_destroy();
		redirect(base_url('login/index/login'));
	}

	
	


}