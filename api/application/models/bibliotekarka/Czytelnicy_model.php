<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Czytelnicy_model extends CI_Model
{
	
	public function get_czytelnicy($klasa = false)
	{
				
				$this->db->select( '*');
				$this->db->from('czytelnicy');
				$this->db->where('klasa', $klasa);
				$this->db->order_by("czytelnicy.imie_nazwisko","inc");
				$q = $this->db->get();
				$q = $q->result();
				return $q;
	}

	public function get_czytelnicy_wszyscy()
	{
				
				$this->db->select( '*');
				$this->db->from('czytelnicy');
				$this->db->order_by("czytelnicy.imie_nazwisko","inc");
				$q = $this->db->get();
				$q = $q->result();
				return $q;
	}

	public function get_id_czytelnika ( $imie_nazwisko = false )
	{	

		$this->db->where('imie_nazwisko', $imie_nazwisko);
		$q = $this->db->get('czytelnicy');
		$q = $q->row();
		return $q;

	}

	public function get_czytelnik ( $id_czytelnika = true )
	{	

		$this->db->where('id_czytelnika', $id_czytelnika);
		$q = $this->db->get('czytelnicy');
		$q = $q->row();
		return $q;

	}

	public function insert_czytelnik ( $imie_nazwisko =true, $klasa = true, $uwagi = false )
	{	

		$czytelnik = array(
   		 'imie_nazwisko' => $imie_nazwisko,
			'klasa' => $klasa,
			'Uwagi' => $uwagi
        );
		$this->db->insert('czytelnicy', $czytelnik);

	}


	public function update_czytelnik ($id_czytelnika = true,  $imie_nazwisko =true, $klasa = true, $uwagi = false  )
	{	

		$czytelnik = array(
   		 'imie_nazwisko' => $imie_nazwisko,
   		 'klasa' => $klasa,
   		 'Uwagi' => $uwagi	
        );
		$this->db->where('id_czytelnika', $id_czytelnika);
		$this->db->update('czytelnicy', $czytelnik);

	}
}



