<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {


	//get all data from list
	public function get_data($table)
	{
		$query = $this->db->get($table);

		if($query->num_rows() > 0){

			return $query->row();

		}
	}

	//get all data from list
	public function get_data_id($table,$id)
	{
		if($table !="" and $id != "")
		{
			$query = $this->db->where($id)->from($table)->get();

			if($query->num_rows() > 0)
			{

				return $query->row();

			}
		}
	}

	//get all data from list
	public function update($table,$data,$id)
	{
		if($table !="" and $id != "" and $data != "")
		{
			
			$query = $this->db->where($id)->update($table,$data);

			if($query)
			{
				return true;
			}else
			{
				return false;
			}
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
