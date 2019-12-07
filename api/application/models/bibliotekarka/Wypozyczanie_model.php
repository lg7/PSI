<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wypozyczanie_model extends CI_Model
{
	public function get_wypozyczenia_czytelnika( $id = true)
	{
		
		$this->db->select('wypozyczenia.nr_inwentarza, wypozyczenia.data_wyp, ksiazki.tytul');
    	$this->db->from('wypozyczenia, ksiazki, czytelnicy, kopie_ksiazek');
   		$this->db->where('wypozyczenia.id_czytelnika = czytelnicy.id_czytelnika');
   		$this->db->where('wypozyczenia.nr_inwentarza = kopie_ksiazek.nr_inwentarza');
   		$this->db->where('kopie_ksiazek.id_ksiazki = ksiazki.id_ksiazki');
   		$this->db->where('wypozyczenia.data_odd', null);
		$this->db->where( 'wypozyczenia.id_czytelnika', $id );
    	$q = $this->db->get();
    	$q = $q->result();
		
		return $q;
	}

	public function get_czytelnicy()
	{
		
			$this->db->select( 'czytelnicy.imie_nazwisko' );
			$this->db->from('czytelnicy');
			$q = $this->db->get();
			$q = $q->result();
			return $q;
	}


	public function get_pochodzenie()
	{
		
			$this->db->select( 'pochodzenie_ksiazki.nazwa_podzodzenia' );
			$this->db->from('pochodzenie_ksiazki');
			$q = $this->db->get();
			$q = $q->result();
			return $q;
	}


	public function get_id_czytelnika ( $imie_nazwisko = true )
	{	

		$this->db->select('czytelnicy.id_czytelnika');
		$this->db->from('czytelnicy');
		$this->db->where('czytelnicy.imie_nazwisko', $imie_nazwisko);
		$q = $this->db->get();
		$q = $q->row();
		//$q = $q->result();
		return $q;

	}

	public function get_imienazwisko_czytelnika ( $id_czytelnika = true )
	{	

		$this->db->select('czytelnicy.imie_nazwisko');
		$this->db->from('czytelnicy');
		$this->db->where('czytelnicy.id_czytelnika', $id_czytelnika);
		$q = $this->db->get();
		$q = $q->row();
		//$q = $q->result();
		return $q;

	}

	public function wypozycz_ksiazke($id_czytelnika, $nr_inwentarza)
	{	

		$wypozyczenie = array(
   		 'nr_inwentarza' => $nr_inwentarza ,
  		 'id_czytelnika' => $id_czytelnika ,
   		 'data_wyp' =>  date("Y-m-d")
        );

		$this->db->insert('wypozyczenia', $wypozyczenie); 
		

	}






}