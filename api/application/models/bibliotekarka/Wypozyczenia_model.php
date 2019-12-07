<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wypozyczenia_model extends CI_Model
{
		
	public function get_wypozyczenia()
	{

    	$this->db->select('kopie_ksiazek.nr_inwentarza, ksiazki.tytul, czytelnicy.imie_nazwisko, czytelnicy.klasa, wypozyczenia.id_wypozyczenia, wypozyczenia.data_wyp, wypozyczenia.data_odd');
    	$this->db->from('ksiazki, kopie_ksiazek, wypozyczenia, czytelnicy');
    	$this->db->where('ksiazki.id_ksiazki = kopie_ksiazek.id_ksiazki');
    	$this->db->where('wypozyczenia.id_czytelnika = czytelnicy.id_czytelnika');
    	$this->db->where('kopie_ksiazek.nr_inwentarza = wypozyczenia.nr_inwentarza');
		$this->db->order_by("wypozyczenia.id_wypozyczenia", "desc");
		$q = $this->db->get();
    	$q = $q->result();
    	return $q;
	}	

	public function get_wypozyczenia_nieoddane()
	{

    	$this->db->select('kopie_ksiazek.nr_inwentarza, ksiazki.tytul, czytelnicy.imie_nazwisko, czytelnicy.klasa, wypozyczenia.id_wypozyczenia, wypozyczenia.data_wyp, wypozyczenia.data_odd');
    	$this->db->from('ksiazki, kopie_ksiazek, wypozyczenia, czytelnicy');
    	$this->db->where('ksiazki.id_ksiazki = kopie_ksiazek.id_ksiazki');
    	$this->db->where('wypozyczenia.id_czytelnika = czytelnicy.id_czytelnika');
    	$this->db->where('kopie_ksiazek.nr_inwentarza = wypozyczenia.nr_inwentarza');
    	$this->db->where('wypozyczenia.data_odd =', NULL);
		$this->db->order_by("wypozyczenia.id_wypozyczenia", "desc");
		$q = $this->db->get();
    	$q = $q->result();
    	return $q;
	}	

}