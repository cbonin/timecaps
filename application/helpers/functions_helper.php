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

if ( ! function_exists('isLoggedBrand')){
    function isLoggedBrand(){
        $ci=& get_instance();

        $logged = false;

        if($ci->uri->segment(2, 0) != "displayBoite"){
            $logged = true;
        }
        
        return $logged;
    }
}

function setLanguage($lang){
    $ci=& get_instance();
    $ci->load->helper('cookie');

    $cookie = array(
        'name'   => 'lang',
        'value'  => $lang,
        'expire' => '86500',
    );

    set_cookie($cookie);
    redirect($_SERVER['HTTP_REFERER']);
}

function includeLang(){
    $ci=& get_instance();
    $ci->load->helper('cookie');

    
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
    $cookie = get_cookie('lang');
    if($cookie){$lang = $cookie;}

    if ($lang == 'fr') {          
        // si la langue est 'fr' (français) on inclut le fichier fr-lang.php
        include('lang/fr-lang.php');
    } elseif ($lang == 'en') {
        // si la langue est 'en' (anglais) on inclut le fichier en-lang.php
        include('lang/en-lang.php');
    }
}

function boiteOpenable($boite){
    $ci=& get_instance();
    $ci->load->helper('date');
    $now = now();
    $target = strtotime($boite->targetDate);
    if($now >= $target) return true; else return false;
}

function formatDate($date){
    $tab = explode('-', $date);
    $date = $tab[2].'/'.$tab[1].'/'.$tab[0];
    return $date;
}

?>