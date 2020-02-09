<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {


	//get all data from list
	public function get_data($table)
	{
		$query = $this->db->get($table);

		if($query->num_rows() > 0){

			return $query;

		}
	}

	//insert data 
	public function insertData($table,$data)
	{
		$query = $this->db->insert($table,$data);
		if($query)
		{
			return 1;
		}else
		{
			return 0;
		}
	}

	//delete data from id
	public function deleteData($idname,$id,$table)
	{
		$query = $this->db->where($idname,$id)->delete($table);
		if($query)
		{
			return 1;
		}else
		{
			return 0;
		}
	}


}
