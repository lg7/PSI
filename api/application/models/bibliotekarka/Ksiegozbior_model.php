<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ksiegozbior_model extends CI_Model
{
		
	public function get_ksiegozbior()
	{
		$this->db->select( 'katalog_systematyczny.znak_miejsca, ksiazki.cena, ksiazki.data_wpisu, ksiazki.nr_dowodu, ksiazki.tytul,ksiazki.rok_wydawca, autor_ksiazki.nazwa_autora, kopie_ksiazek.nr_inwentarza, kopie_ksiazek.nr_ubytku, kopie_ksiazek.uwagi, katalog_systematyczny.id_miejsca, katalog_systematyczny.znak_miejsca, pochodzenie_ksiazki.nazwa_podzodzenia');
		$this->db->from(' ksiazki, kopie_ksiazek, katalog_systematyczny, pochodzenie_ksiazki, napisana_przez, autor_ksiazki');
		$this->db->where('ksiazki.id_ksiazki = kopie_ksiazek.id_ksiazki');
		$this->db->where('ksiazki.id_ksiazki = napisana_przez.id_ksiazki');
		$this->db->where('autor_ksiazki.id_autora = napisana_przez.id_autora');
		$this->db->where('ksiazki.id_miejsca = katalog_systematyczny.id_miejsca');
		$this->db->where('ksiazki.id_pochodzenia = pochodzenie_ksiazki.id_pochodzenia');
		$this->db->where('kopie_ksiazek.nr_inwentarza <', 20000);
		$this->db->order_by("nr_inwentarza", "desc");
		$q = $this->db->get();
    	$q = $q->result();

    	return $q;
	}	


	public function get_ksiazka( $nr_inwentarza = true )
	{
		$this->db->select( 'katalog_systematyczny.znak_miejsca, ksiazki.cena, ksiazki.data_wpisu, ksiazki.nr_dowodu, ksiazki.tytul,ksiazki.rok_wydawca, autor_ksiazki.nazwa_autora, kopie_ksiazek.nr_inwentarza, kopie_ksiazek.nr_ubytku, kopie_ksiazek.uwagi, katalog_systematyczny.id_miejsca, katalog_systematyczny.znak_miejsca, pochodzenie_ksiazki.nazwa_podzodzenia, ksiazki.id_pochodzenia');
		$this->db->from(' ksiazki, kopie_ksiazek, katalog_systematyczny, pochodzenie_ksiazki, napisana_przez, autor_ksiazki');
		$this->db->where('ksiazki.id_ksiazki = kopie_ksiazek.id_ksiazki');
		$this->db->where('ksiazki.id_ksiazki = napisana_przez.id_ksiazki');
		$this->db->where('autor_ksiazki.id_autora = napisana_przez.id_autora');
		$this->db->where('ksiazki.id_miejsca = katalog_systematyczny.id_miejsca');
		$this->db->where('ksiazki.id_pochodzenia = pochodzenie_ksiazki.id_pochodzenia');
		$this->db->where('kopie_ksiazek.nr_inwentarza', $nr_inwentarza );
		$q = $this->db->get();
		$q = $q->row();
		return $q;
	}	

	public function get_id_ksiazki( $nr_inwentarza = true )
	{	

		$this->db->select('kopie_ksiazek.id_ksiazki');
		$this->db->from('kopie_ksiazek');
		$this->db->where('nr_inwentarza', $nr_inwentarza);
		$q = $this->db->get();
		$q = $q->row();
		return $q;

	}


	public function get_id_miejsca( $znak_miejsca = true )
	{	

		$this->db->select('katalog_systematyczny.id_miejsca');
		$this->db->from('katalog_systematyczny');
		$this->db->where('znak_miejsca', $znak_miejsca);
		$q = $this->db->get();
		$q = $q->row();
		return $q;

	}

	public function insert_miejsce( $znak_miejsca = true )
	{	

		$sygnatura = array(
   		 'znak_miejsca' => $znak_miejsca
        );
		$this->db->insert('katalog_systematyczny', $sygnatura); 

	}


	public function get_id_autora( $nazwa_autora = true )
	{	

		$this->db->select('autor_ksiazki.id_autora');
		$this->db->from('autor_ksiazki');
		$this->db->where('nazwa_autora', $nazwa_autora);
		$q = $this->db->get();
		$q = $q->row();
		return $q;
	}




	public function insert_nazwa_autora( $nazwa_autora = true )
	{	
		//echo "Przed" +$nazwa_autora;
		$autor = array(
   		 'nazwa_autora' => $nazwa_autora
        );
		$this->db->insert('autor_ksiazki', $autor); 
		
		echo $nazwa_autora;

	}


	public function insert_ksiazka( $id_miejsca, $id_pochodzenia, $cena, $data_wpisu, $nr_dowodu, $tytul, $rok_wydawca )
	{	

		$ksiazka = array(
   		 'id_miejsca' => $id_miejsca,
   		 'id_pochodzenia' => $id_pochodzenia,
   		 'cena' => $cena,
   		 'data_wpisu' => $data_wpisu,
   		 'nr_dowodu' => $nr_dowodu,
   		 'tytul' => $tytul,
   		 'rok_wydawca' => $rok_wydawca
        );
		$this->db->insert('ksiazki', $ksiazka);  
	}

	public function update_ksiazka($id_ksiazki, $id_miejsca, $id_pochodzenia, $cena, $data_wpisu, $nr_dowodu, $tytul, $rok_wydawca)
	{	

		$ksiazka = array(
   		 'id_miejsca' => $id_miejsca,
   		 'id_pochodzenia' => $id_pochodzenia,
   		 'cena' => $cena,
   		 'data_wpisu' => $data_wpisu,
   		 'nr_dowodu' => $nr_dowodu,
   		 'tytul' => $tytul,
   		 'rok_wydawca' => $rok_wydawca
        );

		$this->db->where('id_ksiazki', $id_ksiazki);
		$this->db->update('ksiazki', $ksiazka); 
		

	}

	public function get_id_ostatnio_wprowadzonej_ksiazki()
	{	

		$this->db->select_max('id_ksiazki');
		$q = $this->db->get('ksiazki');
		$q = $q->row();
		return $q;
	}

	public function get_ostatni_nr_inwentarza()
	{	

		$this->db->select_max('nr_inwentarza');
		$this->db->where('nr_inwentarza <', 30000);
		$q = $this->db->get('kopie_ksiazek');
		$q = $q->row();
		return $q;
	}

	public function insert_napisana_przez($id_autora, $id_ksiazki)
	{	

		$napisana_przez = array(
   		 'id_autora' => $id_autora,
   		 'id_ksiazki' => $id_ksiazki
        );
		$this->db->insert('napisana_przez', $napisana_przez); 
	}

	public function insert_kopie_ksiazek($nr_inwentarza, $id_ksiazki)
	{	

		$kopia_ksiazki = array(
   		 'nr_inwentarza' => $nr_inwentarza,
   		 'id_ksiazki' => $id_ksiazki
        );
		$this->db->insert('kopie_ksiazek', $kopia_ksiazki); 
	}

	public function usun_napisana_przez($id_ksiazki)
	{	
			$this->db->where('id_ksiazki', $id_ksiazki);
		   $this->db->delete('napisana_przez'); 
	}








}