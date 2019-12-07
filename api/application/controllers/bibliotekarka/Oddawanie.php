<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Oddawanie extends CI_Controller {

	//to co jest w tej funkcji jest automatycznie we wszystkich innych
	public function __construct()
	{
		parent::__construct();


		$post = file_get_contents ( 'php://input' );
		$_POST = json_decode( $post, true);
		$this ->load->model('bibliotekarka/Oddawanie_model');
		//$this ->load->library('application/libraries/Zenda');

	}


	public function get_wypozyczenia_czytelnika( $id = false)
	{
		
		$output = $this -> Oddawanie_model ->get_wypozyczenia_czytelnika( $id );
		echo json_encode( $output);

	}


	public function get_czytelnicy()
	{
		
		$output = $this -> Oddawanie_model ->get_czytelnicy();
		echo json_encode( $output);

	}

	public function get_pochodzenie()
	{
		
		$output = $this -> Oddawanie_model ->get_pochodzenie();
		echo json_encode( $output);

	}

	public function get_countries()
	{
		
		$output = $this -> Oddawanie_model ->get_countries();
		echo json_encode( $output);

	}

	public function get_id_czytelnika ( $imie_nazwisko = false)
	{
		

		//$output = $this -> Wypozyczanie_model ->get_id_czytelnika( $imie_nazwisko );
		$output = $this -> Oddawanie_model ->get_id_czytelnika( $imie_nazwisko );
		echo json_encode( $output);
	}

	public function get_imienazwisko_czytelnika ( $id_czytelnika = true)
	{
		
		$output = $this -> Oddawanie_model ->get_imienazwisko_czytelnika( $id_czytelnika );
		echo json_encode( $output);
	}

	public function oddaj_ksiazke($id_czytelnika, $nr_inwentarza)
	{
		
		$this -> Oddawanie_model ->oddaj_ksiazke($id_czytelnika, $nr_inwentarza);
	
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