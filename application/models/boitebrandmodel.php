<?php 

class boiteBrandModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function addBoiteBrand($data)
	{
		$this->db->insert('boiteBrand', $data);
		return $this->db->insert_id();
	}

	function addPool($data)
	{
		$this->db->insert('pool', $data);
	}

	function getBoiteBrand($id)
	{
		$this->db->where('idBoiteBrand', $id);
		$query = $this->db->get('boiteBrand');

		return $query->row();
	}

	function getBoiteBrandByUser($idOwner){
		$this->db->where('idOwner', $idOwner);
		$query = $this->db->get('boiteBrand');

		return $query->result();
	}

	function updateBoiteBrand($id, $data)
	{
		$this->db->where('idBoiteBrand', $id);		
		$this->db->update('boiteBrand', $data);
	}

	function deleteBoiteBrand($id)
	{
		$this->db->where("idBoiteBrand", $id);
		$this->db->delete('boiteBrand');
	}

}