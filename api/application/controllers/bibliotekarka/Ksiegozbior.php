<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ksiegozbior extends CI_Controller {

	//to co jest w tej funkcji jest automatycznie we wszystkich innych
	public function __construct()
	{
		parent::__construct();
		$post = file_get_contents ( 'php://input' );
		$_POST = json_decode( $post, true);
		$this ->load->model('bibliotekarka/Ksiegozbior_model');
		//$this ->load->library('application/libraries/Zenda');

	}


	public function get_ostatni_nr_inwentarza()
	{	

		$output = $this -> Ksiegozbior_model ->get_ostatni_nr_inwentarza();
		echo json_encode( $output);
	}


	public function get_ksiegozbior()
	{
		
		$output = $this -> Ksiegozbior_model ->get_ksiegozbior();
		echo json_encode( $output);

	}

	public function get_id_miejsca( $znak_miejsca = true )
	{	

		

		$output = $this -> Ksiegozbior_model ->get_id_miejsca( $znak_miejsca);
		echo json_encode( $output);

	}

	public function insert_miejsce( $znak_miejsca = true )
	{	

		
		$this -> Ksiegozbior_model ->insert_miejsce( $znak_miejsca);

	}


	public function get_id_autora( $nazwa_autora = true )
	{	

	
		

		$output = $this -> Ksiegozbior_model ->get_id_autora( $nazwa_autora);
		echo json_encode( $output);

	}

	public function insert_nazwa_autora( $nazwa_autora = true )
	{	
		

		$this -> Ksiegozbior_model ->insert_nazwa_autora( $nazwa_autora);

	}


	public function insert_ksiazka( $id_miejsca, $id_pochodzenia, $cena, $data_wpisu, $nr_dowodu, $tytul, $rok_wydawca )
	{	
		
		$this -> Ksiegozbior_model ->insert_ksiazka(  $id_miejsca, $id_pochodzenia, $cena, $data_wpisu, $nr_dowodu, $tytul, $rok_wydawca );
		
	}

	public function update_ksiazka( $id_ksiazki,  $id_miejsca, $id_pochodzenia, $cena, $data_wpisu, $nr_dowodu, $tytul, $rok_wydawca )
	{	
		

		$this -> Ksiegozbior_model ->update_ksiazka( $id_ksiazki, $id_miejsca, $id_pochodzenia, $cena, $data_wpisu, $nr_dowodu, $tytul, $rok_wydawca );
		
	}

	public function get_id_ostatnio_wprowadzonej_ksiazki()
	{	

		$output = $this -> Ksiegozbior_model ->get_id_ostatnio_wprowadzonej_ksiazki();
		echo json_encode( $output);
		
	}

	public function insert_napisana_przez($id_autora, $id_ksiazki)
	{	

		$this -> Ksiegozbior_model ->insert_napisana_przez($id_autora, $id_ksiazki);

	}


	public function insert_kopie_ksiazek($nr_inwentarza, $id_ksiazki)
	{	

		$this -> Ksiegozbior_model ->insert_kopie_ksiazek($nr_inwentarza, $id_ksiazki);

	}

	public function get_id_ksiazki( $nr_inwentarza = true )
	{	

		$output = $this -> Ksiegozbior_model ->get_id_ksiazki($nr_inwentarza);
		echo json_encode( $output);

	}


	public function get_ksiazka( $nr_inwentarza = true )
	{	

		$output = $this -> Ksiegozbior_model ->get_ksiazka($nr_inwentarza);
		echo json_encode( $output);

	}

	public function usun_napisana_przez($id_ksiazki)
	{	

		$this -> Ksiegozbior_model ->usun_napisana_przez($id_ksiazki);

	}



	


	




}