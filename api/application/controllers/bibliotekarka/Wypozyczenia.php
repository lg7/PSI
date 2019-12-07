<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wypozyczenia extends CI_Controller {

	//to co jest w tej funkcji jest automatycznie we wszystkich innych
	public function __construct()
	{
		parent::__construct();
		$post = file_get_contents ( 'php://input' );
		$_POST = json_decode( $post, true);
		$this ->load->model('bibliotekarka/Wypozyczenia_model');
		//$this ->load->library('application/libraries/Zenda');

	}




	public function get_wypozyczenia()
	{
		$output = $this -> Wypozyczenia_model ->get_wypozyczenia();
		echo json_encode( $output);
	}	

	public function get_wypozyczenia_nieoddane()
	{
		$output = $this -> Wypozyczenia_model ->get_wypozyczenia_nieoddane();
		echo json_encode( $output);
    	
	}	

	






	

}