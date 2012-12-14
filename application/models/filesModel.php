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

	public function delete_file($file_id){
		$file = $this->get_file($file_id);
		if (!$this->db->where('idFile', $file_id)->delete('file'))
		{
			return FALSE;
		}
		unlink('./files/' . $file->nom);
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
	   return $this->db->select()
	         ->from('file')
	         ->join('depot', 'depot.idFile = file.idFile')
	         ->where('idBoite', $idBoite)
	         ->get()
	         ->result();
	}

}