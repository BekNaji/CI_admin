<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function sessioncontrol($user="")
	{
		if(!isset($user))
		{
			header("Location:".base_url("login"));
		}
	}

	public function usercontrol($data,$table)
	{
		if(!empty($data))
		{
			$query = $this->db->where($data)->from($table)->get();
			if($query->num_rows()>0)
			{
				$this->session->set_userdata("user",$query->row()->user_email);
				header("Location:".base_url("home"));
			}
			else
			{
				header("Location:".base_url("login/index/fielduser"));
			}
		}else
		{
			header("Location:".base_url("login/index/freearea"));
		}
	}
}
