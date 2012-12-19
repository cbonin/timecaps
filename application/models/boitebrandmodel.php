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

	function getMyReceiverBoite($idUser){
		return $this->db->select()
			->where('idReceiver', $idUser)
			->get('boite')
			->result();
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
			->row();
	}

	function getAmountOfOpenBoite($nbBoite){
		$closedBoite =
			$this->db->where('statut <', 2)
			->from('boite')
			->count_all_results();
		return($nbBoite - $closedBoite);
	}
}