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

		$znak_miejsca_temp = $znak_miejsca;
		$znak_miejsca = str_replace('%20', ' ', $znak_miejsca_temp);
		$znak_miejsca = str_replace('%C5%82', 'ł', $znak_miejsca); //ł
		$znak_miejsca = str_replace('%C3%B3', 'ó', $znak_miejsca); //ó
		$znak_miejsca = str_replace('%C4%85', 'ą', $znak_miejsca);//ą 
		$znak_miejsca = str_replace('%C4%87', 'ć', $znak_miejsca);//ć 
		$znak_miejsca = str_replace('%C4%99', 'ę', $znak_miejsca);//ę  
		$znak_miejsca = str_replace('%C5%84', 'ń', $znak_miejsca);//ń 
		$znak_miejsca = str_replace('%C5%9B', 'ś', $znak_miejsca);//ś 
		$znak_miejsca = str_replace('%C5%BA', 'ź', $znak_miejsca);//ź
		$znak_miejsca = str_replace('%C5%BC', 'ż', $znak_miejsca);//ż

		$znak_miejsca = str_replace('%C5%81', 'Ł', $znak_miejsca); //Ł
		$znak_miejsca = str_replace('%C3%93', 'Ó', $znak_miejsca); //Ó
		$znak_miejsca = str_replace('%C4%84', 'Ą', $znak_miejsca);//Ą 
		$znak_miejsca = str_replace('%C4%86', 'Ć', $znak_miejsca);//Ć
		$znak_miejsca = str_replace('%C4%98', 'Ę', $znak_miejsca);//Ę  
		$znak_miejsca = str_replace('%C5%83', 'Ń', $znak_miejsca);//Ń 
		$znak_miejsca = str_replace('%C5%9A', 'Ś', $znak_miejsca);//Ś 
		$znak_miejsca = str_replace('%C5%B9', 'Ź', $znak_miejsca);//Ź
		$znak_miejsca = str_replace('%C5%BB', 'Ż', $znak_miejsca);//Ż

		$output = $this -> Ksiegozbior_model ->get_id_miejsca( $znak_miejsca);
		echo json_encode( $output);

	}

	public function insert_miejsce( $znak_miejsca = true )
	{	

		$znak_miejsca_temp = $znak_miejsca;
		$znak_miejsca = str_replace('%20', ' ', $znak_miejsca_temp);
		$znak_miejsca = str_replace('%C5%82', 'ł', $znak_miejsca); //ł
		$znak_miejsca = str_replace('%C3%B3', 'ó', $znak_miejsca); //ó
		$znak_miejsca = str_replace('%C4%85', 'ą', $znak_miejsca);//ą 
		$znak_miejsca = str_replace('%C4%87', 'ć', $znak_miejsca);//ć 
		$znak_miejsca = str_replace('%C4%99', 'ę', $znak_miejsca);//ę  
		$znak_miejsca = str_replace('%C5%84', 'ń', $znak_miejsca);//ń 
		$znak_miejsca = str_replace('%C5%9B', 'ś', $znak_miejsca);//ś 
		$znak_miejsca = str_replace('%C5%BA', 'ź', $znak_miejsca);//ź
		$znak_miejsca = str_replace('%C5%BC', 'ż', $znak_miejsca);//ż

		$znak_miejsca = str_replace('%C5%81', 'Ł', $znak_miejsca); //Ł
		$znak_miejsca = str_replace('%C3%93', 'Ó', $znak_miejsca); //Ó
		$znak_miejsca = str_replace('%C4%84', 'Ą', $znak_miejsca);//Ą 
		$znak_miejsca = str_replace('%C4%86', 'Ć', $znak_miejsca);//Ć
		$znak_miejsca = str_replace('%C4%98', 'Ę', $znak_miejsca);//Ę  
		$znak_miejsca = str_replace('%C5%83', 'Ń', $znak_miejsca);//Ń 
		$znak_miejsca = str_replace('%C5%9A', 'Ś', $znak_miejsca);//Ś 
		$znak_miejsca = str_replace('%C5%B9', 'Ź', $znak_miejsca);//Ź
		$znak_miejsca = str_replace('%C5%BB', 'Ż', $znak_miejsca);//Ż

		$this -> Ksiegozbior_model ->insert_miejsce( $znak_miejsca);

	}


	public function get_id_autora( $nazwa_autora = true )
	{	

		$nazwa_autora_temp = $nazwa_autora;
		$nazwa_autora = str_replace('%20', ' ', $nazwa_autora_temp);
		$nazwa_autora = str_replace('%C5%82', 'ł', $nazwa_autora); //ł
		$nazwa_autora = str_replace('%C3%B3', 'ó', $nazwa_autora); //ó
		$nazwa_autora = str_replace('%C4%85', 'ą', $nazwa_autora);//ą 
		$nazwa_autora = str_replace('%C4%87', 'ć', $nazwa_autora);//ć 
		$nazwa_autora = str_replace('%C4%99', 'ę', $nazwa_autora);//ę  
		$nazwa_autora = str_replace('%C5%84', 'ń', $nazwa_autora);//ń 
		$nazwa_autora = str_replace('%C5%9B', 'ś', $nazwa_autora);//ś 
		$nazwa_autora = str_replace('%C5%BA', 'ź', $nazwa_autora);//ź
		$nazwa_autora = str_replace('%C5%BC', 'ż', $nazwa_autora);//ż

		$nazwa_autora = str_replace('%C5%81', 'Ł', $nazwa_autora); //Ł
		$nazwa_autora = str_replace('%C3%93', 'Ó', $nazwa_autora); //Ó
		$nazwa_autora = str_replace('%C4%84', 'Ą', $nazwa_autora);//Ą 
		$nazwa_autora = str_replace('%C4%86', 'Ć', $nazwa_autora);//Ć
		$nazwa_autora = str_replace('%C4%98', 'Ę', $nazwa_autora);//Ę  
		$nazwa_autora = str_replace('%C5%83', 'Ń', $nazwa_autora);//Ń 
		$nazwa_autora = str_replace('%C5%9A', 'Ś', $nazwa_autora);//Ś 
		$nazwa_autora = str_replace('%C5%B9', 'Ź', $nazwa_autora);//Ź
		$nazwa_autora = str_replace('%C5%BB', 'Ż', $nazwa_autora);//Ż
		

		$output = $this -> Ksiegozbior_model ->get_id_autora( $nazwa_autora);
		echo json_encode( $output);

	}

	public function insert_nazwa_autora( $nazwa_autora = true )
	{	
		$nazwa_autora_temp = $nazwa_autora;
		$nazwa_autora = str_replace('%20', ' ', $nazwa_autora_temp);
		$nazwa_autora = str_replace('%C5%82', 'ł', $nazwa_autora); //ł
		$nazwa_autora = str_replace('%C3%B3', 'ó', $nazwa_autora); //ó
		$nazwa_autora = str_replace('%C4%85', 'ą', $nazwa_autora);//ą 
		$nazwa_autora = str_replace('%C4%87', 'ć', $nazwa_autora);//ć 
		$nazwa_autora = str_replace('%C4%99', 'ę', $nazwa_autora);//ę  
		$nazwa_autora = str_replace('%C5%84', 'ń', $nazwa_autora);//ń 
		$nazwa_autora = str_replace('%C5%9B', 'ś', $nazwa_autora);//ś 
		$nazwa_autora = str_replace('%C5%BA', 'ź', $nazwa_autora);//ź
		$nazwa_autora = str_replace('%C5%BC', 'ż', $nazwa_autora);//ż

		$nazwa_autora = str_replace('%C5%81', 'Ł', $nazwa_autora); //Ł
		$nazwa_autora = str_replace('%C3%93', 'Ó', $nazwa_autora); //Ó
		$nazwa_autora = str_replace('%C4%84', 'Ą', $nazwa_autora);//Ą 
		$nazwa_autora = str_replace('%C4%86', 'Ć', $nazwa_autora);//Ć
		$nazwa_autora = str_replace('%C4%98', 'Ę', $nazwa_autora);//Ę  
		$nazwa_autora = str_replace('%C5%83', 'Ń', $nazwa_autora);//Ń 
		$nazwa_autora = str_replace('%C5%9A', 'Ś', $nazwa_autora);//Ś 
		$nazwa_autora = str_replace('%C5%B9', 'Ź', $nazwa_autora);//Ź
		$nazwa_autora = str_replace('%C5%BB', 'Ż', $nazwa_autora);//Ż
		echo $nazwa_autora;

		$this -> Ksiegozbior_model ->insert_nazwa_autora( $nazwa_autora);

	}


	public function insert_ksiazka( $id_miejsca, $id_pochodzenia, $cena, $data_wpisu, $nr_dowodu, $tytul, $rok_wydawca )
	{	
		$rok_wydawca_temp = $rok_wydawca;
		$rok_wydawca = str_replace('%20', ' ', $rok_wydawca_temp);
		$rok_wydawca = str_replace('%C5%82', 'ł', $rok_wydawca); //ł
		$rok_wydawca = str_replace('%C3%B3', 'ó', $rok_wydawca); //ó
		$rok_wydawca = str_replace('%C4%85', 'ą', $rok_wydawca);//ą 
		$rok_wydawca = str_replace('%C4%87', 'ć', $rok_wydawca);//ć 
		$rok_wydawca = str_replace('%C4%99', 'ę', $rok_wydawca);//ę  
		$rok_wydawca = str_replace('%C5%84', 'ń', $rok_wydawca);//ń 
		$rok_wydawca = str_replace('%C5%9B', 'ś', $rok_wydawca);//ś 
		$rok_wydawca = str_replace('%C5%BA', 'ź', $rok_wydawca);//ź
		$rok_wydawca = str_replace('%C5%BC', 'ż', $rok_wydawca);//ż

		$rok_wydawca = str_replace('%C5%81', 'Ł', $rok_wydawca); //Ł
		$rok_wydawca = str_replace('%C3%93', 'Ó', $rok_wydawca); //Ó
		$rok_wydawca = str_replace('%C4%84', 'Ą', $rok_wydawca);//Ą 
		$rok_wydawca = str_replace('%C4%86', 'Ć', $rok_wydawca);//Ć
		$rok_wydawca = str_replace('%C4%98', 'Ę', $rok_wydawca);//Ę  
		$rok_wydawca = str_replace('%C5%83', 'Ń', $rok_wydawca);//Ń 
		$rok_wydawca = str_replace('%C5%9A', 'Ś', $rok_wydawca);//Ś 
		$rok_wydawca = str_replace('%C5%B9', 'Ź', $rok_wydawca);//Ź
		$rok_wydawca = str_replace('%C5%BB', 'Ż', $rok_wydawca);//Ż

		$tytul_temp = $tytul;
		$tytul = str_replace('%20', ' ', $tytul_temp);
		$tytul = str_replace('%C5%82', 'ł', $tytul); //ł
		$tytul = str_replace('%C3%B3', 'ó', $tytul); //ó
		$tytul = str_replace('%C4%85', 'ą', $tytul);//ą 
		$tytul = str_replace('%C4%87', 'ć', $tytul);//ć 
		$tytul = str_replace('%C4%99', 'ę', $tytul);//ę  
		$tytul = str_replace('%C5%84', 'ń', $tytul);//ń 
		$tytul = str_replace('%C5%9B', 'ś', $tytul);//ś 
		$tytul = str_replace('%C5%BA', 'ź', $tytul);//ź
		$tytul = str_replace('%C5%BC', 'ż', $tytul);//ż

		$tytul = str_replace('%C5%81', 'Ł', $tytul); //Ł
		$tytul = str_replace('%C3%93', 'Ó', $tytul); //Ó
		$tytul = str_replace('%C4%84', 'Ą', $tytul);//Ą 
		$tytul = str_replace('%C4%86', 'Ć', $tytul);//Ć
		$tytul = str_replace('%C4%98', 'Ę', $tytul);//Ę  
		$tytul = str_replace('%C5%83', 'Ń', $tytul);//Ń 
		$tytul = str_replace('%C5%9A', 'Ś', $tytul);//Ś 
		$tytul = str_replace('%C5%B9', 'Ź', $tytul);//Ź
		$tytul = str_replace('%C5%BB', 'Ż', $tytul);//Ż

		$nr_dowodu_temp = $nr_dowodu;
		$nr_dowodu = str_replace('%20', ' ', $nr_dowodu_temp);
		$nr_dowodu = str_replace('%C5%82', 'ł', $nr_dowodu); //ł
		$nr_dowodu = str_replace('%C3%B3', 'ó', $nr_dowodu); //ó
		$nr_dowodu = str_replace('%C4%85', 'ą', $nr_dowodu);//ą 
		$nr_dowodu = str_replace('%C4%87', 'ć', $nr_dowodu);//ć 
		$nr_dowodu = str_replace('%C4%99', 'ę', $nr_dowodu);//ę  
		$nr_dowodu = str_replace('%C5%84', 'ń', $nr_dowodu);//ń 
		$nr_dowodu = str_replace('%C5%9B', 'ś', $nr_dowodu);//ś 
		$nr_dowodu = str_replace('%C5%BA', 'ź', $nr_dowodu);//ź
		$nr_dowodu = str_replace('%C5%BC', 'ż', $nr_dowodu);//ż

		$nr_dowodu = str_replace('%C5%81', 'Ł', $nr_dowodu); //Ł
		$nr_dowodu = str_replace('%C3%93', 'Ó', $nr_dowodu); //Ó
		$nr_dowodu = str_replace('%C4%84', 'Ą', $nr_dowodu);//Ą 
		$nr_dowodu = str_replace('%C4%86', 'Ć', $nr_dowodu);//Ć
		$nr_dowodu = str_replace('%C4%98', 'Ę', $nr_dowodu);//Ę  
		$nr_dowodu = str_replace('%C5%83', 'Ń', $nr_dowodu);//Ń 
		$nr_dowodu = str_replace('%C5%9A', 'Ś', $nr_dowodu);//Ś 
		$nr_dowodu = str_replace('%C5%B9', 'Ź', $nr_dowodu);//Ź
		$nr_dowodu = str_replace('%C5%BB', 'Ż', $nr_dowodu);//Ż
		$nr_dowodu = str_replace('/', '\/', $nr_dowodu);

		$this -> Ksiegozbior_model ->insert_ksiazka(  $id_miejsca, $id_pochodzenia, $cena, $data_wpisu, $nr_dowodu, $tytul, $rok_wydawca );
		
	}

	public function update_ksiazka( $id_ksiazki,  $id_miejsca, $id_pochodzenia, $cena, $data_wpisu, $nr_dowodu, $tytul, $rok_wydawca )
	{	
		$rok_wydawca_temp = $rok_wydawca;
		$rok_wydawca = str_replace('%20', ' ', $rok_wydawca_temp);
		$rok_wydawca = str_replace('%C5%82', 'ł', $rok_wydawca); //ł
		$rok_wydawca = str_replace('%C3%B3', 'ó', $rok_wydawca); //ó
		$rok_wydawca = str_replace('%C4%85', 'ą', $rok_wydawca);//ą 
		$rok_wydawca = str_replace('%C4%87', 'ć', $rok_wydawca);//ć 
		$rok_wydawca = str_replace('%C4%99', 'ę', $rok_wydawca);//ę  
		$rok_wydawca = str_replace('%C5%84', 'ń', $rok_wydawca);//ń 
		$rok_wydawca = str_replace('%C5%9B', 'ś', $rok_wydawca);//ś 
		$rok_wydawca = str_replace('%C5%BA', 'ź', $rok_wydawca);//ź
		$rok_wydawca = str_replace('%C5%BC', 'ż', $rok_wydawca);//ż

		$rok_wydawca = str_replace('%C5%81', 'Ł', $rok_wydawca); //Ł
		$rok_wydawca = str_replace('%C3%93', 'Ó', $rok_wydawca); //Ó
		$rok_wydawca = str_replace('%C4%84', 'Ą', $rok_wydawca);//Ą 
		$rok_wydawca = str_replace('%C4%86', 'Ć', $rok_wydawca);//Ć
		$rok_wydawca = str_replace('%C4%98', 'Ę', $rok_wydawca);//Ę  
		$rok_wydawca = str_replace('%C5%83', 'Ń', $rok_wydawca);//Ń 
		$rok_wydawca = str_replace('%C5%9A', 'Ś', $rok_wydawca);//Ś 
		$rok_wydawca = str_replace('%C5%B9', 'Ź', $rok_wydawca);//Ź
		$rok_wydawca = str_replace('%C5%BB', 'Ż', $rok_wydawca);//Ż

		$tytul_temp = $tytul;
		$tytul = str_replace('%20', ' ', $tytul_temp);
		$tytul = str_replace('%C5%82', 'ł', $tytul); //ł
		$tytul = str_replace('%C3%B3', 'ó', $tytul); //ó
		$tytul = str_replace('%C4%85', 'ą', $tytul);//ą 
		$tytul = str_replace('%C4%87', 'ć', $tytul);//ć 
		$tytul = str_replace('%C4%99', 'ę', $tytul);//ę  
		$tytul = str_replace('%C5%84', 'ń', $tytul);//ń 
		$tytul = str_replace('%C5%9B', 'ś', $tytul);//ś 
		$tytul = str_replace('%C5%BA', 'ź', $tytul);//ź
		$tytul = str_replace('%C5%BC', 'ż', $tytul);//ż

		$tytul = str_replace('%C5%81', 'Ł', $tytul); //Ł
		$tytul = str_replace('%C3%93', 'Ó', $tytul); //Ó
		$tytul = str_replace('%C4%84', 'Ą', $tytul);//Ą 
		$tytul = str_replace('%C4%86', 'Ć', $tytul);//Ć
		$tytul = str_replace('%C4%98', 'Ę', $tytul);//Ę  
		$tytul = str_replace('%C5%83', 'Ń', $tytul);//Ń 
		$tytul = str_replace('%C5%9A', 'Ś', $tytul);//Ś 
		$tytul = str_replace('%C5%B9', 'Ź', $tytul);//Ź
		$tytul = str_replace('%C5%BB', 'Ż', $tytul);//Ż

		$nr_dowodu_temp = $nr_dowodu;
		$nr_dowodu = str_replace('%20', ' ', $nr_dowodu_temp);
		$nr_dowodu = str_replace('%C5%82', 'ł', $nr_dowodu); //ł
		$nr_dowodu = str_replace('%C3%B3', 'ó', $nr_dowodu); //ó
		$nr_dowodu = str_replace('%C4%85', 'ą', $nr_dowodu);//ą 
		$nr_dowodu = str_replace('%C4%87', 'ć', $nr_dowodu);//ć 
		$nr_dowodu = str_replace('%C4%99', 'ę', $nr_dowodu);//ę  
		$nr_dowodu = str_replace('%C5%84', 'ń', $nr_dowodu);//ń 
		$nr_dowodu = str_replace('%C5%9B', 'ś', $nr_dowodu);//ś 
		$nr_dowodu = str_replace('%C5%BA', 'ź', $nr_dowodu);//ź
		$nr_dowodu = str_replace('%C5%BC', 'ż', $nr_dowodu);//ż

		$nr_dowodu = str_replace('%C5%81', 'Ł', $nr_dowodu); //Ł
		$nr_dowodu = str_replace('%C3%93', 'Ó', $nr_dowodu); //Ó
		$nr_dowodu = str_replace('%C4%84', 'Ą', $nr_dowodu);//Ą 
		$nr_dowodu = str_replace('%C4%86', 'Ć', $nr_dowodu);//Ć
		$nr_dowodu = str_replace('%C4%98', 'Ę', $nr_dowodu);//Ę  
		$nr_dowodu = str_replace('%C5%83', 'Ń', $nr_dowodu);//Ń 
		$nr_dowodu = str_replace('%C5%9A', 'Ś', $nr_dowodu);//Ś 
		$nr_dowodu = str_replace('%C5%B9', 'Ź', $nr_dowodu);//Ź
		$nr_dowodu = str_replace('%C5%BB', 'Ż', $nr_dowodu);//Ż
		$nr_dowodu = str_replace('/', '\/', $nr_dowodu);

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