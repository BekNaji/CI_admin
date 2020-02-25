<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendemail_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->model("crud_model");
	}

	public function sendEmail($value='')
	{

		
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'bekzod19950430@gmail.com';
		$config['smtp_pass'] = '19950430';
		$config['starttls'] = true;
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['wordwrap'] = true;
		//$config['newline'] = '\r\n';

		$this->load->library('email', $config);

		$this->email->set_newline("\r\n");

		//$this->email->initialize($config);
		$table = "users";
		$email['email'] = $value;
		
		$data['email_code'] = rand(1111,2222);


		if($this->crud_model->update($table,$data,$email))
		{
			$this->email->from('bekzod19950430@gmail.com','Bek Naji');
			$this->email->to($value);
			
			$this->email->subject('Verify Code');


			$this->email->message("Verifield code: ".$data['email_code']);

			if($this->email->send())
			{
				return 1;
			}else
			{
				return 0;
				echo $this->email->print_debugger();
			}

		}

		
	}


}