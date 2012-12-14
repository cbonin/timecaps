<?php if ( ! defined('BASEPATH')) exit('Aucun Acces direct autorisé');

if ( ! function_exists('isLogged')){
    function isLogged(){
    	$ci=& get_instance();

		$logged = false;
    	$ci->load->library('session');
    	$idUser = $ci->session->userdata('idUser'); 
    	if(isset($idUser)){
    		$logged = true;
    	}
    	return $logged;
    }
}
?>