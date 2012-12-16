<?php if ( ! defined('BASEPATH')) exit('Aucun Acces direct autorisé');

if ( ! function_exists('isLogged')){
    function isLogged(){
    	$ci=& get_instance();

		$logged = false;
    	$ci->load->library('session');
    	$user = $ci->session->userdata('user_data'); 

    	if(!empty($user)){
    		$logged = true;
    	}
    	return $logged;
    }
}
?>