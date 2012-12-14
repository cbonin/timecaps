<?php 

class boiteModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function addBoite($data)
	{
		$this->db->insert('boite', $data);
	}

	function listBoite()
	{
		$this->db->order_by("targetDate", "asc");
		$this->db->where('idOwner', 3);
		$query = $this->db->get('boite');

		return $query->result_array();
	}

	function getBoite($id)
	{
		$this->db->where('idBoite', $id);
		$query = $this->db->get('boite');

		return $query->result_array();
	}

	function getBoiteByUser($idBoite, $idOwner){
		$this->db->where('idBoite', $idBoite);
		$this->db->where('idOwner', $idOwner);

		return $query->result_array();
	}

	function updateBoite($id, $data)
	{
		$this->db->where('idBoite', $id);		
		$this->db->update('boite', $data);
	}

	function deleteBoite($id)
	{
		$this->db->where("idBoite", $id);
		$this->db->delete('boite');
	}

}