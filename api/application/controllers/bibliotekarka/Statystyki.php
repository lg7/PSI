<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statystyki extends CI_Controller {

	//to co jest w tej funkcji jest automatycznie we wszystkich innych
	public function __construct()
	{
		parent::__construct();
		$post = file_get_contents ( 'php://input' );
		$_POST = json_decode( $post, true);
		$this ->load->model('bibliotekarka/Statystyki_model');
		//$this ->load->library('application/libraries/Zenda');

	}

	public function get_statystyki_wypozyczenia_pierwszy_sem( $klasa = false)
	{
		
		$output = $this -> Statystyki_model ->get_statystyki_wypozyczenia_pierwszy_sem($klasa);
		echo json_encode( $output);

	}

	public function get_statystyki_wypozyczenia_drugi_sem( $klasa = false)
	{
		
		$output = $this -> Statystyki_model ->get_statystyki_wypozyczenia_drugi_sem($klasa);
		echo json_encode( $output);

	}

	public function get_statystyki_kazdy_dzien()
	{
		
		$output = $this -> Statystyki_model ->get_statystyki_kazdy_dzien();
		echo json_encode( $output);

	}



	public function get_liczba_wypozyczen_pierwszy_sem( $klasa = false)
	{
		
		$output = $this -> Statystyki_model ->get_liczba_wypozyczen_pierwszy_sem($klasa);
		echo json_encode( $output);

	}


	public function get_liczba_wypozyczen_drugi_sem( $klasa = false)
	{
		
		$output = $this -> Statystyki_model ->get_liczba_wypozyczen_drugi_sem($klasa);
		echo json_encode( $output);

	}


	public function get_statystyki_wypozyczenia_styczen( $klasa = false)
	{
		
		$output = $this -> Statystyki_model ->get_statystyki_wypozyczenia_styczen($klasa);
		echo json_encode( $output);

	}


	public function get_liczba_wypozyczen_styczen( $klasa = false)
	{
		
		$output = $this -> Statystyki_model ->get_liczba_wypozyczen_styczen($klasa);
		echo json_encode( $output);

	}



}