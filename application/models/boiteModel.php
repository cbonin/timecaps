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

	function getBoite($id)
	{
		$this->db->where('idBoite', $id);
		$query = $this->db->get('boite');

		return $query->result_array();
	}

	function updateBoite($data)
	{
		$this->db->where('idBoite', $data['idBoite']);		
		$this->db->update('boite', $data);
	}

	function deleteBoite($id)
	{
		$this->db->where("idBoite", $id);
		$this->db->delete('boite');
	}

}