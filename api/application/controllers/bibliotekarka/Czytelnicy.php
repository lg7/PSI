<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Czytelnicy extends CI_Controller {

	//to co jest w tej funkcji jest automatycznie we wszystkich innych
	public function __construct()
	{
		parent::__construct();
		$post = file_get_contents ( 'php://input' );
		$_POST = json_decode( $post, true);
		$this ->load->model('bibliotekarka/Czytelnicy_model');
		//$this ->load->library('application/libraries/Zenda');

	}

	public function get_czytelnicy( $klasa = false)
	{
		
		$output = $this -> Czytelnicy_model ->get_czytelnicy( $klasa );
		echo json_encode( $output);

	}

	public function get_id_czytelnika ( $imie_nazwisko = false)
	{
		
		$imie_nazwisko_temp = $imie_nazwisko;
		$imie_nazwisko = str_replace('%20', ' ', $imie_nazwisko_temp);

		//$output = $this -> Wypozyczanie_model ->get_id_czytelnika( $imie_nazwisko );
		$output = $this -> Wypozyczanie_model ->get_id_czytelnika( 'Tyma Irena' );
		echo json_encode( $output);
	}

	
	public function insert_czytelnik( $imie_nazwisko =true, $klasa = true )
	{	
		$imie_nazwisko_temp = $imie_nazwisko;
		$imie_nazwisko = str_replace('%20', ' ', $imie_nazwisko_temp);
		$imie_nazwisko = str_replace('%C5%82', 'ł', $imie_nazwisko); //ł
		$imie_nazwisko = str_replace('%C3%B3', 'ó', $imie_nazwisko); //ó
		$imie_nazwisko = str_replace('%C4%85', 'ą', $imie_nazwisko);//ą 
		$imie_nazwisko = str_replace('%C4%87', 'ć', $imie_nazwisko);//ć 
		$imie_nazwisko = str_replace('%C4%99', 'ę', $imie_nazwisko);//ę  
		$imie_nazwisko = str_replace('%C5%84', 'ń', $imie_nazwisko);//ń 
		$imie_nazwisko = str_replace('%C5%9B', 'ś', $imie_nazwisko);//ś 
		$imie_nazwisko = str_replace('%C5%BA', 'ź', $imie_nazwisko);//ź
		$imie_nazwisko = str_replace('%C5%BC', 'ż', $imie_nazwisko);//ż

		$imie_nazwisko = str_replace('%C5%81', 'Ł', $imie_nazwisko); //Ł
		$imie_nazwisko = str_replace('%C3%93', 'Ó', $imie_nazwisko); //Ó
		$imie_nazwisko = str_replace('%C4%84', 'Ą', $imie_nazwisko);//Ą 
		$imie_nazwisko = str_replace('%C4%86', 'Ć', $imie_nazwisko);//Ć
		$imie_nazwisko = str_replace('%C4%98', 'Ę', $imie_nazwisko);//Ę  
		$imie_nazwisko = str_replace('%C5%83', 'Ń', $imie_nazwisko);//Ń 
		$imie_nazwisko = str_replace('%C5%9A', 'Ś', $imie_nazwisko);//Ś 
		$imie_nazwisko = str_replace('%C5%B9', 'Ź', $imie_nazwisko);//Ź
		$imie_nazwisko = str_replace('%C5%BB', 'Ż', $imie_nazwisko);//Ż

		

		$this -> Czytelnicy_model -> insert_czytelnik($imie_nazwisko, $klasa);

	}


	public function update_czytelnik($id_czytelnika = true,  $imie_nazwisko =true, $klasa = true, $uwagi = false )
	{	

		$imie_nazwisko_temp = $imie_nazwisko;
		$imie_nazwisko = str_replace('%20', ' ', $imie_nazwisko_temp);
		$imie_nazwisko = str_replace('%C5%82', 'ł', $imie_nazwisko); //ł
		$imie_nazwisko = str_replace('%C3%B3', 'ó', $imie_nazwisko); //ó
		$imie_nazwisko = str_replace('%C4%85', 'ą', $imie_nazwisko);//ą 
		$imie_nazwisko = str_replace('%C4%87', 'ć', $imie_nazwisko);//ć 
		$imie_nazwisko = str_replace('%C4%99', 'ę', $imie_nazwisko);//ę  
		$imie_nazwisko = str_replace('%C5%84', 'ń', $imie_nazwisko);//ń 
		$imie_nazwisko = str_replace('%C5%9B', 'ś', $imie_nazwisko);//ś 
		$imie_nazwisko = str_replace('%C5%BA', 'ź', $imie_nazwisko);//ź
		$imie_nazwisko = str_replace('%C5%BC', 'ż', $imie_nazwisko);//ż

		$imie_nazwisko = str_replace('%C5%81', 'Ł', $imie_nazwisko); //Ł
		$imie_nazwisko = str_replace('%C3%93', 'Ó', $imie_nazwisko); //Ó
		$imie_nazwisko = str_replace('%C4%84', 'Ą', $imie_nazwisko);//Ą 
		$imie_nazwisko = str_replace('%C4%86', 'Ć', $imie_nazwisko);//Ć
		$imie_nazwisko = str_replace('%C4%98', 'Ę', $imie_nazwisko);//Ę  
		$imie_nazwisko = str_replace('%C5%83', 'Ń', $imie_nazwisko);//Ń 
		$imie_nazwisko = str_replace('%C5%9A', 'Ś', $imie_nazwisko);//Ś 
		$imie_nazwisko = str_replace('%C5%B9', 'Ź', $imie_nazwisko);//Ź
		$imie_nazwisko = str_replace('%C5%BB', 'Ż', $imie_nazwisko);//Ż


		$uwagi_temp = $uwagi;
		$uwagi = str_replace('%20', ' ', $uwagi_temp);
		$uwagi = str_replace('%C5%82', 'ł', $uwagi); //ł
		$uwagi = str_replace('%C3%B3', 'ó', $uwagi); //ó
		$uwagi = str_replace('%C4%85', 'ą', $uwagi);//ą 
		$uwagi = str_replace('%C4%87', 'ć', $uwagi);//ć 
		$uwagi = str_replace('%C4%99', 'ę', $uwagi);//ę  
		$uwagi = str_replace('%C5%84', 'ń', $uwagi);//ń 
		$uwagi = str_replace('%C5%9B', 'ś', $uwagi);//ś 
		$uwagi = str_replace('%C5%BA', 'ź', $uwagi);//ź
		$uwagi = str_replace('%C5%BC', 'ż', $uwagi);//ż

		$uwagi = str_replace('%C5%81', 'Ł', $uwagi); //Ł
		$uwagi = str_replace('%C3%93', 'Ó', $uwagi); //Ó
		$uwagi = str_replace('%C4%84', 'Ą', $uwagi);//Ą 
		$uwagi = str_replace('%C4%86', 'Ć', $uwagi);//Ć
		$uwagi = str_replace('%C4%98', 'Ę', $uwagi);//Ę  
		$uwagi = str_replace('%C5%83', 'Ń', $uwagi);//Ń 
		$uwagi = str_replace('%C5%9A', 'Ś', $uwagi);//Ś 
		$uwagi = str_replace('%C5%B9', 'Ź', $uwagi);//Ź
		$uwagi = str_replace('%C5%BB', 'Ż', $uwagi);//Ż


		$this -> Czytelnicy_model -> update_czytelnik($id_czytelnika, $imie_nazwisko, $klasa, $uwagi );

	}

	public function get_czytelnik ( $id_czytelnika = true )
	{	

		$output = $this -> Czytelnicy_model ->get_czytelnik( $id_czytelnika );
		echo json_encode( $output);

	}

}