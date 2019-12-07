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
		$this -> Czytelnicy_model -> insert_czytelnik($imie_nazwisko, $klasa);
	}


	public function update_czytelnik($id_czytelnika = true,  $imie_nazwisko =true, $klasa = true, $uwagi = false )
	{	

		$this -> Czytelnicy_model -> update_czytelnik($id_czytelnika, $imie_nazwisko, $klasa, $uwagi );

	}

	public function get_czytelnik ( $id_czytelnika = true )
	{	

		$output = $this -> Czytelnicy_model ->get_czytelnik( $id_czytelnika );
		echo json_encode( $output);

	}

}