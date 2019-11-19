<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statystyki_model extends CI_Model
{
		

	public function get_statystyki_wypozyczenia_pierwszy_sem( $klasa = false )
	{
		
		
		$this->db->select( '*');
		$this->db->from('czytelnicy');
		$this->db->join("(select id_czytelnika from wypozyczenia where  data_wyp <= '2017-01-31' ) as w", "czytelnicy.id_czytelnika = w.id_czytelnika", "left outer");
		$this->db->select( 'COUNT(w.id_czytelnika) AS liczba_wypozyczen');
		$this->db->where('czytelnicy.klasa', $klasa);
		$this->db->group_by('czytelnicy.id_czytelnika');
		$this->db->order_by("czytelnicy.klasa","inc");
		$this->db->order_by("czytelnicy.imie_nazwisko","inc");

		$q1 = $this->db->get();
    	$q1 = $q1->result();
		
    	return $q1;

	}

	public function get_statystyki_wypozyczenia_drugi_sem( $klasa = false )
	{
		
		
		$this->db->select( '*');
		$this->db->from('czytelnicy');
		$this->db->join("(select * from wypozyczenia where data_wyp >= '2017-02-01' ) as w", "czytelnicy.id_czytelnika = w.id_czytelnika", "left outer");
		$this->db->select( 'COUNT(w.id_czytelnika) AS liczba_wypozyczen');
		$this->db->where('czytelnicy.klasa', $klasa);
		$this->db->group_by('czytelnicy.id_czytelnika');
		$this->db->order_by("czytelnicy.klasa","inc");
		$this->db->order_by("czytelnicy.imie_nazwisko","inc");
		$q = $this->db->get();
    	$q = $q->result();

    	return $q;
    
	}




	public function get_statystyki_wypozyczenia_styczen( $klasa = false )
	{
		
		
		$this->db->select( '*');
		$this->db->from('czytelnicy');
		$this->db->join("(select * from wypozyczenia where data_wyp >= '2017-01-01' AND data_wyp <= '2017-01-31'  ) as w", "czytelnicy.id_czytelnika = w.id_czytelnika", "left outer");
		$this->db->select( 'COUNT(w.id_czytelnika) AS liczba_wypozyczen');
		//$this->db->select( 'liczba_wypozyczen AS liczba_wypozyczen_suma');
		$this->db->where('czytelnicy.klasa', $klasa);
		$this->db->group_by('czytelnicy.id_czytelnika');
		$this->db->order_by("czytelnicy.klasa","inc");
		$this->db->order_by("czytelnicy.imie_nazwisko","inc");
		$q = $this->db->get();
    	$q = $q->result();

    	return $q;
    
	}	

	public function get_liczba_wypozyczen_styczen( $klasa = false )
	{
		
		
		$this->db->select( 'wypozyczenia.data_wyp, COUNT(wypozyczenia.data_wyp) AS liczba_wypozyczen_klasy');
		
		$this->db->from('wypozyczenia, czytelnicy');
		$this->db->where("czytelnicy.id_czytelnika = wypozyczenia.id_czytelnika");
		$this->db->where('czytelnicy.klasa', $klasa);
		$this->db->where('wypozyczenia.id_wypozyczenia >=', 3419);
		$q = $this->db->get();
    	$q = $q->row();

    	return $q;
    
	}


	public function get_liczba_wypozyczen_pierwszy_sem( $klasa = false )
	{
		
		
		$this->db->select( 'wypozyczenia.data_wyp, COUNT(wypozyczenia.data_wyp) AS liczba_wypozyczen_klasy');
		
		$this->db->from('wypozyczenia, czytelnicy');
		$this->db->where("czytelnicy.id_czytelnika = wypozyczenia.id_czytelnika");
		$this->db->where('czytelnicy.klasa', $klasa);
		//$this->db->where('wypozyczenia.id_wypozyczenia >=', 3419);
		$this->db->where('wypozyczenia.id_wypozyczenia <=', 4067);
		$q = $this->db->get();
    	$q = $q->row();

    	return $q;
    
	}

	public function get_liczba_wypozyczen_drugi_sem( $klasa = false )
	{
		$this->db->select( 'wypozyczenia.data_wyp, COUNT(wypozyczenia.data_wyp) AS liczba_wypozyczen_klasy');
		$this->db->from('wypozyczenia, czytelnicy');
		$this->db->where("czytelnicy.id_czytelnika = wypozyczenia.id_czytelnika");
		$this->db->where('czytelnicy.klasa', $klasa);
		$this->db->where('wypozyczenia.id_wypozyczenia >=', 4068);
		$q = $this->db->get();
    	$q = $q->row();
    	return $q;
	}				








	public function get_statystyki_kazdy_dzien()
	{
		$this->db->select( 'wypozyczenia.data_wyp, COUNT(wypozyczenia.data_wyp) AS liczba_wypozyczen');
		$this->db->select( 'wypozyczenia.data_wyp, COUNT( DISTINCT(wypozyczenia.id_czytelnika) )AS liczba_uczniow');
		$this->db->from('wypozyczenia');
		$this->db->where('wypozyczenia.id_czytelnika >', 100);
		$this->db->group_by('wypozyczenia.data_wyp');
		$this->db->order_by("wypozyczenia.data_wyp","desc");
		$q = $this->db->get();
    	$q = $q->result();

    	return $q;

	}	


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

	




}