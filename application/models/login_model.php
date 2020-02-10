<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $table = "users";

	public function __construct()
	{
		parent::__construct();
		
	}

	public function setUser($data)
	{
		if($data != "")
		{
			$value['email'] = $data['email'];
			$value['password'] = $data['password'];

			// we will get datas from db 
			$query = $this->db->select("*")->where($value)->from($this->table)->get();
			
			// if query is true  
			if($query->num_rows()>0)
			{
				if($data['cookie_key'] != "")
				{

				}else
				{

				}
				

			}else
			{
				redirect();
			}
		}
	}


}
