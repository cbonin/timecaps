<?php 

class userBrandModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function addUser($data)
	{
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	function getUserBrand($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('userBrand');

		return $query->row();
	}

	function getUserById($id)
	{
		$this->db->where('idUser', $id);
		$query = $this->db->get('user');

		return $query->row();
	}

	function updateUser($data)
	{
		$this->db->where('idUser', $data['idUser']);		
		$this->db->update('user', $data);
	}

	function deleteUser($id)
	{
		$this->db->where("idUser", $id);
		$this->db->delete('user');
	}

}