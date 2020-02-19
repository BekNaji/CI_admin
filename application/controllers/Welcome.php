<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('parser');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test()
	{
		$this->load->library('encrypt');

		$msg = '12345';
		$encrypted_string = $this->encrypt->encode($msg);

		echo $encrypted_string;

		echo "<hr>";

		echo $this->encrypt->decode($encrypted_string);
	}
}
