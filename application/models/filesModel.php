<?php
class filesModel extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function insertMaster($dataFile, $depositer){
		$fileId = $this->insert_file($dataFile);
		if($fileId){
			$depositer['idFile'] = $fileId;
			$this->insertDepositer($depositer);
			return true;
		}else{
			return false;
		}
	}

	private function insert_file($data) //param1 = insert le fichier, param2 = insert depositer
	{
		$this->db->insert('file', $data);
		return $this->db->insert_id();
	}

	private function insertDepositer($data) //param1 = insert le fichier, param2 = insert depositer
	{
		$this->db->insert('depot', $data);
	}

	public function insertMasterBrand($dataFile, $depositer){
		$fileId = $this->insert_file($dataFile);
		if($fileId){
			$depositer['idFile'] = $fileId;
			$this->insertDepositerBrand($depositer);
			return true;
		}else{
			return false;
		}
	}

	private function insertDepositerBrand($data) //param1 = insert le fichier, param2 = insert depositer
	{
		$this->db->insert('depotbrand', $data);
	}

	public function delete_file($file_id, $boite_id){
		$file = $this->get_file($file_id);
		if (!$this->db->where('idFile', $file_id)->delete('file'))
		{
			return FALSE;
		}
		unlink('./files/'.$boite_id.'/'.$file->nom);
		unlink('./files/'.$boite_id.'/thumb/'.$file->nom);
		return TRUE;
	}

	public function get_file($file_id)
	{
		return $this->db->select()
			->from('file')
			->where('idFile', $file_id)
			->get()
			->row();
	}

	public function getFiles($idBoite)
	{

		$data = array();

	   	$image = $this->db->select()
	         ->from('file')
	         ->like('type', 'image', 'after')
	         ->join('depot', 'depot.idFile = file.idFile')
	         ->where('idBoite', $idBoite)
	         ->get()
	         ->result();

     	$son = $this->db->select()
	         ->from('file')
	         ->like('type', 'audio', 'after')
	         ->join('depot', 'depot.idFile = file.idFile')
	         ->where('idBoite', $idBoite)
	         ->get()
	         ->result();

	    $video = $this->db->select()
	         ->from('file')
	         ->like('type', 'video', 'after')
	         ->join('depot', 'depot.idFile = file.idFile')
	         ->where('idBoite', $idBoite)
	         ->get()
	         ->result();

	    $text = $this->db->select()
	         ->from('file')
	         ->like('type', 'text', 'after')
	         ->or_like('type', 'appli', 'after')
	         ->join('depot', 'depot.idFile = file.idFile')
	         ->where('idBoite', $idBoite)
	         ->get()
	         ->result();

	    $data['image'] = $image;
	    $data['son'] = $son;
	    $data['video'] = $video;
	    $data['text'] = $text;
	    return $data;
	}

	public function getFilesBrand($idBoite)
	{
		$data = array();
	   	$image = $this->db->select()
	         ->from('file')
	         ->like('type', 'image', 'after')
	         ->join('depotbrand', 'depotbrand.idFile = file.idFile')
	         ->where('idBoiteBrand', $idBoite)
	         ->get()
	         ->result();

     	$son = $this->db->select()
	         ->from('file')
	         ->like('type', 'audio', 'after')
	         ->join('depotbrand', 'depotbrand.idFile = file.idFile')
	         ->where('idBoiteBrand', $idBoite)
	         ->get()
	         ->result();

	    $video = $this->db->select()
	         ->from('file')
	         ->like('type', 'video', 'after')
	         ->join('depotbrand', 'depotbrand.idFile = file.idFile')
	         ->where('idBoiteBrand', $idBoite)
	         ->get()
	         ->result();

	    $text = $this->db->select()
	         ->from('file')
	         ->like('type', 'text', 'after')
	         ->or_like('type', 'appli', 'after')
	         ->join('depotbrand', 'depotbrand.idFile = file.idFile')
	         ->where('idBoiteBrand', $idBoite)
	         ->get()
	         ->result();

	    $data['image'] = $image;
	    $data['son'] = $son;
	    $data['video'] = $video;
	    $data['text'] = $text;
	    return $data;
	}

	function getMyDepots($idBoite, $idUser){
		return $this->db->select()
			->from('depot')
			->where('idBoite', $idBoite)
			->where('idDepositeur', $idUser)
			->get()
			->result();
	}

	function getMyDepotsBrand($idBoite, $idUser){
		return $this->db->select()
			->from('depotbrand')
			->where('idBoiteBrand', $idBoite)
			->where('idDepositeur', $idUser)
			->get()
			->result();
	}
}