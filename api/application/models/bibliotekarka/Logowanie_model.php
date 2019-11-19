<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logowanie_model extends CI_Model
{
        
    public function zaloguj($login, $haslo)
    {   
        $this->db->where('login', $login);
        $q = $this ->db->get('dane_uzytkownikow');
        $result = $q -> row();

        if( empty($result) || $haslo != $result->haslo )
        {
            $output= false;
        }
        else
        {
            $output = $result;
        }

        return $output;





    }
    

}