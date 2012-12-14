<?php if ( ! defined('BASEPATH')) exit('Aucun Acces direct autorisé');

if ( ! function_exists('isLogged')){
    function isLogged(){
    	$ci=& get_instance();

		$logged = false;
    	$ci->load->library('session');    	    	
    	$session = $ci->session->all_userdata();
    	if(isset($session['idUser'])){
    		$logged = true;
    	}
    	return $logged;
    }
}
?>