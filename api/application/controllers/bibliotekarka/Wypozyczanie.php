<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Wypozyczanie extends CI_Controller {

	//to co jest w tej funkcji jest automatycznie we wszystkich innych
	public function __construct()
	{
		parent::__construct();


		$post = file_get_contents ( 'php://input' );
		$_POST = json_decode( $post, true);
		$this ->load->model('bibliotekarka/Wypozyczanie_model');
		//$this ->load->library('application/libraries/Zenda');

	}


	public function get_wypozyczenia_czytelnika( $id = false)
	{
		
		$output = $this -> Wypozyczanie_model ->get_wypozyczenia_czytelnika( $id );
		echo json_encode( $output);

	}


	public function get_czytelnicy()
	{
		
		$output = $this -> Wypozyczanie_model ->get_czytelnicy();
		echo json_encode( $output);

	}

	public function get_pochodzenie()
	{
		
		$output = $this -> Wypozyczanie_model ->get_pochodzenie();
		echo json_encode( $output);

	}

	public function get_countries()
	{
		
		$output = $this -> Wypozyczanie_model ->get_countries();
		echo json_encode( $output);

	}

	public function get_id_czytelnika ( $imie_nazwisko = false)
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
		$imie_nazwisko = str_replace('%C4%84', 'ą', $imie_nazwisko);//Ą 
		$imie_nazwisko = str_replace('%C4%86', 'Ć', $imie_nazwisko);//Ć
		$imie_nazwisko = str_replace('%C4%98', 'Ę', $imie_nazwisko);//Ę  
		$imie_nazwisko = str_replace('%C5%83', 'Ń', $imie_nazwisko);//Ń 
		$imie_nazwisko = str_replace('%C5%9A', 'Ś', $imie_nazwisko);//Ś 
		$imie_nazwisko = str_replace('%C5%B9', 'Ź', $imie_nazwisko);//Ź
		$imie_nazwisko = str_replace('%C5%BB', 'Ż', $imie_nazwisko);//Ż

		//$output = $this -> Wypozyczanie_model ->get_id_czytelnika( $imie_nazwisko );
		$output = $this -> Wypozyczanie_model ->get_id_czytelnika( $imie_nazwisko );
		echo json_encode( $output);
	}

	public function get_imienazwisko_czytelnika ( $id_czytelnika = true)
	{
		
		$output = $this -> Wypozyczanie_model ->get_imienazwisko_czytelnika( $id_czytelnika );
		echo json_encode( $output);
	}

	public function wypozycz_ksiazke($id_czytelnika, $nr_inwentarza)
	{
		
		$this -> Wypozyczanie_model ->wypozycz_ksiazke($id_czytelnika, $nr_inwentarza);
	
	}

	public function randomowy()
	{
		//I'm just using rand() function for data example
		$temp = rand(10000, 99999);
		$this->set_barcode($temp);
	}
	
	private function set_barcode($code)
	{
		//load library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	}


}