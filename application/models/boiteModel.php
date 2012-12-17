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

	function getBoiteByUser($idOwner){
		$this->db->where('idOwner', $idOwner);
		$query = $this->db->get('boite');

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

	function addContributor($data){
		$this->db->insert('contributeurs', $data);
	}

	function getAllContributors($idBoite){
		return $this->db->select()
			->from('user')
			->join('contributeurs', 'contributeurs.idUser = user.idUser')
			->where('contributeurs.idBoite', $idBoite)
			->get()
			->result();
	}

	function getMyBoiteContributor($idUser){
		return $this->db->select()
			->from('boite')
			->join('contributeurs', 'contributeurs.idBoite = boite.idBoite')
			->where('contributeurs.idUser', $idUser)
			->get()
			->result();
	}

	function getAmountOfBoite(){
		return $this->db->select_max('idBoite')
			->get('boite')
			->result();
	}

}